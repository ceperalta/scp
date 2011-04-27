<?php
	include("../../configuracion/configuracion.php");
	include("../../funciones/funciones.php");

	if(isset($_GET[idoper]))
	{
		$nuevo_id = $_GET[idoper];
		$sql = "select * from pediuno,clientes,proveedores where pediuno.codcli=clientes.codcli and pediuno.codpro=proveedores.codpro and OPERACION = ".$_GET[idoper];
		$res = ejecutar_sql($sql);		
		$reg = mysql_fetch_array($res);
		
		$fP = split("-",$reg[FECHAOP]);
		$a = $fP[0];
		$m = $fP[1];
		$d = $fP[2];
		$fecha_lista = $d."/".$m."/".$a;
		
		$fP = split("-",$reg[FECHAFL]);
		$a = $fP[0];
		$m = $fP[1];
		$d = $fP[2];
		$fechafl_lista = $d."/".$m."/".$a;
		
		$cliente_listo = $reg[CLIENTE]." --- ".$reg[CODCLI];
		$proveedor_listo = $reg[PROVEEDOR]." --- ".$reg[CODPRO];
		
		ejecutar_sql("truncate table pedi002_tmp");
		
		$res_tmp = ejecutar_sql("select * from pedi002 where OPERACION = ".$_GET[idoper]);

		$iva_acu = 0;
		$subtotal_acu = 0; 

		while($reg_tmp = mysql_fetch_array($res_tmp))
		{
			$iva_acu += ($reg_tmp[IMPORTE]*$_SESSION[configuracion][IVA])/100;
			$subtotal_acu += $reg_tmp[IMPORTE]; 
		
			$sql = "insert into pedi002_tmp (CANTIDAD, ENPAQUE,DETALLE,UNITARIO,DESCUENTO,IMPORTE) values (".$reg_tmp[CANTIDAD].",".$reg_tmp[ENPAQUE].",'".$reg_tmp['DETALLE']."',".$reg_tmp[UNITARIO].",".($reg_tmp[DESCUENTO]?$reg_tmp[DESCUENTO]:0).",".$reg_tmp[IMPORTE].")";
			ejecutar_sql($sql);
		}
		
		
		echo "
				<script language='javascript'>
					parent.detalle.location.href = \"../detalles/op_nueva.php\";
				</script>
			
			";
		
	}
	else
	{
		//Vaciamos la tabla temportal
		ejecutar_sql("truncate table pedi002_tmp");
	
		$res = ejecutar_sql("select max(operacion) as ultimo_id from pediuno");
		$reg = mysql_fetch_array($res);
		$nuevo_id = $reg[ultimo_id] + 1;
	}
	
	echo "Operación <b>".$nuevo_id."</b><hr>";
	
?>
<html>
<body>

<script type="text/javascript" src="../../librerias/jquery-1.3.2.min.js"></script>
<script type='text/javascript' src='../../librerias/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../../librerias/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../../librerias/datepicker/jquery.datepick.css" />
<script type='text/javascript' src='../../librerias/datepicker/jquery.datepick.pack.js'></script>
<script type="text/javascript">
$.datepick.setDefaults($.datepick.regional['es']);
</script>

<form id="formu" name="formu">

<table>
<?
	echo "<input type='hidden' id='codop' name='codop' value='".$nuevo_id."'/>";
	
	if(isset($_GET[idoper]))
		echo "<input type='hidden' id='esmod' name='esmod' value='s'/>";
	else
		echo "<input type='hidden' id='esmod' name='esmod' value='n'/>";
	
	echo "<tr><td>Fecha</td><td><input type='text' size='10' maxlength='10' id='fechaop' name='fechaop' value='".$fecha_lista."'/></td></tr>";
	
?>

<?
	echo "<tr><td>Cliente</td><td><input type='text' id='cliente' size='100' value='".$cliente_listo."'></td></tr>";
?>

<script language="javascript">
	$("#cliente").autocomplete("../../funciones/clientes_ajax.php", {minChars:1,cacheLength:1,matchContains: 1,autoFill:false,delay:100});
</script>


<?
	echo "<tr><td>Proveedor</td><td><input type='text' id='proveedor' size='100'  value='".$proveedor_listo."'></td></tr>";
	echo "<tr><td>Flete</td><td><input type='text' name='flete' id='flete' size='70' maxlength='254'  value='".$reg[FLETE]."'>
	&nbsp;&nbsp; Fecha <input type='text' size='10' maxlength='10' id='fechaflete' name='fechaflete' value='".$fechafl_lista."'/></td></tr>
	<tr><td>Notas</td><td><textarea id='notas' name='notas' cols='77'>".$reg[notas]."</textarea></td></tr>
	";
