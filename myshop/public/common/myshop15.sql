-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2017-10-24 14:29:03
-- 服务器版本： 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop15`
--

-- --------------------------------------------------------

--
-- 表的结构 `advert`
--

DROP TABLE IF EXISTS `advert`;
CREATE TABLE IF NOT EXISTS `advert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(100) NOT NULL,
  `pos` tinyint(4) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `advert`
--

INSERT INTO `advert` (`id`, `img`, `pos`, `url`) VALUES
(8, '1508852759253746874jianzhi.jpg', 0, 'http://www.baidu.com'),
(11, '150885286113506607661508808699559976648thumb_15037492821047541660ads1.jpg', 1, 'http://www.baidu.com');

-- --------------------------------------------------------

--
-- 表的结构 `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `brand`
--

INSERT INTO `brand` (`id`, `name`, `class_id`) VALUES
(6, '联想', 3),
(7, 'DELL', 3),
(8, '三星', 4),
(9, '苹果', 4),
(10, '雷蛇', 5),
(11, '罗技', 5);

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(3, '电脑'),
(4, '手机'),
(5, '鼠标');

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin,
  `shop_id` int(11) NOT NULL,
  `time` int(11) DEFAULT NULL,
  `admintime` int(11) DEFAULT NULL,
  `admincontent` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `content`, `shop_id`, `time`, `admintime`, `admincontent`) VALUES
(7, 8, '这个电脑的性价比挺高的', 29, 1504272940, 0, ''),
(8, 10, '这个商城里的快递挺快的，质量也挺不错的下次再来买', 29, 1504272940, 0, ''),
(10, 8, '苹果5都过时了', 47, 1504273012, 1508741226, '这款苹果已经是很久之前出的了'),
(11, 8, '电脑用的还行，过段时间在来评论', 37, 1508257630, 1508399775, '您用的开心就好');

-- --------------------------------------------------------

--
-- 表的结构 `indent`
--

DROP TABLE IF EXISTS `indent`;
CREATE TABLE IF NOT EXISTS `indent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `touch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(10) UNSIGNED NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `num` int(10) UNSIGNED NOT NULL,
  `confim` tinyint(1) NOT NULL DEFAULT '0',
  `consignor` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `indent`
--

INSERT INTO `indent` (`id`, `code`, `time`, `status_id`, `touch_id`, `user_id`, `shop_id`, `price`, `num`, `confim`, `consignor`) VALUES
(6, '15042649421899640899', 1504264942, 6, 8, 8, 37, 5000, 5, 1, NULL),
(7, '15042650751959524306', 1504265075, 6, 8, 8, 47, 5000, 5, 1, NULL),
(8, '15042651741718518375', 1504265174, 7, 8, 8, 48, 300, 1, 1, '陈伟杰'),
(9, '15083855861688418746', 1508385586, 7, 10, 9, 37, 5000, 1, 1, '陈伟杰'),
(16, '15087488391983288645', 1508748839, 1, 8, 8, 32, 1000, 1, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `shelf` tinyint(4) NOT NULL,
  `shell` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `shop`
--

INSERT INTO `shop` (`id`, `name`, `img`, `price`, `stock`, `brand_id`, `shelf`, `shell`) VALUES
(28, '联想1', '1503833969101717566614520496221421192279.jpg', 999, 11, 6, 0, 665),
(29, '联想2', '150383400820352905201452049634324930230.jpg', 888, 11, 6, 1, 210),
(30, '联想3', '15038340449795134121452049560654634541.jpg', 10000, 11, 6, 1, 140),
(31, '联想4', '150383410116159786681452049587785546704.jpg', 2000, 11, 6, 1, 513),
(32, '联想5', '150383412079264917314520495961653442515.jpg', 1000, 11, 6, 1, 514),
(33, 'DELL', '1503834168142467008314520496501917620655.jpg', 1000, 11, 7, 1, 340),
(34, 'DELL-2', '150383418947654909714519648451783919813.jpg', 1300, 11, 7, 1, 210),
(35, 'Dell-3', '1503834212158742079914520496101564326695.jpg', 3000, 11, 7, 1, 513),
(36, 'DELL-4', '1503834231928641161452049548213063468.jpg', 3400, 11, 7, 1, 513),
(37, 'DELL-5', '150383425220991130514520496631614631964.jpg', 5000, 11, 7, 1, 513),
(38, '三星-1', '15038343218155563641452049709102494745.jpg', 1000, 11, 8, 1, 500),
(39, '三星-2', '1503834336146025915114520497182059454006.jpg', 1200, 11, 8, 1, 310),
(40, '三星-3', '150383435192766086414520497361989953450.jpg', 1200, 11, 8, 1, 700),
(41, '三星-4', '150383436632238152914520497611723339328.jpg', 1400, 11, 8, 1, 513),
(42, '三星-5', '150383438220133052711452049780331245533.jpg', 40000, 11, 8, 1, 513),
(43, '苹果', '150383440534537781314520429461129209745.jpg', 4000, 11, 9, 1, 513),
(44, '苹果-2', '1503834426169999631314520496781551893387.jpg', 4200, 11, 9, 1, 800),
(45, '苹果-3', '15038344414750400421452049689602514996.jpg', 4400, 11, 9, 1, 910),
(46, '苹果-4', '150383446334995097614520497701236655768.jpg', 33000, 11, 9, 1, 513),
(47, '苹果-5', '1503841250143211439914520497001386168760.jpg', 5000, 11, 9, 1, 585),
(48, '雷蛇-1', '150384058611920485481452053140381209942.jpg', 300, 11, 10, 1, 790),
(49, '雷蛇-2', '15038406032624666811452053159667678475.jpg', 400, 11, 10, 1, 900),
(50, '雷蛇-3', '150384061618224456871452053170824507242.jpg', 399, 11, 10, 1, 513),
(51, '雷蛇-4', '150384063296047391914520531781358169586.jpg', 399, 11, 10, 1, 666),
(52, '雷蛇-5', '1503840649204359250714520531781358169586.jpg', 349, 11, 10, 1, 140),
(53, '罗技', '150863506138032404572f082025aafa40fbdd20a3da164034f78f0193e.jpg', 500, 11, 11, 1, 513);

-- --------------------------------------------------------

--
-- 表的结构 `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, '未发货'),
(6, '已发货'),
(7, '已付款');

