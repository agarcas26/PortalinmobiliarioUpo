<?php

require_once '../Persistencia/Conexion.php';
require_once '../Modelos/AnunciosModel.php';
require_once '../Modelos/UsuarioModel.php';
require_once '../Modelos/InmueblesModel.php';

class daoinmueble {

    public $conObj;
    public $conn;
    public $inmueble;

    function __construct() {
        $this->conObj = new conn();
        $this->conn = $this->conObj->establecer_conexion();
    }

    public function insertar($objInmueble) {
        $numero = $objInmueble->getNumero();
        $cp = $objInmueble->getCp();
        $nombre_via = $objInmueble->getNombre_via();
        $tipo_via = $objInmueble->getTipo_via();
        $num_habitaciones = $objInmueble->getNum_habitaciones();
        $num_banyos = $objInmueble->getNum_banyos();
        $cocina = $objInmueble->getCocina();
        $tipo_inmueble = $objInmueble->getTipo_inmueble();
        $num_plantas = $objInmueble->getNum_plantas();
        $planta = $objInmueble->getPlanta();
        
        //tengo que pedirle al usuario la direccion y guardarla como pk
        $sql = "INSERT INTO inmueble values('$numero','$cp','$nombre_via','$tipo_via','$num_habitaciones','$num_banyos','$cocina','$tipo_inmueble','$num_plantas','$planta')";
        if (!$this->conn->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conn);
    }

  
    public function read($objInmueble) {
        $usuario_pk = $objInmueble->getUsuario_pk();

        $sql = "SELECT * FROM inmueble WHERE usuario_pk='$usuario_pk'";
        $objMySqlLi = $this->conn->query($sql);

        if ($objMySqlLi->num_rows != 1) {
            return false;
        } else {
            $arrayAux = mysqli_fetch_assoc($objMySqlLi);
            $objInmueble->setDireccion($arrayAux["direccion"]);
            $objInmueble->setUsuario_pk($arrayAux["usuario_pk"]);
            $objInmueble->setResenyas_usuarios($arrayAux["resenyas_usuarios"]);
            $objInmueble->setNum_habitaciones($arrayAux["num_habitaciones"]);
            $objInmueble->setNum_banyos($arrayAux["num_banyos"]);
            $objInmueble->setCocina($arrayAux["cocina"]);
            $objInmueble->setTipo_inmueble($arrayAux["tipo_inmueble"]);
            $objInmueble->setNum_plantas($arrayAux["num_plantas"]);
            $objInmueble->setPlanta($arrayAux["planta"]);
            $objInmueble->setAscensor($arrayAux["ascensor"]);
            return $objInmueble;
        }
        mysqli_close($this->conn);
    }

    public function eliminar($objInmueble) {
        $direccion = $objInmueble->getDireccion();

        $sql = "DELETE FROM inmueble WHERE direccion='$direccion'";

        if (!$this->conn->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conn);
    }

    public function modificar($objInmueble) {
        $direccion = $objInmueble->getDireccion();
        $usuario_pk = $objInmueble->getUsuario_pk();
        $resenyas_usuarios = $objInmueble->getResenyas_usuarios();
        $num_habitaciones = $objInmueble->getNum_habitaciones();
        $num_banyos = $objInmueble->getNum_banyos();
        $cocina = $objInmueble->getCocina();
        $tipo_inmueble = $objInmueble->getTipo_inmueble();
        $num_plantas = $objInmueble->getNum_plantas();
        $planta = $objInmueble->getPlanta();
        $ascensor = $objInmueble->getAscensor();

        $sql = "UPDATE inmueble SET direccion='$direccion',usuario_pk='$usuario_pk',resenyas_usuarios='$resenyas_usuarios',num_habitaciones='$num_habitaciones',num_banyos='$num_banyos',cocina='$cocina',tipo_inmueble='$tipo_inmueble',num_plantas='$num_plantas',planta='$planta',ascensor='$ascensor' WHERE direccion='$direccion'";

        if (!$this->conn->query($sql)) {
            return false;
        } else {
            return true;
        }
        mysqli_close($this->conn);
    }

    public function listar() {
        $sql = "SELECT * FROM inmueble";
        $resultado = $this->conn->query($sql);
        $arrayInmuebles = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {
            array_push($arrayInmuebles, $fila);
        }
        mysqli_close($this->conn);
        return $arrayInmuebles;
    }

}
