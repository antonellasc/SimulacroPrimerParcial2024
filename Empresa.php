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
        "Clientes: \n" . $this->mostrarClientes() . "\n" . 
        "Motos: \n" . $this->mostrarMotos() . "\n" . 
        "Ventas: \n" . $this->mostrarVentas() . "\n";        
    }

    
    // Otras funciones solicitadas por el enunciado
    public function retornarMoto($codigoMoto){
        // Función que ingresado el código de una moto por parámetro, retorna la moto coincidente con tal código
        $colDeMotos = $this->getArrayDeMotos();
        $i = 0;
        $indice = 0;
        while($i < count($colDeMotos)){
            if($codigoMoto == $colDeMotos[$i]->getCodigo()){
                $indice = $i;
            }
            $i++;
        }
        $objMoto = $colDeMotos[$indice];
        return $objMoto;
    }

    public function registrarVenta($colCodigosMoto, $objCliente){
        // Setea una nueva colección de ventas que se realizan siempre y cuando cumpla con las restricciones y retorna el importe final de la venta
        $coleccionVentas = $this->getArrayVentas();
        $nro_venta = count($coleccionVentas) + 1;
        $fechaActual = date("d/m/y");
        $precioMoto = 0;
        $precio_final = 0;
        $i = 0;
        $colMotosVenta = [];
        $estadoCliente = $this->verEstadoCliente($objCliente);
        $motoDisponible = false;
        if($estadoCliente == true){
            while($i < count($colCodigosMoto)){
                $objMoto = $this->retornarMoto($colCodigosMoto[$i]);
                $motoDisponible = $this->verDisponibilidadMoto($objMoto);
                $precioMoto = $objMoto->darPrecioVenta();
                if($colCodigosMoto[$i] == $objMoto->getCodigo() && $motoDisponible == true){
                    $precio_final = $precio_final + $precioMoto;
                    $colMotosVenta[] = $objMoto;
            }
                $i++;
            }
        }
            if($precio_final > 0){
                $objVenta = new Venta($nro_venta, $fechaActual, $objCliente, $colMotosVenta, $precio_final);
                $coleccionVentas[] = $objVenta;
                $this->setArrayVentas($coleccionVentas);

            }
            
            return $precio_final;

    }

    // public function retornarVentasXCliente($tipodoc, $nroDoc){
    //     $coleccionDeVentas = $this->getArrayVentas();
    //     $encontrado_1 = false;
    //     $ventasCliente = [];
    //     $ColClientes = $this->getArrayClientes();
    //     foreach($ColClientes as $cliente){
    //         if($cliente->getTipoDocu() === $tipodoc && $cliente->getNroDocu() === $nroDoc){
    //             $encontrado_1 = true;
    //             $objCliente = $cliente;
    //         } else{
    //             $encontrado_1 = false;
    //         }
    //     }
    //     if($encontrado_1 == true){
    //         foreach($coleccionDeVentas as $venta){
    //         if($venta->getObjCliente() === $objCliente){
    //             array_push($ventasCliente, $venta);
    //         }
    //     }
    // }
        
    //     return $ventasCliente;
    // }

    public function retornarVentasXCliente($tipodoc, $nroDoc){
        $cliente_encontrado = null;
        $ventasCliente = [];
        $ColClientes = $this->getArrayClientes();
        foreach($ColClientes as $cliente){
            if($cliente->getTipoDocu() === $tipodoc && $cliente->getNroDocu() === $nroDoc){
                $cliente_encontrado = $cliente;
            }
        }
        if($cliente_encontrado !== null){
            $ColVentas = $this->getArrayVentas();
            foreach($ColVentas as $venta){
            if($venta->getObjCliente() === $cliente_encontrado){
                $ventasCliente[] = $venta;
            }
        }
    }
        
        return $ventasCliente;
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

    public function verEstadoCliente($objCliente){
        $estaDadoAlta = false;
        if($objCliente->getEstadoCliente() == "si"){
            $estaDadoAlta;
        } else{
            $estaDadoAlta = true;
        }
        return $estaDadoAlta;
    }

    public function verDisponibilidadMoto($objMoto){
        $estaDisponible = false;
        if($objMoto->getEstadoMoto() == true){
            $estaDisponible = true;
        } else{
            $estaDisponible = false;
        }
        return $estaDisponible;
    }

    public function mostrarVentasCliente($ventasCliente){
        // Genera una cadena con los elementos del array Ventas de un determinado cliente
        $venta_nro = 0;
        $unaCadenaVentasXCliente = "";
        for($i = 0; $i < count($ventasCliente); $i++){
            $venta_nro++;
            $unaVentaCliente = $ventasCliente[$i];
            $unaCadenaVentasXCliente = $unaCadenaVentasXCliente . "Venta " . $venta_nro . ": \n" . $unaVentaCliente . "\n";
        }
        return $unaCadenaVentasXCliente;
    }


}