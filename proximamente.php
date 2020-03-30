<?php 
include_once('conexion/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEFILOS - PROXIMAMENTE</title>
    <?php include('components/icono-header/icono-header.php')?>
    <link rel="stylesheet" href="components/menu-cinefilos/menu2.css">
    <link rel="stylesheet" href="proximamente.css">
    <link rel="stylesheet" href="components/footer/footer1.css">
    <?php include('libs/links/links.php');?>
</head>
<body>
    <?php include('components/menu-cinefilos/menu2.php')?>
    <div class="imgcartelera">
        <?php $pelis = 'abril';?>
        <img src="img/fotos/Recurso 43.png" style="width: 100%; margin-top: -2%;">
        <h1 class="text-center" style="color: white; margin-top: -47%;">PROXIMAMENTE</h1>
        <form method="POST" class="text-center mt-5">
        <button name="abril" class="boton mr-3">Abril</button>
        <button name="mayo" class="boton mr-3">Mayo</button>  
        <button name="junio" class="boton mr-3">Junio</button>  
        <button name="julio" class="boton mr-3">Julio</button>
        <?php if(isset($_POST['abril'])){
            $pelis = 'abril';
        }
        if(isset($_POST['mayo'])){
            $pelis = 'mayo';
        }
        if(isset($_POST['junio'])){
            $pelis = 'junio';
        }
        if(isset($_POST['julio'])){
            $pelis = 'julio';
        }   
        ?>
        </form>
    </div>
    <div class="contentcartelera">
        <br><br><br><br><br><br><br><br><br><br></br><br><br><br><br><br>
    <div class="row" style="width: 100%;">
        <?php 
            $cproximamente = "SELECT * FROM pelicula WHERE mes = '$pelis'";
            $rproximamente = mysqli_query($con,$cproximamente) or die(mysqli_error($con));
        ?>     
        
        <?php while($rcartelera = mysqli_fetch_array($rproximamente)){ ?>
            <div class="card mx-auto p-5 width">
            <img src="<?php echo$rcartelera['img'];?>" class="card-img-top" style="border-radius: 20px;" alt="...">
            <div class="card-body">
                <p class="text-center tag"><?php echo$rcartelera['dia']," de ",$rcartelera['mes'];?></p>
            </div>
            </div>
        <?php }?>
        
        
        
        
        </div>
        <div style="bottom: 0;"><?php include('components/footer/footer1.php')?></div>
    </div>
</body>
    <script src="components/menu-cinefilos/menu.js"></script>
    <?php include('libs/scripts/scripts.php');?>
</html>