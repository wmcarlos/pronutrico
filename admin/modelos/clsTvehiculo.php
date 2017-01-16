<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTvehiculo extends clsDatos{
private $acVehiculo_id;
private $acMarca;
private $acModelo;
private $acPlaca;
private $acSerialmotor;

//constructor de la clase		
public function __construct(){
$this->acVehiculo_id = "";
$this->acMarca = "";
$this->acModelo = "";
$this->acPlaca = "";
$this->acSerialmotor = "";
}

//metodo magico set
public function __set($atributo, $valor){ $this->$atributo = strtoupper($valor);}		
//metodo get
public function __get($atributo){ return trim($this->$atributo); }
//destructor de la clase        
public function __destruct() { }
		
//funcion Buscar        
public function buscar()
{
$llEnc=false;
$this->ejecutar("select * from tvehiculo where(vehiculo_id = '$this->acVehiculo_id')");
if($laRow=$this->arreglo())
{		
$this->acVehiculo_id=$laRow['vehiculo_id'];
$this->acMarca=$laRow['marca'];
$this->acModelo=$laRow['modelo'];
$this->acPlaca=$laRow['placa'];
$this->acSerialmotor=$laRow['serialmotor'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tvehiculo where((vehiculo_id like '%$valor%') or (marca like '%$valor%') or (modelo like '%$valor%') or (placa like '%$valor%') or (serialmotor like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acVehiculo_id=$laRow['vehiculo_id'];
$this->acMarca=$laRow['marca'];
$this->acModelo=$laRow['modelo'];
$this->acPlaca=$laRow['placa'];
$this->acSerialmotor=$laRow['serialmotor'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
				<td style='font-weight:bold; font-size:20px;'>Marca</td>
				<td style='font-weight:bold; font-size:20px;'>Modelo</td>
				<td style='font-weight:bold; font-size:20px;'>Placa</td>
				<td style='font-weight:bold; font-size:20px;'>Serial Motor</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acMarca."</td>
					<td>".$this->acModelo."</td>
					<td>".$this->acPlaca."</td>
					<td>".$this->acSerialmotor."</td>
					<td><a href='?txtvehiculo_id=".$laRow['vehiculo_id']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tvehiculo(vehiculo_id,marca,modelo,placa,serialmotor)values('$this->acVehiculo_id','$this->acMarca','$this->acModelo','$this->acPlaca','$this->acSerialmotor')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tvehiculo set vehiculo_id = '$this->acVehiculo_id', marca = '$this->acMarca', modelo = '$this->acModelo', placa = '$this->acPlaca', serialmotor = '$this->acSerialmotor' where(vehiculo_id = '$this->acVehiculo_id')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tvehiculo where(vehiculo_id = '$this->acVehiculo_id')");
}
//fin clase
}?>