<?php
include "conexion.php";

$sql = "SELECT * FROM posicion";
$result = $conn->query($sql);

$posiciones = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $posiciones[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($posiciones);

$conn->close();
?>