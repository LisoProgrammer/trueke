<?php
session_start();
echo "Estamos cerrando tu sesión...";
session_destroy();
header("Location: /trueke/front/login.php");
?>