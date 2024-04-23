<?php
    include 'conexion.php';

    $data = file_get_contents("php://input");
    $detalle = [];

    if(!isset($data) && empty($data)){
        return;
    }

    $id_articulo = $data;

    $sql = "SELECT Ventas_detalle.ID_Articulo,(SELECT Nombre FROM articulos WHERE articulos.ID_Articulo = Ventas_detalle.ID_Articulo)NombreArticulo,
            Ventas_detalle.precio,Ventas_detalle.cantidad,Ventas_detalle.ilmporte FROM Ventas_detalle WHERE Ventas_detalle.numfac = $data ";

    $resul = $conn->query($sql);

    while($row = $resul->fetch_assoc()){
        $detalle[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($detalle);
?>