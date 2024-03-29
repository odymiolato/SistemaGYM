<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo=$_POST['idCliente'];
    $registro= $conn->query("SELECT * FROM cliente where idCliente = $codigo")
or die("Problemas con el select: ".$conn->error);

$conn->query("DELETE FROM cliente WHERE idCliente = $codigo");
 $result = $conn->query( "SELECT * FROM cliente where idCliente= $codigo AND estado = 1") or die("No se pudo conectar con la tabla.");

 if ($result->num_rows > 0) {
        echo "<script>
        alert('El cliente no fue eliminado.');
        window.location='../html/clientes.php';
        </script>";
    }
    else{
        echo "<script>
        alert('El cliente fue eliminado.');
        window.location='../html/clientes.php';
        </script>";
    }
}
$conn->close();
?>