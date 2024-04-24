<?php
include "../php/conexion.php";

$numfac = $_POST['numfac'];

$sql = "SELECT 
            ventas.numfac,
            ventas.IdCliente,
            ventas.nombreCli,
            ventas.fecha,
            ventas.total,
            Ventas_detalle.ID_Articulo,
            (SELECT Nombre FROM articulos WHERE articulos.ID_Articulo = Ventas_detalle.ID_Articulo)NombreArticulo,
            Ventas_detalle.precio,
            Ventas_detalle.cantidad,
            Ventas_detalle.ilmporte   
        FROM ventas 
            INNER JOIN Ventas_detalle ON Ventas_detalle.numfac = ventas.numfac
        WHERE ventas.numfac = $numfac";

$sql2 = "SELECT
            ventas.numfac,
            ventas.IdCliente,
            ventas.nombreCli,
            ventas.fecha,
            ventas.total
        FROM ventas 
        WHERE ventas.numfac = $numfac";




$resul = $conn->query($sql);
$resul2 = $conn->query($sql2);

if ($resul->num_rows <= 0) {
    echo "Problemas para imprimir";
    return;
}

if ($resul2->num_rows <= 0) {
    echo "Problemas para imprimir";
    return;
}

$temp = $resul2->fetch_assoc();

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
                <h4 for="">Numero Factura: <?php echo $temp['numfac']; ?></h4>
            </div>
            <div class="fecha">
                <h4 for="">Fecha: <?php echo $temp['fecha']; ?></h4>
                <h4>20/10/2024</h4>
            </div>
            <div class="cliente">
                <h4 for="nomcli">Cliente: <?php echo $temp['IdCliente'] . "-" . $temp['nombreCli']; ?></h4>
            </div>
        </div>
        <div class="box-3">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th class="number">Precio</th>
                        <th class="number">Cantidad</th>
                        <th class="number">Importe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $resul->fetch_array()) { ?>
                        <tr>
                            <td><?php echo $row['ID_Articulo']; ?></td>
                            <td><?php echo $row['NombreArticulo']; ?></td>
                            <td class="number"><?php echo $row['precio']; ?></td>
                            <td class="number"><?php echo $row['cantidad']; ?></td>
                            <td class="number"><?php echo $row['ilmporte']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="box-4">
            <div class="total">
                <h4>Total: <?php echo $temp['total']; ?></h4>
            </div>
        </div>
    </div>
</body>

</html>
<?php $conn->close(); ?>
<script>
    window.print();
    window.onafterprint = () => {
        window.location.assign("http://localhost/SistemaGYM/html/facturacion.php");
    };
</script>