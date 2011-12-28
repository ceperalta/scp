<?  

	include_once("configuracion/configuracion.php");
	include_once("funciones/funciones.php");
	
	//***************************listpre0**********************************************
	$res = ejecutar_sql2("select * from listpre0");
	
	while($reg = mysql_fetch_array($res))
	{
		$sql = "insert into listpre0 
		(
			`TITULO`,`CODPRO`,`FECHA`,
			`COL003`,`RESUM0`,`RESUM1`,RESUM2
		 )
  
	values
	
		(
		'{$reg[TITULO]}','{$reg[CODPRO]}','{$reg[FECHA]}','{$reg[COL003]}','{$reg[RESUM0]}',
		'{$reg[RESUM1]}','{$reg[RESUM2]}'
		)
	
		";
		//echo $sql . "<hr>";
		ejecutar_sql($sql);
	}
	/*
	CREATE TABLE `listpre0` (
  `TITULO` varchar(40) DEFAULT NULL,
  `CODPRO` varchar(4) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `COL003` varchar(8) DEFAULT NULL,
  `RESUM0` varchar(50) DEFAULT NULL,
  `RESUM1` varchar(50) DEFAULT NULL,
  `RESUM2` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
	
	*/
	
	
	
	//***************************pedi002**********************************************
	/*
	$res = ejecutar_sql2("select * from pedi002");
	
	while($reg = mysql_fetch_array($res))
	{
		$sql = "insert into pedi002 
		(
			`OPERACION`,`FECHA`,`CODPRO`,`CODCLI`,
			`CANTIDAD`,`ENPAQUE`,`DETALLE`,IMPORTE,UNITARIO
		 )
  
	values
	
		(
		'{$reg[OPERACION]}','{$reg[FECHA]}','{$reg[CODPRO]}','{$reg[CODCLI]}','{$reg[CANTIDAD]}',
		'{$reg[ENPAQUE]}','{$reg[DETALLE]}','{$reg[IMPORTE]}','{$reg[UNITARIO]}'
		)
	
		";
		//echo $sql . "<hr>";
		ejecutar_sql($sql);
	}
	*/
	
	/*
	CREATE TABLE `pedi002` (
  `OPERACION` int(11) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `CODPRO` varchar(4) DEFAULT NULL,
  `CODCLI` varchar(4) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `ENPAQUE` int(11) DEFAULT NULL,
  `DETALLE` varchar(255) DEFAULT NULL,
  `IMPORTE` double DEFAULT NULL,
  `UNITARIO` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
	
	
	CREATE TABLE `pedi002` ORIGINALLLLLLL (
  `OPERACION` int(11) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `CODPRO` varchar(4) DEFAULT NULL,
  `CODCLI` varchar(4) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `ENPAQUE` int(11) DEFAULT NULL,
  `DETALLE` varchar(45) DEFAULT NULL,
  `IMPORTE` double DEFAULT NULL,
  `UNITARIO` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	*/
	
	//***************************pediuno**********************************************
	/*
	$res = ejecutar_sql2("select * from pediuno");
	
	while($reg = mysql_fetch_array($res))
	{
		$sql = "insert into pediuno 
		(
			`OPERACION`,`CODCLI`,`CODPRO`,`FECHAOP`,
			`NOTAGAL`,`NOTAREC`,`RECARGO`,FLETE,FECHAFL
		 )
  
	values
	
		(
		'{$reg[OPERACION]}','{$reg[CODCLI]}','{$reg[CODPRO]}','{$reg[FECHAOP]}','{$reg[NOTAGAL]}',
		'{$reg[NOTAREC]}','{$reg[RECARGO]}','{$reg[FLETE]}','{$reg[FECHAFL]}'
		)
	
		";
		//echo $sql . "<hr>";
		ejecutar_sql($sql);
	}
	*/
	
	/*
CREATE TABLE `pediuno` (
  `OPERACION` int(11) NOT NULL AUTO_INCREMENT,
  `CODCLI` varchar(4) DEFAULT NULL,
  `CODPRO` varchar(4) DEFAULT NULL,
  `FECHAOP` date DEFAULT NULL,
  `NOTAGAL` varchar(255) DEFAULT NULL,
  `NOTAREC` varchar(255) DEFAULT NULL,
  `RECARGO` double DEFAULT NULL,
  `FLETE` varchar(255) DEFAULT NULL,
  `FECHAFL` date DEFAULT NULL,
  `notas` text,
  PRIMARY KEY (`OPERACION`)
) ENGINE=MyISAM AUTO_INCREMENT=10001 DEFAULT CHARSET=latin1;
	
	CREATE TABLE `pediuno` ORIGINALLLLLLL (
  `OPERACION` int(11) DEFAULT NULL,
  `CODCLI` varchar(4) DEFAULT NULL,
  `CODPRO` varchar(4) DEFAULT NULL,
  `FECHAOP` date DEFAULT NULL,
  `NOTAGAL` varchar(50) DEFAULT NULL,
  `NOTAREC` varchar(30) DEFAULT NULL,
  `RECARGO` double DEFAULT NULL,
  `FLETE` varchar(40) DEFAULT NULL,
  `FECHAFL` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

	*/

	//***************************listpre1**********************************************
	/*
	$res = ejecutar_sql2("select * from listpre1");
	
	while($reg = mysql_fetch_array($res))
	{
		$sql = "insert into listpre1 
		(
			`CODPRO`,`TITULO`,`DETALLE`,`ENPAQUE`,
			`COLUM3`,`IMPUESTO`,`DESCUENTO`	
		 )
  
	values
	
		(
		'{$reg[CODPRO]}','{$reg[TITULO]}','{$reg[DETALLE]}','{$reg[ENPAQUE]}','{$reg[COLUM3]}',
		'{$reg[IMPUESTO]}','{$reg[DESCUENTO]}'
		)
	
		";
		echo $sql . "<hr>";
		ejecutar_sql($sql);
	}
	*/
	
	/*
		 `CODPRO` varchar(4) DEFAULT NULL,
  `TITULO` varchar(40) DEFAULT NULL,
  `DETALLE` varchar(55) DEFAULT NULL,
  `ENPAQUE` int(11) DEFAULT NULL,
  `COLUM3` double DEFAULT NULL,
  `IMPUESTO` double DEFAULT NULL,
  `DESCUENTO` double DEFAULT NULL
	
		CREATE TABLE `listpre1` (
  `idahora` int(11) NOT NULL AUTO_INCREMENT,
  `CODPRO` varchar(4) NOT NULL DEFAULT '',
  `TITULO` varchar(40) DEFAULT NULL,
  `DETALLE` varchar(55) DEFAULT NULL,
  `ENPAQUE` int(11) DEFAULT NULL,
  `COLUM3` double DEFAULT NULL,
  `IMPUESTO` double DEFAULT NULL,
  `DESCUENTO` double DEFAULT NULL,
  PRIMARY KEY (`idahora`)
) ENGINE=MyISAM AUTO_INCREMENT=3680 DEFAULT CHARSET=latin1;
	
	*/
	
	//***************************PROVEEDORES**********************************************
	/*
	$res = ejecutar_sql2("select * from prove_1,prove_2,prove_3 where 
	 prove_1.CODPRO = prove_2.CODPRO and prove_2.CODPRO = prove_3.CODPRO");
	
	while($reg = mysql_fetch_array($res))
	{
		$sql = "insert into proveedores 
		(
		CODPRO ,PROVEEDOR ,AUTO_TEL,TELS_F ,TELFAX_F,DIR_F ,
  C_POSTAL_F ,TELS_O,TELFAX_O,DIR_O ,C_POSTAL_O,CUIT ,INGRESOS,
  AGENTE_R ,AGENTE_P ,GANANCIAS,TITULAR ,TEL_T ,DIRE_T ,C_POSTAL_T ,
  GERENTE,TEL_G,DIRE_G ,C_POSTAL_G ,VENDEDOR ,NOTAS ,pg )
  
	values
	
		(
		'{$reg[CODPRO]}','{$reg[PROVEEDOR]}','{$reg[AUTO_TEL]}','{$reg[TELS_F]}','{$reg[TELFAX_F]}',
		'{$reg[DIR_F]}','{$reg[C_POSTAL_F]}','{$reg[TELS_O]}','{$reg[TELFAX_O]}','{$reg[DIR_O]}',
		'{$reg[C_POSTAL_O]}','{$reg[CUIT]}','{$reg[INGRESOS]}','{$reg[AGENTE_R]}','{$reg[AGENTE_P]}',
		'{$reg[GANANCIAS]}','{$reg[TITULAR]}','{$reg[TEL_T]}','{$reg[DIRE_T]}','{$reg[C_POSTAL_T]}',
		'{$reg[GERENTE]}','{$reg[TEL_G]}','{$reg[DIRE_G]}','{$reg[C_POSTAL_G]}','{$reg[VENDEDOR]}',
		'{$reg[NOTAS]}','{$reg[pg]}'
		)
	
		";
		echo $sql . "<hr>";
		ejecutar_sql($sql);
	}
	*/
	
	/*
	`CODPRO` varchar(4) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `PROVEEDOR` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `AUTO_TEL` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `TELS_F` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `TELFAX_F` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `DIR_F` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `C_POSTAL_F` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `TELS_O` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `TELFAX_O` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `DIR_O` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `C_POSTAL_O` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `CUIT` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `INGRESOS` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `AGENTE_R` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `AGENTE_P` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `GANANCIAS` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `TITULAR` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `TEL_T` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `DIRE_T` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `C_POSTAL_T` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `GERENTE` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `TEL_G` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `DIRE_G` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `C_POSTAL_G` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `VENDEDOR` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `NOTAS` text CHARACTER SET latin1,
  `pg` varchar(255) DEFAULT NULL,
	
	
	CREATE TABLE `prove_1` (
  `CODPRO` varchar(4) DEFAULT NULL,
  `PROVEEDOR` varchar(40) DEFAULT NULL,
  `PRO_G_1` varchar(22) DEFAULT NULL,
  `PRO_G_2` varchar(22) DEFAULT NULL,
  `AUTO_TEL` varchar(12) DEFAULT NULL,
  `TELS_F` varchar(25) DEFAULT NULL,
  `TELFAX_F` varchar(12) DEFAULT NULL,
  `DIR_F` varchar(33) DEFAULT NULL,
  `C_POSTAL_F` varchar(30) DEFAULT NULL,
  `TELS_O` varchar(25) DEFAULT NULL,
  `TELFAX_O` varchar(12) DEFAULT NULL,
  `DIR_O` varchar(33) DEFAULT NULL,
  `C_POSTAL_O` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for prove_2
-- ----------------------------
CREATE TABLE `prove_2` (
  `CODPRO` varchar(4) DEFAULT NULL,
  `CUIT` varchar(14) DEFAULT NULL,
  `INGRESOS` varchar(14) DEFAULT NULL,
  `AGENTE_R` varchar(1) DEFAULT NULL,
  `AGENTE_P` varchar(1) DEFAULT NULL,
  `GANANCIAS` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for prove_3
-- ----------------------------
CREATE TABLE `prove_3` (
  `CODPRO` varchar(4) DEFAULT NULL,
  `TITULAR` varchar(20) DEFAULT NULL,
  `TEL_T` varchar(12) DEFAULT NULL,
  `DIRE_T` varchar(33) DEFAULT NULL,
  `C_POSTAL_T` varchar(30) DEFAULT NULL,
  `GERENTE` varchar(20) DEFAULT NULL,
  `TEL_G` varchar(12) DEFAULT NULL,
  `DIRE_G` varchar(33) DEFAULT NULL,
  `C_POSTAL_G` varchar(30) DEFAULT NULL,
  `VENDEDOR` varchar(15) DEFAULT NULL,
  `NOTAS` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	
	*/
	
	
	
	
	//***************************CLIENTES**********************************************
	/*
	$res = ejecutar_sql2("select * from client_1,client_2,client_3 where 
	 client_1.CODCLI = client_2.CODCLI and client_2.CODCLI = client_3.CODCLI");
	
	while($reg = mysql_fetch_array($res))
	{
		$sql = "insert into clientes 
		(CODCLI,CLIENTE,SUPERMER,DIRECCION,
  C_POSTAL,PROVINCIA,TELEFONOS,AUTO_TEL,TELE_FAX,CUIT,
  INGRESOS_B,AGENTE_R,AGENTE_P,GANANCIAS,TITULAR,DIRECC_T,
  POSTAL_T,TELPART_T,GERENTE,DIRECC_G,POSTAL_G,TELPART_G,SECRETARIA,
  TELE_MAN,NOTAS)
  
	values
	
		('{$reg['CODCLI']}','{$reg['CLIENTE']}','{$reg['SUPERMER']}','{$reg['DIRECCION']}',
  '{$reg['C_POSTAL']}','{$reg['PROVINCIA']}','{$reg['TELEFONOS']}','{$reg['AUTO_TEL']}','{$reg['TELE_FAX']}','{$reg['CUIT']}',
  '{$reg['INGRESOS_B']}','{$reg['AGENTE_R']}','{$reg['AGENTE_P']}','{$reg['GANANCIAS']}','{$reg['TITULAR']}','{$reg['DIRECC_T']}',
  '{$reg['POSTAL_T']}','{$reg['TELPART_T']}','{$reg['GERENTE']}','{$reg['DIRECC_G']}','{$reg['POSTAL_G']}','{$reg['TELPART_G']}','{$reg['SECRETARIA']}',
  '{$reg['TELE_MAN']}','{$reg['NOTAS']}')
	
		";
		echo $sql . "<hr>";
		ejecutar_sql($sql);
	}
	*/
	
	/*
		CREATE TABLE 'client_1' (
  'CODCLI' varchar(4) DEFAULT NULL,
  'CLIENTE' varchar(40) DEFAULT NULL,
  'SUPERMER' varchar(20) DEFAULT NULL,
  'DIRECCION' varchar(33) DEFAULT NULL,
  'C_POSTAL' varchar(30) DEFAULT NULL,
  'PROVINCIA' varchar(16) DEFAULT NULL,
  'TELEFONOS' varchar(25) DEFAULT NULL,
  'AUTO_TEL' varchar(11) DEFAULT NULL,
  'TELE_FAX' varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for client_2
-- ----------------------------
CREATE TABLE 'client_2' (
  'CODCLI' varchar(4) DEFAULT NULL,
  'CUIT' varchar(14) DEFAULT NULL,
  'INGRESOS_B' varchar(14) DEFAULT NULL,
  'AGENTE_R' varchar(1) DEFAULT NULL,
  'AGENTE_P' varchar(1) DEFAULT NULL,
  'GANANCIAS' varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for client_3
-- ----------------------------
CREATE TABLE 'client_3' (
  'CODCLI' varchar(4) DEFAULT NULL,
  'TITULAR' varchar(20) DEFAULT NULL,
  'DIRECC_T' varchar(33) DEFAULT NULL,
  'POSTAL_T' varchar(30) DEFAULT NULL,
  'TELPART_T' varchar(9) DEFAULT NULL,
  'GERENTE' varchar(19) DEFAULT NULL,
  'DIRECC_G' varchar(33) DEFAULT NULL,
  'POSTAL_G' varchar(30) DEFAULT NULL,
  'TELPART_G' varchar(9) DEFAULT NULL,
  'SECRETARIA' varchar(15) DEFAULT NULL,
  'TELE_MAN' varchar(14) DEFAULT NULL,
  'NOTAS' varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	
	CREATE TABLE 'clientes' (
  'CODCLI' varchar(4) NOT NULL DEFAULT '',
  'CLIENTE' varchar(200) DEFAULT NULL,
  'SUPERMER' varchar(200) DEFAULT NULL,
  'DIRECCION' varchar(200) DEFAULT NULL,
  'C_POSTAL' varchar(200) DEFAULT NULL,
  'PROVINCIA' varchar(200) DEFAULT NULL,
  'TELEFONOS' varchar(200) DEFAULT NULL,
  'AUTO_TEL' varchar(200) DEFAULT NULL,
  'TELE_FAX' varchar(200) DEFAULT NULL,
  'CUIT' varchar(200) DEFAULT NULL,
  'INGRESOS_B' varchar(200) DEFAULT NULL,
  'AGENTE_R' varchar(1) DEFAULT NULL,
  'AGENTE_P' varchar(1) DEFAULT NULL,
  'GANANCIAS' varchar(200) DEFAULT NULL,
  'TITULAR' varchar(200) DEFAULT NULL,
  'DIRECC_T' varchar(200) DEFAULT NULL,
  'POSTAL_T' varchar(200) DEFAULT NULL,
  'TELPART_T' varchar(200) DEFAULT NULL,
  'GERENTE' varchar(200) DEFAULT NULL,
  'DIRECC_G' varchar(200) DEFAULT NULL,
  'POSTAL_G' varchar(200) DEFAULT NULL,
  'TELPART_G' varchar(200) DEFAULT NULL,
  'SECRETARIA' varchar(200) DEFAULT NULL,
  'TELE_MAN' varchar(200) DEFAULT NULL,
  'NOTAS' text,
  PRIMARY KEY ('CODCLI'),
  FULLTEXT KEY 'codclie' ('CODCLI'),
  FULLTEXT KEY 'cliente' ('CLIENTE'),
  FULLTEXT KEY 'gerente' ('GERENTE'),
  FULLTEXT KEY 'titular' ('TITULAR'),
  FULLTEXT KEY 'supermer' ('SUPERMER')
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
	
	
	*/
	
?>



