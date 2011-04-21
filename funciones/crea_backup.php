<?
include("../configuracion/configuracion.php");
include("../funciones/funciones.php");


	$myFile = ".svn/entries";
	$fh = fopen($myFile, 'r');
	$theData = fread($fh, filesize($myFile));
	fclose($fh);
	$a = split("\n",$theData);
	$version = trim($a[3]);

	$hora_menos_uno = date('H')-1;
	$minutos = date('i');
	$fecha_hora = date('j-n-y_').$hora_menos_uno."_".$minutos."hs";

$nombre_backup = "scp_v".$version."_".$fecha_hora;

$path_y_nombre_sql = "C:\\xampp\\htdocs\\scp\\temporal\\".$nombre_backup.".sql";

exec("C:\\xampp\\mysql\\bin\\mysqldump.exe scp --user=root > " . $path_y_nombre_sql);

		
$zip = new ZipArchive();
$filename = "C:\\xampp\\htdocs\\scp\\temporal\\".$nombre_backup.".zip";

if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
   exit("No se puede abrir el archivo a comprimir <$filename>\n");
}

$zip->addFile($path_y_nombre_sql,"a.sql");
$zip->close();

		
unlink($path_y_nombre_sql);


copy($filename,CARPETA_DE_BACKUP."\\".$nombre_backup.".zip");
unlink($filename);

	$sql = "update backup_log set realizado='".$nombre_backup.".zip' where id=1";
	ejecutar_sql($sql);

echo $nombre_backup.".zip";
?>