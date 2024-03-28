<?php
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $cedula= $_POST['cedula'];
        $fecha=$_POST['fechaN'];
        $sexo=$_POST['sex'];
        $tipo=$_POST['tipo'];
      include '../php/conexion.php';
        $sql="UPDATE empleados set nombre='$nombre', apellido='$apellido', cedula='$cedula' ,fechaN='$fecha', sexo='$sexo', Tipo_emp='$tipo' where id='$id'";
        if(mysqli_query($con,$sql)){
 echo "<script>alert('El empleado fue actualizado.');
 window.location='../html/empleados.html';</script>";
        }
        else{
          echo "<script>alert(' String(".mysqli_error($con).")');
        window.location='../html/empleados.html';</script>";
        }
        mysqli_close($con); 
    ?>