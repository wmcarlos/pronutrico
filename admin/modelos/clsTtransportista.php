<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTtransportista extends clsDatos{
private $acTransportista_id;
private $acRif;
private $acRazon_social;
private $acDireccion;
private $acCorreo;
private $acTelefono;

//constructor de la clase		
public function __construct(){
$this->acTransportista_id = "";
$this->acRif = "";
$this->acRazon_social = "";
$this->acDireccion = "";
$this->acCorreo = "";
$this->acTelefono = "";
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
$this->ejecutar("select * from ttransportista where(transportista_id = '$this->acTransportista_id')");
if($laRow=$this->arreglo())
{		
$this->acTransportista_id=$laRow['transportista_id'];
$this->acRif=$laRow['rif'];
$this->acRazon_social=$laRow['razon_social'];
$this->acDireccion=$laRow['direccion'];
$this->acCorreo=$laRow['correo'];
$this->acTelefono=$laRow['telefono'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from ttransportista where((transportista_id like '%$valor%') or (rif like '%$valor%') or (razon_social like '%$valor%') or (direccion like '%$valor%') or (correo like '%$valor%') or (telefono like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acTransportista_id=$laRow['transportista_id'];
$this->acRif=$laRow['rif'];
$this->acRazon_social=$laRow['razon_social'];
$this->acDireccion=$laRow['direccion'];
$this->acCorreo=$laRow['correo'];
$this->acTelefono=$laRow['telefono'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
				<td style='font-weight:bold; font-size:20px;'>Rif</td>
				<td style='font-weight:bold; font-size:20px;'>Razon Social</td>
				<td style='font-weight:bold; font-size:20px;'>correo</td>
				<td style='font-weight:bold; font-size:20px;'>telefono</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acRif."</td>
					<td>".$this->acRazon_social."</td>
					<td>".$this->acDireccion."</td>
					<td>".$this->acCorreo."</td>
					<td>".$this->acTelefono."</td>
					<td><a href='?txttransportista_id=".$laRow['transportista_id']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into ttransportista(transportista_id,rif,razon_social,direccion,correo,telefono)values('$this->acTransportista_id','$this->acRif','$this->acRazon_social','$this->acDireccion','$this->acCorreo','$this->acTelefono')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update ttransportista set transportista_id = '$this->acTransportista_id', rif = '$this->acRif', razon_social = '$this->acRazon_social', direccion = '$this->acDireccion', correo = '$this->acCorreo', telefono = '$this->acTelefono' where(transportista_id = '$this->acTransportista_id')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from ttransportista where(transportista_id = '$this->acTransportista_id')");
}
//fin clase
}?>