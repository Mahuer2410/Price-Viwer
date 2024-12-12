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
<!--Crear producto-->
<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div>
                    <form name="productForm" action="{{ route('Productos.store') }}" enctype="multipart/form-data" method="POST" onsubmit="return validateForm()">
                        @csrf
                        <div class="container-fluid border-gray rounded">
                            <div class="row mt2">
                                <!--Entrada de imagen-->
                                <div class="col-4">
                                    <div class="mt-2">
                                        <!-- Contenedor para la previsualización -->
                                        <div>
                                            <img id="imagePreview" src="/img/Default.png" alt="Previsualización" class="img-fluid border rounded image-preview">
                                        </div>
                                        <!---cargar imagen-->
                                        <label class="custom-file-label" for="image">imagen</label>
                                        <input type="file" class="custom-file-input" id="image" name="image" onchange="previewImage(event)">
                                    </div>
                                </div>
                                <!--Entrada de textos-->
                                <div class="col-8">
                                    <!--Nombre/precio-->
                                    <div class="row mt-5">
                                        <div class="col-md-6">
                                            <input type="text" name="name" placeholder="Nombre" class="form-control input-custom">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" step="0.01" name="price" placeholder="Precio" class="form-control input-custom">
                                        </div>
                                    </div>
                                    <!--Direccion-->
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <input type="text" name="direction" placeholder="Direccion" class="form-control input-custom">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Boton de envio-->
                        <div class="mt-3 text-end">
                            <input type="submit" value="Registrar" class="btn-custom">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<!--Crear producto-->