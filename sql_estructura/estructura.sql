-- MySQL dump 10.11
--
-- Host: localhost    Database: scp-real
-- ------------------------------------------------------
-- Server version	5.0.51a

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
-- Table structure for table `cl_imp`
--

DROP TABLE IF EXISTS `cl_imp`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `cl_imp` (
  `CODCLI` varchar(4) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `clientes` (
  `CODCLI` varchar(4) NOT NULL default '',
  `CLIENTE` varchar(200) default NULL,
  `SUPERMER` varchar(200) default NULL,
  `DIRECCION` varchar(200) default NULL,
  `C_POSTAL` varchar(200) default NULL,
  `PROVINCIA` varchar(200) default NULL,
  `TELEFONOS` varchar(200) default NULL,
  `AUTO_TEL` varchar(200) default NULL,
  `TELE_FAX` varchar(200) default NULL,
  `CUIT` varchar(200) default NULL,
  `INGRESOS_B` varchar(200) default NULL,
  `AGENTE_R` varchar(1) default NULL,
  `AGENTE_P` varchar(1) default NULL,
  `GANANCIAS` varchar(200) default NULL,
  `TITULAR` varchar(200) default NULL,
  `DIRECC_T` varchar(200) default NULL,
  `POSTAL_T` varchar(200) default NULL,
  `TELPART_T` varchar(200) default NULL,
  `GERENTE` varchar(200) default NULL,
  `DIRECC_G` varchar(200) default NULL,
  `POSTAL_G` varchar(200) default NULL,
  `TELPART_G` varchar(200) default NULL,
  `SECRETARIA` varchar(200) default NULL,
  `TELE_MAN` varchar(200) default NULL,
  `NOTAS` text,
  PRIMARY KEY  (`CODCLI`),
  FULLTEXT KEY `codclie` (`CODCLI`),
  FULLTEXT KEY `cliente` (`CLIENTE`),
  FULLTEXT KEY `gerente` (`GERENTE`),
  FULLTEXT KEY `titular` (`TITULAR`),
  FULLTEXT KEY `supermer` (`SUPERMER`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `configuracion` (
  `constante` varchar(255) default NULL,
  `valor` text,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `cta`
--

DROP TABLE IF EXISTS `cta`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `cta` (
  `OPERACION` int(11) default NULL,
  `CODCLI` varchar(4) default NULL,
  `CODPRO` varchar(4) default NULL,
  `TIPOCOM` varchar(1) default NULL,
  `NROCOM` varchar(5) default NULL,
  `FCHVTO` date default NULL,
  `DETALLE` varchar(28) default NULL,
  `DEBE` double default NULL,
  `HABER` double default NULL,
  `CLAVE` varchar(1) default NULL,
  `SALDO` double default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ctasclie`
--

DROP TABLE IF EXISTS `ctasclie`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `ctasclie` (
  `OPERACION` int(11) default NULL,
  `CODCLI` varchar(4) default NULL,
  `CODPRO` varchar(4) default NULL,
  `TIPOCOM` varchar(1) default NULL,
  `NROCOM` varchar(5) default NULL,
  `FCHVTO` date default NULL,
  `DETALLE` varchar(28) default NULL,
  `DEBE` double default NULL,
  `HABER` double default NULL,
  `CLAVE` varchar(1) default NULL,
  `SALDO` double default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `facturas` (
  `OPERACION` int(11) default NULL,
  `CODCLI` varchar(4) default NULL,
  `CODPRO` varchar(4) default NULL,
  `FECHA` date default NULL,
  `NRO_FACTUR` varchar(13) default NULL,
  `ESTADO1` int(11) default NULL,
  `ESTADO2` int(11) default NULL,
  `DESCRIPCIO` longtext,
  `IMPORTE` double default NULL,
  `PRIMERO` int(11) default NULL,
  `SEGUNDO` int(11) default NULL,
  `TERCERO` int(11) default NULL,
  `FECHA1` date default NULL,
  `FECHA2` date default NULL,
  `FECHA3` date default NULL,
  `DEBE` double default NULL,
  `RETENCION` double default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `l2`
--

DROP TABLE IF EXISTS `l2`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `l2` (
  `CODPRO` varchar(4) default NULL,
  `TITULO` varchar(40) default NULL,
  `DETALLE` varchar(55) default NULL,
  `ENPAQUE` int(11) default NULL,
  `COLUM3` double default NULL,
  `IMPUESTO` double default NULL,
  `DESCUENTO` double default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `li`
--

DROP TABLE IF EXISTS `li`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `li` (
  `CODPRO` varchar(4) default NULL,
  `TITULO` varchar(40) default NULL,
  `DETALLE` varchar(55) default NULL,
  `ENPAQUE` int(11) default NULL,
  `COLUM3` double default NULL,
  `IMPUESTO` double default NULL,
  `DESCUENTO` double default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `list_pro`
--

DROP TABLE IF EXISTS `list_pro`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `list_pro` (
  `CODIGO` varchar(4) default NULL,
  `PRODUCTO` varchar(20) default NULL,
  `PRESENTA` varchar(25) default NULL,
  `CARACTERES` varchar(25) default NULL,
  `PRECIO` varchar(8) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `listpre0`
--

DROP TABLE IF EXISTS `listpre0`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `listpre0` (
  `TITULO` varchar(40) default NULL,
  `CODPRO` varchar(4) default NULL,
  `FECHA` date default NULL,
  `COL003` varchar(8) default NULL,
  `RESUM0` varchar(50) default NULL,
  `RESUM1` varchar(50) default NULL,
  `RESUM2` varchar(50) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `listpre1`
--

DROP TABLE IF EXISTS `listpre1`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `listpre1` (
  `idahora` int(11) NOT NULL auto_increment,
  `CODPRO` varchar(4) NOT NULL default '',
  `TITULO` varchar(40) default NULL,
  `DETALLE` varchar(55) default NULL,
  `ENPAQUE` int(11) default NULL,
  `COLUM3` double default NULL,
  `IMPUESTO` double default NULL,
  `DESCUENTO` double default NULL,
  PRIMARY KEY  (`idahora`)
) ENGINE=MyISAM AUTO_INCREMENT=3680 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `p1`
--

DROP TABLE IF EXISTS `p1`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `p1` (
  `OPERACION` int(11) default NULL,
  `CODCLI` varchar(4) default NULL,
  `CODPRO` varchar(4) default NULL,
  `FECHAOP` date default NULL,
  `NOTAGAL` varchar(50) default NULL,
  `NOTAREC` varchar(30) default NULL,
  `RECARGO` double default NULL,
  `FLETE` varchar(40) default NULL,
  `FECHAFL` date default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pedi002`
--

DROP TABLE IF EXISTS `pedi002`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pedi002` (
  `OPERACION` int(11) default NULL,
  `FECHA` date default NULL,
  `CODPRO` varchar(4) default NULL,
  `CODCLI` varchar(4) default NULL,
  `CANTIDAD` int(11) default NULL,
  `ENPAQUE` int(11) default NULL,
  `DETALLE` varchar(255) default NULL,
  `IMPORTE` double default NULL,
  `UNITARIO` double default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pedi002_tmp`
--

DROP TABLE IF EXISTS `pedi002_tmp`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pedi002_tmp` (
  `id` int(11) NOT NULL auto_increment,
  `OPERACION` int(11) NOT NULL default '0',
  `FECHA` date default NULL,
  `CODPRO` varchar(4) default NULL,
  `CODCLI` varchar(4) default NULL,
  `CANTIDAD` int(11) default NULL,
  `ENPAQUE` int(11) default NULL,
  `DETALLE` varchar(255) default NULL,
  `IMPORTE` double default NULL,
  `UNITARIO` double default NULL,
  `DESCUENTO` double default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pediuno`
--

DROP TABLE IF EXISTS `pediuno`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pediuno` (
  `OPERACION` int(11) NOT NULL auto_increment,
  `CODCLI` varchar(4) default NULL,
  `CODPRO` varchar(4) default NULL,
  `FECHAOP` date default NULL,
  `NOTAGAL` varchar(255) default NULL,
  `NOTAREC` varchar(255) default NULL,
  `RECARGO` double default NULL,
  `FLETE` varchar(255) default NULL,
  `FECHAFL` date default NULL,
  `notas` text,
  PRIMARY KEY  (`OPERACION`)
) ENGINE=MyISAM AUTO_INCREMENT=10001 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `prod_gs`
--

DROP TABLE IF EXISTS `prod_gs`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `prod_gs` (
  `PROD_G` varchar(22) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `proveedores` (
  `CODPRO` varchar(4) character set latin1 NOT NULL default '',
  `PROVEEDOR` varchar(200) character set latin1 default NULL,
  `AUTO_TEL` varchar(200) character set latin1 default NULL,
  `TELS_F` varchar(200) character set latin1 default NULL,
  `TELFAX_F` varchar(200) character set latin1 default NULL,
  `DIR_F` varchar(200) character set latin1 default NULL,
  `C_POSTAL_F` varchar(200) character set latin1 default NULL,
  `TELS_O` varchar(200) character set latin1 default NULL,
  `TELFAX_O` varchar(200) character set latin1 default NULL,
  `DIR_O` varchar(200) character set latin1 default NULL,
  `C_POSTAL_O` varchar(200) character set latin1 default NULL,
  `CUIT` varchar(200) character set latin1 default NULL,
  `INGRESOS` varchar(200) character set latin1 default NULL,
  `AGENTE_R` varchar(1) character set latin1 default NULL,
  `AGENTE_P` varchar(1) character set latin1 default NULL,
  `GANANCIAS` varchar(200) character set latin1 default NULL,
  `TITULAR` varchar(200) character set latin1 default NULL,
  `TEL_T` varchar(200) character set latin1 default NULL,
  `DIRE_T` varchar(200) character set latin1 default NULL,
  `C_POSTAL_T` varchar(200) character set latin1 default NULL,
  `GERENTE` varchar(200) character set latin1 default NULL,
  `TEL_G` varchar(200) character set latin1 default NULL,
  `DIRE_G` varchar(200) character set latin1 default NULL,
  `C_POSTAL_G` varchar(200) character set latin1 default NULL,
  `VENDEDOR` varchar(200) character set latin1 default NULL,
  `NOTAS` text character set latin1,
  `pg` varchar(255) default NULL,
  PRIMARY KEY  (`CODPRO`),
  FULLTEXT KEY `codpro` (`CODPRO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `setup`
--

DROP TABLE IF EXISTS `setup`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `setup` (
  `UNO` int(11) default NULL,
  `DOS` int(11) default NULL,
  `TRES` int(11) default NULL,
  `CUATRO` int(11) default NULL,
  `CINCO` int(11) default NULL,
  `SEIS` int(11) default NULL,
  `SIETE` int(11) default NULL,
  `TIT1` varchar(70) default NULL,
  `TIT11` varchar(70) default NULL,
  `TIT2` varchar(70) default NULL,
  `TIT22` varchar(70) default NULL,
  `TIT3` varchar(70) default NULL,
  `TIT4` varchar(70) default NULL,
  `TIT5` varchar(70) default NULL,
  `TIT6` varchar(70) default NULL,
  `TIT7` varchar(70) default NULL,
  `TIT8` varchar(70) default NULL,
  `TIT9` varchar(70) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `valores`
--

DROP TABLE IF EXISTS `valores`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `valores` (
  `IVA` double default NULL,
  `MEDIOIVA` double default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-04-26  1:01:17
