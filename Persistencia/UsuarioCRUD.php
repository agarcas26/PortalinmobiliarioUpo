<!doctype html>
<html>
    <head>
        <title>UsuarioCRUD</title>
        <?php
        include_once '../Persistencia/Conexion.php';
        ?>
    </head>
    <body>
        <?php
        establecer_conexion();
        
        function leer_usuarios(){
            $sentence = "SELECT * FROM `usuarios`";
            $result = mysqli_query($conexion, $sentence);
            
            return mysqli_fetch_array($result);
        }
        ?>
    </body>
</html>
