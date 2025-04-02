<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelicula;

class PeliculaSeeder extends Seeder
{
    public function run()
    {
        Pelicula::create([
            'titulo' => 'Heidi', 
            'imagen' => 'heidi.jpg', 
            'genero' => 'Infantil', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Heidi es una niña huérfana que vive con su abuelo en los Alpes suizos.',
        ]);

        Pelicula::create([
            'titulo' => 'El Rey León', 
            'imagen' => 'rey_leon.jpg', 
            'genero' => 'Animación', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Un joven león llamado Simba debe reclamar su lugar como rey de la Sabana africana.',
        ]);

        Pelicula::create([
            'titulo' => 'Toy Story', 
            'imagen' => 'toy_story.jpg', 
            'genero' => 'Animación', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Un grupo de juguetes cobran vida cuando no hay humanos cerca, y un nuevo juguete, Buzz Lightyear, llega a la habitación.',
        ]);

        Pelicula::create([
            'titulo' => 'Harry Potter y la piedra filosofal', 
            'imagen' => 'harry_potter.jpg', 
            'genero' => 'Fantasía', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Harry Potter descubre que es un mago y comienza su educación en la escuela Hogwarts.',
        ]);

        Pelicula::create([
            'titulo' => 'Los Vengadores', 
            'imagen' => 'avengers.jpg', 
            'genero' => 'Acción', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Un grupo de superhéroes se une para salvar el mundo de una amenaza alienígena.',
        ]);

        Pelicula::create([
            'titulo' => 'Spider-Man', 
            'imagen' => 'spiderman.jpg', 
            'genero' => 'Acción', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Peter Parker se convierte en Spider-Man para luchar contra el crimen después de ser mordido por una araña radiactiva.',
        ]);

        Pelicula::create([
            'titulo' => 'Titanic', 
            'imagen' => 'titanic.jpg', 
            'genero' => 'Drama', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Una historia de amor entre Jack y Rose a bordo del trágico viaje del RMS Titanic.',
        ]);

        Pelicula::create([
            'titulo' => 'Jurassic Park', 
            'imagen' => 'jurassic_park.jpg', 
            'genero' => 'Ciencia Ficción', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Un parque de dinosaurios en una isla se convierte en un desastre cuando los animales escapan de sus jaulas.',
        ]);

        Pelicula::create([
            'titulo' => 'El Señor de los Anillos: La Comunidad del Anillo', 
            'imagen' => 'lotr.jpg', 
            'genero' => 'Fantasía', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Frodo Bolsón y sus compañeros emprenden un peligroso viaje para destruir el Anillo Único.',
        ]);

        Pelicula::create([
            'titulo' => 'Frozen', 
            'imagen' => 'frozen.jpg', 
            'genero' => 'Animación', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Una princesa llamada Elsa lucha por controlar sus poderes mágicos, mientras su hermana Anna busca ayudarla.',
        ]);

        Pelicula::create([
            'titulo' => 'Coco', 
            'imagen' => 'coco.jpg', 
            'genero' => 'Animación', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Un joven llamado Miguel viaja al mundo de los muertos para descubrir la historia de su familia.',
        ]);

        Pelicula::create([
            'titulo' => 'Star Wars: Una Nueva Esperanza', 
            'imagen' => 'star_wars.jpg', 
            'genero' => 'Ciencia Ficción', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Luke Skywalker se une a un grupo de héroes para luchar contra el Imperio Galáctico.',
        ]);

        Pelicula::create([
            'titulo' => 'Deadpool', 
            'imagen' => 'deadpool.jpg', 
            'genero' => 'Acción', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Un ex-soldado se convierte en el antihéroe Deadpool después de someterse a un experimento que le da poderes de curación.',
        ]);

        Pelicula::create([
            'titulo' => 'Batman: El Caballero de la Noche', 
            'imagen' => 'batman.jpg', 
            'genero' => 'Acción', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Batman enfrenta a un nuevo villano, el Joker, quien quiere sumergir a Gotham City en el caos.',
        ]);

        Pelicula::create([
            'titulo' => 'Interestelar', 
            'imagen' => 'interestelar.jpg', 
            'genero' => 'Ciencia Ficción', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Un grupo de astronautas viaja a través de un agujero de gusano en busca de un nuevo hogar para la humanidad.',
        ]);

        Pelicula::create([
            'titulo' => 'Buscando a Nemo', 
            'imagen' => 'nemo.jpg', 
            'genero' => 'Animación', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Un pez payaso llamado Marlin viaja por el océano para encontrar a su hijo Nemo, quien ha sido capturado por un buzo.',
        ]);

        Pelicula::create([
            'titulo' => 'Los Increíbles', 
            'imagen' => 'increibles.jpg', 
            'genero' => 'Animación', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Una familia de superhéroes lucha por mantener sus poderes en secreto, mientras se enfrentan a un villano que amenaza al mundo.',
        ]);

        Pelicula::create([
            'titulo' => 'Shrek', 
            'imagen' => 'shrek.jpg', 
            'genero' => 'Animación', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Un ogro llamado Shrek se embarca en una aventura para rescatar a una princesa, mientras enfrenta desafíos y descubre su verdadera identidad.',
        ]);

        Pelicula::create([
            'titulo' => 'Los Juegos del Hambre', 
            'imagen' => 'juegos_hambre.jpg', 
            'genero' => 'Aventura', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'En un futuro distópico, Katniss Everdeen debe luchar por su vida en un evento llamado Los Juegos del Hambre.',
        ]);

        Pelicula::create([
            'titulo' => 'El Gran Gatsby', 
            'imagen' => 'gatsby.jpg', 
            'genero' => 'Drama', 
            'precio_alquiler' => 3.99, 
            'descripcion' => 'Un hombre llamado Nick Carraway se ve atraído por el misterioso Jay Gatsby, quien organiza grandes fiestas en su mansión.',
        ]);
    }
}
