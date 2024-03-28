<?php

include 'conexion.php';
$registro=mysqli_query($con,"select *from empleados where id='$_POST[id]'")
or die("Problemas con el select: ".mysqli_error());

$codigo=$_POST['id'];
mysqli_query($con,"delete from empleados where id='$_POST[id]'");
 $result = mysqli_query($con, "SELECT * FROM empleados where id='$codigo'") or die("No se pudo conectar con la tabla.");
if($reg=mysqli_fetch_array($result))
{
    if ($codigo == $reg['id']) {
        $resp=1;
    }  
}
 if ($resp == 1) {
        echo "<script>
        alert('EL empleado no fue eliminado.');
        window.location='../html/empleados.html';
        </script>";
    }
    else{
        echo "<script>
        alert('EL empleado fue eliminado.');
        window.location='../html/empleados.html';
        </script>";
    }
mysqli_close($con);
?>