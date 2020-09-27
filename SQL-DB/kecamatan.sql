-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 06 Apr 2019 pada 09.16
-- Versi server: 10.3.13-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kecamatan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acara`
--

CREATE TABLE `acara` (
  `acara_id` int(11) NOT NULL,
  `acara_tambah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kosong',
  `acara_nama` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kosong',
  `acara_tanggal` date NOT NULL,
  `acara_jam_mulai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kosong',
  `acara_jam_selesai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kosong',
  `acara_lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kosong',
  `acara_menghadiri1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kosong',
  `acara_menghadiri2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kosong',
  `acara_menghadiri3` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kosong',
  `acara_menghadiri4` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kosong',
  `acara_keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kosong',
  `acara_foto` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kosong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `acara`
--

INSERT INTO `acara` (`acara_id`, `acara_tambah`, `acara_nama`, `acara_tanggal`, `acara_jam_mulai`, `acara_jam_selesai`, `acara_lokasi`, `acara_menghadiri1`, `acara_menghadiri2`, `acara_menghadiri3`, `acara_menghadiri4`, `acara_keterangan`, `acara_foto`) VALUES
(1, 'Ade', 'Sambang Desa', '2019-05-08', '8:30 AM', '9:30 AM', 'Ngemplak', 'Prima', 'Heri', 'Panju', '', 'Acara Sambang Desa', 'img-04033109-screenshot_20190404-150323_1920x1200.png'),
(3, 'Admin', 'jfyfk', '2019-04-18', '4:15 PM', '5:15 PM', 'jgoug', 'ihih', '', '', '', ',jhlj', 'img-04040933-screenshot_20190404-150256_1920x1200.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `role`) VALUES
(1, 'Admin', 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `jabatan_nama` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `jabatan_nama`) VALUES
(1, 'Camat'),
(2, 'Sekertaris'),
(3, 'Seksi Pemerintahan'),
(4, 'Seksi Ketentraman & Ketertiban'),
(5, 'Seksi Perekonomian & Pembangunan'),
(6, 'Seksi Kesejahteraan Masyarakat'),
(7, 'Seksi Pelayanan Umum'),
(8, 'asal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `prestasi_id` int(11) NOT NULL,
  `prestasi_tambah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penghargaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemberi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`prestasi_id`, `prestasi_tambah`, `nama_penghargaan`, `pemberi`, `penerima`, `tanggal`, `waktu`, `lokasi`, `keterangan`, `gambar`) VALUES
(1, 'Ade', 'sefsdf', 'Pdfdf', 'dfsf', '0004-10-20', '5:15 PM', 'adfasf', 'sfasf', 'img-04040439-screenshot_20190404-150318_1920x1200.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `user_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `jabatan_id`, `user_nama`, `user_username`, `user_password`, `role`) VALUES
(1, 1, 'Ade', 'Ade', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`acara_id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`prestasi_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `jabatan_id` (`jabatan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `acara`
--
ALTER TABLE `acara`
  MODIFY `acara_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `prestasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
