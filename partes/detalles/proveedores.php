<?  session_start(); ?>
<?
	include("../../configuracion/configuracion.php");
	include("../../funciones/funciones.php");
	
	if($_GET[a]=='eliminar')
	{
		$sql = "delete from listpre1 where CODPRO='".$_GET[ver_prod_cod]."' and DETALLE='".$_GET[detalle]."'";
		ejecutar_sql($sql);
	}
	
	if(isset($_POST[nuevo_reg]))
	{
		$aVals = split(",",$_POST[nuevo_reg]);
		
		$sql = "insert into listpre1 (CODPRO, DETALLE, COLUM3, DESCUENTO,ENPAQUE) values ('".$_POST[codpro]."','".$aVals[0]."','".$aVals[1]."','".$aVals[2]."','".$aVals[3]."')";
		ejecutar_sql($sql);
	}
	
	if(isset($_GET[ver_prod_cod]))
	{
		$sql = "select * from listpre1 where codpro='".$_GET[ver_prod_cod]."' order by titulo asc";
		$res = ejecutar_sql($sql);
		
		echo "<b>Productos de ".$_GET[prov]."</b><br/>Nuevo (detalle,precio unitario,descuento,empaque):<form target='_self' method='post'><input type='hidden' name='codpro' value='".$_GET[ver_prod_cod]."'/><input type='text' name='nuevo_reg' size='100'/><input type='submit' value='agregar'/></form>";
		echo "<center><div style='height:180px; width:750px; overflow:scroll;'>
			<table>
			<tr bgcolor='#67C6E4'><th></th><th>Detalle</th><th>Precio unitario</th><th>Descuento</th><th>Empaque</th></tr>
		";
		
		$cont_color = 0;
		while($reg=mysql_fetch_array($res))
		{
			($cont_color & 1) ? $color='#F5F5F5' : $color='#FFFFFF';
			$cont_color++;
	
			echo "<tr bgcolor='".$color."'><td><a href='?a=eliminar&ver_prod_cod=".$_GET[ver_prod_cod]."&detalle=".$reg[DETALLE]."&prov=".$_GET[prov]."'>Eliminar</a></td><td>".$reg[DETALLE]."</td><td>".$reg[COLUM3]."</td><td>".$reg[DESCUENTO]."</td><td>".$reg[ENPAQUE]."</td></tr>";
		}
		
		echo "</table></div></center>";
	
		exit();
	}
	
	if($_GET[s]=="eliminado")
	{
		echo '<center><span style="background-color:#FFFF00; color:#FF0000">Registro eliminado.</span></center>';
		exit();
	}
	
	if($_GET[s]=="vacio")
	{
		echo "proveedores :: detalles";
		exit();
	}
	
	if( !empty($_POST[PROVEEDOR]))
	{
		if(isset($_POST[accion]) && $_POST[accion]=='agregar')
		{
			//Nuevo
			
		
			 $sql2 = "insert into proveedores (CODPRO, PROVEEDOR, pg, AUTO_TEL, TELS_F, TELFAX_F,
	DIR_F, C_POSTAL_F, TELS_O, TELFAX_O, DIR_O, C_POSTAL_O, CUIT,
	INGRESOS, AGENTE_R, AGENTE_P,  GANANCIAS, TITULAR, TEL_T,
	DIRE_T, C_POSTAL_T, GERENTE, TEL_G, DIRE_G,C_POSTAL_G, VENDEDOR, NOTAS) values
	( '".$_POST[cod]."', '".$_POST[PROVEEDOR]."', '".$_POST[pg]."', '".$_POST[AUTO_TEL]."', '".$_POST[TELS_F]."', '".$_POST[TELFAX_F]."',
	'".$_POST[DIR_F]."', '".$_POST[C_POSTAL_F]."', '".$_POST[TELS_O]."', '".$_POST[TELFAX_O]."', '".$_POST[DIR_O]."', '".$_POST[C_POSTAL_O]."', '".$_POST[CUIT]."', '".$_POST[INGRESOS]."',
	'".$_POST[AGENTE_R]."', '".$_POST[AGENTE_P]."', '".$_POST[GANANCIAS]."',  '".$_POST[TITULAR]."', '".$_POST[TEL_T]."', '".$_POST[DIRE_T]."',
	'".$_POST[C_POSTAL_T]."', '".$_POST[GERENTE]."', '".$_POST[TEL_G]."', '".$_POST[DIRE_G]."', '".$_POST[C_POSTAL_G]."', '".$_POST[VENDEDOR]."', '".$_POST[NOTAS]."')";
			
			
			
			ejecutar_sql($sql2); 
			
			
			echo '<center><span style="background-color:#FFFF00; color:#FF0000">Registro agregado.</span></center>';
			echo '<script language="javascript">
			parent.listado.location.href = "../listados/proveedores.php";
		</script>';
			exit();
		}
		else
		{
			//Modificar
			
			$sql2 = "update proveedores set PROVEEDOR='".$_POST[PROVEEDOR]."', pg='".$_POST[pg]."', AUTO_TEL='".$_POST[AUTO_TEL]."', TELS_F='".$_POST[TELS_F]."', TELFAX_F='".$_POST[TELFAX_F]."',
DIR_F='".$_POST[DIR_F]."', C_POSTAL_F='".$_POST[C_POSTAL_F]."', TELS_O='".$_POST[TELS_O]."', TELFAX_O='".$_POST[TELFAX_O]."', DIR_O='".$_POST[DIR_O]."', C_POSTAL_O='".$_POST[C_POSTAL_O]."', CUIT='".$_POST[CUIT]."',
INGRESOS='".$_POST[INGRESOS]."', AGENTE_R='".$_POST[AGENTE_R]."', AGENTE_P='".$_POST[AGENTE_P]."',  GANANCIAS='".$_POST[GANANCIAS]."', TITULAR='".$_POST[TITULAR]."', TEL_T='".$_POST[TEL_T]."',
DIRE_T='".$_POST[DIRE_T]."', C_POSTAL_T='".$_POST[C_POSTAL_T]."', GERENTE='".$_POST[GERENTE]."', TEL_G='".$_POST[TEL_G]."', DIRE_G='".$_POST[DIRE_G]."',DIRE_G='".$_POST[DIRE_G]."',C_POSTAL_G='".$_POST[C_POSTAL_G]."',VENDEDOR='".$_POST[VENDEDOR]."',NOTAS='".$_POST[NOTAS]."' where CODPRO='".$_POST[cod]."'";
			
			ejecutar_sql($sql2);
			
			echo '<center><span style="background-color:#FFFF00; color:#FF0000">Registro modificado.</span></center>';
		}
		

		echo '<script language="javascript">
			parent.listado.location.href = "../listados/proveedores.php";
		</script>';
	}
	
	
	
	
	
	echo '<form action="proveedores.php" method="post" name="formu" id="formu">';
	
	if($_GET[accion]=="agregar")
	{
		echo 'Código <input type="text" name="cod" size="4"  maxlength="4" id="cod" /><hr>';
		echo '<input type="hidden" value="agregar" name="accion">';
	}
	else
	{
		if(isset($_GET[cod]))
			$codpro = $_GET[cod];
		else
			$codpro = $_POST[cod];
	
	
		$sql = "select *, CODPRO as cod from proveedores where CODPRO='".$codpro."'";
		$res = ejecutar_sql($sql);
		$reg = mysql_fetch_array($res);
	
		echo "<b>Código: ".$reg[cod]."</b><hr>";
		echo '<input type="hidden" value="'.$codpro.'" name="cod" id="cod">';
	}
	
	echo "<table>";	
	echo '<tr><td>PROVEEDOR</td><td><input type="text" value="'.htmlspecialchars($reg[PROVEEDOR]).'" name="PROVEEDOR" id="PROVEEDOR" size="100"  maxlength="200"  /></td></tr>';
	echo '<tr><td>Productos generales</td><td><input type="text" value="'.htmlspecialchars($reg[pg]).'" name="pg" size="100"  maxlength="254"  /></td></tr>';
	
	echo '<tr><td>AUTO_TEL</td><td><input type="text" value="'.htmlspecialchars($reg[AUTO_TEL]).'" name="AUTO_TEL" size="100"  maxlength="200"  /></td></tr>';
	echo '<tr><td>TELS Fábrica</td><td><input type="text" value="'.htmlspecialchars($reg[TELS_F]).'" name="TELS_F" size="100"  maxlength="200"  /></td></tr>';
	echo '<tr><td>TELFAX Fábrica</td><td><input type="text" value="'.htmlspecialchars($reg[TELFAX_F]).'" name="TELFAX_F" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>DIR Fábrica</td><td><input type="text" value="'.htmlspecialchars($reg[DIR_F]).'" name="DIR_F" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>C.POSTAL Fábrica</td><td><input type="text" value="'.htmlspecialchars($reg[C_POSTAL_F]).'" name="C_POSTAL_F" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>TELS Oficina</td><td><input type="text" value="'.htmlspecialchars($reg[TELS_O]).'" name="TELS_O" size="100 maxlength="200"  /></td></tr>';
	echo '<tr><td>TELFAX Oficina</td><td><input type="text" value="'.htmlspecialchars($reg[TELFAX_O]).'" name="TELFAX_O" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>DIR Oficina</td><td><input type="text" value="'.htmlspecialchars($reg[DIR_O]).'" name="DIR_O" size="100" maxlength="200" /></td></tr>';
	echo '<tr><td>C.POSTAL Oficina</td><td><input type="text" value="'.htmlspecialchars($reg[C_POSTAL_O]).'" name="C_POSTAL_O" size="100" maxlength="200" /></td></tr>';
	echo '<tr><td>CUIT</td><td><input type="text" value="'.htmlspecialchars($reg[CUIT]).'" name="CUIT" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>INGRESOS</td><td><input type="text" value="'.htmlspecialchars($reg[INGRESOS]).'" name="INGRESOS" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>AGENTE_R</td><td><input type="text" value="'.htmlspecialchars($reg[AGENTE_R]).'" name="AGENTE_R" size="1" maxlength="1"  />(S/N)</td></tr>';
	echo '<tr><td>AGENTE_P</td><td><input type="text" value="'.htmlspecialchars($reg[AGENTE_P]).'" name="AGENTE_P" size="1" maxlength="1"  />(S/N)</td></tr>';
	echo '<tr><td>GANANCIAS</td><td><input type="text" value="'.htmlspecialchars($reg[GANANCIAS]).'" name="GANANCIAS" size="100" maxlength="200"  /></td></tr>';
	
	echo '<tr><td>TITULAR</td><td><input type="text" value="'.htmlspecialchars($reg[TITULAR]).'" name="TITULAR" size="100" maxlength="200"  /></td></tr>';
	
	echo '<tr><td>TEL Titular</td><td><input type="text" value="'.htmlspecialchars($reg[TEL_T]).'" name="TEL_T" size="100" maxlength="200"  /></td></tr>';
	
	echo '<tr><td>Dirección Titular</td><td><input type="text" value="'.htmlspecialchars($reg[DIRE_T]).'" name="DIRE_T" size="100" maxlength="200"  /></td></tr>';
	
	echo '<tr><td>C.POSTAL Titular</td><td><input type="text" value="'.htmlspecialchars($reg[C_POSTAL_T]).'" name="C_POSTAL_T" size="100" maxlength="200"  /></td></tr>';
	
	
	echo '<tr><td>GERENTE</td><td><input type="text" value="'.htmlspecialchars($reg[GERENTE]).'" name="GERENTE" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>TEL Gerente</td><td><input type="text" value="'.htmlspecialchars($reg[TEL_G]).'" name="TEL_G" size="100" maxlength="200"  /></td></tr>';
	


		echo '<tr><td>Dirección Gerente</td><td><input type="text" value="'.htmlspecialchars($reg[DIRE_G]).'" name="DIRE_G" size="100" maxlength="200"  /></td></tr>';


		echo '<tr><td>C.POSTAL Gerente</td><td><input type="text" value="'.htmlspecialchars($reg[C_POSTAL_G]).'" name="C_POSTAL_G" size="100" maxlength="200"  /></td></tr>';
		
		echo '<tr><td>VENDEDOR</td><td><input type="text" value="'.htmlspecialchars($reg[VENDEDOR]).'" name="VENDEDOR" size="100" maxlength="200"  /></td></tr>';

	
	echo '<tr><td>NOTAS</td><td><textarea name="NOTAS" cols="60" rows="10">'.htmlspecialchars($reg[NOTAS]).'</textarea></td></tr>';
	echo "</table>";
	echo "</form>";
	if($_GET[accion]=="agregar")
		echo "<center>  <a href='javascript:guardar();'>guardar</a> </center> ";
?>

<script type="text/javascript" src="../../librerias/jquery-1.3.2.min.js"></script>

<script language="javascript">
	function guardar()
	{
		if(formu.PROVEEDOR.value=="")
		{
			alert("Debe ingresar el nombre del proveedor.");
		}
		else if(formu.cod.value=="")
		{
			alert("Debe ingresar un código del proveedor.");
		}
		else
		{
			$.get("../../funciones/funciones_ajax.php", { llama_ajax: "valida_nuevo_cod_proveedor", cod: formu.cod.value },
			  function(data){
			  	data = trim(data);
				if(data=="existe")
				{
					alert("El código de proveedor ya existe.");
				}
				else
				{
					formu.submit();
				}
 		      } 
			);
	
		}
		
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
