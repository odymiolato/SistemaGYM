<?php
// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = new mysqli("localhost", "root", "", "gymproject");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("La conexión falló: " . $conexion->connect_error);
    }

    // Obtener los datos del formulario
    $usuario = $_POST["usuario"];
    $psw = md5($_POST["psw"]);
    $estado = $_POST["estado"];

    // Preparar la consulta SQL para insertar un nuevo usuario
    $sql = "INSERT INTO usuario (usuario, psw, estado) VALUES ('$usuario', '$psw', '$estado')";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        echo "Nuevo usuario agregado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
    
    // Redireccionar al documento de usuario
    header("Location: usuario.php");
    exit();
} else {
    // Si no se recibieron datos por POST, redireccionar al documento de usuario
    header("Location: usuario.php");
    exit();
}
?>
