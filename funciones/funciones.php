<? 
//Carga configuración
if(sizeof($_SESSION[configuracion])==0 || $_SESSION[configuracion][recargar]=="s")
{
	$res = ejecutar_sql("select * from configuracion");
	while($reg = mysql_fetch_array($res))
	{
		//define($reg[constante],$reg[valor]);
		$_SESSION[configuracion][$reg[constante]]=$reg[valor];
	}
	
	$_SESSION[configuracion][recargar]="n";
	
	error_log("sesión conf:" . implode("--",array_keys($_SESSION[configuracion])));
	error_log("sesión conf:" . implode("--",$_SESSION[configuracion]));
}


function ejecutar_sql($sql)
{
	error_log("ejecutar_sql > ".$sql);

	$con = mysql_connect(SERVIDOR_BD,USUARIO_BD,CLAVE_BD);
	mysql_select_db(NOMBRE_BD);
	 
	$res = mysql_query($sql,$con);
	mysql_close($con);
	
	return $res;
}

function ejecutar_sql2($sql)
{
	error_log("ejecutar_sql > ".$sql);

	$con = mysql_connect(SERVIDOR_BD2,USUARIO_BD2,CLAVE_BD2);
	mysql_select_db(NOMBRE_BD2);
	$res = mysql_query($sql,$con);
	mysql_close($con);
	
	return $res;
}

?>


