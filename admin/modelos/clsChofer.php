<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsChofer extends clsDatos{
private $acCedula;
private $acNombres;
private $acApellidos;
private $acTelefono;
private $acCorreo;
private $acDireccion;

//constructor de la clase		
public function __construct(){
$this->acCedula = "";
$this->acNombres = "";
$this->acApellidos = "";
$this->acTelefono = "";
$this->acCorreo = "";
$this->acDireccion = "";
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
$this->ejecutar("select * from chofer where(cedula = '$this->acCedula')");
if($laRow=$this->arreglo())
{		
$this->acCedula=$laRow['cedula'];
$this->acNombres=$laRow['nombres'];
$this->acApellidos=$laRow['apellidos'];
$this->acTelefono=$laRow['telefono'];
$this->acCorreo=$laRow['correo'];
$this->acDireccion=$laRow['direccion'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from chofer where((cedula like '%$valor%') or (nombres like '%$valor%') or (apellidos like '%$valor%') or (telefono like '%$valor%') or (correo like '%$valor%') or (direccion like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acCedula=$laRow['cedula'];
$this->acNombres=$laRow['nombres'];
$this->acApellidos=$laRow['apellidos'];
$this->acTelefono=$laRow['telefono'];
$this->acCorreo=$laRow['correo'];
$this->acDireccion=$laRow['direccion'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>cedula</td>
<td style='font-weight:bold; font-size:20px;'>nombres</td>
<td style='font-weight:bold; font-size:20px;'>apellidos</td>
<td style='font-weight:bold; font-size:20px;'>telefono</td>
<td style='font-weight:bold; font-size:20px;'>correo</td>
<td style='font-weight:bold; font-size:20px;'>direccion</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acCedula."</td>
<td>".$this->acNombres."</td>
<td>".$this->acApellidos."</td>
<td>".$this->acTelefono."</td>
<td>".$this->acCorreo."</td>
<td>".$this->acDireccion."</td>
					<td><a href='?txtcedula=".$laRow['cedula']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into chofer(cedula,nombres,apellidos,telefono,correo,direccion)values('$this->acCedula','$this->acNombres','$this->acApellidos','$this->acTelefono','$this->acCorreo','$this->acDireccion')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update chofer set cedula = '$this->acCedula', nombres = '$this->acNombres', apellidos = '$this->acApellidos', telefono = '$this->acTelefono', correo = '$this->acCorreo', direccion = '$this->acDireccion' where(cedula = '$this->acCedula')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from chofer where(cedula = '$this->acCedula')");
}
//fin clase
}?>