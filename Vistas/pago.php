<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <title>Pago</title>
        <link rel="stylesheet" href="../mycss.css"/>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="../scripts.js"></script>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Controladores/AnunciosController.php';
        include_once '../DAO/daoAnuncios.php';
        ?>
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


            <table class="display table-bordered" style="width:100%">
                <tr>
                    <td><strong>Datos del inmueble</strong></td>
                    <td><strong>Datos del usuario</strong></td>
                </tr>
                <tr>
                    <td><?php mostrar_info_anuncio($_GET["id_anuncio"]); ?></td>
                    <td><?php echo $usuario; ?></td>
                </tr>
            </table>    

            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="sb-am6se4945054@business.example.com">
                <input type="hidden" name="lc" value="US">
                <input type="hidden" name="item_name" value=<?php
                $dao = new daoAnuncios();
                $tipo = $dao->get_tipo_anuncio($_GET["id_anuncio"]);
                $dao->destruct();
                if ($tipo = "compra") {
                    echo "Se&ntilde;al compra inmueble";
                } else {
                    echo "Alquiler mensual";
                }
                ?>>
                <input type="hidden" name="item_number" value=<?php echo $_GET["id_anuncio"]; ?>>
                <input type="hidden" name="amount" value=<?php
                if ($tipo = "compra") {
                    echo getPrecio($_GET["id_anuncio"] * 0.05);
                } else {
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


            <button class="btn btn-primary" id="visa" name="visa" value="" />Visa</button>
        <form class="form-visa" action="../Controladores/checkout_controller.php" method="POST">
            <table id="datos_visa" class="display table-bordered" style="width:100%">
                <tr>
                    <td>
                        <label>Nombre titular</label>
                    </td>
                    <td>
                        <input type='text' name='titular'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Número tarjeta</label>
                    </td>
                    <td>
                        <input type='number' name='num_tarjeta'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Caducidad</label>
                    </td>
                    <td>
                        <input type='text' name='caducidad' />
                    </td>
                    <td>
                        <label>CVV</label>
                    </td>
                    <td>
                        <input type='password' name='cvv' />
                    </td>
                </tr>
            </table>
            <imput type="hidden" name="id_anuncio value" value="<?php echo $_GET["id_anuncio"]; ?>"/>
            <input class="btn-block btn-secondary" type="submit" name="guardar" value="Confirmar pago" /> 
        </form>


    </main>
</body>
<?php
include_once '../Vistas/footer.html';
?>
</html>
