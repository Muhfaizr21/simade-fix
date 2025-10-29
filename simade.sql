-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 29, 2025 at 01:27 AM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simade`
--

-- --------------------------------------------------------

--
-- Table structure for table `agamas`
--

CREATE TABLE `agamas` (
  `id` bigint UNSIGNED NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penganut` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agamas`
--

INSERT INTO `agamas` (`id`, `agama`, `penganut`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Islam', 9594, 1, '2025-02-11 03:21:45', '2025-10-29 00:57:30'),
(2, 'Kristen', 2882, 1, '2025-02-11 03:21:45', '2025-10-29 00:57:43'),
(3, 'Katolik', 1910, 1, '2025-02-11 03:21:45', '2025-10-29 00:57:54'),
(4, 'Hindu', 955, 1, '2025-02-11 03:21:45', '2025-10-29 00:58:15'),
(5, 'Budha', 1441, 1, '2025-02-11 03:21:45', '2025-10-29 00:58:28'),
(6, 'Konghucu', 572, 1, '2025-02-11 03:21:45', '2025-10-29 00:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `anggarans`
--

CREATE TABLE `anggarans` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggarans`
--

INSERT INTO `anggarans` (`id`, `judul`, `slug`, `keterangan`, `gambar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Rincian Dana Desa 2024', 'rincian-dana-desa', '<p>Contoh saja</p>', 'img-anggaran//67aaf242796a8.jpeg', 1, '2025-02-11 06:46:26', '2025-02-11 06:46:49'),
(2, 'Rincian 2025', 'rincian-2025', '<p>Contoh Saja</p>', 'img-anggaran//67aaf2a551c24.png', 1, '2025-02-11 06:48:05', '2025-02-11 06:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint UNSIGNED NOT NULL DEFAULT '0',
  `excerpt` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_pengumuman` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `judul`, `slug`, `views`, `excerpt`, `isi_pengumuman`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Pelaksanaan Gotong Royong Bersih-Bersih Lingkungan Desa Dongkal', 'pelaksanaan-gotong-royong-bersih-bersih-lingkungan-desa-dongkal', 1, '📰 Isi Pengumuman:Pemerintah Desa Dongkal mengajak seluruh warga masyarakat untuk berpartisipasi dalam kegiatan gotong royong membersihkan lingkungan yang akan dilaksanakan pada:📅 Hari/Tanggal: Mingg...', '<h3>📰 <strong>Isi Pengumuman:</strong></h3><p>Pemerintah Desa Dongkal mengajak seluruh warga masyarakat untuk <strong>berpartisipasi dalam kegiatan gotong royong membersihkan lingkungan</strong> yang akan dilaksanakan pada:</p><p>📅 <strong>Hari/Tanggal:</strong> Minggu, 3 November 2025<br>🕗 <strong>Waktu:</strong> Pukul 07.00 WIB – selesai<br>📍 <strong>Lokasi:</strong> Seluruh wilayah Dusun di Desa Dongkal</p><p>Kegiatan ini bertujuan untuk:</p><p>Menjaga kebersihan dan keindahan lingkungan desa</p><p>Mencegah penyebaran penyakit akibat sampah dan genangan air</p><p>Meningkatkan rasa kebersamaan dan kepedulian antarwarga</p><p>Diharapkan seluruh warga membawa peralatan kebersihan masing-masing seperti sapu, cangkul, dan karung sampah.<br>Mari kita wujudkan Desa Dongkal yang <strong>Bersih, Sehat, dan Asri</strong>! 🌿</p><p>Atas perhatian dan partisipasinya, kami ucapkan terima kasih.</p><p>📢 <strong>Pemerintah Desa Dongkal</strong><br><i>“Bersatu untuk Desa yang Lebih Baik”</i></p>', 1, '2025-10-28 11:11:10', '2025-10-28 11:11:17'),
(5, 'Penyaluran Bantuan Langsung Tunai (BLT) Dana Desa Bulan November 2025', 'penyaluran-bantuan-langsung-tunai-blt-dana-desa-bulan-november-2025', 1, '📰 Isi Pengumuman:Pemerintah Desa Dongkal akan melaksanakan penyaluran Bantuan Langsung Tunai (BLT) Dana Desa untuk warga yang telah terdaftar sebagai penerima manfaat.Kegiatan ini bertujuan membantu...', '<h3>📰 <strong>Isi Pengumuman:</strong></h3><p>Pemerintah Desa Dongkal akan melaksanakan <strong>penyaluran Bantuan Langsung Tunai (BLT) Dana Desa</strong> untuk warga yang telah terdaftar sebagai penerima manfaat.<br>Kegiatan ini bertujuan membantu masyarakat yang terdampak secara ekonomi agar kebutuhan pokok tetap terpenuhi.</p><p>📅 <strong>Hari/Tanggal:</strong> Rabu, 6 November 2025<br>🕘 <strong>Waktu:</strong> 08.00 – 12.00 WIB<br>📍 <strong>Tempat:</strong> Balai Desa Dongkal</p><p>Syarat penerimaan BLT:</p><p>Membawa <strong>fotokopi KTP dan KK asli</strong>.</p><p>Hadir langsung (tidak boleh diwakilkan, kecuali dengan surat kuasa resmi).</p><p>Mematuhi protokol antrian dan tata tertib selama penyaluran berlangsung.</p><p>Diharapkan seluruh penerima hadir tepat waktu agar proses berjalan lancar dan tertib.<br>💬 <i>“BLT Desa, wujud kepedulian untuk kesejahteraan bersama.”</i></p><p>📢 <strong>Pemerintah Desa Dongkal</strong></p>', 1, '2025-10-28 11:11:57', '2025-10-28 11:12:26'),
(6, 'Pemberitahuan Libur Pelayanan Kantor Desa Dongkal pada Hari Nasional', 'pemberitahuan-libur-pelayanan-kantor-desa-dongkal-pada-hari-nasional', 0, '📰 Isi Pengumuman:Diberitahukan kepada seluruh warga Desa Dongkal bahwa pelayanan administrasi di Kantor Desa akan ditutup sementara dalam rangka memperingati Hari Pahlawan Nasional.📅 Tanggal Libur:...', '<h3>📰 <strong>Isi Pengumuman:</strong></h3><p>Diberitahukan kepada seluruh warga Desa Dongkal bahwa <strong>pelayanan administrasi di Kantor Desa</strong> akan <strong>ditutup sementara</strong> dalam rangka memperingati <strong>Hari Pahlawan Nasional</strong>.</p><p>📅 <strong>Tanggal Libur:</strong> Senin, 10 November 2025<br>📍 <strong>Kantor Desa Dongkal</strong></p><p>Pelayanan akan dibuka kembali pada:<br>📅 <strong>Selasa, 11 November 2025</strong><br>🕗 <strong>Pukul 08.00 WIB – 14.00 WIB</strong></p><p>Bagi warga yang memiliki keperluan mendesak seperti pengurusan surat keterangan domisili atau keperluan administratif lainnya, disarankan untuk menyelesaikannya <strong>sebelum tanggal libur</strong>.</p><p>🙏 Atas perhatian dan pengertiannya kami ucapkan terima kasih.<br>📢 <strong>Pemerintah Desa Dongkal</strong><br><i>“Memberikan pelayanan terbaik untuk masyarakat.”</i></p>', 1, '2025-10-28 11:12:17', '2025-10-28 11:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint UNSIGNED NOT NULL DEFAULT '0',
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status_id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `gambar`, `judul`, `excerpt`, `slug`, `views`, `body`, `user_id`, `status_id`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, 'img-berita//69014e5f5c027.jpeg', 'Pelatihan UMKM di Desa Dongkal Dorong Warga Kembangkan Produk Lokal', 'INDRAMAYU, DESA DONGKAL – Pemerintah Desa Dongkal menggelar pelatihan pengembangan UMKM bagi pelaku...', 'pelatihan-umkm-desa-dongkal-dorong-warga-kembangkan-produk-lokal', 1, '<p><strong>INDRAMAYU, DESA DONGKAL</strong> – Pemerintah Desa Dongkal menggelar <strong>pelatihan pengembangan UMKM</strong> bagi pelaku usaha kecil dan masyarakat desa pada Jumat (25/10) di Balai Desa Dongkal. Kegiatan ini bertujuan untuk meningkatkan kemampuan warga dalam mengelola usaha dan mengembangkan produk lokal agar lebih berdaya saing.</p><p>Dalam pelatihan tersebut, peserta mendapatkan materi mengenai strategi pemasaran digital, pengemasan produk, hingga pengelolaan keuangan sederhana. Kegiatan ini bekerja sama dengan <strong>Dinas Koperasi dan UMKM Kabupaten Indramayu</strong> serta menghadirkan narasumber dari praktisi bisnis lokal.</p><p>Kepala Desa Dongkal menyampaikan harapannya agar pelatihan ini bisa menumbuhkan semangat berwirausaha di kalangan masyarakat.<br>“Kami ingin masyarakat Dongkal tidak hanya menjadi produsen pertanian, tetapi juga kreatif dalam mengolah hasil bumi menjadi produk yang bernilai jual tinggi,” katanya.</p><p>Beberapa peserta pelatihan bahkan sudah menampilkan produk olahan seperti keripik singkong, sambal khas Dongkal, dan minuman herbal tradisional yang siap dipasarkan secara online.</p><p>Pemerintah Desa Dongkal berkomitmen terus mendukung pelaku UMKM lokal agar mampu berkembang dan meningkatkan kesejahteraan ekonomi warga.</p>', 1, 2, 4, '2025-02-11 06:05:19', '2025-10-28 23:14:39'),
(2, 'img-berita//69014e54e1818.jpeg', 'Desa Dongkal Gelar Gotong Royong Massal Bersihkan Lingkungan Menjelang Musim Hujan', 'INDRAMAYU, DESA DONGKAL – Menjelang datangnya musim hujan, Pemerintah Desa Dongkal bersama warga mel...', 'desa-dongkal-gelar-gotong-royong-massal-bersihkan-lingkungan-menjelang-musim-hujan', 9, '<p><strong>INDRAMAYU, DESA DONGKAL</strong> – Menjelang datangnya musim hujan, Pemerintah Desa Dongkal bersama warga melaksanakan kegiatan <strong>gotong royong massal</strong> membersihkan lingkungan pada Minggu (27/10). Kegiatan ini difokuskan di area pemukiman warga, saluran air, serta fasilitas umum desa.</p><p>Kepala Desa Dongkal mengatakan kegiatan ini merupakan bentuk kepedulian bersama terhadap kebersihan lingkungan dan upaya pencegahan banjir.<br>“Gotong royong ini bukan hanya soal bersih-bersih, tapi juga memperkuat kebersamaan antarwarga. Kita ingin lingkungan Dongkal tetap sehat dan nyaman,” ujarnya.</p><p>Kegiatan ini diikuti oleh perangkat desa, karang taruna, PKK, dan seluruh warga masyarakat. Beberapa titik rawan genangan air dibersihkan bersama agar aliran air lancar dan tidak menimbulkan masalah kesehatan.</p><p>Pemerintah Desa Dongkal berencana menjadikan kegiatan gotong royong ini sebagai agenda rutin setiap bulan agar budaya kebersamaan dan kepedulian terhadap lingkungan semakin tumbuh di tengah masyarakat.</p>', 1, 2, 4, '2025-02-11 06:28:51', '2025-10-28 23:24:01'),
(3, 'img-berita//69014e464c977.jpeg', 'Pemerintah Desa Dongkal Dorong Pengembangan Wisata Pertanian dan Edukasi di Desa', 'INDRAMAYU, DESA DONGKAL – Pemerintah Desa Dongkal, Kecamatan Anjatan, Kabupaten Indramayu, tengah me...', 'pemerintah-desa-dongkal-dorong-pengembangan-wisata-pertanian-dan-edukasi-di-desa', 4, '<p><strong>INDRAMAYU, DESA DONGKAL</strong> – Pemerintah Desa Dongkal, Kecamatan Anjatan, Kabupaten Indramayu, tengah mendorong pengembangan sektor wisata berbasis pertanian dan edukasi sebagai salah satu upaya meningkatkan ekonomi masyarakat desa.</p><p>Kepala Desa Dongkal menyampaikan bahwa potensi lahan pertanian yang luas dan keindahan alam pedesaan menjadi peluang besar untuk mengembangkan wisata edukatif, terutama bagi pelajar dan wisatawan lokal yang ingin belajar tentang proses pertanian tradisional.</p><p>“Kami ingin menjadikan Desa Dongkal bukan hanya sebagai desa penghasil pertanian, tapi juga sebagai desa wisata yang memberikan nilai tambah bagi masyarakat. Nantinya, pengunjung bisa melihat langsung proses menanam padi, panen, hingga produk olahan hasil bumi Dongkal,” ujarnya.</p><p>Rencana ini sejalan dengan program pemerintah daerah yang mendorong desa-desa di Indramayu untuk mengembangkan potensi lokal secara mandiri dan berkelanjutan.</p><p>Selain wisata pertanian, Pemerintah Desa Dongkal juga berencana membangun <strong>sentra UMKM</strong> yang menampung hasil olahan warga, seperti makanan khas desa dan kerajinan tangan.</p><p>“Kami berharap pengembangan ini bisa membuka lapangan kerja baru, meningkatkan pendapatan warga, dan membuat Desa Dongkal lebih dikenal masyarakat luas,” tambahnya.</p><p>Pemerintah desa akan bekerja sama dengan <strong>Dinas Pariwisata dan Pertanian Kabupaten Indramayu</strong> untuk memastikan program ini berjalan sesuai rencana, termasuk perbaikan infrastruktur penunjang seperti jalan desa dan fasilitas umum.</p><p>Dengan adanya langkah ini, Desa Dongkal diharapkan menjadi contoh bagi desa-desa lain dalam mengembangkan potensi lokal secara kreatif dan berdaya saing.</p>', 1, 2, 4, '2025-02-11 06:30:02', '2025-10-28 23:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berita_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `nama`, `email`, `body`, `berita_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'hardi', 'har@gmail.com', 'mantap min', 2, NULL, '2025-10-28 23:21:26', '2025-10-28 23:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `gambar`, `keterangan`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 'img-gallery//69014ef9a72c9.jpeg', 'Dokumentasi kegiatan gotong royong', 1, '2025-10-28 23:17:13', '2025-10-28 23:17:13'),
(10, 'img-gallery//69014f0e8d34b.jpeg', 'Dokumentasi Pelatihan UMKM', 1, '2025-10-28 23:17:34', '2025-10-28 23:17:34'),
(11, 'img-gallery//69014f439ab17.jpeg', 'Dokumentasi Pemerintah dorong masyarakat dalam pengembangan wisata khususnya di pertanian dan pengedukasian di desa', 1, '2025-10-28 23:18:27', '2025-10-28 23:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamins`
--

CREATE TABLE `jenis_kelamins` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kelamins`
--

INSERT INTO `jenis_kelamins` (`id`, `jenis_kelamin`, `jumlah`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Laki-laki', 8902, 1, '2025-02-11 03:21:45', '2025-10-29 00:53:07'),
(2, 'Perempuan', 8466, 1, '2025-02-11 03:21:45', '2025-10-29 00:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `kategori`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Teknologi', 'teknologi', 1, '2025-02-11 03:21:45', '2025-02-11 03:21:45'),
(2, 'Kesenian', 'kesenian', 1, '2025-02-11 03:21:45', '2025-02-11 03:21:45'),
(3, 'UMKM', 'umkm', 1, '2025-02-11 06:05:44', '2025-02-11 06:05:44'),
(4, 'pariwisata', 'pariwisata', 1, '2025-02-11 06:26:07', '2025-02-11 06:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `kontaks`
--

CREATE TABLE `kontaks` (
  `id` bigint UNSIGNED NOT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontaks`
--

INSERT INTO `kontaks` (`id`, `lokasi`, `email`, `no_hp`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Indramayu', 'kelompok3@gmail.com', '0882260686031', 1, '2025-02-11 03:21:45', '2025-10-28 05:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `layanans`
--

CREATE TABLE `layanans` (
  `id` bigint UNSIGNED NOT NULL,
  `layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persyaratan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanans`
--

INSERT INTO `layanans` (`id`, `layanan`, `persyaratan`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Pembuatan Surat Keterangan Domisili Secara Online', '<h3><strong>Persyaratan</strong></h3><p><strong>Identitas Diri:</strong></p><p>Fotokopi KTP dan Kartu Keluarga (KK) yang masih berlaku.</p><p>Data alamat lengkap sesuai tempat tinggal saat ini di Desa Dongkal.</p><p><strong>Surat Pengantar RT/RW:</strong><br>Surat pengantar dari RT dan RW setempat yang menyatakan bahwa benar warga tersebut berdomisili di wilayah tersebut.</p><p><strong>Formulir Online:</strong><br>Pengisian formulir pembuatan surat keterangan domisili secara online melalui portal layanan resmi <strong>Desa Dongkal</strong>.</p><p><strong>Verifikasi Petugas Desa:</strong><br>Data yang dikirimkan akan diverifikasi oleh petugas pelayanan administrasi desa sebelum surat diterbitkan.</p><h3><strong>Langkah-langkah Pembuatan Surat Domisili Online</strong></h3><p><strong>Akses Website Resmi Desa Dongkal:</strong><br>Buka portal layanan online di situs resmi desa.</p><p><strong>Login atau Buat Akun:</strong><br>Jika belum memiliki akun, warga perlu melakukan registrasi dengan memasukkan NIK dan nomor KK.</p><p><strong>Isi Formulir Surat Domisili:</strong><br>Lengkapi data sesuai formulir yang tersedia (nama, alamat, alasan permohonan, dan dokumen pendukung).</p><p><strong>Unggah Dokumen Pendukung:</strong><br>Upload foto/scan KTP, KK, dan surat pengantar RT/RW.</p><p><strong>Kirim dan Tunggu Verifikasi:</strong><br>Setelah pengajuan dikirim, petugas desa akan melakukan verifikasi data.</p><p><strong>Unduh Surat Domisili:</strong><br>Jika disetujui, surat dapat diunduh langsung dari sistem atau diambil di kantor desa.</p>', 1, '2025-02-11 06:23:03', '2025-10-28 11:07:40'),
(2, 'Pendaftaran Layanan Kesehatan di Puskesmas Anjatan Secara Online', '<h3><strong>Persyaratan</strong></h3><p><strong>Sistem yang Dikembangkan Sendiri oleh Puskesmas:</strong><br>Puskesmas Anjatan menyediakan sistem pendaftaran online bagi masyarakat Desa Dongkal melalui portal resmi atau nomor kontak layanan kesehatan. Petunjuk pendaftaran dapat diperoleh langsung di laman resmi Puskesmas atau melalui petugas kesehatan desa.</p><p><strong>Platform Kesehatan Online Pemerintah:</strong><br>Jika tersedia, layanan ini terintegrasi dengan <strong>Dinas Kesehatan Kabupaten Indramayu</strong> melalui platform pendaftaran pasien. Masyarakat mungkin diminta membuat akun terlebih dahulu sebelum melakukan pendaftaran layanan kesehatan.</p><p><strong>Aplikasi Pihak Ketiga (Jika Diperlukan):</strong><br>Beberapa Puskesmas di Kabupaten Indramayu bekerja sama dengan aplikasi layanan kesehatan terpercaya. Pastikan aplikasi tersebut resmi, aman, dan terdaftar sebelum digunakan untuk mendaftar layanan kesehatan.</p><h3><strong>Langkah-langkah Pendaftaran Online di Puskesmas Anjatan</strong></h3><p><strong>Akses Situs atau Aplikasi Resmi:</strong><br>Buka situs web Puskesmas Anjatan atau aplikasi yang ditunjuk oleh Dinas Kesehatan Kabupaten Indramayu.</p><p><strong>Pendaftaran Akun:</strong><br>Jika diminta, buat akun baru dengan mengisi data diri seperti NIK, nama lengkap, dan alamat.</p><p><strong>Pilih Jenis Layanan:</strong><br>Pilih layanan kesehatan yang dibutuhkan (contohnya: pemeriksaan umum, imunisasi, konsultasi ibu &amp; anak, atau pemeriksaan laboratorium).</p><p><strong>Pilih Jadwal Kunjungan:</strong><br>Tentukan tanggal dan waktu kunjungan sesuai ketersediaan jadwal di sistem.</p><p><strong>Konfirmasi Pendaftaran:</strong><br>Setelah semua data diisi dengan benar, konfirmasi pendaftaran dan simpan bukti pendaftaran (screenshot atau nomor antrian online).</p><p><strong>Datang Sesuai Jadwal:</strong><br>Datang ke Puskesmas Anjatan sesuai waktu yang telah dipilih dengan membawa <strong>KTP/KK dan kartu BPJS (jika ada)</strong>.</p>', 1, '2025-02-11 06:24:18', '2025-10-28 11:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_13_022605_create_sliders_table', 1),
(7, '2023_09_14_134427_create_beritas_table', 1),
(8, '2023_09_14_142413_create_post_statuses_table', 1),
(9, '2023_09_14_223318_create_kategoris_table', 1),
(10, '2023_09_17_091224_create_comments_table', 1),
(11, '2023_09_18_054320_create_comment_replies_table', 1),
(12, '2023_09_18_173129_create_wilayahs_table', 1),
(13, '2023_09_18_203110_create_sejarahs_table', 1),
(14, '2023_09_18_210113_create_visi_misis_table', 1),
(15, '2023_09_19_061945_create_perangkat_desas_table', 1),
(16, '2023_09_21_054915_create_agamas_table', 1),
(17, '2023_09_21_073255_create_jenis_kelamins_table', 1),
(18, '2023_09_21_085821_create_pekerjaans_table', 1),
(19, '2023_09_23_063218_create_petas_table', 1),
(20, '2023_09_24_051908_create_umkms_table', 1),
(21, '2023_09_25_061424_create_kontaks_table', 1),
(22, '2023_09_25_075226_create_video_profils_table', 1),
(23, '2023_09_26_054211_create_situses_table', 1),
(24, '2023_11_29_060538_create_layanans_table', 1),
(25, '2023_11_29_073753_create_galleries_table', 1),
(26, '2023_11_29_164313_create_announcements_table', 1),
(27, '2023_11_29_201150_create_anggarans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaans`
--

CREATE TABLE `pekerjaans` (
  `id` bigint UNSIGNED NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pekerjaans`
--

INSERT INTO `pekerjaans` (`id`, `pekerjaan`, `jumlah`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Petani', 13026, 1, '2025-02-11 03:21:45', '2025-10-29 00:55:43'),
(2, 'Pegawai Negeri', 1390, 1, '2025-02-11 03:21:45', '2025-10-29 00:56:01'),
(3, 'Belum/Tidak bekerja', 991, 1, '2025-02-11 03:21:45', '2025-10-29 00:56:25'),
(4, 'Pensiunan', 1961, 1, '2025-02-11 03:21:45', '2025-10-29 00:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `perangkat_desas`
--

CREATE TABLE `perangkat_desas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perangkat_desas`
--

INSERT INTO `perangkat_desas` (`id`, `nama`, `foto`, `jabatan`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Haya', 'img-perangkat//67aaf46b5d68e.jpg', 'Kepala Desa', 1, '2025-02-11 03:21:45', '2025-10-28 05:58:48'),
(2, 'Hardi', 'img-perangkat//67aaf45773274.jpg', 'Sekretaris Desa', 1, '2025-02-11 03:21:45', '2025-10-28 05:58:38'),
(3, 'Puspa', 'img-perangkat//67aaf3cb12ce6.png', 'Kepala Urusan Umum', 1, '2025-02-11 03:21:45', '2025-10-28 05:58:28'),
(4, 'Faiz', 'img-perangkat//67aaf3e13146a.jpg', 'Kepala Dusun', 1, '2025-02-11 03:21:45', '2025-10-28 05:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petas`
--

CREATE TABLE `petas` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petas`
--

INSERT INTO `petas` (`id`, `judul`, `alamat`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Peta Desa', 'Desa dongkal,indramayu', 1, '2025-02-11 03:21:45', '2025-10-28 05:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `post_statuses`
--

CREATE TABLE `post_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_statuses`
--

INSERT INTO `post_statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'draft', '2025-02-11 03:21:45', '2025-02-11 03:21:45'),
(2, 'publish', '2025-02-11 03:21:45', '2025-02-11 03:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `sejarahs`
--

CREATE TABLE `sejarahs` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sejarahs`
--

INSERT INTO `sejarahs` (`id`, `judul`, `body`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Sejarah Desa Dongkal', '<p>Desa Dongkal terletak di Kabupaten Indramayu, Provinsi Jawa Barat, dan memiliki sejarah panjang sebagai pemukiman masyarakat lokal. Berdasarkan catatan lisan dan dokumen daerah, awal mula Desa Dongkal bermula pada abad ke-18. Pada masa itu, wilayah ini berupa lahan rawa dan hutan yang menjadi tempat berburu bagi penduduk setempat. Nama “Dongkal” dipercaya berasal dari bahasa lokal yang berarti “tempat menonjol” atau “titik penting”, yang menunjukkan posisi strategis desa pada jalur perdagangan dan perjalanan masyarakat di sekitarnya.</p><p>Seiring berjalannya waktu, masyarakat mulai membuka lahan pertanian dan menetap secara permanen. Desa Dongkal menjadi pusat kegiatan ekonomi lokal, terutama pertanian padi dan jagung, serta berkembang menjadi komunitas yang solid. Pada masa kolonial Belanda, desa ini mengalami pengaturan administratif dengan ditunjuknya kepala desa resmi dan penataan wilayah.</p><p>Setelah Indonesia merdeka, Desa Dongkal resmi menjadi bagian dari Kecamatan [sesuaikan kecamatan] di Kabupaten Indramayu. Hingga kini, Desa Dongkal dikenal sebagai desa yang menjaga tradisi, memiliki komunitas yang kompak, dan berkembang secara ekonomi melalui sektor pertanian, perdagangan, dan usaha lokal lainnya.</p>', 1, '2025-02-11 03:21:45', '2025-10-28 05:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `situses`
--

CREATE TABLE `situses` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `situses`
--

INSERT INTO `situses` (`id`, `logo`, `nm_desa`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'img-logo//6900a2d7a1148.png', 'Desa Dongkal', 'arahan', 'Indramayu', 'Jawa barat', 898989, 1, '2025-02-11 03:21:45', '2025-10-28 11:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_slider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_btn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `judul`, `deskripsi`, `img_slider`, `link_btn`, `created_at`, `updated_at`) VALUES
(1, 'Website Desa Dongkal', 'Desa Dongkal adalah desa yang terletak di Kecamatan Anjatan, Kabupaten Indramayu, Provinsi Jawa Barat, dengan Kode Pos 45256.', 'img-slider//67aac9d9e8306.jpg', '#', '2025-02-11 03:21:45', '2025-10-28 10:51:04'),
(2, 'Sejarah Desa', 'Desa Dongkal adalah desa yang terletak di Kecamatan Anjatan, Kabupaten Indramayu. Dikenal dengan masyarakatnya yang ramah dan lingkungan yang asri, Desa Dongkal memiliki potensi besar di sektor pertanian, perdagangan, dan budaya lokal. Pemerintah desa berkomitmen untuk mewujudkan desa yang maju, mandiri, dan berdaya saing demi kesejahteraan seluruh warganya. 🌱', 'img-slider//67aacc68000d2.png', '#', '2025-02-11 03:21:45', '2025-10-28 23:19:50'),
(3, 'Visi & Misi', '🌟 Visi Desa Dongkal\r\n“Terwujudnya Desa Dongkal yang maju, mandiri, dan berbudaya dengan masyarakat yang sejahtera dan lingkungan yang lestari.”\r\n🎯 Misi Desa Dongkal\r\nMeningkatkan kualitas pendidikan, kesehatan, dan kesejahteraan masyarakat.\r\nMengembangkan potensi pertanian, perdagangan, dan usaha mikro desa.\r\nMelestarikan nilai budaya dan menjaga kelestarian lingkungan.\r\nMeningkatkan pelayanan publik yang cepat, transparan, dan akuntabel.\r\nMendorong partisipasi masyarakat dalam pembangunan desa berkelanjutan.', 'img-slider//67aaca21bd8df.jpeg', '#', '2025-02-11 03:21:45', '2025-10-28 10:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `umkms`
--

CREATE TABLE `umkms` (
  `id` bigint UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `umkms`
--

INSERT INTO `umkms` (`id`, `foto`, `produk`, `slug`, `harga`, `deskripsi`, `no_hp`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'img-produk/67aae72a74e39.jpeg', 'Kerajinan Rajut Eceng Gondok', 'kerajinan-rajut-eceng-gondok', 150000, '<p>KERANJANG MINI ENCENG GONDOK DIMENSI 30X28X10 CM ( UKURAN PAKET )<br>DETAIL SIZE PRODUK : 30X18X10 CM<br>dikarenakan produk merupakan handmade wajar bila ada selisih dengan size yg tertera dideskripsi.<br><br>LANGSUNG PENGRAJIN , BELI DI MALL PASTI 100 LEBIH<br><br>LANGUNS AJA SIS.<br><br>NOTE : SUPAYA TIDAK RUSAK KAMI MENYEDIAKAN KARDUS BERBAYAR HANYA 500 RUPIAH , SILAHKAN CHECK OUT DI ETALASE<br><br>#ENCENGGONDOK #STORAGE #KERANJANGANYAMAN #SEAGRASS</p>', '81212121212', 1, '2025-02-11 05:59:06', '2025-02-11 05:59:06'),
(3, 'img-produk/67aaeaf668166.jpeg', 'Dorokdokcu, Banjaran', 'dorokdokcu-banjaran', 15000, '<p>Dorokdok Pedas Jeruk Brand: Dorokdokcu Rasa: Pedas daun jeruk Netto: 50gr Harga: Rp 10.000 Terbuat dari 100% kulit sapi . Ini enak banget rasanya pedes asin gurih plus ada sedikit rasa khas daun jeruknya, sobi micin dijamin nagih!!</p>', '83434342323', 1, '2025-02-11 06:15:18', '2025-02-11 06:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `foto`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'img-profil/user-1.jpg', 'admin', 'admin@gmail.com', NULL, '$2y$10$y524SMmxYHjWaYnq9OmZvOyo9tMISdjVPs72wj9ngvruf3sj7D0S2', NULL, '2025-02-11 03:21:45', '2025-02-11 07:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `video_profils`
--

CREATE TABLE `video_profils` (
  `id` bigint UNSIGNED NOT NULL,
  `url_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_profils`
--

INSERT INTO `video_profils` (`id`, `url_video`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'https://www.youtube.com/embed/3ZOqD4H0gbc?si=WTNPnOkQTOpwLQsv\" title=', 1, '2025-02-11 03:21:45', '2025-10-28 05:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `visi_misis`
--

CREATE TABLE `visi_misis` (
  `id` bigint UNSIGNED NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visi_misis`
--

INSERT INTO `visi_misis` (`id`, `visi`, `misi`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '“Terwujudnya Desa Dongkal yang maju, mandiri, dan berbudaya, dengan masyarakat sejahtera dan lingkungan yang lestari.”', '- Meningkatkan kualitas pendidikan dan pelayanan kesehatan bagi seluruh masyarakat.\r\n- Mengembangkan potensi ekonomi lokal melalui pertanian, perdagangan, dan usaha kreatif masyarakat.\r\n- Menjaga dan melestarikan budaya, adat istiadat, serta lingkungan hidup desa.\r\n- Meningkatkan partisipasi masyarakat dalam pembangunan desa dan pengambilan keputusan.\r\n- Mewujudkan tata kelola pemerintahan yang transparan, efektif, dan akuntabel.', 1, '2025-02-11 03:21:45', '2025-10-28 06:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `wilayahs`
--

CREATE TABLE `wilayahs` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wilayahs`
--

INSERT INTO `wilayahs` (`id`, `judul`, `body`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Wilayah Desa Dongkal', '<p>Desa Dongkal merupakan salah satu desa yang terletak di Kabupaten Indramayu, Jawa Barat. Berdasarkan catatan sejarah lisan dan dokumen pemerintah daerah, Desa Dongkal mulai dikenal sebagai pemukiman sejak abad ke-18. Pada awalnya, wilayah ini merupakan lahan rawa yang banyak ditumbuhi pohon-pohon besar dan menjadi tempat berburu bagi penduduk sekitar. Nama “Dongkal” sendiri dipercaya berasal dari istilah lokal yang berarti “tempat yang menonjol” atau “titik penting” dalam perjalanan masyarakat di masa lampau.</p><p>Seiring waktu, penduduk mulai menetap secara permanen dan membuka lahan pertanian, terutama untuk menanam padi dan jagung. Letak Desa Dongkal yang strategis di jalur perdagangan lokal membuat desa ini berkembang menjadi pusat ekonomi kecil di wilayah sekitarnya.</p><p>Pada masa pemerintahan kolonial Belanda, Desa Dongkal mengalami beberapa perubahan struktur administratif, termasuk pembagian wilayah dan pembentukan kepala desa resmi. Setelah Indonesia merdeka, Desa Dongkal resmi menjadi bagian dari Kecamatan [sesuaikan kecamatan] di Kabupaten Indramayu dan terus berkembang menjadi desa yang mandiri dengan berbagai fasilitas pendidikan, kesehatan, dan pelayanan masyarakat.</p><p>Hingga kini, Desa Dongkal dikenal sebagai desa yang memiliki komunitas yang erat, budaya tradisional yang masih dilestarikan, serta potensi pertanian dan usaha lokal yang terus berkembang..</p>', 1, '2025-02-11 03:21:45', '2025-10-28 05:57:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agamas`
--
ALTER TABLE `agamas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggarans`
--
ALTER TABLE `anggarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `announcements_slug_unique` (`slug`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beritas_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kelamins`
--
ALTER TABLE `jenis_kelamins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontaks`
--
ALTER TABLE `kontaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanans`
--
ALTER TABLE `layanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perangkat_desas`
--
ALTER TABLE `perangkat_desas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `petas`
--
ALTER TABLE `petas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_statuses`
--
ALTER TABLE `post_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sejarahs`
--
ALTER TABLE `sejarahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `situses`
--
ALTER TABLE `situses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `umkms`
--
ALTER TABLE `umkms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video_profils`
--
ALTER TABLE `video_profils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi_misis`
--
ALTER TABLE `visi_misis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wilayahs`
--
ALTER TABLE `wilayahs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agamas`
--
ALTER TABLE `agamas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `anggarans`
--
ALTER TABLE `anggarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_kelamins`
--
ALTER TABLE `jenis_kelamins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kontaks`
--
ALTER TABLE `kontaks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `layanans`
--
ALTER TABLE `layanans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perangkat_desas`
--
ALTER TABLE `perangkat_desas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petas`
--
ALTER TABLE `petas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_statuses`
--
ALTER TABLE `post_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sejarahs`
--
ALTER TABLE `sejarahs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `situses`
--
ALTER TABLE `situses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `umkms`
--
ALTER TABLE `umkms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video_profils`
--
ALTER TABLE `video_profils`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visi_misis`
--
ALTER TABLE `visi_misis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wilayahs`
--
ALTER TABLE `wilayahs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
