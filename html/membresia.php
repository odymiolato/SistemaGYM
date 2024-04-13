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
            </ul>

        </aside>
        <div class="main-content">
            <div class="main-content">
                <div class="dashboard-header">
                    <h1>Membresias</h1>
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
                        <th>Duracion</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM membresia";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['idMembresia'] . "</td>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['DiasDuracion'] . "</td>";
                            echo "<td>" . ($row['estado'] ? 'Activo' : 'Inactivo') . "</td>";


                            echo "<td><div style='display:flex;'>";
                            echo "<form id='eliminar" . $row['idMembresia'] . "' action='membresiaedit.php' method='post'>
                                    <input type='text' name='idMembresia' value='" . $row['idMembresia'] . "' hidden>
                                    <button class='edit-btn' onclick='editarUsuario(" . $row['idMembresia'] . ")'>Editar</button>
                                </form>";
                            echo "<form id='editar" . $row['idMembresia'] . "' action='../php/eliminar_membresia.php' method='post'>
                                    <input type='text' name='idMembresia' value='" . $row['idMembresia'] . "' hidden>
                                    <button class='delete-btn' onclick='eliminarUsuario(" . $row['idMembresia'] . ")'>Eliminar</button>
                                </form>";
                            echo "</div></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se encontraron membresias.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

        <script>
            function redirectToNewUserPage() {
                window.location.href = "membresianew.php";
            }

            function editarUsuario(idMembresia) {
                const myForm = window.document.getElementById('editar' + idUsuario);
                myForm.submit();
                console.log('Editar usuario con ID:', idMembresia);
            }

            function eliminarUsuario(idMembresia) {
                const myForm = window.document.getElementById('eliminar' + idMembresia);
                myForm.submit();
                console.log('Eliminar usuario con ID:', idMembresia);
            }
        </script>
</body>

</html>