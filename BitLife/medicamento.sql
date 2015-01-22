/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : medicamento

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2013-11-30 15:33:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
`idCategoria`  int(100) NOT NULL AUTO_INCREMENT ,
`DescripcionC`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`idCategoria`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=10

;

-- ----------------------------
-- Records of categoria
-- ----------------------------
BEGIN;
INSERT INTO `categoria` VALUES ('3', 'Antipirepticos'), ('4', 'Anticepticos'), ('5', 'Antinflamatorios'), ('6', 'Diureticos'), ('7', 'Anestesicos'), ('8', 'Analgesicos'), ('9', 'Antibioticos');
COMMIT;

-- ----------------------------
-- Table structure for medicamentos
-- ----------------------------
DROP TABLE IF EXISTS `medicamentos`;
CREATE TABLE `medicamentos` (
`idMedicamento`  int(255) NOT NULL AUTO_INCREMENT ,
`NombreM`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`PrecioM`  double NULL DEFAULT NULL ,
`CantidadM`  int(11) NULL DEFAULT NULL ,
`Imagen`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`Categorias`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`idMedicamento`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=17

;

-- ----------------------------
-- Records of medicamentos
-- ----------------------------
BEGIN;
INSERT INTO `medicamentos` VALUES ('13', 'Aspirina', '102', '22', 'arbol.jpg', null), ('15', 'Vicodin ', '50', '5', '1.jpg', null), ('16', 'popi', '34', '45354', 'arbol.jpg', null);
COMMIT;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
`idUsuario`  int(11) NOT NULL AUTO_INCREMENT ,
`NombreU`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`EmailU`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`Password`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`idUsuario`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
BEGIN;
INSERT INTO `usuarios` VALUES ('1', 'Karen', 'fender@hotmail.com', 'teamolumpy'), ('2', 'Ahuatzin', 'ahuats@hotmail.com', 'seguimoseneljuego'), ('4', 'Rodolfo', 'lumpy@hotmail.com', 'loviufender');
COMMIT;

-- ----------------------------
-- Auto increment value for categoria
-- ----------------------------
ALTER TABLE `categoria` AUTO_INCREMENT=10;

-- ----------------------------
-- Auto increment value for medicamentos
-- ----------------------------
ALTER TABLE `medicamentos` AUTO_INCREMENT=17;

-- ----------------------------
-- Auto increment value for usuarios
-- ----------------------------
ALTER TABLE `usuarios` AUTO_INCREMENT=5;
