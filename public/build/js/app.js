let paso = 1;
const pasoInicial = 1,
      pasoIntermedio = 4;  
      pasoFinal = 3,
      cita = {
          id: "",
          nombre: "",
          fecha: "",
          hora: "",
          servicios: []
      };

function iniciarApp() {
    mostrarSeccion();
    tabs();
    botonesPaginador();
    paginaSiguiente();
    paginaAnterior();
    consultarAPI();
    consultarProfesionales();
    idCliente();
    nombreCliente();
    seleccionarFecha();
    seleccionarHora();
    mostrarResumen();
}

function mostrarSeccion() {
    const seccionAnterior = document.querySelector(".mostrar");
    seccionAnterior && seccionAnterior.classList.remove("mostrar");

    const pasoActual = `#paso-${paso}`;
    document.querySelector(pasoActual).classList.add("mostrar");

    const tabAnterior = document.querySelector(".actual");
    tabAnterior && tabAnterior.classList.remove("actual");

    document.querySelector(`[data-paso="${paso}"]`).classList.add("actual");
}

function tabs() {
    document.querySelectorAll(".tabs button").forEach(button => {
        button.addEventListener("click", e => {
            e.preventDefault();
            paso = parseInt(e.target.dataset.paso);
            mostrarSeccion();
            botonesPaginador();
        });
    });
}

function botonesPaginador() {
    const btnAnterior = document.querySelector("#anterior"),
          btnSiguiente = document.querySelector("#siguiente");

    if (paso === pasoInicial) {
        btnAnterior.classList.add("ocultar");
        btnSiguiente.classList.remove("ocultar");
    } else if (paso === pasoFinal) {
        btnAnterior.classList.remove("ocultar");
        btnSiguiente.classList.add("ocultar");
        mostrarResumen();
    } else {
        btnAnterior.classList.remove("ocultar");
        btnSiguiente.classList.remove("ocultar");
    }

    mostrarSeccion();
}

function paginaAnterior() {
    document.querySelector("#anterior").addEventListener("click", () => {
        if (paso > pasoInicial) {
            paso--;
            botonesPaginador();
        }
    });
}

function paginaSiguiente() {
    document.querySelector("#siguiente").addEventListener("click", () => {
        if (paso < pasoFinal) {
            paso++;
            botonesPaginador();
        }
    });
}

async function consultarAPI() {
    try {
        const url = "http://localhost:3000/api/servicios",
              response = await fetch(url),
              servicios = await response.json();
        mostrarServicios(servicios);
    } catch (error) {
        console.log(error);
    }
}

async function consultarProfesionales() {
    try {
        const url = "http://localhost:3000/api/profesionales";
        const resultado = await fetch(url);
        const profesionales = await resultado.json();
        mostrarProfesionales(profesionales);
    } catch (error) {
        console.log(error);
    }
}

function mostrarProfesionales(profesionales) {
    const container = document.querySelector("#profesionales");

    profesionales.forEach(profesional => {
        const { id, nombre, apellido, especialidad } = profesional;

        const nombreProfesional = document.createElement('P');
        nombreProfesional.classList.add('nombre-profesional');
        nombreProfesional.textContent = `${nombre} ${apellido}`;

        const especialidadProfesional = document.createElement('P');
        especialidadProfesional.classList.add('especialidad-profesional');
        especialidadProfesional.textContent = `Especialidad: ${especialidad}`;

        const profesionalDiv = document.createElement('DIV');
        profesionalDiv.classList.add('profesional');
        profesionalDiv.dataset.idProfesional = id;

        profesionalDiv.appendChild(nombreProfesional);
        profesionalDiv.appendChild(especialidadProfesional);

        container.appendChild(profesionalDiv);
    });
}

function mostrarServicios(servicios) {
    servicios.forEach(servicio => {
        const { id, nombre, precio } = servicio;

        const nombreServicio = document.createElement("P");
        nombreServicio.classList.add("nombre-servicio");
        nombreServicio.textContent = nombre;

        const precioServicio = document.createElement("P");
        precioServicio.classList.add("precio-servicio");
        precioServicio.textContent = `$${precio}`;

        const servicioDiv = document.createElement("DIV");
        servicioDiv.classList.add("servicio");
        servicioDiv.dataset.idServicio = id;
        servicioDiv.onclick = () => seleccionarServicio(servicio);

        servicioDiv.appendChild(nombreServicio);
        servicioDiv.appendChild(precioServicio);
        document.querySelector("#servicios").appendChild(servicioDiv);
    });
}

function seleccionarServicio(servicio) {
    const { id } = servicio,
          { servicios } = cita,
          servicioDiv = document.querySelector(`[data-id-servicio="${id}"]`);

    if (servicios.some(servicio => servicio.id === id)) {
        cita.servicios = servicios.filter(servicio => servicio.id !== id);
        servicioDiv.classList.remove("seleccionado");
    } else {
        cita.servicios = [...servicios, servicio];
        servicioDiv.classList.add("seleccionado");
    }
}

