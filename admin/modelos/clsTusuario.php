<?php
require_once("clsDatos.php"); //Clase Base de Datos Poner Ruta de Clase
class clsTusuario extends clsDatos{
private $acNombre_usu;
private $acClave;
private $acTipo;
private $acPregunta;
private $acRespuesta;
private $estatus;
private $nombre_completo;
private $correo;

//constructor de la clase		
public function __construct(){
$this->acNombre_usu = "";
$this->acClave = "";
$this->acTipo = "";
$this->acPregunta = "";
$this->acRespuesta = "";
$this->estatus = "";
$this->nombre_completo ="";
$this->correo = "";
}

//metodo magico set
public function __set($atributo, $valor){ $this->$atributo = strtoupper($valor);}		
//metodo get
public function __get($atributo){ return trim(strtoupper($this->$atributo)); }
//destructor de la clase        
public function __destruct() { }
		
//funcion Buscar        
public function buscar2()
{
$llEnc=false;
$this->ejecutar("select * from tusuario where(nombre_usu = '$this->acNombre_usu')");
if($laRow=$this->arreglo())
{		
$this->acNombre_usu=$laRow['nombre_usu'];
$this->acClave=$laRow['clave'];
$this->acTipo=$laRow['tipo'];
$this->acPregunta=$laRow['pregunta'];
$this->acRespuesta=$laRow['respuesta'];	
$this->estatus = $laRow['estatus'];	
$this->nombre_completo = $laRow["nombre_completo"];
$this->correo = $laRow["correo"];
$llEnc=true;
}
return $llEnc;
}

public function validar_entrada($user,$pass){
	$this->ejecutar("select * from tusuario where nombre_usu = '$user' and clave = '$pass'");
	if($row=$this->arreglo()){
		$arrData[] = $row;
	}
	return $arrData;
}

public function comprobar_usuarios($nombre){
	$this->ejecutar("select * from tusuario where (nombre_usu = '$nombre') ");
	if($row = $this->arreglo()){  $arrData[] = $row; }
	return $arrData;
}

public function validar_respuesta($usuario,$respuesta){
	$this->ejecutar("select * from tusuario where nombre_usu = '$usuario' and respuesta = '$respuesta'");
	if($row = $this->arreglo()){  $arrData[] = $row; }
	return $arrData;
}

public function cambiar_contra($usuario,$nueva_contra){
	return $this->ejecutar("update tusuario set clave = '$nueva_contra' where nombre_usu = '$usuario'");
}

//Busqueda Ajax
public function busqueda_ajax($valor)
{
$lrTb=$this->ejecutar("select * from tusuario where((nombre_usu like '%$valor%') or (clave like '%$valor%') or (tipo like '%$valor%') or (pregunta like '%$valor%') or (respuesta like '%$valor%'))");
while($laRow=$this->arreglo())
{		
$this->acNombre_usu=$laRow['nombre_usu'];
$this->acClave=$laRow['clave'];
$this->acTipo=$laRow['tipo'];
$this->acPregunta=$laRow['pregunta'];
$this->acRespuesta=$laRow['respuesta'];		
$inicio = "</br>
		   <table class='tabla_datos_busqueda datos'>
           <tr>
			   <td style='font-weight:bold; font-size:20px;'>nombre_usu</td>
				<td style='font-weight:bold; font-size:20px;'>clave</td>
				<td style='font-weight:bold; font-size:20px;'>tipo</td>
				<td style='font-weight:bold; font-size:20px;'>pregunta</td>
				<td style='font-weight:bold; font-size:20px;'>respuesta</td>
			   <td style='font-weight:bold; font-size:20px;'>Accion</td>
		  </tr>";
		  
$final = "</table>";
$llEnc=$llEnc."<tr>
					<td>".$this->acNombre_usu."</td>
					<td>".$this->acClave."</td>
					<td>".$this->acTipo."</td>
					<td>".$this->acPregunta."</td>
					<td>".$this->acRespuesta."</td>
					<td><a href='?txtnombre_usu=".$laRow['nombre_usu']."&txtoperacion=buscar2'>Seleccione</a></td>
				</tr>";
}
return $inicio.$llEnc.$final;
}

//funcion inlcuir
public function incluir()
{
return $this->ejecutar("insert into tusuario(nombre_usu,clave,tipo,pregunta,respuesta,estatus,nombre_completo,correo)values('$this->acNombre_usu','$this->acClave','$this->acTipo','$this->acPregunta','$this->acRespuesta','$this->estatus','$this->nombre_completo','$this->correo')");
}
public function reiniciar_contador($user){
	return $this->ejecutar("update tusuario set intentos = 0 where nombre_usu = '$user'");
}

//funcion modificar
public function modificar($lcVarTem)
{
return $this->ejecutar("update tusuario set nombre_usu = '$this->acNombre_usu', clave = '$this->acClave', tipo = '$this->acTipo', pregunta = '$this->acPregunta', respuesta = '$this->acRespuesta', estatus = '$this->estatus', nombre_completo = '$this->nombre_completo', correo = '$this->correo' where(nombre_usu = '$this->acNombre_usu')");
}

public function incrementar_intentos($usuario, $inten){
	$intentos = ($inten+1);
	return  $this->ejecutar("update tusuario set intentos = '$intentos' where (nombre_usu = '$usuario')");
}

public function bloq_des($user, $estatus){
	return $this->ejecutar("update tusuario set estatus = '$estatus' where (nombre_usu = '$user')");
}

public function getData($user){
	$this->ejecutar("select * from tusuario where (nombre_usu = '$user')");
	if($row = $this->arreglo()){ $arrData[] = $row; }
	return $arrData;
}
 
 
//funcion eliminar        
public function eliminar()
{
return $this->ejecutar("delete from tusuario where(nombre_usu = '$this->acNombre_usu')");
}
//fin clase
}?>