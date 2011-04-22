<?  session_start(); ?>
<?
	include("../../configuracion/configuracion.php");
	include("../../funciones/funciones.php");
	
	if(isset($_GET[b]))
		$sql = "select *, CODCLI as cod from clientes  where codcli like '%".$_GET[b]."%' or
		   CLIENTE like '%".$_GET[b]."%' or
		   SUPERMER like '%".$_GET[b]."%' or
		   TITULAR like '%".$_GET[b]."%' or
		   GERENTE like '%".$_GET[b]."%' order by CODCLI asc";
	else
		$sql = "select *, CODCLI as cod from clientes order by CODCLI asc";
	
	$res = ejecutar_sql($sql);
	
	echo "<table  >";
	echo "<tr bgcolor='#67C6E4'> <th>Código</th> <th>Cliente</th> <th>Supermer</th> <th>Titular</th> <th>Gerente</th></tr>";
	
	$cont_color = 0;
	
	while($reg=mysql_fetch_array($res))
	{
		($cont_color & 1) ? $color='#F5F5F5' : $color='#FFFFFF';
		$cont_color++;
	
		echo "<tr bgcolor='".$color."'> <td><a href='javascript:detalle(\"".$reg[cod]."\");'>".$reg[cod]."</a></td> <td>".htmlspecialchars(($reg[CLIENTE] ? $reg[CLIENTE]:" - "))."</td> <td>".htmlspecialchars(($reg[SUPERMER] ? $reg[SUPERMER]:" - "))."</td><td>".htmlspecialchars(($reg[TITULAR] ? $reg[TITULAR]:" - "))."</td>		<td>".htmlspecialchars(($reg[GERENTE] ? $reg[GERENTE]:" - "))."</td> 
		  </tr>";
		 /* 
		 $sql2 = "insert into clientes (CODCLI, clientes.AGENTE_P, clientes.AGENTE_R, clientes.AUTO_TEL, clientes.C_POSTAL, clientes.CLIENTE, clientes.CUIT,
clientes.DIRECC_G, clientes.DIRECC_T, clientes.DIRECCION, clientes.GANANCIAS, clientes.GERENTE, clientes.INGRESOS_B, clientes.NOTAS,
clientes.POSTAL_G, clientes.POSTAL_T, clientes.PROVINCIA,  clientes.SECRETARIA, clientes.SUPERMER, clientes.TELE_FAX,
clientes.TELE_MAN, clientes.TELEFONOS, clientes.TELPART_G, clientes.TELPART_T, clientes.TITULAR) values
( '".$reg[cod]."', '".$reg[AGENTE_P]."', '".$reg[AGENTE_R]."', '".$reg[AUTO_TEL]."', '".$reg[C_POSTAL]."', '".$reg[CLIENTE]."', '".$reg[CUIT]."',
'".$reg[DIRECC_G]."', '".$reg[DIRECC_T]."', '".$reg[DIRECCION]."', '".$reg[GANANCIAS]."', '".$reg[GERENTE]."', '".$reg[INGRESOS_B]."', '".$reg[NOTAS]."',
'".$reg[POSTAL_G]."', '".$reg[POSTAL_T]."', '".$reg[PROVINCIA]."',  '".$reg[SECRETARIA]."', '".$reg[SUPERMER]."', '".$reg[TELE_FAX]."',
'".$reg[TELE_MAN]."', '".$reg[TELEFONOS]."', '".$reg[TELPART_G]."', '".$reg[TELPART_T]."', '".$reg[TITULAR]."')";
		
		ejecutar_sql($sql2); 
		*/
	}
	echo "</table>";
	
?>

<script>
	function detalle(cod)
	{
		parent.detalle.location.href = "../detalles/clientes.php?cod=" + cod;
	}
</script>