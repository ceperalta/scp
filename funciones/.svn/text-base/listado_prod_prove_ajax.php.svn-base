<?
include("../configuracion/configuracion.php");
include("../funciones/funciones.php");

$sql = "select * from listpre1 where codpro='".$_POST[codpro]."' order by detalle asc";
$res = ejecutar_sql($sql);
if(mysql_num_rows($res)==0)
{
	echo "NO";
}
else
{
	$respuesta = "<select onchange='completaEmpPrecio();' id='listprods'><option value='-1#-1#seleccione'>Seleccione</option>";
	while($reg=mysql_fetch_array($res))
	{
		if(strlen($reg[DETALLE])>3)
			$respuesta .= "<option value='".$reg[ENPAQUE]."#".$reg[COLUM3]."#".$reg[DESCUENTO]."#".$reg[DETALLE]."'>".$reg[DETALLE]."</option>";	
	}
	$respuesta .= "</select>";

	echo $respuesta;
}
	
exit();

?>

