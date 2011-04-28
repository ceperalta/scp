<?  session_start();

	include_once("configuracion/configuracion.php");
	include_once("funciones/funciones.php");

	
?>

<frameset cols="20%,73%" id="frameset_principal">
	
    <frameset rows="45%,55%" id="menu_opciones">
		<frame src="partes/menu.php?s=Clientes" name="menu" id="menu" >
        <frame src="partes/opciones/clientes.php" name="opciones" id="opciones" >    
    </frameset>
	
    <frameset rows="60%,40%" id="listado_detalle">
		<frame src="partes/listados/clientes.php" name="listado" id="listado">
        <frame src="partes/detalles/clientes.php?s=vacio" name="detalle" id="detalle" >    
    </frameset>

</frameset><noframes></noframes>



