<!doctype html>
<html>
    <head>
        <?php
        session_start();
        include_once '../Controladores/AdministradoresController.php';
        include_once '../Vistas/header.php';
        ?>
    </head>
    <body>
        <header class="masthead text-white text-center">
            <?php
            if (!isset($_POST['registro']) && !isset($_POST['entrar'])) {
                sesion_iniciada();
            } elseif (isset($_SESSION['admin'])) {
                cabecera_admin();
            } else {
                no_sesion_iniciada();
            }

            if (isset($_SESSION['usuario_particular'])) {
                unset($_SESSION['usuario_particular']);
            }
            if (isset($_SESSION['usuario_profesional'])) {
                unset($_SESSION['usuario_particular']);
            }
            ?>
        </header>
        <h2>Iniciar sesion</h2>
        <form action="loginAdminController.php" method="post">
            <div class="usuario">
                <label class="label" for="fijo">Usuario: </label>
                <input type="text" id="user" name="user">
            </div> 
            <div class="contraseña">
                <label class="label" for="fijo">Contraseña:  </label>
                <input type="password" id="pass" name="pass">
            </div> 
            <div class="entrar">
                <input type="submit" name="entrar" value="entrar" />
            </div>
        </form>
    </body>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>