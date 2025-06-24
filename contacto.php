<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/ejem11.jpg" type="image/jpeg">
            <source srcset="build/img/ejem11.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/ejem11.jpg" alt="Imagen Contacto">
        </picture>

        <h2></h2>

        <form class="formulario">
            <fieldset>
                <legend> </legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email">

                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Tu Teléfono" id="telefono">

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vende o Compra:</label>
                <select id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto">

            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>Si eligió teléfono, elija la fecha y la hora</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00">

            </fieldset>

           <input type="button" value="Enviar" class="boton-verde" id="abrirModal">

        </form>
    </main>


    <!-- MODAL PREVISUALIZACIÓN -->
<div id="modalConfirm" class="modal-blur" style="display:none;">
  <div class="modal-contenido">
    <h2>Confirma tu información</h2>
    <div id="previewDatos"></div>
    <form method="POST" action="">
      <input type="hidden" name="datos" id="datosFinales">
      <button type="submit" class="boton-verde">Confirmar Envío</button>
    </form>
    <button onclick="cerrarModal()" class="boton-rojo">Cancelar</button>
  </div>
</div>
<style>
.modal-blur {
  position: fixed;
  top: 0; left: 0;
  width: 100vw; height: 100vh;
  backdrop-filter: blur(7px);
  background-color: rgba(0,0,0,0.4);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}
.modal-contenido {
  background-color: white;
  padding: 30px;
  border-radius: 12px;
  max-width: 500px;
  width: 90%;
  box-shadow: 0 0 10px #0003;
  text-align: center;
}
.boton-rojo {
  background-color: #d9534f;
  color: white;
  border: none;
  padding: 10px 25px;
  margin-top: 10px;
  cursor: pointer;
  border-radius: 5px;
}
</style>
<script>
document.getElementById("abrirModal").addEventListener("click", () => {
  const nombre = document.getElementById("nombre").value;
  const email = document.getElementById("email").value;
  const tel = document.getElementById("telefono").value;
  const mensaje = document.getElementById("mensaje").value;
  const opcion = document.getElementById("opciones").value;
  const presupuesto = document.getElementById("presupuesto").value;
  const contacto = document.querySelector('input[name="contacto"]:checked')?.value || '';
  const fecha = document.getElementById("fecha").value;
  const hora = document.getElementById("hora").value;

  const preview = `
    <p><strong>Nombre:</strong> ${nombre}</p>
    <p><strong>Email:</strong> ${email}</p>
    <p><strong>Teléfono:</strong> ${tel}</p>
    <p><strong>Mensaje:</strong> ${mensaje}</p>
    <p><strong>Operación:</strong> ${opcion}</p>
    <p><strong>Presupuesto:</strong> ${presupuesto}</p>
    <p><strong>Prefiere contacto por:</strong> ${contacto}</p>
    <p><strong>Fecha:</strong> ${fecha}</p>
    <p><strong>Hora:</strong> ${hora}</p>
  `;
  
  document.getElementById("previewDatos").innerHTML = preview;
  document.getElementById("datosFinales").value = preview;
  document.getElementById("modalConfirm").style.display = "flex";
});

function cerrarModal() {
  document.getElementById("modalConfirm").style.display = "none";
}
</script>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $message = $_POST['datos'];

    // Guarda el contenido en un archivo local
    file_put_contents("debug_mensaje.html", $message);

    echo "<script>alert('Mensaje guardado localmente'); window.location.href='index.php';</script>";

    
}

?>

       <!-- Incluir archivos -->
       <?php
        incluirTemplate('footer'); 
    ?>