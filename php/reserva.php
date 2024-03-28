<?php
 include 'conexion.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
    <link rel="stylesheet" href="../css/csssistema.css" type="text/css">
    <style>
        @import '../css/menu.css';
        @import '../css/csssistema.css';
    </style>
    <script type="text/javascript" src="../js/menu.js"></script>
     <script type="text/javascript" src="../js/funt.js"></script>
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
            <a id="abrir" class="abrir-cerrar" href="javascript:void(0)" onclick="mostrar()">|||</a><a id="cerrar" class="abrir-cerrar" href="#" onclick="ocultar()"></a>
        </div>
       
        <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"763dbd15efc60de9","version":"2022.10.3","r":1,"token":"f0aa520dc035432cb9fe5438c4f03b8b","si":100}' crossorigin="anonymous"></script>
    </div>
    </div>
    <br><br>
    <h2>Modificar o eliminar Reservas.</h2>
    <?php
    $clave = $_POST['clave'];
    $id=$_POST['clave'];
    $result = mysqli_query($con, "SELECT * FROM reserv_ent where id_reserv='$clave'") or die("No se pudo conectar con la tabla.");
    while ($regi = mysqli_fetch_array($result)) {
        echo "
        <div id='Insertar'>
        <form class='form' action='actualizarreservas.php' method='post'>
            <input type='hidden' name='id' value='$id'>
            <Strong>Codigo del entrenador:</Strong>
            <input type='text' name='codent' required value='" . $regi['Id_entrenador'] . "''>
            <Strong>Codigo del cliente:</Strong>
            <input type='text' name='codcli' required value='" . $regi['id_cliente'] . "''><br><br>
            <Strong>Hora inicio:</Strong>
            <input type='time' name='horain' required value='" . $regi['hora_IN'] . "'>
            <Strong>Hora fin:</Strong>
            <input type='time' name='horafin' required value='" . $regi['hora_FIN'] . "'>
            <Strong>Cantidad de dias:</Strong>
            <input type='text' name='cantDias' required value='" . $regi['cant_dias'] . "'>
            <button id='0' type='button' onclick='formu(this.id)'><span>Continuar</span></button><br>
        </form>
        <form class='form' action='eliminarres.php'method='post'>
        <input type='hidden' name='id' value='$id'>
        <button id='1' type='button' name='btneliminar' onclick='formu(this.id)'><span>Eliminar</span></button>
        <a href='../html/reserva.html'><button type='button'><span>Atras</span></button></a>
        </form>
        </div>";
    }
    mysqli_close($con);
    ?>

</body>

</html>