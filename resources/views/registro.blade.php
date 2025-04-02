<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('imagenes/fondo');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
        }

        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 0 20px;
        }

        .register-box {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }

        .register-box h2 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        .register-box input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .register-box button {
            width: 100%;
            padding: 12px;
            background-color:rgb(255, 94, 0);
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .register-box button:hover {
            background-color:rgb(255, 94, 0);
        }

        .register-box p {
            margin-top: 20px;
        }

        .register-box p a {
            color:rgb(255, 94, 0);
            text-decoration: none;
        }

        .register-box p a:hover {
            text-decoration: underline;
        }
        h4{
            color:red;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <div class="register-box">
            <h2>Registrarse</h2>
            <form action="{{ route('registro') }}" method="POST">
                @csrf
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido1" placeholder="Apellido 1" required>
                <input type="text" name="apellido2" placeholder="Apellido 2" required>
                <input type="text" name="telefono" placeholder="Teléfono" required>
                <input type="email" name="email" placeholder="Correo Electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                <button type="submit">Registrarse</button>
            </form>
            @if($errors->any())<h4>
                {{$errors->first()}}
            </h4>
            @endif
            <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
        </div>
    </div>

</body>
</html>
