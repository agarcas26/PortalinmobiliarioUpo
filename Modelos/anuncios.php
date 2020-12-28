<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of anuncios
 *
 * @author agarc
 */
class anuncios {
    //put your code here
  
    private $idSubject;
    private $idCourse;
    private $name;
    private $idTypeSubjects;
    function __construct() {
        
    }
    function getIdTypeSubjects() {
        return $this->idTypeSubjects;
    }

    function setIdTypeSubjects($idTypeSubjects) {
        $this->idTypeSubjects = $idTypeSubjects;
    }

        function getIdSubject() {
        return $this->idSubject;
    }

    function getIdCourse() {
        return $this->idCourse;
    }

    function getName() {
        return $this->name;
    }

    function setIdSubject($idSubject) {
        $this->idSubject = $idSubject;
    }

    function setIdCourse($idCourse) {
        $this->idCourse = $idCourse;
    }

    function setName($name) {
        $this->name = $name;
    }

    public function __toString() {
        
    }

}

?>