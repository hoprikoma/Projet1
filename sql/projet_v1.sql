-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.19 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour projet
CREATE DATABASE IF NOT EXISTS `projet` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `projet`;

-- Listage de la structure de la table projet. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(10) unsigned NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table projet. comference
CREATE TABLE IF NOT EXISTS `comference` (
  `id` int(11) unsigned NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `id_auteur` int(10) unsigned NOT NULL,
  `id_categorie` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comference_user` (`id_auteur`),
  KEY `FK_comference_categorie` (`id_categorie`),
  CONSTRAINT `FK_comference_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`),
  CONSTRAINT `FK_comference_user` FOREIGN KEY (`id_auteur`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table projet. role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(10) unsigned NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table projet. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_role` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user_role` (`id_role`),
  CONSTRAINT `FK_user_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.
-- Listage de la structure de la table projet. vote
CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(10) unsigned NOT NULL,
  `id_conference` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `level` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_vote_user` (`id_user`),
  KEY `FK_vote_comference` (`id_conference`),
  CONSTRAINT `FK_vote_comference` FOREIGN KEY (`id_conference`) REFERENCES `comference` (`id`),
  CONSTRAINT `FK_vote_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Les données exportées n'étaient pas sélectionnées.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
