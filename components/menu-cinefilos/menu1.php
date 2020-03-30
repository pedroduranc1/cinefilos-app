<?php 
    session_start();
      if(empty($_SESSION['correo'])){
        $correo1 = 'nouser@gmail.com';
        $quser1 = "SELECT * FROM usuario WHERE correo = '$correo1'";
        $ruser1 =  mysqli_query($con,$quser1) or die(mysqli_error($con));
        $rs1 = mysqli_fetch_array($ruser1); 
      }else{
        $correo1 = $_SESSION['correo'];
        $quser1 = "SELECT * FROM usuario WHERE correo = '$correo1'";
        $ruser1 =  mysqli_query($con,$quser1) or die(mysqli_error($con));
        $rs1 = mysqli_fetch_array($ruser1);
      }
      
    
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
  <a class="navbar-brand pl-5 pt-3 pb-3"  href="#"><img src="img/fotos/Recurso 2.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <?php 
    

    ?>
    <div class="form-inline my-2 my-lg-0 pr-5">
      <ul class="navbar-nav mr-auto">
      <li id="cs" class="nav-item">
        <a id="btninicio" class="nav-link" href="inicio.php">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cartelera.php">Cartelera</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="proximamente.php">Proximamente</a>
      </li>
      <?php if($rs1['nivel'] != 'admin'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="contacto.php">Contacto</a>
          </li>
      <?php }else{ ?>
            <li class="nav'item">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Administrador
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="mpelicula.php"><i class="fa fa-ticket-alt"></i> Agregar Peliculas</a>
              <a class="dropdown-item" href="osala.php"><i class="fa fa-ticket-alt"></i> Opciones de Salas</a>
              <a class="dropdown-item" href="msala.php"><i class="fa fa-ticket-alt"></i> Modificar Salas</a>
            </div>
            </div>
          </li>
      <?php }?>
      <li class="nav-item">
        <a class="nav-link" <?php if($rs1['correo'] != 'nouser@gmail.com'){echo 'href="#"';}else{echo 'href="login.php"';}?>><?php if($rs1['correo'] != 'nouser@gmail.com'){ echo $rs1['nombre'],' ',$rs1['apellido'];}else{ echo'Iniciar sesion';}?></a>
      </li>
      <?php if($rs1['correo'] != 'nouser@gmail.com'){ ?>
        <li class="nav-item">
        <a class="nav-link" href="cs.php">Cerrar sesion</a>
        </li>
      <?php }?>
      <li class="nav-item ticket">
        <a id="carrito"><img src="img/iconos/Recurso37.svg" alt=""></a>
      </li>
      
      </ul>
    </div>
  </div>
</nav>

<form method="POST" id="carrito1" class="carrito">
    <a id="carrito2"><img src="img/iconos/arrow.svg" class="btnx"></a>
    <div class="lbl">
      <h1 class="lbl1">Carrito</h1>
    </div>
    <div class="lbl">
      <h1 class="lbl2">Tickets</h1>
    </div>
    <div class="lbl">
      <h1 class="lbl3">Total: $</h1>
    </div>
    <div class="lbl  margintop">
      <button name="btnpagar" class="btnpagar">Pagar</button>
      <?php 
        if(isset($_POST['btnpagar'])){
          header('location: pago.php');
        };
      ?>
    </div>
</form>