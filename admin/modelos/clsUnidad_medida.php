<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsUnidad_medida extends clsDatos{
private $acCodigo;
private $acSiglas;
private $acNombre;

//constructor de la clase		
public function __construct(){
$this->acCodigo = "";
$this->acSiglas = "";
$this->acNombre = "";
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
$this->ejecutar("select * from unidad_medida where(codigo = '$this->acCodigo')");
if($laRow=$this->arreglo())
{		
$this->acCodigo=$laRow['codigo'];
$this->acSiglas=$laRow['siglas'];
$this->acNombre=$laRow['nombre'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from unidad_medida where((codigo like '%$valor%') or (siglas like '%$valor%') or (nombre like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acCodigo=$laRow['codigo'];
$this->acSiglas=$laRow['siglas'];
$this->acNombre=$laRow['nombre'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>codigo</td>
<td style='font-weight:bold; font-size:20px;'>siglas</td>
<td style='font-weight:bold; font-size:20px;'>nombre</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acCodigo."</td>
<td>".$this->acSiglas."</td>
<td>".$this->acNombre."</td>
					<td><a href='?txtcodigo=".$laRow['codigo']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into unidad_medida(codigo,siglas,nombre)values('$this->acCodigo','$this->acSiglas','$this->acNombre')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update unidad_medida set codigo = '$this->acCodigo', siglas = '$this->acSiglas', nombre = '$this->acNombre' where(codigo = '$this->acCodigo')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from unidad_medida where(codigo = '$this->acCodigo')");
}
//fin clase
}?>