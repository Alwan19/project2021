-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 04:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_judul`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` text NOT NULL,
  `slug_berita` text NOT NULL,
  `isi_berita` text NOT NULL,
  `jenis_berita` varchar(100) NOT NULL,
  `status_berita` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul_berita`, `slug_berita`, `isi_berita`, `jenis_berita`, `status_berita`, `gambar`, `tanggal`) VALUES
(1, 'Saya Ingin menjadi programmer', 'saya-ingin-menjadi-programmer', '<p>Saya Ingin Menjadi Programer Web dan Android, Designer , technopreuner Profesional Saya memilih Amik Mahaputra Riau dengan metode belajar 100% praktek 100% internet, membuat saya lebih mandiri, kreatif dan produktif. Didukung dengan fasilitas yang berstandar internasional dan kurikulum yang berbasis terkini. Menjamin masa depan yang lebih baik untuk saya dan keluarga saya</p>', 'Slider', 'Publish', 'slider11.jpg', '2021-05-05 14:08:16'),
(2, 'AMIK Mahaputra Riau', 'amik-mahaputra-riau', 'Amik Mahaputra Riau menandatangani perjanjian kerja sama bersama Aptikom Riau dan 5 perguruan tinggi di Pekanbaru yakni Politeknik Caltek Riau, STMIK Hang Tuah, STMIK Amik Riau, STMIK Dharmapala dan Amik Tri Dharma. Salah satu bentuk tindak lanjut dari kerja sama ini adalah pelaksanaan Workshop Analisis Data menggunakan Google Data Studio yang dilaksanakan pada hari Jumat 20 Desember 2019 di Kampus Politeknik Caltex riau yang bertujuan meningkatkan pengetahuan khususnya dosen - dosen dibawah Perguruan Tinggi yang melakukan kerjasama sehingga meningkatkan mutu dari dosen - dosen yang ikut kegiatan tersebut. Penandatanganan ini dilaksanakan langsung oleh masing-masing Pimpinan perguruan tinggi dan disaksikan oleh puluhan peserta.', 'Slider', 'Publish', 'slider2.jpg', '2021-05-01 07:18:02'),
(3, 'Amik Mahaputra sharing experience', 'amik-mahaputra-sharing-experience', '<p><span style=\"font-size: 18pt;\"><strong>Amik Mahaputra sharing experience </strong></span></p>\r\n<p>#kampus yg mengedepankan teknologi dan komputer</p>\r\n<p>#kerja sambil kuliah hanya di Amik Mahaputra Adinda yg bingung cari tempat kuliah bisa shering dengan bg Yunus #contack person 0852 6383 6821 #sukses selalu buat Amik Mahaputra Riau</p>', 'Slider', 'Publish', 'slider5.jpg', '2021-05-05 14:07:57'),
(5, 'PERJANJIAN KERJA SAMA', 'perjanjian-kerja-sama', '<p style=\"text-align: justify;\">Amik Mahaputra Riau menandatangani perjanjian kerja sama bersama Aptikom Riau dan 5 perguruan tinggi di Pekanbaru yakni Politeknik Caltek Riau, STMIK Hang Tuah, STMIK Amik Riau, STMIK Dharmapala dan Amik Tri Dharma. Salah satu bentuk tindak lanjut dari kerja sama ini adalah pelaksanaan Workshop Analisis Data menggunakan Google Data Studio yang dilaksanakan pada hari Jumat 20 Desember 2019 di Kampus Politeknik Caltex riau yang bertujuan meningkatkan pengetahuan khususnya dosen - dosen dibawah Perguruan Tinggi yang melakukan kerjasama sehingga meningkatkan mutu dari dosen - dosen yang ikut kegiatan tersebut. Penandatanganan ini dilaksanakan langsung oleh masing-masing Pimpinan perguruan tinggi dan disaksikan oleh puluhan peserta.</p>', 'Berita', 'Publish', 'MOU.jpg', '2021-05-01 14:53:47'),
(6, 'AMIK MAHAPUTRA SHARING EXPERIENCE', 'amik-mahaputra-sharing-experience', '<div class=\"block3\">\r\n<div class=\"block3-txt p-t-14\">\r\n<p style=\"text-align: justify;\">Amik Mahaputra sharing experience #kampus yg mengedepankan teknologi dan komputer #kerja sambil kuliah hanya di Amik Mahaputr Adinda yg bingung cari tempat kuliah bisa shering dengan bg Yunus #contack person 0852 6383 6821 #sukses selalu buat Amik Mahaputra Riau</p>\r\n</div>\r\n</div>', 'Berita', 'Publish', '67409490_1263232903884369_5007533401545113600_n.jpg', '2021-05-01 14:55:11'),
(7, 'INSPIRASI DAN MOTIVASI DARI ALUMNI', 'inspirasi-dan-motivasi-dari-alumni', '<p style=\"text-align: justify;\">Hello guys! Hari ini kampus kita kedatangan seorang alumni yang sudah bekerja di Panin Bank. Ya, Wahyuni Sholeha namanya. . Ia menyempatkan waktu untuk sharing pengalaman dia selama kuliah di @amikmahaputrariau sampai dia bisa bekerja di Panin Bank kepada Mahasiswa Baru 2019. . Terimakasih Kak Ayu semoga bisa menjadi inspirasi dan motivasi untuk MABA agar bisa seperti kak Wahyuni Sholeha, A.Md???? oh iya, kak Ayu ini dulu sekolahnya di SMAN 1 SIAK lho..!! . Ingin seperti kak Ayu? Buruan daftar kuliah di AMIK MAHAPUTRA ???????? . #amikmahaputra #2019kuliahdiamp #alumni #mahasiswa #kuliah #pekanbaru #pekanbaruhits #riau #siak @ AMIK Mahaputra RIAU</p>', 'Berita', 'Publish', '64620503_3030453076995038_3586549029351194624_n.jpg', '2021-05-01 14:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `bidang_dosen` varchar(100) NOT NULL,
  `kontak_dosen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nidn_dosen`, `nama_dosen`, `bidang_dosen`, `kontak_dosen`) VALUES
(1, 123456, 'Darmanta', 'Pemograman3', '08164468900'),
(2, 112233, 'Budi', 'Pemograman1', '08123443288'),
(3, 222233, 'Muhammad', 'Pemograman2', '081222112212');

-- --------------------------------------------------------

--
-- Table structure for table `tb_link`
--

CREATE TABLE `tb_link` (
  `id_link` int(11) NOT NULL,
  `nama_link` text NOT NULL,
  `link` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_link`
