/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : yii

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-01-23 14:23:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ht_admin
-- ----------------------------
DROP TABLE IF EXISTS `ht_admin`;
CREATE TABLE `ht_admin` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ht_admin
-- ----------------------------
INSERT INTO `ht_admin` VALUES ('3', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for ht_article
-- ----------------------------
DROP TABLE IF EXISTS `ht_article`;
CREATE TABLE `ht_article` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `content` text,
  `type` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ht_article
-- ----------------------------
INSERT INTO `ht_article` VALUES ('4', '达到', '1485090763', 'img_1485090763770.jpg', '<p>范德萨发大撒范德萨</p>', '0', '1', '发放');
INSERT INTO `ht_article` VALUES ('5', '长期的', '1485137893', 'img_1485137892905.jpg', '<p>很好的故事</p>', '', '1', '范德萨范德萨');
INSERT INTO `ht_article` VALUES ('6', '这个美好的世界哦', '1485138309', 'img_1485138309260.jpg', '<p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; text-indent: 28px; font-size: 14px; text-align: justify; word-wrap: break-word; word-break: normal; color: rgb(43, 43, 43); font-family: simsun, arial, helvetica, clean, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">1月22日，崔永元在大连举办的食品安全恳谈会上再谈转基因，他更直言自己对主持人行业恨到了一定程度，“我的出场费每一次至少是100万，我只要露一次面就是100万，我要挣钱非常容易，但我从来没挣过这种商业活动的钱”。</p><p style=\"margin-top: 0px; margin-bottom: 25px; padding: 0px; text-indent: 28px; font-size: 14px; text-align: justify; word-wrap: break-word; word-break: normal; color: rgb(43, 43, 43); font-family: simsun, arial, helvetica, clean, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">他表示自己做一档好节目或者不做，对大家的生活没有太大影响，但如果大家吃不安全的食品，这个影响就太大了。</p><p><br/></p>', '0', '4', '1月22日，崔永元在大连举办的食品安全恳谈会上再谈转基因，他更直言自己对主持人行业恨到了一定程度，“我的出场费每一次至少是100万，我只要露一次面就是100万，我要挣钱非常容易，但我从来没挣过这种商业');
INSERT INTO `ht_article` VALUES ('7', '美丽的！！', '1485138410', 'img_1485138410880.jpg', '<p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">请允许我想象，你收到这封信时的情形。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">我更愿意那是在一个夕光散漫的黄昏，晚霞像垂落的红纱巾，欲露还掩地遮着天空的半张脸。寒水长天，飞鸟缓缓振翅，远山如墨染。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">也或者，是在一个诗意漫漶的清晨。你指尖微凉，信笺来时，像是长风卷扬昨夜新雪，落于你眼睫之上。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">我不曾扳着指头算，这封信抵达时的日期。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">如果是在古时驿站，无须快马加鞭，且让它缓慢流转，牛皮纸在口袋里卷起毛边。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">这样最好。信握在你手里时，才会是柔软熟悉的温腻。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">我敢不敢寄你一张空白信纸，再想象你的皱眉叹气？</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">也或者，夏时蔷薇冬时梅，一叶枯枝染了邮路，蜿蜒异香。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">真的，我只是想写信告诉你，窗台上的花又开了一朵。或者，此时天阴着，我在等风来、等雪落。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">是的，每次邮递员来时，若我与他碰面，定然发自深心地微笑。他大大的帆布口袋，总能让我闻见纸墨香。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">我曾有过那么多的梦想。其中之一，就是做个邮差啊，我有无告诉过你？</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">这多好——去传递轻薄而又厚重的诉说、惦念，与相爱。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">我想踩着单车，后车架上绑缚了绿色的帆布口袋。春时，我会路过开满草花的小巷，杨柳枝吐新芽，一日一番模样，空气中有潮湿的泥土香。春天在我眼中，是无数次跟你形容过的，鲜嫩嫩的黄。夏至时，我定将脚踏车踩得飞快，从树木繁茂的街道经过。树与树牵着手，挨着头，在风中细语轻声，树荫下流落的清风，裹缠着我的小腿，丝绸般微凉清爽。秋了，秋日在我眼中是金黄金黄的，大片银杏叶倏然掉落。秋云绵软，碧蓝高天悠远。我会按响脆亮铃声，等那位长发姑娘来取回她的情书。有时候她会折一束自家院里的花草相赠，轻轻放进我的车前筐，我只微笑，不说谢。冬天来时，有薄雪侵袭街边长椅。我无数次地想象过，在原木色长椅的不显眼处，是不是刻着两个并排依偎的名字？若没有，便让我悄悄地刻下，我和你。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">虽然现在的通讯便捷，但我仍旧偏爱铺开一张信纸的静好时光。我想从你流转的墨迹中，用心读出你真实的悲喜。我的指尖，将温存地停留在你的指尖刚刚逗留的地方。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">这封信，捉笔之前我一定托腮望着窗外，发了很久的呆。这时候我想跟你说，放空自己。真的，放空自己很重要，将脑子腾空，再置换出清缓安宁的喜欢。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">晴朗的日子里，我会手洗衣裳，温热的清水冲洗出一室皂香。晾晒冬衣，在日光西斜之前，嗅着白棉晒暖之后蒸发出的温煦，刚好看完一部你上次说给我的，黑白默片老电影。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">如果刚好落雪，我不温酒，只煮茶，看茶叶在透明的杯子里浮沉。北风啸叫，雪花朵朵，路过玻璃窗。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">假如我是一粒雪花，多好，我将停留在你窗前。任它多野的风，也无法裹挟了我离去，即使隔了一层玻璃窗，屋内外气流冲撞。我会化作你鼻翼酸热时落下的那滴泪啊！</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">当我融雪成水，且让我为你冲茶一杯。与你唇齿辗转，即使再生天涯。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">或者，阴天欲雨的午后，我刚刚读完一本书，请让我讲给你听。雨滴溅落的声音，恰好是乐声轻奏。格子碎花纯棉布，随手拧亮的橘色灯底，安适得让人昏昏欲睡。</p><p style=\"margin-top: 0px; margin-bottom: 14px; padding: 0px; outline: none; line-height: 24px; letter-spacing: 1px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft JhengHei&quot;, 微軟正黑體, &quot;Microsoft YaHei&quot;, &quot;Segoe UI&quot;, Trebuchet, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Lucida Sans&quot;, Arial; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">光阴静好，别无他事。我只是想写一封信给你，告诉你此时晴天，或是落雪。</p><p>！！</p>', '1', '3', '我更愿意那是在一个夕光散漫的黄昏，晚霞像垂落的红纱巾，欲露还掩地遮着天空的半张脸。寒水长天，飞鸟缓缓振翅，远山如墨染。啊');

-- ----------------------------
-- Table structure for ht_category
-- ----------------------------
DROP TABLE IF EXISTS `ht_category`;
CREATE TABLE `ht_category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ht_category
-- ----------------------------
INSERT INTO `ht_category` VALUES ('1', '热门');
INSERT INTO `ht_category` VALUES ('2', '置顶');
INSERT INTO `ht_category` VALUES ('3', '情感');
INSERT INTO `ht_category` VALUES ('4', '其他');
