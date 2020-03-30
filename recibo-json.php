<?php 
    include "conexion/conexion.php";
    include "asientos.php";
    
    session_start();
    $quser = "SELECT * FROM usuario where correo = '{$_SESSION["correo"]}'";
    $ruser = mysqli_query($con,$quser) or die(mysqli_error($con));
    $rsuser = mysqli_fetch_array($ruser);
    
    $sala = $_SESSION['idPeli'];
    $hora = $_SESSION['hora'];
    $ID_usuario = $rsuser['ID'];

    $data = json_decode($_POST['arr']);
    var_dump($data);
    $data1 = json_decode($_POST['boletos']);
    var_dump($data1);

    $total = ($data1)*10;
    
    $qass1 = "INSERT INTO recibo (cantidad_boletos,monto,monto_total,ID_sala,ID_usuario)
    values ('{$data1}','10','$total','$sala','$ID_usuario')";
    $rass1 = mysqli_query($con,$qass1) or die(mysqli_error($con));

    
    for($i = 0;$i<count($data);$i++){

        $qass = "INSERT INTO asientos (ID_sala,asiento,ID_usuario,hora) values ('$sala','{$data[$i]}','$ID_usuario','$hora')";
        $rass = mysqli_query($con,$qass) or die(mysqli_error($con));
    
    }

?>