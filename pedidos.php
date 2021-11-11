<?php 
date_default_timezone_set('Europe/Madrid');
$mensajeFecha = '';

if(isset($_COOKIE['pedidosRealizados'])){
        $pedidosRealizados = $_COOKIE['pedidosRealizados'];
    }else{
        $pedidosRealizados = 0;
    }

// Solo se crea pedido al presionar el botón del carrito...
if(isset($_REQUEST["crearPedido"])) 
{
    // Cookies
    if(!isset($_COOKIE['pedidosRealizados'])){
        setcookie('pedidosRealizados', 1, time()+3600);
        $pedidosRealizados = 1;
        crearFecha();
        $mensajeFecha = 'Este es el primer pedido.';
    }else{
        $pedidosRealizados = $_COOKIE['pedidosRealizados'] + 1;
        setcookie('pedidosRealizados', $pedidosRealizados, time()+3600);
        crearFecha();
    }
}

function crearFecha(){
    $fecha = date("d/m/y H:i:s");  
	setCookie("fecha",$fecha, time()+3600);
}
function borrarFecha(){
    $fecha = date("d/m/y H:i:s");  
	setCookie("fecha",$fecha, time()-60);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Historial de pedidos</title>
</head>
<body class="bg-light">
    <h1 class="text-center mb-3 pt-5">Nº DE PEDIDOS REALIZADOS:  
        <?php echo $pedidosRealizados;?></h1>
    <h2 class="text-center"><?php if(isset($_COOKIE["fecha"])) {  
	  echo "Fecha del último pedido: ".$_COOKIE["fecha"]; 
	}  
	else {  
	  echo $mensajeFecha;  
	} 
    ?></h2>
    <br>
    <!-- Botónes -->
        <div class="container-fluid d-flex justify-content-center">
            <!-- <a href="inicio.php" class="p-3 d-block"><button type="button" class="btn btn-outline-dark">Seguir Comprando</button></a> -->
            <a href="pedidos.php?borrar=si
            " class="p-3 d-block"><button type="button" class="btn btn-outline-danger">Borrar historial</button></a>
        </div>
        <div class="container-fluid d-flex justify-content-center">
            <a href="inicio.php
            " class="p-3 d-block"><button type="button" class="btn btn-dark">Ir a Inicio</button></a>
        </div>
    
    <!-- Borramos el historial al hacer click en el botón 'Borrar historial': -->
    <?php 
    if(isset($_GET["borrar"])){
        borrarFecha();
        setcookie('pedidosRealizados', $pedidosRealizados, time()-60);
        $pedidosRealizados = 0;
        header("location:pedidos.php");
    };
    ?>

</body>
</html>