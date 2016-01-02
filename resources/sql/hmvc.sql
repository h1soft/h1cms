# Host: localhost  (Version: 5.5.40)
# Date: 2016-01-02 18:07:40
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "hmvc_group_permissions"
#

DROP TABLE IF EXISTS `hmvc_group_permissions`;
CREATE TABLE `hmvc_group_permissions` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(255) NOT NULL DEFAULT '',
  `permission_type` enum('yes','no') DEFAULT 'yes',
  `group_id` int(10) NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `permission_name` (`permission_name`,`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "hmvc_group_permissions"
#

/*!40000 ALTER TABLE `hmvc_group_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `hmvc_group_permissions` ENABLE KEYS */;

#
# Structure for table "hmvc_setting"
#

DROP TABLE IF EXISTS `hmvc_setting`;
CREATE TABLE `hmvc_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(32) NOT NULL,
  `key` varchar(64) NOT NULL,
  `value` text NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `options` text,
  `htmltype` enum('text','textarea','checkbox','radio','select') DEFAULT 'text',
  `sort_order` int(11) DEFAULT '0',
  `serialized` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`setting_id`),
  KEY `group` (`group`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

#
# Data for table "hmvc_setting"
#

/*!40000 ALTER TABLE `hmvc_setting` DISABLE KEYS */;
INSERT INTO `hmvc_setting` VALUES (2,'system','webmaster_email','support@getssl.cn','管理员邮箱',NULL,'text',0,0),(7,'website','address','上海市闵行区七宝','地址',NULL,'text',0,0),(8,'website','email','cs@hmvc.cn','邮箱',NULL,'text',0,0),(9,'website','telephone','15216688667','电话',NULL,'text',0,0),(10,'website','fax','','传真',NULL,'text',0,0),(11,'website','meta_tag_keywords','PHP5.3 开发框架','Keywords',NULL,'text',0,0),(12,'website','meta_tag_description','php5.3开发框架','网站描述',NULL,'text',0,0),(21,'mail','mail_protocol','smtp','邮件协议','{\"mail\":\"Mail\",\"smtp\":\"Smtp\",\"sendmail\":\"Sendmail\"}','radio',0,0),(22,'mail','smtp_host','127.0.0.1','服务器',NULL,'text',0,0),(23,'mail','smtp_username','root','用户名',NULL,'text',0,0),(24,'mail','smtp_password','123456','密码',NULL,'text',0,0),(25,'mail','smtp_port','','端口','','text',5,0),(26,'mail','smtp_timeout','10','超时时间',NULL,'text',6,0),(30,'website','site_title','HMVC','网站名称',NULL,'text',0,0),(32,'website','icp','沪ICP备1110000000号','ICP备案号',NULL,'text',0,0),(34,'website','analytics','<script type=\"text/javascript\">\r\nvar _bdhmProtocol = ((\"https:\" == document.location.protocol) ? \" https://\" : \" http://\");\r\ndocument.write(unescape(\"%3Cscript src=\'\" + _bdhmProtocol + \"hm.baidu.com/h.js%3F88ae17aaa4acceaf03c67276ac95844a\' type=\'text/javascript\'%3E%3C/script%3E\"));\r\n</script>','统计代码',NULL,'textarea',0,0),(35,'_sys_settingtabs','mail','Mail',NULL,NULL,'text',3,0),(36,'_sys_settingtabs','system','系统设置',NULL,NULL,'text',0,0),(37,'_sys_settingtabs','website','网站设置',NULL,NULL,'text',2,0),(39,'mail','mail_connect','ssl','连接方式','{\"no\":\"无加密\",\"ssl\":\"SSL\",\"tls\":\"TLS\"}','radio',4,0);
/*!40000 ALTER TABLE `hmvc_setting` ENABLE KEYS */;

#
# Structure for table "hmvc_user_permissions"
#

DROP TABLE IF EXISTS `hmvc_user_permissions`;
CREATE TABLE `hmvc_user_permissions` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(255) NOT NULL DEFAULT '',
  `permission_type` enum('yes','no') DEFAULT 'yes',
  `userid` int(10) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "hmvc_user_permissions"
#

/*!40000 ALTER TABLE `hmvc_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `hmvc_user_permissions` ENABLE KEYS */;

#
# Structure for table "hmvc_usergroups"
#

DROP TABLE IF EXISTS `hmvc_usergroups`;
CREATE TABLE `hmvc_usergroups` (
  `group_id` int(10) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "hmvc_usergroups"
#

/*!40000 ALTER TABLE `hmvc_usergroups` DISABLE KEYS */;
INSERT INTO `hmvc_usergroups` VALUES (2,'Administrator','Supper User Group',1451488855),(8,'Staff','',1451575697),(9,'Guest','',1451575742);
/*!40000 ALTER TABLE `hmvc_usergroups` ENABLE KEYS */;

#
# Structure for table "hmvc_users"
#

DROP TABLE IF EXISTS `hmvc_users`;
CREATE TABLE `hmvc_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `group_id` int(10) NOT NULL,
  `email` varchar(256) NOT NULL DEFAULT '',
  `password` varchar(256) NOT NULL DEFAULT '',
  `fullname` varchar(255) DEFAULT NULL,
  `sex` enum('male','female') DEFAULT 'male',
  `description` varchar(255) DEFAULT NULL,
  `created_at` int(10) DEFAULT NULL,
  `last_login` int(10) DEFAULT NULL,
  `last_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "hmvc_users"
#

/*!40000 ALTER TABLE `hmvc_users` DISABLE KEYS */;
INSERT INTO `hmvc_users` VALUES (1,2,'support@getssl.cn','256af691ca8d812b4a8309ea49ff3f84743d22023fd2899ce608ea7169e36fc7','2','male','',1451575161,NULL,NULL);
/*!40000 ALTER TABLE `hmvc_users` ENABLE KEYS */;
