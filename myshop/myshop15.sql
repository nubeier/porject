-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2017-11-08 05:40:41
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `advert`
--

INSERT INTO `advert` (`id`, `img`, `pos`, `url`) VALUES
(8, '1509857019108460867801.jpg', 0, 'http://www.baidu.com'),
(11, '1509857708122130707115088088001132643900jianzhi.jpg', 1, 'http://www.baidu.com'),
(12, '150985710516457751463.jpg', 2, 'http://localhost:8090/myshop/home/indexclass.php?class_id=5'),
(13, '1509857775182954364002.jpg', 3, 'http://localhost:8090/myshop/home/indexclass.php?page=2');

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
(11, '罗技', 5),
(12, '辣条', 7),
(13, '学习', 6),
(14, '日常用品', 8),
(15, '必备神器', 8);

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(3, '电脑'),
(4, '手机'),
(5, '鼠标'),
(6, '文具'),
(7, '零食'),
(8, '生活');

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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `shop`
--

INSERT INTO `shop` (`id`, `name`, `img`, `price`, `stock`, `brand_id`, `shelf`, `shell`) VALUES
(28, '联想 I7 固态', '1509871536762669241lianxiang1.jpg', 3800, 11, 6, 1, 665),
(29, '联想2', '150383400820352905201452049634324930230.jpg', 888, 11, 6, 1, 210),
(30, '联想3', '15038340449795134121452049560654634541.jpg', 10000, 11, 6, 1, 140),
(31, '联想小新', '15099595551871153942img1.jpg', 3699, 11, 6, 1, 513),
(32, '联想 商务游戏本', '150383412079264917314520495961653442515.jpg', 3500, 11, 6, 1, 514),
(33, 'DELL', '1503834168142467008314520496501917620655.jpg', 1000, 11, 7, 1, 340),
(34, 'DELL-2', '150383418947654909714519648451783919813.jpg', 1300, 11, 7, 1, 210),
(35, 'Dell-3', '1503834212158742079914520496101564326695.jpg', 3000, 11, 7, 1, 513),
(36, 'DELL-4', '1503834231928641161452049548213063468.jpg', 3400, 11, 7, 1, 513),
(37, 'DELL-5', '150383425220991130514520496631614631964.jpg', 5000, 11, 7, 1, 513),
(38, '三星-1', '15038343218155563641452049709102494745.jpg', 1000, 11, 8, 1, 500),
(39, '三星-2', '1503834336146025915114520497182059454006.jpg', 1200, 11, 8, 1, 310),
(40, '三星S6 G9209', '1509988998970236796S6.jpg', 1800, 11, 8, 1, 700),
(41, '三星-4', '150383436632238152914520497611723339328.jpg', 1400, 11, 8, 1, 513),
(42, '三星-5', '150383438220133052711452049780331245533.jpg', 40000, 11, 8, 1, 513),
(43, '苹果6', '15099863281138622234apple6.jpg', 4000, 11, 9, 1, 513),
(44, '苹果6S', '15099888114992548076s.jpg', 4200, 11, 9, 1, 800),
(45, ' iPhone 7', '15101150578181772847.jpg', 4600, 11, 9, 1, 910),
(46, '苹果-4', '150383446334995097614520497701236655768.jpg', 33000, 11, 9, 1, 513),
(47, '苹果5S64g', '15099891155784523585S.jpg', 3000, 11, 9, 1, 585),
(48, '雷蛇-1', '150384058611920485481452053140381209942.jpg', 300, 11, 10, 1, 790),
(49, '雷蛇-2', '15038406032624666811452053159667678475.jpg', 400, 11, 10, 1, 900),
(50, '雷蛇-3', '150384061618224456871452053170824507242.jpg', 399, 11, 10, 1, 513),
(51, '雷蛇-4', '150384063296047391914520531781358169586.jpg', 399, 11, 10, 1, 666),
(52, '雷蛇-5', '1503840649204359250714520531781358169586.jpg', 349, 11, 10, 1, 140),
(53, '罗技', '150863506138032404572f082025aafa40fbdd20a3da164034f78f0193e.jpg', 500, 11, 11, 1, 513),
(55, '卫龙辣条112g', '150976815670763261950.jpg', 2, 200, 12, 1, 1),
(56, '酒鬼牛肉辣条20*23g', '15097684222105016603TB2Z7omcseJ.eBjy0FiXXXqapXa_!!539493087.jpg_580x580Q90.jpg', 10, 100, 12, 1, 1),
(57, ' 儿时麻辣小吃 ', '15097686491591050071TB1YLUqRFXXXXX0XVXXXXXXXXXX_!!0-item_pic.jpg_580x580Q90.jpg', 0.6, 100, 12, 1, 1),
(58, '亲嘴烧 2个', '15097687661126623469TB28CJElpXXXXXcXXXXXXXXXXXX_!!278496359.jpg_580x580Q90.jpg', 1, 400, 12, 1, 1),
(59, '便利贴', '1509768935213650297bianlitie.jpg', 10, 200, 13, 1, 1),
(60, '中性笔 0.5MM', '1509769121689033883bi1.jpg', 25, 100, 13, 1, 1),
(61, '复古密码笔记本', '15097691891853542348bijiben.jpg', 30, 50, 13, 1, 1),
(62, '文件夹袋 ', '15097695671261479474wenjianjia.jpg', 1, 100, 13, 1, 1),
(63, '维达绵柔 50包', '1509770197710928909weida.jpg', 16, 50, 14, 1, 1),
(64, '聪妈 抽纸 30包', '1509770343356613705congma.png', 30, 250, 14, 1, 1),
(65, '洁柔 30包', '1509770413881003474jierou.jpg', 40, 200, 14, 1, 1),
(66, '维达 10包', '1509770503142728054weida2.jpg', 3.5, 400, 14, 1, 1),
(67, '不锈钢泡面碗', '1509770972829402469wan.jpg', 20, 20, 15, 1, 1),
(68, '按压式枕头', '1509771033290615203zhentou.jpg', 80, 20, 15, 1, 1),
(69, 'USB台灯 智能触控', '1509771209458091351taideng.jpg', 40, 50, 15, 1, 1),
(70, '冬天暖气必备', '1509771371123709107nuan.jpg', 40, 400, 15, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
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
(12, 'admin', '202cb962ac59075b964b07152d234b70', 1, 1510059101, '陈伟杰', '1027575951@qq.com'),
(13, 'admin2', '202cb962ac59075b964b07152d234b70', 2, 1508401267, '陈李轩', '5645445454@qq.com'),
(14, 'admin3', '202cb962ac59075b964b07152d234b70', 3, 1508401307, '陈里脊', '596521234@qq.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
