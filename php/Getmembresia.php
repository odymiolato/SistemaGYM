<?php
include "conexion.php";

$sql = "SELECT * FROM membresia";
$result = $conn->query($sql);

$membresias = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $membresias[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($membresias);

$conn->close();
?>