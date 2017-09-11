-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.11-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para clinica
DROP DATABASE IF EXISTS `clinica`;
CREATE DATABASE IF NOT EXISTS `clinica` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `clinica`;

-- Copiando estrutura para tabela clinica.clinica
DROP TABLE IF EXISTS `clinica`;
CREATE TABLE IF NOT EXISTS `clinica` (
  `ClinicaId` int(4) NOT NULL AUTO_INCREMENT,
  `Login` varchar(255) NOT NULL DEFAULT '0',
  `Senha` varchar(12) NOT NULL DEFAULT '0',
  `Nome` varchar(500) NOT NULL DEFAULT '0',
  `Descricao` varchar(1500) NOT NULL DEFAULT '0',
  `Logradouro` varchar(255) NOT NULL DEFAULT '0',
  `Numero` varchar(12) NOT NULL DEFAULT '0',
  `Bairro` varchar(80) NOT NULL DEFAULT '0',
  `Cidade` varchar(80) NOT NULL DEFAULT '0',
  `Estado` varchar(80) NOT NULL DEFAULT '0',
  `Cep` varchar(18) NOT NULL DEFAULT '0',
  `Latitude` varchar(60) NOT NULL DEFAULT '0',
  `Longitude` varchar(60) NOT NULL DEFAULT '0',
  `Telefone1` varchar(20) NOT NULL DEFAULT '0',
  `Telefone2` varchar(20) NOT NULL DEFAULT '0',
  `Telefone3` varchar(20) NOT NULL DEFAULT '0',
  `Email1` varchar(255) NOT NULL DEFAULT '0',
  `Email2` varchar(255) NOT NULL DEFAULT '0',
  `Email3` varchar(255) NOT NULL DEFAULT '0',
  `EmailContato` varchar(255) NOT NULL DEFAULT '0' COMMENT '/* Email para receber os Contatos */',
  PRIMARY KEY (`ClinicaId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela clinica.clinica: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `clinica` DISABLE KEYS */;
REPLACE INTO `clinica` (`ClinicaId`, `Login`, `Senha`, `Nome`, `Descricao`, `Logradouro`, `Numero`, `Bairro`, `Cidade`, `Estado`, `Cep`, `Latitude`, `Longitude`, `Telefone1`, `Telefone2`, `Telefone3`, `Email1`, `Email2`, `Email3`, `EmailContato`) VALUES
	(1, 'renanvieira@id.uff.br', '123456', 'Clinica UroFisio', 'Clinica de urofisioterapia Descricao', 'Rua Alexandre moura', '51', 'Gragoatá', 'Niterói', 'Rio de Janeiro', '24426430', '101010', '202020', '(21) 0000-0000', '(21) 9999-9999', '', 'renanvieira@id.uff.br', 'renanvieira2@id.uff.br', '', 'contato@teste.com');
/*!40000 ALTER TABLE `clinica` ENABLE KEYS */;

-- Copiando estrutura para tabela clinica.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `MenuId` tinyint(4) NOT NULL AUTO_INCREMENT,
  `Label` varchar(20) NOT NULL DEFAULT '0',
  `Url` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MenuId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela clinica.menu: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
REPLACE INTO `menu` (`MenuId`, `Label`, `Url`) VALUES
	(1, 'A Empresa', ''),
	(2, 'Serviços', ''),
	(3, 'Fotos', ''),
	(4, 'Local', ''),
	(5, 'Contato', '');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Copiando estrutura para tabela clinica.menu_clinica
DROP TABLE IF EXISTS `menu_clinica`;
CREATE TABLE IF NOT EXISTS `menu_clinica` (
  `MenuId` tinyint(4) NOT NULL,
  `ClinicaId` int(4) NOT NULL,
  KEY `FK_menu_clinica_menu` (`MenuId`),
  KEY `FK_menu_clinica_clinica` (`ClinicaId`),
  CONSTRAINT `FK_menu_clinica_menu` FOREIGN KEY (`MenuId`) REFERENCES `menu` (`MenuId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_menu_clinica_clinica` FOREIGN KEY (`ClinicaId`) REFERENCES `clinica` (`ClinicaId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela clinica.menu_clinica: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `menu_clinica` DISABLE KEYS */;
REPLACE INTO `menu_clinica` (`MenuId`, `ClinicaId`) VALUES
	(1, 1),
	(2, 1),
	(3, 1);
/*!40000 ALTER TABLE `menu_clinica` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
