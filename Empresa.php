<?php

class Empresa{
    private $denominacion;
    private $direccion;
    private $arrayClientes;
    private $arrayMotos;
    private $arrayVentas;

    // Constructor
    public function __construct($denominacion_empresa, $domicilio, $coleccionClientes, $coleccionDeMotos, $coleccionVentasRealizadas){
        $this->denominacion = $denominacion_empresa;
        $this->direccion = $domicilio;
        $this->arrayClientes = $coleccionClientes;
        $this->arrayMotos = $coleccionDeMotos;
        $this->arrayVentas = $coleccionVentasRealizadas;
    }

    // Acceso: get
    public function getDenominacion(){
        return $this->denominacion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getArrayClientes(){
        return $this->arrayClientes;
    }

    public function getArrayDeMotos(){
        return $this->arrayMotos;
    }

    public function getArrayVentas(){
        return $this->arrayVentas;
    }

    // Acceso: set
    public function setDenominacion($denominacion_empresa){
        $this->denominacion = $denominacion_empresa;
    }

    public function setDireccion($domicilio){
        $this->direccion = $domicilio;
    }

    public function setArrayClientes($coleccionClientes){
        $this->arrayClientes = $coleccionClientes;
    }

    public function setArrayDeMotos($coleccionDeMotos){
        $this->arrayMotos = $coleccionDeMotos;
    }

    public function setArrayVentas($coleccionVentasRealizadas){
        $this->arrayVentas = $coleccionVentasRealizadas;
    }

    // to String
    public function __toString(){
        return "Denominación de la empresa: " . $this->getDenominacion() . "\n" .
        "Dirección: " . $this->getDireccion() . "\n" . 
        "Clientes: " . $this->mostrarClientes() . "\n" . 
        "Motos: " . $this->mostrarMotos() . "\n" . 
        "Ventas: " . $this->mostrarVentas() . "\n";        
    }

    // Funciones adicionales
    public function mostrarClientes(){
        // Método para mostrar la colección de clientes
        $colDeClientes = $this->getArrayClientes();
        $cliente_nro = 0;
        $unaCadenaClientes = "";
        for($i = 0; $i < count($colDeClientes); $i++){
            $cliente_nro++;
            $unCliente = $colDeClientes[$i];
            $unaCadenaClientes = $unaCadenaClientes . "Cliente " . $cliente_nro . ": \n" . $unCliente . "\n";
        }
        return $unaCadenaClientes;

    }

    public function mostrarVentas(){
        // Método para mostrar la colección de ventas
        $colDeVentas = $this->getArrayVentas();
        $venta_nro = 0;
        $unaCadenaVentas = "";
        for($i = 0; $i < count($colDeVentas); $i++){
            $venta_nro++;
            $unaVenta = $colDeVentas[$i];
            $unaCadenaVentas = $unaCadenaVentas . "Venta " . $venta_nro . ": \n" . $unaVenta . "\n";
        }
        return $unaCadenaVentas;
    }

    public function mostrarMotos(){
        // Método para mostrar la colección de motos
        $colDeMotos = $this->getArrayDeMotos();
        $moto_nro = 0;
        $unaCadenaMotos = "";
        for($i = 0; $i < count($colDeMotos); $i++){
            $moto_nro++;
            $unaMoto = $colDeMotos[$i];
            $unaCadenaMotos = $unaCadenaMotos . "Moto " . $moto_nro . ": \n" . $unaMoto . "\n";
        }
        return $unaCadenaMotos;
    }


}