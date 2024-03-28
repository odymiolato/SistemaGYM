<?php

include 'conexion.php';
$registro=mysqli_query($con,"select *from clientes where id_cli='$_POST[id]'")
or die("Problemas con el select: ".mysqli_error());
$codigo=$_POST['id'];
mysqli_query($con,"delete from clientes where id_cli='$codigo'");
 $result = mysqli_query($con, "SELECT * FROM clientes where id_cli='$codigo'") or die("No se pudo conectar con la tabla.");
if($reg=mysqli_fetch_array($result))
{
    if ($codigo == $reg['id_cli']) {
        $resp=1;
    }  
}
 if ($resp == 1) {
        echo "<script>
        alert('EL cliente no fue eliminado.');
        window.location='../html/Clientes.html';
        </script>";
    }
    else{
        echo "<script>
        alert('EL cliente fue eliminado.');
        window.location='../html/Clientes.html';
        </script>";
    }
mysqli_close($con);
?>