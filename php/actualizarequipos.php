<?php
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $mus=$_POST['mus'];
        $num=$_POST['num'];
      include '../php/conexion.php';
        $sql="UPDATE equipos set nom_equipo	='$nombre', mus_equipo='$mus', num_equipo='$num' where id_equipo='$id'";
        if(mysqli_query($con,$sql)){
 echo "<script>alert('El equipo fue actualizado.');
 window.location='../html/equipos.html';</script>";
        }
        else{
          echo "<script>alert(' String(".mysqli_error($con).")');
        window.location='../html/equipos.html';</script>";
        }
        mysqli_close($con); 
    ?>