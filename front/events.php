<?php
if (isset($_GET["code_msg"])) {
    $code_msg = intval($_GET["code_msg"]);
    /**
     * Codigos 100: relacionados con el registro de usuario
     * Codigos 200: relacionados con el inicio de sesión
     */
    $alerts = [
        100 => ["title" => "¡Yupi!", "msg" => "Usuario creado correctamente", "icon" => "success"],
        110 => ["title" => "¡Oops!", "msg" => "El usuario ya existe. Intenta iniciar sesión", "icon" => "error"]
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
