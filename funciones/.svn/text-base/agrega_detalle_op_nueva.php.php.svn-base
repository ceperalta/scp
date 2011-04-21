<?
include("../configuracion/configuracion.php");
include("../funciones/funciones.php");

$partes = split("#",$_POST[listprods]);
$detalle = $partes[3];

$importe = $_POST[cantidad] * ($_POST[empaque]*($_POST[pu] - ($_POST[pu]*($_POST[descuento]/100))   ));
$importe = round($importe,3);

$sql = "insert into pedi002_tmp (CANTIDAD, ENPAQUE,DETALLE,UNITARIO,DESCUENTO,IMPORTE) values (".$_POST[cantidad].",".$_POST[empaque].",'".mysql_escape_string($detalle)."',".$_POST[pu].",".$_POST[descuento].",".$importe.")";


ejecutar_sql($sql);


echo $importe;
	
exit();
?>