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
$lrTb=$this->ejecutar("select * from tsalida where((nro_salida like '%$valor%') or (fecha_salida like '%$valor%') or (ceudula_supervisor like '%$valor%') or (turno like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acNro_salida=$laRow['nro_salida'];
$this->acFecha_salida=$laRow['fecha_salida'];
$this->acCeudula_supervisor=$laRow['ceudula_supervisor'];
$this->acTurno=$laRow['turno'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>nro_salida</td>
<td style='font-weight:bold; font-size:20px;'>fecha_salida</td>
<td style='font-weight:bold; font-size:20px;'>ceudula_supervisor</td>
<td style='font-weight:bold; font-size:20px;'>turno</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNro_salida."</td>
<td>".$this->acFecha_salida."</td>
<td>".$this->acCeudula_supervisor."</td>
<td>".$this->acTurno."</td>
					<td><a href='?txtnro_salida=".$laRow['nro_salida']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tsalida(nro_salida,fecha_salida,ceudula_supervisor,turno)values('$this->acNro_salida','$this->acFecha_salida','$this->acCeudula_supervisor','$this->acTurno')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tsalida set nro_salida = '$this->acNro_salida', fecha_salida = '$this->acFecha_salida', ceudula_supervisor = '$this->acCeudula_supervisor', turno = '$this->acTurno' where(nro_salida = '$this->acNro_salida')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tsalida where(nro_salida = '$this->acNro_salida')");
}
//fin clase
}?>