<?php
include '../php/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_insertar'])) {

    $idUsuario = $_POST['idUsuario'];
    $usuario = $_POST['usuario'];
    $psw = $_POST['psw'];
    $estado = $_POST['estado'];

    $sql = "UPDATE usuario SET usuario=?, psw=?, estado=? WHERE idUsuario=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssii", $usuario, $psw, $estado, $idUsuario);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Usuario actualizado correctamente.";
            header("Location: ../html/usuarios.php");
            exit();
        } else {
            echo "No se pudo actualizar el usuario.";
        }
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
