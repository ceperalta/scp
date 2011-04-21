<?
	include("../../configuracion/configuracion.php");
	include("../../funciones/funciones.php");
	
	if($_GET[s]=="eliminado")
	{
		echo '<center><span style="background-color:#FFFF00; color:#FF0000">Registro eliminado.</span></center>';
		exit();
	}
	
	if($_GET[s]=="vacio")
	{
		echo "clientes :: detalles";
		exit();
	}
	
	if( !empty($_POST[CLIENTE]))
	{
		if(isset($_POST[accion]) && $_POST[accion]=='agregar')
		{
			//Nuevo
			
		
			 $sql2 = "insert into clientes (CODCLI, clientes.AGENTE_P, clientes.AGENTE_R, clientes.AUTO_TEL, clientes.C_POSTAL, clientes.CLIENTE, clientes.CUIT,
	clientes.DIRECC_G, clientes.DIRECC_T, clientes.DIRECCION, clientes.GANANCIAS, clientes.GERENTE, clientes.INGRESOS_B, clientes.NOTAS,
	clientes.POSTAL_G, clientes.POSTAL_T, clientes.PROVINCIA,  clientes.SECRETARIA, clientes.SUPERMER, clientes.TELE_FAX,
	clientes.TELE_MAN, clientes.TELEFONOS, clientes.TELPART_G, clientes.TELPART_T, clientes.TITULAR) values
	( '".$_POST[cod]."', '".$_POST[AGENTE_P]."', '".$_POST[AGENTE_R]."', '".$_POST[AUTO_TEL]."', '".$_POST[C_POSTAL]."', '".$_POST[CLIENTE]."', '".$_POST[CUIT]."',
	'".$_POST[DIRECC_G]."', '".$_POST[DIRECC_T]."', '".$_POST[DIRECCION]."', '".$_POST[GANANCIAS]."', '".$_POST[GERENTE]."', '".$_POST[INGRESOS_B]."', '".$_POST[NOTAS]."',
	'".$_POST[POSTAL_G]."', '".$_POST[POSTAL_T]."', '".$_POST[PROVINCIA]."',  '".$_POST[SECRETARIA]."', '".$_POST[SUPERMER]."', '".$_POST[TELE_FAX]."',
	'".$_POST[TELE_MAN]."', '".$_POST[TELEFONOS]."', '".$_POST[TELPART_G]."', '".$_POST[TELPART_T]."', '".$_POST[TITULAR]."')";
			
			ejecutar_sql($sql2); 
			
			
			echo '<center><span style="background-color:#FFFF00; color:#FF0000">Registro agregado.</span></center>';
			echo '<script language="javascript">
			parent.listado.location.href = "../listados/clientes.php";
		</script>';
			exit();
		}
		else
		{
			//Modificar
			
			$sql2 = "update clientes set clientes.AGENTE_P='".$_POST[AGENTE_P]."', clientes.AGENTE_R='".$_POST[AGENTE_R]."', clientes.AUTO_TEL='".$_POST[AUTO_TEL]."', clientes.C_POSTAL='".$_POST[C_POSTAL]."', clientes.CLIENTE='".$_POST[CLIENTE]."', clientes.CUIT='".$_POST[CUIT]."',
clientes.DIRECC_G='".$_POST[DIRECC_G]."', clientes.DIRECC_T='".$_POST[DIRECC_T]."', clientes.DIRECCION='".$_POST[DIRECCION]."', clientes.GANANCIAS='".$_POST[GANANCIAS]."', clientes.GERENTE='".$_POST[GERENTE]."', clientes.INGRESOS_B='".$_POST[INGRESOS_B]."', clientes.NOTAS='".$_POST[NOTAS]."',
clientes.POSTAL_G='".$_POST[POSTAL_G]."', clientes.POSTAL_T='".$_POST[POSTAL_T]."', clientes.PROVINCIA='".$_POST[PROVINCIA]."',  clientes.SECRETARIA='".$_POST[SECRETARIA]."', clientes.SUPERMER='".$_POST[SUPERMER]."', clientes.TELE_FAX='".$_POST[TELE_FAX]."',
clientes.TELE_MAN='".$_POST[TELE_MAN]."', clientes.TELEFONOS='".$_POST[TELEFONOS]."', clientes.TELPART_G='".$_POST[TELPART_G]."', clientes.TELPART_T='".$_POST[TELPART_T]."', clientes.TITULAR='".$_POST[TITULAR]."' where CODCLI='".$_POST[cod]."'";
			ejecutar_sql($sql2);
			
			echo '<center><span style="background-color:#FFFF00; color:#FF0000">Registro modificado.</span></center>';
		}
		

		echo '<script language="javascript">
			parent.listado.location.href = "../listados/clientes.php";
		</script>';
	}
	
	
	
	
	
	echo '<form action="clientes.php" method="post" name="formu" id="formu">';
	
	if($_GET[accion]=="agregar")
	{
		echo 'Código <input type="text" name="cod" size="4"  maxlength="4" id="cod" /><hr>';
		echo '<input type="hidden" value="agregar" name="accion">';
	}
	else
	{
		if(isset($_GET[cod]))
			$codcli = $_GET[cod];
		else
			$codcli = $_POST[cod];
	
	
		$sql = "select *, CODCLI as cod from clientes where CODCLI='".$codcli."'";
		$res = ejecutar_sql($sql);
		$reg = mysql_fetch_array($res);
	
		echo "<b>Código: ".$reg[cod]."</b><hr>";
		echo '<input type="hidden" value="'.$codcli.'" name="cod" id="cod">';
	}
	
	echo "<table>";	
	echo '<tr><td>CLIENTE</td><td><input type="text" value="'.htmlspecialchars($reg[CLIENTE]).'" name="CLIENTE" id="CLIENTE" size="100"  maxlength="200"  /></td></tr>';
	echo '<tr><td>SUPERMER</td><td><input type="text" value="'.htmlspecialchars($reg[SUPERMER]).'" name="SUPERMER" size="100"  maxlength="200"  /></td></tr>';
	echo '<tr><td>DIRECCION</td><td><input type="text" value="'.htmlspecialchars($reg[DIRECCION]).'" name="DIRECCION" size="100"  maxlength="200"  /></td></tr>';
	echo '<tr><td>C_POSTAL</td><td><input type="text" value="'.htmlspecialchars($reg[C_POSTAL]).'" name="C_POSTAL" size="100"  maxlength="200"  /></td></tr>';
	echo '<tr><td>PROVINCIA</td><td><input type="text" value="'.htmlspecialchars($reg[PROVINCIA]).'" name="PROVINCIA" size="100"  maxlength="200"  /></td></tr>';
	echo '<tr><td>TELEFONOS</td><td><input type="text" value="'.htmlspecialchars($reg[TELEFONOS]).'" name="TELEFONOS" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>AUTO_TEL</td><td><input type="text" value="'.htmlspecialchars($reg[AUTO_TEL]).'" name="AUTO_TEL" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>TELE_FAX</td><td><input type="text" value="'.htmlspecialchars($reg[TELE_FAX]).'" name="TELE_FAX" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>CUIT</td><td><input type="text" value="'.htmlspecialchars($reg[CUIT]).'" name="CUIT" size="100 maxlength="200"  /></td></tr>';
	echo '<tr><td>INGRESOS_B</td><td><input type="text" value="'.htmlspecialchars($reg[INGRESOS_B]).'" name="INGRESOS_B" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>AGENTE_R</td><td><input type="text" value="'.htmlspecialchars($reg[AGENTE_R]).'" name="AGENTE_R" size="1" maxlength="1" />(S/N)</td></tr>';
	echo '<tr><td>AGENTE_P</td><td><input type="text" value="'.htmlspecialchars($reg[AGENTE_P]).'" name="AGENTE_P" size="1" maxlength="1" />(S/N</td></tr>';
	echo '<tr><td>GANANCIAS</td><td><input type="text" value="'.htmlspecialchars($reg[GANANCIAS]).'" name="GANANCIAS" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>TITULAR</td><td><input type="text" value="'.htmlspecialchars($reg[TITULAR]).'" name="TITULAR" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>DIRECCION_T</td><td><input type="text" value="'.htmlspecialchars($reg[DIRECC_T]).'" name="DIRECC_T" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>POSTAL_T</td><td><input type="text" value="'.htmlspecialchars($reg[POSTAL_T]).'" name="POSTAL_T" size="100" maxlength="30"  /></td></tr>';
	echo '<tr><td>TELEPART_T</td><td><input type="text" value="'.htmlspecialchars($reg[TELPART_T]).'" name="TELPART_T" size="100" maxlength="200"  /></td></tr>';
	
	echo '<tr><td>GERENTE</td><td><input type="text" value="'.htmlspecialchars($reg[GERENTE]).'" name="GERENTE" size="100" maxlength="200"  /></td></tr>';
	
	echo '<tr><td>DIRECC_G</td><td><input type="text" value="'.htmlspecialchars($reg[DIRECC_G]).'" name="DIRECC_G" size="100" maxlength="200"  /></td></tr>';
	
	echo '<tr><td>POSTAL_G</td><td><input type="text" value="'.htmlspecialchars($reg[POSTAL_G]).'" name="POSTAL_G" size="100" maxlength="200"  /></td></tr>';
	
	echo '<tr><td>TELPART_G</td><td><input type="text" value="'.htmlspecialchars($reg[TELPART_G]).'" name="TELPART_G" size="100" maxlength="200"  /></td></tr>';
	
	
	echo '<tr><td>SECRETARIA</td><td><input type="text" value="'.htmlspecialchars($reg[SECRETARIA]).'" name="SECRETARIA" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>TELE_MAN</td><td><input type="text" value="'.htmlspecialchars($reg[TELE_MAN]).'" name="TELE_MAN" size="100" maxlength="200"  /></td></tr>';
	echo '<tr><td>NOTAS</td><td><textarea name="NOTAS" cols="60" rows="10">'.htmlspecialchars($reg[NOTAS]).'</textarea></td></tr>';
	echo "</table>";
	echo "</form>";
?>

<script type="text/javascript" src="../../librerias/jquery-1.3.2.min.js"></script>

<script language="javascript">
	function guardar()
	{
		if(formu.CLIENTE.value=="")
		{
			alert("Debe ingresar el nombre del cliente.");
		}
		else if(formu.cod.value=="")
		{
			alert("Debe ingresar un código de cliente.");
		}
		else
		{
			$.get("../../funciones/funciones_ajax.php", { llama_ajax: "valida_nuevo_cod_cliente", cod: formu.cod.value },
			  function(data){
			  	data = trim(data);
			 	if(data=="existe")
				{
					alert("El código de cliente ya existe.");
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