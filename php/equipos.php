<?php
session_start();
?>
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
                <li><a href="../html/inicio.php">Inicio</a></li>
                <li><a href="../html/empleados.html">Empleados</a></li>
                <li><a href="../html/Clientes.html">Clientes</a></li>
                <li><a href="../html/articulos.html">Articulos</a></li>
                <li><a href="#">Ventas</a></li>
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
    <h2>Modificar o eliminar equipos.</h2>
    <?php
    $clave = $_POST['clave'];
    include 'conexion.php';
    $id=$_POST['clave'];
    $result = mysqli_query($con, "SELECT * FROM equipos where id_equipo='$clave'") or die("No se pudo conectar con la tabla.");
    while ($regi = mysqli_fetch_array($result)) {
        echo "
        <div id='Insertar'>
        <form class='form' action='actualizarequipos.php' method='post'>
            <input type='hidden' name='id' value='$id'>
            <Strong>Nombre:</Strong>
            <input type='text' name='nombre' required value='" . $regi['nom_equipo'] . "''>
            <Strong>Musculo:</Strong>
            <input type='text' name='mus' required value='" . $regi['mus_equipo'] . "''>
            <Strong>Numero:</Strong>
            <input type='text' name='num' required value='" . $regi['num_equipo'] . "'>
            <button id='0' type='button' onclick='formu(this.id)'>Continuar</button><br>
        </form>
        <form class='form' action='eliminareqp.php'method='post'>
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