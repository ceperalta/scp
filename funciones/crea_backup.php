<?
include("../configuracion/configuracion.php");
include("../funciones/funciones.php");
error_log("pum crea !!!");
	$fecha_hora = date('j-n-Y__').time();
	$fecha_hora = str_replace(":","-",$fecha_hora);
	

$nombre_backup = "scp_v".$_SESSION[configuracion][VERSION]."_".$fecha_hora;

    ejecutar_sql("delete from realizados");
	$sql = "insert into realizados (id,realizado) values (1,'".$nombre_backup.".zip')";
	error_log($sql);
	ejecutar_sql($sql);


$path_y_nombre_sql = $_SESSION[configuracion][PATH_BASE_FS]."\\temporal\\".$nombre_backup.".sql";

$cmd = $_SESSION[configuracion][PATH_BASE_BIN_MYSQL]."\\mysqldump.exe ".NOMBRE_BD." --user=".USUARIO_BD." -p".CLAVE_BD." > " . $path_y_nombre_sql;

error_log($cmd);

exec($cmd);

		
$zip = new ZipArchive();
$filename = $_SESSION[configuracion][PATH_BASE_FS]."\\temporal\\".$nombre_backup.".zip";

if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
   exit("No se puede abrir el archivo a comprimir <$filename>\n");
}

$zip->addFile($path_y_nombre_sql,"datos_y_estructura.sql");
$zip->close();

unlink($path_y_nombre_sql);

if(!file_exists($_SESSION[configuracion][CARPETA_DE_BACKUP]))
	mkdir($_SESSION[configuracion][CARPETA_DE_BACKUP]);

copy($filename,$_SESSION[configuracion][CARPETA_DE_BACKUP]."\\".$nombre_backup.".zip");
unlink($filename);
	
	

echo $nombre_backup.".zip";
?>