<?
include("../configuracion/configuracion.php");
include("../funciones/funciones.php");


		
$filename = $_POST[archivo];

$filename = "C:\\xampp\\htdocs\\scp\\temporal\\".$filename;

$zip = new ZipArchive;

if ($zip->open($filename) === TRUE) {
    $zip->extractTo("/","c:\\a.sql");
    $zip->close();
    echo 'ok';
} else {
    echo 'failed';
}

?>