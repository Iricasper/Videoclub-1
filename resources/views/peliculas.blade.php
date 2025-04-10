<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Películas</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FFF3E6;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 30px;
            background-color: #FFFFFF;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        h2 {
            text-align: center;
            color: #FF6700;
            font-size: 48px;
            margin-bottom: 30px;
        }

        .botones-peliculas {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .botones-peliculas a {
            padding: 12px 20px;
            background-color: #FF6700;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .botones-peliculas a:hover {
            background-color: #E55B00;
        }

        .alert {
            padding: 15px;
            margin: 20px auto;
            max-width: 800px;
            border-radius: 10px;
            text-align: center;
            font-weight: bold;
        }

        .alert-success {
            background-color: #D4EDDA;
            color: #155724;
        }

        .alert-error {
            background-color: #F8D7DA;
            color: #721C24;
        }

        .movie-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .movie-item {
            width: 230px;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .movie-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-bottom: 4px solid #FF6700;
        }

        .movie-item p {
            margin: 10px;
            font-size: 18px;
            font-weight: bold;
        }

        .price {
            font-size: 15px;
            color: #444;
            margin: 0 10px;
            font-weight: 600;
        }

        .description {
            font-size: 14px;
            color: #555;
            margin: 10px;
            text-align: justify;
            height: 80px;
            overflow: hidden;
            transition: height 0.3s ease;
        }

        .description.expand {
            height: auto;
        }

        .read-more {
            color: #FF6700;
            cursor: pointer;
            font-weight: bold;
            margin: 0 10px 10px;
            display: block;
            text-align: right;
        }

        .movie-buttons {
            display: flex;
            justify-content: center;
            padding: 10px;
        }

        .movie-buttons button {
            background-color: #FF6700;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .movie-buttons button:hover {
            background-color: #E55B00;
        }
    </style>
</head>

<body>
    <!-- Filtros de búsqueda -->
    <div style="display: flex; justify-content: center; gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
        <input type="text" id="searchInput" placeholder="Buscar por título..."
            style="padding: 10px; border-radius: 8px; border: 1px solid #ccc; width: 250px; font-size: 16px;">
        <select id="genreFilter" style="padding: 10px; border-radius: 8px; border: 1px solid #ccc; font-size: 16px;">
            <option value="">Todos los géneros</option>
            @php
                $generos = $peliculas->pluck('genero')->unique()->filter();
            @endphp
            @foreach($generos as $genero)
                <option value="{{ strtolower($genero) }}">{{ $genero }}</option>
            @endforeach
        </select>
    </div>
    <div class="container">
        <h2>Catálogo de Películas</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif
        <div class="botones-peliculas">
            <a href="{{ route('alquileres.index') }}">Ver Alquileres</a>
            <a href="{{ route('menu') }}">Volver</a>
        </div>
        <div class="movie-list">
            @foreach($peliculas as $pelicula)
                <div class="movie-item" data-genero="{{ strtolower($pelicula->genero) }}">
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
                            <button type="submit">Alquilar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function toggleDescription(peliculaId) {
            const description = document.getElementById('desc-' + peliculaId);
            const readMore = document.querySelector(`span[onclick="toggleDescription(${peliculaId})"]`);
            if (description.classList.contains('expand')) {
                description.classList.remove('expand');
                readMore.textContent = 'Leer más';
            } else {
                description.classList.add('expand');
                readMore.textContent = 'Leer menos';
            }
        }
        // Filtrado dinámico
        document.getElementById('searchInput').addEventListener('input', filterMovies);
        document.getElementById('genreFilter').addEventListener('change', filterMovies);
        function filterMovies() {
            const searchValue = document.getElementById('searchInput').value.toLowerCase();
            const selectedGenre = document.getElementById('genreFilter').value;
            document.querySelectorAll('.movie-item').forEach(item => {
                const title = item.querySelector('p').textContent.toLowerCase();
                const genre = (item.getAttribute('data-genero') || '').toLowerCase();
                const matchesTitle = title.includes(searchValue);
                const matchesGenre = selectedGenre === '' || genre === selectedGenre;
                item.style.display = (matchesTitle && matchesGenre) ? 'flex' : 'none';
            });
        }
    </script>
</body>

</html>