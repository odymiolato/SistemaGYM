<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url(../css/base.css);
        @import url(../css/menuarc.css);
        @import url(../css/menuarc.css);
    </style>
</head>

<body>
    <div class="container">
        <aside class="sidebar-top">
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
                        <li><a href="#">Movimientos</a></li>
                    </ul>
                </li>
            </ul>

            <!-- <details>
                <summary>
                    <i class="fa fa-tasks"></i>Procesos<i class="fa fa-chevron-down"></i>
                </summary>
                <ul >
                        <li><a href="inventario.php">Inventario</a></li>
                        <li><a href="facturacion.php">Facturacion</a></li>
                    </ul>
            </details> -->
        </aside>

        <div class="main-content">
            <div class="main-content">
                <div class="dashboard-header">
                    <h1>Dashboard</h1>
                </div>
                <div class="dashboard-grid">
                    <div class="card" id="card-1">Widget 1</div>
                    <div class="card" id="card-2">Widget 2</div>
                    <div class="card" id="card-3">Widget 3</div>
                    <div class="card" id="card-4">Widget 4</div>

                    <div class="card" id="card-pie-chart">
                        <canvas id="pieChart"></canvas>
                    </div>
                    <div class="card" id="card-bar-chart">
                        <canvas id="barChart"></canvas>
                    </div>
                    <!-- Añade más widgets según sea necesario -->
                </div>
            </div>

        </div>
    </div>
    <!-- <script type="text/javascript" src="../js/graficos.js"></script> -->
    <!-- <script type="text/javascript" src="../js/accordion.js"></script> -->
</body>

</html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<script type="text/javascript" src="../js/accordion.js"></script>