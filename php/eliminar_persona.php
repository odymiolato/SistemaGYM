<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['idPersona'];
    $registro= $conn->query("SELECT * FROM persona where idPersona= $codigo")
or die("Problemas con el select: ".$conn->error);

$conn->query("DELETE FROM persona WHERE idPersona=$codigo");
 $result = $conn->query( "SELECT * FROM persona where idPersona= $codigo") or die("No se pudo conectar con la tabla.");

 if ($result->num_rows > 0) {
        echo "<script>
        alert('EL usuario no fue eliminado.');
        window.location='../html/personas.php';
        </script>";
        exit();
    }
    else{
        echo "<script>
        alert('EL usuario fue eliminado.');
        window.location='../html/personas.php';
        </script>";
        exit();
    }
}
$conn->close();
?>