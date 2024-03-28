<?php

include 'conexion.php';
$registro=mysqli_query($con,"select *from equipos where id_equipo='$_POST[id]'")
or die("Problemas con el select: ".mysqli_error());

$codigo=$_POST['id'];
mysqli_query($con,"delete from equipos where id_equipo='$_POST[id]'");
 $result = mysqli_query($con, "SELECT * FROM equipos where id_equipo='$codigo'") or die("No se pudo conectar con la tabla.");
if($reg=mysqli_fetch_array($result))
{
    if ($codigo == $reg['id']) {
        $resp=1;
    }  
}
 if ($resp == 1) {
        echo "<script>
        alert('EL equipo no fue eliminado.');
        window.location='../html/equipos.html';
        </script>";
    }
    else{
        echo "<script>
        alert('EL equipo fue eliminado.');
        window.location='../html/equipos.html';
        </script>";
    }
mysqli_close($con);
?>