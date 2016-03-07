-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 04 Mars 2016 à 16:31
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

--
-- Vider la table avant d'insérer `product`
--

TRUNCATE TABLE `product`;
--
-- Contenu de la table `product`
--

INSERT DELAYED IGNORE INTO `product` (`prod_id`, `prod_ref`, `prod_name`, `prod_cat`, `prod_desc`, `prod_state`, `prod_picture`, `prod_qty`, `prod_qty_defect`) VALUES
(1, 'ref124', 'T-shirt', 'vetements', 'Un T-shirt bleu taille L', 'neuf', 'vetement1.jpg', 10, 3),
(2, 'ref524', 'Sweat', 'vetements', 'Sweat jaune taille S', 'occasion', 'vetement2.jpg', 3, 0),
(3, 'ref684', 'Naruto', 'deguisements', 'Déguisement de Naruto', 'neuf', 'naruto.jpg', 5, 1),
(4, 'ref963', 'Superman', 'deguisements', 'Déguisement de Superman', 'neuf', 'superman.jpg', 2, 0),
(5, 'ref456', 'Assassin creed', 'jeux', 'Assassin creed 2', 'neuf', 'assassin.jpg', 3, 0),
(6, 'ref458', 'Super mario', 'jeux', 'Super Mario Bros', 'neuf', 'supermario.jpg', 1, 5),
(7, 'ref546', 'Geek Art', 'livres', 'Livre d''art sur des supers héros et la culture geek', 'neuf', 'geekart.jpg', 5, 0),
(8, 'ref586', 'No:pasaran', 'livres', 'Livre de jeux vidéos', 'occasion', 'nopasaran.jpg', 9, 0),
(9, 'ref517', 'Goldorak', 'dvd', 'Goldorak saison 3', 'occasion', 'goldorak.jpg', 2, 7),
(10, 'ref817', 'Batman Begin', 'dvd', 'Batman Begin', 'neuf', 'batman.jpg', 6, 0),
(11, 'ref967', 'Naruto', 'cd', 'Musique de naruto saison 3', 'neuf', 'naruto', 1, 0),
(12, 'ref917', 'Albator', 'cd', 'Musique d''albator', 'neuf', 'albator.jpg', 1, 0),
(13, 'ref012', 'Assassin Creed', 'figurines', 'Figurine d''assassin', 'neuf', 'assassin.jpg', 1, 0),
(14, 'ref012', 'Luigi', 'figurines', 'Figurine d''luigi', 'neuf', 'luigi.jpg', 1, 0),
(15, 'ref034', 'Magic', 'cartes', 'Cartes de pouvoir', 'occasion', 'magic.jpg', 1, 3),
(16, 'ref034', 'Munchkin', 'cartes', 'Cartes de jeu de rôle', 'neuf', 'munchkin.jpg', 1, 3);

--
-- Vider la table avant d'insérer `provide`
--

TRUNCATE TABLE `provide`;
--
-- Contenu de la table `provide`
--

INSERT DELAYED IGNORE INTO `provide` (`prod_id`, `prov_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 3),
(5, 2),
(6, 2),
(7, 3),
(8, 2),
(9, 1),
(10, 2),
(11, 3),
(12, 2),
(13, 2),
(14, 1),
(15, 1),
(16, 2);

--
-- Vider la table avant d'insérer `provider`
--

TRUNCATE TABLE `provider`;
--
-- Contenu de la table `provider`
--

INSERT DELAYED IGNORE INTO `provider` (`prov_id`, `prov_ref`, `prov_name`, `prov_type`, `prov_phone`) VALUES
(1, 'prov689', 'Tartenpion', 'entreprise', 152883627),
(2, 'prov547', 'Dupond', 'particulier', 245786321),
(3, 'prov637', 'Durand', 'entreprise', 345782193);

--
-- Vider la table avant d'insérer `user`
--

TRUNCATE TABLE `user`;
--
-- Contenu de la table `user`
--

INSERT DELAYED IGNORE INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `firstname`, `lastname`) VALUES
(8, 'admin', 'admin', 'admin@ad.com', 'admin@ad.com', 1, 'si0e12bp3mogokc8wo84484k8c0ogg8', 'hEPnhlZZn/4Ai4cbI/OcZnD4s05Z2daIdUcZYiGX9oW4JTh49f8W3sCOsNRFTTi6IuQXTuDGcS0nfXYXsfQ00Q==', '2016-03-04 16:27:40', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'Fred', 'Moi'),
(10, 'jgore', 'jgore', 'jgore@pokenantes.fr', 'jgore@pokenantes.fr', 1, 'ccrd649flfwo404swg4444c0wok0cg8', 'xxdnj1JNgnldDC8ub8rfIDmDhvV/gU+RnnH7m0o0CCASUulfdOV4MziCJIrJSlz3m8wOp6JHrftEZCOjMjhAXA==', '2016-03-04 16:17:43', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Julien', 'Gore'),
(11, 'mgore', 'mgore', 'mgore@pokenantes.fr', 'mgore@pokenantes.fr', 1, 'hs14gq1cgdckk8g4ss0s4wss80wc8c8', 'mcu5MIoSisJ4RWViiuVrxZqGURrppD7F15xo9Utib70Kr6ST9vlGV3eSqnW1nQsDE8QrMYAIl0/ROPcZ3PUwgg==', '2016-03-04 16:18:25', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Mathieu', 'Gore');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
