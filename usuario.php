<?php 
    //^ Usuario (Se genera un hash para clave, clave única dle usuario e emial)
// Crear tabla en tableplus o workbench

//Importar la conexión
require 'includes/app.php';
    $db = conectarDB();

//Crear un E-mail y password
$email        = "correo@correo.com";
$password     = "Kokuten04";
//* Hashear password
//!!!! PREGUNATRLE A SAM 
$passwordHash = password_hash($password, PASSWORD_BCRYPT); //Para generar ruta de (60) para password

// Query para crear el usuario
$query        = "INSERT INTO usuarios (email, password) VALUES ('{$email}', '{$passwordHash}'); ";
echo $query;


//Agregarlo a la db
mysqli_query($db, $query); //* Para conectar e ingresar datos a la db