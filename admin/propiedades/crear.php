
<?php  

    //& SUPERGLOBALES
       //Post = Enseña en la pantalla (para mandar a servidor info. sensible)
       //Get = Enseña en URL (Para mandar links, no datos sencibles)
       //Server = Muestra info del servidor

    require '../../includes/app.php';

    // * LIBRERIA INTERVETION IMAGE
    use App\Propiedad;
    // PARA ENSEÑAR LOS VENDEDORES
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

            // LOG.IN
            //Iniciar sesion
            estaAutenticado();
        
            $propiedad = new Propiedad;
            // Consulta para obtener todos los vendedores
            $vendedores = Vendedor::all();

         
            //verificacion de error
            $errores = Propiedad::getErrores();        // Obtenemos los errores

            // Se crean para que despues; //POST les de valor 
            //!  Se puede borrar al hacer uso de una instancia en propiedad 
                   
            // $titulo          = '';
            // $precio          = '';
            // $descripcion     = '';
            // $habitaciones    = '';
            // $wc              = '';
            // $estacionamiento = '';
            // $vendedores_id   = '';

            // Validar POST (para que hasta que se mande el form se vea si es POST)
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                /** Creando una nueva instancia */
                // Instanciando la clase de propiedad
                $propiedad = new Propiedad($_POST['propiedad']);
                
                //Generar un nombre único para cada imagen
                $nombreImagen = md5( uniqid( rand(), true )).".jpg"; //Nombre único
                
                /* SETEAR  */
                // Realizar UN RESIZE A LA IMAGEN con INTERVENTION
                
                                            // $_FILES es en //& donde están las imagenes
                                            // "Image es del //& as intervention"
                                            // FIT() es la   //& API que queremos usar
                                            // Hace que las imagenes se adapten a untamaño

                if($_FILES['propiedad']['tmp_name']['imagen']) {
                    // EN caso de HABER imagen se define
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                    $propiedad->setImagen($nombreImagen);  
                }
                //Validar
                $errores = $propiedad->validar();
      
                if(empty($errores)) {
                    
                    //Crear la carpeta para subir imágenes 
                    if(!is_dir(CARPETA_IMAGENES)) {          // Validar si existe la carpeta para que no cree una y otra vez
                        mkdir(CARPETA_IMAGENES);             // is_dir es para ver si una carpeta ya existe o no
                    }
                    
                    //Guardar la imagen en el servidor 
                    $image->save(CARPETA_IMAGENES . $nombreImagen); //& Save para guardar en el servidor    
                    
                    //Guardar en DB
                    $resultado=$propiedad->guardar();
                    //? Cuando se manda a llamar guardar, se manda a llamar actualizar() y crear() de forma condicional
                     
                }
            }
               
                            //**         AQUÍ SE ACABA PHP            */


    incluirTemplate('header');
?>

<!-- -->
    <main class="contenedor seccion">
        <!-- <h1>Crear</h1> -->
        
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
                //* HACER QUE SE GUARDEN LAS OPCIONES SI NO SE CUMPLEN CON ACTIVE RECORD */
                // Se guarda en TEMPLATES
        ?>
   
       <?php foreach($errores as $error): ?>
       <div class="alerta error">
           <?php echo $error; ?>
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
            
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
        <!-- FORMULARIO CREAR-->
    </main>

       <!-- Incluir archivos -->
       <?php
        incluirTemplate('footer'); 
    ?>
 

