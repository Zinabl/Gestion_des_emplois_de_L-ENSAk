-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 12 jan. 2023 à 08:02
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rat`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `nom`, `prenom`, `pass`, `email`, `photo`) VALUES
(1, 'admin', 'alaoui', 'fatiha', 'azerty', 'fatiha.alaoui@uit.ac.ma', '1.png');

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

CREATE TABLE `emploi` (
  `id_cours` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `id_semestre` int(1) NOT NULL,
  `id_module` int(11) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `emploi`
--

INSERT INTO `emploi` (`id_cours`, `id_admin`, `id_prof`, `id_filiere`, `id_semestre`, `id_module`, `id_salle`, `date`, `heure`) VALUES
(1, 1, 10, 3, 5, 30, 35, '2023-01-02', '14:30:00'),
(2, 1, 16, 3, 5, 33, 1, '2023-01-03', '08:30:00'),
(3, 1, 22, 3, 5, 28, 33, '2023-01-03', '14:30:00'),
(4, 1, 20, 3, 5, 29, 33, '2023-01-03', '14:30:00'),
(5, 1, 17, 3, 5, 31, 4, '2023-01-05', '08:30:00'),
(6, 1, 1, 1, 1, 7, 1, '2023-01-02', '14:30:00'),
(7, 1, 3, 2, 1, 2, 1, '2023-01-09', '08:30:00'),
(8, 1, 13, 2, 1, 1, 35, '2023-01-12', '10:45:00'),
(9, 1, 6, 2, 4, 24, 35, '2023-01-02', '16:15:00'),
(10, 1, 22, 4, 5, 28, 33, '2023-01-03', '14:30:00'),
(11, 1, 17, 4, 5, 31, 4, '2023-01-06', '08:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` int(11) NOT NULL,
  `lib_filiere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `lib_filiere`) VALUES
(1, 'CP1'),
(2, 'CP2'),
(3, 'Genie industriel'),
(4, 'Genie informatique'),
(5, 'Genie mecatronique'),
(6, 'Genie reseau et telecommunication'),
(7, 'Genie civil'),
(8, 'Genie eletrique');

-- --------------------------------------------------------

--
-- Structure de la table `fil_sem`
--

CREATE TABLE `fil_sem` (
  `filiere` int(11) NOT NULL,
  `semestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fil_sem`
--

INSERT INTO `fil_sem` (`filiere`, `semestre`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 5),
(4, 6),
(5, 5),
(5, 6),
(6, 5),
(6, 6),
(7, 5),
(7, 6),
(8, 5),
(8, 6);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id_groupe` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `section` varchar(6) DEFAULT NULL,
  `gr_td` varchar(7) DEFAULT NULL,
  `gr_tp` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id_groupe`, `id_filiere`, `section`, `gr_td`, `gr_tp`) VALUES
(1, 1, 'A', 'G1', 'TP1_1'),
(2, 1, 'A', 'G1', 'TP1_2'),
(3, 1, 'A', 'G1', 'TP1_3'),
(4, 1, 'A', 'G2', 'TP2_1'),
(5, 1, 'A', 'G2', 'TP2_2'),
(6, 1, 'A', 'G2', 'TP2_3'),
(7, 1, 'B', 'G3', 'TP3_1'),
(8, 1, 'B', 'G3', 'TP3_2'),
(9, 1, 'B', 'G3', 'TP3_3'),
(10, 1, 'B', 'G4', 'TP4_1'),
(11, 1, 'B', 'G4', 'TP4_2'),
(12, 1, 'B', 'G4', 'TP4_3'),
(13, 2, 'A', 'G1', 'TP1_1'),
(14, 2, 'A', 'G1', 'TP1_2'),
(15, 2, 'A', 'G1', 'TP1_3'),
(16, 2, 'A', 'G2', 'TP2_1'),
(17, 2, 'A', 'G2', 'TP2_2'),
(18, 2, 'A', 'G2', 'TP2_3'),
(19, 2, 'B', 'G3', 'TP3_1'),
(20, 2, 'B', 'G3', 'TP3_2'),
(21, 2, 'B', 'G3', 'TP3_3'),
(22, 2, 'B', 'G4', 'TP4_1'),
(23, 2, 'B', 'G4', 'TP4_2'),
(24, 2, 'B', 'G4', 'TP4_3'),
(25, 3, 'INDUS', 'G_indus', 'G_indus'),
(26, 4, 'INFO', 'G_info', 'G_info'),
(27, 5, 'MECA', 'G_meca', 'G1_meca'),
(28, 5, 'MECA', 'G_meca', 'G2_meca'),
(29, 6, 'ELECT', 'G_elect', 'G1_elect'),
(30, 6, 'ELECT', 'G_elect', 'G2_elect'),
(31, 7, 'CIVILE', 'G_civil', 'G1_civil'),
(32, 7, 'CIVILE', 'G_civil', 'G2_civil'),
(33, 8, 'RST', 'G_rst', 'G1_rst'),
(34, 8, 'RST', 'G_rst', 'G2_rst'),
(35, 4, 'D', 'G11', 'TP3_9');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id_module` int(11) NOT NULL,
  `lib_module` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id_module`, `lib_module`) VALUES
(1, 'Algébre de base'),
(2, 'Analyse de base 1'),
(3, 'Analyse de base 2'),
(4, 'Elactrostatique et Electrocenetique des courants continus'),
(5, 'Mecanique de point'),
(6, 'informatique1'),
(7, 'Langues1/Français'),
(8, 'Algèbre linéaire et calcul matriciel'),
(9, 'Analyse fondamentale'),
(10, 'Electromagnétisme et Electrocinétique des courantsalternatifs'),
(11, 'Optique géométrique et instrumentale'),
(12, 'Thermodynamique générale'),
(13, 'Informatique2'),
(14, 'Langues2/Anglais'),
(15, 'Algèbre bilinéaire et sesquilinéaire'),
(16, 'Fonctions de plusieurs variables réelles'),
(17, 'Mécanique du solide et systèmes'),
(18, 'Propriétés de base des matériaux'),
(19, 'Chimie'),
(20, 'Langues3/Français'),
(21, 'Langues3/Anglais'),
(22, 'Analyse Numérique'),
(23, 'Probabilités et statistiques'),
(24, 'Traitement de signal'),
(25, 'Optique physique et lasers'),
(26, 'Electronique analogique etnumérique'),
(27, 'Informatique4'),
(28, 'Mathématiques pour l\'ingénieur I'),
(29, 'Complexité des algorithmes et structures de données'),
(30, 'Systèmes d\'informations et bases de données Relationnelles'),
(31, 'Architecture des ordinateurs et langage assembleur'),
(32, 'Conception et organisation de postes de travail'),
(33, 'Développement Webl'),
(34, 'Managementl'),
(35, 'Tec1'),
(36, 'Traitement de Signal'),
(37, 'Mathématiques pour l\'ingénieur 2'),
(38, 'Conception et Programmation orientée objet'),
(39, 'Réseaux informatiques'),
(40, 'Probabilités et statistiques'),
(41, 'Technologie XMI et Applications'),
(42, 'Systèmes d\'exploitation'),
(43, 'Management2'),
(44, 'Recherche Opérationnelle et Théorie des graphes'),
(45, 'Anglais'),
(46, 'geologie'),
(47, 'geologie'),
(48, 'geologie'),
(49, 'python2'),
(50, 'python2');

-- --------------------------------------------------------

--
-- Structure de la table `prof`
--

CREATE TABLE `prof` (
  `id_prof` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `Prénom` varchar(13) DEFAULT NULL,
  `Nom` varchar(22) DEFAULT NULL,
  `email` varchar(33) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prof`
