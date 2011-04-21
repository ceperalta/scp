<?
include("../configuracion/configuracion.php");
include("../funciones/funciones.php");


$sql = "select proveedor,codpro from proveedores where proveedor like '%".$_GET[q]."%'";
$res = ejecutar_sql($sql);
$respuesta = "";
while($reg=mysql_fetch_array($res)){
	$respuesta .=  $reg[proveedor]." --- ".$reg[codpro]."|".$reg[codpro]."\n";
}

echo utf8_encode($respuesta);
	
exit();

?>