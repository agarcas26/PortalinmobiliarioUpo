
       

        <?php
        
        function registroGetUsuario($usuario){
            return getUsuarioByUsuario($usuario);            
        }
        
        function registroNuevoUsuario($nombre_usuario, $email, $usuario, $pass, $tipo){
            nuevoUsuario($nombre_usuario, $email, $usuario, $pass, $tipo);
        }
        
        
