<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi Perfil</title>
    </head>
    <body>
        <header>
            <div id="encabezado">
                <h1>¡Hola <?php $_SESSION['user'] ?> !Bienvenido a tu area de gestión</h1>
                <form action="perfil.php" method="POST">
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
        <main>
            <h3>Imagen de perfil:</h3>
            <?php
            if(!isset($_SESSION['searchuser'])){                //opcion exclusiva para admins
                echo "<figure>";
                echo getusuario($_SESSION['searchuser'])[2] ;
                echo "</figure>";
            }else{                                              //opcion para usuarios
                echo "<figure>";
                echo getusuario($_SESSION['user'])[2]; 
                echo "</figure>";
            }
            ?>
            
            <h3>Nombre usuario</h3>
            <?php
            if(!isset($_SESSION['searchuser'])){                //opcion exclusiva para admins
                echo getusuario($_SESSION['searchuser'])[0];
            }else{                                              //opcion para usuarios
                echo getusuario($_SESSION['user'])[0]; 
            }
            ?>
            <h3>Correo</h3>
            <?php
            if(!isset($_SESSION['searchuser'])){                //opcion exclusiva para admins
                echo getusuario($_SESSION['searchuser'])[1];
            }else{                                              //opcion para usuarios
                echo getusuario($_SESSION['user'])[1]; 
            }
            ?>
            
        </main>

    </body>

    <?php
    if (isset($_POST['logout'])) {
        unset($_SESSION['user']);
        header('Location: login.php');
    }
    ?>
</html>
</html>