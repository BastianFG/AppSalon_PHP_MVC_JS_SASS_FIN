document.addEventListener('DOMContentLoaded', function () {
    const fechaInput = document.getElementById('fecha');
    const horaInput = document.getElementById('hora');

    const fechaError = document.getElementById('error-fecha');
    const horaError = document.getElementById('error-hora');

    fechaInput.addEventListener('change', validarFecha);
    horaInput.addEventListener('change', validarHora);

    function validarFecha() {
        const fechaSeleccionada = new Date(fechaInput.value);
        const hoy = new Date();

        // Restablecer la hora de ambas fechas para solo comparar las fechas
        hoy.setHours(0, 0, 0, 0);
        fechaSeleccionada.setHours(0, 0, 0, 0);

        if (fechaSeleccionada < hoy) {
            fechaError.textContent = 'La fecha seleccionada no puede ser anterior a hoy.';
            return false;
        } else {
            fechaError.textContent = '';
        }

        if (fechaSeleccionada.getTime() === hoy.getTime() && hoy.getHours() >= 20) {
            fechaError.textContent = 'No puedes seleccionar una fecha para hoy después de las 8 PM.';
            return false;
        } else {
            fechaError.textContent = '';
        }

        return true;
    }

    function validarHora() {
        const horaSeleccionada = horaInput.value;
        const hoy = new Date();

        if (fechaInput.value === hoy.toISOString().split('T')[0]) {
            const [horas, minutos] = horaSeleccionada.split(':');
            const horaActual = hoy.getHours();
            const minutosActual = hoy.getMinutes();

            if (horaActual > horas || (horaActual === horas && minutosActual >= minutos)) {
                horaError.textContent = 'La hora seleccionada no puede ser anterior a la hora actual.';
                return false;
            } else {
                horaError.textContent = '';
            }
        } else {
            horaError.textContent = '';
        }

        return true;
    }
});
