<?php
session_start();
include 'conexion.php';
$sql="select * from empleados";
if(!empty($_POST["apellido"])){
    $sql=$sql . " where apellido like '%".$_POST["apellido"]. "%' ";
}
if (@$_POST["tipo"]!=="0") {
    @$sql= $sql . " where Tipo_emp='".$_POST["tipo"]."' ";
}
$result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver empleados</title>
    <link rel="stylesheet" href="../css/csssistema.css" type="text/css">
     <style>
       @import '../css/menu.css';
       @import '../css/csssistema.css';
    </style>
    <script type="text/javascript" src="../js/menu.js"></script>
</head>
<body>
     <div>
        <div id="sidebar" class="sidebar">
            <a href="#" class="boton-cerrar" onclick="ocultar()">&times;</a>
            <ul class="menu">
                <li><a href="../html/inicio.php">Inicio</a></li>
                <li><a href="../html/empleados.html">Empleados</a></li>
                <li><a href="../html/clientes.html">Clientes</a></li>
                <li><a href="../html/articulos.html">Articulos</a></li>
                <li><a href="#">Ventas</a></li>
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
    <div id="Insertar" align="center">
    <div id="consultas" align="center">
    <h1>Consultas</h1>
    <form action="verempleados.php" method="post">
        <strong>Por apellido:</strong>
        <input type="text" name="apellido">
        <strong>Por tipo:</strong>
        <select name="tipo" id="tipo" class='styled-select'>
            <option value="0">Seleccionar</option>
            <option value="entrenador">Entrenador</option>
            <option value="limpiesa">Limpiesa</option>
            <option value="secretaria">Secretaria</option>
        </select><br><br>
        <button type="submit">Consultar</button>
    </form>
    </div>
    <div id ="tabla" align='center'>
        <table border='1' class="styled-table">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
            <th>Fecha De Nacimiento</th>
            <th>Sexo</th>
            <th>Cargo del empleado</th>
        </tr>
        <?php
        
            while($row=mysqli_fetch_array($result))
            {
                printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $row["id"], $row["nombre"], $row["apellido"],$row["cedula"],$row['fechaN'],$row['sexo'],$row['Tipo_emp']);
            }
            mysqli_free_result($result);
            mysqli_close($con);
        ?>
        </table>
        <a href="../html/empleados.html"><button type="button">Atras</button></a>
    </div>
    </div>
</body>
</html>