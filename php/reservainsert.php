<?php
session_start();
include 'conexion.php';

include 'conexion.php';
if(isset($_POST['btnenviar'])){
@$ent = $_POST['codent'];
@$cli = $_POST['codcli'];
@$horain = $_POST['horaIN'];
@$horafin = $_POST['horaFIN'];
@$cantDia= $_POST['cantDia'];
mysqli_query($con, "insert into reserv_ent(Id_entrenador,id_cliente,hora_IN, hora_FIN,cant_dias) values ('$ent','$cli','$horain','$horafin','$cantDia')");
mysqli_close($con);
echo"<script>alert('Se ingreso corectamente.')</script>";
echo "<script>window.location='../html/reserva.html';</script>";
}

?>