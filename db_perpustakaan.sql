-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2018 pada 08.44
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_perpustakaan`
--
CREATE DATABASE IF NOT EXISTS `db_perpustakaan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_perpustakaan`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE IF NOT EXISTS `akses` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'data', '8d777f385d3dfec8815d20f7496026dc', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `kode_buku` varchar(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jumlah_buku` int(10) NOT NULL,
  PRIMARY KEY (`kode_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `pengarang`, `keterangan`, `jumlah_buku`) VALUES
('0257', 'matematika', 'jenifer', 'rumus matematika untuk kelas 1 sd - 6 sd', 8),
('0486', 'doraemon', 'tomas alfa', 'cerita di negeri dongeng kaisaran', 6),
('0735', 'Harry Potter dan Orde Phoenix', ' J.K. Rowling', 'Harry Potter dan Orde Phoenix', 4),
('07738', 'laskar pelangi', 'Andrea Hirata', 'Laskar Pelangi adalah novel pertama karya Andrea Hirata', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `no_member` varchar(10) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`no_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`no_member`, `nama_member`, `alamat`, `no_hp`, `password`) VALUES
('0386', 'monica', 'Pendowo', '0378995744', 'e10adc3949ba59abbe56e057f20f883e'),
('124', 'agustina', 'pemalang', '09363637833', '827ccb0eea8a706c4c34a16891f84e7b'),
('17339', 'septiana', 'jakarta', '037548844', '827ccb0eea8a706c4c34a16891f84e7b'),
('235', 'septiani', 'jakarta selatan', '0863534353', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `no_peminjaman` int(20) NOT NULL AUTO_INCREMENT,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `no_member` varchar(20) NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  PRIMARY KEY (`no_peminjaman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94782 ;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`no_peminjaman`, `tgl_pinjam`, `tgl_kembali`, `no_member`, `kode_buku`) VALUES
(9376, '2018-09-02', '2018-09-12', '0386', '0735'),
(35677, '2018-09-12', '2018-09-20', '235', '07738'),
(94778, '2018-09-04', '2018-09-14', '0386', '0257'),
(94779, '2018-09-06', '2018-09-28', '0386', '0257'),
(94780, '2018-09-11', '2018-09-15', '0386', '0486'),
(94781, '2018-09-05', '2018-09-28', '0386', '0486');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
