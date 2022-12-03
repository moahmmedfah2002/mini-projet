-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 26 nov. 2022 à 19:18
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `miniprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `actvt`
--

CREATE TABLE `actvt` (
  `id-actvt` int(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `actvt-resrv-actvt`
--

CREATE TABLE `actvt-resrv-actvt` (
  `id-resrv-actv` int(255) NOT NULL,
  `id-acvt` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `actvt-vil`
--

CREATE TABLE `actvt-vil` (
  `id-actvt` int(255) NOT NULL,
  `id-vil` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `bang`
--

CREATE TABLE `bang` (
  `num-B` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `equipement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `num-ch` int(255) NOT NULL,
  `type-ch` varchar(255) NOT NULL,
  `equipement-ch` varchar(255) NOT NULL,
  `prix-ch` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id-client` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numTel` int(255) NOT NULL,
  `Date-N` date NOT NULL,
  `ID-REST-SEJ` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `client-serv`
--

CREATE TABLE `client-serv` (
  `id-client` int(255) NOT NULL,
  `id-serv` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `emp`
--

CREATE TABLE `emp` (
  `id-emp` int(255) NOT NULL,
  `nom-emp` varchar(255) NOT NULL,
  `prenom-emp` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE `hotel` (
  `id-h` int(255) NOT NULL,
  `adress-h` varchar(255) NOT NULL,
  `nombre-ch` int(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `num-ch` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `resrv-activite`
--

CREATE TABLE `resrv-activite` (
  `id-resrv-actv` int(255) NOT NULL,
  `nom-actvt` varchar(255) NOT NULL,
  `Horaire` date NOT NULL,
  `id-client` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `restoraion-sjr`
--

CREATE TABLE `restoraion-sjr` (
  `ID9-RSRV` int(11) NOT NULL,
  `logement` int(11) NOT NULL,
  `prise` int(11) NOT NULL,
  `offre` int(11) NOT NULL,
  `date-rerv-s` date NOT NULL,
  `id-sjr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id-serv` int(255) NOT NULL,
  `type-serv` varchar(255) NOT NULL,
  `tarif` int(255) NOT NULL,
  `id-emp` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sjr`
--

CREATE TABLE `sjr` (
  `id-sjr` int(11) NOT NULL,
  `mbr-participants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `vil-serv`
--

CREATE TABLE `vil-serv` (
  `id-vil` int(11) NOT NULL,
  `id-serv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `village`
--

CREATE TABLE `village` (
  `id-vil` int(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `id-emp` int(255) NOT NULL,
  `id-h` int(255) NOT NULL,
  `num-B` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actvt`
--
ALTER TABLE `actvt`
  ADD PRIMARY KEY (`id-actvt`);

--
-- Index pour la table `actvt-resrv-actvt`
--
ALTER TABLE `actvt-resrv-actvt`
  ADD PRIMARY KEY (`id-resrv-actv`);

--
-- Index pour la table `actvt-vil`
--
ALTER TABLE `actvt-vil`
  ADD PRIMARY KEY (`id-actvt`,`id-vil`);

--
-- Index pour la table `bang`
--
ALTER TABLE `bang`
  ADD PRIMARY KEY (`num-B`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`num-ch`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id-client`);

--
-- Index pour la table `client-serv`
--
ALTER TABLE `client-serv`
  ADD PRIMARY KEY (`id-client`,`id-serv`);

--
-- Index pour la table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id-emp`);

--
-- Index pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id-h`);

--
-- Index pour la table `resrv-activite`
--
ALTER TABLE `resrv-activite`
  ADD PRIMARY KEY (`id-resrv-actv`);

--
-- Index pour la table `restoraion-sjr`
--
ALTER TABLE `restoraion-sjr`
  ADD PRIMARY KEY (`ID9-RSRV`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id-serv`);

--
-- Index pour la table `sjr`
--
ALTER TABLE `sjr`
  ADD PRIMARY KEY (`id-sjr`);

--
-- Index pour la table `vil-serv`
--
ALTER TABLE `vil-serv`
  ADD PRIMARY KEY (`id-vil`,`id-serv`);

--
-- Index pour la table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`id-vil`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actvt`
--
ALTER TABLE `actvt`
  MODIFY `id-actvt` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `actvt-resrv-actvt`
--
ALTER TABLE `actvt-resrv-actvt`
  MODIFY `id-resrv-actv` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bang`
--
ALTER TABLE `bang`
  MODIFY `num-B` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `num-ch` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `emp`
--
ALTER TABLE `emp`
  MODIFY `id-emp` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id-h` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `resrv-activite`
--
ALTER TABLE `resrv-activite`
  MODIFY `id-resrv-actv` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `restoraion-sjr`
--
ALTER TABLE `restoraion-sjr`
  MODIFY `ID9-RSRV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id-serv` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sjr`
--
ALTER TABLE `sjr`
  MODIFY `id-sjr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `village`
--
ALTER TABLE `village`
  MODIFY `id-vil` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
