<x-app-layout>
    
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm " style=" border:6px solid red; border-radius: 32px">
                <div class="p-6 text-black dark:text-blck">
                    <div class="w-full">
                        <table class="w-full">
                            <thead>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
