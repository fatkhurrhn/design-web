-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 09:59 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_foto_pembelian`
--

CREATE TABLE `tb_foto_pembelian` (
  `no` int(3) NOT NULL,
  `foto_transaksi` text NOT NULL,
  `foto_desain_selesai` text NOT NULL,
  `foto_pengembalian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_foto_pembelian`
--

INSERT INTO `tb_foto_pembelian` (`no`, `foto_transaksi`, `foto_desain_selesai`, `foto_pengembalian`) VALUES
(20, 'images/pembelian/foto_transaksi/20.jpg', 'images/pembelian/foto_desain_selesai/20.jpg', ''),
(21, 'images/pembelian/foto_transaksi/21.jpg', 'images/pembelian/foto_desain_selesai/21.jpg', ''),
(27, 'images/pembelian/foto_transaksi/27.jpg', 'images/pembelian/foto_desain_selesai/27.jpg', '{\"jumlah_rusak\":\"1\",\"keterangan\":\"luntur dan sobek\",\"foto\":[{\"img\":\"images\\/pengembalian\\/27\\/0.jpg\"}]}'),
(29, 'images/pembelian/foto_transaksi/29.jpg', 'images/pembelian/foto_desain_selesai/29.jpg', ''),
(31, 'images/pembelian/foto_transaksi/31.jpg', 'images/pembelian/foto_desain_selesai/31.jpg', ''),
(32, 'images/pembelian/foto_transaksi/32.jpg', 'images/pembelian/foto_desain_selesai/32.jpg', ''),
(37, 'images/pembelian/foto_transaksi/37.jpg', 'images/pembelian/foto_desain_selesai/37.jpg', ''),
(39, 'images/pembelian/foto_transaksi/39.jpg', 'images/pembelian/foto_desain_selesai/39.jpg', ''),
(52, 'images/pembelian/foto_transaksi/52.jpg', 'images/pembelian/foto_desain_selesai/52.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `no` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`no`, `nama`) VALUES
(1, 'Undangan'),
(2, 'Kartu Nama'),
(3, 'Spanduk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komen`
--

