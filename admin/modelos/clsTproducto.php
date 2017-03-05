<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTproducto extends clsDatos{
private $acCodigo;
private $acNacionalidad;
private $acNombre;
private $acTipo_producto;
private $acCodigo_marca;
private $acCodigo_unidad_medida;
private $acExistencia_minima;
private $acExistencia_maxima;
private $acExistencia;

//constructor de la clase		
public function __construct(){
$this->acCodigo = "";
$this->acNacionalidad = "";
$this->acNombre = "";
$this->acTipo_producto = "";
$this->acCodigo_marca = "";
$this->acCodigo_unidad_medida = "";
$this->acExistencia_minima = "";
$this->acExistencia_maxima = "";
$this->acExistencia = "";
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
$this->ejecutar("select * from tproducto where(codigo = '$this->acCodigo')");
if($laRow=$this->arreglo())
{		
$this->acCodigo=$laRow['codigo'];
$this->acNacionalidad=$laRow['nacionalidad'];
$this->acNombre=$laRow['nombre'];
$this->acTipo_producto=$laRow['tipo_producto'];
$this->acCodigo_marca=$laRow['codigo_marca'];
$this->acCodigo_unidad_medida=$laRow['codigo_unidad_medida'];
$this->acExistencia_minima=$laRow['existencia_minima'];
$this->acExistencia_maxima=$laRow['existencia_maxima'];
$this->acExistencia=$laRow['existencia'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tproducto where((codigo like '%$valor%') or (nacionalidad like '%$valor%') or (nombre like '%$valor%') or (tipo_producto like '%$valor%') or (codigo_marca like '%$valor%') or (codigo_unidad_medida like '%$valor%') or (existencia_minima like '%$valor%') or (existencia_maxima like '%$valor%') or (existencia like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acCodigo=$laRow['codigo'];
$this->acNacionalidad=$laRow['nacionalidad'];
$this->acNombre=$laRow['nombre'];
$this->acTipo_producto=$laRow['tipo_producto'];
$this->acCodigo_marca=$laRow['codigo_marca'];
$this->acCodigo_unidad_medida=$laRow['codigo_unidad_medida'];
$this->acExistencia_minima=$laRow['existencia_minima'];
$this->acExistencia_maxima=$laRow['existencia_maxima'];
$this->acExistencia=$laRow['existencia'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>codigo</td>
<td style='font-weight:bold; font-size:20px;'>nacionalidad</td>
<td style='font-weight:bold; font-size:20px;'>nombre</td>
<td style='font-weight:bold; font-size:20px;'>tipo_producto</td>
<td style='font-weight:bold; font-size:20px;'>codigo_marca</td>
<td style='font-weight:bold; font-size:20px;'>codigo_unidad_medida</td>
<td style='font-weight:bold; font-size:20px;'>existencia_minima</td>
<td style='font-weight:bold; font-size:20px;'>existencia_maxima</td>
<td style='font-weight:bold; font-size:20px;'>existencia</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acCodigo."</td>
<td>".$this->acNacionalidad."</td>
<td>".$this->acNombre."</td>
<td>".$this->acTipo_producto."</td>
<td>".$this->acCodigo_marca."</td>
<td>".$this->acCodigo_unidad_medida."</td>
<td>".$this->acExistencia_minima."</td>
<td>".$this->acExistencia_maxima."</td>
<td>".$this->acExistencia."</td>
					<td><a href='?txtcodigo=".$laRow['codigo']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tproducto(codigo,nacionalidad,nombre,tipo_producto,codigo_marca,codigo_unidad_medida,existencia_minima,existencia_maxima,existencia)values('$this->acCodigo','$this->acNacionalidad','$this->acNombre','$this->acTipo_producto','$this->acCodigo_marca','$this->acCodigo_unidad_medida','$this->acExistencia_minima','$this->acExistencia_maxima','$this->acExistencia')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tproducto set codigo = '$this->acCodigo', nacionalidad = '$this->acNacionalidad', nombre = '$this->acNombre', tipo_producto = '$this->acTipo_producto', codigo_marca = '$this->acCodigo_marca', codigo_unidad_medida = '$this->acCodigo_unidad_medida', existencia_minima = '$this->acExistencia_minima', existencia_maxima = '$this->acExistencia_maxima', existencia = '$this->acExistencia' where(codigo = '$this->acCodigo')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tproducto where(codigo = '$this->acCodigo')");
}
//fin clase
}?>