<?php

class Cliente{
    private $nombre;
    private $apellido;
    private $estaDadoBaja;
    private $tipoDoc;
    private $numDoc;

    // Constructor
    public function __construct($name, $surname, $discharged, $typeOf_Doc, $nroDoc){
        $this->nombre = $name;
        $this->apellido = $surname;
        $this->estaDadoBaja = $discharged;
        $this->tipoDoc = $typeOf_Doc;
        $this->numDoc = $nroDoc;        
    }

    // Acceso: get
    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getEstadoCliente(){
        return $this->estaDadoBaja;
    }

    public function getTipoDocu(){
        return $this->tipoDoc;
    }

    public function getNroDocu(){
        return $this->numDoc;
    }

    // Acceso: set
    public function setNombre($name){
        $this->nombre = $name;
    }

    public function setApellido($surname){
        $this->apellido = $surname;
    }

    public function setEstadoCliente($discharged){
        $this->estaDadoBaja = $discharged;
    }

    public function setTipoDocu($typeOf_Doc){
        $this->tipoDoc = $typeOf_Doc;
    }

    public function setNroDocu($nroDoc){
        $this->numDoc = $nroDoc;
    }

    // to String
    public function __toString(){
        return "Nombre: " . $this->getNombre() . "\n" . "Apellido: " . $this->getApellido() . "\n" . "¿Está dado de baja? " . $this->getEstadoCliente() . "\n" . 
        "Tipo de documento: " . $this->getTipoDocu() . "\n" . "Número de documento: " . $this->getNroDocu();
        
    }


}