CREATE TABLE `tb_komen` (
  `no` int(11) NOT NULL,
  `komen` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komen`
--

INSERT INTO `tb_komen` (`no`, `komen`) VALUES
(10, '[{\"id_pembeli\":\"5\",\"id_pembelian\":\"21\",\"komen\":\"Barang diterima dengan keadaan baik\"}]'),
(11, '[{\"id_pembeli\":\"7\",\"id_pembelian\":\"29\",\"komen\":\"Bagus, Barang diterima dengan keadan bagus\"}]'),
(18, '[{\"id_pembeli\":\"7\",\"id_pembelian\":\"27\",\"komen\":\"desain bagussss\"}]'),
(19, '[{\"id_pembeli\":\"7\",\"id_pembelian\":\"31\",\"komen\":\"produk bagus\"}]'),
(20, '[{\"id_pembeli\":\"5\",\"id_pembelian\":\"20\",\"komen\":\"Barang diterima dengan keadaan baik\"},{\"id_pembeli\":\"7\",\"id_pembelian\":\"32\",\"komen\":\"produk bagus\"}]'),
(22, '[{\"id_pembeli\":\"7\",\"id_pembelian\":\"39\",\"komen\":\"bagus\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komen_desain_sendiri`
--

CREATE TABLE `tb_komen_desain_sendiri` (
  `no` int(3) NOT NULL,
  `komen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembeli`
--

CREATE TABLE `tb_pembeli` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  `alamat` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembeli`
--

INSERT INTO `tb_pembeli` (`id`, `nama`, `email`, `no_telpon`, `alamat`) VALUES
(1, 'Adrianus Aransina Tukan', 'karauksii@gmail.com', '082293246583', 'Jln Bukit Indah, Soreang, Parepare'),
(2, 'Kicap', 'karauksii@gmail.com', '082293246583', 'Batu 3 1/2, Jalan Apas, Taman Good View, Tawau, Sabah'),
(3, 'yuni', 'yunimulti263@yahoo.co.id', '083435543667', 'Parepare'),
(4, 'uni', 'uni@yahoo.com', '082333234567', 'Parepare, Perumnas wekke\'e'),
(5, 'Hasmia', 'hasmiah@yahoo.co.id', '082556456456', 'parepare'),
(6, 'chica', 'chica@yahoo.co.id', '082456546543', 'sidrap'),
(7, 'ip', 'st249380@gmail.com', '085342033354', 'sidrap'),
(8, 'dilla', 'dillah95@gmail.com', '082567568457', 'wajo'),
(9, 'alam', 'alam123@yahoo.co.id', '082657546556', 'Parepare'),
(10, 'lina', 'lina@facebook', '084566676566', 'Parepare');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `no` int(4) NOT NULL,
  `desain` int(1) NOT NULL,
  `kategori` int(1) DEFAULT NULL,
  `id_pembeli` int(3) NOT NULL,
  `id_produk` int(4) DEFAULT NULL,
  `id_transaksi` int(1) NOT NULL,
  `waktu_pembelian` datetime NOT NULL DEFAULT current_timestamp(),
  `deadline` int(1) DEFAULT NULL,
  `waktu_penerimaan` datetime DEFAULT NULL,
  `ket` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`no`, `desain`, `kategori`, `id_pembeli`, `id_produk`, `id_transaksi`, `waktu_pembelian`, `deadline`, `waktu_penerimaan`, `ket`) VALUES
(20, 0, NULL, 5, 20, 7, '2020-06-17 14:33:25', 3, '2020-06-29 19:50:03', '{\"panjang\":\"2\",\"lebar\":\"1\",\"jumlah_kertas\":\"1\",\"alamat\":\"parepare\",\"nama\":\"Sosbak (Sosis Bakar)\",\"tema\":\"Sosbak Makanan Anak Kekinian\",\"tanggal\":\"2020-06-24\",\"waktu\":\"14:36\",\"alamat_data\":\"Makassar\",\"no_telpon\":\"085342033354\",\"media_sosial\":\"Hasmia@yahoo.co.id\",\"penambahan_ket\":\"Jl. Jendral Ahmad Yani No.1\"}'),
(21, 0, NULL, 5, 10, 7, '2020-06-17 14:36:30', 4, '2020-06-29 19:50:18', '{\"panjang\":\"2\",\"lebar\":\"2.5\",\"jumlah_kertas\":\"1\",\"alamat\":\"parepare\",\"nama\":\"Kioas Cell Hasmia\",\"tema\":\"Beli Pulsa, Kouta data, kartu telpon dengan harga yang terjamin jerjangkau\",\"tanggal\":\"2020-06-28\",\"waktu\":\"12:36\",\"alamat_data\":\"Makassar\",\"no_telpon\":\"085342033354\",\"media_sosial\":\"Hasmia@yahoo.co.id\",\"penambahan_ket\":\"Makassar Jl. Jend Ahmad Yani No.1\"}'),
(27, 0, NULL, 7, 18, 11, '2020-06-24 19:45:58', 6, '2020-06-24 20:48:48', '{\"panjang\":\"2\",\"lebar\":\"3\",\"jumlah_kertas\":\"1\",\"alamat\":\"soppeng\",\"nama\":\"Maulid Besar\",\"tema\":\"Merayakan Hari Kelahiran Nabi Muhammad SAW\",\"tanggal\":\"2020-10-28\",\"waktu\":\"22:47\",\"alamat_data\":\"Soppeng\",\"no_telpon\":\"085434666876\",\"media_sosial\":\"Tilawa764@Yahoo.co.id\",\"penambahan_ket\":\"\"}'),
(29, 0, NULL, 7, 11, 7, '2020-06-24 21:30:44', 5, '2020-06-29 20:15:51', '{\"panjang\":\"1\",\"lebar\":\"1.5\",\"jumlah_kertas\":\"1\",\"alamat\":\"soppeng\",\"nama\":\"Baharuddin\",\"tema\":\"minuman\",\"tanggal\":\"2020-07-07\",\"waktu\":\"12:30\",\"alamat_data\":\"Makassar\",\"no_telpon\":\"082567568457\",\"media_sosial\":\"rudding@gmail.com\",\"penambahan_ket\":\"\"}'),
(31, 0, NULL, 7, 19, 7, '2020-06-27 22:12:49', 6, '2020-07-10 22:33:01', '{\"panjang\":\"2\",\"lebar\":\"2.5\",\"jumlah_kertas\":\"1\",\"alamat\":\"soppeng\",\"nama\":\"Minuman Kekinian Bubble Rainbow\",\"tema\":\"minuman\",\"tanggal\":\"2020-07-09\",\"waktu\":\"13:14\",\"alamat_data\":\"Soppeng\",\"no_telpon\":\"082567568457\",\"media_sosial\":\"ip314@gmail.com\",\"penambahan_ket\":\"\"}'),
(32, 0, NULL, 7, 20, 7, '2020-06-27 22:15:02', 5, '2020-07-10 22:33:20', '{\"panjang\":\"2\",\"lebar\":\"1\",\"jumlah_kertas\":\"1\",\"alamat\":\"soppeng\",\"nama\":\"Minuman Kekinian Bubble Rainbow\",\"tema\":\"Makanan\",\"tanggal\":\"2020-07-07\",\"waktu\":\"13:17\",\"alamat_data\":\"Soppeng\",\"no_telpon\":\"085342033354\",\"media_sosial\":\"ip314@gmail.com\",\"penambahan_ket\":\"\"}'),
(37, 0, NULL, 6, 18, 4, '2020-06-29 20:11:38', 7, NULL, '{\"panjang\":\"2\",\"lebar\":\"2.5\",\"jumlah_kertas\":\"1\",\"alamat\":\"sidrap\",\"nama\":\"Maulid Nabi Besar\",\"tema\":\"Merayakan Hari Kelahiran Nabi Muhammad SAW\",\"tanggal\":\"2020-07-10\",\"waktu\":\"20:16\",\"alamat_data\":\"Sidrap\",\"no_telpon\":\"085434666876\",\"media_sosial\":\"Chica@gmail.com\",\"penambahan_ket\":\"\"}'),
(39, 0, NULL, 7, 22, 7, '2020-07-10 14:26:51', 5, '2020-07-16 11:24:57', '{\"panjang\":\"2\",\"lebar\":\"2\",\"jumlah_kertas\":\"1\",\"alamat\":\"soppeng\",\"nama\":\"LOMBA\",\"tema\":\"Mengaktifkan kreatif anak-anak\",\"tanggal\":\"2020-07-31\",\"waktu\":\"22:29\",\"alamat_data\":\"Makassar\",\"no_telpon\":\"083435543667\",\"media_sosial\":\"ip314@gmail.com\",\"penambahan_ket\":\"\"}'),
(52, 1, 3, 5, NULL, 5, '2020-08-09 05:00:46', 4, NULL, '{\"panjang\":\"2\",\"lebar\":\"2\",\"jumlah_kertas\":\"1\",\"alamat\":\"parepare\",\"nama\":\"-\",\"tema\":\"-\",\"tanggal\":\"\",\"waktu\":\"\",\"alamat_data\":\"-\",\"no_telpon\":\"-\",\"media_sosial\":\"-\",\"penambahan_ket\":\"-\"}'),
(55, 0, NULL, 1, 68, 1, '2020-08-17 19:13:42', 3, NULL, '{\"jenis_kertas\":\"4000\",\"jumlah_kertas\":\"10\",\"alamat\":\"Jln Bukit Indah, Soreang, Parepare\",\"nama_pertama\":\"Kicap\",\"ket_nama_pertama\":\"Programmer\",\"nama_kedua\":\"Belum Ada\",\"ket_nama_kedua\":\"Gitaris\",\"tanggal\":\"2020-08-18\",\"akad\":\"123\",\"resepsi\":\"Ndak juga ku tau\",\"nama_ortu_pertama\":\"Antonius Medon Tukan\",\"ket_ortu_pertama\":\"Ndak Kerja\",\"nama_ortu_kedua\":\"Yohanna Parrangan\",\"ket_ortu_kedua\":\"Suri Rumah\",\"nama_keluarga_mengundang\":\"Sedare Mare\",\"ket_keluarga_mengundang\":\"Handalan Semua\",\"penambahan_ket\":\"asdasdsa\"}'),
(56, 0, NULL, 1, 75, 1, '2020-08-17 19:55:44', 4, NULL, '{\"jenis_kertas\":\"4000\",\"jumlah_kertas\":\"10\",\"alamat\":\"Jln Bukit Indah, Soreang, Parepare\",\"nama_anak\":\"Yohanna\",\"ket_anak\":\"Nama Panggillan : Ana\",\"tanggal\":\"2020-08-28\",\"waktu\":\"19:57\",\"tempat\":\"rumah bosku\",\"nama_ortu\":\"Antonius Medon Tukan \\/ Yohanna Parrangan\",\"ket_ortu\":\"Tiada Bosku\",\"nama_keluarga_mengundang\":\"Sedare Mare\",\"ket_keluarga_mengundang\":\"Handalan Semua\",\"penambahan_ket\":\"\"}'),
(57, 0, NULL, 1, 83, 1, '2020-08-17 20:00:52', 3, NULL, '{\"jenis_kertas\":\"25000\",\"jumlah_kertas\":\"10\",\"alamat\":\"Jln Bukit Indah, Soreang, Parepare\",\"nama\":\"Adrianus Aransina Tukan\",\"no_telpon\":\"0822516515615\",\"pekerjaan\":\"Programmer\",\"alamat_data\":\"Universitas Muhammadiyah Parepare\",\"media_sosial\":\"www.facebook.com\\/kicap.karan\",\"penambahan_ket\":\"\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `no` int(4) NOT NULL,
  `kategori` int(1) NOT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `keterangan` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`no`, `kategori`, `tanggal_upload`, `keterangan`) VALUES
(10, 3, '2020-04-16', '{\"harga\":\"4000\",\"img\":\"images\\/produk\\/10.jpg\"}'),
(11, 3, '2020-04-16', '{\"harga\":\"3000\",\"img\":\"images\\/produk\\/11.jpg\"}'),
(13, 3, '2020-04-16', '{\"harga\":\"3500\",\"img\":\"images\\/produk\\/13.jpg\"}'),
(16, 3, '2020-04-16', '{\"harga\":\"3000\",\"img\":\"images\\/produk\\/16.jpg\"}'),
(17, 3, '2020-04-16', '{\"harga\":\"2500\",\"img\":\"images\\/produk\\/17.jpg\"}'),
(18, 3, '2020-04-16', '{\"harga\":\"4000\",\"img\":\"images\\/produk\\/18.jpg\"}'),
(19, 3, '2020-04-16', '{\"harga\":\"4500\",\"img\":\"images\\/produk\\/19.jpg\"}'),
(20, 3, '2020-04-16', '{\"harga\":\"3500\",\"img\":\"images\\/produk\\/20.jpg\"}'),
(21, 3, '2020-04-16', '{\"harga\":\"3000\",\"img\":\"images\\/produk\\/21.jpg\"}'),
(22, 3, '2020-04-16', '{\"harga\":\"5000\",\"img\":\"images\\/produk\\/22.jpg\"}'),
(23, 3, '2020-04-16', '{\"harga\":\"3000\",\"img\":\"images\\/produk\\/23.jpg\"}'),
(24, 3, '2020-04-16', '{\"harga\":\"3500\",\"img\":\"images\\/produk\\/24.jpg\"}'),
(68, 1, NULL, '{\"undangan\":\"2\",\"harga\":\"3000\",\"img\":\"images\\/produk\\/68.jpg\"}'),
(69, 1, NULL, '{\"undangan\":\"2\",\"harga\":\"2500\",\"img\":\"images\\/produk\\/69.jpg\"}'),
(70, 1, NULL, '{\"undangan\":\"2\",\"harga\":\"2000\",\"img\":\"images\\/produk\\/70.jpg\"}'),
(71, 1, NULL, '{\"undangan\":\"2\",\"harga\":\"3000\",\"img\":\"images\\/produk\\/71.jpg\"}'),
(72, 1, NULL, '{\"undangan\":\"2\",\"harga\":\"3000\",\"img\":\"images\\/produk\\/72.jpg\"}'),
(73, 1, NULL, '{\"undangan\":\"2\",\"harga\":\"3000\",\"img\":\"images\\/produk\\/73.jpg\"}'),
(74, 1, NULL, '{\"undangan\":\"2\",\"harga\":\"2000\",\"img\":\"images\\/produk\\/74.jpg\"}'),
(75, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"2000\",\"img\":\"images\\/produk\\/75.jpg\"}'),
(76, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"1500\",\"img\":\"images\\/produk\\/76.jpg\"}'),
(77, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"2000\",\"img\":\"images\\/produk\\/77.jpg\"}'),
(78, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"2500\",\"img\":\"images\\/produk\\/78.jpg\"}'),
(79, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"2000\",\"img\":\"images\\/produk\\/79.jpg\"}'),
(80, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"2000\",\"img\":\"images\\/produk\\/80.jpg\"}'),
(81, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"1500\",\"img\":\"images\\/produk\\/81.jpg\"}'),
(82, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"1500\",\"img\":\"images\\/produk\\/82.jpg\"}'),
(83, 2, NULL, '{\"harga\":\"1000\",\"img\":\"images\\/produk\\/83.jpg\"}'),
(84, 2, NULL, '{\"harga\":\"1500\",\"img\":\"images\\/produk\\/84.jpg\"}'),
(85, 2, NULL, '{\"harga\":\"1500\",\"img\":\"images\\/produk\\/85.jpg\"}'),
(86, 2, NULL, '{\"harga\":\"1500\",\"img\":\"images\\/produk\\/86.jpg\"}'),
(87, 2, NULL, '{\"harga\":\"1500\",\"img\":\"images\\/produk\\/87.jpg\"}'),
(88, 2, NULL, '{\"harga\":\"1000\",\"img\":\"images\\/produk\\/88.jpg\"}'),
(89, 2, NULL, '{\"harga\":\"1500\",\"img\":\"images\\/produk\\/89.jpg\"}'),
(90, 2, NULL, '{\"harga\":\"1500\",\"img\":\"images\\/produk\\/90.jpg\"}'),
(91, 2, NULL, '{\"harga\":\"1000\",\"img\":\"images\\/produk\\/91.jpg\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `no` int(2) NOT NULL,
  `jenis_bank` varchar(50) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_bank` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekening`
--

INSERT INTO `tb_rekening` (`no`, `jenis_bank`, `nama_bank`, `nomor_bank`) VALUES
(1, 'BNI', 'Ida bagus yudha surya', '0453488897'),
(2, 'BRI', 'Ida bagus yudha surya', '001701011645531'),
(3, 'Bank Mandiri', 'Ida bagus yudha surya', '9000007396360'),
(4, 'BCA', 'Ida bagus yudha surya', '0402495829');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `no` int(1) NOT NULL,
  `ket_user` varchar(100) NOT NULL,
  `ket_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`no`, `ket_user`, `ket_admin`) VALUES
(1, 'Belum Mengirim Bukti Pembayaran', 'Belum Mengirim Bukti Pembayaran'),
(2, 'Proses Pengesahan Bukti Pembayaran', 'Bukti Pembayaran Telah Dikirim / Menunggu Proses Pengesahan'),
(3, 'Pembayaran Disahkan / Sedang Dalam Proses Pembuatan Desain', 'Pembayaran Disahkan / Dalam Proses Pembuatan Desain'),
(4, 'Desain Selesai / Menunggu Pengesahan Dari Anda', 'Desain Selesai / Menunggu Pengesahan Dari Pembeli'),
(5, 'Desain Diterima / Menunggu Pencetakan Pesanan Desain Dari Tim Desain', 'Desain Diterima / Menunggu Pencetakan Pesanan Desain'),
(6, 'Cetakan Selesai / Pesanan Dapat Diambil', 'Pesanan Cetakan Akan Diambil / Menunggu Pengesahan Penerimaan Dari Pembeli'),
(7, 'Pesanan Diterima', 'Pesanan Diterima Pembeli'),
(8, 'Pesanan Diterima / Pengembalian Dalam Pengesahan', 'Pesanan Diterima / Pengesahan Detail Pengembalian Pembeli'),
(9, 'Pengesahan Pengembalian Diterima / Pesanan Gantian Sedang Dicetak', 'Pengesahan Pengembalian Diterima / Mencetak Pesanan Gantian'),
(10, 'Pesanan Gantian Dapat Diambil', 'Pesanan Gantian Diambil / Menunggu Pengesahan Penerimaan Dari Pembeli'),
(11, 'Pesanan Gantian Telah Diterima', 'Pesanan Gantian Telah Diterima Pembeli');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `no` int(3) NOT NULL,
  `id_user` int(3) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`no`, `id_user`, `username`, `password`, `level`) VALUES
