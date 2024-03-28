<?php
        $id=$_POST['id'];
        $ent=$_POST['codent'];
        $cli=$_POST['codcli'];
        $horain=$_POST['horain'];
        $horafin=$_POST['horafin'];
        $cantDias=$_POST['cantDias'];
      include '../php/conexion.php';
        $sql="UPDATE reserv_ent set Id_entrenador='$ent', id_cliente='$cli', hora_IN='$horain' , hora_FIN='$horafin',cant_dias='$cantDias' where id_reserv='$id'";
        if(mysqli_query($con,$sql)){
 echo "<script>alert('El equipo fue actualizado.');
 window.location='../html/reserva.html';</script>";
        }
        else{
          echo "<script>alert(' String(".mysqli_error($con).")');
        window.location='../html/reserva.html';</script>";
        }
        mysqli_close($con); 
    ?>