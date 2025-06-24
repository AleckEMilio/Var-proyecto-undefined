<!-- Incluir archivos -->
<!-- Alerta en el buscador-->
<script>
    let docTitle = document.title;
    window.addEventListener("blur", () => {
        document.title = ":( ";
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
<!-- 
?  
-->
<a id="botonLogin" href="login.php" style="display: none; text-decoration: none;">
    <button>
        L O G I N 
        <div id="clip">
            <div id="leftTop" class="corner"></div>
            <div id="rightBottom" class="corner"></div>
            <div id="rightTop" class="corner"></div>
            <div id="leftBottom" class="corner"></div>
        </div>
        <span id="rightArrow" class="arrow"></span>
        <span id="leftArrow" class="arrow"></span>
    </button>
</a>


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
    <h2>Casas y Departamentos</h2>
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
                    <source srcset="build/img/ejem6.jpg" type="image/jpeg">
                    <source srcset="build/img/ejem6.jpg" type="image/jpeg">
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

</div>

<!-- MODAL DE BIENVENIDA -->
<div id="bienvenida-modal" class="modal">
    <div class="modal-contenido">
        <h1> Hola! Bienvenid@</h1>
        <h2>AFKV</h2>
        <p>Descubre nuestras casas y departamentos exclusivos</p>
        <a href="index.php" class="boton-iniciar">Iniciar</a>
    </div>
</div>

<style>
    .modal {
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-image: url('build/img/ejem13.jpg');
        background-size: cover;
        background-position: center;
        backdrop-filter: blur(8px);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-contenido {
        background-color: rgba(0, 0, 0, 0.75);
        padding: 40px;
        border-radius: 10px;
        text-align: center;
        color: #fff;
        max-width: 500px;
        animation: fadeIn 1.5s ease-out;
    }

    .modal-contenido h1 {
        font-size: 2em;
        margin-bottom: 10px;
    }

    .modal-contenido p {
        font-size: 1.2em;
        margin-bottom: 20px;
    }

    .boton-iniciar {
        background-color: #ffc107;
        color: #000;
        text-decoration: none;
        padding: 10px 30px;
        font-weight: bold;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
    }

    .boton-iniciar:hover {
        background-color:rgb(212, 169, 38);
        transform: scale(5);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes shrinkOut {
    0%   { opacity: 1; transform: scale(1); }
    100% { opacity: 0; transform: scale(0.6); }
}
.cerrando {
    animation: shrinkOut 0.45s ease forwards; 
}
</style>

<audio id="sonidoSecreto" src="https://assets.mixkit.co/sfx/preview/mixkit-arcade-game-complete-or-approved-mission-205.mp3"></audio>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const modal  = document.getElementById("bienvenida-modal");
    const boton  = document.querySelector(".boton-iniciar");

    boton.addEventListener("click", e => {
        e.preventDefault();

        modal.classList.add("cerrando");
        modal.addEventListener("animationend", () => {
            modal.style.display = "none";

        }, { once: true });
    });
});

const loginBtnWrapper = document.getElementById("botonLogin");
    const sonido = document.getElementById("sonidoSecreto");

    const konamiCode = ["v", "a", "l", "d", "o", ];
    let inputBuffer = [];
    let desbloqueado = false;

    window.addEventListener("keydown", (e) => {
        if (desbloqueado) return;

        inputBuffer.push(e.key);
        if (inputBuffer.length > konamiCode.length) inputBuffer.shift();

        if (konamiCode.every((val, i) => val === inputBuffer[i])) {
            desbloqueado = true;
            loginBtnWrapper.style.display = "inline-block";
            sonido.play();
            confetti({
                particleCount: 150,
                spread: 70,
                origin: { y: 0.6 }
            });
        }
    });

</script>


<!-- Incluir archivos -->
<?php
incluirTemplate('footer');
//? Va a ir a los tamplates, va al footer: y lo va a incluir
?>