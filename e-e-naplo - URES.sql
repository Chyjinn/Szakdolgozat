-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2020. Máj 13. 15:31
-- Kiszolgáló verziója: 5.7.26
-- PHP verzió: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `e-e-naplo`
--
CREATE DATABASE IF NOT EXISTS `e-e-naplo` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `e-e-naplo`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `epitkezesek`
--

DROP TABLE IF EXISTS `epitkezesek`;
CREATE TABLE IF NOT EXISTS `epitkezesek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `megn` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `telepules` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `iranyitoszam` int(11) NOT NULL,
  `cim` varchar(125) COLLATE utf8_hungarian_ci NOT NULL,
  `hatarido` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `epitkezes_jogok`
--

DROP TABLE IF EXISTS `epitkezes_jogok`;
CREATE TABLE IF NOT EXISTS `epitkezes_jogok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `epit_id` int(11) NOT NULL,
  `felh_id` int(11) NOT NULL,
  `jog_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `epit_id` (`epit_id`,`felh_id`,`jog_id`),
  KEY `felh_id` (`felh_id`),
  KEY `jog_id` (`jog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

DROP TABLE IF EXISTS `felhasznalok`;
CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `nev`, `email`, `jelszo`, `admin`) VALUES
(1, 'admin', 'admin@admin.hu', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jogosultsagok`
--

DROP TABLE IF EXISTS `jogosultsagok`;
CREATE TABLE IF NOT EXISTS `jogosultsagok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `megnevezes` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `jogosultsagok`
--

INSERT INTO `jogosultsagok` (`id`, `megnevezes`) VALUES
(1, 'Alvállalkozó'),
(2, 'Megrendelő'),
(3, 'Építésvezető'),
(4, 'Fővállalkozó');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `mellekletek`
--

DROP TABLE IF EXISTS `mellekletek`;
CREATE TABLE IF NOT EXISTS `mellekletek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mihez_id` int(11) NOT NULL,
  `fajlnev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mihez_id` (`mihez_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `munkak`
--

DROP TABLE IF EXISTS `munkak`;
CREATE TABLE IF NOT EXISTS `munkak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `epit_id` int(11) NOT NULL,
  `felh_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `elhelyezkedes` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `leiras` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `letszam` int(11) NOT NULL,
  `hofok` int(11) NOT NULL,
  `idojaras` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `felh_id` (`felh_id`),
  KEY `epit_id` (`epit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `regisztracios_kodok`
--

DROP TABLE IF EXISTS `regisztracios_kodok`;
CREATE TABLE IF NOT EXISTS `regisztracios_kodok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kod` varchar(15) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `epitkezes_jogok`
--
ALTER TABLE `epitkezes_jogok`
  ADD CONSTRAINT `epitkezes_jogok_ibfk_1` FOREIGN KEY (`felh_id`) REFERENCES `felhasznalok` (`id`),
  ADD CONSTRAINT `epitkezes_jogok_ibfk_2` FOREIGN KEY (`jog_id`) REFERENCES `jogosultsagok` (`id`),
  ADD CONSTRAINT `epitkezes_jogok_ibfk_3` FOREIGN KEY (`epit_id`) REFERENCES `epitkezesek` (`id`);

--
-- Megkötések a táblához `mellekletek`
--
ALTER TABLE `mellekletek`
  ADD CONSTRAINT `mellekletek_ibfk_1` FOREIGN KEY (`mihez_id`) REFERENCES `munkak` (`id`);

--
-- Megkötések a táblához `munkak`
--
ALTER TABLE `munkak`
  ADD CONSTRAINT `munkak_ibfk_1` FOREIGN KEY (`felh_id`) REFERENCES `felhasznalok` (`id`),
  ADD CONSTRAINT `munkak_ibfk_2` FOREIGN KEY (`epit_id`) REFERENCES `epitkezesek` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
