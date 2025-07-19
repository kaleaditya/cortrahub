-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2025 at 12:51 PM
-- Server version: 8.0.38
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atom_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('attom_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:20:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"role-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:6:{i:0;i:1;i:1;i:19;i:2;i:18;i:3;i:17;i:4;i:16;i:5;i:15;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"role-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:20;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"role-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"role-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:12:\"product-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:14:\"product-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:12:\"product-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:14:\"product-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:10:\"Order-Item\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:12:\"Manage Order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:9:\"user-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:3:{s:1:\"a\";i:12;s:1:\"b\";s:19:\"Manage Order Create\";s:1:\"c\";s:3:\"web\";}i:12;a:3:{s:1:\"a\";i:13;s:1:\"b\";s:19:\"Manage Order Delete\";s:1:\"c\";s:3:\"web\";}i:13;a:3:{s:1:\"a\";i:14;s:1:\"b\";s:17:\"Manage Order Edit\";s:1:\"c\";s:3:\"web\";}i:14;a:3:{s:1:\"a\";i:15;s:1:\"b\";s:19:\"Manage Order status\";s:1:\"c\";s:3:\"web\";}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:9:\"Dashboard\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:16:\"Manage Countries\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:13:\"Manage Cities\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:3:{s:1:\"a\";i:19;s:1:\"b\";s:10:\"Demo Excel\";s:1:\"c\";s:3:\"web\";}i:19;a:3:{s:1:\"a\";i:20;s:1:\"b\";s:6:\"Import\";s:1:\"c\";s:3:\"web\";}}s:5:\"roles\";a:7:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:19;s:1:\"b\";s:8:\"Freshers\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:18;s:1:\"b\";s:5:\"Model\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:17;s:1:\"b\";s:8:\"TV Actor\";s:1:\"c\";s:3:\"web\";}i:4;a:3:{s:1:\"a\";i:16;s:1:\"b\";s:5:\"Actor\";s:1:\"c\";s:3:\"web\";}i:5;a:3:{s:1:\"a\";i:15;s:1:\"b\";s:10:\"Film Actor\";s:1:\"c\";s:3:\"web\";}i:6;a:3:{s:1:\"a\";i:20;s:1:\"b\";s:6:\"Singer\";s:1:\"c\";s:3:\"web\";}}}', 1749472032);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int NOT NULL,
  `countries_id` int DEFAULT NULL,
  `city_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `countries_id`, `city_name`, `created_at`, `updated_at`) VALUES
(9, 7, 'Dubai', '2024-11-22 06:43:09', '2024-11-22 06:43:09'),
(10, 7, 'Abu Dhabi', '2024-11-22 06:43:20', '2024-11-22 06:43:20'),
(11, 7, 'Umm Al Quwain', '2024-11-22 06:43:28', '2024-11-22 06:43:28'),
(12, 7, 'Ras Al-Khaimah', '2024-11-22 06:43:45', '2024-11-22 06:43:45'),
(13, 7, 'Sharjah', '2024-11-22 06:43:52', '2024-11-22 06:43:52'),
(14, 7, 'Al Ain', '2024-11-22 06:43:59', '2024-11-22 06:43:59'),
(15, 7, 'Fujairah', '2024-11-22 06:44:09', '2024-11-22 06:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `page_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `description`, `page_title`, `meta_title`, `meta_keywords`, `meta_description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Tempor duis id et cu', 'Et occaecat dolor om', 'zahukis@mailinator.com', 'A earum repudiandae', NULL, 'Ullamco lorem error', 0, '2025-05-26 10:25:14', '2025-05-26 10:25:14'),
(2, 'About Us', 'About ATOM\n\nWe bridge boundaries in Acting and Modeling\n\nWith the advent of the digital era and the rise of numerous television channels and OTT platforms, aspiring actors and models often find themselves struggling to break through the barriers of the industry.  ATOM is an initiative, dedicated to promoting new and fresh talent in acting and modeling founded by a group of seasoned professionals hailing from the field of filmmaking, advertising production, and advertising agencies from India, Dubai, Oman, the UK, and Qatar.\n\nThe entertainment industry has witnessed a surge in demand for fresh talent, driven by the diverse content across various digital platforms. With the advent of OTT (Over-The-Top) platforms, the opportunities for actors and models have grown exponentially.\n\nWe at ATOM recognize the challenge for aspirants to promote their talent in an industry that can seem impenetrable and aims to provide a holistic solution.\n\nThe most significant challenges for aspiring actors and models is the ability to reach auditions and casting calls. Traditional methods often involve physical presence, which can be inconvenient and costly.\n\nWe leverage the power of the internet to break these barriers. By creating an online platform, we facilitate a seamless connection between actors and production houses, enabling actors to be considered for roles across a wide array of projects, irrespective of their location or language proficiency.\n\nOur approach is centered around providing each actor and model with a personal web page on their platform. This webpage serves as a showcase of their talent, featuring photos, videos, and auditions, all easily accessible to industry professionals looking for the right fit for their projects. This approach not only simplifies the casting process but also gives talent an opportunity to shine on a global stage. It empowers them to showcase their abilities, no matter where they come from or what languages they speak. The significance of ATOM\'s mission cannot be understated. By eliminating geographic and linguistic barriers, this initiative paves the way for talented individuals to realize their dreams in the world of acting and modeling.\n\nOur online platform emerges as a beacon of opportunity, ensuring that talent is not bound by borders. It is a revolutionary initiative that caters to the needs of new and aspiring actors and models in the ever-expanding world of entertainment.\n\nWe are reshaping the way talent is discovered, making it more accessible and inclusive.\n\nVision \n\nOur Vision is to empower aspiring actors and models with boundless opportunities. We strive to break down geographical and language barriers, creating a stage where talent knows no boundaries. Our vision is to be the leading catalyst for emerging talent, connecting them with industry professionals and ensuring that every dream has the chance to become a reality.\n\nOur Mission is to provide a dynamic online platform that enables the discovery of new talent in acting and modeling. Our mission is to break the traditional barriers of location and language, making auditions and casting processes simpler and more efficient.', 'fff@dsf.erfe', 'fg', NULL, 'dsa', 1, '2025-05-29 11:09:12', '2025-05-29 11:09:12'),
(3, 'Terms and conditions of use', 'Terms and conditions of use\n1.Prelude\n\n1.1 These terms and conditions shall govern your use of ATOM DIRECTORY.\n\n1.2 By using ATOM DIRECTORY, you accept these terms and conditions in full; accordingly, if you disagree with these terms and conditions or any part of these terms and conditions, you must not use ATOM DIRECTORY.\n\n1.3 If you register with ATOM DIRECTORY, submit any material to ATOM DIRECTORY or use any of ATOM DIRECTORY services, we will ask you to expressly agree to these terms and conditions.\n\n1.4 You must be at least 18 years of age to use ATOM DIRECTORY; by using ATOM DIRECTORY or agreeing to these terms and conditions, you warrant and represent to us that you are at least 18 years of age.\n\n2. Copyright\n\n2.1 Copyright (c) 2012 ATOM DIRECTORY Subject to the express provisions of these terms and conditions: we, together with our licensors, own and control all the copyright and other intellectual property rights in ATOM DIRECTORY and the material on ATOM DIRECTORY; and all the copyright and other intellectual property rights in ATOM DIRECTORY and the material on ATOM DIRECTORY are reserved. Website Usage License\n\nYou may:\n\n(a)view pages from ATOM DIRECTORY in a web browser\n\n(b)download pages from ATOM DIRECTORY for caching in a web browser\n\n(c) print pages from ATOM DIRECTORY; stream audio and video files from ATOM DIRECTORY and\n\n(d) use  ATOM DIRECTORY by means of a web browser, subject to the other provisions of these terms and conditions.\n\n3. Downloads and Application\n\n3.1 You must not download any material from  ATOM DIRECTORY or save any such material to your computer.\n\n3.2 You may only use  ATOM DIRECTORY for [your own personal and business purposes], and you must not use ATOM DIRECTORY for any other purposes.\n\n3.3 Except as expressly permitted by these terms and conditions, you must not edit or otherwise modify any material on ATOM DIRECTORY.\n\n3.4 Unless you own or control the relevant rights in the material, you must not:\n\n(a) republish material from ATOM DIRECTORY (including republication on another website);\n\n(b)sell, rent or sub-license material from  ATOM DIRECTORY;\n\n(c)show any material from  ATOM DIRECTORY in public;\n\n(d)exploit material from  ATOM DIRECTORY for a commercial purpose; or\n\n(e)redistribute material from  ATOM DIRECTORY\n\n3.5 Notwithstanding Section\n\n3.6, you may redistribute our newsletter in print and electronic form to any person.\n\n3.7 We reserve the right to restrict access to areas of ATOM DIRECTORY, or indeed our whole website, at our discretion; you must not circumvent or bypass, or attempt to circumvent or bypass, any access restriction measures on ATOM DIRECTORY.\n\n4. Acceptable Usage Policy\n\n4.1 You must not:\n\n(a) use  ATOM DIRECTORY in any way or take any action that causes, or may cause, damage to the website or impairment of the performance, availability or accessibility of the website;\n\n(b) use  ATOM DIRECTORY in any way that is unlawful, illegal, fraudulent or harmful, or in connection with any unlawful, illegal, fraudulent or harmful purpose or activity;\n\n(c) use  ATOM DIRECTORY to copy, store, host, transmit, send, use, publish or distribute any material which consists of (or is linked to) any spyware, computer virus, Trojan horse, worm, keystroke logger, rootkit or other malicious computer software;\n\n(d) Conduct any systematic or automated data collection activities (including without limitation scraping, data mining, data extraction and data harvesting) on or in relation to  ATOM DIRECTORY without our express written consent];\n\n(e) Access or otherwise interact with ATOM DIRECTORY using any robot, spider or other automated means[, except for the purpose of search engine indexing;\n\n(f) Violate the directives set out in the robots.txt file for  ATOM DIRECTORY or \n\n(g) Use data collected from ATOM DIRECTORY for any direct marketing activity (including without limitation email marketing, SMS marketing, telemarketing and direct mailing).\n\n4.2 You must ensure that all the information you supply to us through ATOM DIRECTORY, or in relation to ATOM DIRECTORY, is true, accurate, current, complete, and non-misleading.\n\n5. Use on behalf of the organization\n\n5.1 If you use ATOM DIRECTORY or expressly agree to these terms and conditions in the course of a business or other organizational project, then by so doing you bind both: yourself; and the person, company or other legal entity that operates that business or organizational project, to these terms and conditions, and in these circumstances references to \"you\" in these terms and conditions are to both the individual user and the relevant person, company or legal entity, [unless the context requires otherwise] OR [except that [specify exceptions]].\n\n6. Registration and accounts\n\n6.1 To be eligible for an account on ATOM DIRECTORY under this Section 6, you must [be resident or situated in India.\n\n6.2 You may register for an account with ATOM DIRECTORY by completing and submitting the account registration form on ATOM DIRECTORY, and clicking on the verification link in the email that the website will send to you].\n\n6.3 You must not allow any other person to use your account to access the website.\n\n6.4 You must notify us in writing immediately if you become aware of any unauthorized use of your account. You must not use any other person\'s account to access the website, unless you have that person\'s express permission to do so.\n\n7. Login\n\n7.1 If you register for an account with ATOM DIRECTORY, We will provide you with OR you will be asked to choose a user ID and password.\n\n7.2 Your user ID must not be liable to mislead and must comply with the content rules set out in Section 16; you must not use your account or user ID for or in connection with the impersonation of any person.\n\n7.3 You must keep your password confidential.\n\n7.4 You must notify us in writing immediately if you become aware of any disclosure of your password.\n\n7.5 You are responsible for any activity on ATOM DIRECTORY arising out of any failure to keep your password confidential and may be held liable for any losses arising out of such a failure.\n\n8. Cancellation and suspension of account\n\n8.1 We may: suspend your account; cancel your account; and/or (c) edit your account details, at any time in our sole discretion without notice or explanation, providing that if we cancel any services you have paid for and you have not breached these terms and conditions, we will refund to you a pro-rata amount of your payment, such amount to be calculated by us using any reasonable methodology.\n\n8.2 You may cancel your account on ATOM DIRECTORY by sending an email from your official email id . But you will not be entitled to any refund if you cancel your account.\n\n9. Directory\n\n9.1 We welcome submissions to the directory published on ATOM DIRECTORY\n\n9.2 Each submission to our directory must be a listing with respect to your profession only.\n\n9.3 For the avoidance of doubt, your directory submissions constitute \"your content\" for the purposes of Section 15 and Section 16, and must comply with the acceptable use rules set out in Section 4.\n\n9.4 You must keep your directory submissions up to date my sending updation emails to support@ATOM DIRECTORY only..\n\n10. Free directory listings\n\n10.1 You may submit a free listing to our directory by following this process:\n\n10.2 If we accept your free directory listing submission if you send the details to our official email mr@ATOM DIRECTORY. Anything sent by mobile messages and/or Whatsapp messages won\'t be acceptable. For us to accept it on WhatsApp, you need to send us an email from the business email id you provide in your listing stating acceptance of our terms and conditions of the registration procedure. \n\n10.3 it will remain published on ATOM DIRECTORY for a period of 1 year OR for the relevant period set out on ATOM DIRECTORY, subject to termination or deletion in accordance with these terms and conditions.\n\n10.4 We may delete a free directory listing at any time, with or without notice to you.\n\n10.5 You will have one opportunity to identify and correct input errors prior to publishing on the website. You can request for the rectification by your official email id to the official email id of  info@atomdirectory.com\n\n11. Paid directory listings\n\n11.1 You may submit a paid listing to our directory by following this process:\n\n11.2 You will have the opportunity to identify and correct input errors prior to making your order and are entitled to corrections and modifications once every month. But these corrections and modifications will be at the sole discretion of ATOM DIRECTORY.\n\n11.2a  ATOM DIRECTORY reserves the right to publish or not publish without providing any reason for the same.\n\n11.3 Paid submissions include the following benefits:\n\n11.4 If we accept a paid directory submission, it will remain published on our website for a minimum period of 1 year OR for the relevant period specified on ATOM DIRECTORY subject to termination or deletion in accordance with these terms and conditions.\n\n11.5 We may delete a paid directory listing at any time, providing that if we delete a paid listing in accordance with this Section 11.5 before the end of the period in respect of which listing fees have been paid, we will refund to you a prorated portion of those listing fees reflecting the unexpired listing period, such amount to be calculated by us using any reasonable methodology.\n\n12. Prohibited directory submissions\n\n12.1 Without prejudice to our other rights under these terms and conditions, we reserve the right to reject or delete directory submissions that breach these terms and conditions[, or that do not meet the additional guidelines for submissions published on ATOM DIRECTORY.\n\n12.2 If we reject or delete a directory submission in accordance with this Section 12, we will not refund any applicable charges.\n\n13. Fees\n\n13.1 The fees in respect of ATOM DIRECTORY services will be as set out on the website from time to time.\n\n13.2 All amounts stated in these terms and conditions or on ATOM DIRECTORY are stated including of G.S.T\n\n13.3 You must pay to us the fees in respect of ATOM DIRECTORY services in advance, uncleared funds, in accordance with any instructions on ATOM DIRECTORY.\n\n13.4 We may vary fees from time to time by posting new fees on ATOM DIRECTORY, but this will not affect fees for services that have been previously paid.\n\n13.5 If you dispute any payment made to us, you must contact us immediately and provide full details of your claim. All disputes subject to Mumbai Jurisdiction Only. \n\n13.6\n\n(a) If you make an unjustified credit card, debit card or other charge-back then you will be liable to pay us, within [7 days] following the date of our written request: an amount equal to the amount of the charge-back;\n\n(b) all third party expenses incurred by us in relation to the charge-back (including charges made by our or your bank or payment processor or card issuer); (c ) an administration fee of INR Rs.500 excluding GST; and all our reasonable costs, losses and expenses incurred in recovering the amounts referred to in this Section 13.6 (including without limitation legal fees and debt collection fees), and for the avoidance of doubt, if you fail to recognize or fail to remember the source of an entry on your card statement or other financial statements, and make a charge-back as a result, this will constitute an unjustified charge-back for the purposes of this Section 13.6.\n\n13.7 If you owe us any amount under or relating to these terms and conditions, we may suspend or withdraw the provision of services to you.\n\n13.8 We may at any time set off any amount that you owe to us against any amount that we owe to you, by sending you written notice of the set-off.\n\n14. Our role\n\n14.1 You acknowledge that:\n\n(a)we do not confirm the identity of website users, check their creditworthiness or bona fides, or otherwise vet them;\n\n(b) we do not check, audit or monitor the information contained in advertisements or listings;\n\n(c) we are not a party to any contract for the sale or purchase of [products, digital products or services advertised or listed on the website];\n\n(d) we are not involved in any transactions between website users in any way;\n\n(e) we are not the agents for any website users, and accordingly, we will not be liable to any person in relation to any contract or other arrangement between website users; furthermore, we are not responsible for the enforcement of any contractual obligations arising out of a contract between website users and we will have no obligation to mediate between the parties to any such contract.\n\n14.2 The provisions of this Section 14 are subject to Section 19.1.\n\n15. Your content: license\n\n15.1 In these terms and conditions, \"your content\" means [all works and materials (including without limitation text, graphics, images, audio material, video material, audio-visual material, scripts, software and files) that you submit to us or ATOM DIRECTORY for storage or publication on, processing by, or transmission via, ATOM DIRECTORY.\n\n15.2 You grant to us a worldwide, irrevocable, non-exclusive, royalty-free license to use, reproduce, store, adapt, publish, translate and distribute your content in any existing or future media OR reproduce, store and publish your content on and in relation to this website and any successor website OR reproduce, store and, with your specific consent, publish your content on and in relation to this website.\n\n15.3 You grant us the right to sub-license the rights licensed under Section 15.2.\n\n15.4 You grant to us the right to bring an action for infringement of the rights licensed under Section 15.2.\n\n15.5 You hereby waive all your moral rights in your content to the maximum extent permitted by applicable law; and you warrant and represent that all other moral rights in your content have been waived to the maximum extent permitted by applicable law.\n\n15.6 You may be allowed to put in a request for modification of your content to the extent permitted using the editing functionality made available on ATOM DIRECTORY.\n\n15.7 Without prejudice to our other rights under these terms and conditions, if you breach any provision of these terms and conditions in any way, or if we reasonably suspect that you have breached these terms and conditions in any way, we may delete, unpublish or edit any or all of your content.\n\n16. Your content: rules\n\n16.1 You warrant and represent that your content will comply with these terms and conditions.\n\nAcceptance \n\nBy sending us your details from your official email id to info@atomdirectory.com,  means that you legally acknowledge that you agree to our terms and conditions and and accept your details to be furnished on ATOM DIRECTORY on the terms and conditions laid out by the management of ATOM DIRECTORY', 'sdf@sdrg.drg', 'Terms and conditions of use', NULL, 'gvsddg', 1, '2025-05-29 11:09:56', '2025-05-29 11:09:56'),
(4, 'Privacy Statement', 'Privacy Statement\r\nifid.in collects and uses personal data as needed in order for us to provide you services and support. Your personal data includes information such as:\r\n\r\nName\r\n\r\nAddress\r\n\r\nPhone number\r\n\r\nEmail address\r\n\r\nsocial media links like Facebook, Instagram or any other popular platform that you promote yourself on. But this is at the sole discretion of ifid.in to publish or not publish the link to the social media platform.\r\n\r\nOther data that could directly or indirectly identify you\r\n\r\nOur Privacy Policy will explain to you what data we collect, and how we use your personal data. You can access, but you need to contact us on info@atomdirectory.com to update, delete or otherwise take control of the personal data that we have collected from you on our official email id \r\n\r\nWhat data is collected?\r\n\r\nMost of your personal data is collected from you when:\r\n\r\nYou sign up for our services ( free or paid);\r\n\r\nYou request assistance from our customer support team;\r\n\r\nYou complete surveys, subscribe to newsletters, or request other information from us;\r\n\r\nYou participate in contests, apply for a job, or participate in activities where we may require information about you.\r\n\r\nIn order to deliver the best Services to you, we may collect the following information:\r\n\r\nAccount related information is collected when you sign up for our Services. This information may include your name, address, phone number, email address, social media links etc.\r\n\r\nService Usage Data is automatically collected when you interact with our Services. This information may include data about your interactions with the features, content and links contained in our Services, time of interaction, browser type and configuration, operating system used, IP address, language preferences, and other cookie data. While none of this data will allow us to directly identify who you are, some of this data can be used to approximate your location. \r\n\r\nSupplementary Data may be received about you from third party sources, such as public databases. We may combine this data with the information we already have about you in order to maintain the accuracy of our records, and provide products and services that you may be interested in.\r\n\r\nHow we use data\r\n\r\nWe believe in minimizing the data we collect. We will only use your data when we have been given permission to do so, when it is needed to deliver the Services that you have purchased, or for legal compliance or other lawful purposes. These usages include:\r\n\r\nDelivering, updating, and improving the Services that we provide to you. We collect various data relating to your purchase, use, and interactions with our Services. We use this data to:\r\n\r\nImprove and optimize the performance of our Services\r\n\r\nIdentify and investigate security risks, errors, problems, and needed enhancements to our Services\r\n\r\nDetect and prevent fraud and abuse of our Services\r\n\r\nCollect statistics about the use of our Services\r\n\r\nAnalyze how you use our Services and which of our Services are most relevant to you\r\n\r\nMost of the data that we collect is statistical data about how people use our Services and is not linked to any personal data.\r\n\r\nSharing with trusted third parties. \r\n\r\nWe may share your personal data with affiliated companies within our corporate family and with trusted third-party service providers in order for them to perform certain tasks on our behalf.\r\n\r\nThis may include:\r\n\r\nProcessing credit card payments\r\n\r\nDelivering content and communications to you (such as email)\r\n\r\nAnalyzing Service usage and customer demographics\r\n\r\nServing advertisements\r\n\r\nConducting surveys or contests\r\n\r\nManaging customer relationships\r\n\r\nWe only share what is needed for the third party to perform the tasks on our behalf. These third parties are prohibited from using, sharing, or keeping your personal data for any other purpose, and are bound to strict data processing terms and conditions.\r\n\r\nCommunicating with you. We may contact you directly or through a third-party service provider regarding the Services that you have purchased or subscribed to. We may also contact you with offers for additional services if you give us consent, or when it is allowed based on legitimate interests. The methods of contact may include:\r\n\r\nEmail\r\n\r\nPhone calls\r\n\r\nText messages\r\n\r\nYou may update your newsletter subscription preferences by contacting us as described in the \"Contact Us\" section below.\r\n\r\nWebsite analytics. We use various third party web analytics tools such as Google Analytics to collect information on how you interact with our website. This data may include information on which pages you visit, how much time you spend on each page, which operating system and browser you use, and geographic location information. These tools will place cookies in your browser for this purpose which can only be used by the service provider. The data collected may be transmitted to and stored by these service providers in a country other than where you reside. This information does not include personal data such as names, address, email addresses, etc, and will be stored and used in accordance with their own privacy policies. \r\n\r\nTargeted Advertisements. Our third party partners may use technologies such as cookies to gather information regarding your activities on our web pages and other websites in order to provide you with advertising based on your interests, and to measure the effectiveness of the advertisements.\r\n\r\nCompliance with legal, regulatory, and law enforcement requests. We cooperate with law enforcement and government officials and private parties to comply with the law. We will, in our sole discretion, disclose any information about you to such parties as necessary to respond to claims and legal processes, to protect our property and rights or the property and rights of a third party, to protect the safety of the public or an individual, or to prevent or stop illegal or unethical activity.\r\n\r\nIf we are legally permitted to do so, we will take reasonable steps to notify you in the event we are required to provide your information to third parties as part of a legal process.\r\n\r\nWe will share your information as necessary to comply with ICANN or ccTLD regulations and policies when you register a domain name with us.\r\n\r\nHow we secure and retain data\r\n\r\nWe follow generally accepted standards to collect, store and protect personal data, including the use of encryption. We retain personal data for as long as it is needed to provide the Services you have requested, and thereafter for legal and business purposes. These may include retention periods:\r\n\r\nMandated by legal, contractual, or similar obligations;\r\n\r\nFor resolving, preserving, enforcing or defending our legal and contractual rights;\r\n\r\nNeeded to maintain adequate and accurate business and financial records.\r\n\r\nHow you can access, update, or delete your data\r\n\r\nYou can access, view and update your personal data by signing into your account and visiting \"My Account\". If you are unable to access \"My Account\" for any reason, you may contact us as described in the \"Contact Us\" section below.\r\n\r\nIf you make a request to delete your personal data, that request will be honored only to the extent where the data is no longer needed for the Services you have purchased, or when it is no longer required for our business, legal or contractual record keeping requirements.\r\n\r\nAge restrictions\r\n\r\nOur Services are only available for purchase for those who are over the age of 19. Our Services are not designed to target, entice, or consumed by individuals under the age of 19. If you know of or have reason to believe someone under the age of 19 has provided us with any personal data, please contact us.\r\n\r\nChanges to our Privacy Policy\r\n\r\nWe reserve the right to modify this Privacy Policy at any time. Please review this document from time to time so that you are aware of what information we collect and how we use it.\r\n\r\n \r\n\r\nContact us\r\n\r\nIf you have any questions or concerns regarding our Privacy Policy, you may contact us by:\r\n\r\nEmail: info@atomdirectory.com\r\n\r\nPhone: +971 522656679\r\n\r\nWe will respond to all requests within 7 days.', 'd@asd.gr', 'er', NULL, 'ewr', 1, '2025-05-29 11:10:26', '2025-05-29 11:10:26'),
(5, 'Registration Process', 'Registration Process\r\nIf you would like to register free / paid with us please send us the following details Professional Name, Screen Age, Email id, Mobile Number, Facebook Link, Instagram Link, Whatsapp Number on the info@atomdirectory.com OR register with us on the online form and we will revert to you on the email id provided by you. \r\n\r\nPlease note :\r\n\r\nAny data sent on WhatsApp will be accepted, after the receipt of an email from your business email mentioned in your listing following acceptance to put data on the website.\r\n\r\nPlease note that The email cannot be different from the one you are putting on your data on the website.\r\n\r\nFor all types of  memberships\r\n\r\nPlease go through our\r\n\r\nTerms and Conditions Page : https://atomdirectory.com/Termsandconditions\r\n\r\nRegistration Procedure Page : https://atomdirectory.com/Registrationprocedures.\r\n\r\n \r\n\r\nPlease copy and paste the below-given content on your personal email body and send it to us on info@atomdirectory.com\r\n\r\n\" I, ( Please put your name here) have read and accepted the terms and conditions mentioned in the terms and condition page ( https://atomdirectory.com/Termsandconditions ) of the website and also terms mentioned in the registration process page https://atomdirectory.com/Registrationprocedures.\r\n\r\nPlease Note:\r\n\r\natomdirectory.com is not a casting or coordination agency. We do not take commissions for assignments that you get.\r\n\r\nImportant Note : \r\n\r\nYour contact details like phone number, email id, etc can be updated by sending an email on info@atomdirectory.com\r\n\r\n Free Membership: ( No fees, only one category listing allowed and no login )\r\nYour portfolio \r\nImportant Note: 1 photo in the size of 375x375 pixels. if you don\'t send it in the size specified it won\'t be edited and hence your request for membership will be rejected. Audition videos ( Only for new faces).\r\n\r\nImportant Note: One audition video should be a video link from your own channel. The link of any other person/company won\'t be accepted. The video will be downloaded and uploaded to our own channel ) \r\n\r\nYour bio-data on PDF document\r\nImportant Note: This has to be in PDF format only. We won\'t be doing the conversion from Word or any other text document. If it is provided in any other format we will be upload as is without any error editing. \r\n\r\n \r\n\r\nPaid Memberships:\r\nLevel One Membership Benefits ( Most Economical, Two Categories allowed) : ( Rs.3000 per year excluding GST)\r\nYour portfolio ( 8 to 10 photos suggested). 450x300-Required size . We will do the photo size editing for you. Can be updated Every Month\r\nWork videos  ( 4 videos suggested) or 1 audition videos ,A video link from your own channel. The link of any other person/company won\'t be accepted. The video will be downloaded and uploaded to our own channel but with prior permission from you on email from info@atomdirectory.com.\r\nPDF/Word document of your bio-data.( As a service we will convert this to PDF format)\r\n \r\nAdditional Benefits\r\n1. Atleast one paid assignment guaranteed in a year**\r\n\r\nLevel Two Membership Benefits ( Most Popular, Four Categories allowed) : ( Rs.8000 per year including GST) \r\nYour portfolio ( 8 to 10 photos suggested). Any size. We will do the photo size editing for you\r\nWork videos  ( 4 videos suggested) and 1 audition videos. The video link should be from your own channel. The link of any other person/company won\'t be accepted. The video will be downloaded and uploaded to our own channel but with prior permission from you on email from info@atomdirectory.com\r\nPDF/Word document of your bio-data.( As a service we will convert this to PDF format) \r\nAdditional Benefits\r\n\r\nYour own domain name www.yourname.in which be redirected to your page on ifid.in ( Please note that website and server space not included )\r\n\r\nFree One Minute Showreel Video of your work put together ( Will be updated every year on renewal of memberships. You will have to provide the showreel to us. Editing and modification will be charged extra)\r\n\r\nOne Business Card Design with QR code linked to. your page ( Only one free option)\r\n\r\nAtleast one paid assignment guaranteed in a year**.\r\n\r\nPremium Membership (5-year membership) ( Most suggested for experienced professionals, Unlimited categories allowed)\r\n(Rs.50000/- for 5 years including GST)\r\nYour portfolio ( 8 to 10 photos suggested). Any size. We will do the photo size editing for you\r\nWork videos  ( unlimited videos ) .The video links must be from your own channel. The link of any other person/company won\'t be accepted. The video will be downloaded and uploaded to our own channel but with prior permission from you on email from info@atomdirectory.com.\r\nPDF/Word document of your bio-data.( As a service we will convert this to PDF format) \r\nAdditional Benefits\r\nA Free domain name ( www.yourname.xyz), 1GB server space  ( Free Only for the first year. You will have to pay a nominal amount as per the prevailing rate for domain name and server space at that particular time as billed by the hosting company. Alternately you can also provide your own domain name and server space details at the time of renewal in the following year or continue with us).\r\nYour own word press website ( Home, About, PhotoGallery, Video Gallery, Blog Page, Social Media Links, Contact Page).We will provide free online training and support to manage your own website for one year.\r\nFree Showreel Video ( maximum duration 60 seconds) of your work put together ( Will be updated every year on renewal of memberships. You will have to provide the showreel to us. Editing and modification will be charged extra)\r\nOne Business Card Design with details ( Only one free option) \r\nAtleast one paid assignment guaranteed in a year**.\r\n\r\n\r\n***Paid assigments depends on client to client and the amount cannot be guaranteed.', 'sd@sdfl.etw', 'rwe', NULL, 'sa', 1, '2025-05-29 11:10:59', '2025-05-29 11:10:59'),
(6, 'Feedback Form', 'Feedback Form\r\nThe success of any business lies in a positive user experience; you our target audience simply won’t interact with us if you don’t enjoy doing so.We want to provide the best user experience, so we are actively listening to you; our users.We know that the only way to foster a positive user experience and improve our business is by maintaining a continuous dialogue with our valued audience.\r\n\r\nWe have put lots of time, money and effort into building this website and it’s easy for us to be biased and assume that everything’s perfect. But the fact is, we can’t know everything. We might not see the flaws that others do, so it is vital to get feedback from you our valued patronswho are actually using our site.\r\n\r\nThank you for your valuable time to give us feedbacl.Alternately you can also email us on info@atomdirectory.com or call us', 'sfd@fg.fsd', 'df', NULL, 'sdf', 1, '2025-05-29 11:11:40', '2025-05-29 11:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `country_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1' COMMENT '1=active ,0=inactive',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(2, 'Albania', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(3, 'Algeria', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(4, 'Andorra', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(5, 'Angola', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(6, 'Antigua and Barbuda', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(7, 'Argentina', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(8, 'Armenia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(9, 'Australia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(10, 'Austria', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(11, 'Azerbaijan', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(12, 'Bahamas', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(13, 'Bahrain', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(14, 'Bangladesh', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(15, 'Barbados', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(16, 'Belarus', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(17, 'Belgium', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(18, 'Belize', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(19, 'Benin', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(20, 'Bhutan', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(21, 'Bolivia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(22, 'Bosnia and Herzegovina', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(23, 'Botswana', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(24, 'Brazil', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(25, 'Brunei', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(26, 'Bulgaria', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(27, 'Burkina Faso', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(28, 'Burundi', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(29, 'Cabo Verde', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(30, 'Cambodia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(31, 'Cameroon', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(32, 'Canada', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(33, 'Central African Republic', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(34, 'Chad', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(35, 'Chile', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(36, 'China', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(37, 'Colombia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(38, 'Comoros', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(39, 'Costa Rica', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(40, 'Côte d’Ivoire', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(41, 'Croatia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(42, 'Cuba', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(43, 'Cyprus', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(44, 'Czechia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(45, 'Democratic Republic of the Congo', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(46, 'Denmark', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(47, 'Djibouti', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(48, 'Dominica', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(49, 'Dominican Republic', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(50, 'Ecuador', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(51, 'Egypt', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(52, 'El Salvador', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(53, 'Equatorial Guinea', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(54, 'Eritrea', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(55, 'Estonia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(56, 'Eswatini', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(57, 'Ethiopia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(58, 'Fiji', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(59, 'Finland', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(60, 'France', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(61, 'Gabon', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(62, 'Gambia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(63, 'Georgia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(64, 'Germany', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(65, 'Ghana', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(66, 'Greece', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(67, 'Grenada', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(68, 'Guatemala', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(69, 'Guinea', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(70, 'Guinea-Bissau', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(71, 'Guyana', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(72, 'Haiti', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(73, 'Honduras', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(74, 'Hungary', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(75, 'Iceland', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(76, 'India', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(77, 'Indonesia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(78, 'Iran', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(79, 'Iraq', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(80, 'Ireland', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(81, 'Israel', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(82, 'Italy', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(83, 'Jamaica', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(84, 'Japan', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(85, 'Jordan', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(86, 'Kazakhstan', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(87, 'Kenya', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(88, 'Kiribati', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(89, 'Kosovo', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(90, 'Kuwait', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(91, 'Kyrgyzstan', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(92, 'Laos', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(93, 'Latvia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(94, 'Lebanon', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(95, 'Lesotho', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(96, 'Liberia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(97, 'Libya', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(98, 'Liechtenstein', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(99, 'Lithuania', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(100, 'Luxembourg', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(101, 'Madagascar', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(102, 'Malawi', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(103, 'Malaysia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(104, 'Maldives', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(105, 'Mali', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(106, 'Malta', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(107, 'Marshall Islands', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(108, 'Mauritania', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(109, 'Mauritius', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(110, 'Mexico', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(111, 'Micronesia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(112, 'Moldova', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(113, 'Monaco', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(114, 'Mongolia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(115, 'Montenegro', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(116, 'Morocco', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(117, 'Mozambique', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(118, 'Myanmar', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(119, 'Namibia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(120, 'Nauru', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(121, 'Nepal', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(122, 'Netherlands', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(123, 'New Zealand', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(124, 'Nicaragua', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(125, 'Niger', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(126, 'Nigeria', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(127, 'North Korea', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(128, 'North Macedonia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(129, 'Norway', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(130, 'Oman', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(131, 'Pakistan', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(132, 'Palau', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(133, 'Panama', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(134, 'Papua New Guinea', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(135, 'Paraguay', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(136, 'Peru', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(137, 'Philippines', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(138, 'Poland', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(139, 'Portugal', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(140, 'Qatar', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(141, 'Romania', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(142, 'Russia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(143, 'Rwanda', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(144, 'Saint Kitts and Nevis', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(145, 'Saint Lucia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(146, 'Saint Vincent and the Grenadines', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(147, 'Samoa', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(148, 'San Marino', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(149, 'Sao Tome and Principe', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(150, 'Saudi Arabia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(151, 'Senegal', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(152, 'Serbia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(153, 'Seychelles', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(154, 'Sierra Leone', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(155, 'Singapore', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(156, 'Slovakia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(157, 'Slovenia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(158, 'Solomon Islands', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(159, 'Somalia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(160, 'South Africa', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(161, 'South Korea', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(162, 'South Sudan', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(163, 'Spain', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(164, 'Sri Lanka', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(165, 'Sudan', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(166, 'Suriname', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(167, 'Sweden', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(168, 'Switzerland', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(169, 'Syria', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(170, 'Tajikistan', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(171, 'Tanzania', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(172, 'Thailand', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(173, 'Timor-Leste', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(174, 'Togo', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(175, 'Tonga', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(176, 'Trinidad and Tobago', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(177, 'Tunisia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(178, 'Turkey', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(179, 'Turkmenistan', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(180, 'Tuvalu', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(181, 'Uganda', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(182, 'Ukraine', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(183, 'United Arab Emirates', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(184, 'United Kingdom', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(185, 'United States of America', '0', '2025-05-25 10:23:34', '2025-05-26 15:08:31'),
(186, 'Uruguay', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(187, 'Uzbekistan', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(188, 'Vanuatu', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(189, 'Vatican City', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(190, 'Venezuela', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(191, 'Vietnam', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(192, 'Yemen', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(193, 'Zambia', '1', '2025-05-25 10:23:34', '2025-05-25 10:23:34'),
(194, 'Zimbabwe', '0', '2025-05-25 10:23:34', '2025-05-26 15:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Atom Directory', 1, '2025-05-25 05:00:23', '2025-05-25 08:25:05'),
(2, 'Film Industrial', 1, '2025-05-25 05:00:23', '2025-05-25 05:00:23'),
(3, 'TVCs', 1, '2025-05-25 05:00:23', '2025-05-25 05:00:23'),
(4, 'Feature Films', 1, '2025-05-25 05:00:23', '2025-05-25 05:00:23'),
(5, 'Documentaries', 1, '2025-05-25 05:00:23', '2025-05-25 05:00:23'),
(6, 'Corporate Videos', 1, '2025-05-25 05:00:23', '2025-05-25 05:00:23'),
(7, 'Music Videos', 1, '2025-05-25 05:00:23', '2025-05-25 05:00:23'),
(8, 'Short Films', 1, '2025-05-25 05:00:23', '2025-05-25 05:00:23'),
(9, 'Training Videos', 1, '2025-05-25 05:00:23', '2025-05-25 05:00:23'),
(10, 'Animation Projects', 0, '2025-05-25 05:00:23', '2025-05-26 09:42:16'),
(11, 'Live Streaming', 1, '2025-05-25 05:00:23', '2025-05-25 05:00:23'),
(12, 'Product Demos', 1, '2025-05-25 05:00:23', '2025-05-25 05:00:23'),
(13, 'Social Media Ads', 1, '2025-05-25 05:00:23', '2025-05-25 05:00:23'),
(14, 'VR Experiences', 0, '2025-05-25 05:00:23', '2025-05-26 09:42:21'),
(15, 'Event Coverage', 1, '2025-05-25 05:00:23', '2025-05-25 05:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Mandarin Chinese', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(2, 'Spanish', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(3, 'English', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(4, 'Hindi', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(5, 'Bengali', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(6, 'Portuguese', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(7, 'Russian', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(8, 'Japanese', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(9, 'Lahnda (Punjabi)', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(10, 'Marathi', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(11, 'Telugu', 0, '2025-05-25 04:55:43', '2025-05-26 09:45:07'),
(12, 'Wu Chinese', 0, '2025-05-25 04:55:43', '2025-05-26 09:45:14'),
(13, 'Turkish', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(14, 'Korean', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(15, 'French', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(16, 'German', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(17, 'Vietnamese', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(18, 'Tamil', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(19, 'Yue Chinese (Cantonese)', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43'),
(20, 'Urdu', 1, '2025-05-25 04:55:43', '2025-05-25 04:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `manage_orders`
--

CREATE TABLE `manage_orders` (
  `id` int NOT NULL,
  `client_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `associate_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `coustomer_service_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `warehouse_team_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dispatch_team_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dispatched_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tracking_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `signed_pod` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
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
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 11),
(4, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 12),
(5, 'App\\Models\\User', 6),
(5, 'App\\Models\\User', 10),
(15, 'App\\Models\\User', 13);

-- --------------------------------------------------------

--
-- Table structure for table `order_dates`
--

CREATE TABLE `order_dates` (
  `id` int NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
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
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
('devang@mailinator.com', '$2y$12$detejdhuRASfr4Rh9XwqvuXW1DyOFUj6fY1VbdY5z/C4TDe/Xaop.', '2024-10-04 01:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'werwerwe', 0, '2025-05-24 11:15:50', '2025-05-26 09:47:51'),
(2, 'ty', 1, '2025-05-24 11:16:32', '2025-05-26 09:47:47'),
(3, 'd', 1, '2025-05-24 11:19:17', '2025-05-24 11:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `products_old`
--

CREATE TABLE `products_old` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-08-30 05:36:53', '2024-08-30 05:36:53'),
(19, 'Freshers', 'web', '2025-05-29 09:55:07', '2025-05-29 09:55:07'),
(18, 'Model', 'web', '2025-05-29 09:54:18', '2025-05-29 09:54:18'),
(17, 'TV Actor', 'web', '2025-05-29 09:53:33', '2025-05-29 09:53:33'),
(16, 'Actor', 'web', '2025-05-29 09:52:57', '2025-05-29 09:52:57'),
(15, 'Film Actor', 'web', '2025-05-29 09:51:47', '2025-05-29 09:51:47'),
(20, 'Singer', 'web', '2025-06-08 06:57:13', '2025-06-08 06:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 11),
(1, 12),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(2, 1),
(2, 13),
(2, 14),
(2, 20),
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
(10, 3),
(10, 4),
(10, 5),
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
(14, 3),
(14, 12),
(14, 13),
(15, 4),
(15, 5),
(15, 12),
(15, 13),
(16, 1),
(16, 2),
(16, 3),
(16, 6),
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
  `id` bigint UNSIGNED NOT NULL,
  `role_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_kewords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_infos`
--

INSERT INTO `role_infos` (`id`, `role_id`, `slug`, `image`, `meta_title`, `meta_kewords`, `meta_description`, `short_order`, `is_active`, `created_at`, `updated_at`) VALUES
(18, '16', 'actor', '1748532178.png', 'Actor', 'Actor', 'Actor', NULL, 1, '2025-05-29 09:52:58', '2025-05-29 09:53:41'),
(21, '19', 'freshars', '1748532307.png', 'Freshers', 'Freshers', 'Freshers', NULL, 1, '2025-05-29 09:55:07', '2025-05-29 09:55:28'),
(20, '18', 'models', '1748532258.png', 'Model', 'Model', 'Model', NULL, 1, '2025-05-29 09:54:18', '2025-05-29 09:55:21'),
(19, '17', 'tv-actor', '1748532213.png', 'TV Actor', 'TV Actor', 'TV Actor', NULL, 1, '2025-05-29 09:53:33', '2025-05-29 09:53:46'),
(17, '15', 'film-actor', '1748532107.png', 'Film Actor', 'Film Actor', 'Film Actor', NULL, 1, '2025-05-29 09:51:47', '2025-05-29 09:52:09'),
(16, '1', 'earum', '1748248016.png', 'Earum excepturi in e', 'Voluptatem Nesciunt', 'Laborum Sed non ist', NULL, 0, '2025-05-26 02:56:56', '2025-05-26 02:56:56'),
(22, '20', NULL, '1749385633.png', 'Singer', 'Singer, Fresh Singer', 'Singers who are new and fresh', NULL, 1, '2025-06-08 06:57:13', '2025-06-08 06:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('vCbq8YOiqZVhZzYZgRXiHCLYXOl6vq9y1liufDxL', 2, '92.97.99.78', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiM1U1WWVhT2Zqd2dscUxMRVBWUk9HYVhtaGFhY0xOM0xpNTg0dFRMSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vbWVnaHRhdHR2YS5pbi9wdWJsaWMvZGlyZWN0b3J5LWxpc3QvYWN0b3IiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0ODg4NDIyODt9fQ==', 1748884721),
('QTL9Hh04tI8Xr6mMWX8QHd8yluPF1tOae6CcOr7N', NULL, '152.58.61.61', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibThJa3F3cmhpNWJQYkdVQjhuTjdjMTk1dmpnS3ZxR0NDbjhGRmgxMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vbWVnaHRhdHR2YS5pbi9wdWJsaWMvYWJvdXQtdXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1748880911),
('DfvvvZh1A57pcumP6AkIvl4CE5G78XYJqMn5pDbx', NULL, '92.97.99.78', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiQ0tBb3I0RTJnbzNPR1BCNG1WOGhtSjRNcTM4Y1hGSHJNMU1zVDNmNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1749212791),
('32R4DkJV4G92yTAofBFyKNNPqQNPkoFwv8HlrCRE', NULL, '92.97.99.78', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnVQYUE2MWV4UWVEcDMwTk44ZEFpSVZnYWZnaDRiYWlBMml2dEI3MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vbWVnaHRhdHR2YS5pbi9wdWJsaWMvZGlyZWN0b3J5LWxpc3QvYWN0b3IiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1748839353),
('eoLA8TxHHWO69cwWRdX3ro8DLzhANbUWk0u1JZky', NULL, '92.97.99.78', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDRSV0lhN1hUT0pwQTZrZXl1Z1pTOENrMGN0OFdCS2EyWFZSbGwzZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vbWVnaHRhdHR2YS5pbi9wdWJsaWMvZGlyZWN0b3J5LWxpc3QvYWN0b3IiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1748767119),
('t9wyf7eFR1N3lctATNlQsm9wvrIwQ3Ir048YLjcc', 2, '92.97.99.78', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMUgwZmJYNXVIQ09jUVV6SW8wenFNTHgxTWRJY2ZLZmthTkNvMkZjUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHBzOi8vbWVnaHRhdHR2YS5pbi9wdWJsaWMvZGlyZWN0b3J5LWxpc3QvYWN0b3IiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NDg2NjE0ODY7fX0=', 1748661529),
('XeiKelTHg2F8HVXhDaU6LRa8UmhQXgaxnNJPrB96', 2, '92.97.99.78', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoialB0ZjljTnRiNGprV3RyYU5XTGR3M0NqVXkwdldpcnB5VllRMTFSTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vbWVnaHRhdHR2YS5pbi9wdWJsaWMvcm9sZXMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0OTM4NTU2Mjt9fQ==', 1749385695),
('xA2HpM29OcYL0jRNKVahnNEZXJtSlGwv8Gu4YEmV', NULL, '152.59.40.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3BsdGdadXpDQkFvdDlOQnRzckRiUmVnaHoycWJTeG9OMmRZM3J5QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vbWVnaHRhdHR2YS5pbi9wdWJsaWMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1749405056);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `show_password`) VALUES
(4, 'disma', 'disma@gmail.com', NULL, '$2y$12$R7HSh69n2e5OrjMVOEHCaeQkZ2xx8mDZ/7nHGyHatZlfXXlAFHp/q', '7jPy6GaoBq31giKZfxZE1tAcmMFERZBcvaKtga7iW7FlU3wqJVxGfJ5KHTea', '2024-09-02 01:22:29', '2024-09-02 01:22:29', NULL),
(2, 'Hardik Savani', 'admin@gmail.com', NULL, '$2y$12$rrUxXQjSpCEue8CtPCme7eu8BH3OAoehOwWCbSyOoL9/juCaSlC1u', 'myWhH7a6o07FcGjbw4OASvOOnZkcn8MNgDtFKS2RVDWvRqUPkiDiy98ToCFQ', '2024-08-30 05:36:53', '2024-08-30 05:36:53', NULL),
(3, 'Viral', 'viral@gmail.com', NULL, '$2y$12$65PC03AE1Q9PcQjCkEp3BO3SQ3BR2J4T3xVWNQc7wyYQZXJNWyXYy', 'NFvTqmk1v8lQ5Hz5XWwWz0dbjUPyjIzbPuOoKIKR7WxZdpVx0VEDQKndg7Ux', '2024-08-30 05:39:41', '2024-09-05 04:52:47', 'admin123'),
(5, 'hiten', 'hitenjadav21322132@gmail.com', NULL, '$2y$12$NoRM2w5DzhyJtHZGFKac3OleKjTWFVZbCkShBn2/Suv9w3IwUJSfO', 'nmR6J0ZtDDVjSPEc1AZETmTRRqcoGBxasyMx7nj4FEucyYjd0fQiQnSTN8ko', '2024-09-02 01:35:11', '2024-10-03 23:43:20', 'Hello@123'),
(6, 'mh', 'mh@gmail.com', NULL, '$2y$12$FJ51WUxFop0moLLXmTuPleQNrSLTXj7jY.6Xu8BPOjPzq6kyu.NAG', NULL, '2024-09-03 04:06:32', '2024-09-04 23:49:52', 'admin123'),
(7, 'viral', 'viralode95745@gmail.com', NULL, '$2y$12$o0PCAb7N2S1us36tG5ub4ePkjBT5cSMHhgyJTX89nxoGS0vLsQSjG', NULL, '2024-09-03 07:26:28', '2024-09-03 07:26:28', 'admin123'),
(8, 'test', 'mark@mailinator.com', NULL, '$2y$12$vkSk0WZIQhn31BJAL/L2pOpgq3gwdz820ozGvQ5isYoNacc.3z4oS', 'CQusxPbrR1lX8cUWhu97uAnORioW9Ny7ebX8UHoD7Fefsa3drVPcWAVQJtxB', '2024-09-04 00:36:45', '2024-09-04 23:17:30', NULL),
(9, 'dipen', 'dipen@mailinator.com', NULL, '$2y$12$NM4PyYmJVea0R6qpm747Ye8F2deYgHWLCUtuXyH0xq5MnQByZXjBi', 'N3pvmRMNi8pcRuJBFx3rcuhD5tFybWVLNerwVJ0lopdPSxG2eZdFEUXLhaiO', '2024-09-05 05:58:30', '2024-09-05 05:58:30', '123456789'),
(10, 'devang', 'devang@mailinator.com', NULL, '$2y$12$rtBZhaTM6C4ifVtrKHsZ4emC8yOE1fKCgDwe7BnX6L2eoFOfeDIs6', NULL, '2024-09-05 06:00:03', '2024-09-05 07:11:17', 'admin123'),
(11, 'natthu', 'natthu@mailinator.com', NULL, '$2y$12$Hh9M/4p29GyIcRo1MB/BQu5XkGOojnc91iKzFAbA/hq7zfvWB3xUW', 'Hi30VNww3i4g8jVJfOXihmFn8v1WvCiLrZJHxxkEciRAad8kUA1X23Au1pvX', '2024-09-05 06:02:20', '2024-09-05 06:02:56', '123456789'),
(12, 'parth', 'parth@mailinator.com', NULL, '$2y$12$uNr/PiHVCKY0NkDKOxSMjOxdGdRvZVQ/jiqV.dBbzYArA7voOUsVW', '8UB6COrM7yRrOWRA7WnX6fyFRgSJk25POR0pm8jHx6EXrAFr0mmHjZ4FgzRk', '2024-09-05 06:04:00', '2024-09-05 06:04:00', '123456789'),
(13, 'demotest', 'demotest@gmail.com', NULL, '$2y$12$2dETGyMPFKsxlMWLHjpNFOlR9FT1yhTt22hItp5zwRbxYcrNF12EK', NULL, '2024-11-22 13:32:38', '2024-11-22 13:32:38', '123456');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manage_orders`
--
ALTER TABLE `manage_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_dates`
--
ALTER TABLE `order_dates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products_old`
--
ALTER TABLE `products_old`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `role_infos`
--
ALTER TABLE `role_infos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
