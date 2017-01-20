/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : beblog

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-09-20 15:16:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for aboutme
-- ----------------------------
DROP TABLE IF EXISTS `aboutme`;
CREATE TABLE `aboutme` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `real_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '真实姓名',
  `birthday` varchar(11) DEFAULT NULL COMMENT '生日',
  `sex` int(11) DEFAULT '0' COMMENT '性别',
  `introduce` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '自我介绍',
  `qq` int(11) DEFAULT NULL COMMENT 'qq',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `intersting` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '兴趣',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `nicheng` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `live` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aboutme
-- ----------------------------
INSERT INTO `aboutme` VALUES ('1', '刘宇', '1998-6-25', '1', '我是一个很可爱的人，我并不喜欢跟别人开玩笑。所以请不要挑战我的耐心。', '402507269', '402507269@qq.com', '唱歌，跳舞', '1473649101', '菠萝的海', '中国北京三房区');
INSERT INTO `aboutme` VALUES ('2', '琉忆', '1999-6-20', '1', '越来越觉得自己开始变得文艺起来，越来越喜欢把自己想的东西用文字所表达出来。', '330168885', '330168885@qq.com', '唱歌跳舞', '1473649121', '琉忆', '北京东城区');
INSERT INTO `aboutme` VALUES ('3', '琉忆', null, '0', '不一样的世界，总会看到不一样的风光。多读书，让自己的知识越来越丰富，让自己的路可以越来越顺畅。', '330168885', '330168885@qq.com', '唱歌', '1474285715', '花公子', '广西南宁');

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '标题',
  `sendTime` int(11) DEFAULT NULL COMMENT '发表时间',
  `user_id` int(11) DEFAULT NULL COMMENT '发表人Id',
  `perfect` int(11) DEFAULT '0' COMMENT '赞',
  `other` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL COMMENT '评论id',
  `like` int(11) DEFAULT NULL COMMENT '喜欢id',
  `content` text CHARACTER SET utf8 COMMENT '文章内容',
  `cate_id` int(11) DEFAULT NULL COMMENT '分类id',
  `sight` int(11) DEFAULT '0',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of blog
-- ----------------------------
INSERT INTO `blog` VALUES ('1', 'js代码', '1474127771', '1473649101', '2', null, null, null, '<blockquote><p>一、什么是JS？</p></blockquote><p>&nbsp; &nbsp; JS即Javascript，Javascript是一种由Netscape的LiveScript发展而来的<a target=\"_blank\" href=\"http://baike.baidu.com/view/76320.htm\">脚本语言</a>，主要目的是为了解决服务器终端语言，比如Perl，遗留的速度问题。当时服务端需要对数据进行验证，由于<a target=\"_blank\" href=\"http://baike.baidu.com/view/1065551.htm\">网络速度</a>相当缓慢,只有28.8kbps，验证步骤浪费的时间太多。于是Netscape的浏览器Navigator加入了Javascript，提供了<a target=\"_blank\" href=\"http://baike.baidu.com/view/3248821.htm\">数据验证</a>的基本功能。</p><blockquote><p>二、JS的特点</p></blockquote><p data-indent=\"0\">&nbsp; &nbsp; &nbsp; &nbsp; 能够具有<a target=\"_blank\" href=\"http://baike.baidu.com/view/4889540.htm\">交互性</a>，能够包含更多活跃的元素，就有必要在网页中嵌入其它的技术。如：Javascript、VBScript、Document Object Model（DOM，<a target=\"_blank\" href=\"http://baike.baidu.com/view/758570.htm\">文档对象模型</a>）、Layers和 Cascading Style Sheets（CSS，层叠样式表），这里主要讲Javascript。那么Javascript是什么东西？Javascript就是适应动态网页制作的需要而诞生的一种新的编程语言，如今越来越广泛地使用于Internet网页制作上。 Javascript是由 Netscape公司开发的一种<a target=\"_blank\" href=\"http://baike.baidu.com/view/76320.htm\">脚本语言</a>（scripting language），或者称为描述语言。在HTML基础上，使用Javascript可以开发交互式Web网页。Javascript的出现使得网页和用户之间实现了一种实时性的、动态的、交互性的关系，使网页包含更多活跃的元素和更加精彩的内容。 运行用Javascript编写的程序需要能支持Javascript语言的浏览器。Netscape公司 Navigator 3．0以上版本的浏览器都能支持 Javascript程序，<a target=\"_blank\" href=\"http://baike.baidu.com/view/39784.htm\">微软公司</a>Internet Explorer 3．0以上版本的浏览器基本上支持Javascript。微软公司还有自己开发的Javascript，称为JScript。 Javascript和Jscript基本上是相同的，只是在一些细节上有出入。 Javascript短小精悍， 又是在客户机上执行的，大大提高了网页的浏览速度和交互能力。 同时它又是专门为制作Web网页而量身定做的一种简单的编程语言。</p><p>JavaScript 使网页增加互动性。JavaScript 使有规律地重复的HTML文段简化，减少下载时间。JavaScript 能及时响应用户的操作，对提交<a target=\"_blank\" href=\"http://baike.baidu.com/view/296684.htm\">表单</a>做即时的检查，无需浪费时间交由 CGI 验证。JavaScript 的特点是无穷无尽的，只要你有创意。</p>', '1', '5');
INSERT INTO `blog` VALUES ('2', 'JS介绍', '1474127843', '1473649101', '2', null, null, null, '<blockquote><p>JS的介绍</p></blockquote><p data-indent=\"0\">&nbsp; &nbsp; &nbsp; &nbsp; 能够具有<a target=\"_blank\" href=\"http://baike.baidu.com/view/4889540.htm\">交互性</a>，能够包含更多活跃的元素，就有必要在网页中嵌入其它的技术。如：Javascript、VBScript、Document Object Model（DOM，<a target=\"_blank\" href=\"http://baike.baidu.com/view/758570.htm\">文档对象模型</a>）、Layers和 Cascading Style Sheets（CSS，层叠样式表），这里主要讲Javascript。那么Javascript是什么东西？Javascript就是适应动态网页制作的需要而诞生的一种新的编程语言，如今越来越广泛地使用于Internet网页制作上。 Javascript是由 Netscape公司开发的一种<a target=\"_blank\" href=\"http://baike.baidu.com/view/76320.htm\">脚本语言</a>（scripting language），或者称为描述语言。在HTML基础上，使用Javascript可以开发交互式Web网页。Javascript的出现使得网页和用户之间实现了一种实时性的、动态的、交互性的关系，使网页包含更多活跃的元素和更加精彩的内容。 运行用Javascript编写的程序需要能支持Javascript语言的浏览器。Netscape公司 Navigator 3．0以上版本的浏览器都能支持 Javascript程序，<a target=\"_blank\" href=\"http://baike.baidu.com/view/39784.htm\">微软公司</a>Internet Explorer 3．0以上版本的浏览器基本上支持Javascript。微软公司还有自己开发的Javascript，称为JScript。 Javascript和Jscript基本上是相同的，只是在一些细节上有出入。 Javascript短小精悍， 又是在客户机上执行的，大大提高了网页的浏览速度和交互能力。 同时它又是专门为制作Web网页而量身定做的一种简单的编程语言。</p><p>JavaScript 使网页增加互动性。JavaScript 使有规律地重复的HTML文段简化，减少下载时间。JavaScript 能及时响应用户的操作，对提交<a target=\"_blank\" href=\"http://baike.baidu.com/view/296684.htm\">表单</a>做即时的检查，无需浪费时间交由 CGI 验证。JavaScript 的特点是无穷无尽的，只要你有创意。</p>', '1', '24');
INSERT INTO `blog` VALUES ('3', 'PHP框架ThingkPHP框架的应用', '1474164912', '1473649101', '2', null, null, null, '<blockquote><p>一、多应用配置技巧</p></blockquote><p>&nbsp; 在Home或Admin的配置项 conf/下的config.php这样配置：</p><pre class=\"lang-php\" data-lang=\"php\"> &lt;?php\r\n\r\n  $arr = include \"./config.php\";\r\n\r\n  $arr2 = array(\r\n\r\n  //\'配置项\'=&gt;\'配置值\'\r\n\r\n  );\r\n\r\n  return array_merge($arr,$arr2);\r\n\r\n  ?&gt;</pre><p>&nbsp;在主文件夹下的当前路径下生成一个config.php文件，这样输入进行配置就可以了:<br></p><pre class=\"\">&nbsp;&lt;?php\r\n\r\n  return array(\r\n\r\n  //配置数据库连接\r\n\r\n  \'DB_TYPE\'=&gt;\'mysql\',	//设置数据库类型\r\n\r\n  \'DB_HOST\'=&gt;\'localhost\',	//设置主机\r\n\r\n  \'DB_NAME\'=&gt;\'thinkphp\',	//设置数据库名\r\n\r\n  \'DB_USER\'=&gt;\'root\',	   //设置用户名\r\n\r\n  \'DB_PWD\'=&gt;\'\', //设置密码\r\n\r\n  \'DB_PORT\'=&gt;\'3306\',      //设置端口号\r\n\r\n  \'DB_PREFIX\'=&gt;\'tp_\',        //设置表前缀\r\n\r\n  );\r\n\r\n  ?&gt;</pre><blockquote><p>二、模块分组（把前后台的公共文件夹都放在一起）</p></blockquote><blockquote><p>步骤一：在Index.php文件夹中这样设置：</p></blockquote><pre class=\"\">&lt;?php\r\n\r\n//1.确定应用名称 App\r\n\r\ndefine(\'APP_NAME\',\'App\');\r\n\r\n//2.确定应用路径\r\n\r\ndefine(\'APP_PATH\',\'./App/\');\r\n\r\n//3.开启调试模式\r\n\r\ndefine(\'APP_DEBUG\',true);\r\n\r\n//4.应用核心文件  //require是有错就不会执行后面的了 而include有错也还会继续执行下去\r\n\r\nrequire \'./ThinkPHP/ThinkPHP.php\';\r\n\r\n?&gt;</pre><blockquote><p>步骤二：然后在文件夹App下的Conf下的config.php中这样加入配置项:</p></blockquote><blockquote><p>步骤三：//这里的Home,Admin是设置对应的前后台存放文件夹，可以修改</p></blockquote><p>\'APP_GROUP_LIST\' =&gt; \'Home,Admin\', //项目分组设定</p><p>\'DEFAULT_GROUP\' &nbsp;=&gt; \'Home\', //默认分组</p><blockquote><p>步骤四：再次到App/Lib/Action中创建两个文件夹，分别为：Admin和Home</p></blockquote><p>分别存放前后台的东西</p><blockquote><p>步骤五：然后再在对应的文件夹下创建:</p></blockquote><p>IndexAction.class.php文件进行分别编辑前后台的代码</p><p>访问路径是默认的:index.php/Home/Index/index是一样的</p><blockquote><p>后台路径为：localhost/fastSearch/index.php/Admin/Index/，而前台还是默认的为localhost/fastSearch/index.php。<br></p></blockquote><blockquote><p>三、页面跳转</p></blockquote><p>（可以配置来修改跳转的页面）</p><p>1.Success和error方法都有对应的模板，并且是可以设置的，默认的设置是两个方法对应的模板都是：</p><p>//默认错误跳转对应的模板文件</p><p>\'TMPL_ACTION_ERROR\' =&gt; THINK_PATH . \'Tpl/dispatch_jump.tpl\';</p><p>//默认成功跳转对应的模板文件</p><p>\'TMPL_ACTION_SUCCESS\' =&gt; THINK_PATH . \'Tpl/dispatch_jump.tpl\';</p><p>跳转到对应的方法下：</p><pre class=\"\">$this-&gt;success(\"成功\",U(\'user/test\'));</pre><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><blockquote><p>2.redirect 重定向:</p></blockquote><p>&nbsp;后面的 array(\'cate_id\' =&gt; 2), 5, \'页面跳转中...\' 可以省略</p><p>例如：</p><p>//重定向到New模块的Category操作</p><pre class=\"\">	$this-&gt;redirect(\'New/category\', array(\'cate_id\' =&gt; 2), 5, \'页面跳转中...\');</pre><blockquote><p>四、Ajax技术</p></blockquote><p>&nbsp; 前台的代码：</p><pre class=\"lang-html\" data-lang=\"html\">&lt;script type=\"text/javascript\" src=\"/Public/Js/Jquery.js\"&gt;&lt;/script&gt;\r\n\r\n&lt;script type=\"text/javascript\"&gt;\r\n\r\n&nbsp;&nbsp;$(function(){\r\n\r\n     $(\"button\").bind(\'click\',function(){\r\n\r\n     $.get(\'/index.php/Index/getAjax\',function(jdata){\r\n\r\n   // alert(JSON.stringify(jdata));\r\n\r\n/*可以通过判断状态来输出对应数据*/\r\n\r\nif(jdata.status == 1){\r\n\r\n    // alert(jdata.data);\r\n\r\n   $(\"div#did\").html(jdata.data);\r\n\r\n  }\r\n\r\n   });\r\n \r\n   // alert(\"hello\");\r\n\r\n  });\r\n\r\n});\r\n\r\n&lt;/script&gt;\r\n</pre><p>请求的方法代码:</p><pre class=\"lang-php\" data-lang=\"php\">public function getAjax(){\r\n\r\n //$this-&gt;ajaxReturn(\'这里是我要的数据\',\'信息1\',\'状态\');\r\n\r\n    \r\n\r\n    $this-&gt;ajaxReturn(\'这里是我要的数据\',\'信息1\',1);\r\n\r\n}\r\n</pre><blockquote><p>五、需求分析和原型设计</p></blockquote><p>1.原型设计</p><p>&nbsp; &nbsp; &nbsp; &nbsp;ER图、页面样子</p><p>2.数据库设计</p><p>3.目录结构搭建</p><p>&nbsp; &nbsp; &nbsp; 文件夹结构、书写</p><blockquote><p>六、权限判断和三大自动</p></blockquote><p>// 可以通过create()方法获取数据 &nbsp;</p><p>1.自动创建方法</p><p>//这个方法很常用！</p><pre class=\"\">&nbsp;   $user=M(\'user\');\r\n\r\n    $user-&gt;create();</pre><p>2.自动验证方法</p><p>4.权限判断方法 &nbsp;控制器扩展</p><pre class=\"\">Class ExtendAction extends Action{\r\n\r\n   Public function _initialize(){\r\n\r\n   // 初始化的时候检查用户权限\r\n\r\n   $this-&gt;checkRbac();\r\n\r\n}</pre>', '2', '73');
INSERT INTO `blog` VALUES ('4', 'node源码详解（六） —— 从server.listen 到事件循环', '1474189240', '1473649121', '2', null, null, null, '<p>我们在第3-5篇博客讲了js代码如何调用到C++接口的机制，其中暗含的require、process.binding这些过程。</p><p>这篇博客以server.listen(80)为例，讲这两点：</p><ol><li><p>js代码深入、作用到libuv事件循环的过程【1.1节的问题2】</p></li><li><p>libuv事件循环本身的过程【1.1节的问题3】</p></li></ol><h3>6.1 js到事件循环 —— 数据结构</h3><h4>6.1.1事件循环的核心数据结构 —— struct uv_loop_s default_loop_struct;</h4><p>还记得2.2节的流程图吗，js代码里面执行网络io操作，最终保存一个io观察者到default_loop_struct，在node进入事件循环的时候，再获取io观察者进行监听。</p><p>来看看struct uv_loop_s 的结构体定义：</p><p><img src=\"http://dn-cnode.qbox.me/FsWcM9saTYh4pxqTpUu72UF7oAG3\" alt=\"6-1-1（3）.png\"></p><p>图6-1-1</p><p>在这篇博客里主要关系的是watcher_queue、watchers、nwatchers、nfds这四个成员。</p><p>watcher_queue：io观察者链表，链表原理看6.4节。</p><p>watchers：是一个uv__io_t 类型的二级指针。这里维护的是一个io观察者映射表【实际是以fd为下标索引的数组】。</p><p>nwatchers：watchers数组的size，因为是堆分配的动态数组，所以需要维护数组的长度。</p><p>nfds：监听了多少个fd，不同于nwatchers，因为watchers里面很多元素是空的。</p><p>【注：c语言里面经常会有 “typedef struct uv_loop_s uv_loop_t”、“typedef struct uv__io_s uv__io_t”这种写法去给结构体类型起别名，这样的好处是用uv_loop_s去定义一个变量需要加上struct，而通过typedef的别名不用，比如：</p><p>struct uv_loop_s default_loop_struct;uv_loop_t default_loop_struct;这两种写法是一样的。】</p><h4>6.1.2 io观察者结构体 —— struct uv__io_s</h4><p>6.1.1中看到，我们的网络io操作最终会封装成一个io观察者，保存到default_loop_struct的io观察者映射表——watchers 里面。</p><p>来看一下封装的io观察者的定义：</p><p><img src=\"http://dn-cnode.qbox.me/Fg9y9rWST9ogTJK6_Q-rZMCrRmzM\" alt=\"6-1-2.png\"></p><p>图6-1-2</p><p>可以看到一个io观察者封装了：</p><p>fd：文件描述符，操作系统对进程监听的网络端口、或者打开文件的一个标记</p><p>cb：回调函数，当相应的io观察者监听的事件被激活之后，被libuv事件循环调用的回调函数</p><p>events：交给libuv的事件循环（epoll_wait）进行监听的事件</p><h4>6.1.3 持有io观察者的结构体 —— 比如struct uv_tcp_s</h4><p>io观察者结构体（uv__io_s） 是我们调用server.listen()之后，与libuv事件循环的交互数据。</p><p>事件循环数据结构default_loop_struct 维护uv__io_s的映射表 —— watchers成员。</p><p>而用户的每一个io操作流程，最终也通过某个结构体来持有这个io观察者。比如当进行tcp的 io操作时，其对应的io观察者，由uv_tcp_s 结构体的 io_watcher成员持有：</p><p><img src=\"http://dn-cnode.qbox.me/FgIHnKaJALwaND73EaUWidqMTmIz\" alt=\"6-1-3.png\"></p><p>图6-1-3</p><h3>6.2 js到事件循环 —— 流程</h3><p>6.1节讲了几个结构体和数据类型。这一节以这几行示例代码，介绍从js代码的io操作到保存io观察者的流程：</p><pre class=\"\"><code style=\"font-family: Monaco, Menlo, Consolas, &quot;Courier New&quot;, monospace; font-size: 12px; color: inherit; border-radius: 3px; border: 0px; background-color: transparent;\"><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">var</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> http </span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">=</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> </span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">require</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">(</span><span class=\"str\" style=\"color: rgb(0, 136, 0);\">\'http\'</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">);</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">\r\n\r\n</span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">function</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> requestListener</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">(</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">req</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">,</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> res</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">)</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> </span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">{</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">\r\n    res</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">.</span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">end</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">(</span><span class=\"str\" style=\"color: rgb(0, 136, 0);\">\'hello world\'</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">);</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">\r\n</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">}</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">\r\n\r\n</span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">var</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> server </span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">=</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> http</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">.</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">createServer</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">(</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">requestListener</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">);</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">\r\nserver</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">.</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">listen</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">(</span><span class=\"lit\" style=\"color: rgb(0, 102, 102);\">80</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">);</span></code></pre><p>代码6-2-1</p><p>其实这里http模块里面做的事情很简单，6-2-1示例代码等效于：</p><pre class=\"\"><code style=\"font-family: Monaco, Menlo, Consolas, &quot;Courier New&quot;, monospace; font-size: 12px; color: inherit; border-radius: 3px; border: 0px; background-color: transparent;\"><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">const</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> </span><span class=\"typ\" style=\"color: rgb(102, 0, 102);\">Server</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> </span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">=</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> </span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">require</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">(</span><span class=\"str\" style=\"color: rgb(0, 136, 0);\">\'_http_server\'</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">).</span><span class=\"typ\" style=\"color: rgb(102, 0, 102);\">Server</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">;</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">\r\n\r\n</span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">function</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> requestListener</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">(</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">req</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">,</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> res</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">)</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> </span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">{</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">\r\n    res</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">.</span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">end</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">(</span><span class=\"str\" style=\"color: rgb(0, 136, 0);\">\'hello world\'</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">);</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">\r\n</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">}</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">\r\n\r\n</span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">var</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> server </span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">=</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> </span><span class=\"kwd\" style=\"color: rgb(0, 0, 136);\">new</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\"> </span><span class=\"typ\" style=\"color: rgb(102, 0, 102);\">Server</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">(</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">requestListener</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">);</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">\r\nserver</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">.</span><span class=\"pln\" style=\"color: rgb(0, 0, 0);\">listen</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">(</span><span class=\"lit\" style=\"color: rgb(0, 102, 102);\">80</span><span class=\"pun\" style=\"color: rgb(102, 102, 0);\">);</span></code></pre><p>代码6-2-2</p><p>面向用户的接口仅仅是一个requestListener回调函数、监听端口，那么调用server.listen(80)之后，经过多少个环节才形成一个io观察者？io观察者的回调函数被调用之后，又经过多少个环节才回调到用户的requestListener？</p><p>来看下有多少层：</p><h4>6.2.1 http层Server类 —— lib/_http_server.js</h4><p>上述示例代码直接交互的是http Server类，看代码：</p><p><img src=\"http://dn-cnode.qbox.me/Fnuh7Xi0feqcXePRHuF5YpZfRtr8\" alt=\"6-2-1 (2).png\"></p><p>图6-2-1</p><p>A. 设置环节 —— requestListener</p><p>当用户new Server产生一个server对象时，server添加’request’事件监听器。</p><p>B. 回调环节 —— connectionListener</p><p>可以看到http层的Server类继承了socket层（net.js）的Server类。并添加’connection’事件监听器，当有连接到来时，由socket层的Server类发射’connection’事件，http层connectionListener被调用，拿到来自socket层的一个socket对象，进行跟http协议相关的处理，把http请求相关的数据封装成req、res两个对象，emit \'request’事件，把req、res传给用户的requestListener回调函数。</p>', '3', '2');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `caid` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '分类',
  `user_id` int(11) DEFAULT NULL COMMENT '所属分类人',
  PRIMARY KEY (`caid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'JavaScript笔记', '1473649101');
