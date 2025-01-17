-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 18 déc. 2024 à 14:59
-- Version du serveur : 8.0.40-0ubuntu0.22.04.1
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `atelier`
--

-- --------------------------------------------------------

--
-- Structure de la table `larbin`
--

CREATE TABLE `larbin` (
  `id_larbin` int NOT NULL,
  `nom_larbin` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `genre_larbin` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `image_larbin` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `larbin`
--

INSERT INTO `larbin` (`id_larbin`, `nom_larbin`, `genre_larbin`, `image_larbin`) VALUES
(17, 'krevravava', 'M', 'homme1.png'),
(18, 'najigmi', 'M', 'homme0.png'),
(19, 'xoxzyquy', 'F', 'femme0.png'),
(20, 'mishuzyshu', 'F', 'femme0.png'),
(21, 'chozykre', 'F', 'femme0.png'),
(22, 'hyzu', 'F', 'femme0.png'),
(23, 'chovavragha', 'M', 'homme1.png'),
(24, 'zyhyhy', 'M', 'homme0.png'),
(25, 'jigmighaquy', 'M', 'homme0.png'),
(26, 'jighyvashu', 'M', 'homme1.png'),
(27, 'krezumilo', 'M', 'homme1.png'),
(28, 'hymishushu', 'F', 'femme0.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `larbin`
--
ALTER TABLE `larbin`
  ADD PRIMARY KEY (`id_larbin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `larbin`
--
ALTER TABLE `larbin`
  MODIFY `id_larbin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
