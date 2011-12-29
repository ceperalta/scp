/*
MySQL Data Transfer
Source Host: localhost
Source Database: scp
Target Host: localhost
Target Database: scp
Date: 12/28/2011 10:23:49 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for actualizaciones
-- ----------------------------
CREATE TABLE `actualizaciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NULL DEFAULT NULL,
  `commit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for backup_log
-- ----------------------------
CREATE TABLE `backup_log` (
  `realizado` varchar(255) DEFAULT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for cl_imp
-- ----------------------------
CREATE TABLE `cl_imp` (
  `CODCLI` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
CREATE TABLE `clientes` (
  `CODCLI` varchar(4) NOT NULL DEFAULT '',
  `CLIENTE` varchar(200) DEFAULT NULL,
  `SUPERMER` varchar(200) DEFAULT NULL,
  `DIRECCION` varchar(200) DEFAULT NULL,
  `C_POSTAL` varchar(200) DEFAULT NULL,
  `PROVINCIA` varchar(200) DEFAULT NULL,
  `TELEFONOS` varchar(200) DEFAULT NULL,
  `AUTO_TEL` varchar(200) DEFAULT NULL,
  `TELE_FAX` varchar(200) DEFAULT NULL,
  `CUIT` varchar(200) DEFAULT NULL,
  `INGRESOS_B` varchar(200) DEFAULT NULL,
  `AGENTE_R` varchar(1) DEFAULT NULL,
  `AGENTE_P` varchar(1) DEFAULT NULL,
  `GANANCIAS` varchar(200) DEFAULT NULL,
  `TITULAR` varchar(200) DEFAULT NULL,
  `DIRECC_T` varchar(200) DEFAULT NULL,
  `POSTAL_T` varchar(200) DEFAULT NULL,
  `TELPART_T` varchar(200) DEFAULT NULL,
  `GERENTE` varchar(200) DEFAULT NULL,
  `DIRECC_G` varchar(200) DEFAULT NULL,
  `POSTAL_G` varchar(200) DEFAULT NULL,
  `TELPART_G` varchar(200) DEFAULT NULL,
  `SECRETARIA` varchar(200) DEFAULT NULL,
  `TELE_MAN` varchar(200) DEFAULT NULL,
  `NOTAS` text,
  PRIMARY KEY (`CODCLI`),
  FULLTEXT KEY `codclie` (`CODCLI`),
  FULLTEXT KEY `cliente` (`CLIENTE`),
  FULLTEXT KEY `gerente` (`GERENTE`),
  FULLTEXT KEY `titular` (`TITULAR`),
  FULLTEXT KEY `supermer` (`SUPERMER`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for configuracion
-- ----------------------------
CREATE TABLE `configuracion` (
  `constante` varchar(255) DEFAULT NULL,
  `valor` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for cta
-- ----------------------------
CREATE TABLE `cta` (
  `OPERACION` int(11) DEFAULT NULL,
  `CODCLI` varchar(4) DEFAULT NULL,
  `CODPRO` varchar(4) DEFAULT NULL,
  `TIPOCOM` varchar(1) DEFAULT NULL,
  `NROCOM` varchar(5) DEFAULT NULL,
  `FCHVTO` date DEFAULT NULL,
  `DETALLE` varchar(28) DEFAULT NULL,
  `DEBE` double DEFAULT NULL,
  `HABER` double DEFAULT NULL,
  `CLAVE` varchar(1) DEFAULT NULL,
  `SALDO` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ctasclie
-- ----------------------------
CREATE TABLE `ctasclie` (
  `OPERACION` int(11) DEFAULT NULL,
  `CODCLI` varchar(4) DEFAULT NULL,
  `CODPRO` varchar(4) DEFAULT NULL,
  `TIPOCOM` varchar(1) DEFAULT NULL,
  `NROCOM` varchar(5) DEFAULT NULL,
  `FCHVTO` date DEFAULT NULL,
  `DETALLE` varchar(28) DEFAULT NULL,
  `DEBE` double DEFAULT NULL,
  `HABER` double DEFAULT NULL,
  `CLAVE` varchar(1) DEFAULT NULL,
  `SALDO` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for facturas
-- ----------------------------
CREATE TABLE `facturas` (
  `OPERACION` int(11) DEFAULT NULL,
  `CODCLI` varchar(4) DEFAULT NULL,
  `CODPRO` varchar(4) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `NRO_FACTUR` varchar(13) DEFAULT NULL,
  `ESTADO1` int(11) DEFAULT NULL,
  `ESTADO2` int(11) DEFAULT NULL,
  `DESCRIPCIO` longtext,
  `IMPORTE` double DEFAULT NULL,
  `PRIMERO` int(11) DEFAULT NULL,
  `SEGUNDO` int(11) DEFAULT NULL,
  `TERCERO` int(11) DEFAULT NULL,
  `FECHA1` date DEFAULT NULL,
  `FECHA2` date DEFAULT NULL,
  `FECHA3` date DEFAULT NULL,
  `DEBE` double DEFAULT NULL,
  `RETENCION` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for l2
-- ----------------------------
CREATE TABLE `l2` (
  `CODPRO` varchar(4) DEFAULT NULL,
  `TITULO` varchar(40) DEFAULT NULL,
  `DETALLE` varchar(55) DEFAULT NULL,
  `ENPAQUE` int(11) DEFAULT NULL,
  `COLUM3` double DEFAULT NULL,
  `IMPUESTO` double DEFAULT NULL,
  `DESCUENTO` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for li
-- ----------------------------
CREATE TABLE `li` (
  `CODPRO` varchar(4) DEFAULT NULL,
  `TITULO` varchar(40) DEFAULT NULL,
  `DETALLE` varchar(55) DEFAULT NULL,
  `ENPAQUE` int(11) DEFAULT NULL,
  `COLUM3` double DEFAULT NULL,
  `IMPUESTO` double DEFAULT NULL,
  `DESCUENTO` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for list_pro
-- ----------------------------
CREATE TABLE `list_pro` (
  `CODIGO` varchar(4) DEFAULT NULL,
  `PRODUCTO` varchar(20) DEFAULT NULL,
  `PRESENTA` varchar(25) DEFAULT NULL,
  `CARACTERES` varchar(25) DEFAULT NULL,
  `PRECIO` varchar(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for listpre0
-- ----------------------------
CREATE TABLE `listpre0` (
  `TITULO` varchar(40) DEFAULT NULL,
  `CODPRO` varchar(4) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `COL003` varchar(8) DEFAULT NULL,
  `RESUM0` varchar(50) DEFAULT NULL,
  `RESUM1` varchar(50) DEFAULT NULL,
  `RESUM2` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for listpre1
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=11009 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for p1
-- ----------------------------
CREATE TABLE `p1` (
  `OPERACION` int(11) DEFAULT NULL,
  `CODCLI` varchar(4) DEFAULT NULL,
  `CODPRO` varchar(4) DEFAULT NULL,
  `FECHAOP` date DEFAULT NULL,
  `NOTAGAL` varchar(50) DEFAULT NULL,
  `NOTAREC` varchar(30) DEFAULT NULL,
  `RECARGO` double DEFAULT NULL,
  `FLETE` varchar(40) DEFAULT NULL,
  `FECHAFL` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for pedi002
-- ----------------------------
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

-- ----------------------------
-- Table structure for pedi002_tmp
-- ----------------------------
CREATE TABLE `pedi002_tmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `OPERACION` int(11) NOT NULL DEFAULT '0',
  `FECHA` date DEFAULT NULL,
  `CODPRO` varchar(4) DEFAULT NULL,
  `CODCLI` varchar(4) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `ENPAQUE` int(11) DEFAULT NULL,
  `DETALLE` varchar(255) DEFAULT NULL,
  `IMPORTE` double DEFAULT NULL,
  `UNITARIO` double DEFAULT NULL,
  `DESCUENTO` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for pediuno
-- ----------------------------
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

-- ----------------------------
-- Table structure for prod_gs
-- ----------------------------
CREATE TABLE `prod_gs` (
  `PROD_G` varchar(22) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for proveedores
-- ----------------------------
CREATE TABLE `proveedores` (
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
  PRIMARY KEY (`CODPRO`),
  FULLTEXT KEY `codpro` (`CODPRO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for realizados
-- ----------------------------
CREATE TABLE `realizados` (
  `realizado` varchar(255) DEFAULT NULL,
  `id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for restaurados
-- ----------------------------
CREATE TABLE `restaurados` (
  `id` tinyint(4) NOT NULL DEFAULT '0',
  `restaurado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for setup
-- ----------------------------
CREATE TABLE `setup` (
  `UNO` int(11) DEFAULT NULL,
  `DOS` int(11) DEFAULT NULL,
  `TRES` int(11) DEFAULT NULL,
  `CUATRO` int(11) DEFAULT NULL,
  `CINCO` int(11) DEFAULT NULL,
  `SEIS` int(11) DEFAULT NULL,
  `SIETE` int(11) DEFAULT NULL,
  `TIT1` varchar(70) DEFAULT NULL,
  `TIT11` varchar(70) DEFAULT NULL,
  `TIT2` varchar(70) DEFAULT NULL,
  `TIT22` varchar(70) DEFAULT NULL,
  `TIT3` varchar(70) DEFAULT NULL,
  `TIT4` varchar(70) DEFAULT NULL,
  `TIT5` varchar(70) DEFAULT NULL,
  `TIT6` varchar(70) DEFAULT NULL,
  `TIT7` varchar(70) DEFAULT NULL,
  `TIT8` varchar(70) DEFAULT NULL,
  `TIT9` varchar(70) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for valores
-- ----------------------------
CREATE TABLE `valores` (
  `IVA` double DEFAULT NULL,
  `MEDIOIVA` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `configuracion` VALUES ('VERSION', '0.8', '11');
INSERT INTO `configuracion` VALUES ('TAMANIO_PAGINA_OPERACIONES', '50', '12');
INSERT INTO `configuracion` VALUES ('IVA', '21', '13');
INSERT INTO `configuracion` VALUES ('PATH_BASE_FS', 'c:\\\\xampp\\\\htdocs\\\\scp', '14');
INSERT INTO `configuracion` VALUES ('PATH_BASE_BIN_MYSQL', 'C:\\\\xampp\\\\mysql\\\\bin', '15');
INSERT INTO `configuracion` VALUES ('CARPETA_DE_BACKUP', 'C:\\\\Users\\\\martin\\\\Desktop', '16');
INSERT INTO `configuracion` VALUES ('GIT_EXE_PATH', 'c:\\\\Program Files\\\\Git\\\\bin\\\\git.exe', '17');
