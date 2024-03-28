<?php
session_start();
include 'conexion.php';
if(isset($_POST['btnenviar'])){
@$nombre = $_POST['nombre'];
@$desc = $_POST['desc'];
@$costo = $_POST['precio'];
mysqli_query($con, "insert into articulos(nombre_art,desc_art,costo) values ('$nombre','$desc','$costo')") or die("No se pudo ingresar el cliente.");
mysqli_close($con);
echo"<script>alert('Se ingreso corectamente.')</script>";
echo "<script>window.location='../html/articulos.html';</script>";
}

?>