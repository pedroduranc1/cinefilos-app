<?php include_once('conexion/conexion.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEFILOS - ADMINISTRADOR</title>
    <?php include('components/icono-header/icono-header.php')?>
    <link rel="stylesheet" href="components/menu-cinefilos/menu2.css">
    <link rel="stylesheet" href="components/footer/footer1.css">
    <link rel="stylesheet" href="mpelicula.css">
    <?php include('libs/links/links.php');?>
</head>
<body>
    <?php include('components/menu-cinefilos/menu2.php')?>

    <div class="flex">
        <form method="POST" enctype="multipart/form-data" class="boxpeli">
            <h3 class="text-center pt-4">Agregar Pelicula</h3>
            <input type="text" name="nombre" class="input" placeholder="Nombre Pelicula">
            <input type="file" name="image" id="image" class="input" placeholder="Img Pelicula" multiple>
            <input type="text" name="genero" class="input" placeholder="Genero">
            <input type="text" name="pais" class="input" placeholder="Pais">
            <input type="text" name="formato" class="input" placeholder="Formato">
            <input type="text" name="duracion" class="input" placeholder="Duracion">
            <input type="text" name="mes" class="input" placeholder="Mes">
            <input type="number" name="dia" class="input" placeholder="Dia">
            <textarea placeholder="Sinopsis" name="textarea" class="textarea" cols="30" rows="10"></textarea>
            <button class="boton" name="btnagregar">Agregar Pelicula</button>
            <?php 
            if(isset($_POST['btnagregar'])){
                    
                if(!empty($_POST['nombre']) && !empty($_POST['genero']) && !empty($_POST['pais']) && !empty($_POST['formato'])&& !empty($_POST['duracion'])&& !empty($_POST['mes'])&& !empty($_POST['dia']))
                {
                
                    $nombre = $_POST['nombre'];
                    $genero = $_POST['genero'];
                    $pais = $_POST['pais'];
                    $formato = $_POST['formato'];
                    $duracion = $_POST['duracion'];
                    $formato = $_POST['formato'];
                    $mes = $_POST['mes'];
                    $dia = $_POST['dia'];
                    $sinopsis = $_POST['textarea'];
                    $dir_subida = 'img/fotos/';
                    $imagenruta = $dir_subida . basename($_FILES['image']['name']);
                    $imagennombre = $_FILES['image']['name'];
                    $imagenvalida = false;
                    if(move_uploaded_file($_FILES['image']['tmp_name'], $imagenruta)){
                        $imagenvalida = true; 
                    }
                    $dirb = "img/fotos/";
                    $dirmes = $mes.'/';

                    $img = $dirb.$dirmes.$imagennombre;
                    if($imagenvalida == true){

                        $qpelis = "INSERT INTO pelicula (nombre,img,genero,pais,formato,duracion,sinopsis,mes,dia) values
                        ('$nombre','$img','$genero','$pais','$formato','$duracion','$sinopsis','$mes','$dia')";
                        $rsqreg = mysqli_query($con,$qpelis) or die(mysqli_error($con));
                        echo'<script>window.location="inicio.php";</script>';
                    }else{echo '
                        error imagen.
                        ';}
                           
                }else{echo'
                    rellena todos los campos.
                    ';}
            }
        ?>
        </form>
    </div>
    <?php include('libs/scripts/scripts.php');?>
</body>
</html>