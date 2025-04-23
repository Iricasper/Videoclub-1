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
            color: black;
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

        .btn-valorar {
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

        .btn a:hover {
            background-color: rgb(241, 165, 52);
            transform: scale(1.1);
        }

        .btn a:active {
            transform: translateY(2px);
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

        <div class="menu-buttons">
            @if (DB::table('opiniones_videoclub')->where('id_cliente', '=', Auth::id())->exists())
                <a href="javascript:void(0);" onclick="openModalEditorVideoclub({{ Auth::id() }})">Actualizar tu
                    valoración</a>
            @else
                <a href="javascript:void(0);" onclick="openModalOpinionVideoclub({{ Auth::id() }})">Valóranos</a>
            @endif
        </div>


    </div>

    <!-- Modal de Opinión -->
    <div id="modal-opinion-videoclub" class="modal">
        <div class="modal-content">
            <h2>Deja tu Opinión</h2>
            <form id="form-opinion-videoclub" method="POST" action="{{ route('opiniones-videoclub.create') }}">
                @csrf
                <input type="hidden" name="id_cliente" id="id_cliente">

                <!-- Preguntas de Opinión -->
                @php
                    $preguntas = [
                        'pregunta1' => '¿Ayuda a resolver las incidencias planteadas a los clientes?',
                        'pregunta2' => '¿Te sientes valorado por Recursos Impulsa?',
                        'pregunta3' => '¿Te ha ayudado a mejorar el CRM tu trabajo con Recursos Impulsa?',
                        'pregunta4' => '¿Mejorarías las gestiones del CRM?',
                        'pregunta5' => '¿Es buena la relación con el departamento de RRHH de Recursos Impulsa?',
                        'pregunta6' => '¿Es buena la relación con el departamento técnico de Recursos Impulsa?',
                        'pregunta7' => '¿Es buena la relación con el departamento de dirección de Recursos Impulsa?',
                        'pregunta8' => '¿Es buena la relación con el departamento de Administración de Recursos Impulsa?',
                        'pregunta9' => '¿Te sientes apoyado ante dificultades o incidencias por Recursos Impulsa?'
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
                        placeholder="Comentario adicional (opcional)">{{ old("comentario{$key}") }}</textarea><br><br>
                @endforeach

                <button type="submit" class="btn">Enviar</button>
                <button type="button" class="btn" onclick="closeModalOpinionVideoclub()">Cerrar</button>
            </form>
        </div>
    </div>

    <!-- Modal de Edición -->
    <div id="modal-editor-videoclub" class="modal">
        <div class="modal-content">
            <h2>Editar tu Opinión</h2>
            <form id="form-editor" method="POST" action="{{ route('opiniones-videoclub.store') }}">
                @csrf
                <input type="hidden" name="id_opinion" id="id_opinion_editor">

                <!-- Preguntas de Opinión -->
                @foreach(range(1, 9) as $i)
                    <label for="pregunta{{ $i }}">Pregunta {{ $i }}</label><br>
                    <label class="radio-label">
                        Sí
                        <input type="radio" name="pregunta{{ $i }}" value="1" id="pregunta{{ $i }}_1" class="radio-button"
                            required>
                    </label>
                    <label class="radio-label">
                        No
                        <input type="radio" name="pregunta{{ $i }}" value="0" id="pregunta{{ $i }}_2" class="radio-button"
                            required>
                    </label><br>

                    <textarea name="comentario{{ $i }}_2" id="comentario{{ $i }}_2"
                        placeholder="Comentario adicional (opcional)"></textarea><br><br>
                @endforeach

                <button type="submit" class="btn">Actualizar</button>
                <button type="button" class="btn" onclick="closeModalEditorVideoclub()">Cerrar</button>
            </form>
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


        function openModalOpinionVideoclub(idCliente) {
            document.getElementById('modal-opinion-videoclub').style.display = 'flex';
            document.getElementById('id_cliente').value = idCliente;

            // Cargar los datos de la opinión si existen
            fetch(`/opiniones-videoclub/editar/${idCliente}`)
                .then(response => response.json())
                .then(data => {
                    if (data.opinion_videoclub) {
                        // Rellenar los campos con la opinión ya existente
                        for (let i = 1; i <= 9; i++) {
                            const preguntaField = document.querySelectorAll(`[name="pregunta_${i}"]`);

                            const comentarioField = document.querySelector(`[name="comentario_${i}"]`);
                            if (data.opinion_videoclub[`pregunta_${i}`] == 1) {
                                preguntaField[0].checked = true; // Seleccionar 'Sí'
                            } else {
                                preguntaField[1].checked = true; // Seleccionar 'No'
                            }
                            comentarioField.value = data.opinion_videoclub[`comentario_${i}`] || '';
                        }
                    }
                });
        }

        function closeModalOpinionVideoclub() {
            document.getElementById('modal-opinion-videoclub').style.display = 'none';
        }

        function openModalEditorVideoclub(idCliente) {
            fetch(`/opiniones-videoclub/editar/${idCliente}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert('No se encontró ninguna opinión para editar.');
                        return;
                    }
                    // Cargar los datos en los campos
                    document.getElementById('id_opinion_editor').value = idCliente;

                    for (let i = 1; i <= 9; i++) {

                        // Cargar las respuestas de las preguntas
                        document.getElementById(`pregunta${i}_1`).checked = data[`pregunta${i}`] == 1;
                        document.getElementById(`pregunta${i}_2`).checked = data[`pregunta${i}`] == 0;

                        console.log(data);
                        // Cargar los comentarios
                        document.getElementById(`comentario${i}_2`).value = data[`comentario${i}`] || "";
                    }

                    // Mostrar el modal
                    document.getElementById("modal-editor-videoclub").style.display = 'flex';
                })
                .catch(error => console.error('Error al obtener los datos de la opinión:', error));
        }


        function closeModalEditorVideoclub() {
            document.getElementById("modal-editor-videoclub").style.display = 'none';
        }

    </script>


    <!-- Pie de Página -->
    <div class="footer" style="display: none;">
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