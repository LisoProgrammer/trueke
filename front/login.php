<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>INICIAR SESIÓN - TRUEKE</title>

</head>

<body>
    <main>
        <div class="container-center">
            <div class="c_icon">
                <img src="../assets/image.png" alt="Logo TRUEKE">
            </div>
            <h1>Iniciar sesión </h1>
            <form class="registro-form" autocomplete="off" onsubmit="return false;" action="/trueke/back/auth.php" method="POST">
                <p>¡Bienvenido! Inicia sesión para empezar a intercambiar cosas.</p>
                <div class="msg-error" id="correoError" style="display:none;">
                    <span class="icon-error">❌</span> El correo no es válido o no pertenece al dominio <b>@utb.edu.co</b>.
                </div>
                <div class="msg-valid" id="correoValido" style="display:none;">
                    <span class="icon-valid">✔️</span> El correo es válido.
                </div>
                <div class="input-group">
                    <span class="input-icon"><img src="../assets/icons/mail.png" alt=""></span>
                    <input type="email" name="correo" id="correo" placeholder="example@utb.edu.co" required style="text-transform: none;" oninput="validarCorreo()">
                </div>

                <div class="input-group">
                    <span class="input-icon"><img src="../assets/icons/key.png" alt=""></span>
                    <input type="password" name="pass" id="pass1" placeholder="Contraseña" minlength="8" required>
                </div>

                <span id="password_message"></span>
                <label class="mostrar-pass">
                    <input type="checkbox" onclick="mostrarContrasena()"> Mostrar contraseña
                </label>
                <button type="submit" class="btn-registro">INICIAR SESIÓN</button>
                <p class="existe">¿No tienes una cuenta? <a href="register.php">Registrate aquí</a></p>
            </form>
        </div>
        <br>
    </main>
    <script src="js/login.js"></script>
    <?php
    include "events.php";
    ?>
</body>

</html>