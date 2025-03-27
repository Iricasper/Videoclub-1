<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Bowlby+One+SC&display=swap" rel="stylesheet">
    <title>Clientes</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgb(255, 145, 0);
            color: black;
        }
        .container {
            padding: 20px;
        }
        .container h2{
            font-family: "Bowlby One SC", "Bowlby One SC", sans-serif;;
            font-size: 50px;
            padding: 25px;
            text-align: center;
            color: rgb(255, 151, 32);
            background: rgb(255, 255, 255);
            border-radius: 20px;
        }
        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .user-table th, .user-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .user-table th {
            background-color:rgb(255, 184, 32);
            color: rgb(0, 0, 0);
        }
        .user-table tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Lista de Clientes</h2>

        <!-- Tabla de usuarios -->
        <table class="user-table">
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
    </div>

</body>
</html>
