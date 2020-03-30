<?php include_once('conexion/conexion.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEFILOS - REGISTRO</title>
    <?php include('components/icono-header/icono-header.php')?>
    <link rel="stylesheet" href="components/menu-cinefilos/menu1.css">
    <link rel="stylesheet" href="registro.css">
    <link rel="stylesheet" href="components/footer/footer1.css">
    <?php include('libs/links/links.php');?>
</head>
<body scroll="no" style="overflow: hidden">
    <?php include('components/menu-cinefilos/menu1.php');?>
    <div class="imgcartelera">
        <img src="img/fotos/loginbg.jpg" style="width: 100%; margin-top: -17.1%;">
        <form method="POST" class="caja-reg">
            <div class="block">
                <img class="imgs" src="img/fotos/Recurso 3.png" alt="">
            </div>
            <div class="block">
                <h3>Registro</h3>
            </div>
            <div class="block"> 
                <input type="text" name="nombre" class="input" placeholder="Nombre">
            </div>
            <div class="block"> 
                <input type="text" name="apellido" class="input" placeholder="apellido">
            </div>
            <div class="block"> 
                <input type="text" name="fecha" class="input" placeholder="dd/mm/aa">
            </div>
            <div class="block"> 
                <input type="text" name="correo" class="input" placeholder="Correo">
            </div>
            <div class="block"> 
                <input type="password" name="password" class="input" placeholder="Contraseña">
            </div>
            <div class="block"> 
                <center><button name="btnreg" class="btn btnreg">Registrate</button></center>
                <?php 
                    if(isset($_POST['btnreg'])){
                        if(empty($_POST['nombre']) && empty($_POST['apellido']) && empty($_POST['fecha']) && empty($_POST['correo']) && empty($_POST['password']))
                        { ?>
                            <div class="error"><h5 class="text-center c">Rellena todos los campos.</h5></div>
                        <?php }else{
                            if(!preg_match('/^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/',$_POST['correo']))
                            {   ?>
                                <div class="error"><h5 class="text-center c">Introduzca un correo valido.</h5></div>
                            <?php }else{
                                $regexFecha = '/^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/';
                                if(!preg_match($regexFecha, $_POST['fecha'])){ ?>
                                <div class="error"><h5 class="text-center c">Introduzca una fecha valida.</h5></div>
                            <?php }else{
                                $nombre = $_POST['nombre'];
                                $apellido = $_POST['apellido'];
                                $fecha = $_POST['fecha'];
                                $correo = $_POST['correo'];
                                $password = $_POST['password'];
                                $iuser = "INSERT INTO usuario (nombre,apellido,fecha_nacimiento,correo,password) values ('$nombre','$apellido','$fecha','$correo','$password')";
                                $riuser =  mysqli_query($con,$iuser) or die(mysqli_error($con));
                                header('location: login.php');
                            }
                        }
                            
                        }

                    }
                ?>
            </div>
        </form>
    </div>
    <?php include('libs/scripts/scripts.php')?>
    <script src="components/menu-cinefilos/menu.js"></script>
</body>
</html>