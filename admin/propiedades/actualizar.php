
<?php
require '../../includes/app.php';
use App\Propiedad;
use App\Vendedor; // A.R
use Intervention\Image\ImageManagerStatic as Image;

   

    estaAutenticado();


        //* Validar la URL por id válido
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT); //Para validar si el id SEA SOLO INT

        if(!$id){
            header('Localtion: /admin');
        };
   

        $propiedad = Propiedad::find($id);
     
        //* Se reemplaza por que con el Método "buscarId" ya se hace
        // Consulta para obtener todos los vendedores
        $vendedores = Vendedor::all(); // A.R
        
        $errores = Propiedad::getErrores();
      
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
          
            // Asignar los atributos (active record)
            
            $args = $_POST['propiedad'];            
            // Método para sincronizar
            $propiedad->sincronizar($args); //Sincronizar datos con lo que el usuario escribió
            //Asignar files a una variable
       
           
           //*VALIDACIÓN A ERRORES (ACTIVE RECORD)
                // Reutilizando código
           $errores = $propiedad->validar();
           

            //*SUBIDA DE ARCHIVOS (ACTIVE RECORD)
            //Generar un nombre único para cada imagen
            $nombreImagen = md5( uniqid( rand(), true )).".jpg"; //Nombre único

            if($_FILES['propiedad']['tmp_name']['imagen']) {
                // EN caso de HABER imagen se define
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);  // Reescribe la imagen 
            }
       

           if(empty($errores)){
               
                // Almacenar imagen
                if($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad->guardar(); 
           }
        } 
       
      
        
    
    incluirTemplate('header');
?>
<!-- -->
    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        
        <!-- Expandir y reducir texto-->
            <details class="summary">
                <summary>
                    Se consideran todos las caracteristicas para agregar propiedades:
                </summary>
                <p class="psum">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis dolorem perferendis, quo consectetur expedita tempore sapiente similique ex, alias provident repudiandae labore fugit harum quia distinctio odit impedit aspernatur qui.
                </p>
            </details>
         <!-- Expandir y reducir texto-->
        <a href="/admin" class="boton boton-verde"> Volver</a>

        <!-- VER ERRORES Y SI SI SE PUDO MANDAR A DB--> 
        <?php 
        foreach($errores as $error)://Alias a error ?>
        <div class="alerta error">
            <?php echo $error?>
        </div>
        <?php endforeach; ?>

        <!-- FORMULARIO CREAR-->
        <!-- Enctype SE USA PARA ARCHIVOS EN FORMULARIOS-->
        <form class="formulario" method="POST" enctype="multipart/form-data"> 
            <!-- ACTION= A DONDE SE VAN A MANDAR LOS DATOS-->
            <!-- 1-->
            <?php  
            //!! Mandar a llamar FORMULARIO_PROPIEDADES.PHP */
            include '../../includes/templates/formulario_propiedades.php';
            
            
            ?>
            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
        <!-- FORMULARIO CREAR-->
    </main>

       <!-- Incluir archivos -->
       <?php
        incluirTemplate('footer'); 
    ?>