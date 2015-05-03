

DROP TABLE IF EXISTS `club`;
DROP TABLE IF EXISTS `contact`;


CREATE TABLE `club` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100)
);


CREATE TABLE `contact` (
  `userid` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `lang` varchar(10) NOT NULL DEFAULT 'fr',
  `reg_date` datetime NOT NULL,
  `active` int(1) NOT NULL
);
