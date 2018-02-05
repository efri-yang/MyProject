-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-02-05 09:31:28
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thinkphp`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_group`
--

CREATE TABLE `think_auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_auth_group`
--

INSERT INTO `think_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(1, '管理员', 1, '1,2,3,4,5,6,7,8,9,10,11,15,14,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33'),
(2, '普通管理员', 1, '1,2,3,4'),
(3, '用户', 1, '3,4,5,6');

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_group_access`
--

CREATE TABLE `think_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) UNSIGNED NOT NULL COMMENT '用户组id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组明细表';

--
-- 转存表中的数据 `think_auth_group_access`
--

INSERT INTO `think_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 3);

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_rule`
--

CREATE TABLE `think_auth_rule` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `type` char(80) NOT NULL,
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='规则表';

--
-- 转存表中的数据 `think_auth_rule`
--

INSERT INTO `think_auth_rule` (`id`, `name`, `title`, `status`, `type`, `condition`) VALUES
(4, 'admin/role/del', '删除角色', 1, '1', ''),
(3, 'admin/role/add', '添加角色', 1, '1', ''),
(2, 'admin/sysconfig/index', '系统设置', 1, '1', ''),
(1, 'admin/index/index', '后台首页', 1, '1', ''),
(5, 'admin/role/edit', '修改角色', 1, '1', ''),
(6, 'admin/sysconfig/add', '添加设置', 1, '1', ''),
(7, 'admin/admin_menu/add', '添加菜单', 1, '1', ''),
(8, 'admin/admin_menu/del', '删除菜单', 1, '1', ''),
(9, 'admin/admin_menu/edit', '修改菜单', 1, '1', ''),
(10, 'admin/role/index', '角色管理', 1, '1', ''),
(11, 'admin/admin_menu/index', '菜单管理', 1, '1', ''),
(15, 'admin/sysconfig/edit', '编辑设置', 1, '1', ''),
(14, 'admin/admin_user/index', '用户管理', 1, '1', ''),
(17, 'admin/admin_user/add', '添加用户', 1, '1', ''),
(18, 'admin/admin_file/index', '文件管理', 1, '1', ''),
(19, 'admin/sysconfig/del', '删除设置', 1, '1', ''),
(20, 'admin/admin_file/upload', '上传文件', 1, '1', ''),
(21, 'admin/tools', '扩展功能', 1, '1', ''),
(22, 'admin/pay/index', '支付', 1, '1', ''),
(23, 'admin/weixinpay/index', '微信支付', 1, '1', ''),
(24, 'admin/ueditor/index', 'Ueditor', 1, '1', ''),
(25, 'admin/alipay/index', '支付宝支付', 1, '1', ''),
(26, 'admin/third_login/index', '第三方登录', 1, '1', ''),
(27, 'admin/third_login/qq', 'QQ登录', 1, '1', ''),
(28, 'admin/excel/index', 'Excel导入导出', 1, '1', ''),
(29, 'admin/admin_user/edit', '修改用户', 1, '1', ''),
(30, 'admin/admin_user/del', '删除用户', 1, '1', ''),
(31, 'admin/admin_mail/index', '发送邮件', 1, '1', ''),
(32, 'admin/admin_qrcode/index', '二维码生成', 1, '1', ''),
(33, 'admin/qiniucloud/index', '七牛云存储', 1, '1', ''),
(34, 'admin/alidayu/index', '阿里大于', 1, '1', ''),
(35, 'admin/sys', '系统管理', 1, '1', ''),
(36, 'admin/dolog/index', '操作日志', 1, '1', ''),
(37, 'admin/admin_user/profile', '个人资料', 1, '1', ''),
(38, 'admin/role/access', '授权管理', 1, '1', ''),
(39, 'admin/logs', '日志管理', 1, '1', ''),
(40, 'admin/statistics/default', '统计管理', 1, '1', ''),
(41, 'admin/statistics/index', '统计概览', 1, '1', ''),
(43, 'admin/erer/dkjfd', '测试二', 1, '1', ''),
(44, 'aldkfj/adfa/adf', '测试等i大', 1, '1', ''),
(45, 'afadfasdf', 'test222', 1, '1', ''),
(46, 'dakldfjadf', '阿德法地方', 1, '1', ''),
(47, 'adfadsfadsf', 'sfdgadf', 1, '1', ''),
(48, 'dafaf', 'adsfadf', 1, '1', ''),
(49, 'admin/alioss', '阿里云oss', 1, '1', ''),
(50, 'admin/weibologin/index', '微博登录', 1, '1', ''),
(51, 'admin/syslog/index', '系统日志', 1, '1', ''),
(52, 'admin/thirdlogin/github', 'github登录', 1, '1', ''),
(57, 'admin/dologs/view', '查看日志', 1, '1', ''),
(58, 'admin/admin_file/download', '文件下载', 1, '1', ''),
(59, 'admin/markdown/index', 'MarkDown编辑器', 1, '1', ''),
(60, 'admin/databack/index', '数据库备份', 1, '1', ''),
(61, 'admin/databack/add', '添加备份', 1, '1', ''),
(62, 'admin/databack/reduction', '还原备份', 1, '1', ''),
(63, 'admin/databack/del', '删除备份', 1, '1', ''),
(64, 'admin/user/index', '用户测试', 1, '1', ''),
(65, 'admin/user/add', '添加用户', 1, '1', ''),
(66, 'admin/user/edit', '编辑用户', 1, '1', ''),
(67, 'admin/user/del', '删除用户', 1, '1', ''),
(68, 'admin/ueditor/server', '编辑器上传', 1, '1', ''),
(73, 'admin/database/index', '数据表管理', 1, '1', ''),
(74, 'admin/database', '数据维护', 1, '1', ''),
(75, 'admin/database/optimize', '优化表', 1, '1', ''),
(76, 'admin/database/repair', '修复表', 1, '1', ''),
(77, 'admin/database/view', '查看表详情', 1, '1', ''),
(79, '123', '12', 1, '1', ''),
(80, '/addasd/asdasdsad', '测试菜单', 1, '1', ''),
(81, '/asd/asdadsad', 'ce 阿萨德啊a', 1, '1', '');

-- --------------------------------------------------------

--
-- 表的结构 `think_user`
--

CREATE TABLE `think_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `age` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_user`
--

INSERT INTO `think_user` (`id`, `username`, `password`, `age`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `think_auth_group`
--
ALTER TABLE `think_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_auth_group_access`
--
ALTER TABLE `think_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `think_auth_rule`
--
ALTER TABLE `think_auth_rule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `think_user`
--
ALTER TABLE `think_user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `think_auth_group`
--
ALTER TABLE `think_auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `think_auth_rule`
--
ALTER TABLE `think_auth_rule`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
