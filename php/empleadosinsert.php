<?php
session_start();
include 'conexion.php';
$result = mysqli_query($con,"SELECT * FROM empleados") or die("No se pudo conectar con la tabla");
if(isset($_POST['btnenviar'])){
while ($row=mysqli_fetch_array($result)) {
    if ($row['cedula']== $_POST['cedula']) {
        $pregu=1;
    }
    }
if ($pregu > 0) {
    echo"<script>alert('Esa cedula ya le pertenece a un empleado.')</script>";
    echo "<script>window.location='../html/empleados.html';</script>";
}
else{
@$nombre = $_POST['nombre'];
@$apellido = $_POST['apellido'];
@$cedula = $_POST['cedula'];
@$fechaN = $_POST['fechaN'];
@$tipo= $_POST['tipo'];
@$sexo= $_POST['sex'];
mysqli_query($con, "insert into empleados(nombre , apellido ,cedula,sexo, fechaN,Tipo_emp) values ('$nombre','$apellido','$cedula','$sexo','$fechaN','$tipo')");
mysqli_close($con);
echo"<script>alert('Se ingreso corectamente.')</script>";
echo "<script>window.location='../html/empleados.html';</script>";
}
}
?>