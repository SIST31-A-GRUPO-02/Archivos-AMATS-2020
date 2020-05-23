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
);

insert  into `usuario`(`id_user`,`usuario`,`nombre`,`pass`,`cargo`,`ganancia`,`socio`,`estado`,`principal`) values 
(1,'rodrigo123','Rodrigo Quintanilla  ','12345','Administrador',29.9867,'Permanente','Activo','Si'),
(2,'funes','Roberto Funes','12345','Administrador',29.9867,'Permanente','Activo',NULL),
(3,'wicho','Mauricio Luna','12345','Administrador',29.9867,'Permanente','Activo',NULL),


CREATE TABLE `activos` (
  `id_pasivo` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_pasivo`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `activos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
);

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
) ;


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
);


CREATE TABLE `iva_mensual` (
  `id_iva_mensual` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `iva_proyecto` float DEFAULT NULL,
  `iva_compra` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_iva_mensual`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `iva_mensual_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
);

CREATE TABLE `pago_ganancia_miembro` (
  `id_ganancia_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `ganancia_proyecto` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_ganancia_usuario`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `pago_ganancia_miembro_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
);

CREATE TABLE `renta` (
  `id_renta` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `cantidad_retencion_profesional` float DEFAULT NULL,
  `pago_cuenta` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_renta`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `renta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`)
);


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
);


