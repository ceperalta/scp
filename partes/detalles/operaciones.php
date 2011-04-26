<?  session_start(); ?>
<?
	include("../../configuracion/configuracion.php");
	include("../../funciones/funciones.php");


	if( !isset($_GET[op]) )
	{
		echo "operaciones :: informe";
		exit();
	}		
	
	
	$res = ejecutar_sql("select pediuno.notas as notas_listas,cliente, proveedor, fecha, concat(resum0,' ',resum1,' ',resum2) as pie, fechafl,direcc_t from pediuno,clientes,proveedores,listpre0 where pediuno.CODCLI = clientes.CODCLI and pediuno.CODPRO = proveedores.CODPRO and pediuno.CODPRO = listpre0.CODPRO and pediuno.OPERACION = ".$_GET[op]);
	
			
	$reg = mysql_fetch_array($res);
	
	$aP = split("-",$reg[fecha]);
	$fecha_vig_lista = $aP[2]."/".$aP[1]."/".$aP[0];
	
	$aP = split("-",$reg[fechafl]);
	$fecha_posible_entrega = $aP[2]."/".$aP[1]."/".$aP[0];
	
	$salida = "";
	
	$salida .= "Nro. de operación: ".$_GET[op]."\n
===================================================================
Comprador: ".$reg[cliente]."
Nro. de pedido del comprador: 
Proveedor: ".$reg[proveedor]."
Pie de lista de precios: ".$reg[pie]."
Vigencia de la lista de precios: ".$fecha_vig_lista."
Fecha de posible entrega: ".$fecha_posible_entrega."
Lugar de entrega: ".$reg[direcc_t]."
Notas: ".$reg[notas_listas]."
=================================================================== \n\n
";


	$res = ejecutar_sql("select * from pedi002 where operacion=".$_GET[op]);
	$sum_importes = 0;
	$sum_bultos = 0;
	
	while($reg = mysql_fetch_array($res))
	{
		$salida .= "Producto: ".$reg["DETALLE"]."\n===================================================================\n";
		$salida .= "(1) Cantidad:".$reg["CANTIDAD"]."\n";
		$salida .= "(2) Empaque:".$reg["ENPAQUE"]."\n";
		$salida .= "(3) Costo: $".str_replace(".",",",$reg["UNITARIO"])."\n";
		$salida .= "(4) Importe (1) x (2) x (3) = $".str_replace(".",",",$reg["IMPORTE"])."\n";
		$salida .= "\n";
		$sum_importes += $reg["IMPORTE"];
		$sum_bultos += $reg["CANTIDAD"];
	}

	$salida .= "\n===================================================================\n";
	$salida .= "(a) Subtotal - Sumatoria de importes = $".str_replace(".",",",$sum_importes)."\n";
	$iva = ($sum_importes * IVA)/100;
	$salida .= ">> IVA 21% sobre (a) = $".str_replace(".",",",$iva)."\n";
	$salida .= ">> Total a pagar - Sumatoria items anteriores = $".str_replace(".",",",$iva+$sum_importes)."\n";
	$salida .= ">> Total de bultos - Sumatoria de (1) = ".str_replace(".",",",$sum_bultos)."\n";
	$salida .= "===================================================================\n";
	
	echo "<center><input type='button' value='Seleccionar todo' onClick='javascript:elform.informe_oper.select();'> (Ctrl+c copia - Ctrl+v pega)</center><br/>";
	
	echo '<center><form id="elform"><input type="hidden" value="'.$_GET[op].'" id="idoper"><textarea id="informe_oper" cols="80" rows="15">'.$salida.'</textarea></form></center>';	
	
?>

