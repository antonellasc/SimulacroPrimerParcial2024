<?php

class Venta{
    private $numero;
    private $fecha;
    private $objCliente;
    private $arrayObjMoto;
    private $precioFinal;

    // Constructor
    public function __construct($nro, $fecha_vta, $objetoCliente, $arrayMotos, $precio_final){
        $this->numero = $nro;
        $this->fecha = $fecha_vta;
        $this->objCliente = $objetoCliente;
        $this->arrayObjMoto = $arrayMotos;
        $this->precioFinal = $precio_final;
    }

    // Acceso: get
    public function getNumero(){
        return $this->numero;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getObjCliente(){
        return $this->objCliente;
    }

    public function getArrayMoto(){
        return $this->arrayObjMoto;
    }

    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    // Acceso : set
    public function setNumero($nro){
        $this->numero = $nro;
    }

    public function setFecha($fecha_vta){
        $this->fecha = $fecha_vta;
    }

    public function setObjCliente($objetoCliente){
        $this->objCliente = $objetoCliente;
    }

    public function setArrayMoto($arrayMotos){
        $this->arrayObjMoto = $arrayMotos;
    }

    public function setPrecioFinal($precio_final){
        $this->precioFinal = $precio_final;
    }

    public function __toString(){
        return "Número de venta: " . $this->getNumero() . "\n" . "Fecha de venta: " . $this->getFecha() . "\n" . "Cliente: \n" . $this->getObjCliente() . "\n" . 
         "Motos: \n" . $this->mostrarMotosVendidas() . "\n" . "Precio final de la venta: " . $this->getPrecioFinal();
        
    }

    // Otros métodos/comportamientos
    public function incorporarMoto($objMoto){
        $coleccionMotos = $this->getArrayMoto();
        if(count($coleccionMotos) == 0){
            $coleccionMotos = [];
        }
        $disponible = $objMoto->getEstadoMoto();
        if($disponible == true){
            $coleccionMotos[] = $objMoto;
            $this->setArrayMoto($coleccionMotos);
            $precioAct = $objMoto->darPrecioVenta() + $this->getPrecioFinal();
            $this->setPrecioFinal($precioAct);

        }
    }

    public function mostrarMotosVendidas(){
        // Método para mostrar la colección de motos vendidas
        $colDeMotos = $this->getArrayMoto();
        $moto_nro = 0;
        $unaCadenaMotosVendidas = "";
        for($i = 0; $i < count($colDeMotos); $i++){
            $moto_nro++;
            $unaMoto = $colDeMotos[$i];
            $unaCadenaMotosVendidas = $unaCadenaMotosVendidas . "Moto " . $moto_nro . ": \n" . $unaMoto . "\n";
        }
        return $unaCadenaMotosVendidas;
    }

}