<?
	include("../../configuracion/configuracion.php");
	include("../../funciones/funciones.php");
	
	echo "<div id='registro_guardado' style='display: none;'><center><span style='background-color:#FFFF00; color:#FF0000'>Operación guardada.</span></center></div>";
	
	echo "<li><a href='javascript:guardar();'>guardar</a></li><br/>";
	echo "<li><a href='javascript:nueva();'>nueva operación</a></li>";	
?>

<script type="text/javascript" src="../../librerias/jquery-1.3.2.min.js"></script>
<script language="javascript">


function nueva()
{
		parent.listado.location.href = "../listados/op_nueva.php";
		parent.detalle.location.href = "../detalles/op_nueva.php?s=vacio";
}


function guardar()
{
	valida();
}


function todo_listo_guardar()
{
	var cod_op = parent.listado.document.getElementById('formu').codop.value;
	
	$.get("../../funciones/funciones_ajax.php", { llama_ajax: "guarda_prods_en_temporal_nueva_op", cod_cliente: cod_cliente,
	cod_proveedor:cod_proveedor,cod_op:cod_op
	 },
			  function(data){
			    				
 		      } 
	 );
	 
	 var fechaflete = parent.listado.document.getElementById('formu').fechaflete.value;
	 var flete = parent.listado.document.getElementById('formu').flete.value;
	 var notas = parent.listado.document.getElementById('formu').notas.value;
	 var fechaop = parent.listado.document.getElementById('formu').fechaop.value;
	 var esmod = parent.listado.document.getElementById('formu').esmod.value;
	
	 
	
	 
	  
	 $.get("../../funciones/funciones_ajax.php", { llama_ajax: "guarda_nueva_op", cod_cliente: cod_cliente,
	cod_proveedor:cod_proveedor,cod_op:cod_op,fechaflete:fechaflete,flete:flete,notas:notas,fechaop:fechaop,esmod:esmod
	 },
			  function(data){
			  		$("#registro_guardado").fadeIn("slow").animate({opacity: 1.0}, 1600).fadeOut("slow");  	
 		      } 
	 ); 
	  
}

var cod_cliente = "";
var cod_proveedor = "";

function valida()
{
	var fecha_op = parent.listado.document.getElementById('formu').fechaop.value;
	if(!Validar(fecha_op))
		return false;
		
	valida_prods_cli_pro();
			
}

function valida_prods_cli_pro()
{
	cod_cliente = parent.listado.document.getElementById('formu').cliente.value;

	if(cod_cliente.length < 3)
	{
		alert("El código de cliente no es válido.");
		return false;
	}
		
	cod_cliente = cod_cliente.split("---")[1];
	cod_cliente = trim(cod_cliente);
	
	
	cod_proveedor = parent.listado.document.getElementById('formu').proveedor.value;
	if(cod_proveedor.length < 3)
	{
		alert("El código de proveedor no es válido.");
		return false;
	}
	cod_proveedor = cod_proveedor.split("---")[1];
	cod_proveedor = trim(cod_proveedor);
		
	
	var cod_op = parent.listado.document.getElementById('formu').codop.value;

	$.get("../../funciones/funciones_ajax.php", { llama_ajax: "valida_prods_cli_pro",cod_proveedor:cod_proveedor,cod_cliente:cod_cliente,cod_op:cod_op},
			  function(data){
			    data=trim(data);
				if(data=="todook")
				{
					todo_listo_guardar();
				}
				else
				{
					alert(data);
				}
				
 		      } 
			);
}



 function Validar(Cadena){  
     var Fecha= new String(Cadena)   // Crea un string  
     var RealFecha= new Date()   // Para sacar la fecha de hoy  
     // Cadena Año  
     var Ano= new String(Fecha.substring(Fecha.lastIndexOf("/")+1,Fecha.length))  
     // Cadena Mes  
     var Mes= new String(Fecha.substring(Fecha.indexOf("/")+1,Fecha.lastIndexOf("/")))  
     // Cadena Día  
     var Dia= new String(Fecha.substring(0,Fecha.indexOf("/")))  
   
     // Valido el año  
     if (isNaN(Ano) || Ano.length<4 || parseFloat(Ano)<1900){  
             alert('Fecha operación: Año inválido')  
         return false  
     }  
     // Valido el Mes  
     if (isNaN(Mes) || parseFloat(Mes)<1 || parseFloat(Mes)>12){  
         alert('Fecha operación: Mes inválido')  
         return false  
     }  
     // Valido el Dia  
     if (isNaN(Dia) || parseInt(Dia, 10)<1 || parseInt(Dia, 10)>31){  
         alert('Fecha operación: Día inválido')  
         return false  
     }  
     if (Mes==4 || Mes==6 || Mes==9 || Mes==11 || Mes==2) {  
         if (Mes==2 && Dia > 28 || Dia>30) {  
             alert('Fecha operación: Día inválido')  
             return false  
         }  
     }  
       
   return true;    
 }  



function trim(str, chars) {
	return ltrim(rtrim(str, chars), chars);
}
 
function ltrim(str, chars) {
	chars = chars || "\\s";
	return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}
 
function rtrim(str, chars) {
	chars = chars || "\\s";
	return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}

</script>

