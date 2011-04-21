<?
include("../configuracion/configuracion.php");
include("../funciones/funciones.php");

if(isset($_GET[llama_ajax]))
{
	if($_GET[llama_ajax]=="valida_nuevo_cod_cliente")
	{
		
		$res = ejecutar_sql("select CODCLI from clientes where CODCLI='".$_GET[cod]."'");
		if(mysql_num_rows($res)>0)
		{
			echo "existe";
			
		}
		else
		{
			echo "ok";
		
		}
		exit();
	}
	
	if($_GET[llama_ajax]=="valida_nuevo_cod_proveedor")
	{
		$res = ejecutar_sql("select CODPRO from proveedores where CODPRO='".$_GET[cod]."'");
		if(mysql_num_rows($res)>0)
			echo "existe";
		else
			echo "ok";
	}
	
	if($_GET[llama_ajax]=="elimina_cliente")
	{
		$res = ejecutar_sql("delete from clientes where CODCLI='".$_GET[cod]."'");
	}
	
	if($_GET[llama_ajax]=="elimina_proveedor")
	{
		$res = ejecutar_sql("delete from proveedores where CODPRO='".$_GET[cod]."'");
	}
	
	
	if($_GET[llama_ajax]=="valida_prods_cli_pro")
	{
		$salida = "Validación: ";
	
		$res = ejecutar_sql("select count(*) as total from pedi002_tmp");
		$reg = mysql_fetch_array($res);
		if($reg[total]==0)
		{
			//Borrar los que hayan quedado guardados, por las dudas
			ejecutar_sql("delete from pedi002 where OPERACION=".$_GET[cod_op]);
		}
			
		$res = ejecutar_sql("select CODPRO from proveedores where CODPRO='".$_GET[cod_proveedor]."'");
		if(mysql_num_rows($res)==0)
			$salida .= "\nEl código de proveedor no es válido.";
			
		$res = ejecutar_sql("select CODCLI from clientes where CODCLI='".$_GET[cod_cliente]."'");
		if(mysql_num_rows($res)==0)
			$salida .= "\nEl código de cliente no es válido.";
			
		if($salida=="Validación: ")
			echo utf8_encode("todook");
		else
			echo utf8_encode($salida);
			
		exit();
	}
	
	
	
	if($_GET[llama_ajax]=="guarda_prods_en_temporal_nueva_op")
	{
		ejecutar_sql("delete from pedi002 where OPERACION=".$_GET[cod_op]);
	
		$res = ejecutar_sql("select * from pedi002_tmp");
		while($reg = mysql_fetch_array($res))
		{
			$sql = "insert into pedi002 ( pedi002.CODCLI, pedi002.CODPRO, pedi002.OPERACION, pedi002.CANTIDAD, pedi002.DETALLE, pedi002.ENPAQUE,pedi002.IMPORTE,pedi002.UNITARIO  ) values ( '".$_GET[cod_cliente]."', '".$_GET[cod_proveedor]."', ".$_GET[cod_op].", ".$reg[CANTIDAD].", '".mysql_escape_string($reg[DETALLE])."', ".$reg[ENPAQUE].",".$reg[IMPORTE].",".$reg[UNITARIO].")";
			
			ejecutar_sql($sql);
		}
		
	}
	
	if($_GET[llama_ajax]=="guarda_nueva_op")
	{
			$aP = split("/",$_GET[fechaop]);
			$a = $aP[2];
			$m = $aP[1];
			$d = $aP[0];
			
			$fecha_op_lista = $a."-".$m."-".$d;
			
			$aP = split("/",$_GET[fechaflete]);
			$a = $aP[2];
			$m = $aP[1];
			$d = $aP[0];
			
			$fechaflete_lista = $a."-".$m."-".$d;
			
			if($_GET[esmod]=='s')
				$sql = "update pediuno set CODCLI='".$_GET[cod_cliente]."',  CODPRO='".$_GET[cod_proveedor]."', FECHAOP='".$fecha_op_lista."',FLETE='".$_GET[flete]."', FECHAFL='".$fechaflete_lista."', notas='".mysql_escape_string($_GET[notas])."' where OPERACION=".$_GET[cod_op];
			else
				$sql = "insert into pediuno ( OPERACION, CODCLI,  CODPRO, FECHAOP,FLETE, FECHAFL, notas) 
			values ( '".$_GET[cod_op]."', '".$_GET[cod_cliente]."', '".$_GET[cod_proveedor]."', '".$fecha_op_lista."', '".$_GET[flete]."', '".$fechaflete_lista."','".mysql_escape_string($_GET[notas])."')";
			
			
			ejecutar_sql($sql);
			
			echo "ok";
		
	}
	
}

?>