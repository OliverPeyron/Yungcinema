-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Mrz 2020 um 18:17
-- Server-Version: 10.4.10-MariaDB
-- PHP-Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kino`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `beutzer`
--

CREATE TABLE `beutzer` (
  `id` int(20) NOT NULL,
  `vorname` varchar(30) NOT NULL,
  `nachname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `benutzername` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `beutzer`
--

INSERT INTO `beutzer` (`id`, `vorname`, `nachname`, `email`, `benutzername`, `password`) VALUES
(1, 'ERs', 'Hans', 'ersH@gmail.com', 'HansERS', '$2y$10$dWtUdkmIYcwKk6w/lxHb6Owlqco/Q6GRyQm4ibqEQUhg4vzrRdBh2'),
(2, 'edi', 'ploks', 'wer@gmail.com', 'Ryzeabuser', '$2y$10$POsKqbV1ACJNSYxzdV6C4O/nl9VbH3qawhloR8kHB1cFYcVZLVqhO'),
(3, 'edi', 'ploks', 'wer@gmail.com', 'Ryzeabuser', '$2y$10$lyoTAf6UV6af.RQGQildOO/dZOGPnMJHPWZgAqE347jdi4LBQW2ze'),
(4, 'edi', 'ploks', 'wer@gmail.com', 'Ryzeabuser', '$2y$10$FhFsfAXNjilo2QnA1wGZY.VuAqhrWlKagAEV4ndlEYUQAJJdBl3Vm'),
(5, 'test123', 'HS', 'HS@edub.ch', 'HSSIMUEeER', '$2y$10$1NW6UrA0.Cab8RraC.p5qeHpOneW4IEODRqYCvBgSCbZAfqV03kru'),
(6, 'ADMIN', 'test', 'konto@abc.ch', 'Admins', '$2y$10$lissJIeSlIFmSHjo99.TNercGa2/jxj2W2Ct2zq2hVMjGwD7nwzmG'),
(7, 'hans', 'kopf', 'hans.kopf@gmail.com', 'Cheffe', '$2y$10$/HxXINH.hUpLbZtc0wypt.fEynDlnlpuyOk60eGZgSOPBxErxKwZK');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `film`
--

CREATE TABLE `film` (
  `film_ID` int(20) NOT NULL,
  `Titel` varchar(50) NOT NULL,
  `Regisseur` varchar(30) NOT NULL,
  `Sprache` varchar(30) NOT NULL,
  `Untertitel` tinyint(1) NOT NULL,
  `Min` mediumint(100) NOT NULL,
  `Zusammenfassung` text NOT NULL,
  `Datumvon` date NOT NULL,
  `Datumbis` date NOT NULL,
  `Kinosaal` tinyint(4) NOT NULL,
  `Bild` varchar(255) NOT NULL,
  `Ersteller` varchar(30) NOT NULL,
  `Erstellungsdatum` date NOT NULL,
  `Letzteänderungsdatum` date NOT NULL DEFAULT current_timestamp(),
  `Kategorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `film`
--

INSERT INTO `film` (`film_ID`, `Titel`, `Regisseur`, `Sprache`, `Untertitel`, `Min`, `Zusammenfassung`, `Datumvon`, `Datumbis`, `Kinosaal`, `Bild`, `Ersteller`, `Erstellungsdatum`, `Letzteänderungsdatum`, `Kategorie_id`) VALUES
(1, 'Test1', 'me', 'GAyass', 0, 12, 'ist ok', '1121-02-12', '1212-12-12', 12, 'kachba', '1', '0000-00-00', '0000-00-00', 1),
(2, 'GAwd awd', 'qwe', 'aw', 1, 12221, 'wasd', '1121-12-12', '0121-12-21', 2, 'asd', '1', '0000-00-00', '0000-00-00', 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `Kategorie_id` int(1) NOT NULL,
  `Genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`Kategorie_id`, `Genre`) VALUES
(1, 'Kinder'),
(2, 'Action'),
(3, 'Horror'),
(4, 'Fiktion'),
(5, 'Romantik'),
(6, 'Pornos'),
(7, 'Porno');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `beutzer`
--
ALTER TABLE `beutzer`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`film_ID`),
  ADD KEY `Kategorie_id` (`Kategorie_id`);

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`Kategorie_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `beutzer`
--
ALTER TABLE `beutzer`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `film`
--
ALTER TABLE `film`
  MODIFY `film_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `Kategorie_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`Kategorie_id`) REFERENCES `kategorie` (`Kategorie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
