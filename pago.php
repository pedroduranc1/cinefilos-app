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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEFILOS - PAGO</title>
    <?php 
    include('components/icono-header/icono-header.php');
    ?>
    <link rel="stylesheet" href="pago.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <?php include('libs/links/links.php');?>
</head>
<body>

    <form style="
    position: absolute;
    background: #fff;
    color: black;
    width: 15vw;
    height: 80vh;
    left: 15vw;
    border-radius: 20px 0 0 20px;
    " method="POST">
        <div>
        <h4 class="text-center py-3">Metodo de pago</h4>
        </div>
        <div class="my-5"><button name="btntdc" class="btn btn-block btn-success py-3"><i class="fas fa-credit-card mr-2"></i>TDC</button></div>
        <div class="my-5"><button name="btnpay" class="btn btn-block btn-success py-3"><i class="fab fa-paypal mr-2"></i>Paypal</button></div>
        <div class="my-5"><button name="btnpm" class="btn btn-block btn-success py-3"><i class="fas fa-mobile-alt mr-2"></i>Pago Movil</button></div>
        
    </form>
    <div class="cajapago">
        <?php 
            if(isset($_POST['btntdc'])){ ?>
                <div ><img class="imgs" src="img/fotos/Recurso 3.png" alt=""></div>
        <div style="text-align: center;margin-top: 2%;"><h5>Metodo de pago</h5></div>
        <div><center>
        <select class="select" name="" id="">
        <option value="value1">MASTER</option> 
        <option value="value2" selected>VISA</option>
        </select>
        </center></div>
        <div class="flex margintop">
            <input type="text" id="nombre" class="input" placeholder="Nombre">
            <input type="text" id="apellido" class="input" placeholder="Apellido"> 
        </div>
        <div class="flex margintop">
            <input type="number" id="cedula" class="input2" placeholder="Cedula">
        </div>
        <div class="flex margintop">
            <input type="number" id="numero_tarjeta" class="input2" placeholder="Numero de tarjeta">
        </div>
        <div class="flex margintop">
            <input type="password" id="pin" class="input2" placeholder="Codigo de segurida">
        </div>
        <div class="flex mt-3">
            <h5><?php echo $rsauser["monto_total"].'$';?></h5>
            
        </div>
        <h5 id="error" class="error text-center" style=" color: rgba(231, 47, 78, 1);"></h5>
        <div class="flex">
            <button id="btnpagartdc" class="btnpagar">PAGAR</button>
        </div>
        <script>
            var btntdc = document.getElementById('btnpagartdc');
            
            $(btntdc).on('click',function(){
                var nombre = document.getElementById('nombre').value;
                var apellido = document.getElementById('apellido').value;
                var cedula = document.getElementById('cedula').value;
                var tarjeta = document.getElementById('numero_tarjeta').value;
                var pin = document.getElementById('pin').value;
                var error = document.getElementById('error');
                var metodo_pago = "TDC";

                if(nombre == "" && apellido == "" && cedula == "" && apellido == "" && pin == ""){
                    error.innerHTML = 'Por favor. Rellena todos los campos';
                }else{
                    $.ajax({
                        url:'pago-json.php',
                        method:'POST',
                        data:{
                              'metodo_pago': JSON.stringify(metodo_pago)
                        },
                        success:function(){
                            location.replace('success.php');
                        }
                    })
                }
                
            });
            
        </script>
          <?php  }
        ?>
        <?php 
            if(isset($_POST['btnpm'])){ ?>
            <div ><img class="imgs" src="img/fotos/Recurso 3.png" alt=""></div>
        <div style="text-align: center;margin-top: 2%;"><h5>Pago Movil</h5></div>
        
        <div class="flex my-5">
            <input type="text" id="nombre" class="input" placeholder="Nombre">
            <input type="text" id="apellido" class="input" placeholder="Apellido"> 
        </div>
        <div class="flex mb-5">
            <input type="number" id="cedula" class="input2" placeholder="Cedula">
        </div>
        <div class="flex mb-5">
            <input type="number" id="telefono" class="input2" placeholder="Numero de telefono">
        </div>
        <h5 id="error" class="error text-center" style=" color: rgba(231, 47, 78, 1);"></h5>
        <div class="flex">
            <h5><?php echo $rsauser["monto_total"].'$';?></h5>
        </div>
        <div class="flex">
            <button id="btnpagarpm" class="btnpagar">PAGAR</button>
        </div>
          <?php  }
        ?>
        <?php 
            if(isset($_POST['btnpay'])){ ?>
            <div class="mt-5 mb-3"><img class="imgs" src="img/fotos/Recurso 3.png" alt=""></div>
        <div style="text-align: center;margin-top: 2%;"><h5>Paypal</h5></div>
        
      
        <div class="flex mt-5 mb-3">
            <input type="text" id="email" class="input3" placeholder="Correo electronico">
        </div>
        
        <div class="flex mb-5">
            <input type="password" id="pass" class="input3" placeholder="Contraseña">
        </div>
        
        <h5 id="error" class="error text-center" style=" color: rgba(231, 47, 78, 1);"></h5>
        <div class="flex mt-5">
            <h5><?php echo $rsauser["monto_total"].'$';?></h5>
        </div>
        <div class="flex mt-5">
            <button id="btnpagarpay" class="btnpagar">PAGAR</button>
        </div>
          <?php  }
        ?>
    </div>
    <script>
        var btnpagarpm = document.getElementById('btnpagarpm');
            $(btnpagarpm).on('click',function(){
                var nombre = document.getElementById('nombre').value;
                var apellido = document.getElementById('apellido').value;
                var cedula = document.getElementById('cedula').value;
                var telefono = document.getElementById('telefono').value;
                metodo_pago = 'pagoMovil'
                if(nombre == "" && apellido == "" && cedula == "" && telefono == ""){
                    error.innerHTML = "Por favor. Rellena todos los campos";
                }else{
                    $.ajax({
                        url:'pago-json.php',
                        method:'POST',
                        data:{
                              'metodo_pago': JSON.stringify(metodo_pago)
                        },
                        success:function(){
                            location.replace('success.php');
                        }
                    })
                }
            });

        var btnpaypal = document.getElementById('btnpagarpay');

        $(btnpaypal).on('click',function(){
           var email = document.getElementById('email').value;
           var pass = document.getElementById('pass').value;
           var metodo_pago = 'paypal';

           emailcomprobant = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if(email == "" && pass == ""){
            error.innerHTML = "Porfavor. Rellena todos los campos.";
        }else{
            if (emailcomprobant.test(email)) {
                $.ajax({
                        url:'pago-json.php',
                        method:'POST',
                        data:{
                              'metodo_pago': JSON.stringify(metodo_pago)
                        },
                        success:function(){
                            location.replace('success.php');
                        }
                    })
                } else {
                    error.innerHTML="Correo invalido";
            }
        }
           
        });

            
    </script>
    
    

</body>
</html>
