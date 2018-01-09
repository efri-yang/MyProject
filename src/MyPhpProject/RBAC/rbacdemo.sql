-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-01-09 02:07:20
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rbacdemo`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(11) UNSIGNED NOT NULL,
  `pclassid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` char(200) NOT NULL DEFAULT '',
  `shorttitle` char(120) NOT NULL DEFAULT '',
  `content` mediumtext NOT NULL,
  `thumbnail` varchar(255) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `userip` varchar(15) NOT NULL DEFAULT '',
  `publictime` datetime NOT NULL,
  `author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `perssion`
--

CREATE TABLE `perssion` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(100) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `aside` tinyint(4) NOT NULL DEFAULT '0',
  `created_time` int(10) NOT NULL DEFAULT '0',
  `is_last` int(10) NOT NULL DEFAULT '1',
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `perssion`
--

INSERT INTO `perssion` (`id`, `pid`, `name`, `url`, `status`, `aside`, `created_time`, `is_last`, `type`) VALUES
(1, 0, '首页', 'admin.php', 0, 0, 0, 1, ''),
(7, 0, '角色管理', '', 0, 1, 0, 0, 'menu'),
(8, 7, '角色列表', 'roleList.php', 0, 1, 0, 1, 'menu'),
(9, 7, '添加角色', 'roleAdd.php', 0, 1, 0, 1, 'menu'),
(10, 7, '修改角色', 'roleEdit.php', 0, 0, 0, 1, 'menu'),
(11, 7, '删除角色', 'roleDel.php', 0, 0, 0, 1, 'menu'),
(12, 0, '权限管理', '', 0, 1, 0, 0, 'menu'),
(13, 12, '权限列表', 'permissionList.php', 0, 1, 0, 1, 'menu'),
(14, 12, '添加权限', 'permissionAdd.php', 0, 0, 0, 1, 'menu'),
(15, 12, '修改权限', 'permissionEdit.php', 0, 0, 0, 1, 'menu'),
(16, 12, '删除权限', 'permissionDel.php', 0, 0, 0, 1, 'menu'),
(17, 0, '用户管理', '', 0, 1, 0, 0, 'menu'),
(18, 17, '用户列表', 'userList.php', 0, 1, 0, 1, 'menu'),
(19, 17, '修改信息', 'userEdit.php', 0, 0, 0, 1, 'menu'),
(20, 17, '添加用户', 'userAdd.php', 0, 1, 0, 1, 'menu'),
(21, 17, '删除用户', 'userDel.php', 0, 0, 0, 1, 'menu');

-- --------------------------------------------------------

--
-- 表的结构 `perssion_role`
--

CREATE TABLE `perssion_role` (
  `rid` int(10) UNSIGNED NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `perssion_role`
--

INSERT INTO `perssion_role` (`rid`, `pid`) VALUES
(1, 1),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(2, 1),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(3, 1);

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `created_time` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `role`
--

INSERT INTO `role` (`id`, `pid`, `name`, `status`, `created_time`) VALUES
(1, 0, '超级管理员', 0, 0),
(2, 1, '普通管理员', 0, 0),
(3, 2, '普通用户', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(11) NOT NULL DEFAULT '',
  `avatar` varchar(100) NOT NULL,
  `sex` enum('男','女','保密') NOT NULL DEFAULT '保密',
  `occupation` varchar(30) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `qq` varchar(20) NOT NULL DEFAULT '',
  `reg_time` int(10) NOT NULL DEFAULT '0',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0',
  `last_login_time` int(10) NOT NULL DEFAULT '0',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0',
  `forbidden` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `phone`, `avatar`, `sex`, `occupation`, `birthday`, `qq`, `reg_time`, `reg_ip`, `last_login_time`, `last_login_ip`, `forbidden`) VALUES
(1, 'admin', '96e79218965eb72c92a549dd5a330112', '948061564@qq.com', '18559160494', '/public/uploads/avatars/2018-01-08/8d263f04cffe749ece5420b47cc87538.jpg', '男', '', '2017-12-07', '', 0, 0, 0, 0, 1),
(2, 'ptadmin', '96e79218965eb72c92a549dd5a330112', '948061564@qq.com', '18559160494', '', '男', '', '0000-00-00', '', 0, 0, 0, 0, 0),
(3, 'user', '96e79218965eb72c92a549dd5a330112', '948061564@qq.com', '18559160494', '/public/uploads/avatars/2018-01-08/cda997cbf0da5a667da1479b832f1100.jpg', '男', '', '0000-00-00', '', 0, 0, 0, 0, 0),
(18, 'user01', '96e79218965eb72c92a549dd5a330112', '948061564@qq.com', '18559160494', '/public/uploads/avatars/2018-01-08/fabc0570279e202d7ee40d84c9439143.jpg', '保密', '', '0000-00-00', '', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user_role`
--

CREATE TABLE `user_role` (
  `uid` int(10) UNSIGNED NOT NULL,
  `rid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_role`
--

INSERT INTO `user_role` (`uid`, `rid`) VALUES
(1, 1),
(2, 2),
(3, 3),
(18, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classid` (`pclassid`);

--
-- Indexes for table `perssion`
--
ALTER TABLE `perssion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `perssion`
--
ALTER TABLE `perssion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用表AUTO_INCREMENT `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- 限制导出的表
--

--
-- 限制表 `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`pclassid`) REFERENCES `perssion` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
