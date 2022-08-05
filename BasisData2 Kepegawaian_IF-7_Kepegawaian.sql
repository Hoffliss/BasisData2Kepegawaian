-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2022 pada 04.32
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(5) NOT NULL,
  `tgl_cuti` date NOT NULL,
  `jml_cuti` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `tgl_cuti`, `jml_cuti`, `id_pegawai`) VALUES
(1, '2022-08-10', 8, 1),
(2, '2022-08-02', 2, 6),
(3, '2022-06-22', 6, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `slip_gaji` int(10) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `jml_gaji` int(10) NOT NULL,
  `potongan_gaji` int(10) NOT NULL,
  `jml_lembur` int(5) NOT NULL,
  `total_gaji` int(10) NOT NULL,
  `id_pegawai` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`slip_gaji`, `tgl_gaji`, `jml_gaji`, `potongan_gaji`, `jml_lembur`, `total_gaji`, `id_pegawai`) VALUES
(1234001, '2022-08-04', 1000000, 100000, 2, 900000, 1),
(1234002, '2022-05-01', 10000000, 1000000, 5, 9000000, 2),
(1234003, '2022-07-02', 10000000, 500000, 3, 9500000, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(3) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `gaji_pokok` int(12) NOT NULL,
  `tunjangan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tunjangan`) VALUES
('001', 'Manajer Keuangan', 10000000, 2000000),
('002', 'Manajer Personalia', 10000000, 2000000),
('003', 'Manajer Operasional', 10000000, 2000000),
('004', 'Manajer Pemasaran', 10000000, 2000000),
('011', 'Staff / Karyawan', 6000000, 1000000),
('123', 'Direktur Utama', 12000000, 5000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembur`
--

CREATE TABLE `lembur` (
  `id_lembur` int(3) NOT NULL,
  `tgl_lembur` date NOT NULL,
  `jml_lembur` int(5) NOT NULL,
  `id_pegawai` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lembur`
--

INSERT INTO `lembur` (`id_lembur`, `tgl_lembur`, `jml_lembur`, `id_pegawai`) VALUES
(1, '2022-08-04', 2, 1),
(2, '2022-04-05', 5, 2),
(3, '2022-05-11', 3, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_jabatan`
--

CREATE TABLE `log_jabatan` (
  `waktu` date DEFAULT NULL,
  `keterangan` varchar(20) NOT NULL,
  `jabatan_lama` varchar(30) NOT NULL,
  `jabatan_baru` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_jabatan`
--

INSERT INTO `log_jabatan` (`waktu`, `keterangan`, `jabatan_lama`, `jabatan_baru`) VALUES
('2022-08-02', 'Ubah Jabatan', '123', '001'),
('2022-08-05', 'Ubah Jabatan', '011', '011');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `jk_pegawai` enum('Laki - Laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status` enum('Menikah','Belum Menikah') NOT NULL,
  `no_telp_pegawai` varchar(12) NOT NULL,
  `alamat_pegawai` varchar(35) NOT NULL,
  `id_jabatan` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `jk_pegawai`, `tgl_lahir`, `status`, `no_telp_pegawai`, `alamat_pegawai`, `id_jabatan`) VALUES
(1, 'Kosim Aja', 'Laki - Laki', '2022-08-04', 'Menikah', '082765469988', 'Jl. Tomat 3', '001'),
(2, 'Dudi', 'Laki - Laki', '1972-08-01', 'Menikah', '089453627581', 'Jl Bojongkali 90', '001'),
(3, 'Jesi', 'Perempuan', '2001-03-07', 'Belum Menikah', '086534591027', 'Jl Pasir Kaliki', '002'),
(4, 'Ziko', 'Laki - Laki', '1992-09-02', 'Belum Menikah', '084566417289', 'Jl Raya Bandung no 12', '003'),
(5, 'Indah', 'Perempuan', '1973-06-14', 'Menikah', '089543218954', 'Jl Buah Batu no 88', '004'),
(6, 'Asep', 'Laki - Laki', '1998-08-04', 'Belum Menikah', '085443278549', 'Jl Kiaracondong Barat no 12', '011');

--
-- Trigger `pegawai`
--
DELIMITER $$
CREATE TRIGGER `ubah_jabatan` AFTER UPDATE ON `pegawai` FOR EACH ROW INSERT INTO log_jabatan VALUES
		(NOW(),'Ubah Jabatan', OLD.id_jabatan, NEW.id_jabatan)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`slip_gaji`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id_lembur`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `slip_gaji` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8102023;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lembur`
--
ALTER TABLE `lembur`
  ADD CONSTRAINT `lembur_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
