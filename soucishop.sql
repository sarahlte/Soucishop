-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 jan. 2024 à 13:09
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `soucishop`
--

-- --------------------------------------------------------

--
-- Structure de la table `aliment`
--

DROP TABLE IF EXISTS `aliment`;
CREATE TABLE IF NOT EXISTS `aliment` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `poids` int NOT NULL,
  `calories` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `aliment`
--

INSERT INTO `aliment` (`id`, `nom`, `poids`, `calories`) VALUES
(1, 'Avocat', 100, 160),
(2, 'Saumon', 100, 184),
(3, 'Fromage', 100, 342),
(4, 'Thon', 100, 132),
(5, 'Crevette', 100, 94),
(6, 'Riz', 100, 130),
(7, 'Vinaigre de riz', 100, 30);

-- --------------------------------------------------------

--
-- Structure de la table `aliment_produit`
--

DROP TABLE IF EXISTS `aliment_produit`;
CREATE TABLE IF NOT EXISTS `aliment_produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `aliment_id` int UNSIGNED NOT NULL,
  `produit_id` int UNSIGNED NOT NULL,
  `nb` int DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `aliment_produit_aliment_id_foreign` (`aliment_id`),
  KEY `aliment_produit_produit_id_foreign` (`produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `aliment_produit`
--

