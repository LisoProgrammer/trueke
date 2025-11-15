<?php
if (isset($_GET["code_msg"])) {
    $code_msg = intval($_GET["code_msg"]);
    /**
     * Codigos 100: relacionados con el registro de usuario
     * Codigos 200: relacionados con el inicio de sesión
     * Codigos 300: relacionados con la publicacion de articulos o servicios
     * Codigos 400: relacionados con la publicacion de ofertas de trueque
     */
    $alerts = [
        100 => ["title" => "¡Yupi!", "msg" => "Usuario creado correctamente", "icon" => "success"],
        110 => ["title" => "¡Oops!", "msg" => "El usuario ya existe. Intenta iniciar sesión", "icon" => "error"],
        210 => ["title" => "¡Oops!", "msg" => "La contraseña es incorrecta. Intenta nuevamente.", "icon" => "error"],
        300 => ["title" => "¡Yupi!", "msg" => "Se creó tu publicación con éxito.", "icon" => "success"],
        310 => ["title" => "¡Oops!", "msg" => "Ocurrió un error al intentar crear tu publicación.", "icon" => "error"],
        400 => ["title" => "¡Yupi!", "msg" => "Se publicó tu oferta con éxito.", "icon" => "success"],
        410 => ["title" => "¡Oops!", "msg" => "Ocurrió un error al intentar publicar tu oferta.", "icon" => "error"]
    ];

    // Validar que el código exista en el array
    if (isset($alerts[$code_msg])) {
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            let title_msg = "<?= $alerts[$code_msg]['title'] ?>";
            let text_msg  = "<?= $alerts[$code_msg]['msg'] ?>";
            let icon_msg  = "<?= $alerts[$code_msg]['icon'] ?>";

            Swal.fire({
                title: title_msg,
                text: text_msg,
                icon: icon_msg,
                confirmButtonText: "Aceptar"
            }).then(() => {
                // Se limpia el parámetro GET para evitar que se repita al recargar
                window.history.replaceState(null, "", window.location.pathname);
            });
        </script>
        <?php
    }
}
?>
