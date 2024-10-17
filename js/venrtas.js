const tabla = document.getElementById("table-body-modal");
async function openModal(numfac) {
	document.getElementById("Modals").style.display = "block";
	tabla.innerHTML = "";

		const response = await fetch(
				"http://localhost/SistemaGYM/php/getDetalleVenta.php",{
					method:"POST",
					body: numfac
				}
			);
			let data = await response.json();
			data.forEach((element) => {

				let tr = document.createElement("tr");
				let colCodigo = document.createElement("td");
				colCodigo.textContent = element.ID_Articulo;

				let colNombre = document.createElement("td");
				colNombre.textContent = element.NombreArticulo;

				let colPrecio = document.createElement("td");
				colPrecio.classList.add("number");
				colPrecio.textContent = element.precio;

				let colCantidad = document.createElement("td"); 
				colCantidad.classList.add("number");
				colCantidad.textContent = element.cantidad;

				let	colImporte = document.createElement("td");
				colImporte.classList.add("number");
				colImporte.textContent = element.ilmporte;

				tr.appendChild(colCodigo);
				tr.appendChild(colNombre);
				tr.appendChild(colPrecio);
				tr.appendChild(colCantidad);
				tr.appendChild(colImporte);

				tabla.appendChild(tr);
			});
}

function closeModal() {
	document.getElementById("Modals").style.display = "none";
}


function redirectToNewUserPage() {
	window.location.href = "inventarionew.php";
}

function editarUsuario(idUsuario) {
	const myForm = window.document.getElementById('editar' + idUsuario);
	myForm.submit();
	console.log('Editar usuario con ID:', idUsuario);
}

function eliminarUsuario(idUsuario) {
	const myForm = window.document.getElementById('eliminar' + idUsuario);
	myForm.submit();
	console.log('Eliminar usuario con ID:', idUsuario);
}
const filtroInput = document.getElementById('filtro');
const filasVentas = document.getElementsByClassName('fila-venta');


filtroInput.addEventListener('keyup', function() {
	const filtro = filtroInput.value.toLowerCase();

	for (let i = 0; i < filasVentas.length; i++) {
		const textoFila = filasVentas[i].innerText.toLowerCase();
		
		if (textoFila.includes(filtro)) {
			filasVentas[i].style.display = 'table-row';
		} else {
			filasVentas[i].style.display = 'none';
		}
	}
});