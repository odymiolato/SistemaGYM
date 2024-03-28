<?php
session_start();
include 'conexion.php';

include 'conexion.php';
if(isset($_POST['btnenviar'])){
@$nombre = $_POST['nombre'];
@$mus = $_POST['mus'];
@$num = $_POST['num'];
mysqli_query($con, "insert into equipos(nom_equipo , mus_equipo ,num_equipo) values ('$nombre','$mus','$num')");
mysqli_close($con);
echo"<script>alert('Se ingreso corectamente.')</script>";
echo "<script>window.location='../html/equipos.html';</script>";
}

?>