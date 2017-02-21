<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsDespacho extends clsDatos{
private $acNro_despacho;
private $acFecha_despacho;
private $acCedula_supervisor;

//constructor de la clase		
public function __construct(){
$this->acNro_despacho = "";
$this->acFecha_despacho = "";
$this->acCedula_supervisor = "";
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
$this->ejecutar("select * from despacho where(nro_despacho = '$this->acNro_despacho')");
if($laRow=$this->arreglo())
{		
$this->acNro_despacho=$laRow['nro_despacho'];
$this->acFecha_despacho=$laRow['fecha_despacho'];
$this->acCedula_supervisor=$laRow['cedula_supervisor'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from despacho where((nro_despacho like '%$valor%') or (fecha_despacho like '%$valor%') or (cedula_supervisor like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acNro_despacho=$laRow['nro_despacho'];
$this->acFecha_despacho=$laRow['fecha_despacho'];
$this->acCedula_supervisor=$laRow['cedula_supervisor'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>nro_despacho</td>
<td style='font-weight:bold; font-size:20px;'>fecha_despacho</td>
<td style='font-weight:bold; font-size:20px;'>cedula_supervisor</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNro_despacho."</td>
<td>".$this->acFecha_despacho."</td>
<td>".$this->acCedula_supervisor."</td>
					<td><a href='?txtnro_despacho=".$laRow['nro_despacho']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into despacho(nro_despacho,fecha_despacho,cedula_supervisor)values('$this->acNro_despacho','$this->acFecha_despacho','$this->acCedula_supervisor')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update despacho set nro_despacho = '$this->acNro_despacho', fecha_despacho = '$this->acFecha_despacho', cedula_supervisor = '$this->acCedula_supervisor' where(nro_despacho = '$this->acNro_despacho')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from despacho where(nro_despacho = '$this->acNro_despacho')");
}
//fin clase
}?>