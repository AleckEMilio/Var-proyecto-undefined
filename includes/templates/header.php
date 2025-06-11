
    <?php
   
    if(!isset($_SESSION)){   //! SESIONES
        session_start(); // REVISAR SI HAY UNA SESION INICIADA 
    }
   
    $auth = $_SESSION['login'] ?? false; //! SESIÓN no iniciada

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="website icon" href="/imagenes/Max_.webp" type="webp">
    <link rel="stylesheet" href="/build/css/app.css"> <!-- Se usa / para poner las propiedades en arcvhivos
                                                        Por fuera de los demás--> 
</head>
<body>
    
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
                                <!-- ISSET sirve para NO revelar información -->
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/index.php">
                    <img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                <!-- <img class="dark-mode-boton" src="/build/img/dark-mode.svg"> -->
            
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        
                        <?php if ($auth): ?> <!-- : para ejectutar lo sig-->
                            <a  class="butt type1 btn-txt" href="cerrar-sesion.php"> 
                                Cerrar
                            
                            </a>
                        <?php endif;?>
                        

                    </nav>
                   
                </div>
                <div>
                    <h1>
                        Proyecto AFKV
                    </h1>
                </div>
               
                
                
               
            </div> <!--.barra-->
                <?php if($inicio) {?>
            <h1>Venta de Casas y Departamentos  Exclusivos de Lujo</h1>
            
            <?php }?>
        </div>
    </header>