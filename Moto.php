<?php

class Moto{
    private $codigo;
    private $costo;
    private $anioFabric;
    private $descripcion;
    private $porcent_inc;
    private $estaActiva;

    // Constructor
    public function __construct($cod_Moto, $costo_Moto, $anio_deFabricacion, $descrip, $porc_incr_anual, $activa){
        $this->codigo = $cod_Moto;
        $this->costo = $costo_Moto;
        $this->anioFabric = $anio_deFabricacion;
        $this->descripcion = $descrip;
        $this->porcent_inc = $porc_incr_anual;
        $this->estaActiva = $activa;
    }

    // Acceso: get
    public function getCodigo(){
        return $this->codigo;
    }

    public function getCosto(){
        return $this->costo;
    }

    public function getAnioFabricacion(){
        return $this->anioFabric;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getPorcentajeIncremento(){
        return $this->porcent_inc;
    }

    public function getEstadoMoto(){
        return $this->estaActiva;
    }

    // Acceso: set
    public function setCodigo($cod_Moto){
        $this->codigo = $cod_Moto;
    }

    public function setCosto($costo_Moto){
        $this->costo = $costo_Moto;
    }

    public function setAnioFabricacion($anio_deFabricacion){
        $this->anioFabric = $anio_deFabricacion;
    }

    public function setDescripcion($descrip){
        $this->descripcion = $descrip;
    }

    public function setPorcentajeIncremento($porc_incr_anual){
        $this->porcent_inc = $porc_incr_anual;
    }

    public function setEstadoMoto($activa){
        $this->estaActiva = $activa;
    }

    // to String
    public function __toString(){
        return "Código: " . $this->getCodigo() . "\n" . "Costo: " . $this->getCosto() . "\n" . "Año de fabricación: " . $this->getAnioFabricacion() . "\n" .
        "Descripción: " . $this->getDescripcion() . "\n" . "Porcentaje de incremento anual: " . $this->getPorcentajeIncremento() . "\n" . "¿Está disponible a venta? " . $this->getEstadoMoto();

    }

    // Otros métodos/comportamiento
    public function aniosDesdeFabricacion(){
        // Función que retorna la cantidad de años que pasaron desde la fabricación de una moto.
        $cantAnios = date('Y') - $this->getAnioFabricacion();
        return $cantAnios;
    }


    public function darPrecioVenta(){
        // Función que retorna < 0 si la moto no está disponible a venta o de lo contrario, retorna el valor final por el cual se debe vender
        $precioVentaFinal = -1;
        if($this->getEstadoMoto() == true){
            $precioVentaFinal = $this->getCosto() + $this->getCosto() * ($this->aniosDesdeFabricacion() * $this->getPorcentajeIncremento());
        }

        return $precioVentaFinal;
    }

    
}