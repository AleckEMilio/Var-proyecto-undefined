
<footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>
        <!-- Cambiar fecha automaticamente-->
        <?php 
            $fecha = date('d-m-Y');
        ?>
        <!-- Cambiar fecha automaticamente-->
        <p class="copyright">Todos los derechos Reservados  <?php echo $fecha;?> &copy;</p>
       
    </footer>

    <script src="/build/js/bundle.min.js"></script>
</body>
</html>