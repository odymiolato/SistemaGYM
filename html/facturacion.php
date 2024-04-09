<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url(../css/base.css);
        @import url(../css/facturacion.css);
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
            <div class="dashboard-header">
                <!-- <h1>Facuracion</h1> -->
                <div class="form-facturacion">
                    <h2>Facturacion</h2>
                    <form action="../php/insertar_articulo.php" method="post">
                        <div class="fecha-user">
                            <div class="fecha">
                                <label for="Nombre">Fecha:</label><br>
                                <input type="date" id="Nombre" name="Nombre" required><br>
                            </div>
                            <div class="user">
                                <label for="Nombre">Cliente:</label><br>
                                <div>
                                    <input type="text" id="idPersona" name="idPersona" required readonly><br>
                                    <button class="boton-lupa" type="button" onclick="openModal(4)"><i class="fas fa-search"></i></button>
                                    <input type="text" id="Nombre" name="Nombre" required value="Al Portador"><br>
                                </div>
                            </div>

                        </div>
                        <div class="fecha-user">
                            <div class="user">
                                <label for="ID_Articulo">Articulos:</label><br>
                                <div>
                                    <input type="text" id="ID_Articulo" name="ID_Articulo" required readonly><br>
                                    <button class="boton-lupa" type="button" onclick="openModal(4)"><i class="fas fa-search"></i></button>
                                    <input type="text" id="NombreArt" name="NombreArt" required readonly><br>
                                    <input type="text" id="PrecioArt" name="PrecioArt" required hidden><br>
                                    <input type="number" id="Cantidad" name="Cantidad" required><br>
                                    <button class="boton-lupa" type="button" onclick=""><i class="fas fa-check"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="detalle">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <input type="submit" value="Guardar" name="btn_insertar">
                    </form>
                </div>
            </div>
        </div>
        <div id="Modals" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2 id="titulo-modal"></h2>
                <ul id="lista">
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
<script src="../js/modal.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">