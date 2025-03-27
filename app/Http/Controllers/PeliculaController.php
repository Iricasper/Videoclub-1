<?php

namespace App\Http\Controllers;

class PeliculaController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('peliculas');
    }
}