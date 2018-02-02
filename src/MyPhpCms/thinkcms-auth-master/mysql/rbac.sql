/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50712
 Source Host           : localhost
 Source Database       : rbac

 Target Server Type    : MySQL
 Target Server Version : 50712
 File Encoding         : utf-8

 Date: 11/21/2016 10:19:12 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `tp_action_log`
-- ----------------------------
DROP TABLE IF EXISTS `tp_action_log`;
CREATE TABLE `tp_action_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '执行用户id',
  `action_ip` bigint(20) NOT NULL COMMENT '执行行为者ip',
  `log` longtext NOT NULL COMMENT '日志备注',
  `log_url` varchar(255) NOT NULL COMMENT '执行的URL',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行行为的时间',
  `username` varchar(255) NOT NULL COMMENT '执行者',
  `title` varchar(255) NOT NULL COMMENT '标题',
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='行为日志表';

-- ----------------------------
--  Records of `tp_action_log`
-- ----------------------------
BEGIN;
INSERT INTO `tp_action_log` VALUES ('100', '1', '2130706433', '管理员<spen style=\'color: #1dd2af;\'>[ admin ]</spen>偷偷的进入后台了,', '/index/publics/login.html', '1479529877', 'admin', '后台登录'), ('101', '1', '2130706433', '管理员<spen style=\'color: #1dd2af;\'>[ admin ]</spen>偷偷的进入后台了,', '/index/publics/login.html', '1479557138', 'admin', '后台登录'), ('102', '1', '2130706433', '管理员<spen style=\'color: #1dd2af;\'>[ admin ]</spen>偷偷的进入后台了,', '/index/publics/login.html', '1479558882', 'admin', '后台登录'), ('103', '1', '2130706433', '管理员<spen style=\'color: #1dd2af;\'>[ admin ]</spen>偷偷的进入后台了,', '/index/publics/login.html', '1479637359', 'admin', '后台登录');
COMMIT;

-- ----------------------------
--  Table structure for `tp_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员自增ID',
  `user_name` varchar(255) DEFAULT NULL COMMENT '用户名',
  `user_password` varchar(255) DEFAULT NULL COMMENT '管理员的密码',
  `user_nicename` varchar(255) DEFAULT NULL COMMENT '管理员的简称',
  `user_status` int(11) DEFAULT '1' COMMENT '用户状态 0：禁用； 1：正常 ；',
  `user_email` varchar(255) DEFAULT '' COMMENT '邮箱',
  `last_login_ip` varchar(16) DEFAULT NULL COMMENT '最后登录ip',
  `last_login_time` datetime DEFAULT NULL COMMENT '最后登录时间',
  `create_time` datetime DEFAULT NULL COMMENT '注册时间',
  `role` varchar(255) DEFAULT NULL COMMENT '角色ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='后台管理员表';

-- ----------------------------
--  Records of `tp_admin`
-- ----------------------------
BEGIN;
INSERT INTO `tp_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', null, '1', 'admin@qq.com', '114.88.197.96', '2016-10-26 12:06:43', '2016-06-07 17:04:05', null), ('16', 'zou', '21232f297a57a5a743894a0e4a801fc3', null, '1', 'zou1@qq.com', '127.0.0.1', '2016-07-17 17:01:36', '2016-07-08 15:29:41', '2'), ('23', 'sdasd', '0aa1ea9a5a04b78d4581dd6d17742627', null, '1', 'asdas@qq.com', null, null, '2016-11-15 16:55:36', '2,3');
COMMIT;

-- ----------------------------
--  Table structure for `tp_auth_access`
-- ----------------------------
DROP TABLE IF EXISTS `tp_auth_access`;
CREATE TABLE `tp_auth_access` (
  `role_id` mediumint(8) unsigned NOT NULL COMMENT '角色',
  `rule_name` varchar(255) NOT NULL COMMENT '规则唯一英文标识,全小写',
  `type` varchar(30) DEFAULT NULL COMMENT '权限规则分类，请加应用前缀,如admin_',
  `menu_id` int(11) DEFAULT NULL COMMENT '后台菜单ID',
  KEY `role_id` (`role_id`),
  KEY `rule_name` (`rule_name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限授权表';

-- ----------------------------
--  Records of `tp_auth_access`
-- ----------------------------
BEGIN;
INSERT INTO `tp_auth_access` VALUES ('2', 'index/auth/default', 'admin_url', '1'), ('2', 'index/auth/default', 'admin_url', '8'), ('2', 'index/auth/menu', 'admin_url', '9'), ('2', 'index/auth/menuadd', 'admin_url', '10'), ('2', 'index/auth/menudelete', 'admin_url', '12'), ('2', 'index/auth/menuorder', 'admin_url', '13'), ('2', 'index/auth/menuedit', 'admin_url', '17');
COMMIT;

