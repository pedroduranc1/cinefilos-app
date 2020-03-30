<?php
    include_once('conexion/conexion.php');
    

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
    $_SESSION['id_usuario'] = $rs1['ID'];

    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEFILOS - ASIENTOS</title>
    <?php include('components/icono-header/icono-header.php')?>
    <link rel="stylesheet" href="components/menu-cinefilos/menu2.css">
    <link rel="stylesheet" href="asientos.css">
    <link rel="stylesheet" href="components/footer/footer1.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <?php include('libs/links/links.php');?>
</head>
<body>
    <?php include('components/menu-cinefilos/menu2.php')?>
    <div class="tbox">
        <h3 class="text-center c pt-3">Seleccione sus asientos</h3>
    </div>
    <form method="POST" class="horarios" id="funciones">
        <h4 class="text-center pt-5">Funciones</h4>
        <div class="funciones">
            <button type="submit" onclick="seleccionado(aux = 1)" name="horario1" id="horario1">3:00pm</button>
            <button type="submit" onclick="seleccionado(aux = 2)" name="horario2" id="horario2">5:20pm</button>
            <button type="submit" onclick="seleccionado(aux = 3)" name="horario3" id="horario3">7:40pm</button>
            <button type="submit" onclick="seleccionado(aux = 4)" name="horario4" id="horario4">9:00pm</button>
            
        </div>
        <?php
            if(isset($_POST['horario1'])){
                $hora = '3:00pm';
                echo '<center><h5 style="background: rgba(231, 47, 78, 1) !important;
                color: white !important;
                padding: 5px 0 !important;
                border-radius: 0 0 10px 0 !important;">'.$hora.'</h5></center>';
                $_SESSION['hora'] = $hora;
            }
            if(isset($_POST['horario2'])){
                $hora = '5:20pm';
                $_SESSION['hora'] = $hora;
                echo '<center><h5 style="background: rgba(231, 47, 78, 1) !important;
                color: white !important;
                padding: 5px 0 !important;
                border-radius: 0 0 10px 0 !important;">'.$hora.'</h5></center>';
            }
            if(isset($_POST['horario3'])){
                $hora = '7:40pm';
                $_SESSION['hora'] = $hora;
                echo '<center><h5 style="background: rgba(231, 47, 78, 1) !important;
                color: white !important;
                padding: 5px 0 !important;
                border-radius: 0 0 10px 0 !important;">'.$hora.'</h5></center>';
            }
            if(isset($_POST['horario4'])){
                $hora = '9:00pm';
                $_SESSION['hora'] = $hora;
                echo '<center><h5 style="background: rgba(231, 47, 78, 1) !important;
                color: white !important;
                padding: 5px 0 !important;
                border-radius: 0 0 10px 0 !important;">'.$hora.'</h5></center>';
            }
        ?>      
    </form>

    <div class="abox">
        <?php
        $funcion = $_SESSION['idPeli'];
        if($funcion == ""){
            echo '<h1 style="color:white;" class="text-center">Seleccione una funcion.<h1>';
        }else{
            $funcion = $_SESSION['hora'];
            $qas = "SELECT * from sala where ID_sala = '{$_SESSION["idPeli"]}' and funciones = '$funcion'";
            $ras = mysqli_query($con,$qas) or die(mysqli_error($con));
            $rsas = mysqli_fetch_array($ras);
        }
        ?>
        <div class="row asbox" >
            <div class="assbox" >
            <?php for($h=1;$h<=$rsas['asientos'];$h++){ ?>
                <h4 class="text-center"><?php echo $h;?></h4>
            <?php }?></div>
              <?php for($i = 1;$i<= $rsas['filas'];$i++){?>
                <div class="asientos" id="asiento">
                    <div class="asi"><h4><?php echo$i;?></h4></div>
                    <?php
                     for($j=1;$j<=$rsas['asientos'];$j++){?>
                        <?php $butaca = $i.'-'.$j;
                        ?>
                        
                        <?php 
                            $qass1 = "SELECT * FROM asientos where ID_sala = '{$_SESSION["idPeli"]}' and asiento = '$butaca' and hora = '$funcion'";
                            $rass1 =  mysqli_query($con,$qass1) or die(mysqli_error($con));
                            $rsass1 = mysqli_fetch_array($rass1);

                            if($rsass1['asiento']==$butaca && $rsass1['hora']==$funcion && $rsass1['status']== 'pagados'){ ?>
                                <input type="checkbox" name="btn<?php echo$butaca;?>"
                                id="<?php echo$butaca;?>">
                                <label style="background: red;cursor: default;" class="boton" for="<?php echo$butaca;?>"></label>
                          <?php  }else if($rsass1['asiento']==$butaca && $rsass1['hora']==$funcion && $rsass1['status']=='nopagados'){ ?>
                            <input type="checkbox" name="btn<?php echo$butaca;?>"
                                id="<?php echo$butaca;?>">
                                <label style="background: #78A774 !important;border: 3px solid#fff !important; cursor: default;" class="boton" for="<?php echo$butaca;?>"></label>
                         <?php }else { ?>
                            <input type="checkbox" name="btn<?php echo$butaca;?>"
                        id="<?php echo$butaca;?>">
                        <label class="boton" for="<?php echo$butaca;?>"></label>
                         <?php }?>

 

                    <?php }?></div>
                <?php }?>
        </div>
        <script>
        var arr = [];
        var id = "";
        var hora = "";
        var boletos = "";
        $(document).ready(function(){
            
            $('body #asiento').on('click','input',function(){
                id = $(this).attr('id');
                var index = arr.indexOf(id);
                var isChecked = document.getElementById(id).checked;
                
                
                if(isChecked){
                       
                    if(index == -1){
                        for(var i=0;i<1;i++){
                        arr.push(id);
                        boletos = arr.length;
                        }
                    }
                    
                }else{
                    if(index > -1){
                        for(var i=0;i<1;i++){
                        arr.splice(index,1);
                        
                        }
                    }
                }
                
            });

           

            $(document).on('click','#btncontinuar',function(){
                
                    $.ajax({
                        url:'recibo-json.php',
                        method:'POST',
                        data:{'arr': JSON.stringify(arr),
                              'boletos': JSON.stringify(boletos)
                        },
                        success:function(){
                            location.replace('asientos.php');
                        }
                    })

                    
                   
            });
        });
        </script>
    </div>
    

    <div class="boxbtn">
        <center><button class="btn btn-success" id="btncontinuar" name="btncontinuar">Continuar</button></center>

    <div>

</body>
    <script src="components/menu-cinefilos/menu.js"></script>
    
</html>