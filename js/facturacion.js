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

    ListDetalle.forEach((element) => {
        if (element.ID_Articulo === idArt) {

            return;
        }
    });

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
    colid.setAttribute("name", "colid");
    colnom.textContent = detalle.nombre;
    colnom.setAttribute("name", "colnom");
    colprecio.textContent = detalle.precio;
    colprecio.setAttribute("name", "colprecio");
    colcant.textContent = detalle.cantidad;
    colcant.setAttribute("name", "colcant");
    colimporte.textContent = detalle.importe;
    colcant.setAttribute("name", "colcant");

    tr.setAttribute("id", `${detalle.ID_Articulo}`);
    tr.appendChild(colid);
    tr.appendChild(colnom);
    tr.appendChild(colprecio);
    tr.appendChild(colcant);
    tr.appendChild(colimporte);

    tabla.appendChild(tr);
    return;
}

function UpadateArt(codigo, cant) {
    const tr = document.getElementById(codigo);
    for (const child of tr.children) {
        console.log(child.tagName);
    }

    for (var i in ListDetalle) {
        if (ListDetalle[i].ID_Articulo == codigo) {
            ListDetalle[i].cantidad = cant;
            break;
        }
    }
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

    if (ListDetalle.length <= 0) {
        alert("Debe de agregar como minimo un articulo.");
        return;
    }

    const idcli = document.getElementById("idCliente").value;
    const nombreCli = document.getElementById("NombreCli").value;
    const fecha = document.getElementById("fecha").value;
    let total = 0;

    ListDetalle.forEach((element) => {
        total += element.importe;
    });

    const venta = {
        idcli: idcli,
        nombreCli: nombreCli,
        fecha: fecha,
        total: total,
        detalle: ListDetalle,
    }
    console.log(venta);

    // const response = await fetch(
    //     'http://localhost/SistemaGYM/php/SendVenta.php',{
    //         method: "POST",
    //         body: JSON.stringify(venta)
    //     }
    // );
}