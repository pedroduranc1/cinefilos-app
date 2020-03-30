<?php include_once('conexion/conexion.php');?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEFILOS - MODIFICAR SALA</title>
    <?php include('components/icono-header/icono-header.php')?>
    <link rel="stylesheet" href="components/menu-cinefilos/menu2.css">
    <link rel="stylesheet" href="components/footer/footer1.css">
    <link rel="stylesheet" href="msala.css">
    <?php include('libs/links/links.php');?>
</head>
<body>
    <?php include('components/menu-cinefilos/menu2.php');?>
    <div class="flex">
        <form method="POST" enctype="multipart/form-data" class="boxpeli">
            <h3 class="text-center pt-4">Opciones de Sala</h3>
            <h5 class="text-center pt-2">Sala a modificar</h5>
            <div class="inputflex py-2"><input type="number" placeholder="Sala" value="<?php $_SESSION['sala']?>" name="idSala" class="input"></div>
            <h5 class="text-center pt-2">Modificar Columnas / Filas</h5>
            <div class="inputflex py-2">
                <input type="number" name="columnas" placeholder="Columnas" class="input mx-4">
                <input type="number" name="filas" placeholder="Filas" class="input mx-4">
            </div>

            <div class="btnflex py-4"><button class="boton" name="btnmodificar">Modificar Sala</button></div>

            
            <?php 
            if(isset($_POST['btnmodificar'])){
                if(!empty($_POST['idSala']) && !empty($_POST['columnas']) && !empty($_POST['filas'])){
                    $sala  = $_POST['idSala'];
                    $columnas = $_POST['columnas'];
                    $filas = $_POST['filas'];
                    
                    $cont = 0;
                    $csala = "SELECT * FROM sala WHERE ID_sala = '$sala'";
                    $rsala = mysqli_query($con,$csala) or die(mysqli_error($con));
                    $rsSala = mysqli_num_rows($rsala);
                    if($rsSala > 0){
                        if($columnas <= 10 && $columnas >= 1){
                            if($filas <= 8 && $filas >= 1){

                        
                                    $isala1 = "UPDATE sala SET asientos = '$columnas', filas = '$filas', funciones = '3:00pm' WHERE ID_sala = '$sala'";
                                    $rsala1 = mysqli_query($con,$isala1) or die(mysqli_error($con));

                                    $isala2 = "UPDATE sala SET asientos = '$columnas', filas = '$filas', funciones = '3:00pm' WHERE ID_sala = '$sala'";
                                    $rsala2 = mysqli_query($con,$isala2) or die(mysqli_error($con));

                                    $isala3 = "UPDATE sala SET asientos = '$columnas', filas = '$filas', funciones = '3:00pm' WHERE ID_sala = '$sala'";
                                    $rsala3 = mysqli_query($con,$isala3) or die(mysqli_error($con));

                                    $isala4 = "UPDATE sala SET asientos = '$columnas', filas = '$filas', funciones = '3:00pm' WHERE ID_sala = '$sala'";
                                    $rsala4 = mysqli_query($con,$isala4) or die(mysqli_error($con));

                                    echo'<script>window.location="inicio.php";</script>';
                                
                            }else{ ?>
                                <div class="error py-4 mb-3"><h5 class="text-center">Error. excediste el numero de filas</h5></div> 
                           <?php }
                        }else{ ?>
                            <div class="error py-4 mb-3"><h5 class="text-center">Error. excediste el numero de columnas</h5></div> 
                       <?php  }
                    }else{ ?>
                        <div class="error py-4 mb-3"><h5 class="text-center">Error. la sala no existe</h5></div> 
                    <?php }
                }else{ ?>
                    <div class="error py-4 mb-3"><h5 class="text-center">Error. Rellene todos los campos</h5></div> 
                <?php }
            }
            ?>
        </form>
    </div>
    
</body>
    <?php include('libs/scripts/scripts.php');?>
</html>