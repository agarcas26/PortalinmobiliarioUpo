<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi Perfil</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <?php
        include_once '../Controladores/PerfilController.php';
        include_once '../Vistas/header.php';
        ?>
    </head>
    <body>
        <header class="masthead">
            <?php
            if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional'])) {
                sesion_iniciada();
                if (isset($_SESSION['usuario_particular'])) {
                    $usuario = $_SESSION['usuario_particular'];
                } else {
                    $usuario = $_SESSION['usuario_profesional'];
                }
            } elseif (isset($_SESSION['admin'])) {
                cabecera_admin();
                $usuario = $_SESSION['admin'];
            } else {
                no_sesion_iniciada();
            }
            ?>
        </header>
        <main>
            <aside>
            </aside>
            <form action="../Controladores/PerfilController.php" method="POST">
                <button class="btn btn-block btn-lg btn-primary" type="submit" name="logout" value="" />Cerrar sesión</button>
                <table>
                    <h1>Datos del perfil</h1>
                    <?php
                        $datos = getDatosPerfil();
                    ?>
                    <tr>
                        <td>
                            <label>Usuario: </label>
                            <label><?php echo $datos[0]; ?></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nombre: </label>
                            <label><?php echo $datos[1]; ?></label>
                        </td>
                    </tr>
                    <tr>
                        <?php
                        if (!isset($_SESSION['searchuser'])) {
                            ?>
                            <td>
                                <label>Contraseña: </label>
                                <input type="password" name="pass" value="">
                                <label>Para cambiar la contraseña, por favor, introduzca su contraseña actual</label>
                            </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td>                                
                            <label>Para cambiar la contraseña, por favor, introduzca su contraseña actual</label>
                            <label>Nueva contraseña: </label>
                            <input type="password" name="nueva_pass" value="">
                        </td>
                    </tr>
                    <tr>
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
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>
</html>