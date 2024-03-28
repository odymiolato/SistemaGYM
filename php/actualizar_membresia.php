<?php
include '../php/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_insertar'])) {

    $idMembresia = $_POST['idMembresia'];
    $nombre  = $_POST['nombre'];
    $DiasDuracion = $_POST['DiasDuracion'];
    $estado = $_POST['estado'];

    $sql = "UPDATE membresia SET nombre = ?,  DiasDuracion = ?, estado = ? WHERE idMembresia = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssi", $nombre,$DiasDuracion, $estado, $idMembresia);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Membresia actualizada correctamente.";
            header("Location: ../html/membresia.php");
            exit();
        } else {
            echo "No se pudo actualizar la membresia.";
            header("Location: ../html/membresia.php");
        }
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
