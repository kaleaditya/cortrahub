-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 03:59 AM
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
-- Database: `cortra_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('attom_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:6:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";s:1:\"j\";s:4:\"slug\";s:1:\"k\";s:9:\"is_active\";}s:11:\"permissions\";a:20:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"role-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:5:{i:0;i:1;i:1;i:51;i:2;i:50;i:3;i:49;i:4;i:48;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"role-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"role-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"role-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:12:\"product-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:14:\"product-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:12:\"product-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:14:\"product-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:10:\"Order-Item\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:12:\"Manage Order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:9:\"user-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:3:{s:1:\"a\";i:12;s:1:\"b\";s:19:\"Manage Order Create\";s:1:\"c\";s:3:\"web\";}i:12;a:3:{s:1:\"a\";i:13;s:1:\"b\";s:19:\"Manage Order Delete\";s:1:\"c\";s:3:\"web\";}i:13;a:3:{s:1:\"a\";i:14;s:1:\"b\";s:17:\"Manage Order Edit\";s:1:\"c\";s:3:\"web\";}i:14;a:3:{s:1:\"a\";i:15;s:1:\"b\";s:19:\"Manage Order status\";s:1:\"c\";s:3:\"web\";}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:9:\"Dashboard\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:16:\"Manage Countries\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:13:\"Manage Cities\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:3:{s:1:\"a\";i:19;s:1:\"b\";s:10:\"Demo Excel\";s:1:\"c\";s:3:\"web\";}i:19;a:3:{s:1:\"a\";i:20;s:1:\"b\";s:6:\"Import\";s:1:\"c\";s:3:\"web\";}}s:5:\"roles\";a:5:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"Admin\";s:1:\"j\";s:5:\"admin\";s:1:\"k\";s:1:\"1\";s:1:\"c\";s:3:\"web\";}i:1;a:5:{s:1:\"a\";i:51;s:1:\"b\";s:14:\"Top Management\";s:1:\"j\";s:14:\"top-management\";s:1:\"k\";s:1:\"1\";s:1:\"c\";s:3:\"web\";}i:2;a:5:{s:1:\"a\";i:50;s:1:\"b\";s:17:\"Middle Management\";s:1:\"j\";s:17:\"middle-management\";s:1:\"k\";s:1:\"1\";s:1:\"c\";s:3:\"web\";}i:3;a:5:{s:1:\"a\";i:49;s:1:\"b\";s:11:\"Entry Level\";s:1:\"j\";s:11:\"entry-level\";s:1:\"k\";s:1:\"1\";s:1:\"c\";s:3:\"web\";}i:4;a:5:{s:1:\"a\";i:48;s:1:\"b\";s:11:\"Cross Level\";s:1:\"j\";s:11:\"cross-level\";s:1:\"k\";s:1:\"1\";s:1:\"c\";s:3:\"web\";}}}', 1751876676),
('attom_cache_admin@gmail.com|106.205.208.96:timer', 'i:1751258392;', 1751258392),
('attom_cache_beant@mailinator.com|45.126.169.67:timer', 'i:1750678830;', 1750678830),
('attom_cache_admin@gmail.coma|::1:timer', 'i:1750663791;', 1750663791),
('attom_cache_admin@gmail.coma|::1', 'i:1;', 1750663791),
('attom_cache_beant@mailinator.com|45.126.169.67', 'i:2;', 1750678830),
('attom_cache_israneynaren@gmail.com|49.36.81.65:timer', 'i:1751188198;', 1751188198),
('attom_cache_israneynaren@gmail.com|49.36.81.65', 'i:1;', 1751188198),
('attom_cache_admin@gmail.com|49.36.81.65:timer', 'i:1751196333;', 1751196333),
('attom_cache_admin@gmail.com|49.36.81.65', 'i:1;', 1751196333),
('attom_cache_admin@gmail.com|106.205.208.96', 'i:1;', 1751258392),
('attom_cache_admin@gmail.com|115.96.219.14:timer', 'i:1751546885;', 1751546885),
('attom_cache_admin@gmail.com|115.96.219.14', 'i:1;', 1751546885),
('attom_cache_sotowyw@mailinator.com|127.0.0.1:timer', 'i:1751913109;', 1751913109),
('attom_cache_sotowyw@mailinator.com|127.0.0.1', 'i:2;', 1751913109);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) NOT NULL,
  `owner` varchar(191) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `state_id`, `name`, `code`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Visakhapatnam', 'VSP', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(2, 1, 2, 'Itanagar', 'ITR', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(3, 1, 3, 'Guwahati', 'GAU', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(4, 1, 4, 'Patna', 'PAT', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(5, 1, 5, 'Raipur', 'RPR', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(6, 1, 6, 'Panaji', 'PNJ', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(7, 1, 7, 'Ahmedabad', 'AMD', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(8, 1, 8, 'Chandigarh', 'CHD', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(9, 1, 9, 'Shimla', 'SHL', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(10, 1, 10, 'Ranchi', 'RNC', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(11, 1, 11, 'Bengaluru', 'BLR', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(12, 1, 12, 'Thiruvananthapuram', 'TRV', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(13, 1, 13, 'Bhopal', 'BHO', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(14, 1, 14, 'Mumbai', 'MUM', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(15, 1, 15, 'Imphal', 'IMP', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(16, 1, 16, 'Shillong', 'SHG', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(17, 1, 17, 'Aizawl', 'AIW', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(18, 1, 18, 'Kohima', 'KOH', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(19, 1, 19, 'Bhubaneswar', 'BBI', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(20, 1, 20, 'Ludhiana', 'LDH', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(21, 1, 21, 'Jaipur', 'JPR', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(22, 1, 22, 'Gangtok', 'GTK', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(23, 1, 23, 'Chennai', 'CHN', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(24, 1, 24, 'Hyderabad', 'HYD', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(25, 1, 25, 'Agartala', 'AGR', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(26, 1, 26, 'Dehradun', 'DED', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(27, 1, 27, 'Lucknow', 'LKO', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(28, 1, 28, 'Kolkata', 'CCU', 1, '2025-06-11 16:36:32', '2025-06-11 16:36:32'),
(31, 1, 14, 'Pune', NULL, 1, '2025-06-13 09:22:45', '2025-06-13 09:22:45'),
(32, 1, 14, 'Nashik', NULL, 1, '2025-06-13 09:24:01', '2025-06-13 09:24:01'),
(33, 1, 14, 'Nagpur', NULL, 1, '2025-06-13 09:24:21', '2025-06-13 09:24:21'),
(34, 1, 14, 'Kalyan', NULL, 1, '2025-06-13 09:24:40', '2025-06-13 09:24:40'),
(35, 1, 14, 'Thane', NULL, 1, '2025-06-13 09:25:11', '2025-06-13 09:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `page_title` varchar(191) DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `description`, `page_title`, `meta_title`, `meta_keywords`, `meta_description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Thank You', '<p>Thank You for Registering with CORTRA!</p>\r\n\r\n<p>Welcome {{name of trainer}}</p>\r\n\r\n<p>Your registration as a corporate trainer has been successfully received. You&rsquo;re now one step closer to expanding your visibility and connecting with companies looking for expert training professionals like you.</p>\r\n\r\n<p>Our team will review your profile and get in touch if any additional information is needed.</p>\r\n\r\n<p>Once approved, your profile will be live on the CORTRA platform, giving you access to</p>\r\n\r\n<p>High-quality corporate training leads</p>\r\n\r\n<p>A personalized profile page to showcase your expertise</p>\r\n\r\n<p>Marketing support, digital visibility, and exclusive member benefits</p>\r\n\r\n<p>Stay tuned for updates via email. If you have any questions or need support, feel free to reach out at info@cortrahub.com</p>\r\n\r\n<p>Thank you for choosing CORTRA &mdash; where trainers and companies grow together.</p>', 'Thank You', 'Corporate Trainers', 'Corporate Trainers', '<p>Corporate Triners</p>', 1, '2025-05-26 10:25:14', '2025-06-25 20:12:27'),
(2, 'About Us', '<p><strong>What is Cortrahub.com?</strong></p>\r\n\r\n<p><strong>CORTRA</strong> is a flagship initiative by <strong>Urja Business Consulting</strong>, designed to bridge the gap between corporate trainers and organizations across India and the UAE. It serves as a curated directory platform where companies can easily discover, evaluate, and engage with professional trainers across diverse domains.</p>\r\n\r\n<p>🌐 <strong>Cortrahub = Clarity + Credibility + Connection</strong><br />\r\nWe exist to eliminate the noise and make high-quality corporate training connections simple, transparent, and commission-free.</p>\r\n\r\n<p><strong>🚩 Problems Faced by Trainers&nbsp;</strong></p>\r\n\r\n<p><strong>Trainers&#39; Challenges</strong></p>\r\n\r\n<p><strong>1. Lack of Visibility:</strong> Talented trainers often struggle to reach the right corporate clients.</p>\r\n\r\n<p><strong>2. Dependence on Middlemen:</strong> Many rely on agencies that take a cut or dilute the connection.</p>\r\n\r\n<p><strong>3. Scattered Leads:</strong> No centralized platform to present their services professionally.</p>\r\n\r\n<p>✅&nbsp;<strong>Solution proivded by Cortra</strong></p>\r\n\r\n<p><strong>1. It provides a Showcase with Authority:</strong> Full profiles with expertise, testimonials, and media.</p>\r\n\r\n<p><strong>2. Direct Discovery:</strong> Reach HR, L&amp;D, and decision-makers directly.</p>\r\n\r\n<p><strong>3. Zero Commission:</strong> You keep what you earn &mdash; no platform fees.</p>\r\n\r\n<p><strong>4. Supportive Coordination:</strong> We help manage communications and scheduling with full control in your hands.</p>\r\n\r\n<p><strong>🚩 Organizations&#39; Challenges</strong></p>\r\n\r\n<p><strong>1. Hard to Find Good Trainers:</strong> The market is fragmented and difficult to vet.</p>\r\n\r\n<p><strong>2. Lack of Trust:</strong> Generic directories don&rsquo;t offer depth or verification.</p>\r\n\r\n<p><strong>3. High Agency Fees:</strong> Middlemen inflate costs and slow down communication.</p>\r\n\r\n<p>✅&nbsp;<strong>Solution proivded by Cortra</strong></p>\r\n\r\n<p><strong>1. Curated Directory:</strong> Verified trainers across multiple categories and skills.</p>\r\n\r\n<p><strong>2. Smart Filters:</strong> Search by domain, region, experience, and past clients.</p>\r\n\r\n<p><strong>3. Direct Engagement:</strong> Connect and pay trainers directly. No commissions.</p>\r\n\r\n<p><strong>4. Clear Coordination:</strong> You control the interaction &mdash; we just simplify the process.</p>\r\n\r\n<p><strong>Why Join Cortrahub?</strong></p>\r\n\r\n<p>At <strong>Cortrahub.com</strong>, we&rsquo;re not just another listing platform &mdash; we&rsquo;re solving real problems faced by both corporate trainers and organizations when it comes to finding each other efficiently, transparently, and professionally.</p>\r\n\r\n<p>Whether you&#39;re a trainer ready to scale your reach or an organization looking to invest in meaningful learning experiences &mdash; <strong>Cortrahub is the trusted bridge you&rsquo;ve been waiting for.</strong></p>\r\n\r\n<p>👉 Join now at www.cortrahub.com &mdash; because great trainers and great companies deserve to meet without barriers.</p>', 'About Cortra Hub', 'About Cortra Hub', 'Cortra Hub', '<p>dsa</p>', 1, '2025-05-29 11:09:12', '2025-06-25 19:55:22'),
(3, 'Terms and conditions', '<p><strong>Terms and Conditions</strong></p>\r\n\r\n<p>Welcome to <strong>Cortrahub.com</strong>, a platform owned and managed by <strong>Urja Business Consulting</strong>. By accessing or using this website and the services offered herein, you agree to comply with and be bound by the following Terms and Conditions. Please read them carefully before using our platform.</p>\r\n\r\n<p><strong>1. Acceptance of Terms</strong></p>\r\n\r\n<p>By registering on Cortrahub.com or using any part of the site, you agree to be legally bound by these Terms and Conditions, our Privacy Policy, and any additional guidelines or rules applicable to specific services or features.</p>\r\n\r\n<p><strong>2. Platform Overview</strong></p>\r\n\r\n<p>Cortrahub.com is a curated directory and coordination platform that connects <strong>corporate trainers</strong> with <strong>organizations and HR teams</strong> across India and the UAE. The platform facilitates discovery, engagement, and coordination, but does not act as a recruitment agency or take commissions.</p>\r\n\r\n<p><strong>3. User Eligibility</strong></p>\r\n\r\n<p>To use this platform, users must be 18 years or older and legally eligible to enter into binding contracts in their jurisdiction. By registering, you affirm that the information you provide is accurate, complete, and up to date.</p>\r\n\r\n<p><strong>4. Membership and Profile Packaging Fees</strong></p>\r\n\r\n<p><strong>Membership Fees:</strong> All membership payments are <strong>non-refundable</strong> once activated. This includes access to platform features, visibility in search, and use of premium tools.</p>\r\n\r\n<p><strong>Profile Packaging Fees:</strong> These are refundable <strong>within 7 working days</strong> of the request, provided the service has not been fully rendered. Refunds will be credited to the original payment method within 7 working days of approval.</p>\r\n\r\n<p><strong>Refund Process:</strong> To request a refund, users must email support@cortrahub.com with full details. Eligibility will be reviewed on a case-by-case basis.</p>\r\n\r\n<p><strong>5. Commission-Free Model</strong></p>\r\n\r\n<p>Cortrahub does not charge any commission or brokerage from either trainers or organizations. All financial transactions are handled directly between the parties involved. The platform only coordinates the discovery and connection process.</p>\r\n\r\n<p><strong>6. Code of Conduct</strong></p>\r\n\r\n<p>All users must behave professionally and respectfully. Misuse of the platform, spamming, fake profiles, or inappropriate conduct may lead to suspension or permanent termination without refund.</p>\r\n\r\n<p><strong>7. Content and Intellectual Property</strong></p>\r\n\r\n<p>All content submitted by users (text, video, images) must be original or fully licensed. Users retain ownership of their content but grant Cortrahub the right to display it on the platform for promotional purposes.</p>\r\n\r\n<p>Platform design, logo, and system features are owned by Urja Business Consulting and may not be copied or reproduced without permission.</p>\r\n\r\n<p><strong>8. Limitation of Liability</strong></p>\r\n\r\n<p>Cortrahub is not responsible for the outcome of engagements between trainers and organizations. We do not guarantee results, success, or performance. Our role is to provide a connection and coordination platform, not act as an agent or employer.</p>\r\n\r\n<p><strong>9. Modifications and Termination</strong></p>\r\n\r\n<p>We reserve the right to modify these Terms and Conditions at any time without prior notice. Continued use of the platform after updates constitutes acceptance of the revised terms. We may also suspend or terminate access at our discretion for any breach or misuse.</p>\r\n\r\n<p><strong>10. Privacy Policy</strong></p>\r\n\r\n<p>All personal data is handled as per our Privacy Policy. By using this platform, you consent to the collection and use of your data in accordance with our stated practices.</p>\r\n\r\n<p><strong>11. Governing Law</strong></p>\r\n\r\n<p>These Terms and Conditions shall be governed by and interpreted in accordance with the laws of India. Any disputes shall be subject to the exclusive jurisdiction of the courts in Mumbai, Maharashtra.</p>\r\n\r\n<p><em>If you have any questions about these Terms, please contact us at support@cortrahub.com.</em></p>', 'Terms and Conditions', 'Terms and conditions of use of cortrahub.com', 'Terms and conditions of use of cortrahub.com', '<p><strong>Terms and Conditions</strong></p>\r\n\r\n<p>Welcome to <strong>Cortrahub.com</strong>, a platform owned and managed by <strong>Urja Business Consulting</strong>. By accessing or using this website and the services offered herein, you agree to comply with and be bound by the following Terms and Conditions. Please read them carefully before using our platform.</p>', 1, '2025-05-29 11:09:56', '2025-06-25 20:08:03'),
(4, 'Privacy Policy', '<p><strong>Privacy Policy</strong></p>\r\n\r\n<p><em>Effective Date: June 21st 2025</em></p>\r\n\r\n<p>At <strong>Cortrahub.com</strong>, operated by Urja Business Consulting, we are committed to protecting your privacy. This Privacy Policy explains how we collect, use, and safeguard your personal information when you use our website and services.</p>\r\n\r\n<p><strong>1. Information We Collect</strong></p>\r\n\r\n<p><strong>Personal Information:</strong> Name, email address, phone number, professional details, etc. provided during registration or profile setup.</p>\r\n\r\n<p><strong>Usage Data:</strong> Information on how you use the website, including pages visited, IP address, browser type, and device information.</p>\r\n\r\n<p><strong>2. How We Use Your Information</strong></p>\r\n\r\n<p>a. To create and manage user accounts and profiles.</p>\r\n\r\n<p>b. To display your trainer profile to potential clients and organizations.</p>\r\n\r\n<p>c. To communicate with you regarding services, updates, or support.</p>\r\n\r\n<p>d. To improve platform functionality and user experience.</p>\r\n\r\n<p>e. To comply with legal obligations or enforce platform policies.</p>\r\n\r\n<p><strong>3. Sharing Your Information</strong></p>\r\n\r\n<p>a. We do not sell, trade, or rent your personal data to third parties. We may share your information only with:</p>\r\n\r\n<p>b. Organizations or clients browsing the platform for trainers.</p>\r\n\r\n<p>c. Our internal team for operational and technical support.</p>\r\n\r\n<p>d. Law enforcement or regulatory bodies, if required by law.</p>\r\n\r\n<p><strong>4. Data Security</strong></p>\r\n\r\n<p>a. We implement appropriate technical and organizational measures to protect your personal information from unauthorized access, misuse, or disclosure.</p>\r\n\r\n<p><strong>5. Cookies and Tracking</strong></p>\r\n\r\n<p>b. We use cookies to analyze traffic, remember preferences, and enhance your experience. You can control cookies through your browser settings.</p>\r\n\r\n<p><strong>6. Your Rights</strong></p>\r\n\r\n<p>a. Access, correct, or delete your personal information.</p>\r\n\r\n<p>b. Withdraw consent for specific uses.</p>\r\n\r\n<p>c. Request data portability or restriction of processing, subject to legal limitations.</p>\r\n\r\n<p><strong>7. Retention of Data</strong></p>\r\n\r\n<p>a. We retain your information for as long as your account remains active or as needed to fulfill our legal and business obligations.</p>\r\n\r\n<p><strong>8. Changes to This Policy</strong></p>\r\n\r\n<p>a. We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated effective date.</p>\r\n\r\n<p><strong>9. Contact Us</strong></p>\r\n\r\n<p>If you have any questions or concerns about this policy or your personal information, please contact us at: Email: support@cortrahub.com</p>\r\n\r\n<p><strong>By using Cortrahub.com, you agree to the terms of this Privacy Policy.</strong></p>', 'Privacy Policy', 'Privacy Policy', 'Cortra, Urja Media and Entertainment', '<p><strong>Privacy Policy</strong></p>\r\n\r\n<p><em>Effective Date: June 21st 2025</em></p>\r\n\r\n<p>At <strong>Cortrahub.com</strong>, operated by Urja Business Consulting, we are committed to protecting your privacy. This Privacy Policy explains how we collect, use, and safeguard your personal information when you use our website and services</p>', 1, '2025-05-29 11:10:26', '2025-06-25 20:11:31'),
(5, 'Registration Process', '<p>Registration Process If you would like to register free / paid with us please send us the following details Professional Name, Screen Age, Email id, Mobile Number, Facebook Link, Instagram Link, Whatsapp Number on the info@atomdirectory.com OR register with us on the online form and we will revert to you on the email id provided by you. Please note : Any data sent on WhatsApp will be accepted, after the receipt of an email from your business email mentioned in your listing following acceptance to put data on the website. Please note that The email cannot be different from the one you are putting on your data on the website. For all types of memberships Please go through our Terms and Conditions Page : https://atomdirectory.com/Termsandconditions Registration Procedure Page : https://atomdirectory.com/Registrationprocedures. Please copy and paste the below-given content on your personal email body and send it to us on info@atomdirectory.com &quot; I, ( Please put your name here) have read and accepted the terms and conditions mentioned in the terms and condition page ( https://atomdirectory.com/Termsandconditions ) of the website and also terms mentioned in the registration process page https://atomdirectory.com/Registrationprocedures. Please Note: atomdirectory.com is not a casting or coordination agency. We do not take commissions for assignments that you get. Important Note : Your contact details like phone number, email id, etc can be updated by sending an email on info@atomdirectory.com Free Membership: ( No fees, only one category listing allowed and no login ) Your portfolio Important Note: 1 photo in the size of 375x375 pixels. if you don&#39;t send it in the size specified it won&#39;t be edited and hence your request for membership will be rejected. Audition videos ( Only for new faces). Important Note: One audition video should be a video link from your own channel. The link of any other person/company won&#39;t be accepted. The video will be downloaded and uploaded to our own channel ) Your bio-data on PDF document Important Note: This has to be in PDF format only. We won&#39;t be doing the conversion from Word or any other text document. If it is provided in any other format we will be upload as is without any error editing. Paid Memberships: Level One Membership Benefits ( Most Economical, Two Categories allowed) : ( Rs.3000 per year excluding GST) Your portfolio ( 8 to 10 photos suggested). 450x300-Required size . We will do the photo size editing for you. Can be updated Every Month Work videos ( 4 videos suggested) or 1 audition videos ,A video link from your own channel. The link of any other person/company won&#39;t be accepted. The video will be downloaded and uploaded to our own channel but with prior permission from you on email from info@atomdirectory.com. PDF/Word document of your bio-data.( As a service we will convert this to PDF format) Additional Benefits 1. Atleast one paid assignment guaranteed in a year** Level Two Membership Benefits ( Most Popular, Four Categories allowed) : ( Rs.8000 per year including GST) Your portfolio ( 8 to 10 photos suggested). Any size. We will do the photo size editing for you Work videos ( 4 videos suggested) and 1 audition videos. The video link should be from your own channel. The link of any other person/company won&#39;t be accepted. The video will be downloaded and uploaded to our own channel but with prior permission from you on email from info@atomdirectory.com PDF/Word document of your bio-data.( As a service we will convert this to PDF format) Additional Benefits Your own domain name www.yourname.in which be redirected to your page on ifid.in ( Please note that website and server space not included ) Free One Minute Showreel Video of your work put together ( Will be updated every year on renewal of memberships. You will have to provide the showreel to us. Editing and modification will be charged extra) One Business Card Design with QR code linked to. your page ( Only one free option) Atleast one paid assignment guaranteed in a year**. Premium Membership (5-year membership) ( Most suggested for experienced professionals, Unlimited categories allowed) (Rs.50000/- for 5 years including GST) Your portfolio ( 8 to 10 photos suggested). Any size. We will do the photo size editing for you Work videos ( unlimited videos ) .The video links must be from your own channel. The link of any other person/company won&#39;t be accepted. The video will be downloaded and uploaded to our own channel but with prior permission from you on email from info@atomdirectory.com. PDF/Word document of your bio-data.( As a service we will convert this to PDF format) Additional Benefits A Free domain name ( www.yourname.xyz), 1GB server space ( Free Only for the first year. You will have to pay a nominal amount as per the prevailing rate for domain name and server space at that particular time as billed by the hosting company. Alternately you can also provide your own domain name and server space details at the time of renewal in the following year or continue with us). Your own word press website ( Home, About, PhotoGallery, Video Gallery, Blog Page, Social Media Links, Contact Page).We will provide free online training and support to manage your own website for one year. Free Showreel Video ( maximum duration 60 seconds) of your work put together ( Will be updated every year on renewal of memberships. You will have to provide the showreel to us. Editing and modification will be charged extra) One Business Card Design with details ( Only one free option) Atleast one paid assignment guaranteed in a year**. ***Paid assigments depends on client to client and the amount cannot be guaranteed.</p>', 'sd@sdfl.etw', 'Registration Process of Cortra', 'Cortra, Urja Media and Entertainment', '<p>sa</p>', 1, '2025-05-29 11:10:59', '2025-06-24 00:46:10'),
(6, 'Refund Policy', '<p><strong>Refund &amp; Cancellation Policy</strong></p>\r\n\r\n<p>This Refund &amp; Cancellation Policy outlines the terms under which Cortrahub.com <em>(a platform managed by Urja Business Consulting) </em>processes refunds for services rendered. By registering, purchasing a membership, or availing of any additional services on Cortrahub.com, you acknowledge and agree to the terms stated herein.</p>\r\n\r\n<p><strong>1. Membership Fees &ndash; Non-Refundable</strong></p>\r\n\r\n<p>The Membership Fee is a one-time or recurring payment (as applicable) for access to premium platform features, directory listing, visibility among verified users, and priority support services.</p>\r\n\r\n<p>Membership is considered active from the moment payment is successfully processed.</p>\r\n\r\n<p><strong>All Membership Fees are strictly non-refundable</strong>, regardless of whether the services are fully used or partially used by the member.</p>\r\n\r\n<p>No refund will be issued under the following circumstances:</p>\r\n\r\n<p>Non-utilization of platform services.</p>\r\n\r\n<p>Voluntary cancellation or termination of membership by the user.</p>\r\n\r\n<p>Removal of a profile due to violation of our terms of service or code of conduct.</p>\r\n\r\n<p>Change of mind or dissatisfaction not attributable to service failure.</p>\r\n\r\n<p><strong>2. Profile Packaging Fees &ndash; Refundable with Conditions</strong></p>\r\n\r\n<p>Profile Packaging Services include but are not limited to: profile design, professional content creation (bio, expertise summary), resume formatting, media (video/photo) integration, and general optimization for visibility on the Cortrahub platform.</p>\r\n\r\n<p>Users who purchase Profile Packaging Services may request a refund <strong>within 7 (seven) working days</strong> from the date of payment or submission of required materials (whichever is earlier).</p>\r\n\r\n<p>A refund request must be submitted in writing to support@cortrahub.com and should include:</p>\r\n\r\n<p>Full name of the registered user</p>\r\n\r\n<p>Email ID used for registration</p>\r\n\r\n<p>Payment reference number</p>\r\n\r\n<p>Reason for refund request</p>\r\n\r\n<p><strong>Refund Conditions</strong></p>\r\n\r\n<p>The service must not have been fully rendered or finalized at the time of the request.</p>\r\n\r\n<p>Refund requests after the 7-day period will <strong>not be entertained</strong> under any circumstances.</p>\r\n\r\n<p>If Cortrahub&rsquo;s team has already commenced substantial work (such as delivered content drafts, design layouts, or profile uploads), only a partial refund may be granted at our discretion, deducting applicable service charges.</p>\r\n\r\n<p>Approved refunds will be processed using the original payment method and will be credited within <strong>7 (seven) working days</strong> of acceptance.</p>\r\n\r\n<p><strong>3. General Refund Policy Guidelines</strong></p>\r\n\r\n<p>Cortrahub reserves the sole right to determine whether a refund request meets the eligibility criteria.</p>\r\n\r\n<p>Repeated refund requests or suspected misuse of the refund policy may result in suspension or termination of membership.</p>\r\n\r\n<p>No refunds will be made in cash. All payments and refunds are processed via secure digital channels.</p>\r\n\r\n<p><strong>4. Cancellation Policy</strong></p>\r\n\r\n<p>Users may cancel their membership at any time. However, cancellation does not entitle the user to a refund of any amount already paid.</p>\r\n\r\n<p>Profile Packaging Services, once canceled after service delivery has begun, will not be refunded unless eligible under the aforementioned policy.</p>', 'Refund Policy', 'Refund Policy', 'Refund', '<p>Refund Policy</p>', 1, '2025-05-29 11:11:40', '2025-06-25 20:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `contact_name`, `email`, `password`, `designation`, `phone`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Ethic InfotechLLP', 'Rohit Pansara', 'vyro@mailinator.com', '$2y$12$0j8NgGScZr7mg0DU6axhNOS4q1op239MzqB0aqrghw3aP52SDKdv2', 'Software Engineer', '9033426446', 'xyz.com', '2025-07-08 12:50:28', '2025-07-08 12:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `company_trainer_list`
--

CREATE TABLE `company_trainer_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `trainer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_trainer_list`
--

INSERT INTO `company_trainer_list` (`id`, `company_id`, `trainer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 48, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `code` varchar(3) DEFAULT NULL,
  `phone_code` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `phone_code`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'India', 'IN', '+91', 1, '2025-06-11 16:32:26', '2025-06-11 16:32:26'),
