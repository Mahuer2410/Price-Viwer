<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
</head>
<body>
    <a href="{{ route('Productos.create') }}">Crear</a>

<!--Tabla de productos-->
    <table border="1" style="width: 50%;">
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
                    <td style="width: 25%;">
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
</body>
</html>