(1, 1, 'Aran65831', 'Aran65831', 2),
(2, 2, 'Kicap65832', 'Kicap65832', 2),
(3, NULL, 'admin', 'admin', 1),
(4, 3, 'yuni36673', 'yuni36673', 2),
(5, 4, 'uni45', 'uni45', 2),
(6, 5, 'mia64', 'mia64', 2),
(7, 6, 'chica65', 'chica65', 2),
(8, 7, 'ip33', 'ip33', 2),
(9, 8, 'dilla84578', 'dilla84578', 2),
(10, 9, 'al65', 'al65', 2),
(11, 10, 'lina66', 'lina66', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_foto_pembelian`
--
ALTER TABLE `tb_foto_pembelian`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_komen`
--
ALTER TABLE `tb_komen`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `tb_komen_desain_sendiri`
--
ALTER TABLE `tb_komen_desain_sendiri`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `no` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  MODIFY `no` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `no` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_foto_pembelian`
--
ALTER TABLE `tb_foto_pembelian`
  ADD CONSTRAINT `tb_foto_pembelian_ibfk_1` FOREIGN KEY (`no`) REFERENCES `tb_pembelian` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_komen`
--
ALTER TABLE `tb_komen`
  ADD CONSTRAINT `tb_komen_ibfk_1` FOREIGN KEY (`no`) REFERENCES `tb_produk` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_komen_desain_sendiri`
--
ALTER TABLE `tb_komen_desain_sendiri`
  ADD CONSTRAINT `tb_komen_desain_sendiri_ibfk_1` FOREIGN KEY (`no`) REFERENCES `tb_pembelian` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD CONSTRAINT `tb_pembelian_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `tb_pembeli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembelian_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembelian_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembelian_ibfk_4` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_pembeli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
