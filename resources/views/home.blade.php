<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a VideoClub</title>

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

        .home-container {
            text-align: center;
            padding: 100px 20px;
        }

        .home-header {
            background: linear-gradient(to right, rgb(241, 165, 52), rgb(255, 94, 0));
            color: white;
            padding: 80px 0;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            margin-bottom: 50px;
        }

        .home-header h1 {
            font-size: 50px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .home-header p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .cta-buttons a {
            display: inline-block;
            padding: 15px 40px;
            margin: 10px;
            background-color: rgb(255, 94, 0);
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: 0.3s ease;
            text-transform: uppercase;
        }

        .cta-buttons a:hover {
            background-color: rgb(255, 94, 0);
        }

        .cta-buttons a:active {
            transform: translateY(2px);
        }

        .featured-movies {
            margin-top: 40px;
            padding: 20px;
            color: white;
            border: 2px solid rgb(255, 94, 0);
            /* Borde naranja */
            border-radius: 10px;
            /* Bordes redondeados */
            box-shadow: 0 4px 20px rgba(255, 94, 0, 0.6);
            /* Sombreado naranja para resaltar */
            background-color: rgba(0, 0, 0, 0.7);
            /* Fondo semitransparente negro para que resalte más */
        }

        .featured-movies h2 {
            font-size: 30px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .movie-slider {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
            overflow-x: auto;
            padding-bottom: 20px;
        }

        .movie-slider .slider-item {
            position: relative;
            width: 30%;
            overflow: hidden;
            border: 2px solid rgb(255, 94, 0);
            /* Borde naranja */
            border-radius: 10px;
            /* Bordes redondeados */
            box-shadow: 0 5px 15px rgba(255, 94, 0, 0.6);
            /* Sombreado naranja */
            transition: transform 0.3s ease;
            background-color: rgba(0, 0, 0, 0.6);
            /* Fondo semitransparente para mejorar contraste */
        }

        .movie-slider .slider-item:hover {
            transform: scale(1.05);
            /* Efecto de escala al pasar el ratón */
        }

        .movie-slider img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .movie-slider .slider-item p {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 5px 10px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="home-container">
        <header class="home-header">
            <h1>Bienvenido a VideoClub</h1>
            <p>Disfruta de las mejores películas y series en un solo lugar.</p>
        </header>

        <div class="cta-buttons">
            <a href="{{ route('login') }}">Iniciar Sesión</a>
            <a href="{{ route('registro') }}">Registrarse</a>
        </div>

        <!-- Películas Destacadas -->
        <section class="featured-movies">
            <h2>Películas Destacadas</h2>
            <div class="movie-slider">
                <div class="slider-item">
                    <img src="https://via.placeholder.com/300x200" alt="Película 1">
                    <p>Película 1</p>
                </div>
                <div class="slider-item">
                    <img src="https://via.placeholder.com/300x200" alt="Película 2">
                    <p>Película 2</p>
                </div>
                <div class="slider-item">
                    <img src="https://via.placeholder.com/300x200" alt="Película 3">
                    <p>Película 3</p>
                </div>
            </div>
        </section>
    </div>

</body>

</html>