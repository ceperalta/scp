<?
//Carga configuraci�n
if(sizeof($_SESSION[configuracion])==0)
{
	$res = ejecutar_sql("select * from configuracion");
	while($reg = mysql_fetch_array($res))
	{
		//define($reg[constante],$reg[valor]);
		$_SESSION[configuracion][$reg[constante]]=$reg[valor];
	}
	
	//Tomar el �ltimo tag 
	$cmd = "e:";
	exec($cmd,$salida);

	$cmd = "cd ".$_SESSION[configuracion][PATH_BASE_FS];
	exec($cmd,$salida);
	
	$cmd = '"c:\\Program Files\\Git\\bin\\git.exe" tag';
	exec($cmd,$salida);
	$ultimo_tag = $salida[sizeof($salida)-1];
	
	$_SESSION[configuracion][ULTIMO_TAG]=$ultimo_tag;
	//Fin tomar el �ltimo tag
	
	
	error_log("sesi�n conf:" . implode("--",array_keys($_SESSION[configuracion])));
	error_log("sesi�n conf:" . implode("--",$_SESSION[configuracion]));
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

?>


