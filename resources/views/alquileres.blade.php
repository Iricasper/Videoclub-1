<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Alquileres</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Si tienes un archivo CSS -->
    <style>
        /* Aquí puedes agregar algunos estilos básicos o personalizados si lo prefieres */
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

        .btn-devolver {
            background-color: #ff6700;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-devolver:hover {
            background-color: #e55b00;
        }
    </style>
</head>

<body>
    <div class="botones-alquileres">
        <a href="{{ route('menu') }}">Volver</a>
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
                                    <form action="{{ route('devolver', $alquiler->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn-devolver">Devolver</button>
                                    </form>
                                @else
                                    <span>Plazo expirado</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>

</html>