-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 29, 2019 at 02:54 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: PiscineDB2
--

-- --------------------------------------------------------

--
-- Table structure for table Acheteur
--

CREATE TABLE Acheteur (
  id int(10) UNSIGNED NOT NULL,
  type varchar(255) NOT NULL DEFAULT 'acheteur',
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL,
  image varchar(255) NOT NULL,
  wallpaper varchar(255) NOT NULL,
  adresse varchar(255) NOT NULL,
  mail varchar(255) NOT NULL,
  CB_saved tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table Admin
--

CREATE TABLE Admin (
  id int(11) UNSIGNED NOT NULL,
  type varchar(255) NOT NULL DEFAULT 'admin',
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL,
  image varchar(255) NOT NULL,
  wallpaper varchar(255) NOT NULL,
  adresse varchar(255) NOT NULL,
  mail varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table Commandes
--

CREATE TABLE Commandes (
  id int(10) UNSIGNED NOT NULL,
  id_produit int(10) UNSIGNED NOT NULL,
  id_acheteur int(10) UNSIGNED NOT NULL,
  id_vendeur int(10) UNSIGNED NOT NULL,
  quantite int(11) NOT NULL,
  valeur_commande int(11) NOT NULL,
  date date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table Livres
--

CREATE TABLE Livres (
  id int(11) UNSIGNED NOT NULL,
  titre varchar(255) NOT NULL,
  auteur varchar(255) NOT NULL,
  annee year(4) NOT NULL,
  editeur varchar(255) NOT NULL,
  id_vendeur int(10) UNSIGNED NOT NULL,
  genre varchar(255) NOT NULL,
  prix int(11) NOT NULL,
  photo varchar(255) NOT NULL,
  description varchar(255) NOT NULL,
  quantite int(11) NOT NULL,
  video varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table Musique
--

CREATE TABLE Musique (
  id int(10) UNSIGNED NOT NULL,
  titre varchar(255) NOT NULL,
  auteur varchar(255) NOT NULL,
  annee year(4) NOT NULL,
  producteur varchar(255) NOT NULL,
  id_vendeur int(11) NOT NULL,
  genre varchar(255) NOT NULL,
  album varchar(255) NOT NULL,
  prix int(11) NOT NULL,
  photo varchar(255) NOT NULL,
  description varchar(255) NOT NULL,
  quantite int(11) NOT NULL,
  video varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table SeL
--

CREATE TABLE SeL (
  id int(10) UNSIGNED NOT NULL,
  titre varchar(255) NOT NULL,
  photo varchar(255) NOT NULL,
  description varchar(255) NOT NULL,
  video varchar(255) NOT NULL,
  prix int(11) NOT NULL,
  type varchar(255) NOT NULL,
  id_vendeur int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table Vendeur
--

CREATE TABLE Vendeur (
  id int(11) UNSIGNED NOT NULL,
  type varchar(255) NOT NULL DEFAULT 'vendeur',
  nom varchar(255) NOT NULL,
  prenom varchar(255) NOT NULL,
  image varchar(255) NOT NULL,
  wallpaper varchar(255) NOT NULL,
  adresse varchar(255) NOT NULL,
  mail varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table Vetements
--

CREATE TABLE Vetements (
  id int(10) UNSIGNED NOT NULL,
  titre varchar(255) NOT NULL,
  id_vendeur int(10) UNSIGNED NOT NULL,
  genre varchar(255) NOT NULL,
  type varchar(255) NOT NULL,
  prix int(11) NOT NULL,
  photo varchar(255) NOT NULL,
  description varchar(255) NOT NULL,
  quantite int(11) NOT NULL,
  video varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table Acheteur
--
ALTER TABLE Acheteur
  ADD PRIMARY KEY (id);

--
-- Indexes for table Admin
--
ALTER TABLE Admin
  ADD PRIMARY KEY (id);

--
-- Indexes for table Commandes
--
ALTER TABLE Commandes
  ADD PRIMARY KEY (id);

--
-- Indexes for table Livres
--
ALTER TABLE Livres
  ADD PRIMARY KEY (id);

--
-- Indexes for table Musique
--
ALTER TABLE Musique
  ADD PRIMARY KEY (id);

--
-- Indexes for table SeL
--
ALTER TABLE SeL
  ADD PRIMARY KEY (id);

--
-- Indexes for table Vendeur
--
ALTER TABLE Vendeur
  ADD PRIMARY KEY (id);

--
-- Indexes for table Vetements
--
ALTER TABLE Vetements
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table Acheteur
--
ALTER TABLE Acheteur
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table Admin
--
ALTER TABLE Admin
  MODIFY id int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table Commandes
--
ALTER TABLE Commandes
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table Livres
--
ALTER TABLE Livres
  MODIFY id int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table Musique
--
ALTER TABLE Musique
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table SeL
--
ALTER TABLE SeL
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table Vendeur
--
ALTER TABLE Vendeur
  MODIFY id int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table Vetements
--
ALTER TABLE Vetements
  MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT