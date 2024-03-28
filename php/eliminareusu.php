<?php

include 'conexion.php';
$registro=mysqli_query($con,"select * from usuario where id='$_POST[codusu]'")
or die("Problemas con el select: ".mysqli_error());

$codigo=$_POST['codusu'];
mysqli_query($con,"delete from usuario where id='$_POST[codusu]'");
 $result = mysqli_query($con, "SELECT * FROM usuario where id='$codigo'") or die("No se pudo conectar con la tabla.");
if($reg=mysqli_fetch_array($result))
{
    if ($codigo == $reg['id']) {
        $resp=1;
    }  
}
 if ($resp == 1) {
        echo "<script>
        alert('EL usuario no fue eliminado.');
        window.location='../php/verusuario.php';
        </script>";
    }
    else{
        echo "<script>
        alert('EL usuario fue eliminado.');
        window.location='../php/verusuario.php';
        </script>";
    }
mysqli_close($con);
?>