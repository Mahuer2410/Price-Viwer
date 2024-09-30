<table border="1">
    <thead>
        <th>Producto</th>
        <th>Precio</th>
        <th>Opciones</th>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{$producto->name}}</td>
                <td>{{$producto->price}}</td>
                <td>
                    <a href="{{ route('Productos.edit',$producto->id) }}">Editar</a>
                    <form action="{{ route('Productos.destroy',$producto->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="eliminar">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>