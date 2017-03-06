<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTproveedor extends clsDatos{
private $acRif;
private $acRazon_social;
private $acCodigo_tipo_proveedor;
private $acDireccion;
private $acCodigo_area;
private $acTelefono;
private $acCodigo_dominio_correo;
private $acCorreo;
private $letrarif;

//constructor de la clase		
public function __construct(){
$this->acRif = "";
$this->acRazon_social = "";
$this->acCodigo_tipo_proveedor = "";
$this->acDireccion = "";
$this->acCodigo_area = "";
$this->acTelefono = "";
$this->acCodigo_dominio_correo = "";
$this->acCorreo = "";
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
$this->ejecutar("select * from tproveedor where(rif = '$this->acRif')");
if($laRow=$this->arreglo())
{		
$this->acRif=$laRow['rif'];
$this->acRazon_social=$laRow['razon_social'];
$this->acCodigo_tipo_proveedor=$laRow['codigo_tipo_proveedor'];
$this->acDireccion=$laRow['direccion'];
$this->acCodigo_area=$laRow['codigo_area'];
$this->acTelefono=$laRow['telefono'];
$this->acCodigo_dominio_correo=$laRow['codigo_dominio_correo'];
$this->acCorreo=$laRow['correo'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tproveedor where((rif like '%$valor%') or (razon_social like '%$valor%') or (codigo_tipo_proveedor like '%$valor%') or (direccion like '%$valor%') or (codigo_area like '%$valor%') or (telefono like '%$valor%') or (codigo_dominio_correo like '%$valor%') or (correo like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acRif=$laRow['rif'];
$this->acRazon_social=$laRow['razon_social'];
$this->acCodigo_tipo_proveedor=$laRow['codigo_tipo_proveedor'];
$this->acDireccion=$laRow['direccion'];
$this->acCodigo_area=$laRow['codigo_area'];
$this->acTelefono=$laRow['telefono'];
$this->acCodigo_dominio_correo=$laRow['codigo_dominio_correo'];
$this->acCorreo=$laRow['correo'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>Rif</td>
				<td style='font-weight:bold; font-size:20px;'>Razon Social</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acRif."</td>
					<td>".$this->acRazon_social."</td>
					<td><a href='?txtrif=".$laRow['rif']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
	$this->acRif = $this->letrarif."-".$this->acRif;
return $this->ejecutar("insert into tproveedor(rif,razon_social,codigo_tipo_proveedor,direccion,codigo_area,telefono,codigo_dominio_correo,correo)values('$this->acRif','$this->acRazon_social','$this->acCodigo_tipo_proveedor','$this->acDireccion','$this->acCodigo_area','$this->acTelefono','$this->acCodigo_dominio_correo','$this->acCorreo')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tproveedor set rif = '$this->acRif', razon_social = '$this->acRazon_social', codigo_tipo_proveedor = '$this->acCodigo_tipo_proveedor', direccion = '$this->acDireccion', codigo_area = '$this->acCodigo_area', telefono = '$this->acTelefono', codigo_dominio_correo = '$this->acCodigo_dominio_correo', correo = '$this->acCorreo' where(rif = '$this->acRif')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tproveedor where(rif = '$this->acRif')");
}
//fin clase
}?>