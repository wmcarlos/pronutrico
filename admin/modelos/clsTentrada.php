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
$this->ejecutar("select * from tentrada where(nro_entrada = '$this->acNro_entrada')");
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
$lrTb=$this->ejecutar("select * from tentrada where((nro_entrada like '%$valor%') or (fecha_entrada like '%$valor%') or (rif_proveedor like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acNro_entrada=$laRow['nro_entrada'];
$this->acFecha_entrada=$laRow['fecha_entrada'];
$this->acRif_proveedor=$laRow['rif_proveedor'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>nro_entrada</td>
<td style='font-weight:bold; font-size:20px;'>fecha_entrada</td>
<td style='font-weight:bold; font-size:20px;'>rif_proveedor</td>
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
return $this->ejecutar("insert into tentrada(nro_entrada,fecha_entrada,rif_proveedor)values('$this->acNro_entrada','$this->acFecha_entrada','$this->acRif_proveedor')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tentrada set nro_entrada = '$this->acNro_entrada', fecha_entrada = '$this->acFecha_entrada', rif_proveedor = '$this->acRif_proveedor' where(nro_entrada = '$this->acNro_entrada')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tentrada where(nro_entrada = '$this->acNro_entrada')");
}
//fin clase
}?>