document.querySelector('.registro-form').addEventListener('submit', function(e) {

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

})

// funcion para ver la contraseña de el login
function mostrarContrasena() {
    var pass1 = document.getElementById("pass1");
    pass1.type = pass1.type === "password" ? "text" : "password";
}