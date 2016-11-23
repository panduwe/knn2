-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 21 Okt 2016 pada 23.03
-- Versi Server: 5.5.25a
-- Versi PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `gizi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `tinggi` int(4) NOT NULL,
  `berat` int(4) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `tinggi`, `berat`, `status`) VALUES
(1, 170, 60, 'Ideal'),
(2, 130, 50, 'Gemuk'),
(3, 140, 30, 'Ideal'),
(4, 190, 90, 'Gemuk'),
(5, 160, 50, 'Ideal'),
(6, 175, 67, 'Ideal'),
(7, 160, 80, 'Gemuk'),
(8, 170, 80, 'Gemuk'),
(9, 170, 40, 'Kurus'),
(10, 186, 67, 'Kurus'),
(11, 190, 68, 'Kurus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sementara`
--

CREATE TABLE IF NOT EXISTS `sementara` (
  `id` int(4) NOT NULL,
  `tinggi` int(4) NOT NULL,
  `berat` int(4) NOT NULL,
  `status` varchar(20) NOT NULL,
  `jarak` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `urut`
--

CREATE TABLE IF NOT EXISTS `urut` (
  `id` int(4) NOT NULL,
  `tinggi` int(4) NOT NULL,
  `berat` int(4) NOT NULL,
  `status` varchar(20) NOT NULL,
  `jarak` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
