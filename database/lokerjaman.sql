-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2024 at 01:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lokerjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PlU155I8TXLhRdizaqjqvrE8S5Am1CO7byxll2RP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSzBGQ1RxODA4ejE3OUpPMGlOQkVPWU95Yngwbm5IZm9UaFdPYk16YyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO319', 1727863841);

-- --------------------------------------------------------

--
-- Table structure for table `tb_brand_profiles`
--

CREATE TABLE `tb_brand_profiles` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `logo` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `google_maps` text DEFAULT NULL,
  `contact` text DEFAULT NULL,
  `post_vacancy` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_brand_profiles`
--

INSERT INTO `tb_brand_profiles` (`id`, `created_at`, `updated_at`, `uuid`, `logo`, `about`, `google_maps`, `contact`, `post_vacancy`) VALUES
(1, '2024-10-01 14:56:53', '2024-10-02 05:16:50', 'uuid1', 'images/ytx1gmbYmCzZ4fA1DiIDGBPZSHnIRyF1zSwhGmvi.png', '<p>Selamat datang di <strong>Lokerjaman</strong>, platform terpercaya yang menghubungkan pencari kerja, baik <i>fresh graduate</i> maupun profesional berpengalaman, dengan peluang karir terbaik di berbagai industri. Kami berkomitmen untuk membantu setiap individu menemukan pekerjaan yang sesuai dengan keahlian, minat, dan aspirasi mereka, serta memudahkan perusahaan dalam mencari kandidat berkualitas.</p><p>Di Lokerjaman, kami memahami bahwa setiap pencari kerja, dari lulusan baru hingga profesional yang ingin meningkatkan karirnya, memiliki potensi besar untuk berkembang. Kami menyediakan akses ke ribuan lowongan kerja dari perusahaan- perusahaan terkemuka di seluruh Indonesia, mulai dari level entry untuk <i>fresh graduate</i> hingga posisi manajerial untuk profesional berpengalaman.</p><p>Melalui platform yang dirancang khusus untuk memudahkan pencarian lowongan kerja, <strong>Lokerjaman</strong> siap mendampingi Anda dalam setiap langkah perjalanan karir. Kami mengedepankan teknologi canggih dan layanan yang efisien untuk membantu Anda menemukan pekerjaan impian, apapun latar belakang dan tingkat pengalaman Anda.</p><h4><strong>Visi:</strong></h4><p>Menjadi platform lowongan kerja terdepan di Indonesia yang membantu lulusan baru dan profesional menemukan karir terbaik mereka.</p><h4><strong>Misi:</strong></h4><ul><li>Memberikan akses mudah bagi para <i>fresh graduate</i> dan profesional terhadap lowongan yang relevan dan bervariasi.</li><li>Mendukung perusahaan dalam menemukan kandidat terbaik dari berbagai tingkatan pengalaman secara cepat dan efisien.</li><li>Mengedepankan inovasi teknologi untuk meningkatkan pengalaman pengguna dalam pencarian kerja dan rekrutmen.</li></ul><h4><strong>Kenapa Memilih Lokerjaman?</strong></h4><ul><li><strong>Lowongan Terbaru dan Terpercaya</strong>: Kami bekerja sama dengan perusahaan besar untuk menampilkan lowongan kerja yang valid dan terpercaya, baik untuk <i>fresh graduate</i> maupun profesional.</li><li><strong>Fitur Pencarian Canggih</strong>: Pencarian pekerjaan yang mudah dengan filter khusus sesuai lokasi, industri, tingkat pengalaman, dan posisi yang diinginkan.</li><li><strong>Dukungan untuk Fresh Graduate</strong>: Kami menyediakan panduan, tips, dan dukungan untuk membantu lulusan baru memulai karir mereka dengan percaya diri.</li><li><strong>Kemudahan Rekrutmen</strong>: Bagi perusahaan, kami menawarkan solusi rekrutmen yang mempermudah proses pencarian dan seleksi kandidat dari berbagai tingkatan karir.</li></ul><p><strong>Bergabunglah dengan Lokerjaman</strong> dan temukan karir impian Anda, mulai dari langkah pertama sebagai <i>fresh graduate</i> hingga mencapai posisi profesional yang lebih tinggi!</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6158.8988425339185!2d103.59104816416998!3d-1.6195300104651833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e25888809541e19%3A0x2fcfdb750558a7cb!2sTugu%20Juang%20Jambi!5e1!3m2!1sid!2sid!4v1727800961629!5m2!1sid!2sid\" width=\"100%\"style=\"height:50vh; border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '<p>Kami di <strong>Lokerjaman</strong> selalu siap membantu Anda. Jika Anda memiliki pertanyaan, saran, atau membutuhkan bantuan lebih lanjut mengenai layanan kami, jangan ragu untuk menghubungi kami. Tim kami akan dengan senang hati merespons setiap pertanyaan dan membantu Anda secepat mungkin.</p><h4>Informasi Kontak</h4><ul><li><strong>Alamat</strong>: Kota Jambi, Provinsi Jambi.</li><li><strong>Telepon</strong>: (+62) 85367630090</li><li><strong>Email</strong>: rikidavidtra.2310@gmail.com</li><li><strong>Jam Operasional</strong>: Senin - Jumat, 09:00 - 17:00 WIB</li></ul><h4>Formulir Kontak</h4><p>Jika Anda ingin menghubungi kami secara langsung, Anda juga bisa mengisi formulir di bawah ini, dan tim kami akan menghubungi Anda dalam waktu 1-2 hari kerja.&nbsp;<br><a href=\"mailto:rikidavidtra.2310@gmail.com?subject=Kontak dari Website Lokerjaman&amp;body=Halo, saya ingin menghubungi Anda tentang...\">Kirim Formulir</a></p><h4>Media Sosial</h4><p>Ikuti kami di media sosial untuk mendapatkan update terbaru mengenai lowongan kerja dan informasi karir lainnya:</p><ul><li><strong>Instagram</strong>: <a href=\"https://www.instagram.com/riki_davidtra\">@riki_davidtra</a></li><li><strong>LinkedIn</strong>: <a href=\"https://id.linkedin.com/in/riki-davidtra-a30752237\">Riki Davidtra</a></li></ul>', '<h4>Mengapa Memilih Lokerjaman?</h4><p>Selamat datang di Lokerjaman, platform terkemuka untuk menemukan kandidat terbaik melalui lowongan pekerjaan yang dipasang oleh tim admin kami. Berikut adalah beberapa kelebihan yang kami tawarkan:</p><ul><li><strong>Jangkauan Luas:</strong> Kami memiliki jaringan luas yang menghubungkan Anda dengan ribuan pencari kerja di seluruh Indonesia.</li><li><strong>Mudah Digunakan:</strong> Proses pemasangan lowongan sangat sederhana. Cukup hubungi kami dan tim admin kami akan membantu Anda untuk mempublikasikan lowongan Anda.</li><li><strong>Harga Terjangkau:</strong> Kami menawarkan paket pemasangan lowongan dengan harga yang bersaing, sehingga Anda bisa mendapatkan hasil maksimal tanpa menguras anggaran.</li><li><strong>Promosi Efektif:</strong> Setiap lowongan yang dipasang oleh admin kami akan dipromosikan secara aktif di media sosial dan platform kami untuk meningkatkan visibilitas.</li><li><strong>Dukungan Pelanggan:</strong> Tim kami selalu siap membantu Anda dengan pertanyaan atau masalah yang mungkin Anda hadapi. Kami percaya bahwa kepuasan pelanggan adalah prioritas utama.</li></ul><p>Dengan Lokerjaman, Anda tidak hanya memasang lowongan, tetapi juga membuka peluang untuk menemukan kandidat yang tepat dengan mudah dan cepat. Bergabunglah bersama kami dan rasakan manfaatnya sekarang juga!</p><p>Jika Anda siap untuk memasang lowongan, silakan <a href=\"https://wa.me/6285367630090\">hubungi kami di WhatsApp</a> untuk informasi lebih lanjut. Tim admin kami akan segera menghubungi Anda untuk memproses lowongan Anda.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_companies`
--

