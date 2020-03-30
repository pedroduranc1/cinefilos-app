<?php 
    include_once('conexion/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEFILOS - OPCIONES DE SALA</title>
    <?php include('components/icono-header/icono-header.php')?>
    <link rel="stylesheet" href="components/menu-cinefilos/menu2.css">
    <link rel="stylesheet" href="components/footer/footer1.css">
    <link rel="stylesheet" href="osala.css">
    <?php include('libs/links/links.php');?>
</head>
<body>
    <?php include('components/menu-cinefilos/menu2.php');?>
    <div class="flex">
        <form method="POST" enctype="multipart/form-data" class="boxpeli">
            <h3 class="text-center pt-4">Opciones de Sala</h3>
            <h5 class="text-center pt-2">Sala a modificar</h5>
            <div class="inputflex py-2"><input type="number" name="idSala" class="input"></div>
            <h5 class="text-center pt-2">Pelicula a retirar</h5>
            <div class="inputflex py-2"><input type="text" name="nombreretirar" class="input2"></div>
            <h5 class="text-center pt-2">Pelicula a agregar</h5>
            <div class="inputflex py-2"><input type="text" name="nombreagregar" class="input2"></div>
            
            <div class="btnflex py-4"><button class="boton" name="btnmodificar">Modificar Sala</button></div>

            
            <?php 
            if(isset($_POST['btnmodificar'])){
              if(!empty($_POST['idSala']) && !empty($_POST['nombreretirar']) && !empty($_POST['nombreagregar'])){
                  $sala = $_POST['idSala'];
                  $nombreretirar = $_POST['nombreretirar'];
                  $nombreagregar = $_POST['nombreagregar'];

                  $qsala = "SELECT * FROM sala WHERE ID = '$sala'";
                  $rsala = mysqli_query($con,$qsala) or die(mysqli_error($con));
                  $rsSala = mysqli_num_rows($rsala);
                  if($rsSala > 0){
                    $qpelir = "SELECT * FROM pelicula WHERE nombre = '$nombreretirar'";
                    $rpelir = mysqli_query($con,$qpelir) or die(mysqli_error($con));
                    $rsPelir = mysqli_num_rows($rpelir);
                    if($rsPelir > 0){
                            $qpelia = "SELECT * FROM pelicula WHERE nombre = '$nombreagregar'";
                            $rpelia = mysqli_query($con,$qpelia) or die (mysqli_error($con));
                            $rspelia = mysqli_num_rows($rpelia);
                            if($rspelia > 0){
                                    $mpeli = "UPDATE pelicula SET sala = '$sala' WHERE nombre = '$nombreagregar';";
                                    $rmpeli = mysqli_query($con,$mpeli) or die (mysqli_error($con));

                                    $mpelir = "UPDATE pelicula SET sala = '9' WHERE nombre = '$nombreretirar';";
                                    $rmpelir = mysqli_query($con,$mpelir) or die (mysqli_error($con));

                                    echo'<script>window.location="inicio.php";</script>';
                            }else{ ?>
                                    <div class="error py-4 mb-3"><h5 class="text-center">Error. la pelicula a agregar no existe</h5></div> 
                           <?php }
                    }else{ ?>
                        <div class="error py-4 mb-3"><h5 class="text-center">Error. la sala con la pelicula ingresada no existe</h5></div> 
                   <?php }
                  }else{ ?>
                    <div class="error py-4 mb-3"><h5 class="text-center">Error. esta sala no existe</h5></div> 
                 <?php } 
              }else{ ?>
                 <div class="error py-4 mb-3"><h5 class="text-center">Error. Rellena todos los campos</h5></div> 
            <?php }      
            }
            ?>
        </form>
    </div>
    
</body>
    <?php include('libs/scripts/scripts.php');?>
</html>