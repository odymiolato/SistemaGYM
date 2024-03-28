<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo=$_POST['idMembresia'];
    $registro= $conn->query("SELECT * FROM membresia where idMembresia = $codigo")
or die("Problemas con el select: ".$conn->error);

// $conn->query("DELETE FROM membresia WHERE idMembresia = $codigo");
 $conn->query("UPDATE membresia SET estado = 0 WHERE idMembresia = $codigo");
 $result = $conn->query( "SELECT * FROM membresia where idMembresia= $codigo AND estado = 1") or die("No se pudo conectar con la tabla.");

 if ($result->num_rows > 0) {
        header("Location: ../html/membresia.php");
    }
    else{
        // echo "<script>s
        // alert('La membresia fue eliminado.');
        // window.location='../html/membresia.php';
        // </script>";
        header("Location: ../html/membresia.php");
    }
}
$conn->close();
?>