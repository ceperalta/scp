<?
	include("../../configuracion/configuracion.php");
	include("../../funciones/funciones.php");
	
	if( !empty($_POST))
	{
		foreach(array_keys($_POST) as $cons)
		{
			$sql = "update configuracion set valor='".$_POST[$cons]."' where constante='".$cons."'";
			ejecutar_sql($sql);
		}
		
		echo '<center><span style="background-color:#FFFF00; color:#FF0000">Configuración modificada.</span></center>';
	}

	echo '<form action="configuracion.php" method="post" name="formu" id="formu">';
	
	$sql = "select * from configuracion";
	$res = ejecutar_sql($sql);
	
	echo "<table>";	

	while($reg = mysql_fetch_array($res))
	{
		echo '<tr><td>'.$reg[constante].'</td><td><textarea cols="60" name="'.$reg[constante].'" id="'.$reg[constante].'">'.htmlspecialchars($reg[valor]).'</textarea></td></tr>';
	}

	echo "</table></form>";

	
?>	
