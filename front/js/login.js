document
  .querySelector(".registro-form")
  .addEventListener("submit", function (e) {
    // Validación correo
    const correo = document.getElementById("correo");
    // normaliza antes de evaluar
    correo.value = correo.value.trim().toLowerCase();

    const regexCorreo = /^[a-z0-9._%+-]+@utb\.edu\.co$/;

    if (!regexCorreo.test(correo.value)) {
      correo.style.border = "2px solid #e53935";
      document.getElementById("correoError").style.display = "block";
      document.getElementById("correoValido").style.display = "none";
      valido = false;
    } else {
      correo.style.border = "2px solid #35e561ff";
      document.getElementById("correoError").style.display = "none";
      document.getElementById("correoValido").style.display = "block";
      document.querySelector(".registro-form").submit();
    }
  });

// formateo del del correo
function validarCorreo() {
  const correoInput = document.getElementById("correo");
  const correoValido = document.getElementById("correoValido");
  const correoError = document.getElementById("correoError");

  // normaliza a minúsculas y sin espacios alrededor
  correoInput.value = correoInput.value.trim().toLowerCase();

  // solo @utb.edu.co en minúsculas
  const regexCorreo = /^[a-z0-9._%+-]+@utb\.edu\.co$/;

  if (regexCorreo.test(correoInput.value)) {
    correoInput.style.border = "2px solid #35e561ff";
    correoValido.style.display = "block";
    correoError.style.display = "none";
  } else {
    correoInput.style.border = "2px solid #e53935";
    correoError.style.display = "block";
    correoValido.style.display = "none";
  }
}

// funcion para ver la contraseña de el login
function mostrarContrasena() {
  var pass1 = document.getElementById("pass1");
  pass1.type = pass1.type === "password" ? "text" : "password";
}
