<?php

require_once '../Persistencia/Conexion.php';
require_once '../Modelos/AnunciosModel.php';
require_once '../Modelos/UsuarioModel.php';
require_once '../Modelos/InmueblesModel.php';

class daoinmueble {

    public $conObj;
    public $conexion;

    function __construct() {
        $this->conObj = new Conexion();
        $this->conexion = $this->conObj->getConexion();
    }

    function destruct() {
        $this->conObj = new Conexion();
        $this->conexion = null;
        $this->conObj->cerrar_conexion();
    }

    public function insertar($objInmueble) {
        $numero = $objInmueble->getNumero();
        $cp = $objInmueble->getCp();
        $nombre_via = $objInmueble->getNombre_via();
        $tipo_via = $objInmueble->getTipo_via();
        $nombre_usuario_duenyos = $objInmueble->getNombre_usuario_duenyos();
        $nombre_localidad = $objInmueble->getNombre_localidad();
        $nombre_provincia = $objInmueble->getNombre_provincia();
        $num_banyos = $objInmueble->getNum_banyos();
        $num_hab = $objInmueble->getNum_hab();
        $cocina = $objInmueble->getCocina();
        $num_plantas = $objInmueble->getNum_plantas();
        $planta = $objInmueble->getPlanta();
        $metros = $objInmueble->getMetros();
        $tipo_inmueble = $objInmueble->getTipo_inmueble();
        $fotos = $objInmueble->getFotos();
        //tengo que pedirle al usuario la direccion y guardarla como pk
        $sql = "INSERT INTO `inmueble` INSERT INTO `inmueble`(`numero`, `cp`, `nombre_via`, `tipo_via`, `nombre_usuario_duenyos`, `nombre_localidad`, `nombre_provincia`, `num_banyos`, `num_hab`,`cocina`, `tipo`, `numero_plantas`, `planta`, `metros`,`fotos`) VALUES('$numero','$cp','$nombre_via','$tipo_via','$nombre_usuario_duenyos','$nombre_localidad','$nombre_provincia','$num_banyos','$num_hab','$cocina','$tipo_inmueble','$num_plantas','$planta','$metros','$fotos')";
        if (!$this->conexion->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conexion);
    }

    public function read($objInmueble) {
        $nombre_usuario_duenyos = $objInmueble->getNombre_usuario_duenyos();

        $sql = "SELECT * FROM `inmueble` WHERE `nombre_usuario_duenyos`='$nombre_usuario_duenyos'";
        $objMySqlLi = $this->conexion->query($sql);

        if ($objMySqlLi->num_rows != 1) {
            return false;
        } else {
            $arrayAux = mysqli_fetch_assoc($objMySqlLi);
            $objInmueble->setNumero($arrayAux["numero"]);
            $objInmueble->setCp($arrayAux["cp"]);
            $objInmueble->setNombre_via($arrayAux["nombre_via"]);
            $objInmueble->setTipo_via($arrayAux["tipo_via"]);
            $objInmueble->setNombre_usuario_duenyos($arrayAux["nombre_usuario_duenyos"]);
            $objInmueble->setNombre_localidad($arrayAux["nombre_localidad"]);
            $objInmueble->setNombre_provincia($arrayAux["nombre_provincia"]);
            $objInmueble->setNum_banyos($arrayAux["num_banyos"]);
            $objInmueble->setNum_hab($arrayAux["num_hab"]);
            $objInmueble->setCocina($arrayAux["cocina"]);
            $objInmueble->setNum_plantas($arrayAux["num_plantas"]);
            $objInmueble->setPlanta($arrayAux["planta"]);
            $objInmueble->setMetros($arrayAux["metros"]);
            $objInmueble->setTipo_inmueble($arrayAux["tipo_inmueble"]);
            $objInmueble->setFotos($arrayAux["fotos"]);
            return $objInmueble;
        }
        mysqli_close($this->conexion);
    }

    public function eliminar($objInmueble) {
        $numero = $objInmueble->getNumero();
        $cp = $objInmueble->getCp();
        $nombre_via = $objInmueble->getNombre_via();
        $tipo_via = $objInmueble->getTipo_via();

        $sql = "DELETE FROM `inmueble` WHERE numero='$numero',cp='$cp',nombre_via='$nombre_via',tipo_via='$tipo_via'";

        if (!$this->conexion->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conexion);
    }

    public function modificar($objInmueble) {
        $numero = $objInmueble->getNumero();
        $cp = $objInmueble->getCp();
        $nombre_via = $objInmueble->getNombre_via();
        $tipo_via = $objInmueble->getTipo_via();
        $nombre_usuario_duenyos = $objInmueble->getNombre_usuario_duenyos();
        $nombre_localidad = $objInmueble->getNombre_localidad();
        $nombre_provincia = $objInmueble->getNombre_provincia();
        $num_banyos = $objInmueble->getNum_banyos();
        $num_hab = $objInmueble->getNum_hab();
        $cocina = $objInmueble->getCocina();
        $num_plantas = $objInmueble->getNum_plantas();
        $planta = $objInmueble->getPlanta();
        $metros = $objInmueble->getMetros();
        $tipo_inmueble = $objInmueble->getTipo_inmueble();
        $fotos = $objInmueble->getFotos();
        $sql = "UPDATE `inmueble` SET `nombre_usuario_duenyos`='$nombre_usuario_duenyos',`nombre_localidad`='$nombre_localidad',"
                . "`nombre_provincia`='$nombre_provincia',`num_banyos`='$num_banyos',`num_hab`='$num_hab',"
                . "`cocina`='$cocina',`num_plantas`='$num_plantas',`planta`='$planta',`metros`='$metros',`tipo_inmueble`='$tipo_inmueble',`fotos`='$fotos' "
                . "WHERE `numero`='$numero',`cp`='$cp',`nombre_via`='$nombre_via',`tipo_via`='$tipo_via'";

        if (!$this->conexion->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conexion);
    }

    public function listar() {
        $sql = "SELECT * FROM `inmueble`";
        $resultado = $this->conn->query($sql);
        $arrayInmuebles = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {
            array_push($arrayInmuebles, $fila);
        }
        mysqli_close($this->conexion);
        return $arrayInmuebles;
    }

}
