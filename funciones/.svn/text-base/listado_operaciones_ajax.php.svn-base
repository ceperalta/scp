<?
include("../configuracion/configuracion.php");
include("../funciones/funciones.php");

$pag_actual = $_POST[pag_actual];

$fechainicial = $_POST[fechainicial];
$fechafinal = $_POST[fechafinal];
$cliente = $_POST[cliente];
$proveedor = $_POST[proveedor];
$pg = $_POST[pg];

//select * from pediuno where ( (fechaop > '2009-04-30' or fechaop = '2009-04-30' ) and (fechaop < '2009-05-22' or fechaop = '2009-05-22' ) )

$arma_where = "";
if($fechainicial!=-1)
{
	$aP = split("/",$fechainicial);
	$d = $aP[0];
	$m = $aP[1];
	$a = $aP[2];
	$fechalista = $a."-".$m."-".$d;
	$arma_where .= " and (fechaop > '".$fechalista."' or fechaop = '".$fechalista."') ";
}	
if($fechafinal!=-1)
{
	$aP = split("/",$fechafinal);
	$d = $aP[0];
	$m = $aP[1];
	$a = $aP[2];
	$fechalista = $a."-".$m."-".$d;
	$arma_where .= " and (fechaop < '".$fechalista."' or fechaop = '".$fechalista."') ";
}	
if($cliente!=-1)
{
	$aP = split("---",$cliente);
	$auxCodCli = trim($aP[1]);
	
	$arma_where .= " and clientes.CODCLI='".$auxCodCli."'";
}	
if($proveedor!=-1)
{
	$aP = split("---",$proveedor);
	$auxCodPro = trim($aP[1]);
	
	$arma_where .= " and proveedores.CODPRO='".$auxCodPro."'";
}




if($pg!=-1)
{
	$arma_where .= " and pg like '%".$pg."%'";
}	


$sql = "select count(*) as total from pediuno, clientes, proveedores where pediuno.CODCLI = clientes.CODCLI and proveedores.CODPRO=pediuno.CODPRO ".$arma_where;

$res = ejecutar_sql($sql);
$reg = mysql_fetch_array($res);

$total = $reg[total];


$sql = "select operacion,fechaop,CLIENTE,PROVEEDOR,flete,FECHAFL, pg as pgs from pediuno, clientes, proveedores where pediuno.CODCLI = clientes.CODCLI and proveedores.CODPRO=pediuno.CODPRO ".$arma_where." order by OPERACION desc limit ".$pag_actual.",".TAMANIO_PAGINA_OPERACIONES;



$res = ejecutar_sql($sql);
if(mysql_num_rows($res)==0)
{
	echo "-1";
}
else
{
	$respuesta = "<table><tr bgcolor='#CFCC2B'><th>Operación&nbsp;<img src='../../imgs/ordena.png'></th><th><i>Fecha </i></th><th>Cliente</th><th>Proveedor</th><th>Productos generales</th><th>Flete</th><th>Fecha flete</th></tr>";
	
	$cont_color = 0;
	
	while($reg=mysql_fetch_array($res))
	{
		$fP = split("-",$reg[fechaop]);
		$a = $fP[0];
		$m = $fP[1];
		$d = $fP[2];
		$fecha_lista = $d."/".$m."/".$a;
		
		$fP = split("-",$reg[FECHAFL]);
		$a = $fP[0];
		$m = $fP[1];
		$d = $fP[2];
		$fechafl_lista = $d."/".$m."/".$a;
	
		($cont_color & 1) ? $color='#F5F5F5' : $color='#FFFFFF';
		$cont_color++;
	
		$respuesta .= "<tr bgcolor='".$color."'><td align='center' valign='middle'><a href='javascript:detalle(".$reg[operacion].");'>".htmlspecialchars(($reg[operacion] ? $reg[operacion]:" - "))."</a></td><td><i>".$fecha_lista."</i></td><td>".htmlspecialchars(($reg[CLIENTE] ? $reg[CLIENTE]:" - "))."</td><td>".htmlspecialchars(($reg[PROVEEDOR] ? $reg[PROVEEDOR]:" - "))."</td><td>".htmlspecialchars(($reg[pgs] ? $reg[pgs]:" - "))."</td><td>".htmlspecialchars(($reg[flete] ? $reg[flete]:" - "))."</td><td>".$fechafl_lista."</td></tr>";	
	}
	$respuesta .= "</table>";
	
	
	echo utf8_encode($total."####".$respuesta);
	
	
	
}
exit();
?>

