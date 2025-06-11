<!-- Configuraciones, variables, constantes-->
<?php 
//* INCLUIR FUNCIONES APARTIR DE POO
//* ARCHIVO PRINCIPAL
// BASICAMENTE AQUÍ SE MANDA A LLAMAR TODOOOOOOO
require           'funciones.php';
require           'config/database.php'; //-> Para conectar db
require __DIR__ . '/../vendor/autoload.php'; 

// Conectarnos a DB
$db = conectarDB();

// Importar clase (Propiedad.php)
use App\ActiveRecord;


ActiveRecord::setDB($db); // Como se hereda a PROPIEDAD y VENDEDOR siempre se hace referencia a esta clase PADRE



//* INCLUIR FUNCIONES APARTIR DE POO

