-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 22, 2020 alle 11:41
-- Versione del server: 10.4.13-MariaDB
-- Versione PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sendmail`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `windows` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overtime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_washed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `building`
--

INSERT INTO `building` (`id`, `address`, `city`, `number`, `windows`, `overtime`, `date_washed`) VALUES
(2, 'nen', 'u', 1, 'Yes', '123', '2020-07-22'),
(3, 'nen', '', 1, '', '123', '2020-07-08'),
(4, 'nen', '', 1, '', '123', '2020-07-08'),
(5, 'nen', '', 1, '', '123', '2020-07-08'),
(6, 'j', '', 1, '1', 'j', '2020-07-14'),
(7, 'j', '', 1, '1', 'j', '2020-07-14'),
(8, 'j2edit', 'ed', 34, 'Yes', 'j34h', '2020-07-14'),
(18, 'St. 1st', 'New York', 12, 'Yes', '30 hours', '2020-07-07'),
(19, 'm', 'm', 8, 'Yes', '8h', '2020-08-08'),
(20, 'Street 45', 'New York', 8, 'Yes', '9', '2020-07-08'),
(22, 'New address', 'York', 9, 'Yes', '40', '2020-07-07');

-- --------------------------------------------------------

--
-- Struttura della tabella `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employed_on_date` date NOT NULL,
  `number_of_buildings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `employee`
--

INSERT INTO `employee` (`id`, `name`, `employed_on_date`, `number_of_buildings`) VALUES
(1, 'Anna York', '2020-07-01', 8),
(2, 'Victor Lake', '2020-07-14', 7),
(3, 'Roger Doe', '2020-07-08', 8),
(4, 'Alex Dove', '2020-07-02', 12),
(5, 'Nicole Ruth', '2020-07-01', 10),
(7, 'j', '2020-07-03', 8),
(8, 'Last employee added', '2020-07-09', 9),
(9, 'Lets see if it gona stay within borders', '2020-07-02', 9),
(10, 'Some large name', '2020-07-09', 6);

-- --------------------------------------------------------

--
-- Struttura della tabella `employee_office`
--

CREATE TABLE `employee_office` (
  `employee_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200714122352', '2020-07-14 12:24:48'),
('20200714123351', '2020-07-14 12:34:01'),
('20200716082039', '2020-07-16 12:28:52'),
('20200716122824', '2020-07-16 12:28:52'),
('20200720190516', '2020-07-22 05:47:52'),
('20200722052518', '2020-07-22 05:50:12'),
('20200722060847', '2020-07-22 06:09:38');

-- --------------------------------------------------------

--
-- Struttura della tabella `office`
--

CREATE TABLE `office` (
  `id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `floors` int(11) NOT NULL,
  `working_hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employees_working_on_cleaning` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `office`
--

INSERT INTO `office` (`id`, `address`, `number`, `floors`, `working_hours`, `employees_working_on_cleaning`) VALUES
(1, 'Street 1', 1, 2, '5', 2),
(2, 'Address 3', 3, 1, '2', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `employee_office`
--
ALTER TABLE `employee_office`
  ADD PRIMARY KEY (`employee_id`,`office_id`),
  ADD KEY `IDX_5D60AF978C03F15C` (`employee_id`),
  ADD KEY `IDX_5D60AF97FFA0C224` (`office_id`);

--
-- Indici per le tabelle `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indici per le tabelle `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `office`
--
ALTER TABLE `office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `employee_office`
--
ALTER TABLE `employee_office`
  ADD CONSTRAINT `FK_5D60AF978C03F15C` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5D60AF97FFA0C224` FOREIGN KEY (`office_id`) REFERENCES `office` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