INSERT INTO `category` VALUES ('2', 'PHP笔记', '1473649101');
INSERT INTO `category` VALUES ('3', 'node.js', '1473649121');
INSERT INTO `category` VALUES ('4', 'thikphp', '1473649121');
INSERT INTO `category` VALUES ('5', 'codeIgniter', '1473649121');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '评论内容',
  `cwho` int(11) DEFAULT NULL COMMENT '谁评论的id',
  `arc_id` int(11) DEFAULT NULL COMMENT '文章的id',
  `sendTime` int(11) DEFAULT NULL COMMENT '发表时间',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('2', '你好美美美', '1473649101', '3', '1473649101');
INSERT INTO `comment` VALUES ('4', '写的挺好的，说实话。', '1473649101', '2', '1474262940');
INSERT INTO `comment` VALUES ('5', '我觉得这个博文写的真好，好赞。', '1473649101', '3', '1474264039');

-- ----------------------------
-- Table structure for fans
-- ----------------------------
DROP TABLE IF EXISTS `fans`;
CREATE TABLE `fans` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '我的id',
  `fans_id` int(11) DEFAULT NULL COMMENT '粉丝id',
  `fansto` int(11) DEFAULT '0' COMMENT '粉丝对你',
  `tofans` int(11) DEFAULT '0' COMMENT '你对粉丝',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fans
