<?php include_once('conexion/conexion.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEFILOS - LOGIN</title>
    <?php include('components/icono-header/icono-header.php')?>
    <link rel="stylesheet" href="components/menu-cinefilos/menu1.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="components/footer/footer1.css">
    <?php include('libs/links/links.php');?>
</head>
<body scroll="no" style="overflow: hidden">
    <?php include('components/menu-cinefilos/menu1.php');?>
    
    <div class="imgcartelera">
        <img src="img/fotos/loginbg.jpg" style="width: 100%; margin-top: -17.1%;">
        <form method="POST" class="caja-login">
            <div class="block">
                <img class="imgs" src="img/fotos/Recurso 3.png" alt="">
            </div>
            <div class="block">
                <h3>Inicio de Sesión</h3>
            </div>
            <div class="block"> 
                <input type="text" name="correo" class="input" placeholder="Correo electronico">
            </div>
            <div class="block"> 
                <input type="password" name="password" class="input" placeholder="Contraseña">
            </div>
            <div class="block"> 
                <center><button name="btnreg" class="btn btnreg">No tiene cuenta?, Registrate</button></center>
                <?php 
                    if(isset($_POST['btnreg'])){
                        header('location: registro.php');
                    }
                ?>
            </div>
            <div class="block"> 
                <center><button name="btnini"  class="btn btnini">Inicio Sesión</button></center>
            </div>
            <?php 
                if(isset($_POST['btnini'])){
                    if(empty($_POST['correo']) && empty($_POST['password'])){ ?>
                        <div class="error"><h5 class="text-center c">Rellena todos los campos.</h5></div>
                   <?php }else{
                       $correo = $_POST['correo'];
                       $password = $_POST['password'];
                       $quser = "SELECT * FROM usuario WHERE correo = '$correo' AND password = '$password'";
                       $ruser =  mysqli_query($con,$quser) or die(mysqli_error($con));
                       $rs = mysqli_num_rows($ruser);

                       if($rs > 0){
                            session_start();
                            $_SESSION['correo'] = $_POST['correo'];
                            header('location: inicio.php');
                       }else{ ?>
                        <div class="error"><h5 class="text-center c">Usuario o Password Incorrectos.</h5></div>
                       <?php }
                    }
                }
            ?>
        </form>
    </div>
</body>
    <?php include('libs/scripts/scripts.php')?>
    <script src="components/menu-cinefilos/menu.js"></script>
</html>

