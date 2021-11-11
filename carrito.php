<?php 
    session_start();
    $mensaje = '';
    $total = 0;
    $listaPrecios = ["Abrigo" => 65, "Camisa" => 22, "Camiseta" => 12, "Chaleco" => 23, "Pantalon" => 25, "Jersey" => 32, "Jean" => 29, "Sudadera" => 30, "Perfume" => 17, "Zapato" => 35];
    
    if(isset($_SESSION['carrito'])){
        $carrito = $_SESSION['carrito'];
    }else{
        $mensaje = 'Su carrito esta vacío';
    }

    if(isset($_POST['articulo'])){
        $articulo = $_POST['articulo'];
        $precio = $listaPrecios[$articulo];
        $cantidad = (int) $_POST['cantidad'];

        // Antes de agregarlo, si el indice existe solo aumento la cantidad:
        if(array_key_exists($articulo, $carrito)){
            $cantidadInicial = $_SESSION['carrito'][$articulo]["cantidad"];
            $_SESSION['carrito'][$articulo]["cantidad"] = ($cantidadInicial + $cantidad);
        }else{
            $_SESSION['carrito'][$articulo]["cantidad"] = $cantidad;
            $_SESSION['carrito'][$articulo]["precio"] = $precio;
        }
        
        $carrito = $_SESSION['carrito'];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Carrito de Compra</title>
</head>
<body class="bg-light">
    <div class="container pt-5">
        <h1 class="text-center mb-5">CARRITO DE LA COMPRA</h1>
        <!-- Tabla -->
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Articulo</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>

                <!-- Recorremos la variable 'carrito' para imprimir sus valores en la tabla -->
                <?php 
                if(isset($carrito)){?>
                    <?php foreach ($carrito as $indice =>$detalle) { 
                        // Aumentamos el total:
                        $total += ($detalle["cantidad"] * $detalle["precio"]); 
                        ?>
                        <tr>
                            <?php echo "<th scope='row'>$indice</th>"; ?>
                            <?php foreach ($detalle as $key => $value) { ?>
                                    <td><?php  echo $value; ?></td>
                            <?php } ?>
                        </tr>
                        <?php } ?> 
                <?php } ?>
                
            </tbody>
        </table>

        <!-- Total -->
        <div class="container py-3 text-center">
            <h3><?php echo $mensaje ?></h3>
            <h3>TOTAL: <?php echo $total ?> EUR</h3>
        </div>

        <!-- Botónes -->
        <div class="container-fluid d-flex justify-content-around">
            <a href="inicio.php" class="p-3 d-block"><button type="button" class="btn btn-outline-dark">Seguir Comprando</button></a>
            <a href="carrito.php?procesar=si
            " class="p-3 d-block"><button type="button" class="btn btn-outline-dark">Procesar pedido</button></a>
        </div>
    </div>

    <?php 
    // Borramos el carrito al hacer click en el botón 'Procesar pedido':
    if(isset($_GET["procesar"])){
        unset($_SESSION['carrito']);
        header("location:pedidos.php?crearPedido=si");
    };
    ?>

<!-- Js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>