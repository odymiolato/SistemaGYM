<?php
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $cedula= $_POST['cedula'];
        $fecha=$_POST['fechaN'];
        $sexo=$_POST['sexo'];

      include '../php/conexion.php';
        $sql="UPDATE empleados set nombre='$nombre', apellido='$apellido', cedula='$cedula' fechaN='$fecha' sexo='$sexo' Tipo_emp='$tipo' where id='$id'";
        mysqli_query($con,$sql);
        mysqli_close($con);

        echo "<script>alert('El empleado fue actualizado.');
        window.location='../html/empleados.html';</script>";
    ?>