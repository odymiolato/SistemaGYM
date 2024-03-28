<?php

include 'conexion.php';
$registro=mysqli_query($con,"select *from articulos where id_art='$_POST[id]'")
or die("Problemas con el select: ".mysqli_error());
$codigo=$_POST['id'];
mysqli_query($con,"delete from articulos where id_art='$codigo'");
 $result = mysqli_query($con, "SELECT * FROM articulos where id_art='$codigo'") or die("No se pudo conectar con la tabla.");
if($reg=mysqli_fetch_array($result))
{
    if ($codigo == $reg['id_art']) {
        $resp=1;
    }  
}
 if ($resp == 1) {
        echo "<script>
        alert('EL articulo no fue eliminado.');
        window.location='../html/articulos.html';
        </script>";
    }
    else{
        echo "<script>
        alert('EL articulo fue eliminado.');
        window.location='../html/articulos.html';
        </script>";
    }
mysqli_close($con);
?>