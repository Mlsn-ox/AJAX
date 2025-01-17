-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 17 jan. 2025 à 14:50
-- Version du serveur : 8.0.40-0ubuntu0.22.04.1
-- Version de PHP : 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `protheseus`
--

-- --------------------------------------------------------

--
-- Structure de la table `protheses`
--

CREATE TABLE `protheses` (
  `id` int NOT NULL,
  `materiau` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type_fixation` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `marque` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `protheses`
--

INSERT INTO `protheses` (`id`, `materiau`, `type_fixation`, `marque`) VALUES
(1, 'Titane', 'Cimentée', 'Zimmer Biomet'),
(2, 'Céramique', 'Non cimentée', 'Stryker'),
(3, 'Polyéthylène', 'Hybride', 'DePuy Synthes'),
(4, 'Acier inoxydable', 'Cimentée', 'Smith & Nephew'),
(5, 'Titane', 'Non cimentée', 'Biomet'),
(6, 'Céramique', 'Hybride', 'Medacta'),
(7, 'Polyéthylène', 'Hybride', 'Smith & Nephew'),
(8, 'Acier inoxydable', 'SuperGlu', 'Biomet'),
(9, 'Titane', 'Scotch', 'Biomet'),
(10, 'Céramique', 'Hybride', 'Smith & Nephew');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `protheses`
--
ALTER TABLE `protheses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `protheses`
--
ALTER TABLE `protheses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
