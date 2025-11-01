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
                    <span class="input-icon">👤</span>
                    <input type="text" placeholder="Nombre" required>
                </div>
                <div class="input-group">
                    <span class="input-icon">👤</span>
                    <input type="text" placeholder="Apellido" required>
                </div>

                <h3>Crea tu usuario</h3>
                <p class="ayuda">Tu nombre de usuario puede tener este formato: <b>@tu.usuario.123</b><br>Debe tener mínimo <b>8</b> caracteres.</p>
                <div class="msg-error" id="usuarioError">
                    <span class="icon-error">❌</span> Este usuario no es válido, elige otro.
                </div>
                <div class="msg-valid" id="usuarioValido">
                    <span class="icon-valid">✔️</span> Este usuario es válido.
                </div>
                <div class="input-group">
                    <span class="input-icon">@</span>
                    <input type="text" id="usuario" placeholder="@usuario" minlength="8" required style="text-transform: none;" oninput="validarUsuario()">
                </div>

                <h3>Crea tu contraseña</h3>
                <p class="ayuda">Tu contraseña debe tener mínimo <b>8</b> caracteres.</p>
                <div class="input-group">
                    <span class="input-icon">🔑</span>
                    <input type="password" id="pass1" placeholder="Contraseña" minlength="8" required>
                </div>
                <div class="input-group">
                    <span class="input-icon">🔑</span>
                    <input type="password" id="pass2" placeholder="Repita la contraseña" minlength="8" required>
                </div>
                <label class="mostrar-pass">
                    <input type="checkbox" onclick="mostrarContrasenas()"> Mostrar contraseñas
                </label>
                <button type="submit" class="btn-registro">ME QUIERO REGISTRAR</button>
                <p class="existe">¿Ya tienes una cuenta? <a href="login.html">Inicia sesión aquí</a></p>
            </form>
        </div>
    </main>
</body>
</html>

