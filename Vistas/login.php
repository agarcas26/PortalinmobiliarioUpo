<!doctype html>
<html>
    <head>
        <title>title</title>
        <?php
        session_start();
        include_once '../Controladores/loginController.php';
        include_once '../PortalinmobiliariaUPO/Vistas/header.php';
        ?>
    </head>
    <body>
        <header class="masthead text-white text-center">
            <?php
            if (isset($_SESSION['usuario'])) {
                sesion_iniciada();
            } elseif (isset($_SESSION['admin'])) {
                cabecera_admin();
            } else {
                no_sesion_iniciada();
            }
            ?>
        </header>
        <main>
            <h2>Iniciar sesion</h2>
            <?php
            if (!isset($_POST['registro']) && !isset($_POST['entrar'])) {
                ?>
                <form action="loginController.php" method="post">
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
                    <div class="registro">
                        <input type="submit" name="registro" value="registro" />
                    </div>
                </form>
                <?php
            }
            ?>
        </main>
    </body>
    <footer class="footer bg-light">
        <?php
        include_once '../Vistas/footer.html';
        ?>
    </footer>
</html>





