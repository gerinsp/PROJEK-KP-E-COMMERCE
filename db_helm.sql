-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2021 pada 07.20
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_helm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `qty`, `subtotal`) VALUES
(41, 3, 8, 1, 400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `slug`, `title`) VALUES
(1, 'jas-hujan', 'Jas Hujan'),
(2, 'helm', 'helm'),
(3, 'sarung-tangan', 'Sarung Tangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` enum('waiting','verify','paid','delivered','accepted','cancel') NOT NULL,
  `no_resi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `date`, `invoice`, `ongkir`, `total`, `name`, `address`, `phone`, `status`, `no_resi`) VALUES
(1, 1, '2021-04-03', '120210403142839', 0, 1100000, 'Gerin Sena Pratama', 'Jl HO Iskandar No.16 Subang-Kuningan', '08123456765', 'accepted', ''),
(2, 1, '2021-04-04', '120210404163139', 0, 400000, 'Gerin Sena Pratama', 'Jl H.O Iskandar No.16 Subang-Kuningan', '08378652536', 'accepted', ''),
(3, 2, '2021-04-05', '220210405140240', 0, 400000, 'Aden', 'Kuningan', '083638362736', 'accepted', '120040042107018'),
(30, 1, '2021-04-16', '120210416000633', 45000, 845000, 'Aden', 'Banten', '08378652536', 'paid', ''),
(31, 1, '2021-04-21', '120210421121315', 36000, 336000, 'Gerin', 'Yogyakarta', '08378652536', 'delivered', '021020074257518'),
(34, 1, '2021-04-22', '120210422211937', 20000, 420000, 'Gerin Sena Pratama', 'Jakarta', '083638362736', 'paid', ''),
(35, 4, '2021-04-27', '420210427115806', 20000, 420000, 'Astri ', 'Jakarta', '08265826267', 'accepted', '1200400421070132'),
(36, 4, '2021-04-27', '420210427145052', 90000, 890000, 'Astri', 'Bali', '08378652536', 'waiting', ''),
(40, 6, '2021-05-30', '620210530213549', 20000, 420000, 'sena', 'Jakarta', '08378652536', 'delivered', '120040042107018'),
(41, 7, '2021-05-31', '720210531114355', 16000, 416000, 'gerin', 'kp a kec b blabla', '083638362736', 'accepted', 'hgjh568587'),
(42, 7, '2021-06-01', '720210601150611', 72000, 772000, 'astri', 'qwertyu', '098765', 'accepted', ''),
(43, 7, '2021-06-01', '720210601150752', 72000, 772000, 'astri', 'qwertyu', '098765', 'waiting', ''),
(44, 7, '2021-06-01', '720210601151217', 16000, 316000, 'astri', 'ljkjl', '567', 'accepted', ''),
(45, 7, '2021-06-01', '720210601151503', 60000, 760000, 'Gerin', 'hgfdjydfjyfru', '083638362736', 'waiting', ''),
(46, 7, '2021-06-01', '720210601151820', 30000, 730000, 'Aden', 'segesgs', '08265826267', 'paid', ''),
(47, 8, '2021-06-03', '820210603102235', 16000, 416000, 'astri suantri', 'indihiang tasikmlaya', '0987654321', 'accepted', '09240929498904'),
(51, 1, '2021-06-27', '120210627172505', 80000, 380000, 'Aden', 'okomjopmopm', '08123456765', 'waiting', ''),
(52, 1, '2021-06-27', '120210627172908', 114000, 914000, 'Gerin Sena Pratama', 'iuniuniuu', '08123456765', 'waiting', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_confirm`
--

CREATE TABLE `orders_confirm` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `orders_confirm`
--

INSERT INTO `orders_confirm` (`id`, `id_orders`, `account_name`, `account_number`, `nominal`, `note`, `image`, `gambar`, `title`, `comment`) VALUES
(1, 1, 'Gerin Sena Pratama', '98887638887263', 1100000, '-', '120210403142839-20210403224659.jpg', '', '', ''),
(2, 2, 'Gerin Sena Pratama', '98887638887263', 400000, '-', '120210404163139-20210404163250.jpg', 'helm-bell.webp', 'Barangnya bagus banget', 'Mirip kayak yang digambar, pokok nya pas nih suka :)'),
(3, 3, 'Aden', '02384893283429', 400000, '-', '220210405140240-20210405140343.jpg', '', '', ''),
(4, 31, 'Aden', '98887638887263', 300000, '-', '120210421121315-20210421121548.jpg', '', '', ''),
(5, 34, 'Gerin Sena Pratama', '98887638887263', 420000, '-', '120210422211937-20210422212112.jpg', '', '', ''),
(6, 35, 'Astri', '98887638887263', 420000, '-', '420210427115806-20210427120048.jpg', '', '', ''),
(7, 34, 'Gerin Sena Pratama', '98887638887263', 420000, '-', '120210422211937-20210427143749.jpg', '', '', ''),
(8, 40, 'sena', '98887638887263', 420000, '-', '620210530213549-20210530233229.jpg', '', '', ''),
(9, 41, 'Astri', '02384893283429', 416000, '', '720210531114355-20210531114709.jpg', '', '', ''),
(10, 42, 'Astri', '02384893283429', 772000, '-', '720210601150611-20210601150954.jpg', '', '', ''),
(11, 44, 'Astri', '989-', 316000, '-', '720210601151217-20210601151300.jpg', '', '', ''),
(12, 46, 'Astri', '98887638887263', 720000, '-', '720210601151820-20210601154340.jpg', '', '', ''),
(13, 46, 'Astri', '98887638887263', 10000, '-', '720210601151820-20210601154635.jpg', '', '', ''),
(14, 47, 'astri', '1234567890', 416000, '-', '820210603102235-20210603102408.jpg', '', '', ''),
(15, 30, 'Gerin Sena Pratama', '98887638887263', 1200000, '-', '120210416000633-20210627171056.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(4) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `id_orders`, `id_product`, `qty`, `subtotal`) VALUES
(1, 1, 7, 2, 600000),
(2, 1, 1, 2, 500000),
(3, 2, 8, 1, 400000),
(4, 3, 8, 1, 400000),
(5, 4, 8, 1, 400000),
(6, 5, 8, 1, 400000),
(7, 6, 8, 1, 400000),
(8, 7, 7, 1, 300000),
(9, 8, 8, 1, 400000),
(10, 9, 8, 1, 400000),
(11, 10, 8, 1, 400000),
(12, 11, 8, 1, 400000),
(13, 12, 8, 1, 400000),
(14, 13, 8, 1, 400000),
(15, 14, 8, 2, 800000),
(16, 14, 7, 1, 300000),
(17, 15, 7, 1, 300000),
(18, 16, 8, 1, 400000),
(19, 17, 9, 2, 600000),
(20, 30, 8, 2, 800000),
(21, 31, 7, 1, 300000),
(22, 34, 8, 1, 400000),
(23, 35, 8, 1, 400000),
(24, 36, 8, 2, 800000),
(25, 40, 8, 1, 400000),
(26, 41, 8, 1, 400000),
(27, 42, 8, 1, 400000),
(28, 42, 7, 1, 300000),
(29, 44, 7, 1, 300000),
(30, 45, 7, 1, 300000),
(31, 45, 8, 1, 400000),
(32, 46, 7, 1, 300000),
(33, 46, 8, 1, 400000),
(34, 47, 8, 1, 400000),
(35, 48, 8, 3, 1200000),
(36, 51, 7, 1, 300000),
(37, 52, 8, 2, 800000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `id_category`, `slug`, `title`, `description`, `price`, `berat`, `is_available`, `image`) VALUES
(1, 2, 'helm-bogo-classic-black-doff', 'Helm Bogo Classic Black Doff', 'Helm jenis bogo dengan warna hitam doff', 250000, 1300, 1, 'helm-bogo.webp'),
(7, 2, 'helm-honda-fabulous-m', 'Helm Honda Fabulous (M)', 'Helm honda jenis fabulous warna hitam', 300000, 1600, 1, 'helm-honda-fabulous-m-20210403122904.jpg'),
(8, 2, 'helm-bell-motto-3-classic-white', 'Helm Bell Moto-3 Classic White', 'Helm bell moto 3 warna putih', 400000, 1400, 1, 'helm-bell.webp'),
(11, 3, 'monotaro-thin-fit-palm-fit-gloves-natural-rubber-coat-sarung-tangan-palm-fit-grey-m-1pair', 'monotaro Thin Fit (Palm Fit) Gloves Natural Rubber Coat (Sarung Tangan Palm Fit) Grey M 1pair', 'Produk sarung tangan monotaro Thin Fit (Palm Fit) Gloves Natural Rubber Coat (Sarung Tangan Palm Fit) Grey M 1pair', 32000, 100, 1, 'monotaro-thin-fit-palm-fit-gloves-natural-rubber-coat-sarung-tangan-palm-fit-grey-m-1pair-20210603081708.jpg'),
(12, 3, 'trusco-work-gloves-tgm4501p-ecru-all-size-1pc', 'TRUSCO Work Gloves TGM4501P Ecru All size 1pc', 'Produk sarung tangan TRUSCO Work Gloves TGM4501P Ecru All size 1pc', 9900, 50, 1, 'trusco-work-gloves-tgm4501p-ecru-all-size-1pc-20210603081908.jpg'),
(13, 3, 'monotaro-polyurethane-coat-thin-fit-palm-fit-gloves-black-sarung-tangan-palm-fit', 'monotaro Polyurethane Coat Thin Fit (Palm Fit) Gloves Black (Sarung Tangan Palm Fit)', 'Produk sarung tangan monotaro Polyurethane Coat Thin Fit (Palm Fit) Gloves Black (Sarung Tangan Palm Fit)', 9900, 50, 1, 'monotaro-polyurethane-coat-thin-fit-palm-fit-gloves-black-sarung-tangan-palm-fit-20210603082216.jpg'),
(14, 1, 'axio-jas-hujan-europe-hijau-tua-882-xxxl-1set', 'AXIO Jas Hujan Europe Hijau Tua 882 XXXL 1set', 'Produk jas hujan AXIO Jas Hujan Europe Hijau Tua 882 XXXL 1set', 495000, 900, 1, 'axio-jas-hujan-europe-hijau-tua-882-xxxl-1set-20210603082643.jpg'),
(15, 1, 'kawanishi-vinyl-raincoat-1500b-m-blue-m-1set', 'KAWANISHI Vinyl Raincoat 1500B-M Blue M 1set', 'Produk jas hujan KAWANISHI Vinyl Raincoat 1500B-M Blue M 1set', 195000, 800, 1, 'kawanishi-vinyl-raincoat-1500b-m-blue-m-1set-20210603082736.jpg'),
(16, 1, 'trusco-rain-suit-jas-hujan-trw553l-navy-3l-1set', 'TRUSCO Rain Suit (Jas Hujan) TRW553L Navy 3L 1set', 'Produk jas hujan TRUSCO Rain Suit (Jas Hujan) TRW553L Navy 3L 1set', 240000, 900, 1, 'trusco-rain-suit-jas-hujan-trw553l-navy-3l-1set-20210603082842.jpg'),
(17, 2, 'helm-bogo-jpn-cream-gloss', 'Helm Bogo JPN Cream Gloss', 'Helm Bogo JPN Cream Gloss', 400000, 1000, 1, 'helm-bogo-jpn-cream-gloss-20210603102857.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telepon`) VALUES
(1, 'Ginanjar Helm', 468, 'Indihiang, Tasikmalaya', '081654765456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_password` varchar(225) NOT NULL,
  `role` enum('admin','member') NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `reset_password`, `role`, `is_active`, `image`) VALUES
(1, 'Gerin', 'gerin@gmail.com', '$2y$10$iW.spURayq1cocaAwsgsEOKYwblRX1c4.SWeN3cTYSWUtlSxBkHua', '934p2Ehxisr65BkquP1tK8THCOalwvJRDG0j7IcnZfVLUQbgYm', 'admin', 1, ''),
(3, 'gerin', 'gerin1@gmail.com', '$2y$10$MuM2P/upCgT4mP.zjDDH.OHYpHGh7b3oj8J3WB9dET3PLkxOUVZqO', '', 'member', 1, NULL),
(4, 'astri', 'astri@gmail.com', '$2y$10$iBv.w5BlHIhzEY8CPufDqeiLhM9c/xt8SBQ3LAqbV352BdSksYrRK', '', 'member', 1, NULL),
(5, 'aden', 'aden@gmail.com', '$2y$10$7RIB0DcB.7D8Bxztjno5o.dhzS/n0sSKy4wM9L5Lt1O3NQhnijz/W', '', 'member', 0, 'aden-20210427121934.png'),
(6, 'Sena', 'sena@gmail.com', '$2y$10$oYtJbLnOkNse8pPRLj6K5uNZ3Rx3IX.m5hs2.cfyyENmrtg2rgyH2', '', 'member', 1, NULL),
(7, 'astri susantri', 'susantri@gmail.com', '$2y$10$aa9FA.Itj3gSURpoypx3N.dfHP3HrDaqx.dyIrqq952eQXpwoxO6C', '', 'member', 1, NULL),
(8, 'astri', 'cicisusan@gmail.com', '$2y$10$REYCORTP0fpVGU5moZ3FE.LLRwuWrO9fvJipueaGK5AbVghHvJTR.', '', 'member', 1, NULL),
(9, 'gerin sena', 'gerinsena1@gamil.com', '$2y$10$5t/TTAN/AWI33ryJ09axLehTbo6UmEMkYyS5uxplODh3UliHqbMRO', '', 'admin', 1, NULL),
(10, 'gerin sp', 'denapratama7@gmail.com', '$2y$10$mC.4vuhaSD9L3pvtS1PmyekIJ0HKzosaEBptRgY4sH2vYaq9Yqsde', 'oBmneaSIzv0HiF37WdEpMLOgAND5YyTZlwUchstqjQJK8rCPGX', 'member', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders_confirm`
--
ALTER TABLE `orders_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `orders_confirm`
--
ALTER TABLE `orders_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
