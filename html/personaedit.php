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
        $codigo = $_POST['idPersona'];
        $sql = "SELECT * FROM persona WHERE idPersona = $codigo";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        echo "
         <div class='main-content'>
         <div class='dashboard-header'>
             <h1>Usuario</h1>
             <div class='insert-form'>
                 <h2>Actualizar Persona</h2>
                 <form action='../php/actualizar_persona.php' method='post'>

                 <label for='nombre'>Nombre:</label><br>
                 <input type='text' value=" . $row['nombre'] . " id='nombre' name='nombre' required><br>

                 <label for='apellido'>Apellido:</label><br>
                 <input type='text' value=" . $row['apellido'] . " id='apellido' name='apellido' required><br>

                 <label for='cedula'>Cedula:</label><br>
                 <input type='text' value=" . $row['cedula'] . " id='cedula' name='cedula' required><br>

                 <label for='direccion'>Direccion:</label><br>
                 <input type='text' value=" . $row['direccion'] . " id='direccion' name='direccion' required><br>

                 <label for='telefono'>telefono:</label><br>
                 <input type='text' value=" . $row['telefono'] . " id='telefono' name='telefono' required><br>

                 <label for='email'>Email:</label><br>
                 <input type='text' value=" . $row['email'] . " id='email' name='email' required><br>

                 <input type='text' name='idPersona' value='" . $row['idPersona'] . "' hidden>    
                 <input type='submit' value='Actualizar' name='btn_insertar'>
                 </form>
             </div>
         </div>
     </div>     
         ";
        ?>

    </div>
</body>

</html>