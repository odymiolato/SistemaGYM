<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo=$_POST['idUsuario'];
    $registro= $conn->query("SELECT * FROM usuario where idUsuario= $codigo")
or die("Problemas con el select: ".$conn->error);

$conn->query("UPDATE usuario SET estado = 0 WHERE idUsuario=$codigo");
 $result = $conn->query( "SELECT * FROM usuario where idUsuario= $codigo AND estado = 1") or die("No se pudo conectar con la tabla.");

 if ($result->num_rows > 0) {
        echo "<script>
        alert('EL usuario no fue eliminado.');
        window.location='../html/usuarios.php';
        </script>";
    }
    else{
        echo "<script>
        alert('EL usuario fue eliminado.');
        window.location='../html/usuarios.php';
        </script>";
    }
}
$conn->close();
?>