
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cuenta Usuario Profesional </title>
    </head>
    <body>
        <header>
            <div id="encabezadoParticular">
                <h1>Hola <?php $_SESSION['user'] ?> !Bienvenido a tu area de gestión</h1>
                <form action="particular.php" method="POST">
                    <input type="submit" id="logout" name="logout" value="Desconectar" />
                </form>
                <br><br>
                <a href="anunciate.php">Publica tu anuncio gratis</a>
            </div>
        </header>


        <nav>
            <a>General</a>
            <a>Anuncios</a>
            <a>Mis Alertas</a>
            <a>Mis Mensajes</a>
            <a>Mi perfil</a>
        </nav>

    </body>
    <?php
    if (isset($_POST['logout'])) {
        $_SESSION['user'] = NULL;
        header('Location: login.php');
    }
    ?>
</html>
