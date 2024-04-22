<?php
// session_start();
// if (empty($_SESSION['idUsuario'])){
//     echo "Ladronaso";
//     return;
// }

include '../php/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona</title>
    <style>
        @import url(../css/base.css);
        @import url(../css/usuarios.css);
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



        </aside>
        <div class="main-content">
            <div class="main-content">
                <div class="dashboard-header">
                    <h1>Empleados</h1>
                </div>
            </div>
            <div class="table-header">
                <button class="new-btn" onclick="redirectToNewUserPage()">Nuevo</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Posicion</th>
                        <th>fechaEntrada</th>
                        <th>Estado</th>
                        <th>Accion</th>
                        <th>Creador</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT
                                EMP.idEmpleado,
                                PER.nombre,
                                POS.idPosicion,
                                POS.posicion,
                                EMP.fechaEntrada,
                                EMP.estado,
                                U.idUsuario,
                                U.usuario
                            FROM empleado AS EMP
                                INNER JOIN persona PER on EMP.idEmpleado = PER.idPersona
                                INNER JOIN posicion POS on EMP.idPosicion = POS.idPosicion      
                                INNER JOIN  usuario u on EMP.creador = u.idUsuario ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['idEmpleado'] . "</td>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['posicion'] . "</td>";
                            echo "<td>" . $row['fechaEntrada'] . "</td>";
                            echo "<td>" . $row['usuario'] . "</td>";
                            echo "<td>" . ($row['estado'] ? 'Activo' : 'Inactivo') . "</td>";



                            echo "<td><div style='display:flex;'>";
                            echo "<form id='eliminar" . $row['idEmpleado'] . "' action='empleadoedit.php' method='post'>
                                    <input type='text' name='idEmpleado' value='" . $row['idEmpleado'] . "' hidden>
                                    <button class='edit-btn' onclick='editarUsuario(" . $row['idEmpleado'] . ")'>Editar</button>
                                </form>";
                            echo "<form id='editar" . $row['idEmpleado'] . "' action='../php/eliminar_empleado.php' method='post'>
                                    <input type='text' name='idPersona' value='" . $row['idEmpleado'] . "' hidden>
                                    <button class='delete-btn' onclick='eliminarUsuario(" . $row['idEmpleado'] . ")'>Eliminar</button>
                                </form>";
                            echo "</div></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No se encontraron usuarios.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

        <script>
            function redirectToNewUserPage() {
                window.location.href = "empleadonew.php";
            }

            function editarUsuario(idEmpleado) {
                const myForm = window.document.getElementById('editar' + idUsuario);
                myForm.submit();
                console.log('Editar usuario con ID:', idEmpleado);
            }

            function eliminarUsuario(idEmpleado) {
                const myForm = window.document.getElementById('eliminar' + idEmpleado);
                myForm.submit();
                console.log('Eliminar usuario con ID:', idEmpleado);
            }
        </script>
</body>

</html>
<script type="text/javascript" src="../js/accordion.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">