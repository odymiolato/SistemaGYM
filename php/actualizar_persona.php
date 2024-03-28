<?php
include '../php/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_insertar'])) {

    $idPersona = $_POST['idPersona'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $sql = "UPDATE persona SET nombre=?, apellido=?, cedula=?, direccion=?, telefono=?, email=? WHERE idPersona=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssssi", $nombre, $apellido, $cedula, $direccion, $telefono, $email, $idPersona);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Persona actualizada correctamente.";
            header("Location: ../html/personas.php");
            exit();
        } else {
            echo "No se pudo actualizar la persona.";
        }
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
