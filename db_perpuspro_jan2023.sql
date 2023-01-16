-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2023 at 04:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpuspro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(2) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `fullname`, `gambar`) VALUES
(1, 'operator', '$2y$10$M8B0O4kAVSmlIHYdpSoN/..GSk51Ad7wnKkhA0wbUyDg6nVRwOChO', 'Petugas', 'gambar_admin/avatar.jpg'),
(3, 'admin', '$2y$10$cjNjTnP2cI7OF/CMxrIZX.VzH8D8Jw1WoRxK0GvtklSg1fUV11cAy', 'Admin Perpustakaan', 'gambar_admin/harry.png');

-- --------------------------------------------------------

--
-- Table structure for table `data_anggota`
--

CREATE TABLE `data_anggota` (
  `id` varchar(10) NOT NULL,
  `no_induk` varchar(100) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `jk` varchar(2) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `foto` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_anggota`
--

INSERT INTO `data_anggota` (`id`, `no_induk`, `nama`, `username`, `password`, `jk`, `kelas`, `ttl`, `alamat`, `foto`) VALUES
('AG001', 'anggota@gmail.com', 'anggota', 'anggota', '$2y$10$TiqoeSE8GcL7p5lJKyV/7./a7EDMFZikpNQwj6IjAyE26Mgx3ibai', 'P', '10', 'Bogor, 12 07 1992', 'Jakarta', 'gambar_anggota/user_1567327491.jpg'),
('AG002', 'az@mail.com', 'ARFI ZULFIANSYAH', 'az', '$2y$10$22jDiPajMOdzxsDMqbNvIOv8nqEP5s4RoQg5nJO5FOjN2oH/ua51e', 'L', '12', 'Bogor, 12 07 1992', 'Depok', 'gambar_anggota/avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_buku`
--

CREATE TABLE `data_buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `pengarang` varchar(250) NOT NULL,
  `th_terbit` varchar(4) NOT NULL,
  `penerbit` varchar(250) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `kategori` int(5) NOT NULL,
  `tag` varchar(35) NOT NULL,
  `jumlah_buku` int(2) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `tgl_input` varchar(75) NOT NULL,
  `gambar` text NOT NULL,
  `link_buku` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_buku`
--

INSERT INTO `data_buku` (`id`, `judul`, `pengarang`, `th_terbit`, `penerbit`, `isbn`, `kategori`, `tag`, `jumlah_buku`, `asal`, `tgl_input`, `gambar`, `link_buku`) VALUES
(10, 'Kumpulan Cerita Anak', 'Sitti Rahmawati', '2015', '', '', 2, 'Utama', 0, 'Koleksi PerpustakaanKU', '2021/02/01', 'admin/gambar_buku/Screenshot 2022-12-29 at 22.04.12.png', 'https://ia801300.us.archive.org/25/items/CeritaAnak/Cerita%20Anak.pdf'),
(11, '12 Cerita Rakyat Jepang', 'Shito Naoko', '2010', 'Untuk Anak Indonesia', '0', 1, 'Utama', 0, 'Koleksi PerpustakaanKU', '2021/02/01', 'admin/gambar_buku/Screenshot 2022-12-29 at 22.28.55.png', 'https://ia801300.us.archive.org/25/items/CeritaAnak/Cerita%20Rakyat%20Jepang%20untuk%20anak%20Indonesia.pdf'),
(12, 'CERITA RAKYAT NUSANTARA 3KALIMANTAN TENGAH', 'ceritarakyatnusantara', '2012', 'http://ceritarakyatnusantara.com ', '0', 5, 'Utama', 0, 'Koleksi PerpustakaanKU', '2021/02/01', 'admin/gambar_buku/Screenshot 2022-12-29 at 22.31.00.png', 'https://ia801300.us.archive.org/25/items/CeritaAnak/Cerita%20Rakyat%20Nusantara%203.pdf'),
(13, 'Aku bangga menjadi muslim', 'Ummu Abdullah', '2017', 'Islam4Kids.com', '978-602-0337-135', 7, 'Slider', 0, 'Koleksi PerpustakaanKU', '2021/02/01', 'admin/gambar_buku/Screenshot 2022-12-29 at 22.04.12.png', 'https://ia601300.us.archive.org/25/items/CeritaAnak/Aku%20Bangga%20Menjadi%20Muslim.pdf'),
(25, 'Kisah Nusantara 2', 'http://ceritarakyatnusantara.com ', '2000', 'http://ceritarakyatnusantara.com ', '1', 8, '', 31, 'Koleksi PerpustakaanKU', '2022/12/29', 'admin/gambar_buku/Screenshot 2022-12-29 at 22.40.14.jpg', 'https://ia601300.us.archive.org/25/items/CeritaAnak/Cerita%20Rakyat%20Nusantara%202.pdf'),
(26, 'Abunawas - Sang Penggeli Hati ', 'MB. Rahimsyah ', '2000', 'Lintas Media', '1', 2, '', 132, 'Koleksi PerpustakaanKU', '2022/12/29', 'admin/gambar_buku/Screenshot 2022-12-29 at 22.56.43.jpg', 'https://ia801300.us.archive.org/25/items/CeritaAnak/Kisah%20Abu%20Nawas.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `data_buku_perpus`
--

CREATE TABLE `data_buku_perpus` (
  `id` varchar(20) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `sampul` text NOT NULL,
  `judul` varchar(200) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `jumlah_buku` int(4) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_buku_perpus`
--

INSERT INTO `data_buku_perpus` (`id`, `isbn`, `sampul`, `judul`, `kategori`, `penerbit`, `pengarang`, `tahun_terbit`, `jumlah_buku`, `keterangan`, `tanggal_masuk`) VALUES
('BK0001', '123322', 'gambar_buku/user_1567327491.jpg', 'Test buk2adsd', 'Umum', 'DDTT', 'RAZAads', 2021, 12, '', '2023-01-12'),
('BK0002', '1234', 'gambar_admin/avatar.jpg', 'Buku Bacaan', '8', 'DDT', 'Kang Ngarang', 2023, 1002, '', '2023-01-12'),
('BK0003', '1234', 'gambar_admin/avatar.jpg', 'Tidak ada judul', 'Novel', 'DDT', 'Kang ngarang', 2023, 1, '', '2023-01-12'),
('BK0004', '12345', 'gambar_admin/avatar.jpg', 'sudah ada judul', '8', 'Cak terbit', 'kang nulis', 2023, 23, 'Kegelapan', '2023-01-12'),
('BK0005', '123213', 'gambar_admin/avatar.jpg', '12321', '8', '132213213', '123123', 213123, 312, '33333', '2023-01-16'),
('BK0006', '213', 'gambar_admin/avatar.jpg', 'adsad123', 'Novel', 'q23123123', 'asdasdds123', 2000, 1, '', '2023-01-16'),
('BK0008', '132132', 'gambar_admin/avatar.jpg', '132', '8', '123213', '123', 1999, 1, '', '2023-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `data_peminjam`
--

CREATE TABLE `data_peminjam` (
  `id` varchar(10) NOT NULL,
  `id_anggota` varchar(25) NOT NULL,
  `id_buku_perpus` varchar(25) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `denda` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_peminjam`
--

INSERT INTO `data_peminjam` (`id`, `id_anggota`, `id_buku_perpus`, `tgl_pinjam`, `tgl_pengembalian`, `denda`, `status`, `tgl_kembali`) VALUES
('PJ001', 'AG001', 'BK0001', '2023-01-15', '2023-01-17', '0', 1, '2023-01-16'),
('PJ002', 'AG002', 'BK0002', '2023-01-14', '2023-01-16', '0', 1, '2023-01-16'),
('PJ003', 'AG002', 'BK0003', '2023-01-10', '2023-01-13', '1500', 1, '2023-01-16'),
('PJ004', 'AG002', 'BK0002', '2023-01-10', '2023-01-13', '1500', 1, '2023-01-16'),
('PJ005', 'AG001', 'BK0001', '2023-01-16', '2023-01-18', '0', 1, '2023-01-16'),
('PJ006', 'AG001', 'BK0001', '2023-01-14', '2023-01-15', '500', 1, '2023-01-16'),
('PJ007', 'AG002', 'BK0008', '2023-01-16', '2023-01-18', '0', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Filsafat'),
(2, 'Kisah'),
(3, 'Komputer'),
(4, 'Laporan'),
(5, 'Novel'),
(6, 'Politik'),
(7, 'Puisi'),
(8, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `kelas` varchar(17) NOT NULL,
  `perlu1` varchar(15) NOT NULL,
  `cari` varchar(255) NOT NULL,
  `saran` varchar(255) NOT NULL,
  `tgl_kunjung` date NOT NULL,
  `jam_kunjung` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `nama`, `jk`, `kelas`, `perlu1`, `cari`, `saran`, `tgl_kunjung`, `jam_kunjung`) VALUES
(10, 'Mihra Wardana', 'P', '19', 'Mencari referen', 'Buku yang berkaitan dengan komputer', 'Agar menyediakan lebih banyak buku referensi, sehingga kami dapat menemukan referensi sesuai kebutuhan kami', '2021-02-01', '14:35:53'),
(11, 'Wardana', 'P', '21', 'Membaca', 'Novel', 'Sebaiknya jumlah  referensi lebih ditingkatkan', '2021-02-01', '14:43:30'),
(12, 'ARFI ZULFIANSYAH', 'P', '21', 'berkunjung', 'pacar baru', 'asdas', '2022-02-12', '16:45:20'),
(13, 'Satelit & Partner', 'P', '21', 'asdasd', 'pacar baru', '', '2022-02-12', '16:53:30'),
(14, 'Alvioni & Partner', 'P', '21', 'asdasd', 'pacar baru', 'asdasd', '2022-12-02', '16:54:20'),
(15, 'admin', 'P', '12', 'berkunjung', 'asdad', 'ad', '2022-12-02', '16:56:41'),
(16, 'admin', 'P', '12', 'berkunjung', 'asdad', 'ad', '2022-12-02', '16:57:13'),
(17, 'admin', 'P', '12', 'berkunjung', 'asdad', 'ad', '2022-12-05', '09:46:30'),
(18, 'oop', 'P', '12', 'berkunjung', 'asdad', 'ad', '2022-12-05', '09:46:46'),
(19, 'az', 'L', '11', 'berkunjung', 'asdad', 'sadasd', '2022-12-05', '09:51:48'),
(20, 'ARFI ZULFIANSYAH', 'P', '21', 'berkunjung', 'pacar baru', '', '2022-12-07', '15:28:18'),
(21, 'ARFI ZULFIANSYAH', 'P', '21', 'berkunjung', 'pacar baru', '', '2022-12-09', '13:59:16'),
(22, 'https://getcid.info/', 'L', '21', 'berkunjung', 'pacar baru', 'asdasd', '2022-12-12', '10:14:27'),
(23, 'anggota', 'L', '21', 'berkunjung', 'pacar baru', 'sad', '2022-12-12', '10:17:00'),
(24, 'anggota', 'L', '21', 'berkunjung', 'pacar baru', '', '2022-12-12', '10:17:19'),
(25, 'asdasdasd', 'P', '21', 'berkunjung', 'pacar baru', 'saddsa', '2022-12-12', '10:18:53'),
(26, 'asdasdasd', 'P', '21', 'berkunjung', 'pacar baru', 'saddsa', '2022-12-12', '10:19:21'),
(27, 'asdasdasd', 'P', '21', 'berkunjung', 'pacar baru', 'saddsa', '2022-12-12', '10:19:21'),
(28, 'ARFI ZULFIANSYAH', 'L', '21', 'berkunjung', 'pacar baru', '', '2022-12-27', '13:26:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `data_anggota`
--
ALTER TABLE `data_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_buku_perpus`
--
ALTER TABLE `data_buku_perpus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_peminjam`
--
ALTER TABLE `data_peminjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
