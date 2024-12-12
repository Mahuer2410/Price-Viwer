<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $nombreVista }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <div style="height: 40px; background-color: red;"></div>
    <div style="height: 60px; background-color: #D9D9D9;"></div>
<!--Buscador-->
    <div class="container mx-auto p-4" style="max-width: 800px;">
        <form action="{{route('Productos.buscador')}}" method="GET" class="d-flex justify-content-center align-items-center">
            <input type="text" name="busqueda" class="form-control input-custom me-2" style="width: 50%;">
            <button type="submit" class="btn btn-custom" style="background-color: red;">
                <i class="bi bi-search" style="color: white;"></i>
            </button>
        </form>
    </div>
<!--Buscador-->
    
    <div>
        @if($productos->isEmpty() && empty($busqueda))
            
        @elseif($productos->isEmpty())
            <p>No se encontraron productos.</p>
        @else
            <ul>
                @foreach($productos as $producto)
                    <div class="container my-4">
                        <li>
                            <img src="/img/productos/{{$producto->image}}" alt="" 
                            style="max-width: 100px; min-width:auto; border: 2px solid red; border-radius: 16px;">
                            <strong>{{ $producto->name }}</strong> - Precio: ${{ $producto->price }}
                            <!-- Puedes agregar más detalles del producto aquí -->
                        </li>
                    </div>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>