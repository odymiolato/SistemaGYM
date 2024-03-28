<?php
include 'conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    $usuario = $_POST["usuario"];
    $psw = md5($_POST["psw"]);
    $estado = $_POST["estado"];

    $sql = "INSERT INTO usuario (usuario, psw, estado) VALUES ('$usuario', '$psw', '$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo usuario agregado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    
    header("Location: ../html/usuarios.php");
    exit();
} else {
    header("Location: ../html/usuarios.php");
    exit();
}
?>
