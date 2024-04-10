<?php
include "conexion.php";

$sql = "SELECT cli.idCliente,p.nombre FROM cliente AS cli INNER JOIN persona p ON cli.idCliente = p.idPersona;

";
$result = $conn->query($sql);

$clientes = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($clientes);

$conn->close();
?>