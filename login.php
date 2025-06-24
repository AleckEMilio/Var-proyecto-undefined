<?php
//* DB connection
require 'includes/app.php';
$db = conectarDB();
//! PASSWORD: Kokuten04

$errores = []; //Global

//* Autenticar el usuario
// Leer arreglos de $_POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //SANITIZAR


    $email      = mysqli_real_escape_string(
        $db,  // Guardar en db
        filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    );  //ASIGNAR POST A ESAS VARIABLES
    // Para validar el email en el email


    $passsword  = mysqli_real_escape_string(
        $db,  // Guardar en db
        $_POST['password']
    );
    //SANITIZAR

    //Errores 
    if (!$email) { //Si no hay
        $errores[] = "E-mail obligatorio o no válido";
    }
    if (!$passsword) { //Si no hay
        $errores[] = "Contraseña obligatorio o no válida";
    }
    //Errores 
    // Válidaciones vacias
    if (empty($errores)) {
        // Revisar si el usario existe ;)
        $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
        //leer los resultados
        $resultado = mysqli_query($db, $query);


        if ($resultado->num_rows) { // SI UN REGISTRO EXISTE O NO
            $usuario = mysqli_fetch_assoc($resultado);
            // Verificar que el password es correcto 
            $auth = password_verify($passsword, $usuario['password']);

            var_dump($auth);
            if ($auth) {
                // EL usuario es correcto
                session_start(); //~ SESSION ES PARA MANTENER LA SESION DEL USUARIO 
                // Llenar el arreglo de la sesión           
                $_SESSION['usuarios'] = $usuario['email']; //! SESIONES
                $_SESSION['login'] = true;
                header('Location: /admin');
            } else {
                $errores[] = "Contraseña incorrecta";
            }
        } else {
            $errores[] = "El usuario no existe ";
        }
    }
}
// /Validar








//Incluye el header

incluirTemplate('header');
?>

<main class="contenedor seccion">

    <!-- ERROR ALERT-->
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error;  ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" novalidate>
        <fieldset>
            <legend> </legend>

            <label for="email"></label>
            <input type="email" name="email" placeholder="Tu Email" id="email">

            <label for="password"></label>
            <input type="password" name="password" placeholder="Tu Contraseña :)" id="password">
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<!-- Incluir archivos -->
<?php
incluirTemplate('footer');
?>