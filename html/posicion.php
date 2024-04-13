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
            <div class="btn-regre" style="margin-left: -1em;">
                <button class="cta" style="margin-left: -2px  ;">
                    <svg width="15px" height="10px" viewBox="0 0 13 10">
                        <path d="M1,5 L11,5"></path>
                        <polyline points="8 1 12 5 8 9"></polyline>
                    </svg>
                    <span>Regresar</span>
                </button>
            </div>
            <div class="main-content">
                <div class="dashboard-header">
                    <h1>Posicion</h1>
                </div>
            </div>
            <div class="table-header">
                <button class="new-btn" onclick="redirectToNewUserPage()">Nuevo</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Posicion</th>
                        <th>Sueldo</th>
                        <th>Descripcion</th>
                        <th>Creado</th>
                        <th>Creador</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM posicion";
                    $result = $conn->query($sql);


                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['idPosicion'] . "</td>";
                            echo "<td>" . $row['posicion'] . "</td>";
                            echo "<td>" . $row['sueldo'] . "</td>";
                            echo "<td>" . $row['descripcion'] . "</td>";
                            echo "<td>" . $row['creador'] . "</td>";
                            echo "<td>" . ($row['estado'] ? 'Activo' : 'Inactivo') . "</td>";

                            echo "<td><div style='display:flex;'>";
                            echo "<form id='eliminar" . $row['idPosicion'] . "' action='posiciomedit.php' method='post'>
                                    <input type='text' name='idPosicion' value='" . $row['idPosicion'] . "' hidden>
                                    <button class='edit-btn' onclick='editarUsuario(" . $row['idPosicion'] . ")'>Editar</button>
                                </form>";
                            echo "<form id='editar" . $row['idPosicion'] . "' action='../php/eliminar_posicion.php' method='post'>
                                    <input type='text' name='idPosicion' value='" . $row['idPosicion'] . "' hidden>
                                    <button class='delete-btn' onclick='eliminarUsuario(" . $row['idPosicion'] . ")'>Eliminar</button>
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
                window.location.href = "posicionnew.php";
            }

            function editarUsuario(idPosicion) {
                const myForm = window.document.getElementById('editar' + idPosicion);
                myForm.submit();
                console.log('Editar usuario con ID:', idPosicion);
            }

            function eliminarUsuario(idPosicion) {
                const myForm = window.document.getElementById('eliminar' + idPosicion);
                myForm.submit();
                console.log('Eliminar usuario con ID:', idPosicion);
            }
        </script>
</body>

</html>