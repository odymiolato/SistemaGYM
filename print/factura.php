<?
include "../php/conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style type="text/css">
    @import url(../css/factura.css);
</style>

<body>
    <div class="container">
        <div class="box-1">
            <div class="logo-company">
            <img src="../img/Logo.png" alt="img">
                <div class="label">
                    <h3>Master Gym</h5>
                        <h4>123 Calle Ficticia, Ciudad Imaginaria, País de las Maravillas</h5>
                            <h4>809-123-4567</h5>
                </div>
            </div>
        </div>
        <div class="box-2">
            <div class="fecha">
                <h4 for="">Fecha:</h4>
                <h4>20/10/2024</h4>
            </div>
            <div class="cliente">
                <h4 for="nomcli">Cliente:</h4>
            </div>
        </div>
        <div class="box-3">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th class="number">Precio</th>
                    <th class="number">Cantidad</th>
                    <th class="number">Importe</th>
                </thead>
                <tbody>
                    <td>test</td>
                    <td>test</td>
                    <td class="number">test</td>
                    <td class="number">test</td>
                    <td class="number">test</td>
                </tbody>
            </table>
        </div>
        <div class="box-4">
            <div class="total">
                <h4>Total:</h4>
            </div>
        </div>
    </div>
</body>

</html>