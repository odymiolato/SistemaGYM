<?php
include '../php/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_insertar'])) {

    $idCliente = $_POST['idPersona'];
    $idMembresia = $_POST['idMembresia'];
    $limCred  = $_POST['limCred'];
    $estado = $_POST['estado'];

    $sql = "UPDATE cliente SET   idMembresia = ?, limCred = ? , estado = ? WHERE idCliente = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("isii", $idMembresia, $limCred, $estado, $idCliente);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "cliente actualizado correctamente.";
            header("Location: ../html/clientes.php");
            exit();
        } else {
            echo "No se pudo actualizar el cliente.";
        }
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
