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
        @import url(../css/usuarios.css);
        @import url(../css/menuarc.css);
        @import url(../css/ventas.css);
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
            <div class="main-content">
                <div class="dashboard-header">
                    <h1>Ventas</h1>
                </div>
            </div>
            <div class="table-header">
                <!-- <button class="new-btn" onclick="redirectToNewUserPage()">Nuevo Movimiento</button> -->
                <div class="filtro-container">
                <input type="text" id="filtro" placeholder="Buscar...">
                </div>
                
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Factura</th>
                        <th>Fecha</th>
                        <th>Codigo Cliente</th>
                        <th>Nombre Cliente</th>
                        <th class="number">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT 
                                ventas.numfac,
                                ventas.IdCliente,
                                ventas.nombreCli,
                                ventas.fecha,
                                ventas.total
                            FROM ventas ";

                    $result = $conn->query($sql);


                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr id='" . $row['numfac'] . "' class='fila-venta'>";
                            echo "<td ondblclick = 'openModal(".$row['numfac'].")'>" . $row['numfac'] . "</td>";
                            echo "<td ondblclick = 'openModal(".$row['numfac'].")'>" . $row['fecha'] . "</td>";
                            echo "<td ondblclick = 'openModal(".$row['numfac'].")'>" . $row['IdCliente'] . "</td>";
                            echo "<td ondblclick = 'openModal(".$row['numfac'].")'>" . $row['nombreCli'] . "</td>";
                            echo "<td class='number' ondblclick = 'openModal(".$row['numfac'].")'>" . $row['total'] . "</td>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>El inventario esta vacio.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
        <div id="Modals" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2 id="titulo-modal">Detalle Venta</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th class="number">Precio</th>
                            <th class="number">Cantidad</th>
                            <th class="number">Importe</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-modal" class="table-body-modal"></tbody>
                </table>
            </div>
        </div>
</body>

</html>
<script type="text/javascript" src="../js/accordion.js"></script>
<script type="text/javascript" src="../js/venrtas.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">