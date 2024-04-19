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
    limpiar();
}

function limpiar(){
    document.getElementById("ID_Articulo").value = "";
    document.getElementById("NombreArt").value = "";
    document.getElementById("Cantidad").value = "";
}

async function GetExistencia(idArt,cantidad) {
    const resp = await fetch(
        'http://localhost/SistemaGYM/php/GetExistenciaArt.php', {
        method: "POST",
        body: idArt
    }
    );
    const existencia = await resp.json();
    console.log(existencia);

    if (parseInt(existencia.existencia) <= 0) {
        alert("La existencia de este artciulo debe ser mayor que 0...");
        return false;
    }

    if (cantidad > parseInt(existencia.existencia)) {
        alert(`No posees esta cantidad de articulos, su existencia actual es de (${existencia.existencia})...`);
        return false;
    }
    return true;
}

async function AddArt(idArt, cantidad) {

    if(! await GetExistencia(idArt,cantidad)){
        return;
    }

    if (ListDetalle.length > 0) {
        if (UpadateArt(idArt, cantidad)) {
            return;
        }
    }

    const response = await fetch(
        'http://localhost/SistemaGYM/php/GetOnearticulo.php', {
        method: 'POST',
        body: JSON.stringify({ ID_Articulo: idArt }),
    }
    );
    const data = await response.json();

    const detalle = VentaDetalle(data.ID_Articulo, data.Nombre, cantidad, data.Precio);

    ListDetalle.push(detalle);
    // console.log(ListDetalle);

    const tabla = document.getElementById('table-body');
    const tr = document.createElement('tr');
    let colid = document.createElement('td');
    let colnom = document.createElement('td');
    let colprecio = document.createElement('td');
    let colcant = document.createElement('td');
    let colimporte = document.createElement('td');

    colid.textContent = detalle.ID_Articulo;
    colid.setAttribute("name", "colid");
    colid.setAttribute("ondblclick", `editar(${detalle.ID_Articulo})`);

    colnom.textContent = detalle.nombre;
    colnom.setAttribute("name", "colnom");
    colnom.setAttribute("ondblclick", `editar(${detalle.ID_Articulo})`);

    colprecio.textContent = detalle.precio;
    colprecio.setAttribute("name", "colprecio");
    colprecio.setAttribute("ondblclick", `editar(${detalle.ID_Articulo})`);

    colcant.textContent = detalle.cantidad;
    colcant.setAttribute("name", "colcant");
    colcant.setAttribute("ondblclick", `editar(${detalle.ID_Articulo})`);

    colimporte.textContent = detalle.importe;
    colimporte.setAttribute("name", "colimporte");
    colimporte.setAttribute("ondblclick", `editar(${detalle.ID_Articulo})`);

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

    if (!document.getElementById(`${codigo}`)) {
        return;
    }

    const row = document.getElementById(`${codigo}`);
    const cells = row.getElementsByTagName('td');
    cells[3].textContent = cant;
    cells[4].textContent = parseFloat(cells[2].textContent) * cant;

    for (var i in ListDetalle) {
        if (ListDetalle[i].ID_Articulo == codigo) {
            ListDetalle[i].cantidad = cant;
            break;
        }
    }
    return true;
}

function editar(codigo) {
    console.log(`Hola elemento ${codigo}`);
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

function validar() {
    let nombrecli = document.getElementById('NombreCli');
    if (nombrecli.value === "") {
        alert('El nombre del cliente no puede estar vacio...');
        return false;
    }

    if (ListDetalle.length <= 0) {
        alert('Debe de ingrear como minimo un aritculo...');
        return false;
    }
    return true;
}
async function Guardar() {

    if (!validar()) {
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