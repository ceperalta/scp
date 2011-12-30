<?
include("../configuracion/configuracion.php");
include("../funciones/funciones.php");

exec("cd ".$_SESSION[configuracion][PATH_BASE_FS]." && \"".$_SESSION[configuracion][GIT_EXE_PATH]."\" pull origin desarrollo",$a);

exec("cd ".$_SESSION[configuracion][PATH_BASE_FS]." && \"".$_SESSION[configuracion][GIT_EXE_PATH]."\" log -1 --pretty=oneline",$a);

ejecutar_sql("insert into actualizaciones (fecha,commit) values (NOW(),'".implode("--",$a)."')");

echo implode("--",$a);



//C:\>"c:\Program Files\Git\bin\git.exe" log -1 --pretty=oneline

?>