--

INSERT INTO `tb_link` (`id_link`, `nama_link`, `link`, `tanggal`) VALUES
(1, 'AMIK Mahaputra Riau', 'https://www.amikmahaputra.ac.id/', '2021-05-03 07:50:30'),
(2, 'Jurnal AMIK Mahaputra Riau', 'https://www.journal.amikmahaputra.ac.id/', '2021-05-03 08:12:24'),
(3, 'SISFO AMIK Mahaputra Riau', 'https://sisfo.amikmahaputra.ac.id/', '2021-05-03 08:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama_mahasiswa` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_ponsel` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL,
  `agama` text NOT NULL,
  `program_studi` text NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `nim`, `nama_mahasiswa`, `tempat_lahir`, `tanggal_lahir`, `nomor_ponsel`, `email`, `jenis_kelamin`, `agama`, `program_studi`, `id_dosen`, `password`) VALUES
(2, 19110236, 'maysarah', 'pekanbaru', '2021-04-25', '081364467988', 'maysarah@gmail.com', 'Perempuan', 'Islam', '', 3, '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(4, 19110265, 'Alwan Shaleh', 'Kubang', '2000-11-19', '12132131', 'sarah@gmail.com', 'Laki-laki', 'Islam', '', 3, '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bidang_ta` text NOT NULL,
  `judul_ta` text NOT NULL,
  `alasan` text NOT NULL,
  `pembimbing1` text NOT NULL,
  `pembimbing2` text NOT NULL,
  `kwitansi_ta` text NOT NULL,
  `krs` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `tgl_acc` date NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `id_mahasiswa`, `id_user`, `bidang_ta`, `judul_ta`, `alasan`, `pembimbing1`, `pembimbing2`, `kwitansi_ta`, `krs`, `status`, `tgl_acc`, `keterangan`, `tanggal`) VALUES
(12, 4, 4, 'Jaringan', 'Jaringan Kampus', 'mudah', 'Muhammad', 'Darmanta', 'logo1.png', 'spuas.png', 'Diterima', '2021-05-05', 'mantap', '2021-05-05 12:36:49'),
(13, 2, 2, 'WEB', 'Sistem Informasi WEB', 'mudah', 'Budi', 'Darmanta', 'pisang_goreng_krispi.jpg', 'spuas3.png', 'Diterima', '2021-05-05', 'mantap', '2021-05-05 12:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `akses_level` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `akses_level`, `tanggal`) VALUES
(1, 'kaprodi', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'kaprodi', 'Kaprodi', '2021-05-04 03:38:31'),
(2, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin', 'Admin', '2021-05-04 03:37:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tb_link`
--
ALTER TABLE `tb_link`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`) USING BTREE;

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_link`
--
ALTER TABLE `tb_link`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
