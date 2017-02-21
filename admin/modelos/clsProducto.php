<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsProducto extends clsDatos{
private $acCodigo_producto;
private $acNombre;
private $acDescripcion;
private $acCodigo_unidad_medida;
private $acCantidad_minima;
private $acCantidad_maxima;
private $acExistencia;

//constructor de la clase		
public function __construct(){
$this->acCodigo_producto = "";
$this->acNombre = "";
$this->acDescripcion = "";
$this->acCodigo_unidad_medida = "";
$this->acCantidad_minima = "";
$this->acCantidad_maxima = "";
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
$this->ejecutar("select * from producto where(codigo_producto = '$this->acCodigo_producto')");
if($laRow=$this->arreglo())
{		
$this->acCodigo_producto=$laRow['codigo_producto'];
$this->acNombre=$laRow['nombre'];
$this->acDescripcion=$laRow['descripcion'];
$this->acCodigo_unidad_medida=$laRow['codigo_unidad_medida'];
$this->acCantidad_minima=$laRow['cantidad_minima'];
$this->acCantidad_maxima=$laRow['cantidad_maxima'];
$this->acExistencia=$laRow['existencia'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from producto where((codigo_producto like '%$valor%') or (nombre like '%$valor%') or (descripcion like '%$valor%') or (codigo_unidad_medida like '%$valor%') or (cantidad_minima like '%$valor%') or (cantidad_maxima like '%$valor%') or (existencia like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acCodigo_producto=$laRow['codigo_producto'];
$this->acNombre=$laRow['nombre'];
$this->acDescripcion=$laRow['descripcion'];
$this->acCodigo_unidad_medida=$laRow['codigo_unidad_medida'];
$this->acCantidad_minima=$laRow['cantidad_minima'];
$this->acCantidad_maxima=$laRow['cantidad_maxima'];
$this->acExistencia=$laRow['existencia'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
<td style='font-weight:bold; font-size:20px;'>nombre</td>
<td style='font-weight:bold; font-size:20px;'>descripcion</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
<td>".$this->acNombre."</td>
<td>".$this->acDescripcion."</td>
					<td><a href='?txtcodigo_producto=".$laRow['codigo_producto']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into producto(codigo_producto,nombre,descripcion,codigo_unidad_medida,cantidad_minima,cantidad_maxima,existencia)values('$this->acCodigo_producto','$this->acNombre','$this->acDescripcion','$this->acCodigo_unidad_medida','$this->acCantidad_minima','$this->acCantidad_maxima','$this->acExistencia')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update producto set codigo_producto = '$this->acCodigo_producto', nombre = '$this->acNombre', descripcion = '$this->acDescripcion', codigo_unidad_medida = '$this->acCodigo_unidad_medida', cantidad_minima = '$this->acCantidad_minima', cantidad_maxima = '$this->acCantidad_maxima', existencia = '$this->acExistencia' where(codigo_producto = '$this->acCodigo_producto')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from producto where(codigo_producto = '$this->acCodigo_producto')");
}
//fin clase
}?>