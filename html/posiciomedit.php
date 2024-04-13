<?php
include '../php/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url(../css/base.css);
        @import url(../css/usuariosnew.css);
        @import url(../css/menuarc.css);
    </style>
</head>

<body>
    <div class="container">
        <aside class="sidebar-top">
            <!-- Contenido de la barra superior, como un menú de navegación u otra información -->
        </aside>
        <aside class="sidebar-left">
            <img src="../img/Logo.png" alt="Logo" class="logo">

            <ul id="accordion" class="accordion">
                <li>
                    <div class="link"><i class="fa fa-tasks"></i>Procesos<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li><a href="inventario.php">Inventario</a></li>
                        <li><a href="facturacion.php">Facturacion</a></li>
                    </ul>
                </li>
                <li>
                    <div class="link"><i class="fa-solid fa-plus"></i>Panel de Control<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li><a href="usuarios.php">Usuario</a></li>
                        <li><a href="personas.php">Persona</a></li>
                        <li><a href="posicion.php">Posicion</a></li>
                        <li><a href="empleados.php">Empleado</a></li>
                        <li><a href="clientes.php">Cliente</a></li>
                        <li><a href="membresia.php">Membresia</a></li>
                        <li><a href="articulos.php">Articulos</a></li>
                    </ul>
                </li>
                <li>
                    <div class="link"><i class="fa fa-wrench"></i>Mantenimiento<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li><a href="#">Cambios Usuario</a></li>
                        <li><a href="#">Cambios Membresia</a></li>
                    </ul>
                </li>
            </ul>
        </aside>
        <?php
        $codigo = $_POST['idPosicion'];
        $sql = "SELECT * FROM posicion WHERE idPosicion = $codigo";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        echo "
         <div class='main-content'>
         <div class='dashboard-header'>
             <h1>Usuario</h1>
             <div class='insert-form'>
                 <h2>Actualizar Posicion</h2>
                 <form action='../php/actualizar_posicion.php' method='post'>

                 <label for='posicion'>Posicion:</label><br>
                        <input type='text' value='" . $row['posicion'] . "' id='posicion' name='posicion' required><br>

                        <label for='sueldo'>Sueldo:</label><br>
                        <input type='text' value='" . $row['sueldo'] . "' id='sueldo' name='sueldo' required><br>

                        <label for='descripcion'>Descripcion:</label><br>
                        <input type='text' value='" . $row['descripcion'] . "' id='descripcion' name='descripcion' required><br>

                        <label for='creador'>Creador:</label><br>
                        <input type='text' value='" . $row['creador'] . "' id='creador' name='creador' required><br>

                        <label for='estado'>Estado:</label><br>
                        <select id='estado' name='estado' required>
                        <option " . ($row['estado'] == 1 ? 'selected' : '') . "  value='1'>Activo</option>
                        <option " . ($row['estado'] == 0 ? 'selected' : '') . "  value='0'>Inactivo</option>
                        </select><br>
 
                 <input type='text' name='idPosicion' value='" . $row['idPosicion'] . "' hidden>    
                 <input type='submit' value='Actualizar' name='btn_insertar'>
                 </form>
             </div>
         </div>
     </div>     
         ";
        ?>

    </div>
</body>

</html>