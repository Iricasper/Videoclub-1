<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
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

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 0 20px;
        }

        .login-box {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-box h2 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        .login-box input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-box button {
            width: 100%;
            padding: 12px;
            background-color: rgb(255, 94, 0);
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .login-box button:hover {
            background-color: rgb(255, 94, 0);
        }

        .login-box p {
            margin-top: 20px;
        }

        .login-box p a {
            color: rgb(255, 94, 0);
            text-decoration: none;
        }

        .login-box p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-box">
            <h2>Iniciar Sesión</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Correo Electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Entrar</button>
            </form>
            <p>¿No tienes cuenta? <a href="{{ route('registro') }}">Regístrate aquí</a></p>
        </div>
    </div>

</body>
</html>
