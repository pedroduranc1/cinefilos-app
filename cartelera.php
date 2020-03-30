<?php 
    include_once('conexion/conexion.php');
    $qpelis1 = "SELECT * FROM pelicula WHERE sala >= '1' and sala <='8'";
    $rpelis1 = mysqli_query($con,$qpelis1) or die(mysqli_error($con));
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEFILOS - CARTELERA</title>
    <?php include('components/icono-header/icono-header.php')?>
    <link rel="stylesheet" href="components/menu-cinefilos/menu2.css">
    <link rel="stylesheet" href="cartelera.css">
    <link rel="stylesheet" href="components/footer/footer1.css">
    <?php include('libs/links/links.php');?>
</head>
<body>
    <?php include('components/menu-cinefilos/menu2.php');?>
    <div class="contentcartelera">
        <br><br><br><br><br><br><br><br><br><br><br>
        <h1 class="text-center c mb-5">CARTELERA</h1>
        <form method="POST" class="row" style="width: 100%;">
            <?php 
                while($rspelis1 = mysqli_fetch_array($rpelis1)){ ?>
            <div class="card mx-auto">
            <button name="btnsala<?php echo$rspelis1['ID'];?>" class="boton"><img src="<?php echo$rspelis1['img'];?>"  id="img" class="card-img-top" style="border-radius: 20px;"></button>
            <div class="card-body">
                <p class="text-center white"><?php echo $rspelis1['nombre'];?></p>
            </div>
            <?php 
                if(isset($_POST['btnsala'.$rspelis1['ID']])){
                    if($rs1['correo'] != 'nouser@gmail.com'){
                        
                        $_SESSION['idPeli'] = $rspelis1['ID'];
                        echo'<script>window.location="pelicula.php";</script>';
                    }else{
                        header('location: login.php');
                    }
                    
                }
            ?>
        </div>
              <?php  }
            ?>
        
    
        </form>
        <div style="bottom: 0;margin-top: 0%;"><?php include('components/footer/footer1.php')?></div>
        
    </div>
    
</body>
    <?php include('libs/scripts/scripts.php');?>
    <script src="components/menu-cinefilos/menu.js"></script>
</html>