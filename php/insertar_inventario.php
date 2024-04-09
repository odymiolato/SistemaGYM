<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    $ID_Articulo = $_POST["ID_Articulo"];
    $Cantidad_Disponible = $_POST["Cantidad_Disponible"];
    // $tipmov = (($_POST["tipmov"] == 1) ? true : false );
    $tipmov = $_POST["tipmov"];

    $sql = $conn->prepare("INSERT INTO Inventario (ID_Articulo,Cantidad_Disponible,tipmov) VALUES (?, ?, ?)");
    $sql->bind_param("iis", $ID_Articulo, $Cantidad_Disponible, $tipmov); 

    if ($sql->execute()) {
        echo "Nuevo empleado agregado exitosamente";
    } else {
        echo "Error: " . $sql->error;
    }

    $conn->close();
    
    header("Location: ../html/inventario.php");
    exit();
} else {
    header("Location: ../html/inventario.php");
    exit();
}
?>
