<html>
<head>
<script type="text/javascript" src="../../librerias/jquery-1.3.2.min.js"></script>
<script language="javascript">
	function modificar()
	{
		parent.listado.document.getElementById('formu').submit();
	}
</script>
</head>

<body>
<?
	echo "<li><a href='javascript:modificar();'>modificar</a></li>";
?>


</body></html>

