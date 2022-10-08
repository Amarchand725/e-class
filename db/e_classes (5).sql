-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2022 at 09:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_class`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `created_by`, `title`, `description`, `attachment`, `extension`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 11, 'Blogging Courses, Training, Classes & Tutorials Online', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '25-09-2022-171132.jpg', 'jpg', 1, NULL, '2022-09-25 12:11:32', '2022-09-25 12:11:32'),
(2, 11, 'Blogging & Content Writing Masterclass', '<p>Lorem Ipsumis simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '25-09-2022-171213.jpg', 'jpg', 1, NULL, '2022-09-25 12:12:13', '2022-09-25 12:12:13'),
(3, 11, 'Blogging Masterclass', '<p>Lorem Ipsum&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '25-09-2022-171250.jpg', 'jpg', 1, NULL, '2022-09-25 12:12:50', '2022-09-25 12:12:50'),
(4, 11, 'Build a Successful Creative Blog', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '25-09-2022-171335.jpg', 'jpg', 0, NULL, '2022-09-25 12:13:35', '2022-09-25 12:13:35'),
(5, 11, 'Built to Blog', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '25-09-2022-171417.jpg', 'jpg', 1, NULL, '2022-09-25 12:14:17', '2022-09-25 12:14:17'),
(6, 11, 'Blogging for Your Business', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '25-09-2022-171531.jpg', 'jpg', 1, NULL, '2022-09-25 12:15:31', '2022-09-25 12:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `bundles`
--

CREATE TABLE `bundles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_ids` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) DEFAULT 0,
  `start_from` date NOT NULL,
  `end_date` date NOT NULL,
  `retail_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bundles`
--

INSERT INTO `bundles` (`id`, `user_slug`, `course_ids`, `title`, `slug`, `short_detail`, `details`, `banner`, `is_paid`, `is_featured`, `start_from`, `end_date`, `retail_price`, `price`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'claire-robertson-8u', '[null,\"11\",\"10\"]', 'Develop New Skills', 'develop-new-skills', 'New Skillis the procedure by which an individual scientist takes a snippet of data from enactment, strategy, or some other source and makes an interpretation of it into a lot of attributes that can be quantitatively investigated. For every nation, two specialists from our multilingual group coded information sources freely as indicated by pre-characterized coding rules and contrasted their outcomes with guarantee precision. At whatever point coding required an informed decision by the coder, the guidelines basic such choices were talked about, efficiently portrayed in a coding manual and applied reliably across nations.', '<ul>\r\n	<li>\r\n	<p>To incorporate new abilities as successfully as could be expected under the circumstances, it&#39;s fundamental to get ordinary input. Great input permits you to reflect all the more profoundly, which is essential to the learning procedure. Take the time each day to ponder the advancement you&#39;re making</p>\r\n	</li>\r\n</ul>', '07-10-2022-104156.jpg', 1, 1, '2022-10-05', '2022-10-10', '1890', '1500', 1, NULL, '2022-10-07 05:41:56', '2022-10-07 06:36:49'),
(2, 'claire-robertson-8u', '[\"9\",\"8\"]', 'Fitness', 'fitness', 'Fitness is the procedure by which an individual scientist takes a snippet of data from enactment, strategy, or some other source and makes an interpretation of it into a lot of attributes that can be quantitatively investigated. For every nation, two specialists from our multilingual group coded information sources freely as indicated by pre-characterized coding rules and contrasted their outcomes with guarantee precision. At whatever point coding required an informed decision by the coder, the guidelines basic such choices were talked about, efficiently portrayed in a coding manual and applied reliably across nations.', '<ul>\r\n	<li>\r\n	<p>Physical wellness is a condition of well being and prosperity and, all the more explicitly, the capacity to perform parts of sports, occupations and day by day exercises. Physical wellness is commonly accomplished through appropriate sustenance, moderate-enthusiastic physical exercise, and adequate rest.</p>\r\n	</li>\r\n</ul>', '07-10-2022-110234.jpg', 1, 1, '2022-10-01', '2022-10-15', '2000', '400', 1, NULL, '2022-10-07 06:02:34', '2022-10-07 06:02:34'),
(3, 'claire-robertson-8u', '[null,\"6\",\"5\"]', 'Designing', 'designing', 'A design is a plan or specification for the construction of an object or system or for the ... with a broad multidisciplinary knowledge required for such designs to also have a detailed specialized knowledge of how to produce the product.', '<ul>\r\n	<li>\r\n	<p>A&nbsp;<em>design</em>&nbsp;is a plan or specification for the construction of an object or system or for the ... with a broad multidisciplinary knowledge required for such&nbsp;<em>designs</em>&nbsp;to also have a&nbsp;<em>detailed</em>&nbsp;specialized knowledge of how to produce the product.</p>\r\n	</li>\r\n</ul>', '07-10-2022-110400.jpg', 1, 1, '2022-10-07', '2022-10-10', '2200', '2000', 1, NULL, '2022-10-07 06:04:00', '2022-10-07 06:35:31'),
(4, 'claire-robertson-8u', '[null,\"2\",\"1\"]', 'Coding', 'coding', 'Coding is the procedure by which an individual scientist takes a snippet of data from enactment, strategy, or some other source and makes an interpretation of it into a lot of attributes that can be quantitatively investigated. For every nation, two specialists from our multilingual group coded information sources freely as indicated by pre-characterized coding rules and contrasted their outcomes with guarantee precision. At whatever point coding required an informed decision by the coder, the guidelines basic such choices were talked about, efficiently portrayed in a coding manual and applied reliably across nations.', '<p>Coding is the procedure by which an individual scientist takes a snippet of data from enactment, strategy, or some other source and makes an interpretation of it into a lot of attributes that can be quantitatively investigated. For every nation, two specialists from our multilingual group coded information sources freely as indicated by pre-characterized coding rules and contrasted their outcomes with guarantee precision. At whatever point coding required an informed decision by the coder, the guidelines basic such choices were talked about, efficiently portrayed in a coding manual and applied reliably across nations.</p>', '07-10-2022-110537.jpg', 1, 1, '2022-10-06', '2022-10-11', '1002', '800', 1, NULL, '2022-10-07 06:05:37', '2022-10-07 07:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `description`, `icon`, `thumbnail`, `is_featured`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Development', 'development', 'Lorem ipsum', '<i class=\"fa fa-connectdevelop\"></i>', '26-09-2022-074349.jpg', 1, 1, NULL, '2022-09-23 13:08:27', '2022-09-28 04:30:25'),
(2, NULL, 'Health & Fitness', 'health-fitness', 'Lorem ipsum', '<i class=\"fa fa-heartbeat\"></i>', '26-09-2022-074339.jpg', 0, 1, NULL, '2022-09-23 13:09:20', '2022-09-26 02:43:39'),
(3, NULL, 'Lifestyle', 'lifestyle', 'Lorem ipsum', '<i class=\"fa fa-yelp\"></i>', '26-09-2022-074327.jpg', 0, 1, NULL, '2022-09-23 13:15:11', '2022-09-26 02:43:27'),
(4, NULL, 'Music', 'music', 'Lorem ipsum', '<i class=\"fa fa-music\"></i>', '26-09-2022-074311.jpg', 0, 1, NULL, '2022-09-23 13:15:40', '2022-09-26 02:43:11'),
(5, NULL, 'Design', 'design', 'Lorem ipsum', '<i class=\"fa fa-slideshare\"></i>', '26-09-2022-074256.jpg', 0, 1, NULL, '2022-09-23 13:16:46', '2022-09-26 02:42:56'),
(6, NULL, 'Photography', 'photography', 'Lorem ipsum', '<i class=\"fa fa-file-photo-o\"></i>', '26-09-2022-074106.jpg', 0, 1, NULL, '2022-09-23 13:17:24', '2022-09-26 02:41:06'),
(7, 1, 'Web Development', 'web-development', 'lorem ipsum', '<i class=\"fa fa-codepen rgt-20\"></i>', NULL, 0, 1, NULL, '2022-09-23 14:07:56', '2022-09-23 14:07:56'),
(8, 7, 'All Web Devlopment', 'all-web-development', 'All Web Devlopment', '<i class=\"fa fa-language rgt-20\"></i>', NULL, 0, 1, NULL, '2022-09-23 14:31:09', '2022-09-23 14:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `state_id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Karachi', 1, NULL, '2022-09-27 07:10:39', '2022-09-27 07:18:57'),
(2, 1, 1, 'Hyderabad', 1, NULL, '2022-09-27 07:10:54', '2022-09-27 07:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `country_code`, `currency`, `currency_symbol`, `description`, `flag`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Pakistan', 'PAK', NULL, NULL, NULL, '27-09-2022-105012.jpg', 1, NULL, '2022-09-27 05:37:36', '2022-09-27 05:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `courseannouncements`
--

CREATE TABLE `courseannouncements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `announcement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courseannouncements`
--

INSERT INTO `courseannouncements` (`id`, `course_id`, `announcement`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 11, 'tesetd -updated', 1, '2022-10-06 14:39:02', '2022-10-06 09:38:42', '2022-10-06 09:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `coursechapters`
--

CREATE TABLE `coursechapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coursechapters`
--

INSERT INTO `coursechapters` (`id`, `course_id`, `name`, `file`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 11, 'Student', NULL, 0, NULL, '2022-10-05 03:28:05', '2022-10-05 03:28:05'),
(2, 11, 'Amar', NULL, 0, NULL, '2022-10-05 03:28:16', '2022-10-05 08:07:16'),
(3, 11, 'Employee', NULL, 1, NULL, '2022-10-05 03:36:23', '2022-10-05 07:46:42'),
(4, 11, 'Jackson', NULL, 1, NULL, '2022-10-05 03:36:35', '2022-10-05 07:50:51'),
(5, 11, 'Employee updated', NULL, 0, '2022-10-05 09:03:12', '2022-10-05 03:37:27', '2022-10-05 04:03:12'),
(6, 11, 'Amarchand', NULL, 0, '2022-10-05 09:03:01', '2022-10-05 03:38:40', '2022-10-05 04:03:01'),
(8, 11, 'Amar', NULL, 0, '2022-10-05 08:47:28', '2022-10-05 03:39:34', '2022-10-05 03:47:28'),
(9, 11, 'Amar', NULL, 0, '2022-10-05 08:47:25', '2022-10-05 03:41:19', '2022-10-05 03:47:25'),
(10, 11, 'tested', NULL, 0, '2022-10-05 08:47:22', '2022-10-05 03:47:18', '2022-10-05 03:47:22'),
(11, 11, 'test', NULL, 1, '2022-10-05 14:25:34', '2022-10-05 09:25:25', '2022-10-05 09:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `courseclasses`
--

CREATE TABLE `courseclasses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `chapter_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lecture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lecture_duration` time DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courseclasses`
--

INSERT INTO `courseclasses` (`id`, `course_id`, `chapter_id`, `title`, `detail`, `type`, `attachment`, `lecture`, `lecture_duration`, `is_featured`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 11, 2, 'Ipsam aperiam sint', 'Dolore a do ut molli', 'Pdf / Powerpoint / Notepad', NULL, NULL, '13:05:00', 0, 0, NULL, '2022-10-06 05:50:06', '2022-10-06 05:50:06'),
(2, 11, 4, 'Ipsam aperiam sint-updated', 'Dolore a do ut molli-updated', 'Video', NULL, '06-10-2022-130231.webm', '01:06:00', 0, 0, NULL, '2022-10-06 08:02:31', '2022-10-06 08:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `courseincludes`
--

CREATE TABLE `courseincludes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courseincludes`
--

INSERT INTO `courseincludes` (`id`, `course_id`, `icon`, `detail`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 11, '<i class=\"fa fa-university\" aria-hidden=\"true\"></i>', 'teted', 1, NULL, '2022-10-05 02:07:11', '2022-10-05 08:05:01'),
(2, 11, '<i class=\"fa fa-window-restore\" aria-hidden=\"true\"></i>', 'Quisquam libero veri--90', 0, '2022-10-05 14:24:41', '2022-10-05 09:24:25', '2022-10-05 09:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `coursequestions`
--

CREATE TABLE `coursequestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coursequestions`
--

INSERT INTO `coursequestions` (`id`, `course_id`, `question`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 11, 'Pariatur Autem sequ updated ?', 1, NULL, '2022-10-06 01:11:57', '2022-10-06 01:39:03'),
(2, 11, 'Eius occaecat offici-updated', 0, '2022-10-06 14:38:31', '2022-10-06 09:38:02', '2022-10-06 09:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `instructor_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `retail_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=paid 0=free',
  `is_featured` tinyint(1) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `created_by`, `instructor_slug`, `institute_slug`, `category_slug`, `title`, `slug`, `retail_price`, `discount_type`, `discount`, `price`, `short_description`, `requirements`, `full_description`, `is_paid`, `is_featured`, `thumbnail`, `video_url`, `video`, `duration`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 11, 'claire-robertson-8u', 'justina-moon', 'development', 'Travel Hacking -Smart & Fun Travel', 'travel-hacking-smart-fun-travel', NULL, NULL, NULL, '2.00', '60+ World Travel Tips: Cheap Travel. Fear of Flying. Travel Motivation & Safety. Negotiation. Social Success Abroad.', '<ul>\r\n	<li>Find the approaches to kill dejection and dread of voyaging and plan your movement for an astonishing travel encounters at a reasonable expense. The course will tell you the best way to deal with your cash and deal with your consumption effectively so you are never stuck anyplace with no cash during movement.</li>\r\n</ul>', '<p>At that point the course will cover how to discover nearby gatherings to hang out, neighborhood occasions to go to anyplace on the planet, how to meet different explorers simply like you, how to go to astonishing occasions that will transform yourself at a reasonable cost anyplace on the planet. Figure out how to get 100% confided in nearby astounding independently directed visits that you can do without anyone else in any piece of the world, stunning ventures applications to use to grow your voyaging experience, how to discover explicit concentrated data on neighborhood mystery occasions, and how to discover astonishing free nature areas around the globe to unwind in. We at that point proceed onward to the tips on the most proficient method to make durable fellowships with different voyagers. Likewise, something that many individuals don&#39;t consider is dating while at the same time voyaging. Well here in this course, we will cover the most ideal approaches to date while voyaging. You will find the probably the best dating applications. We need you can concentrate on movement first and dating second.</p>', 1, NULL, '25-09-2022-114104.jpg', NULL, NULL, NULL, 1, NULL, '2022-09-25 06:41:04', '2022-09-25 06:41:04'),
(2, 11, 'claire-robertson-8u', 'zane-stuart', 'health-fitness', 'The Nail Art Tutorial - Modern Nail Designs', 'the-nail-art-tutorial-modern-nail-designs', NULL, NULL, NULL, '1000', 'Learn by creating amazing nail designs, create gorgeous GEL manicures and start your own nail business from home.', '<ul>\r\n	<li>In this course I will utilize stepping pack, acrylic hues, gel painting, hued gels and that&#39;s just the beginning. Subsequent to taking an interest in this course you will be capable, contingent upon the ability and expertise of every one, to make uncommon nail structures, to create and improve your aptitudes . Much obliged to you for your time and I trust this course will support you and fulfill e&nbsp;very one of your interests.</li>\r\n</ul>', '<p>This course incorporates an assortment of data to assist you with staying aware of nail workmanship news. At this course are welcome the two novices and propelled, the vital fixings are just the energy and the longing to learn. I will present and I will clarify in detail the materials we will brighten with, yet in addition all the important strides to finish the nail structure. In this course I will utilize stepping pack, acrylic hues, gel painting, hued gels and that&#39;s just the beginning. Subsequent to taking an interest in this course you will be capable, contingent upon the ability and expertise of every one, to make uncommon nail structures, to create and improve your aptitudes . Much obliged to you for your time and I trust this course will support you and fulfill every one of your interests.</p>', 1, NULL, '25-09-2022-125129.jpg', NULL, NULL, NULL, 1, NULL, '2022-09-25 07:51:29', '2022-09-25 07:51:29'),
(5, 11, 'claire-robertson-8u', 'madison-mcgowan', 'lifestyle', 'Hair styling- The Ultimate Hair Course', 'hair-styling-the-ultimate-hair-course', NULL, NULL, NULL, '1200', 'You won\'t visit a hairdresser again! Cut, dye and style your hair yourself at home.', '<ul>\r\n	<li>Next, how about we talk about the apparatuses and the correct temperature to make solid twists. We are completing with a hair obsession. A large number of brands and varnishes. Be that as it may, many don&#39;t hold hair and make dust. Subsequently, the styling is messy.</li>\r\n</ul>', '<p>Voluminous, solid twists without backcombing/prodding or pleating, even the biggest length. Is it accurate to say that you are longing for radiant twists and a huge volume? However, your customers fear prodding or pleating... I know it all about twists. What&#39;s more, in this exercise I sincerely share every one of the privileged insights. You even didn&#39;t feel that everything is so straightforward. Anybody with any degree of preparing can ace the abilities. I will tell about hair arrangement. This is the most significant advance. Skirting this specific advance, you are committing a gross error.</p>', 1, 1, '25-09-2022-143913.jpg', NULL, NULL, NULL, 1, NULL, '2022-09-25 09:39:13', '2022-09-25 09:39:13'),
(6, 27, 'claire-robertson-8u', 'justina-moon', 'music', 'Art & Science of Drawing- Ultimate Drawing Course', 'art-science-of-drawing-ultimate-drawing-course', NULL, NULL, NULL, '1000', 'A comprehensive video and ebook course designed for people wanting to learn the core concepts of drawing.', '<p>This top of the line course is currently far and away superior with new substance as of late included just as improved picture and sound. This refreshed adaptation of the course currently incorporates long stretches of reward drawing exhibits that will tell you the best way to apply your new attracting abilities to a wide scope of topic including botanicals and feathered creatures. There&#39;s even a&nbsp;prologue to essential figure drawing.</p>', '<p>The Art and Science of Drawing is an exceptional program that will show you how to draw each day in turn. The program is straightforward, every day you&#39;ll watch one video exercise that will present a fundamental drawing ability, and afterward do the prescribed practice. The Art and Science of Drawing is flooding with ground-breaking bits of knowledge into the drawing procedure and offers the absolute most clear, most open drawing guidance accessible. A large number of the apparatuses and strategies you&#39;ll learn here are once in a while observed outside of private workmanship institutes. This course is enthusiastically suggested for anybody keen on painting too. Most ace painters concur that drawing is a key and fundamental expertise for all painters. Essential SKILLS is the ideal introduction for anybody needing to figure out how to draw. The abilities you&#39;ll learn here will significantly improve your specialty and configuration regardless of what medium you work in.</p>', 1, 1, '25-09-2022-144244.jpg', NULL, NULL, NULL, 1, NULL, '2022-09-25 09:42:44', '2022-09-25 09:42:44'),
(7, 11, 'claire-robertson-8u', 'justina-moon', 'music', 'Guitar System - Ultimate Masterclass', 'guitar-system-ultimate-masterclass', NULL, NULL, NULL, '800', 'Beginner guitar lessons. Go from knowing nothing about the guitar and learn to play songs everbody loves in just weeks', '<ul>\r\n	<li>Each tune exercise accompanies a play-along highlight, so after you&#39;re finished learning the melody, I play it with you at a moderate and agreeable rhythm, and you&#39;ll generally have a simple time placing it into viable use. The course additionally accompanies a 42-page picture harmony book, so you&#39;ll have a simple time tracking with every one of the exercises.</li>\r\n</ul>', '<p>Envision whenever somebody requests that you get the guitar at a family assembling and NOW you can play melodies everybody knows and appreciates easily and certainty. You&#39;ll be the star at the gathering and everybody will adore you for it! After you join this course, you won&#39;t have to envision any longer. I make you stride by-step and note-by-note through every one of the components expected to make this a reality in an exceptionally short measure of time!!!</p>', 1, NULL, '25-09-2022-144450.jpg', NULL, NULL, NULL, 1, NULL, '2022-09-25 09:44:50', '2022-09-25 09:44:50'),
(8, 11, 'claire-robertson-8u', 'justina-moon', 'design', 'SQL: Learn SQL for data analysis', 'sql-learn-sql-for-data-analysis', NULL, NULL, NULL, '1000', 'Step by Step SQL with MySQL Database for Beginners, Non-Techs, newbs - Quick way to learn SQL using MySQL Database', '<p>You needn&#39;t bother with long stretches of talks to learn SQL and MySQL, that is actually how I moved toward this course. I blended the data so it is snappy and straightforward. In this course I have rearranged the procedure without getting into all the perplexing specialized stand up so anyone can learn SQL. This course is intended to make each progression straightforward. I utilized similar t&nbsp;echniques that I use to show business experts and advertising investigators in my very own gathering.</p>', '<p>This is a novice level course. On the off chance that you have earlier information on SQL than this course may fill in as boost yet won&#39;t show you many propelled ideas. Why you ought to gain from me? I have been in Digital Marketing and Analytics for more than 15 years. I have prepared individuals from various foundations and have changed over them into high performing Digital Marketers and Analysts. I comprehend both the innovation and promoting side of business. I have managed numerous investigation advancements path before Google Tag chief existed and know the inward working of Digital Analytics. Likewise, I have created different course and showed understudies from everywhere throughout the world. I am online educator for University of British Columbia (Canada), University of Washington (USA), Bellevue College (USA) and Digital Analytics Association.</p>', 1, NULL, '25-09-2022-144657.jpg', NULL, NULL, NULL, 1, NULL, '2022-09-25 09:46:57', '2022-09-25 09:46:57'),
(9, 11, 'claire-robertson-8u', 'justina-moon', 'design', 'The Mordern JavaScript - The Complete Guide', 'the-mordern-javascript-the-complete-guide', NULL, NULL, NULL, '1000', 'Modern JavaScript from the beginning - all the way up to JS expert level! THE must-have JavaScript resource in 2020.', '<p>This is the most far reaching and present day course you can discover on JavaScript - it depends on all my JavaScript information AND educating experience. It&#39;s both a total guide, beginning with the center essentials of the language, just as a broad reference of the JavaScript language and condition, guaranteeing that the two newcomers just as experienced JavaScript designers get a great deal out&nbsp;of this course!</p>', '<p>It&#39;s an enormous course since it&#39;s stuffed with significant information and supportive substance. From the center nuts and bolts, over cutting edge ideas and JavaScript strengths, as far as possible up to master points like execution enhancement and testing - this course has everything. My objective was to make your go-to asset for the JavaScript language, which you can use for learning it as well as an asset you can return to and look into significant themes. The course depends on my experience as a long haul JavaScript engineer just as an instructor with in excess of 1,000,000 understudies on Udemy just as on my YouTube channel Academind. It&#39;s stuffed with models, demos, ventures, assignments, tests and obviously recordings - all with the objective of giving you the most ideal method for learning JavaScript.</p>', 1, NULL, '25-09-2022-144841.jpg', NULL, NULL, NULL, 1, NULL, '2022-09-25 09:48:41', '2022-09-25 09:48:41'),
(10, 11, 'claire-robertson-8u', 'justina-moon', 'photography', 'The Complete Web Developer Bootcamp', 'the-complete-web-developer-bootcamp', NULL, NULL, NULL, '1500', 'The only course you need to learn web development - HTML, CSS, JS, Node, and More!', '<ul>\r\n	<li>94% of my in-person bootcamp understudies proceed to land full-time engineer positions. The vast majority of them are finished apprentices when I start working with them. The past 2 bootcamp programs that I showed cost $14,000 and $21,000. This course is similarly as extensive however with spic and span content at a small amount of the cost.</li>\r\n</ul>', '<p>This is the main complete tenderfoot full-stack designer course that spreads NodeJS. We assemble 13+ activities, including a monstrous generation application called YelpCamp. No other course strolls you through the formation of such a generous application. The course is continually refreshed with new substance, ventures, and modules. Consider it a membership to a ceaseless inventory of designer preparing. You find a good pace hound Rusty! At the point when you&#39;re figuring out how to program you frequently need to forfeit learning the energizing and current advances for the &quot;apprentice amicable&quot; classes. With this course, you outwit the two universes. This is a course intended for the total tenderfoot, yet it covers the absolute generally energizing and important themes in the business.</p>', 1, NULL, '25-09-2022-145027.jpg', NULL, NULL, NULL, 1, NULL, '2022-09-25 09:50:27', '2022-09-25 09:50:27'),
(11, 11, 'claire-robertson-8u', 'melinda-tillman', 'lifestyle', 'Culpa velit volupta', 'culpa-velit-volupta', '400', 'fix', '10', '390', 'In et laboris soluta', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 1, 1, '29-09-2022-132330.jpg', 'https://www.youtube.com/watch?v=d_TG77u6-AU', NULL, '16:37:00', 1, NULL, '2022-09-29 08:23:30', '2022-09-29 08:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `course_tags`
--

CREATE TABLE `course_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_tags`
--

INSERT INTO `course_tags` (`id`, `course_id`, `tag`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', '2022-09-25 06:41:04', '2022-09-25 06:41:04'),
(2, 2, 'trending,onsale', '2022-09-25 07:51:29', '2022-09-25 07:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `facts`
--

CREATE TABLE `facts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facts`
--

INSERT INTO `facts` (`id`, `image`, `title`, `counter`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '24-09-2022-063553.png', 'Skilliful Instructor', 78, 'Start learning from experienced instructors', 1, NULL, '2022-09-24 01:35:53', '2022-09-24 01:45:27'),
(2, '24-09-2022-064729.png', 'Happy Student', 16, 'Enrolled in our classes and improved their skills.', 1, NULL, '2022-09-24 01:47:29', '2022-09-24 01:47:29'),
(3, '24-09-2022-064813.png', 'Live Classes', 20, 'Improve your skills using live knowledge flow.', 1, NULL, '2022-09-24 01:48:13', '2022-09-24 01:48:13'),
(4, '24-09-2022-064842.png', 'Video', 98, 'Learn without any geographical & time limitations.', 1, NULL, '2022-09-24 01:48:42', '2022-09-24 01:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `follower_id` bigint(20) DEFAULT NULL,
  `following_id` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affilated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`id`, `logo`, `name`, `slug`, `email`, `mobile`, `skill`, `address`, `affilated_by`, `about`, `is_verified`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '28-09-2022-123318.jpg', 'Alea Key', 'alea-key', 'jetina@mailinator.com', 'Architecto voluptate', '[\"Numquam aute eum et\"]', 'Deserunt non impedit', 'Repellendus Dolorem', '<p>tested</p>', 1, 1, NULL, '2022-09-28 06:26:17', '2022-09-28 07:50:06'),
(2, '28-09-2022-123403.jpg', 'Melinda Tillman', 'melinda-tillman', 'fymibydeb@mailinator.com', 'Illo ullamco qui lib', '[\"Necessitatibus et ne\"]', 'In vero in eos ut u', 'Consequat Laboris a', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 0, 1, NULL, '2022-09-28 07:34:03', '2022-09-28 07:50:24'),
(3, '28-09-2022-123419.jpg', 'Justina Moon', 'justina-moon', 'cafemuxop@mailinator.com', 'Est vel eum doloremq', '[\"Repudiandae enim mol\"]', 'Ut id ipsum qui vol', 'Commodo dolor quaera', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 0, 1, NULL, '2022-09-28 07:34:19', '2022-09-28 08:39:10'),
(4, '28-09-2022-123435.jpg', 'Madison Mcgowan', 'madison-mcgowan', 'ziweti@mailinator.com', 'Tempor ut eveniet s', '[\"Atque est esse null\"]', 'Placeat quia laboru', 'Veniam placeat eve', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 0, 1, NULL, '2022-09-28 07:34:35', '2022-09-28 07:49:57'),
(5, '28-09-2022-123446.jpg', 'Zane Stuart', 'zane-stuart', 'qoxepa@mailinator.com', 'Mollitia dolores ea', '[\"Minus voluptates in\"]', 'Tempore rerum eos e', 'Laudantium quo quam', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</p>', 1, 0, NULL, '2022-09-28 07:34:46', '2022-09-28 07:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `learnings`
--

CREATE TABLE `learnings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learnings`
--

INSERT INTO `learnings` (`id`, `icon`, `label`, `message`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '<i class=\"fa fa-anchor\"></i>', 'Learn Anytime, Anywhere', 'Online Courses for Creative', 1, NULL, '2022-09-23 15:24:14', '2022-09-23 15:24:14'),
(2, '<i class=\"fa fa-magic\"></i>', 'Beacome a researcher', 'Improve Your Skills Online', 1, NULL, '2022-09-23 15:25:32', '2022-09-23 15:25:32'),
(3, '<i class=\"fa fa-graduation-cap\"></i>', 'Most Popular Courses', 'Learn on your schedule', 1, NULL, '2022-09-23 15:26:03', '2022-09-23 15:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_of` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_of`, `parent_id`, `menu`, `icon`, `label`, `url`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'admin', NULL, 'Page', '<i class=\"fa fa-cogs\" aria-hidden=\"true\"></i>', 'Settings', 'admin/page', 1, NULL, '2022-05-28 05:52:24', '2022-05-28 08:23:44'),
(3, 'admin', NULL, 'Role', '<i class=\"fa fa-random\" aria-hidden=\"true\"></i>', 'Roles', 'admin/role', 1, NULL, '2022-05-28 05:52:56', '2022-05-28 08:10:57'),
(4, 'admin', NULL, 'Menu', '<i class=\"fa fa-tasks\" aria-hidden=\"true\"></i>', 'Menus', 'admin/menu', 1, NULL, '2022-05-28 06:58:49', '2022-05-28 08:07:58'),
(42, 'admin', NULL, 'slider', '<i class=\"fa fa-sliders\" aria-hidden=\"true\"></i>', 'Slider', 'admin/slider', 1, NULL, NULL, NULL),
(43, 'admin', NULL, 'category', '<i class=\"fa fa-transgender-alt\" aria-hidden=\"true\"></i>', 'All Categories', 'admin/category', 1, NULL, NULL, NULL),
(46, 'admin', NULL, 'learning', '<i class=\"fa fa-meetup\" aria-hidden=\"true\"></i>', 'Learning Labels', 'admin/learning', 1, NULL, NULL, NULL),
(48, 'admin', NULL, 'fact', '<i class=\"fa fa-free-code-camp\" aria-hidden=\"true\"></i>', 'All Facts', 'admin/fact', 1, NULL, NULL, NULL),
(52, 'admin', NULL, 'course', '<i class=\"fa fa-snowflake-o\" aria-hidden=\"true\"></i>', 'All Courses', 'admin/course', 1, NULL, NULL, NULL),
(54, 'admin', NULL, 'blog', '<i class=\"fa fa-clipboard\" aria-hidden=\"true\"></i>', 'All Blogs', 'admin/blog', 1, NULL, NULL, NULL),
(57, 'admin', NULL, 'trustcompany', '<i class=\"fa fa-building\" aria-hidden=\"true\"></i>', 'All Trusted Companies', 'admin/trustcompany', 1, NULL, NULL, NULL),
(60, 'admin', NULL, 'country', '<i class=\"fa fa-globe\" aria-hidden=\"true\"></i>', 'All Countries', 'admin/country', 1, NULL, NULL, NULL),
(62, 'admin', NULL, 'state', '<i class=\"fa fa-window-restore\" aria-hidden=\"true\"></i>', 'All States', 'admin/state', 1, NULL, NULL, NULL),
(63, 'admin', NULL, 'city', '<i class=\"fa fa-window-restore\" aria-hidden=\"true\"></i>', 'All Cities', 'admin/city', 1, NULL, NULL, NULL),
(64, 'admin', NULL, 'userprofile', '<i class=\"fa fa-user-secret\" aria-hidden=\"true\"></i>', 'All Users', 'admin/userprofile', 1, NULL, NULL, NULL),
(66, 'admin', NULL, 'institute', '<i class=\"fa fa-university\" aria-hidden=\"true\"></i>', 'All Instittutes', 'admin/institute', 1, NULL, NULL, NULL),
(68, 'admin', NULL, 'courseinclude', '<i class=\"fa fa-window-maximize\" aria-hidden=\"true\"></i>', 'Course Includes', 'admin/courseinclude', 1, NULL, NULL, NULL),
(69, 'admin', NULL, 'whatlearn', '<i class=\"fa fa-microchip\" aria-hidden=\"true\"></i>', 'WhatLearns', 'admin/whatlearn', 1, NULL, NULL, NULL),
(70, 'admin', NULL, 'coursechapter', '<i class=\"fa fa-book\" aria-hidden=\"true\"></i>', 'Course Chapters', 'admin/coursechapter', 1, NULL, NULL, NULL),
(71, 'admin', NULL, 'courseclass', '<i class=\"fa fa-credit-card-alt\" aria-hidden=\"true\"></i>', 'Course Classes', 'admin/courseclass', 1, NULL, NULL, NULL),
(76, 'admin', NULL, 'coursequestion', '<i class=\"fa fa-bell-o\" aria-hidden=\"true\"></i>', 'Course Question & Answers', 'admin/coursequestion', 1, NULL, NULL, NULL),
(77, 'admin', NULL, 'courseannouncement', '<i class=\"fa fa-bullhorn\" aria-hidden=\"true\"></i>', 'Course Announcements', 'admin/courseannouncement', 1, NULL, NULL, NULL),
(78, 'admin', NULL, 'follower', '<i class=\"fa fa-users\" aria-hidden=\"true\"></i>', 'Followers', 'admin/follower', 1, NULL, NULL, NULL),
(79, 'admin', NULL, 'wishlist', '<i class=\"fa fa-heart\" aria-hidden=\"true\"></i>', 'WishList', 'admin/wishlist', 1, NULL, NULL, NULL),
(80, 'admin', NULL, 'bundle', '<i class=\"fa fa-snowflake-o\" aria-hidden=\"true\"></i>', 'Course Bundles', 'admin/bundle', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2022_03_14_084656_create_pages_table', 1),
(6, '2022_03_14_143426_create_page_settings_table', 1),
(7, '2022_05_14_165852_create_permission_tables', 1),
(8, '2022_05_14_193534_create_menus_table', 1),
(9, '2022_09_23_020938_create_sliders_table', 2),
(10, '2022_09_23_055619_create_categories_table', 3),
(11, '2022_09_23_081845_create_learnings_table', 4),
(13, '2022_09_24_062614_create_facts_table', 5),
(18, '2022_09_24_100237_create_course_tags_table', 9),
(19, '2022_09_24_080939_create_courses_table', 10),
(22, '2022_09_25_043046_create_blogs_table', 12),
(26, '2022_09_25_060110_create_trustcompanies_table', 13),
(28, '2022_09_27_102419_create_countries_table', 15),
(29, '2022_09_27_112315_create_states_table', 16),
(31, '2022_09_27_114502_create_cities_table', 17),
(33, '2022_09_27_124239_create_userprofiles_table', 18),
(35, '2022_09_28_105117_create_institutes_table', 19),
(37, '2022_09_30_055602_create_courseincludes_table', 20),
(39, '2022_10_05_055826_create_whatlearns_table', 21),
(41, '2022_10_05_074442_create_coursechapters_table', 22),
(46, '2022_10_05_022031_create_coursequestions_table', 24),
(48, '2022_10_06_064941_create_courseannouncements_table', 25),
(49, '2022_10_06_093722_create_followers_table', 26),
(50, '2022_10_05_091137_create_courseclasses_table', 27),
(51, '2022_10_07_055443_create_wishlists_table', 28),
(52, '2022_10_07_074240_create_bundles_table', 29);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 27),
(3, 'App\\Models\\User', 31),
(4, 'App\\Models\\User', 34),
(4, 'App\\Models\\User', 35),
(4, 'App\\Models\\User', 36),
(4, 'App\\Models\\User', 37);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_settings`
--

CREATE TABLE `page_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin', 'Admin', 1, NULL, NULL, NULL),
(3, 'Instructor', 'web', 'Lorem ipsum', 1, NULL, '2022-09-28 02:08:37', '2022-09-28 02:08:37'),
(4, 'Student', 'web', 'lorem ipsum', 1, NULL, '2022-09-28 02:09:17', '2022-09-28 02:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `created_by`, `title`, `sub_title`, `description`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 11, 'Learn Any Time', 'Learn Whatever, Whenever, However', 'Online Classes', '23-09-2022-173850.jpg', 1, NULL, '2022-09-23 12:38:50', '2022-09-23 12:38:50'),
(2, 11, 'Learn Smart Online', 'Become a better researcher', 'Online Classes', '23-09-2022-173949.jpg', 1, NULL, '2022-09-23 12:39:49', '2022-09-23 12:39:49'),
(3, 11, 'Online Courses', 'Explore a variety of fresh topics', 'Search online, Explore online', '23-09-2022-174122.jpg', 1, NULL, '2022-09-23 12:41:22', '2022-09-23 12:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sindh', 'Lorem ipsm', 1, NULL, '2022-09-27 06:36:18', '2022-09-27 06:36:18'),
(2, 1, 'KPK', 'Lorem ipsm', 1, NULL, '2022-09-27 06:36:50', '2022-09-27 06:36:50'),
(3, 1, 'Balochistan', 'Lorem ipsm', 1, NULL, '2022-09-27 06:37:04', '2022-09-27 06:37:04'),
(4, 1, 'Punjab', 'Lorem ipsm', 1, NULL, '2022-09-27 06:37:18', '2022-09-27 06:37:18'),
(5, 1, 'Gilgit baltistan', 'lorem ipsum', 1, NULL, '2022-09-27 06:37:55', '2022-09-27 06:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `trustcompanies`
--

CREATE TABLE `trustcompanies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trustcompanies`
--

INSERT INTO `trustcompanies` (`id`, `name`, `description`, `website_link`, `logo`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'LOGO TEXT', 'Distinctio Quam nat', 'https://www.youtube.com/', '26-09-2022-063754.jpg', 1, NULL, '2022-09-25 13:15:04', '2022-09-26 02:02:30'),
(2, 'LOREM IPSUM', 'lorem ipsum', 'https://www.google.com/', '26-09-2022-063854.jpg', 1, NULL, '2022-09-26 01:38:54', '2022-09-26 02:02:04'),
(3, 'Company', 'lorem ipsum', 'https://www.youtube.com/', '26-09-2022-063935.jpg', 1, NULL, '2022-09-26 01:39:35', '2022-09-26 02:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `userprofiles`
--

CREATE TABLE `userprofiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `state_id` bigint(20) DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linked_in_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userprofiles`
--

INSERT INTO `userprofiles` (`id`, `country_id`, `state_id`, `city_id`, `user_id`, `first_name`, `last_name`, `mobile`, `address`, `profile_image`, `resume`, `facebook_url`, `twitter_url`, `youtube_url`, `linked_in_url`, `details`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 27, 'Claire', 'Robertson', '23432432432', 'Et quidem laudantium', '28-09-2022-081749.jpg', NULL, 'Non earum aliquam re', 'Tenetur ducimus exe', 'Modi in et nisi quis', 'Ipsum aliqua Totam', '<p>tested</p>', 1, NULL, '2022-09-28 02:15:54', '2022-09-28 03:40:20'),
(2, NULL, NULL, NULL, 31, 'Alyssa', 'Chan', '123456789', NULL, '08-10-2022-064450.png', '08-10-2022-064450.pdf', NULL, NULL, NULL, NULL, 'Ea cum adipisicing c', 1, NULL, '2022-10-08 01:44:50', '2022-10-08 01:44:50'),
(3, NULL, NULL, NULL, 34, 'Cassandra', 'Salas', '1234565432', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-10-08 02:17:22', '2022-10-08 02:17:22'),
(4, NULL, NULL, NULL, 35, 'Moana', 'Massey', '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-10-08 02:19:43', '2022-10-08 02:19:43'),
(5, NULL, NULL, NULL, 36, 'Lesley', 'Rogers', '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-10-08 02:20:48', '2022-10-08 02:20:48'),
(6, NULL, NULL, NULL, 37, 'Duncan', 'Rodgers', '98789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-10-08 02:21:27', '2022-10-08 02:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `is_featured`, `is_verified`, `created_at`, `updated_at`) VALUES
(11, 'Admin', 'admin-ad', 'admin@gmail.com', NULL, '$2y$10$qyWbBZDGI/2z6iYevWZqzOczsUscw6aZI5S.Fb5i3gG0NgTnINnku', NULL, 0, 0, 0, '2022-09-23 09:04:12', '2022-09-23 09:04:12'),
(27, 'Claire Robertson', 'claire-robertson-8u', 'wotovon@mailinator.com', NULL, '$2y$10$j1FUL1F9dJn.KhLzilFfkuMN81z2WmyeqN.FecAm14mG/E65feEVW', NULL, 1, 0, 0, '2022-09-28 02:15:54', '2022-09-28 03:20:27'),
(31, 'Alyssa Chan', 'alyssa-chan-6z', 'sosaqexem@mailinator.com', NULL, '$2y$10$xvylyQ9o9D7RfjzWmOlEBeU7rklIHpPZCp/U9Caj10ZrUduQW9pFm', NULL, 0, 0, 0, '2022-10-08 01:44:50', '2022-10-08 01:44:50'),
(34, 'Cassandra Salas', 'cassandra-salas-gr', 'tofa@mailinator.com', NULL, '$2y$10$5zw5ApYlXgqHiGbo5F43p.hxh8kIUglllczfSMas5VAlEPm1YsuPO', NULL, 0, 0, 0, '2022-10-08 02:17:22', '2022-10-08 02:17:22'),
(35, 'Moana Massey', 'moana-massey-pa', 'wamicyro@mailinator.com', NULL, '$2y$10$5ZQ4h3S9UwL0juNh/SzXbOKda3QPnrTk9215XDafuSgIk8wHwdNAC', NULL, 0, 0, 0, '2022-10-08 02:19:43', '2022-10-08 02:19:43'),
(36, 'Lesley Rogers', 'lesley-rogers-e0', 'gyhyxeqot@mailinator.com', NULL, '$2y$10$P0HDy02MKz2qsgqH/0bQxOQl/zeTtv5nVhsVGVxGUaGzuKvgiSVfy', NULL, 0, 0, 0, '2022-10-08 02:20:48', '2022-10-08 02:20:48'),
(37, 'Duncan Rodgers', 'duncan-rodgers-dq', 'cujyz@mailinator.com', NULL, '$2y$10$mQAwYlBwLP7yS3/bC8qS7.kHQ6IoME4CyayuBgAxgeCVe4bFeG7WO', NULL, 0, 0, 0, '2022-10-08 02:21:27', '2022-10-08 02:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `whatlearns`
--

CREATE TABLE `whatlearns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whatlearns`
--

INSERT INTO `whatlearns` (`id`, `course_id`, `detail`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 11, 'test', 1, '2022-10-05 07:09:34', '2022-10-05 01:19:05', '2022-10-05 02:09:34'),
(2, 11, 'tyuo-op', 1, '2022-10-05 06:53:55', '2022-10-05 01:23:35', '2022-10-05 01:53:55'),
(3, 11, 'tested -updated', 1, '2022-10-05 06:50:10', '2022-10-05 01:24:54', '2022-10-05 01:50:10'),
(4, 11, 'tested', 0, '2022-10-05 06:39:43', '2022-10-05 01:31:31', '2022-10-05 01:39:43'),
(5, 11, 'testedd ad', 0, '2022-10-05 06:38:59', '2022-10-05 01:32:44', '2022-10-05 01:38:59'),
(6, 11, 'tetsedrf', 1, '2022-10-05 06:38:51', '2022-10-05 01:34:25', '2022-10-05 01:38:51'),
(7, 11, 'rwarws upsRWS', 0, '2022-10-05 07:08:19', '2022-10-05 02:08:04', '2022-10-05 02:08:19'),
(8, 11, 'TESTED amar', 0, NULL, '2022-10-05 02:09:47', '2022-10-05 02:33:19'),
(9, 11, 'TESTE 2 tesd tedd ho', 1, '2022-10-05 07:33:12', '2022-10-05 02:09:52', '2022-10-05 02:33:12'),
(10, 11, 'TESTE 3 ted tesd c g', 0, '2022-10-05 07:32:59', '2022-10-05 02:09:58', '2022-10-05 02:32:59'),
(11, 11, 'TESTE 4 UPDATED b', 0, '2022-10-05 07:32:38', '2022-10-05 02:10:03', '2022-10-05 02:32:38'),
(12, 11, 'Itaque voluptates fu', 0, NULL, '2022-10-05 09:24:59', '2022-10-05 09:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `live_meeting_id` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bundles`
--
ALTER TABLE `bundles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseannouncements`
--
ALTER TABLE `courseannouncements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursechapters`
--
ALTER TABLE `coursechapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseclasses`
--
ALTER TABLE `courseclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseincludes`
--
ALTER TABLE `courseincludes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursequestions`
--
ALTER TABLE `coursequestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tags`
--
ALTER TABLE `course_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facts`
--
ALTER TABLE `facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learnings`
--
ALTER TABLE `learnings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_settings`
--
ALTER TABLE `page_settings`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trustcompanies`
--
ALTER TABLE `trustcompanies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userprofiles`
--
ALTER TABLE `userprofiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `whatlearns`
--
ALTER TABLE `whatlearns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bundles`
--
ALTER TABLE `bundles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courseannouncements`
--
ALTER TABLE `courseannouncements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coursechapters`
--
ALTER TABLE `coursechapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courseclasses`
--
ALTER TABLE `courseclasses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courseincludes`
--
ALTER TABLE `courseincludes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coursequestions`
--
ALTER TABLE `coursequestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `course_tags`
--
ALTER TABLE `course_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facts`
--
ALTER TABLE `facts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `learnings`
--
ALTER TABLE `learnings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trustcompanies`
--
ALTER TABLE `trustcompanies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userprofiles`
--
ALTER TABLE `userprofiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `whatlearns`
--
ALTER TABLE `whatlearns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
