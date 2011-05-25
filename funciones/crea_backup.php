<?
include("../configuracion/configuracion.php");
include("../funciones/funciones.php");


	$myFile = ".svn/entries";
	$fh = fopen($myFile, 'r');
	$theData = fread($fh, filesize($myFile));
	fclose($fh);
	$a = split("\n",$theData);
	$version = trim($a[3]);

	$hora_menos_uno = date('H');
	$minutos = date('i');
	$segundos = date('s');
	$fecha_hora = date('j-n-y_').$hora_menos_uno.":".$minutos.":".$segundos."hs";
	$fecha_hora = str_replace(":","-",$fecha_hora);

$nombre_backup = "scp_v".$version."_".$fecha_hora;

$path_y_nombre_sql = $_SESSION[configuracion][PATH_BASE_FS]."\\temporal\\".$nombre_backup.".sql";

$cmd = $_SESSION[configuracion][PATH_BASE_BIN_MYSQL]."\\mysqldump.exe ".NOMBRE_BD." --user=".USUARIO_BD." -p".CLAVE_BD." > " . $path_y_nombre_sql;
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

	$sql = "update backup_log set realizado='".$nombre_backup.".zip' where id=1";
	ejecutar_sql($sql);

echo $nombre_backup.".zip";
?>