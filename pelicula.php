<?php 
    include_once('conexion/conexion.php');
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEFILOS - PELICULAS</title>
    <?php include('components/icono-header/icono-header.php')?>
    <link rel="stylesheet" href="components/menu-cinefilos/menu2.css">
    <link rel="stylesheet" href="pelicula.css">
    <link rel="stylesheet" href="components/footer/footer1.css">
    <?php include('libs/links/links.php');?>
</head>
<body scroll="no" style="overflow: hidden">
    <?php include('components/menu-cinefilos/menu2.php');
    $peli = $_SESSION['idPeli'];
    $qpeli = "SELECT * FROM pelicula where ID = '$peli'";
    $rpeli = mysqli_query($con,$qpeli) or die(mysqli_error($con));
    $rspeli = mysqli_fetch_array($rpeli);
    $_SESSION['ID_peli'] = $rspeli['ID'];
    $_SESSION['nombre_peli'] = $rspeli['nombre'];
    ?>
    <div class="boxs flex">
        <div style="z-index: 1000;" class="margenes">
            <img src="<?php echo$rspeli['img'];?>" class="img" alt="">
            <div class="margenes1">
                <h1 class="c"><?php echo$rspeli['nombre'];?></h1>
                <h5 class="c">Genero: <?php echo $rspeli['genero'];?></h5>
                <h5 class="c">Pais: <?php echo$rspeli['pais'];?></h5>
                <h5 class="c">Formato: <?php echo$rspeli['formato'];?></h5>
                <h5 class="c">Duracion: <?php echo$rspeli['duracion'];?></h5>
                <h5 class="c">Sala: <?php echo$rspeli['ID'];?></h5>
                <p class="c w-75"><?php echo$rspeli['sinopsis'];?></p>
                <a <?php if($rs1['correo'] != 'nouser@gmail.com'){echo 'href="asientos.php"';}else{echo 'href="login.php"';} ?> 
                class="boton">Comprar Entradas</a>
            </div>
        </div>
    </div>
    <div style="position: absolute;
                width: 100%;
                bottom: 0;">
    <?php include('components/footer/footer1.php')?>
    </div>
    
</body>
    <?php include('libs/scripts/scripts.php');?>
    <script src="components/menu-cinefilos/menu.js"></script>
</html>