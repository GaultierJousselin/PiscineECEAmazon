-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 02, 2019 at 05:08 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `piscinedb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `acheteur`
--

CREATE TABLE `acheteur` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'acheteur',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `wallpaper` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `CB_saved` tinyint(1) NOT NULL DEFAULT '0',
  `nbr_commande` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acheteur`
--

INSERT INTO `acheteur` (`id`, `type`, `nom`, `prenom`, `image`, `wallpaper`, `adresse`, `mail`, `MDP`, `CB_saved`, `nbr_commande`) VALUES
(1, 'acheteur', 'Arsovic', 'Marko', 'Image1.png', 'wallpaper1.jpg', '6 rue pasteur 93130 Noisy le sec', 'marko.arsovic@edu.ece.fr', 'azerty', 0, 0),
(2, 'acheteur', 'Ghazal', 'Paul', '', '', '', 'paul.ghazal@edu.ece.fr', 'qsdfgh', 0, 0),
(7, ' ', 'lorem', 'ipsum', 'cinqueterre.jpg', '', '4 rue rue', 'loremipsum@edu.ece.fr', 'lorem', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'admin',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `wallpaper` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_produit` int(10) UNSIGNED NOT NULL,
  `id_acheteur` int(10) UNSIGNED NOT NULL,
  `id_vendeur` int(10) UNSIGNED NOT NULL,
  `quantite` int(11) NOT NULL,
  `valeur_commande` int(11) NOT NULL,
  `bought` tinyint(4) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `nbr_commande` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `id_produit`, `id_acheteur`, `id_vendeur`, `quantite`, `valeur_commande`, `bought`, `cat`, `nbr_commande`) VALUES
(1, 1, 0, 0, 1, 0, 1, 'livres', 0),
(2, 1, 0, 0, 2, 0, 1, 'livres', 0),
(3, 2, 0, 0, 3, 0, 1, 'livres', 0),
(4, 2, 0, 0, 1, 0, 1, 'livres', 0),
(5, 2, 3, 1, 3, 2, 0, 'livres', 0),
(6, 1, 0, 0, 0, 0, 0, 'vetements', 0),
(7, 2, 0, 0, 0, 0, 0, 'vetements', 0),
(8, 1, 2, 1, 5, 0, 0, 'vetements', 0),
(9, 2, 0, 1, 2, 2, 0, 'vetements', 0),
(10, 3, 0, 3, 10, 0, 0, 'vetements', 0),
(11, 3, 0, 2, 1, 0, 0, 'musique', 0),
(12, 2, 0, 0, 5, 0, 0, 'musique', 0),
(13, 1, 0, 0, 6, 0, 0, 'musique', 0),
(14, 1, 0, 0, 3, 0, 0, 'musique', 0),
(15, 1, 0, 0, 3, 0, 0, 'musique', 0),
(16, 3, 0, 0, 233, 0, 0, 'sel', 0),
(17, 4, 0, 0, 122, 0, 0, 'sel', 0),
(18, 4, 0, 0, 43, 0, 0, 'sel', 0),
(19, 3, 0, 0, 98, 0, 0, 'sel', 0),
(20, 1, 0, 0, 3, 0, 0, 'sel', 0);

-- --------------------------------------------------------

--
-- Table structure for table `livres`
--

CREATE TABLE `livres` (
  `id` int(11) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `annee` year(4) NOT NULL,
  `editeur` varchar(255) NOT NULL,
  `id_vendeur` int(10) UNSIGNED NOT NULL,
  `genre` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `auteur`, `annee`, `editeur`, `id_vendeur`, `genre`, `prix`, `photo`, `description`, `quantite`) VALUES
(1, 'HarryPotter 1', '', 0000, '', 1, '', 0, '', '', 3),
(2, 'toto', '', 0000, '', 2, '', 0, '', '', 4),
(3, 'gdgdgd', '', 0000, '', 2, '', 0, '', '', 2),
(4, 'bloblo', '', 0000, '', 1, '', 0, '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `musique`
--

CREATE TABLE `musique` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `quantite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `musique`
--

INSERT INTO `musique` (`id`, `titre`, `auteur`, `annee`, `producteur`, `id_vendeur`, `genre`, `album`, `prix`, `photo`, `description`, `quantite`) VALUES
(1, 'Shakira', 'sharika', 0000, '', 2, '', '', 0, 'test.png', '', 5),
(2, 'justin bieber', '', 0000, '', 1, '', '', 0, 'tete.png', '', 10),
(3, 'Lorenzo', '', 0000, '', 3, '', '', 0, '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sel`
--

CREATE TABLE `sel` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `id_vendeur` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sel`
--

INSERT INTO `sel` (`id`, `titre`, `photo`, `description`, `video`, `prix`, `type`, `id_vendeur`) VALUES
(1, 'ballon', '', '', '', 5, '', 1),
(2, 'raquette', 'raquette.png', '', '', 5, '', 2),
(3, 'vélo', 'velo.png', '', '', 454, '', 2),
(4, 'trotinette', 'trotinette.png', '', '', 233, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vendeur`
--

CREATE TABLE `vendeur` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'vendeur',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `wallpaper` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendeur`
--

INSERT INTO `vendeur` (`id`, `type`, `nom`, `prenom`, `image`, `wallpaper`, `adresse`, `mail`, `mdp`) VALUES
(1, 'vendeur', 'Ghazal', 'Paul', '', '', '', '', ''),
(2, 'vendeur', 'Arsovic', 'Marko', '', '', '', '', ''),
(3, 'vendeur', 'Jousselin', 'Gaultier', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vetements`
--

CREATE TABLE `vetements` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `id_vendeur` int(10) UNSIGNED NOT NULL,
  `genre` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vetements`
--

INSERT INTO `vetements` (`id`, `titre`, `id_vendeur`, `genre`, `type`, `prix`, `photo`, `description`, `quantite`, `video`) VALUES
(1, 'tshirt', 1, '', '', 4, 'popo.png', '', 12, ''),
(2, 'jean', 2, '', '', 3, '', '', 4, ''),
(3, 'manteau', 1, '', '', 4, 'rere.png', '', 67, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acheteur`
--
ALTER TABLE `acheteur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `musique`
--
ALTER TABLE `musique`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sel`
--
ALTER TABLE `sel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vetements`
--
ALTER TABLE `vetements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acheteur`
--
ALTER TABLE `acheteur`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `livres`
--
ALTER TABLE `livres`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `musique`
--
ALTER TABLE `musique`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sel`
--
ALTER TABLE `sel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendeur`
--
ALTER TABLE `vendeur`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vetements`
--
ALTER TABLE `vetements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