INSERT INTO `aliment_produit` (`id`, `aliment_id`, `produit_id`, `nb`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 5),
(3, 1, 3, 2),
(4, 5, 6, 12),
(5, 3, 3, 2),
(6, 6, 1, 14),
(7, 6, 2, 14),
(8, 6, 3, 14),
(9, 6, 4, 18),
(10, 6, 5, 18),
(11, 6, 6, 18),
(12, 2, 1, 5),
(13, 2, 3, 3),
(14, 2, 4, 12),
(15, 4, 5, 12),
(16, 7, 2, 1),
(17, 7, 4, 1),
(18, 7, 5, 1),
(19, 7, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `prix_total` float NOT NULL,
  `prix_achat` float NOT NULL,
  `livraison` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `recu` date DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adresse` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `code_postal` int DEFAULT NULL,
  `ville` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `complement_d_adresse` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `produits` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `date`, `prix_total`, `prix_achat`, `livraison`, `recu`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `complement_d_adresse`, `produits`) VALUES
(10, '2024-01-29', 3.8, 0, 'false', NULL, 'user', 'user', NULL, NULL, NULL, NULL, '1 x Crispy Avocado Roll - 1.9€ </br>1 x Salmon Avocado Roll - 1.9€ </br>'),
(11, '2024-01-29', 3.8, 0, 'false', '2024-01-29', 'user', 'user', NULL, NULL, NULL, NULL, '1 x Crispy Avocado Roll - 1.9€ </br>1 x Salmon Avocado Roll - 1.9€ </br>'),
(12, '2024-01-29', 20.4, 0, 'false', NULL, 'user', 'user', NULL, NULL, NULL, NULL, '4 x Shrimp sushi - 6.8€ </br>4 x Tuna sushi - 6.8€ </br>5 x Salmon Sushi - 8.5€ </br>'),
(13, '2024-01-29', 20.4, 0, 'false', NULL, 'user', 'user', NULL, NULL, NULL, NULL, '4 x Shrimp sushi - 6.8€ </br>4 x Tuna sushi - 6.8€ </br>5 x Salmon Sushi - 8.5€ </br>'),
(14, '2024-01-29', 14.2, 0, 'false', NULL, 'user', 'user', NULL, NULL, NULL, NULL, '11 x Roll Salmon Cheese Avocado - 20.9€ </br>1 x Roll - 10.2€ </br>'),
(15, '2024-01-29', 14.2, 0, 'false', NULL, 'user', 'user', NULL, NULL, NULL, NULL, '11 x Roll Salmon Cheese Avocado - 20.9€ </br>1 x Roll - 10.2€ </br>'),
(16, '2024-01-29', 5.1, 0, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '2 x Tuna sushi - 3.4€ </br>1 x Shrimp sushi - 1.7€ </br>'),
(17, '2024-01-29', 5.1, 0, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '2 x Tuna sushi - 3.4€ </br>1 x Shrimp sushi - 1.7€ </br>'),
(18, '2024-01-29', 19.2, 0, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '1 x Sushi - 9€ </br>1 x Roll - 10.2€ </br>'),
(19, '2024-01-29', 19.2, 0, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '1 x Sushi - 9€ </br>1 x Roll - 10.2€ </br>'),
(20, '2024-01-29', 19.2, 0, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '1 x Sushi - 9€ </br>1 x Roll - 10.2€ </br>'),
(21, '2024-01-29', 19.2, 0, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '1 x Sushi - 9€ </br>1 x Roll - 10.2€ </br>'),
(22, '2024-01-29', 18, 0, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '2 x Sushi - 18€ </br>'),
(23, '2024-01-29', 18, 0, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '2 x Sushi - 18€ </br>'),
(24, '2024-01-29', 20.4, 0, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '2 x Roll - 20.4€ </br>'),
(25, '2024-01-29', 20.4, 0, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '2 x Roll - 20.4€ </br>'),
(26, '2024-01-29', 5.5, 0, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '2 x Crispy Avocado Roll - 3.8€ </br>1 x Salmon Sushi - 1.7€ </br>'),
(27, '2024-01-29', 5.5, 0, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '2 x Crispy Avocado Roll - 3.8€ </br>1 x Salmon Sushi - 1.7€ </br>'),
(28, '2024-01-30', 24.8, 10, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '1 x Tuna sushi - 1.7€ </br>2 x Shrimp sushi - 3.4€ </br>1 x Salmon Sushi - 1.7€ </br>2 x Sushi - 18€ </br>'),
(31, '2024-01-30', 28.2, 10.2, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '2 x Salmon Sushi - 3.4€ </br>2 x Tuna sushi - 3.4€ </br>2 x Shrimp sushi - 3.4€ </br>2 x Sushi - 18€ </br>'),
(32, '2024-01-30', 20, 5.5, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '1 x Roll - 10.2€ </br>1 x Salmon - 9.8€ </br>'),
(33, '2024-01-30', 20, 5.5, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '1 x Roll - 10.2€ </br>1 x Salmon - 9.8€ </br>'),
(35, '2024-01-30', 29.8, 5.7, 'false', NULL, 'admin', 'admin', NULL, NULL, NULL, NULL, '2 x Salmon - 19.6€ </br>1 x Roll - 10.2€ </br>');

-- --------------------------------------------------------

--
-- Structure de la table `commande_reduction`
--

DROP TABLE IF EXISTS `commande_reduction`;
CREATE TABLE IF NOT EXISTS `commande_reduction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `commande_id` int NOT NULL,
  `reduction_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `commande_reduction_commande_id_foreign_key` (`commande_id`),
  KEY `commande_reduction_reduction_id_foreign_key` (`reduction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande_utilisateur`
--

DROP TABLE IF EXISTS `commande_utilisateur`;
CREATE TABLE IF NOT EXISTS `commande_utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `commande_id` int NOT NULL,
  `utilisateur_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `commande_utilisateur_commande_id_foreign_key` (`commande_id`),
  KEY `commande_utilisateur_utilisateur_id_foreign_key` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande_utilisateur`
--

INSERT INTO `commande_utilisateur` (`id`, `commande_id`, `utilisateur_id`) VALUES
(4, 13, 8),
(5, 15, 8),
(6, 17, 7),
(7, 19, 7),
(8, 21, 7),
(9, 23, 7),
(10, 25, 7),
(11, 27, 7),
(13, 31, 7),
(14, 33, 7),
(16, 35, 7);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(64) NOT NULL,
  `message` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) NOT NULL,
  `prix` double NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `nom`, `prix`, `image1`, `image2`, `image3`) VALUES
(1, 'Salmon', 9.8, 'menu1.jpg\r\n', 'menu2.jpg', 'menu3.jpg'),
(2, 'Roll', 10.2, 'menu4.jpg', 'menu5.jpg', 'menu6.jpg'),
(3, 'Sushi', 9, 'menu7.jpg', 'menu8.jpg', 'menu9.jpg'),
(7, 'zdaad', 12, 'menu.png', 'menu2.jpg', 'maki.png'),
(8, 'zdaad', 12, 'menu2.jpg', 'menu.png', 'maki.png'),
(9, 'zdaad', 12, 'menu2.jpg', 'menu.png', 'maki.png'),
(10, 'zdaad', 12, 'menu2.jpg', 'menu.png', 'maki.png'),
(11, 'zdaad', 12, 'menu2.jpg', 'menu.png', 'maki.png'),
(12, 'zdaad', 12, 'menu2.jpg', 'menu.png', 'maki.png'),
(13, 'zdaad', 12, 'menu2.jpg', 'menu.png', 'maki.png');

