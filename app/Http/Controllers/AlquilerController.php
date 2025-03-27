<?php

namespace App\Http\Controllers;

class AlquilerController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('alquileres');
    }
}