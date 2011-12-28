<?
include("../configuracion/configuracion.php");
include("../funciones/funciones.php");
error_log("pum restaura>>> POST !!!".$_POST[archivo]);
		
$filename = $_POST[archivo];

$filename = $_SESSION[configuracion][PATH_BASE_FS]."\\temporal\\".$filename;

$zip = new ZipArchive;

if ($zip->open($filename) === TRUE) {
    $zip->extractTo($_SESSION[configuracion][PATH_BASE_FS]."\\temporal\\extraccion");
    $zip->close();
   
	$path_y_nombre_sql = $_SESSION[configuracion][PATH_BASE_FS]."\\temporal\\extraccion\\datos_y_estructura.sql";
	$cmd = $_SESSION[configuracion][PATH_BASE_BIN_MYSQL]."\\mysql.exe ".NOMBRE_BD." --user=".USUARIO_BD." -p".CLAVE_BD." < " . $path_y_nombre_sql;
	error_log($cmd);
	exec($cmd);
	
	ejecutar_sql("delete from restaurados");
	
	$sql = "insert into restaurados (id,restaurado) values (1,'{$_POST[archivo]}')";
	error_log($sql);
	ejecutar_sql($sql);
   
    unlink($filename);

	unlink($_SESSION[configuracion][PATH_BASE_FS]."\\temporal\\extraccion\\datos_y_estructura.sql");
	rmdir($_SESSION[configuracion][PATH_BASE_FS]."\\temporal\\extraccion");
	
	echo $_POST[archivo];
   
} else {
    echo 'error... en fin ';
}

?>