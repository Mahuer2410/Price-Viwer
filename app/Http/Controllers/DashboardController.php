<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $data = [
            'productos' => $productos,
            'nombreVista' => 'Dashboard' // Aquí definimos el nombre de la vista
        ];
        
        return view('dashboard', $data);
    }
} 