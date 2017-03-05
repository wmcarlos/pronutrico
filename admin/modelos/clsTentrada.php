<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTentrada extends clsDatos{
private $acNro_entrada;
private $acFecha_entrada;
private $acRif_proveedor;

//constructor de la clase		
public function __construct(){
$this->acNro_entrada = "";
$this->acFecha_entrada = "";
$this->acRif_proveedor = "";
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
$this->ejecutar("select nro_entrada, date_format(fecha_entrada, '%d/%m/%Y') as fecha_entrada, rif_proveedor from tentrada where(nro_entrada = '$this->acNro_entrada')");
if($laRow=$this->arreglo())
{		
$this->acNro_entrada=$laRow['nro_entrada'];
$this->acFecha_entrada=$laRow['fecha_entrada'];
$this->acRif_proveedor=$laRow['rif_proveedor'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select nro_entrada, date_format(fecha_entrada, '%d/%m/%Y') as fecha_entrada, rif_proveedor  from tentrada where((nro_entrada like '%$valor%') or (fecha_entrada like '%$valor%') or (rif_proveedor like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acNro_entrada=$laRow['nro_entrada'];
$this->acFecha_entrada=$laRow['fecha_entrada'];
$this->acRif_proveedor=$laRow['rif_proveedor'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>Nro Recepcion</td>
				<td style='font-weight:bold; font-size:20px;'>Fecha Recepcion</td>
				<td style='font-weight:bold; font-size:20px;'>Proveedor</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNro_entrada."</td>
					<td>".$this->acFecha_entrada."</td>
					<td>".$this->acRif_proveedor."</td>
					<td><a href='?txtnro_entrada=".$laRow['nro_entrada']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
$this->acFecha_entrada = $this->setDate($this->acFecha_entrada);

return $this->ejecutar("insert into tentrada(nro_entrada,fecha_entrada,rif_proveedor)values('$this->acNro_entrada','$this->acFecha_entrada','$this->acRif_proveedor')");
}

public function incluir_detalle($producto,$rif,$chofer,$placa,$cantidad){
	return $this->ejecutar("insert into tlinea_entrada(nro_entrada,codigo_producto,rif_transportista,chofer,placa,cantidad) values ($this->acNro_entrada,$producto,'$rif','$chofer','$placa',$cantidad)");
}

public function plusinventory($product, $cantidad){
	$total = 0;
	$this->ejecutar("select existencia from tproducto where codigo = $product");
	if($row = $this->arreglo()){
		$total = $row["existencia"] + $cantidad;
	}

	return $this->ejecutar("update tproducto set existencia = $total where codigo = $product");
}

public function listar_detalle(){
	$this->ejecutar("
		select 
		le.codigo_producto,
		p.nombre as producto,
		le.rif_transportista,
		t.razon_social as transportista,
		le.chofer,
		le.placa,
		le.cantidad
		from tlinea_entrada as le
		inner join tproducto as p on (le.codigo_producto = p.codigo)
		inner join tproveedor as t on (le.rif_transportista = t.rif)
		where le.nro_entrada = $this->acNro_entrada");

	$cad = "";

	while($row = $this->arreglo()){
		$cad.="<tr>";
			$cad.="<td><input type='hidden' name='productos[]' value='".$row["codigo_producto"]."'/>".$row["producto"]."</td>";
			$cad.="<td><input type='hidden' name='transportistas[]' value='".$row["rif_transportista"]."'/>".$row["transportista"]."</td>";
			$cad.="<td><input type='hidden' name='choferes[]' value='".$row["chofer"]."'/>".$row["chofer"]."</td>";
			$cad.="<td><input type='hidden' name='placas[]' value='".$row["placa"]."'/>".$row["placa"]."</td>";
			$cad.="<td><input type='hidden' name='cantidades[]' value='".$row["cantidad"]."'/>".$row["cantidad"]."</td>";
			$cad.="<td><button type='button' onclick='delrecepcion(this);'>X</button></td>";
		$cad.="</tr>";
	}

	return $cad;
}

public function delete_detalle(){
	return $this->ejecutar("delete from tlinea_entrada where nro_entrada = $this->acNro_entrada");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
$this->acFecha_entrada = $this->setDate($this->acFecha_entrada);

return $this->ejecutar("update tentrada set nro_entrada = '$this->acNro_entrada', fecha_entrada = '$this->acFecha_entrada', rif_proveedor = '$this->acRif_proveedor' where(nro_entrada = '$this->acNro_entrada')");
}

public function setDate($date){
	$last = explode("/", $date);
	$newd = $last[2]."/".$last[1]."/".$last[0];
	return $newd;
}
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tentrada where(nro_entrada = '$this->acNro_entrada')");
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