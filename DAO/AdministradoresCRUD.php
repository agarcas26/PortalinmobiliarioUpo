<!doctype html>
<html>
    <head>
        <?php
        include_once '../Persistencia/Conexion.php';
        ?>
    </head>
    <body>
        <?php
            function listar_administradores(){
                $sentence = "SELECT * FROM `administradores`";
                $result = mysqli_query($conexion, $sentence);
            }
            
        ?>
    </body>
</html>