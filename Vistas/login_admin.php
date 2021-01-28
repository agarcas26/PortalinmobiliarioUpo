<!doctype html>
<html>
 <head>
        <title>Iniciar sesión</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <?php
        include_once '../Controladores/loginAdminController.php';
        include_once '../Vistas/header.php';
        ?>
    </head>
    <body>
        <header class="masthead text-white text-center">
            <?php
            if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional'])) {
                header("Location: ../Vistas/index.php");
            } elseif (isset($_SESSION['admin'])) {
                header("Location: ../Vistas/index.php");
            } else {
                no_sesion_iniciada();
            }
            ?>
        </header>
        <main style="margin-left: 37%" class="align-self-center">
            <h2>Inicio de sesi&oacute;n</h2>
            <?php
            if (!isset($_POST['registro']) && !isset($_POST['entrar'])) {
                ?>
                <form action="../Controladores/loginController.php" method="post">
                    <div class="usuario">
                        <label class="form-group" class="label" for="fijo">Usuario: </label>
                        <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-text">
                    </div> 
                    <div class="contraseña">
                        <label class="form-group" class="label" for="fijo">Contraseña:  </label>
                        <input type="password" id="contrasenya" name="contrasenya" class="form-text">
                    </div> 
                    <br>
                    <div class="entrar" style="float: left;" >
                        <input class="btn btn-primary" type="submit" name="entrar" value="Iniciar sesión" class="form-text" />
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