-- --------------------------------------------------------

--
-- Structure de la table `menu_produit`
--

DROP TABLE IF EXISTS `menu_produit`;
CREATE TABLE IF NOT EXISTS `menu_produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `produit_id` int UNSIGNED NOT NULL,
  `nb` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_produit_menu_id_foreign_key` (`menu_id`),
  KEY `menu_produit_produit_id_foreign_key` (`produit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `menu_produit`
--

INSERT INTO `menu_produit` (`id`, `menu_id`, `produit_id`, `nb`) VALUES
(1, 2, 1, 2),
(2, 2, 2, 2),
(3, 2, 3, 2),
(8, 1, 1, 2),
(10, 1, 3, 2),
(12, 1, 4, 2),
(14, 3, 4, 2),
(16, 3, 5, 2),
(18, 3, 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(150) NOT NULL,
  `categorie` varchar(64) NOT NULL,
  `prix_achat` double NOT NULL,
  `prix_vente` double NOT NULL,
  `nom` varchar(50) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `description`, `categorie`, `prix_achat`, `prix_vente`, `nom`, `img1`, `img2`, `img3`) VALUES
(1, '', 'roll', 0.95, 1.9, 'Salmon Avocado Roll', 'roll-salmon.jpg', '', ''),
(2, '', 'roll', 0.95, 1.9, 'Crispy Avocado Roll', 'crispy-avocado.jpg', '', ''),
(3, '', 'roll', 0.95, 1.9, 'Roll Salmon Cheese Avocado', 'salmon-avocado.jpg', '', ''),
(4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quos fugit accusantium, quidem autem animi modi quo distinctio possimus ut!', 'sushi', 0.85, 1.7, 'Salmon Sushi', 'sushi-saumon.png', '', ''),
(5, '', 'sushi', 0.85, 1.7, 'Tuna sushi', 'sushi-thon.png', '', ''),
(6, '', 'sushi', 0.85, 1.7, 'Shrimp sushi', 'sushi-crevette.png', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `reduction`
--

DROP TABLE IF EXISTS `reduction`;
CREATE TABLE IF NOT EXISTS `reduction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  `valeur` int NOT NULL,
  `effectif` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reduction`
--

INSERT INTO `reduction` (`id`, `code`, `type`, `valeur`, `effectif`) VALUES
(1, 'NEW-2024', 'pourcentage', 20, 'oui'),
(2, 'WELCOME-2024', 'reduction', 15, 'non');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `password`, `role`) VALUES
(7, 'admin', 'admin', 'admin@admin.com', '$2y$10$wim0kgHLGV5aooccwMIA4OEZRDGtgwcvTn0sS7EWgbmP1WWEu74jW', 'admin'),
(8, 'user', 'user', 'user@user.com', '$2y$10$Pbr3Nl7nY.OVnfVZe3EOceKZB2luNEcRxuDhW.i3tC5JCHZS55GkW', 'user');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `aliment_produit`
--
ALTER TABLE `aliment_produit`
  ADD CONSTRAINT `aliment_produit_aliment_id_foreign` FOREIGN KEY (`aliment_id`) REFERENCES `aliment` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `aliment_produit_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `commande_reduction`
--
ALTER TABLE `commande_reduction`
  ADD CONSTRAINT `commande_reduction_commande_foreign_key` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `commande_reduction_reduction_foreign_key` FOREIGN KEY (`reduction_id`) REFERENCES `reduction` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `commande_utilisateur`
--
ALTER TABLE `commande_utilisateur`
  ADD CONSTRAINT `commande_utilisateur_commande_foreign_key` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `commande_utilisateur_utilisateur_foreign_key` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `menu_produit`
--
ALTER TABLE `menu_produit`
  ADD CONSTRAINT `menu_produit_menu_id_foreign_key` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `menu_produit_produit_id_foreign_key` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
