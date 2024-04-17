<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url(../css/base.css);
        @import url(../css/usuariosnew.css);
        @import url(../css/menuarc.css);
    </style>
</head>

<body>
    <div class="container">
        <aside class="sidebar-top">
            <!-- Contenido de la barra superior, como un menú de navegación u otra información -->
        </aside>
        <aside class="sidebar-left">

        </aside>
        <div class="main-content">
            <div class="dashboard-header">
                <h1>Inventario</h1>
                <div class="insert-form">
                    <h2>Nuevo Movimiento</h2>
                    <form action="../php/insertar_inventario.php" method="post">
                        <label for="ID_Articulo">Articulo:</label><br>
                        <div class="input-btn-bus">
                            <input type="text" id="ID_Articulo" name="ID_Articulo" required readonly>
                            <button class="boton-lupa" type="button" onclick="openModal(4)"><i class="fas fa-search"></i></button>
                        </div>

                        <label for="insertar_inventario">Cantidad:</label><br>
                        <input type="text" id="Cantidad_Disponible" name="Cantidad_Disponible" required><br>

                        <label for="tipmov">Tipo de Movimiento:</label><br>
                        <select id="tipmov" name="tipmov" required>
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
<script type="text/javascript" src="../js/accordion.js"></script>
