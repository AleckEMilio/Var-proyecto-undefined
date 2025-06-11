<?php 
require '../../includes/app.php';

use App\Vendedor; // Se pone solo este por que no se ocupan imágenes de propiedades

    estaAutenticado();

    // Validar un ID válido

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT); //Filter_var es una EXPRESIÓN REGULAR

    if(!$id){
        header('Location: /admin');
    }

    // Hacer que los campos se llenen automáticamente
    $vendedor = Vendedor::find($id);
   
    //verificacion de errores
    $errores = Vendedor::getErrores(); // Obtenemos los errores

    // Validar POST (para que hasta que se mande el form se vea si es POST)
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        // Asignar los valores
        $args = $_POST['vendedor'];
        //Sincronizar el objeto de memoria con los nuevos datos
        $vendedor->sincronizar($args); //Iterar y mapear en DB
        //Validar //? Que se guarde aunque se equivoque
        $errores = $vendedor->validar();
       
        if(empty($errores)){     // Con active record con colocar guardar ve si hay un id, si lo hay lo actualiza y si no lo crea
            $vendedor->guardar();
        }

    }

    //**         AQUÍ SE ACABA PHP            */


    incluirTemplate('header');

?>
        
<!-- -->
    <main class="contenedor seccion">
        <h1> Actualizar Vendedor </h1>
        
        <a href="/admin" class="boton boton-verde"> Volver</a>
   
       <?php foreach($errores as $error): ?>
       <div class="alerta error">
           <?php echo $error; ?>
       </div>
       <?php endforeach; ?>

        <!-- FORMULARIO CREAR VENDEDORES-->
        <!-- Enctype SE USA PARA ARCHIVOS EN FORMULARIOS-->
        <form class="formulario" method="POST" > 
            <!-- ACTION= A DONDE SE VAN A MANDAR LOS DATOS-->
            <!-- 1-->
            <?php  
            //!! Mandar a llamar FORMULARIO_VENDEDORES.PHP */
            include '../../includes/templates/formulario_vendedores.php';
            ?>
            
            <input type="submit" value="Guardar cambios" class="boton boton-verde">
        </form>
        <!-- FORMULARIO CREAR-->
    </main>

       <!-- Incluir archivos -->
       <?php
        incluirTemplate('footer'); 
    ?>
 

