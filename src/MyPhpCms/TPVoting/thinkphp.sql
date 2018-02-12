-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-02-12 08:20:20
-- 服务器版本： 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- 表的结构 `bear_admin_files`
--

CREATE TABLE `bear_admin_files` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上传用户id',
  `original_name` varchar(255) NOT NULL,
  `save_name` varchar(255) NOT NULL,
  `save_path` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `mime` varchar(255) NOT NULL,
  `size` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `md5` char(32) NOT NULL,
  `sha1` char(40) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_open` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否公开，默认为0不公开只能自己看，1为公开',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL,
  `delete_time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='后台用户文件表';

-- --------------------------------------------------------

--
-- 表的结构 `bear_admin_logs`
--

CREATE TABLE `bear_admin_logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL COMMENT '用户id',
  `resource_id` int(10) NOT NULL DEFAULT '0' COMMENT '资源id，如果是0证明是添加？',
  `title` varchar(100) NOT NULL,
  `log_type` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1get，2post，3put，4deldet',
  `log_url` varchar(255) NOT NULL COMMENT '访问url',
  `log_ip` bigint(15) NOT NULL COMMENT '操作ip',
  `create_time` int(11) UNSIGNED NOT NULL COMMENT '操作时间',
  `delete_time` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '默认状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='后台用户操作日志表';

--
-- 转存表中的数据 `bear_admin_logs`
--

INSERT INTO `bear_admin_logs` (`id`, `user_id`, `resource_id`, `title`, `log_type`, `log_url`, `log_ip`, `create_time`, `delete_time`, `status`) VALUES
(1, 1, 0, '登录', 2, 'admin/pub/login.html', 0, 1518269463, NULL, 1),
(2, 1, 0, '退出', 2, 'admin/pub/logout.html', 0, 1518275911, NULL, 1),
(3, 2, 0, '登录', 2, 'admin/pub/login.html', 0, 1518275929, NULL, 1),
(4, 1, 0, '登录', 2, 'admin/pub/login.html', 0, 1518275991, NULL, 1),
(5, 1, 0, '登录', 2, 'admin/pub/login.html', 0, 1518359813, NULL, 1),
(6, 1, -1, '添加菜单', 2, 'admin/admin_menu/add.html', 0, 1518361823, NULL, 1),
(7, 1, 0, '退出', 2, 'admin/pub/logout.html', 0, 1518361867, NULL, 1),
(8, 1, 0, '登录', 2, 'admin/pub/login.html', 0, 1518361876, NULL, 1),
(9, 1, 0, '退出', 2, 'admin/pub/logout.html', 0, 1518362270, NULL, 1),
(10, 1, 0, '登录', 2, 'admin/pub/login.html', 0, 1518404342, NULL, 1),
(11, 1, 78, '修改菜单', 2, 'admin/admin_menu/edit.html', 0, 1518404381, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bear_admin_logs_datas`
--

