async function openModal(accion) {
	document.getElementById("Modals").style.display = "block";
	console.log(accion);

	const lista = document.getElementById("lista");
	lista.innerHTML = "";
	let response;
	let data;
	switch (accion) {
		case 1:
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


			data.forEach((articulo) => {
				const li = document.createElement("li");
				li.textContent = `${articulo.Nombre} - ID ${articulo.ID_Articulo}`;
				li.onclick = function () {
					select(articulo.ID_Articulo, 4, articulo.Nombre, articulo.Precio);
				};
				lista.appendChild(li);
			});
			break;
		case 5:
			document.getElementById("titulo-modal").textContent = "Seleccionar Cliente";

			response = await fetch(
				"http://localhost/SistemaGYM/php/Getclientes.php"
			);
			data = await response.json();
			console.log(data);


			data.forEach((cliente) => {
				const li = document.createElement("li");
				li.textContent = `${cliente.nombre} - ID ${cliente.idCliente}`;
				li.onclick = function () {
					select(cliente.idCliente, 5, cliente.nombre);
				};
				lista.appendChild(li);
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
