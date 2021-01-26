<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Regístrate</title>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Controladores/registroController.php';
        ?>
    </head>
    <body>
        <header class="masthead text-white text-center">
            <?php
            if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional'])) {
                sesion_iniciada();
            } elseif (isset($_SESSION['admin'])) {
                cabecera_admin();
            } else {
                no_sesion_iniciada();
            }
            ?>
        </header>
        <main>
            <article>
                <section class="align-content-center" >
                    <form action="../Controladores/registroController.php" method="POST">
                        <table class="table-responsive-lg">
                            <thead><th>Formulario de registro</th></thead>
                            <tr>
                                <td>Nombre y Apellidos:</td>
                                <td>
                                    <input class="form-control" type="text" id="nombre_apellidos" name="nombre_apellidos" value="" />
                                </td>
                            </tr>
                            <tr>
                                <td>Usuario:</td>
                                <td>
                                    <input class="form-control" type="text" id="nombre_usuario" name="nombre_usuario" value="" />
                                </td>
                            </tr>
                            <tr>
                                <td>Tipo de usuario:</td>
                                <td>
                                    <input  class="form-check-input" required type="radio" name="tipo" id="profesional" value="profesional">
                                    <label class="form-check-label" for="profesional">Profesional</label>
                                </td>
                                <td>
                                    <input  class="form-check-input" type="radio" name="tipo" id="particular" value="particular">
                                    <label class="form-check-label" for="particular">Particular</label>
                                </td>
                            </tr>
                            <tr id="form_empresa">
                                <td>Empresa:</td>
                                <td>
                                    <input type="text" name="empresa" id="empresa" value="" />
                                </td>
                                <td><label class="alert-info">Si usted trabaja para una empresa, por favor, rellene este campo</label></td>
                            </tr>
                            <tr>
                                <td>Contraseña:</td>
                                <td>
                                    <input class="form-control" type="password" id="contrasenya" name="contrasenya" value="" />
                                </td>
                            </tr>
                            <tr>
                                <td>Confirmar contraseña:</td>
                                <td>
                                    <input class="form-control" type="password" id="conf_contrasenya" name="conf_contrasenya" value="" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="btn btn-primary" type="submit" id="enviar" name="enviar" value="Confirmar registro" />
                                </td>
                            </tr>
                            <?php
                            if (isset($_POST["error_registro"])) {
                                ?>
                                <tr>
                                    <td>
                                        <p style="color: red;"><?php $_POST["error_registro"] ?><p>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </form>
                </section>
            </article>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#form_empresa").hide();
                    $("input:radio").click(function () {
                        if ($("input:radio[name=tipo]:checked").val() != "profesional") {
                            $("#form_empresa").hide();
                        } else {
                            $("#form_empresa").show();
                        }

                    });
                });
            </script>
        </main>
    </body>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>