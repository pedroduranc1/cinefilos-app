<?php
    include 'conexion/conexion.php';
    include 'pago.php';

    session_start();
    $metodo_pago = json_decode($_POST['metodo_pago']);
    var_dump($metodo_pago);

    if($metodo_pago == 'TDC'){
        $ref = "";
              for($i=0;$i<8;$i++){
                $ref .= mt_rand(0,9);
                $_SESSION['referencia'] = $ref;
        }

        $urecibo = "UPDATE recibo SET referencia = '$ref', status = 'pagado' WHERE ID_usuario = '{$rs1["ID"]}'";
        $rRecibo = mysqli_query($con,$urecibo) or die(mysqli_error($con));

        
    }
    
    if($metodo_pago == 'pagoMovil'){
        $ref = "";
              for($i=0;$i<8;$i++){
                $ref .= mt_rand(0,9);
                $_SESSION['referencia'] = $ref;
        }

        $urecibo = "UPDATE recibo SET referencia = '$ref', status = 'pagado' WHERE ID_usuario = '{$rs1["ID"]}'";
        $rRecibo = mysqli_query($con,$urecibo) or die(mysqli_error($con));

        
    }

    if($metodo_pago == 'paypal'){
        $ref = "";
              for($i=0;$i<8;$i++){
                $ref .= mt_rand(0,9);
                $_SESSION['referencia'] = $ref;
        }

        $urecibo = "UPDATE recibo SET referencia = '$ref', status = 'pagado' WHERE ID_usuario = '{$rs1["ID"]}'";
        $rRecibo = mysqli_query($con,$urecibo) or die(mysqli_error($con));

        
    }

?>