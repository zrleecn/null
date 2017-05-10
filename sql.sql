-- 商品分类表
DROP TABLE IF EXISTS `category`;
create table if not exists category (
  cat_id int unsigned primary key auto_increment,
  cat_name VARCHAR (40) not null,
  paraent_id int unsigned not null comment '父分类id',
  cat_thumb VARCHAR (100) not NULL comment '分类图片'
)charset=utf8;

-- 测试数据
INSERT INTO category VALUES (1,'书籍',0,'');
INSERT INTO category VALUES (2,'交通工具',0,'');
INSERT INTO category VALUES (3,'乐器',0,'');
INSERT INTO category VALUES (4,'体育运动',0,'');
INSERT INTO category VALUES (5,'电子产品',0,'');
INSERT INTO category VALUES (6,'宿舍家居',0,'');
INSERT INTO category VALUES (7,'户外用品',0,'');
INSERT INTO category VALUES (8,'办公用品',0,'');
INSERT INTO category VALUES (9,'玩具',0,'');
INSERT INTO category VALUES (10,'宠物',0,'');
INSERT INTO category VALUES (11,'服饰',0,'');
INSERT INTO category VALUES (12,'植物',0,'');
INSERT INTO category VALUES (13,'其他',0,'');


-- 商品表
DROP TABLE IF EXISTS `goods`;
CREATE TABLE goods(
  goods_id INT unsigned PRIMARY KEY auto_increment,
  cat_id INT unsigned comment '商品所属分类指向category表的一条记录',
  goods_name VARCHAR (30) NOT NULL ,
  shop_price DECIMAL(10,2) NOT NULL DEFAULT 0.0  comment '本店价格',
  old_price DECIMAL (10,2) NOT NULL DEFAULT 0.0 comment '原价',
  goods_number INT unsigned DEFAULT 0 comment '商品货存',
  ori_image VARCHAR (100) comment '原始图片路径' ,
  thumb_image VARCHAR (100) comment'缩略图路径',
  goods_desc text comment '商品描述',
  is_best tinyint DEFAULT 0 comment '精品',
  is_new tinyint DEFAULT 0 comment '新品',
  is_on_sale tinyint DEFAULT 1 comment '上架',
  is_hot tinyint unsigned DEFAULT 0 comment '热销',
  click_num int unsigned DEFAULT 0 comment '点击量',
  collect_num int unsigned DEFAULT 0 comment '收藏数量',
  `public_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发布时间'
  )charset=utf8;

  -- 测试数据

  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc ,is_hot ,collect_num) VALUES ( 1,3,'吉他 手感好',200.00,380.00,'','images/gitar.jpg','8成新',0,0);
  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc,is_hot ,collect_num) VALUES ( 2,13,'广油水卡',3.00,10.00,'','images/water_car.jpg','',1,0);
  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc,is_hot ,collect_num) VALUES ( 3,1,'六级英语通关',18,32.00,'','images/four.jpg','',1,1);
  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc,is_hot ,collect_num) VALUES ( 4,5,'电脑有线键盘',7,22.00,'','images/keybord.jpg','',1,0);
  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc,is_hot ,collect_num) VALUES ( 5,4,'哑铃',60,100,'','images/yaling.jpg','',1,0);
  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc,is_hot ,collect_num) VALUES ( 6,6,'USB迷你风扇',12,30,'','images/fans.jpg','',0,0);
  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc,is_hot ,collect_num) VALUES ( 7,1,'无机化学与分析',8,20,'','images/huaxue.jpg','',0,0);
  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc,is_hot ,collect_num) VALUES ( 8,2,'山地车',230,300,'','images/xixingche.jpg','',1,1);
  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc,is_hot ,collect_num) VALUES ( 9,4,'乒乓球3个',1,3,'','images/ping.jpg','',1,1);
  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc,is_hot ,collect_num) VALUES ( 10,13,'vr眼镜',40,80,'','images/vr.jpg','',1,1);
  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc,is_hot ,collect_num) VALUES ( 11,1,'四级网工',5,18,'','images/xitong.jpg','',1 ,0);
  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc,is_hot ,collect_num) VALUES ( 12,6,'迷你pooth台灯',3,13,'','images/booth.jpg','',1,1);
  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc,is_hot ,collect_num) VALUES ( 13,9,'变形金刚',50,0,'','images/king.jpg','',0,1);
  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc,is_hot ,collect_num) VALUES ( 14,9,'测试',50,0,'','images/king.jpg','',0 ,0);
  INSERT INTO goods (goods_id, cat_id, goods_name,shop_price,old_price, ori_image, thumb_image, goods_desc,is_hot ,collect_num) VALUES ( 15,4,'滑轮鞋',100,200,'','images/hualun.jpg','',1 ,0);

-- 用户表
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` INT unsigned PRIMARY KEY auto_increment,
  `user_name` varchar(50) NOT NULL ,
  `tel_phone` char(11) NOT NULL,
  `sex` char(1) DEFAULT NULL default '1',
  `password` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `register_time` INT unsigned comment '注册时间',
  last_login int unsigned comment  '上次登录时间',
	last_ip  int unsigned comment '上次登录ip',
  `collection_goods_id` VARCHAR(200) comment '收藏商品的id',
  `public_goods_id` VARCHAR(200) comment '已经发布的商品的id',
  `saled_goods_id` VARCHAR(100) comment '已经卖出去的商品的id',
  `bought_goods_id` VARCHAR(100) comment '已经买入的商品的id',
  `is_active` char(1) DEFAULT 1 comment '是否激活 开始先不用激活吧',
  `school_name` VARCHAR (100) DEFAULT '' comment '学校名称',
  `qq_number`  VARCHAR (11) DEFAULT  '' ,
  `wechat`   VARCHAR (30) DEFAULT '' comment '微信',
  `address` VARCHAR (50) DEFAULT '' comment '地址',
  `head_portrait` varchar(200) DEFAULT 'images/default_head.png',
  `order_goods_id` VARCHAR(100) comment '订单商品的id')charset=utf8;

