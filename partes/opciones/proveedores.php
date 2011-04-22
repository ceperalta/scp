<?  session_start(); ?>
<html>
<head>
<script type="text/javascript" src="../../librerias/jquery-1.3.2.min.js"></script>
<script language="javascript">
	function modificar()
	{
		parent.detalle.document.getElementById('formu').submit();
	}
	
	function agregar()
	{
		parent.detalle.location.href = "../detalles/proveedores.php?accion=agregar";
	}
	
	function eliminar()
	{
		var respuesta = confirm ("Confirma la eliminación del registro " + parent.detalle.document.formu.cod.value + "?");
		if(respuesta)
		{
			$.get("../../funciones/funciones_ajax.php", { llama_ajax: "elimina_proveedor", cod: parent.detalle.document.formu.cod.			value  });
			parent.listado.location.href = "../listados/proveedores.php";
			parent.detalle.location.href = "../detalles/proveedores.php?s=eliminado";
			
		}	
	}
	
	function buscar()
	{
		parent.listado.location.href = "../listados/proveedores.php?b=" + parent.opciones.document.formbus.buscar.value;
	}
	
	function borrarfiltro()
	{
		parent.opciones.document.formbus.buscar.value = "";
		parent.listado.location.href = "../listados/proveedores.php";
	
	}
	
	function ayudabus()
	{
		alert("Filtra en todas las columnas del listado; buscando el texto en cualquier lugar sin la necesidad que el texto esté completo.");
	}
	
	function dale()
	{
		buscar();		
		return false;
	}
	
</script>
</head>

<body>
<?
	include("../../configuracion/configuracion.php");
	include("../../funciones/funciones.php");
	
	if($_GET[s]=="vacio")
	{
		echo "clientes :: opciones";
		exit();
	}
	
	echo "<form id='formbus' onsubmit='return dale();' name='formbus'><center><input type='text' name='buscar' id='buscar'></br><a href='javascript:buscar();'>filtrar</a>&nbsp;&nbsp;<a href='javascript:borrarfiltro();'>(borrar filtro)</a>&nbsp;&nbsp;<a href='javascript:ayudabus();'>(?)</a></center></form>";	
	echo "<hr>";
	echo "<li><a href='javascript:modificar();'>modificar actual</a></li><br/>";
	echo "<li><a href='javascript:eliminar();'>eliminar actual</a></li><hr>";
	echo "<li><a href='javascript:agregar();'>agregar</a> / <a href='javascript:parent.detalle.guardar();'>guardar</a></li><br/>";
	
?>


</body></html>

