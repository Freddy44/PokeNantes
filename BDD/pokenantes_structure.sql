-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 04 Mars 2016 à 15:09
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pokenantes`
--
CREATE DATABASE IF NOT EXISTS `pokenantes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pokenantes`;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_ref` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `prod_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `prod_cat` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `prod_desc` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `prod_state` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `prod_picture` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_qty_defect` int(11) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `provide`
--

DROP TABLE IF EXISTS `provide`;
CREATE TABLE IF NOT EXISTS `provide` (
  `prod_id` int(11) NOT NULL,
  `prov_id` int(11) NOT NULL,
  PRIMARY KEY (`prod_id`,`prov_id`),
  KEY `IDX_199777981C83F75` (`prod_id`),
  KEY `IDX_19977798FBD8A061` (`prov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `provider`
--

DROP TABLE IF EXISTS `provider`;
CREATE TABLE IF NOT EXISTS `provider` (
  `prov_id` int(11) NOT NULL AUTO_INCREMENT,
  `prov_ref` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prov_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `prov_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prov_phone` int(11) NOT NULL,
  PRIMARY KEY (`prov_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `provide`
--
ALTER TABLE `provide`
  ADD CONSTRAINT `FK_19977798FBD8A061` FOREIGN KEY (`prov_id`) REFERENCES `provider` (`prov_id`),
  ADD CONSTRAINT `FK_199777981C83F75` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
