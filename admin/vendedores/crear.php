<?php 
require '../../includes/app.php';

use App\Vendedor; // Se pone solo este por que no se ocupan imágenes de propiedades

    estaAutenticado();

    $vendedor = new Vendedor; // Crear nuevo objeto

    //verificacion de errores
    $errores = Vendedor::getErrores(); // Obtenemos los errores

    // Validar POST (para que hasta que se mande el form se vea si es POST)
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        //Instanciar clases de vendedor
        $vendedor = new Vendedor($_POST['vendedor']);
        $errores = $vendedor->validar();
        
        //No hay errores
        if(empty($errores)){
            $vendedor->guardar();
        }
    }

    //**         AQUÍ SE ACABA PHP            */


    incluirTemplate('header');

?>
        
<!-- -->
    <main class="contenedor seccion">
        <h1> Registrar Nuevo Vendedor </h1>
        
        <a href="/admin" class="boton boton-verde"> Volver</a>
   
       <?php foreach($errores as $error): ?>
       <div class="alerta error">
           <?php echo $error; ?>
       </div>
       <?php endforeach; ?>

        <!-- FORMULARIO CREAR VENDEDORES-->
        <!-- Enctype SE USA PARA ARCHIVOS EN FORMULARIOS-->
        <form class="formulario" method="POST" enctype="multipart/form-data"> 
            <!-- ACTION= A DONDE SE VAN A MANDAR LOS DATOS-->
            <!-- 1-->
            <?php  
            //!! Mandar a llamar FORMULARIO_VENDEDORES.PHP */
            include '../../includes/templates/formulario_vendedores.php';
            ?>
            
            <input type="submit" value="Registrarte" class="boton boton-verde">
        </form>
        <!-- FORMULARIO CREAR-->
    </main>

       <!-- Incluir archivos -->
       <?php
        incluirTemplate('footer'); 
    ?>
 

