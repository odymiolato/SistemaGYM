<?php

include 'conexion.php';
$codigo=$_POST['id'];
mysqli_query($con,"delete from reserv_ent where id_reserv='$_POST[id]'");
 $result = mysqli_query($con, "SELECT * FROM reserv_ent where id_reserv='$codigo'") or die("No se pudo conectar con la tabla.");
if($reg=mysqli_fetch_array($result))
{
    if ($codigo == $reg['id_reserv']) {
        $resp=1;
    }  
}
 if ($resp == 1) {
        echo "<script>
        alert('La reserva no fue eliminado.');
        window.location='../html/reserva.html';
        </script>";
    }
    else{
        echo "<script>
        alert('La reserva fue eliminado.');
        window.location='../html/reserva.html';
        </script>";
    }
mysqli_close($con);
?>