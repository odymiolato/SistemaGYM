<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo=$_POST['idPersona'];
    $registro= $conn->query("SELECT * FROM empleado where idEmpleado = $codigo")
or die("Problemas con el select: ".$conn->error);

$conn->query("DELETE FROM empleado WHERE idEmpleado = $codigo");
 $result = $conn->query( "SELECT * FROM empleado where idEmpleado= $codigo AND estado = 1") or die("No se pudo conectar con la tabla.");

 if ($result->num_rows > 0) {
        echo "<script>
        alert('El empleado no fue eliminado.');
        window.location='../html/empleados.php';
        </script>";
    }
    else{
        echo "<script>
        alert('El empleado fue eliminado.');
        window.location='../html/empleados.php';
        </script>";
    }
}
$conn->close();
?>