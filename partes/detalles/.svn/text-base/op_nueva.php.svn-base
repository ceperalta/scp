<?
	include("../../configuracion/configuracion.php");
	include("../../funciones/funciones.php");
	
	if(isset($_POST[id]))
	{
		ejecutar_sql("delete from pedi002_tmp where id=".$_POST[id]);
		$res = ejecutar_sql("select sum(importe) as total from pedi002_tmp");
		$reg = mysql_fetch_array($res);
		$iva = round(($reg[total] * 0.21),3);
		$totalimp = $reg[total]+$iva;
		
		if(is_numeric($reg[total]))
			$sub = $reg[total];
		else
			$sub = 0;
		
		echo $iva."#".$sub."#".$totalimp;
		exit();	
	}

?>


<?
	
	
	if(isset($_GET[s]) && isset($_GET[s])=='s')
		ejecutar_sql("truncate table pedi002_tmp");
	
	$res = ejecutar_sql("select * from pedi002_tmp");
	if(mysql_num_rows($res)==0)
	{
		echo "Operación nueva :: detalle";
		exit();
	}
	
	echo '<center><table cellpadding="3" cellspacing="3" border="1">';
	echo "<tr><th></th><th>cantidad</th><th>empaque</th><th>detalle</th><th>precio unitario</th><th>descuento</th><th>importe</th></tr>";
	while($reg=mysql_fetch_array($res))
	{
		echo "<tr><td><a href='javascript:eliminar(".$reg[id].",".$reg[IMPORTE].");' align='center'>eliminar</a></td><td align='center'>".$reg[CANTIDAD]."</td><td align='center'>".$reg[ENPAQUE]."</td><td align='center'>".$reg[DETALLE]."</td><td align='center'>".$reg[UNITARIO]."</td><td align='center'>".$reg[DESCUENTO]."%</td><td align='center'>".$reg[IMPORTE]."</td></tr>";
	}
	echo "</table></center>";
	
?>
<script type="text/javascript" src="../../librerias/jquery-1.3.2.min.js"></script>
<script language="javascript">
	
	function eliminar(id,importe)
	{
		$.post('op_nueva.php',{id:id,importe:importe},
	
			function(datos)
			{
				
				aPartes = datos.split("#");
				
				parent.listado.iva_var = parseFloat(aPartes[0]);
				parent.listado.subtotal_var = parseFloat(aPartes[1]);
				parent.listado.total_var = parseFloat(aPartes[2]);
				
				parent.listado.muestra_vars();
			
			
				parent.detalle.location.href = "../detalles/op_nueva.php";
			}
	    );
		
	}
	
	function roundNumber(rnum, rlength) { // Arguments: number to round, number of decimal places
 		 var newnumber = Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength);
		 return newnumber; // Output the result to the form field (change for your purposes)
	}
</script>