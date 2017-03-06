function Incluir($id){
var f = document.form1;
$('#form1').find('input').attr("disabled",false);
$('#form1').find('textarea').attr("disabled",false);
$('#form1').find('select').attr("disabled",false);		
if($id=="no"){
	f[0].value = "";
	f[0].focus();
}else{
	f[0].value = $id;
	f[1].focus();
}
//botones	
f.txtoperacion.value = 'incluir';
f.btnincluir.disabled = true;
f.btnbuscar.disabled = true;
f.btnmodificar.disabled = true;
f.btneliminar.disabled = true;
f.btncancelar.disabled = false;
f.btnguardar.disabled = false;
}

function Modificar(){
var f = document.form1;
//campos		
$('#form1').find('input').attr("disabled",false);
$('#form1').find('textarea').attr("disabled",false);
$('#form1').find('select').attr("disabled",false);	

if(document.getElementById("txtrif")){
	f[0].disabled = true;
	f[1].disabled = true;
	f[2].focus();
}else{
	f[0].disabled = true;
	f[1].focus();
}
//botones	
f.txtoperacion.value = 'modificar';
f.btnincluir.disabled = true;
f.btnbuscar.disabled = true;
f.btnmodificar.disabled = true;
f.btneliminar.disabled = true;
f.btncancelar.disabled = false;
f.btnguardar.disabled = false;
}

function Eliminar()
		{
			var f = document.form1;
			if(confirm('Desea Eliminar Este Registro?'))
			{
				f[0].disabled = false;
				f.txtoperacion.value = 'eliminar';
				f.submit();
			}
		}
		
		function Cancelar(redirec){
			
			location.href='../vistas/vista'+redirec+'.php';	
		}

function cargar_select(operacion,listo)
		{
			var f = document.form1;
			if(listo==1 && operacion=='buscar')
			{
				f.btnincluir.disabled = true;
				f.btnbuscar.disabled = true;
				f.btnmodificar.disabled = false;
				f.btneliminar.disabled = false;
				f.btncancelar.disabled = false;
			}

			if(listo==1 && operacion=='buscar2')
			{
				f.btnincluir.disabled = true;
				f.btnbuscar.disabled = true;
				f.btnmodificar.disabled = false;
				f.btneliminar.disabled = false;
				f.btncancelar.disabled = false;
			}
}

function getSelectText(id){
	return document.getElementById(id).options[document.getElementById(id).selectedIndex].text
}

function getElement(id){
	return document.getElementById(id);
}

function verifyarray(arr, val){
	var exist = false;
	var arr = document.getElementsByName(arr);
	var total = arr.length;
	var cont = 0;

	for(var i = 0; i < total ; i++){
		if(val == arr[i].value){
			cont++;
		}
	}

	if(cont > 0){
		return true;
	}else{
		return false;
	}
}

function delrecepcion(e){
	var td = e.parentNode;
	var tr = td.parentNode;
	var tbody = tr.parentNode;
	tbody.removeChild(tr);
}

function addrecepcion(){
	var producto = getSelectText("txtproducto");
	var idproducto = getElement("txtproducto").value;
	var transportista = getSelectText("txttransportista");
	var idtransportista = getElement("txttransportista").value;
	var chofer = getElement("txtchofer").value;
	var placa = getElement("txtplaca").value;
	var cantidad = getElement("txtcantidad").value;
	var cad = "";

	if(producto && transportista && chofer && placa && cantidad){
		if(verifyarray("productos[]",idproducto) && verifyarray("transportistas[]",idtransportista)){
			alert("Ya este producto del mismo Proveedor fue Agregado");
		}else{
			cad+="<tr>";
				cad+="<td><input type='hidden' name='productos[]' value='"+idproducto+"'>"+producto+"</td>";
				cad+="<td><input type='hidden' name='transportistas[]' value='"+idtransportista+"'>"+transportista+"</td>";
				cad+="<td><input type='hidden' name='choferes[]' value='"+chofer+"'/>"+chofer+"</td>";
				cad+="<td><input type='hidden' name='placas[]' value='"+placa+"'/>"+placa+"</td>";
				cad+="<td><input type='hidden' name='cantidades[]' value='"+cantidad+"'/>"+cantidad+"</td>";
				cad+="<td><button type='button' onclick='delrecepcion(this);'>X</button></td>";
			cad+="</tr>";

			getElement("contenedor_recepcion").innerHTML += cad;
		}
	}else{
		alert("Todos los campos son Obligatorios");
	}

	getElement("txtproducto").value = "";
	getElement("txttransportista").value = "";
	getElement("txtchofer").value = "";
	getElement("txtplaca").value = "";
	getElement("txtcantidad").value = "";
}

function adddespacho(){
	var producto = getSelectText("txtproducto");
	var idproducto = getElement("txtproducto").value;
	var cantidad = getElement("txtcantidad").value;
	var matempcons = getElement("txtmatempcons").value;
	var bolcons = getElement("txtbolcon").value;
	var desperdicios = getElement("txtdesperdicios").value;
	var cad = "";

	if(idproducto && cantidad && matempcons && bolcons && desperdicios){
		if(verifyarray("productos[]",idproducto)){
			alert("Ya este producto del mismo Proveedor fue Agregado");
		}else{
			cad+="<tr>";
				cad+="<td><input type='hidden' name='productos[]' value='"+idproducto+"'>"+producto+"</td>";
				cad+="<td><input type='hidden' name='cantidades[]' value='"+cantidad+"'/>"+cantidad+"</td>";
				cad+="<td><input type='hidden' name='matempcons[]' value='"+matempcons+"'/>"+matempcons+"</td>";
				cad+="<td><input type='hidden' name='bolcons[]' value='"+bolcons+"'/>"+bolcons+"</td>";
				cad+="<td><input type='hidden' name='desperdicios[]' value='"+desperdicios+"'/>"+desperdicios+"</td>";
				cad+="<td><button type='button' onclick='delrecepcion(this);'>X</button></td>";
			cad+="</tr>";
			getElement("contenedor_despacho").innerHTML += cad;
		}
	}else{
		alert("Todos los campos son Obligatorios");
	}

	getElement("txtproducto").value = "";
	getElement("txtcantidad").value = "";
	getElement("txtmatempcons").value = "";
	getElement("txtbolcon").value = "";
	getElement("txtdesperdicios").value = "";
}

function getchecked(e){
	if(e.value == "PT"){
		$("#col1, #col2").hide();
	}else{
		$("#col1, #col2").show();
	}
}

$(function() {
	$( ".fecha_formateada" ).datepicker({
		dateFormat : 'dd/mm/yy',
		changeYear : true,
		changeMonth : true,
		maxDate : '@maxDate'
	});
});