(16, 'UAE', NULL, NULL, 1, '2025-06-12 10:12:24', '2025-06-12 10:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `title`, `is_active`, `category_id`, `created_at`, `updated_at`) VALUES
(37, 'Emotional Intelligence', 1, '51', '2025-06-23 06:25:04', '2025-06-23 06:25:04'),
(36, 'Innovation & Design Thinking', 1, '51', '2025-06-23 06:24:48', '2025-06-23 06:24:48'),
(35, 'Corporate Governance', 1, '51', '2025-06-23 06:24:26', '2025-06-23 06:24:26'),
(34, 'Strategic Management', 1, '51', '2025-06-23 06:24:11', '2025-06-23 06:24:11'),
(33, 'Executive Leadership', 1, '51', '2025-06-23 06:23:55', '2025-06-23 06:23:55'),
(38, 'Boardroom Communication', 1, '51', '2025-06-23 06:25:20', '2025-06-23 06:25:20'),
(39, 'Succession Planning', 1, '51', '2025-06-23 06:25:37', '2025-06-23 06:25:37'),
(40, 'Mindfulness & Executive Wellness', 1, '51', '2025-06-23 06:25:53', '2025-06-23 06:25:53'),
(41, 'People Management', 1, '50', '2025-06-23 06:26:18', '2025-06-23 06:26:18'),
(42, 'Conflict Resolution', 1, '50', '2025-06-23 06:26:33', '2025-06-23 06:26:33'),
(43, 'Performance Management', 1, '50', '2025-06-23 06:26:55', '2025-06-23 06:26:55'),
(44, 'Cross-Functional Collaboration', 1, '50', '2025-06-23 06:27:09', '2025-06-23 06:27:09'),
(45, 'Situational Leadership', 1, '50', '2025-06-23 06:27:25', '2025-06-23 06:27:25'),
(46, 'Time Management', 1, '50', '2025-06-23 06:28:47', '2025-06-23 06:28:47'),
(47, 'Coaching & Mentoring Skills', 1, '50', '2025-06-23 06:32:22', '2025-06-23 06:32:22'),
(48, 'Advanced Communication', 1, '50', '2025-06-23 06:32:42', '2025-06-23 06:32:42'),
(49, 'Workplace Communication', 1, '49', '2025-06-23 06:33:00', '2025-06-23 06:33:00'),
(50, 'Customer Service', 1, '49', '2025-06-23 06:33:26', '2025-06-23 06:33:26'),
(51, 'Technical Training', 1, '49', '2025-06-23 06:34:03', '2025-06-23 06:34:03'),
(52, 'I.T.Training', 1, '49', '2025-06-23 06:34:24', '2025-06-23 06:34:24'),
(53, 'I.T.Training', 1, '50', '2025-06-23 06:34:36', '2025-06-23 06:34:36'),
(54, 'POSH & Compliance Training', 1, '50', '2025-06-23 06:35:00', '2025-06-23 06:35:00'),
(55, 'POSH & Compliance Training', 1, '49', '2025-06-23 06:35:11', '2025-06-23 06:35:11'),
(56, 'POSH & Compliance Training', 1, '48', '2025-06-23 06:35:20', '2025-06-23 06:35:20'),
(57, 'Business Etiquette', 1, '48', '2025-06-23 06:35:35', '2025-06-23 06:35:35'),
(58, 'Business Etiquette', 1, '49', '2025-06-23 06:35:42', '2025-06-23 06:35:42'),
(59, 'Business Etiquette', 1, '50', '2025-06-23 06:35:48', '2025-06-23 06:35:48'),
(60, 'Time & Task Management', 1, '50', '2025-06-23 06:36:19', '2025-06-23 06:36:19'),
(61, 'Time & Task Management', 1, '49', '2025-06-23 06:36:26', '2025-06-23 06:36:26'),
(62, 'Time & Task Management', 1, '48', '2025-06-23 06:36:31', '2025-06-23 06:36:31'),
(63, 'Sales Training', 1, '49', '2025-06-23 06:37:00', '2025-06-23 06:37:00'),
(64, 'Sales Training', 1, '48', '2025-06-23 06:37:12', '2025-06-23 06:37:12'),
(65, 'Process Training', 1, '48', '2025-06-23 06:37:23', '2025-06-23 06:37:23'),
(66, 'Process Training', 1, '49', '2025-06-23 06:37:39', '2025-06-23 06:37:53'),
(67, 'Mental Health & Wellness', 1, '48', '2025-06-23 06:38:29', '2025-06-23 06:38:29'),
(68, 'Mental Health & Wellness', 1, '49', '2025-06-23 06:38:36', '2025-06-23 06:38:36'),
(69, 'Mental Health & Wellness', 1, '50', '2025-06-23 06:38:41', '2025-06-23 06:38:41'),
(70, 'Mental Health & Wellness', 1, '51', '2025-06-23 06:38:47', '2025-06-23 06:38:47'),
(71, 'Cybersecurity Awareness', 1, '51', '2025-06-23 06:39:12', '2025-06-23 06:39:12'),
(80, 'Personal Wellness', 1, '50', '2025-07-01 06:07:44', '2025-07-01 06:07:44'),
(73, 'Cybersecurity Awareness', 1, '49', '2025-06-23 06:39:24', '2025-06-23 06:39:24'),
(74, 'Cybersecurity Awareness', 1, '48', '2025-06-23 06:39:29', '2025-06-23 06:39:29'),
(75, 'Grooming & Etiquette', 1, '50', '2025-06-23 06:42:14', '2025-06-23 06:42:14'),
(76, 'Grooming & Etiquette', 1, '49', '2025-06-23 06:42:32', '2025-06-23 06:42:32'),
(77, 'Grooming & Etiquette', 1, '48', '2025-06-23 06:42:52', '2025-06-23 06:42:52'),
(78, 'Self-Mastery', 1, '51', '2025-06-28 10:18:05', '2025-06-28 10:35:10'),
(79, 'Self-Mastery', 1, '48', '2025-06-28 10:18:48', '2025-06-28 10:35:20'),
(81, 'Personal Wellness', 1, '51', '2025-07-01 06:08:03', '2025-07-01 06:08:20'),
(82, 'Personal Wellness', 1, '48', '2025-07-01 06:08:03', '2025-07-01 06:08:31'),
(85, 'Soft Skills Development', 1, '48', '2025-07-03 06:32:33', '2025-07-03 06:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'English', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(4, 'Hindi', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(5, 'Bengali', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(11, 'Telugu', 1, '2025-05-25 04:55:43', '2025-06-10 11:48:52'),
(13, 'Marathi', 1, '2025-05-25 04:55:43', '2025-07-03 06:32:00'),
(18, 'Tamil', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(20, 'Urdu', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(25, 'Gujarati', 1, '2025-07-03 06:34:33', '2025-07-03 06:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `manage_orders`
--

CREATE TABLE `manage_orders` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `order_item` varchar(255) DEFAULT NULL,
  `order_note` longtext DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) DEFAULT NULL,
  `associate_status` varchar(255) DEFAULT NULL,
  `coustomer_service_status` varchar(255) DEFAULT NULL,
  `warehouse_team_status` varchar(255) DEFAULT NULL,
  `dispatch_team_status` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `dispatched_date` varchar(255) DEFAULT NULL,
  `tracking_number` varchar(255) DEFAULT NULL,
  `signed_pod` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `country_id` varchar(255) DEFAULT NULL,
  `city_id` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_orders`
--

INSERT INTO `manage_orders` (`id`, `client_name`, `mobile_number`, `email`, `order_item`, `order_note`, `quantity`, `created_at`, `updated_at`, `address`, `associate_status`, `coustomer_service_status`, `warehouse_team_status`, `dispatch_team_status`, `status`, `dispatched_date`, `tracking_number`, `signed_pod`, `reason`, `country_id`, `city_id`) VALUES
(108, 'joy', '0909090909', 'joy@gmail.com', '12', 'order place', '1', '2024-11-22 06:46:57', '2024-11-22 06:50:00', 'address', '1', '1', '1', NULL, 'back to Warehouse', '2024-11-22T12:19', '#2354', NULL, NULL, '7', '9');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_10_144003_create_permission_tables', 1),
(5, '2024_05_10_144032_create_products_table', 1),
(6, '2025_05_24_160240_create_experiences_table', 2),
(7, '2025_05_24_162019_create_languages_table', 3),
(8, '2025_05_24_164337_create_products_table', 4),
(9, '2025_05_26_055921_create_role_infos_table', 5),
(10, '2025_05_26_153123_create_cms_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(16, 'App\\Models\\User', 14),
(16, 'App\\Models\\User', 15),
(48, 'App\\Models\\User', 48),
(48, 'App\\Models\\User', 50),
(48, 'App\\Models\\User', 52),
(48, 'App\\Models\\User', 59),
(49, 'App\\Models\\User', 51),
(49, 'App\\Models\\User', 54),
(49, 'App\\Models\\User', 58),
(49, 'App\\Models\\User', 59),
(50, 'App\\Models\\User', 53),
(50, 'App\\Models\\User', 59),
(51, 'App\\Models\\User', 43),
(51, 'App\\Models\\User', 44),
(51, 'App\\Models\\User', 55);

-- --------------------------------------------------------

--
-- Table structure for table `order_dates`
--

CREATE TABLE `order_dates` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_dates`
--

INSERT INTO `order_dates` (`id`, `user_id`, `order_id`, `order_status`, `date`, `created_at`, `updated_at`) VALUES
(3, '9', '25', 'Pending', '20-09-2024 12:22:40 PM', '2024-09-20 12:22:40', '2024-09-20 12:22:40'),
(4, '11', '25', 'Confrim Order', '20-09-2024 12:25:37 PM', '2024-09-20 12:25:37', '2024-09-20 12:25:37'),
(6, '12', '25', 'Pick and Packging', '20-09-2024 12:26:51 PM', '2024-09-20 12:26:51', '2024-09-20 12:26:51'),
(7, '12', '25', 'Ready for Dispatch', '20-09-2024 12:28:52 PM', '2024-09-20 12:28:52', '2024-09-20 12:28:52'),
(8, '12', '25', 'Dispatched', '20-09-2024 12:30:10 PM', '2024-09-20 12:30:10', '2024-09-20 12:30:10'),
(9, '10', '25', 'Out for delivery', '20-09-2024 12:32:08 PM', '2024-09-20 12:32:08', '2024-09-20 12:32:08'),
(10, '10', '25', 'Delivered', '20-09-2024 12:32:44 PM', '2024-09-20 12:32:44', '2024-09-20 12:32:44'),
(13, '9', '26', 'Pending', '20-09-2024 12:52:09 PM', '2024-09-20 12:51:25', '2024-09-20 12:52:09'),
(14, '11', '26', 'Confrim Order', '20-09-2024 02:25:05 PM', '2024-09-20 12:52:31', '2024-09-20 14:25:05'),
(15, '10', '25', 'Out for delivery', '20-09-2024 12:54:46 PM', '2024-09-20 12:54:46', '2024-09-20 12:54:46'),
(16, '10', '25', 'Un Delivered', '20-09-2024 02:11:19 PM', '2024-09-20 14:11:19', '2024-09-20 14:11:19'),
(17, '9', '27', 'Pending', '20-09-2024 02:23:09 PM', '2024-09-20 14:21:25', '2024-09-20 14:23:09'),
(18, '11', '27', 'Confrim Order', '20-09-2024 02:23:28 PM', '2024-09-20 14:23:28', '2024-09-20 14:23:28'),
(19, '12', '27', 'Pick and Packging', '20-09-2024 02:25:24 PM', '2024-09-20 14:25:24', '2024-09-20 14:25:24'),
(20, '12', '27', 'Ready for Dispatch', '20-09-2024 02:26:05 PM', '2024-09-20 14:26:05', '2024-09-20 14:26:05'),
(21, '12', '27', 'Pick and Packging', '20-09-2024 02:36:42 PM', '2024-09-20 14:36:42', '2024-09-20 14:36:42'),
(22, '12', '27', 'Ready for Dispatch', '20-09-2024 02:36:51 PM', '2024-09-20 14:36:51', '2024-09-20 14:36:51'),
(23, '12', '27', 'Pick and Packging', '20-09-2024 02:36:57 PM', '2024-09-20 14:36:57', '2024-09-20 14:36:57'),
(25, '12', '26', 'Dispatched', '10-12-2091 12:20:00 PM', '2024-09-20 14:45:26', '2024-09-20 14:45:26'),
(26, '10', '26', 'Delivered', '20-09-2024 02:47:08 PM', '2024-09-20 14:47:08', '2024-09-20 14:47:08'),
(27, '12', '27', 'Dispatched', '04-03-2022 04:23:00 AM', '2024-09-20 14:48:37', '2024-09-20 14:48:37'),
(28, '12', '27', 'Dispatched', '01-12-2022 12:00:00 PM', '2024-09-20 14:50:22', '2024-09-20 14:50:22'),
(29, '10', '27', 'Out for delivery', '20-09-2024 02:59:31 PM', '2024-09-20 14:59:31', '2024-09-20 14:59:31'),
(30, '10', '27', 'Un Delivered', '20-09-2024 02:59:44 PM', '2024-09-20 14:59:44', '2024-09-20 14:59:44'),
(31, '10', '27', 'Delivered', '20-09-2024 03:01:28 PM', '2024-09-20 15:01:28', '2024-09-20 15:01:28'),
(32, '9', '28', 'Pending', '20-09-2024 03:44:04 PM', '2024-09-20 10:09:17', '2024-09-20 15:44:04'),
(33, '11', '28', 'Confrim Order', '20-09-2024 03:45:06 PM', '2024-09-20 15:45:06', '2024-09-20 15:45:06'),
(34, '12', '28', 'Pick and Packging', '20-09-2024 03:46:00 PM', '2024-09-20 15:46:00', '2024-09-20 15:46:00'),
(35, '12', '28', 'Ready for Dispatch', '20-09-2024 03:46:57 PM', '2024-09-20 15:46:57', '2024-09-20 15:46:57'),
(36, '12', '28', 'Dispatched', '21-09-2024 06:47:00 PM', '2024-09-20 15:47:47', '2024-09-20 15:47:47'),
(37, '12', '28', 'Ready for Dispatch', '20-09-2024 03:49:31 PM', '2024-09-20 15:49:31', '2024-09-20 15:49:31'),
(38, '12', '28', 'Dispatched', '21-09-2024 07:50:00 PM', '2024-09-20 15:50:20', '2024-09-20 15:50:20'),
(39, '10', '28', 'Out for delivery', '20-09-2024 03:50:47 PM', '2024-09-20 15:50:47', '2024-09-20 15:50:47'),
(40, '9', '29', 'Pending', '20-09-2024 03:56:15 PM', '2024-09-20 15:56:15', '2024-09-20 15:56:15'),
(41, '11', '29', 'Confrim Order', '20-09-2024 03:56:34 PM', '2024-09-20 15:56:34', '2024-09-20 15:56:34'),
(42, '12', '29', 'Pick and Packging', '20-09-2024 03:56:53 PM', '2024-09-20 15:56:53', '2024-09-20 15:56:53'),
(43, '9', '30', 'Pending', '20-09-2024 04:20:37 PM', '2024-09-20 16:14:59', '2024-09-20 16:20:37'),
(44, '9', '31', 'Pending', '20-09-2024 04:43:49 PM', '2024-09-20 16:43:49', '2024-09-20 16:43:49'),
(45, '9', '32', 'Pending', '20-09-2024 05:04:36 PM', '2024-09-20 17:04:36', '2024-09-20 17:04:36'),
(46, '9', '33', 'Pending', '20-09-2024 05:09:04 PM', '2024-09-20 17:04:57', '2024-09-20 17:09:04'),
(47, '11', '33', 'Confrim Order', '20-09-2024 05:09:24 PM', '2024-09-20 17:05:52', '2024-09-20 17:09:24'),
(48, '12', '33', 'Pick and Packging', '20-09-2024 05:11:25 PM', '2024-09-20 17:11:25', '2024-09-20 17:11:25'),
(49, '12', '33', 'Ready for Dispatch', '20-09-2024 05:12:02 PM', '2024-09-20 17:12:02', '2024-09-20 17:12:02'),
(50, '12', '33', 'Dispatched', '09-12-2024 11:20:00 AM', '2024-09-20 17:12:43', '2024-09-20 17:12:43'),
(51, '10', '33', 'Out for delivery', '20-09-2024 05:13 PM', '2024-09-20 17:13:34', '2024-09-20 17:13:34'),
(52, '9', '34', 'Pending', '24-09-2024 04:14 AM', '2024-09-24 04:14:17', '2024-09-24 04:14:17'),
(53, '9', '35', 'Pending', '24-09-2024 04:17 AM', '2024-09-24 04:17:37', '2024-09-24 04:17:37'),
(54, '9', '36', 'Pending', '24-09-2024 04:19 AM', '2024-09-24 04:19:42', '2024-09-24 04:19:42'),
(55, '9', '37', 'Pending', '24-09-2024 04:22 AM', '2024-09-24 04:22:21', '2024-09-24 04:22:21'),
(56, '9', '38', 'Pending', '24-09-2024 04:27 AM', '2024-09-24 04:27:01', '2024-09-24 04:27:01'),
(57, '9', '39', 'Pending', '24-09-2024 04:27 AM', '2024-09-24 04:27:47', '2024-09-24 04:27:47'),
(58, '9', '40', 'Pending', '24-09-2024 04:29 AM', '2024-09-24 04:29:38', '2024-09-24 04:29:38'),
(59, '9', '41', 'Pending', '25-09-2024 10:14 AM', '2024-09-25 10:14:08', '2024-09-25 10:14:08'),
(60, '9', '42', 'Pending', '27-09-2024 05:46 AM', '2024-09-27 05:46:28', '2024-09-27 05:46:28'),
(61, '9', '43', 'Pending', '27-09-2024 03:16 PM', '2024-09-27 15:16:38', '2024-09-27 15:16:38'),
(62, '11', '43', 'Confrim Order', '27-09-2024 03:19 PM', '2024-09-27 15:19:14', '2024-09-27 15:19:14'),
(63, '9', '44', 'Pending', '03-10-2024 10:48 AM', '2024-10-03 10:48:16', '2024-10-03 10:48:16'),
(64, '9', '45', 'Pending', '04-10-2024 04:39 AM', '2024-10-04 04:39:50', '2024-10-04 04:39:50'),
(65, '9', '46', 'Pending', '04-10-2024 04:45 AM', '2024-10-04 04:45:09', '2024-10-04 04:45:09'),
(66, '9', '47', 'Pending', '04-10-2024 04:47 AM', '2024-10-04 04:47:48', '2024-10-04 04:47:48'),
(67, '9', '48', 'Pending', '04-10-2024 12:55 PM', '2024-10-04 12:55:04', '2024-10-04 12:55:04'),
(68, '9', '49', 'Pending', '07-10-2024 12:01 PM', '2024-10-07 05:05:06', '2024-10-07 12:01:38'),
(69, '9', '50', 'Pending', '07-10-2024 10:02 AM', '2024-10-07 10:02:27', '2024-10-07 10:02:27'),
(70, '11', '50', 'Confrim Order', '07-10-2024 10:06 AM', '2024-10-07 10:06:58', '2024-10-07 10:06:58'),
(71, '12', '50', 'Pick and Packging', '07-10-2024 10:09 AM', '2024-10-07 10:09:12', '2024-10-07 10:09:12'),
(72, '12', '50', 'Ready for Dispatch', '07-10-2024 10:09 AM', '2024-10-07 10:09:42', '2024-10-07 10:09:42'),
(73, '12', '50', 'Dispatched', '30-09-2024 05:40 PM', '2024-10-07 10:10:18', '2024-10-07 10:10:18'),
(74, '10', '50', 'Out for delivery', '07-10-2024 10:17 AM', '2024-10-07 10:17:21', '2024-10-07 10:17:21'),
(75, '9', '51', 'Pending', '09-10-2024 11:09 AM', '2024-10-09 11:05:01', '2024-10-09 11:09:02'),
(76, '9', '52', 'Pending', '09-10-2024 11:05 AM', '2024-10-09 11:05:09', '2024-10-09 11:05:09'),
(77, '9', '53', 'Pending', '09-10-2024 11:11 AM', '2024-10-09 11:10:52', '2024-10-09 11:11:26'),
(78, '11', '53', 'Confrim Order', '09-10-2024 11:13 AM', '2024-10-09 11:13:50', '2024-10-09 11:13:50'),
(79, '12', '53', 'Pick and Packging', '09-10-2024 11:14 AM', '2024-10-09 11:14:26', '2024-10-09 11:14:26'),
(80, '12', '53', 'Ready for Dispatch', '09-10-2024 11:14 AM', '2024-10-09 11:14:54', '2024-10-09 11:14:54'),
(81, '12', '53', 'Dispatched', '08-10-2024 12:17 AM', '2024-10-09 11:16:49', '2024-10-09 11:16:49'),
(82, '10', '53', 'Delivered', '09-10-2024 11:18 AM', '2024-10-09 11:18:22', '2024-10-09 11:18:22'),
(83, '12', '43', 'Dispatched', '08-10-2024 01:32 AM', '2024-10-09 11:31:51', '2024-10-09 11:31:51'),
(84, '9', '54', 'Pending', '23-10-2024 03:04 PM', '2024-10-23 12:46:35', '2024-10-23 15:04:33'),
(85, '9', '55', 'Pending', '23-10-2024 12:47 PM', '2024-10-23 12:47:58', '2024-10-23 12:47:58'),
(86, '9', '56', 'Pending', '23-10-2024 02:59 PM', '2024-10-23 13:00:01', '2024-10-23 14:59:42'),
(87, '9', '57', 'Pending', '23-10-2024 02:12 PM', '2024-10-23 13:52:38', '2024-10-23 14:12:38'),
(88, '11', '57', 'Confrim Order', '23-10-2024 02:12 PM', '2024-10-23 14:12:53', '2024-10-23 14:12:53'),
(89, '9', '58', 'Pending', '23-10-2024 03:40 PM', '2024-10-23 15:40:42', '2024-10-23 15:40:42'),
(90, '11', '58', 'Confrim Order', '23-10-2024 03:46 PM', '2024-10-23 15:46:29', '2024-10-23 15:46:29'),
(91, '11', '49', 'Confrim Order', '23-10-2024 03:47 PM', '2024-10-23 15:47:14', '2024-10-23 15:47:14'),
(92, '12', '58', 'Pick and Packging', '23-10-2024 03:53 PM', '2024-10-23 15:53:58', '2024-10-23 15:53:58'),
(93, '12', '58', 'Ready for Dispatch', '23-10-2024 03:54 PM', '2024-10-23 15:54:42', '2024-10-23 15:54:42'),
(94, '12', '58', 'Dispatched', '23-10-2024 03:55 PM', '2024-10-23 15:55:45', '2024-10-23 15:55:45'),
(95, '10', '58', 'Out for delivery', '23-10-2024 03:56 PM', '2024-10-23 15:56:39', '2024-10-23 15:56:39'),
(96, '', '59', 'Pending', '24-10-2024 02:08 PM', '2024-10-24 14:08:01', '2024-10-24 14:08:01'),
(97, '', '60', 'Pending', '24-10-2024 02:08 PM', '2024-10-24 14:08:55', '2024-10-24 14:08:55'),
(98, '11', '60', 'Confrim Order', '24-10-2024 02:11 PM', '2024-10-24 14:11:47', '2024-10-24 14:11:47'),
(105, '', '67', 'Pending', '24-10-2024 02:46 PM', '2024-10-24 14:46:04', '2024-10-24 14:46:04'),
(106, '', '68', 'Pending', '24-10-2024 02:49 PM', '2024-10-24 14:49:24', '2024-10-24 14:49:24'),
(107, '', '69', 'Pending', '24-10-2024 02:49 PM', '2024-10-24 14:49:24', '2024-10-24 14:49:24'),
(108, '', '70', 'Pending', '24-10-2024 02:50 PM', '2024-10-24 14:50:23', '2024-10-24 14:50:23'),
(109, '', '71', 'Pending', '24-10-2024 02:50 PM', '2024-10-24 14:50:23', '2024-10-24 14:50:23'),
(110, '', '72', 'Pending', '24-10-2024 02:51 PM', '2024-10-24 14:51:49', '2024-10-24 14:51:49'),
(111, '', '73', 'Pending', '24-10-2024 02:51 PM', '2024-10-24 14:51:49', '2024-10-24 14:51:49'),
(117, '', '79', 'Pending', '24-10-2024 03:17 PM', '2024-10-24 15:17:50', '2024-10-24 15:17:50'),
(118, '', '80', 'Pending', '24-10-2024 03:17 PM', '2024-10-24 15:17:50', '2024-10-24 15:17:50'),
(119, '', '81', 'Pending', '24-10-2024 03:18 PM', '2024-10-24 15:18:18', '2024-10-24 15:18:18'),
(120, '', '82', 'Pending', '24-10-2024 03:18 PM', '2024-10-24 15:18:56', '2024-10-24 15:18:56'),
(121, '', '83', 'Pending', '24-10-2024 03:25 PM', '2024-10-24 15:25:37', '2024-10-24 15:25:37'),
(124, '', '86', 'Pending', '24-10-2024 03:29 PM', '2024-10-24 15:29:58', '2024-10-24 15:29:58'),
(125, '', '87', 'Pending', '24-10-2024 03:29 PM', '2024-10-24 15:29:58', '2024-10-24 15:29:58'),
(127, '', '89', 'Pending', '24-10-2024 03:39 PM', '2024-10-24 15:39:20', '2024-10-24 15:39:20'),
(128, '', '90', 'Pending', '24-10-2024 03:39 PM', '2024-10-24 15:39:20', '2024-10-24 15:39:20'),
(129, '', '91', 'Pending', '24-10-2024 03:53 PM', '2024-10-24 15:53:03', '2024-10-24 15:53:03'),
(130, '', '92', 'Pending', '24-10-2024 03:53 PM', '2024-10-24 15:53:04', '2024-10-24 15:53:04'),
(131, '', '93', 'Pending', '24-10-2024 03:53 PM', '2024-10-24 15:53:37', '2024-10-24 15:53:37'),
(132, '', '94', 'Pending', '24-10-2024 03:53 PM', '2024-10-24 15:53:37', '2024-10-24 15:53:37'),
(133, '', '95', 'Pending', '24-10-2024 04:30 PM', '2024-10-24 16:30:17', '2024-10-24 16:30:17'),
(134, '', '96', 'Pending', '24-10-2024 04:30 PM', '2024-10-24 16:30:17', '2024-10-24 16:30:17'),
(135, '', '97', 'Pending', '24-10-2024 04:45 PM', '2024-10-24 16:45:39', '2024-10-24 16:45:39'),
(136, '', '98', 'Pending', '24-10-2024 04:52 PM', '2024-10-24 16:52:30', '2024-10-24 16:52:30'),
(137, '', '99', 'Pending', '24-10-2024 04:52 PM', '2024-10-24 16:52:30', '2024-10-24 16:52:30'),
(138, '', '100', 'Pending', '24-10-2024 05:09 PM', '2024-10-24 17:09:47', '2024-10-24 17:09:47'),
(139, '', '101', 'Pending', '24-10-2024 05:09 PM', '2024-10-24 17:09:47', '2024-10-24 17:09:47'),
(140, '', '102', 'Pending', '24-10-2024 05:33 PM', '2024-10-24 17:33:35', '2024-10-24 17:33:35'),
(141, '', '103', 'Pending', '24-10-2024 05:33 PM', '2024-10-24 17:33:35', '2024-10-24 17:33:35'),
(142, '11', '103', 'Confrim Order', '24-10-2024 05:35 PM', '2024-10-24 17:35:01', '2024-10-24 17:35:01'),
(143, '12', '103', 'Pick and Packging', '24-10-2024 05:37 PM', '2024-10-24 17:37:31', '2024-10-24 17:37:31'),
(144, '', '104', 'Pending', '12-11-2024 05:31 AM', '2024-11-12 05:31:06', '2024-11-12 05:31:06'),
(145, '', '105', 'Pending', '12-11-2024 05:56 AM', '2024-11-12 05:56:45', '2024-11-12 05:56:45'),
(146, '', '106', 'Pending', '12-11-2024 05:56 AM', '2024-11-12 05:56:45', '2024-11-12 05:56:45'),
(147, '9', '107', 'Pending', '22-11-2024 06:27 AM', '2024-11-22 06:14:41', '2024-11-22 06:27:08'),
(148, '9', '108', 'Pending', '22-11-2024 06:46 AM', '2024-11-22 06:46:57', '2024-11-22 06:46:57'),
(149, '11', '108', 'Confrim Order', '22-11-2024 06:48 AM', '2024-11-22 06:48:34', '2024-11-22 06:48:34'),
(150, '12', '108', 'Pick and Packging', '22-11-2024 06:48 AM', '2024-11-22 06:48:42', '2024-11-22 06:48:42'),
(151, '12', '108', 'Ready for Dispatch', '22-11-2024 06:49 AM', '2024-11-22 06:49:22', '2024-11-22 06:49:22'),
(152, '12', '108', 'Dispatched', '22-11-2024 12:19 PM', '2024-11-22 06:49:43', '2024-11-22 06:49:43'),
(153, '10', '108', 'back to Warehouse', '22-11-2024 06:50 AM', '2024-11-22 06:50:00', '2024-11-22 06:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`, `status`) VALUES
(12, 'Nissan VIP Hamper Kit', NULL, '', '2024-09-03 13:06:32', '2024-11-22 06:05:30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('dipen@mailinator.com', '$2y$12$Gjr6qXsFPvDTAZkbHp6ZPuY0UaBnPFfU7AdeYi94uWhGe47v9tEfa', '2024-10-07 04:18:28'),
('admin@gmail.com', '$2y$12$5eoecUbrFrIuuy5JV6dLzegp8EX4M7YqA4SVUqoAuivug0ZOH2ubi', '2024-10-04 00:04:35'),
('parth@mailinator.com', '$2y$12$WGNk2tRwhB5DlmvyXv.Ntuf6Q4F0E11YrsUfvOaGULtPBI1vMOG7C', '2024-10-04 01:41:05'),
('natthu@mailinator.com', '$2y$12$i8Q6bhjTRIq2KrIMC/pefuypUZtDsy5u1xjPyX0LZs1TfFqqIRinW', '2024-10-04 07:09:33'),
('devang@mailinator.com', '$2y$12$detejdhuRASfr4Rh9XwqvuXW1DyOFUj6fY1VbdY5z/C4TDe/Xaop.', '2024-10-04 01:42:41'),
('aditya@abcdef.com', '$2y$12$EthJ9RJHwaluWifwuG2JuO/U95rO/t58eqymg1OPCcqPaXT4XJEA6', '2025-06-29 04:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `guard_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2024-08-30 05:36:37', '2024-08-30 05:36:37'),
(2, 'role-create', 'web', '2024-08-30 05:36:37', '2024-08-30 05:36:37'),
(3, 'role-edit', 'web', '2024-08-30 05:36:37', '2024-08-30 05:36:37'),
(4, 'role-delete', 'web', '2024-08-30 05:36:37', '2024-08-30 05:36:37'),
(5, 'product-list', 'web', '2024-08-30 05:36:37', '2024-08-30 05:36:37'),
(6, 'product-create', 'web', '2024-08-30 05:36:37', '2024-08-30 05:36:37'),
(7, 'product-edit', 'web', '2024-08-30 05:36:37', '2024-08-30 05:36:37'),
(8, 'product-delete', 'web', '2024-08-30 05:36:37', '2024-08-30 05:36:37'),
(9, 'Order-Item', 'web', NULL, NULL),
(10, 'Manage Order', 'web', NULL, NULL),
(11, 'user-list', 'web', NULL, NULL),
(12, 'Manage Order Create', 'web', NULL, NULL),
(13, 'Manage Order Delete', 'web', NULL, NULL),
(14, 'Manage Order Edit', 'web', NULL, NULL),
(15, 'Manage Order status', 'web', NULL, NULL),
(16, 'Dashboard', 'web', NULL, NULL),
(17, 'Manage Countries', 'web', NULL, NULL),
(18, 'Manage Cities', 'web', NULL, NULL),
(19, 'Demo Excel', 'web', NULL, NULL),
(20, 'Import', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `value`, `is_enabled`, `created_at`, `updated_at`) VALUES
(1, 'Basic Plan', 'basic', 1, '2025-07-02 03:10:21', '2025-07-02 03:10:21'),
(2, 'Standard Plan', 'standard', 1, '2025-07-02 03:10:21', '2025-07-02 03:10:21'),
(3, 'Executive Plan', 'executive', 1, '2025-07-02 03:10:21', '2025-07-02 03:10:21'),
(4, 'Platinum Plan', 'platinum', 0, '2025-07-02 03:10:21', '2025-07-02 03:10:21'),
(5, 'Associate Partner Plan', 'associate_partner', 0, '2025-07-02 03:10:21', '2025-07-02 03:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category_id`, `is_active`, `created_at`, `updated_at`) VALUES
(22, 'Leading Through Change & Uncertainty', '51', 1, '2025-06-23 06:46:25', '2025-06-23 06:46:25'),
(21, 'Strategic Visioning & Future-Ready Leadership', '51', 1, '2025-06-23 06:45:36', '2025-06-23 06:45:36'),
(23, 'Executive Decision Making Under Pressure', '51', 1, '2025-06-23 06:46:57', '2025-06-23 06:46:57'),
(24, 'High-Impact Boardroom Communication & Presence', '51', 1, '2025-06-23 06:47:20', '2025-06-23 06:47:20'),
(25, 'Emotional Intelligence for Executive Leadership', '51', 1, '2025-06-23 06:47:37', '2025-06-23 06:47:37'),
(26, 'Innovation Mindset: Design Thinking for Business Leaders', '51', 1, '2025-06-23 06:47:59', '2025-06-23 06:47:59'),
(27, 'Building a Culture of Accountability & Ownership', '51', 1, '2025-06-23 06:48:12', '2025-06-23 06:48:12'),
(28, 'Succession Planning & Leadership Continuity', '51', 1, '2025-06-23 06:48:27', '2025-06-23 06:48:27'),
(29, 'Mindful Leadership & Executive Well-being', '50', 1, '2025-06-23 06:48:52', '2025-06-23 06:48:52'),
(30, 'Strategic Brand Leadership', '50', 1, '2025-06-23 06:49:05', '2025-06-23 06:49:05'),
(31, 'Global Leadership & Cross-Cultural Intelligence', '51', 1, '2025-06-23 06:49:19', '2025-06-23 06:49:19'),
(32, 'Leading with Purpose: Values-Driven Leadership', '50', 1, '2025-06-23 06:49:34', '2025-06-23 06:49:34'),
(33, 'Driving Organizational Transformation', '50', 1, '2025-06-23 06:49:57', '2025-06-23 06:49:57'),
(34, 'Executive Conflict Resolution', '50', 1, '2025-06-23 06:50:12', '2025-06-23 06:50:12'),
(35, 'Managing Teams with Emotional Intelligence', '50', 1, '2025-06-23 06:51:06', '2025-06-23 06:51:06'),
(36, 'From Manager to Leader: Building Leadership Presence', '50', 1, '2025-06-23 06:51:18', '2025-06-23 06:51:18'),
(37, 'Effective People Management & Delegation Skills', '50', 1, '2025-06-23 06:51:39', '2025-06-23 06:51:39'),
(38, 'Driving Results: Performance & Goal Alignment', '50', 1, '2025-06-23 06:51:58', '2025-06-23 06:51:58'),
(39, 'Time & Task Prioritization for Managers', '50', 1, '2025-06-23 06:52:16', '2025-06-23 06:52:16'),
(40, 'Coaching & Mentoring Skills for Middle Managers', '50', 1, '2025-06-23 06:52:32', '2025-06-23 06:52:32'),
(41, 'Leading Change & Managing Resistance', '50', 1, '2025-06-23 06:52:46', '2025-06-23 06:52:46'),
(42, 'Corporate Etiquette & Workplace Behavior', '49', 1, '2025-06-23 06:53:17', '2025-06-23 06:53:17'),
(43, 'Effective Business Communication (Email & Verbal)', '49', 1, '2025-06-23 06:53:30', '2025-06-23 06:53:30'),
(44, 'Time Management & Personal Productivity', '49', 1, '2025-06-23 06:53:43', '2025-06-23 06:53:43'),
(45, 'Teamwork & Collaboration in a Hybrid Environment', '49', 1, '2025-06-23 06:53:55', '2025-06-23 06:53:55'),
(46, 'Understanding Roles, Goals & Accountability', '49', 1, '2025-06-23 06:54:08', '2025-06-23 06:54:08'),
(47, 'Introduction to Customer Service Excellence', '49', 1, '2025-06-23 06:54:20', '2025-06-23 06:54:20'),
(48, 'Problem Solving & Critical Thinking at Work', '49', 1, '2025-06-23 06:54:38', '2025-06-23 06:54:38'),
(49, 'Problem Solving & Critical Thinking at Work', '50', 1, '2025-06-23 06:54:44', '2025-06-23 06:54:44'),
(50, 'Handling Feedback & Self-Development Planning', '49', 1, '2025-06-23 06:55:01', '2025-06-23 06:55:01'),
(51, 'POSH & Workplace Compliance Awareness', '48', 1, '2025-06-23 06:55:22', '2025-06-23 06:55:22'),
(52, 'Self Empowerment', '51', 1, '2025-06-28 10:19:29', '2025-06-28 10:19:29'),
(53, 'Self Empowerment', '48', 1, '2025-06-28 10:19:50', '2025-06-28 10:19:50'),
(54, 'Leading Others', '51', 1, '2025-06-28 10:20:21', '2025-06-28 10:20:21'),
(55, 'Leading Others', '48', 1, '2025-06-28 10:20:41', '2025-06-28 10:20:41'),
(56, 'Nutrition and Wellness at Workplace', '48', 1, '2025-07-01 06:10:42', '2025-07-01 06:10:42'),
(57, 'Yoga and Meditation', '48', 1, '2025-07-01 06:14:54', '2025-07-01 06:14:54'),
(58, 'Dining Etiquette', '48', 1, '2025-07-01 06:15:05', '2025-07-01 06:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `products_old`
--

CREATE TABLE `products_old` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `detail` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_old`
--

INSERT INTO `products_old` (`id`, `name`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'vikas', 'example', '2024-08-30 05:41:12', '2024-08-30 05:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `program_enquiries`
--

CREATE TABLE `program_enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `trainer_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`trainer_ids`)),
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `attendees` int(11) NOT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `program_brief` text DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT '1',
  `guard_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '1', 'web', '2024-08-30 05:36:53', '2024-08-30 05:36:53'),
(51, 'Top Management', 'top-management', '1', 'web', '2025-06-22 12:05:05', '2025-06-23 05:43:27'),
(50, 'Middle Management', 'middle-management', '1', 'web', '2025-06-22 12:04:43', '2025-06-23 05:41:30'),
(49, 'Entry Level', 'entry-level', '1', 'web', '2025-06-22 12:04:22', '2025-06-23 05:55:10'),
(48, 'Cross Level', 'cross-level', '1', 'web', '2025-06-22 12:03:59', '2025-06-23 05:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 11),
(1, 12),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(2, 1),
(2, 13),
(2, 14),
(3, 1),
(3, 12),
(4, 1),
(4, 14),
(5, 1),
(5, 14),
(6, 1),
(7, 1),
(8, 1),
(8, 12),
(9, 1),
(9, 12),
(9, 13),
(9, 14),
(10, 1),
(10, 2),
(10, 12),
(10, 13),
(11, 1),
(11, 12),
(12, 2),
(12, 13),
(12, 14),
(13, 2),
(13, 12),
(13, 13),
(14, 2),
(14, 12),
(14, 13),
(15, 12),
(15, 13),
(16, 1),
(16, 2),
(16, 7),
(16, 8),
(16, 9),
(16, 10),
(16, 12),
(16, 13),
(17, 1),
(17, 12),
(18, 1),
(18, 12),
(18, 13),
(18, 14),
(19, 2),
(19, 12),
(19, 13),
(20, 2),
(20, 12);

-- --------------------------------------------------------

--
-- Table structure for table `role_infos`
--

CREATE TABLE `role_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(191) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_kewords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `short_order` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_infos`
--

INSERT INTO `role_infos` (`id`, `role_id`, `slug`, `image`, `meta_title`, `meta_kewords`, `meta_description`, `short_order`, `is_active`, `created_at`, `updated_at`) VALUES
(56, '52', NULL, '1750745720.png', NULL, NULL, NULL, NULL, 0, '2025-06-24 00:45:20', '2025-06-24 00:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `category_id`, `is_active`, `created_at`, `updated_at`) VALUES
(9, 'Online', '50', '1', '2025-06-22 17:40:00', '2025-06-23 12:11:31'),
(10, 'Offline', '49', '1', '2025-06-22 17:40:11', '2025-06-22 17:40:11'),
(11, 'Onsite', '51', '1', '2025-06-22 17:40:22', '2025-06-23 12:10:54'),
(12, 'Personal Training', '51', '1', '2025-06-22 17:40:38', '2025-06-23 12:10:43'),
(13, 'Outbound', '50', '1', '2025-06-23 12:10:02', '2025-06-23 12:10:02'),
(14, 'Outbound', '49', '1', '2025-06-23 12:10:10', '2025-06-23 12:10:10'),
(15, 'Outbound', '51', '1', '2025-06-23 12:10:19', '2025-06-23 12:10:19'),
(16, 'Outbound', '48', '1', '2025-06-23 12:10:30', '2025-06-23 12:10:30'),
(17, 'Onsite', '50', '1', '2025-06-23 12:11:05', '2025-06-23 12:11:05'),
(18, 'Onsite', '49', '1', '2025-06-23 12:11:14', '2025-06-23 12:11:14'),
(19, 'Onsite', '48', '1', '2025-06-23 12:11:22', '2025-06-23 12:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hVlkXMev0AwVWpE97eb3ja2LONSWyH4880DE3pKX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ0dlWHQzTHhkbmVVOW5hbGV2V1lnWURPd1ZxNHBvVmw0V0xzeXZxOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jb21wYW55L3Byb2dyYW0tZW5xdWlyeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTQ6ImxvZ2luX2NvbXBhbnlfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1752112739),
('qLhZiewSYusT4f5wLSzFZ4J8L4pq0PxY8wLLG4na', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaEpRZnM1R1RjMUQ0c2hZNnJuUmV2Tks0aUV6ejNIV3JMYTJzZWZHMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jb21wYW55X3JlZ2lzdGVyIjt9fQ==', 1751914793),
('CbzHEhZUUshfRzDxZR5elmJMiCPPoSVLtF966wGS', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaUhZR3ltM1dZMU9IZkxzenY5bEdLS0hhaG1UanZHenhSY0ZSR09PZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jb21wYW55L3dpc2hsaXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1NDoibG9naW5fY29tcGFueV81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0ODoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL21hbmFnZS1kb2N1bWVudHM/dXNlcl9pZD0xIjt9fQ==', 1752008345),
('BeJctn5gDAfpDlzVhYl1BJjtM9X4za0JAI8uJhUF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYmZWc3lpazV1T3pTZEtsc1VIbElidTBZNTRoZjJGR2d6dlNKNjNHYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1752004258);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `code`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Andhra Pradesh', 'AP', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(2, 1, 'Arunachal Pradesh', 'AR', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(3, 1, 'Assam', 'AS', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(4, 1, 'Bihar', 'BR', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(5, 1, 'Chhattisgarh', 'CG', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(6, 1, 'Goa', 'GA', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(7, 1, 'Gujarat', 'GJ', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(8, 1, 'Haryana', 'HR', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(9, 1, 'Himachal Pradesh', 'HP', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(10, 1, 'Jharkhand', 'JH', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(11, 1, 'Karnataka', 'KA', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(12, 1, 'Kerala', 'KL', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(13, 1, 'Madhya Pradesh', 'MP', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(14, 1, 'Maharashtra', 'MH', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(15, 1, 'Manipur', 'MN', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(16, 1, 'Meghalaya', 'ML', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(17, 1, 'Mizoram', 'MZ', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(18, 1, 'Nagaland', 'NL', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(19, 1, 'Odisha', 'OD', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(20, 1, 'Punjab', 'PB', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(21, 1, 'Rajasthan', 'RJ', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(22, 1, 'Sikkim', 'SK', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(23, 1, 'Tamil Nadu', 'TN', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(24, 1, 'Telangana', 'TG', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(25, 1, 'Tripura', 'TR', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(26, 1, 'Uttarakhand', 'UK', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(27, 1, 'Uttar Pradesh', 'UP', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(28, 1, 'West Bengal', 'WB', 1, '2025-06-11 16:34:38', '2025-06-11 16:34:38'),
(29, 16, 'Dubai', NULL, 1, '2025-06-12 10:12:37', '2025-06-12 10:12:44'),
(30, 1, 'Telangana', NULL, 1, '2025-06-12 10:19:56', '2025-06-12 10:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Prof. Dr. Naren Israney', 'Founder Partner | Life Enrichment Coach', '1750903712.jpg', 'Prof. Dr. Naren Israney is a distinguished Life Enrichment Coach and Founder Partner, with over four decades of experience in education, human relationships, and personal development. A Ph.D. in Human Relationships and a multilingual speaker, he has delivered 100+ transformative workshops across India for students, educators, corporates, and senior citizens. His sessions focus on building self-confidence, managing stress, improving communication, nurturing emotional and spiritual well-being, and inspiring holistic happiness. A creative soul at heart, Dr. Israney is also a passionate writer, poet, photographer, and content creator who believes in lifelong learning and empowering others through practical life skills.', '2025-06-24 08:17:22', '2025-06-26 02:33:17'),
(3, 'Yogini Bhalekar', 'Founder Partner | HR & Operations Strategist', '1750904324.JPG', 'As a Founder Partner, Yogini brings 18+ years of deep expertise in HR and Operations, with a proven track record of building HR functions from the ground up. She has successfully led HR leadership roles across industries including healthcare, biotechnology, renewable energy, and high-growth startups.', '2025-06-24 10:14:19', '2025-06-26 02:35:18'),
(4, 'Ajit Vidyadharan', 'Founder Partner | Self-Mastery & Happiness Coach', '1750904570.jpg', 'Ajit is a Self-Mastery and Happiness Coach, and a High Impact Performance Excellence Enabler (HIPEE), with over two decades of experience. As a Founder Partner, he brings a unique blend of purpose-driven leadership, emotional intelligence, and results-focused coaching. Through 16,000+ hours of training and consulting, Ajit has empowered over 14,000 professionals to elevate their energy, enhance workplace performance, and multiply their personal and professional success.', '2025-06-24 10:14:28', '2025-06-26 02:33:53'),
(5, 'Dr.Shweta Singh', 'Founder Partner | Nutrition & Etiquette Coach', '1750905130.jpg', 'Dr. Shweta Singh, PhD in Herbal Medicine, is a wellness-focused nutritionist and trainer specializing in etiquette, grooming, communication, and productivity. As a Founder Partner, she brings a unique blend of scientific knowledge and refined interpersonal skills to help individuals build confidence, present themselves with poise, and lead healthier, more productive lives. Her holistic approach nurtures both inner well-being and outward presence.', '2025-06-26 02:32:10', '2025-06-26 02:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `plan_type` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `whatsup` varchar(255) DEFAULT NULL,
  `country_id` varchar(255) DEFAULT NULL,
  `state_id` varchar(250) DEFAULT NULL,
  `city_id` varchar(250) DEFAULT NULL,
  `age` varchar(250) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `experience` varchar(250) DEFAULT NULL,
  `language` varchar(250) DEFAULT NULL,
  `other` varchar(250) DEFAULT NULL,
  `page_title` varchar(250) DEFAULT NULL,
  `meta_title` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `is_active` varchar(250) DEFAULT NULL,
  `is_featured` varchar(250) DEFAULT '0',
  `header_image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `is_block` varchar(250) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `is_locked` varchar(255) NOT NULL DEFAULT '0' COMMENT '0= active,1=blocked',
  `mail_status` int(11) NOT NULL DEFAULT 0,
  `instagram` varchar(255) DEFAULT NULL,
  `is_company` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show_password` varchar(255) DEFAULT NULL,
  `tattve_media_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `company_name`, `slug`, `phone`, `email`, `plan_type`, `facebook`, `website`, `whatsup`, `country_id`, `state_id`, `city_id`, `age`, `gender`, `image`, `experience`, `language`, `other`, `page_title`, `meta_title`, `description`, `short_description`, `meta_description`, `meta_keyword`, `youtube`, `is_active`, `is_featured`, `header_image`, `banner_image`, `designation`, `qualification`, `is_block`, `linkedin`, `is_locked`, `mail_status`, `instagram`, `is_company`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `show_password`, `tattve_media_id`) VALUES
(2, 'Admin', NULL, 'admin', NULL, 'urjamediain@gmail.com', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, '0', NULL, '0', 1, NULL, NULL, NULL, '$2y$12$rrUxXQjSpCEue8CtPCme7eu8BH3OAoehOwWCbSyOoL9/juCaSlC1u', '98NGGRl9nRRkAlg8rybG0U7D5FzoJoPTpcpnHbW9cMhp3ercd4uOILABRACq', '2024-08-30 05:36:53', '2025-06-14 04:41:40', NULL, NULL),
(44, 'Ajit Vidyadharan', NULL, 'ajit-vidyadharan', '9664966416', 'appreciatorajit@gmail.com', NULL, 'https://facebook.com/ajitvidya_hipee', 'https://ajitvidyadharan.com', '9664966416', '1', '14', '14', '30', 'male', '1751185623.jpg', '78', '3', '26', 'Ajit Vidyadharan Self-mastery', 'Ajit Vidyadharan Self-mastery', 'Imagine waking up every day filled with energy, abundance, and joy. Imagine nurturing relationships that uplift you, delivering excellence in your work, and creating wealth that multiplies nine times over. This is the world I envision—a world where people thrive, not just survive.\r\n\r\nI’ve dedicated my life and career to making this vision a reality, through training, coaching, speaking, and digital content. Every conversation I have, every connection I make, is about sharing this vision with others—inviting those who are ready to join me in building a world where fulfillment, success, and happiness are the norm.\r\n\r\nAre you ready to be a part of something bigger? Together, we can make this world a reality.', 'Few words', 'I enable Leaders like you to achieve Self-Mastery to grow your Prosperity by 9X levels, \r\nby raising your energy, using existing resources, and without wasting years & spending crores...', 'Ajit Vidyadharan, Self-mastery, Happiness, Coach, Prosperity, Excellence.', NULL, '1', '1', '1751197487.3jpg', '1751187650.qjpg', NULL, NULL, '0', 'https://linkedin.com/in/ajitvidya', '0', 1, NULL, NULL, NULL, '$2y$12$iYGZ8T2hyVCukz5VCu0YtO2tL2JS2CRVCEWVvY//FovRIxfXP7EZS', NULL, '2025-06-27 11:31:05', '2025-06-29 10:28:35', '12345678', NULL),
(48, 'Shweta Singh', NULL, 'shweta-singh-sfnm1u', '8454887801', 'shwetajsingh0711@gmail.com', NULL, NULL, NULL, '8454887801', '1', '14', '14', '15', 'female', '1751203400.jpg', '57,67,77,82', '3,4', '56,57,58', NULL, NULL, 'Some desxcription', NULL, NULL, 'admin@gmail.com', NULL, '1', '1', NULL, NULL, NULL, NULL, '0', NULL, '0', 1, NULL, NULL, NULL, '$2y$12$PlIMn98JhBwOoTKtckdWRedTXDNI/amxl6w4UWMk4MzIreVGdjH46', NULL, '2025-06-29 03:41:48', '2025-07-01 06:15:21', '12345678', NULL),
(50, 'Yogini Bhalekar Garude', NULL, 'yogini-bhalekar-garude-3mfa76', '7400189060', 'yogini.hrm2021@gmail.com', NULL, NULL, NULL, '7400189060', '1', '14', '35', '18', 'female', '1751205066.JPG', '56,85', '3,4,13', '51', NULL, NULL, 'With over 18 years of expertise in HR & Operations, Yogini Bhalekar-Garude specializes in building HR departments, learning and development, policy implementation, talent acquisition, employee lifecycle management, payroll, and administrative functions. She is passionate about organizational development, employee engagement, learning & development and driving business success through strategic HR solutions.\r\nHaving headed HR for 10+ years across industries such as hospitals, healthcare, biotechnology, renewable energy, Operations & Maintenance (O&M), and biomass pellet manufacturing, Yogini brings invaluable experience in managing HR functions for start-ups. She has led key initiatives, including:\r\n•	Organizing a six-day training program for new recruits which included process, product and soft skills trainings.\r\n•	Conducting soft skills and POSH trainings across Pan India (online & offline).\r\n•	Playing a pivotal role in setting up a multi-specialty hospital and onboarding 350+ staff members\r\n•	Leading HR efforts that secured NABH accreditation within two years for a renowned Mumbai hospital\r\nYogini holds a Postgraduate degree in Human Resource Management from Welingkar Institute and has completed the Train the Trainer program from Tata Institute of Social Sciences. She is a Certified Neuro-Linguistic Practitioner, Certified Mind Mapper, and holds a Leadership Skill Assessment Certificate.', NULL, NULL, NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, '0', NULL, '0', 1, NULL, NULL, NULL, '$2y$12$sK77AMWEBmf7vvOnhIKMg.SQyZucakDNauKlaXaW0aHgEHZU.esh6', NULL, '2025-06-29 05:21:22', '2025-07-03 06:45:45', '12345678', NULL),
(51, 'Rajesh Rajan', NULL, 'rajesh-rajan-ipux4k', '9876543210', 'rajesh@mailinator.com', NULL, NULL, NULL, '9876543210', '1', '12', '12', '19', 'male', '1751201749.jpg', '50', '3', '43,44,45,46', NULL, NULL, 'Some text', NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, '0', NULL, '0', 1, NULL, NULL, NULL, '$2y$12$vHJwCL1Np9KvL4FUaSobE.L08WKKbNEiO72pCfbaWs/YTYmIs4mzu', NULL, '2025-06-29 06:45:36', '2025-06-29 07:25:49', '12345678', NULL),
(52, 'Suzanne Dsouza', NULL, 'suzanne-dsouza-ptnqzq', '8976543210', 'suzanne@mailinator.com', NULL, NULL, NULL, '8976543210', '1', '11', '11', '14', 'female', '1751201023.jpg', '56', '3', '', NULL, NULL, 'Some text about suzanne', NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, '0', NULL, '0', 1, NULL, NULL, NULL, '$2y$12$XLgwb1vmujHQV42nr90QmetNS/AVJX3Ukk0k8skHvJv4xLXpCvbGC', NULL, '2025-06-29 06:48:54', '2025-06-29 07:13:43', '12345678', NULL),
(53, 'vikas gupta', NULL, 'vikas-gupta-f26nwk', '2233445566', 'vikasgupta@mailinator.com', NULL, NULL, NULL, '1234567890', '1', '7', '7', '13', 'male', '1751201959.jpg', '41', '3', '30,32,33', NULL, NULL, 'Something about vikas guots', NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, '0', NULL, '0', 1, NULL, NULL, NULL, '$2y$12$3QSj11NcI620Cj7df27ULOmdkEAup.xQrLPlv4p7/fCUKI6cPmJCq', NULL, '2025-06-29 06:51:22', '2025-06-29 07:29:19', '12345678', NULL),
(54, 'dhruvshah', NULL, 'dhruvshah-kye7vh', '1122334455', 'dhruvshah@mailinator.com', NULL, NULL, NULL, '1122334455', '1', '1', '1', '13', 'male', '1751202032.jpg', '49,50', '3', '42,43,44,45', NULL, NULL, 'Something about dhruv shah', NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, '0', NULL, '0', 1, NULL, NULL, NULL, '$2y$12$1/zzP9KeqmVI3rAkZ6Cj7eOhzQ4A1N1y0E0HnlwdGDfJr0ky1IPV6', NULL, '2025-06-29 06:53:24', '2025-06-29 07:30:32', '12345678', NULL),
(55, 'mayurshah', NULL, 'mayurshah-loqnsl', '9879546875', 'mayurshah@mailinator.com', NULL, NULL, NULL, '9879546875', '1', '3', '3', '15', 'male', '1751202118.jpg', '37,36,35', '3,4', '22,21,23,24', NULL, NULL, 'Something about Mayur Shah', NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, '0', NULL, '0', 1, NULL, NULL, NULL, '$2y$12$VQT9CZxe5bf6zhcyRA91ru4XzHxd1hWwin0e4QG9ZRZLNV.DjmAB2', NULL, '2025-06-29 06:55:09', '2025-06-29 07:31:58', '12345678', NULL),
(58, 'Sachin', NULL, 'sachin', '7986543210', 'urjamediaai@gmail.com', NULL, NULL, NULL, '7986543210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL, NULL, NULL, '$2y$12$vm2mRyIiBkX6mlc0T27t1Ow/Y1JYc2KjTstpwdYHefbDHKhWsiH7C', NULL, '2025-07-01 21:12:42', '2025-07-01 21:12:42', '12345678', NULL),
(59, 'Sachin Kuttappan', NULL, 'sachin-kuttappan', '7045233373', 'skuttappan@gmail.com', NULL, NULL, NULL, '7045233373', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, '0', 1, NULL, NULL, NULL, '$2y$12$oqV00ge7w5qUXfPswnlWTOzqZjK1k9kNFPXGvxkVkYedu/HX092yq', NULL, '2025-07-04 19:11:43', '2025-07-04 19:13:51', '12345678', NULL),
(60, 'jigneshpatel', 'ethics', 'jigneshpatel', '9033426446', 'patel.jignesh2931@gmail.com', NULL, NULL, 'www.xyzcompany.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', NULL, NULL, 'Software Engineer', NULL, '', NULL, '0', 1, NULL, '1', NULL, '$2y$12$E7YNxGn9yhNYHThB5LoebegP3nu1Ghe0NVdi1OGYtxFlF.2HmUVoS', 'BxMb0M7vKWjyJ1WshYAQs4STSyuZXwv5zXvbDoUVgt7uX6w27bUFTP9qirtZ', '2025-07-07 12:57:34', '2025-07-07 13:05:06', '12345678', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE `user_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `document` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_documents`
--

INSERT INTO `user_documents` (`id`, `user_id`, `document`, `status`, `created_at`, `updated_at`) VALUES
(2, 28, '1749979741.pdf', 1, '2025-06-15 03:59:01', '2025-06-15 03:59:01'),
(3, 27, '1750667272.jpg', 1, '2025-06-23 02:57:52', '2025-06-23 02:57:52'),
(4, 27, '1750668290.pdf', 1, '2025-06-23 03:14:50', '2025-06-23 03:14:50'),
(5, 40, '1750692160.pdf', 1, '2025-06-23 09:52:40', '2025-06-23 09:52:40'),
(6, 43, '1750906992.jpeg', 1, '2025-06-25 21:33:12', '2025-06-25 21:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`id`, `user_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(23, '40', '1750701496.jpg', '1', '2025-06-23 17:58:16', '2025-06-23 17:58:16'),
(12, '23', '1749881915.jpeg', '1', '2025-06-14 06:18:35', '2025-06-14 06:18:35'),
(24, '40', '1750701508.jpg', '1', '2025-06-23 17:58:28', '2025-06-23 17:58:28'),
(15, '24', '1749890062.jpeg', '1', '2025-06-14 08:34:22', '2025-06-14 08:34:22'),
(16, '32', '1749903136.jpg', '1', '2025-06-14 12:12:16', '2025-06-14 12:12:16'),
(21, '2', '1750692488.jpeg', '1', '2025-06-23 15:28:08', '2025-06-23 15:28:08'),
(20, '2', '1750692291.jpg', '1', '2025-06-23 15:24:51', '2025-06-23 15:24:51'),
(19, '2', '1750692220.jpg', '1', '2025-06-23 15:23:40', '2025-06-23 15:23:40'),
(22, '2', '1750692747.jpg', '1', '2025-06-23 15:32:27', '2025-06-23 15:32:27'),
(25, '40', '1750701517.jpg', '1', '2025-06-23 17:58:37', '2025-06-23 17:58:37'),
(26, '40', '1750701527.jpg', '1', '2025-06-23 17:58:47', '2025-06-23 17:58:47'),
(27, '40', '1750701548.jpg', '1', '2025-06-23 17:59:08', '2025-06-23 17:59:08'),
(28, '40', '1750701557.jpg', '1', '2025-06-23 17:59:17', '2025-06-23 17:59:17'),
(29, '40', '1750701573.jpg', '1', '2025-06-23 17:59:33', '2025-06-23 17:59:33'),
(30, '40', '1750701584.jpg', '1', '2025-06-23 17:59:44', '2025-06-23 17:59:44'),
(31, '43', '1750906916.jpg', '1', '2025-06-26 03:01:56', '2025-06-26 03:01:56'),
(32, '43', '1750906925.jpg', '1', '2025-06-26 03:02:05', '2025-06-26 03:02:05'),
(33, '43', '1750906932.jpg', '1', '2025-06-26 03:02:12', '2025-06-26 03:02:12'),
(34, '43', '1750906939.jpg', '1', '2025-06-26 03:02:19', '2025-06-26 03:02:19'),
(35, '50', '1751544987.pdf', '1', '2025-07-03 12:16:27', '2025-07-03 12:16:27'),
(36, '50', '1751545002.pdf', '1', '2025-07-03 12:16:42', '2025-07-03 12:16:42'),
(37, '50', '1751545012.pdf', '1', '2025-07-03 12:16:52', '2025-07-03 12:16:52'),
(38, '50', '1751545022.pdf', '1', '2025-07-03 12:17:03', '2025-07-03 12:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `video_galleries`
--

CREATE TABLE `video_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_galleries`
--

INSERT INTO `video_galleries` (`id`, `link`, `is_active`, `created_at`, `updated_at`, `user_id`) VALUES
(15, '1750668219.jpg', 1, '2025-06-23 03:13:39', '2025-06-23 03:13:39', '27'),
(17, '1750701636.jpg', 1, '2025-06-23 12:30:36', '2025-06-23 12:30:36', '40'),
(18, '1750701646.jpg', 1, '2025-06-23 12:30:46', '2025-06-23 12:30:46', '40'),
(19, '1750701653.jpg', 1, '2025-06-23 12:30:53', '2025-06-23 12:30:53', '40'),
(20, '1750701662.jpg', 1, '2025-06-23 12:31:02', '2025-06-23 12:31:02', '40'),
(21, '1750906948.jpg', 1, '2025-06-25 21:32:28', '2025-06-25 21:32:28', '43'),
(22, '1750906955.jpg', 1, '2025-06-25 21:32:35', '2025-06-25 21:32:35', '43'),
(23, '1750906964.jpg', 1, '2025-06-25 21:32:44', '2025-06-25 21:32:44', '43');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `member_id`, `created_at`, `updated_at`) VALUES
(7, 37, 29, '2025-06-15 03:37:04', '2025-06-15 03:37:04'),
(6, 37, 27, '2025-06-15 03:37:00', '2025-06-15 03:37:00'),
(4, 37, 30, '2025-06-15 03:26:37', '2025-06-15 03:26:37'),
(5, 37, 35, '2025-06-15 03:30:51', '2025-06-15 03:30:51'),
(8, 37, 31, '2025-06-15 03:37:14', '2025-06-15 03:37:14'),
(9, 2, 29, '2025-06-19 19:08:26', '2025-06-19 19:08:26'),
(10, 2, 28, '2025-06-22 11:11:47', '2025-06-22 11:11:47');

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
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `company_trainer_list`
--
ALTER TABLE `company_trainer_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_company_id` (`company_id`),
  ADD KEY `fk_trainer_id` (`trainer_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_orders`
--
ALTER TABLE `manage_orders`
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
-- Indexes for table `order_dates`
--
ALTER TABLE `order_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `value` (`value`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_old`
--
ALTER TABLE `products_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_enquiries`
--
ALTER TABLE `program_enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_program_enquiries_company_id` (`company_id`);

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
-- Indexes for table `role_infos`
--
ALTER TABLE `role_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_documents_user` (`user_id`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_galleries`
--
ALTER TABLE `video_galleries`
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
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_trainer_list`
--
ALTER TABLE `company_trainer_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

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
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `manage_orders`
--
ALTER TABLE `manage_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_dates`
--
ALTER TABLE `order_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `products_old`
--
ALTER TABLE `products_old`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program_enquiries`
--
ALTER TABLE `program_enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `role_infos`
--
ALTER TABLE `role_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `video_galleries`
--
ALTER TABLE `video_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_trainer_list`
--
ALTER TABLE `company_trainer_list`
  ADD CONSTRAINT `fk_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_trainer_id` FOREIGN KEY (`trainer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_enquiries`
--
ALTER TABLE `program_enquiries`
  ADD CONSTRAINT `fk_program_enquiries_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
