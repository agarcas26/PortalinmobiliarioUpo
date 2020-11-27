<html>
    <?php
    function getusuario($nombre_usuario) {
      $linea=array("","","");
   $con = mysqli_connect("localhost", "root", "", "PortalinmoviliariaUpo");
    if (!$con) {
        die(' No puedo conectar: ' . mysqli_error($con));
    }

    $sql = "SELECT * FROM `usuarios` WHERE user='" . $nombre_usuario . "'";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Error: ' . mysql_error($con));
    } else {
        while ($row = mysqli_fetch_array($result)) {
            $linea[0] = $row['user'];
            $linea[1] = $row['mail'];
            $linea[2] = $row['profile_picture'];
        }        
    }
    mysqli_close($con);
    return array('user' => $linea[0], 'pass' => $linea[1], 'particular_profesional' => $linea[2]);
}
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Cuenta Usuario Particular </title>
    </head>
    <body>
        <header>
            <div id="encabezado">
                <h1>Hola <?php $_SESSION['user'] ?> !Bienvenido a tu area de gestión</h1>
                <form action="particular.php" method="POST">
                    <input type="submit" id="logout" name="logout" value="Desconectar" />
                </form>
                <br><br>
                <a href="anunciate.php">Publica tu anuncio gratis</a>
            </div>
        </header>
        <nav>
            <a>General</a>
            <a>Anuncios</a>
            <a>Mis Alertas</a>
            <a>Mis Mensajes</a>
            <a>Mi perfil</a>
        </nav>
        <main>
            <h3>Imagen de perfil:</h3>
            <?php
            if(!isset($_SESSION('searchuser'))){                //opcion exclusiva para admins
                echo "<figure>";
                echo getusuario($_SESSION('searchuser'))[2] ;
                echo "</figure>";
            }else{                                              //opcion para usuarios
                echo "<figure>";
                echo getusuario($_SESSION('user'))[2]; 
                echo "</figure>";
            }
            ?>
            
            <h3>Nombre usuario</h3>
            <?php
            if(!isset($_SESSION('searchuser'))){                //opcion exclusiva para admins
                echo getusuario($_SESSION('searchuser'))[0];
            }else{                                              //opcion para usuarios
                echo getusuario($_SESSION('user'))[0]; 
            }
            ?>
            <h3>Correo</h3>
            <?php
            if(!isset($_SESSION('searchuser'))){                //opcion exclusiva para admins
                echo getusuario($_SESSION('searchuser'))[1];
            }else{                                              //opcion para usuarios
                echo getusuario($_SESSION('user'))[1]; 
            }
            ?>
            
        </main>

    </body>

    <?php
    if (isset($_POST['logout'])) {
        $_SESSION['user'] = NULL;
        header('Location: login.php');
    }
    ?>
</html>       ?>
</html>