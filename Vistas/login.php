<!doctype html>
<html>
    <head>
        <title>title</title>
        <?php
        session_start();
        include_once '../Controladores/loginController.php';
        ?>
    </head>
    <body>
        <header>
            <script src="scripts.js">
                header();
            </script>
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
    <footer>
        <script src="scripts.js">
                footer();
        </script>
    </footer>
</html>





