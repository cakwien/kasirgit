-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2019 pada 03.33
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appkasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `idclient` int(11) NOT NULL,
  `nmclient` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(16) NOT NULL,
  `tgl` date NOT NULL,
  `stclient` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`idclient`, `nmclient`, `alamat`, `nohp`, `tgl`, `stclient`) VALUES
(1, 'Bambang', 'bwi', '+6285330871075', '2019-11-20', 'aktif'),
(2, 'Bambang 2', 'bwi', '+6285330871075', '2019-11-20', 'aktif'),
(3, 'Samsul', 'bwi', '+6285330871075', '2019-11-20', 'nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `desain`
--

CREATE TABLE `desain` (
  `iddesain` int(11) NOT NULL,
  `wktdesain` date NOT NULL,
  `iduser` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `iditem` int(11) NOT NULL,
  `p` float NOT NULL,
  `l` float NOT NULL,
  `ket` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `desain`
--

INSERT INTO `desain` (`iddesain`, `wktdesain`, `iduser`, `idclient`, `iditem`, `p`, `l`, `ket`, `status`) VALUES
(1, '2019-11-25', 2, 1, 1, 2, 2, 'Banner Pramuka', '1'),
(2, '2019-11-25', 2, 1, 1, 2, 3, 'Stiker Logo JMP', '1'),
(6, '2019-11-26', 2, 1, 1, 2, 2, 'Banner Baru 1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `iditem` int(11) NOT NULL,
  `nmitem` varchar(60) NOT NULL,
  `jenis` enum('Indoor','Outdoor') NOT NULL,
  `satuan` enum('m','cm') NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`iditem`, `nmitem`, `jenis`, `satuan`, `harga`) VALUES
(1, 'Banner 1', 'Outdoor', 'm', 16500),
(2, 'Sticker', 'Indoor', 'cm', 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `idmember` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `nohp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idtrans` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `idclient` int(50) NOT NULL,
  `harga` double NOT NULL,
  `diskon` int(11) NOT NULL,
  `hargabayar` int(11) NOT NULL,
  `bayar` double NOT NULL,
  `kembali` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtrans`, `tanggal`, `idclient`, `harga`, `diskon`, `hargabayar`, `bayar`, `kembali`) VALUES
(3, '2019-11-25', 1, 165000, 16500, 148500, 150000, 1500),
(4, '2019-11-26', 1, 66000, 6600, 59400, 100000, 40600);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `level` enum('kas','des','adm') NOT NULL,
  `foto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `pass`, `level`, `foto`) VALUES
(1, 'Kasir1', 'kasir', 'kasir', 'kas', ''),
(2, 'Desainer1', 'desain', 'desain', 'des', ''),
(3, 'admin1', 'admin', 'admin', 'adm', ''),
(4, 'Noval', 'desain2', 'desain', 'des', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idclient`);

--
-- Indeks untuk tabel `desain`
--
ALTER TABLE `desain`
  ADD PRIMARY KEY (`iddesain`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iditem`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idmember`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtrans`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `desain`
--
ALTER TABLE `desain`
  MODIFY `iddesain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `idmember` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
