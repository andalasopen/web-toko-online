-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Jan 2020 pada 23.45
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `title_menu` varchar(50) NOT NULL,
  `url_menu` varchar(50) NOT NULL,
  `icon_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `title_menu`, `url_menu`, `icon_menu`) VALUES
(1, 'Elektronik', 'kategori/elektronik', 'fas fa-fw fa-tv'),
(2, 'Akesoris & Komputer', 'kategori/aksesoris-and-komputer', 'fas fa-fw fa-tv'),
(3, 'Pakaian Pria', 'kategori/pakaian-pria', 'fad fa-fw fa-tshirt'),
(4, 'Pakaian Wanita', 'kategori/pakaian-wanita', 'fad fa-fw fa-tshirt'),
(5, 'Pakaian Anak-anak', 'kategori/pakaian-anak-anak', 'fad fa-fw fa-tshirt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(120) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `slug`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(2, 'ASUS Notebook K403FA-EB502T [90NB0LP4-M01750] - Petal Pink', 'asus-notebook-k403fa-eb502t-90nb0lp4-m01750-petal-pink', 'Processor: Intel Core i5-8265U,RAM: 8GB LPDDR3, SSD: 512GB,Konektivitas: Wifi + Bluetooth,Ukuran Layar: 14 Inch FHD, Fingerprint,Sistem Operasi: ...', 'Elektronik', 9699000, 10, 'laptop1.jpeg'),
(3, 'kemeja pria lengan panjang', 'kemeja-pria-lengan-panjang', 'matt katun strecth slim best quality kantong hidup ld 102 pjg 70', 'Pakaian Pria', 120000, 5, 'images1.jpeg'),
(4, 'ACER Swift 7 (SF713-51) (Core i7-7Y75) - Gold', 'acer-swift-7-sf713-51-core-i7-7y75-gold', 'garansi 3 bulan', 'Elektronik', 22465000, 10, 'a7.jpg'),
(5, 'HP Business EliteBook X360 1020 G2', 'hp-business-elitebook-x360-1020-g2', 'garansi 3 bulan', 'Aksesoris and Komputer', 32520000, 4, 'a9.jpg'),
(6, 'camera sony type xxxx', 'camera-sony-type-xxxx', 'keluaran 2019', 'Elektronik', 2500000, 10, 'image-2.jpg'),
(7, 'parfum adidas', 'parfum-adidas', '100ml', 'Pakaian Pria', 150000, 10, '2.jpg'),
(8, 'oppo a3s', 'oppo-a3s', 'ram 3gb  rom64gb', 'Aksesoris and Komputer', 1800000, 10, 'cart-2.jpg'),
(9, 'test', 'test', '', 'Aksesoris and Komputer', 1500000, 12, 'cart-1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(21, '', '', '2020-01-27 06:05:45', '2020-01-29 06:05:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(16, 21, 3, 'kemeja pria lengan panjang', 1, 120000, '');

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
