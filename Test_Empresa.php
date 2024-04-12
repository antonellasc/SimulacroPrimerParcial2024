<?php
include_once "Cliente.php";
include_once "Moto.php";
include_once "Venta.php";
include_once "Empresa.php";

$objCliente1 = new Cliente("Anto", "Cuculich", "no", "DNI", 41623735);
$objCliente2 = new Cliente("Maximo", "Cordoba", "no", "DNI", 56898563);
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250 ", 55, false);
$coleccion_Motos = [$objMoto1, $objMoto2, $objMoto3];
$coleccion_Clientes = [$objCliente1, $objCliente2];
$coleccion_VtasRealizadas = [];
$objEmpresa = new Empresa("Alta Gama", "Av Argentina 123", $coleccion_Clientes, $coleccion_Motos, $coleccion_VtasRealizadas);



// Test
 echo $objEmpresa . "\n \n \n" ;

 echo "Ventas inicio: \n" . $objEmpresa->mostrarVentas() . "\n \n \n"; 

 echo "Precio final de la venta: " . $objCliente2->getNombre() . " " . $objCliente2->getApellido() . " es: \n" . $objEmpresa->registrarVenta([11, 12, 13], $objCliente2) . "\n \n \n";

 echo "Precio final de la venta: " . $objCliente2->getNombre() . " " . $objCliente2->getApellido() . " es: \n" . $objEmpresa->registrarVenta([0], $objCliente2) . "\n \n \n";

 echo "Precio final de la venta: " . $objCliente1->getNombre() . " " . $objCliente1->getApellido() . " es: \n" . $objEmpresa->registrarVenta([2], $objCliente1) . "\n \n \n";

 echo "Ventas después: \n" . $objEmpresa->mostrarVentas() . "\n \n \n \n";


// Testeando la función retornarVentasXCliente y una función que muestra el listado de estas ventas por pantalla
 $ventas_unCliente = $objEmpresa->retornarVentasXCliente($objCliente1->getTipoDocu(), $objCliente1->getNroDocu());
 echo $objEmpresa->mostrarVentasCliente($ventas_unCliente) . "\n \n \n";

// Testeando una función auxiliar que muestra la colección de ventas
     echo $objEmpresa->mostrarVentas();

// Testeando la función que da el precio
  echo $objMoto1->darPrecioVenta() . "\n \n";
  echo $objMoto2->darPrecioVenta() . "\n \n";
  echo "Suma: " . $objMoto1->darPrecioVenta() + $objMoto2->darPrecioVenta();
