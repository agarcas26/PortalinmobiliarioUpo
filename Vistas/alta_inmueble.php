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
        <?php
        include_once '../Vistas/header.php';
        include_once '../Vistas/aside.php';
        
        if (isset($_SESSION['usuario_particular']) || isset($_SESSION['usuario_profesional']) || isset($_SESSION['admin'])) {
            ?>
        </head>
        <body>
            <header>
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
                            <label>Tipo de vía</label>
                            <select>
                                <option>Calle</option>
                                <option>Avenida</option>
                                <option>Carretera</option>
                            </select>
                            <label>Nombre de la vía</label>
                            <input type="text" name="nombre_via" />
                            <label>Numero</label>
                            <input type="number" name="numero" />
                            <label>Codigo postal</label>
                            <input type="number" name="cp" />
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
        <?php include_once '../PortalinmobiliarioUpo/Vistas/footer.html'; ?>
        <?php
    } else {
        header("Location: login.php");
    }
    ?>
</html>
