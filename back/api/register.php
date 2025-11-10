<?php
require "../connection.php";
echo "Se está enviando la información de registro";
if(isset($_POST)){
    $primer_nombre = htmlspecialchars(stripslashes(trim($_POST["primer_nombre"])), ENT_QUOTES, 'UTF-8');
    $primer_apellido = htmlspecialchars(stripslashes(trim($_POST["primer_apellido"])), ENT_QUOTES, 'UTF-8');;
    $correo_inst = filter_var($_POST["correo"], FILTER_SANITIZE_EMAIL);
    $pass = $_POST["pass"];
    $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
    print_r($_POST);
    print_r($hash_pass);
    //Consultar si el correo institucional ya existe en db
    $sql_correo_exists = $con->prepare("SELECT correo_institucional FROM usuario WHERE correo_institucional = ?");
    if($sql_correo_exists){
        $sql_correo_exists->bind_param("s",$correo_inst);
        $sql_correo_exists->execute();
        $sql_correo_exists->store_result();
        if($sql_correo_exists->num_rows == 0){
            echo "<br> El usuario es nuevo";
            $sql_insert_user = $con->prepare("INSERT INTO `usuario`(`primer_nombre`, `primer_apellido`, `correo_institucional`, `hash_contrasena`) VALUES (?, ?, ?, ?)");
            if($sql_insert_user){
                $sql_insert_user->bind_param("ssss",$primer_nombre, $primer_apellido, $correo_inst, $hash_pass);
                $sql_insert_user->execute();
                if($sql_insert_user->insert_id > -1){
                    echo "<br> Usuario creado exitosamente";
                    header("Location: /trueke/front/login.php?code_msg=100");
                }
            }
        }else{
            echo "<br> El usuario ya existe";
            header("Location: /trueke/front/register.php?code_msg=110");
        }
        $sql_correo_exists->close();
    }
}