-- ----------------------------
INSERT INTO `fans` VALUES ('3', '1473649101', '1473649121', '0', '1');
INSERT INTO `fans` VALUES ('8', '1473649121', '1473649101', '0', '1');
INSERT INTO `fans` VALUES ('9', '1474285715', '1473649101', '0', '1');
INSERT INTO `fans` VALUES ('10', null, '1473649101', '0', '1');

-- ----------------------------
-- Table structure for introduce
-- ----------------------------
DROP TABLE IF EXISTS `introduce`;
CREATE TABLE `introduce` (
  `blid` int(11) NOT NULL AUTO_INCREMENT,
  `blogTitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '博客标题',
  `blogIntroduce` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '博客介绍',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `arcimg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`blid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of introduce
-- ----------------------------
INSERT INTO `introduce` VALUES ('5', '萌主一枚', '开始觉得自己越来越萌萌哒了。好可爱呀，卖个萌好啊。', '1473649101', '57dc1122b1062.png');
INSERT INTO `introduce` VALUES ('6', '琉忆光年', '仿佛穿过那个长廊就能够到达彼岸。谁都不会知道那条路会有多远。', '1473649121', '57de541f73e72.jpg');
INSERT INTO `introduce` VALUES ('7', '花少年', '程序员的世界总是多彩的，自己喜欢写一些博客类的文章，喜欢去尝试弄一些小东西出来。或许这就是我的乐趣吧。', '1474285715', '57dfd1e150f3d.jpg');

-- ----------------------------
-- Table structure for like
-- ----------------------------
DROP TABLE IF EXISTS `like`;
CREATE TABLE `like` (
  `likeId` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '喜欢人id',
  `arc_id` int(11) DEFAULT NULL COMMENT '文章id',
  PRIMARY KEY (`likeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of like
-- ----------------------------

-- ----------------------------
-- Table structure for messageboard
-- ----------------------------
DROP TABLE IF EXISTS `messageboard`;
CREATE TABLE `messageboard` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '留言内容',
  `sendTime` int(11) DEFAULT NULL COMMENT '留言时间',
  `mwho` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '留言人',
  `person_id` int(11) DEFAULT NULL COMMENT '访问人id',
  `me_id` int(11) DEFAULT NULL COMMENT '博主id',
  `bm_id` int(11) DEFAULT NULL COMMENT '对应留言的id',
  `bo_id` int(11) DEFAULT NULL COMMENT '回复最原先的博主id',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of messageboard
-- ----------------------------
INSERT INTO `messageboard` VALUES ('6', '到此一游，发现这里挺有趣的。嘿嘿~~', '1474177681', null, '1473649101', '1473649101', null, null);
INSERT INTO `messageboard` VALUES ('7', '琉忆来这里踩踩，发现博主还是很多好文章的啊。', '1474189992', null, '1473649121', '1473649101', null, null);
INSERT INTO `messageboard` VALUES ('8', '快乐的发的拉风的三分', '1474202926', null, '1473649121', '1473649101', null, null);
INSERT INTO `messageboard` VALUES ('9', '附近的拉萨分类的撒娇分类电视剧奥拉夫', '1474202936', null, '1473649121', '1473649101', null, null);
INSERT INTO `messageboard` VALUES ('10', '你好啊。。', '1474203169', null, '1473649121', '1473649101', null, null);
INSERT INTO `messageboard` VALUES ('14', '感谢大家的来访哦~~', '1474264470', null, '1473649101', null, null, '1473649101');
INSERT INTO `messageboard` VALUES ('15', '感谢大家的来访哦....', '1474264484', null, '1473649101', null, null, '1473649101');
INSERT INTO `messageboard` VALUES ('16', 'fdaf', '1474264530', null, '1473649101', null, null, '1473649101');

-- ----------------------------
-- Table structure for perfect
-- ----------------------------
DROP TABLE IF EXISTS `perfect`;
CREATE TABLE `perfect` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `zan` int(11) DEFAULT '0' COMMENT '赞',
  `lid` int(11) DEFAULT NULL COMMENT '文章id',
  `who` int(11) DEFAULT NULL COMMENT '谁赞的id',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perfect
-- ----------------------------
INSERT INTO `perfect` VALUES ('5', '1', '4', '1473649101');
INSERT INTO `perfect` VALUES ('6', '1', '3', '1473649101');
INSERT INTO `perfect` VALUES ('7', '1', '2', '1473649101');
INSERT INTO `perfect` VALUES ('8', '1', '1', '1473649101');

-- ----------------------------
-- Table structure for userlist
-- ----------------------------
DROP TABLE IF EXISTS `userlist`;
CREATE TABLE `userlist` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(25) CHARACTER SET utf8 NOT NULL,
  `upass` varchar(255) NOT NULL,
  `templet` varchar(255) DEFAULT '0' COMMENT '博客模板',
  `idnumber` int(11) NOT NULL COMMENT '用户id编号',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `isOne` int(11) DEFAULT '0' COMMENT '第一次登陆',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of userlist
-- ----------------------------
INSERT INTO `userlist` VALUES ('20', 'admins', '14e1b600b1fd579f47433b88e8d85291', '0', '1473649101', '402507269@qq.com', '0');
INSERT INTO `userlist` VALUES ('21', 'admin1', '14e1b600b1fd579f47433b88e8d85291', '0', '1473649121', '402507269@qq.com', '0');
INSERT INTO `userlist` VALUES ('22', '123456', '14e1b600b1fd579f47433b88e8d85291', '0', '1474285715', '330168885@qq.com', '0');

-- ----------------------------
-- Table structure for visit
-- ----------------------------
DROP TABLE IF EXISTS `visit`;
CREATE TABLE `visit` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bwho` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '访问人',
  `btime` int(11) DEFAULT NULL COMMENT '时间',
  `user_id` int(11) DEFAULT NULL COMMENT '自己的id',
  `me_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of visit
-- ----------------------------

-- ----------------------------
-- Table structure for xinxi
-- ----------------------------
DROP TABLE IF EXISTS `xinxi`;
CREATE TABLE `xinxi` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `swho` int(11) DEFAULT NULL COMMENT '谁发的消息',
  `twho` int(11) DEFAULT NULL COMMENT '给谁',
  `xinxi` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '消息',
  `sendTime` int(11) DEFAULT NULL COMMENT '发生时间',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of xinxi
-- ----------------------------

-- ----------------------------
-- View structure for blog_article
-- ----------------------------
DROP VIEW IF EXISTS `blog_article`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `blog_article` AS select b.* ,i.arcimg,a.nicheng from blog_cate b,introduce i ,aboutme a where b.user_id = a.user_id and i.user_id = b.user_id ;

-- ----------------------------
-- View structure for blog_cate
-- ----------------------------
DROP VIEW IF EXISTS `blog_cate`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `blog_cate` AS SELECT
	b.*, c.category
FROM
	blog b,
	category c
WHERE
	b.cate_id = c.caid ;

-- ----------------------------
-- View structure for blog_comment
-- ----------------------------
DROP VIEW IF EXISTS `blog_comment`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `blog_comment` AS SELECT
	b.lid, c.*, a.nicheng,
	i.arcimg
FROM
	blog b,
	COMMENT c,
	aboutme a,
	introduce i
WHERE
	b.lid = c.arc_id 
AND
	c.cwho = a.user_id
And 
	c.cwho = i.user_id ;

-- ----------------------------
-- View structure for blog_xinxi
-- ----------------------------
DROP VIEW IF EXISTS `blog_xinxi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `blog_xinxi` AS select m.cid,m.nicheng,m.comment,m.cwho,m.arc_id,m.arcimg,b.* from blog_comment m,blog b where b.lid = m.lid ;

-- ----------------------------
-- View structure for blog_zan
-- ----------------------------
DROP VIEW IF EXISTS `blog_zan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `blog_zan` AS select b.*,p.zan,p.who from blog_article b,perfect p where p.lid = b.lid ;

-- ----------------------------
-- View structure for fans_fans
-- ----------------------------
DROP VIEW IF EXISTS `fans_fans`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `fans_fans` AS SELECT
	a.nicheng,
	a.live,
	a.introduce,
	a.sex,
	i.arcimg,
	f.*
FROM
	aboutme a,
	introduce i,
	fans f
WHERE
	f.user_id = a.user_id
AND i.user_id = f.user_id ;

-- ----------------------------
-- View structure for fans_user
-- ----------------------------
DROP VIEW IF EXISTS `fans_user`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `fans_user` AS SELECT
	a.nicheng,
	a.live,
	a.introduce,
	a.sex,
	i.arcimg,
	f.*
FROM
	aboutme a,
	introduce i,
	fans f
WHERE
	f.fans_id = a.user_id
AND i.user_id = f.fans_id ;

-- ----------------------------
-- View structure for message_intro
-- ----------------------------
DROP VIEW IF EXISTS `message_intro`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `message_intro` AS select m.* ,i.arcimg,a.nicheng from messageboard m,introduce i,aboutme a where m.person_id = i.user_id and m.person_id = a.user_id ;

-- ----------------------------
-- View structure for user_about
-- ----------------------------
DROP VIEW IF EXISTS `user_about`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `user_about` AS select u.*,a.nicheng from userlist u,aboutme a where u.idnumber = a.user_id ;

-- ----------------------------
-- View structure for user_list
-- ----------------------------
DROP VIEW IF EXISTS `user_list`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `user_list` AS select i.blid,i.arcimg,a.nicheng,a.user_id from introduce i ,aboutme a where a.user_id = i.user_id ;
