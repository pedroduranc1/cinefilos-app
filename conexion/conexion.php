<?php

    $host = "b1x5gsrnvd20qtstdh7a-mysql.services.clever-cloud.com";
    $user = "uuz7qv7ubxjmjey0";
    $password = "AtpZT0LWpOtjefvezbWr";
    $db = "b1x5gsrnvd20qtstdh7a";

    $con = mysqli_connect($host,$user,$password,$db);

    if(!$con){
        echo'No hay conexion con'.mysqli_error($con);
    }else{
      //  echo'CONECTO';
    }

?>