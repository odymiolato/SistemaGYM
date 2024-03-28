async function openModal(accion) {
    document.getElementById("Modals").style.display = "block";
    console.log(accion);

    const lista = document.getElementById("lista");
    lista.innerHTML = '';

    if (accion === 1) {
        document.getElementById("titulo-modal").textContent = "Seleccionar Persona";
        const response = await fetch('http://localhost/SistemaGYM/php/Getpersonas.php');
        const personas = await response.json();

        personas.forEach(persona => {
            const li = document.createElement('li');
            li.textContent = `${persona.nombre} - ID ${persona.idPersona}`;
            li.onclick = function () { select(persona.idPersona,1); };
            lista.appendChild(li);
        });
    } else {
        document.getElementById("titulo-modal").textContent = "Seleccionar Posicion";
        const response = await fetch('http://localhost/SistemaGYM/php/Getposicion.php');
        const posicions = await response.json();

        posicions.forEach(posicion => {
            const li = document.createElement('li');
            li.textContent = `${posicion.posicion} - ID ${posicion.idPosicion}`;
            li.onclick = function () { select(posicion.idPosicion,2); };
            lista.appendChild(li);
        });
    }
}

function closeModal() {
    document.getElementById("Modals").style.display = "none";
}

function select(id, accion) {
    if (accion === 1) {
        document.getElementById("idEmpleado").value = id;
        closeModal();
    } else {
        document.getElementById("idPosicion").value = id;
        closeModal();
    }

}