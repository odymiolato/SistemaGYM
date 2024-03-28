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
                        <th>Nombre</th>
                        <th>Membresia</th>
                        <th>Limite de credito</th>
                        <th>Creador</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT 
                                cli.idCliente,
                                per.nombre,
                                mem.idMembresia,
                                mem.nombre as nommem,
                                cli.limCred,
                                usu.usuario,
                                cli.estado
                            FROM cliente cli
                                INNER JOIN persona per ON per.idPersona = cli.idCliente
                                INNER JOIN membresia mem ON mem.idMembresia = cli.idMembresia
                                INNER JOIN usuario usu ON usu.idUsuario = cli.creador";

                    $result = $conn->query($sql);


                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['idCliente'] . "</td>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['nommem'] . "</td>";
                            echo "<td>" . $row['limCred'] . "</td>";
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
                window.location.href = "clientesnew.php";
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