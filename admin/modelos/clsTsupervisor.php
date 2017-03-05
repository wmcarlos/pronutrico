<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTsupervisor extends clsDatos{
private $acCedula;
private $acNacionalidad;
private $acNombres;
private $acApellidos;
private $acDireccion;
private $acCodigo_area;
private $acTelefono;
private $acCodigo_dominio_correo;
private $acEmail;

//constructor de la clase		
public function __construct(){
$this->acCedula = "";
$this->acNacionalidad = "";
$this->acNombres = "";
$this->acApellidos = "";
$this->acDireccion = "";
$this->acCodigo_area = "";
$this->acTelefono = "";
$this->acCodigo_dominio_correo = "";
$this->acEmail = "";
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
$this->ejecutar("select * from tsupervisor where(cedula = '$this->acCedula')");
if($laRow=$this->arreglo())
{		
$this->acCedula=$laRow['cedula'];
$this->acNacionalidad=$laRow['nacionalidad'];
$this->acNombres=$laRow['nombres'];
$this->acApellidos=$laRow['apellidos'];
$this->acDireccion=$laRow['direccion'];
$this->acCodigo_area=$laRow['codigo_area'];
$this->acTelefono=$laRow['telefono'];
$this->acCodigo_dominio_correo=$laRow['codigo_dominio_correo'];
$this->acEmail=$laRow['email'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tsupervisor where((cedula like '%$valor%') or (nacionalidad like '%$valor%') or (nombres like '%$valor%') or (apellidos like '%$valor%') or (direccion like '%$valor%') or (codigo_area like '%$valor%') or (telefono like '%$valor%') or (codigo_dominio_correo like '%$valor%') or (email like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acCedula=$laRow['cedula'];
$this->acNacionalidad=$laRow['nacionalidad'];
$this->acNombres=$laRow['nombres'];
$this->acApellidos=$laRow['apellidos'];
$this->acDireccion=$laRow['direccion'];
$this->acCodigo_area=$laRow['codigo_area'];
$this->acTelefono=$laRow['telefono'];
$this->acCodigo_dominio_correo=$laRow['codigo_dominio_correo'];
$this->acEmail=$laRow['email'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>cedula</td>
<td style='font-weight:bold; font-size:20px;'>nacionalidad</td>
<td style='font-weight:bold; font-size:20px;'>nombres</td>
<td style='font-weight:bold; font-size:20px;'>apellidos</td>
<td style='font-weight:bold; font-size:20px;'>direccion</td>
<td style='font-weight:bold; font-size:20px;'>codigo_area</td>
<td style='font-weight:bold; font-size:20px;'>telefono</td>
<td style='font-weight:bold; font-size:20px;'>codigo_dominio_correo</td>
<td style='font-weight:bold; font-size:20px;'>email</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acCedula."</td>
<td>".$this->acNacionalidad."</td>
<td>".$this->acNombres."</td>
<td>".$this->acApellidos."</td>
<td>".$this->acDireccion."</td>
<td>".$this->acCodigo_area."</td>
<td>".$this->acTelefono."</td>
<td>".$this->acCodigo_dominio_correo."</td>
<td>".$this->acEmail."</td>
					<td><a href='?txtcedula=".$laRow['cedula']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tsupervisor(cedula,nacionalidad,nombres,apellidos,direccion,codigo_area,telefono,codigo_dominio_correo,email)values('$this->acCedula','$this->acNacionalidad','$this->acNombres','$this->acApellidos','$this->acDireccion','$this->acCodigo_area','$this->acTelefono','$this->acCodigo_dominio_correo','$this->acEmail')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tsupervisor set cedula = '$this->acCedula', nacionalidad = '$this->acNacionalidad', nombres = '$this->acNombres', apellidos = '$this->acApellidos', direccion = '$this->acDireccion', codigo_area = '$this->acCodigo_area', telefono = '$this->acTelefono', codigo_dominio_correo = '$this->acCodigo_dominio_correo', email = '$this->acEmail' where(cedula = '$this->acCedula')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tsupervisor where(cedula = '$this->acCedula')");
}
//fin clase
}?>