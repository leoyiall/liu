-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-12-30 16:26:47
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `youlemon`
--

-- --------------------------------------------------------

--
-- 表的结构 `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `who` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `xiangArea` varchar(100) DEFAULT NULL,
  `youBian` int(6) DEFAULT NULL,
  `phone` bigint(11) DEFAULT NULL,
  `guPhone` bigint(11) DEFAULT NULL,
  `username` char(20) DEFAULT NULL,
  PRIMARY KEY (`address_id`),
  KEY `user` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `address`
--

INSERT INTO `address` (`address_id`, `who`, `area`, `xiangArea`, `youBian`, `phone`, `guPhone`, `username`) VALUES
(1, '刘恒春', '广西壮族', '南宁江南区淡村路南城百货2楼3103', 530036, 18278880806, NULL, 'liuliu');

-- --------------------------------------------------------

--
-- 表的结构 `buy`
--

CREATE TABLE IF NOT EXISTS `buy` (
  `buy_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `shopName` varchar(50) NOT NULL,
  `storeName` varchar(100) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `is_sucess` int(11) DEFAULT NULL,
  `is_chu` int(11) DEFAULT NULL,
  `shopNumber` int(11) DEFAULT NULL,
  `store_chu` int(11) DEFAULT NULL,
  `yong_chu` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`buy_id`),
  KEY `shopName` (`shopName`),
  KEY `user_id` (`username`),
  KEY `store_id` (`storeName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `buy`
--

INSERT INTO `buy` (`buy_id`, `username`, `shopName`, `storeName`, `price`, `state`, `is_sucess`, `is_chu`, `shopNumber`, `store_chu`, `yong_chu`, `shop_id`) VALUES
(9, 'liuliu', '超高清', 'test', '2000.00', NULL, NULL, NULL, 1, NULL, 1, 47),
(10, 'liuliu', '美特斯邦威', 'liuliu', '199.00', NULL, NULL, 1, 1, NULL, 1, 37);

-- --------------------------------------------------------

--
-- 表的结构 `express`
--

CREATE TABLE IF NOT EXISTS `express` (
  `express_id` int(11) NOT NULL,
  `expressName` varchar(100) NOT NULL,
  `gongName` int(11) NOT NULL,
  PRIMARY KEY (`express_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `gongying`
--

CREATE TABLE IF NOT EXISTS `gongying` (
  `gong_id` int(11) NOT NULL AUTO_INCREMENT,
  `gongName` varchar(50) NOT NULL,
  `lei_gong` varchar(20) DEFAULT '0',
  `gongAddress` varchar(100) DEFAULT NULL,
  `gongPhone` bigint(11) DEFAULT NULL,
  `gongImg` varchar(100) DEFAULT NULL,
  `express_id` int(11) DEFAULT NULL,
  `is_kai` int(11) DEFAULT '-1',
  `username` char(20) NOT NULL,
  PRIMARY KEY (`gong_id`,`gongName`),
  UNIQUE KEY `username` (`username`),
  KEY `gong_id` (`gong_id`),
  KEY `gongName` (`gongName`),
  KEY `lei_gong` (`lei_gong`),
  KEY `express_id` (`express_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `gongying`
--

INSERT INTO `gongying` (`gong_id`, `gongName`, `lei_gong`, `gongAddress`, `gongPhone`, `gongImg`, `express_id`, `is_kai`, `username`) VALUES
(10, 'You柠檬超市零食供应', '男装', '广西南宁市五一路淡村', 18278880806, '56641568c6e1b.jpg', NULL, 2, 'liuliu'),
(16, 'YouYou好零食供应', '休闲食品', '广西南宁市好上家零食厂', 13878747654, '56616dfdea69a.jpg', NULL, 2, 'admin'),
(17, 'You柠檬电器城', '0', NULL, NULL, 'logo.png', NULL, 2, 'modi'),
(21, 'You柠檬女装城', '0', NULL, NULL, 'logo.png', NULL, 2, 'test'),
(22, 'You柠檬手机城', '0', NULL, NULL, 'logo.png', NULL, 2, 'woheni1'),
(23, 'You柠檬食品', '0', NULL, NULL, 'logo.png', NULL, 2, 'abc123'),
(24, 'You柠檬五金城', '0', NULL, NULL, 'logo.png', NULL, 2, '1234567'),
(25, 'You柠檬电脑城', '0', NULL, NULL, 'logo.png', NULL, 2, 'woheni'),
(26, 'you超级好供应商', '0', NULL, NULL, 'logo.png', NULL, 2, 'leoleo');

-- --------------------------------------------------------

--
-- 表的结构 `leibie`
--

CREATE TABLE IF NOT EXISTS `leibie` (
  `lei_id` int(11) NOT NULL AUTO_INCREMENT,
  `lei_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`lei_id`),
  KEY `lei_id` (`lei_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- 转存表中的数据 `leibie`
--

INSERT INTO `leibie` (`lei_id`, `lei_name`) VALUES
(2, '男装'),
(5, '大家电'),
(6, '生活电器'),
(7, '厨房电器'),
(8, '个护健康'),
(9, '五金家装'),
(10, '手机通讯'),
(11, '手机配件'),
(12, '摄影摄像'),
(13, '数码配件'),
(14, '影音娱乐'),
(15, '智能设备'),
(16, '电子教育'),
(17, '电脑整机'),
(18, '电脑配件'),
(19, '外设产品'),
(20, '游戏设备'),
(21, '网络产品'),
(22, '办公设备'),
(23, '女装'),
(24, '内衣'),
(25, '配饰'),
(26, '面部护肤'),
(27, '洗发护发'),
(28, '身体护肤'),
(29, '口腔护理'),
(30, '香水彩妆'),
(31, '清洁用品'),
(32, '中外名酒'),
(33, '进口食品'),
(34, '休闲食品'),
(35, '地方特产'),
(36, '茗茶'),
(37, '饮料冲调'),
(38, '粮油冲调'),
(39, '教育'),
(40, '文艺'),
(41, '经管励志'),
(42, '人文社科'),
(43, '生活'),
(44, '科技'),
(45, '杂志报刊');

-- --------------------------------------------------------

--
-- 表的结构 `leibie2`
--

CREATE TABLE IF NOT EXISTS `leibie2` (
  `lei_id` int(11) NOT NULL,
  `l2_id` int(11) NOT NULL AUTO_INCREMENT,
  `lei2_name` varchar(50) NOT NULL,
  PRIMARY KEY (`l2_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=172 ;

--
-- 转存表中的数据 `leibie2`
--

INSERT INTO `leibie2` (`lei_id`, `l2_id`, `lei2_name`) VALUES
(2, 1, '羽绒服'),
(2, 3, '棉服'),
(2, 6, '卫衣'),
(2, 8, '裤子'),
(2, 9, 'T恤'),
(2, 10, '衬衫'),
(2, 11, '男士袜子'),
(5, 14, '平板电视'),
(5, 15, '空调'),
(5, 16, '冰箱'),
(5, 17, '洗衣机'),
(5, 18, '迷你音响'),
(5, 19, '热水器'),
(5, 20, '消毒柜/洗碗机'),
(5, 21, '冷柜/冰吧'),
(5, 22, '酒柜'),
(5, 23, '家电配件'),
(6, 24, '电风扇'),
(6, 25, '冷风扇'),
(6, 26, '净化器'),
(6, 27, '加湿器'),
(6, 28, '扫地机器人'),
(6, 29, '吸尘器'),
(7, 30, '电压力锅'),
(7, 31, '电饭锅'),
(7, 32, '豆浆机'),
(7, 33, '咖啡机'),
(7, 34, '微波炉'),
(7, 35, '煮蛋器'),
(7, 36, '酸奶机'),
(7, 37, '电烤箱'),
(7, 38, '面包机'),
(7, 39, '电水壶'),
(8, 40, '剃须刀'),
(8, 41, '电吹风'),
(8, 42, '卷/直发器'),
(8, 43, '按摩器'),
(8, 44, '按摩椅'),
(8, 45, '血压计'),
(8, 46, '体温计'),
(8, 47, '其他健康电器'),
(9, 48, '电动工具'),
(9, 49, '手动工具'),
(9, 50, '仪器仪表'),
(9, 51, '浴霸/排气扇'),
(9, 52, '灯具'),
(9, 53, 'LED灯'),
(9, 54, '龙头'),
(9, 55, '门铃'),
(9, 56, '厨卫五金'),
(10, 58, '手机'),
(11, 59, '电池/移动电源'),
(11, 60, '蓝牙耳机'),
(11, 61, '充电器/数据线'),
(11, 62, '手机耳机'),
(11, 63, '贴膜'),
(12, 64, '数码相机'),
(12, 65, '单反相机'),
(12, 66, '拍立得'),
(13, 67, '存储卡'),
(13, 68, '读卡器'),
(13, 69, '相机包'),
(14, 70, '耳机/耳麦'),
(14, 71, '麦克风'),
(15, 72, '智能手环'),
(15, 73, '智能手表'),
(15, 74, '无人机'),
(16, 75, '学生平板'),
(16, 76, '点读机/笔'),
(16, 77, '电子词典'),
(17, 78, '笔记本'),
(17, 79, '超极本'),
(17, 80, '游戏本'),
(17, 81, '平板电脑'),
(17, 82, '台式机'),
(18, 83, 'CPU'),
(18, 84, '主板'),
(18, 85, '显卡'),
(18, 86, '硬盘'),
(18, 87, '装机配件'),
(18, 88, '组装电脑'),
(19, 89, '鼠标'),
(19, 90, '键盘'),
(19, 91, 'U盘'),
(19, 92, '移动硬盘'),
(19, 93, '鼠标垫'),
(19, 94, '摄像头'),
(19, 95, '手写板'),
(20, 96, '游戏机'),
(21, 97, '路由器'),
(21, 98, '网卡'),
(21, 99, '网络盒子'),
(22, 100, '投影机'),
(22, 101, '多功能一体机'),
(22, 102, '打印机'),
(22, 103, '点钞机'),
(22, 104, '保险柜'),
(23, 105, '毛呢大衣'),
(23, 106, '牛仔裤'),
(23, 107, '休闲裤'),
(23, 108, '正装裤'),
(23, 109, '女士卫衣'),
(23, 110, '打底裤'),
(24, 111, '男士内裤'),
(24, 112, '女士内裤'),
(25, 114, '领带'),
(25, 115, '帽子'),
(25, 116, '太阳镜'),
(23, 117, '女士袜子'),
(24, 118, '女士文胸'),
(26, 119, '清洁'),
(26, 120, '护肤'),
(27, 121, '洗发'),
(27, 122, '护发'),
(28, 123, '沐浴'),
(28, 124, '润肤'),
(29, 125, '牙膏/牙粉'),
(30, 126, '香水'),
(29, 127, '牙刷'),
(30, 128, '底妆'),
(31, 129, '纸品湿巾'),
(31, 130, '衣服清洁'),
(32, 131, '白酒'),
(32, 132, '葡萄酒'),
(32, 133, '洋酒'),
(33, 134, '牛奶'),
(33, 135, '饼干蛋糕'),
(33, 136, '糖果/巧克力'),
(34, 137, '休闲零食'),
(34, 138, '坚果炒货'),
(34, 139, '肉干肉脯'),
(35, 140, '云南'),
(35, 141, '北京'),
(35, 142, '桂林'),
(35, 143, '其他地方'),
(36, 144, '铁观音'),
(36, 145, '普洱'),
(36, 146, '龙井'),
(37, 147, '牛奶乳品'),
(37, 148, '饮料'),
(37, 149, '咖啡/奶茶'),
(38, 150, '米面杂粮'),
(38, 151, '食用油'),
(38, 152, '调味品'),
(39, 153, '教材'),
(39, 154, '教材'),
(39, 155, '考试'),
(39, 156, '外语学习'),
(40, 157, '小说'),
(40, 158, '文学'),
(40, 159, '青春文学'),
(41, 160, '管理'),
(42, 161, '历史'),
(41, 162, '金融与投资'),
(42, 163, '心理学'),
(42, 164, '政治/军事'),
(43, 165, '家教与育儿'),
(42, 166, '国学/古籍'),
(43, 167, '健身保健'),
(44, 168, '计算机与互联网'),
(44, 169, '建筑'),
(45, 170, '杂志/期刊'),
(45, 171, '电子杂志');

-- --------------------------------------------------------

--
-- 表的结构 `pingjia`
--

CREATE TABLE IF NOT EXISTS `pingjia` (
  `ping_id` int(11) NOT NULL DEFAULT '0',
  `who_ping` varchar(100) DEFAULT NULL,
  `who_hui` varchar(100) DEFAULT NULL,
  `who` char(20) NOT NULL,
  PRIMARY KEY (`ping_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `size1` varchar(20) DEFAULT NULL,
  `size2` varchar(20) DEFAULT NULL,
  `size3` varchar(20) DEFAULT NULL,
  `size4` varchar(20) DEFAULT NULL,
  `color1` varchar(20) DEFAULT NULL,
  `color2` varchar(20) DEFAULT NULL,
  `color3` varchar(20) DEFAULT NULL,
  `color4` varchar(20) DEFAULT NULL,
  `type1` varchar(255) DEFAULT NULL,
  `type2` varchar(255) DEFAULT NULL,
  `type3` varchar(255) DEFAULT NULL,
  `type4` varchar(255) DEFAULT NULL,
  `shopNum` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`product_id`, `size1`, `size2`, `size3`, `size4`, `color1`, `color2`, `color3`, `color4`, `type1`, `type2`, `type3`, `type4`, `shopNum`) VALUES
(4, '28', '32', '22', '30', '白', '红', '蓝', '金色', '精装版', '精简版', '复杂版', '美女版', 201300),
(5, '0', '0', '0', '0', '', '', '', '', '5袋装', '10袋装', '', '', 130),
(6, '0', '0', '0', '0', '', '', '', '', '', '', '', '', 20013),
(7, '0', '0', '0', '0', '红', '黑', '灰', '蓝', '大衣', '毛衣', '衬衣', '全套', 201656),
(8, '0', '0', '0', '0', '红', '黑', '金蓝', '绿', '时尚版', '潮流版', 'mini版', '帅气版', 333016),
(10, '0', '0', '0', '0', '红', '黑', '蓝', '绿', '潮流', '时尚', '美式', '韩式', 3006),
(11, 'M', 'XL', 'XXL', 'XXXL', '红', '灰', '黑', '棕', '特大加棉', '中等加棉', '温暖版', '温馨版', 1000),
(12, '24寸', '32寸', '40寸', '17寸', '红', '棕', '蓝', '绿', '24寸mini', '32寸mini', '40寸mini', '17寸mini', 598989),
(13, '24寸', '32寸', '40寸', '17寸', '红', '黑', '蓝', '绿', '24寸mini', '32寸mini', '40寸mini', '17寸mini', 1548898),
(14, '24寸', '32寸', '40寸', '17寸', '红', '黑', '蓝', '绿', '24寸mini', '32寸mini', '40寸mini', '17寸mini', 1),
(15, '24寸', '32寸', '40寸', '17寸', '红', '黑', '蓝', '绿', '24寸mini', '32寸mini', '40寸mini', '17寸mini', 2),
(16, '24寸', '32寸', '40寸', '17寸', '红', '黑', '蓝', '绿', '24寸mini', '32寸mini', '40寸mini', '17寸mini', 3),
(17, '24寸', '32寸', '40寸', '17寸', '红', '黑', '蓝', '绿', '24寸mini', '32寸mini', '40寸mini', '17寸mini', 4),
(18, '24寸', '32寸', '40寸', '17寸', '红', '黑', '蓝', '绿', '24寸mini', '32寸mini', '40寸mini', '17寸mini', 5),
(19, '24寸', '32寸', '40寸', '17寸', '红', '黑', '蓝', '绿', '24寸mini', '32寸mini', '40寸mini', '17寸mini', 6),
(20, '24寸', '32寸', '40寸', '17寸', '红', '黑', '蓝', '绿', '24寸mini', '32寸mini', '40寸mini', '17寸mini', 7),
(21, '24寸', '32寸', '40寸', '17寸', '红', '黑', '蓝', '绿', '24寸mini', '32寸mini', '40寸mini', '17寸mini', 8),
(22, '5.5寸', '5.5寸', '5.5寸', '5.5寸', '红', '黑', '蓝', '绿', '顶配', '普通配置', '青年版', '清新版', 10),
(23, '5.5寸', '5.5寸', '5.5寸', '5.5寸', '红', '黑', '蓝', '绿', '顶配', '普通配置', '青年版', '清新版', 10),
(24, '5.5寸', '5.5寸', '5.5寸', '5.5寸', '红', '黑', '蓝', '绿', '顶配', '普通配置', '青年版', '清新版', 11),
(25, '5.5寸', '5.5寸', '5.5寸', '5.5寸', '红', '黑', '蓝', '绿', '顶配', '普通配置', '青年版', '清新版', 12),
(26, '5.5寸', '5.5寸', '5.5寸', '5.5寸', '红', '黑', '蓝', '绿', '顶配', '普通配置', '青年版', '清新版', 13),
(27, '5.5寸', '5.5寸', '5.5寸', '5.5寸', '红', '黑', '蓝', '绿', '顶配', '普通配置', '青年版', '清新版', 14),
(28, '5.5寸', '5.5寸', '5.5寸', '5.5寸', '红', '黑', '蓝', '绿', '顶配', '普通配置', '青年版', '清新版', 15),
(29, '5.5寸', '5.5寸', '5.5寸', '5.5寸', '红', '黑', '蓝', '绿', '顶配', '普通配置', '青年版', '清新版', 16),
(30, '5.5寸', '5.5寸', '5.5寸', '5.5寸', '红', '黑', '蓝', '绿', '顶配', '普通配置', '青年版', '清新版', 17),
(31, '5.5寸', '5.5寸', '5.5寸', '5.5寸', '红', '黑', '蓝', '绿', '顶配', '普通配置', '青年版', '清新版', 18),
(32, '24寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '绿', '豪华顶配', '超级靓机', '裸机', 'mini笔记本', 33),
(33, '24寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '绿', '豪华顶配', '超级靓机', '裸机', 'mini笔记本', 34),
(34, '24寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '绿', '豪华顶配', '超级靓机', '裸机', 'mini笔记本', 35),
(35, '24寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '绿', '豪华顶配', '超级靓机', '裸机', 'mini笔记本', 36),
(36, '24寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '绿', '豪华顶配', '超级靓机', '裸机', 'mini笔记本', 37),
(37, '24寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '绿', '豪华顶配', '超级靓机', '裸机', 'mini笔记本', 38),
(38, '24寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '绿', '豪华顶配', '超级靓机', '裸机', 'mini笔记本', 39),
(39, '24寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '绿', '豪华顶配', '超级靓机', '裸机', 'mini笔记本', 40),
(40, '大', '特大', '中等', '小型', '红', '干红', '白酒', '真白', '精品酒1', '精品酒2', '精品酒3', '精品酒4', 55),
(41, '大', '特大', '中等', '小型', '红', '干红', '白酒', '真白', '精品酒1', '精品酒2', '精品酒3', '精品酒4', 56),
(42, '大', '特大', '中等', '小型', '红', '干红', '白酒', '真白', '精品酒1', '精品酒2', '精品酒3', '精品酒4', 57),
(43, '大', '特大', '中等', '小型', '红', '干红', '白酒', '真白', '精品酒1', '精品酒2', '精品酒3', '精品酒4', 58),
(44, '大', '特大', '中等', '小型', '红', '干红', '白酒', '真白', '精品酒1', '精品酒2', '精品酒3', '精品酒4', 59),
(45, '大', '特大', '中等', '小型', '红', '干红', '白酒', '真白', '精品酒1', '精品酒2', '精品酒3', '精品酒4', 60),
(46, '大', '特大', '中等', '小型', '红', '干红', '白酒', '真白', '精品酒1', '精品酒2', '精品酒3', '精品酒4', 61),
(47, '大', '特大', '中等', '小型', '红', '干红', '白酒', '真白', '精品酒1', '精品酒2', '精品酒3', '精品酒4', 62),
(48, '大', '特大', '中等', '小型', '红', '干红', '白酒', '真白', '精品酒1', '精品酒2', '精品酒3', '精品酒4', 63),
(49, '大', '特大', '中等', '小型', '红', '干红', '白酒', '真白', '精品酒1', '精品酒2', '精品酒3', '精品酒4', 64),
(50, '12寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '棕', '精装版', '精简版', '详细版', '全屏版', 100),
(51, '12寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '棕', '精装版', '精简版', '详细版', '全屏版', 101),
(52, '12寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '棕', '精装版', '精简版', '详细版', '全屏版', 102),
(53, '12寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '棕', '精装版', '精简版', '详细版', '全屏版', 103),
(54, '12寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '棕', '精装版', '精简版', '详细版', '全屏版', 104),
(55, '12寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '棕', '精装版', '精简版', '详细版', '全屏版', 105),
(56, '12寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '棕', '精装版', '精简版', '详细版', '全屏版', 106),
(57, '12寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '棕', '精装版', '精简版', '详细版', '全屏版', 107),
(58, '12寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '棕', '精装版', '精简版', '详细版', '全屏版', 108),
(59, '12寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '棕', '精装版', '精简版', '详细版', '全屏版', 109),
(60, '12寸', '32寸', '40寸', '50寸', '红', '黑', '蓝', '棕', '精装版', '精简版', '详细版', '全屏版', 110),
(61, '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', 200),
(62, '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', 201),
(63, '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', 202),
(64, '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', 203),
(65, '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', 204),
(66, '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', 205),
(67, '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', 206),
(68, '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', '套装1', '套装2', '套装3', '套装4', 207);

-- --------------------------------------------------------

--
-- 表的结构 `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `shopName` varchar(100) NOT NULL,
  `shopNum` int(11) NOT NULL,
  `shopSay` text,
  `shopPrice` decimal(10,2) DEFAULT NULL,
  `shopHuanjia` decimal(10,2) DEFAULT NULL,
  `shopYun` decimal(10,2) DEFAULT NULL,
  `shopImage` varchar(100) DEFAULT NULL,
  `shopShu` int(11) DEFAULT NULL,
  `lei_name` varchar(50) NOT NULL,
  `shopTime` varchar(20) DEFAULT NULL,
  `isHot` int(11) DEFAULT NULL,
  `is_up` int(11) DEFAULT NULL,
  `gongName` varchar(50) DEFAULT NULL,
  `storeName` varchar(50) NOT NULL,
  `shop_power` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`shop_id`,`storeName`),
  UNIQUE KEY `shopNum_2` (`shopNum`),
  KEY `shopName` (`shopName`),
  KEY `lei_id` (`lei_name`),
  KEY `shopNum` (`shopNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=97 ;

--
-- 转存表中的数据 `shop`
--

INSERT INTO `shop` (`shop_id`, `shopName`, `shopNum`, `shopSay`, `shopPrice`, `shopHuanjia`, `shopYun`, `shopImage`, `shopShu`, `lei_name`, `shopTime`, `isHot`, `is_up`, `gongName`, `storeName`, `shop_power`) VALUES
(16, '夏季休闲裙', 201300, '这件裙子温柔漂亮，好衣服啊', '32.00', '0.00', '20.00', '565f0a6e28c06.jpg', 999, '卫衣', '1449069166', NULL, 1, 'liuliu', '', NULL),
(17, '美味辣条', 130, '<p>\r\n	辣条，又名辣片，麻辣条，辣子条，豆腐皮，麻辣。主要原料为面粉，加入水，盐，糖，天然色素等和面，经过膨化机高温挤压<a href="http://baike.baidu.com/view/719955.htm" target="_blank">膨化</a>，再加油，辣椒，<a href="http://baike.baidu.com/view/1803141.htm" target="_blank">麻椒</a>等调味料，按GB2760标准加入<a href="http://baike.baidu.com/view/140315.htm" target="_blank">防腐剂</a>等添加剂制成的面制品。\r\n</p>\r\n<p>\r\n	辣条诞生时间很早，辣条最早出现在80后的记忆中。辣条出现之后很长时间，包括卫生，生产许可证等很多都会让人产生怀疑，确实如此，以前的辣条都会存在那样这样的问题，没有生产许可。其中最让人担心的就是卫生问题，辣条里会放很多添加剂、防腐剂。而且辣条的生产环境脏乱，不干净。曾多次被媒体爆出问题，加之监管部门监管不到位，导致辣条大量销售于城乡结合部、县城、农村地区。在城市也有零星分布，大多会在小学门外由小商贩及小商店销售。但随着监管力度加大，辣条生产环境也逐渐好转，由原来的问题食品（如没生产许可、卫生不合格等等）转变为受到很多年轻人喜欢的<a href="http://baike.baidu.com/view/8894.htm" target="_blank">零食</a>。虽然辣条生产情况整体好转，但卫生等问题依然存在。辣条属于辛辣食品，建议适量食用，并应选择大品牌进行购买。\r\n</p>\r\n<p>\r\n	<img src="/YouLemon/Public/ckeditor/attached/image/20151204/20151204114423_38778.jpg" alt="" />\r\n</p>', '1.00', '0.00', '10.00', '56616e89aa723.jpg', 100, '休闲零食', '1449225865', NULL, 1, 'admin', '', NULL),
(19, '时尚潮流男生最帅系列', 201656, '<p>\r\n	做时尚的男人，就是我，买下它，成就你！\r\n</p>\r\n<p>\r\n	<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151204/20151204140142_86118.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151204/20151204140142_80540.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151204/20151204140142_44848.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151204/20151204140142_39907.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151204/20151204140142_17421.jpg" alt="" />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '199.00', '189.00', '10.00', '56618ebbd96cd.jpg', 200, '卫衣', '1449234107', NULL, 1, NULL, 'liuliu', NULL),
(20, '时尚潮男', 333016, '<img src="/YouLemon/Public/ckeditor/attached/image/20151204/20151204143058_33595.jpg" alt="" />', '299.00', '250.00', '10.00', '5661959532039.jpg', 200, '羽绒服', '1449235861', NULL, 1, NULL, 'liuliu', NULL),
(22, '潮流男士', 3006, '<img src="/YouLemon/Public/ckeditor/attached/image/20151204/20151204144523_41673.jpg" alt="" />', '299.00', '230.00', '10.00', '566198f639b2e.jpg', 300, '羽绒服', '1449236726', NULL, 0, 'liuliu', '', NULL),
(25, '夏季休闲裙', 201301, '这件裙子温柔漂亮，好衣服啊', '32.00', '0.00', '20.00', '565f0a6e28c06.jpg', 999, '卫衣', '1449069166', NULL, 1, NULL, 'liuliu', NULL),
(26, '美特斯邦威', 1000, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_47666.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_96756.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_79873.jpg" alt="" />', '199.00', '199.00', '10.00', '5662c69d8af93.jpg', 200, '羽绒服', '1449313949', NULL, 1, NULL, 'liuliu', NULL),
(29, '美特斯邦威', 1040, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_47666.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_96756.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_79873.jpg" alt="" />', '199.00', '199.00', '10.00', '5662c69d8af93.jpg', 200, '羽绒服', '1449313968', NULL, 1, NULL, 'liuliu', NULL),
(30, '美特斯邦威', 10540, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_47666.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_96756.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_79873.jpg" alt="" />', '199.00', '199.00', '10.00', '5662c69d8af93.jpg', 200, '羽绒服', '1449313968', NULL, 1, NULL, 'liuliu', NULL),
(31, '美特斯邦威', 122540, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_47666.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_96756.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_79873.jpg" alt="" />', '199.00', '199.00', '10.00', '5662c69d8af93.jpg', 200, '羽绒服', '1449313968', NULL, 1, NULL, 'liuliu', NULL),
(32, '美特斯邦威', 121540, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_47666.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_96756.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_79873.jpg" alt="" />', '199.00', '199.00', '10.00', '5662c69d8af93.jpg', 200, '羽绒服', '1449313968', NULL, 1, NULL, 'liuliu', NULL),
(33, '美特斯邦威', 1361540, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_47666.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_96756.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_79873.jpg" alt="" />', '199.00', '199.00', '10.00', '5662c69d8af93.jpg', 200, '羽绒服', '1449313968', NULL, 1, NULL, 'liuliu', NULL),
(34, '美特斯邦威', 1369540, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_47666.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_96756.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_79873.jpg" alt="" />', '199.00', '199.00', '10.00', '5662c69d8af93.jpg', 200, '羽绒服', '1449313968', NULL, 1, NULL, 'liuliu', NULL),
(35, '美特斯邦威', 1394540, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_47666.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_96756.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_79873.jpg" alt="" />', '199.00', '199.00', '10.00', '5662c69d8af93.jpg', 200, '羽绒服', '1449313968', NULL, 1, NULL, 'liuliu', NULL),
(36, '美特斯邦威', 13689540, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_47666.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_96756.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_79873.jpg" alt="" />', '199.00', '199.00', '10.00', '5662c69d8af93.jpg', 200, '羽绒服', '1449313968', NULL, 1, NULL, 'liuliu', NULL),
(37, '美特斯邦威', 136895140, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_47666.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_96756.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205121225_79873.jpg" alt="" />', '199.00', '199.00', '10.00', '5662c69d8af93.jpg', 200, '羽绒服', '1449313968', NULL, 1, NULL, 'liuliu', NULL),
(38, '超好液晶电视', 598989, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123009_15169.jpg" alt="" />', '1999.00', '1999.00', '20.00', '5662cacb89cd3.jpg', 300, '净化器', '1449315019', NULL, 1, NULL, 'test', NULL),
(39, '超高清', 1548898, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_24414.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_85039.jpg" alt="" />', '2000.00', '2000.00', '10.00', '5662cb31bebe1.jpg', 200, '平板电视', '1449315121', NULL, 1, NULL, 'test', NULL),
(40, '超高清', 1, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_24414.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_85039.jpg" alt="" />', '2000.00', '2000.00', '10.00', '5662cb31bebe1.jpg', 200, '平板电视', '1449315121', NULL, 1, NULL, 'test', NULL),
(41, '超高清', 2, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_24414.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_85039.jpg" alt="" />', '2000.00', '2000.00', '10.00', '5662cb31bebe1.jpg', 200, '平板电视', '1449315121', NULL, 1, NULL, 'test', NULL),
(42, '超高清', 3, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_24414.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_85039.jpg" alt="" />', '2000.00', '2000.00', '10.00', '5662cb31bebe1.jpg', 200, '平板电视', '1449315121', NULL, 1, NULL, 'test', NULL),
(43, '超高清', 4, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_24414.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_85039.jpg" alt="" />', '2000.00', '2000.00', '10.00', '5662cb31bebe1.jpg', 200, '平板电视', '1449315121', NULL, 1, NULL, 'test', NULL),
(44, '超高清', 5, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_24414.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_85039.jpg" alt="" />', '2000.00', '2000.00', '10.00', '5662cb31bebe1.jpg', 200, '平板电视', '1449315121', NULL, 1, NULL, 'test', NULL),
(45, '超高清', 6, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_24414.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_85039.jpg" alt="" />', '2000.00', '2000.00', '10.00', '5662cb31bebe1.jpg', 200, '平板电视', '1449315121', NULL, 1, NULL, 'test', NULL),
(46, '超高清', 7, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_24414.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_85039.jpg" alt="" />', '2000.00', '2000.00', '10.00', '5662cb31bebe1.jpg', 200, '平板电视', '1449315121', NULL, 1, NULL, 'test', NULL),
(47, '超高清', 8, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_24414.jpg" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205123159_85039.jpg" alt="" />', '2000.00', '2000.00', '10.00', '5662cb31bebe1.jpg', 200, '平板电视', '1449315121', NULL, 1, NULL, 'test', NULL),
(48, '魅族手机MX5', 10, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53272.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53879.png" alt="" />', '2000.00', '1799.00', '10.00', '5662cdff0dbf3.png', 100, '手机', '1449315839', NULL, 1, NULL, 'test', NULL),
(51, '魅族手机MX5', 11, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53272.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53879.png" alt="" />', '2000.00', '1799.00', '10.00', '5662cdff0dbf3.png', 100, '手机', '1449315839', NULL, 1, NULL, 'test', NULL),
(52, '魅族手机MX5', 12, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53272.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53879.png" alt="" />', '2000.00', '1799.00', '10.00', '5662cdff0dbf3.png', 100, '手机', '1449315839', NULL, 1, NULL, 'test', NULL),
(53, '魅族手机MX5', 13, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53272.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53879.png" alt="" />', '2000.00', '1799.00', '10.00', '5662cdff0dbf3.png', 100, '手机', '1449315839', NULL, 1, NULL, 'test', NULL),
(54, '魅族手机MX5', 14, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53272.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53879.png" alt="" />', '2000.00', '1799.00', '10.00', '5662cdff0dbf3.png', 100, '手机', '1449315839', NULL, 1, NULL, 'test', NULL),
(55, '魅族手机MX5', 15, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53272.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53879.png" alt="" />', '2000.00', '1799.00', '10.00', '5662cdff0dbf3.png', 100, '手机', '1449315839', NULL, 1, NULL, 'test', NULL),
(56, '魅族手机MX5', 16, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53272.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53879.png" alt="" />', '2000.00', '1799.00', '10.00', '5662cdff0dbf3.png', 100, '手机', '1449315839', NULL, 1, NULL, 'test', NULL),
(57, '魅族手机MX5', 17, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53272.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53879.png" alt="" />', '2000.00', '1799.00', '10.00', '5662cdff0dbf3.png', 100, '手机', '1449315839', NULL, 1, NULL, 'test', NULL),
(58, '魅族手机MX5', 18, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53272.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205124355_53879.png" alt="" />', '2000.00', '1799.00', '10.00', '5662cdff0dbf3.png', 100, '手机', '1449315839', NULL, 1, NULL, 'test', NULL),
(59, '联想超级笔记本', 33, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205135202_92356.png" alt="" />', '3999.00', '3999.00', '10.00', '5662ddf8bf9b8.png', 1000, '笔记本', '1449319928', NULL, 1, NULL, 'woheni', NULL),
(60, '联想超级笔记本', 34, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205135202_92356.png" alt="" />', '3999.00', '3999.00', '10.00', '5662ddf8bf9b8.png', 1000, '笔记本', '1449319928', NULL, 1, NULL, 'woheni', NULL),
(61, '联想超级笔记本', 35, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205135202_92356.png" alt="" />', '3999.00', '3999.00', '10.00', '5662ddf8bf9b8.png', 1000, '笔记本', '1449319928', NULL, 1, NULL, 'woheni', NULL),
(62, '联想超级笔记本', 36, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205135202_92356.png" alt="" />', '3999.00', '3999.00', '10.00', '5662ddf8bf9b8.png', 1000, '笔记本', '1449319928', NULL, 1, NULL, 'woheni', NULL),
(64, '联想超级笔记本', 37, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205135202_92356.png" alt="" />', '3999.00', '3999.00', '10.00', '5662ddf8bf9b8.png', 1000, '笔记本', '1449319928', NULL, 1, NULL, 'woheni', NULL),
(65, '联想超级笔记本', 38, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205135202_92356.png" alt="" />', '3999.00', '3999.00', '10.00', '5662ddf8bf9b8.png', 1000, '笔记本', '1449319928', NULL, 1, NULL, 'woheni', NULL),
(66, '联想超级笔记本', 39, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205135202_92356.png" alt="" />', '3999.00', '3999.00', '10.00', '5662ddf8bf9b8.png', 1000, '笔记本', '1449319928', NULL, 1, NULL, 'woheni', NULL),
(67, '联想超级笔记本', 40, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205135202_92356.png" alt="" />', '3999.00', '3999.00', '10.00', '5662ddf8bf9b8.png', 1000, '笔记本', '1449319928', NULL, 1, NULL, 'woheni', NULL),
(68, '长城精品酒', 55, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_74962.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_99156.png" alt="" />', '99.00', '99.00', '0.00', '5662e00ea2af8.png', 1000, '葡萄酒', '1449320462', NULL, 1, NULL, 'abc123', NULL),
(69, '长城精品酒', 56, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_74962.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_99156.png" alt="" />', '99.00', '99.00', '0.00', '5662e00ea2af8.png', 1000, '葡萄酒', '1449320462', NULL, 1, NULL, 'abc123', NULL),
(70, '长城精品酒', 57, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_74962.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_99156.png" alt="" />', '99.00', '99.00', '0.00', '5662e00ea2af8.png', 1000, '葡萄酒', '1449320462', NULL, 1, NULL, 'abc123', NULL),
(71, '长城精品酒', 58, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_74962.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_99156.png" alt="" />', '99.00', '99.00', '0.00', '5662e00ea2af8.png', 1000, '葡萄酒', '1449320462', NULL, 1, NULL, 'abc123', NULL),
(72, '长城精品酒', 59, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_74962.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_99156.png" alt="" />', '99.00', '99.00', '0.00', '5662e00ea2af8.png', 1000, '葡萄酒', '1449320462', NULL, 1, NULL, 'abc123', NULL),
(73, '长城精品酒', 60, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_74962.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_99156.png" alt="" />', '99.00', '99.00', '0.00', '5662e00ea2af8.png', 1000, '葡萄酒', '1449320462', NULL, 1, NULL, 'abc123', NULL),
(74, '长城精品酒', 61, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_74962.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_99156.png" alt="" />', '99.00', '99.00', '0.00', '5662e00ea2af8.png', 1000, '葡萄酒', '1449320462', NULL, 1, NULL, 'abc123', NULL),
(75, '长城精品酒', 62, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_74962.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_99156.png" alt="" />', '99.00', '99.00', '0.00', '5662e00ea2af8.png', 1000, '葡萄酒', '1449320462', NULL, 1, NULL, 'abc123', NULL),
(76, '长城精品酒', 63, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_74962.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_99156.png" alt="" />', '99.00', '99.00', '0.00', '5662e00ea2af8.png', 1000, '葡萄酒', '1449320462', NULL, 1, NULL, 'abc123', NULL),
(77, '长城精品酒', 64, '<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_74962.png" alt="" /><img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205140059_99156.png" alt="" />', '99.00', '99.00', '0.00', '5662e00ea2af8.png', 1000, '葡萄酒', '1449320462', NULL, 1, NULL, 'abc123', NULL),
(78, '巴格达有爱', 100, '<h2 style="font-size:15px;font-weight:normal;font-family:Arial, Helvetica, sans-serif;color:#007722;background-color:#FFFFFF;">\r\n	<span class="">内容简介</span>&nbsp;&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·\r\n</h2>\r\n<div class="indent" id="link-report" style="margin:0px;padding:0px;color:#111111;font-family:Helvetica, Arial, sans-serif;background-color:#FFFFFF;">\r\n	<div class="" style="margin:0px;padding:0px;">\r\n		<div class="intro" style="margin:0px;padding:0px;">\r\n			<p style="text-indent:2em;">\r\n				在“地球上最危险的城市”，伊拉克的费卢杰，大多数居民早在英美联军轰炸前就已逃离自己的家园。\r\n			</p>\r\n			<p style="text-indent:2em;">\r\n				美国海军陆战队的士兵进入该城一栋荒废的小屋时，听到了奇怪的声响。于是，他们握紧手中的武器，搜索每一个角落，随时准备开火。\r\n			</p>\r\n			<p style="text-indent:2em;">\r\n				他们并没有发现一心复仇的武装分子，却发现了一只被遗弃的小狗。\r\n			</p>\r\n			<p style="text-indent:2em;">\r\n				尽管军规禁止饲养宠物，士兵们还是用煤油和嚼烟祛除了这只小狗身上的跳蚤和寄生虫，并用即食口粮把它喂得饱饱的。海军陆战队员拯救了这只名叫拉瓦的小狗，而小狗拉瓦也拯救了深陷于战争带来的情感创伤中的杰伊·科普曼中校。\r\n			</p>\r\n		</div>\r\n	</div>\r\n</div>', '18.00', '18.00', '0.00', '5662e18fc8c76.jpg', 100, '管理', '1449320847', NULL, 1, NULL, '1234567', NULL),
(81, '巴格达有爱', 101, '<h2 style="font-size:15px;font-weight:normal;font-family:Arial, Helvetica, sans-serif;color:#007722;background-color:#FFFFFF;">\r\n	<span class="">内容简介</span>&nbsp;&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·\r\n</h2>\r\n<div class="indent" id="link-report" style="margin:0px;padding:0px;color:#111111;font-family:Helvetica, Arial, sans-serif;background-color:#FFFFFF;">\r\n	<div class="" style="margin:0px;padding:0px;">\r\n	 <div class="intro" style="margin:0px;padding:0px;">\r\n	 <p style="text-indent:2em;">\r\n	 在“地球上最危险的城市”，伊拉克的费卢杰，大多数居民早在英美联军轰炸前就已逃离自己的家园。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 美国海军陆战队的士兵进入该城一栋荒废的小屋时，听到了奇怪的声响。于是，他们握紧手中的武器，搜索每一个角落，随时准备开火。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 他们并没有发现一心复仇的武装分子，却发现了一只被遗弃的小狗。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 尽管军规禁止饲养宠物，士兵们还是用煤油和嚼烟祛除了这只小狗身上的跳蚤和寄生虫，并用即食口粮把它喂得饱饱的。海军陆战队员拯救了这只名叫拉瓦的小狗，而小狗拉瓦也拯救了深陷于战争带来的情感创伤中的杰伊·科普曼中校。\r\n	 </p>\r\n	 </div>\r\n	</div>\r\n</div>', '18.00', '18.00', '0.00', '5662e18fc8c76.jpg', 100, '管理', '1449320847', NULL, 1, NULL, '1234567', NULL),
(82, '巴格达有爱', 102, '<h2 style="font-size:15px;font-weight:normal;font-family:Arial, Helvetica, sans-serif;color:#007722;background-color:#FFFFFF;">\r\n	<span class="">内容简介</span>&nbsp;&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·\r\n</h2>\r\n<div class="indent" id="link-report" style="margin:0px;padding:0px;color:#111111;font-family:Helvetica, Arial, sans-serif;background-color:#FFFFFF;">\r\n	<div class="" style="margin:0px;padding:0px;">\r\n	 <div class="intro" style="margin:0px;padding:0px;">\r\n	 <p style="text-indent:2em;">\r\n	 在“地球上最危险的城市”，伊拉克的费卢杰，大多数居民早在英美联军轰炸前就已逃离自己的家园。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 美国海军陆战队的士兵进入该城一栋荒废的小屋时，听到了奇怪的声响。于是，他们握紧手中的武器，搜索每一个角落，随时准备开火。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 他们并没有发现一心复仇的武装分子，却发现了一只被遗弃的小狗。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 尽管军规禁止饲养宠物，士兵们还是用煤油和嚼烟祛除了这只小狗身上的跳蚤和寄生虫，并用即食口粮把它喂得饱饱的。海军陆战队员拯救了这只名叫拉瓦的小狗，而小狗拉瓦也拯救了深陷于战争带来的情感创伤中的杰伊·科普曼中校。\r\n	 </p>\r\n	 </div>\r\n	</div>\r\n</div>', '18.00', '18.00', '0.00', '5662e18fc8c76.jpg', 100, '管理', '1449320847', NULL, 1, NULL, '1234567', NULL),
(83, '巴格达有爱', 103, '<h2 style="font-size:15px;font-weight:normal;font-family:Arial, Helvetica, sans-serif;color:#007722;background-color:#FFFFFF;">\r\n	<span class="">内容简介</span>&nbsp;&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·\r\n</h2>\r\n<div class="indent" id="link-report" style="margin:0px;padding:0px;color:#111111;font-family:Helvetica, Arial, sans-serif;background-color:#FFFFFF;">\r\n	<div class="" style="margin:0px;padding:0px;">\r\n	 <div class="intro" style="margin:0px;padding:0px;">\r\n	 <p style="text-indent:2em;">\r\n	 在“地球上最危险的城市”，伊拉克的费卢杰，大多数居民早在英美联军轰炸前就已逃离自己的家园。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 美国海军陆战队的士兵进入该城一栋荒废的小屋时，听到了奇怪的声响。于是，他们握紧手中的武器，搜索每一个角落，随时准备开火。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 他们并没有发现一心复仇的武装分子，却发现了一只被遗弃的小狗。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 尽管军规禁止饲养宠物，士兵们还是用煤油和嚼烟祛除了这只小狗身上的跳蚤和寄生虫，并用即食口粮把它喂得饱饱的。海军陆战队员拯救了这只名叫拉瓦的小狗，而小狗拉瓦也拯救了深陷于战争带来的情感创伤中的杰伊·科普曼中校。\r\n	 </p>\r\n	 </div>\r\n	</div>\r\n</div>', '18.00', '18.00', '0.00', '5662e18fc8c76.jpg', 100, '管理', '1449320847', NULL, 1, NULL, '1234567', NULL),
(84, '巴格达有爱', 104, '<h2 style="font-size:15px;font-weight:normal;font-family:Arial, Helvetica, sans-serif;color:#007722;background-color:#FFFFFF;">\r\n	<span class="">内容简介</span>&nbsp;&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·\r\n</h2>\r\n<div class="indent" id="link-report" style="margin:0px;padding:0px;color:#111111;font-family:Helvetica, Arial, sans-serif;background-color:#FFFFFF;">\r\n	<div class="" style="margin:0px;padding:0px;">\r\n	 <div class="intro" style="margin:0px;padding:0px;">\r\n	 <p style="text-indent:2em;">\r\n	 在“地球上最危险的城市”，伊拉克的费卢杰，大多数居民早在英美联军轰炸前就已逃离自己的家园。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 美国海军陆战队的士兵进入该城一栋荒废的小屋时，听到了奇怪的声响。于是，他们握紧手中的武器，搜索每一个角落，随时准备开火。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 他们并没有发现一心复仇的武装分子，却发现了一只被遗弃的小狗。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 尽管军规禁止饲养宠物，士兵们还是用煤油和嚼烟祛除了这只小狗身上的跳蚤和寄生虫，并用即食口粮把它喂得饱饱的。海军陆战队员拯救了这只名叫拉瓦的小狗，而小狗拉瓦也拯救了深陷于战争带来的情感创伤中的杰伊·科普曼中校。\r\n	 </p>\r\n	 </div>\r\n	</div>\r\n</div>', '18.00', '18.00', '0.00', '5662e18fc8c76.jpg', 100, '管理', '1449320847', NULL, 1, NULL, '1234567', NULL),
(85, '巴格达有爱', 105, '<h2 style="font-size:15px;font-weight:normal;font-family:Arial, Helvetica, sans-serif;color:#007722;background-color:#FFFFFF;">\r\n	<span class="">内容简介</span>&nbsp;&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·\r\n</h2>\r\n<div class="indent" id="link-report" style="margin:0px;padding:0px;color:#111111;font-family:Helvetica, Arial, sans-serif;background-color:#FFFFFF;">\r\n	<div class="" style="margin:0px;padding:0px;">\r\n	 <div class="intro" style="margin:0px;padding:0px;">\r\n	 <p style="text-indent:2em;">\r\n	 在“地球上最危险的城市”，伊拉克的费卢杰，大多数居民早在英美联军轰炸前就已逃离自己的家园。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 美国海军陆战队的士兵进入该城一栋荒废的小屋时，听到了奇怪的声响。于是，他们握紧手中的武器，搜索每一个角落，随时准备开火。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 他们并没有发现一心复仇的武装分子，却发现了一只被遗弃的小狗。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 尽管军规禁止饲养宠物，士兵们还是用煤油和嚼烟祛除了这只小狗身上的跳蚤和寄生虫，并用即食口粮把它喂得饱饱的。海军陆战队员拯救了这只名叫拉瓦的小狗，而小狗拉瓦也拯救了深陷于战争带来的情感创伤中的杰伊·科普曼中校。\r\n	 </p>\r\n	 </div>\r\n	</div>\r\n</div>', '18.00', '18.00', '0.00', '5662e18fc8c76.jpg', 100, '管理', '1449320847', NULL, 1, NULL, '1234567', NULL),
(86, '巴格达有爱', 106, '<h2 style="font-size:15px;font-weight:normal;font-family:Arial, Helvetica, sans-serif;color:#007722;background-color:#FFFFFF;">\r\n	<span class="">内容简介</span>&nbsp;&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·\r\n</h2>\r\n<div class="indent" id="link-report" style="margin:0px;padding:0px;color:#111111;font-family:Helvetica, Arial, sans-serif;background-color:#FFFFFF;">\r\n	<div class="" style="margin:0px;padding:0px;">\r\n	 <div class="intro" style="margin:0px;padding:0px;">\r\n	 <p style="text-indent:2em;">\r\n	 在“地球上最危险的城市”，伊拉克的费卢杰，大多数居民早在英美联军轰炸前就已逃离自己的家园。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 美国海军陆战队的士兵进入该城一栋荒废的小屋时，听到了奇怪的声响。于是，他们握紧手中的武器，搜索每一个角落，随时准备开火。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 他们并没有发现一心复仇的武装分子，却发现了一只被遗弃的小狗。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 尽管军规禁止饲养宠物，士兵们还是用煤油和嚼烟祛除了这只小狗身上的跳蚤和寄生虫，并用即食口粮把它喂得饱饱的。海军陆战队员拯救了这只名叫拉瓦的小狗，而小狗拉瓦也拯救了深陷于战争带来的情感创伤中的杰伊·科普曼中校。\r\n	 </p>\r\n	 </div>\r\n	</div>\r\n</div>', '18.00', '18.00', '0.00', '5662e18fc8c76.jpg', 100, '管理', '1449320847', NULL, 1, NULL, '1234567', NULL),
(87, '巴格达有爱', 107, '<h2 style="font-size:15px;font-weight:normal;font-family:Arial, Helvetica, sans-serif;color:#007722;background-color:#FFFFFF;">\r\n	<span class="">内容简介</span>&nbsp;&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·\r\n</h2>\r\n<div class="indent" id="link-report" style="margin:0px;padding:0px;color:#111111;font-family:Helvetica, Arial, sans-serif;background-color:#FFFFFF;">\r\n	<div class="" style="margin:0px;padding:0px;">\r\n	 <div class="intro" style="margin:0px;padding:0px;">\r\n	 <p style="text-indent:2em;">\r\n	 在“地球上最危险的城市”，伊拉克的费卢杰，大多数居民早在英美联军轰炸前就已逃离自己的家园。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 美国海军陆战队的士兵进入该城一栋荒废的小屋时，听到了奇怪的声响。于是，他们握紧手中的武器，搜索每一个角落，随时准备开火。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 他们并没有发现一心复仇的武装分子，却发现了一只被遗弃的小狗。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 尽管军规禁止饲养宠物，士兵们还是用煤油和嚼烟祛除了这只小狗身上的跳蚤和寄生虫，并用即食口粮把它喂得饱饱的。海军陆战队员拯救了这只名叫拉瓦的小狗，而小狗拉瓦也拯救了深陷于战争带来的情感创伤中的杰伊·科普曼中校。\r\n	 </p>\r\n	 </div>\r\n	</div>\r\n</div>', '18.00', '18.00', '0.00', '5662e18fc8c76.jpg', 100, '管理', '1449320847', NULL, 1, NULL, '1234567', NULL),
(88, '巴格达有爱', 108, '<h2 style="font-size:15px;font-weight:normal;font-family:Arial, Helvetica, sans-serif;color:#007722;background-color:#FFFFFF;">\r\n	<span class="">内容简介</span>&nbsp;&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·\r\n</h2>\r\n<div class="indent" id="link-report" style="margin:0px;padding:0px;color:#111111;font-family:Helvetica, Arial, sans-serif;background-color:#FFFFFF;">\r\n	<div class="" style="margin:0px;padding:0px;">\r\n	 <div class="intro" style="margin:0px;padding:0px;">\r\n	 <p style="text-indent:2em;">\r\n	 在“地球上最危险的城市”，伊拉克的费卢杰，大多数居民早在英美联军轰炸前就已逃离自己的家园。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 美国海军陆战队的士兵进入该城一栋荒废的小屋时，听到了奇怪的声响。于是，他们握紧手中的武器，搜索每一个角落，随时准备开火。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 他们并没有发现一心复仇的武装分子，却发现了一只被遗弃的小狗。\r\n	 </p>\r\n	 <p style="text-indent:2em;">\r\n	 尽管军规禁止饲养宠物，士兵们还是用煤油和嚼烟祛除了这只小狗身上的跳蚤和寄生虫，并用即食口粮把它喂得饱饱的。海军陆战队员拯救了这只名叫拉瓦的小狗，而小狗拉瓦也拯救了深陷于战争带来的情感创伤中的杰伊·科普曼中校。\r\n	 </p>\r\n	 </div>\r\n	</div>\r\n</div>', '18.00', '18.00', '0.00', '5662e18fc8c76.jpg', 100, '管理', '1449320847', NULL, 1, NULL, '1234567', NULL),
(89, '百雀羚化妆品', 200, '<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205142727_22815.png" alt="" />\r\n</p>', '99.00', '99.00', '0.00', '5662e64249488.png', 100, '香水', '1449322050', NULL, 1, NULL, 'modi', NULL),
(90, '百雀羚化妆品', 201, '<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205142727_22815.png" alt="" />\r\n</p>', '99.00', '99.00', '0.00', '5662e64249488.png', 100, '香水', '1449322050', NULL, 1, NULL, 'modi', NULL),
(91, '百雀羚化妆品', 202, '<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205142727_22815.png" alt="" />\r\n</p>', '99.00', '99.00', '0.00', '5662e64249488.png', 100, '香水', '1449322050', NULL, 1, NULL, 'modi', NULL),
(92, '百雀羚化妆品', 203, '<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205142727_22815.png" alt="" />\r\n</p>', '99.00', '99.00', '0.00', '5662e64249488.png', 100, '香水', '1449322050', NULL, 1, NULL, 'modi', NULL),
(93, '百雀羚化妆品', 204, '<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205142727_22815.png" alt="" />\r\n</p>', '99.00', '99.00', '0.00', '5662e64249488.png', 100, '香水', '1449322050', NULL, 1, NULL, 'modi', NULL),
(94, '百雀羚化妆品', 205, '<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205142727_22815.png" alt="" />\r\n</p>', '99.00', '99.00', '0.00', '5662e64249488.png', 100, '香水', '1449322050', NULL, 1, NULL, 'modi', NULL),
(95, '百雀羚化妆品', 206, '<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205142727_22815.png" alt="" />\r\n</p>', '99.00', '99.00', '0.00', '5662e64249488.png', 100, '香水', '1449322050', NULL, 1, NULL, 'modi', NULL),
(96, '百雀羚化妆品', 207, '<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<img src="/YouLemon/Public/ckeditor/php/../attached/image/20151205/20151205142727_22815.png" alt="" />\r\n</p>', '99.00', '99.00', '0.00', '5662e64249488.png', 100, '香水', '1449322050', NULL, 1, NULL, 'modi', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `shopimg`
--

CREATE TABLE IF NOT EXISTS `shopimg` (
  `shopNum` int(11) DEFAULT NULL,
  `shopImg` varchar(100) DEFAULT NULL,
  `shopImg2` varchar(100) DEFAULT NULL,
  `shopImg3` varchar(100) DEFAULT NULL,
  `shopImg4` varchar(100) DEFAULT NULL,
  UNIQUE KEY `shopNum` (`shopNum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `shopimg`
--

INSERT INTO `shopimg` (`shopNum`, `shopImg`, `shopImg2`, `shopImg3`, `shopImg4`) VALUES
(201300, '565f0b3b9c69f.png', '565f0b3b9ca87.png', '565f0b3b9ce6f.jpg', NULL),
(201656, '566190f02ce29.jpg', '566190f02ddc9.jpg', '566190f02e599.jpg', '566190f02f53a.jpg'),
(201301, '565f0b3b9c69f.png', '565f0b3b9ca87.png', '565f0b3b9ce6f.jpg', ''),
(1, '5662cc1d5a074.jpg', '5662cc1d5ac2d.jpg', '5662cc1d5b7e5.jpg', '5662cc1d5cb6d.jpg'),
(2, '5662cc1d5a074.jpg', '5662cc1d5ac2d.jpg', '5662cc1d5b7e5.jpg', '5662cc1d5cb6d.jpg'),
(3, '5662cc1d5a074.jpg', '5662cc1d5ac2d.jpg', '5662cc1d5b7e5.jpg', '5662cc1d5cb6d.jpg'),
(4, '5662cc1d5a074.jpg', '5662cc1d5ac2d.jpg', '5662cc1d5b7e5.jpg', '5662cc1d5cb6d.jpg'),
(5, '5662cc1d5a074.jpg', '5662cc1d5ac2d.jpg', '5662cc1d5b7e5.jpg', '5662cc1d5cb6d.jpg'),
(6, '5662cc1d5a074.jpg', '5662cc1d5ac2d.jpg', '5662cc1d5b7e5.jpg', '5662cc1d5cb6d.jpg'),
(7, '5662cc1d5a074.jpg', '5662cc1d5ac2d.jpg', '5662cc1d5b7e5.jpg', '5662cc1d5cb6d.jpg'),
(8, '5662cc1d5a074.jpg', '5662cc1d5ac2d.jpg', '5662cc1d5b7e5.jpg', '5662cc1d5cb6d.jpg'),
(11, '5662d6becb9dd.png', '5662d6beea22c.png', '5662d6beea614.png', '5662d6beea9fc.png'),
(10, '5662d6becb9dd.png', '5662d6beea22c.png', '5662d6beea614.png', '5662d6beea9fc.png'),
(12, '5662d6becb9dd.png', '5662d6beea22c.png', '5662d6beea614.png', '5662d6beea9fc.png'),
(13, '5662d6becb9dd.png', '5662d6beea22c.png', '5662d6beea614.png', '5662d6beea9fc.png'),
(14, '5662d6becb9dd.png', '5662d6beea22c.png', '5662d6beea614.png', '5662d6beea9fc.png'),
(15, '5662d6becb9dd.png', '5662d6beea22c.png', '5662d6beea614.png', '5662d6beea9fc.png'),
(16, '5662d6becb9dd.png', '5662d6beea22c.png', '5662d6beea614.png', '5662d6beea9fc.png'),
(17, '5662d6becb9dd.png', '5662d6beea22c.png', '5662d6beea614.png', '5662d6beea9fc.png'),
(18, '5662d6becb9dd.png', '5662d6beea22c.png', '5662d6beea614.png', '5662d6beea9fc.png'),
(33, '5662deb20d495.png', '5662deb20e04d.png', '5662deb20e435.png', '5662deb20e81d.png'),
(34, '5662deb20d495.png', '5662deb20e04d.png', '5662deb20e435.png', '5662deb20e81d.png'),
(35, '5662deb20d495.png', '5662deb20e04d.png', '5662deb20e435.png', '5662deb20e81d.png'),
(36, '5662deb20d495.png', '5662deb20e04d.png', '5662deb20e435.png', '5662deb20e81d.png'),
(37, '5662deb20d495.png', '5662deb20e04d.png', '5662deb20e435.png', '5662deb20e81d.png'),
(38, '5662deb20d495.png', '5662deb20e04d.png', '5662deb20e435.png', '5662deb20e81d.png'),
(39, '5662deb20d495.png', '5662deb20e04d.png', '5662deb20e435.png', '5662deb20e81d.png'),
(40, '5662deb20d495.png', '5662deb20e04d.png', '5662deb20e435.png', '5662deb20e81d.png'),
(55, '5662e0603e433.png', '5662e0603ec03.png', '5662e0603efeb.png', '5662e0603f7bb.png'),
(56, '5662e0603e433.png', '5662e0603ec03.png', '5662e0603efeb.png', '5662e0603f7bb.png'),
(57, '5662e0603e433.png', '5662e0603ec03.png', '5662e0603efeb.png', '5662e0603f7bb.png'),
(58, '5662e0603e433.png', '5662e0603ec03.png', '5662e0603efeb.png', '5662e0603f7bb.png'),
(59, '5662e0603e433.png', '5662e0603ec03.png', '5662e0603efeb.png', '5662e0603f7bb.png'),
(60, '5662e0603e433.png', '5662e0603ec03.png', '5662e0603efeb.png', '5662e0603f7bb.png'),
(61, '5662e0603e433.png', '5662e0603ec03.png', '5662e0603efeb.png', '5662e0603f7bb.png'),
(62, '5662e0603e433.png', '5662e0603ec03.png', '5662e0603efeb.png', '5662e0603f7bb.png'),
(63, '5662e0603e433.png', '5662e0603ec03.png', '5662e0603efeb.png', '5662e0603f7bb.png'),
(200, '5662e69dbfbf9.png', '5662e69dc07b1.png', '5662e69dc0f81.png', '5662e69dd6746.png'),
(201, '5662e69dbfbf9.png', '5662e69dc07b1.png', '5662e69dc0f81.png', '5662e69dd6746.png'),
(202, '5662e69dbfbf9.png', '5662e69dc07b1.png', '5662e69dc0f81.png', '5662e69dd6746.png'),
(203, '5662e69dbfbf9.png', '5662e69dc07b1.png', '5662e69dc0f81.png', '5662e69dd6746.png'),
(204, '5662e69dbfbf9.png', '5662e69dc07b1.png', '5662e69dc0f81.png', '5662e69dd6746.png'),
(205, '5662e69dbfbf9.png', '5662e69dc07b1.png', '5662e69dc0f81.png', '5662e69dd6746.png'),
(206, '5662e69dbfbf9.png', '5662e69dc07b1.png', '5662e69dc0f81.png', '5662e69dd6746.png'),
(207, '5662e69dbfbf9.png', '5662e69dc07b1.png', '5662e69dc0f81.png', '5662e69dd6746.png');

-- --------------------------------------------------------

--
-- 表的结构 `shopping`
--

CREATE TABLE IF NOT EXISTS `shopping` (
  `username` char(20) NOT NULL,
  `storeName` varchar(50) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY (`shop_id`),
  KEY `gou_id` (`shop_id`,`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `shopping`
--

INSERT INTO `shopping` (`username`, `storeName`, `number`, `shop_id`) VALUES
('liuliu', 'liuliu', 1, 36);

-- --------------------------------------------------------

--
-- 表的结构 `shop_gong`
--

CREATE TABLE IF NOT EXISTS `shop_gong` (
  `shop_gong` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `gong_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`shop_gong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `is_kai` int(11) NOT NULL DEFAULT '0',
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `storeName` varchar(50) NOT NULL,
  `lei_store` varchar(20) DEFAULT NULL,
  `storeAddress` varchar(100) DEFAULT NULL,
  `storePhone` bigint(11) DEFAULT NULL,
  `storeImg` varchar(200) DEFAULT NULL,
  `gong_id` int(11) DEFAULT NULL,
  `username` char(20) DEFAULT NULL,
  PRIMARY KEY (`store_id`,`storeName`),
  UNIQUE KEY `storeName_2` (`storeName`),
  UNIQUE KEY `username` (`username`),
  KEY `storeName` (`storeName`),
  KEY `gong_id` (`gong_id`),
  KEY `store_id` (`store_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `store`
--

INSERT INTO `store` (`is_kai`, `store_id`, `storeName`, `lei_store`, `storeAddress`, `storePhone`, `storeImg`, `gong_id`, `username`) VALUES
(2, 1, 'you柠檬商店', '男装', '宜州市龙江路42路河池学院旁龙威商店', 18278880806, '564c9f18b4d37.jpg', 10, 'liuliu'),
(2, 2, 'youyou美好电器商店', '手机通讯', '广西河池宜州市电器城', 18278880806, '5662ca35ad8d0.jpg', 0, 'test'),
(2, 3, 'You柠檬零食商店', NULL, NULL, NULL, 'logo.png', NULL, 'admin'),
(2, 4, 'You柠檬图书市场', '经管励志', '北京无敌书场', 18278880806, 'logo.png', NULL, '1234567'),
(2, 5, 'You柠檬电脑城', '电脑整机', '广西柳州市电脑城', 18278880806, '5662dd8bae75a.png', NULL, 'woheni'),
(2, 6, 'You柠檬酒类', '中外名酒', '广西南宁市you柠檬酒厂', 18278880806, 'logo.png', NULL, 'abc123'),
(2, 7, 'You柠檬化妆品城', '香水彩妆', '广西南宁市化妆品城', 13878747654, 'logo.png', NULL, 'modi'),
(2, 8, 'MJ时尚店', NULL, NULL, NULL, 'logo.png', NULL, 'leoleo');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL,
  `password` char(50) NOT NULL,
  `nicheng` char(20) DEFAULT NULL,
  `really_name` char(8) DEFAULT NULL,
  `sex` int(11) DEFAULT '0',
  `year` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `mibao1` varchar(100) DEFAULT NULL,
  `mibao2` varchar(100) DEFAULT NULL,
  `power` int(11) DEFAULT '0',
  `email` char(30) DEFAULT NULL,
  `phone` bigint(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `ping_id` int(11) DEFAULT NULL,
  `gong` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`username`),
  UNIQUE KEY `username_2` (`username`),
  KEY `username` (`username`),
  KEY `address` (`address_id`),
  KEY `ping` (`ping_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nicheng`, `really_name`, `sex`, `year`, `month`, `day`, `img`, `mibao1`, `mibao2`, `power`, `email`, `phone`, `address_id`, `ping_id`, `gong`) VALUES
(1, 'liuliu', 'e10adc3949ba59abbe56e057f20f883e', 'You柠檬', '春哥', 1, 1993, 2, 14, '565431298cae9.jpg', NULL, NULL, 0, '12345678@qq.com', 18278880806, NULL, NULL, 0),
(3, 'leoleo', '2a9e2dea66aba84f5d7493e7ea6a6a20', 'Leo昂', 'leo春', 1, 1993, 10, 16, '565080c099380.jpg', '无敌', '阿三', 1, '330168885@qq.com', NULL, NULL, NULL, 0),
(4, '123456', 'e10adc3949ba59abbe56e057f20f883e', 'You柠檬', NULL, 0, NULL, NULL, NULL, 'logo.png', '小卢', '阿毛', 2, '402507265@qq.com', 18278880806, NULL, NULL, 0),
(5, 'admin', '2a9e2dea66aba84f5d7493e7ea6a6a20', 'anlage', '阿里', 1, 1995, 11, 18, 'logo.png', '小猫', '大猫', 2, '123@qq.com', 18278880806, NULL, NULL, 0),
(6, 'woheni', '2a9e2dea66aba84f5d7493e7ea6a6a20', 'You柠檬', NULL, 0, NULL, NULL, NULL, 'logo.png', '小卢', '阿毛', 2, '402507269@qq.com', 18278880806, NULL, NULL, 0),
(7, '1234567', '9cbf8a4dcb8e30682b927f352d6559a0', 'You柠檬', NULL, 0, NULL, NULL, NULL, 'logo.png', '小卢', '阿毛', 2, '402507269@qq.com', 18278880806, NULL, NULL, 0),
(8, 'abc123', '57f231b1ec41dc6641270cb09a56f897', 'You柠檬', NULL, 0, NULL, NULL, NULL, 'logo.png', '1', '阿毛', 0, '402507269@qq.com', 18278880806, NULL, NULL, 0),
(9, 'woheni1', '41cf41edf0b598c406a430d01300c1c5', 'en', NULL, 0, NULL, NULL, NULL, 'logo.png', '卢平卫', '阿毛', 0, '3301685@qq.com', 13878747654, NULL, NULL, 0),
(10, 'test', 'd41d8cd98f00b204e9800998ecf8427e', 'You柠檬', NULL, 0, NULL, NULL, NULL, 'logo.png', '小卢', '阿毛', 0, '402507269@qq.com', 13878747654, NULL, NULL, 0),
(11, 'modi', 'caacd35a900b68a8c4347d5c8564cc3d', '12', NULL, 0, NULL, NULL, NULL, 'logo.png', '小卢', '阿毛', 0, '12345678@qq.com', 18278880806, NULL, NULL, 0);

--
-- 限制导出的表
--

--
-- 限制表 `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_id` FOREIGN KEY (`address_id`) REFERENCES `user` (`user_id`);

--
-- 限制表 `gongying`
--
ALTER TABLE `gongying`
  ADD CONSTRAINT `express_id` FOREIGN KEY (`express_id`) REFERENCES `express` (`express_id`);

--
-- 限制表 `shopping`
--
ALTER TABLE `shopping`
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
