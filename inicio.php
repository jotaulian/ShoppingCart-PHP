<?php 
session_start();
    if(!isset($_SESSION['carrito'])){
        $_SESSION['carrito'] = [];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Inicio</title>
</head>
<body class="bg-light">
    <h1 class="text-center mt-3">Selecciona tus productos:</h1>
    <div class="container pt-5 ">
        <form class="row gx-4 align-items-center justify-content-center border border border-3 rounded border-dark p-4" action="carrito.php" method="post">

            <div class="col-12 col-md-4">
                <label class="" for="autoSizingSelect">Articulo</label>
                <select class="form-select" id="autoSizingSelect" name="articulo">
                <option value="Abrigo">Abrigo</option>
                <option value="Camisa">Camisa</option>
                <option value="Camiseta">Camiseta</option>
                <option value="Chaleco">Chaleco</option>
                <option value="Pantalon">Pantalon</option>
                <option value="Jersey">Jersey</option>
                <option value="Jean">Jean</option>
                <option value="Sudadera">Sudadera</option>
                <option value="Perfume">Perfume</option>
                <option value="Zapato">Zapato</option>
                </select>
            </div>

            <div class="col-12 col-md-4">
                <label class="" for="autoSizingInput">Cantidad</label>
                <input type="number" class="form-control" id="autoSizingInput" min="1" step="1" name="cantidad" required >
            </div>
            
            <div class="col-12 col-md-4 mt-3 d-flex justify-content-center">
                <button type="submit" class="btn w-100 btn-dark">Agregar al Carrito</button>
            </div>
        </form>
    </div>

<!-- Js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>