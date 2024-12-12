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
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    
</body>
</html>