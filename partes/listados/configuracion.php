<?session_start();
	include("../../configuracion/configuracion.php");
	include("../../funciones/funciones.php");
	
	if( !empty($_POST))
	{
		foreach(array_keys($_POST) as $cons)
		{
			$sql = "update configuracion set valor='".$_POST[$cons]."' where constante='".$cons."'";
			
			
			ejecutar_sql($sql);
		}
		$_SESSION[configuracion][recargar]="s";
		
		echo '<center><span style="background-color:#FFFF00; color:#FF0000">Configuraci�n modificada.</span></center>';
	}

	echo '<form action="configuracion.php" method="post" name="formu" id="formu">';
	
	$sql = "select * from configuracion";
	$res = ejecutar_sql($sql);
	
	echo "(Paths con doble barra. Ejemplo: c:\\\\dir\\\\dir2)<br/><table>";	

	while($reg = mysql_fetch_array($res))
	{
		$reg[valor] = addslashes($reg[valor]);
		echo '<tr><td>'.$reg[constante].'</td><td><textarea cols="60" name="'.$reg[constante].'" id="'.$reg[constante].'">'.htmlspecialchars($reg[valor]).'</textarea></td></tr>';
	}

	echo "</table></form>";

	
?>	
