<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Productos</title>
</head>
<body>
    <form action="{{ route('Productos.store') }}" method="POST">
        @csrf
        <div>
            <label for="">Nombre</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">Precio</label>
            <input type="number" step="0.01" name="price">
        </div>
        <!--Enviar datos-->
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>