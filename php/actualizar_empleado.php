<?php
include '../php/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_insertar'])) {

    $idEmpleado = $_POST['idPersona'];
    $idPosicion  = $_POST['idPosicion'];
    $estado = $_POST['estado'];

    $sql = "UPDATE empleado SET idPosicion = ?, estado = ? WHERE idEmpleado=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssi", $idPosicion, $estado, $idEmpleado);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Empleado actualizado correctamente.";
            header("Location: ../html/empleados.php");
            exit();
        } else {
            echo "No se pudo actualizar el Empleado.";
        }
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
