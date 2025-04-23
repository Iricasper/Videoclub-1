<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes</title>
    <style>
        body {
            font-family: sans-serif;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            border: 1px solid #000;
            text-align: left;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>Listado de Clientes</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->nombre_completo }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->telefono }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
