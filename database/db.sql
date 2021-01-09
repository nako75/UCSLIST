-- --------------------------------------------------------

-- 
-- Tablo yapısı: `eski`
-- 

CREATE TABLE `eski` (
  `id` int(15) NOT NULL auto_increment,
  `hacker` varchar(20) collate utf8_turkish_ci NOT NULL default '',
  `url` varchar(100) collate utf8_turkish_ci NOT NULL default '',
  `icerik` text collate utf8_turkish_ci NOT NULL,
  `tarih` int(11) NOT NULL default '0',
  `tur` tinyint(1) NOT NULL default '0',
  `onay` tinyint(1) NOT NULL default '0',
  `defacerip` text collate utf8_turkish_ci NOT NULL,
  `yontem` varchar(225) collate utf8_turkish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `eski`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `eski_hackerlar`
-- 

CREATE TABLE `eski_hackerlar` (
  `id` int(15) NOT NULL auto_increment,
  `hacker` varchar(20) collate utf8_turkish_ci NOT NULL default '',
  `onayli` int(10) NOT NULL default '0',
  `onaysiz` int(10) NOT NULL default '0',
  `deface` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `hacker` (`hacker`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `eski_hackerlar`
-- 

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `hackerlar`
-- 

CREATE TABLE `hackerlar` (
  `id` int(15) NOT NULL auto_increment,
  `hacker` varchar(20) collate utf8_turkish_ci NOT NULL default '',
  `onayli` int(10) NOT NULL default '0',
  `onaysiz` int(10) NOT NULL default '0',
  `deface` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `hacker` (`hacker`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

-- 
-- Tablo döküm verisi `hackerlar`
-- 

INSERT INTO `hackerlar` VALUES (1, 'ooo', 0, 1, 1); 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `kayitlar`
-- 

CREATE TABLE `kayitlar` (
  `id` int(15) NOT NULL auto_increment,
  `hacker` varchar(20) collate utf8_turkish_ci NOT NULL default '',
`description` varchar(5000) collate utf8_turkish_ci NOT NULL default '',
`type` varchar(20) collate utf8_turkish_ci NOT NULL default '',
`note` varchar(200) collate utf8_turkish_ci NOT NULL default '',
  `url` varchar(100) collate utf8_turkish_ci NOT NULL default '',
  `icerik` text collate utf8_turkish_ci NOT NULL,
  `tarih` int(11) NOT NULL default '0',
  `tur` tinyint(1) NOT NULL default '0',
  `onay` tinyint(1) NOT NULL default '0',
  `defacerip` text collate utf8_turkish_ci NOT NULL,
  `yontem` varchar(225) collate utf8_turkish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;