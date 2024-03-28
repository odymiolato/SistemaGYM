async function openModal(accion) {
	document.getElementById("Modals").style.display = "block";
	console.log(accion);

	const lista = document.getElementById("lista");
	lista.innerHTML = "";
	let response;
	let personas
	switch (accion) {
		case 1:
			document.getElementById("titulo-modal").textContent =
				"Seleccionar Persona";
			response = await fetch(
				"http://localhost/SistemaGYM/php/Getpersonas.php"
			);
			personas = await response.json();

			personas.forEach((persona) => {
				const li = document.createElement("li");
				li.textContent = `${persona.nombre} - ID ${persona.idPersona}`;
				li.onclick = function () {
					select(persona.idPersona, 1);
				};
				lista.appendChild(li);
			});
			break;

		case 2:
			document.getElementById("titulo-modal").textContent =
				"Seleccionar Posicion";
			response = await fetch(
				"http://localhost/SistemaGYM/php/Getposicion.php"
			);
			 posicions = await response.json();

			posicions.forEach((posicion) => {
				const li = document.createElement("li");
				li.textContent = `${posicion.posicion} - ID ${posicion.idPosicion}`;
				li.onclick = function () {
					select(posicion.idPosicion, 2);
				};
				lista.appendChild(li);
			});
			break;

		case 3:
			document.getElementById("titulo-modal").textContent =
				"Seleccionar Membresia";
			response = await fetch(
				"http://localhost/SistemaGYM/php/Getmembresia.php"
			);
			posicions = await response.json();

			posicions.forEach((posicion) => {
				const li = document.createElement("li");
				li.textContent = `${posicion.posicion} - ID ${posicion.idPosicion}`;
				li.onclick = function () {
					select(posicion.idPosicion, 3);
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

function select(id, accion) {
	switch (accion) {
		case 1:
			document.getElementById("idEmpleado").value = id;
			closeModal();
			break;

		case 2:
			document.getElementById("idPosicion").value = id;
			closeModal();
			break;

		case 3:
			break;
			document.getElementById("idMembresia").value = id;
			closeModal();
		default:
			break;
	}
}
