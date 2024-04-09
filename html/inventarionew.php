<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url(../css/base.css);
        @import url(../css/usuariosnew.css);
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

                    <li><a href="usuarios.php">Usuario</a></li>
                    <li><a href="personas.php">Persona</a></li>
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
                <h1>Inventario</h1>
                <div class="insert-form">
                    <h2>Nuevo Movimiento</h2>
                    <form action="../php/insertar_persona.php" method="post">
                        <label for="ID_Articulo">Articulo:</label><br>
                        <div class="input-btn-bus">
                            <input type="text" id="ID_Articulo" name="ID_Articulo" required readonly>
                            <button class="boton-lupa" type="button" onclick="openModal(4)"><i class="fas fa-search"></i></button>
                        </div>

                        <label for="apellido">Cantidad:</label><br>
                        <input type="text" id="apellido" name="apellido" required><br>

                        <label for="estado">Tipo de Movimiento:</label><br>
                        <select id="estado" name="estado" required>
                            <option value="1">Entrada</option>
                            <option value="0">Salida</option>
                        </select><br>

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