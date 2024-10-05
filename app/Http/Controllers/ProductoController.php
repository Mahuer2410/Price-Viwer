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
        return view('Productos.create');
    }
    public function store(Request $request)
    {
        $producto =  new producto();

        $producto->name=$request->name;
        $producto->price=$request->price;
        $producto->save();
        return redirect()->route('Productos.index');
    }

    public function show(string $id)
    {
        return 'show';
    }

    public function edit(string $id)
    {
        $producto = producto::find($id);
        $data = [
            'producto'=>$producto,
        ];
        return view('Productos.edit',$data);
    }

    public function update(Request $request, string $id)
    {
        $producto = producto::find($id);
        $producto->name=$request->name;
        $producto->price=$request->price;
        $producto->save();
        return redirect()->route('Productos.index');
    }
    public function destroy(string $id)
    {
        return 'se elimino: '. $id;
    }
}
