<!doctype html>
<html>
    <head>
        <title>title</title>
        <?php
        include_once '../Controladores/loginController.php';
        include_once '../Controladores/registroController.php';
        ?>
    </head>
    <body>
        <h2>Iniciar sesion</h2>
        <?php
        if (!isset($_POST['registro']) && !isset($_POST['entrar'])) {
            ?>
            <form action="login.php" method="post">
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
        } else {
            if (isset($_POST['entrar'])) {
                echo loginController($_POST['user'], $_POST['pass']);
            }

            if (isset($_POST['registro'])) {
                header("Location: registro.php");
            }
        }
        ?>
    </body>
</html>





