-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 02 Décembre 2017 à 15:00
-- Version du serveur :  5.6.25
-- Version de PHP :  5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bella_nina`
--

-- --------------------------------------------------------

--
-- Structure de la table `cat_stock`
--

CREATE TABLE IF NOT EXISTS `cat_stock` (
  `id_cat` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `dateCreation` datetime NOT NULL,
  `dateModification` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cat_stock`
--

INSERT INTO `cat_stock` (`id_cat`, `libelle`, `description`, `image`, `dateCreation`, `dateModification`) VALUES
(1, 'chaussure', 'news chaussure', 'chau1.jpg29-11-2017a16-20.jpg', '2017-11-29 16:20:22', '0000-00-00 00:00:00'),
(2, 'sacs', 'news sacs', 'sac1.jpg29-11-2017a16-20.jpg', '2017-11-29 16:20:46', '0000-00-00 00:00:00'),
(3, 'chemise', 'categorie chemise', 'cyp.jpg30-11-2017a11-20.jpg', '2017-11-30 11:20:26', '0000-00-00 00:00:00'),
(4, 'costume', 'nouveau costume', 'cyp.jpg30-11-2017a21-41.jpg', '2017-11-30 21:41:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `chaussure`
--

CREATE TABLE IF NOT EXISTS `chaussure` (
  `id` int(11) unsigned NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `prix_min` int(11) DEFAULT NULL,
  `prix_max` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `modele` text,
  `couleur` text,
  `pointure` text,
  `taille` text,
  `marque` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `chaussure`
--

INSERT INTO `chaussure` (`id`, `quantite`, `stock_id`, `prix_min`, `prix_max`, `code`, `modele`, `couleur`, `pointure`, `taille`, `marque`, `type`, `dateCreation`, `dateModification`) VALUES
(1, 52, 1, 25000, 50000, 'code1', 'bout carre', 'verte', '{donnee_pointure:{qtept35:12,qtept36:5,qtept37:5,qtept38:5,qtept39:5,qtept40:5,qtept41:5,qtept42:8,qtept43:1,qtept44:1,total:52}}', '{total:0}', 'Air Max', 'femme', '2017-11-30 08:04:39', NULL),
(2, 16, 2, 25000, 68000, 'code2', 'bout rond', 'noir marron', '{donnee_pointure:{qtept35:2,qtept36:2,qtept37:1,qtept38:0,qtept39:8,qtept40:2,qtept41:1,qtept42:1,qtept43:0,qtept44:0,qtept45:4,qtept46:1,total:22}}', '{total:0}', 'adidas', 'homme', '2017-11-30 08:10:47', NULL),
(4, 45, 3, 44, 55545445, 'code4', 'bout pointu', 'rouge-jaune', '{donnee_pointure:{qtept18:4,qtept19:8,qtept20:5,qtept21:1,qtept22:2,qtept23:0,qtept24:0,qtept25:0,qtept26:0,qtept27:2,qtept28:5,qtept29:15,qtept30:9,qtept31:1,qtept32:0,qtept33:1,qtept34:1,qtept35:0,qtept36:0,total:54}}', '{total:0}', 'palladium', 'enfant', '2017-11-30 09:24:29', '2017-11-30 10:14:29'),
(6, 77, 3, 255555, 333333333, 'code88', 'vdggf', 'verte', '{donnee_pointure:{qtept35:55,qtept36:4,qtept37:2,qtept38:3,qtept39:6,qtept40:3,qtept41:0,qtept42:4,qtept43:0,qtept44:0,total:77}}', '{total:0}', 'palladium', 'femme', '2017-12-01 10:11:53', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `chemise`
--

CREATE TABLE IF NOT EXISTS `chemise` (
  `id` int(11) unsigned NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `prix_min` int(11) DEFAULT NULL,
  `prix_max` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `modele` text,
  `couleur` text,
  `pointure` text,
  `taille` text,
  `marque` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `chemise`
--

INSERT INTO `chemise` (`id`, `quantite`, `stock_id`, `prix_min`, `prix_max`, `code`, `modele`, `couleur`, `pointure`, `taille`, `marque`, `type`, `dateCreation`, `dateModification`) VALUES
(4, 199, 4, 30000, 125000, 'a94', 'courte manche', 'bleu', '{total:0}', '{donnee_taille:{qteTS:5,qteTM:4,qteTL:8,qteTXL:100,qteTXXL:2,qteT3XL:80,total:199}}', 'Aristotes 94', 'homme', '2017-11-30 22:26:16', '2017-12-01 09:54:31');

-- --------------------------------------------------------

--
-- Structure de la table `costume`
--

CREATE TABLE IF NOT EXISTS `costume` (
  `id` int(11) unsigned NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `prix_min` int(11) DEFAULT NULL,
  `prix_max` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `modele` text,
  `couleur` text,
  `pointure` text,
  `taille` text,
  `marque` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `costume`
--

INSERT INTO `costume` (`id`, `quantite`, `stock_id`, `prix_min`, `prix_max`, `code`, `modele`, `couleur`, `pointure`, `taille`, `marque`, `type`, `dateCreation`, `dateModification`) VALUES
(2, 127, 7, 40000, 180000, 'code5', 'courte manche', 'noir fonce', '{total:0}', '{donnee_taille:{qteT44:5,qteT45:8,qteT46:6,qteT47:1,qteT48:7,qteT49:3,qteT50:2,qteT51:8,qteT52:4,qteT53:55,qteT54:0,qteT55:5,qteT56:6,qteT57:1,qteT58:00,qteT59:7,qteT60:9,total:127}}', 'sur mesure', 'homme', '2017-11-30 22:03:02', '2017-12-01 09:55:36');

-- --------------------------------------------------------

--
-- Structure de la table `sacs`
--

CREATE TABLE IF NOT EXISTS `sacs` (
  `id` int(11) unsigned NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `prix_min` int(11) DEFAULT NULL,
  `prix_max` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `modele` text,
  `couleur` text,
  `pointure` text,
  `taille` text,
  `marque` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sacs`
--

INSERT INTO `sacs` (`id`, `quantite`, `stock_id`, `prix_min`, `prix_max`, `code`, `modele`, `couleur`, `pointure`, `taille`, `marque`, `type`, `dateCreation`, `dateModification`) VALUES
(1, 44, 6, 100000, 250000, 'code2', 'fringue', 'noir marron', NULL, NULL, 'luc vitor', 'femme', '2017-11-30 15:06:37', '2017-11-30 22:54:44');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id_stock` int(11) NOT NULL,
  `nom_article` varchar(255) NOT NULL,
  `cat_stock_id` int(11) NOT NULL,
  `tab_cat` text NOT NULL,
  `image` text NOT NULL,
  `dateCreation` date NOT NULL,
  `dateModification` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `stock`
--

INSERT INTO `stock` (`id_stock`, `nom_article`, `cat_stock_id`, `tab_cat`, `image`, `dateCreation`, `dateModification`) VALUES
(1, 'Air Max', 1, '{total:0}', 'image.png29-11-2017a16-22.png', '2017-11-29', '0000-00-00'),
(2, 'adidas', 1, '{total:0}', 'image.png29-11-2017a16-22.png', '2017-11-29', '0000-00-00'),
(3, 'palladium', 1, '{total:0}', 'chau3.jpg30-11-2017a08-08.jpg', '2017-11-30', '0000-00-00'),
(4, 'Aristotes 94', 3, '{total:0}', 'cyp.jpg30-11-2017a11-21.jpg', '2017-11-30', '0000-00-00'),
(5, 'vigdor', 3, '{total:0}', 'cyp.jpg30-11-2017a12-50.jpg', '2017-11-30', '0000-00-00'),
(6, 'luc vitor', 2, '{total:0}', 'sac4.jpg30-11-2017a15-05.jpg', '2017-11-30', '0000-00-00'),
(7, 'sur mesure', 4, '{total:0}', 'cyp.jpg30-11-2017a21-42.jpg', '2017-11-30', '0000-00-00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cat_stock`
--
ALTER TABLE `cat_stock`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `chaussure`
--
ALTER TABLE `chaussure`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Index pour la table `chemise`
--
ALTER TABLE `chemise`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Index pour la table `costume`
--
ALTER TABLE `costume`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Index pour la table `sacs`
--
ALTER TABLE `sacs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cat_stock`
--
ALTER TABLE `cat_stock`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `chaussure`
--
ALTER TABLE `chaussure`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `chemise`
--
ALTER TABLE `chemise`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `costume`
--
ALTER TABLE `costume`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `sacs`
--
ALTER TABLE `sacs`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
