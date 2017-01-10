-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 03 月 04 日 19:23
-- 服务器版本: 5.6.21
-- PHP 版本: 5.4.34

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `webadmin`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `password` char(20) NOT NULL,
  `qq` char(20) NOT NULL,
  `tel` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `qq`, `tel`) VALUES
(2, 'admin', 'admin', '21342352', '23453453');

-- --------------------------------------------------------

--
-- 表的结构 `ceshi`
--

CREATE TABLE IF NOT EXISTS `ceshi` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `wenti` varchar(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `answer3` varchar(255) NOT NULL,
  `answer4` varchar(255) NOT NULL,
  `fenshu` int(100) NOT NULL,
  `rights` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `ceshi`
--

INSERT INTO `ceshi` (`id`, `wenti`, `answer1`, `answer2`, `answer3`, `answer4`, `fenshu`, `rights`, `name`) VALUES
(4, 'ewrfqwe', 'frweqfgwq', 'rgfwerg', 'ewrg', 'werqge', 34, 'b', 'dwsefwer'),
(5, 'fwer', 'werg', 'wergw', 'egwe', 'tgwe', 11, 'd', 'wqew'),
(6, 'wqerq', 'rqwr', 'qwer', 'wqer', 'wqer', 44, 'a', 'dwefdqw'),
(7, 'wqerq', 'rqwr', 'qwer', 'wqer', 'wqer', 44, 'a', 'dwefdqw'),
(8, 'wqerq', 'rqwr', 'qwer', 'wqer', 'wqer', 44, 'a', 'dwefdqw'),
(9, 'wqerq', 'rqwr', 'qwer', 'wqer', 'wqer', 44, 'a', 'dwefdqw'),
(10, 'wqerq', 'rqwr', 'qwer', 'wqer', 'wqer', 44, 'a', 'dwefdqw'),
(11, 'wqerq', 'rqwr', 'qwer', 'wqer', 'wqer', 44, 'a', 'dwefdqw'),
(17, '日期为任务', '热舞特特', '特认为他娃儿', '额外人提问人', '额外瑞特让他', 4, 'a', 'dftwert');

-- --------------------------------------------------------

--
-- 表的结构 `xinxi`
--

CREATE TABLE IF NOT EXISTS `xinxi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `xingbie` varchar(10) NOT NULL,
  `hunfou` varchar(10) NOT NULL,
  `chusheng` int(20) NOT NULL,
  `xueli` varchar(100) NOT NULL,
  `biyetime` varchar(100) NOT NULL,
  `biyeschool` varchar(100) NOT NULL,
  `tel` int(20) NOT NULL,
  `xiandxi` varchar(200) NOT NULL,
  `fenshu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `xinxi`
--

INSERT INTO `xinxi` (`id`, `name`, `xingbie`, `hunfou`, `chusheng`, `xueli`, `biyetime`, `biyeschool`, `tel`, `xiandxi`, `fenshu`) VALUES
(1, 'wqeqw', '男', '已婚', 0, 'qweq', 'eqweqw', 'rqweqw', 0, 'rwqerqwe', 0),
(2, 'yangyangyang', '男', '否', 19910211, '大学', '沈阳', '沈阳', 2147483647, '舞蹈服IE范围覅u', 0),
(3, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 0),
(4, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 0),
(5, '', '', '', 0, '', '', '', 0, '', 0),
(6, '', '', '', 0, '', '', '', 0, '', 0),
(7, 'dwqdqw', '男', '已婚', 0, '', '', '', 0, 'qwdqwd', 0),
(8, '', '', '', 0, '', '', '', 0, '', 0),
(9, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 0),
(10, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 0),
(11, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 0),
(12, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 0),
(13, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 0),
(14, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 0),
(15, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 88),
(16, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 88),
(17, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 88),
(18, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 88),
(19, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 88),
(20, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 88),
(21, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 88),
(22, 'qwdqwd', '男', '已婚', 0, '', '', '', 0, 'dasdad', 88),
(23, '', '男', '已婚', 0, '', '', '', 0, '', 88),
(24, '', '男', '已婚', 0, '', '', '', 0, '', 0),
(25, '', '男', '已婚', 0, '', '', '', 0, '', 176);

-- --------------------------------------------------------

--
-- 表的结构 `zhaoadd`
--

CREATE TABLE IF NOT EXISTS `zhaoadd` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `qixian` int(100) NOT NULL,
  `renshu` int(10) NOT NULL,
  `yaoqiu` varchar(255) NOT NULL,
  `zhiwei` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `zhaoadd`
--

INSERT INTO `zhaoadd` (`id`, `qixian`, `renshu`, `yaoqiu`, `zhiwei`) VALUES
(1, 0, 12, 'dsads', 'qwewq'),
(2, 1, 12, 'eqweqe', 'asdasd'),
(3, 0, 12, 'wqdqsd', 'qwewq'),
(4, 0, 12, 'dsaada', 'qwewq'),
(5, 0, 12, 'dsadad', 'qwewq'),
(6, 2016, 19, '大学英语四级，听说读写流利', '英语教师'),
(7, 0, 0, '', ''),
(9, 0, 0, '', ''),
(10, 0, 0, 'qwrwerrr', 'wqeqw'),
(11, 0, 34, 'eqwrw', 'qwe'),
(12, 0, 0, '', ''),
(13, 0, 0, '', ''),
(14, 0, 0, '', ''),
(15, 0, 0, '', ''),
(16, 0, 0, '', ''),
(17, 0, 0, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
