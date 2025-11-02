document.querySelector('.registro-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Bloquea envío

    // Variables de campo
    let nombre = document.querySelector('input[placeholder="Nombre"]');
    let apellido = document.querySelector('input[placeholder="Apellido"]');
    let usuario = document.getElementById('usuario');
    let pass1 = document.getElementById('pass1');
    let pass2 = document.getElementById('pass2');
    let valido = true;

    // Validación nombre
    if (!/^[A-Za-zÁÉÍÓÚáéíóúüÜñÑ ]{2,}$/.test(nombre.value.trim())) {
        nombre.style.border = "2px solid #e53935";
        valido = false;
    } else {
        nombre.style.border = "";
    }
// Validación apellido
    if (!/^[A-Za-zÁÉÍÓÚáéíóúüÜñÑ ]{2,}$/.test(apellido.value.trim())) {
        apellido.style.border = "2px solid #e53935";
        valido = false;
    } else {
        apellido.style.border = "";
    }

    // Validación usuario
    let usuarioValido = document.getElementById("usuarioValido");
    let usuarioError = document.getElementById("usuarioError");
    let regexUsuario = /^@[a-zA-Z0-9._]{7,}$/;
    if (!regexUsuario.test(usuario.value)) {
        usuario.style.border = "2px solid #e53935";
        usuarioError.style.display = "block";
        usuarioValido.style.display = "none";
        valido = false;
    } else {
        usuario.style.border = "";
        usuarioError.style.display = "none";
        usuarioValido.style.display = "block";
    }

    // Validación contraseña
    if (pass1.value.length < 8) {
        pass1.style.border = "2px solid #e53935";
        valido = false;
    } else {
        pass1.style.border = "";
    }

    // Validación repetir contraseña
    if (pass1.value !== pass2.value || pass2.value.length < 8) {
        pass2.style.border = "2px solid #e53935";
        valido = false;
    } else {
        pass2.style.border = "no coindicen";
    }

    // Si todo es válido, puedes enviar el formulario aquí
    if (valido) {
        alert("¡Formulario válido y listo para enviar!");
        // Aquí puedes hacer submit real o llamada AJAX
        // this.submit();
    }
});

// Validación en vivo del usuario
document.getElementById("usuario").addEventListener("input", function() {
    let val = this.value;
    let valido = document.getElementById("usuarioValido");
    let error = document.getElementById("usuarioError");
    let regex = /^@[a-zA-Z0-9._]{7,}$/;
    if (regex.test(val)) {
        valido.style.display = "block";
        error.style.display = "none";
    } else {
        valido.style.display = "none";
        error.style.display = "block";
    }
});

// Mostrar/ocultar contraseñas
function mostrarContrasenas() {
    var pass1 = document.getElementById("pass1");
    var pass2 = document.getElementById("pass2");
    pass1.type = pass1.type === "password" ? "text" : "password";
    pass2.type = pass2.type === "password" ? "text" : "password";
}
