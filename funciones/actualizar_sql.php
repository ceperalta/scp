<?session_start();

include("../configuracion/configuracion.php");
include("../funciones/funciones.php");

$aP = split("--",$_POST[vuelve_git]);
$aP = split(" ",$aP[1]);
$nombreCommitIgualSQL = trim($aP[1]);



$path_y_nombre_sql = $_SESSION[configuracion][PATH_BASE_FS]."\\actualiza_sqls\\".$nombreCommitIgualSQL.".sql";
$cmd = $_SESSION[configuracion][PATH_BASE_BIN_MYSQL]."\\mysql.exe ".NOMBRE_BD." --user=".USUARIO_BD." -p".CLAVE_BD." < " . $path_y_nombre_sql;
error_log($cmd);
exec($cmd);

$_SESSION[configuracion][recargar]="s";



echo $nombreCommitIgualSQL;


?>