-- ----------------------------
--  Table structure for `tp_auth_role`
-- ----------------------------
DROP TABLE IF EXISTS `tp_auth_role`;
CREATE TABLE `tp_auth_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `pid` smallint(6) DEFAULT '0' COMMENT '父角色ID',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `listorder` int(3) NOT NULL DEFAULT '0' COMMENT '排序字段',
  PRIMARY KEY (`id`),
  KEY `parentId` (`pid`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
--  Records of `tp_auth_role`
-- ----------------------------
BEGIN;
INSERT INTO `tp_auth_role` VALUES ('1', '超级管理员', '0', '1', '拥有网站最高管理员权限！', '1329633709', '1329633709', '0'), ('2', '文章管理', '0', '1', 'SDAS', '0', '0', '0'), ('3', 'abc', '0', '1', '', '0', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `tp_auth_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `tp_auth_role_user`;
CREATE TABLE `tp_auth_role_user` (
  `role_id` int(11) unsigned DEFAULT '0' COMMENT '角色 id',
  `user_id` int(11) DEFAULT '0' COMMENT '用户id',
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户角色对应表';

-- ----------------------------
--  Records of `tp_auth_role_user`
-- ----------------------------
BEGIN;
INSERT INTO `tp_auth_role_user` VALUES ('2', '16');
COMMIT;

-- ----------------------------
--  Table structure for `tp_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `tp_auth_rule`;
CREATE TABLE `tp_auth_rule` (
  `menu_id` int(11) NOT NULL COMMENT '后台菜单 ID',
  `module` varchar(20) NOT NULL COMMENT '规则所属module',
  `type` varchar(30) NOT NULL DEFAULT '1' COMMENT '权限规则分类，请加应用前缀,如admin_',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '规则唯一英文标识,全小写',
  `url_param` varchar(255) DEFAULT NULL COMMENT '额外url参数',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效(0:无效,1:有效)',
  `rule_param` varchar(300) NOT NULL DEFAULT '' COMMENT '规则附加条件',
  `nav_id` int(11) DEFAULT '0' COMMENT 'nav id',
  PRIMARY KEY (`menu_id`),
  KEY `module` (`module`,`status`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限规则表';

-- ----------------------------
--  Records of `tp_auth_rule`
-- ----------------------------
BEGIN;
INSERT INTO `tp_auth_rule` VALUES ('2', 'index', 'admin_url', 'index/auth/default', '', '权限管理', '1', '', '0'), ('3', 'index', 'admin_url', 'index/auth/role', '', '角色管理', '1', '', '0'), ('4', 'index', 'admin_url', 'index/auth/roleadd', '', '角色增加', '1', '', '0'), ('5', 'index', 'admin_url', 'index/auth/roleedit', '', '角色编辑', '1', '', '0'), ('6', 'index', 'admin_url', 'index/auth/roledelete', '', '角色删除', '1', '', '0'), ('7', 'index', 'admin_url', 'index/auth/authorize', '', '角色授权', '1', '', '0'), ('8', 'index', 'admin_url', 'index/auth/menu', '', '菜单管理', '1', '', '0'), ('9', 'index', 'admin_url', 'index/auth/menu', '', '菜单列表', '1', '', '0'), ('10', 'index', 'admin_url', 'index/auth/menuadd', '', '菜单增加', '1', '', '0'), ('11', 'index', 'admin_url', 'index/auth/menuedit', '', '菜单修改', '1', '', '0'), ('12', 'index', 'admin_url', 'index/auth/menudelete', '', '菜单删除', '1', '', '0'), ('13', 'index', 'admin_url', 'index/auth/menuorder', '', '菜单排序', '1', '', '0'), ('14', 'index', 'admin_url', 'index/admin/index', '', '用户管理', '1', '', '0'), ('15', 'index', 'admin_url', 'index/index/sasd', '', '测试', '1', '', '0'), ('16', 'index', 'admin_url', 'index/index/asd', 'asd', '测试', '1', '', '0'), ('17', 'index', 'admin_url', 'index/auth/menuedit', 'dasd', '边缘', '1', 'in_array({id},[1,2,4,5] )', '0'), ('19', 'index', 'admin_url', 'index/auth/menuedit', 'id=5', '测试5', '1', '{id}==5', '0'), ('20', 'index', 'admin_url', 'index/auth/log', '', '行为日志', '1', '', '0'), ('21', 'index', 'admin_url', 'index/auth/viewlog', '', '查看日志', '1', '', '0'), ('22', 'index', 'admin_url', 'index/auth/clear', '', '清空日志', '1', '', '0');
COMMIT;

-- ----------------------------
--  Table structure for `tp_menu`
-- ----------------------------
DROP TABLE IF EXISTS `tp_menu`;
CREATE TABLE `tp_menu` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `parent_id` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID',
  `app` char(20) NOT NULL COMMENT '应用名称app',
  `model` char(20) NOT NULL COMMENT '控制器',
  `action` char(20) NOT NULL COMMENT '操作名称',
  `url_param` char(50) NOT NULL COMMENT 'url参数',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '菜单类型  1：权限认证+菜单；0：只作为菜单',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态，1显示，0不显示',
  `name` varchar(50) NOT NULL COMMENT '菜单名称',
  `icon` varchar(50) NOT NULL COMMENT '菜单图标',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `list_order` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序ID',
  `rule_param` varchar(255) NOT NULL COMMENT '验证规则',
  `nav_id` int(11) DEFAULT '0' COMMENT 'nav ID ',
  `request` varchar(255) NOT NULL COMMENT '请求方式（日志生成）',
  `log_rule` varchar(255) NOT NULL COMMENT '日志规则',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `model` (`model`),
  KEY `parent_id` (`parent_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

-- ----------------------------
--  Records of `tp_menu`
-- ----------------------------
BEGIN;
INSERT INTO `tp_menu` VALUES ('1', '0', 'index', 'auth', 'default', '', '0', '1', '系统管理', '', '', '10', '', '0', '', ''), ('2', '1', 'index', 'auth', 'default', '', '0', '1', '权限管理', '', '', '0', '', '0', '', ''), ('3', '2', 'index', 'auth', 'role', '', '1', '1', '角色管理', '', '1', '0', '', '0', '', ''), ('4', '3', 'index', 'auth', 'roleAdd', '', '1', '0', '角色增加', '', '', '0', '', '0', '', '{id}'), ('5', '3', 'index', 'auth', 'roleEdit', '', '1', '0', '角色编辑', '', 'asdas', '0', '', '0', '', ''), ('6', '3', 'index', 'auth', 'roleDelete', '', '1', '0', '角色删除', '', '', '0', '', '0', '', ''), ('7', '3', 'index', 'auth', 'authorize', '', '1', '0', '角色授权', '', '', '0', '', '0', '', ''), ('8', '1', 'index', 'auth', 'default', '', '0', '1', '菜单管理', '', '', '0', '', '0', '', ''), ('9', '8', 'index', 'auth', 'menu', '', '1', '1', '菜单列表', '', '', '0', '', '0', '', ''), ('10', '9', 'index', 'auth', 'menuAdd', '', '1', '0', '菜单增加', '', '', '0', '', '0', '', ''), ('11', '9', 'index', 'auth', 'menuEdit', '', '1', '0', '菜单修改', '', '', '0', '', '0', 'POST', '我的ID是{id} <br> 记入的目录{name}'), ('12', '9', 'index', 'auth', 'menuDelete', '', '1', '0', '菜单删除', '', '', '0', '', '0', '', ''), ('13', '9', 'index', 'auth', 'menuOrder', '', '1', '0', '菜单排序', '', '', '0', '', '0', '', ''), ('14', '2', 'index', 'admin', 'index', '', '1', '1', '用户管理', '', '', '0', '', '0', '', ''), ('15', '0', 'index', 'index', 'sasd', '', '0', '1', '测试', '', '', '20', '', '0', '', ''), ('16', '15', 'index', 'index', 'asd', 'asd', '1', '1', '测试', '', '', '0', '', '0', '', ''), ('17', '15', 'index', 'auth', 'menuEdit', 'dasd', '1', '1', '边缘', '', '11q1adas1adsasdfsdfdsd', '0', 'in_array({id},[1,2,4,5] )', '0', '', ''), ('20', '2', 'index', 'auth', 'log', '', '1', '1', '行为日志', '', '', '0', '', '0', '', ''), ('19', '16', 'index', 'auth', 'menuEdit', 'id=5', '1', '1', '测试5', '', 'dasd', '0', '{id}==5', '0', 'GET', '{id}'), ('21', '20', 'index', 'auth', 'viewLog', '', '1', '0', '查看日志', '', '', '0', '', '0', '', ''), ('22', '20', 'index', 'auth', 'clear', '', '1', '0', '清空日志', '', '', '0', '', '0', '', '');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
