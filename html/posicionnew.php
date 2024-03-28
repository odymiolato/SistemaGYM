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
                <h1>Personas</h1>
                <div class="insert-form">
                    <h2>Nueva Posicion</h2>
                    <form action="../php/insertar_posicion.php" method="post">
                        <label for="posicion">Posicion:</label><br>
                        <input type="text" id="posicion" name="posicion" required><br>

                        <label for="sueldo">Sueldo:</label><br>
                        <input type="text" id="sueldo" name="sueldo" required><br>

                        <label for="descripcion">Descripcion:</label><br>
                        <input type="text" id="descripcion" name="descripcion" required><br>

                        <label for="creador">Creador:</label><br>
                        <input type="text" id="creador" name="creador" required><br>

                        <label for="estado">Estado:</label><br>
                        <select id="estado" name="estado" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select><br>

                        <input type="submit" value="Guardar" name="btn_insertar">
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>