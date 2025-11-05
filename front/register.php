<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>REGISTRARSE - TRUEKE</title>
    
</head>
<body>
    <main>
        <div class="container-center">
            <div class="c_icon">
                <img src="../assets/image.png" alt="Logo TRUEKE">
            </div>
            <h1>Regístrate</h1>
            <form class="registro-form" autocomplete="off" onsubmit="return false;">
                <p>Crea una cuenta para disfrutar de todas las características de TRUEKE.</p>

                <h3>¿Cómo te llamas?</h3>
                <div class="input-group">
                    <span class="input-icon"><img src="../assets/icons/id.png" alt=""></span>
                    <input type="text" id="nombre" placeholder="Nombre" required>
                </div>
                <div class="input-group">
                    <span class="input-icon"><img src="../assets/icons/id.png" alt=""></span>
                    <input type="text" id="apellido" placeholder="Apellido" required>
                </div>
 

                <h3>Ingresa tu correo</h3>
                <p class="ayuda">Tu correo debe tener este formato: <b>example@utb.edu.co</b><br> Tu correo no debe contener espacios.</p>

                <div class="msg-error" id="correoError" style="display:none;">
                    <span class="icon-error">❌</span> El correo no es válido o no pertenece al dominio <b>@utb.edu.co</b>.
                </div>
                <div class="msg-valid" id="correoValido" style="display:none;">
                    <span class="icon-valid">✔️</span> El correo es válido.
                </div>

                <div class="input-group">
                    <span class="input-icon"><img src="../assets/icons/mail.png" alt=""></span>
                <input
                    type="email" id="correo" placeholder="example@utb.edu.co" requiredinputmode="email" spellcheck="false" autocomplete="off" pattern="^[a-z0-9._%+-]+@utb\.edu\.co$" oninput="validarCorreo()"
                >
                </div>
                <h3>Crea tu contraseña</h3>
                <p class="ayuda">Tu contraseña debe tener mínimo <b>8</b> caracteres.</p>
                <div class="input-group">
                    <span class="input-icon"><img src="../assets/icons/key.png" alt=""></span>
                    <input type="password" id="pass1" placeholder="Contraseña" minlength="8" required>
                </div>
                <div class="input-group">
                    <span class="input-icon"><img src="../assets/icons/key.png" alt=""></span>
                    <input type="password" id="pass2" placeholder="Repita la contraseña" minlength="8" required>
                </div>
                <span id="password_message"></span>
                <label class="mostrar-pass">
                    <input type="checkbox" onclick="mostrarContrasenas()"> Mostrar contraseñas
                </label>
                <button type="submit" class="btn-registro">ME QUIERO REGISTRAR</button>
                <p class="existe">¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
            </form>
        </div>
        <br>
    </main>
    <script src="js/register.js"></script>
    
</body>
</html>

