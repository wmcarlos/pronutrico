<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTransporte extends clsDatos{
private $acCodigo;
private $acNombre;
private $acTelefono;
private $acCorreo;
private $acDireccion;

//constructor de la clase		
public function __construct(){
$this->acCodigo = "";
$this->acNombre = "";
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
$this->ejecutar("select * from transporte where(codigo = '$this->acCodigo')");
if($laRow=$this->arreglo())
{		
$this->acCodigo=$laRow['codigo'];
$this->acNombre=$laRow['nombre'];
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
$lrTb=$this->ejecutar("select * from transporte where((codigo like '%$valor%') or (nombre like '%$valor%') or (telefono like '%$valor%') or (correo like '%$valor%') or (direccion like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acCodigo=$laRow['codigo'];
$this->acNombre=$laRow['nombre'];
$this->acTelefono=$laRow['telefono'];
$this->acCorreo=$laRow['correo'];
$this->acDireccion=$laRow['direccion'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>codigo</td>
<td style='font-weight:bold; font-size:20px;'>nombre</td>
<td style='font-weight:bold; font-size:20px;'>telefono</td>
<td style='font-weight:bold; font-size:20px;'>correo</td>
<td style='font-weight:bold; font-size:20px;'>direccion</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acCodigo."</td>
<td>".$this->acNombre."</td>
<td>".$this->acTelefono."</td>
<td>".$this->acCorreo."</td>
<td>".$this->acDireccion."</td>
					<td><a href='?txtcodigo=".$laRow['codigo']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into transporte(codigo,nombre,telefono,correo,direccion)values('$this->acCodigo','$this->acNombre','$this->acTelefono','$this->acCorreo','$this->acDireccion')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update transporte set codigo = '$this->acCodigo', nombre = '$this->acNombre', telefono = '$this->acTelefono', correo = '$this->acCorreo', direccion = '$this->acDireccion' where(codigo = '$this->acCodigo')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from transporte where(codigo = '$this->acCodigo')");
}
//fin clase
}?>