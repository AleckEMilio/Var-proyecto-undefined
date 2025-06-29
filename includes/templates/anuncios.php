
<?php 
   use App\Propiedad;
   
   // LIMITE DE PROPIEDADES A VERSE EN INDEX 

   if($_SERVER['SCRIPT_NAME'] === '/anuncios.php') {
        $propiedades = Propiedad::all(); //! Se TRAE TODOS los resultados que hay en db
   } else {
        $propiedades = Propiedad::get(6);
   }
?>

            <div class="contenedor-anuncios">
            <!-- Que se generen los anuncios-->
            <?php foreach($propiedades as $propiedad) {?>
            <div class="anuncio">
                  
                    <img loading="lazy" src="/imagenes/<?php echo$propiedad->imagen;?>" alt="anuncio">


                <div class="contenido-anuncio">
                    <!-- 
                        Cambiar sintaxis de arreglo:  
                            echo$propiedad['descripcion'];
                        a de objeto:
                            echo$propiedad->imagen;
                    -->
                    <h3><?php echo$propiedad->titulo;?></h3>
                    <p><?php echo$propiedad->descripcion;?></p>
                    <p class="precio">$<?php echo$propiedad->precio;?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo$propiedad->wc;?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo$propiedad->estacionamiento;?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p><?php echo$propiedad->habitaciones;?></p>
                        </li>
                    </ul>

                    <a href="anuncio.php?id=<?php echo $propiedad->id?>" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div><!--.contenido-anuncio-->
            </div><!--anuncio-->
            <?php } ?>
        </div> <!--.contenedor-anuncios-->
