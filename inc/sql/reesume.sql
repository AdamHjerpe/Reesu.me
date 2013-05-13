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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `pageident` varchar(60) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `members_to` int(11) NOT NULL,
  `members_from` int(11) NOT NULL,
  `text` text NOT NULL,
  `viewed` int(1) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

CREATE TABLE IF NOT EXISTS `visits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipadress` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `browser` varchar(200) NOT NULL,
  `system` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ipadress` (`ipadress`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

CREATE TABLE `online` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `ip` int(11) NOT NULL default '0',
  `country` varchar(64) collate utf8_unicode_ci NOT NULL default '',
  `countrycode` varchar(2) collate utf8_unicode_ci NOT NULL default '',
  `city` varchar(64) collate utf8_unicode_ci NOT NULL default '',
  `dt` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `ip` (`ip`),
  KEY `countrycode` (`countrycode`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
