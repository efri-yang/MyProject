-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-10-24 08:59:23
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concms`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
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
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `phone`, `avatar`, `sex`, `occupation`, `birthday`, `qq`, `reg_time`, `reg_ip`, `last_login_time`, `last_login_ip`, `status`) VALUES
(1, 'yyh1111', '96e79218965eb72c92a549dd5a330112', '948061564@qq.com', '18559160494', 'ee13dbd5b8922d2056b147c3818ae5a7.png', '保密', '1,2', '0000-00-00', '', 1506560247, 0, 0, 0, 0),
(2, 'yyh1', '96e79218965eb72c92a549dd5a330112', '948061564@qq.com', '18559160494', '446e0ae297356db878dabd2dee6983f9.png', '男', '1', '0000-00-00', '', 1506665894, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `mc_article`
--

CREATE TABLE `mc_article` (
  `id` int(11) UNSIGNED NOT NULL,
  `classid` smallint(6) UNSIGNED NOT NULL DEFAULT '0',
  `title` char(200) NOT NULL DEFAULT '',
  `shorttitle` char(120) NOT NULL DEFAULT '',
  `content` mediumtext NOT NULL,
  `thumbnail` varchar(255) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `userip` varchar(15) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `mc_columns`
--

CREATE TABLE `mc_columns` (
  `classid` smallint(6) UNSIGNED NOT NULL,
  `pclassid` smallint(6) UNSIGNED NOT NULL,
  `classname` varchar(50) NOT NULL DEFAULT '',
  `thumbnail` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `iscomment` tinyint(1) NOT NULL DEFAULT '1',
  `ishidden` smallint(6) NOT NULL DEFAULT '0',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `seotitle` varchar(80) NOT NULL DEFAULT '',
  `islast` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `station`
--

CREATE TABLE `station` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `station`
--

INSERT INTO `station` (`id`, `title`) VALUES
(1, 'Java工程师'),
(2, 'C工程师'),
(3, 'C++工程师'),
(4, 'C#工程师'),
(5, 'Python工程师'),
(6, 'Visual Basic工程师'),
(7, 'PHP工程师'),
(8, 'Javascript工程师'),
(9, 'Swift');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mc_article`
--
ALTER TABLE `mc_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classid` (`classid`);

--
-- Indexes for table `mc_columns`
--
ALTER TABLE `mc_columns`
  ADD PRIMARY KEY (`classid`),
  ADD KEY `pclassid` (`pclassid`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `mc_article`
--
ALTER TABLE `mc_article`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `mc_columns`
--
ALTER TABLE `mc_columns`
  MODIFY `classid` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `station`
--
ALTER TABLE `station`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 限制导出的表
--

--
-- 限制表 `mc_article`
--
ALTER TABLE `mc_article`
  ADD CONSTRAINT `mc_article_ibfk_1` FOREIGN KEY (`classid`) REFERENCES `mc_columns` (`classid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
