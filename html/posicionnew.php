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
                <li>
                <div class="link"><i class="fa-solid fa-magnifying-glass"></i>Consultas<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                        <li><a href="ventas.php">Ventas</a></li>
                        <li><a href="movimientos.php">Movimientos</a></li>
                    </ul>
                </li>
            </ul>
        </aside>
        <div class="main-content">
            <div class="dashboard-header">
                <h1>Personas</h1>
                <div class="insert-form">
                    <h2>Nueva Posicion</h2>
                    <form action="../php/insertar_posicion.php" method="post">
                        <label for="posicion">Posicion:</label><br>
                        <input type="text" id="posicion" name="posicion" required><br>

                        <label for="sueldo">Sueldo:</label><br>
                        <input type="text" id="sueldo" name="sueldo" required><br>

                        <label for="descripcion">Descripcion:</label><br>
                        <input type="text" id="descripcion" name="descripcion" required><br>

                        <label for="creador">Creador:</label><br>
                        <input type="text" id="creador" name="creador" required><br>

                        <label for="estado">Estado:</label><br>
                        <select id="estado" name="estado" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select><br>

                        <input type="submit" value="Guardar" name="btn_insertar">
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
<script type="text/javascript" src="../js/accordion.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">