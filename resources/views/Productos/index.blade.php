@extends('Template.Plantilla')

@section('contenedor')
<!--Crear producto-->
@include('Productos.create')
<!--Crear producto-->

<!--Tabla de productos-->
<div class="mt-5">
    <table class="table">
        <thead class="table-hover table-active">
            <tr>
                <th style="text-align: center;">Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Direccion</th>
                <th style="text-align: center;">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td scope="row" class="text-center"><img src="/img/productos/{{$producto->image}}" alt="" style="max-width: 50px; min-width:auto"></td>
                <td class="align-middle">{{$producto->name}}</td>
                <td class="align-middle">{{$producto->price}}</td>
                <td class="align-middle">{{$producto->direction}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('Productos.show',$producto->id) }}" class="btn btn-primary btn-sm">+</a>
                        <a href="{{ route('Productos.edit',$producto->id) }}" class="btn btn-warning  btn-sm" ><i class="bi bi-pencil "></i>Editar</a>
                        <form action="{{ route('Productos.destroy',$producto->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </td>

            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5"></td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection