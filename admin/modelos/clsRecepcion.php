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
$this->ejecutar("select *, date_format(fecha_recepcion, '%d/%m/%Y') as fecha_recepcion from recepcion where(nro_recepcion = '$this->acNro_recepcion')");
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
$lrTb=$this->ejecutar("select 
	re.nro_recepcion,
	date_format(re.fecha_recepcion, '%d/%m/%Y') as fecha_recepcion,
	re.codigo_origen,
	ori.nombre as origen
	from recepcion as re
	inner join origen as ori on (ori.codigo = re.codigo_origen)
	where((re.nro_recepcion like '%$valor%') or (re.fecha_recepcion like '%$valor%') or (re.codigo_origen like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acNro_recepcion=$laRow['nro_recepcion'];
$this->acFecha_recepcion=$laRow['fecha_recepcion'];
$this->acCodigo_origen=$laRow['codigo_origen'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>Nro Recepcion</td>
<td style='font-weight:bold; font-size:20px;'>Fecha</td>
<td style='font-weight:bold; font-size:20px;'>Origen</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNro_recepcion."</td>
<td>".$this->acFecha_recepcion."</td>
<td>".$laRow['origen']."</td>
					<td><a href='?txtnro_recepcion=".$laRow['nro_recepcion']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
$fecha = explode("/", $this->acFecha_recepcion);
$this->acFecha_recepcion = $fecha[2]."/".$fecha[1]."/".$fecha[0];
return $this->ejecutar("insert into recepcion(nro_recepcion,fecha_recepcion,codigo_origen)values('$this->acNro_recepcion','$this->acFecha_recepcion','$this->acCodigo_origen')");
}


public function addexistencia($producto, $cantidad){
	$cantactual = 0;
	$this->ejecutar("select existencia from producto where codigo_producto = $producto");
	if($row=$this->arreglo()){
		$cantactual = $row["existencia"];
	}
	$total = $cantidad + $cantactual;
	$this->ejecutar("update producto set existencia  = $total where codigo_producto = $producto");
}

public function listar(){
	$cad="";
	$this->ejecutar("
		select
			lr.codigo_transporte,
			tp.nombre as transporte,
			lr.cantidad,
			lr.placa,
			concat(cf.nombres,' ',apellidos) as chofer,
			lr.cedula_chofer,
			lr.codigo_producto,
			pr.nombre as producto
		from 
		linea_recepcion as lr
		inner join transporte as tp on (tp.codigo=lr.codigo_transporte)
		inner join chofer as cf on (cf.cedula = lr.cedula_chofer )
		inner join producto as pr on (pr.codigo_producto = lr.codigo_producto)
		where lr.nro_recepcion = $this->acNro_recepcion");
	while($laRow=$this->arreglo()){
		$cad.="<tr>";
			$cad.="<td><input type='hidden' name='transporte[]' value='".$laRow["codigo_transporte"]."'>".$laRow["transporte"]."</td>";
			$cad.="<td><input type='hidden' name='chofer[]' value='".$laRow["cedula_chofer"]."'>".$laRow["chofer"]."</td>";
			$cad.="<td><input type='hidden' name='placa[]' value='".$laRow["placa"]."'>".$laRow["placa"]."</td>";
			$cad.="<td><input type='hidden' name='producto[]' value='".$laRow["codigo_producto"]."'>".$laRow["producto"]."</td>";
			$cad.="<td><input type='hidden' name='cantidad[]' value='".$laRow["cantidad"]."'>".$laRow["cantidad"]."</td>";
			$cad.="<td><button type='button' onclick='delreception(this)'>x</button></td>";
		$cad.="</tr>";

	}
	return $cad;
}

public function incluir_recepcion($ct,$cc,$pl,$cp,$ca)
{
return $this->ejecutar("insert into 
	linea_recepcion(nro_recepcion,codigo_transporte,cedula_chofer,placa,codigo_producto,cantidad)
	values($this->acNro_recepcion,'$ct','$cc','$pl','$cp','$ca')");
}
  
public function deldetails(){
	$this->ejecutar("delete from linea_recepcion where nro_recepcion = $this->acNro_recepcion");
}

//funcion modificar
public function modificar($lcVarTem)
{
$fecha = explode("/", $this->acFecha_recepcion);
$this->acFecha_recepcion = $fecha[2]."/".$fecha[1]."/".$fecha[0];
return $this->ejecutar("update recepcion set nro_recepcion = '$this->acNro_recepcion', fecha_recepcion = '$this->acFecha_recepcion', codigo_origen = '$this->acCodigo_origen' where(nro_recepcion = '$this->acNro_recepcion')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from recepcion where(nro_recepcion = '$this->acNro_recepcion')");
}
//fin clase
}?>