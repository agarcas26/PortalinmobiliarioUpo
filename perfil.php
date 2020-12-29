<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi Perfil</title>
    </head>
    <body>
        <header>
            <nav>
                <a>Anuncios</a>
                <a>Mis alertas</a>
                <a>General</a>
                <a>Mis mensajes</a>
                <a>Mi perfil</a>
            </nav>
            <img src="src" alt="Logo"/>
        </header>
        <main>
            <aside>
                <!-- ANUNCIOS -->
            </aside>
            <form action="perfil.php" method="POST">
                <table>
                    <tr>
                    <h1>Datos del perfil</h1>
                    </tr>
                    <tr>
                        <td>
                            <label>Imagen de perfil: </label>
                            <img src="src" alt="Imagen de perfil"/>
                        </td>
                        <td>
                            <label>Usuario: </label>
                            <input type="type" name="name">
                        </td>
                        <td>
                            <label>Nombre: </label>
                            <input type="type" name="name">
                        </td>
                        <td>
                            <label>Correo: </label>
                            <input type="type" name="name">
                        </td>
                        <td>
                            <label>Contraseña: </label>
                            <input type="type" name="name">
                        </td>
                    </tr>
                </table>

                <input type="submit" value="Guardar cambios" />
            </form>
            <?php
            if (!isset($_SESSION['searchuser'])) {                //opcion exclusiva para admins
                echo "<figure>";
                echo getusuario($_SESSION['searchuser'])[2];
                echo "</figure>";
            } else {                                              //opcion para usuarios
                echo "<figure>";
                echo getusuario($_SESSION['user'])[2];
                echo "</figure>";
            }
            ?>

            <h3>Nombre usuario</h3>
            <?php
            if (!isset($_SESSION['searchuser'])) {                //opcion exclusiva para admins
                echo getusuario($_SESSION['searchuser'])[0];
            } else {                                              //opcion para usuarios
                echo getusuario($_SESSION['user'])[0];
            }
            ?>
            <h3>Correo</h3>
            <?php
            if (!isset($_SESSION['searchuser'])) {                //opcion exclusiva para admins
                echo getusuario($_SESSION['searchuser'])[1];
            } else {                                              //opcion para usuarios
                echo getusuario($_SESSION['user'])[1];
            }
            ?>

        </main>

    </body>
    <footer>

    </footer>
    <?php
    if (isset($_POST['logout'])) {
        unset($_SESSION['user']);
        header('Location: login.php');
    }
    ?>
</html>
</html>