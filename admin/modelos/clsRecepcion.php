<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsRecepcion extends clsDatos{
private $acNro_recepcion;
private $acFecha_recepcion;
private $acCodigo_origen;

//constructor de la clase		
public function __construct(){
$this->acNro_recepcion = "";
$this->acFecha_recepcion = "";
$this->acCodigo_origen = "";
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
$this->ejecutar("select * from recepcion where(nro_recepcion = '$this->acNro_recepcion')");
if($laRow=$this->arreglo())
{		
$this->acNro_recepcion=$laRow['nro_recepcion'];
$this->acFecha_recepcion=$laRow['fecha_recepcion'];
$this->acCodigo_origen=$laRow['codigo_origen'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from recepcion where((nro_recepcion like '%$valor%') or (fecha_recepcion like '%$valor%') or (codigo_origen like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acNro_recepcion=$laRow['nro_recepcion'];
$this->acFecha_recepcion=$laRow['fecha_recepcion'];
$this->acCodigo_origen=$laRow['codigo_origen'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>nro_recepcion</td>
<td style='font-weight:bold; font-size:20px;'>fecha_recepcion</td>
<td style='font-weight:bold; font-size:20px;'>codigo_origen</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNro_recepcion."</td>
<td>".$this->acFecha_recepcion."</td>
<td>".$this->acCodigo_origen."</td>
					<td><a href='?txtnro_recepcion=".$laRow['nro_recepcion']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into recepcion(nro_recepcion,fecha_recepcion,codigo_origen)values('$this->acNro_recepcion','$this->acFecha_recepcion','$this->acCodigo_origen')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update recepcion set nro_recepcion = '$this->acNro_recepcion', fecha_recepcion = '$this->acFecha_recepcion', codigo_origen = '$this->acCodigo_origen' where(nro_recepcion = '$this->acNro_recepcion')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from recepcion where(nro_recepcion = '$this->acNro_recepcion')");
}
//fin clase
}?>