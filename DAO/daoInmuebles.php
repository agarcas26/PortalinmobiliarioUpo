<?php

require_once '../Persistencia/Conexion.php';
require_once '../Modelos/AnunciosModel.php';
require_once '../Modelos/UsuarioModel.php';
require_once '../Modelos/InmueblesModel.php';

class daoInmuebles {

    public $conObj;
    public $conexion;
    public $objInmueble;

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
        $num_plantas = $objInmueble->getNumero_plantas();
        $planta = $objInmueble->getPlanta();
        $metros = $objInmueble->getMetros();
        $tipo_inmueble = $objInmueble->getTipo_inmueble();
        $fotos = $objInmueble->getFotos();
        //tengo que pedirle al usuario la direccion y guardarla como pk
        $sql = "INSERT INTO `inmueble`(`numero`, `cp`, `nombre_via`, `tipo_via`, `nombre_usuario_duenyos`, `nombre_localidad`, `nombre_provincia`, `num_banyos`, `num_hab`, `cocina`, `tipo`, `numero_plantas`, `planta`, `metros`, `fotos`) VALUES('$numero','$cp','$nombre_via','$tipo_via','$nombre_usuario_duenyos','$nombre_localidad','$nombre_provincia','$num_banyos','$num_hab','$cocina','$tipo_inmueble','$num_plantas','$planta','$metros','$fotos')";
        $result = $this->conexion->query($sql);

        return $result;
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
        $num_plantas = $objInmueble->getNumero_plantas();
        $planta = $objInmueble->getPlanta();
        $metros = $objInmueble->getMetros();
        $tipo_inmueble = $objInmueble->getTipo_inmueble();
        $fotos = $objInmueble->getFotos();
        $sql = "UPDATE `inmueble` SET `nombre_usuario_duenyos`='$nombre_usuario_duenyos',`nombre_localidad`='$nombre_localidad',"
                . "`nombre_provincia`='$nombre_provincia',`num_banyos`='$num_banyos',`num_hab`='$num_hab',"
                . "`cocina`='$cocina',`numero_plantas`='$num_plantas',`planta`='$planta',`metros`='$metros',`tipo_inmueble`='$tipo_inmueble',`fotos`='$fotos' "
                . "WHERE `numero`='$numero' and`cp`='$cp'and`nombre_via`='$nombre_via'and`tipo_via`='$tipo_via'";

        if (!$this->conexion->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conexion);
    }

    public function listar() {
        $sql = "SELECT * FROM `inmueble`";
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }

    function get_inmueble_by_direccion($numero, $cp, $nombre_via, $tipo_via) {
        $sql = "SELECT * FROM `inmueble` WHERE `numero` = '" . $numero . "' "
                . "and `cp`='" . $cp . "' and `nombre_via`='" . $nombre_via . "' "
                . "and `tipo_via`='" . $tipo_via . "'";

        $objMySqlLi = $this->conexion->query($sql);
        $objInmueble = new Inmueble();
        $arrayAux = [];

        if ($objMySqlLi->num_rows > 0) {
            while ($objInmuebleAux = mysqli_fetch_assoc($objMySqlLi)) {
                $objInmueble->setNumero($objInmuebleAux["numero"]);
                $objInmueble->setCp($objInmuebleAux["cp"]);
                $objInmueble->setNombre_via($objInmuebleAux["nombre_via"]);
                $objInmueble->setTipo_via($objInmuebleAux["tipo_via"]);
                $objInmueble->setNombre_usuario_duenyos($objInmuebleAux["nombre_usuario_duenyos"]);
                $objInmueble->setNombre_localidad($objInmuebleAux["nombre_localidad"]);
                $objInmueble->setNombre_provincia($objInmuebleAux["nombre_provincia"]);
                $objInmueble->setNum_banyos($objInmuebleAux["num_banyos"]);
                $objInmueble->setNum_hab($objInmuebleAux["num_hab"]);
                $objInmueble->setCocina($objInmuebleAux["cocina"]);
                $objInmueble->setNumero_plantas($objInmuebleAux["numero_plantas"]);
                $objInmueble->setPlanta($objInmuebleAux["planta"]);
                $objInmueble->setMetros($objInmuebleAux["metros"]);
                $objInmueble->setTipo_inmueble($objInmuebleAux["tipo"]);
                $objInmueble->setFotos($objInmuebleAux["fotos"]);

                array_push($arrayAux, $objInmueble);
            }
        }
        return $arrayAux;
    }

    public function read($nombre_usuario_duenyos) {

        $sql = "SELECT * FROM `inmueble` WHERE `nombre_usuario_duenyos`='$nombre_usuario_duenyos'";
        $objMySqlLi = $this->conexion->query($sql);
        $arrayAux = [];
        if ($objMySqlLi->num_rows > 0) {
            while ($objInmuebleAux = mysqli_fetch_assoc($objMySqlLi)) {
                $objInmueble = new Inmueble();
                $objInmueble->setNumero($objInmuebleAux["numero"]);
                $objInmueble->setCp($objInmuebleAux["cp"]);
                $objInmueble->setNombre_via($objInmuebleAux["nombre_via"]);
                $objInmueble->setTipo_via($objInmuebleAux["tipo_via"]);
                $objInmueble->setNombre_usuario_duenyos($objInmuebleAux["nombre_usuario_duenyos"]);
                $objInmueble->setNombre_localidad($objInmuebleAux["nombre_localidad"]);
                $objInmueble->setNombre_provincia($objInmuebleAux["nombre_provincia"]);
                $objInmueble->setNum_banyos($objInmuebleAux["num_banyos"]);
                $objInmueble->setNum_hab($objInmuebleAux["num_hab"]);
                $objInmueble->setCocina($objInmuebleAux["cocina"]);
                $objInmueble->setNumero_plantas($objInmuebleAux["numero_plantas"]);
                $objInmueble->setPlanta($objInmuebleAux["planta"]);
                $objInmueble->setMetros($objInmuebleAux["metros"]);
                $objInmueble->setTipo_inmueble($objInmuebleAux["tipo"]);
                $objInmueble->setFotos($objInmuebleAux["fotos"]);

                array_push($arrayAux, $objInmueble);
            }
        }

        return $arrayAux;
    }

}
