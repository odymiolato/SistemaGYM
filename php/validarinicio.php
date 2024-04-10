<?php
include 'conexion.php';

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $psw = md5($_POST['pass']);

    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND psw = '$psw'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['idUsuario'] = $row['idUsuario'];
        header("Location: ../html/inicio.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}

$conn->close();
?>
