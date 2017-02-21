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
f[0].disabled = true;
f[1].focus();
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

function delreception(e){

	var td = e.parentNode;
	var tr = td.parentNode;
	var tbody = tr.parentNode;
	tbody.removeChild(tr);
}

function addreception(){
	var content = document.getElementById("detail_content");
	var codtrans = document.getElementById("txttransporte").value;
	var texttrans = document.getElementById("txttransporte").options[document.getElementById("txttransporte").selectedIndex].text;
	var cedchofer = document.getElementById("txtchofer").value;
	var textchofer = document.getElementById("txtchofer").options[document.getElementById("txttransporte").selectedIndex].text;
	var placa = document.getElementById("txtplaca").value;
	var codproducto = document.getElementById("txtproducto").value;
	var textproducto = document.getElementById("txtproducto").options[document.getElementById("txtproducto").selectedIndex].text;
	var cantidad = document.getElementById("txtcantidad").value;

	var string = "";
		string+="<tr>";
			string+="<td><input type='hidden' name='transporte[]' value='"+codtrans+"'>"+texttrans+"</td>";
			string+="<td><input type='hidden' name='chofer[]' value='"+cedchofer+"'>"+textchofer+"</td>";
			string+="<td><input type='hidden' name='placa[]' value='"+placa+"'>"+placa+"</td>";
			string+="<td><input type='hidden' name='producto[]' value='"+codproducto+"'>"+textproducto+"</td>";
			string+="<td><input type='hidden' name='cantidad[]' value='"+cantidad+"'>"+cantidad+"</td>";
			string+="<td><button type='button' onclick='delreception(this)'>x</button></td>";
		string+="</tr>";
	content.innerHTML+=string;

	document.getElementById("txttransporte").value = '';
	document.getElementById("txtchofer").value = '';
	document.getElementById("txtplaca").value = '';
	document.getElementById("txtproducto").value = '';
	document.getElementById("txtcantidad").value = '';

}

$(function() {
	$( ".fecha_formateada" ).datepicker({
		dateFormat : 'dd/mm/yy'
	});
});