-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2023 pada 12.29
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(10) UNSIGNED NOT NULL,
  `nik` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id_masyarakat`, `nik`, `username`, `password`, `telepon`, `date_created`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, '1111111111111111', 'masyarakat', '25d55ad283aa400af464c76d713c07ad', '081111', '2023-11-18', '0000-00-00 00:00:00', '2023-11-26 11:53:49', '0000-00-00 00:00:00'),
(10, '876543213456', 'contoh', '25d55ad283aa400af464c76d713c07ad', '1234567890', '2023-12-01', '0000-00-00 00:00:00', '2023-12-01 18:41:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-10-30-135802', 'App\\Database\\Migrations\\Masyarakat', 'default', 'App', 1698674823, 1),
(2, '2023-10-30-140815', 'App\\Database\\Migrations\\Pengaduan', 'default', 'App', 1698675356, 2),
(3, '2023-10-30-141830', 'App\\Database\\Migrations\\Masyarakat', 'default', 'App', 1698676241, 3),
(4, '2023-10-30-141913', 'App\\Database\\Migrations\\Pengaduan', 'default', 'App', 1698676241, 3),
(5, '2023-10-30-141945', 'App\\Database\\Migrations\\Petugas', 'default', 'App', 1698676241, 3),
(6, '2023-10-30-142244', 'App\\Database\\Migrations\\Tanggapan', 'default', 'App', 1698676241, 3),
(7, '2023-11-25-215615', 'App\\Database\\Migrations\\AddTimestampsToPetugasTable', 'default', 'App', 1700949608, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(10) UNSIGNED NOT NULL,
  `tanggal_pengaduan` date NOT NULL,
  `nik` varchar(100) NOT NULL,
  `judul_laporan` text NOT NULL,
  `isi_laporan` text NOT NULL,
  `lokasi` text NOT NULL,
  `foto` blob NOT NULL,
  `status` enum('0','1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tanggal_pengaduan`, `nik`, `judul_laporan`, `isi_laporan`, `lokasi`, `foto`, `status`) VALUES
(20, '2023-11-19', '11111', 'amel', 'mudah mengantuk', 'muhi', 0x313730303430373830365f30363633316432356437326661313037373966382e6a7067, '2'),
(21, '2023-11-19', '11111', 'banjir', 'pembuangan sampah sembarangan', 'contoh', 0x313730303430383238335f32393262373932663938313462646337623939352e6a7067, '3'),
(22, '2023-11-19', '11111', 'sampah', 'penumpukan sampah dimana-mana', 'contoh', 0x313730303430383332365f64653935353362663830313663336363333963382e6a7067, '3'),
(25, '2023-11-20', '1111111', 'amelia dian melinda ', 'amelia amelia amelia amelia amelia amelia amelia amelia ', 'muhi', 0x313730303530333430385f66336662313336653966396566613131636661382e6a7067, '2'),
(27, '2023-11-22', '1111111', 'aaaa', 'aaaaa', 'aaaa', 0x313730303637313931355f62313462343566643363396264643030653735362e706e67, '3'),
(28, '2023-11-22', '1111111', 'bbbb', 'bbbbbbb', 'bbbb', 0x313730303637323138355f66383061313035643430356662303432383034652e706e67, '2'),
(29, '2023-11-25', '123456789', 'amellia ', 'ameliaa', 'ameliaa', 0x313730303930323133305f39393835333635333538343630626461653435612e6a7067, '2'),
(30, '2023-11-26', '1111111111111111', 'wdw', 'wdwd', 'dwdw', 0x313730303939393438345f39383661616432383363373034653332623534362e6a7067, '3'),
(31, '2023-11-26', '4444444444444444', 'ggggaaaaa', 'gggggaaaaa', 'ameliaaaaaa', 0x313730313036333438345f39646530383865626430626464396530663766612e6a7067, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(10) UNSIGNED NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telepon`, `level`, `created_at`, `updated_at`) VALUES
(1, 'amel', 'admin', '25d55ad283aa400af464c76d713c07ad', '0811111', 'admin', NULL, NULL),
(2, 'nashril', 'petugas', '25d55ad283aa400af464c76d713c07ad', '0822222', 'petugas', NULL, '2023-11-25 22:00:27'),
(3, 'lutfii', 'petugas2', 'e9335e177b288c7af4af8f1225c3f938', '0823456758', 'petugas', NULL, '2023-11-26 05:29:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(10) UNSIGNED NOT NULL,
  `id_pengaduan` int(10) NOT NULL,
  `tanggal_tanggapan` datetime NOT NULL,
  `tanggapan` text NOT NULL,
  `status` enum('0','1','2','3','4') NOT NULL,
  `id_petugas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tanggal_tanggapan`, `tanggapan`, `status`, `id_petugas`) VALUES
(1, 25, '2023-11-21 00:00:00', 'abc', '2', 2),
(2, 20, '2023-11-21 00:00:00', 'okee', '2', 2),
(3, 28, '2023-11-26 00:00:00', 'yaa', '2', 3),
(4, 29, '2023-11-26 00:00:00', 'siappp', '2', 3),
(5, 31, '2023-12-01 00:00:00', 'siapp????????', '2', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_masyarakat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
