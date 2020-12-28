<!doctype html>
<html>
    <head>
        <?php
        include_once '../Controladores/AdministradoresController.php';
        ?>
    </head>
    <body>
        <h2>Iniciar sesion</h2>

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
        </form>


        <?php
        if (isset($_POST['entrar'])) {
            if (iniciar_sesion_administrador($_POST['user'], $_POST['pass'])) {
                header("Location: index.php");
            }else{
                alert("Introduzca unas credenciales válidas");
            }
        }
        ?>

    </body>
</html>