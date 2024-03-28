<?php
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $fecha=$_POST['fechaN'];
        $sexo=$_POST['sex'];
        $fechaEN=$_POST['fechaEN'];
        $fechaSal= $_POST['fechaSal'];
      include '../php/conexion.php';
        $sql="UPDATE clientes set nombre_cli='$nombre', apellido_cli='$apellido', fechaN='$fecha', sexo='$sexo', FechaEN='$fechaEN', FechaSal='$fechaSal' where id_cli='$id'";
        if(mysqli_query($con,$sql)){
 echo "<script>alert('El cliente fue actualizado.');
 window.location='../html/Clientes.html';</script>";
        }
        else{
          echo "<script>alert(' String(".mysqli_error($con).")');
        window.location='../html/Clientes.html';</script>";
        }
        mysqli_close($con); 
    ?>