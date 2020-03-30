<?php 
    include_once('conexion/conexion.php')
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEFILOS - CONTACTO</title>
    <?php include('components/icono-header/icono-header.php')?>
    <link rel="stylesheet" href="components/menu-cinefilos/menu1.css">
    <link rel="stylesheet" href="components/footer/footer1.css">
    <link rel="stylesheet" href="contacto.css">
    <?php include('libs/links/links.php');?>
</head>
<body>
    <?php include('components/menu-cinefilos/menu1.php')?>
    <div style="display: flex; height: 80vh;">
        <div style="width: 50%;"></div>
        <div style="width: 50%;">
            <h1 class="white">Ubicanos</h1><br>
            <p class="white1">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
               nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
               erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci 
            </p><br>
            <h1 class="white2">Contacto</h1><br>
            <div style="display: flex;">
               <div><i class="fa fa-address-card mr-5"> cinefila_ve@gmail.com </i></div>
               <div><i class="fab fa-whatsapp" style="color: white;font-size: 20px;"> 0261-6273348 </i></div> 
            </div>
            <div style="display: flex;">
                <div class="imgs">
                <img style="margin-top: 60px; " src="img/iconos/instagram.png" class="img-fluid" alt=""></div>
                <div class="imgs">
                    <img style="margin-top: 60px;" src="img/iconos/twitter.png" class="img-fluid" alt="">
                </div>
                <div class="imgs">
                    <img style="margin-top: 60px;" src="img/iconos/facebook.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="components/menu-cinefilos/menu.js"></script>
    <?php include('libs/scripts/scripts.php');?>
</html>