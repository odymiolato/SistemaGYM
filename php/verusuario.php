<?php
session_start();
include 'conexion.php';
$sql="select * from usuario";
if(!empty($_POST["usu"])){
    $sql=$sql . " where nombre_usu='".$_POST["usu"]."'";
}
$result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="stylesheet" href="../css/csssistema.css" type="text/css">
     <style>
        @import '../css/menu.css';
    </style>
    <script type="text/javascript" src="../js/menu.js"></script>
</head>
<body>
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
    <div id="Insertar">
    <div id="consultas" align="center">
    <h2>Consultas</h2>
    <form action="verusuario.php" method="post">
        <strong>Por Nombre de usuario:</strong>
        <input type="text" name="usu">
        <button type="submit" name="btnconsulta"><span>Consultar</span></button>
    </form>
    </div>
    <br>
    <br>
    <div id ="tabla" align='center'>
        <table border='1' class="styled-table">
        <tr>
            <th>Id</th>
            <th>usuario</th>
            <th>Contraseña</th>
            <th>Rol</th>
        </tr>
        <?php
        
            while($row=mysqli_fetch_array($result))
            {
                printf ("<tr>
                <td align='center'>%s</td>
                <td align='center'>%s</td>
                <td align='center'>%s</td>
                <td align='center'>%s</td>  
                </tr>", $row["id"], $row["nombre_usu"], $row["password"],$row['tipo']);
            }
            mysqli_free_result($result);
            mysqli_close($con);
        ?>
        </table>
        <h2 style="text-align='center'"> Eliminar un usuario</h2>
        <form action="eliminareusu.php" method="post">
            <strong>Codigo</strong><br>
        <input type="text" name="codusu" require><br><br>
        <button type="submit"><span>Eliminar</span></button>
        <a href="../html/usuarios.html"><button type="button"><span>Atras</span></button></a>
        </form>
    </div>
    </div>
</body>
</html>