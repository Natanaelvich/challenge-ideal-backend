/*
SQLyog  v11.01 (32 bit)
MySQL - 5.5.24-log : Database - appteste
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


/*Table structure for table `projeto` */

DROP TABLE IF EXISTS `projeto`;

CREATE TABLE `projeto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;


/*Table structure for table `atividade` */

DROP TABLE IF EXISTS `atividade`;

CREATE TABLE `atividade` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dataCadastro` datetime DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `idProjeto` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idxprojeto` (`idProjeto`),
  CONSTRAINT `idxprojeto` FOREIGN KEY (`idProjeto`) REFERENCES `projeto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
