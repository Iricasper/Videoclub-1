<?php

use App\Http\Controllers\AlquilerController;
use App\Http\Controllers\OpinionVideoclubController;
use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OpinionController;


// Ruta de la página de inicio
Route::get('/', function () {
    return view('home'); // Muestra la vista 'home.blade.php'
});

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'mostrarLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registro', [RegistroController::class, 'mostrarRegistro'])->name('registro');
Route::post('/registro', [RegistroController::class, 'registrar']);
Route::post('/devolver/{id}', [AlquilerController::class, 'devolver'])->name('devolver');  // Devolver alquiler


// Rutas protegidas (requieren autenticación)
Route::middleware('auth')->group(function () {
    // Ruta del home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rutas de Películas
    Route::get('/peliculas', [PeliculaController::class, 'index'])->name('peliculas.index');
    Route::get('/peliculas/{id}', [PeliculaController::class, 'show'])->name('peliculas.show');

    // Rutas de Alquileres
    Route::get('/alquileres', [AlquilerController::class, 'index'])->name('alquileres.index');  // Mostrar alquileres
    Route::post('/alquilar/{id}', [AlquilerController::class, 'store'])->name('alquileres.store');  // Crear alquiler
    
    // Rutas de Usuarios (solo admin, por ejemplo)
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

    // Ruta para el menú principal
    Route::get('/menu', [MenuController::class, 'mostrarMenu'])->name('menu');

    // Ruta para las opiniones
    Route::post('/opiniones/create', [OpinionController::class, 'create'])->name('opiniones.create');
    Route::post('/opiniones/store', [OpinionController::class, 'store'])->name('opiniones.store');
    // Ruta para obtener la opinión de un usuario para una película específica
    Route::get('/opiniones/editar/{idPelicula}', [OpinionController::class, 'edit']);
    Route::get('/opiniones/details/{id}', [OpinionController::class, 'details'])->name('opiniones.details');
    
    Route::post('/opiniones-videoclub/create', [OpinionVideoclubController::class, 'create'])->name('opiniones-videoclub.create');
    Route::post('/opiniones-videoclub/store', [OpinionVideoclubController::class, 'store'])->name('opiniones-videoclub.store');
    Route::get('/opiniones-videoclub/editar/{idCliente}', [OpinionVideoclubController::class, 'edit']);


});

// Si el usuario intenta acceder a una página sin permiso, redirigir al login
Route::fallback(function () {
    return redirect()->route('login');
});