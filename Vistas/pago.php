<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <title>Pago</title>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Controladores/AnunciosController.php';
        include_once '../DAO/daoAnuncios.php';
        ?>
        <script type="text/javascript">
            function datosTarjeta() {
                var tabla_datos = document.getElementById("datos_visa");
                tabla_datos.innerHTML("<tr>"
                        + "<td><label>Nombre titular</label><input type='text' name='titular'/></td>"
                        + "</tr><tr>"
                        + "<td><label>Número tarjeta</label><input type='number' name='num_tarjeta'/></td>"
                        + "</tr>"
                        + "<tr>"
                        + "<td><label>Caducidad</label><input type='text' name='caducidad' /></td>"
                        + "<td><label>CVV</label><input type='password' name='cvv' /></td>"
                        + "</tr>");
            }
        </script>
    </head>
    <body>
        <header class="masthead text-white text-center">
            <?php
            if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional'])) {
                sesion_iniciada();
            } elseif (isset($_SESSION['admin'])) {
                cabecera_admin();
                $usuario = $_SESSION['admin'];
            } else {
                header("Location: ../Vistas/login.php");
            }
            if (isset($_SESSION['usuario_particular'])) {
                $usuario = $_SESSION['usuario_particular'];
            } else if (isset($_SESSION['usuario_profesional'])) {
                $usuario = $_SESSION['usuario_profesional'];
            }
            ?>
        </header>
        <main>

            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="PortalInmobiliarioUPO@gmail.com">
                <input type="hidden" name="lc" value="US">
                <input type="hidden" name="item_name" value=<?php
                $dao=new daoAnuncios();
                $tipo=$dao->get_tipo_anuncio($_GET["id_anuncio"]);
                $dao->destruct;
                if($tipo="compra"){
                echo "Se&ntilde;al compra inmueble"; 
                }else{
                echo "Alquiler mensual";   
                }
                ?>>
                <input type="hidden" name="item_number" value=<?php echo $_GET["id_anuncio"]; ?>>
                <input type="hidden" name="amount" value=<?php
                if($tipo="compra"){
                echo getPrecio($_GET["id_anuncio"]*0.05); 
                }else{
                echo getPrecio($_GET["id_anuncio"]);   
                }
                ?>>
                <input type="hidden" name="button_subtype" value="services">
                <input type="hidden" name="no_note" value="100">
                <input type="hidden" name="currency_code" value="EUR">
                <input type='hidden' name='rm' value='2'>
                 <input type="hidden" name="return" value="http://174.138.6.73/Controladores/checkout_controller.php?id_anuncio=". <?php echo $_GET["id_anuncio"]; ?>>
                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
                <input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
                <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
            </form>

            <form action="pagoController.php" method="POST">
                <input class="btn btn-primary" type="submit" name="visa" onclick="datosTarjeta()" value="Visa" />
                <table id="datos_visa">
                </table>
                <table>
                    <tr>
                        <td><strong>Datos del inmueble</strong></td>
                        <td><strong>Datos del usuario</strong></td>
                    </tr>
                    <tr>
                        <td><?php mostrar_info_anuncio($_GET["id_anuncio"]);?></td>
                        <td><?php echo $usuario; ?></td>
                    </tr>
                </table>
                <input class="btn-block btn-secondary" type="submit" name="guardar" value="Confirmar pago" />
            </form>
        </main>
    </body>
    <?php
    include_once '../Vistas/footer.html';
    ?>
</html>
