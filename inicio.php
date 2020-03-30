<?php 
    include_once('conexion/conexion.php');
    $qcartelera1 = "SELECT * from pelicula where sala = '3'";
    $rcartelera1 = mysqli_query($con,$qcartelera1) or die(mysqli_error($con));
    $rscartelera1 = mysqli_fetch_array($rcartelera1);

    $qcartelera2 = "SELECT * from pelicula where sala = '5'";
    $rcartelera2 = mysqli_query($con,$qcartelera2) or die(mysqli_error($con));
    $rscartelera2 = mysqli_fetch_array($rcartelera2);

    $qcartelera3 = "SELECT * from pelicula where sala = '7'";
    $rcartelera3 = mysqli_query($con,$qcartelera3) or die(mysqli_error($con));
    $rscartelera3 = mysqli_fetch_array($rcartelera3);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEFILOS - INICIO</title>
    <?php include('components/icono-header/icono-header.php')?>
    <link rel="stylesheet" href="components/menu-cinefilos/menu1.css">
    <link rel="stylesheet" href="components/footer/footer1.css">
    <link rel="stylesheet" href="inicio.css">
    <?php include('libs/links/links.php');?>
</head>
<body>
    
    <?php include('components/menu-cinefilos/menu1.php');?>
    <div class="contenedor">
        <img src="img/fotos/Recurso 1.png" alt="">
    </div>
    <div class="contenedor1">
        <div class="vacio"></div>
        <div class="cartelera">
            <div class="imgs">
            <img src="<?php echo$rscartelera2['img'];?>" class="bordesizq float-left" alt="...">
            <img src="<?php echo$rscartelera1['img'];?>" class="float-center" alt="...">
            <img src="<?php echo$rscartelera3['img'];?>" class="bordesder float-right" alt="...">  
            </div>
            <a class="btn btn-primary btn-block mt-5" href="cartelera.php">ver cartelera</a>
        </div>
    </div>
    <div class="contenedor2">
        <div><h1 class="text-center pd white">PROXIMAMENTE</h1></div>
        <?php 
            $qproximamente1 = "SELECT * from pelicula where mes = 'abril'";
            $rproximamente1 = mysqli_query($con,$qproximamente1) or die(mysqli_error($con));
            
        ?>
        <div class="row pl-5" style="width: 100%;">
            <?php while($rsproximamente1 = mysqli_fetch_array($rproximamente1)){?>
            
                <div class="card mx-auto">
                <img src="<?php echo$rsproximamente1['img']?>" class="card-img-top bordesall" alt="...">
                <div class="card-body">
                <p class="tag"><?php echo$rsproximamente1['dia'],' de ',$rsproximamente1['mes'];?></p>
                </div>
                </div>
            
            <?php }?>
            
        </div>
        
            <a class="boton" href="proximamente.php">ver mas</a>
    </div>
        <br><br><br><br><br><br><br><br><br>
    <div>
    <?php include('components/footer/footer1.php')?>
    </div>
    
    
</body>
    <script src="components/menu-cinefilos/menu.js"></script>
    <?php include('libs/scripts/scripts.php');?>

</html>