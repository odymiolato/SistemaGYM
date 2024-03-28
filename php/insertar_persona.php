<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $cedula = $_POST["cedula"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    $sql = "INSERT INTO persona (nombre, apellido, cedula, direccion, telefono, email) 
            VALUES ('$nombre', '$apellido', '$cedula', '$direccion', '$telefono', '$email')";


    if ($conn->query($sql) === TRUE) {
        echo "Nueva persona agregada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    
    header("Location: ../html/personas.php");
    exit();
} else {
    header("Location: ../html/personas.php");
    exit();
}
?>
