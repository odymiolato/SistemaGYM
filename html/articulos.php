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
    </style>
</head>

<body>
    <div class="container">
        <aside class="sidebar-top">
        </aside>
        <aside class="sidebar-left">
            <img src="pngwing.com.png" alt="Logo" class="logo">

            <details>
                <summary>Procesos</summary>
                <ul>
                    <li><a href="#">Sesion Entrenamiento</a></li>
                    <li><a href="#">Clase</a></li>
                </ul>
            </details>
            <details>
                <summary>Panel de Control</summary>
                <ul>
                    <li><a href="#">Usuario</a></li>
                    <li><a href="#">Persona</a></li>
                    <li><a href="#">Empleado</a></li>
                    <li><a href="#">Cliente</a></li>
                    <li><a href="#">Membresia</a></li>
                </ul>
            </details>
            <details>
                <summary>Mantenimiento</summary>
                <ul>
                    <li><a href="#">Cambios Usuario</a></li>
                    <li><a href="#">Cambios Empleado</a></li>
                    <li><a href="#">Cambios Cliente</a></li>
                    <li><a href="#">Cambios Membresia</a></li>
                </ul>
            </details>

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
                    <h1>Articulos</h1>
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
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM Articulos";

                    $result = $conn->query($sql);


                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['ID_Articulo'] . "</td>";
                            echo "<td>" . $row['Nombre'] . "</td>";
                            echo "<td>" . $row['Descripcion'] . "</td>";
                            echo "<td>" . $row['Precio'] . "</td>";

                            echo "<td><div style='display:flex;'>";
                            echo "<form id='eliminar" . $row['ID_Articulo'] . "' action='articuloedit.php' method='post'>
                                    <input type='text' name='ID_Articulo' value='" . $row['ID_Articulo'] . "' hidden>
                                    <button class='edit-btn' onclick='editarUsuario(" . $row['ID_Articulo'] . ")'>Editar</button>
                                </form>";
                            echo "<form id='editar" . $row['ID_Articulo'] . "' action='../php/eliminar_cliente.php' method='post'>
                                    <input type='text' name='ID_Articulo' value='" . $row['ID_Articulo'] . "' hidden>
                                    <button class='delete-btn' onclick='eliminarUsuario(" . $row['ID_Articulo'] . ")'>Eliminar</button>
                                </form>";
                            echo "</div></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No se encontraron articulos.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

        <script>
            function redirectToNewUserPage() {
                window.location.href = "articulonew.php";
            }

            function editarUsuario(ID_Articulo) {
                const myForm = window.document.getElementById('editar' + ID_Articulo);
                myForm.submit();
                console.log('Editar articulos con ID:', ID_Articulo);
            }

            function eliminarUsuario(ID_Articulo) {
                const myForm = window.document.getElementById('eliminar' + ID_Articulo);
                myForm.submit();
                console.log('Eliminar articulo con ID:', ID_Articulo);
            }
        </script>
</body>

</html>
<script type="text/javascript" src="../js/modal.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">