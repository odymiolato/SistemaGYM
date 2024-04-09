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
            <!-- Contenido de la barra superior, como un menú de navegación u otra información -->
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
            <div class="main-content">
                <div class="dashboard-header">
                    <h1>Inventario</h1>
                </div>
            </div>
            <div class="table-header">
                <button class="new-btn" onclick="redirectToNewUserPage()">Nuevo Movimiento</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Articulo</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT 
                                inv.ID_Inventario ,
                                (SELECT Nombre FROM Articulos AS art WHERE art.ID_Articulo = inv.ID_Articulo) AS NomArt,
                                 inv.Cantidad_Disponible 
                            FROM Inventario AS inv";

                    $result = $conn->query($sql);


                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['ID_Inventario'] . "</td>";
                            echo "<td>" . $row['NomArt'] . "</td>";
                            echo "<td>" . $row['Cantidad_Disponible'] . "</td>";
    
                            // echo "<td>" . ($row['estado'] ? 'Activo' : 'Inactivo') . "</td>";

                            // echo "<td><div style='display:flex;'>";
                            // echo "<form id='eliminar" . $row['idUsuario'] . "' action='usuariosedit.php' method='post'>
                            //         <input type='text' name='idUsuario' value='" . $row['idUsuario'] . "' hidden>
                            //         <button class='edit-btn' onclick='editarUsuario(" . $row['idUsuario'] . ")'>Editar</button>
                            //     </form>";
                            // echo "<form id='editar" . $row['idUsuario'] . "' action='../php/eliminar_usuario.php' method='post'>
                            //         <input type='text' name='idUsuario' value='" . $row['idUsuario'] . "' hidden>
                            //         <button class='delete-btn' onclick='eliminarUsuario(" . $row['idUsuario'] . ")'>Eliminar</button>
                            //     </form>";
                            // echo "</div></td>";
                            // echo "</tr>";
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
        </script>
</body>

</html>