function idCliente() {
    cita.id = document.querySelector("#id").value;
}

function nombreCliente() {
    cita.nombre = document.querySelector("#nombre").value;
}

function seleccionarFecha() {
    document.querySelector("#fecha").addEventListener("input", e => {
        const dia = new Date(e.target.value).getUTCDay();
        if ([6, 0].includes(dia)) {
            e.target.value = "";
            mostrarAlerta("Fines de semana no permitidos", "error", ".formulario");
        } else {
            cita.fecha = e.target.value;
        }
    });
}

function seleccionarHora() {
    document.querySelector("#hora").addEventListener("input", e => {
        const hora = e.target.value.split(":")[0];
        if (hora < 10 || hora > 18) {
            e.target.value = "";
            mostrarAlerta("Hora No Válida", "error", ".formulario");
        } else {
            cita.hora = e.target.value;
        }
    });
}

function mostrarAlerta(mensaje, tipo, elemento, autoEliminar = true) {
    const alertaPrevia = document.querySelector(".alerta");
    if (alertaPrevia) {
        alertaPrevia.remove();
    }

    const alerta = document.createElement("DIV");
    alerta.textContent = mensaje;
    alerta.classList.add("alerta", tipo);
    document.querySelector(elemento).appendChild(alerta);

    if (autoEliminar) {
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }
}

function mostrarResumen() {
    const resumenDiv = document.querySelector(".contenido-resumen");
    resumenDiv.innerHTML = "";

    if (Object.values(cita).includes("") || cita.servicios.length === 0) {
        mostrarAlerta("Faltan datos de Servicios, Fecha u Hora", "error", ".contenido-resumen", false);
        return;
    }

    const { nombre, fecha, hora, servicios } = cita;

    const resumenServicios = document.createElement("H3");
    resumenServicios.textContent = "Resumen de Servicios";
    resumenDiv.appendChild(resumenServicios);

    servicios.forEach(servicio => {
        const { nombre, precio } = servicio;

        const contenedorServicio = document.createElement("DIV");
        contenedorServicio.classList.add("contenedor-servicio");

        const nombreServicio = document.createElement("P");
        nombreServicio.textContent = nombre;

        const precioServicio = document.createElement("P");
        precioServicio.innerHTML = `<span>Precio:</span> $${precio}`;

        contenedorServicio.appendChild(nombreServicio);
        contenedorServicio.appendChild(precioServicio);
        resumenDiv.appendChild(contenedorServicio);
    });

    const resumenCita = document.createElement("H3");
    resumenCita.textContent = "Resumen de Cita";
    resumenDiv.appendChild(resumenCita);

    const nombreCliente = document.createElement("P");
    nombreCliente.innerHTML = `<span>Nombre:</span> ${nombre}`;

    const fechaCita = new Date(fecha),
          opcionesFecha = { weekday: "long", year: "numeric", month: "long", day: "numeric" },
          fechaFormateada = new Date(Date.UTC(fechaCita.getFullYear(), fechaCita.getMonth(), fechaCita.getDate() + 2)).toLocaleDateString("es-MX", opcionesFecha);

    const fechaCliente = document.createElement("P");
    fechaCliente.innerHTML = `<span>Fecha:</span> ${fechaFormateada}`;

    const horaCliente = document.createElement("P");
    horaCliente.innerHTML = `<span>Hora:</span> ${hora} Horas`;

    const botonReservar = document.createElement("BUTTON");
    botonReservar.classList.add("boton");
    botonReservar.textContent = "Reservar Cita";
    botonReservar.onclick = reservarCita;

    resumenDiv.appendChild(nombreCliente);
    resumenDiv.appendChild(fechaCliente);
    resumenDiv.appendChild(horaCliente);
    resumenDiv.appendChild(botonReservar);
}

async function reservarCita() {
    const { nombre, fecha, hora, servicios, id } = cita,
          serviciosIds = servicios.map(servicio => servicio.id),
          formData = new FormData();

    formData.append("fecha", fecha);
    formData.append("hora", hora);
    formData.append("usuarioId", id);
    formData.append("servicios", serviciosIds);

    try {
        const url = "http://localhost:3000/api/citas",
              response = await fetch(url, { method: "POST", body: formData }),
              resultado = await response.json();

        if (resultado.resultado) {
            Swal.fire({
                icon: "success",
                title: "Cita Creada",
                text: "Tu cita fue creada correctamente",
                button: "OK"
            }).then(() => {
                setTimeout(() => {
                    window.location.reload();
                }, 3000);
            });
        }
    } catch (error) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Hubo un error al guardar la cita"
        });
    }
}

document.addEventListener("DOMContentLoaded", iniciarApp);
