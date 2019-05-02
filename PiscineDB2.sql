-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 02 mai 2019 à 08:27
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
  `type` varchar(255) NOT NULL DEFAULT 'acheteur',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `wallpaper` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `CB_saved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`id`, `type`, `nom`, `prenom`, `image`, `wallpaper`, `adresse`, `mail`, `MDP`, `CB_saved`) VALUES
(1, 'acheteur', 'Arsovic', 'Marko', 'Image1.png', 'wallpaper1.jpg', '6 rue pasteur 93130 Noisy le sec', 'marko.arsovic@edu.ece.fr', 'azerty', 0),
(2, 'acheteur', 'Ghazal', 'Paul', '', '', '', 'paul.ghazal@edu.ece.fr', 'qsdfgh', 0),
(7, ' ', 'lorem', 'ipsum', 'cinqueterre.jpg', '', '4 rue rue', 'loremipsum@edu.ece.fr', 'lorem', 0);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL DEFAULT 'admin',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `wallpaper` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `annee` year(4) NOT NULL,
  `editeur` varchar(255) NOT NULL,
  `id_vendeur` int(10) UNSIGNED NOT NULL,
  `genre` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

DROP TABLE IF EXISTS `musique`;
CREATE TABLE IF NOT EXISTS `musique` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `annee` year(4) NOT NULL,
  `producteur` varchar(255) NOT NULL,
  `id_vendeur` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL DEFAULT 'vendeur',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `wallpaper` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
