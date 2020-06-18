/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.10-MariaDB : Database - financiero
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`financiero` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `financiero`;


CREATE TABLE `usuario` (
  `id_user` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `ganancia` float DEFAULT NULL,
  `socio` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `principal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_user` (`id_user`)
) ;

insert  into `usuario`(`id_user`,`usuario`,`nombre`,`pass`,`cargo`,`ganancia`,`socio`,`estado`,`principal`) values 
(1,'rodrigo123','Rodrigo Quintanilla  ','12345','Administrador',33.32,'Permanente','Activo','Si'),
(2,'funes','Roberto Funes','12345','Administrador',33.32,'Permanente','Activo',NULL),
(3,'wicho','Mauricio Luna','12345','Administrador',33.32,'Permanente','Activo',NULL);


CREATE TABLE `activos` (
  `id_pasivo` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_pasivo`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `activos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) 




CREATE TABLE `desc_activo` (
  `id_corriente` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `cantidad_compras` float DEFAULT NULL,
  `cantidad_viaticos` float DEFAULT NULL,
  `cantidad_servicio_profesional` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_corriente`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `desc_activo_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) 


CREATE TABLE `egresos_renta` (
  `id_renta_egreso` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `retencion_renta` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_renta_egreso`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `egresos_renta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `incrementos` (
  `id_incremento` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `descripcion_incremento` varchar(100) DEFAULT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_incremento`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `incrementos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;



CREATE TABLE `iva_egresos` (
  `id_iva_egreso` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `cantidad_compras` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_iva_egreso`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `iva_egresos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;


CREATE TABLE `iva_mensual` (
  `id_iva_mensual` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `iva_proyecto` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_iva_mensual`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `iva_mensual_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;



CREATE TABLE `pago_ganancia_miembro` (
  `id_ganancia_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `ganancia_proyecto` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_ganancia_usuario`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `pago_ganancia_miembro_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) 




CREATE TABLE `renta` (
  `id_renta` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `pago_cuenta` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_renta`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `renta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) 



CREATE TABLE `ventas` (
  `id_venta` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `categoria_venta` varchar(100) DEFAULT NULL,
  `descrip_venta` varchar(200) DEFAULT NULL,
  `costo_proyecto` float DEFAULT NULL,
  `ganancia_porcentaje` float DEFAULT NULL,
  `ganancia_sinIva` float DEFAULT NULL,
  `total_venta` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
) ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
