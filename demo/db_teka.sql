/*
Navicat MySQL Data Transfer

Source Server         : Local_server
Source Server Version : 80031
Source Host           : localhost:3306
Source Database       : db_teka

Target Server Type    : MYSQL
Target Server Version : 80031
File Encoding         : 65001

Date: 2023-06-06 23:54:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_article`
-- ----------------------------
DROP TABLE IF EXISTS `tb_article`;
CREATE TABLE `tb_article` (
  `id_ardicle` int NOT NULL AUTO_INCREMENT,
  `Designation` varchar(99) NOT NULL,
  `categorie` varchar(99) NOT NULL,
  `prix` float NOT NULL,
  `couleur` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ardicle`),
  UNIQUE KEY `unique` (`Designation`,`categorie`,`prix`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of tb_article
-- ----------------------------
INSERT INTO `tb_article` VALUES ('1', 'sapatu', 'Chaussure', '2222', 'Noir');
INSERT INTO `tb_article` VALUES ('3', 'ZOZO', 'Robe', '33', 'Jaune');
INSERT INTO `tb_article` VALUES ('4', 'zozoz', 'Robe', '55', 'Bleue');

-- ----------------------------
-- Table structure for `tb_command`
-- ----------------------------
DROP TABLE IF EXISTS `tb_command`;
CREATE TABLE `tb_command` (
  `id_commande` int NOT NULL AUTO_INCREMENT,
  `id_article` int NOT NULL,
  `client` varchar(200) NOT NULL,
  `statut` varchar(1) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of tb_command
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_customer`
-- ----------------------------
DROP TABLE IF EXISTS `tb_customer`;
CREATE TABLE `tb_customer` (
  `id_client` varchar(100) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Postnom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `gender` varchar(1) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tb_customer
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_detail_command`
-- ----------------------------
DROP TABLE IF EXISTS `tb_detail_command`;
CREATE TABLE `tb_detail_command` (
  `id_det` int NOT NULL AUTO_INCREMENT,
  `id_commande` int NOT NULL,
  `id_article` int NOT NULL,
  `qte` int NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_det`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of tb_detail_command
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_user`
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) NOT NULL,
  `Postnom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('1', 'BAFUANGA', 'DEDI', 'Young', 'M');
INSERT INTO `tb_user` VALUES ('2', 'zaza', 'zozo', 'zeze', 'M');
