<?php
session_start();
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    $Nombre = $_POST["Nombre"];
    $Descripcion = $_POST["Descripcion"];
    $Precio = $_POST["Precio"];
    

    $sql = "INSERT INTO Articulos (Nombre, Descripcion, Precio) 
            VALUES ('$Nombre','$Descripcion','$Precio')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo articulo agregado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: ../html/articulos.php");
    exit();
} else {
    header("Location: ../html/articulos.php");
    exit();
}
?>
