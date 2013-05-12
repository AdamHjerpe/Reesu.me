CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(140) CHARACTER SET utf8 NOT NULL,
  `password` varchar(128) CHARACTER SET utf8 NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 NOT NULL,
  `confirm_key` varchar(60) CHARACTER SET utf8 NOT NULL,
  `cookie_key` varchar(60) CHARACTER SET utf8 NOT NULL,
  `name` varchar(140) CHARACTER SET utf8 NOT NULL,
  `ipaddress` varchar(60) CHARACTER SET utf8 NOT NULL,
  `lastseen` datetime NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `admin` int(11) NOT NULL DEFAULT '0',
  `picture` varchar(140) CHARACTER SET utf8 NOT NULL DEFAULT 'no-image.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`,`confirm_key`,`cookie_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=11 ;

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `pageident` varchar(60) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;
