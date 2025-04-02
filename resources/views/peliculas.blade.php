<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Películas</title>
    <style>
        /* Estilos básicos */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: black;
        }

        .container {
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #ff6700;
            font-size: 40px;
        }

        .movie-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: start;
        }

        .movie-item {
            width: 200px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            overflow: hidden;
        }

        .movie-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-bottom: 2px solid #ff6700;
        }

        .movie-item p {
            margin: 10px 0;
            font-size: 18px;
            color: #333;
        }

        .movie-buttons {
            display: flex;
            justify-content: space-evenly;
            margin-bottom: 10px;
        }

        .movie-buttons a {
            background-color: #ff6700;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .movie-buttons a:hover {
            background-color: #e55b00;
        }

        .price {
            font-size: 14px;
            color: #333;
            font-weight: bold;
            display: block;
        }

        .description {
            font-size: 14px;
            color: #555;
            padding: 10px;
            text-align: justify;
            height: 80px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .description.expand {
            height: auto;
            overflow: visible;
        }

        .read-more {
            color: #ff6700;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Catálogo de Películas</h2>

        <!-- Mostrar mensaje de éxito si el alquiler fue realizado con éxito -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif
        <div class="botones-peliculas">
            <a href="{{ route('alquileres.index') }}">Ver Alquileres</a>
            <a href="{{ route('menu') }}">Volver</a>
        </div>

        <!-- Mostrar las películas -->
        <div class="movie-list">
            @foreach($peliculas as $pelicula)
                <div class="movie-item">
                    <!--<img src="{{ asset('/home/usuario/Videoclub/storage/app/public/'.$pelicula->imagen) }}" alt="{{ $pelicula->titulo }}">-->
                    <img src="{{ asset('storage/' . $pelicula->imagen) }}" alt="{{ $pelicula->titulo }}">
                    <p>{{ $pelicula->titulo }}</p>
                    <p class="price">Precio alquiler: ${{ number_format($pelicula->precio_alquiler, 2) }}</p>
                    <p class="description" id="desc-{{ $pelicula->id }}">
                        {{ $pelicula->descripcion ?? 'No hay descripción disponible para esta película.' }}
                    </p>
                    <span class="read-more" onclick="toggleDescription({{ $pelicula->id }})">Leer más</span>
                    <div class="movie-buttons">
                        <form action="{{ route('alquileres.store', $pelicula->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-devolver">Alquilar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function toggleDescription(peliculaId) {
            // Seleccionamos la descripción y el texto de "Leer más"
            const description = document.getElementById('desc-' + peliculaId);
            const readMore = document.querySelector(`span[onclick="toggleDescription(${peliculaId})"]`);

            // Si la descripción está contraída (en su estado inicial), la expandimos
            if (description.classList.contains('expand')) {
                description.classList.remove('expand');  // Removemos la clase 'expand' para contraer
                readMore.textContent = 'Leer más';  // Cambiamos el texto a 'Leer más'
            } else {
                description.classList.add('expand');  // Añadimos la clase 'expand' para expandir
                readMore.textContent = 'Leer menos';  // Cambiamos el texto a 'Leer menos'
            }
        }
    </script>

</body>

</html>