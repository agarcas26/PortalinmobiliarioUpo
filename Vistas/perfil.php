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
            <form action="PerfilController.php" method="POST">
                <input type="submit" name="logout" value="Cerrar sesión" />
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
                        <td>
                            <label>Correo: </label>
                            <input type="type" name="email" value="<?php echo $datos[2]; ?>">
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
                        }else{
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
    <footer>

    </footer>
</html>
</html>