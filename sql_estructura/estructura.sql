-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: scp
-- ------------------------------------------------------
-- Server version	5.5.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actualizaciones`
--

DROP TABLE IF EXISTS `actualizaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actualizaciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NULL DEFAULT NULL,
  `commit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `backup_log`
--

DROP TABLE IF EXISTS `backup_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backup_log` (
  `realizado` varchar(255) DEFAULT NULL,
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cl_imp`
--

DROP TABLE IF EXISTS `cl_imp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cl_imp` (
  `CODCLI` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuracion` (
  `constante` varchar(255) DEFAULT NULL,
  `valor` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cta`
--

DROP TABLE IF EXISTS `cta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ctasclie`
--

DROP TABLE IF EXISTS `ctasclie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `l2`
--

DROP TABLE IF EXISTS `l2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l2` (
  `CODPRO` varchar(4) DEFAULT NULL,
  `TITULO` varchar(40) DEFAULT NULL,
  `DETALLE` varchar(55) DEFAULT NULL,
  `ENPAQUE` int(11) DEFAULT NULL,
  `COLUM3` double DEFAULT NULL,
  `IMPUESTO` double DEFAULT NULL,
  `DESCUENTO` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `li`
--

DROP TABLE IF EXISTS `li`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `li` (
  `CODPRO` varchar(4) DEFAULT NULL,
  `TITULO` varchar(40) DEFAULT NULL,
  `DETALLE` varchar(55) DEFAULT NULL,
  `ENPAQUE` int(11) DEFAULT NULL,
  `COLUM3` double DEFAULT NULL,
  `IMPUESTO` double DEFAULT NULL,
  `DESCUENTO` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `list_pro`
--

DROP TABLE IF EXISTS `list_pro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `list_pro` (
  `CODIGO` varchar(4) DEFAULT NULL,
  `PRODUCTO` varchar(20) DEFAULT NULL,
  `PRESENTA` varchar(25) DEFAULT NULL,
  `CARACTERES` varchar(25) DEFAULT NULL,
  `PRECIO` varchar(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `listpre0`
--

DROP TABLE IF EXISTS `listpre0`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listpre0` (
  `TITULO` varchar(40) DEFAULT NULL,
  `CODPRO` varchar(4) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `COL003` varchar(8) DEFAULT NULL,
  `RESUM0` varchar(50) DEFAULT NULL,
  `RESUM1` varchar(50) DEFAULT NULL,
  `RESUM2` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `listpre1`
--

DROP TABLE IF EXISTS `listpre1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `p1`
--

DROP TABLE IF EXISTS `p1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pedi002`
--

DROP TABLE IF EXISTS `pedi002`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pedi002_tmp`
--

DROP TABLE IF EXISTS `pedi002_tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pediuno`
--

DROP TABLE IF EXISTS `pediuno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `prod_gs`
--

DROP TABLE IF EXISTS `prod_gs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_gs` (
  `PROD_G` varchar(22) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `realizados`
--

DROP TABLE IF EXISTS `realizados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `realizados` (
  `realizado` varchar(255) DEFAULT NULL,
  `id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `restaurados`
--

DROP TABLE IF EXISTS `restaurados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurados` (
  `id` tinyint(4) NOT NULL DEFAULT '0',
  `restaurado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `setup`
--

DROP TABLE IF EXISTS `setup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `valores`
--

DROP TABLE IF EXISTS `valores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valores` (
  `IVA` double DEFAULT NULL,
  `MEDIOIVA` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-12-30 20:19:20
