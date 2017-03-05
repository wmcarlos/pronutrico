<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTdominio_correo extends clsDatos{
private $acCodigo;
private $acNombre;

//constructor de la clase		
public function __construct(){
$this->acCodigo = "";
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
$this->ejecutar("select * from tdominio_correo where(codigo = '$this->acCodigo')");
if($laRow=$this->arreglo())
{		
$this->acCodigo=$laRow['codigo'];
$this->acNombre=$laRow['nombre'];		
$llEnc=true;
}
return $llEnc;
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tdominio_correo where((codigo like '%$valor%') or (nombre like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acCodigo=$laRow['codigo'];
$this->acNombre=$laRow['nombre'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>codigo</td>
<td style='font-weight:bold; font-size:20px;'>nombre</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acCodigo."</td>
<td>".$this->acNombre."</td>
					<td><a href='?txtcodigo=".$laRow['codigo']."&txtoperacion=buscar'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tdominio_correo(codigo,nombre)values('$this->acCodigo','$this->acNombre')");
}
        


//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tdominio_correo set codigo = '$this->acCodigo', nombre = '$this->acNombre' where(codigo = '$this->acCodigo')");
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tdominio_correo where(codigo = '$this->acCodigo')");
}
//fin clase
}?>