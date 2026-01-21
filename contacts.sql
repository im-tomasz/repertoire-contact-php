-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : mer. 21 jan. 2026 à 15:55
-- Version du serveur : 8.0.44
-- Version de PHP : 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `contacts`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `telephone` int DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_groupe` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `nom`, `prenom`, `dateNaissance`, `telephone`, `email`, `id_groupe`) VALUES
(1, 'Kelevra', 'Slevin', '1985-03-20', 625256617, 'chienmechant@gmail.com', 1),
(8, 'Landa', 'Hans', '1956-10-04', 637919036, 'hans.landa@iiireich.de', 2),
(9, 'Le', 'Loup', '0006-06-06', 666666666, 'lamort@afpa.fr', 2),
(10, 'Annatar', 'Sauron', '0001-06-03', 667513687, 'seigneurtenebreuxdu34@mordor.eng', 2),
(11, 'Unchained', 'Django', '1783-12-13', 678469375, 'fauteurdetrouble@metis.fr', 1),
(12, 'Gamgee', 'Sam', '0142-06-14', 689566738, 'levraihero@comte.fr', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact_interet`
--

CREATE TABLE `contact_interet` (
  `id_contact` int NOT NULL,
  `id_interet` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact_interet`
--

INSERT INTO `contact_interet` (`id_contact`, `id_interet`) VALUES
(10, 1),
(8, 2),
(10, 2),
(1, 3),
(10, 3),
(11, 3),
(12, 3),
(1, 4),
(11, 4),
(8, 5),
(9, 6),
(11, 9),
(12, 9),
(1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id_groupe` int NOT NULL,
  `nomGroupe` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id_groupe`, `nomGroupe`) VALUES
(1, 'Gentils'),
(2, 'Méchants');

-- --------------------------------------------------------

--
-- Structure de la table `interet`
--

CREATE TABLE `interet` (
  `id_interet` int NOT NULL,
  `nomInteret` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `interet`
--

INSERT INTO `interet` (`id_interet`, `nomInteret`) VALUES
(1, 'Créer des anneaux'),
(2, 'Imposer une dictature'),
(3, 'Tuer ses ennemis'),
(4, 'Se venger'),
(5, 'Apprendre des langues'),
(6, 'Récupérer son dû'),
(9, 'Se battre pour la liberté'),
(10, 'Faire des blagues auxquelles personne ne rigole');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `TEST` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `pseudo` varchar(40) NOT NULL,
  `password` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`),
  ADD KEY `id_groupe` (`id_groupe`);

--
-- Index pour la table `contact_interet`
--
ALTER TABLE `contact_interet`
  ADD PRIMARY KEY (`id_contact`,`id_interet`),
  ADD KEY `id_interet` (`id_interet`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_groupe`);

--
-- Index pour la table `interet`
--
ALTER TABLE `interet`
  ADD PRIMARY KEY (`id_interet`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`TEST`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `uniqueEmail` (`email`),
  ADD UNIQUE KEY `uniquePseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id_groupe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `interet`
--
ALTER TABLE `interet`
  MODIFY `id_interet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `TEST` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id_groupe`);

--
-- Contraintes pour la table `contact_interet`
--
ALTER TABLE `contact_interet`
  ADD CONSTRAINT `contact_interet_ibfk_1` FOREIGN KEY (`id_contact`) REFERENCES `contact` (`id_contact`),
  ADD CONSTRAINT `contact_interet_ibfk_2` FOREIGN KEY (`id_interet`) REFERENCES `interet` (`id_interet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
