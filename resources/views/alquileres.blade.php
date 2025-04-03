<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Alquileres</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #ff6700;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 80vh;
            overflow-y: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .btn {
            background-color: #ff6700;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            border: none;
        }

        .btn:hover {
            background-color: #e55b00;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            text-align: center;
            max-height: 80vh;
            overflow-y: auto;
        }

        textarea,
        select {
            width: 100%;
            margin: 10px 0;
            padding: 8px;
        }
    </style>
</head>

<body>
    <div class="botones-alquileres">
        <a href="{{ route('menu') }}" class="btn">Volver</a>
    </div>

    <div class="container">
        <h1>Mis Alquileres</h1>

        @if($alquileres->isEmpty())
            <p>No tienes alquileres activos.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Fecha de Alquiler</th>
                        <th>Fecha de Devolución</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alquileres as $alquiler)
                        <tr>
                            <td>{{ $alquiler->pelicula->titulo }}</td>
                            <td>{{ \Carbon\Carbon::parse($alquiler->fecha_alquiler)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($alquiler->fecha_devolucion)->format('d-m-Y') }}</td>
                            <td>${{ number_format($alquiler->importe_alquiler, 2) }}</td>
                            <td>
                                @if($alquiler->fecha_devolucion > now())
                                    <form action="{{ route('devolver', $alquiler->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn">Devolver</button>
                                    </form>
                                @endif
                                <button class="btn" onclick="openModal({{ $alquiler->pelicula->id }})">Dar Opinión</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Modal de Opinión -->
    <div id="modal-opinion" class="modal">
        <div class="modal-content">
            <h2>Deja tu Opinión</h2>
            <form id="form-opinion" method="POST" action="{{ route('opiniones.store') }}">
                @csrf
                <input type="hidden" name="id_pelicula" id="id_pelicula">

                <!-- Preguntas de Opinión -->
                @php
                    $preguntas = [
                        'pregunta_1' => '¿Cumple el plazo de pago?',
                        'pregunta_2' => '¿Abona la factura en tiempo razonable?',
                        'pregunta_3' => '¿Contesta incidencias en tiempo razonable?',
                        'pregunta_4' => '¿Te sientes valorado?',
                        'pregunta_5' => '¿Es intuitiva la plataforma?',
                        'pregunta_6' => '¿Recibes los contratos firmados?',
                        'pregunta_7' => '¿Te gustaría seguir trabajando con el cliente?'
                    ];
                @endphp

                <!-- Aquí ajustamos los nombres de los campos de comentarios -->
                @foreach($preguntas as $key => $pregunta)
                    <label>{{ $pregunta }}</label>
                    <select name="{{ $key }}" required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="1" {{ old($key) == '1' ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ old($key) == '0' ? 'selected' : '' }}>No</option>
                    </select>
                    <!-- Asegúrate de que los nombres coincidan con el formato esperado en el controlador -->
                    <textarea name="comentario_{{ $key }}"
                        placeholder="Comentario adicional (opcional)">{{ old("comentario_{$key}") }}</textarea>
                @endforeach


                <button type="submit" class="btn">Enviar</button>
                <button type="button" class="btn" onclick="closeModal()">Cerrar</button>
            </form>
        </div>
    </div>

    <script>
        function openModal(idPelicula) {
            document.getElementById('modal-opinion').style.display = 'flex';
            document.getElementById('id_pelicula').value = idPelicula;

            // Cargar los datos de la opinión si existen
            fetch(`/opiniones/editar/${idPelicula}`)
                .then(response => response.json())
                .then(data => {
                    if (data.opinion) {
                        // Rellenar los campos con la opinión ya existente
                        for (let i = 1; i <= 7; i++) {
                            const preguntaField = document.querySelector(`[name="pregunta_${i}"]`);
                            const comentarioField = document.querySelector(`[name="comentario_${i}"]`);
                            preguntaField.value = data.opinion[`pregunta_${i}`] || '';
                            comentarioField.value = data.opinion[`comentario_${i}`] || '';
                        }
                    }
                });
        }

        function closeModal() {
            document.getElementById('modal-opinion').style.display = 'none';
        }
    </script>
</body>

</html>