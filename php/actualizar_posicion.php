<?php
include '../php/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_insertar'])) {

    $idPosicion = $_POST['idPosicion'];
    $posicion = $_POST['posicion'];
    $sueldo = $_POST['sueldo'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];

    $sql = "UPDATE posicion SET posicion=?, sueldo=?, descripcion=?, estado=? WHERE idPosicion=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssi", $posicion, $sueldo, $descripcion, $estado, $idPosicion);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Posición actualizada correctamente.";
            header("Location: ../html/posicion.php");
            exit();
        } else {
            echo "No se pudo actualizar la posición.";
        }
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
