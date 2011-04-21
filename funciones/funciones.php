<?

//Carga configuración
$res = ejecutar_sql("select * from configuracion");
while($reg = mysql_fetch_array($res))
{
	define($reg[constante],$reg[valor]);
}



function ejecutar_sql($sql)
{
	$con = mysql_connect(SERVIDOR_BD,USUARIO_BD,CLAVE_BD);
	mysql_select_db(NOMBRE_BD);
	$res = mysql_query($sql,$con);
	mysql_close($con);
	
	return $res;
}

?>


