<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTcodigo_area extends clsDatos{
private $acCodigo_area;
private $acCodificacion;
private $acUbicacion;

//constructor de la clase		
public function __construct(){
$this->acCodigo_area = "";
$this->acCodificacion = "";
$this->acUbicacion = "";
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
$this->ejecutar("select * from tcodigo_area where(codigo_area = '$this->acCodigo_area')");
if($laRow=$this->arreglo())
{		
$this->acCodigo_area=$laRow['codigo_area'];
$this->acCodificacion=$laRow['codificacion'];
$this->acUbicacion=$laRow['ubicacion'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tcodigo_area where((codigo_area like '%$valor%') or (codificacion like '%$valor%') or (ubicacion like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acCodigo_area=$laRow['codigo_area'];
$this->acCodificacion=$laRow['codificacion'];
$this->acUbicacion=$laRow['ubicacion'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
				<td style='font-weight:bold; font-size:20px;'>Codificacion</td>
				<td style='font-weight:bold; font-size:20px;'>Ubicacion</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acCodificacion."</td>
					<td>".$this->acUbicacion."</td>
					<td><a href='?txtcodigo_area=".$laRow['codigo_area']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tcodigo_area(codigo_area,codificacion,ubicacion)values('$this->acCodigo_area','$this->acCodificacion','$this->acUbicacion')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tcodigo_area set codigo_area = '$this->acCodigo_area', codificacion = '$this->acCodificacion', ubicacion = '$this->acUbicacion' where(codigo_area = '$this->acCodigo_area')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tcodigo_area where(codigo_area = '$this->acCodigo_area')");
}
//fin clase
}?>