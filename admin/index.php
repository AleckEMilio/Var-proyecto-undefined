<?php
   require '../includes/app.php';
   estaAutenticado();
   Use App\Propiedad;
   use App\Vendedor;
    
  

   //^ Implementar ACTIVE RECORD para traer TODOS los resultados
   $propiedades = Propiedad::all();
   $vendedores  = Vendedor ::all();
   
   
   
//Obtener redirección y mostrar alerta

$resultado = $_GET['resultado'] ?? null; // null ??= Buscar lo q esta en [ y si no esta; es null]

// Mostrar los resultados(ABAJO)

    if($_SERVER['REQUEST_METHOD'] === 'POST'){  //Comprobar el id e identificarlo
        
        $id = $_POST['id']; 
        $id = filter_var($id, FILTER_VALIDATE_INT); //Comprobar el id e identificarlo
      

        if($id){    // SI si hay un id seleccionado;
            $tipo = $_POST['tipo'];
            // VALIDAR EL TIPO DE ID A BORRAR
            if(validarTipoContenido($tipo)){
                // Comparar lo que se va a borrar
                if($tipo === 'vendedor'){

                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar(); // Heredar y elimina

                } elseif($tipo=== 'propiedad') {

                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
// Cerrar la conexión(ABAJO)

//Incluir un template
    
    incluirTemplate('header');
?>


    <main class="contenedor seccion">
       
        <h1>Administrador de Bienes Raices</h1>
        
        <?php 
        //! s() es para evitar inyección sql
        $mensaje = mostrarNotificacion(intval($resultado) ); // Intval es un método ordinario
        if($mensaje) {  ?>
            <p class="alerta exito">
                <?php  echo s($mensaje)?>
            </p>
        <?php } ?>
        
       
        <!--Obtener redirección y mostrar alerta-->
         <!-- TABLE PARA LISTAR PROPIEDADES-->
        <a href="/admin/propiedades/crear.php" class="boton boton-verde"> Nueva Propiedad</a>
        <!-- TABLA PARA LISTAR VENDEDOREE-->
        <a href="/admin/vendedores/crear.php" class="boton boton-amarillo"> Crear vendedor</a>

         <h2>Propiedades</h2>
    
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th> <!-- Eliminar y actualizar registros-->
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados-->
            <?php //! ACTIVE RECORD (Se cambia while por foreach para leer objetos con ->'')
            ?>
            <?php foreach($propiedades as $propiedad):?>  <!-- -> '' Para leer arreglos con foreach-->
                <tr>
                    <td> <?php echo $propiedad->id;?></td>
                    <td> <?php echo $propiedad->titulo;?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen;?>" class="imagen-tabla"> </td>
                    <td> $<?php echo $propiedad->precio;?></td>
                    <td>    
                        
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" 
                        class="boton-amarillo-block">Actualizar</a>

                        <!-- ELIMINAR-->
                        <form method="POST" class="w-100">  
                            <!-- Mandar propiedad (id) a eliminar-->
                            <input type="hidden" name="id" value="<?php echo $propiedad->id;?>">
                            <!-- LOGRAR DIFERENCIAR ID´S--> 
                            <input type="hidden" name="tipo" value="propiedad"> 
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>

         <!-- TABLA PARA LISTAR VENDEDORES-->
         <h2>Vendedores</h2>
         <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados-->
            <!-- ACTIVE RECORD (Se cambia while por foreach para leer objetos con ->'') -->
            
            <?php foreach($vendedores as $vendedor):?>  <!-- -> '' Para leer arreglos con foreach-->
                <tr>
                    <td> <?php echo  $vendedor->id;?></td>
                    <td> <?php echo  $vendedor->nombre . " " . $vendedor->apellido;?></td>
                    <td> <?php echo  $vendedor->telefono;?></td>
                    <td>    
                        
                        <a href="/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" 
                        class="boton-amarillo-block">Actualizar</a>

                        <!-- ELIMINAR-->
                        <form method="POST" class="w-100">  
                            <!-- Mandar propiedad (id) a eliminar-->
                            <input type="hidden" name="id" value="<?php echo $vendedor->id;?>"> 
                            <!-- LOGRAR DIFERENCIAR ID´S--> 
                            <input type="hidden" name="tipo" value="vendedor"> 
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </main>

       <!-- Incluir archivos -->
       <?php
       // Cerrar la conexión; opcional para cerrar db
       // mysqli_close($db);
        incluirTemplate('footer'); 
    ?>