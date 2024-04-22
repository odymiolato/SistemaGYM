<?php
header('Content-Type: application/json');
include "conexion.php";

$data = json_decode(file_get_contents("php://input"));

if (isset($data) && !empty($data)) {
    $idcli = (!empty($data->idcli)) ? $data->idcli : null;
    $nombreCli = $data->nombreCli;
    $fecha = $data->fecha;
    $newdate = date_create($fecha);
    $fecha = date_format($newdate,"m-d-Y");
    $total = $data->total;
    $detalle = $data->detalle;
    $numfac = null;
    $tineerror = false;
    
    try {
        $conn->begin_transaction();
        $sql = $conn->prepare("INSERT INTO Ventas (idCliente, nombreCli, fecha, total) VALUES (?, ?, STR_TO_DATE(?, '%m-%d-%Y'), ?)");
        $sql->bind_param("issi", $idcli, $nombreCli, $fecha, $total);

        if ($sql->execute()) {
            $numfac = $sql->insert_id;

            foreach ($detalle as $item) {
                $sql = $conn->prepare("INSERT INTO Ventas_detalle (numfac, ID_Articulo, precio, cantidad, ilmporte) VALUES (?, ?, ?, ?, ?)");
                $sql->bind_param('iiiii', $numfac, $item->ID_Articulo, $item->precio, $item->cantidad, $item->importe);
                if (!($sql->execute())) {
                    echo json_encode("Error al insertar datos en la tabla Ventas_detalle.");
                }
            }
        } else {
            echo json_encode("Error al insertar datos en la tabla Ventas.");
        }
        $conn->commit();
    } catch (Exception $EX) {
        echo json_encode($EX);
        $conn->rollback();
        $tineerror = true;
    }
} else {
    echo json_encode("No se proporcionaron datos válidos.");
}
$conn->close();
if($tineerror){ echo json_encode("Ha ocurrido un error, por lo tanto se a echo un rolback a la transaccion.");} else {echo json_encode(true);}
