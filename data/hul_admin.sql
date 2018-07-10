/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : hul_admin

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-07-07 17:55:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '菜单名',
  `parent_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '父级ID, 0为顶级菜单',
  `status` tinyint(4) DEFAULT '1' COMMENT '1表示显示，2表示隐藏',
  `url` varchar(30) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT '0' COMMENT '排序',
  `type` varchar(10) NOT NULL DEFAULT 'menu' COMMENT '类型 menu表示菜单栏控制，per表示节点控制',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES ('1', '管理员管理', '0', '1', null, '0', 'menu');
INSERT INTO `admin_menu` VALUES ('2', '菜单栏管理', '0', '1', null, '0', 'menu');
INSERT INTO `admin_menu` VALUES ('3', '角色管理', '1', '1', 'admin/admin/role', '0', 'menu');
INSERT INTO `admin_menu` VALUES ('4', '权限管理', '1', '1', 'admin/admin/permission', '0', 'menu');
INSERT INTO `admin_menu` VALUES ('5', '管理员列表', '1', '1', 'admin/admin/index', '0', 'menu');
INSERT INTO `admin_menu` VALUES ('6', '菜单栏', '2', '1', 'admin/menu/index', '0', 'menu');
INSERT INTO `admin_menu` VALUES ('7', '添加管理员', '5', '1', 'admin/admin/addAdmin', '0', 'per');
INSERT INTO `admin_menu` VALUES ('8', '删除管理员', '5', '1', 'admin/admin/delAdmin', '0', 'per');
INSERT INTO `admin_menu` VALUES ('9', '修改管理员状态', '5', '1', 'admin/admin/updateAdminStatus', '0', 'per');
INSERT INTO `admin_menu` VALUES ('10', '修改管理员', '5', '1', 'admin/admin/updateAdmin', '0', 'per');
INSERT INTO `admin_menu` VALUES ('11', '添加角色', '3', '1', 'admin/admin/addRole', '0', 'per');
INSERT INTO `admin_menu` VALUES ('12', '编辑角色', '3', '1', 'admin/admin/updateRole', '0', 'per');
INSERT INTO `admin_menu` VALUES ('13', '删除角色', '3', '1', 'admin/admin/delRole', '0', 'per');
INSERT INTO `admin_menu` VALUES ('14', '添加权限', '4', '1', 'admin/admin/addPermission', '0', 'per');
INSERT INTO `admin_menu` VALUES ('15', '编辑权限', '4', '1', 'admin/admin/updatePermission', '0', 'per');
INSERT INTO `admin_menu` VALUES ('16', '删除权限', '4', '1', 'admin/admin/delPermission', '0', 'per');
INSERT INTO `admin_menu` VALUES ('17', '添加菜单栏', '6', '1', 'admin/menu/addMenu', '0', 'per');
INSERT INTO `admin_menu` VALUES ('18', '修改菜单栏', '6', '1', 'admin/menu/updateMenu', '0', 'per');
INSERT INTO `admin_menu` VALUES ('20', '删除菜单栏', '6', '1', 'admin/menu/delMenu', '1', 'per');
INSERT INTO `admin_menu` VALUES ('22', '测试接口', '3', '1', 'admin/admin/test', '0', 'per');
INSERT INTO `admin_menu` VALUES ('23', '文章管理', '0', '1', '', null, 'menu');
INSERT INTO `admin_menu` VALUES ('25', '文章列表', '23', '1', 'admin/article/index', null, 'menu');
INSERT INTO `admin_menu` VALUES ('26', '品牌管理', '0', '1', null, null, 'menu');
INSERT INTO `admin_menu` VALUES ('27', '品牌列表', '26', '1', 'admin/band/index', null, 'menu');

-- ----------------------------
-- Table structure for admin_role
-- ----------------------------
DROP TABLE IF EXISTS `admin_role`;
CREATE TABLE `admin_role` (
  `role_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `role_name` varchar(100) NOT NULL DEFAULT '' COMMENT '角色名称',
  `desc` varchar(255) DEFAULT NULL COMMENT '角色描述',
  `menu_id` varchar(255) NOT NULL COMMENT '菜单栏id',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统角色表';

-- ----------------------------
-- Records of admin_role
-- ----------------------------
INSERT INTO `admin_role` VALUES ('1', '超级管理员', '超级管理员', '23,25,1,3,11,12,13,22,4,14,15,16,5,7,8,9,10,2,6,17,18,20', '2018-06-28 11:33:24');

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `names` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `email` varchar(200) DEFAULT '' COMMENT 'email',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `add_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `last_login` varchar(50) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_ip` varchar(50) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `phone` varchar(14) DEFAULT NULL,
  `role_id` varchar(50) NOT NULL DEFAULT '0' COMMENT '角色id',
  `status` tinyint(10) NOT NULL DEFAULT '1' COMMENT '状态 1正常，2冻结',
  PRIMARY KEY (`id`),
  KEY `user_name` (`names`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', 'admin', '2235@qq.com', 'e12UqnFFiySYU', '1530156756', '2018-07-03 16:03:53', '127.0.0.1', '13111111111', '1', '1');
