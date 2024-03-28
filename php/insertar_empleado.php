<?php
session_start();
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    $idEmpleado = $_POST["idEmpleado"];
    $idPosicion = $_POST["idPosicion"];
    $fechaEntrada = date('Y-m-d H:i:s');
    $estado = $_POST["estado"];
    $creador = $_SESSION['idUsuario'] ?? '1'; // Valor predeterminado en caso de que no esté definido

    $sql = $conn->prepare("INSERT INTO empleado (idEmpleado, idPosicion, fechaEntrada, estado, creador) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("iisis", $idEmpleado, $idPosicion, $fechaEntrada, $estado, $creador); // asumiendo que idEmpleado e idPosicion son enteros, y estado es string

    if ($sql->execute()) {
        echo "Nuevo empleado agregado exitosamente";
    } else {
        echo "Error: " . $sql->error;
    }

    $conn->close();
    
    header("Location: ../html/empleados.php");
    exit();
} else {
    header("Location: ../html/empleados.php");
    exit();
}
?>
