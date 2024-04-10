<?php
header('Content-Type: application/json');
include "conexion.php";

$data = json_decode(file_get_contents("php://input"));

if (isset($data) && !empty($data)) {
    $idcli = (!empty($data->idcli)) ? $data->idcli : null;
    $nombreCli = $data->nombreCli;
    $fecha = $data->fecha;
    $total = $data->total;
    $detalle = $data->detalle;
    $numfac = null;

    
    $sql = $conn->prepare("INSERT INTO Ventas (idCliente, nombreCli, fecha, total) VALUES (?, ?, STR_TO_DATE(?, '%m-%d-%Y'), ?)");
    $sql->bind_param("issi", $idcli, $nombreCli, $fecha, $total);

    if ($sql->execute()) {

        $conn->begin_transaction();
        foreach ($detalle as $item) {
            // $sql = "INSERT INTO Ventas_detalle (numfac, ID_Articulo, precio, cantidad, ilmporte) VALUES ($item->ID_Articulo, $item->ID_Articulo, $item->precio, $item->cantidad, $item->importe)";
            $sql = $conn->prepare("INSERT INTO Ventas_detalle (numfac, ID_Articulo, precio, cantidad, ilmporte) VALUES (?, ?, ?, ?, ?)");
            $sql->bind_param('iiiii', $item->ID_Articulo, $item->ID_Articulo, $item->precio, $item->cantidad, $item->importe);
            if ($sql->execute()) {
                $conn->commit();
            } else {
                echo "Error al insertar datos en la tabla Ventas_detalle.";
                echo json_encode(false);
            } 
        }
    } else {
        echo "Error al insertar datos en la tabla Ventas.";
        echo json_encode(false);
    }
} else {
    echo "No se proporcionaron datos válidos.";
    echo json_encode(false);
}
$conn->close();
echo json_encode(true);
