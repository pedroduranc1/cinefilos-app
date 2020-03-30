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

    $qauser = "SELECT monto_total FROM recibo where ID_usuario = '{$rs1["ID"]}' and status = 'nopagado'";
    $rauser = mysqli_query($con,$qauser) or die(mysqli_error($con));
    $rsauser = mysqli_fetch_array($rauser);
    $rs = mysqli_num_rows($rauser);
?>
<nav class="navbar navbar-expand-lg navbar-dark pt-4 pb-3" style="background: #282828 !important">
  <a class="navbar-brand pl-5 pt-3 pb-3"  href="#"><img src="img/fotos/Recurso 3.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <div class="form-inline my-2 my-lg-0 pr-5">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="inicio.php">Inicio</a>
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
      <?php 
          if($rs != 0){ ?>
            <li class="compra">
                <a id="carrito" class="acompra" href="#">
                  <img class="aimg" src="img/iconos/Recurso37.svg" alt="">
                </a>
            </li>  
         <?php }else{ ?>
              <li class="nav-item ticket">
                <a id="carrito"><img src="img/iconos/Recurso37.svg" alt=""></a>
              </li>     
      <?php }?>
      
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
      <div style="display: inline-flex; width:100%; justify-content: center;">
      <h5 class=" pr-2">Pelicula:</h5><h5 name="peli"><?php echo $_SESSION['nombre_peli'];?></h5>
      </div>
      <div style="display: inline-flex; width:100%; justify-content: center;">
      <h5 class="pr-2" id="asiento">Asiento:</h5>
          <h5>
           <?php
                $qauser1 = "SELECT * FROM asientos where ID_usuario = '{$rs1["ID"]}' and status = 'reservados'";
                $rauser1 = mysqli_query($con,$qauser1) or die(mysqli_error($con));

                while($rsauser1 = mysqli_fetch_array($rauser1)){
                  echo '(',$rsauser1['asiento'],')';
                }
           ?>
          </h5>
      </div>
      <div style="display: inline-flex; width:100%; justify-content: center;">
      <h5 class=" pr-2">Hora:</h5>
       <h5>
         <?php
         $qauser2 = "SELECT * FROM asientos where ID_usuario = '{$rs1["ID"]}' and status = 'reservados'";
         $rauser2 = mysqli_query($con,$qauser2) or die(mysqli_error($con));
         $rsauser2 = mysqli_fetch_array($rauser2);
          echo $rsauser2['hora'];
          ?>
       </h5>
      </div>
    </div>
    <div class="lbl">
      <?php 
        

        echo '<h5 class="lbl3">Total:'.$rsauser['monto_total'].'$</h5>';
       
      ?>
     
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
