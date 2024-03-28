<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    $posicion = $_POST["posicion"];
    $sueldo = $_POST["sueldo"];
    $descripcion = $_POST["descripcion"];
    $fechaCreado = date('Y-m-d H:i:s'); // Obtiene la fecha y hora actual en formato de MySQL
    $creador = $_POST["creador"];
    $estado = $_POST["estado"];

    $sql = "INSERT INTO posicion (posicion, sueldo, descripcion, fechaCreado, creador, estado) 
            VALUES ('$posicion', '$sueldo', '$descripcion', '$fechaCreado', '$creador', '$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva posición agregada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: ../html/posicion.php");
    exit();
} else {
    header("Location: ../html/posicion.php");
    exit();
}
?>
