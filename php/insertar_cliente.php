<?php
session_start();
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    $idCliente = $_POST["idPersona"];
    $idMembresia = $_POST["idMembresia"];
    $limCred = $_POST["limCred"];
    $fechaCreado = date('Y-m-d H:i:s');
    $creador = $_SESSION['idUsuario'] ?? '1';
    $estado = $_POST["estado"];

    $sql = "INSERT INTO cliente (idCliente, idMembresia, limCred, creador, fechaCreado, estado) 
            VALUES ('$idCliente','$idMembresia','$limCred','$creador','$fechaCreado','$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo cliente agregado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: ../html/clientes.php");
    exit();
} else {
    header("Location: ../html/clientes.php");
    exit();
}
?>
