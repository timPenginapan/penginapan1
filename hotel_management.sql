-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 27, 2025 at 05:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int NOT NULL,
  `id_user` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('draft','published') DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_user`, `judul`, `konten`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tips Memilih Penginapan yang Tepat', 'Artikel tentang bagaimana memilih penginapan yang sesuai dengan kebutuhan...', NULL, 'published', '2025-09-27 14:45:17', '2025-09-27 14:45:17'),
(2, 1, 'Fasilitas Hotel yang Wajib Ada', 'Berbagai fasilitas yang seharusnya tersedia di hotel modern...', NULL, 'draft', '2025-09-27 14:45:17', '2025-09-27 14:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int NOT NULL,
  `id_user` int NOT NULL,
  `id_penginapan` int NOT NULL,
  `rating` int DEFAULT NULL,
  `komentar` text,
  `status` enum('pending','disetujui','ditolak') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_user`, `id_penginapan`, `rating`, `komentar`, `status`, `created_at`) VALUES
(1, 3, 1, 5, 'Pelayanan sangat memuaskan, kamar bersih dan nyaman!', 'disetujui', '2025-09-27 14:45:17'),
(2, 3, 2, 4, 'Pemandangan bagus, tapi harga agak mahal', 'pending', '2025-09-27 14:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int NOT NULL,
  `id_user` int NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('belum_dibaca','dibaca') DEFAULT 'belum_dibaca',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_user`, `pesan`, `status`, `created_at`) VALUES
(1, 3, 'Reservasi Anda untuk Hotel Bintang 5 telah dikonfirmasi', 'dibaca', '2025-09-27 14:45:17'),
(2, 3, 'Pembayaran untuk Villa Pantai Indah menunggu konfirmasi', 'belum_dibaca', '2025-09-27 14:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `penginapan`
--

CREATE TABLE `penginapan` (
  `id_penginapan` int NOT NULL,
  `id_user` int NOT NULL,
  `nama_penginapan` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text,
  `harga` decimal(12,2) NOT NULL,
  `fasilitas` text,
  `jumlah_kamar` int NOT NULL,
  `status` enum('tersedia','tidak tersedia') DEFAULT 'tersedia',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penginapan`
--

INSERT INTO `penginapan` (`id_penginapan`, `id_user`, `nama_penginapan`, `alamat`, `deskripsi`, `harga`, `fasilitas`, `jumlah_kamar`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Hotel Bintang 5', 'Jl. Merdeka No. 123, Jakarta', 'Hotel mewah dengan fasilitas lengkap dan pelayanan terbaik', 750000.00, 'AC, TV, WiFi, Kolam Renang, Spa', 50, 'tidak tersedia', '2025-09-27 14:45:17', '2025-09-27 17:23:06'),
(2, 2, 'Villa Pantai Indah', 'Jl. Pantai No. 45, Bali', 'Villa eksklusif dengan pemandangan pantai yang menakjubkan', 1200000.00, 'AC, TV, WiFi, Kolam Renang Pribadi, Dapur', 10, 'tersedia', '2025-09-27 14:45:17', '2025-09-27 14:45:17'),
(3, 2, 'Hotel Budget', 'Jl. Ekonomi No. 67, Bandung', 'Hotel nyaman dengan harga terjangkau', 350000.00, 'AC, TV, WiFi', 30, 'tersedia', '2025-09-27 14:45:17', '2025-09-27 14:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int NOT NULL,
  `id_user` int NOT NULL,
  `id_penginapan` int NOT NULL,
  `tanggal_checkin` date NOT NULL,
  `tanggal_checkout` date NOT NULL,
  `jumlah_kamar` int NOT NULL,
  `total_harga` decimal(12,2) NOT NULL,
  `status` enum('pending','menunggu_konfirmasi','dikonfirmasi','dibatalkan') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_user`, `id_penginapan`, `tanggal_checkin`, `tanggal_checkout`, `jumlah_kamar`, `total_harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2023-06-15', '2023-06-17', 2, 1500000.00, 'menunggu_konfirmasi', '2025-09-27 14:45:17', '2025-09-27 17:25:13'),
(2, 3, 2, '2023-06-20', '2023-06-22', 1, 2400000.00, 'menunggu_konfirmasi', '2025-09-27 14:45:17', '2025-09-27 14:45:17'),
(3, 3, 3, '2023-07-01', '2023-07-03', 1, 700000.00, 'pending', '2025-09-27 14:45:17', '2025-09-27 14:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `id_reservasi` int NOT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `status_pembayaran` enum('pending','lunas','gagal') DEFAULT 'pending',
  `jumlah_pembayaran` decimal(12,2) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_pembayaran` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_reservasi`, `metode_pembayaran`, `status_pembayaran`, `jumlah_pembayaran`, `bukti_pembayaran`, `tanggal_pembayaran`, `created_at`) VALUES
(1, 1, 'Transfer Bank', 'lunas', 1500000.00, NULL, NULL, '2025-09-27 14:45:17'),
(2, 2, 'Credit Card', 'pending', 2400000.00, NULL, NULL, '2025-09-27 14:45:17'),
(3, 3, 'Transfer Bank', 'pending', 700000.00, NULL, NULL, '2025-09-27 14:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text,
  `role` enum('customer','mitra','admin') DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `no_hp`, `alamat`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin Hotel', 'admin@hotel.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '081234567890', 'Jl. Admin No. 1', 'admin', '2025-09-27 14:45:17', '2025-09-27 15:12:41'),
(2, 'Mitra Contoh', 'mitra@hotel.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '081234567891', 'Jl. Mitra No. 1', 'mitra', '2025-09-27 14:45:17', '2025-09-27 14:45:17'),
(3, 'Customer Contoh', 'customer@hotel.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '081234567892', 'Jl. Customer No. 1', 'customer', '2025-09-27 14:45:17', '2025-09-27 14:45:17'),
(4, 'amnan', 'amnan@gmail.com', '12345678', '0882003370440', 'sumuran', 'admin', '2025-09-27 15:00:44', '2025-09-27 15:00:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_penginapan` (`id_penginapan`),
  ADD KEY `idx_komentar_status` (`status`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id_penginapan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `idx_penginapan_status` (`status`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_penginapan` (`id_penginapan`),
  ADD KEY `idx_reservasi_status` (`status`),
  ADD KEY `idx_reservasi_dates` (`tanggal_checkin`,`tanggal_checkout`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_reservasi` (`id_reservasi`),
  ADD KEY `idx_transaksi_status` (`status_pembayaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_users_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penginapan`
--
ALTER TABLE `penginapan`
  MODIFY `id_penginapan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_penginapan`) REFERENCES `penginapan` (`id_penginapan`) ON DELETE CASCADE;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD CONSTRAINT `penginapan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`id_penginapan`) REFERENCES `penginapan` (`id_penginapan`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id_reservasi`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
