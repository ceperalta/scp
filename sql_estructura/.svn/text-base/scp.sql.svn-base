-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2009 at 03:31 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `scp`
--

-- --------------------------------------------------------

--
-- Table structure for table `backup_log`
--

CREATE TABLE IF NOT EXISTS `backup_log` (
  `id` tinyint(4) NOT NULL default '1',
  `realizado` varchar(255) default NULL,
  `restaurado` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
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

-- --------------------------------------------------------

--
-- Table structure for table `cl_imp`
--

CREATE TABLE IF NOT EXISTS `cl_imp` (
  `CODCLI` varchar(4) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `constante` varchar(255) default NULL,
  `valor` text,
  `id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `cta`
--

CREATE TABLE IF NOT EXISTS `cta` (
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

-- --------------------------------------------------------

--
-- Table structure for table `ctasclie`
--

CREATE TABLE IF NOT EXISTS `ctasclie` (
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

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
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

-- --------------------------------------------------------

--
-- Table structure for table `l2`
--

CREATE TABLE IF NOT EXISTS `l2` (
  `CODPRO` varchar(4) default NULL,
  `TITULO` varchar(40) default NULL,
  `DETALLE` varchar(55) default NULL,
  `ENPAQUE` int(11) default NULL,
  `COLUM3` double default NULL,
  `IMPUESTO` double default NULL,
  `DESCUENTO` double default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `li`
--

CREATE TABLE IF NOT EXISTS `li` (
  `CODPRO` varchar(4) default NULL,
  `TITULO` varchar(40) default NULL,
  `DETALLE` varchar(55) default NULL,
  `ENPAQUE` int(11) default NULL,
  `COLUM3` double default NULL,
  `IMPUESTO` double default NULL,
  `DESCUENTO` double default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `listpre0`
--

CREATE TABLE IF NOT EXISTS `listpre0` (
  `TITULO` varchar(40) default NULL,
  `CODPRO` varchar(4) default NULL,
  `FECHA` date default NULL,
  `COL003` varchar(8) default NULL,
  `RESUM0` varchar(50) default NULL,
  `RESUM1` varchar(50) default NULL,
  `RESUM2` varchar(50) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `listpre1`
--

CREATE TABLE IF NOT EXISTS `listpre1` (
  `CODPRO` varchar(4) default NULL,
  `TITULO` varchar(40) default NULL,
  `DETALLE` varchar(255) default NULL,
  `ENPAQUE` varchar(255) default NULL,
  `COLUM3` varchar(255) default NULL,
  `IMPUESTO` varchar(255) default NULL,
  `DESCUENTO` varchar(255) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `list_pro`
--

CREATE TABLE IF NOT EXISTS `list_pro` (
  `CODIGO` varchar(4) default NULL,
  `PRODUCTO` varchar(20) default NULL,
  `PRESENTA` varchar(25) default NULL,
  `CARACTERES` varchar(25) default NULL,
  `PRECIO` varchar(8) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p1`
--

CREATE TABLE IF NOT EXISTS `p1` (
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

-- --------------------------------------------------------

--
-- Table structure for table `pedi002`
--

CREATE TABLE IF NOT EXISTS `pedi002` (
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

-- --------------------------------------------------------

--
-- Table structure for table `pedi002_tmp`
--

CREATE TABLE IF NOT EXISTS `pedi002_tmp` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pediuno`
--

CREATE TABLE IF NOT EXISTS `pediuno` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10001 ;

-- --------------------------------------------------------

--
-- Table structure for table `prod_gs`
--

CREATE TABLE IF NOT EXISTS `prod_gs` (
  `PROD_G` varchar(22) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
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

-- --------------------------------------------------------

--
-- Table structure for table `setup`
--

CREATE TABLE IF NOT EXISTS `setup` (
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

-- --------------------------------------------------------

--
-- Table structure for table `valores`
--

CREATE TABLE IF NOT EXISTS `valores` (
  `IVA` double default NULL,
  `MEDIOIVA` double default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
