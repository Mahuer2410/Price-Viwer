<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="{{ route('Productos.main') }}" class="px-4 py-2 bg-gray-800 dark:bg-gray-200 text-white dark:text-gray-800 rounded-md hover:bg-gray-700 dark:hover:bg-gray-300 transition ease-in-out duration-150">
                <i class="fas fa-home"></i> Volver al Inicio
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
        
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
            <!-- Cuerpo de la tabla con loop de productos -->
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <!-- Celda de imagen del producto -->
                    <td scope="row" class="text-center"><img src="/img/productos/{{$producto->image}}" alt="" style="max-width: 50px; min-width:auto"></td>
                    <td class="align-middle">{{$producto->name}}</td>
                    <td class="align-middle">{{$producto->price}}</td>
                    <td class="align-middle">{{$producto->direction}}</td>
                    <!-- Celda de botones de acción -->
                    <td>
                        <div class="btn-group">
                            <!-- Botón para ver detalles -->
                            <a href="{{ route('Productos.show',$producto->id) }}" class="btn btn-primary btn-sm">+</a>
                            <!-- Botón para editar -->
                            <a href="{{ route('Productos.edit',$producto->id) }}" class="btn btn-warning  btn-sm" ><i class="bi bi-pencil "></i>Editar</a>
                            <!-- Formulario para eliminar producto -->
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

        <!-- Segunda tabla de productos (duplicada) -->
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
    </div>
</x-app-layout>
