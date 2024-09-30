<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = producto::all();
        $data = [
            'productos'=>$productos,
        ];
        return view('productos.index',$data);
    }
    public function create()
    {
        return 'aqui se crea un nuevo producto (crate)';
    }
    public function store(Request $request)
    {
        return 'store';
    }

    public function show(string $id)
    {
        return 'show';
    }

    public function edit(string $id)
    {
        return $id;
    }

    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        return $id;
    }
}