CREATE TABLE `bear_admin_logs_datas` (
  `data_id` int(10) UNSIGNED NOT NULL,
  `log_id` int(10) UNSIGNED NOT NULL,
  `data` longtext NOT NULL,
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `delete_time` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='后台用户操作日志数据表';

--
-- 转存表中的数据 `bear_admin_logs_datas`
--

INSERT INTO `bear_admin_logs_datas` (`data_id`, `log_id`, `data`, `create_time`, `update_time`, `delete_time`, `status`) VALUES
(1, 1, '965bf88d7Yl0QEy+2A0GBHG1yHxUSeKk3eOPjedE/G8hIo3CQWwpffpIyPzyg2WN/a5BfxRyojDJu12syZMVnmmK4N18AflOjByn6OJvkN/Eh4/W2BdAOCC0O7WkIKYU2+EFoMUR+rg2UdcVjWZqhxFthnFxFtq6x7rJcha/ckWTPXHuBnpWnOiLW9LRZ0Wuh1XXjJgIVfdKPPxWXBJeTYVdlmEjvYMiUFvVSffrIe7RLfn07wVa8oqD0OilO+7q7GA3C129hG8HfMJXAXTCslsp55yUTyQiVTWt0vMWKWVtrRSzXuUMT4P/aPUIZ8fEs5/CX4KPUcxwWgLDd7xDK7s+dXNox8kMkFz7sRsTWlQ/QR8fuTgMLmCqI0lP29NSOgT8oDFXFfS9bg2MrZwCjT7w+I52vIBZhYUdzgWDo+hxBQgJzVs4yFnxeaSqr6CivisBUWhDm9XgCRKiOe2NX2teXKjTCcl4qDcpuZbeMBqjTf1PmiAADMosbhkGGYwvm+oFo4+ppGaSvvhH0kA2E+1etvaxMVDpZuhDsg', 1518269463, 1518269463, NULL, 1),
(2, 2, 'b26aa40aPdyTulMy+3rZ15agdTQuIGsyfucJr3Omy8fx6VzREiM', 1518275911, 1518275911, NULL, 1),
(3, 3, 'a5fea5aaJC18h5MeiZdHkJ5m/FGRjCWEyxYvcXyVFldecHgwM98D8wnTbEOAbbccz9miYyCdViOv/M87aZKhVxZsE8vvA0ycKHo56uE3qPr04qXJXdR5GR9plfWn9euflzPKpeouilhov6JOQEb5PLEAdqq+YtZWa6CWM0SHUo1VC6IPJFHguPejF40WBYsPVt8qVGC3ROWTZlsaazlRez+YigWORv5iPZVVtnFyzwlGp2UnthDNALlfrFiRF212eONC1bPgctdl8uUr7g2cF068NFa/OWVPUhLWL8E4RLq1NBW4gPJIMqunIHL9Jqw74I5yJzRGZiZ41CaE53INcWRApgR0ecxNsThUWNAky/H5NiCje8U83utPrDxa8f7wk3pUs2bPY92s4BGdZc4XMx8HaiC8T+X/aQ8O3tiMh+7nxm9Unw9VBMkooD+GOpXbMEKC4oPDVr8k3+tHfMphArXYNqkKsYaSI3vfs3WIlhGVm3Ay4xyRAM3n', 1518275929, 1518275929, NULL, 1),
(4, 4, 'eec634a9T/QIWJNr6C7txSwHS4T7h1KuL2OYGY5rf3lDenZQYQ5eTfC7EvIkMNMQ/vfbWchjIXtQiytd609A6f3PysiL+B4BFL71d4uubR7l1pa7OfixKD2vNUfT42LZErypDUBs5iD+ovfXGKOZdKFgDDrH8VuRK4qp9aVSKk/k6aJViCivhGGj0wVe9S5GAvUyUhz/1YHRy8CvZP51GLyVhIuNt9gF2ns7LJpGx8Im01ljFCz4CdMgZRUpP0gM0uhjQLD8lTmsy6cwP6XTO3mP6kcOXR5k3OS+9LT5bjY47Ogpo26V9r/4JUdBVznCJBeeFfDJv10GPGe8FdttEmE+4I5mU3RFfgYVjaiAKwsyH2ZTi9MH854f8WkRYl41leiISnFwTrLjl+QHYzaYmGwUoZO7if99CsOG5LnsFeWNjQtjQHwKgWFMQfuMwHjWs8a6gnnjuY3arC9e6xpXi/OKQd9mAdt4MTOA5u1yqwbdWlvW0glIsp4', 1518275992, 1518275992, NULL, 1),
(5, 5, '3aee2d32+/LkA+awZgCDsXNCvAE534Le7kXs7KjQWu0VvCkQLx1u66cINhGAS1vcgrbGwK4GKUzH87XpurpKpKBh7HdWboYa7rKEEl/TMnbWmuzlobmWQcnb4uvfG059/nH7Fj57lKKLexMe+epz+5eevcGP0qzBsM/9OmL+LNltRR762mukNoMN8o/ohsRPRxVqOrHplIi1H/p71j31VigL3UBxcvjNbuSZO1wKqq17e5u5eEMncR58ae+VNT345D/Zn96NNQv1kBdRcHi45t+Ih1rMA9v49fn1+d+L3Wowir9fm5A5adCsY29uWtZRZupRMazPJFoRqDc/nupKJCh69ez/1bn/nH63iImJbhF6FSDpo52AHuDhaR3CNZwSh1xYLi+RQM+OqNiVOB3W10g425U2svlHKTCAZOjB9NU/79G+zVon3TAAV5sW1rSdpCLt3z2WZ0qM2B6pCsJuD/J5zrtmXHeImmms/i5k9W6EOcGkR5cYS8DqHfHHkCzVfc1K5bD9ZtEeSUzL6Jh58iwCJCR9Im8s/3OI6w', 1518359813, 1518359813, NULL, 1),
(6, 6, '53c4241cbRSW5IzU53yHq6gCvEsCZQ+h7kYKVh2nzLWMpGps18LYPTXFtnd+cijfS8aDfdIimGvk1+TS5z4KWLSEz+fiXhRg2Grxgl+nX/5fXHConlOmksavjCcuGuWBagVu9mmIJ4NjjICnbAuPo2Nsrl32aU+ggE/VOVxqbB/zmZ8HYeaBEFYwlYhrFBjzfeDEgNl5GDfARutes8mK4AEnYlsJPSKieFR+fvZcvTrsZ+UMprfOTbEzKWZ4U6FE7o7ZGvhhRNvlhxJva79QGSxjMhLm0zzx5mSSfoVb30ID9ybPzJp86jzGcQEz922Z1W2fCSUm6PiyDl6g5UrMUFb6JY2Fu2K/R7nL7QfnZoPdoMG1frv6+Pouyfebf2SKxug3RGfO7+M', 1518361823, 1518361823, NULL, 1),
(7, 7, '651f9a67i+PJJyJHZgoS8OwN1reMh/4Kg7yYQu/J+fvhMg12p2Y', 1518361867, 1518361867, NULL, 1),
(8, 8, '38d635e1HwtB34XvgMGeENM6ssPD+p+HdZSuk+IXaEJGzJf3yr/yZ9P48n+suT8lUovCZiGFrdg+Mnewto814cYcB2QeTJrvzlwMdLX0G8PBfRMNdVMcFBzhw5jti8ubEPcsWlXa3qL182nuhnvGuDEOdJMO4NNs9xhjW+PUufQA7ltr2+0/Azc0/K3Fjklq7IH2WZS+99mLXVHX1SHNd4zaaIXXtMSPGCESh151ecqMKH85p6ICgbKBt7A9jsYiu9XdmYZQ/EWkCj7+aCRz8hGB1Sa+sMAHvt2QaQSVBYXwdEVyqRRebX5kHH17jUcJSzSkiWdBl2+2mmAe+cEpghWwjyVaN+PSQlNOtpn7eAU0z30Y932Cp0+m8fRIJLMikeh1XJyASck3a8KBS74gU49FJf0DyT3D9C9Gx6ZaSlwmwYE0N+hZnXmSZRQgHpILMamgr96u1QrinjkHKWq1LTSn2ZPwA5/1HGzv2QG+i/rY/wasBonUcJw', 1518361876, 1518361876, NULL, 1),
(9, 9, 'df3937e13CiIo7obtCE+8jPI7ru+Si9QclF9oWuaRoBH975ShnU', 1518362270, 1518362270, NULL, 1),
(10, 10, 'fe3f2001S2/tKyH+z80wexYbbMwrAxKmyeFmTpUQqdswyAjiRb933KpUTYXeesMfYOlRpN5R6bLwqjNbkzUfJwjr09s7b1VqkDOahIpH4tPTG8VhY9L2DhLvG8xQgVhOf+ypAaBo1VSXbtc2HJdw4nvms0dsFt6/DBHTMlHEDqTFzlDcYlGZp7Gm6dFd8ehxgB9a9qxMbgNEK+vCeBrcNha6DMTMWShsfVz8/gLQpJQJD/t3gGG0S06qmLUtfaRpuHVst803jW9Egs4N6ro3vVLnHFQRUlYbVnBoCBKDiFPYL3A2Fe+PPtn8GPI87vO5CNTe2rN0Lj66zea78MvgQahqMexpuEs3yQKbS/ezA6eQpoLRy+/9onxlXgw38k6u/iI0IuH/csrZiOUUlWIRZE5YO/AuXI2Izxrf7M37T/wYJNd1DKejeUQGimZOrOEslrTZWtP4hX2b3rLxTcDTiHCUkTp8KFMK8B6ZZl7hMnWtqRVtKrOgRYGmZ3Tel4Xe2fkyXbE3G3HPRiMEFBLkHQc/ZEn3hm4VipRT7g', 1518404342, 1518404342, NULL, 1),
(11, 11, 'b57cab15rpGlrVOD1a8ErjbdFTXPf/T+b21Wto3rGGNGgEsZWv7MGT36KFX56hNdcz+HDnXO5WKr/CpruRMbb+R8VcecHFFB+7pDR/ICdGRlU7/CQhogqBh9mAgxCw9V9fqDyjangWzOjbuG7vwYDKbT4X6SnSnF0q7hxosD1o+6hbVVNWkp6bFG4TUfKCWEky56livEXxIcaGB9HFmuZjtAo8O8mewiYZTv2VdBcHqcX5Su545uw3CiKdPShuGl2pNAt2IUnZukxODY60S1XvzxKXycxRfoDPLxSAqXjKR8yAORjEUYPUeeiVS9mbXjUNgnkmkBP4vnP3xUILq8YtCfTyMUqQx6SbmpoKaExfEAf61coSLiMAk5ruFBHNQCLMAA+T8P2NtEkc37l10405MvfkXHuh0ucQ6nO0ufri9MMWHzdG6WLFLHI0G1Dmk6s3U', 1518404381, 1518404381, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bear_admin_mail_logs`
--

CREATE TABLE `bear_admin_mail_logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL COMMENT '用户id',
  `address` varchar(255) NOT NULL DEFAULT '0' COMMENT '资源id，如果是0证明是添加？',
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL COMMENT '1get，2post，3put，4deldet',
  `attachment_name` varchar(255) NOT NULL DEFAULT '' COMMENT '附件名称',
  `attachment_path` varchar(255) NOT NULL DEFAULT '' COMMENT '附件地址',
  `attachment_url` varchar(255) NOT NULL DEFAULT '' COMMENT '附件url',
  `is_success` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '是否成功',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(11) UNSIGNED NOT NULL COMMENT '操作时间',
  `delete_time` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '默认状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='邮件发送记录表';

-- --------------------------------------------------------

--
-- 表的结构 `bear_admin_menus`
--

CREATE TABLE `bear_admin_menus` (
  `menu_id` int(11) UNSIGNED NOT NULL COMMENT '菜单id',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '父级id',
  `is_show` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '是否显示',
  `title` varchar(50) NOT NULL COMMENT '菜单名称',
  `url` varchar(100) NOT NULL COMMENT '模块/控制器/方法',
  `param` varchar(100) NOT NULL DEFAULT '',
  `icon` varchar(50) NOT NULL DEFAULT 'fa-circle-o' COMMENT '菜单图标',
  `log_type` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0不记录日志，1get，2post，3put，4delete，先这些啦',
  `sort_id` smallint(5) UNSIGNED NOT NULL DEFAULT '100' COMMENT '排序id',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '状态：1默认正常，2禁用'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

--
-- 转存表中的数据 `bear_admin_menus`
--

INSERT INTO `bear_admin_menus` (`menu_id`, `parent_id`, `is_show`, `title`, `url`, `param`, `icon`, `log_type`, `sort_id`, `create_time`, `update_time`, `status`) VALUES
(1, 0, 1, '后台首页', 'admin/index/index', '', 'fa-home', 0, 1, 0, 1489371526, 1),
(2, 34, 1, '系统设置', 'admin/sysconfig/index', '', 'fa-cogs', 0, 998, 0, 1502187600, 1),
(3, 10, 0, '添加角色', 'admin/role/add', '', 'fa-plus', 2, 100, 0, 1501157348, 1),
(4, 10, 0, '删除角色', 'admin/role/del', '', 'fa-close', 1, 100, 0, 1502344725, 1),
(5, 10, 0, '修改角色', 'admin/role/edit', '', 'fa-edit', 2, 100, 0, 1495007134, 1),
(6, 2, 0, '添加设置', 'admin/sysconfig/add', '', 'fa-plus', 2, 100, 0, 1502344270, 1),
(7, 11, 0, '添加菜单', 'admin/admin_menu/add', '', 'fa-plus', 2, 100, 0, 1501157447, 1),
(8, 11, 0, '删除菜单', 'admin/admin_menu/del', '', 'fa-close', 1, 100, 0, 1502344737, 1),
(9, 11, 0, '修改菜单', 'admin/admin_menu/edit', '', 'fa-edit', 2, 100, 0, 1495010837, 1),
(10, 34, 1, '角色管理', 'admin/role/index', '', 'fa-group', 0, 100, 0, 1501157271, 1),
(11, 34, 1, '菜单管理', 'admin/admin_menu/index', '', 'fa-th-list', 0, 100, 0, 1501157420, 1),
(12, 10, 0, '授权管理', 'admin/role/access', '', 'fa-key', 2, 100, 0, 1495010813, 1),
(14, 34, 1, '用户管理', 'admin/admin_user/index', '', 'fa-user-secret', 0, 99, 0, 1501157040, 1),
(15, 2, 0, '编辑设置', 'admin/sysconfig/edit', '', 'fa-edit', 2, 100, 0, 1502344279, 1),
(16, 14, 0, '添加用户', 'admin/admin_user/add', '', 'fa-plus', 2, 100, 0, 1501157217, 1),
(17, 34, 1, '文件管理', 'admin/admin_file/index', '', 'fa-file-o', 0, 101, 0, 1501157504, 1),
(18, 2, 0, '删除设置', 'admin/sysconfig/del', '', 'fa-close', 1, 100, 0, 1502344288, 1),
(19, 17, 0, '上传文件', 'admin/admin_file/upload', '', 'fa-upload', 2, 100, 0, 1496373547, 1),
(20, 34, 1, '扩展功能', 'admin/tools', '', 'fa-plus-circle', 0, 102, 0, 1496371967, 1),
(21, 20, 1, '支付', 'admin/pay/index', '', 'fa-credit-card', 0, 51, 0, 1496800099, 1),
(22, 21, 1, '微信支付', 'admin/weixinpay/index', '', 'fa-wechat', 0, 100, 0, 1496802274, 1),
(23, 20, 1, 'Ueditor', 'admin/ueditor/index', '', 'fa-edit', 2, 100, 0, 1496652277, 1),
(24, 21, 1, '支付宝支付', 'admin/alipay/index', '', 'fa-rmb', 0, 100, 0, 1496802516, 1),
(25, 20, 1, '第三方登录', 'admin/third_login/index', '', 'fa-exchange', 1, 55, 0, 1503847993, 1),
(26, 25, 0, 'QQ登录', 'admin/third_login/qq', '', 'fa-qq', 0, 100, 0, 1503848342, 1),
(27, 20, 1, 'Excel导入导出', 'admin/excel/index', '', 'fa-close', 2, 110, 0, 1496746818, 1),
(28, 14, 0, '修改用户', 'admin/admin_user/edit', '', 'fa-edit', 2, 100, 0, 1495006610, 1),
(29, 14, 0, '删除用户', 'admin/admin_user/del', '', 'fa-close', 1, 100, 0, 1502344303, 1),
(30, 20, 1, '发送邮件', 'admin/admin_mail/index', '', 'fa-envelope', 2, 100, 0, 1496651424, 1),
(31, 20, 1, '二维码生成', 'admin/admin_qrcode/index', '', 'fa-qrcode', 2, 100, 0, 1496651897, 1),
(32, 20, 1, '阿里大于', 'admin/alidayu/index', '', 'fa-comment', 2, 100, 1489335056, 1496652347, 1),
(33, 20, 0, '七牛云存储', 'admin/qiniucloud/index', '', 'fa-cloud', 0, 100, 1489335136, 1499157737, 1),
(34, 0, 1, '系统管理', 'admin/sys', '', 'fa-gear', 0, 100, 1489335249, 1496385260, 1),
(35, 37, 1, '操作日志', 'admin/dolog/index', '', 'fa-keyboard-o', 0, 100, 1489335334, 1497584062, 1),
(36, 34, 1, '个人资料', 'admin/admin_user/profile', '', 'fa-edit', 0, 110, 1489335383, 1496371996, 1),
(37, 34, 1, '日志管理', 'admin/logs', '', 'fa-info', 0, 100, 1489394592, 1494931863, 1),
(38, 0, 1, '统计管理', 'admin/statistics/default', '', 'fa-bar-chart', 0, 55, 1490002219, 1490021667, 1),
(39, 38, 1, '统计概览', 'admin/statistics/index', '', 'fa-circle-o', 0, 100, 1490021568, 1490021568, 1),
(48, 20, 0, '阿里云oss', 'admin/alioss', '', 'fa-list', 0, 100, 1494496312, 1499157398, 1),
(49, 25, 0, '微博登录', 'admin/weibologin/index', '', 'fa-list', 0, 100, 1494496555, 1503848351, 1),
(50, 37, 1, '系统日志', 'admin/syslog/index', '', 'fa-info-circle', 0, 100, 1494498392, 1497584191, 1),
(51, 25, 0, 'github登录', 'admin/thirdlogin/github', '', 'fa-pie-chart', 0, 100, 1494498424, 1499157789, 1),
(57, 35, 0, '查看日志', 'admin/dologs/view', '', 'fa-search-plus', 0, 100, 1495382629, 1495552300, 1),
(58, 17, 0, '文件下载', 'admin/admin_file/download', '', 'fa-download', 1, 100, 1495536279, 1497262778, 1),
(59, 20, 1, 'MarkDown编辑器', 'admin/markdown/index', '', 'fa-file-text-o', 1, 100, 1496885512, 1506081778, 1),
(60, 74, 1, '数据库备份', 'admin/databack/index', '', 'fa-database', 0, 100, 1502788380, 1504764342, 1),
(61, 60, 0, '添加备份', 'admin/databack/add', '', 'fa-plus', 0, 100, 1502789144, 1502789144, 1),
(62, 60, 0, '还原备份', 'admin/databack/reduction', '', 'fa-circle-o', 0, 100, 1502789201, 1502789201, 1),
(63, 60, 0, '删除备份', 'admin/databack/del', '', 'fa-close', 1, 100, 1502789239, 1502789239, 1),
(64, 0, 1, '用户测试', 'admin/user/index', '', 'fa-circle-o', 0, 100, 1502864020, 1502864020, 1),
(65, 64, 0, '添加用户', 'admin/user/add', '', 'fa-circle-o', 0, 100, 1502864686, 1502864702, 1),
(66, 64, 0, '编辑用户', 'admin/user/edit', '', 'fa-circle-o', 0, 100, 1502864733, 1502864733, 1),
(67, 64, 0, '删除用户', 'admin/user/del', '', 'fa-circle-o', 0, 100, 1502864755, 1502864755, 1),
(68, 23, 0, '编辑器上传', 'admin/ueditor/server', '', 'fa-server', 2, 100, 1503535735, 1504921345, 1),
(73, 74, 1, '数据表管理', 'admin/database/index', '', 'fa-list', 0, 100, 1504764209, 1504764438, 1),
(74, 34, 1, '数据维护', 'admin/database', '', 'fa-database', 0, 100, 1504764318, 1504764318, 1),
(75, 73, 0, '优化表', 'admin/database/optimize', '', 'fa-refresh', 1, 100, 1504764525, 1504764525, 1),
(76, 73, 0, '修复表', 'admin/database/repair', '', 'fa-circle-o-notch', 1, 100, 1504764592, 1504764592, 1),
(77, 73, 0, '查看表详情', 'admin/database/view', '', 'fa-info-circle', 1, 100, 1504764664, 1504764664, 1),
(78, 0, 0, '栏目管理', 'lanmuguanli', '', 'fa-circle-o', 0, 100, 1518361824, 1518404382, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bear_admin_users`
--

CREATE TABLE `bear_admin_users` (
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '用户id',
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `nick_name` varchar(30) DEFAULT NULL COMMENT '用户昵称或中文用户名',
  `avatar` varchar(255) DEFAULT 'avatar.png' COMMENT '用户头像',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `delete_time` int(10) UNSIGNED DEFAULT NULL COMMENT '是否被删除',
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT '1' COMMENT '用户状态1启用，2禁用'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='后台用户表';

--
-- 转存表中的数据 `bear_admin_users`
--

INSERT INTO `bear_admin_users` (`user_id`, `user_name`, `password`, `nick_name`, `avatar`, `create_time`, `update_time`, `delete_time`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '超级管理员', '1/20170524/aa579d638a236fd9ac06ff419ca88cb1.jpg', 1488189586, 1504170129, NULL, 1),
(2, 'admin2', '21232f297a57a5a743894a0e4a801fc3', '管理员2', 'avatar.png', 1488189586, 1502342521, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bear_admin_user_profiles`
--

CREATE TABLE `bear_admin_user_profiles` (
  `profile_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '用户id',
  `mobile` char(11) NOT NULL DEFAULT '' COMMENT '用户手机',
  `email` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `sex` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '默认1，男',
  `qq` varchar(11) NOT NULL DEFAULT '',
  `wechat` varchar(50) NOT NULL DEFAULT '',
  `weibo` varchar(100) NOT NULL DEFAULT '',
  `zhihu` varchar(100) NOT NULL DEFAULT '',
  `alipay` varchar(100) NOT NULL DEFAULT '',
  `education` varchar(100) NOT NULL DEFAULT '',
  `city` varchar(100) NOT NULL DEFAULT '',
  `skill` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `delete_time` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='后台用户扩展资料表';

--
-- 转存表中的数据 `bear_admin_user_profiles`
--

INSERT INTO `bear_admin_user_profiles` (`profile_id`, `user_id`, `mobile`, `email`, `description`, `sex`, `qq`, `wechat`, `weibo`, `zhihu`, `alipay`, `education`, `city`, `skill`, `create_time`, `update_time`, `delete_time`, `status`) VALUES
(1, 1, '18363083115', '8553151@qq.com', '我是超级管理员，不管你信不信。22', 1, '8553151', '8553151', 'weibo', 'zhihu', '', '', '济南', '', 0, 1503021449, NULL, 1),
(3, 2, '18355552220', '49548@qq.com', '', 1, '', '', '', '', '', '', '', '', 0, 1502337712, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bear_auth_groups`
--

CREATE TABLE `bear_auth_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(200) DEFAULT '' COMMENT '角色描述',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(350) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色表';

--
-- 转存表中的数据 `bear_auth_groups`
--

INSERT INTO `bear_auth_groups` (`id`, `title`, `description`, `status`, `rules`) VALUES
(1, '管理员', '管理员角色', 1, '1,2,3,4,5,6,7,8,9,10,11,15,14,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,49,50,51,52,57,58,59,60,61,62,63,64,65,66,67,68,70,73,74,75,76,77'),
(2, '普通管理员', '普通管理员', 1, '1,35,37');

-- --------------------------------------------------------

--
-- 表的结构 `bear_auth_group_access`
--

CREATE TABLE `bear_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色用户关联表';

--
-- 转存表中的数据 `bear_auth_group_access`
--

INSERT INTO `bear_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bear_auth_rules`
--

CREATE TABLE `bear_auth_rules` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `menu_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '关联菜单id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限规则表';

--
-- 转存表中的数据 `bear_auth_rules`
--

INSERT INTO `bear_auth_rules` (`id`, `name`, `title`, `type`, `status`, `condition`, `menu_id`) VALUES
(1, 'admin/index/index', '后台首页', 1, 1, '', 1),
(2, 'admin/sysconfig/index', '系统设置', 1, 1, '', 2),
(3, 'admin/role/add', '添加角色', 1, 1, '', 3),
(4, 'admin/role/del', '删除角色', 1, 1, '', 4),
(5, 'admin/role/edit', '修改角色', 1, 1, '', 5),
(6, 'admin/sysconfig/add', '添加设置', 1, 1, '', 6),
(7, 'admin/admin_menu/add', '添加菜单', 1, 1, '', 7),
(8, 'admin/admin_menu/del', '删除菜单', 1, 1, '', 8),
(9, 'admin/admin_menu/edit', '修改菜单', 1, 1, '', 9),
(10, 'admin/role/index', '角色管理', 1, 1, '', 10),
(11, 'admin/admin_menu/index', '菜单管理', 1, 1, '', 11),
(15, 'admin/sysconfig/edit', '编辑设置', 1, 1, '', 15),
(14, 'admin/admin_user/index', '用户管理', 1, 1, '', 14),
(17, 'admin/admin_user/add', '添加用户', 1, 1, '', 16),
(18, 'admin/admin_file/index', '文件管理', 1, 1, '', 17),
(19, 'admin/sysconfig/del', '删除设置', 1, 1, '', 18),
(20, 'admin/admin_file/upload', '上传文件', 1, 1, '', 19),
(21, 'admin/tools', '扩展功能', 1, 1, '', 20),
(22, 'admin/pay/index', '支付', 1, 1, '', 21),
(23, 'admin/weixinpay/index', '微信支付', 1, 1, '', 22),
(24, 'admin/ueditor/index', 'Ueditor', 1, 1, '', 23),
(25, 'admin/alipay/index', '支付宝支付', 1, 1, '', 24),
(26, 'admin/third_login/index', '第三方登录', 1, 1, '', 25),
(27, 'admin/third_login/qq', 'QQ登录', 1, 1, '', 26),
(28, 'admin/excel/index', 'Excel导入导出', 1, 1, '', 27),
(29, 'admin/admin_user/edit', '修改用户', 1, 1, '', 28),
(30, 'admin/admin_user/del', '删除用户', 1, 1, '', 29),
(31, 'admin/admin_mail/index', '发送邮件', 1, 1, '', 30),
(32, 'admin/admin_qrcode/index', '二维码生成', 1, 1, '', 31),
(33, 'admin/qiniucloud/index', '七牛云存储', 1, 1, '', 33),
(34, 'admin/alidayu/index', '阿里大于', 1, 1, '', 32),
(35, 'admin/sys', '系统管理', 1, 1, '', 34),
(36, 'admin/dolog/index', '操作日志', 1, 1, '', 35),
(37, 'admin/admin_user/profile', '个人资料', 1, 1, '', 36),
(38, 'admin/role/access', '授权管理', 1, 1, '', 12),
(39, 'admin/logs', '日志管理', 1, 1, '', 37),
(40, 'admin/statistics/default', '统计管理', 1, 1, '', 38),
(41, 'admin/statistics/index', '统计概览', 1, 1, '', 39),
(43, 'admin/erer/dkjfd', '测试二', 1, 1, '', 41),
(44, 'aldkfj/adfa/adf', '测试等i大', 1, 1, '', 42),
(45, 'afadfasdf', 'test222', 1, 1, '', 44),
(46, 'dakldfjadf', '阿德法地方', 1, 1, '', 45),
(47, 'adfadsfadsf', 'sfdgadf', 1, 1, '', 46),
(48, 'dafaf', 'adsfadf', 1, 1, '', 47),
(49, 'admin/alioss', '阿里云oss', 1, 1, '', 48),
(50, 'admin/weibologin/index', '微博登录', 1, 1, '', 49),
(51, 'admin/syslog/index', '系统日志', 1, 1, '', 50),
(52, 'admin/thirdlogin/github', 'github登录', 1, 1, '', 51),
(57, 'admin/dologs/view', '查看日志', 1, 1, '', 57),
(58, 'admin/admin_file/download', '文件下载', 1, 1, '', 58),
(59, 'admin/markdown/index', 'MarkDown编辑器', 1, 1, '', 59),
(60, 'admin/databack/index', '数据库备份', 1, 1, '', 60),
(61, 'admin/databack/add', '添加备份', 1, 1, '', 61),
(62, 'admin/databack/reduction', '还原备份', 1, 1, '', 62),
(63, 'admin/databack/del', '删除备份', 1, 1, '', 63),
(64, 'admin/user/index', '用户测试', 1, 1, '', 64),
(65, 'admin/user/add', '添加用户', 1, 1, '', 65),
(66, 'admin/user/edit', '编辑用户', 1, 1, '', 66),
(67, 'admin/user/del', '删除用户', 1, 1, '', 67),
(68, 'admin/ueditor/server', '编辑器上传', 1, 1, '', 68),
(73, 'admin/database/index', '数据表管理', 1, 1, '', 73),
(74, 'admin/database', '数据维护', 1, 1, '', 74),
(75, 'admin/database/optimize', '优化表', 1, 1, '', 75),
(76, 'admin/database/repair', '修复表', 1, 1, '', 76),
(77, 'admin/database/view', '查看表详情', 1, 1, '', 77),
(79, '123', '12', 1, 1, '', 79),
(80, '/addasd/asdasdsad', '测试菜单', 1, 1, '', 80),
(81, '/asd/asdadsad', 'ce 阿萨德啊a', 1, 1, '', 81),
(82, 'lanmuguanli', '栏目管理', 1, 1, '', 78);

-- --------------------------------------------------------

--
-- 表的结构 `bear_excel_examples`
--

CREATE TABLE `bear_excel_examples` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `sex` varchar(8) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='Excel示例表';

--
-- 转存表中的数据 `bear_excel_examples`
--

INSERT INTO `bear_excel_examples` (`id`, `name`, `age`, `sex`, `city`) VALUES
(1, '于破熊', 25, '男', '济南');

-- --------------------------------------------------------

--
-- 表的结构 `bear_news`
--

CREATE TABLE `bear_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '用户id',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `source_id` tinyint(2) UNSIGNED NOT NULL DEFAULT '1' COMMENT '来源id，再创建个来源表，1代表原创，2代表转载',
  `sort_id` int(10) UNSIGNED NOT NULL DEFAULT '100' COMMENT '排序id',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `delete_time` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='新闻表';

-- --------------------------------------------------------

--
-- 表的结构 `bear_news_types`
--

CREATE TABLE `bear_news_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上级id',
  `title` varchar(100) NOT NULL COMMENT '分类名称',
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL COMMENT '图片地址',
  `sort_id` int(10) UNSIGNED NOT NULL DEFAULT '100' COMMENT '排序id',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `delete_time` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='新闻类别表';

--
-- 转存表中的数据 `bear_news_types`
--

INSERT INTO `bear_news_types` (`id`, `parent_id`, `title`, `description`, `img`, `sort_id`, `create_time`, `update_time`, `delete_time`, `status`) VALUES
(1, 0, '生活资讯', '带你领略每一天！', '20170321/d78af52f78b2e634a97234c6dde9eba9.png', 100, 1490091741, 1490091741, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bear_request_type`
--

CREATE TABLE `bear_request_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(20) NOT NULL COMMENT '请求代码',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '默认状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='请求类型表';

--
-- 转存表中的数据 `bear_request_type`
--

INSERT INTO `bear_request_type` (`id`, `title`, `status`) VALUES
(1, 'GET', 1),
(2, 'POST', 1),
(3, 'PUT', 1),
(4, 'DELETE', 1);

-- --------------------------------------------------------

--
-- 表的结构 `bear_sysconfigs`
--

CREATE TABLE `bear_sysconfigs` (
  `sysconfig_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `is_open` tinyint(2) UNSIGNED NOT NULL DEFAULT '1',
  `description` varchar(255) NOT NULL,
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `delete_time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='系统参数表';

--
-- 转存表中的数据 `bear_sysconfigs`
--

INSERT INTO `bear_sysconfigs` (`sysconfig_id`, `name`, `code`, `content`, `is_open`, `description`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '后台名称12', 'site_name', 'BearAdminfggfg', 1, '网站后台名称，title和登录界面显示', 1502187289, 0, NULL),
(2, '测试', 'ceshi', '昵称', 1, '昵称说明', 1506366998, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `bear_syslogs`
--

CREATE TABLE `bear_syslogs` (
  `log_id` int(11) UNSIGNED NOT NULL,
  `level` int(8) UNSIGNED NOT NULL DEFAULT '0' COMMENT '错误等级',
  `message` varchar(255) NOT NULL COMMENT '错误信息',
  `file` varchar(255) NOT NULL COMMENT '文件',
  `line` int(10) UNSIGNED NOT NULL COMMENT '所在行数',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='系统错误日志表';

--
-- 转存表中的数据 `bear_syslogs`
--

INSERT INTO `bear_syslogs` (`log_id`, `level`, `message`, `file`, `line`, `create_time`) VALUES
(1, 0, 'The each() function is deprecated. This message will be suppressed on further calls', 'G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php', 707, 1518269463),
(2, 0, 'The each() function is deprecated. This message will be suppressed on further calls', 'G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php', 707, 1518269470),
(3, 0, 'The each() function is deprecated. This message will be suppressed on further calls', 'G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php', 707, 1518269471),
(4, 0, 'The each() function is deprecated. This message will be suppressed on further calls', 'G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php', 707, 1518269471),
(5, 0, 'The each() function is deprecated. This message will be suppressed on further calls', 'G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php', 707, 1518269471),
(6, 0, 'The each() function is deprecated. This message will be suppressed on further calls', 'G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php', 707, 1518269472),
(7, 0, 'The each() function is deprecated. This message will be suppressed on further calls', 'G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php', 707, 1518269472),
(8, 0, 'The each() function is deprecated. This message will be suppressed on further calls', 'G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php', 707, 1518269492),
(9, 0, 'The each() function is deprecated. This message will be suppressed on further calls', 'G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php', 707, 1518269583),
(10, 0, 'The each() function is deprecated. This message will be suppressed on further calls', 'G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php', 707, 1518269584),
(11, 0, 'The each() function is deprecated. This message will be suppressed on further calls', 'G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php', 707, 1518269585),
(12, 0, 'The each() function is deprecated. This message will be suppressed on further calls', 'G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php', 707, 1518269585),
(13, 0, 'The each() function is deprecated. This message will be suppressed on further calls', 'G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php', 707, 1518269585);

-- --------------------------------------------------------

--
-- 表的结构 `bear_syslog_trace`
--

CREATE TABLE `bear_syslog_trace` (
  `trace_id` int(11) UNSIGNED NOT NULL,
  `log_id` int(11) UNSIGNED NOT NULL COMMENT 'log id',
  `trace` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='系统日志trace表';

--
-- 转存表中的数据 `bear_syslog_trace`
--

INSERT INTO `bear_syslog_trace` (`trace_id`, `log_id`, `trace`) VALUES
(1, 1, '#0 [internal function]: think\\Error::appError(8192, \'The each() func...\', \'G:\\\\xampp\\\\htdocs...\', 707, Array)\n#1 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(707): each(Array)\n#2 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(689): think\\db\\Query->getJoinTable(Array)\n#3 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(908): think\\db\\Query->join(Array, \'AuthGroupAccess...\', \'LEFT\')\n#4 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(155): think\\db\\Query->view(\'AuthGroups\', Array, \'AuthGroupAccess...\', \'LEFT\')\n#5 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(381): app\\admin\\auth\\Auth->getGroups(1)\n#6 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(319): app\\admin\\auth\\Auth->getMenuList(1, 1)\n#7 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(129): app\\admin\\controller\\Base->getLeftMenu()\n#8 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Controller.php(57): app\\admin\\controller\\Base->_initialize()\n#9 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(53): think\\Controller->__construct()\n#10 [internal function]: app\\admin\\controller\\Base->__construct()\n#11 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(216): ReflectionClass->newInstanceArgs(Array)\n#12 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Loader.php(420): think\\App::invokeClass(\'app\\\\admin\\\\contr...\')\n#13 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(388): think\\Loader::controller(\'index\', \'controller\', false, \'Error\')\n#14 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(296): think\\App::module(Array, Array, true)\n#15 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(124): think\\App::exec(Array, Array)\n#16 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\start.php(18): think\\App::run()\n#17 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\public\\index.php(17): require(\'G:\\\\xampp\\\\htdocs...\')\n#18 {main}'),
(2, 2, '#0 [internal function]: think\\Error::appError(8192, \'The each() func...\', \'G:\\\\xampp\\\\htdocs...\', 707, Array)\n#1 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(707): each(Array)\n#2 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(689): think\\db\\Query->getJoinTable(Array)\n#3 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(908): think\\db\\Query->join(Array, \'AuthGroupAccess...\', \'LEFT\')\n#4 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(155): think\\db\\Query->view(\'AuthGroups\', Array, \'AuthGroupAccess...\', \'LEFT\')\n#5 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(381): app\\admin\\auth\\Auth->getGroups(1)\n#6 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(319): app\\admin\\auth\\Auth->getMenuList(1, 1)\n#7 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(129): app\\admin\\controller\\Base->getLeftMenu()\n#8 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Controller.php(57): app\\admin\\controller\\Base->_initialize()\n#9 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(53): think\\Controller->__construct()\n#10 [internal function]: app\\admin\\controller\\Base->__construct()\n#11 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(216): ReflectionClass->newInstanceArgs(Array)\n#12 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Loader.php(420): think\\App::invokeClass(\'app\\\\admin\\\\contr...\')\n#13 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(388): think\\Loader::controller(\'index\', \'controller\', false, \'Error\')\n#14 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(296): think\\App::module(Array, Array, true)\n#15 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(124): think\\App::exec(Array, Array)\n#16 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\start.php(18): think\\App::run()\n#17 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\public\\index.php(17): require(\'G:\\\\xampp\\\\htdocs...\')\n#18 {main}'),
(3, 3, '#0 [internal function]: think\\Error::appError(8192, \'The each() func...\', \'G:\\\\xampp\\\\htdocs...\', 707, Array)\n#1 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(707): each(Array)\n#2 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(689): think\\db\\Query->getJoinTable(Array)\n#3 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(908): think\\db\\Query->join(Array, \'AuthGroupAccess...\', \'LEFT\')\n#4 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(155): think\\db\\Query->view(\'AuthGroups\', Array, \'AuthGroupAccess...\', \'LEFT\')\n#5 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(381): app\\admin\\auth\\Auth->getGroups(1)\n#6 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(319): app\\admin\\auth\\Auth->getMenuList(1, 1)\n#7 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(129): app\\admin\\controller\\Base->getLeftMenu()\n#8 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Controller.php(57): app\\admin\\controller\\Base->_initialize()\n#9 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(53): think\\Controller->__construct()\n#10 [internal function]: app\\admin\\controller\\Base->__construct()\n#11 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(216): ReflectionClass->newInstanceArgs(Array)\n#12 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Loader.php(420): think\\App::invokeClass(\'app\\\\admin\\\\contr...\')\n#13 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(388): think\\Loader::controller(\'index\', \'controller\', false, \'Error\')\n#14 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(296): think\\App::module(Array, Array, true)\n#15 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(124): think\\App::exec(Array, Array)\n#16 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\start.php(18): think\\App::run()\n#17 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\public\\index.php(17): require(\'G:\\\\xampp\\\\htdocs...\')\n#18 {main}'),
(4, 4, '#0 [internal function]: think\\Error::appError(8192, \'The each() func...\', \'G:\\\\xampp\\\\htdocs...\', 707, Array)\n#1 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(707): each(Array)\n#2 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(689): think\\db\\Query->getJoinTable(Array)\n#3 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(908): think\\db\\Query->join(Array, \'AuthGroupAccess...\', \'LEFT\')\n#4 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(155): think\\db\\Query->view(\'AuthGroups\', Array, \'AuthGroupAccess...\', \'LEFT\')\n#5 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(381): app\\admin\\auth\\Auth->getGroups(1)\n#6 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(319): app\\admin\\auth\\Auth->getMenuList(1, 1)\n#7 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(129): app\\admin\\controller\\Base->getLeftMenu()\n#8 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Controller.php(57): app\\admin\\controller\\Base->_initialize()\n#9 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(53): think\\Controller->__construct()\n#10 [internal function]: app\\admin\\controller\\Base->__construct()\n#11 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(216): ReflectionClass->newInstanceArgs(Array)\n#12 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Loader.php(420): think\\App::invokeClass(\'app\\\\admin\\\\contr...\')\n#13 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(388): think\\Loader::controller(\'index\', \'controller\', false, \'Error\')\n#14 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(296): think\\App::module(Array, Array, true)\n#15 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(124): think\\App::exec(Array, Array)\n#16 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\start.php(18): think\\App::run()\n#17 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\public\\index.php(17): require(\'G:\\\\xampp\\\\htdocs...\')\n#18 {main}'),
(5, 5, '#0 [internal function]: think\\Error::appError(8192, \'The each() func...\', \'G:\\\\xampp\\\\htdocs...\', 707, Array)\n#1 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(707): each(Array)\n#2 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(689): think\\db\\Query->getJoinTable(Array)\n#3 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(908): think\\db\\Query->join(Array, \'AuthGroupAccess...\', \'LEFT\')\n#4 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(155): think\\db\\Query->view(\'AuthGroups\', Array, \'AuthGroupAccess...\', \'LEFT\')\n#5 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(381): app\\admin\\auth\\Auth->getGroups(1)\n#6 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(319): app\\admin\\auth\\Auth->getMenuList(1, 1)\n#7 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(129): app\\admin\\controller\\Base->getLeftMenu()\n#8 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Controller.php(57): app\\admin\\controller\\Base->_initialize()\n#9 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(53): think\\Controller->__construct()\n#10 [internal function]: app\\admin\\controller\\Base->__construct()\n#11 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(216): ReflectionClass->newInstanceArgs(Array)\n#12 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Loader.php(420): think\\App::invokeClass(\'app\\\\admin\\\\contr...\')\n#13 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(388): think\\Loader::controller(\'index\', \'controller\', false, \'Error\')\n#14 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(296): think\\App::module(Array, Array, true)\n#15 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(124): think\\App::exec(Array, Array)\n#16 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\start.php(18): think\\App::run()\n#17 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\public\\index.php(17): require(\'G:\\\\xampp\\\\htdocs...\')\n#18 {main}'),
(6, 6, '#0 [internal function]: think\\Error::appError(8192, \'The each() func...\', \'G:\\\\xampp\\\\htdocs...\', 707, Array)\n#1 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(707): each(Array)\n#2 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(689): think\\db\\Query->getJoinTable(Array)\n#3 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(908): think\\db\\Query->join(Array, \'AuthGroupAccess...\', \'LEFT\')\n#4 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(155): think\\db\\Query->view(\'AuthGroups\', Array, \'AuthGroupAccess...\', \'LEFT\')\n#5 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(381): app\\admin\\auth\\Auth->getGroups(1)\n#6 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(319): app\\admin\\auth\\Auth->getMenuList(1, 1)\n#7 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(129): app\\admin\\controller\\Base->getLeftMenu()\n#8 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Controller.php(57): app\\admin\\controller\\Base->_initialize()\n#9 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(53): think\\Controller->__construct()\n#10 [internal function]: app\\admin\\controller\\Base->__construct()\n#11 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(216): ReflectionClass->newInstanceArgs(Array)\n#12 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Loader.php(420): think\\App::invokeClass(\'app\\\\admin\\\\contr...\')\n#13 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(388): think\\Loader::controller(\'index\', \'controller\', false, \'Error\')\n#14 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(296): think\\App::module(Array, Array, true)\n#15 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(124): think\\App::exec(Array, Array)\n#16 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\start.php(18): think\\App::run()\n#17 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\public\\index.php(17): require(\'G:\\\\xampp\\\\htdocs...\')\n#18 {main}'),
(7, 7, '#0 [internal function]: think\\Error::appError(8192, \'The each() func...\', \'G:\\\\xampp\\\\htdocs...\', 707, Array)\n#1 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(707): each(Array)\n#2 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(689): think\\db\\Query->getJoinTable(Array)\n#3 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(908): think\\db\\Query->join(Array, \'AuthGroupAccess...\', \'LEFT\')\n#4 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(155): think\\db\\Query->view(\'AuthGroups\', Array, \'AuthGroupAccess...\', \'LEFT\')\n#5 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(381): app\\admin\\auth\\Auth->getGroups(1)\n#6 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(319): app\\admin\\auth\\Auth->getMenuList(1, 1)\n#7 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(129): app\\admin\\controller\\Base->getLeftMenu()\n#8 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Controller.php(57): app\\admin\\controller\\Base->_initialize()\n#9 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(53): think\\Controller->__construct()\n#10 [internal function]: app\\admin\\controller\\Base->__construct()\n#11 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(216): ReflectionClass->newInstanceArgs(Array)\n#12 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Loader.php(420): think\\App::invokeClass(\'app\\\\admin\\\\contr...\')\n#13 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(388): think\\Loader::controller(\'index\', \'controller\', false, \'Error\')\n#14 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(296): think\\App::module(Array, Array, true)\n#15 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(124): think\\App::exec(Array, Array)\n#16 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\start.php(18): think\\App::run()\n#17 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\public\\index.php(17): require(\'G:\\\\xampp\\\\htdocs...\')\n#18 {main}'),
(8, 8, '#0 [internal function]: think\\Error::appError(8192, \'The each() func...\', \'G:\\\\xampp\\\\htdocs...\', 707, Array)\n#1 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(707): each(Array)\n#2 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(689): think\\db\\Query->getJoinTable(Array)\n#3 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(908): think\\db\\Query->join(Array, \'AuthGroupAccess...\', \'LEFT\')\n#4 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(155): think\\db\\Query->view(\'AuthGroups\', Array, \'AuthGroupAccess...\', \'LEFT\')\n#5 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(381): app\\admin\\auth\\Auth->getGroups(1)\n#6 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(319): app\\admin\\auth\\Auth->getMenuList(1, 1)\n#7 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(129): app\\admin\\controller\\Base->getLeftMenu()\n#8 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Controller.php(57): app\\admin\\controller\\Base->_initialize()\n#9 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(53): think\\Controller->__construct()\n#10 [internal function]: app\\admin\\controller\\Base->__construct()\n#11 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(216): ReflectionClass->newInstanceArgs(Array)\n#12 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Loader.php(420): think\\App::invokeClass(\'app\\\\admin\\\\contr...\')\n#13 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(388): think\\Loader::controller(\'index\', \'controller\', false, \'Error\')\n#14 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(296): think\\App::module(Array, Array, true)\n#15 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(124): think\\App::exec(Array, Array)\n#16 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\start.php(18): think\\App::run()\n#17 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\public\\index.php(17): require(\'G:\\\\xampp\\\\htdocs...\')\n#18 {main}'),
(9, 9, '#0 [internal function]: think\\Error::appError(8192, \'The each() func...\', \'G:\\\\xampp\\\\htdocs...\', 707, Array)\n#1 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(707): each(Array)\n#2 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(689): think\\db\\Query->getJoinTable(Array)\n#3 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(908): think\\db\\Query->join(Array, \'AuthGroupAccess...\', \'LEFT\')\n#4 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(155): think\\db\\Query->view(\'AuthGroups\', Array, \'AuthGroupAccess...\', \'LEFT\')\n#5 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(381): app\\admin\\auth\\Auth->getGroups(1)\n#6 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(319): app\\admin\\auth\\Auth->getMenuList(1, 1)\n#7 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(129): app\\admin\\controller\\Base->getLeftMenu()\n#8 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Controller.php(57): app\\admin\\controller\\Base->_initialize()\n#9 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(53): think\\Controller->__construct()\n#10 [internal function]: app\\admin\\controller\\Base->__construct()\n#11 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(216): ReflectionClass->newInstanceArgs(Array)\n#12 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Loader.php(400): think\\App::invokeClass(\'app\\\\admin\\\\contr...\')\n#13 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(388): think\\Loader::controller(\'index\', \'controller\', false, \'Error\')\n#14 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(296): think\\App::module(Array, Array, true)\n#15 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(124): think\\App::exec(Array, Array)\n#16 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\start.php(18): think\\App::run()\n#17 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\public\\index.php(17): require(\'G:\\\\xampp\\\\htdocs...\')\n#18 {main}'),
(10, 10, '#0 [internal function]: think\\Error::appError(8192, \'The each() func...\', \'G:\\\\xampp\\\\htdocs...\', 707, Array)\n#1 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(707): each(Array)\n#2 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(689): think\\db\\Query->getJoinTable(Array)\n#3 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(908): think\\db\\Query->join(Array, \'AuthGroupAccess...\', \'LEFT\')\n#4 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(155): think\\db\\Query->view(\'AuthGroups\', Array, \'AuthGroupAccess...\', \'LEFT\')\n#5 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(381): app\\admin\\auth\\Auth->getGroups(1)\n#6 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(319): app\\admin\\auth\\Auth->getMenuList(1, 1)\n#7 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(129): app\\admin\\controller\\Base->getLeftMenu()\n#8 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Controller.php(57): app\\admin\\controller\\Base->_initialize()\n#9 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(53): think\\Controller->__construct()\n#10 [internal function]: app\\admin\\controller\\Base->__construct()\n#11 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(216): ReflectionClass->newInstanceArgs(Array)\n#12 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Loader.php(400): think\\App::invokeClass(\'app\\\\admin\\\\contr...\')\n#13 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(388): think\\Loader::controller(\'index\', \'controller\', false, \'Error\')\n#14 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(296): think\\App::module(Array, Array, true)\n#15 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(124): think\\App::exec(Array, Array)\n#16 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\start.php(18): think\\App::run()\n#17 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\public\\index.php(17): require(\'G:\\\\xampp\\\\htdocs...\')\n#18 {main}'),
(11, 11, '#0 [internal function]: think\\Error::appError(8192, \'The each() func...\', \'G:\\\\xampp\\\\htdocs...\', 707, Array)\n#1 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(707): each(Array)\n#2 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(689): think\\db\\Query->getJoinTable(Array)\n#3 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(908): think\\db\\Query->join(Array, \'AuthGroupAccess...\', \'LEFT\')\n#4 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(155): think\\db\\Query->view(\'AuthGroups\', Array, \'AuthGroupAccess...\', \'LEFT\')\n#5 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(381): app\\admin\\auth\\Auth->getGroups(1)\n#6 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(319): app\\admin\\auth\\Auth->getMenuList(1, 1)\n#7 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(129): app\\admin\\controller\\Base->getLeftMenu()\n#8 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Controller.php(57): app\\admin\\controller\\Base->_initialize()\n#9 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(53): think\\Controller->__construct()\n#10 [internal function]: app\\admin\\controller\\Base->__construct()\n#11 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(216): ReflectionClass->newInstanceArgs(Array)\n#12 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Loader.php(400): think\\App::invokeClass(\'app\\\\admin\\\\contr...\')\n#13 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(388): think\\Loader::controller(\'index\', \'controller\', false, \'Error\')\n#14 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(296): think\\App::module(Array, Array, true)\n#15 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(124): think\\App::exec(Array, Array)\n#16 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\start.php(18): think\\App::run()\n#17 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\public\\index.php(17): require(\'G:\\\\xampp\\\\htdocs...\')\n#18 {main}'),
(12, 12, '#0 [internal function]: think\\Error::appError(8192, \'The each() func...\', \'G:\\\\xampp\\\\htdocs...\', 707, Array)\n#1 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(707): each(Array)\n#2 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(689): think\\db\\Query->getJoinTable(Array)\n#3 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(908): think\\db\\Query->join(Array, \'AuthGroupAccess...\', \'LEFT\')\n#4 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(155): think\\db\\Query->view(\'AuthGroups\', Array, \'AuthGroupAccess...\', \'LEFT\')\n#5 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(381): app\\admin\\auth\\Auth->getGroups(1)\n#6 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(319): app\\admin\\auth\\Auth->getMenuList(1, 1)\n#7 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(129): app\\admin\\controller\\Base->getLeftMenu()\n#8 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Controller.php(57): app\\admin\\controller\\Base->_initialize()\n#9 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(53): think\\Controller->__construct()\n#10 [internal function]: app\\admin\\controller\\Base->__construct()\n#11 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(216): ReflectionClass->newInstanceArgs(Array)\n#12 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Loader.php(400): think\\App::invokeClass(\'app\\\\admin\\\\contr...\')\n#13 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(388): think\\Loader::controller(\'index\', \'controller\', false, \'Error\')\n#14 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(296): think\\App::module(Array, Array, true)\n#15 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(124): think\\App::exec(Array, Array)\n#16 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\start.php(18): think\\App::run()\n#17 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\public\\index.php(17): require(\'G:\\\\xampp\\\\htdocs...\')\n#18 {main}'),
(13, 13, '#0 [internal function]: think\\Error::appError(8192, \'The each() func...\', \'G:\\\\xampp\\\\htdocs...\', 707, Array)\n#1 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(707): each(Array)\n#2 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(689): think\\db\\Query->getJoinTable(Array)\n#3 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\db\\Query.php(908): think\\db\\Query->join(Array, \'AuthGroupAccess...\', \'LEFT\')\n#4 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(155): think\\db\\Query->view(\'AuthGroups\', Array, \'AuthGroupAccess...\', \'LEFT\')\n#5 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\auth\\Auth.php(381): app\\admin\\auth\\Auth->getGroups(1)\n#6 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(319): app\\admin\\auth\\Auth->getMenuList(1, 1)\n#7 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(129): app\\admin\\controller\\Base->getLeftMenu()\n#8 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Controller.php(57): app\\admin\\controller\\Base->_initialize()\n#9 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\application\\admin\\controller\\Base.php(53): think\\Controller->__construct()\n#10 [internal function]: app\\admin\\controller\\Base->__construct()\n#11 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(216): ReflectionClass->newInstanceArgs(Array)\n#12 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\Loader.php(400): think\\App::invokeClass(\'app\\\\admin\\\\contr...\')\n#13 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(388): think\\Loader::controller(\'index\', \'controller\', false, \'Error\')\n#14 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(296): think\\App::module(Array, Array, true)\n#15 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\library\\think\\App.php(124): think\\App::exec(Array, Array)\n#16 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\thinkphp\\start.php(18): think\\App::run()\n#17 G:\\xampp\\htdocs\\MyProject\\src\\MyPhpCms\\BearAdmin\\public\\index.php(17): require(\'G:\\\\xampp\\\\htdocs...\')\n#18 {main}');

-- --------------------------------------------------------

--
-- 表的结构 `bear_users`
--

CREATE TABLE `bear_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(24) NOT NULL COMMENT '用户名，最大长度目前24',
  `password` char(32) NOT NULL,
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  `delete_time` int(10) UNSIGNED DEFAULT NULL COMMENT '软删除时间戳'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='前台用户表';

--
-- 转存表中的数据 `bear_users`
--

INSERT INTO `bear_users` (`id`, `user_name`, `password`, `create_time`, `update_time`, `delete_time`) VALUES
(1, 'test', 'test', 1502864773, 1502866453, 1502866453);

-- --------------------------------------------------------

--
-- 表的结构 `think_admin_menus`
--

CREATE TABLE `think_admin_menus` (
  `menu_id` int(11) UNSIGNED NOT NULL COMMENT '菜单id',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '父级id',
  `is_show` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '是否显示',
  `title` varchar(50) NOT NULL COMMENT '菜单名称',
  `url` varchar(100) NOT NULL COMMENT '模块/控制器/方法',
  `param` varchar(100) NOT NULL DEFAULT '',
  `icon` varchar(50) NOT NULL DEFAULT 'fa-circle-o' COMMENT '菜单图标',
  `log_type` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0不记录日志，1get，2post，3put，4delete，先这些啦',
  `sort_id` smallint(5) UNSIGNED NOT NULL DEFAULT '100' COMMENT '排序id',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1' COMMENT '状态：1默认正常，2禁用'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

--
-- 转存表中的数据 `think_admin_menus`
--

INSERT INTO `think_admin_menus` (`menu_id`, `parent_id`, `is_show`, `title`, `url`, `param`, `icon`, `log_type`, `sort_id`, `create_time`, `update_time`, `status`) VALUES
(1, 0, 1, '后台首页', 'admin/index/index', '', 'fa-home', 0, 1, 0, 1489371526, 1),
(2, 34, 1, '系统设置', 'admin/sysconfig/index', '', 'fa-cogs', 0, 998, 0, 1502187600, 1),
(3, 10, 0, '添加角色', 'admin/role/add', '', 'fa-plus', 2, 100, 0, 1501157348, 1),
(4, 10, 0, '删除角色', 'admin/role/del', '', 'fa-close', 1, 100, 0, 1502344725, 1),
(5, 10, 0, '修改角色', 'admin/role/edit', '', 'fa-edit', 2, 100, 0, 1495007134, 1),
(6, 2, 0, '添加设置', 'admin/sysconfig/add', '', 'fa-plus', 2, 100, 0, 1502344270, 1),
(7, 11, 0, '添加菜单', 'admin/admin_menu/add', '', 'fa-plus', 2, 100, 0, 1501157447, 1),
(8, 11, 0, '删除菜单', 'admin/admin_menu/del', '', 'fa-close', 1, 100, 0, 1502344737, 1),
(9, 11, 0, '修改菜单', 'admin/admin_menu/edit', '', 'fa-edit', 2, 100, 0, 1495010837, 1),
(10, 34, 1, '角色管理', 'admin/role/index', '', 'fa-group', 0, 100, 0, 1501157271, 1),
(11, 34, 1, '菜单管理', 'admin/admin_menu/index', '', 'fa-th-list', 0, 100, 0, 1501157420, 1),
(12, 10, 0, '授权管理', 'admin/role/access', '', 'fa-key', 2, 100, 0, 1495010813, 1),
(14, 34, 1, '用户管理', 'admin/admin_user/index', '', 'fa-user-secret', 0, 99, 0, 1501157040, 1),
(15, 2, 0, '编辑设置', 'admin/sysconfig/edit', '', 'fa-edit', 2, 100, 0, 1502344279, 1),
(16, 14, 0, '添加用户', 'admin/admin_user/add', '', 'fa-plus', 2, 100, 0, 1501157217, 1),
(17, 34, 1, '文件管理', 'admin/admin_file/index', '', 'fa-file-o', 0, 101, 0, 1501157504, 1),
(18, 2, 0, '删除设置', 'admin/sysconfig/del', '', 'fa-close', 1, 100, 0, 1502344288, 1),
(19, 17, 0, '上传文件', 'admin/admin_file/upload', '', 'fa-upload', 2, 100, 0, 1496373547, 1),
(20, 34, 1, '扩展功能', 'admin/tools', '', 'fa-plus-circle', 0, 102, 0, 1496371967, 1),
(21, 20, 1, '支付', 'admin/pay/index', '', 'fa-credit-card', 0, 51, 0, 1496800099, 1),
(22, 21, 1, '微信支付', 'admin/weixinpay/index', '', 'fa-wechat', 0, 100, 0, 1496802274, 1),
(23, 20, 1, 'Ueditor', 'admin/ueditor/index', '', 'fa-edit', 2, 100, 0, 1496652277, 1),
(24, 21, 1, '支付宝支付', 'admin/alipay/index', '', 'fa-rmb', 0, 100, 0, 1496802516, 1),
(25, 20, 1, '第三方登录', 'admin/third_login/index', '', 'fa-exchange', 1, 55, 0, 1503847993, 1),
(26, 25, 0, 'QQ登录', 'admin/third_login/qq', '', 'fa-qq', 0, 100, 0, 1503848342, 1),
(27, 20, 1, 'Excel导入导出', 'admin/excel/index', '', 'fa-close', 2, 110, 0, 1496746818, 1),
(28, 14, 0, '修改用户', 'admin/admin_user/edit', '', 'fa-edit', 2, 100, 0, 1495006610, 1),
(29, 14, 0, '删除用户', 'admin/admin_user/del', '', 'fa-close', 1, 100, 0, 1502344303, 1),
(30, 20, 1, '发送邮件', 'admin/admin_mail/index', '', 'fa-envelope', 2, 100, 0, 1496651424, 1),
(31, 20, 1, '二维码生成', 'admin/admin_qrcode/index', '', 'fa-qrcode', 2, 100, 0, 1496651897, 1),
(32, 20, 1, '阿里大于', 'admin/alidayu/index', '', 'fa-comment', 2, 100, 1489335056, 1496652347, 1),
(33, 20, 0, '七牛云存储', 'admin/qiniucloud/index', '', 'fa-cloud', 0, 100, 1489335136, 1499157737, 1),
(34, 0, 1, '系统管理', 'admin/sys', '', 'fa-gear', 0, 100, 1489335249, 1496385260, 1),
(35, 37, 1, '操作日志', 'admin/dolog/index', '', 'fa-keyboard-o', 0, 100, 1489335334, 1497584062, 1),
(36, 34, 1, '个人资料', 'admin/admin_user/profile', '', 'fa-edit', 0, 110, 1489335383, 1496371996, 1),
(37, 34, 1, '日志管理', 'admin/logs', '', 'fa-info', 0, 100, 1489394592, 1494931863, 1),
(38, 0, 1, '统计管理', 'admin/statistics/default', '', 'fa-bar-chart', 0, 55, 1490002219, 1490021667, 1),
(39, 38, 1, '统计概览', 'admin/statistics/index', '', 'fa-circle-o', 0, 100, 1490021568, 1490021568, 1),
(48, 20, 0, '阿里云oss', 'admin/alioss', '', 'fa-list', 0, 100, 1494496312, 1499157398, 1),
(49, 25, 0, '微博登录', 'admin/weibologin/index', '', 'fa-list', 0, 100, 1494496555, 1503848351, 1),
(50, 37, 1, '系统日志', 'admin/syslog/index', '', 'fa-info-circle', 0, 100, 1494498392, 1497584191, 1),
(51, 25, 0, 'github登录', 'admin/thirdlogin/github', '', 'fa-pie-chart', 0, 100, 1494498424, 1499157789, 1),
(57, 35, 0, '查看日志', 'admin/dologs/view', '', 'fa-search-plus', 0, 100, 1495382629, 1495552300, 1),
(58, 17, 0, '文件下载', 'admin/admin_file/download', '', 'fa-download', 1, 100, 1495536279, 1497262778, 1),
(59, 20, 1, 'MarkDown编辑器', 'admin/markdown/index', '', 'fa-file-text-o', 1, 100, 1496885512, 1506081778, 1),
(60, 74, 1, '数据库备份', 'admin/databack/index', '', 'fa-database', 0, 100, 1502788380, 1504764342, 1),
(61, 60, 0, '添加备份', 'admin/databack/add', '', 'fa-plus', 0, 100, 1502789144, 1502789144, 1),
(62, 60, 0, '还原备份', 'admin/databack/reduction', '', 'fa-circle-o', 0, 100, 1502789201, 1502789201, 1),
(63, 60, 0, '删除备份', 'admin/databack/del', '', 'fa-close', 1, 100, 1502789239, 1502789239, 1),
(64, 0, 1, '用户测试', 'admin/user/index', '', 'fa-circle-o', 0, 100, 1502864020, 1502864020, 1),
(65, 64, 0, '添加用户', 'admin/user/add', '', 'fa-circle-o', 0, 100, 1502864686, 1502864702, 1),
(66, 64, 0, '编辑用户', 'admin/user/edit', '', 'fa-circle-o', 0, 100, 1502864733, 1502864733, 1),
(67, 64, 0, '删除用户', 'admin/user/del', '', 'fa-circle-o', 0, 100, 1502864755, 1502864755, 1),
(68, 23, 0, '编辑器上传', 'admin/ueditor/server', '', 'fa-server', 2, 100, 1503535735, 1504921345, 1),
(73, 74, 1, '数据表管理', 'admin/database/index', '', 'fa-list', 0, 100, 1504764209, 1504764438, 1),
(74, 34, 1, '数据维护', 'admin/database', '', 'fa-database', 0, 100, 1504764318, 1504764318, 1),
(75, 73, 0, '优化表', 'admin/database/optimize', '', 'fa-refresh', 1, 100, 1504764525, 1504764525, 1),
(76, 73, 0, '修复表', 'admin/database/repair', '', 'fa-circle-o-notch', 1, 100, 1504764592, 1504764592, 1),
(77, 73, 0, '查看表详情', 'admin/database/view', '', 'fa-info-circle', 1, 100, 1504764664, 1504764664, 1),
(78, 0, 1, '栏目管理', 'lanmuguanli', '', 'fa-circle-o', 0, 100, 1518361824, 1518361824, 1);

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
-- 表的结构 `think_auth_rules`
--

CREATE TABLE `think_auth_rules` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `menu_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '关联菜单id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限规则表';

--
-- 转存表中的数据 `think_auth_rules`
--

INSERT INTO `think_auth_rules` (`id`, `name`, `title`, `type`, `status`, `condition`, `menu_id`) VALUES
(1, 'admin/index/index', '后台首页', 1, 1, '', 1),
(2, 'admin/sysconfig/index', '系统设置', 1, 1, '', 2),
(3, 'admin/role/add', '添加角色', 1, 1, '', 3),
(4, 'admin/role/del', '删除角色', 1, 1, '', 4),
(5, 'admin/role/edit', '修改角色', 1, 1, '', 5),
(6, 'admin/sysconfig/add', '添加设置', 1, 1, '', 6),
(7, 'admin/admin_menu/add', '添加菜单', 1, 1, '', 7),
(8, 'admin/admin_menu/del', '删除菜单', 1, 1, '', 8),
(9, 'admin/admin_menu/edit', '修改菜单', 1, 1, '', 9),
(10, 'admin/role/index', '角色管理', 1, 1, '', 10),
(11, 'admin/admin_menu/index', '菜单管理', 1, 1, '', 11),
(15, 'admin/sysconfig/edit', '编辑设置', 1, 1, '', 15),
(14, 'admin/admin_user/index', '用户管理', 1, 1, '', 14),
(17, 'admin/admin_user/add', '添加用户', 1, 1, '', 16),
(18, 'admin/admin_file/index', '文件管理', 1, 1, '', 17),
(19, 'admin/sysconfig/del', '删除设置', 1, 1, '', 18),
(20, 'admin/admin_file/upload', '上传文件', 1, 1, '', 19),
(21, 'admin/tools', '扩展功能', 1, 1, '', 20),
(22, 'admin/pay/index', '支付', 1, 1, '', 21),
(23, 'admin/weixinpay/index', '微信支付', 1, 1, '', 22),
(24, 'admin/ueditor/index', 'Ueditor', 1, 1, '', 23),
(25, 'admin/alipay/index', '支付宝支付', 1, 1, '', 24),
(26, 'admin/third_login/index', '第三方登录', 1, 1, '', 25),
(27, 'admin/third_login/qq', 'QQ登录', 1, 1, '', 26),
(28, 'admin/excel/index', 'Excel导入导出', 1, 1, '', 27),
(29, 'admin/admin_user/edit', '修改用户', 1, 1, '', 28),
(30, 'admin/admin_user/del', '删除用户', 1, 1, '', 29),
(31, 'admin/admin_mail/index', '发送邮件', 1, 1, '', 30),
(32, 'admin/admin_qrcode/index', '二维码生成', 1, 1, '', 31),
(33, 'admin/qiniucloud/index', '七牛云存储', 1, 1, '', 33),
(34, 'admin/alidayu/index', '阿里大于', 1, 1, '', 32),
(35, 'admin/sys', '系统管理', 1, 1, '', 34),
(36, 'admin/dolog/index', '操作日志', 1, 1, '', 35),
(37, 'admin/admin_user/profile', '个人资料', 1, 1, '', 36),
(38, 'admin/role/access', '授权管理', 1, 1, '', 12),
(39, 'admin/logs', '日志管理', 1, 1, '', 37),
(40, 'admin/statistics/default', '统计管理', 1, 1, '', 38),
(41, 'admin/statistics/index', '统计概览', 1, 1, '', 39),
(43, 'admin/erer/dkjfd', '测试二', 1, 1, '', 41),
(44, 'aldkfj/adfa/adf', '测试等i大', 1, 1, '', 42),
(45, 'afadfasdf', 'test222', 1, 1, '', 44),
(46, 'dakldfjadf', '阿德法地方', 1, 1, '', 45),
(47, 'adfadsfadsf', 'sfdgadf', 1, 1, '', 46),
(48, 'dafaf', 'adsfadf', 1, 1, '', 47),
(49, 'admin/alioss', '阿里云oss', 1, 1, '', 48),
(50, 'admin/weibologin/index', '微博登录', 1, 1, '', 49),
(51, 'admin/syslog/index', '系统日志', 1, 1, '', 50),
(52, 'admin/thirdlogin/github', 'github登录', 1, 1, '', 51),
(57, 'admin/dologs/view', '查看日志', 1, 1, '', 57),
(58, 'admin/admin_file/download', '文件下载', 1, 1, '', 58),
(59, 'admin/markdown/index', 'MarkDown编辑器', 1, 1, '', 59),
(60, 'admin/databack/index', '数据库备份', 1, 1, '', 60),
(61, 'admin/databack/add', '添加备份', 1, 1, '', 61),
(62, 'admin/databack/reduction', '还原备份', 1, 1, '', 62),
(63, 'admin/databack/del', '删除备份', 1, 1, '', 63),
(64, 'admin/user/index', '用户测试', 1, 1, '', 64),
(65, 'admin/user/add', '添加用户', 1, 1, '', 65),
(66, 'admin/user/edit', '编辑用户', 1, 1, '', 66),
(67, 'admin/user/del', '删除用户', 1, 1, '', 67),
(68, 'admin/ueditor/server', '编辑器上传', 1, 1, '', 68),
(73, 'admin/database/index', '数据表管理', 1, 1, '', 73),
(74, 'admin/database', '数据维护', 1, 1, '', 74),
(75, 'admin/database/optimize', '优化表', 1, 1, '', 75),
(76, 'admin/database/repair', '修复表', 1, 1, '', 76),
(77, 'admin/database/view', '查看表详情', 1, 1, '', 77),
(79, '123', '12', 1, 1, '', 79),
(80, '/addasd/asdasdsad', '测试菜单', 1, 1, '', 80),
(81, '/asd/asdadsad', 'ce 阿萨德啊a', 1, 1, '', 81),
(82, 'lanmuguanli', '栏目管理', 1, 1, '', 78);

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_user`
--

CREATE TABLE `think_auth_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(11) NOT NULL DEFAULT '',
  `sex` enum('男','女','保密') NOT NULL DEFAULT '保密',
  `occupation` varchar(30) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `qq` varchar(20) NOT NULL DEFAULT '',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL,
  `delete_time` int(11) UNSIGNED DEFAULT NULL,
  `reg_ip` bigint(20) NOT NULL DEFAULT '0',
  `last_login_time` int(10) NOT NULL DEFAULT '0',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0',
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `think_auth_user`
--

INSERT INTO `think_auth_user` (`id`, `username`, `password`, `email`, `phone`, `sex`, `occupation`, `birthday`, `qq`, `create_time`, `update_time`, `delete_time`, `reg_ip`, `last_login_time`, `last_login_ip`, `status`) VALUES
(1, 'yyh1', '96e79218965eb72c92a549dd5a330112', '1@qq.COM', '', '保密', '', '0000-00-00', '', 0, 0, NULL, 0, 0, 0, 1),
(2, 'yyh2', '96e79218965eb72c92a549dd5a330112', '2@qq.com', '', '保密', '', '0000-00-00', '', 0, 0, NULL, 0, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bear_admin_files`
--
ALTER TABLE `bear_admin_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bear_admin_logs`
--
ALTER TABLE `bear_admin_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bear_admin_logs_datas`
--
ALTER TABLE `bear_admin_logs_datas`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `bear_admin_mail_logs`
--
ALTER TABLE `bear_admin_mail_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bear_admin_menus`
--
ALTER TABLE `bear_admin_menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `bear_admin_users`
--
ALTER TABLE `bear_admin_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `bear_admin_user_profiles`
--
ALTER TABLE `bear_admin_user_profiles`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `bear_auth_groups`
--
ALTER TABLE `bear_auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bear_auth_group_access`
--
ALTER TABLE `bear_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `bear_auth_rules`
--
ALTER TABLE `bear_auth_rules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `bear_excel_examples`
--
ALTER TABLE `bear_excel_examples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bear_news`
--
ALTER TABLE `bear_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bear_news_types`
--
ALTER TABLE `bear_news_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bear_request_type`
--
ALTER TABLE `bear_request_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bear_sysconfigs`
--
ALTER TABLE `bear_sysconfigs`
  ADD PRIMARY KEY (`sysconfig_id`);

--
-- Indexes for table `bear_syslogs`
--
ALTER TABLE `bear_syslogs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `bear_syslog_trace`
--
ALTER TABLE `bear_syslog_trace`
  ADD PRIMARY KEY (`trace_id`);

--
-- Indexes for table `bear_users`
--
ALTER TABLE `bear_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_admin_menus`
--
ALTER TABLE `think_admin_menus`
  ADD PRIMARY KEY (`menu_id`);

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
-- Indexes for table `think_auth_rules`
--
ALTER TABLE `think_auth_rules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `think_auth_user`
--
ALTER TABLE `think_auth_user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `bear_admin_files`
--
ALTER TABLE `bear_admin_files`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `bear_admin_logs`
--
ALTER TABLE `bear_admin_logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT `bear_admin_logs_datas`
--
ALTER TABLE `bear_admin_logs_datas`
  MODIFY `data_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT `bear_admin_mail_logs`
--
ALTER TABLE `bear_admin_mail_logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `bear_admin_menus`
--
ALTER TABLE `bear_admin_menus`
  MODIFY `menu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '菜单id', AUTO_INCREMENT=79;

--
-- 使用表AUTO_INCREMENT `bear_admin_users`
--
ALTER TABLE `bear_admin_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户id', AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `bear_admin_user_profiles`
--
ALTER TABLE `bear_admin_user_profiles`
  MODIFY `profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `bear_auth_groups`
--
ALTER TABLE `bear_auth_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `bear_auth_rules`
--
ALTER TABLE `bear_auth_rules`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- 使用表AUTO_INCREMENT `bear_excel_examples`
--
ALTER TABLE `bear_excel_examples`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `bear_news`
--
ALTER TABLE `bear_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `bear_news_types`
--
ALTER TABLE `bear_news_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `bear_request_type`
--
ALTER TABLE `bear_request_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `bear_sysconfigs`
--
ALTER TABLE `bear_sysconfigs`
  MODIFY `sysconfig_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `bear_syslogs`
--
ALTER TABLE `bear_syslogs`
  MODIFY `log_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `bear_syslog_trace`
--
ALTER TABLE `bear_syslog_trace`
  MODIFY `trace_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `bear_users`
--
ALTER TABLE `bear_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `think_admin_menus`
--
ALTER TABLE `think_admin_menus`
  MODIFY `menu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '菜单id', AUTO_INCREMENT=79;

--
-- 使用表AUTO_INCREMENT `think_auth_group`
--
ALTER TABLE `think_auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `think_auth_rules`
--
ALTER TABLE `think_auth_rules`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- 使用表AUTO_INCREMENT `think_auth_user`
--
ALTER TABLE `think_auth_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
