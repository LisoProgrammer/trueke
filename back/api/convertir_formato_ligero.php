<?php
function convertirAWebP($rutaOriginal, $rutaDestino, $calidad = 80)
{
    // Obtiene información del archivo
    $info = getimagesize($rutaOriginal);
    $tipo = $info['mime'];

    // Crea el recurso de imagen según el tipo
    switch ($tipo) {
        case 'image/jpeg':
            $imagen = imagecreatefromjpeg($rutaOriginal);
            break;
        case 'image/png':
            $imagen = imagecreatefrompng($rutaOriginal);
            break;
        case 'image/gif':
            $imagen = imagecreatefromgif($rutaOriginal);
            break;
        case 'image/webp':
            // Si ya es WebP, no se convierte
            $imagen = imagecreatefromwebp($rutaOriginal);
            break;
        default:
            die('Tipo de imagen no soportado.');
    }

    // Convierte a truecolor si la imagen tiene paleta (para evitar "Palette image not supported by webp")
    if (!imageistruecolor($imagen)) {
        $truecolor = imagecreatetruecolor(imagesx($imagen), imagesy($imagen));

        // Mantener transparencia si aplica
        imagealphablending($truecolor, false);
        imagesavealpha($truecolor, true);

        $transparent = imagecolorallocatealpha($truecolor, 0, 0, 0, 127);
        imagefill($truecolor, 0, 0, $transparent);

        imagecopy($truecolor, $imagen, 0, 0, 0, 0, imagesx($imagen), imagesy($imagen));
        imagedestroy($imagen);
        $imagen = $truecolor;
    }

    // Convierte a WebP
    $resultado = imagewebp($imagen, $rutaDestino, $calidad);

    // Limpieza de memoria
    imagedestroy($imagen);

    return $resultado;
}
?>
