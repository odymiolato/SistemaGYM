<?php
include '../php/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_insertar'])) {

    $ID_Articulo = $_POST['ID_Articulo'];
    $Nombre = $_POST['Nombre'];
    $Descripcion = $_POST['Descripcion'];
    $Precio  = $_POST['Precio'];

    $sql = "UPDATE Articulos SET   Nombre = ?, Descripcion = ? , Precio = ? WHERE ID_Articulo = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssii", $Nombre, $Descripcion, $Precio, $ID_Articulo);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "articulo actualizado correctamente.";
            header("Location: ../html/articulos.php");
            exit();
        } else {
            echo "No se pudo actualizar el articulo.";
        }
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
