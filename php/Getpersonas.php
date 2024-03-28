<?php
include "conexion.php";

$sql = "SELECT idPersona, nombre, apellido, cedula, direccion, telefono, email FROM persona";
$result = $conn->query($sql);

$personas = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $personas[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($personas);

$conn->close();
?>