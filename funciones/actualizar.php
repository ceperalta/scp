<?
include("../configuracion/configuracion.php");
include("../funciones/funciones.php");

exec("cd ".$_SESSION[configuracion][PATH_BASE_FS]." && \"c:\\Program Files\\Git\\bin\\git.exe\" log -1 --pretty=oneline",$a);
echo implode("--",$a);



//C:\>"c:\Program Files\Git\bin\git.exe" log -1 --pretty=oneline

?>