<?php

    $host = "";
    $user = "";
    $password = "";
    $db = "";

    $con = mysqli_connect($host,$user,$password,$db);

    if(!$con){
        //echo'No hay conexion con'.mysqli_error($con);
    }else{
        //echo'CONECTO';
    }

?>