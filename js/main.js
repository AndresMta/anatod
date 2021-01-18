function validarFormulario() {

    const inputNombre = document.getElementById('nombre');
    const inputDni = document.getElementById('dni');
    const inputLocalidad = document.getElementById('localidad');
    const formulario = document.getElementById('form');

    if(inputNombre.value.trim() === '') {
        informaError('Debe ingresar un nombre', formulario, inputNombre);
        return false;
    }
    if(inputDni.value.trim() === '') {
        informaError('Dede ingrear un dni', formulario, inputDni);
        return false;
    }
    if(inputLocalidad.value === 'null') {
        informaError('Debe seleccionar una localidad', formulario, inputLocalidad);
        return false;
    }

    return true;
}

function informaError(mensaje, padre, input) {
    const error = document.createElement('p');
    error.textContent = mensaje;
    error.classList.add('mensaje-error')
    
    input.classList.add('input-error');
    input.focus();
    
    padre.appendChild(error);

    setTimeout(() => {
        error.remove();
        input.classList.remove('input-error');
    }, 3000);
}

