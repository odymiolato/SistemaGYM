<?php
include "conexion.php";

$data = json_decode(file_get_contents("php://input"));

if(isset($data) && !empty($data)){
    $ID_Articulo = $data->ID_Articulo;
    $sql = "SELECT * FROM Articulos WHERE ID_Articulo = $ID_Articulo";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $articulo = $result->fetch_assoc();
    }
    
    header('Content-Type: application/json');
    echo json_encode($articulo);    
}
$conn->close();
?>