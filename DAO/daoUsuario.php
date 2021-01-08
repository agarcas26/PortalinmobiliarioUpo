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
            
            return $result;
        }
        
        function crear_usuario($nombre_usuario, $contrasenya, $usuario, $email, $moroso, $particular_profesional){
            $sentence = "INSERT INTO `usuarios` (`usuario`,`contrasenya`) VALUES ()";
            $result = mysqli_query($conexion, $sentence);
        }
        
        function eliminar_usuario($nombre_usuario, $contrasenya){
            $sentence = "DELETE FROM `usuarios` (`usuario`,`contrasenya`) VALUES ()";
            $result = mysqli_query($conexion, $sentence);
        }
        
        function modificar_usuario($nuevos_datos){
            $sentence = "UPDATE `usuarios` SET **** WHERE";
            $result = mysqli_query($conexion, $sentence);
        }
        ?>
    </body>
</html>
