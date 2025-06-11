<?php 

?>
<fieldset>
                <legend> </legend>

                <label for="titulo"> Nombre:</label> 
                <!-- -->
                <input type="text" id="nombre" name="vendedor[nombre]" 
                       placeholder="Nombre del postulante" value="<?php echo s($vendedor->nombre); ?>"> 
                <label for="titulo"> Apellido:</label> 
                <!-- -->
                <input type="text" id="apellido" name="vendedor[apellido]" 
                       placeholder="Apellido del postulante" value="<?php echo s($vendedor->apellido); ?>"> 
                <label for="titulo"> E-mail:</label> 
                <!-- -->
                <input type="email" id="email" name="vendedor[email]" 
                       placeholder="E-mail del postulante" value="<?php echo s($vendedor->email); ?>"> 
</fieldset> 
<fieldset>

<legend>   </legend>

                <label for="titulo"> Teléfono:</label> 
                <!-- -->
                <input type="telefono" id="nombre" name="vendedor[telefono]" 
                       placeholder="Teléfono del postulante" value="<?php echo s($vendedor->telefono); ?>"> 
</fieldset>