CREATE TABLE `tb_companies` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `company_type_id` int(11) NOT NULL,
  `total_visit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_company_types`
--

CREATE TABLE `tb_company_types` (
  `id` int(11) NOT NULL,
  `company_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_company_types`
--

INSERT INTO `tb_company_types` (`id`, `company_type`) VALUES
(1, 'Swasta'),
(2, 'BUMN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_education_levels`
--

CREATE TABLE `tb_education_levels` (
  `id` int(11) NOT NULL,
  `education_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_education_levels`
--

INSERT INTO `tb_education_levels` (`id`, `education_level`) VALUES
(1, 'SMA/SMK'),
(2, 'Diploma'),
(3, 'Sarjana');

-- --------------------------------------------------------

--
-- Table structure for table `tb_job_types`
--

CREATE TABLE `tb_job_types` (
  `id` int(11) NOT NULL,
  `job_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_job_types`
--

INSERT INTO `tb_job_types` (`id`, `job_type`) VALUES
(1, 'Penuh waktu'),
(2, 'Paruh waktu'),
(3, 'Kontrak'),
(4, 'Magang'),
(5, 'Sementara');

-- --------------------------------------------------------

--
-- Table structure for table `tb_locations`
--

CREATE TABLE `tb_locations` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_locations`
--

INSERT INTO `tb_locations` (`id`, `created_at`, `updated_at`, `uuid`, `location_name`, `user_id`) VALUES
(1, '2024-09-27 12:33:18', '2024-09-27 12:33:18', '4884716d-f8dc-4a88-be4f-905e667e2fd0', 'Indonesia', 2),
(2, '2024-09-27 12:35:22', '2024-09-27 12:35:22', 'f41cb53e-f238-4e4d-a2be-7e51bae57135', 'Jambi, Indonesia', 2),
(3, '2024-09-27 12:36:22', '2024-09-27 12:36:22', 'e68e0b37-f16e-4c9b-bc37-240d7889fffd', 'Luar Negeri', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_accesses`
--

CREATE TABLE `tb_menu_accesses` (
  `id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `first_menu_id` int(11) DEFAULT NULL,
  `second_menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_menu_accesses`
--

INSERT INTO `tb_menu_accesses` (`id`, `created_at`, `updated_at`, `uuid`, `role_id`, `first_menu_id`, `second_menu_id`) VALUES
(74, '2024-10-02 04:44:07', '2024-10-02 04:44:07', 'b6ab84ee-4336-4535-898a-77dc17b35f36', 1, 2, 1),
(75, '2024-10-02 04:44:07', '2024-10-02 04:44:07', 'f73493df-6237-4cfd-a27c-b853351d97de', 1, 2, 2),
(76, '2024-10-02 04:44:07', '2024-10-02 04:44:07', 'f6c442bc-35a0-4285-9092-cca68074385f', 1, 1, NULL),
(77, '2024-10-02 04:44:07', '2024-10-02 04:44:07', 'd7d7ae22-09c0-4392-9c6a-dd52e2f0c40d', 1, 18, NULL),
(78, '2024-10-02 04:44:07', '2024-10-02 04:44:07', '9318cc39-96f4-4b3f-b968-0af29bc460e9', 1, 3, 12),
(79, '2024-10-02 04:44:07', '2024-10-02 04:44:07', 'c0c2e797-cbb7-40b9-824d-5630458b6031', 1, 3, 3),
(80, '2024-10-02 04:44:07', '2024-10-02 04:44:07', '037b2769-3f79-4aff-80ed-3388e48283fc', 1, 3, 11),
(81, '2024-10-02 04:44:07', '2024-10-02 04:44:07', '2774d6d6-c3f6-492e-b135-031cdb287754', 1, 3, 13),
(82, '2024-10-02 04:44:07', '2024-10-02 04:44:07', '15c41401-14e5-4304-b8b7-7e0799bd4dbd', 1, 4, NULL),
(83, '2024-10-02 04:44:31', '2024-10-02 04:44:31', '2f5e3180-99f0-45d3-b006-77ac0a7cd424', 2, 1, NULL),
(84, '2024-10-02 04:44:31', '2024-10-02 04:44:31', '7cadb672-7995-4be0-87c6-d44dfd6e4c4b', 2, 18, NULL),
(85, '2024-10-02 04:44:31', '2024-10-02 04:44:31', 'd10afb62-5b14-4e66-a4e9-a812eb98bed3', 2, 3, 12),
(86, '2024-10-02 04:44:31', '2024-10-02 04:44:31', 'd552bd2f-22c2-4c1b-8ec4-328a2925857e', 2, 3, 11),
(87, '2024-10-02 04:44:31', '2024-10-02 04:44:31', '73eecfc4-33ae-4794-9c9a-570a9067d2d6', 2, 3, 13),
(88, '2024-10-02 04:44:31', '2024-10-02 04:44:31', '7b26747d-8137-4977-b818-dc8736938077', 2, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_firsts`
--

CREATE TABLE `tb_menu_firsts` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `first_menu_name` varchar(255) DEFAULT NULL,
  `first_menu_link` varchar(255) DEFAULT NULL,
  `first_menu_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_menu_firsts`
--

INSERT INTO `tb_menu_firsts` (`id`, `created_at`, `updated_at`, `uuid`, `first_menu_name`, `first_menu_link`, `first_menu_icon`) VALUES
(1, '2024-07-27 16:12:20', '2024-07-27 16:13:18', '1', 'Dashboard', 'dashboard', 'fas fa-th'),
(2, '2024-07-04 11:07:14', '2024-07-26 13:56:02', '2', 'Aplikasi', '#', 'fas fa-cog'),
(3, '2024-07-01 09:32:11', '2024-07-26 02:56:29', '3', 'Master', '#', 'fas fa-layer-group'),
(4, '2024-07-28 03:28:38', '2024-07-28 03:35:53', '4', 'Profil', 'profiles', 'fas fa-user'),
(18, '2024-09-27 12:52:49', '2024-10-02 09:45:01', '27606e4e-dbd5-4e74-9c64-9fb2a6f34c4e', 'Lowongan', 'vacancies', 'fas fa-briefcase');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_seconds`
--

CREATE TABLE `tb_menu_seconds` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `second_menu_name` varchar(255) DEFAULT NULL,
  `second_menu_link` varchar(255) DEFAULT NULL,
  `second_menu_icon` varchar(255) DEFAULT NULL,
  `first_menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_menu_seconds`
--

INSERT INTO `tb_menu_seconds` (`id`, `created_at`, `updated_at`, `uuid`, `second_menu_name`, `second_menu_link`, `second_menu_icon`, `first_menu_id`) VALUES
(1, '2024-07-04 11:07:55', '2024-07-04 11:09:41', '1', 'Menu', 'menus', NULL, 2),
(2, '2024-07-04 11:08:23', '2024-07-04 11:09:53', '2', 'Peran', 'roles', NULL, 2),
(3, '2024-07-26 02:56:51', '2024-07-26 07:40:15', '3', 'Pengguna', 'users', NULL, 3),
(11, '2024-09-27 06:06:00', '2024-09-27 06:06:00', 'd2c46290-44ad-4b4d-b1f0-533ef461fb4a', 'Perusahaan', 'companies', NULL, 3),
(12, '2024-09-27 12:31:14', '2024-09-27 12:31:14', '93198161-1edd-400d-8ac1-7eaee851e5a5', 'Lokasi', 'locations', NULL, 3),
(13, '2024-10-02 04:43:42', '2024-10-02 04:55:44', 'b4e05099-197a-48ef-9ab5-f653da6b5206', 'Profil Lokerjaman', 'brand_profiles/uuid1/edit', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_post_status`
--

CREATE TABLE `tb_post_status` (
  `id` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_post_status`
--

INSERT INTO `tb_post_status` (`id`, `post_status`) VALUES
(1, 'Diterbitkan'),
(2, 'Arsip');

-- --------------------------------------------------------

--
-- Table structure for table `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `create` bit(1) DEFAULT NULL,
  `read` bit(1) DEFAULT NULL,
  `update` bit(1) DEFAULT NULL,
  `delete` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_roles`
--

INSERT INTO `tb_roles` (`id`, `created_at`, `updated_at`, `uuid`, `role_name`, `create`, `read`, `update`, `delete`) VALUES
(1, '2024-09-24 12:38:00', '2024-09-24 12:38:00', '72bd2d28-9152-46d2-9ef0-7a8524e6ca5e', 'Owner', NULL, NULL, NULL, NULL),
(2, '2024-09-24 12:38:07', '2024-09-24 12:38:07', '459fb0d8-f5ae-4ace-881a-bea5c6982507', 'Admin', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_vacancies`
--

CREATE TABLE `tb_vacancies` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `job_type_id` int(11) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `expires_date` date DEFAULT NULL,
  `education_level_id` int(11) DEFAULT NULL,
  `post_status_id` int(11) DEFAULT NULL,
  `experience_years` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `total_visit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_vacancy_links`
--

CREATE TABLE `tb_vacancy_links` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `vacancy_id` int(11) DEFAULT NULL,
  `link_name` varchar(255) DEFAULT NULL,
  `job_link` text DEFAULT NULL,
  `total_visits` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `full_name` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nick_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `uuid`, `full_name`, `nick_name`, `role_id`) VALUES
(1, NULL, 'davidtra@gmail.com', NULL, '$2y$12$k83DHsQnWCT3Guu8aDaV9uDCYhQ0Pt2P/jXGB/SvqpW4cQ5dysHUq', NULL, '2024-09-22 04:51:41', '2024-09-22 04:51:41', 'b78bbf63-2424-4aec-9da7-55537062f5e3', 'David Tra', 'David', 2),
(2, NULL, 'rikidavid@gmail.com', NULL, '$2y$12$jI2jrqRHuW.Lj5FqgK75U.Fy8dQ/BUhdzagdm93r4Y32DuqyQz6Vu', NULL, '2024-09-22 05:10:02', '2024-09-22 05:10:02', '3a0f5a4a-14ed-426b-9298-3cfa6f475c61', 'Riki David', 'Riki', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tb_brand_profiles`
--
ALTER TABLE `tb_brand_profiles`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_companies`
--
ALTER TABLE `tb_companies`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_company_types`
--
ALTER TABLE `tb_company_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_education_levels`
--
ALTER TABLE `tb_education_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_job_types`
--
ALTER TABLE `tb_job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_locations`
--
ALTER TABLE `tb_locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_menu_accesses`
--
ALTER TABLE `tb_menu_accesses`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_menu_accesses_role_id` (`role_id`),
  ADD KEY `tb_menu_accesses_second_menu_id` (`second_menu_id`),
  ADD KEY `tb_menu_accesses_first_menu_id` (`first_menu_id`);

--
-- Indexes for table `tb_menu_firsts`
--
ALTER TABLE `tb_menu_firsts`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_menu_seconds`
--
ALTER TABLE `tb_menu_seconds`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_menu_seconds_first_menu_id` (`first_menu_id`);

--
-- Indexes for table `tb_post_status`
--
ALTER TABLE `tb_post_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- Indexes for table `tb_vacancies`
--
ALTER TABLE `tb_vacancies`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_vacancies_company_id` (`company_id`);

--
-- Indexes for table `tb_vacancy_links`
--
ALTER TABLE `tb_vacancy_links`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE,
  ADD KEY `tb_vacancies_link_vacancy_id` (`vacancy_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `uuid` (`uuid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_brand_profiles`
--
ALTER TABLE `tb_brand_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_companies`
--
ALTER TABLE `tb_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_company_types`
--
ALTER TABLE `tb_company_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_education_levels`
--
ALTER TABLE `tb_education_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_job_types`
--
ALTER TABLE `tb_job_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_locations`
--
ALTER TABLE `tb_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_menu_accesses`
--
ALTER TABLE `tb_menu_accesses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tb_menu_firsts`
--
ALTER TABLE `tb_menu_firsts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_menu_seconds`
--
ALTER TABLE `tb_menu_seconds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_post_status`
--
ALTER TABLE `tb_post_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_vacancies`
--
ALTER TABLE `tb_vacancies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_vacancy_links`
--
ALTER TABLE `tb_vacancy_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_menu_accesses`
--
ALTER TABLE `tb_menu_accesses`
  ADD CONSTRAINT `tb_menu_accesses_first_menu_id` FOREIGN KEY (`first_menu_id`) REFERENCES `tb_menu_firsts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_menu_accesses_role_id` FOREIGN KEY (`role_id`) REFERENCES `tb_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_menu_accesses_second_menu_id` FOREIGN KEY (`second_menu_id`) REFERENCES `tb_menu_seconds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_menu_seconds`
--
ALTER TABLE `tb_menu_seconds`
  ADD CONSTRAINT `tb_menu_seconds_first_menu_id` FOREIGN KEY (`first_menu_id`) REFERENCES `tb_menu_firsts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_vacancies`
--
ALTER TABLE `tb_vacancies`
  ADD CONSTRAINT `tb_vacancies_company_id` FOREIGN KEY (`company_id`) REFERENCES `tb_companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_vacancy_links`
--
ALTER TABLE `tb_vacancy_links`
  ADD CONSTRAINT `tb_vacancies_link_vacancy_id` FOREIGN KEY (`vacancy_id`) REFERENCES `tb_vacancies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
