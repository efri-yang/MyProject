-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-01-30 03:46:00
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
-- 表的结构 `think_usercopy`
--

CREATE TABLE `think_usercopy` (
  `uid` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `age` int(10) NOT NULL,
  `truename` varchar(30) NOT NULL,
  `delete_time` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_usercopy`
--

INSERT INTO `think_usercopy` (`uid`, `username`, `password`, `age`, `truename`, `delete_time`, `ip`) VALUES
(1, 'thinkphp', '123456', 1, '', '', ''),
(2, 'yyh1000', '123456', 21, '', '', ''),
(3, 'yyh1000', '123456', 30, '', '', ''),
(4, 'yyh1000', '123456', 0, '', '', ''),
(5, 'ccc', '123456', 0, '', '', ''),
(6, 'yyhccc1000', '1234564', 0, '', '', ''),
(7, 'yyhccc1000', '1234564', 0, '', '', ''),
(8, 'yyhccc1000', '1234564', 0, '', '', ''),
(9, 'yyhccc1000', '1234564', 0, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `think_usercopy`
--
ALTER TABLE `think_usercopy`
  ADD PRIMARY KEY (`uid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `think_usercopy`
--
ALTER TABLE `think_usercopy`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
