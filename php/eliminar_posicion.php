<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo=$_POST['idPosicion'];
    $registro= $conn->query("SELECT * FROM posicion where idPosicion= $codigo")
or die("Problemas con el select: ".$conn->error);

$conn->query("UPDATE posicion SET estado = 0 WHERE idPosicion=$codigo");
 $result = $conn->query( "SELECT * FROM posicion where idPosicion= $codigo AND estado = 1") or die("No se pudo conectar con la tabla.");

 if ($result->num_rows > 0) {
        echo "<script>
        alert('La posicion no fue eliminada.');
        window.location='../html/posicion.php';
        </script>";
    }
    else{
        echo "<script>
        alert('La posicion fue eliminada.');
        window.location='../html/posicion.php';
        </script>";
    }
}
$conn->close();
?>