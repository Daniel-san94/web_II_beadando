-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Dec 01. 13:02
-- Kiszolgáló verziója: 10.4.8-MariaDB
-- PHP verzió: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `web2`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(10) UNSIGNED NOT NULL,
  `csaladi_nev` varchar(45) NOT NULL DEFAULT '',
  `utonev` varchar(45) NOT NULL DEFAULT '',
  `bejelentkezes` varchar(12) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `jelszo` varchar(40) NOT NULL DEFAULT '',
  `jogosultsag` varchar(3) NOT NULL DEFAULT '_1_'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `csaladi_nev`, `utonev`, `bejelentkezes`, `email`, `jelszo`, `jogosultsag`) VALUES
(1, 'Rendszer', 'Admin', 'Admin', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', '__1'),
(2, 'Családi_2', 'Utónév_2', 'Login2', '', '6cf8efacae19431476020c1e2ebd2d8acca8f5c0', '_1_'),
(3, 'Családi_3', 'Utónév_3', 'Login3', '', 'df4d8ad070f0d1585e172a2150038df5cc6c891a', '_1_'),
(4, 'Családi_4', 'Utónév_4', 'Login4', '', 'b020c308c155d6bbd7eb7d27bd30c0573acbba5b', '_1_'),
(5, 'Családi_5', 'Utónév_5', 'Login5', '', '9ab1a4743b30b5e9c037e6a645f0cfee80fb41d4', '_1_'),
(6, 'Családi_6', 'Utónév_6', 'Login6', '', '7ca01f28594b1a06239b1d96fc716477d198470b', '_1_'),
(7, 'Családi_7', 'Utónév_7', 'Login7', '', '41ad7e5406d8f1af2deef2ade4753009976328f8', '_1_'),
(8, 'Családi_8', 'Utónév_8', 'Login8', '', '3a340fe3599746234ef89591e372d4dd8b590053', '_1_'),
(9, 'Családi_9', 'Utónév_9', 'Login9', '', 'c0298f7d314ecbc5651da5679a0a240833a88238', '_1_'),
(10, 'Családi_10', 'Utónév_10', 'Login10', '', 'a477427c183664b57f977661ac3167b64823f366', '_1_'),
(11, 'Teszt', 'Proba', 'Testadmin', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '_1_');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `menu`
--

CREATE TABLE `menu` (
  `url` varchar(30) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `szulo` varchar(30) NOT NULL,
  `jogosultsag` varchar(3) NOT NULL,
  `sorrend` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `menu`
--

INSERT INTO `menu` (`url`, `nev`, `szulo`, `jogosultsag`, `sorrend`) VALUES
('/id=1', 'Gép tisztítás', 'szolgaltatasok', '_11', 32),
('/id=2', 'Windows telepítés', 'szolgaltatasok', '_11', 33),
('/id=3', 'BGA javítás', 'szolgaltatasok', '_11', 34),
('alapinfok', 'Alapinfók', 'elerhetoseg', '111', 40),
('belepes', 'Belépés', '', '100', 60),
('elerhetoseg', 'Elérhetőség', '', '111', 20),
('kilepes', 'Kilépés', '', '011', 70),
('nyitolap', 'Nyitólap', '', '111', 10),
('regisztracio', 'Regisztráció', '', '100', 65),
('rolunk', 'Rólunk', '', '111', 15),
('szolgaltatasok', 'Szolgáltatások', '', '_11', 31);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szolgaltatasok`
--

CREATE TABLE `szolgaltatasok` (
  `id` int(10) UNSIGNED NOT NULL,
  `nev` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `leiras` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `ar` varchar(20) NOT NULL,
  `kep_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `szolgaltatasok`
--

INSERT INTO `szolgaltatasok` (`id`, `nev`, `leiras`, `ar`, `kep_url`) VALUES
(1, 'Gép tisztítás', 'Teljes körű gép tisztítás, újrapasztázás, javításra illetve cserére szoruló alkatrészek detektálása.', '7000Ft-tól', 'https://ak.picdn.net/shutterstock/videos/1006831381/thumb/2.jpg'),
(2, 'Windows telepítés (programokkal eggyütt)', 'A gép újratelepítése, teljes körű formázással. (Az adatok mentése gigabyte-onként 2000Ft.) Alap felhasználói programok telepítése (Office, média lejátszó, fájlkezelő stb.)', '9000Ft-tól', 'https://i.ytimg.com/vi/AOTc8eWd78M/maxresdefault.jpg'),
(3, 'BGA forrasztás/javítás', 'Megjavítjuk hibás videokártyáját vagy játék-konzolját az eddig elérhető legmodernebb reball technikával. 6 hónap garanciával. Az ár tájékoztató jellegű.', '15000Ft-tól', 'https://www.bgacomplex.com/wp-content/uploads/2020/02/bga-repair.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `velemenyek`
--

CREATE TABLE `velemenyek` (
  `id` int(10) UNSIGNED NOT NULL,
  `szolgaltatasok_id` int(10) UNSIGNED NOT NULL,
  `hozzaszolo` varchar(60) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `velemeny` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `velemenyek`
--

INSERT INTO `velemenyek` (`id`, `szolgaltatasok_id`, `hozzaszolo`, `velemeny`, `datum`) VALUES
(1, 1, 'Login1', 'Nagyon meg vagyok elégedve a szolgáltatással.', '0000-00-00 00:00:00'),
(2, 3, 'Login3', 'Fél év után újra tönkrement.', '2020-11-26 00:00:00'),
(3, 1, 'Login4', 'Nem tudok véleményt mondani, mert 2 hete nem kaptam vissza a gépet.', '2020-11-28 16:45:31'),
(4, 1, 'Testadmin', 'Patyolat lett a gép, mintha új lenne.', '2020-11-28 17:24:15'),
(5, 1, 'Testadmin', 'Teszt', '2020-11-28 17:29:53'),
(6, 1, 'Testadmin', 'Teszt2', '2020-11-28 17:31:41'),
(7, 1, 'Testadmin', 'fsa', '2020-11-28 17:35:02'),
(8, 1, 'Testadmin', 'gd', '2020-11-28 17:36:01'),
(9, 1, 'Testadmin', 'Nincsen', '2020-11-28 17:55:21'),
(10, 2, 'Admin', 'Maximálisan elégedett vagyok', '2020-12-01 09:24:54'),
(11, 1, 'Admin', 'fasfasd', '2020-12-01 09:48:01');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`url`);

--
-- A tábla indexei `szolgaltatasok`
--
ALTER TABLE `szolgaltatasok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `velemenyek`
--
ALTER TABLE `velemenyek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `szolgaltatasok_id` (`szolgaltatasok_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT a táblához `szolgaltatasok`
--
ALTER TABLE `szolgaltatasok`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `velemenyek`
--
ALTER TABLE `velemenyek`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `velemenyek`
--
ALTER TABLE `velemenyek`
  ADD CONSTRAINT `velemenyek_ibfk_1` FOREIGN KEY (`szolgaltatasok_id`) REFERENCES `szolgaltatasok` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
