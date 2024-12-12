<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    public function mainProductos()
    {
        $data = [
            'nombreVista' => 'Main'
        ];
        return view('main', $data);
    }
    public function index()
    {
        $productos = producto::paginate(2);
        $data = [
            'productos' => $productos,
            'nombreVista' => 'Productos'
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

    public function buscador(Request $request)
    {
        $busqueda = $request->input('busqueda', '');
        $productos = collect();

        if (!empty($busqueda)) {
            $productos = producto::where('name', 'like', '%' . $busqueda . '%')
                ->orWhere('price', 'like', '%' . $busqueda . '%')
                ->orderBy('price', 'asc')
                ->paginate(2);
        }

        $data = [
            'productos' => $productos,
            'nombreVista' => 'Buscador',
            'busqueda' => $busqueda
        ];
        return view('Buscador', $data);
    }
}
