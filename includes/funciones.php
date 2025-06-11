<!-- Funciones para Templates-->

<?php 

//? Constantes (Antes iban en APP.php pero ya se mandan a llamar ahí)

define('TEMPLATES_URL',     __DIR__ . '/templates');  // Donde van a estar ubicados los templates
define('FUNCIONES_URL',     __DIR__ . 'funciones');  
define('CARPETA_IMAGENES',  __DIR__ . '/../imagenes/');

// require 'app.php'; //? Incluir y ejecutar el contenido del archivo "app.php" YA NO POR POO

// Incluir funciones
    function incluirTemplate( string $nombre, bool $inicio = false ){ //? Se usa el type (string, bool, etc)
        include TEMPLATES_URL."/{$nombre}.php";
    }

  
function estaAutenticado() {
    session_start();

    if(!$_SESSION['login']) {
        header('Location: /');
    }
}

    function debugear($variable) {
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
        exit;
    }
    //* Función para sanitizar nuevo formulario (form._propiedades.php) ACTIVE RECORD
    // Escapa / sanitizar HTML (s= sanitizar)
    // Para String
    function s($html): string {
        if ($html === null) {
            return ''; // Opcionalmente, puedes devolver otra cadena si lo prefieres
        }
        $s = htmlspecialchars($html);
        return $s;
    }
    
    // Para int
    //function si($html):int{
        //$si = htmlspecialchars($html);
        //return $si;
    //}
    
    // Validar tipo de contenido
    function validarTipoContenido($tipo){
        $tipos = ['vendedor', 'propiedad'];

        return in_array($tipo, $tipos);
    }
    // Muestra los mensajes
    function mostrarNotificacion($codigo){
        $mensaje = '';
        
        switch ($codigo){
            case 1:
            $mensaje = 'CREADO correctamente';
            break;
            case 2:
            $mensaje = 'ACTUALIZADO correctamente';
            break;
            case 3:
            $mensaje = 'ELIMINADO correctamente';
            break;
            default:
            $mensaje = false;
            break;
        }
        return $mensaje;

        
    }

  