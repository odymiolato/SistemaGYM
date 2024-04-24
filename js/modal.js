async function openModal(accion) {
	document.getElementById("Modals").style.display = "block";
	console.log(accion);

	const lista = document.getElementById("lista");
	const table = document.getElementById("table-body-modal");

	let response;
	let data;
	switch (accion) {
		case 1:
			lista.innerHTML = "";
			document.getElementById("titulo-modal").textContent = "Seleccionar Persona";

			response = await fetch(
				"http://localhost/SistemaGYM/php/Getpersonas.php"
			);
			data = await response.json();

			data.forEach((persona) => {
				const li = document.createElement("li");
				li.textContent = `${persona.nombre} - ID ${persona.idPersona}`;
				li.onclick = function () {
					select(persona.idPersona, 1);
				};
				lista.appendChild(li);
			});
			break;

		case 2:
			lista.innerHTML = "";
			document.getElementById("titulo-modal").textContent = "Seleccionar Posicion";

			response = await fetch(
				"http://localhost/SistemaGYM/php/Getposicion.php"
			);
			data = await response.json();

			data.forEach((posicion) => {
				const li = document.createElement("li");
				li.textContent = `${posicion.posicion} - ID ${posicion.idPosicion}`;
				li.onclick = function () {
					select(posicion.idPosicion, 2);
				};
				lista.appendChild(li);
			});
			break;

		case 3:
			lista.innerHTML = "";
			document.getElementById("titulo-modal").textContent = "Seleccionar Membresia";

			response = await fetch(
				"http://localhost/SistemaGYM/php/Getmembresia.php"
			);
			data = await response.json();

			data.forEach((membresia) => {
				const li = document.createElement("li");
				li.textContent = `${membresia.nombre} - ID ${membresia.idMembresia}`;
				li.onclick = function () {
					select(membresia.idMembresia, 3);
				};
				lista.appendChild(li);
			});
			break;

		case 4:
			document.getElementById("titulo-modal").textContent = "Seleccionar Articulo";

			response = await fetch(
				"http://localhost/SistemaGYM/php/Getarticulos.php"
			);
			data = await response.json();

			table.innerHTML = "";
			data.forEach((articulo) => {
				let tr = document.createElement("tr");

				let colID = document.createElement("td");
				colID.textContent = articulo.ID_Articulo;

				let colNombre = document.createElement("td");
				colNombre.textContent = articulo.Nombre;


				// li.textContent = `${articulo.Nombre} - ID ${articulo.ID_Articulo}`;
				colID.onclick = function () {
					select(articulo.ID_Articulo, 4, articulo.Nombre, articulo.Precio);
				};
				colNombre.onclick = function () {
					select(articulo.ID_Articulo, 4, articulo.Nombre, articulo.Precio);
				};

				tr.appendChild(colID)
				tr.appendChild(colNombre)

				table.appendChild(tr);
			});
			break;
		case 5:
			document.getElementById("titulo-modal").textContent = "Seleccionar Cliente";
			table.innerHTML = "";

			response = await fetch(
				"http://localhost/SistemaGYM/php/Getclientes.php"
			);
			data = await response.json();
			console.log(data);


			data.forEach((cliente) => {
				let tr = document.createElement("tr");

				let colID = document.createElement("td")
				colID.textContent = cliente.idCliente;

				let colNombre = document.createElement("td")
				colNombre.textContent = cliente.nombre;

				colID.onclick = function () {
					select(cliente.idCliente, 5, cliente.nombre);
				};

				colNombre.onclick = function () {
					select(cliente.idCliente, 5, cliente.nombre);
				};

				tr.appendChild(colID);
				tr.appendChild(colNombre);

				table.appendChild(tr);

			});
			break;

		default:
			break;
	}
}

function closeModal() {
	document.getElementById("Modals").style.display = "none";
}

function select(id, accion, value = "", precio = "") {
	console.log(value);
	switch (accion) {
		case 1:
			document.getElementById("idPersona").value = id;
			closeModal();
			break;

		case 2:
			document.getElementById("idPosicion").value = id;
			closeModal();
			break;

		case 3:
			document.getElementById("idMembresia").value = id;
			closeModal();
			break;

		case 4:
			document.getElementById("ID_Articulo").value = id;
			if (document.getElementById("NombreArt")) {
				document.getElementById("NombreArt").value = value;
			}
			if (document.getElementById("PrecioArt")) {
				document.getElementById("PrecioArt").value = precio;
			}
			closeModal();
			break;
		case 5:
			document.getElementById("idCliente").value = id;
			if (document.getElementById("NombreCli")) {
				document.getElementById("NombreCli").value = value;
			}
			closeModal();
			break;
		default:
			break;
	}
}
