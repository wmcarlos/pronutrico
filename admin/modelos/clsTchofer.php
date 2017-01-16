<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTchofer extends clsDatos{
private $acChofer_id;
private $acCedula;
private $acNombre;
private $acApellido;
private $acDireccion;
private $acCorreo;
private $acTelefono;
private $acTransportista_id;

//constructor de la clase		
public function __construct(){
$this->acChofer_id = "";
$this->acCedula = "";
$this->acNombre = "";
$this->acApellido = "";
$this->acDireccion = "";
$this->acCorreo = "";
$this->acTelefono = "";
$this->acTransportista_id = "";
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
$this->ejecutar("select * from tchofer where(chofer_id = '$this->acChofer_id')");
if($laRow=$this->arreglo())
{		
$this->acChofer_id=$laRow['chofer_id'];
$this->acCedula=$laRow['cedula'];
$this->acNombre=$laRow['nombre'];
$this->acApellido=$laRow['apellido'];
$this->acDireccion=$laRow['direccion'];
$this->acCorreo=$laRow['correo'];
$this->acTelefono=$laRow['telefono'];
$this->acTransportista_id=$laRow['transportista_id'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tchofer where((chofer_id like '%$valor%') or (cedula like '%$valor%') or (nombre like '%$valor%') or (apellido like '%$valor%') or (direccion like '%$valor%') or (correo like '%$valor%') or (telefono like '%$valor%') or (transportista_id like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acChofer_id=$laRow['chofer_id'];
$this->acCedula=$laRow['cedula'];
$this->acNombre=$laRow['nombre'];
$this->acApellido=$laRow['apellido'];
$this->acDireccion=$laRow['direccion'];
$this->acCorreo=$laRow['correo'];
$this->acTelefono=$laRow['telefono'];
$this->acTransportista_id=$laRow['transportista_id'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
				<td style='font-weight:bold; font-size:20px;'>Cedula</td>
				<td style='font-weight:bold; font-size:20px;'>Nombre</td>
				<td style='font-weight:bold; font-size:20px;'>Apellido</td>
				<td style='font-weight:bold; font-size:20px;'>Correo</td>
				<td style='font-weight:bold; font-size:20px;'>Telefono</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acCedula."</td>
					<td>".$this->acNombre."</td>
					<td>".$this->acApellido."</td>
					<td>".$this->acCorreo."</td>
					<td>".$this->acTelefono."</td>
					<td><a href='?txtchofer_id=".$laRow['chofer_id']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tchofer(chofer_id,cedula,nombre,apellido,direccion,correo,telefono,transportista_id)values('$this->acChofer_id','$this->acCedula','$this->acNombre','$this->acApellido','$this->acDireccion','$this->acCorreo','$this->acTelefono','$this->acTransportista_id')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tchofer set chofer_id = '$this->acChofer_id', cedula = '$this->acCedula', nombre = '$this->acNombre', apellido = '$this->acApellido', direccion = '$this->acDireccion', correo = '$this->acCorreo', telefono = '$this->acTelefono', transportista_id = '$this->acTransportista_id' where(chofer_id = '$this->acChofer_id')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tchofer where(chofer_id = '$this->acChofer_id')");
}
//fin clase
}?>