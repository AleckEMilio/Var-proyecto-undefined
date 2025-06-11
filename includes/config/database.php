<!-- Aquí se va a conectar la db-->
<?php 

function conectarDB() : mysqli{
    $db = new mysqli('localhost', 'root', 'root', 'bienesraices_crud');

    if(!$db){
        echo "Error no se pudo conectar";
        exit; //? DETENER EJECUCIÓN DEL CÓDIGO
    } else {} // añadido a spipets
    return $db; 
}