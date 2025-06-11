<!-- Incluir archivos -->
<!-- Alerta en el buscador-->
<script>
    let docTitle = document.title;
    window.addEventListener("blur", () =>{
        // document.title = " Saliste de Bienes Raices ";
    })
    window.addEventListener("focus", () => {
        document.title = docTitle;
        
     
    })
</script>
<!-- Alerta en el buscador-->
<?php
    require 'includes/app.php';
    incluirTemplate('header', $inicio = true);
?>
     <a href="login.php" class="boton-verde">Login</a>
     
    <main class="contenedor seccion">
        <h1>Más</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Possimus, suscipit repudiandae. Autem deserunt aliquid deleniti sit minus consectetur obcaecati molestiae dolorem natus dolores reiciendis tempore, explicabo cum nobis laudantium. Voluptates?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Possimus, suscipit repudiandae. Autem deserunt aliquid deleniti sit minus consectetur obcaecati molestiae dolorem natus dolores reiciendis tempore, explicabo cum nobis laudantium. Voluptates?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Possimus, suscipit repudiandae. Autem deserunt aliquid deleniti sit minus consectetur obcaecati molestiae dolorem natus dolores reiciendis tempore, explicabo cum nobis laudantium. Voluptates?</p>
            </div>
        </div>
    </main>
      
    <section class="seccion contenedor">
        <h2>Casas y Departamentps</h2>
            <?php 
                include 'includes/templates/anuncios.php';
            ?>
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>
  

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contactános</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/ejem3.jpg" type="image/jpeg">
                        <source srcset="build/img/ejem3.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/ejem3.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h4>
                        <p class="informacion-meta">Escrito el: <span>20/05/2025</span> por: <span>Aleck</span> </p>

                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Lorem ipsum dolor, sit amet consectetur.</h4>
                         <p class="informacion-meta">Escrito el: <span>20/05/2025</span> por: <span>Aleck</span> </p>

                        <p>
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- No se a quien poner >:c </p>
            </div>
        </section>
    </div>

    <!-- Incluir archivos -->
<?php
    incluirTemplate('footer');
    //? Va a ir a los tamplates, va al footer: y lo va a incluir
?>

    