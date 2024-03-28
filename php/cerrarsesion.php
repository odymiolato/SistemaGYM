<?php
session_start();
 if (! empty($_SESSION["usuario"])) 
  {
    echo "<a href='../php/cerrarsesion.php' title='Cerrar sesión'>Bienvenid@</a>" . 
        $_SESSION["usuario"] . " (" . $_SESSION["cliente"] . ")";
  }
setcookie("usuario", "", time() - 3600);
session_destroy();
header('location:../index.html');
?>
