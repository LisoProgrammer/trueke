<?php
if (isset($_GET["code_msg"])) {
    $code_msg = intval($_GET["code_msg"]);

    $alerts = [
        100 => ["title" => "¡Yupi!", "msg" => "Usuario creado correctamente", "icon" => "success"],
        110 => ["title" => "¡Oops!", "msg" => "El usuario ya existe. Intenta iniciar sesión", "icon" => "error"],
        210 => ["title" => "¡Oops!", "msg" => "La contraseña es incorrecta. Intenta nuevamente.", "icon" => "error"],
        300 => ["title" => "¡Yupi!", "msg" => "Se creó tu publicación con éxito.", "icon" => "success"],
        310 => ["title" => "¡Oops!", "msg" => "Ocurrió un error al intentar crear tu publicación.", "icon" => "error"],
        400 => ["title" => "¡Yupi!", "msg" => "Se publicó tu oferta con éxito.", "icon" => "success"],
        410 => ["title" => "¡Oops!", "msg" => "Ocurrió un error al intentar publicar tu oferta.", "icon" => "error"],
        420 => ["title" => "¡Excelente!", "msg" => "Trueque en proceso. Ponte en contacto con oferente.", "icon" => "success"],
        430 => ["title" => "¡Oops!", "msg" => "Ocurrió un error al intentar aceptar el trueque. Inténtalo nuevamente", "icon" => "error"],
        440 => ["title" => "¡Listo!", "msg" => "Se ha cancelado el trueque.", "icon" => "success"],
        450 => ["title" => "¡Listo!", "msg" => "Se ha terminado el trueque.", "icon" => "success"]
    ];

    if (isset($alerts[$code_msg])) {
        echo "<script>let code_msg = ". $code_msg. "</script>";
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
                // Limpia solo el parámetro code_msg, mantiene otros parámetros
                const url = new URL(window.location.href);
                url.searchParams.delete("code_msg");
                window.history.replaceState({}, document.title, url.toString());
            });
        </script>
        <?php
    }
}
?>
