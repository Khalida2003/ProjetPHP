-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 11:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lyk`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `nomClient` varchar(255) DEFAULT NULL,
  `usernameClient` varchar(255) NOT NULL,
  `adresseClient` text DEFAULT NULL,
  `emailClient` varchar(255) DEFAULT NULL,
  `passwordClient` varchar(255) DEFAULT NULL,
  `typeClient` varchar(25) NOT NULL DEFAULT 'user',
  `etat` varchar(11) DEFAULT 'normal',
  `date_inscription` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`nomClient`, `usernameClient`, `adresseClient`, `emailClient`, `passwordClient`, `typeClient`, `etat`, `date_inscription`) VALUES
('Client 1', 'client1', 'adresse client 1', 'client1@gmail.com', '123', 'user', 'normal', '2021-05-08'),
('Client 2', 'client2', 'adresse client 2', 'client2@gmail.com', '123', 'user', 'normal', '2021-05-03'),
('Client 3', 'client3', 'adresse client 3', 'client3@gmail.com', '123', 'user', 'normal', '2021-05-08'),
('Client 4', 'client4', 'adresse client 4', 'client4@gmail.com', '123', 'user', 'normal', '2021-05-02'),
('Client 5', 'client5', 'adresse client 5', 'client5@gmail.com', '123', 'user', 'normal', '2021-04-19'),
('Client 6', 'client6', 'adresse client 6', 'client6@gmail.com', '123', 'user', 'normal', '2021-04-05'),
('Client 7', 'client7', 'adresse client 7', 'client7@gmail.com', '123', 'user', 'normal', '2021-03-22'),
('Yassir Lassiry', 'joessir', 'adresse yassir', 'yassir@gmail.com', '123', 'admin', 'normal', '2021-05-08'),
('Khalida Bousrhal', 'khalida', 'adresse khalida', 'khalida@gmail.com', '123', 'admin', 'normal', '2021-05-08'),
('Lina Sabik', 'luna', 'adresse lina', 'lina@gmail.com', '123', 'admin', 'normal', '2021-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `numCommande` int(11) NOT NULL,
  `usernameClient` varchar(255) DEFAULT NULL,
  `numProduit` varchar(4) DEFAULT NULL,
  `qte_demande` int(11) DEFAULT NULL,
  `date_commande` date DEFAULT current_timestamp(),
  `statut` varchar(255) NOT NULL,
  `error` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`numCommande`, `usernameClient`, `numProduit`, `qte_demande`, `date_commande`, `statut`, `error`) VALUES
(38, 'client3', 'H2', 2, '2021-05-05', 'commander', ''),
(41, 'client1', 'F2', 3, '2021-05-08', 'commander', ''),
(42, 'client1', 'F5', 4, '2021-05-08', 'commander', ''),
(43, 'client2', 'H2', 1, '2021-05-08', 'commander', ''),
(44, 'client2', 'A6', 1, '2021-05-08', 'commander', ''),
(45, 'client3', 'N5', 1, '2021-05-08', 'commander', ''),
(46, 'client4', 'E5', 1, '2021-05-08', 'commander', ''),
(47, 'client4', 'E4', 1, '2021-05-08', 'commander', ''),
(48, 'client4', 'H8', 1, '2021-05-08', 'commander', '');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `numProduit` varchar(4) NOT NULL,
  `nomProduit` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `qteProduit` int(11) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `imageProduit` varchar(25) DEFAULT NULL,
  `genreProduit` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`numProduit`, `nomProduit`, `description`, `qteProduit`, `prix`, `imageProduit`, `genreProduit`) VALUES
('A1', 'GYMBALL BLACK 85 CM', 'Médecine Ball - Gym Ball Gymball SVELTUS, idéal pour tous les niveaux', 20, 149.99, 'imgacc1.jpg', 'accessoire'),
('A2', 'AB Wheel', 'Idéal pour un travail de posture, stable et efficace.', 20, 199.99, 'imgacc2.png', 'accessoire'),
('A3', 'Shaker Black Protein', 'Un shaker magnifique au noir profond avec indications de dosage sur le flanc', 20, 40, 'imgacc3.png', 'accessoire'),
('A4', 'NIKE AIR FORCE', 'Ces baskets Nike Air Force 1 garantissent une excellente adhérence au sol grâce à leurs points de pivot au talon et à l’avant-pied', 20, 1000, 'imgacc4.png', 'accessoire'),
('A5', 'Barre de traction murale premium', 'Optez pour la barre de traction murale et renforcez vos biceps, votre dos et vos triceps.', 20, 899.99, 'imgacc5.jpg', 'accessoire'),
('A6', 'HALTERES EN URETHANE - 2 X 27.5KG', 'Acier chromé et uréthane. Poignées en tissage d’acier et diamètre variable pour améliorer l’ergonomie.', 19, 396, 'imgacc6.jpg', 'accessoire'),
('A7', 'Gilet Lesté Homme 10 kg Noir', 'Ce gilet offre la possibilité de choisir votre poids de lest selon vos objectifs d\'entraînement.', 20, 599.99, 'imgacc7.jpg', 'accessoire'),
('A8', 'Corde à sauter cuir lestable', 'Par sa matière en cuir, cette corde à sauter est plus agréable qu\'une corde en plastique.', 17, 169.99, 'imgacc8.jpg', 'accessoire'),
('E1', 'Top avec rayures & short à motif lettre', 'Très bonne combinaison pour vos enfants', 20, 136, 'imgen1.webp', 'enfant'),
('E2', 'Top à imprimé arbre', 'Super belle couleur! Jaune éclatant! avec tissue très doux', 17, 140, 'imgen2.webp', 'enfant'),
('E3', 'Ensemble blouse avec imprimé plante et short', 'Un bon ensemble poou enfant , tissu 80% Viscose', 20, 250, 'imgen3.webp', 'enfant'),
('E4', 'Ensemble pantalon de jogging et top avec blocs de couleur', 'Votre enfant aime parcourir les streets , faire du sport? c\'est le bon ensemble !', 1, 249.99, 'imgen4.webp', 'enfant'),
('E5', 'Top à volants avec perles', 'Vous avez une petite fille? vous voulez lui faire plaisir ? acheter ce top de très bonne qualité', 19, 189, 'imgen5.webp', 'enfant'),
('E6', 'Robe à pois', 'Robe magnifique avec une très bonne qualité', 10, 200, 'imgen6.webp', 'enfant'),
('E7', 'Ensemble legging et top sans manches à imprimé lettres', 'Votre fille adore du sport? c\'est le bon ensemble pour elle !', 20, 199, 'imgen7.webp', 'enfant'),
('E8', 'Ensemble top de sport avec blocs de couleurs et legging', 'Un ensemble avec de très bon couleurs pour s\'entrainer tranquillement', 20, 258, 'imgen8.webp', 'enfant'),
('F1', 'Pantalon de jogging', 'Pantalon de jogging avec cordon à la taille\r\n', 14, 120.98, 'imgf1.webp', 'femme'),
('F2', 'Sweat-shirt', 'Ensemble sweat-shirt à capuche court et pantalon de survêtement', 33, 229.99, 'imgf2.webp', 'femme'),
('F3', 'T-shirt de sport', 'T-shirt de sport avec motif slogan\r\n', 30, 85.99, 'imgf3.webp', 'femme'),
('F4', 'Ensemble de survêtement', 'Ensemble de survêtement avec bande velcro\r\n', 15, 224.8, 'imgf4.webp', 'femme'),
('F5', 'Ensemble de legging', 'Ensemble legging et top avec rayures\r\n', 25, 152.45, 'imgf5.webp', 'femme'),
('F6', 'Set de sports', '4 pièces Set de sports unicolore\r\n', 9, 360.99, 'imgf6.webp', 'femme'),
('F7', 'Brassière de sport', 'Brassière de sport sans couture & Legging\r\n', 45, 189.74, 'imgf7.webp', 'femme'),
('F8', 'Ensemble de brassière', 'Ensemble brassière de sport bicolore et legging\r\n', 20, 175.5, 'imgf8.webp', 'femme'),
('H1', 'Pantalon de sport avec rayures\r\n', 'Un très bon pantalon pour faire les activités sportives', 5, 120, 'imgh1.webp', 'homme'),
('H2', 'T-shirt avec motif lettre & Short\r\n', 'T-shirt 80% Polystere avec col rond parfait pour l\'été avec un short de sport', 1, 230.99, 'imgh2.webp', 'homme'),
('H3', 'Ensemble t-shirt à rayures avec imprimé et short', 'T-shirt 96% Polystere parfait pour l\'été avec un Short', 20, 189.99, 'imgh3.webp', 'homme'),
('H4', 'Pull à capuche avec motif lettre et cordon\r\n', 'Un très bon pantalon pour faire les activités sportives', 1, 200.99, 'imgh4.webp', 'homme'),
('H5', 'Pull à capuche à motif slogan\r\n', 'Un très bon pantalon pour faire les activités sportives', 40, 157.65, 'imgh5.webp', 'homme'),
('H6', 'Pantalon de survêtement unicolore avec cordon à la taille\r\n', 'Un très bon pantalon pour faire les activités sportives', 3, 135.99, 'imgh6.webp', 'homme'),
('H7', 'Pantalon avec imprimé dessin animé\r\n', 'Un très bon pantalon à tissu d\'extensibilité légère', 48, 188.99, 'imgh7.webp', 'homme'),
('H8', 'Pantalon avec imprimé papillons', 'Un très bon pantalon avec tissu non extensible', 6, 200, 'imgh8.webp', 'homme'),
('N1', 'La barre bio minceur', 'La barre qui a su allier gourmandise et effet brûle-graisses !', 20, 25, 'img1.jpg', 'nutrition'),
('N2', 'BreakFast Pancake', 'Préparation Express pour crêpes, gaufres, pancakes... à Haute teneur Protéique', 20, 275.5, 'img2.jpg', 'nutrition'),
('N3', 'Whey & Oats', 'Le Whey & Oats est un pur concentré de Protéines de Whey native associé à de délicieux flocons d\'avoine en poudre à mélanger dans un bol avec de l’eau au petit déjeuner.', 20, 300, 'img3.jpg', 'nutrition'),
('N4', 'DeLuxe Protein Bar', 'Nouvelle Barre Hyperprotéinée avec plus de Protéines : 32 % et sucrée à la Stévia', 20, 25, 'img4.jpg', 'nutrition'),
('N5', 'Gold Standard Gainer', 'Gainer Gold Standard Gainer OPTIMUM NUTRITION, à tester lors de prise de masse', 19, 720, 'img5.jpg', 'nutrition'),
('N6', 'Pre Workout Harder', 'Un Pre-WorkOut à mettre en priorité dans votre sac de sport lors d\'entraînements intensifs', 20, 399.99, 'img6.jpg', 'nutrition'),
('N7', 'Protein Bar', 'Barres avec Protéines de Whey et de Soja', 20, 16, 'img7.jpg', 'nutrition'),
('N8', 'Pack spécial NG - Le Pack Minceur Chocolat', 'Le pack parfait pour allier plaisir chocolaté et minceur !', 20, 480.9, 'img8.jpg', 'nutrition');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`usernameClient`),
  ADD UNIQUE KEY `emailClient` (`emailClient`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`numCommande`),
  ADD KEY `fk_user` (`usernameClient`),
  ADD KEY `fk_numProduit` (`numProduit`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`numProduit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `numCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_numProduit` FOREIGN KEY (`numProduit`) REFERENCES `produit` (`numProduit`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`usernameClient`) REFERENCES `client` (`usernameClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