-- --------------------------------------------------------

--
-- 表的结构 `touch`
--

DROP TABLE IF EXISTS `touch`;
CREATE TABLE IF NOT EXISTS `touch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `addr` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `touch`
--

INSERT INTO `touch` (`id`, `name`, `addr`, `tel`, `email`, `user_id`) VALUES
(8, '黑龙', '6栋6621', '13434442158', '894413383@qq.com', 8),
(9, '张三', '北区4201', '13040864411', '1027575951@qq.com', 8),
(10, '陈伟杰', '北区6614', '13040864411', '1027575951@qq.com', 9);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isadmin` tinyint(4) NOT NULL DEFAULT '0',
  `admintime` int(50) DEFAULT NULL,
  `adminname` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `isadmin`, `admintime`, `adminname`, `email`) VALUES
(8, 'user1', '202cb962ac59075b964b07152d234b70', 0, 0, '', '1027575951@qq.com'),
(9, 'user2', '202cb962ac59075b964b07152d234b70', 0, 0, '', '2270732153@qq.com'),
(10, 'use3', '202cb962ac59075b964b07152d234b70', 0, 0, '', '748421598@qq.com'),
(12, 'admin', '202cb962ac59075b964b07152d234b70', 1, 1508852673, '陈伟杰', '1027575951@qq.com'),
(13, 'admin2', '202cb962ac59075b964b07152d234b70', 2, 1508401267, '陈李轩', '5645445454@qq.com'),
(14, 'admin3', '202cb962ac59075b964b07152d234b70', 3, 1508401307, '陈里脊', '596521234@qq.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