-- test data
INSERT INTO user (user_id,user_name,password,register_time,public_goods_id,collection_goods_id,is_active,email,tel_phone,qq_number,wechat,school_name ,head_portrait) VALUES (1,'zrlee','8f0f50d0cb6bef82dfd8ceafc4a12be4',1493397579,'8,9,10,11,12,13,15','8,9,12,13,15',1,'13005564315@163.com','13005564315','45418406','zrlee_cn','XXX大学','images/admin.png');
INSERT INTO user (user_id,user_name,password,register_time,public_goods_id,collection_goods_id,is_active,email,tel_phone,qq_number,wechat,school_name,head_portrait) VALUES (3,'admin','8f0f50d0cb6bef82dfd8ceafc4a12be4',1493397579,'8,9,10,11,12,13,15','8,9,12,13,15',1,'13005564315@163.com','13005564315','45418406','zrlee_cn','XXX大学','images/admin.png');
INSERT INTO user (user_id,user_name,password,register_time,public_goods_id,collection_goods_id,is_active,email,tel_phone,qq_number,wechat,school_name) VALUES (2,'sweetencounter','8f0f50d0cb6bef82dfd8ceafc4a12be4',1493397579,'1,2,3,4,5,6,7','8,9,10,11,12,13',1,'1316356119@qq.com','13005564315','45418406','zrlee_cn','XXX大学');
INSERT INTO user (user_id,user_name,password,register_time,public_goods_id,collection_goods_id,is_active,email,tel_phone,qq_number,wechat,school_name) VALUES (4,'test','8f0f50d0cb6bef82dfd8ceafc4a12be4',1493397579,'','',1,'1316356119@qq.com','13005564315','45418406','zrlee_cn','广东石油化工学院');


-- 评论
DROP TABLE IF EXISTS `comment`;
create table if not exists `comment` (
  comment_id int unsigned primary key auto_increment,
  comment_content VARCHAR (150) not null,
  sort_id int unsigned not null comment '父评论id',
 `public_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发布时间',
 `user_id` INT unsigned ,
 `user_name` VARCHAR (40) NOT NULL DEFAULT '游客',
 goods_id int unsigned
)charset=utf8;
-- 测试数据
INSERT INTO `comment` (comment_id ,comment_content,sort_id ,`user_name` ,goods_id) VALUE (1,'万花筒写轮眼是逃不掉的',0,'宇智波鼬',8 );
INSERT INTO `comment` (comment_id ,comment_content,sort_id ,`user_name`,goods_id) VALUE (2,'千年杀',1,'旗木卡卡西',8 );
INSERT INTO `comment` (comment_id ,comment_content,sort_id ,`user_name`,goods_id) VALUE (3,'再厉害的忍者也会被我的忍术击飞',0,'漩涡鸣人',8 );
INSERT INTO `comment` (comment_id ,comment_content,sort_id ,`user_name`,goods_id) VALUE (4,'艺术就是爆炸',0,'迪达拉',8 );
INSERT INTO `comment` (comment_id ,comment_content,sort_id ,`user_name`,goods_id) VALUE (5,'神的旨意消灭你',4,'小南',8 );
INSERT INTO `comment` (comment_id ,comment_content,sort_id ,`user_name`,goods_id) VALUE (6,'小南咱们去泡温泉吧',5,'好色仙人',8 );
-- INSERT INTO `comment` VALUES ('1', '万花筒写轮眼是逃不掉的', '0', '2017-05-02 00:57:38', null, '宇智波鼬', '8');
-- INSERT INTO `comment` VALUES ('2', '千年杀', '1', '2017-05-02 00:57:38', null, '旗木卡卡西', '8');
-- INSERT INTO `comment` VALUES ('3', '再厉害的忍者也会被我的忍术击飞', '0', '2017-05-02 00:57:38', null, '漩涡鸣人', '8');
-- INSERT INTO `comment` VALUES ('4', '艺术就是爆炸', '0', '2017-05-02 00:57:38', null, '迪达拉', '8');
-- INSERT INTO `comment` VALUES ('5', '神的旨意干掉你', '4', '2017-05-02 00:57:38', null, '小南', '8');
-- INSERT INTO `comment` VALUES ('6', '咱们去泡温泉吧', '4', '2017-05-02 00:57:38', null, '好色仙人', '8');
-- INSERT INTO `comment` VALUES ('21', '评论一下\n', '0', '2017-05-02 00:58:17', null, '游客', '12');
-- INSERT INTO `comment` VALUES ('22', '回复你', '21', '2017-05-02 00:58:31', null, '游客', '12');
-- INSERT INTO `comment` VALUES ('23', '艺术就是爆炸', '0', '2017-05-02 00:59:26', null, '游客', '11');
-- INSERT INTO `comment` VALUES ('24', '你就是迪达拉？', '23', '2017-05-02 00:59:42', null, '游客', '11');
-- INSERT INTO `comment` VALUES ('25', '抢先评论', '0', '2017-05-02 01:00:51', '1', 'zrlee', '9');
-- INSERT INTO `comment` VALUES ('26', '再来一个', '0', '2017-05-02 01:01:07', '1', 'zrlee', '9');
