<?php 

//** VALIDAR FORMULARIO PARA QUE SE MANTENGA EL TEXTO (crear.php) */

?>
<fieldset>
                <legend> Información general</legend>

                <label for="titulo"> Título:</label> 
                                                    <!-- "propiedad [titulo]" Es para hacer más corto asignar los valores en ACTIVE RECORD -->
                <input type="text" id="titulo" name="propiedad[titulo]" 
                       placeholder="Título de Propiedad" value="<?php echo s($propiedad->titulo); ?>"> 
                <!-- El id es el mismo del for y que el name-->
                <!-- VALUE PARA PONER ALGO POR DEFAULT-->

                <label for="precio"> Precio:</label>
                <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio Propiedad" value="<?php echo  s($propiedad->precio); ?>">

                <label for="imagen"> Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]"> <!-- PARA IMÁGENES-->
                <?php 
                //* Para darle un placeholder a la imagen y que no se elimine al haber error

                if($propiedad->imagen): //Si hay algo ahí ?>

                    <img src="/imagenes/<?php echo $propiedad->imagen?>" class="imagen-small">
                <?php endif; ?>

                <label for="descripcion"> Descripción:</label>
                <textarea id="descripcion" name="propiedad[descripcion]"> <?php echo s($propiedad->descripcion); ?></textarea>
            
            </fieldset>
            <!-- 2-->
            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="habitaciones"> Habitacioes:</label>
                <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($propiedad->habitaciones); ?>">

                <label for="wc"> Baños:</label>
                <input type="number" id="wc" name="propiedad[wc]" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($propiedad->wc); ?>">

                <label for="estacionamiento"> Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej: 3" min="1" max="9" 
                       value="<?php echo s($propiedad->estacionamiento); ?>">


            </fieldset>
            <!-- 3-->
            <fieldset>
                <legend> Vendedor </legend>
                    <!-- CONSULTAR DB PARA TRAER A LOS VENDEDORES-->
                    <label for="vendedor">Vendedor</label>
                    <select name="propiedad[vendedores_id]" id="vendedor">
                        <option selected value=""> --Seleccionar-- </option>

                    <!-- Iterar sobre resultados-->
                    <!-- Función para sanitizar "s"-->
                    <?php //! se USA -> como objeto por el NEW STATIC DE active record ?>

                    <?php foreach($vendedores as $vendedor) {?>
                        <option 
                        <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : ''; ?>
                        value="<?php echo s($vendedor->id); ?>">
                        <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?> </option> <?php } ?>
                    </select>
           


            </fieldset>