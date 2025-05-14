<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One&family=Bowlby+One+SC&display=swap" rel="stylesheet" />

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
            margin-bottom: 30px;
            color: rgb(255, 94, 0);
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
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            color: #fff;
            max-width: 600px;
            box-shadow: 0 4px 15px rgba(255, 94, 0, 0.6);
            line-height: 1.5;
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

        /* Chat styles */
        #chat-container {
            position: fixed;
            bottom: 0;
            right: 20px;
            width: 320px;
            max-height: 450px;
            background: rgba(0, 0, 0, 0.8);
            border-radius: 10px 10px 0 0;
            display: flex;
            flex-direction: column;
            color: white;
            font-family: Arial, sans-serif;
            overflow: hidden;
            transition: height 0.3s ease;
            height: 40px; /* Start closed */
        }

        .message {
            margin-bottom: 10px;
            padding: 8px 12px;
            border-radius: 15px;
            max-width: 75%;
            word-wrap: break-word;
            font-size: 14px;
            line-height: 1.3;
            position: relative;
        }

        .message.sent {
            background-color: rgb(255, 94, 0);
            align-self: flex-end;
            color: white;
        }

        .message.received {
            background-color: rgb(241, 165, 52);
            align-self: flex-start;
            color: black;
        }

        .message-time {
            font-size: 10px;
            color: #ccc;
            position: absolute;
            bottom: 2px;
            right: 10px;
        }

        #chat-header {
            background: rgb(255, 94, 0);
            padding: 10px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 10px 10px 0 0;
            user-select: none;
        }

        #chat-user-select {
            margin: 5px 10px;
            padding: 5px;
            border-radius: 5px;
            border: none;
            font-size: 14px;
            background: white;
            color: black;
            display: block;
        }

        #chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
            background: #222;
            display: none; /* Hidden when closed */
        }

        #chat-input-container {
            display: flex;
            border-top: 1px solid #444;
            display: none; /* Hidden when closed */
        }

        #chat-input {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 0 0 0 10px;
            font-size: 14px;
        }

        #chat-send-btn {
            background: rgb(255, 94, 0);
            border: none;
            color: white;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 0 0 10px 0;
            font-weight: bold;
        }

        #chat-send-btn:disabled {
            background: #999;
            cursor: not-allowed;
        }
    </style>
</head>

<body>

    <!-- Contenedor del usuario -->
    <div class="user-dropdown">
        <div class="user-trigger" onclick="toggleDropdown()">
            ▼ Bienvenido {{ Auth::user()->nombre }}
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

            <!-- Enlace para cerrar sesión con formulario oculto -->
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Cerrar Sesión
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
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

    <!-- Chat container -->
    <div id="chat-container">
        <div id="chat-header" onclick="toggleChat()">Chat</div>
        <select id="chat-user-select" disabled>
            <option value="">Selecciona un usuario</option>
        </select>
        <div id="chat-messages"></div>
        <div id="chat-input-container">
            <input type="text" id="chat-input" placeholder="Escribe un mensaje..." autocomplete="off" disabled />
            <button id="chat-send-btn" disabled>Enviar</button>
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

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.3/dist/echo.iife.js"></script>

    <script>
        const userId = {{ Auth::id() }};
        let chatOpen = false;
        let selectedUserId = null;

        const chatContainer = document.getElementById('chat-container');
        const chatHeader = document.getElementById('chat-header');
        const chatUserSelect = document.getElementById('chat-user-select');
        const chatMessages = document.getElementById('chat-messages');
        const chatInput = document.getElementById('chat-input');
        const chatSendBtn = document.getElementById('chat-send-btn');

        function toggleChat() {
            if (chatOpen) {
                chatContainer.style.height = '40px';
                chatMessages.style.display = 'none';
                chatInput.parentElement.style.display = 'none';
                chatUserSelect.style.display = 'none';
                chatOpen = false;
            } else {
                chatContainer.style.height = '450px';
                chatMessages.style.display = 'block';
                chatInput.parentElement.style.display = 'flex';
                chatUserSelect.style.display = 'block';
                chatOpen = true;
            }
        }

        // Load users into the select dropdown
        function loadUsers() {
            fetch('/usuarios/json')
                .then(response => response.json())
                .then(users => {
                    chatUserSelect.innerHTML = '<option value="">Selecciona un usuario</option>';
                    users.forEach(user => {
                        const option = document.createElement('option');
                        option.value = user.id;
                        option.textContent = user.nombre_completo;
                        chatUserSelect.appendChild(option);
                    });
                    chatUserSelect.disabled = false;
                })
                .catch(error => {
                    console.error('Error al cargar usuarios:', error);
                });
        }

        chatUserSelect.addEventListener('change', () => {
            selectedUserId = chatUserSelect.value;
            chatInput.disabled = !selectedUserId;
            chatSendBtn.disabled = true;
            chatMessages.innerHTML = '';
            if (selectedUserId) {
                loadMessages();
            }
        });

        chatInput.addEventListener('input', () => {
            chatSendBtn.disabled = chatInput.value.trim() === '' || !selectedUserId;
        });

        chatSendBtn.addEventListener('click', sendMessage);

        chatInput.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' && !chatSendBtn.disabled) {
                event.preventDefault();
                sendMessage();
            }
        });

        function appendMessage(message, type, time) {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message', type);
            messageDiv.textContent = message;

            if (time) {
                const timeSpan = document.createElement('span');
                timeSpan.classList.add('message-time');
                timeSpan.textContent = time;
                messageDiv.appendChild(timeSpan);
            }

            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function loadMessages() {
            if (!selectedUserId) return;
            fetch(`/mensajes/${userId}/${selectedUserId}`)
                .then(response => response.json())
                .then(data => {
                    chatMessages.innerHTML = '';
                    data.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
                    data.forEach(msg => {
                        const type = msg.user_emisor == userId ? 'sent' : 'received';
                        const time = new Date(msg.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
                        appendMessage(msg.mensaje, type, time);
                    });
                })
                .catch(error => {
                    console.error('Error al cargar mensajes:', error);
                });
        }

        function sendMessage() {
            const message = chatInput.value.trim();
            if (message === '' || !selectedUserId) {
                return;
            }

            chatInput.value = '';
            chatSendBtn.disabled = true;

            const now = new Date();
            const time = now.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
            appendMessage(message, 'sent', time);

            fetch('/mensajes/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    mensaje: message,
                    user_receptor: parseInt(selectedUserId, 10)
                })
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => {
                        console.error('Error al enviar mensaje:', err);
                        throw new Error('Error al enviar mensaje');
                    }).catch(() => {
                        console.error('Error al enviar mensaje: No se pudo parsear JSON de error');
                        throw new Error('Error al enviar mensaje');
                    });
                }
                return response.json();
            })
            .then(data => {
                // Optionally reload messages or handle success
            })
            .catch(error => {
                console.error(error);
            });
        }

        // Setup Pusher and Laravel Echo
        Pusher.logToConsole = false;

        const echo = new Echo({
            broadcaster: 'pusher',
            key: '{{ env("PUSHER_APP_KEY") }}',
            cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
            forceTLS: true,
            encrypted: true,
            authEndpoint: '/broadcasting/auth',
            auth: {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });

        // Listen to private channel for authenticated user
        echo.private(`chat.${userId}`)
            .listen('.mensaje.enviado', (e) => {
                if (chatOpen) {
                    if (e.emisor_id == selectedUserId || e.receptor_id == selectedUserId) {
                        loadMessages();
                    }
                }
            });

        // Initialize chat by loading users
        loadUsers();
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
