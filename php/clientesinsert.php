<?php
session_start();
include 'conexion.php';
if(isset($_POST['btnenviar'])){
@$nombre = $_POST['nombre'];
@$apellido = $_POST['apellido'];
@$fechaN = $_POST['fechaN'];
@$sexo = $_POST['sex'];
@$fechaEN = $_POST['FechaEN'];
@$fechaSal = $_POST['FechaSal'];
mysqli_query($con, "insert into clientes(nombre_cli,apellido_cli,fechaN,sexo,FechaEN,FechaSal) values ('$nombre','$apellido','$fechaN','$sexo','$fechaEN','$fechaSal')") or die("No se pudo ingresar el cliente.");
mysqli_close($con);
echo"<script>alert('Se ingreso corectamente.')</script>";
echo "<script>window.location='../html/Clientes.html';</script>";
}

?>