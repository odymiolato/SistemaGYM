<?php
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $desc=$_POST['desc'];
        $costo=$_POST['precio'];
      include '../php/conexion.php';
        $sql="UPDATE articulos set nombre_art='$nombre', desc_art='$desc', costo='$costo' where id_art='$id'" or die("tu maldita vida");
        if(mysqli_query($con,$sql)){
 echo "<script>alert(' String(".$sql.")');
 window.location='../html/articulos.html';</script>";
        }
        else{
          echo "<script>alert(' String(".mysqli_error($con).")');
        window.location='../html/articulos.html';</script>";
        }
        mysqli_close($con); 
    ?>