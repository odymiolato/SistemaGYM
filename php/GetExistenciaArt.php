<?php
    include 'conexion.php';

    $data = file_get_contents("php://input");
    $existencia = 0;

    if(!isset($data) && empty($data)){
        return;
    }

    $id_articulo = $data;

    $sql = "SELECT Existencia_art($data) as existencia";

    $resul = $conn->query($sql);

    if($resul->num_rows > 0){
        $existencia = $resul->fetch_assoc();
    }
    header('Content-Type: application/json');
    echo json_encode($existencia);
?>