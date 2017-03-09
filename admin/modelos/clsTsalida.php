<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTsalida extends clsDatos{
private $acNro_salida;
private $acFecha_salida;
private $acCeudula_supervisor;
private $acTurno;

//constructor de la clase		
public function __construct(){
$this->acNro_salida = "";
$this->acFecha_salida = "";
$this->acCeudula_supervisor = "";
$this->acTurno = "";
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
$this->ejecutar("select * from tsalida where(nro_salida = '$this->acNro_salida')");
if($laRow=$this->arreglo())
{		
$this->acNro_salida=$laRow['nro_salida'];
$this->acFecha_salida=$laRow['fecha_salida'];
$this->acCeudula_supervisor=$laRow['ceudula_supervisor'];
$this->acTurno=$laRow['turno'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select 
	s.nro_salida,
	date_format(s.fecha_salida, '%d/%m/%Y') as fecha_salida,
	concat(ts.nombres,' ',ts.apellidos) as supervisor,
	s.turno
	from tsalida as s 
	inner join tsupervisor as ts on (ts.cedula = s.ceudula_supervisor)
	where((s.nro_salida like '%$valor%') or (s.fecha_salida like '%$valor%') or (s.ceudula_supervisor like '%$valor%') or (s.turno like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acNro_salida=$laRow['nro_salida'];
$this->acFecha_salida=$laRow['fecha_salida'];
$this->acCeudula_supervisor=$laRow['ceudula_supervisor'];
$this->acTurno=$laRow['turno'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>Nro Despacho</td>
				<td style='font-weight:bold; font-size:20px;'>Fecha Despacho</td>
				<td style='font-weight:bold; font-size:20px;'>Supervisor</td>
				<td style='font-weight:bold; font-size:20px;'>Turno</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNro_salida."</td>
					<td>".$this->acFecha_salida."</td>
					<td>".$laRow["supervisor"]."</td>
					<td>".$this->acTurno."</td>
					<td><a href='?txtnro_salida=".$laRow['nro_salida']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

public function essupervisor($name){
	$split = explode(" ", $name);

	$this->ejecutar("select * from tsupervisor where nombres = '".$split[0]."' and apellidos = '".$split[1]."'");
	return $this->arreglo();
}

public function listar_productos_marcas(){
	$this->ejecutar("
	select
	 tp.codigo as codigo_producto,
	 tp.nombre as producto,
	 tm.nombre as marca
	 from tproducto as tp
	 inner join tmarca as tm on (tm.codigo = tp.codigo_marca)
	 where tp.tipo_producto = 'PT'");

	$cad = "";

	while($row = $this->arreglo()){
		$cad.="<option value='".$row["codigo_producto"]."'>".$row["producto"]."(".$row["marca"].")</option>";
	}

	return $cad;
}

//funcion inlcuir
public function incluir()
{
	$this->acFecha_salida = $this->setDate($this->acFecha_salida);

return $this->ejecutar("insert into tsalida(nro_salida,fecha_salida,ceudula_supervisor,turno)values('$this->acNro_salida','$this->acFecha_salida','$this->acCeudula_supervisor','$this->acTurno')");
}

public function incluir_detalle($producto,$cantidad,$matempcons,$bolcom,$desperdicios){
	return $this->ejecutar("insert into tlinea_salida(nro_salida,codigo_producto,cantidad, matempcons, bolcom, desperdicio) values ($this->acNro_salida,$producto,$cantidad,$matempcons,$bolcom,$desperdicios)");
}

public function listar_detalle(){
	$this->ejecutar("
		select 
		ls.codigo_producto,
		p.nombre as producto,
		ls.cantidad,
		ls.matempcons,
		ls.bolcom,
		ls.desperdicio
		from tlinea_salida as ls
		inner join tproducto as p on (ls.codigo_producto = p.codigo)
		where ls.nro_salida = $this->acNro_salida");

	$cad = "";

	while($row = $this->arreglo()){
		$cad.="<tr>";
			$cad.="<td><input type='hidden' name='productos[]' value='".$row["codigo_producto"]."'/>".$row["producto"]."</td>";
			$cad.="<td><input type='hidden' name='cantidades[]' value='".$row["cantidad"]."'/>".$row["cantidad"]."</td>";
			$cad.="<td><input type='hidden' name='cantidades[]' value='".$row["matempcons"]."'/>".$row["matempcons"]."</td>";
			$cad.="<td><input type='hidden' name='cantidades[]' value='".$row["bolcom"]."'/>".$row["bolcom"]."</td>";
			$cad.="<td><input type='hidden' name='cantidades[]' value='".$row["desperdicio"]."'/>".$row["desperdicio"]."</td>";
			$cad.="<td><button type='button' onclick='delrecepcion(this);'>X</button></td>";
		$cad.="</tr>";
	}

	return $cad;
}

public function delete_detalle(){
	return $this->ejecutar("delete from tlinea_salida where nro_salida = $this->acNro_salida");
}
        

//funcion modificar
public function modificar($lcVarTem)
{
	$this->acFecha_salida = $this->setDate($this->acFecha_salida);
return $this->ejecutar("update tsalida set nro_salida = '$this->acNro_salida', fecha_salida = '$this->acFecha_salida', ceudula_supervisor = '$this->acCeudula_supervisor', turno = '$this->acTurno' where(nro_salida = '$this->acNro_salida')");
}

public function restfptp($fproduct, $tproduct,$cant){
	$total = 0;
	switch ($tproduct) {
		case 1:
			$this->ejecutar("select existencia from tproducto where codigo = $tproduct");
			if($row = $this->arreglo()){
				$formula = $cant * 20;
				$total = $row["existencia"] - $formula;
			}
		break;
	}

	return $this->ejecutar("update tproducto set existencia = $total where codigo = $tproduct");
}
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tsalida where(nro_salida = '$this->acNro_salida')");
}

public function setDate($date){
	$last = explode("/", $date);
	$newd = $last[2]."/".$last[1]."/".$last[0];
	return $newd;
}

public function reporte_despachos(){
	$this->ejecutar("select 
date_format(ts.fecha_salida, '%d/%m/%Y') as fecha_salida,
ts.turno,
concat(tsu.nombres,' ',tsu.apellidos) as supervisor,
tp.nombre as producto,
tum.nombre as unidad_medida,
tls.cantidad,
tmar.nombre as marca,
tls.matempcons,
tls.bolcom,
tls.desperdicio
from tlinea_salida as tls
inner join tsalida as ts on (ts.nro_salida = tls.nro_salida)
inner join tproducto as tp on (tp.codigo = tls.codigo_producto)
inner join tsupervisor as tsu on (tsu.cedula = ts.ceudula_supervisor)
inner join tunidad_medida as tum on (tum.codigo = tp.codigo_unidad_medida)
inner join tmarca as tmar on (tmar.codigo = tp.codigo_marca)");

	$cad = "";

	while($row = $this->arreglo()){
		$cad.="<tr>";
			$cad.="<td>".$row["fecha_salida"]."</td>";
			$cad.="<td>".$row["turno"]."</td>";
			$cad.="<td>".$row["supervisor"]."</td>";
			$cad.="<td>".$row["producto"]."</td>";
			$cad.="<td>".$row["unidad_medida"]."</td>";
			$cad.="<td>".$row["cantidad"]."</td>";
			$cad.="<td>".$row["marca"]."</td>";
			$cad.="<td>".$row["matempcons"]."</td>";
			$cad.="<td>".$row["bolcom"]."</td>";
			$cad.="<td>".$row["desperdicio"]."</td>";
		$cad.="</tr>";
	}
	return $cad;
}

public function transaction($t){
	$sql = "";
	switch($t){
		case 'BEGIN':
			$sql = "BEGIN";
		break;
		case 'COMMIT':
			$sql = "COMMIT";
		break;
		case 'ROLLBACK':
			$sql = "ROLLBACK";
		break;
	}
	return $this->ejecutar($sql);
}
//fin clase
}?>