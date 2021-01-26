<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Alta inmueble</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Bootstrap/css/landing-page.css"/>
        <link rel="stylesheet" href="../Bootstrap/vendor/bootstrap/css/bootstrap.css"/>
        <?php
        include_once '../Vistas/header.php';
        include_once '../Vistas/aside.php';

        if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional']) || isset($_SESSION['admin'])) {
            ?>
        </head>
        <body>
            <header class="masthead">
                <?php sesion_iniciada(); ?>
            </header>
            <main>
                <aside>
                    <?php aside_sesion_iniciada(); ?>
                </aside>
                <article>
                    <section>
                        <h1>Rellene el formulario para dar de alta un nuevo inmueble</h1>
                        <form action='../PortalinmobiliarioUpo/Controladores/InmueblesController.php' method='POST'>
                            <label>A continuación rellene la dirección del inmueble</label>
                            <label>Numero</label>
                            <input type="number" name="txtNumero" />
                            <br>fbffbhfbc<br>
                            <label>Codigo postal</label>
                            <input type="number" name="txtCp" />
                            <label>Nombre de la vía</label>
                            <input type="text" name="txtNombre_via" />
                            <legend> Tipo de via</legend>
                            <input type="radio" name="txtTipo_via" id="via1" value="Calle">
                            <label for="via1">Callo</label>
                            <input type="radio" name="txtTipo_via" id="via2" value="Avenida">
                            <label for="via2">Avenida</label>
                            <input type="radio" name="txtTipo_via" id="via3" value="Carretera">
                            <label for="via3">Carretera</label>
                            

                            <label>Localidad</label>
                            <input type="text" name="txtLocalidad" />


                            <label>Tipo de anuncio</label>
                            <select>
                                <option>Alquiler</option>
                                <option>Compra</option>
                            </select>
                            <label>Precio</label>
                            <input type="number" name="precio" />
                        </form>
                    </section>
                </article>
            </main>
        </body>
        <?php
        include_once '../Vistas/footer.html';
        ?>
        <?php
    } else {
        header("Location: login.php");
    }
    ?>
</html>
