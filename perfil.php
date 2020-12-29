<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi Perfil</title>
        <?php
        include_once '../Controladores/PerfilController.php';
        ?>
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
            <?php
            $datos = getDatosPerfil($_SESSION['usuario']);
            ?>
            <form action="perfil.php" method="POST">
                <input type="submit" name="logout" value="Cerrar sesión" />
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
                            <input type="type" name="usuario" value="<?php echo $datos[0]; ?>">
                        </td>
                        <td>
                            <label>Nombre: </label>
                            <input type="type" name="nombre" value="<?php echo $datos[1]; ?>">
                        </td>
                        <td>
                            <label>Correo: </label>
                            <input type="type" name="email" value="<?php echo $datos[2]; ?>">
                        </td>
                        <td>
                            <label>Contraseña: </label>
                            <input type="password" name="pass" value="">
                            <label>Para cambiar la contraseña, por favor, introduzca su contraseña actual</label>
                        </td>
                        <td>
                            <label>Nueva contraseña: </label>
                            <input type="password" name="nueva_pass" value="">
                        </td>
                        <td>
                            <label>Confirmar nueva contraseña: </label>
                            <input type="password" name="conf_nueva_pass" value="">
                        </td>
                    </tr>
                </table>

                <input type="submit" name="guardar" value="Guardar cambios" />
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

        <?php
        if (isset($_POST['logout'])) {
            unset($_SESSION['user']);
            header('Location: login.php');
        }

        if (isset($_POST['guardar'])) {
            salvarCambios($datos, $_POST['pass'], $_POST['nueva_pass'], $_POST['conf_nueva_pass']);
        }
        ?>
    </body>
    <footer>

    </footer>
</html>
</html>