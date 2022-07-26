-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 08 juil. 2021 à 15:59
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp`
--

-- --------------------------------------------------------

--
-- Structure de la table `epreuve`
--

DROP TABLE IF EXISTS `epreuve`;
CREATE TABLE IF NOT EXISTS `epreuve` (
  `NumEpreuve` int(11) NOT NULL,
  `CodeMat` varchar(25) NOT NULL,
  `Date_Epreuve` date NOT NULL,
  `Lieu` varchar(255) NOT NULL,
  PRIMARY KEY (`NumEpreuve`),
  KEY `CodeMat` (`CodeMat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `epreuve`
--

INSERT INTO `epreuve` (`NumEpreuve`, `CodeMat`, `Date_Epreuve`, `Lieu`) VALUES
(1, 'Algo', '2021-02-17', 'Amphi1'),
(2, 'Analyse', '2021-03-19', 'E4'),
(3, 'BTNU', '2021-05-20', 'Salle Conf'),
(4, 'POO', '2021-03-31', 'Amphi');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `NumEtud` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Date_de_naissance` date NOT NULL,
  `Rue` varchar(25) NOT NULL,
  `Cp` varchar(25) NOT NULL,
  `Ville` varchar(25) NOT NULL,
  PRIMARY KEY (`NumEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`NumEtud`, `Nom`, `Prenom`, `Date_de_naissance`, `Rue`, `Cp`, `Ville`) VALUES
(1010, 'Habibou', 'Boubacar ', '1998-01-01', 'Niamey', '2222', 'Niamey'),
(32000, 'Illiassou', 'Chaibou Yahaya', '2001-08-04', 'Sonuci', 'SN', 'Niamey'),
(32001, 'Rahinatou', 'Adamoou Hamidou', '1998-01-01', 'Yantala', 'YT', 'Niamey'),
(32002, 'Aboubacar', 'Nomao Dawa', '1998-01-01', 'Lazaret', '8001', 'Niamey'),
(32003, 'Abdoul-Razak', 'Dalatou Malam Mamane', '2000-01-01', 'Dar-es-Salam', 'DS', 'Niamey'),
(32004, 'Narcisse', 'Mitokpe Obadiah', '1999-01-01', 'La cabane', 'CB', 'Niamey');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `CodeMat` varchar(25) NOT NULL,
  `Libelle` varchar(25) NOT NULL,
  `Coef` float NOT NULL,
  PRIMARY KEY (`CodeMat`),
  KEY `CodeMat` (`CodeMat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`CodeMat`, `Libelle`, `Coef`) VALUES
('Algo', 'Algorithme et prog', 5),
('Analyse', 'Anayse', 2),
('BTNU', 'Transmission', 5),
('POO', 'Programmation objet', 4);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `NumEtud` int(11) NOT NULL,
  `NumEpreuve` int(11) NOT NULL,
  `note` float NOT NULL,
  KEY `NumEtud` (`NumEtud`),
  KEY `NumEpreuve` (`NumEpreuve`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`NumEtud`, `NumEpreuve`, `note`) VALUES
(32003, 2, 10),
(32003, 3, 13),
(32003, 4, 16),
(32002, 1, 12),
(32002, 2, 15),
(32002, 3, 10),
(32002, 4, 11),
(32000, 1, 7),
(32000, 2, 10),
(32000, 3, 14),
(32000, 4, 19),
(32000, 4, 20),
(32001, 1, 14),
(32001, 2, 14),
(32001, 3, 13),
(32001, 4, 15),
(32004, 1, 13),
(32004, 2, 18),
(32004, 4, 10),
(32004, 3, 11),
(32004, 3, 8);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `epreuve`
--
ALTER TABLE `epreuve`
  ADD CONSTRAINT `epreuve_ibfk_1` FOREIGN KEY (`CodeMat`) REFERENCES `matiere` (`CodeMat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`NumEtud`) REFERENCES `etudiant` (`NumEtud`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`NumEpreuve`) REFERENCES `epreuve` (`NumEpreuve`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
