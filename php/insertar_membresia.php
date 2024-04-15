<?php
session_start();
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    $nombre = $_POST["nombre"];
    $DiasDuracion = $_POST["DiasDuracion"];
    $fechaCreado = date('m-d-y H:i:s');
    $creador = $_SESSION['idUsuario'];
    $estado = $_POST["estado"];

    // $sql = "INSERT INTO membresia(nombre, DiasDuracion, estado, creador, fechaCreacion) 
    // VALUES ('$nombre', '$DiasDuracion', '$estado', '$creador', '$fechaCreado')";
    $sql = "INSERT INTO membresia(nombre, DiasDuracion, estado, creador, fechaCreacion) 
    VALUES ('$nombre', '$DiasDuracion', '$estado', '$creador', DATE(NOW()) )";
    
    // echo $sql;
    // return;

    if ($conn->query($sql) === TRUE) {
        echo "Nueva membresia agregada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: ../html/membresia.php");
    exit(); 
} else {
    header("Location: ../html/membresia.php");
    exit();
}
?>
