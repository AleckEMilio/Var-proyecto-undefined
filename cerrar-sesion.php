<?php 
session_start();
$_SESSION = []; //!!!!!!!!!!!! Cerrar sesión
header('Location: /index.php');
exit;



?>