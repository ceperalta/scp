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
	
	$salida .= "Nro. de operación: ".$_GET[op]."\r\n
===================================================================
Comprador: ".$reg[cliente]."
Nro. de pedido del comprador: 
Proveedor: ".$reg[proveedor]."
Pie de lista de precios: ".$reg[pie]."
Vigencia de la lista de precios: ".$fecha_vig_lista."
Fecha de posible entrega: ".$fecha_posible_entrega."
Lugar de entrega: ".$reg[direcc_t]."
Notas: ".$reg[notas_listas]."
=================================================================== \r\n\r\n
";


	$res = ejecutar_sql("select * from pedi002 where operacion=".$_GET[op]);
	$sum_importes = 0;
	$sum_bultos = 0;
	
	while($reg = mysql_fetch_array($res))
	{
		$salida .= "Producto: ".$reg["DETALLE"]."\r\n===================================================================\r\n";
		$salida .= "(1) Cantidad:".$reg["CANTIDAD"]."\r\n";
		$salida .= "(2) Empaque:".$reg["ENPAQUE"]."\r\n";
		$salida .= "(3) Costo: $".str_replace(".",",",$reg["UNITARIO"])."\r\n";
		$salida .= "(4) Importe (1) x (2) x (3) = $".str_replace(".",",",$reg["IMPORTE"])."\r\n";
		$salida .= "\r\n";
		$sum_importes += $reg["IMPORTE"];
		$sum_bultos += $reg["CANTIDAD"];
	}

	$salida .= "\n===================================================================\r\n";
	$salida .= "(a) Subtotal - Sumatoria de importes = $".str_replace(".",",",$sum_importes)."\r\n";
	$iva = ($sum_importes * $_SESSION[configuracion][IVA])/100;
	$salida .= ">> IVA 21% sobre (a) = $".str_replace(".",",",$iva)."\r\n";
	$salida .= ">> Total a pagar - Sumatoria items anteriores = $".str_replace(".",",",$iva+$sum_importes)."\r\n";
	$salida .= ">> Total de bultos - Sumatoria de (1) = ".str_replace(".",",",$sum_bultos)."\r\n";
	$salida .= "===================================================================\r\n";
	
	
	foreach (glob($_SESSION[configuracion][PATH_BASE_FS]."\\temporal\\op-*.txt") as $filename) 
		unlink($filename);
	
	$myFile = $_SESSION[configuracion][PATH_BASE_FS]."\\temporal\\op-".$_GET[op].".txt";
	$fh = fopen($myFile, 'w') or die("can't open file");
	fwrite($fh, $salida);
	fclose($fh);
	
	

	$aP = explode("/",$_SERVER[PHP_SELF]);
	$url_base = "http://".$_SERVER['SERVER_NAME']."/".$aP[1]."/";

	
	
	echo "<center>Clic derecho, Guardar enlace como: <a href='".$url_base."temporal/op-".$_GET[op].".txt'>op-".$_GET[op].".txt<a> | <input type='button' value='Seleccionar todo' onClick='javascript:elform.informe_oper.select();'> (Ctrl+c copia - Ctrl+v pega)</center><br/>";
	
	echo '<center><form id="elform"><input type="hidden" value="'.$_GET[op].'" id="idoper"><textarea id="informe_oper" cols="80" rows="15">'.$salida.'</textarea></form></center>';	
	
?>