?>
</table>
<br/>
<table border="1" cellpadding="4" cellspacing="2">
<tr><th>cantidad</th><th>empaque</th><th>detalle</th><th>precio unitario</th><th>descuento(%)</th></tr>
<tr>
<?
	echo "<td align='center' valign='middle'><input type='text' size='9' name='cantidad' id='cantidad'></td>";
	echo "<td align='center' valign='middle'><input type='text' size='9' name='empaque' id='empaque'></td>";
	echo "<td align='center' valign='middle'><a href='javascript:traerLista();' title='Traer listado de productos'>traer productos</a><div id='lista_productos'></div></td>";
	echo "<td align='center' valign='middle'><input type='text' size='9' name='pu' id='pu'></td>";
	echo "<td align='center' valign='middle'><input type='text' size='9' name='descuento' id='descuento'></td>";

	
?>
</tr>
</table>

<a href='javascript:agregarDetalle();'>agregar</a>&nbsp;&nbsp;&nbsp;&nbsp;iva <b><span id="iva"></span></b>&nbsp;|&nbsp;subtotal <b><span id="subtotal"></span></b>&nbsp;|&nbsp;total <b><span id="total"></span></b>


</form>


<script language="javascript">
	
	function traerLista()
	{
		var proveedor = $('#proveedor').val().split('---');
		//trim
		var codp = proveedor[1].replace(/^\s+|\s+$/g, '');

		
		$.post('../../funciones/listado_prod_prove_ajax.php',{codpro:codp},
	
			function(datos)
			{
				if(datos=='NO')
				{
					alert("No existe el código del proveedor");
				}
				else
				{
					$('#lista_productos').html(datos);
				}
			}
	    );
		
	}
	
	$("#proveedor").autocomplete("../../funciones/proveedores_ajax.php", { minChars:1,cacheLength:1,matchContains: 1,autoFill:false,delay:100});
	
	
	function completaEmpPrecio()
	{
		var partes = formu.listprods.value.split('#');
		
		if(partes[0]=='')
			var enpaque = 0;
		else
			var enpaque = partes[0];
			
		if(partes[1]=='')
			var precio = 0;
		else
			var precio = partes[1];
		
		
		if(partes[2]=='')
			var descuento = 0;
		else
			var descuento = partes[2];
			
		formu.empaque.value = enpaque;
		formu.pu.value = precio;
		formu.descuento.value = descuento;
	}
	
	var total_var=0;
	var iva_var=0;
	var subtotal_var=0;
	
	
	function agregarDetalle()
	{	
			
		if(IsNumeric(formu.cantidad.value) && IsNumeric(formu.empaque.value) && IsNumeric(formu.pu.value) && IsNumeric(formu.descuento.value) && formu.cantidad.value!="" && formu.empaque.value!="" && formu.pu.value!="" && formu.descuento.value!="")
		{
			$.post('../../funciones/agrega_detalle_op_nueva.php.php',{cantidad:formu.cantidad.value,
			empaque:formu.empaque.value,
			listprods:formu.listprods.value,
			pu:formu.pu.value,
			descuento:formu.descuento.value},
	
			function(datos)
			{
				iva_var += parseFloat(datos)*0.<? echo $_SESSION[configuracion][IVA];?>;
				subtotal_var += parseFloat(datos);
			
				total_var = (iva_var+subtotal_var);
			
				iva_var = roundNumber(iva_var,3);
				subtotal_var = roundNumber(subtotal_var,3);
				total_var = roundNumber(total_var,3);
			
				muestra_vars();
				parent.detalle.location.href = "../detalles/op_nueva.php";
			}
	    );
		
			formu.listprods.selectedIndex = 0;
			formu.cantidad.value = "";
			formu.empaque.value = "";
			formu.listprods.value = "";
			formu.pu.value = "";
			formu.descuento.value = "";
		}
		else
		{
			alert("Algunos de los valores que deberían ser números no lo son.");
			return;
		}
		
	}
	
	function IsNumeric(sText)
	{
	   var ValidChars = "0123456789.";
	   var IsNumber=true;
	   var Char;
	
	 
	   for (i = 0; i < sText.length && IsNumber == true; i++) 
		  { 
		  Char = sText.charAt(i); 
		  if (ValidChars.indexOf(Char) == -1) 
			 {
			 IsNumber = false;
			 }
		  }
	   return IsNumber;
   }

	
	function muestra_vars()
	{
		$('#total').html(total_var);
		$('#iva').html(iva_var);
		$('#subtotal').html(subtotal_var);
	}
	
	function roundNumber(rnum, rlength) { // Arguments: number to round, number of decimal places
 		 var newnumber = Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength);
		 return newnumber; // Output the result to the form field (change for your purposes)
	}
	
	$(document).ready(function(){
		$('#fechaop').datepick({ dateFormat: 'dd/mm/yy' });
		$('#fechaflete').datepick({ dateFormat: 'dd/mm/yy' });
  	});

	
</script>

<?php

if(isset($_GET[idoper]))
{
		echo "
			   <script language='javascript'>					
					total_var = ".($iva_acu + $subtotal_acu).";
					iva_var = roundNumber(".$iva_acu.",3);
					subtotal_var = roundNumber(".$subtotal_acu.",3);
					total_var = roundNumber(total_var,3);
			
					muestra_vars();
					
					traerLista();
					
				</script>
			
			";
}
?>

</body></html>