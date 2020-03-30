<?php 
    include_once('conexion/conexion.php');
    session_start();
    $correo1 = $_SESSION['correo'];
    $quser1 = "SELECT * FROM usuario WHERE correo = '$correo1'";
    $ruser1 =  mysqli_query($con,$quser1) or die(mysqli_error($con));
    $rs1 = mysqli_fetch_array($ruser1);

    $qauser = "SELECT monto_total FROM recibo where ID_usuario = '{$rs1["ID"]}' and status = 'nopagado'";
    $rauser = mysqli_query($con,$qauser) or die(mysqli_error($con));
    $rsauser = mysqli_fetch_array($rauser);

    $uasiento = "UPDATE asientos SET status = 'pagados' WHERE ID_usuario = '{$rs1["ID"]}'";
    $ruasiento = mysqli_query($con,$uasiento) or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEFILOS - COMPROBANTE</title>
    <?php include('components/icono-header/icono-header.php')?>
    <link rel="stylesheet" href="components/menu-cinefilos/menu2.css">
    <link rel="stylesheet" href="success.css">
    <link rel="stylesheet" href="components/footer/footer1.css">
    <?php include('libs/links/links.php');?>
</head>
<body class="flex">
    <div class="contenedor">
        <div class="dblock"><center><img class="logo" src="img/fotos/Recurso 3.png" alt=""></div></center>
        <div><h1 class="text-center mt-3">El pago a sido exitoso</h1></div>
        <div><h1 class="text-center mt-3">Su numero de localizador es:</h1></div>
        <div><center><div class="referencia"><?php echo $_SESSION['referencia'];?></div></center></div>
        <div><center><div class="ad">Antes de retirar o entrar a la sala muestre el codigo</div></center></div>
        <div class="mt-5"><center><a href="inicio.php" class="btnback">Volver al inicio</a></center></div>
    </div>
</body>
    <?php include('libs/scripts/scripts.php');?>
</html>