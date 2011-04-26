<?  session_start(); ?>
<html>
<head>
<script type="text/javascript" src="../../librerias/jquery-1.3.2.min.js"></script>
<script type='text/javascript' src='../../librerias/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../../librerias/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../../librerias/datepicker/jquery.datepick.css" />
<script type='text/javascript' src='../../librerias/datepicker/jquery.datepick.pack.js'></script>
<script language="javascript">
var pag_actual = 0;
var puede_paginar = true;


var fechainicial = -1;
var fechafinal = -1;
var cliente = -1;
var proveedor = -1;
var pg = -1;

<?
include("../../configuracion/configuracion.php");
include("../../funciones/funciones.php");

echo "var tam_pag=".TAMANIO_PAGINA_OPERACIONES.";";
?>
$(document).ready(
	function(){
		$.datepick.setDefaults($.datepick.regional['es']);
		$('#fechainicial').datepick({ dateFormat: 'dd/mm/yy' });
		$('#fechafinal').datepick({ dateFormat: 'dd/mm/yy' });
		$("#cliente").autocomplete("../../funciones/clientes_ajax.php", {minChars:1,cacheLength:1,matchContains: 1,autoFill:false,delay:100});
		$("#proveedor").autocomplete("../../funciones/proveedores_ajax.php", { minChars:1,cacheLength:1,matchContains: 1,autoFill:false,delay:100});
		traer_pagina_actual();
	}
);


function traer_pagina_actual()
{
	
	if($("#fechainicial").val()!="")
		fechainicial = $("#fechainicial").val();
	else
		fechainicial = -1;
		
	if($("#fechafinal").val()!="")
		fechafinal = $("#fechafinal").val();
	else
		fechafinal = -1;
	
	if($("#cliente").val()!="")
		cliente = $("#cliente").val();
	else
		cliente = -1;
	
	if($("#proveedor").val()!="")
		proveedor = $("#proveedor").val();
	else
		proveedor = -1;
	
	if($("#pg").val()!="")
		pg = $("#pg").val();
	else
		pg = -1;
	
	
	$.post("../../funciones/listado_operaciones_ajax.php", {fechainicial:fechainicial,fechafinal:fechafinal,cliente:cliente,proveedor:proveedor,pg:pg,pag_actual:pag_actual},
			  function(data){
	  			     
			  		 var aP = data.split("####");
					 total =  aP[0];
					 pinta_nros_paginacion();
					 parent.listado.document.getElementById('listado').innerHTML = aP[1];
					 
					 puede_paginar = true;
 		      } 
	 );			
}



function borrar_filtro()
{
	pag_actual = 0;
	al = tam_pag;

	$("#fechainicial").val('');
	fechainicial = -1;
	$("#fechafinal").val('');
	fechafinal = -1;
	$("#cliente").val('');
	cliente = -1;
	$("#proveedor").val('');
	proveedor = -1;
	$("#pg").val('');
	pg = -1;
	
	traer_pagina_actual();
}


function pinta_nros_paginacion()
{
	var al = 0;
	
	if(total==-1)
	{
		$("#adelante").hide();
		$("#paginacion_info").html("Sin resultados");
		return;
	}

	if((pag_actual+tam_pag)>total)
	{
		$("#adelante").hide();
		al = total;
	}
	else if(pag_actual==0 || (pag_actual+tam_pag)<total)
	{
		$("#adelante").show();
		al = (pag_actual+tam_pag);
	}
	else
	{
		$("#adelante").hide();
		al = total;
	}	
		
	if(pag_actual-tam_pag>0 || pag_actual-tam_pag==0)
		$("#atras").show();
	else
		$("#atras").hide();

	$("#paginacion_info").html((pag_actual+1) + " a la " + al + " de " + total);
}



function atras()
{
	if(puede_paginar)
	{
		pag_actual -= tam_pag;
		traer_pagina_actual();
		puede_paginar = false;
	}
}
function adelante()
{
	if(puede_paginar)
	{
		pag_actual += tam_pag;
		traer_pagina_actual();
		puede_paginar = false;
	}
}


function modificar()
{
	var idoper = parent.detalle.document.getElementById('elform').idoper.value;
	
	parent.document.getElementById('listado_detalle').rows = '60%,40%';
	parent.listado.location.href = "../listados/op_nueva.php?idoper="+idoper;
	parent.opciones.location.href = "../opciones/op_nueva.php?idoper="+idoper;
	parent.detalle.location.href = "../detalles/op_nueva.php?idoper="+idoper;
	parent.menu.location.href = "../menu.php?s=op_nueva";
}


</script>
</head>
<body topmargin="0">
<center>
<div id='paginacion_info' style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#996633; font-style:oblique; font-weight:bolder;"></div>
<input type="button" value="<" id="atras" style="display:none;" onclick='atras();' >&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=">" id="adelante" style="display:none;" onclick='adelante();'>
<hr/>
<a href="#">Borrar</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:modificar();">Modificar</a>
<hr>
<div id="filtrar">
	Rango de fechas<br/>
    <input type="text" id="fechainicial" size="8" />&nbsp;&nbsp;<input type="text" id="fechafinal" size="8" /><br />
    Cliente<br/><input type="text" id="cliente" /><br/>
    Proveedor<br/><input type="text" id="proveedor" /><br />
    Producto general<br/><input type="text" id="pg" /><br/><br/>
    <input type="button" onClick="borrar_filtro();" value="Borrar filtro">&nbsp;&nbsp;&nbsp;<input type="submit" onClick="traer_pagina_actual();" value="Filtrar">
</div>
</center>
</body></html>

