-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 28. 06 2019 kl. 09:30:54
-- Serverversion: 10.1.40-MariaDB
-- PHP-version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v31eksamen`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `productcategories`
--

CREATE TABLE `productcategories` (
  `categoryId` int(3) NOT NULL,
  `categoryName` varchar(50) COLLATE latin1_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `productcategories`
--

INSERT INTO `productcategories` (`categoryId`, `categoryName`) VALUES
(1, 'Jakker'),
(2, 'Bukser'),
(3, 'Skjorter'),
(4, 'Strik'),
(5, 'T-shirts & Tank tops'),
(6, 'Tasker');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

CREATE TABLE `products` (
  `productId` int(10) NOT NULL,
  `heading` varchar(50) COLLATE latin1_danish_ci NOT NULL,
  `imgUrl` varchar(200) COLLATE latin1_danish_ci NOT NULL,
  `imgAlt` varchar(50) COLLATE latin1_danish_ci NOT NULL,
  `creationTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(1000) COLLATE latin1_danish_ci NOT NULL,
  `userId` int(5) NOT NULL,
  `stars` int(1) NOT NULL,
  `categoryId` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`productId`, `heading`, `imgUrl`, `imgAlt`, `creationTime`, `description`, `userId`, `stars`, `categoryId`) VALUES
(1, 'Lækker læderjakke', 'produkt1.jpg', 'Lækker læderjakke', '2019-06-25 11:37:35', 'Odd Molly er et svensk luksusbrand stiftet af Per Holknekt – tidligere pro skateboarder. Verdenseliten tiltrak dengang mange kvindelige fans, og de fleste af dem gjorde, hvad de kunne for at få fyrenes opmærksomhed. Alle undtagen én. Hun forblev tro mod sig selv - en unik, selvsikker og uforanderlig skønhed - hende, alle fyrene ville ha\'. En Odd Molly! - som ikke er et koncept, men autentisk! – et brand, hvis kollektioner er vildt smukke og inderlige, som der altid vil være brug for - dengang, nu, såvel som i fremtiden.', 9, 3, 1),
(2, 'Samsøe & Samsøe jakke', 'produkt2.jpg', 'Samsøe & Samsøe jakke', '2019-06-26 11:23:54', 'Kollektionerne fra Samsøe & Samsøe afspejler tidens trends, er unikke og let genkendelige på deres stramme skandinaviske design. Deres looks bygger på idéer om frihed og enkelhed. Det er især de rå detaljer, denim samt de små skræddersyede detaljer der gør, at kollektionerne altid matcher tidens trends og imødekommer markedets behov.', 9, 1, 1),
(3, 'NN07 bukser', 'produkt6.jpg', 'NN07 bukser', '2019-06-26 11:31:27', 'NN07 er et open-minded brand. NN07 bliver aldrig middelmådige, har valgt at gå deres egne veje og er super dedikerede i alt, hvad de gør. Hos NN07 vil man mærke livet og leve uden fordomme eller begrænsninger. NN07 elsker udfordringer og stærke personligheder, der vil være med til at gøre en forskel. De elsker den perfekte pasform, det enestående håndværk og er meget opmærksomme på hver eneste lille detalje i deres designs, deres arbejde og deres liv.', 10, 4, 2),
(4, 'Odd Molly Sweater', 'produkt7.jpg', 'Odd Molly Sweater', '2019-06-26 11:33:25', 'Odd Molly er et svensk luksusbrand stiftet af Per Holknekt – tidligere pro skateboarder. Verdenseliten tiltrak dengang mange kvindelige fans, og de fleste af dem gjorde, hvad de kunne for at få fyrenes opmærksomhed. Alle undtagen én. Hun forblev tro mod sig selv - en unik, selvsikker og uforanderlig skønhed - hende, alle fyrene ville ha\'. En Odd Molly! - som ikke er et koncept, men autentisk! – et brand, hvis kollektioner er vildt smukke og inderlige, som der altid vil være brug for - dengang, nu, såvel som i fremtiden.', 9, 3, 4),
(5, 'Polarn O. Pyret trøje', 'produkt8.jpg', 'Polarn O. Pyret trøje', '2019-06-26 11:35:06', 'Polarn O. Pyret er Sveriges ledende kvalitetsmærke til børn og sælges på flere markeder verden over. Deres tøj er skabt til at blive elsket, vasket og brugt. Det er tøj, som børn kan være stolte af at have på til fødselsdagsfester og leg i parken. Og det kan gives videre til det næste barn i rækken – og det næste. De kalder det design, der holder.', 10, 5, 4),
(6, 'Lee Jeans Skjorte', 'produkt9.jpg', 'Lee Jeans Skjorte', '2019-06-26 14:51:25', 'Lee Jeans er en førende international forhandler og producent af denim og casual wear. Lee blev grundlagt af Henry David Lee i 1889, da den første fabrik åbnede i Kansas, og fremstillede overalls og jakker. Firmaet fortsatte med at ekspandere inden for modetøj i 1970’erne, 80’erne og 90’erne, og i 1996 stiftede man Lee National Denim Day®. I dag er Lee mere end nogensinde fokuseret på at levere nye modeller, styles og fits til markedet.', 9, 4, 3),
(7, 'Skjorte', 'produkt10.jpg', 'Skjorte', '2019-06-27 14:04:36', 'Tekst', 9, 4, 3);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `userId` int(5) NOT NULL,
  `username` varchar(50) COLLATE latin1_danish_ci NOT NULL,
  `password` varchar(500) COLLATE latin1_danish_ci NOT NULL,
  `accessLevel` int(1) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `accessLevel`) VALUES
(9, 'mare0231', '$2y$10$15EyD2yTn63z8k9fagNHHecELKypmZSzx9XqAsD6jT/ZbpVMLhbPy', 3),
(10, 'maren', '$2y$10$vps6uD3o7Bly7m/EC2BTAe3.jeX3HxC7RdtwCk2SGExgPpMu1ceBC', 3),
(11, 'bruger', '$2y$10$gGYuaBIzVuQCb3MbEMtHGOTxbuDELiFe5aGQSzOnaXaHRf4W/xnCG', 3);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indeks for tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `categoryId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tilføj AUTO_INCREMENT i tabel `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
