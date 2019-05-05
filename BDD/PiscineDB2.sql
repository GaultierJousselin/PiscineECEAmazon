-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 mai 2019 à 10:29
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `piscinedb2`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `wallpaper` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `CB_nbr` varchar(255) NOT NULL,
  `CB_name` varchar(255) NOT NULL,
  `CB_date_expi` varchar(255) NOT NULL,
  `CB_CVC` varchar(11) NOT NULL,
  `nbr_commande` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`id`, `nom`, `prenom`, `image`, `wallpaper`, `adresse`, `zip`, `ville`, `pays`, `telephone`, `mail`, `MDP`, `CB_nbr`, `CB_name`, `CB_date_expi`, `CB_CVC`, `nbr_commande`) VALUES
(1, 'Arsovic', 'Marko', 'Image1.png', 'wallpaper1.jpg', '6 rue pasteur', '93130', 'Noisy le sec', 'France', '0601010101', 'marko.arsovic@edu.ece.fr', 'azerty', '4242424242424242', 'Jean Paul', '01/22', '213', 0),
(2, 'Ghazal', 'Paul', '', '', '', '', '', '', '', 'paul.ghazal@edu.ece.fr', 'qsdfgh', '6969696969696969', 'Paul Ghazal', '04/20', '123', 0),
(7, 'lorem', 'ipsum', 'cinqueterre.jpg', '', '4 rue rue', '', '', '', '', 'loremipsum@edu.ece.fr', 'lorem', '', '', '', '', 0),
(8, 'Jousselin', 'Gaultier', '', '', '11 rue sextius michel', '75015', 'Paris', 'France', '0679609926', 'gaultier.jousselin@orange.fr', '123', '6767676767676767', 'Jousselin Gaultier', '01/25', '123', 3),
(9, 'Jousselin', 'Gaultier', '', '', '11rue sextius michel', '75015', 'Paris', 'France', '0679609926', 'gaultier.jousselin@edu.ece.fr', '123', '0', '0', '0', '0', 0),
(10, 'Ploux', 'Marc', '', '', '1 rue du blou', '75018', 'Paris', 'France', '0601010101', 'marc.ploux@edu.ece.fr', '123', '0', '0', '0', '0', 0),
(11, 'qsd', 'qsd', '', '', '100qsdqsd', '02586', 'qsdqs', 'qsd', '0601010101', 'qsd@edu.ece.fr', 'qsdqs', '0', '0', '0', '0', 0),
(12, 'test', 'test', '', '', '001test', '01011', 'test', 'tes', '0601010101', 'test@edu.ece.fr', 'test', '0', '0', '0', '0', 0),
(13, 'sdf', 'sdf', '', '', '11 rue sextius michelsdf', '75015', 'Paris', 'France', '0000000000', 'jousselin@edu.ece.fr', 'sdf', '0', '0', '0', '0', 0),
(14, 'sdkgfjb', 'skrjgb', '', '', '1sdfg', '75015', 'sddssdf', 'fsdfsdf', '0601010101', 'ihjgdsb@edu.ece.fr', 'skdjughb', '0', '0', '0', '0', 0),
(15, 'sdkljf', 'skjdfb', '', '', '1sdf', '75015', 'sdf', 'sdf', '0601010101', 'sdfsd@edu.ece.fr', 'sdkjfb', '0', '0', '0', '0', 0),
(16, 'Ploux', 'Marc', '', '', '11rue sextius michel', '75015', 'Paris', 'France', '0605050505', 'marc@edu.ece.fr', '123', '0', '0', '0', '0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `wallpaper` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `accepte` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `image`, `wallpaper`, `adresse`, `mail`, `mdp`, `accepte`) VALUES
(1, 'lorem', 'ipsum', '', '', '', 'l.i@edu.ece.fr', 'loremipsum', 1),
(2, 'testA', 'testA', '', '', '', 'testA@edu.ece.fr', 'sqdqsd', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_produit` int(10) UNSIGNED NOT NULL,
  `id_acheteur` int(10) UNSIGNED NOT NULL,
  `id_vendeur` int(10) UNSIGNED NOT NULL,
  `quantite` int(11) NOT NULL,
  `valeur_commande` int(11) NOT NULL,
  `bought` tinyint(4) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `nbr_commande` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `id_produit`, `id_acheteur`, `id_vendeur`, `quantite`, `valeur_commande`, `bought`, `cat`, `nbr_commande`) VALUES
(53, 4, 0, 0, 1, 25, 1, 'livres', 1557049359),
(52, 1, 0, 0, 5, 20, 1, 'livres', 1556999143),
(51, 12, 0, 2, 1, 10, 1, 'livres', 1556999143),
(50, 1, 0, 5, 5, 80, 1, 'vetements', 1556995870),
(49, 2, 0, 8, 1, 1200, 1, 'sel', 1556993259),
(48, 1, 0, 5, 2, 80, 1, 'vetements', 1556992954),
(47, 1, 0, 5, 2, 80, 1, 'vetements', 1556992954),
(46, 4, 0, 0, 5, 25, 1, 'livres', 1556992581),
(45, 4, 0, 0, 4, 25, 1, 'livres', 1556992340),
(44, 4, 0, 0, 5, 25, 1, 'livres', 1556992106),
(43, 4, 0, 0, 5, 25, 1, 'livres', 1556992106),
(42, 2, 0, 8, 5, 1200, 1, 'sel', 1556977252),
(41, 1, 0, 5, 5, 80, 1, 'vetements', 1556977252),
(40, 1, 0, 2, 5, 50, 1, 'musique', 1556977252),
(39, 4, 0, 0, 5, 25, 1, 'livres', 1556977252);

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `annee` varchar(255) NOT NULL,
  `editeur` varchar(255) NOT NULL,
  `id_vendeur` int(10) UNSIGNED NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `auteur`, `annee`, `editeur`, `id_vendeur`, `prix`, `photo`, `description`, `quantite`) VALUES
(11, 'HarryPotter 1', '', '0000', '', 1, 10, '', '', 3),
(12, 'toto', '', '0000', '', 2, 10, '', '', 4),
(13, 'gdgdgd', '', '0000', '', 2, 1, '', '', 2),
(14, 'bloblo', '', '0000', '', 1, 1, '', '', 2),
(1, 'Harry Potter', '', '0000', '', 0, 20, 'images/hp.jpg\n', 'Orphelin, le jeune Harry Potter peut enfin quitter ses tyranniques oncle et tante Dursley', 1),
(2, 'Tchoupi', '', '0000', '', 0, 10, 'images/tchoupi.jpg', 'T\'choupi est une série de livres de littérature jeunesse créés par Thierry Courtin et publiés par Nathan.', 2),
(3, 'Harry Potter 2', '', '0000', '', 0, 20, 'images/hp2.jpg', 'L\'elfe Dobby a bien tenté d\'empêcher Harry de retourner à l\'École des Sorciers, frappée d\'une terrible malédiction, mais Harry n\'est pas près de laisser choir ses amis.', 3),
(4, 'Elon Musk', '', '0000', '', 0, 25, 'images/em.jpg', 'Elon Reeve Musk, né le 28 juin 1971 à Pretoria, est un entrepreneur, chef d\'entreprise et ingénieur d\'origine sud-africaine naturalisé canadien en 1988 puis américain en 2002.', 6),
(15, 'Les Miserables', 'Victor Hugo', '1900000', 'French press', 4, 50, 'images/brel.jpg', 'QUEL BEL OUVRAGE', 5),
(16, 'mlkmlk', 'lmkmlk', '7898', 'lmkmlk', 4, 78, '', 'mlk', 5);

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

DROP TABLE IF EXISTS `musique`;
CREATE TABLE IF NOT EXISTS `musique` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `annee` varchar(255) NOT NULL,
  `producteur` varchar(255) NOT NULL,
  `id_vendeur` int(11) NOT NULL,
  `album` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `musique`
--

INSERT INTO `musique` (`id`, `titre`, `auteur`, `annee`, `producteur`, `id_vendeur`, `album`, `prix`, `photo`, `description`, `quantite`) VALUES
(11, 'Shakira', 'sharika', '0000', '', 2, '', 0, 'test.png', '', 5),
(12, 'justin bieber', '', '0000', '', 1, '', 0, 'tete.png', '', 10),
(13, 'Lorenzo', '', '0000', '', 3, '', 0, '', '', 3),
(1, 'JJG - Envoles moi', 'JJG', '1984', 'JJG', 2, 'Positif', 50, 'images/envoles.jpg', 'Envole-moi, envole-moi, envole-moi \nLoin de cette fatalité qui colle à ma peau \nEnvole-moi, envole-moi ', 5),
(2, 'Dans le port d\'Amsterdam', 'Jacques Brel', '1966', 'Brel', 4, 'Amsterdam', 30, 'images/brel.jpg', 'Dans le port d’Amsterdam\nY a des marins qui chantent\nLes rêves qui les hantent', 4),
(14, 'lkmjlkj', 'lkjklj', '5644', 'mlkmlk', 4, 'lmkmlk', 564, '', 'mlkmlk', 5);

-- --------------------------------------------------------

--
-- Structure de la table `sel`
--

DROP TABLE IF EXISTS `sel`;
CREATE TABLE IF NOT EXISTS `sel` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `id_vendeur` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sel`
--

INSERT INTO `sel` (`id`, `titre`, `photo`, `description`, `video`, `prix`, `type`, `id_vendeur`) VALUES
(11, 'ballon', '', '', '', 5, '', 1),
(12, 'raquette', 'raquette.png', '', '', 5, '', 2),
(13, 'vélo', 'velo.png', '', '', 454, '', 2),
(14, 'trotinette', 'trotinette.png', '', '', 233, '', 2),
(1, 'Ballon de foot doré', 'images/ballon.jpg', 'Ballon Doré', '0', 20, 'Equipement de sport', 13),
(2, 'Ordinateur', 'images/pc.jpg', 'GROS PC DE FOU\n16 Go de Ram\n1660Ti\nRyzen 7 3770HQ\nEcran 120Hz', '0', 1200, 'Electronique', 8),
(15, 'pÃ´^po', '', '^po', '', 65, 'lkj', 4);

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `wallpaper` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`id`, `nom`, `prenom`, `image`, `wallpaper`, `adresse`, `zip`, `ville`, `pays`, `telephone`, `mail`, `MDP`) VALUES
(1, 'Ghazal', 'Paul', '', '', '', '', '', '', '', '', ''),
(2, 'Arsovic', 'Marko', '', '', '', '', '', '', '', '', ''),
(3, 'Jousselin', 'Gaultier', '', '', '', '', '', '', '', '', ''),
(4, 'vend', 'vend', '', '', '1vend', '78515', 'vend', 'vend', '0605050505', 'vendeur@edu.ece.fr', 'vend');

-- --------------------------------------------------------

--
-- Structure de la table `vetements`
--

DROP TABLE IF EXISTS `vetements`;
CREATE TABLE IF NOT EXISTS `vetements` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `id_vendeur` int(10) UNSIGNED NOT NULL,
  `genre` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vetements`
--

INSERT INTO `vetements` (`id`, `titre`, `id_vendeur`, `genre`, `type`, `prix`, `photo`, `description`, `quantite`, `video`) VALUES
(11, 'tshirt', 1, '', '', 4, 'popo.png', '', 12, ''),
(12, 'jean', 2, '', '', 3, '', '', 4, ''),
(13, 'manteau', 1, '', '', 4, 'rere.png', '', 67, ''),
(1, 'Nike Janoski - Liège', 5, 'Homme', 'Chaussures', 80, 'images/janoski_liege.jpg', 'Cette édition vient compléter la gamme de modèles conçus en liège comme la Air Max 90, la Blazer, la Dunk ou bien la Air Force 1. Le upper en liège est paré d\'un swoosh noir, de lacets en cuir marron et d\'une semelle vulcanisée blanche.', 50, '0'),
(2, 'Robe Addidas', 7, 'Femme', 'Robe', 70, 'images/robe.jpg', 'Robe De toutes les couleurs', 6, '0'),
(14, 'lkmjklmj', 4, 'Homme', 'mlk', 54, '', 'mlk', 41, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
