-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 15 jan. 2025 à 11:05
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `makeyourautruche`
--

-- --------------------------------------------------------

--
-- Structure de la table `autruche`
--

CREATE TABLE `autruche` (
  `autruche_id` int(11) NOT NULL,
  `autruche_nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `autruche`
--

INSERT INTO `autruche` (`autruche_id`, `autruche_nom`) VALUES
(1, 'YAya'),
(2, 'YAya'),
(3, 'Yuyu'),
(4, 'Yéyé'),
(5, 'Yéyé'),
(6, 'Yéyé'),
(7, 'Yéyé'),
(8, 'Yéyé'),
(9, 'Yéyé'),
(10, 'Yéyé'),
(11, 'Yéyé');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `autruche`
--
ALTER TABLE `autruche`
  ADD PRIMARY KEY (`autruche_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `autruche`
--
ALTER TABLE `autruche`
  MODIFY `autruche_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
