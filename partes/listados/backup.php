<?
	include("../../configuracion/configuracion.php");
	include("../../funciones/funciones.php");
?>

<html>
<body>
<head>
<script type="text/javascript" src="../../librerias/jquery-1.3.2.min.js"></script>
</head>

<?
	$sql = "select realizado from backup_log where id=1";
	$res = ejecutar_sql($sql);
	$reg = mysql_fetch_array($res);
?>


<b>Último backup creado:&nbsp;</b><span id='txt_realizado' style="color:#990000"><? echo $reg[realizado];?></span>
<center>
<i>Se creará el archivo .zip en <br /><b><? echo CARPETA_DE_BACKUP; ?></b></i><br />
<form target="_self" method="post" id='form_bck'>
<input type="hidden" name="a" value="crear_backup" />
<input type="submit" value='crear backup'/>
<br />
<br />
<div id='cargador' style="display:none;"><img  src='../../imgs/ajax-loader.gif' /></div>
<div id='txt_aviso' style="color:#0000FF"></div>
<br /><br />
</form>
</center>
<hr>

<b>Último backup restaurado:&nbsp;</b><span id='txt_restaurado' style="color:#990000"></span>
<form target="_self" method="post" id='form_bck_restaura' enctype="multipart/form-data">
<b>Restaurar datos desde backup:&nbsp;</b><input type="file" name="archivo_bckp">
<input type="hidden" name="a" value="restaura_backup" />
<input type="submit" value='restaurar'/>
<br />
<br />
<center>
<div id='cargador_restaura' style="display:none;"><img  src='../../imgs/ajax-loader.gif' /></div>
<div id='txt_aviso_restaura' style="color:#0000FF"></div>
</center>
<br /><br />
</form>
</center>



<?	
	if($_POST[a]=='crear_backup')
	{
		echo '
			<script language="javascript">
				$("#txt_aviso").text("Creando backup...");
				$("#cargador").show();	
				$.post("../../funciones/crea_backup.php", {a:1},
			  		function(data){
					 	$("#cargador").hide();	
						$("#txt_aviso").text("Backup " + data + " creado.");
						$("#txt_realizado").text(data);
						
 		      	});			
			</script>
		
		';	
		
	 
		
	}
	
	if($_POST[a]=='restaura_backup')
	{
	
		$target_path = "../../temporal/";

		$archivo = basename( $_FILES['archivo_bckp']['name']);
		$target_path = $target_path . $archivo ; 

		if(move_uploaded_file($_FILES['archivo_bckp']['tmp_name'], $target_path)) 
		{
		  	echo '
			<script language="javascript">
				$("#txt_aviso_restaura").text("Restaurando backup...");
				$("#cargador_restaura").show();	
				$.post("../../funciones/restaura_backup.php", {a:1,archivo:\''.$archivo.'\'},
			  		function(data){
					 	$("#cargador_restaura").hide();	
						$("#txt_aviso_restaura").text("Backup " + data + " restaurado.");
						$("#txt_restaurado").text(data);
						
 		      	});			
			</script>
			';
			
		} 
		else
		{	
		    echo "Ocurrió un error al subir el archivo. Intente nuevamente.";
		}
	
	 
		
	}
	
?> 



</body>
</html>
