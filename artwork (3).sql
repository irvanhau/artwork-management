-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Sep 2022 pada 01.56
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artwork`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artwork_draft`
--

CREATE TABLE `artwork_draft` (
  `job_id` int(11) NOT NULL,
  `drafter_id` int(11) NOT NULL,
  `artwork_draft` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `artwork_final`
--

CREATE TABLE `artwork_final` (
  `job_id` int(11) NOT NULL,
  `corrector_id` int(11) NOT NULL,
  `artwork_final` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `change_control`
--

CREATE TABLE `change_control` (
  `id` int(11) NOT NULL,
  `cc_no` varchar(255) NOT NULL,
  `cc_detail` varchar(255) NOT NULL,
  `no_item` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `change_control`
--

INSERT INTO `change_control` (`id`, `cc_no`, `cc_detail`, `no_item`) VALUES
(1, 'CC090922', 'Perubahan suhu simpan menjadi Simpan pada suhu di bawah 30C terlindung dari cahaya', 'A-68912-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id`, `name`) VALUES
(1, 'PT XYZ'),
(2, 'PT DMX'),
(3, 'PT DGX'),
(4, 'PT FOP'),
(5, 'PT BPC'),
(6, 'N/A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `corrector`
--

CREATE TABLE `corrector` (
  `id` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `join_date` date NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `corrector`
--

INSERT INTO `corrector` (`id`, `nip`, `full_name`, `username`, `join_date`, `password`) VALUES
(1, 'CR00012345', 'Corector', 'corector', '2022-08-09', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `corrector_comment`
--

CREATE TABLE `corrector_comment` (
  `id` int(11) NOT NULL,
  `corrector_id` int(11) NOT NULL,
  `jo_number` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dimension`
--

CREATE TABLE `dimension` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `packaging_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dimension`
--

INSERT INTO `dimension` (`id`, `name`, `packaging_id`) VALUES
(1, '30x30x75', 1),
(2, '122.5x55x35', 1),
(3, '48x48x88', 1),
(4, '50x50x150', 1),
(5, '28x155x110', 1),
(6, '50.5x47.5x128.5', 1),
(7, '30x17', 2),
(8, '30x23', 2),
(9, '40x30', 2),
(10, '55x40', 2),
(11, '87', 3),
(12, '157', 3),
(13, '187', 3),
(14, '200', 3),
(15, '210', 3),
(16, '90x30', 5),
(17, '97x60', 5),
(18, '80x35', 5),
(19, '100x150', 6),
(20, '200x200', 6),
(21, '150x300', 6),
(22, '200x600', 6),
(23, '100x500', 6),
(24, '87', 4),
(25, '157', 4),
(26, '187', 4),
(27, '200', 4),
(28, '210', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dossage_form`
--

CREATE TABLE `dossage_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dossage_form`
--

INSERT INTO `dossage_form` (`id`, `name`) VALUES
(1, 'Gel'),
(2, 'Injeksi'),
(3, 'Kaplet'),
(4, 'Kaplet Salut Selaput'),
(5, 'Kaplet Lepas Lambat'),
(6, 'Kapsul'),
(7, 'Kapsul Lepas Lambat'),
(8, 'Krim'),
(9, 'Lotion'),
(10, 'Larutan Injeksi'),
(11, 'Nasal Spray'),
(12, 'Tablet'),
(13, 'Tablet Hisap'),
(14, 'Tablet Kunyah'),
(15, 'Tablet Lepas Lambat'),
(16, 'Tablet Salut Gula'),
(17, 'Tablet Salut Selaput'),
(18, 'Sirup'),
(19, 'Suspensi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `drafter`
--

CREATE TABLE `drafter` (
  `id` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `join_date` date NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `drafter`
--

INSERT INTO `drafter` (`id`, `nip`, `full_name`, `username`, `join_date`, `password`) VALUES
(4, 'DR12', 'azizir', 'azizir', '2000-10-22', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `drawing`
--

CREATE TABLE `drawing` (
  `job_id` int(11) NOT NULL,
  `specialist_id` int(11) NOT NULL,
  `draw_attach` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `drug`
--

CREATE TABLE `drug` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `drug`
--

INSERT INTO `drug` (`id`, `name`) VALUES
(1, 'Obat Bebas'),
(2, 'Obat Kerang'),
(3, 'Obat Bebas Terbatas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `export`
--

CREATE TABLE `export` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `export`
--

INSERT INTO `export` (`id`, `name`) VALUES
(1, 'GDM Ltd'),
(2, 'GDS Ltd'),
(3, 'DRF Inc'),
(4, 'GDP Ltd'),
(5, 'N/A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_order`
--

CREATE TABLE `job_order` (
  `jo_number` int(11) NOT NULL,
  `artwork_status` varchar(50) NOT NULL,
  `input_date` date NOT NULL,
  `due_date` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `cc_no_id` int(11) NOT NULL,
  `packaging_id` int(11) NOT NULL,
  `dimension_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `specialist_id` int(10) NOT NULL,
  `drafter_id` int(10) NOT NULL,
  `corrector_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `packaging_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `material`
--

INSERT INTO `material` (`id`, `name`, `packaging_id`) VALUES
(1, 'Duplex 250', 1),
(2, 'Duplex 270', 1),
(3, 'Duplex 300', 1),
(4, 'Ivory 250', 1),
(5, 'Ivory 270', 1),
(6, 'Ivory 300', 1),
(7, 'Fasson Fascot', 2),
(8, 'Fasson LW', 2),
(9, 'Alufoil ', 4),
(10, 'Poly', 3),
(11, 'Alu Hard Tempered', 5),
(12, 'HVS 60 GSM', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nie`
--

CREATE TABLE `nie` (
  `job_id` int(11) NOT NULL,
  `specialist_id` int(11) NOT NULL,
  `nie_attach` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `packaging`
--

CREATE TABLE `packaging` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `packaging`
--

INSERT INTO `packaging` (`id`, `name`) VALUES
(1, 'Doos'),
(2, 'Label'),
(3, 'Poly'),
(4, 'Alufoil'),
(5, 'Alutube'),
(6, 'Leaflet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `generic_name` varchar(255) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `dossage_id` int(11) NOT NULL,
  `roa_id` int(11) NOT NULL,
  `storage` varchar(255) NOT NULL,
  `manufactured_id` int(11) DEFAULT NULL,
  `for_id` int(11) DEFAULT NULL,
  `market_id` int(11) DEFAULT NULL,
  `import_id` int(11) DEFAULT NULL,
  `under_id` int(11) DEFAULT NULL,
  `distribute_id` int(11) DEFAULT NULL,
  `composition` varchar(255) NOT NULL,
  `persentation` varchar(255) NOT NULL,
  `nie` varchar(255) NOT NULL,
  `packaging_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `product_name`, `generic_name`, `drug_id`, `dossage_id`, `roa_id`, `storage`, `manufactured_id`, `for_id`, `market_id`, `import_id`, `under_id`, `distribute_id`, `composition`, `persentation`, `nie`, `packaging_id`) VALUES
(2, 'Paramex', 'Paracetamol', 2, 12, 6, 'Simpan pada suhu dibawah 30 derajat, terlindung dari sinar matahari langsung', NULL, 1, 1, 1, 1, 1, 'composition', 'persentation', 'DKL123456789OA1', 1),
(6, 'Paramex', 'Paracetamol', 2, 12, 6, 'Simpan pada suhu dibawah 30 derajat, terlindung dari sinar matahari langsung', 1, NULL, 1, NULL, NULL, NULL, 'composition', 'persentation', 'DKL123456789OA1', 1),
(7, 'Paramex', 'Paracetamol', 2, 18, 6, 'Simpan pada suhu dibawah 30 derajat, terlindung dari sinar matahari langsung', 4, 6, 3, 5, 5, 5, 'compo', 'persen', 'DKL123456789OB1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses`
--

CREATE TABLE `proses` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `process_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses_detail`
--

CREATE TABLE `proses_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proses_detail`
--

INSERT INTO `proses_detail` (`id`, `name`) VALUES
(1, 'Drafting'),
(2, 'Checked'),
(3, 'Done');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roa`
--

CREATE TABLE `roa` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roa`
--

INSERT INTO `roa` (`id`, `name`) VALUES
(1, 'Intramuscular (IM)'),
(2, 'Intravenous (IV)'),
(3, 'Inhalation'),
(4, 'Intranasal'),
(5, 'Nasal Inhalation'),
(6, 'Oral'),
(7, 'Oles'),
(8, 'Tetes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sfp`
--

CREATE TABLE `sfp` (
  `job_id` int(11) NOT NULL,
  `specialist_id` int(11) NOT NULL,
  `sfp_attach` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `specialist`
--

CREATE TABLE `specialist` (
  `id` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `join_date` date NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `specialist`
--

INSERT INTO `specialist` (`id`, `nip`, `full_name`, `username`, `join_date`, `password`) VALUES
(1, 'SP00012345', 'Gina Sonya', 'gmo', '2019-05-01', '123456'),
(3, 'SP12345', 'hau', 'hau', '2000-10-22', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spm`
--

CREATE TABLE `spm` (
  `job_id` int(11) NOT NULL,
  `specialist_id` int(11) NOT NULL,
  `spm_attach` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artwork_draft`
--
ALTER TABLE `artwork_draft`
  ADD KEY `draft_drafter_id` (`drafter_id`),
  ADD KEY `draft_job_id` (`job_id`);

--
-- Indeks untuk tabel `artwork_final`
--
ALTER TABLE `artwork_final`
  ADD KEY `final_job_id` (`job_id`),
  ADD KEY `final_corrector_id` (`corrector_id`);

--
-- Indeks untuk tabel `change_control`
--
ALTER TABLE `change_control`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `corrector`
--
ALTER TABLE `corrector`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `corrector_comment`
--
ALTER TABLE `corrector_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jo_number` (`jo_number`),
  ADD KEY `comment_corrector_id` (`corrector_id`);

--
-- Indeks untuk tabel `dimension`
--
ALTER TABLE `dimension`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packaging_id` (`packaging_id`);

--
-- Indeks untuk tabel `dossage_form`
--
ALTER TABLE `dossage_form`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `drafter`
--
ALTER TABLE `drafter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `drawing`
--
ALTER TABLE `drawing`
  ADD KEY `job_id` (`job_id`),
  ADD KEY `specialist_id` (`specialist_id`);

--
-- Indeks untuk tabel `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `export`
--
ALTER TABLE `export`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `job_order`
--
ALTER TABLE `job_order`
  ADD PRIMARY KEY (`jo_number`),
  ADD KEY `job_order_corrector_id` (`corrector_id`),
  ADD KEY `job_order_drafter_id` (`drafter_id`),
  ADD KEY `job_order_specialist_id` (`specialist_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `cc_no_id` (`cc_no_id`),
  ADD KEY `dimension` (`dimension_id`),
  ADD KEY `material` (`material_id`),
  ADD KEY `job_order_packaging_id` (`packaging_id`);

--
-- Indeks untuk tabel `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packaging_id` (`packaging_id`);

--
-- Indeks untuk tabel `nie`
--
ALTER TABLE `nie`
  ADD KEY `job_id` (`job_id`),
  ADD KEY `specialist_id` (`specialist_id`);

--
-- Indeks untuk tabel `packaging`
--
ALTER TABLE `packaging`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_dossage_id` (`dossage_id`),
  ADD KEY `product_roa_id` (`roa_id`),
  ADD KEY `product_manufacture_id` (`manufactured_id`),
  ADD KEY `product_for_id` (`for_id`),
  ADD KEY `product_market_id` (`market_id`),
  ADD KEY `product_import_id` (`import_id`),
  ADD KEY `product_under_id` (`under_id`),
  ADD KEY `product_distribute_id` (`distribute_id`),
  ADD KEY `product_packaging_id` (`packaging_id`),
  ADD KEY `index_product` (`drug_id`,`dossage_id`,`roa_id`,`manufactured_id`,`for_id`,`market_id`,`import_id`,`under_id`,`distribute_id`,`packaging_id`) USING BTREE;

--
-- Indeks untuk tabel `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proses_job_id` (`job_id`),
  ADD KEY `proses_id` (`process_id`);

--
-- Indeks untuk tabel `proses_detail`
--
ALTER TABLE `proses_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roa`
--
ALTER TABLE `roa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sfp`
--
ALTER TABLE `sfp`
  ADD KEY `sfp_job_id` (`job_id`),
  ADD KEY `sfp_specialist_id` (`specialist_id`);

--
-- Indeks untuk tabel `specialist`
--
ALTER TABLE `specialist`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `spm`
--
ALTER TABLE `spm`
  ADD KEY `job_id` (`job_id`,`specialist_id`),
  ADD KEY `spm_specialist_id` (`specialist_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `change_control`
--
ALTER TABLE `change_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `corrector`
--
ALTER TABLE `corrector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `corrector_comment`
--
ALTER TABLE `corrector_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dimension`
--
ALTER TABLE `dimension`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `dossage_form`
--
ALTER TABLE `dossage_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `drafter`
--
ALTER TABLE `drafter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `drug`
--
ALTER TABLE `drug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `export`
--
ALTER TABLE `export`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `job_order`
--
ALTER TABLE `job_order`
  MODIFY `jo_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `packaging`
--
ALTER TABLE `packaging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `proses`
--
ALTER TABLE `proses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `proses_detail`
--
ALTER TABLE `proses_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `roa`
--
ALTER TABLE `roa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `specialist`
--
ALTER TABLE `specialist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artwork_draft`
--
ALTER TABLE `artwork_draft`
  ADD CONSTRAINT `draft_drafter_id` FOREIGN KEY (`drafter_id`) REFERENCES `drafter` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `draft_job_id` FOREIGN KEY (`job_id`) REFERENCES `job_order` (`jo_number`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `artwork_final`
--
ALTER TABLE `artwork_final`
  ADD CONSTRAINT `final_corrector_id` FOREIGN KEY (`corrector_id`) REFERENCES `corrector` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `final_job_id` FOREIGN KEY (`job_id`) REFERENCES `job_order` (`jo_number`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `corrector_comment`
--
ALTER TABLE `corrector_comment`
  ADD CONSTRAINT `comment_corrector_id` FOREIGN KEY (`corrector_id`) REFERENCES `corrector` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `corrector_comment_ibfk_1` FOREIGN KEY (`jo_number`) REFERENCES `job_order` (`jo_number`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dimension`
--
ALTER TABLE `dimension`
  ADD CONSTRAINT `dimension_packaging_id` FOREIGN KEY (`packaging_id`) REFERENCES `packaging` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `drawing`
--
ALTER TABLE `drawing`
  ADD CONSTRAINT `drawing_job_id` FOREIGN KEY (`job_id`) REFERENCES `job_order` (`jo_number`) ON DELETE CASCADE,
  ADD CONSTRAINT `drawing_specialist_id` FOREIGN KEY (`specialist_id`) REFERENCES `specialist` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `job_order`
--
ALTER TABLE `job_order`
  ADD CONSTRAINT `job_order_cc_no_id` FOREIGN KEY (`cc_no_id`) REFERENCES `change_control` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_order_corrector_id` FOREIGN KEY (`corrector_id`) REFERENCES `corrector` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_order_dimension_id` FOREIGN KEY (`dimension_id`) REFERENCES `dimension` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_order_drafter_id` FOREIGN KEY (`drafter_id`) REFERENCES `drafter` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_order_material_id` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_order_packaging_id` FOREIGN KEY (`packaging_id`) REFERENCES `packaging` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_order_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_order_specialist_id` FOREIGN KEY (`specialist_id`) REFERENCES `specialist` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_packaging_id` FOREIGN KEY (`packaging_id`) REFERENCES `packaging` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nie`
--
ALTER TABLE `nie`
  ADD CONSTRAINT `nie_job_id` FOREIGN KEY (`job_id`) REFERENCES `job_order` (`jo_number`) ON DELETE CASCADE,
  ADD CONSTRAINT `nie_specialist_id` FOREIGN KEY (`specialist_id`) REFERENCES `specialist` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_distribute_id` FOREIGN KEY (`distribute_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_dossage_id` FOREIGN KEY (`dossage_id`) REFERENCES `dossage_form` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_drug_id` FOREIGN KEY (`drug_id`) REFERENCES `drug` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_for_id` FOREIGN KEY (`for_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_import_id` FOREIGN KEY (`import_id`) REFERENCES `export` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_manufacture_id` FOREIGN KEY (`manufactured_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_market_id` FOREIGN KEY (`market_id`) REFERENCES `company` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_packaging_id` FOREIGN KEY (`packaging_id`) REFERENCES `packaging` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_roa_id` FOREIGN KEY (`roa_id`) REFERENCES `roa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_under_id` FOREIGN KEY (`under_id`) REFERENCES `export` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `proses`
--
ALTER TABLE `proses`
  ADD CONSTRAINT `proses_id_fk` FOREIGN KEY (`process_id`) REFERENCES `proses_detail` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proses_job_id` FOREIGN KEY (`job_id`) REFERENCES `job_order` (`jo_number`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sfp`
--
ALTER TABLE `sfp`
  ADD CONSTRAINT `sfp_job_id` FOREIGN KEY (`job_id`) REFERENCES `job_order` (`jo_number`) ON DELETE CASCADE,
  ADD CONSTRAINT `sfp_specialist_id` FOREIGN KEY (`specialist_id`) REFERENCES `specialist` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `spm`
--
ALTER TABLE `spm`
  ADD CONSTRAINT `spm_job_id` FOREIGN KEY (`job_id`) REFERENCES `job_order` (`jo_number`) ON DELETE CASCADE,
  ADD CONSTRAINT `spm_specialist_id` FOREIGN KEY (`specialist_id`) REFERENCES `specialist` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
