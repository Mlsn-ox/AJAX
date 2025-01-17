-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 09 jan. 2025 à 14:15
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
-- Base de données : `ostrich_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `ostrich`
--

CREATE TABLE `ostrich` (
  `ostrich_id` int NOT NULL,
  `ostrich_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `ostrich_sex` tinyint(1) NOT NULL,
  `ostrich_birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ostrich`
--

INSERT INTO `ostrich` (`ostrich_id`, `ostrich_name`, `ostrich_sex`, `ostrich_birthdate`) VALUES
(1, 'Magalie', 0, '2010-10-10'),
(2, 'Ivan', 1, '2023-03-03'),
(3, 'Eugène', 1, '2015-05-05'),
(4, 'Hariette', 0, '2018-08-08'),
(6, 'Anto', 1, '2024-04-04'),
(9, 'Marissa', 0, '2022-02-02'),
(10, 'Bouyou', 1, '2021-01-01'),
(11, 'Habibi', 1, '2016-06-06'),
(12, 'Emmanuelle', 0, '2019-09-09'),
(13, 'Mathieu', 1, '1989-12-07');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ostrich`
--
ALTER TABLE `ostrich`
  ADD PRIMARY KEY (`ostrich_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ostrich`
--
ALTER TABLE `ostrich`
  MODIFY `ostrich_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
