-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 01 fév. 2023 à 10:03
-- Version du serveur : 8.0.32
-- Version de PHP : 7.4.3-4ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `marieteam`
--

-- --------------------------------------------------------

--
-- Structure de la table `bateau`
--

CREATE TABLE `bateau` (
  `id_bateau` int NOT NULL,
  `libelle_bateau` varchar(50) NOT NULL,
  `longueur` double DEFAULT NULL,
  `largeur` double DEFAULT NULL,
  `vitesse` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bateau`
--

INSERT INTO `bateau` (`id_bateau`, `libelle_bateau`, `longueur`, `largeur`, `vitesse`) VALUES
(11, 'Luce isle', 37.2, 8.6, 26),
(2, 'Al\' xi', 25, 7, 16),
(45, 'Shuwawa', 34, 9, 19),
(23, 'Queen Mama', 40, 10, 11);

--
-- Déclencheurs `bateau`
--
DELIMITER $$
CREATE TRIGGER `bateau_check_largeur_insert` BEFORE INSERT ON `bateau` FOR EACH ROW SET NEW.`largeur` = IF (NEW.`largeur` > 0 , NEW.`largeur`, NULL)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bateau_check_longueur_insert` BEFORE INSERT ON `bateau` FOR EACH ROW SET NEW.`longueur` = IF (NEW.`longueur` > 0 , NEW.`longueur`, NULL)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bateau_check_vitesse_insert` BEFORE INSERT ON `bateau` FOR EACH ROW SET NEW.`vitesse` = IF (NEW.`vitesse` > 0 , NEW.`vitesse`, NULL)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_update_bateau_largeur` BEFORE UPDATE ON `bateau` FOR EACH ROW SET NEW.`largeur` = IF(NEW.`largeur` > 0 , NEW.`largeur` , NULL)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_update_bateau_longueur` BEFORE UPDATE ON `bateau` FOR EACH ROW SET NEW.`longueur` = IF(NEW.`longueur` > 0 , NEW.`longueur` , NULL)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_update_bateau_vitesse` BEFORE UPDATE ON `bateau` FOR EACH ROW SET NEW.`vitesse` = IF(NEW.`vitesse` > 0 , NEW.`vitesse` , NULL)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `bateaufret`
--

CREATE TABLE `bateaufret` (
  `id_bateau` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bateauvoyageur`
--

CREATE TABLE `bateauvoyageur` (
  `id_bateau` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bateauvoyageur`
--

INSERT INTO `bateauvoyageur` (`id_bateau`) VALUES
(30),
(31),
(32);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int NOT NULL,
  `libelle_categorie` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `libelle_categorie`) VALUES
(1, 'A - Passager'),
(2, 'B - V?h.inf.2m'),
(3, 'C - V?h.sup.2m');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `id_categorie` int NOT NULL,
  `id_bateau` int NOT NULL,
  `capacit?Max` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `enregistrer`
--

CREATE TABLE `enregistrer` (
  `id_categorie` int NOT NULL,
  `id_type` int NOT NULL,
  `id_reservation` int NOT NULL,
  `quantit` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipement` int NOT NULL,
  `id_bateau` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id_equipement` int NOT NULL,
  `libelle_equipement` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`id_equipement`, `libelle_equipement`) VALUES
(1, 'Acc?s Handicap'),
(2, 'Bar'),
(3, 'Pont Promenade'),
(4, 'Salon Vid'),
(5, 'Toilettes'),
(6, 'Restaurant'),
(7, 'Casino'),
(8, 'Chambres');

-- --------------------------------------------------------

--
-- Structure de la table `liaison`
--

CREATE TABLE `liaison` (
  `id_liaison` int NOT NULL,
  `distance` double NOT NULL,
  `port_depart` varchar(50) NOT NULL,
  `port_arrivee` varchar(50) NOT NULL,
  `id` int NOT NULL,
  `id_1` int NOT NULL,
  `id_secteur` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `liaison`
--

INSERT INTO `liaison` (`id_liaison`, `distance`, `port_depart`, `port_arrivee`, `id`, `id_1`, `id_secteur`) VALUES
(15, 8.3, 'Quiberon', 'Le Palais', 0, 0, 1),
(24, 9, 'Le Palais', 'Quiberon', 0, 0, 1),
(16, 8, 'Quiberon', 'Sauzon', 0, 0, 1),
(17, 7.9, 'Sauzon', 'Quiberon', 0, 0, 1),
(19, 23.7, 'Vannes', 'Le Palais', 0, 0, 1),
(11, 25.1, 'Le Palais', 'Vannes', 0, 0, 1),
(25, 8.8, 'Quiberon', 'Port St Gildas', 0, 0, 2),
(30, 8.8, 'Port St Gildas', 'Quiberon', 0, 0, 2),
(21, 7.7, 'Lorient', 'Port-Tudy', 0, 0, 3),
(22, 7.4, 'Port-Tudy', 'Lorient', 0, 0, 3),
(43, 9.4, 'Quiberon', 'Hoedic', 0, 0, 4),
(62, 9.5, 'Hoedic', 'Quiberon', 0, 0, 4),
(97, 12.6, 'Lorient', 'Ile-de-Sein', 0, 0, 5),
(91, 12.9, 'Ile-de-Sein', 'Lorient', 0, 0, 5);

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `periode`
--

INSERT INTO `periode` (`id_periode`, `debut`, `fin`) VALUES
(1, '2022-09-16', '2023-05-31'),
(2, '2022-06-16', '2022-09-15'),
(3, '2021-09-01', '2022-06-15');

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

CREATE TABLE `port` (
  `id` int NOT NULL,
  `libelle` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `cp` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `id_traversee` int NOT NULL,
  `id_utilisateur` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

CREATE TABLE `secteur` (
  `id_secteur` int NOT NULL,
  `libelle_secteur` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`id_secteur`, `libelle_secteur`) VALUES
(1, 'Belle-Ile-en-Mer'),
(2, 'Houat'),
(3, 'Ile de Groix'),
(4, 'Hoedic'),
(5, 'Ile-de-Sein');

-- --------------------------------------------------------

--
-- Structure de la table `tarifer`
--

CREATE TABLE `tarifer` (
  `id_liaison` int NOT NULL,
  `id_categorie` int NOT NULL,
  `id_type` int NOT NULL,
  `id_periode` int NOT NULL,
  `tarif` decimal(15,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tarifer`
--

INSERT INTO `tarifer` (`id_liaison`, `id_categorie`, `id_type`, `id_periode`, `tarif`) VALUES
(15, 1, 1, 1, '18.00'),
(15, 2, 1, 1, '11.10'),
(15, 3, 1, 1, '5.60'),
(15, 4, 2, 1, '86.00'),
(15, 5, 2, 1, '129.00'),
(15, 6, 2, 1, '189.00'),
(15, 7, 3, 1, '204.99'),
(15, 8, 3, 1, '267.99'),
(15, 9, 3, 1, '100.00'),
(15, 10, 1, 2, '20.00'),
(15, 11, 1, 2, '13.00'),
(15, 12, 1, 2, '7.00'),
(15, 13, 2, 2, '90.00'),
(15, 14, 2, 2, '140.00'),
(15, 15, 2, 2, '200.00'),
(15, 16, 3, 2, '220.00'),
(15, 17, 3, 2, '290.00'),
(15, 18, 3, 2, '120.00'),
(15, 19, 1, 3, '17.00'),
(15, 20, 1, 3, '10.50'),
(15, 21, 1, 3, '4.80'),
(15, 22, 2, 3, '84.00'),
(15, 23, 2, 3, '120.00'),
(15, 24, 2, 3, '180.00'),
(15, 25, 3, 3, '200.00'),
(15, 26, 3, 3, '260.00'),
(15, 27, 3, 3, '95.00'),
(91, 53, 1, 1, '20.00'),
(91, 54, 1, 1, '16.40'),
(91, 28, 1, 1, '11.20'),
(91, 29, 2, 1, '101.40'),
(91, 30, 2, 1, '125.40'),
(91, 31, 2, 1, '147.00'),
(91, 32, 3, 1, '212.60'),
(91, 33, 3, 1, '246.00'),
(91, 34, 3, 1, '121.20'),
(91, 35, 1, 2, '24.50'),
(91, 36, 1, 2, '19.30'),
(91, 37, 1, 2, '22.00'),
(91, 38, 2, 2, '119.50'),
(91, 39, 2, 2, '137.00'),
(91, 40, 2, 2, '155.50'),
(91, 41, 3, 2, '229.50'),
(91, 42, 3, 2, '259.90'),
(91, 43, 3, 2, '154.00'),
(91, 44, 1, 3, '18.50'),
(91, 45, 1, 3, '14.00'),
(91, 46, 1, 3, '9.90'),
(91, 47, 2, 3, '187.50'),
(91, 48, 2, 3, '201.50'),
(91, 49, 2, 3, '210.30'),
(91, 50, 3, 3, '224.60'),
(91, 51, 3, 3, '234.00'),
(91, 52, 3, 3, '101.30'),
(22, 81, 1, 1, '15.40'),
(22, 82, 1, 1, '12.30'),
(22, 83, 1, 1, '8.50'),
(22, 84, 2, 1, '95.50'),
(22, 85, 2, 1, '114.00'),
(22, 86, 2, 1, '136.90'),
(22, 59, 3, 1, '150.00'),
(22, 60, 3, 1, '187.90'),
(22, 61, 3, 1, '102.30'),
(22, 62, 1, 2, '21.50'),
(22, 63, 1, 2, '17.00'),
(22, 64, 1, 2, '12.60'),
(22, 65, 2, 2, '112.40'),
(22, 66, 2, 2, '139.00'),
(22, 67, 2, 2, '151.00'),
(22, 68, 3, 2, '169.50'),
(22, 69, 3, 2, '184.00'),
(22, 70, 3, 2, '112.00'),
(22, 71, 1, 3, '16.50'),
(22, 72, 1, 3, '14.20'),
(22, 73, 1, 3, '11.00'),
(22, 74, 2, 3, '116.30'),
(22, 75, 2, 3, '140.00'),
(22, 76, 2, 3, '152.30'),
(22, 77, 2, 3, '166.00'),
(22, 78, 3, 3, '180.00'),
(22, 79, 3, 3, '195.50'),
(22, 80, 3, 3, '115.00');

--
-- Déclencheurs `tarifer`
--
DELIMITER $$
CREATE TRIGGER `CHECK_INSERT_tarif_prix` BEFORE INSERT ON `tarifer` FOR EACH ROW SET NEW.`tarif` = IF(NEW.`tarif` > 0 ,NEW.`tarif`, NULL)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `CHECK_UPDATE_tarif_prix` BEFORE UPDATE ON `tarifer` FOR EACH ROW SET NEW.`tarif` = IF(NEW.`tarif` > 0 ,NEW.`tarif`, NULL)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `traversee`
--

CREATE TABLE `traversee` (
  `id_traversee` int NOT NULL,
  `date_depart` date NOT NULL,
  `heure` time DEFAULT NULL,
  `id_liaison` int NOT NULL,
  `id_bateau` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déclencheurs `traversee`
--
DELIMITER $$
CREATE TRIGGER `traversee_CHECK_INSERT_id_bateau` BEFORE INSERT ON `traversee` FOR EACH ROW SET NEW.`id_bateau` = IF((SELECT `id_bateau` FROM `bateau` WHERE `id_bateau` = NEW.`id_bateau`)IS NOT NULL, NEW.`id_bateau`, NULL)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `traversee_CHECK_INSERT_id_liaison` BEFORE INSERT ON `traversee` FOR EACH ROW SET NEW.`id_liaison` = IF((SELECT `id_liaison` FROM `liaison` WHERE `id_liaison` = NEW.`id_liaison`)IS NOT NULL, NEW.`id_liaison`, NULL)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `traversee_CHECK_UPDATE_id_bateau` BEFORE UPDATE ON `traversee` FOR EACH ROW SET NEW.`id_bateau` = IF((SELECT `id_bateau` FROM `bateau` WHERE `id_bateau` = NEW.`id_bateau`)IS NOT NULL, NEW.`id_bateau`, NULL)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `traversee_CHECK_UPDATE_id_liaison` BEFORE UPDATE ON `traversee` FOR EACH ROW SET NEW.`id_liaison` = IF((SELECT `id_liaison` FROM `liaison` WHERE `id_liaison` = NEW.`id_liaison`)IS NOT NULL, NEW.`id_liaison`, NULL)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id_categorie` int NOT NULL,
  `id_type` int NOT NULL,
  `libelle_type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_categorie`, `id_type`, `libelle_type`) VALUES
(1, 1, 'A1 - Adulte'),
(1, 2, 'A2 - Junior 8 ? 18 ans'),
(1, 3, 'A3 - Enfant 0 ? 7 ans'),
(2, 4, 'B1 - Voiture long.inf.4m'),
(2, 5, 'B2 - Voiture long.inf.5m '),
(3, 6, 'C1 - Fourgon'),
(3, 7, 'C2 - Camping Car'),
(3, 8, 'C3 - Camion');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `code_postal` varchar(5) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `email`, `nom`, `prenom`, `adresse`, `ville`, `code_postal`, `password`) VALUES
(1, 'RaymondTuche@caramail.com', 'Tuche', 'Raymond', '41 Rue du Squal', 'Toulon', '83000', 'pikachu59'),
(2, 'FayraArnald@outlook.fr', 'Fayra', 'Arnald', '74 Avenu du guy', 'Saint-Etienne', '42100', 'calirelune77'),
(3, 'HugartCaliredu73@hotmail.fr', 'Hugart', 'Claire', '465 Rue de Loin', 'Albertville', '73200', 'montagnewow64');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bateau`
--
ALTER TABLE `bateau`
  ADD PRIMARY KEY (`id_bateau`),
  ADD UNIQUE KEY `libelle_bateau` (`libelle_bateau`);

--
-- Index pour la table `bateaufret`
--
ALTER TABLE `bateaufret`
  ADD PRIMARY KEY (`id_bateau`);

--
-- Index pour la table `bateauvoyageur`
--
ALTER TABLE `bateauvoyageur`
  ADD PRIMARY KEY (`id_bateau`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`),
  ADD UNIQUE KEY `libelle_categorie` (`libelle_categorie`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`id_categorie`,`id_bateau`),
  ADD KEY `id_bateau` (`id_bateau`);

--
-- Index pour la table `enregistrer`
--
ALTER TABLE `enregistrer`
  ADD PRIMARY KEY (`id_categorie`,`id_type`,`id_reservation`),
  ADD KEY `id_reservation` (`id_reservation`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipement`,`id_bateau`),
  ADD KEY `id_bateau` (`id_bateau`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id_equipement`),
  ADD UNIQUE KEY `libelle_equipement` (`libelle_equipement`);

--
-- Index pour la table `liaison`
--
ALTER TABLE `liaison`
  ADD PRIMARY KEY (`id_liaison`),
  ADD KEY `id` (`id`),
  ADD KEY `id_1` (`id_1`),
  ADD KEY `id_secteur` (`id_secteur`);

--
-- Index pour la table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Index pour la table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_traversee` (`id_traversee`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `secteur`
--
ALTER TABLE `secteur`
  ADD PRIMARY KEY (`id_secteur`),
  ADD UNIQUE KEY `libelle_secteur` (`libelle_secteur`);

--
-- Index pour la table `tarifer`
--
ALTER TABLE `tarifer`
  ADD PRIMARY KEY (`id_liaison`,`id_categorie`,`id_type`,`id_periode`),
  ADD KEY `id_categorie` (`id_categorie`,`id_type`),
  ADD KEY `id_periode` (`id_periode`);

--
-- Index pour la table `traversee`
--
ALTER TABLE `traversee`
  ADD PRIMARY KEY (`id_traversee`),
  ADD KEY `id_liaison` (`id_liaison`),
  ADD KEY `id_bateau` (`id_bateau`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_categorie`,`id_type`),
  ADD UNIQUE KEY `libelle_type` (`libelle_type`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
