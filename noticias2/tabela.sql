------------------------------------
CREATE TABLE `noticias` (
  `idnoticias` int(10) unsigned NOT NULL auto_increment,
  `titulo` varchar(50) NOT NULL,
  `resumo` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `data_post` datetime NOT NULL,
  PRIMARY KEY  (`idnoticias`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

