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

        #modal-editor {
            display: none;
            position: fixed;
        }

        textarea,
        select {
            width: 100%;
            margin: 10px 0;
            padding: 8px;
        }

        /* Estilo para los botones de radio */
        .radio-label {
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .radio-button {
            margin-right: 5px;
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
                                    <td>{{ $alquiler->titulo }}</td>
                                    <td>{{ \Carbon\Carbon::parse($alquiler->fecha_alquiler)->format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($alquiler->fecha_devolucion)->format('d-m-Y') }}</td>
                                    <td>{{ number_format($alquiler->importe_alquiler, 2) }} €</td>
                                    <td>
                                        @if($alquiler->fecha_devolucion > now())
                                            <form action="{{ route('devolver', $alquiler->id_alquiler) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn">Devolver</button>
                                            </form>
                                        @endif
                                        @if(
                                            DB::table('opiniones')
                                                ->where('id_cliente', "=", $alquiler->id_cliente)
                                                ->where('id_pelicula', "=", $alquiler->id)->where('id_opinion', "!=", null)
                                                ->exists()
                                        )
                                                            <button class="btn" onclick="openModalEditor({{ $alquiler->id }})">Editar Opinión</button>
                                        @else()
                                            <button class="btn" onclick="openModalOpinion({{ $alquiler->id }})">Dar Opinión</button>
                                        @endif

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

                @foreach($preguntas as $key => $pregunta)
                    <label>{{ $pregunta }}</label><br>

                    <!-- Radio buttons con la estructura correcta -->
                    <label class="radio-label">
                        Sí
                        <input type="radio" name="{{ $key }}" value="1" class="radio-button" {{ old($key) == '1' ? 'checked' : '' }} required>
                    </label>
                    <label class="radio-label">
                        No
                        <input type="radio" name="{{ $key }}" value="0" class="radio-button" {{ old($key) == '0' ? 'checked' : '' }} required>
                    </label><br>

                    <textarea name="comentario_{{ $key }}"
                        placeholder="Comentario adicional (opcional)">{{ old("comentario_{$key}") }}</textarea><br><br>
                @endforeach

                <button type="submit" class="btn">Enviar</button>
                <button type="button" class="btn" onclick="closeModalOpinion()">Cerrar</button>
            </form>
        </div>
    </div>

    <!-- Modal de Edición -->
    <div id="modal-editor" class="modal">
        <div class="modal-content">
            <h2>Editar tu Opinión</h2>
            <form id="form-editor" method="POST" action="{{ route('opiniones.store') }}">
                @csrf
                <input type="hidden" name="id_pelicula" id="id_pelicula_editor">

                <!-- Preguntas de Opinión -->
                @foreach(range(1, 7) as $i)
                    <label for="pregunta{{ $i }}">Pregunta {{ $i }}</label><br>
                    <label class="radio-label">
                        Sí
                        <input type="radio" name="pregunta_{{ $i }}" value="1" id="pregunta{{ $i }}_1" class="radio-button"
                            required>2
                    </label>
                    <label class="radio-label">
                        No
                        <input type="radio" name="pregunta_{{ $i }}" value="0" id="pregunta{{ $i }}_2" class="radio-button"
                            required>
                    </label><br>

                    <textarea name="comentario_{{ $i }}_2" id="comentario_{{ $i }}_2"
                        placeholder="Comentario adicional (opcional)"></textarea><br><br>
                @endforeach

                <button type="submit" class="btn">Actualizar</button>
                <button type="button" class="btn" onclick="closeModalEditor()">Cerrar</button>
            </form>
        </div>
    </div>

    <script>
        function openModalOpinion(idPelicula) {
            document.getElementById('modal-opinion').style.display = 'flex';
            document.getElementById('id_pelicula').value = idPelicula;

            // Cargar los datos de la opinión si existen
            fetch(`/opiniones/editar/${idPelicula}`)
                .then(response => response.json())
                .then(data => {
                    if (data.opinion) {
                        // Rellenar los campos con la opinión ya existente
                        for (let i = 1; i <= 7; i++) {
                            const preguntaField = document.querySelectorAll(`[name="pregunta_${i}"]`);
                            
                            const comentarioField = document.querySelector(`[name="comentario_${i}"]`);
                            if (data.opinion[`pregunta_${i}`] == 1) {
                                preguntaField[0].checked = true; // Seleccionar 'Sí'
                            } else {
                                preguntaField[1].checked = true; // Seleccionar 'No'
                            }
                            comentarioField.value = data.opinion[`comentario_${i}`] || '';
                        }
                    }
                });
        }

        function closeModalOpinion() {
            document.getElementById('modal-opinion').style.display = 'none';
        }

        function openModalEditor(idPelicula) {
            fetch(`/opiniones/editar/${idPelicula}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert('No se encontró ninguna opinión para editar.');
                        return;
                    }

                    // Cargar los datos en los campos
                    document.getElementById('id_pelicula_editor').value = idPelicula;

                    for (let i = 1; i <= 7; i++) {

                        // Cargar las respuestas de las preguntas
                        document.getElementById(`pregunta${i}_1`).checked = data[`pregunta_${i}`] == 1;
                        document.getElementById(`pregunta${i}_2`).checked = data[`pregunta_${i}`] == 0;


                        // Cargar los comentarios
                        document.getElementById(`comentario_${i}_2`).value = data[`comentario_${i}`] || "";
                    }

                    // Mostrar el modal
                    document.getElementById("modal-editor").style.display = 'flex';
                })
                .catch(error => console.error('Error al obtener los datos de la opinión:', error));
        }


        function closeModalEditor() {
            document.getElementById("modal-editor").style.display = 'none';
        }

    </script>
</body>

</html>