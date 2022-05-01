-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 03:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enjezli_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_28_223236_laratrust_setup_tables', 1),
(6, '2022_04_29_085145_create_profiles_table', 1),
(7, '2022_04_29_085918_create_user_works_table', 1),
(8, '2022_04_29_090023_create_projects_table', 1),
(9, '2022_04_29_090159_create_user_attachments_table', 1),
(10, '2022_04_29_091344_create_offers_table', 1),
(11, '2022_04_29_091533_create_reviews_table', 1),
(12, '2022_04_29_092126_create_skills_table', 1),
(13, '2022_04_29_092229_create_user_skills_table', 1),
(14, '2022_04_29_092329_create_notifications_table', 1),
(15, '2022_04_29_092512_create_chats_table', 1),
(16, '2022_04_29_092750_create_offer_history_table', 1),
(17, '2022_04_29_092853_create_settings_table', 1),
(19, '2022_04_30_101511_create_project_skills_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `net_price` double NOT NULL,
  `duration` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `provider_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `price`, `net_price`, `duration`, `description`, `status`, `provider_id`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 200, 200, '4 ', 'محترف في تصميم المواقع ', 0, 1, 5, '2022-05-01 07:25:29', '2022-05-01 07:25:29'),
(2, 700, 700, '60', 'لدي خبرة في تصميم المواقع التعليمية', 1, 1, 5, '2022-05-01 06:01:11', '2022-05-01 06:01:11'),
(3, 200, 200, '60', 'لدي خبرة    3 سنوات في تصميم مواقع تعليمية', 1, 1, 5, '2022-05-01 06:03:59', '2022-05-01 06:03:59'),
(4, 100, 100, '60', 'لدي أعمال سابقة تطابق احتياج المطلوب', 1, 1, 6, '2022-05-01 06:11:31', '2022-05-01 06:11:31'),
(5, 50, 50, '60', 'خيرة في تصميم موقع تعليمي', 1, 1, 1, '2022-05-01 06:14:54', '2022-05-01 06:14:54'),
(6, 50, 50, '60', 'خيرة في تصميم الموقع', 1, 1, 1, '2022-05-01 06:18:23', '2022-05-01 06:18:23'),
(7, 100, 100, '20', 'خيرة في تصميم الموقع', 1, 1, 1, '2022-05-01 06:20:52', '2022-05-01 06:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `offer_history`
--

CREATE TABLE `offer_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gander` int(11) NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tweeter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `major` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Job_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `phone`, `birth_date`, `gander`, `country`, `facebook`, `github`, `tweeter`, `major`, `Job_title`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '777711189', '2013-05-15', 2, 'Yemen', NULL, NULL, NULL, 'تقنية معلومات', 'مهندس برمجيات', 'مهندس برمجيات مهندس برمجيات مهندس برمجيات مهندس برمجيات مهندس برمجيات مهندس برمجيات', 1, '2022-05-16 07:39:08', '2022-05-16 07:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `net_price` double NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `handled_by` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `file`, `duration`, `price`, `net_price`, `start_date`, `end_date`, `delivery_date`, `status`, `handled_by`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'تصميم موقع تعليمي', 'تصميم موقع تعليمي تصميم موقع تعليمي', NULL, '20', 900, 1, NULL, NULL, NULL, 2, NULL, 1, '2022-04-30 18:20:07', '2022-05-01 09:25:02'),
(2, 'تصميم موقع تعليمي', 'تصميم موقع تعليمي تصميم موقع تعليمي', NULL, '20', 800, 1, NULL, NULL, NULL, 0, NULL, 1, '2022-04-30 18:28:47', '2022-04-30 18:28:47'),
(3, 'تصميم موقع تعليمي', 'تصميم موقع تعليمي تصميم موقع تعليمي', NULL, '20', 700, 1, NULL, NULL, NULL, 0, NULL, 1, '2022-04-30 18:34:27', '2022-04-30 18:34:27'),
(4, 'تصميم موقع تعليمي', 'تصميم موقع تعليمي تصميم موقع تعليمي', NULL, '20', 600, 1, NULL, NULL, NULL, 0, NULL, 1, '2022-04-30 18:37:21', '2022-04-30 18:37:21'),
(5, 'تصميم موقع تعليمي', 'تصميم موقع تعليمي تصميم موقع تعليمي', NULL, '20', 500, 1, NULL, NULL, NULL, 1, NULL, 1, '2022-04-30 18:39:02', '2022-04-30 18:39:02'),
(6, 'تصميم موقع تعليمي', 'تصميم موقع تعليمي  \n              تصميم موقع تعليمي      \nتصميم موقع تعليمي', NULL, '90', 400, 1, NULL, NULL, NULL, 0, NULL, 1, '2022-05-01 03:03:07', '2022-05-01 03:03:07'),
(7, 'برمجة موقع', 'برمجة موقع  برمجة موقع  برمجة موقع', NULL, '5', 700, 700, NULL, NULL, NULL, 0, NULL, 1, '2022-05-01 09:34:28', '2022-05-01 09:34:28'),
(8, 'تصميم شعار لموقع', 'تصميم شعار لموقع تصميم شعار لموقع', NULL, '20', 100, 100, NULL, NULL, NULL, 0, NULL, 1, '2022-05-01 09:37:58', '2022-05-01 09:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `project_skills`
--

CREATE TABLE `project_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_skills`
--

INSERT INTO `project_skills` (`id`, `project_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(2, 4, 1, '2022-04-30 18:37:21', '2022-04-30 18:37:21'),
(3, 4, 2, '2022-04-30 18:37:21', '2022-04-30 18:37:21'),
(4, 4, 3, '2022-04-30 18:37:21', '2022-04-30 18:37:21'),
(5, 5, 1, '2022-04-30 18:39:02', '2022-04-30 18:39:02'),
(6, 5, 2, '2022-04-30 18:39:02', '2022-04-30 18:39:02'),
(7, 5, 3, '2022-04-30 18:39:02', '2022-04-30 18:39:02'),
(10, 1, 2, '2022-05-01 02:03:56', '2022-05-01 02:03:56'),
(11, 1, 3, '2022-05-01 02:03:56', '2022-05-01 02:03:56'),
(12, 6, 1, '2022-05-01 03:03:07', '2022-05-01 03:03:07'),
(13, 6, 2, '2022-05-01 03:03:07', '2022-05-01 03:03:07'),
(14, 6, 3, '2022-05-01 03:03:07', '2022-05-01 03:03:07'),
(15, 7, 1, '2022-05-01 09:34:28', '2022-05-01 09:34:28'),
(16, 7, 2, '2022-05-01 09:34:28', '2022-05-01 09:34:28'),
(17, 7, 3, '2022-05-01 09:34:28', '2022-05-01 09:34:28'),
(18, 8, 1, '2022-05-01 09:37:58', '2022-05-01 09:37:58'),
(19, 8, 2, '2022-05-01 09:37:58', '2022-05-01 09:37:58'),
(20, 8, 3, '2022-05-01 09:37:58', '2022-05-01 09:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `from_id` bigint(20) UNSIGNED NOT NULL,
  `to_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'مدير النظام', NULL, '2022-05-01 10:13:17', '2022-05-01 10:13:17'),
(2, 'seeker', 'طالب الخدمة', NULL, '2022-05-01 10:14:14', '2022-05-01 10:14:14'),
(3, 'provider', 'مقدم الخدمة', NULL, '2022-05-01 10:14:14', '2022-05-01 10:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `max_projects` int(11) NOT NULL,
  `additional_days` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'جرافكس', 0, '2022-04-30 21:35:10', '2022-04-30 21:35:10'),
(2, 'فوتوشوب', 0, '2022-04-30 21:35:10', '2022-04-30 21:35:10'),
(3, 'css', 0, '2022-04-30 21:36:45', '2022-04-30 21:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 2,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_blocked` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `type`, `status`, `is_blocked`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'سبأ الشميري', NULL, 'afaf14albakri@gmail.com', NULL, '1234567', 2, 1, 0, NULL, '2022-04-30 21:10:11', '2022-04-30 21:10:11'),
(2, 'ذكرى محمد', NULL, 'thekra@gmail.com', NULL, '12345678', 2, 1, 0, NULL, '2022-05-01 10:15:55', '2022-05-01 10:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_attachments`
--

CREATE TABLE `user_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attach_type` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `attach_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_attachments`
--

INSERT INTO `user_attachments` (`id`, `file_name`, `file_type`, `attach_type`, `is_active`, `attach_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1651354742.jpg', 'jpg', 1, 1, 5, 1, '2022-04-30 18:39:02', '2022-04-30 18:39:02'),
(2, '1651354742.png', 'png', 1, 1, 5, 1, '2022-04-30 18:39:02', '2022-04-30 18:39:02'),
(3, '1651354742.jpg', 'jpg', 1, 1, 5, 1, '2022-04-30 18:39:02', '2022-04-30 18:39:02'),
(4, '1651381436.jpg', 'jpg', 1, 1, 1, 1, '2022-05-01 02:03:56', '2022-05-01 02:03:56'),
(5, '1651381436.jpg', 'jpg', 1, 1, 1, 1, '2022-05-01 02:03:56', '2022-05-01 02:03:56'),
(6, '1651381436.png', 'png', 1, 1, 1, 1, '2022-05-01 02:03:56', '2022-05-01 02:03:56'),
(7, '1651381436.jpg', 'jpg', 1, 1, 1, 1, '2022-05-01 02:03:56', '2022-05-01 02:03:56'),
(8, '1651384987.jpg', 'jpg', 1, 1, 6, 1, '2022-05-01 03:03:07', '2022-05-01 03:03:07'),
(9, '1651384987.jpg', 'jpg', 1, 1, 6, 1, '2022-05-01 03:03:07', '2022-05-01 03:03:07'),
(10, '1651384987.jpg', 'jpg', 1, 1, 6, 1, '2022-05-01 03:03:07', '2022-05-01 03:03:07'),
(11, '1651384987.jpg', 'jpg', 1, 1, 6, 1, '2022-05-01 03:03:07', '2022-05-01 03:03:07'),
(12, '1651384987.jpg', 'jpg', 1, 1, 6, 1, '2022-05-01 03:03:07', '2022-05-01 03:03:07'),
(13, '1651384987.png', 'png', 1, 1, 6, 1, '2022-05-01 03:03:07', '2022-05-01 03:03:07'),
(14, '1651384987.jpg', 'jpg', 1, 1, 6, 1, '2022-05-01 03:03:07', '2022-05-01 03:03:07'),
(15, '1651396291.jpg', 'jpg', 2, 1, 4, 1, '2022-05-01 06:11:32', '2022-05-01 06:11:32'),
(16, '1651396292.jpg', 'jpg', 2, 1, 4, 1, '2022-05-01 06:11:32', '2022-05-01 06:11:32'),
(17, '1651396292.jpg', 'jpg', 2, 1, 4, 1, '2022-05-01 06:11:32', '2022-05-01 06:11:32'),
(18, '1651396292.jpg', 'jpg', 2, 1, 4, 1, '2022-05-01 06:11:32', '2022-05-01 06:11:32'),
(19, '1651396292.jpg', 'jpg', 2, 1, 4, 1, '2022-05-01 06:11:32', '2022-05-01 06:11:32'),
(20, '1651396292.png', 'png', 2, 1, 4, 1, '2022-05-01 06:11:32', '2022-05-01 06:11:32'),
(21, '1651396292.jpg', 'jpg', 2, 1, 4, 1, '2022-05-01 06:11:32', '2022-05-01 06:11:32'),
(22, '1651396852.png', 'png', 2, 1, 7, 1, '2022-05-01 06:20:52', '2022-05-01 06:20:52'),
(23, '1651408468.jpg', 'jpg', 1, 1, 7, 1, '2022-05-01 09:34:28', '2022-05-01 09:34:28'),
(24, '1651408468.jpg', 'jpg', 1, 1, 7, 1, '2022-05-01 09:34:28', '2022-05-01 09:34:28'),
(25, '1651408468.jpg', 'jpg', 1, 1, 7, 1, '2022-05-01 09:34:28', '2022-05-01 09:34:28'),
(26, '1651408678.jpg', 'jpg', 1, 1, 8, 1, '2022-05-01 09:37:58', '2022-05-01 09:37:58'),
(27, '1651408678.jpg', 'jpg', 1, 1, 8, 1, '2022-05-01 09:37:58', '2022-05-01 09:37:58'),
(28, '1651408678.jpg', 'jpg', 1, 1, 8, 1, '2022-05-01 09:37:58', '2022-05-01 09:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_works`
--

CREATE TABLE `user_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_sender_id_foreign` (`sender_id`),
  ADD KEY `chats_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_sender_id_foreign` (`sender_id`),
  ADD KEY `notifications_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_provider_id_foreign` (`provider_id`),
  ADD KEY `offers_project_id_foreign` (`project_id`);

--
-- Indexes for table `offer_history`
--
ALTER TABLE `offer_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_history_user_id_foreign` (`user_id`),
  ADD KEY `offer_history_offer_id_foreign` (`offer_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_user_id_unique` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_handled_by_foreign` (`handled_by`);

--
-- Indexes for table `project_skills`
--
ALTER TABLE `project_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_skills_project_id_foreign` (`project_id`),
  ADD KEY `project_skills_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_from_id_foreign` (`from_id`),
  ADD KEY `reviews_to_id_foreign` (`to_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_attachments`
--
ALTER TABLE `user_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_attachments_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_skills_user_id_foreign` (`user_id`),
  ADD KEY `user_skills_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `user_works`
--
ALTER TABLE `user_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_works_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offer_history`
--
ALTER TABLE `offer_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_skills`
--
ALTER TABLE `project_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_attachments`
--
ALTER TABLE `user_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_works`
--
ALTER TABLE `user_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `chats_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifications_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `offers_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `offer_history`
--
ALTER TABLE `offer_history`
  ADD CONSTRAINT `offer_history_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`),
  ADD CONSTRAINT `offer_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_handled_by_foreign` FOREIGN KEY (`handled_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_skills`
--
ALTER TABLE `project_skills`
  ADD CONSTRAINT `project_skills_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `project_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_from_id_foreign` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_to_id_foreign` FOREIGN KEY (`to_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_attachments`
--
ALTER TABLE `user_attachments`
  ADD CONSTRAINT `user_attachments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`),
  ADD CONSTRAINT `user_skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_works`
--
ALTER TABLE `user_works`
  ADD CONSTRAINT `user_works_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
