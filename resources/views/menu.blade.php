<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Bowlby+One+SC&display=swap" rel="stylesheet">
    
    <title>Menú</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('imagenes/peliculas-1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            color: white;
        }

        /* Barra de Bienvenida */
        .welcome-bar {
            background: linear-gradient(to right, rgb(255, 94, 0), rgb(241, 165, 52));
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            border-bottom: 3px solid rgb(255, 94, 0);
        }

        /* Contenedor Principal */
        .menu-container {
            text-align: center;
            padding: 50px;
        }

        /* Encabezado del Menú */
        .menu-header {
            font-family: "Bowlby One SC", "Bowlby One SC", sans-serif;
            font-size: 40px;
            /* font-weight: bold; */
            margin-bottom: 30px;
            color: rgb(255, 94, 0);
            /* text-shadow: 2px 2px 10px rgba(255, 94, 0, 0.8); */
            background-color: black;
            padding: 25px;
            border-radius: 10px;
        }

        /* Botones del Menú */
        .menu-buttons a {
            display: inline-block;
            padding: 15px 40px;
            margin: 20px;
            background-color: rgb(255, 94, 0);
            color: white;
            text-decoration: none;
            font-size: 20px;
            border-radius: 10px;
            transition: 0.3s ease;
            box-shadow: 0 4px 10px rgba(255, 94, 0, 0.7);
            font-weight: bold;
        }

        /* Animaciones al pasar el mouse */
        .menu-buttons a:hover {
            background-color: rgb(241, 165, 52);
            transform: scale(1.1);
        }

        .menu-buttons a:active {
            transform: translateY(2px);
        }

        /* Estilo para el Carrusel de Noticias */
        .carousel {
            margin: 80px auto;
            padding: 100px;
            width: 80%;
            background-color: rgba(0, 0, 0, 0.7);
            /* Fondo oscuro */
            border-radius: 10px;
            font-size: 20px;
            /* Tamaño de fuente más grande */
            font-weight: bold;
            text-align: center;
            color: #fff;
            max-width: 600px;
            box-shadow: 0 4px 15px rgba(255, 94, 0, 0.6);
            line-height: 1.5;
            /* Mejora la legibilidad */
        }

        /* Sombra sutil para las letras */
        .carousel p {
            text-shadow: 2px 2px 10px rgba(255, 94, 0, 0.8);
        }

        /* Estilo para el pie de página */
        .footer {
            background-color: rgba(255, 94, 0, 0.9);
            color: white;
            text-align: center;
            padding: 20px;
            position: fixed;
            width: 100%;
            bottom: 0;
            font-size: 14px;
        }

        .footer a {
            color: #222;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Contenedor del usuario -->
    <div class="user-dropdown">
            <div class="user-trigger" onclick="toggleDropdown()">
                ▼ Bienvenido {{ Auth::user()->nombre }}
            </div>
            <div id="dropdown-menu" class="dropdown-menu">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar sesión
                </a>
            </div>
        </div>

    <div class="menu-container">
        <header class="menu-header">
            Menú Principal
        </header>

        <div class="menu-buttons">
            <a href="{{ route('alquileres.index') }}">Ver Alquileres</a>
            <a href="{{ route('peliculas.index') }}">Ver Películas</a>
            <a href="{{ route('usuarios.index') }}">Ver Clientes</a>
            <a href="{{ route('home') }}">Cerrar Sesión</a>
        </div>

        <!-- Carrusel de Noticias -->
        <div class="carousel" id="carousel">
            <p id="news-text"></p>
        </div>

    </div>

    <script>
        // Noticias para el carrusel
        const noticias = [
            "¡Nueva película de acción en estreno! La película 'Venganza Imparable' ya está disponible para alquiler. ¡Acción sin límites!",
            "¡Nueva temporada de tu serie favorita! La temporada 3 de 'Misterios Oscuros' ya está disponible en nuestra plataforma.",
            "Este fin de semana, disfruta de un 30% de descuento en alquileres de películas de acción. ¡No te lo pierdas!",
            "El 1 de abril llega 'La Guerra de los Reinos', una serie épica llena de acción y magia. ¡Pronto en tu pantalla!"
        ];

        let index = 0; // Inicia el índice en 0
        const newsTextElement = document.getElementById('news-text');

        // Función para cambiar el texto cada 5 segundos
        function cambiarNoticia() {
            newsTextElement.textContent = noticias[index];
            index = (index + 1) % noticias.length; // Cambia al siguiente índice y vuelve al inicio cuando llegue al final
        }

        // Cambia la noticia cada 5 segundos
        setInterval(cambiarNoticia, 5000);

        // Muestra la primera noticia al cargar
        cambiarNoticia();
    </script>

    <!-- Pie de Página -->
    <div class="footer">
        <p>© 2025 Todos los derechos reservados.</p>
        <p>
            Síguenos en:
            <a href="https://www.facebook.com" target="_blank">Facebook</a>
            <a href="https://www.twitter.com" target="_blank">Twitter</a>
            <a href="https://www.instagram.com" target="_blank">Instagram</a>
        </p>
        <p>
            <a href="mailto:contacto@peliculas.com">Contacto</a> |
            <a href="/terminos">Términos y Condiciones</a>
        </p>
    </div>

</body>

</html>