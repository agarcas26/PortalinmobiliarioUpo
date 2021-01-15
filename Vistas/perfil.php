<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi Perfil</title>
        <?php
        include_once '../Controladores/PerfilController.php';
        include_once '../scripts.js';
        ?>
    </head>
    <body>
        <header class="masthead text-white text-center">
            <script src="scripts.js">
                header();
            </script>
        </header>
        <main>
            <aside>
                <!-- ANUNCIOS -->
            </aside>
            <form action="PerfilController.php" method="POST">
                <button class="btn btn-block btn-lg btn-primary" type="submit" name="logout" value="Cerrar sesión" />
                <table>
                    <tr>
                    <h1>Datos del perfil</h1>
                    </tr>
                    <tr>
                        <?php
                        if (!isset($_SESSION['searchuser'])) {
                            $datos = getDatosPerfil($_SESSION['usuario']);
                        } else {
                            $datos = getDatosPerfil($_SESSION['searchuser']);
                        }
                        ?>
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
                        <?php
                        if (!isset($_SESSION['searchuser'])) {
                            ?>
                            <td>
                                <label>Contraseña: </label>
                                <input type="password" name="pass" value="">
                                <label>Para cambiar la contraseña, por favor, introduzca su contraseña actual</label>
                            </td>
                            <?php
                        } else {
                            ?>

                            <?php
                        }
                        ?>
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
        </main>  
    </body>
    <footer class="footer bg-light">
        <script src="scripts.js">
                footer();
        </script>
    </footer>
</html>
</html>