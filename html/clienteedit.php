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
        <?php
        $codigo = $_POST['idCliente'];
        $sql = "SELECT * FROM cliente WHERE idCliente = $codigo";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        echo "
         <div class='main-content'>
         <div class='dashboard-header'>
             <h1>Clientes</h1>
             <div class='insert-form'>
                 <h2>Actualizar Clientes</h2>
                 <form action='../php/actualizar_cliente.php' method='post'>

                 <label for='idPersona'>ID Persona:</label><br>
                 <div class='input-btn-bus'>
                     <input type='text' value='" . $row['idCliente'] . "' id='idPersona' name='idPersona' required readonly>
                     <button class='boton-lupa' disabled type='button' onclick='openModal(1)'><i class='fas fa-search'></i></button>
                 </div>


                 <label for='usuario'>ID Membresia:</label><br>
                 <div class='input-btn-bus'>
                     <input type='text' value='" . $row['idMembresia'] . "' id='idMembresia' name='idMembresia' required readonly><br>
                     <button class='boton-lupa' type='button' onclick='openModal(3)'><i class='fas fa-search'></i></button>
                 </div>

                 <label for='limCred'>Limite de Credito:</label><br>
                 <input type='text' value='" . $row['limCred'] . "' id='limCred' name='limCred' required><br>
            
                     <label for='estado'>Estado:</label><br>
                     <select id='estado' name='estado' required>
                     <option " . ($row['estado'] == 1 ? 'selected' : '') . "  value='1'>Activo</option>
                     <option " . ($row['estado'] == 0 ? 'selected' : '') . "  value='0'>Inactivo</option>
                     </select><br>
                     <input type='text' name='idUsuario' value='" . $codigo . "' hidden>
                     <input type='submit' value='Actualizar' name='btn_insertar'>
                 </form>
             </div>
         </div>
     </div>     
         ";
        ?>
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
<script type="text/javascript" src="../js/modal.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">