-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 23 Mai 2016 à 19:12
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `mikiry`
--
CREATE DATABASE IF NOT EXISTS `mikiry` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mikiry`;

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `cityId` tinyint(4) NOT NULL AUTO_INCREMENT,
  `city_name_fr` varchar(32) NOT NULL,
  `city_name_en` varchar(32) NOT NULL,
  `city_name_de` varchar(32) NOT NULL,
  `paysId` tinyint(4) NOT NULL,
  PRIMARY KEY (`cityId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `city`
--

INSERT INTO `city` (`cityId`, `city_name_fr`, `city_name_en`, `city_name_de`, `paysId`) VALUES
(1, 'Antananarive', 'Antananarive', 'Antananarive', 1),
(2, 'Tamatave', 'Tamatave', 'Tamatave', 1),
(3, 'Fianarantsoa', 'Fianarantsoa', 'Fianarantsoa', 1),
(4, 'Antsirabe', 'Antsirabe', 'Antsirabe', 1),
(5, 'Nantes', 'Nantes', 'Nantes', 2),
(6, 'Paris', 'Paris', 'Paris', 2);

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `companyId` tinyint(4) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(32) NOT NULL,
  `company_logo` varchar(128) NOT NULL,
  `company_tel` varchar(32) NOT NULL,
  `company_website` varchar(128) NOT NULL,
  PRIMARY KEY (`companyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `multilingue`
--

CREATE TABLE IF NOT EXISTS `multilingue` (
  `langue` varchar(2) NOT NULL,
  `textes` varchar(10000) NOT NULL,
  `images` varchar(128) NOT NULL,
  `couleurs` varchar(8) NOT NULL,
  PRIMARY KEY (`langue`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `paysId` tinyint(4) NOT NULL AUTO_INCREMENT,
  `pays_name_fr` varchar(32) NOT NULL,
  `pays_name_en` varchar(32) NOT NULL,
  `pays_name_de` varchar(32) NOT NULL,
  PRIMARY KEY (`paysId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`paysId`, `pays_name_fr`, `pays_name_en`, `pays_name_de`) VALUES
(1, 'Madagascar', 'Madagascar', 'Madagascar'),
(2, 'France', 'France', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `prod_name`, `prod_desc`, `prod_price`, `prod_quantity`) VALUES
(1, 'test', 'njara', 300, 2378),
(29, 'test', 'abc', 46, 885555),
(30, 'wd', 'wxv', 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `publicite`
--

CREATE TABLE IF NOT EXISTS `publicite` (
  `pubId` smallint(6) NOT NULL AUTO_INCREMENT,
  `pub_name` varchar(32) NOT NULL,
  `import_image` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `date_deb` date NOT NULL,
  `date_fin` date NOT NULL,
  `emplcement` varchar(128) NOT NULL,
  `horodotage` datetime NOT NULL,
  PRIMARY KEY (`pubId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `telephone`
--

CREATE TABLE IF NOT EXISTS `telephone` (
  `phoneId` tinyint(4) NOT NULL AUTO_INCREMENT,
  `companyId` tinyint(4) NOT NULL,
  `tel_fr` varchar(32) NOT NULL,
  `tel_en` varchar(32) NOT NULL,
  `tel_de` varchar(32) NOT NULL,
  PRIMARY KEY (`phoneId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `website`
--

CREATE TABLE IF NOT EXISTS `website` (
  `websiteId` tinyint(4) NOT NULL AUTO_INCREMENT,
  `companyId` tinyint(4) NOT NULL,
  `website_fr` varchar(128) NOT NULL,
  `website_en` varchar(128) NOT NULL,
  `website_de` varchar(128) NOT NULL,
  PRIMARY KEY (`websiteId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
