DROP TABLE IF EXISTS club;
DROP TABLE IF EXISTS contact;
DROP TABLE IF EXISTS club_contact;

CREATE TABLE `club` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `reg_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `club_contact` (
  `idall` int(11) NOT NULL AUTO_INCREMENT,
  `club_id` int(10) unsigned NOT NULL,
  `contact_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idall`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
