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
                        <li><a href="#">Movimientos</a></li>
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
                        <th>Total</th>
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
                            echo "<tr class='fila-venta'>";
                            echo "<td>" . $row['numfac'] . "</td>";
                            echo "<td>" . $row['fecha'] . "</td>";
                            echo "<td>" . $row['IdCliente'] . "</td>";
                            echo "<td>" . $row['nombreCli'] . "</td>";
                            echo "<td>" . $row['total'] . "</td>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>El inventario esta vacio.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

        <script>
            function redirectToNewUserPage() {
                window.location.href = "inventarionew.php";
            }

            function editarUsuario(idUsuario) {
                const myForm = window.document.getElementById('editar' + idUsuario);
                myForm.submit();
                console.log('Editar usuario con ID:', idUsuario);
            }

            function eliminarUsuario(idUsuario) {
                const myForm = window.document.getElementById('eliminar' + idUsuario);
                myForm.submit();
                console.log('Eliminar usuario con ID:', idUsuario);
            }
            const filtroInput = document.getElementById('filtro');
            const filasVentas = document.getElementsByClassName('fila-venta');


            filtroInput.addEventListener('keyup', function() {
                const filtro = filtroInput.value.toLowerCase();

                for (let i = 0; i < filasVentas.length; i++) {
                    const textoFila = filasVentas[i].innerText.toLowerCase();

                    // Mostrar la fila si coincide con el filtro, ocultarla si no
                    if (textoFila.includes(filtro)) {
                        filasVentas[i].style.display = 'table-row';
                    } else {
                        filasVentas[i].style.display = 'none';
                    }
                }
            });
        </script>
</body>

</html>
<script type="text/javascript" src="../js/accordion.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">