document.querySelector('.registro-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Bloquea envío

    // Variables de campo
    let nombre = document.querySelector('input[placeholder="Nombre"]');
    let apellido = document.querySelector('input[placeholder="Apellido"]');
    let pass1 = document.getElementById('pass1');
    let pass2 = document.getElementById('pass2');
    let valido = true;
    let password_message = document.getElementById('password_message')
    
    nombre.value   = nombre.value.trim().replace(/\s+/g, '');
    apellido.value = apellido.value.trim().replace(/\s+/g, '');
    alert(
      'Nombre: ['   + nombre.value   + ']\n' +
      'Apellido: [' + apellido.value + ']\n' +
      'Pass1: ['    + pass1.value    + ']\n' +
      'Pass2: ['    + pass2.value    + ']'
    );

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

    // Validación correo
    const correo = document.getElementById("correo");
    // normaliza antes de evaluar
    correo.value = correo.value.trim().toLowerCase();

    const regexCorreo = /^[a-z0-9._%+-]+@utb\.edu\.co$/;

    if (!regexCorreo.test(correo.value)) {
    correo.style.border = "2px solid #e53935";
        document.getElementById("correoError").style.display  = "block";
        document.getElementById("correoValido").style.display = "none";
        valido = false;
    } else {
    correo.style.border = "2px solid #35e561ff";
        document.getElementById("correoError").style.display  = "none";
        document.getElementById("correoValido").style.display = "block";
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
        password_message.innerText = "Las contraseñas no coinciden";
        password_message.style.color = "red";
    }else{
        password_message.style.color = "green";
        password_message.innerText = "Las contraseñas son iguales";
        pass2.style.border = "2px solid #35e561ff";
    } 

    // Si todo es válido, puedes enviar el formulario aquí
    if (valido) {
        //alert("¡Formulario válido y listo para enviar!");
        // Aquí puedes hacer submit real o llamada AJAX
        this.submit();
    }
});

// formateo del del correo
function validarCorreo() {
  const correoInput = document.getElementById("correo");
  const correoValido = document.getElementById("correoValido");
  const correoError  = document.getElementById("correoError");

  // normaliza a minúsculas y sin espacios alrededor
  correoInput.value = correoInput.value.trim().toLowerCase();

  // solo @utb.edu.co en minúsculas
  const regexCorreo = /^[a-z0-9._%+-]+@utb\.edu\.co$/;

  if (regexCorreo.test(correoInput.value)) {
    correoInput.style.border = "2px solid #35e561ff";
    correoValido.style.display = "block";
    correoError.style.display  = "none";
  } else {
    correoInput.style.border = "2px solid #e53935";
    correoError.style.display  = "block";
    correoValido.style.display = "none";
  }
}


// Mostrar/ocultar contraseñas
function mostrarContrasenas() {
    var pass1 = document.getElementById("pass1");
    var pass2 = document.getElementById("pass2");
    pass1.type = pass1.type === "password" ? "text" : "password";
    pass2.type = pass2.type === "password" ? "text" : "password";
}
