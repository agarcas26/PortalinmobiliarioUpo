<!doctype html>
<html>
    <head>
        <title>title</title>
        <?php
        require_once '../Persistencia/Conexion.php';
        require_once '../Modelos/AnunciosModel.php';
        require_once '../Modelos/UsuarioModel.php';
        require_once '../Modelos/InmueblesModel.php';
        ?>
    </head>
    <body>
        <?php

        class daoanuncios {

            public $conObj;
            public $conn;
            private $anuncio;

            function __construct() {
                $this->conObj = new conn();
                $this->conn = $this->conObj->establecer_conexion();
            }

//operaciones crud 
//insertar anuncio
            public function insertar($objAnuncio) {
//paso del objeto anuncio a las variables individuales
//        $idAnuncio = $objAnuncio->getIdAnuncio();
                $direccion = $objAnuncio->getDireccion();
                $precio = $objAnuncio->getPrecio();
                $usuario_pk = $objAnuncio->getUsuario_pk();

                $sql = "INSERT INTO anuncios values(null,'$direccion','$precio','$usuario_pk')";
                if (!$this->conn->query($sql)) {
                    return false;
                } else {
                    return true;
                }
                mysqli_close($this->conn);
            }

//leer anuncio por id
            public function read($objAnuncio) {
                $idAnuncio = $objAnuncio->getIdAnuncio();
                $sql = "SELECT * FROM anuncios WHERE idAnuncio='$idAnuncio'";
                $objMySqlLi = $this->conn->query($sql);

                if ($objMySqlLi->num_rows != 1) {
                    return false;
                } else {
                    $arrayAux = mysqli_fetch_assoc($objMySqlLi);
                    $objAnuncio->setIdAnuncio($arrayAux["idAnuncio"]);
                    $objAnuncio->setDireccion($arrayAux["direccion"]);
                    $objAnuncio->setPrecio($arrayAux["precio"]);
                    $objAnuncio->setUsuario_pk($arrayAux["usuario_pk"]);

                    return $objAnuncio;
                }
                mysqli_close($this->conn);
            }

            public function eliminar($objAnuncio) {
                $idAnuncio = $objAnuncio->getIdAnuncio();

                $sql = "DELETE FROM anuncios WHERE idAnuncio='$idAnuncio'";
                if (!$this->conn->query($sql)) {
                    return false;
                } else {
                    return true;
                }
                mysqli_close($this->conn);
            }

            public function modificar($objAnuncio) {
                $idAnuncio = $objAnuncio->getIdAnuncio();
                $direccion = $objAnuncio->getDireccion();
                $precio = $objAnuncio->getPrecio();
                $usuario_pk = $objAnuncio->getUsuario_pk();

                $sql = "UPDATE anuncio SET direccion='$direccion',precio='$precio',usuario_pk='$usuario_pk' WHERE idAnuncio='$idAnuncio'";
                if (!$this->conn->query($sql)) {
                    return false;
                } else {
                    return true;
                }
                mysqli_close($this->conn);
            }

            public function listar() {
                $sql = "SELECT * FROM anuncios";
                $resultado = $this->conn->query($sql);

                $arrayAnuncios = array();
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    array_push($arrayAnuncios, $fila);
                }
                mysqli_close($this->conn);
                return $arrayAnuncios;
            }

        }
        ?>
    </body>
</html>




