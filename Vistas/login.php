<!doctype html>
<html>
    <head>
        <title>Iniciar sesión</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <?php
        session_start();
        include_once '../Controladores/loginController.php';
        include_once '../Vistas/header.php';
        ?>
    </head>
    <body>
        <header class="masthead text-white text-center">
            <?php
            if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional'])) {
                sesion_iniciada();
            } elseif (isset($_SESSION['admin'])) {
                cabecera_admin();
            } else {
                no_sesion_iniciada();
            }
            ?>
        </header>
        <main class="align-self-xl-center">
            <h2>Iniciar sesion</h2>
            <?php
            if (!isset($_POST['registro']) && !isset($_POST['entrar'])) {
                ?>
                <form action="../Controladores/loginController.php" method="post">
                    <div class="usuario">
                        <label class="form-group" class="label" for="fijo">Usuario: </label>
                        <input type="text" id="user" name="user" class="form-text">
                    </div> 
                    <div class="contraseña">
                        <label class="form-group" class="label" for="fijo">Contraseña:  </label>
                        <input type="password" id="pass" name="pass" class="form-text">
                    </div> 
                    <div class="entrar">
                        <input class="btn btn-primary" type="submit" name="entrar" value="Iniciar sesión" class="form-text" />
                    </div> 
                    <div class="registro">
                        <input class="btn btn-primary" type="submit" name="registro" value="Registro"/>
                    </div>
                </form>
                <?php
            }
            ?>
        </main>
    </body>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>





