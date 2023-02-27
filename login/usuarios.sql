/*
Navicat MySQL Data Transfer

Source Server         : asd
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : login

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2014-11-06 22:42:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `ID` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `APELLIDO` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `CLAVE` varchar(100) DEFAULT NULL,
  `NIVEL` varchar(100) DEFAULT NULL,
  `FECHA_ALTA` datetime DEFAULT NULL,
  `ESTADO` enum('activo','banneado') NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `sdfsdfsdfdsfdsf` (`EMAIL`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Bautista', 'Carloni', 'gr@dv.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', '2014-11-06 21:35:46', 'activo');
INSERT INTO `usuarios` VALUES ('2', null, null, 'facu@dv.net', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario', null, 'activo');
INSERT INTO `usuarios` VALUES ('3', null, null, 'facu2@dv.net', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario', '2014-11-06 21:41:12', 'activo');
INSERT INTO `usuarios` VALUES ('4', null, null, 'asdadasd@asdasd', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario', '2014-11-06 21:50:21', 'banneado');
INSERT INTO `usuarios` VALUES ('6', null, null, 'a@email.com', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario', '2014-11-06 22:03:47', 'activo');
