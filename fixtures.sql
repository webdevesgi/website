-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mar 27 Novembre 2012 à 15:12
-- Version du serveur: 5.5.28
-- Version de PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `web-dev-esgi`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `starts_at` datetime NOT NULL,
  `ends_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id`, `code`, `title`, `description`, `starts_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, 'e00001', 'Ruby et JavaScript dans une application', 'Utilisation de deux technologies de développement Web récentes.', '2012-11-22 12:30:00', '2012-11-22 12:30:00', '2012-11-17 18:37:14', '2012-11-17 18:37:14');

-- --------------------------------------------------------

--
-- Structure de la table `ideas`
--

CREATE TABLE IF NOT EXISTS `ideas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(6) NOT NULL,
  `type` enum('course','talk','hackathon') NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `ideas`
--

INSERT INTO `ideas` (`id`, `code`, `type`, `title`, `description`, `email`, `firstname`, `lastname`) VALUES
(1, 'i00001', 'course', 'TDD en PHP', 'Introduction à la méthode Test Driven Development avec PHP.', 'fabien@potencier.org', 'Fabien', 'Potencier');

-- --------------------------------------------------------

--
-- Structure de la table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `subscribers`
--

INSERT INTO `subscribers` (`id`, `event_id`, `email`, `firstname`, `lastname`) VALUES
(1, 'e00001', 'remy.hannequin@gmail.com', 'Rémy', 'Hannequin'),
(2, 'e00001', 'hank.moody@gmail.com', 'Hank', 'Moody'),
(3, 'e00001', 'walter.white@gmail.com', 'Walter', 'White'),
(4, 'e00001', 'abed.nadir@gmail.com', 'Abed', 'Nadir');

-- --------------------------------------------------------

--
-- Structure de la table `talks`
--

CREATE TABLE IF NOT EXISTS `talks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(6) NOT NULL,
  `event_id` varchar(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `speaker` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `talks`
--

INSERT INTO `talks` (`id`, `code`, `event_id`, `title`, `description`, `speaker`) VALUES
(1, 't00001', 'e00001', 'Getting Started With Ruby', 'Introduction au langage Ruby et ses différentes utilisations dans le développement Web.', 'Rémy Hannequin'),
(2, 't00002', 'e00001', 'Underscore.js vs Lo-Dash.js', 'Comparaison des deux bibliothèques de fonctions utilitaires JavaScript les plus populaires.', 'Walter White');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;