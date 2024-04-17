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
            </ul>

        </aside>
        <div class="main-content">
            <div class="main-content">
                <div class="dashboard-header">
                    button class="cta">
                    <span></span>
                    <svg width="15px" height="10px" viewBox="0 0 13 10">
                        <path d="M1,5 L11,5"></path>
                        <polyline points="8 1 12 5 8 9"></polyline>
                    </svg>
                    </button>


                    <h1>Usuario</h1>
                </div>
            </div>
            <div class="table-header">
                <button class="new-btn" onclick="redirectToNewUserPage()">Nuevo</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM usuario";
                    $result = $conn->query($sql);


                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['idUsuario'] . "</td>";
                            echo "<td>" . $row['usuario'] . "</td>";
                            echo "<td>" . ($row['estado'] ? 'Activo' : 'Inactivo') . "</td>";

                            echo "<td><div style='display:flex;'>";
                            echo "<form id='eliminar" . $row['idUsuario'] . "' action='usuariosedit.php' method='post'>
                                    <input type='text' name='idUsuario' value='" . $row['idUsuario'] . "' hidden>
                                    <button class='edit-btn' onclick='editarUsuario(" . $row['idUsuario'] . ")'>Editar</button>
                                </form>";
                            echo "<form id='editar" . $row['idUsuario'] . "' action='../php/eliminar_usuario.php' method='post'>
                                    <input type='text' name='idUsuario' value='" . $row['idUsuario'] . "' hidden>
                                    <button class='delete-btn' onclick='eliminarUsuario(" . $row['idUsuario'] . ")'>Eliminar</button>
                                </form>";
                            echo "</div></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No se encontraron usuarios.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

        <script>
            function redirectToNewUserPage() {
                window.location.href = "usuariosnew.php";
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
        </script>
</body>

</html>
<script type="text/javascript" src="../js/accordion.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">