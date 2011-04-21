<?
include("../configuracion/configuracion.php");
include("../funciones/funciones.php");

$res = ejecutar_sql("select cliente,codcli from clientes where cliente like '%".$_GET[q]."%'" );
$respuesta = "";
while($reg=mysql_fetch_array($res))
	$respuesta .=  strtolower($reg[cliente])." --- ".$reg[codcli]."|".$reg[codcli]."\n";

echo utf8_encode($respuesta);
	
exit();
?>