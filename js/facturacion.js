const ListDetalle = [];
function Aceptar() {
    let ID_Articulo = document.getElementById("ID_Articulo").value;
    let cantidad = document.getElementById("Cantidad").value;


    if (ID_Articulo === "") {
        alert("Debe de selecccionar un articulo");
        return;
    }

    if (cantidad === "") {
        alert("Debe de ingresar la cantidad");
        return;
    }

    AddArt(ID_Articulo, cantidad);
}

async function AddArt(idArt, cantidad) {

    const response = await fetch(
        'http://localhost/SistemaGYM/php/GetOnearticulo.php', {
        method: 'POST',
        body: JSON.stringify({ ID_Articulo: idArt }),
    }
    );
    const data = await response.json();

    const detalle = VentaDetalle(data.ID_Articulo, data.Nombre, cantidad, data.Precio);

    ListDetalle.push(detalle);
    console.log(ListDetalle);

    const tabla = document.getElementById('table-body');
    const tr = document.createElement('tr');
    let colid = document.createElement('td');
    let colnom = document.createElement('td');
    let colprecio = document.createElement('td');
    let colcant = document.createElement('td');
    let colimporte = document.createElement('td');

    colid.textContent = detalle.ID_Articulo;
    colnom.textContent = detalle.nombre;
    colprecio.textContent = detalle.precio;
    colcant.textContent = detalle.cantidad;
    colimporte.textContent = detalle.importe;

    tr.appendChild(colid);
    tr.appendChild(colnom);
    tr.appendChild(colprecio);
    tr.appendChild(colcant);
    tr.appendChild(colimporte);

    tabla.appendChild(tr);
    return;
}

function VentaDetalle(ID_Articulo, nombre, cantidad, precio) {
    const obj = {
        ID_Articulo: ID_Articulo,
        nombre: nombre,
        cantidad: cantidad,
        precio: precio,
        importe: (cantidad * precio)
    }
    return obj;
}

async function Guardar() {

    const idcli = document.getElementById("idCliente").value;
    const nombreCli = document.getElementById("NombreCli").value;
    const fecha = document.getElementById("fecha").value;

    const venta = {
        idcli: idcli,
        nombreCli: nombreCli,
        fecha: fecha,
        detalle: ListDetalle,
    }

}