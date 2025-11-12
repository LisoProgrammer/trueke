<?php
require '../connection.php';
require '../check_sesion.php';
$img_article_name = "";
if(isset($_FILES["img_article"])){
    $img_article = $_FILES["img_article"];
    if($img_article["error"] == UPLOAD_ERR_OK){
        //se formatea la ruta de la imagen
        $dir_entrada = __DIR__."/../../assets/samples/";
        $dir_complete = $dir_entrada . basename($img_article["name"]);
        $ext_ok = [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_WEBP];
        $ext_img = exif_imagetype($img_article["tmp_name"]);
        // Genera un ID aleatorio
        $id_random = uniqid("img_", true);
        $name_sin_extension = pathinfo($img_article["name"])["filename"];
        //Si la imagen tiene una extensión permitida
        if (in_array($ext_img, $ext_ok)) {
            // Crea el directorio si no existe
            if (!file_exists($dir_entrada)) {
                mkdir($dir_entrada, 0755, true);
            }
            //Se convierte la imagen a un formato mas ligero y se mueve a la carpeta destino
            include("convertir_formato_ligero.php");
            if (convertirAWebP($img_article['tmp_name'], $dir_entrada ."_".$id_random. ".webp")) {
                file_put_contents('rutas_archivos.log', $dir_complete . PHP_EOL, FILE_APPEND);
                $img_article_name = "_".$id_random. ".webp";
                echo $img_article_name;
            }
        } else {
            $response["message"] = "Archivo en el formato no especificado.";
            $response["code"] = 200;
            print_r(json_encode($response));
        }
    }
}
if(isset($_POST)){
    print_r($img_article_name);
    $id_user = $_SESSION["user"]["id"];
    //print_r($id_user);
    $articulo_or_servicio = intval($_POST["articulo_or_servicio"]);
    $titulo = htmlspecialchars(stripslashes(trim($_POST["titulo"])), ENT_QUOTES, 'UTF-8');
    $descripcion =htmlspecialchars(stripslashes(trim( $_POST["descripcion"])), ENT_QUOTES, 'UTF-8');
    $sql_insert_publication = $con->prepare("INSERT INTO `publicacion`(`id_autor`, `titulo`, `descripcion`,`servicio`, `imagen`, `fecha`, `hora`, `visualizaciones`) VALUES (?, ?, ?, ?, ?, CURTIME(), CURDATE(), 0)");
    if($sql_insert_publication){
        $sql_insert_publication->bind_param("issss",$id_user,$titulo,$descripcion,$articulo_or_servicio, $img_article_name);
        $sql_insert_publication->execute();
        if($sql_insert_publication->insert_id > -1){
            echo "<br> Publicación creada exitosamente.";
            header("Location: /trueke/front/views/dashboard.php?code_msg=300");
        }else{
            echo "<br> Ocurrió un error al intentar publicar.";
            header("Location: /trueke/front/views/dashboard.php?code_msg=310");
        }
    }
}
?>