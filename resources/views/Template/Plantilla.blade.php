<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $nombreVista }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <!--Scripts-->
    <script>
        function validateForm() {
            var fields = document.forms["productForm"];
            var fieldNames = ["name", "price", "direction"];
            //arreglo de los posibles mensajes en caso de que algun campo este vacio, pero no todos a la vez.
            var messages = {
                "name": "El campo Nombre debe ser rellenado",
                "price": "El campo Precio debe ser rellenado",
                "direction": "El campo Dirección debe ser rellenado"
            };
            var allEmpty = true;
            for (var i = 0; i < fieldNames.length; i++) {
                if (fields[fieldNames[i]].value !== "") {
                    allEmpty = false; // Si encuentra al menos un campo no vacío, rompe el ciclo.
                    break;
                }
            }
            // Condición en caso de que todos los campos estén vacíos.
            if (allEmpty) {
                alert("Todos los campos deben ser llenados"); // Mensaje en caso de que todos los campos se encuentren vacíos.
                return false;
            }
            // Ciclo en caso de que al menos un campo no esté vacío (muestra el primer campo vacío encontrado).
            for (var i = 0; i < fieldNames.length; i++) {
                var fieldName = fieldNames[i]; // Se almacena el campo específico a comprobar en una variable para saber cuál campo se debe llenar.
                if (fields[fieldName].value == "") {
                    alert(messages[fieldName]);
                    return false;
                }
            }
        }
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <!--Estilos-->
    <style>
        .border-gray {
            border: 2px solid #D9D9D9;
        }
        .btn-custom {
            border: 2px solid #FF0000; /* Ajusta el grosor del borde */
            color: black; /* Color del texto */
            font-weight: bold; /* Texto en negrita */
            background-color: transparent; /* Fondo transparente */
            border-radius: 32px;
            padding: 0.5rem 2rem; /* Usa unidades relativas */
        }
        .custom-file-input {
            display: none;
        }
        .custom-file-label {
            display: inline-block; /* Mostrar el label como elemento en línea */
            margin-bottom: 0.5rem; /* Margen inferior para separación */
            padding: 0.375rem 0.75rem; /* Relleno interno del label */
            cursor: pointer; /* Cambia el cursor a pointer para indicar que es clickeable */
            border: 1px solid #ced4da; /* Borde gris claro */
            border-radius: 0.25rem; /* Bordes redondeados */
            background-color: #ffffff; /* Fondo blanco */
            color: #495057; /* Color del texto gris oscuro */
            text-align: center;
            width: 100%;
        }
        .header {
            padding-bottom: 2%;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            position: sticky;
            top: 0;
            z-index: 1030; /* Asegura que el header permanezca encima del contenido al desplazarse */
        }
        .input-custom {
            border: 2px solid #FF0000;
            border-radius: 32px;
        }
        .image-preview {
            width: 160px; /* Ancho estándar */
            height: 150px; /* Alto estándar */
            object-fit: cover; /* Asegura que la imagen se ajuste sin deformarse */
        }
        .sidebar {
            height: 100vh;
            background-color: #E90000;
            color: white;
            padding: 0.5rem;
            position: sticky;
            top: 0;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            word-wrap: break-word; /* Permite que el texto se ajuste */
        }
        .sidebar a:hover {
            background-color: #E80000;
        }
        .sidebar ul, .sidebar li {
            display: block;
            max-width: 100%; /* Asegura que el contenedor y los elementos <li> no se desborden */
            word-wrap: break-word; /* Permite que el texto se ajuste */
        }
        /* Media queries para ajustar el estilo en diferentes tamaños de pantalla */
        @media (max-width: 768px) {
            .btn-custom {
                padding: 0.5rem 1rem; /* Reduce el padding en pantallas más pequeñas */
            }
            .sidebar a {
                padding: 5px; /* Reduce el padding en pantallas más pequeñas */
                font-size: 7px; /* Ajusta el tamaño del texto */
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!--Navbar-->
            <nav class="col-md-1 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <div class="nav flex-column">
                        <img src="/img/Icon.png" alt="Icon" class="img-fluid">
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Negocios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Productos.index') }}">
                                Productos
                            </a>
                        </li>
                        <li class="nav-item fs-6">
                            <a class="nav-link" href="#">
                                Banners
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--Header-->
            <div class="col-md-11">
                <div class="header row">
                    <h2 class="mt-2">{{ $nombreVista }}</h2>
                </div>
                <main role="main" class="ml-sm-auto px-4">
                    <!--Contenido de las vistas-->
                    <div class="container">
                        @yield('contenedor')
                    </div>
                </main>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