--

INSERT INTO `prof` (`id_prof`, `login`, `pass`, `Prénom`, `Nom`, `email`, `photo`) VALUES
(1, '1_BOUMAZZOU', 'azerty', 'Ibrahim', 'BOUMAZZOU', 'ibrahim.boumazzou@uit.ac.ma', 'SANS_IMAGE.png'),
(3, '3_ABOUTAFAIL', 'azerty', 'Moulay Othman', 'ABOUTAFAIL', 'moulayothman.aboutafail@uit.ac.ma', '0'),
(4, '4_HMINA', 'azerty1', 'Nabil', 'HMINA', 'nabil.hmina@uit.ac.ma', 'SANS_IMAGE.png'),
(5, '5_MHARZI', 'azerty', 'Hassan', 'MHARZI', 'h.mharzi@uit.ac.ma', '0'),
(6, '6_GRETETE', 'azerty', 'Driss', 'GRETETE', 'driss.gretete@uit.ac.ma', '0'),
(7, '7_MASLOUHI', 'azerty', 'Mostafa', 'MASLOUHI', 'mostafa.maslouhi@uit.ac.ma', '0'),
(8, '8_ABOUABDELLAH', 'azerty', 'Abdellah', 'ABOUABDELLAH', 'abdellah.abouabdellah@uit.ac.ma', '0'),
(9, '9_BELGHITI', 'azerty', 'Moulay Taib', 'BELGHITI', 'moulaytaib.belghiti@uit.ac.ma', '0'),
(10, '10_CHAOUI', 'azerty', 'Habiba', 'CHAOUI', 'habiba.chaoui@uit.ac.ma', '0'),
(11, '11_ELOUADI', 'azerty', 'Abdelmajid', 'ELOUADI', 'abdelmajid.elouadi@uit.ac.ma', '0'),
(12, '12_ELHAMI', 'azerty', 'Norelislam', 'EL HAMI', 'norelislam.elhami@uit.ac.ma', '0'),
(13, '13_BENTALEB', 'azerty', 'Youssef', 'BENTALEB', 'youssef.bentaleb@uit.ac.ma', '0'),
(14, '14_CHOUGDALI', 'azerty', 'Khalid', 'CHOUGDALI', 'khalid.chougdali@uit.ac.ma', '0'),
(15, '15_BELFKIH', 'azerty', 'Samir', 'BELFKIH', 'samir.belfkih@uit.ac.ma', '0'),
(16, '16_OUMAIRA', 'azerty', 'Ilham', 'OUMAIRA', 'ilham.oumaira@uit.ac.ma', '0'),
(17, '17_AMINE', 'azerty', 'Aouatif', 'AMINE', 'aouatif.amine@uit.ac.ma', '0'),
(18, '18_BOUAYAD', 'azerty', 'Anas', 'BOUAYAD', 'anas.bouayad@uit.ac.ma', '0'),
(19, '19_ELBOUZEKRIELIDRISSI', 'azerty', 'Younes', 'EL BOUZEKRI EL IDRISSI', 'y.elbouzekri@uit.ac.ma', '0'),
(20, '20_AITLAHCEN', 'azerty', 'Ayoub', 'AIT LAHCEN', 'ayoub.aitlahcen@uit.ac.ma', '0'),
(21, '21_HACHIMI', 'azerty', 'Hanaa', 'HACHIMI', 'hanaa.hachimi@uit.ac.ma', '0'),
(22, '22_BANNARI', 'azerty', 'Rachid', 'BANNARI', 'rachid.bannari@uit.ac.ma', '0'),
(23, '23_MABTOUL', 'azerty', 'Samira', 'MABTOUL', 'samira.mabtoul@uit.ac.ma', '0'),
(24, '24_ELABBADI', 'azerty', 'Laila', 'EL ABBADI', 'laila.elabbadi@uit.ac.ma', '0'),
(29, '', '', 'Mostafa', 'MASLOUHI', 'mostafa.maslouhi@uit.ac.ma', '0'),
(30, '', '', 'Abdellah', 'ABOUABDELLAH', 'abdellah.abouabdellah@uit.ac.ma', '0'),
(31, '', '', 'Moulay Taib', 'BELGHITI', 'moulaytaib.belghiti@uit.ac.ma', '0'),
(32, '', '', 'Habiba', 'CHAOUI', 'habiba.chaoui@uit.ac.ma', '0'),
(33, '', '', 'Abdelmajid', 'ELOUADI', 'abdelmajid.elouadi@uit.ac.ma', '0'),
(34, '', '', 'Norelislam', 'EL HAMI', 'norelislam.elhami@uit.ac.ma', '0'),
(35, '', '', 'Youssef', 'BENTALEB', 'youssef.bentaleb@uit.ac.ma', '0'),
(36, '', '', 'Khalid', 'CHOUGDALI', 'khalid.chougdali@uit.ac.ma', '0'),
(37, '', '', 'Samir', 'BELFKIH', 'samir.belfkih@uit.ac.ma', '0'),
(38, '', '', 'Ilham', 'OUMAIRA', 'ilham.oumaira@uit.ac.ma', '0'),
(39, '', '', 'Aouatif', 'AMINE', 'aouatif.amine@uit.ac.ma', '0'),
(40, '', '', 'Anas', 'BOUAYAD', 'anas.bouayad@uit.ac.ma', '0'),
(41, '', '', 'Younes', 'EL BOUZEKRI EL IDRISSI', 'y.elbouzekri@uit.ac.ma', '0'),
(42, '', '', 'Ayoub', 'AIT LAHCEN', 'ayoub.aitlahcen@uit.ac.ma', '0'),
(43, '', '', 'Hanaa', 'HACHIMI', 'hanaa.hachimi@uit.ac.ma', '0'),
(44, '', '', 'Rachid', 'BANNARI', 'rachid.bannari@uit.ac.ma', '0'),
(45, '', '', 'Samira', 'MABTOUL', 'samira.mabtoul@uit.ac.ma', '0'),
(46, '', '', 'Laila', 'EL ABBADI', 'laila.elabbadi@uit.ac.ma', '0'),
(47, 'khadija', '1234', 'kjhadija', 'nana', 'kanza.abbas@uit.ac.ma', 'prof1.jpg'),
(48, '150khadiha', '1234', 'khadija', 'nana', 'kanza.abbas@uit.ac.ma', 'prof1.jpg'),
(49, 'marso', 'azertyy', 'khadija', 'nana', 'kanza.abbas@uit.ac.ma', 'prof1.jpg'),
(50, 'jadili', '', 'khadija', '', 'kanza.abbas@uit.ac.ma', 'prof1.jpg'),
(51, 'admin', 'azertyy', 'khadija', 'nana', 'huhfuhu', 'prof1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `ratt`
--

CREATE TABLE `ratt` (
  `id_ratt` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `professeur` varchar(50) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `id_semestre` int(11) NOT NULL,
  `date_ratt` date NOT NULL,
  `heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ratt`
--

INSERT INTO `ratt` (`id_ratt`, `id_prof`, `professeur`, `id_salle`, `id_filiere`, `id_module`, `id_semestre`, `date_ratt`, `heure`) VALUES
(33, 4, 'HMINA', 4, 3, 31, 5, '2023-01-17', '19:10:00'),
(34, 1, 'BOUMAZZOU', 2, 1, 35, 2, '2023-02-02', '08:30:00'),
(35, 1, 'BOUMAZZOU', 4, 1, 25, 1, '2023-05-04', '08:08:00'),
(36, 1, 'BOUMAZZOU', 4, 1, 35, 2, '2023-03-02', '08:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `lib_salle` varchar(11) NOT NULL,
  `capacite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `lib_salle`, `capacite`) VALUES
(1, 'C1', 150),
(2, 'C2', 150),
(3, 'C3', 100),
(4, 'C4', 100),
(5, 'C5', 90),
(6, 'C6', 90),
(7, 'C7', 90),
(17, 'A8', 30),
(18, 'A9', 30),
(19, 'A10', 40),
(20, 'A11', 40),
(21, 'A12', 40),
(22, 'A13', 40),
(23, 'A14', 30),
(24, 'B15', 40),
(25, 'B16', 45),
(26, 'B17', 40),
(27, 'B18', 45),
(28, 'B19', 45),
(29, 'B20', 40),
(30, 'B21', 45),
(31, 'B22', 45),
(32, 'B23', 40),
(33, 'Amphi1', 326),
(34, 'Amphi2', 200),
(35, 'Amphi3', 200),
(36, 'Amphi_rouge', 277),
(37, 'c1', 50),
(38, 'c3', 50),
(39, 'c3', 50),
(40, 'c3', 50);

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

CREATE TABLE `semestre` (
  `id_semestre` int(11) NOT NULL,
  `lib_semestre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `semestre`
--

INSERT INTO `semestre` (`id_semestre`, `lib_semestre`) VALUES
(1, 's1'),
(2, 's2'),
(3, 's3'),
(4, 's4'),
(5, 's5'),
(6, 's6'),
(7, 's7'),
(8, 's8'),
(9, 's9');

-- --------------------------------------------------------

--
-- Structure de la table `sem_mod`
--

CREATE TABLE `sem_mod` (
  `id_semestre` int(11) NOT NULL,
  `id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sem_mod`
--

INSERT INTO `sem_mod` (`id_semestre`, `id_module`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 46),
(4, 22),
(4, 23),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(5, 28),
(5, 29),
(5, 30),
(5, 31),
(5, 32),
(5, 33),
(5, 34),
(5, 35),
(5, 36),
(6, 37),
(6, 38),
(6, 39),
(6, 40),
(6, 41),
(6, 42),
(6, 43),
(6, 44),
(6, 45),
(7, 49);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_prof` (`id_prof`,`id_filiere`,`id_semestre`,`id_module`,`id_salle`),
  ADD KEY `id_semestre` (`id_semestre`),
  ADD KEY `id_filiere` (`id_filiere`),
  ADD KEY `id_salle` (`id_salle`),
  ADD KEY `id_module` (`id_module`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`);

--
-- Index pour la table `fil_sem`
--
ALTER TABLE `fil_sem`
  ADD PRIMARY KEY (`filiere`,`semestre`),
  ADD KEY `semestre` (`semestre`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_groupe`),
  ADD KEY `id_filiere` (`id_filiere`),
  ADD KEY `id_filiere_2` (`id_filiere`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`);

--
-- Index pour la table `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`id_prof`);

--
-- Index pour la table `ratt`
--
ALTER TABLE `ratt`
  ADD PRIMARY KEY (`id_ratt`),
  ADD KEY `id_prof` (`id_prof`,`id_salle`,`id_filiere`,`id_module`),
  ADD KEY `id_module` (`id_module`),
  ADD KEY `id_salle` (`id_salle`),
  ADD KEY `id_filiere` (`id_filiere`),
  ADD KEY `id_semestre` (`id_semestre`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- Index pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id_semestre`);

--
-- Index pour la table `sem_mod`
--
ALTER TABLE `sem_mod`
  ADD PRIMARY KEY (`id_semestre`,`id_module`),
  ADD KEY `id_module` (`id_module`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `emploi`
--
ALTER TABLE `emploi`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id_groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `prof`
--
ALTER TABLE `prof`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `ratt`
--
ALTER TABLE `ratt`
  MODIFY `id_ratt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD CONSTRAINT `emploi_ibfk_1` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emploi_ibfk_2` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emploi_ibfk_3` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emploi_ibfk_4` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emploi_ibfk_5` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emploi_ibfk_6` FOREIGN KEY (`id_prof`) REFERENCES `prof` (`id_prof`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `fil_sem`
--
ALTER TABLE `fil_sem`
  ADD CONSTRAINT `fil_sem_ibfk_1` FOREIGN KEY (`filiere`) REFERENCES `filiere` (`id_filiere`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fil_sem_ibfk_2` FOREIGN KEY (`semestre`) REFERENCES `semestre` (`id_semestre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ratt`
--
ALTER TABLE `ratt`
  ADD CONSTRAINT `ratt_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratt_ibfk_2` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratt_ibfk_3` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratt_ibfk_4` FOREIGN KEY (`id_prof`) REFERENCES `prof` (`id_prof`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratt_ibfk_5` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sem_mod`
--
ALTER TABLE `sem_mod`
  ADD CONSTRAINT `sem_mod_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sem_mod_ibfk_2` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id_semestre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
