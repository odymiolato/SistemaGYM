<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="../css/csssistema.css" type="text/css">
    <style>
        @import '../css/menu.css';
        @import '../css/csssistema.css';
    </style>
    <script type="text/javascript" src="../js/menu.js"></script>
    <script type='text/javascript' src="../js/funt.js"></script>
</head>

<body>
    <div id="logos"></div>
    <div>
        <div id="sidebar" class="sidebar">
            <a href="#" class="boton-cerrar" onclick="ocultar()">&times;</a>
            <ul class="menu">
                <li><a href="../html/inicio.html">Inicio</a></li>
                <li><a href="../html/empleados.html">Empleados</a></li>
                <li><a href="../html/Clientes.html">Clientes</a></li>
                <li><a href="../html/reserva.html">Reservas</a></li>
                <li><a href="../html/equipos.html">Equipos</a></li>
                <li><a href="../php/cerrarsesion.php">Cerrar sesion</a></li>
            </ul>
        </div>
        <div id="contenido">
            <a id="abrir" class="abrir-cerrar" href="javascript:void(0)" onclick="mostrar()"><button class="btn">
    <span class="icon">
        <svg viewBox="0 0 175 80" width="40" height="40">
            <rect width="80" height="15" fill="#f0f0f0" rx="10"></rect>
            <rect y="30" width="80" height="15" fill="#f0f0f0" rx="10"></rect>
            <rect y="60" width="80" height="15" fill="#f0f0f0" rx="10"></rect>
        </svg>
    </span>
    <span class="text">MENU</span>
</button></a><a id="cerrar" class="abrir-cerrar" href="#" onclick="ocultar()"></a>
        </div>
       
        <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"763dbd15efc60de9","version":"2022.10.3","r":1,"token":"f0aa520dc035432cb9fe5438c4f03b8b","si":100}' crossorigin="anonymous"></script>
    </div>
    </div>
    <br><br>
    <h2>Modificar o eliminar clientes.</h2>
    <?php
    include 'conexion.php';
    $id=$_POST['clave'];
    $result = mysqli_query($con, "SELECT * FROM clientes where id_cli='$id'") or die("No se pudo conectar con la tabla.");
    while ($regi = mysqli_fetch_array($result)) {
        echo "
        <div id='Insertar'>
        <form class='form' action='actualizarclientes.php' method='post'>
            <Strong>Nombre:</Strong>
            <input type='text' name='nombre' required value='" . $regi['nombre_cli'] . "''>
            <Strong>Apellido:</Strong>
            <input type='text' name='apellido' required value='" . $regi['apellido_cli'] . "'>
            <Strong>Feha de nacimiento:</Strong>
            <input type='date' name='fechaN' required value='" . $regi['fechaN'] . "'><br>
            <Strong>SEXO:</Strong>";
            if ($regi['sexo']=='M') {
            echo "<input type='radio' id='masculino' name='sex' value='M' checked>
            <label for='masculino'>M</label>
            <input type='radio' id='femenino' name='sex' value='F' >
            <label for='femenino'>F</label>";
            }
            else{
              echo "<input type='radio' id='masculino' name='sex' value='M' >
            <label for='masculino'>M</label>
            <input type='radio' id='femenino' name='sex' value='F' checked>
            <label for='femenino'>F</label>";  
            }
            echo"
             <strong>Fecha de ingreso:</strong>  
            <input type='date' name='fechaEN' value='". $regi['FechaEN'] ."' required>
            <Strong>Fecha salida:</Strong>
            <input type='date' name='fechaSal' value='". $regi['FechaSal'] ."' required>
            <input type='hidden' name='id' value='$id'><br>
            <button id='0' type='button' onclick='formu(this.id)'>Actualizar</button>
        </form>
         <form class='form' action='eliminarcli.php'method='post'>
        <input type='hidden' name='id' value='$id'>
        <button id='1' type='button' name='btneliminar' onclick='formu(this.id)'>Eliminar</button>
        <a href='../html/equipos.html'><button type='button'><span>Atras</span></button></a>
        </form>
        </div>";
    }
    mysqli_close($con);
    ?>

</body>

</html>