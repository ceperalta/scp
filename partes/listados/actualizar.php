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
	echo "<h3>Actualizar</h3><hr>(Cree un backup y controle su conexión a Internet antes de proceder)<br/><br/>";
	
?>
<center>
<form target="_self" method="post" id='form_actualizar'>
<input type="hidden" name="actualizar" value="actualizar" />
<input type="submit" value='actualizar'/>
<br />
<br />
<div id='cargador' style="display:none;"><img  src='../../imgs/ajax-loader.gif' /></div>
<div id='txt_aviso' style="color:#0000FF"></div>
<br /><br />
</form>
</center>
</body>
</html>

<?	
	if($_POST[actualizar]=='actualizar')
	{
		echo '
			<script language="javascript">
				$("#txt_aviso").text("Actualizando...");
				$("#cargador").show();	
				$.post("../../funciones/actualizar.php", {a:1},
			  		function(data){
					 	$("#cargador").hide();	
						$("#txt_aviso").text("Actualizado. Recargue la página completa por favor (F5 o desde la barra). (feedback: " + data + ")");
						
						
						
						
 		      	});			
			</script>
		
		';	
		
	 
		
	}
?>	