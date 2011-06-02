<?  session_start(); ?>
<? 
	include("../configuracion/configuracion.php");
	include("../funciones/funciones.php");

	echo "SCP-Pruebas  (".$_SESSION[configuracion][ULTIMO_TAG].")";
	echo "<hr/>";
?>



<script language="javascript">
	function cargaClientes()
	{
		parent.document.getElementById('listado_detalle').rows = '60%,40%';
		parent.listado.location.href = "listados/clientes.php";
		parent.opciones.location.href = "opciones/clientes.php";
		parent.detalle.location.href = "detalles/clientes.php?s=vacio";
		parent.menu.location.href = "menu.php?s=Clientes";
	}
</script>

<? if($_GET[s]=="Clientes")
	echo '<li><b><span style="color:red">Clientes</span></b></li><br/>';
else 
	echo '<li><a href="#" onClick="cargaClientes();">Clientes</a></li><br/>';
?>



<script language="javascript">
	function cargaProveedores()
	{
		parent.document.getElementById('listado_detalle').rows = '48%,52%';
		parent.listado.location.href = "listados/proveedores.php";
		parent.opciones.location.href = "opciones/proveedores.php";
		parent.detalle.location.href = "detalles/proveedores.php?s=vacio";
		parent.menu.location.href = "menu.php?s=Proveedores";
	}
</script>

<? if($_GET[s]=="Proveedores")
	echo '<li><b><span style="color:red">Proveedores</span></b></li><br/>';
else 
	echo '<li><a href="#" onClick="cargaProveedores();">Proveedores</a></li><br/>';
?>

<script language="javascript">
	function cargaOpNueva()
	{
		parent.document.getElementById('listado_detalle').rows = '60%,40%';
		parent.listado.location.href = "listados/op_nueva.php";
		parent.opciones.location.href = "opciones/op_nueva.php";
		parent.detalle.location.href = "detalles/op_nueva.php?s=vacio";
		parent.menu.location.href = "menu.php?s=op_nueva";
	}
</script>

<script language="javascript">
	function cargaOperaciones()
	{
		parent.document.getElementById('listado_detalle').rows = '47%,53%';
		parent.document.getElementById('frameset_principal').cols = '20%,80%';
		
		parent.listado.location.href = "listados/operaciones.php";
		parent.opciones.location.href = "opciones/operaciones.php";
		parent.detalle.location.href = "detalles/operaciones.php?s=vacio";
		parent.menu.location.href = "menu.php?s=operaciones";
	}
</script>



<? if($_GET[s]=="operaciones")
	echo '<li><b><span style="color:red">Operaciones</span></b></li>';
else 
	echo '<li><a href="#" onClick="cargaOperaciones();">Operaciones</a></li>';
?>

<ul type="circle">

<? if($_GET[s]=="op_nueva")
	echo '<li><b><span style="color:red">Nueva/Modificación</span></b></li>';
else 
	echo '<li><a href="#" onClick="cargaOpNueva();">Nueva/Modificación</a></li>';
?>
</ul>









<script language="javascript">
	function cargaConfiguracion()
	{
		parent.document.getElementById('listado_detalle').rows = '100%,0%';
		parent.listado.location.href = "listados/configuracion.php";
		parent.opciones.location.href = "opciones/configuracion.php";
		parent.detalle.location.href = "detalles/configuracion.php?s=vacio";
		parent.menu.location.href = "menu.php?s=Configuracion";
	}
</script>
<? if($_GET[s]=="Configuracion")
	echo '<li><b><span style="color:red">Configuración</span></b></li>';
else 
	echo '<li><a href="javascript:cargaConfiguracion();">Configuración</a></li>';
?>

<br />

<script language="javascript">
	function cargaBackup()
	{
		parent.document.getElementById('listado_detalle').rows = '100%,0%';
		parent.listado.location.href = "listados/backup.php";
		parent.opciones.location.href = "opciones/backup.php";
		parent.detalle.location.href = "detalles/backup.php?s=vacio";
		parent.menu.location.href = "menu.php?s=Backup";
	}
</script>
<? if($_GET[s]=="Backup")
	echo '<li><b><span style="color:red">Backup</span></b></li>';
else 
	echo '<li><a href="javascript:cargaBackup();">Backup</a></li>';
?>
