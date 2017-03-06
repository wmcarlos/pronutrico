        </div>
   </div>
   <!--Pie de Pagina-->
   <div id="pie">
                <p id="contenido_pie">
					Calle San Felipe entre avenidas Libertador y Miranda Frente a la Plaza Bolivar Sarare Estado Lara<br />
					 <a href="#">Codigo Postal: 3015</a><br />
           <a href="#">Telefonos: 0251-9921112</a><br />
                </p>
   </div>
</div>
<script type="text/javascript">
  var arrelement = document.getElementsByTagName("a");
  var total = arrelement.length;
  for(var i = 0; i < total; i++){
    switch(arrelement[i].getAttribute("href")){
      case "vistaReporte_recepciones.php":
        arrelement[i].setAttribute("target","_blank");
      break;
      case "vistaReporte_despachos.php":
        arrelement[i].setAttribute("target","_blank");
      break;
    }
  }
</script>
</body>
</html>