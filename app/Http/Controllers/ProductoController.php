<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    public function index()
    {
        $productos = producto::all();
        $data = [
            'productos' => $productos,
            'nombreVista' => 'Productos '
        ];
        return view('productos.index', $data);
    }

    public function create()
    {
        $data = [
            'nombreVista' => 'Productos - Create'
        ];
        return view('Productos.create', $data);
    }

    public function store(Request $request)
    {
        $producto = new producto();

        //cargar imagen
        if($request->hasFile("image"))
        {
            $image=$request->file("image");
            $imagename=Str::slug($request->name).".".$image->guessExtension();
            $ruta=public_path("img/productos/");
            $image->move($ruta,$imagename);
            $producto->image=$imagename;
        }
        //cargar imagen
        $producto->name = $request->name;
        $producto->price = $request->price;
        $producto->direction = $request->direction;
        $producto->save();
        return redirect()->route('Productos.index');
    }

    public function show(string $id)
    {
        $producto = producto::find($id);
        $data = [
            'producto' => $producto,
            'nombreVista' => 'Productos - Show'
        ];
        return view('productos.show', $data);
    }

    public function edit(string $id)
    {
        $producto = producto::find($id);
        $data = [
            'producto' => $producto,
            'nombreVista' => 'Productos - Edit'
        ];
        return view('Productos.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $producto = producto::find($id);
        //cargar imagen
        if($request->hasFile("image"))
        {
            $image=$request->file("image");
            $imagename=Str::slug($request->name).".".$image->guessExtension();
            $ruta=public_path("img/productos/");
            $image->move($ruta,$imagename);
            $producto->image=$imagename;
        }
        //cargar imagen
        $producto->name = $request->name;
        $producto->price = $request->price;
        $producto->direction = $request->direction;
        $producto->save();
        return redirect()->route('Productos.index');
    }

    public function destroy(string $id)
    {
        $producto = producto::find($id);
        $producto->delete();
        return redirect()->route('Productos.index');
    }
}
