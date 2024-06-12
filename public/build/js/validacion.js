document.addEventListener('DOMContentLoaded', function () {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const nombreInput = document.getElementById('nombre');
    const apellidoInput = document.getElementById('apellido');
    const telefonoInput = document.getElementById('telefono');
    
    const emailError = document.getElementById('error-email');
    const passwordError = document.getElementById('error-password');
    const nombreError = document.getElementById('error-nombre');
    const apellidoError = document.getElementById('error-apellido');
    const telefonoError = document.getElementById('error-telefono');

    emailInput.addEventListener('input', validateEmail);
    passwordInput.addEventListener('input', validatePassword);
    nombreInput.addEventListener('input', validateNombre);
    apellidoInput.addEventListener('input', validateApellido);
    telefonoInput.addEventListener('input', validateTelefono);

    function validateEmail() {
        const email = emailInput.value;
        if (!email.includes('@') || !email.includes('.')) {
            emailError.textContent = 'Por favor, introduce un email válido';
        } else {
            emailError.textContent = '';
        }
    }

    function validatePassword() {
        const password = passwordInput.value;
        const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
        if (!regex.test(password)) {
            passwordError.textContent = 'La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número';
        } else {
            passwordError.textContent = '';
        }
    }

    function validateNombre() {
        const nombre = nombreInput.value;
        if (!/^[a-zA-Z]+$/.test(nombre)) {
            nombreError.textContent = 'El nombre solo debe contener letras';
        } else {
            nombreError.textContent = '';
        }
    }

    function validateApellido() {
        const apellido = apellidoInput.value;
        if (!/^[a-zA-Z]+$/.test(apellido)) {
            apellidoError.textContent = 'El apellido solo debe contener letras';
        } else {
            apellidoError.textContent = '';
        }
    }

    function validateTelefono() {
        const telefono = telefonoInput.value;
        const regex = /^(\+?56)?(\s?)(0?9)(\s?)[9876543]\d{7}$/;
        if (!regex.test(telefono)) {
            telefonoError.textContent = 'El teléfono debe ser válido para Chile';
        } else {
            telefonoError.textContent = '';
        }
    }
});
