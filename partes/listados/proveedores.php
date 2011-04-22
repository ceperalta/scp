<?  session_start(); ?>
<?
	include("../../configuracion/configuracion.php");
	include("../../funciones/funciones.php");
	
	if(isset($_GET[b]))
		$sql = "select *, CODPRO as cod from proveedores  where CODPRO like '%".$_GET[b]."%' or
		   PROVEEDOR like '%".$_GET[b]."%' or
		   pg like '%".$_GET[b]."%' order by CODPRO asc";
	else
		$sql = "select *,CODPRO as cod from proveedores order by CODPRO asc";
	
	$res = ejecutar_sql($sql);
	
	echo "<table>";
	echo "<tr bgcolor='#67C6E4'> <th>Código</th><th>Productos</th><th>Proveedor</th> <th>Productos Generales</th></tr>";
	
	$cont_color = 0;
	
	while($reg=mysql_fetch_array($res))
	{
		
		($cont_color & 1) ? $color='#F5F5F5' : $color='#FFFFFF';
		$cont_color++;
	
		echo "<tr bgcolor='".$color."'> <td><a href='javascript:detalle(\"".$reg[cod]."\");'>".$reg[cod]."</a></td> <td><a href='javascript:ver_productos(\"".$reg[cod]."\",\"".$reg[PROVEEDOR]."\");'>productos</a></td> <td>".htmlspecialchars(($reg[PROVEEDOR] ? $reg[PROVEEDOR]:" - "))."</td><td>".htmlspecialchars(($reg[pg] ? $reg[pg]:" - "))."</td></tr>";
		 
	
	}
	echo "</table>";
	
?>

<script language="javascript">
	function detalle(cod)
	{
		parent.detalle.location.href = "../detalles/proveedores.php?cod=" + cod;
	}
    
    function ver_productos(cod,proveedor)
	{
		parent.detalle.location.href = "../detalles/proveedores.php?ver_prod_cod=" + cod + "&prov=" + proveedor;
	}
    
</script>