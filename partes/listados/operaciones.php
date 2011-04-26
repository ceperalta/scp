<?  session_start(); ?>
<html><body>
<div id="listado">
</div>

<script>
	function detalle(op)
	{
		parent.detalle.location.href = "../detalles/operaciones.php?op=" + op;
	}
</script>

</body></html>