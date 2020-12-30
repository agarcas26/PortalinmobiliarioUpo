<!doctype html>
<html>
    <head>
        <?php
        session_start();
        include_once '../Controladores/AdministradoresController.php';
        ?>
    </head>
    <body>
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
</html>