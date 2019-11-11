-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 07:38 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esriva`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity` text NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `activity`, `notes`, `created_at`, `updated_at`) VALUES
(15, 15, 'Artikel diapprove admin', 'Poin +25', '2019-10-31 23:48:24', '2019-10-31 23:48:24'),
(16, 16, 'Artikel diapprove admin', 'Poin +25', '2019-11-06 19:37:08', '2019-11-06 19:37:08'),
(17, 15, 'Artikel diapprove admin', 'Poin +25', '2019-11-06 22:45:01', '2019-11-06 22:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `image` text,
  `status` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `validated_once` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `body`, `image`, `status`, `category_id`, `user_id`, `views`, `validated_once`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'Lorem Ipsum Heritage', 'lorem-ipsum-heritage-01-11-2019', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare tincidunt sapien sit amet eleifend. Donec scelerisque auctor posuere. Nam fringilla scelerisque nisl id porttitor. Phasellus mattis ultricies diam quis faucibus. Sed tempus odio non sodales elementum. Pellentesque hendrerit, arcu eu tincidunt sollicitudin, ex orci porta eros, a aliquet orci augue eget nisi. Nulla viverra ligula tempor nisi tempor tincidunt. Mauris condimentum facilisis eros sed ultricies. Donec ultricies, lorem vel dapibus consectetur, libero augue sagittis ipsum, ut cursus lacus urna nec arcu. Nullam id porttitor risus. Mauris vel risus ante. Nulla tincidunt nunc ipsum, ut consequat lorem sagittis in. Donec tincidunt sollicitudin lorem a ultricies. Aenean vel pellentesque tellus, et laoreet velit. Fusce ut dignissim felis. Proin accumsan nisi quis lorem auctor condimentum vel eu ligula.<br></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Suspendisse nulla erat, maximus a efficitur sed, mollis vulputate sapien. Morbi ligula lacus, elementum id ipsum ac, tempor fringilla dolor. Phasellus mauris lorem, blandit efficitur sem eu, efficitur cursus nunc. Ut in enim pellentesque, vestibulum metus sed, lacinia ipsum. Mauris aliquet gravida molestie. Etiam pulvinar rhoncus accumsan. Nullam sagittis nisi ac libero cursus mollis. Aenean elit justo, dictum sed tincidunt ac, aliquet quis mauris. Vestibulum at maximus dolor. Quisque a purus sed dolor scelerisque rutrum. Proin sit amet pellentesque justo. Duis arcu lorem, condimentum eget condimentum eu, venenatis at purus. Fusce at turpis rhoncus, rutrum elit eu, mattis nunc. Integer lobortis pulvinar tellus ac pellentesque.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Integer ullamcorper odio a massa commodo dignissim. Proin vestibulum scelerisque magna. Vestibulum egestas pretium erat, quis cursus ante maximus ut. Vivamus interdum dui iaculis turpis pharetra, vel luctus diam lacinia. Sed ut ligula eleifend, consectetur turpis a, dignissim massa. Fusce semper dui sed nisi egestas, nec aliquam quam ultrices. Suspendisse dignissim dolor sapien, id viverra leo viverra in. Nam luctus a felis at interdum. Cras porttitor nulla ac nulla vehicula facilisis. Suspendisse nulla enim, consectetur eget odio eu, finibus pretium quam. Etiam vehicula, sapien sit amet scelerisque vehicula, arcu leo volutpat lorem, nec ultricies arcu libero eu lacus. Pellentesque a sollicitudin libero. Sed varius fringilla odio, et blandit enim vehicula a.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Proin massa tellus, porttitor a ligula eu, auctor vehicula ex. Cras eu sapien a est ornare consectetur elementum in diam. Ut vulputate convallis commodo. Phasellus ac ligula sodales, egestas turpis non, fringilla nisl. Quisque volutpat, libero et tristique scelerisque, turpis mi pellentesque nulla, eget convallis dolor ex sit amet nisl. Duis porttitor nulla enim, vitae pulvinar augue rutrum sit amet. Aliquam posuere est et eros congue, ac pellentesque augue pulvinar. Donec maximus dictum quam, non pellentesque lectus viverra vel.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Aenean egestas laoreet diam ac condimentum. Sed in consequat nibh. Aliquam erat volutpat. Duis dignissim justo lacus, nec malesuada nunc posuere congue. Praesent posuere nibh dui, in rutrum leo mollis eget. Quisque tortor ipsum, mattis molestie sapien ut, gravida elementum ante. Morbi vel libero at nunc posuere aliquam sagittis at justo. Cras et massa id felis sollicitudin ornare. Curabitur finibus tincidunt dolor ut accumsan. Morbi faucibus sollicitudin ligula, vitae sollicitudin odio aliquet id.</p>', 'uploads/articles/2019-11-01-06-01-05_article.jpg', 'Approved', 8, 15, 40, 1, '2019-10-31 23:01:06', '2019-11-03 03:29:33', NULL),
(19, 'Lorem Ipsum Heritage 2', 'lorem-ipsum-heritage-2-02-11-2019', '<p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare tincidunt sapien sit amet eleifend. Donec scelerisque auctor posuere. Nam fringilla scelerisque nisl id porttitor. Phasellus mattis ultricies diam quis faucibus. Sed tempus odio non sodales elementum. Pellentesque hendrerit, arcu eu tincidunt sollicitudin, ex orci porta eros, a aliquet orci augue eget nisi. Nulla viverra ligula tempor nisi tempor tincidunt. Mauris condimentum facilisis eros sed ultricies. Donec ultricies, lorem vel dapibus consectetur, libero augue sagittis ipsum, ut cursus lacus urna nec arcu. Nullam id porttitor risus. Mauris vel risus ante. Nulla tincidunt nunc ipsum, ut consequat lorem sagittis in. Donec tincidunt sollicitudin lorem a ultricies. Aenean vel pellentesque tellus, et laoreet velit. Fusce ut dignissim felis. Proin accumsan nisi quis lorem auctor condimentum vel eu ligula.<br></p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Suspendisse nulla erat, maximus a efficitur sed, mollis vulputate sapien. Morbi ligula lacus, elementum id ipsum ac, tempor fringilla dolor. Phasellus mauris lorem, blandit efficitur sem eu, efficitur cursus nunc. Ut in enim pellentesque, vestibulum metus sed, lacinia ipsum. Mauris aliquet gravida molestie. Etiam pulvinar rhoncus accumsan. Nullam sagittis nisi ac libero cursus mollis. Aenean elit justo, dictum sed tincidunt ac, aliquet quis mauris. Vestibulum at maximus dolor. Quisque a purus sed dolor scelerisque rutrum. Proin sit amet pellentesque justo. Duis arcu lorem, condimentum eget condimentum eu, venenatis at purus. Fusce at turpis rhoncus, rutrum elit eu, mattis nunc. Integer lobortis pulvinar tellus ac pellentesque.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Integer ullamcorper odio a massa commodo dignissim. Proin vestibulum scelerisque magna. Vestibulum egestas pretium erat, quis cursus ante maximus ut. Vivamus interdum dui iaculis turpis pharetra, vel luctus diam lacinia. Sed ut ligula eleifend, consectetur turpis a, dignissim massa. Fusce semper dui sed nisi egestas, nec aliquam quam ultrices. Suspendisse dignissim dolor sapien, id viverra leo viverra in. Nam luctus a felis at interdum. Cras porttitor nulla ac nulla vehicula facilisis. Suspendisse nulla enim, consectetur eget odio eu, finibus pretium quam. Etiam vehicula, sapien sit amet scelerisque vehicula, arcu leo volutpat lorem, nec ultricies arcu libero eu lacus. Pellentesque a sollicitudin libero. Sed varius fringilla odio, et blandit enim vehicula a.</p>', 'uploads/articles/2019-11-02-12-24-37_article.jpg', 'Approved', 9, 16, 15, 1, '2019-11-02 05:24:37', '2019-11-06 22:41:55', NULL),
(20, 'Lorem Ipsum Heritage 3', 'lorem-ipsum-heritage-3-07-11-2019', '<p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare tincidunt sapien sit amet eleifend. Donec scelerisque auctor posuere. Nam fringilla scelerisque nisl id porttitor. Phasellus mattis ultricies diam quis faucibus. Sed tempus odio non sodales elementum. Pellentesque hendrerit, arcu eu tincidunt sollicitudin, ex orci porta eros, a aliquet orci augue eget nisi. Nulla viverra ligula tempor nisi tempor tincidunt. Mauris condimentum facilisis eros sed ultricies. Donec ultricies, lorem vel dapibus consectetur, libero augue sagittis ipsum, ut cursus lacus urna nec arcu. Nullam id porttitor risus. Mauris vel risus ante. Nulla tincidunt nunc ipsum, ut consequat lorem sagittis in. Donec tincidunt sollicitudin lorem a ultricies. Aenean vel pellentesque tellus, et laoreet velit. Fusce ut dignissim felis. Proin accumsan nisi quis lorem auctor condimentum vel eu ligula.<br></p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Suspendisse nulla erat, maximus a efficitur sed, mollis vulputate sapien. Morbi ligula lacus, elementum id ipsum ac, tempor fringilla dolor. Phasellus mauris lorem, blandit efficitur sem eu, efficitur cursus nunc. Ut in enim pellentesque, vestibulum metus sed, lacinia ipsum. Mauris aliquet gravida molestie. Etiam pulvinar rhoncus accumsan. Nullam sagittis nisi ac libero cursus mollis. Aenean elit justo, dictum sed tincidunt ac, aliquet quis mauris. Vestibulum at maximus dolor. Quisque a purus sed dolor scelerisque rutrum. Proin sit amet pellentesque justo. Duis arcu lorem, condimentum eget condimentum eu, venenatis at purus. Fusce at turpis rhoncus, rutrum elit eu, mattis nunc. Integer lobortis pulvinar tellus ac pellentesque.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Integer ullamcorper odio a massa commodo dignissim. Proin vestibulum scelerisque magna. Vestibulum egestas pretium erat, quis cursus ante maximus ut. Vivamus interdum dui iaculis turpis pharetra, vel luctus diam lacinia. Sed ut ligula eleifend, consectetur turpis a, dignissim massa. Fusce semper dui sed nisi egestas, nec aliquam quam ultrices. Suspendisse dignissim dolor sapien, id viverra leo viverra in. Nam luctus a felis at interdum. Cras porttitor nulla ac nulla vehicula facilisis. Suspendisse nulla enim, consectetur eget odio eu, finibus pretium quam. Etiam vehicula, sapien sit amet scelerisque vehicula, arcu leo volutpat lorem, nec ultricies arcu libero eu lacus. Pellentesque a sollicitudin libero. Sed varius fringilla odio, et blandit enim vehicula a.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare tincidunt sapien sit amet eleifend. Donec scelerisque auctor posuere. Nam fringilla scelerisque nisl id porttitor. Phasellus mattis ultricies diam quis faucibus. Sed tempus odio non sodales elementum. Pellentesque hendrerit, arcu eu tincidunt sollicitudin, ex orci porta eros, a aliquet orci augue eget nisi. Nulla viverra ligula tempor nisi tempor tincidunt. Mauris condimentum facilisis eros sed ultricies. Donec ultricies, lorem vel dapibus consectetur, libero augue sagittis ipsum, ut cursus lacus urna nec arcu. Nullam id porttitor risus. Mauris vel risus ante. Nulla tincidunt nunc ipsum, ut consequat lorem sagittis in. Donec tincidunt sollicitudin lorem a ultricies. Aenean vel pellentesque tellus, et laoreet velit. Fusce ut dignissim felis. Proin accumsan nisi quis lorem auctor condimentum vel eu ligula.<br></p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Suspendisse nulla erat, maximus a efficitur sed, mollis vulputate sapien. Morbi ligula lacus, elementum id ipsum ac, tempor fringilla dolor. Phasellus mauris lorem, blandit efficitur sem eu, efficitur cursus nunc. Ut in enim pellentesque, vestibulum metus sed, lacinia ipsum. Mauris aliquet gravida molestie. Etiam pulvinar rhoncus accumsan. Nullam sagittis nisi ac libero cursus mollis. Aenean elit justo, dictum sed tincidunt ac, aliquet quis mauris. Vestibulum at maximus dolor. Quisque a purus sed dolor scelerisque rutrum. Proin sit amet pellentesque justo. Duis arcu lorem, condimentum eget condimentum eu, venenatis at purus. Fusce at turpis rhoncus, rutrum elit eu, mattis nunc. Integer lobortis pulvinar tellus ac pellentesque.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Integer ullamcorper odio a massa commodo dignissim. Proin vestibulum scelerisque magna. Vestibulum egestas pretium erat, quis cursus ante maximus ut. Vivamus interdum dui iaculis turpis pharetra, vel luctus diam lacinia. Sed ut ligula eleifend, consectetur turpis a, dignissim massa. Fusce semper dui sed nisi egestas, nec aliquam quam ultrices. Suspendisse dignissim dolor sapien, id viverra leo viverra in. Nam luctus a felis at interdum. Cras porttitor nulla ac nulla vehicula facilisis. Suspendisse nulla enim, consectetur eget odio eu, finibus pretium quam. Etiam vehicula, sapien sit amet scelerisque vehicula, arcu leo volutpat lorem, nec ultricies arcu libero eu lacus. Pellentesque a sollicitudin libero. Sed varius fringilla odio, et blandit enim vehicula a.</p>', 'uploads/articles/2019-11-07-05-44-16_article.jpg', 'Approved', 10, 15, 10, 1, '2019-11-06 22:44:17', '2019-11-07 19:06:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(8, 'Psychology', '2019-10-31 20:41:49', '2019-10-31 20:41:49'),
(9, 'Self Essence', '2019-10-31 20:42:00', '2019-10-31 20:42:00'),
(10, 'Mental Health', '2019-10-31 20:42:10', '2019-10-31 20:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `claim_logs`
--

CREATE TABLE `claim_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `claimed` int(11) NOT NULL,
  `point_left` int(11) NOT NULL,
  `rekening` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claim_logs`
--

INSERT INTO `claim_logs` (`id`, `user_id`, `claimed`, `point_left`, `rekening`, `created_at`, `updated_at`) VALUES
(3, 15, 10, 15, '123456', '2019-10-31 23:23:59', '2019-10-31 23:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `article_id`, `user_id`, `value`, `created_at`, `updated_at`) VALUES
(18, 18, 13, 0, '2019-10-31 23:12:47', '2019-11-08 01:31:02'),
(19, 20, 13, 1, '2019-11-08 01:31:04', '2019-11-08 01:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `body` text NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_finished` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user_id`, `title`, `body`, `type`, `created_at`, `updated_at`, `is_finished`) VALUES
(9, 13, 'Bagus', '<p>Wah sudah bagus!</p>', 'Pesan', '2019-11-01 00:09:38', '2019-11-01 00:09:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `body` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `type` varchar(20) DEFAULT NULL,
  `is_closed` int(11) NOT NULL DEFAULT '0',
  `is_show` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `user_id`, `title`, `body`, `views`, `type`, `is_closed`, `is_show`, `created_at`, `updated_at`) VALUES
(6, 13, 'Judul Forum Pertama', '<p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare tincidunt sapien sit amet eleifend. Donec scelerisque auctor posuere. Nam fringilla scelerisque nisl id porttitor. Phasellus mattis ultricies diam quis faucibus. Sed tempus odio non sodales elementum. Pellentesque hendrerit, arcu eu tincidunt sollicitudin, ex orci porta eros, a aliquet orci augue eget nisi. Nulla viverra ligula tempor nisi tempor tincidunt. Mauris condimentum facilisis eros sed ultricies. Donec ultricies, lorem vel dapibus consectetur, libero augue sagittis ipsum, ut cursus lacus urna nec arcu. Nullam id porttitor risus. Mauris vel risus ante. Nulla tincidunt nunc ipsum, ut consequat lorem sagittis in. Donec tincidunt sollicitudin lorem a ultricies. Aenean vel pellentesque tellus, et laoreet velit. Fusce ut dignissim felis. Proin accumsan nisi quis lorem auctor condimentum vel eu ligula.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Suspendisse nulla erat, maximus a efficitur sed, mollis vulputate sapien. Morbi ligula lacus, elementum id ipsum ac, tempor fringilla dolor. Phasellus mauris lorem, blandit efficitur sem eu, efficitur cursus nunc. Ut in enim pellentesque, vestibulum metus sed, lacinia ipsum. Mauris aliquet gravida molestie. Etiam pulvinar rhoncus accumsan. Nullam sagittis nisi ac libero cursus mollis. Aenean elit justo, dictum sed tincidunt ac, aliquet quis mauris. Vestibulum at maximus dolor. Quisque a purus sed dolor scelerisque rutrum. Proin sit amet pellentesque justo. Duis arcu lorem, condimentum eget condimentum eu, venenatis at purus. Fusce at turpis rhoncus, rutrum elit eu, mattis nunc. Integer lobortis pulvinar tellus ac pellentesque.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Integer ullamcorper odio a massa commodo dignissim. Proin vestibulum scelerisque magna. Vestibulum egestas pretium erat, quis cursus ante maximus ut. Vivamus interdum dui iaculis turpis pharetra, vel luctus diam lacinia. Sed ut ligula eleifend, consectetur turpis a, dignissim massa. Fusce semper dui sed nisi egestas, nec aliquam quam ultrices. Suspendisse dignissim dolor sapien, id viverra leo viverra in. Nam luctus a felis at interdum. Cras porttitor nulla ac nulla vehicula facilisis. Suspendisse nulla enim, consectetur eget odio eu, finibus pretium quam. Etiam vehicula, sapien sit amet scelerisque vehicula, arcu leo volutpat lorem, nec ultricies arcu libero eu lacus. Pellentesque a sollicitudin libero. Sed varius fringilla odio, et blandit enim vehicula a.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Proin massa tellus, porttitor a ligula eu, auctor vehicula ex. Cras eu sapien a est ornare consectetur elementum in diam. Ut vulputate convallis commodo. Phasellus ac ligula sodales, egestas turpis non, fringilla nisl. Quisque volutpat, libero et tristique scelerisque, turpis mi pellentesque nulla, eget convallis dolor ex sit amet nisl. Duis porttitor nulla enim, vitae pulvinar augue rutrum sit amet. Aliquam posuere est et eros congue, ac pellentesque augue pulvinar. Donec maximus dictum quam, non pellentesque lectus viverra vel.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Aenean egestas laoreet diam ac condimentum. Sed in consequat nibh. Aliquam erat volutpat. Duis dignissim justo lacus, nec malesuada nunc posuere congue. Praesent posuere nibh dui, in rutrum leo mollis eget. Quisque tortor ipsum, mattis molestie sapien ut, gravida elementum ante. Morbi vel libero at nunc posuere aliquam sagittis at justo. Cras et massa id felis sollicitudin ornare. Curabitur finibus tincidunt dolor ut accumsan. Morbi faucibus sollicitudin ligula, vitae sollicitudin odio aliquet id.</p>', 90, 'Publik', 0, 1, '2019-10-31 23:13:49', '2019-11-07 19:04:35'),
(7, 14, 'Lorem Ipsum Heritage', '<p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare tincidunt sapien sit amet eleifend. Donec scelerisque auctor posuere. Nam fringilla scelerisque nisl id porttitor. Phasellus mattis ultricies diam quis faucibus. Sed tempus odio non sodales elementum. Pellentesque hendrerit, arcu eu tincidunt sollicitudin, ex orci porta eros, a aliquet orci augue eget nisi. Nulla viverra ligula tempor nisi tempor tincidunt. Mauris condimentum facilisis eros sed ultricies. Donec ultricies, lorem vel dapibus consectetur, libero augue sagittis ipsum, ut cursus lacus urna nec arcu. Nullam id porttitor risus. Mauris vel risus ante. Nulla tincidunt nunc ipsum, ut consequat lorem sagittis in. Donec tincidunt sollicitudin lorem a ultricies. Aenean vel pellentesque tellus, et laoreet velit. Fusce ut dignissim felis. Proin accumsan nisi quis lorem auctor condimentum vel eu ligula.<br></p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Suspendisse nulla erat, maximus a efficitur sed, mollis vulputate sapien. Morbi ligula lacus, elementum id ipsum ac, tempor fringilla dolor. Phasellus mauris lorem, blandit efficitur sem eu, efficitur cursus nunc. Ut in enim pellentesque, vestibulum metus sed, lacinia ipsum. Mauris aliquet gravida molestie. Etiam pulvinar rhoncus accumsan. Nullam sagittis nisi ac libero cursus mollis. Aenean elit justo, dictum sed tincidunt ac, aliquet quis mauris. Vestibulum at maximus dolor. Quisque a purus sed dolor scelerisque rutrum. Proin sit amet pellentesque justo. Duis arcu lorem, condimentum eget condimentum eu, venenatis at purus. Fusce at turpis rhoncus, rutrum elit eu, mattis nunc. Integer lobortis pulvinar tellus ac pellentesque.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Integer ullamcorper odio a massa commodo dignissim. Proin vestibulum scelerisque magna. Vestibulum egestas pretium erat, quis cursus ante maximus ut. Vivamus interdum dui iaculis turpis pharetra, vel luctus diam lacinia. Sed ut ligula eleifend, consectetur turpis a, dignissim massa. Fusce semper dui sed nisi egestas, nec aliquam quam ultrices. Suspendisse dignissim dolor sapien, id viverra leo viverra in. Nam luctus a felis at interdum. Cras porttitor nulla ac nulla vehicula facilisis. Suspendisse nulla enim, consectetur eget odio eu, finibus pretium quam. Etiam vehicula, sapien sit amet scelerisque vehicula, arcu leo volutpat lorem, nec ultricies arcu libero eu lacus. Pellentesque a sollicitudin libero. Sed varius fringilla odio, et blandit enim vehicula a.</p>', 15, 'Privat', 1, 1, '2019-10-31 23:40:27', '2019-11-03 03:20:29'),
(8, 14, 'Judul Forum Kedua', '<p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare tincidunt sapien sit amet eleifend. Donec scelerisque auctor posuere. Nam fringilla scelerisque nisl id porttitor. Phasellus mattis ultricies diam quis faucibus. Sed tempus odio non sodales elementum. Pellentesque hendrerit, arcu eu tincidunt sollicitudin, ex orci porta eros, a aliquet orci augue eget nisi. Nulla viverra ligula tempor nisi tempor tincidunt. Mauris condimentum facilisis eros sed ultricies. Donec ultricies, lorem vel dapibus consectetur, libero augue sagittis ipsum, ut cursus lacus urna nec arcu. Nullam id porttitor risus. Mauris vel risus ante. Nulla tincidunt nunc ipsum, ut consequat lorem sagittis in. Donec tincidunt sollicitudin lorem a ultricies. Aenean vel pellentesque tellus, et laoreet velit. Fusce ut dignissim felis. Proin accumsan nisi quis lorem auctor condimentum vel eu ligula.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Suspendisse nulla erat, maximus a efficitur sed, mollis vulputate sapien. Morbi ligula lacus, elementum id ipsum ac, tempor fringilla dolor. Phasellus mauris lorem, blandit efficitur sem eu, efficitur cursus nunc. Ut in enim pellentesque, vestibulum metus sed, lacinia ipsum. Mauris aliquet gravida molestie. Etiam pulvinar rhoncus accumsan. Nullam sagittis nisi ac libero cursus mollis. Aenean elit justo, dictum sed tincidunt ac, aliquet quis mauris. Vestibulum at maximus dolor. Quisque a purus sed dolor scelerisque rutrum. Proin sit amet pellentesque justo. Duis arcu lorem, condimentum eget condimentum eu, venenatis at purus. Fusce at turpis rhoncus, rutrum elit eu, mattis nunc. Integer lobortis pulvinar tellus ac pellentesque.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Integer ullamcorper odio a massa commodo dignissim. Proin vestibulum scelerisque magna. Vestibulum egestas pretium erat, quis cursus ante maximus ut. Vivamus interdum dui iaculis turpis pharetra, vel luctus diam lacinia. Sed ut ligula eleifend, consectetur turpis a, dignissim massa. Fusce semper dui sed nisi egestas, nec aliquam quam ultrices. Suspendisse dignissim dolor sapien, id viverra leo viverra in. Nam luctus a felis at interdum. Cras porttitor nulla ac nulla vehicula facilisis. Suspendisse nulla enim, consectetur eget odio eu, finibus pretium quam. Etiam vehicula, sapien sit amet scelerisque vehicula, arcu leo volutpat lorem, nec ultricies arcu libero eu lacus. Pellentesque a sollicitudin libero. Sed varius fringilla odio, et blandit enim vehicula a.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; color: rgb(51, 51, 51); padding: 0px; text-align: justify;\">Proin massa tellus, porttitor a ligula eu, auctor vehicula ex. Cras eu sapien a est ornare consectetur elementum in diam. Ut vulputate convallis commodo. Phasellus ac ligula sodales, egestas turpis non, fringilla nisl. Quisque volutpat, libero et tristique scelerisque, turpis mi pellentesque nulla, eget convallis dolor ex sit amet nisl. Duis porttitor nulla enim, vitae pulvinar augue rutrum sit amet. Aliquam posuere est et eros congue, ac pellentesque augue pulvinar. Donec maximus dictum quam, non pellentesque lectus viverra vel.</p>', 25, 'Publik', 0, 1, '2019-11-03 03:20:52', '2019-11-07 01:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `forum_comments`
--

CREATE TABLE `forum_comments` (
  `id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `abuse` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_comments`
--

INSERT INTO `forum_comments` (`id`, `forum_id`, `user_id`, `body`, `abuse`, `created_at`, `updated_at`) VALUES
(14, 6, 14, '<p>Forum apaan nih!? Gak berguna!</p>', 1, '2019-10-31 23:14:27', '2019-10-31 23:18:19'),
(15, 6, 12, 'Ini komentar test.', 0, '2019-11-02 05:48:09', '2019-11-02 05:48:09'),
(16, 6, 12, '<p>Sebuah komentar!</p>', 0, '2019-11-06 21:29:01', '2019-11-06 21:29:01'),
(17, 8, 12, 'Ini test sebuah komentar.', 0, '2019-11-07 00:57:29', '2019-11-07 00:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 6, '2019-10-09 22:17:09', '2019-10-09 22:17:09'),
(2, 6, '2019-10-09 22:19:47', '2019-10-09 22:19:47'),
(3, 8, '2019-10-10 00:02:55', '2019-10-10 00:02:55'),
(4, 7, '2019-10-09 00:03:10', '2019-10-10 00:03:10'),
(5, 6, '2019-10-10 00:03:21', '2019-10-10 00:03:21'),
(6, 8, '2019-10-10 00:18:34', '2019-10-10 00:18:34'),
(7, 8, '2019-10-10 00:21:14', '2019-10-10 00:21:14'),
(8, 8, '2019-10-10 00:24:04', '2019-10-10 00:24:04'),
(9, 8, '2019-10-10 00:25:23', '2019-10-10 00:25:23'),
(10, 6, '2019-10-10 00:29:55', '2019-10-10 00:29:55'),
(11, 6, '2019-10-10 00:50:06', '2019-10-10 00:50:06'),
(12, 8, '2019-10-10 01:46:26', '2019-10-10 01:46:26'),
(13, 6, '2019-10-10 01:47:54', '2019-10-10 01:47:54'),
(14, 8, '2019-10-10 02:00:22', '2019-10-10 02:00:22'),
(15, 7, '2019-10-10 02:00:59', '2019-10-10 02:00:59'),
(16, 6, '2019-10-10 02:01:18', '2019-10-10 02:01:18'),
(17, 8, '2019-10-10 02:01:38', '2019-10-10 02:01:38'),
(18, 7, '2019-10-10 04:13:52', '2019-10-10 04:13:52'),
(19, 6, '2019-10-10 04:19:13', '2019-10-10 04:19:13'),
(20, 7, '2019-10-10 04:22:51', '2019-10-10 04:22:51'),
(21, 8, '2019-10-11 01:30:14', '2019-10-11 01:30:14'),
(22, 6, '2019-10-11 01:34:19', '2019-10-11 01:34:19'),
(23, 8, '2019-10-11 01:42:58', '2019-10-11 01:42:58'),
(24, 6, '2019-10-11 02:11:54', '2019-10-11 02:11:54'),
(25, 8, '2019-10-11 02:13:38', '2019-10-11 02:13:38'),
(26, 6, '2019-10-11 02:33:02', '2019-10-11 02:33:02'),
(27, 8, '2019-10-11 02:33:20', '2019-10-11 02:33:20'),
(28, 6, '2019-10-11 02:34:28', '2019-10-11 02:34:28'),
(29, 6, '2019-10-11 02:43:18', '2019-10-11 02:43:18'),
(30, 8, '2019-10-11 03:13:43', '2019-10-11 03:13:43'),
(31, 6, '2019-10-11 03:14:43', '2019-10-11 03:14:43'),
(32, 7, '2019-10-11 03:17:23', '2019-10-11 03:17:23'),
(33, 6, '2019-10-11 03:17:38', '2019-10-11 03:17:38'),
(34, 6, '2019-10-11 03:41:56', '2019-10-11 03:41:56'),
(35, 8, '2019-10-11 03:44:56', '2019-10-11 03:44:56'),
(36, 8, '2019-10-11 04:10:20', '2019-10-11 04:10:20'),
(37, 10, '2019-10-11 04:10:46', '2019-10-11 04:10:46'),
(38, 6, '2019-10-11 06:42:37', '2019-10-11 06:42:37'),
(39, 8, '2019-10-11 07:51:31', '2019-10-11 07:51:31'),
(40, 10, '2019-10-11 07:55:24', '2019-10-11 07:55:24'),
(41, 8, '2019-10-11 08:01:05', '2019-10-11 08:01:05'),
(42, 6, '2019-10-11 08:07:57', '2019-10-11 08:07:57'),
(43, 6, '2019-10-11 08:08:44', '2019-10-11 08:08:44'),
(44, 8, '2019-10-11 08:14:41', '2019-10-11 08:14:41'),
(45, 6, '2019-10-11 08:29:28', '2019-10-11 08:29:28'),
(46, 8, '2019-10-11 18:05:46', '2019-10-11 18:05:46'),
(47, 6, '2019-10-11 18:38:59', '2019-10-11 18:38:59'),
(48, 6, '2019-10-12 07:02:46', '2019-10-12 07:02:46'),
(49, 7, '2019-10-12 07:09:33', '2019-10-12 07:09:33'),
(50, 6, '2019-10-12 07:20:04', '2019-10-12 07:20:04'),
(51, 8, '2019-10-12 07:20:18', '2019-10-12 07:20:18'),
(52, 7, '2019-10-12 07:33:25', '2019-10-12 07:33:25'),
(53, 6, '2019-10-12 07:38:58', '2019-10-12 07:38:58'),
(54, 8, '2019-10-12 08:37:15', '2019-10-12 08:37:15'),
(55, 7, '2019-10-12 08:39:09', '2019-10-12 08:39:09'),
(56, 7, '2019-10-12 08:40:48', '2019-10-12 08:40:48'),
(57, 6, '2019-10-12 20:59:28', '2019-10-12 20:59:28'),
(58, 8, '2019-10-12 21:13:26', '2019-10-12 21:13:26'),
(59, 6, '2019-10-12 21:13:52', '2019-10-12 21:13:52'),
(60, 8, '2019-10-12 21:16:12', '2019-10-12 21:16:12'),
(61, 7, '2019-10-12 21:17:13', '2019-10-12 21:17:13'),
(62, 6, '2019-10-12 21:19:05', '2019-10-12 21:19:05'),
(63, 8, '2019-10-12 21:29:03', '2019-10-12 21:29:03'),
(64, 6, '2019-10-12 21:29:15', '2019-10-12 21:29:15'),
(65, 7, '2019-10-12 21:38:36', '2019-10-12 21:38:36'),
(66, 6, '2019-10-12 21:38:54', '2019-10-12 21:38:54'),
(67, 7, '2019-10-12 22:03:22', '2019-10-12 22:03:22'),
(68, 8, '2019-10-12 22:03:58', '2019-10-12 22:03:58'),
(69, 6, '2019-10-12 22:09:49', '2019-10-12 22:09:49'),
(70, 6, '2019-10-12 23:32:01', '2019-10-12 23:32:01'),
(71, 8, '2019-10-13 05:16:21', '2019-10-13 05:16:21'),
(72, 7, '2019-10-13 05:19:04', '2019-10-13 05:19:04'),
(73, 6, '2019-10-13 20:06:48', '2019-10-13 20:06:48'),
(74, 7, '2019-10-13 20:12:23', '2019-10-13 20:12:23'),
(75, 8, '2019-10-13 20:12:35', '2019-10-13 20:12:35'),
(76, 7, '2019-10-13 20:14:17', '2019-10-13 20:14:17'),
(77, 6, '2019-10-13 20:14:32', '2019-10-13 20:14:32'),
(78, 8, '2019-10-13 20:26:08', '2019-10-13 20:26:08'),
(79, 6, '2019-10-13 20:40:22', '2019-10-13 20:40:22'),
(80, 8, '2019-10-13 21:18:48', '2019-10-13 21:18:48'),
(81, 6, '2019-10-13 21:21:17', '2019-10-13 21:21:17'),
(82, 8, '2019-10-13 21:22:25', '2019-10-13 21:22:25'),
(83, 6, '2019-10-13 21:28:30', '2019-10-13 21:28:30'),
(84, 6, '2019-10-14 02:14:04', '2019-10-14 02:14:04'),
(85, 8, '2019-10-14 02:26:50', '2019-10-14 02:26:50'),
(86, 6, '2019-10-14 19:39:28', '2019-10-14 19:39:28'),
(87, 6, '2019-10-14 20:26:27', '2019-10-14 20:26:27'),
(88, 7, '2019-10-14 20:34:23', '2019-10-14 20:34:23'),
(89, 6, '2019-10-14 20:34:44', '2019-10-14 20:34:44'),
(90, 7, '2019-10-14 20:35:09', '2019-10-14 20:35:09'),
(91, 6, '2019-10-14 20:35:48', '2019-10-14 20:35:48'),
(92, 8, '2019-10-14 20:36:22', '2019-10-14 20:36:22'),
(93, 6, '2019-10-14 20:37:07', '2019-10-14 20:37:07'),
(94, 6, '2019-10-14 21:59:03', '2019-10-14 21:59:03'),
(95, 10, '2019-10-14 22:35:54', '2019-10-14 22:35:54'),
(96, 7, '2019-10-14 22:41:31', '2019-10-14 22:41:31'),
(97, 8, '2019-10-14 22:47:09', '2019-10-14 22:47:09'),
(98, 6, '2019-10-14 22:47:50', '2019-10-14 22:47:50'),
(99, 6, '2019-10-15 00:25:27', '2019-10-15 00:25:27'),
(100, 8, '2019-10-15 00:26:22', '2019-10-15 00:26:22'),
(101, 7, '2019-10-15 00:26:52', '2019-10-15 00:26:52'),
(102, 6, '2019-10-15 00:27:56', '2019-10-15 00:27:56'),
(103, 7, '2019-10-15 00:28:23', '2019-10-15 00:28:23'),
(104, 6, '2019-10-15 01:02:45', '2019-10-15 01:02:45'),
(105, 6, '2019-10-20 04:56:47', '2019-10-20 04:56:47'),
(106, 8, '2019-10-20 05:04:35', '2019-10-20 05:04:35'),
(107, 6, '2019-10-20 05:11:26', '2019-10-20 05:11:26'),
(108, 8, '2019-10-20 06:18:42', '2019-10-20 06:18:42'),
(109, 8, '2019-10-20 06:28:49', '2019-10-20 06:28:49'),
(110, 8, '2019-10-20 06:32:02', '2019-10-20 06:32:02'),
(111, 8, '2019-10-20 06:34:01', '2019-10-20 06:34:01'),
(112, 6, '2019-10-20 06:40:32', '2019-10-20 06:40:32'),
(113, 8, '2019-10-20 19:25:51', '2019-10-20 19:25:51'),
(114, 10, '2019-10-20 19:28:20', '2019-10-20 19:28:20'),
(115, 8, '2019-10-20 19:34:50', '2019-10-20 19:34:50'),
(116, 6, '2019-10-22 18:53:53', '2019-10-22 18:53:53'),
(117, 8, '2019-10-22 19:04:34', '2019-10-22 19:04:34'),
(118, 6, '2019-10-22 19:05:40', '2019-10-22 19:05:40'),
(119, 8, '2019-10-22 19:09:57', '2019-10-22 19:09:57'),
(120, 7, '2019-10-22 19:10:12', '2019-10-22 19:10:12'),
(121, 6, '2019-10-22 19:11:30', '2019-10-22 19:11:30'),
(122, 6, '2019-10-22 19:21:49', '2019-10-22 19:21:49'),
(123, 7, '2019-10-22 19:21:59', '2019-10-22 19:21:59'),
(124, 8, '2019-10-22 22:42:38', '2019-10-22 22:42:38'),
(125, 8, '2019-10-22 22:54:57', '2019-10-22 22:54:57'),
(126, 7, '2019-10-22 22:55:48', '2019-10-22 22:55:48'),
(127, 6, '2019-10-23 00:37:07', '2019-10-23 00:37:07'),
(128, 6, '2019-10-23 00:38:57', '2019-10-23 00:38:57'),
(129, 6, '2019-10-23 00:47:57', '2019-10-23 00:47:57'),
(130, 7, '2019-10-23 01:46:58', '2019-10-23 01:46:58'),
(131, 6, '2019-10-23 01:47:08', '2019-10-23 01:47:08'),
(132, 6, '2019-10-23 01:56:50', '2019-10-23 01:56:50'),
(133, 7, '2019-10-23 01:59:29', '2019-10-23 01:59:29'),
(134, 7, '2019-10-23 02:25:06', '2019-10-23 02:25:06'),
(135, 6, '2019-10-23 02:25:16', '2019-10-23 02:25:16'),
(136, 7, '2019-10-23 02:31:19', '2019-10-23 02:31:19'),
(137, 7, '2019-10-23 02:39:16', '2019-10-23 02:39:16'),
(138, 6, '2019-10-23 03:09:49', '2019-10-23 03:09:49'),
(139, 7, '2019-10-23 03:10:04', '2019-10-23 03:10:04'),
(140, 8, '2019-10-23 03:21:48', '2019-10-23 03:21:48'),
(141, 6, '2019-10-23 03:22:03', '2019-10-23 03:22:03'),
(142, 6, '2019-10-23 03:23:32', '2019-10-23 03:23:32'),
(143, 8, '2019-10-23 03:29:43', '2019-10-23 03:29:43'),
(144, 6, '2019-10-23 03:30:00', '2019-10-23 03:30:00'),
(145, 7, '2019-10-23 18:44:53', '2019-10-23 18:44:53'),
(146, 6, '2019-10-23 19:58:29', '2019-10-23 19:58:29'),
(147, 7, '2019-10-23 20:24:13', '2019-10-23 20:24:13'),
(148, 8, '2019-10-23 20:30:23', '2019-10-23 20:30:23'),
(149, 6, '2019-10-23 20:31:27', '2019-10-23 20:31:27'),
(150, 8, '2019-10-23 20:40:51', '2019-10-23 20:40:51'),
(151, 6, '2019-10-23 20:41:33', '2019-10-23 20:41:33'),
(152, 6, '2019-10-23 20:42:22', '2019-10-23 20:42:22'),
(153, 8, '2019-10-23 20:42:34', '2019-10-23 20:42:34'),
(154, 6, '2019-10-23 20:49:41', '2019-10-23 20:49:41'),
(155, 8, '2019-10-23 20:50:11', '2019-10-23 20:50:11'),
(156, 6, '2019-10-23 20:56:34', '2019-10-23 20:56:34'),
(157, 8, '2019-10-23 20:56:58', '2019-10-23 20:56:58'),
(158, 6, '2019-10-23 21:03:19', '2019-10-23 21:03:19'),
(159, 8, '2019-10-23 21:04:19', '2019-10-23 21:04:19'),
(160, 7, '2019-10-23 21:08:17', '2019-10-23 21:08:17'),
(161, 7, '2019-10-23 21:08:52', '2019-10-23 21:08:52'),
(162, 6, '2019-10-23 21:09:09', '2019-10-23 21:09:09'),
(163, 8, '2019-10-23 21:09:39', '2019-10-23 21:09:39'),
(164, 6, '2019-10-23 21:10:19', '2019-10-23 21:10:19'),
(165, 6, '2019-10-23 21:58:19', '2019-10-23 21:58:19'),
(166, 8, '2019-10-23 23:43:05', '2019-10-23 23:43:05'),
(167, 7, '2019-10-23 23:44:09', '2019-10-23 23:44:09'),
(168, 6, '2019-10-23 23:50:28', '2019-10-23 23:50:28'),
(169, 6, '2019-10-24 00:12:14', '2019-10-24 00:12:14'),
(170, 7, '2019-10-24 00:18:22', '2019-10-24 00:18:22'),
(171, 6, '2019-10-24 00:18:36', '2019-10-24 00:18:36'),
(172, 6, '2019-10-24 00:43:55', '2019-10-24 00:43:55'),
(173, 7, '2019-10-24 00:50:57', '2019-10-24 00:50:57'),
(174, 6, '2019-10-24 01:44:09', '2019-10-24 01:44:09'),
(175, 6, '2019-10-24 19:24:59', '2019-10-24 19:24:59'),
(176, 7, '2019-10-24 19:54:59', '2019-10-24 19:54:59'),
(177, 6, '2019-10-24 19:56:30', '2019-10-24 19:56:30'),
(178, 6, '2019-10-24 19:59:59', '2019-10-24 19:59:59'),
(179, 8, '2019-10-24 20:07:12', '2019-10-24 20:07:12'),
(180, 7, '2019-10-24 20:07:53', '2019-10-24 20:07:53'),
(181, 6, '2019-10-24 20:11:29', '2019-10-24 20:11:29'),
(182, 7, '2019-10-24 20:25:15', '2019-10-24 20:25:15'),
(183, 6, '2019-10-24 20:33:48', '2019-10-24 20:33:48'),
(184, 8, '2019-10-24 20:41:13', '2019-10-24 20:41:13'),
(185, 6, '2019-10-24 20:41:24', '2019-10-24 20:41:24'),
(186, 6, '2019-10-24 22:53:49', '2019-10-24 22:53:49'),
(187, 7, '2019-10-24 23:01:29', '2019-10-24 23:01:29'),
(188, 6, '2019-10-24 23:09:29', '2019-10-24 23:09:29'),
(189, 8, '2019-10-24 23:26:23', '2019-10-24 23:26:23'),
(190, 7, '2019-10-24 23:34:21', '2019-10-24 23:34:21'),
(191, 8, '2019-10-24 23:36:23', '2019-10-24 23:36:23'),
(192, 6, '2019-10-24 23:40:20', '2019-10-24 23:40:20'),
(193, 6, '2019-10-25 00:57:41', '2019-10-25 00:57:41'),
(194, 8, '2019-10-25 01:33:01', '2019-10-25 01:33:01'),
(195, 7, '2019-10-25 01:33:46', '2019-10-25 01:33:46'),
(196, 6, '2019-10-25 03:30:42', '2019-10-25 03:30:42'),
(197, 6, '2019-10-26 05:26:19', '2019-10-26 05:26:19'),
(198, 8, '2019-10-26 05:28:46', '2019-10-26 05:28:46'),
(199, 7, '2019-10-26 06:03:40', '2019-10-26 06:03:40'),
(200, 6, '2019-10-26 06:04:10', '2019-10-26 06:04:10'),
(201, 7, '2019-10-26 06:15:45', '2019-10-26 06:15:45'),
(202, 6, '2019-10-26 06:18:52', '2019-10-26 06:18:52'),
(203, 7, '2019-10-26 06:29:42', '2019-10-26 06:29:42'),
(204, 6, '2019-10-26 06:43:26', '2019-10-26 06:43:26'),
(205, 6, '2019-10-27 04:58:40', '2019-10-27 04:58:40'),
(206, 8, '2019-10-27 05:10:07', '2019-10-27 05:10:07'),
(207, 7, '2019-10-27 05:11:35', '2019-10-27 05:11:35'),
(208, 8, '2019-10-27 05:12:51', '2019-10-27 05:12:51'),
(209, 6, '2019-10-27 05:13:01', '2019-10-27 05:13:01'),
(210, 7, '2019-10-27 05:13:17', '2019-10-27 05:13:17'),
(211, 6, '2019-10-28 00:24:09', '2019-10-28 00:24:09'),
(212, 6, '2019-10-28 02:43:29', '2019-10-28 02:43:29'),
(213, 6, '2019-10-28 19:53:07', '2019-10-28 19:53:07'),
(214, 7, '2019-10-28 21:49:07', '2019-10-28 21:49:07'),
(215, 8, '2019-10-28 21:50:04', '2019-10-28 21:50:04'),
(216, 8, '2019-10-28 21:54:16', '2019-10-28 21:54:16'),
(217, 11, '2019-10-28 22:01:20', '2019-10-28 22:01:20'),
(218, 8, '2019-10-28 22:15:49', '2019-10-28 22:15:49'),
(219, 11, '2019-10-28 22:16:06', '2019-10-28 22:16:06'),
(220, 6, '2019-10-28 22:17:09', '2019-10-28 22:17:09'),
(221, 6, '2019-10-29 01:26:23', '2019-10-29 01:26:23'),
(222, 6, '2019-10-29 01:32:36', '2019-10-29 01:32:36'),
(223, 6, '2019-10-29 01:42:40', '2019-10-29 01:42:40'),
(224, 6, '2019-10-29 01:46:09', '2019-10-29 01:46:09'),
(225, 8, '2019-10-29 01:48:19', '2019-10-29 01:48:19'),
(226, 7, '2019-10-29 01:49:56', '2019-10-29 01:49:56'),
(227, 6, '2019-10-29 01:50:39', '2019-10-29 01:50:39'),
(228, 6, '2019-10-29 01:52:56', '2019-10-29 01:52:56'),
(229, 8, '2019-10-29 01:55:36', '2019-10-29 01:55:36'),
(230, 6, '2019-10-29 02:23:23', '2019-10-29 02:23:23'),
(231, 8, '2019-10-29 02:24:07', '2019-10-29 02:24:07'),
(232, 7, '2019-10-29 02:28:13', '2019-10-29 02:28:13'),
(233, 6, '2019-10-29 02:29:01', '2019-10-29 02:29:01'),
(234, 6, '2019-10-29 02:31:44', '2019-10-29 02:31:44'),
(235, 8, '2019-10-29 02:32:36', '2019-10-29 02:32:36'),
(236, 7, '2019-10-29 02:33:34', '2019-10-29 02:33:34'),
(237, 6, '2019-10-29 02:34:31', '2019-10-29 02:34:31'),
(238, 8, '2019-10-29 02:35:15', '2019-10-29 02:35:15'),
(239, 6, '2019-10-29 02:55:58', '2019-10-29 02:55:58'),
(240, 7, '2019-10-29 02:56:07', '2019-10-29 02:56:07'),
(241, 8, '2019-10-29 02:56:17', '2019-10-29 02:56:17'),
(242, 6, '2019-10-29 02:56:52', '2019-10-29 02:56:52'),
(243, 6, '2019-10-29 02:59:11', '2019-10-29 02:59:11'),
(244, 6, '2019-10-29 19:24:31', '2019-10-29 19:24:31'),
(245, 8, '2019-10-29 19:35:37', '2019-10-29 19:35:37'),
(246, 8, '2019-10-29 19:36:29', '2019-10-29 19:36:29'),
(247, 7, '2019-10-29 19:37:23', '2019-10-29 19:37:23'),
(248, 6, '2019-10-29 19:44:58', '2019-10-29 19:44:58'),
(249, 8, '2019-10-29 19:49:29', '2019-10-29 19:49:29'),
(250, 7, '2019-10-29 19:54:10', '2019-10-29 19:54:10'),
(251, 8, '2019-10-29 19:59:17', '2019-10-29 19:59:17'),
(252, 6, '2019-10-29 20:04:15', '2019-10-29 20:04:15'),
(253, 7, '2019-10-29 20:09:27', '2019-10-29 20:09:27'),
(254, 7, '2019-10-29 20:09:43', '2019-10-29 20:09:43'),
(255, 8, '2019-10-29 20:09:59', '2019-10-29 20:09:59'),
(256, 6, '2019-10-29 20:10:23', '2019-10-29 20:10:23'),
(257, 7, '2019-10-29 20:14:02', '2019-10-29 20:14:02'),
(258, 6, '2019-10-29 20:14:21', '2019-10-29 20:14:21'),
(259, 8, '2019-10-29 20:46:45', '2019-10-29 20:46:45'),
(260, 6, '2019-10-29 21:28:02', '2019-10-29 21:28:02'),
(261, 6, '2019-10-29 21:49:39', '2019-10-29 21:49:39'),
(262, 8, '2019-10-29 22:23:08', '2019-10-29 22:23:08'),
(263, 6, '2019-10-29 22:23:20', '2019-10-29 22:23:20'),
(264, 6, '2019-10-29 22:48:49', '2019-10-29 22:48:49'),
(265, 8, '2019-10-29 22:49:43', '2019-10-29 22:49:43'),
(266, 7, '2019-10-29 22:52:07', '2019-10-29 22:52:07'),
(267, 6, '2019-10-29 22:56:02', '2019-10-29 22:56:02'),
(268, 8, '2019-10-29 22:57:06', '2019-10-29 22:57:06'),
(269, 7, '2019-10-29 22:58:28', '2019-10-29 22:58:28'),
(270, 8, '2019-10-29 23:08:28', '2019-10-29 23:08:28'),
(271, 7, '2019-10-29 23:09:22', '2019-10-29 23:09:22'),
(272, 6, '2019-10-29 23:09:33', '2019-10-29 23:09:33'),
(273, 6, '2019-10-30 01:01:09', '2019-10-30 01:01:09'),
(274, 6, '2019-10-30 01:05:52', '2019-10-30 01:05:52'),
(275, 8, '2019-10-30 01:12:08', '2019-10-30 01:12:08'),
(276, 7, '2019-10-30 01:15:34', '2019-10-30 01:15:34'),
(277, 6, '2019-10-30 01:16:05', '2019-10-30 01:16:05'),
(278, 8, '2019-10-30 01:50:25', '2019-10-30 01:50:25'),
(279, 8, '2019-10-30 01:51:33', '2019-10-30 01:51:33'),
(280, 6, '2019-10-30 01:51:59', '2019-10-30 01:51:59'),
(281, 8, '2019-10-30 01:52:24', '2019-10-30 01:52:24'),
(282, 6, '2019-10-30 01:57:35', '2019-10-30 01:57:35'),
(283, 6, '2019-10-30 01:57:58', '2019-10-30 01:57:58'),
(284, 8, '2019-10-30 01:58:11', '2019-10-30 01:58:11'),
(285, 6, '2019-10-30 02:03:02', '2019-10-30 02:03:02'),
(286, 6, '2019-10-30 02:04:40', '2019-10-30 02:04:40'),
(287, 8, '2019-10-30 02:04:52', '2019-10-30 02:04:52'),
(288, 6, '2019-10-30 02:07:15', '2019-10-30 02:07:15'),
(289, 8, '2019-10-30 02:08:54', '2019-10-30 02:08:54'),
(290, 6, '2019-10-30 02:13:54', '2019-10-30 02:13:54'),
(291, 8, '2019-10-30 02:14:44', '2019-10-30 02:14:44'),
(292, 6, '2019-10-30 02:19:07', '2019-10-30 02:19:07'),
(293, 8, '2019-10-30 02:23:39', '2019-10-30 02:23:39'),
(294, 7, '2019-10-30 02:24:56', '2019-10-30 02:24:56'),
(295, 8, '2019-10-30 02:25:57', '2019-10-30 02:25:57'),
(296, 6, '2019-10-30 02:39:51', '2019-10-30 02:39:51'),
(297, 8, '2019-10-30 02:41:30', '2019-10-30 02:41:30'),
(298, 7, '2019-10-30 02:42:40', '2019-10-30 02:42:40'),
(299, 6, '2019-10-30 02:50:55', '2019-10-30 02:50:55'),
(300, 8, '2019-10-30 03:15:30', '2019-10-30 03:15:30'),
(301, 6, '2019-10-30 04:16:24', '2019-10-30 04:16:24'),
(302, 8, '2019-10-30 04:17:42', '2019-10-30 04:17:42'),
(303, 6, '2019-10-30 04:19:42', '2019-10-30 04:19:42'),
(304, 8, '2019-10-30 04:20:06', '2019-10-30 04:20:06'),
(305, 6, '2019-10-30 04:22:14', '2019-10-30 04:22:14'),
(306, 8, '2019-10-30 04:22:37', '2019-10-30 04:22:37'),
(307, 6, '2019-10-30 04:25:46', '2019-10-30 04:25:46'),
(308, 8, '2019-10-30 04:26:31', '2019-10-30 04:26:31'),
(309, 6, '2019-10-30 04:31:37', '2019-10-30 04:31:37'),
(310, 7, '2019-10-30 04:32:06', '2019-10-30 04:32:06'),
(311, 8, '2019-10-30 04:32:40', '2019-10-30 04:32:40'),
(312, 6, '2019-10-30 04:50:38', '2019-10-30 04:50:38'),
(313, 8, '2019-10-30 04:51:45', '2019-10-30 04:51:45'),
(314, 6, '2019-10-30 18:42:19', '2019-10-30 18:42:19'),
(315, 7, '2019-10-30 18:48:20', '2019-10-30 18:48:20'),
(316, 8, '2019-10-30 18:49:50', '2019-10-30 18:49:50'),
(317, 7, '2019-10-30 18:55:40', '2019-10-30 18:55:40'),
(318, 8, '2019-10-30 18:59:12', '2019-10-30 18:59:12'),
(319, 6, '2019-10-30 19:00:06', '2019-10-30 19:00:06'),
(320, 8, '2019-10-30 19:11:12', '2019-10-30 19:11:12'),
(321, 7, '2019-10-30 19:12:06', '2019-10-30 19:12:06'),
(322, 6, '2019-10-30 19:58:17', '2019-10-30 19:58:17'),
(323, 7, '2019-10-30 19:59:16', '2019-10-30 19:59:16'),
(324, 8, '2019-10-30 19:59:53', '2019-10-30 19:59:53'),
(325, 8, '2019-10-30 20:02:24', '2019-10-30 20:02:24'),
(326, 6, '2019-10-30 20:57:47', '2019-10-30 20:57:47'),
(327, 7, '2019-10-30 21:00:18', '2019-10-30 21:00:18'),
(328, 8, '2019-10-30 21:02:30', '2019-10-30 21:02:30'),
(329, 11, '2019-10-30 21:11:12', '2019-10-30 21:11:12'),
(330, 8, '2019-10-30 21:13:12', '2019-10-30 21:13:12'),
(331, 8, '2019-10-31 00:23:07', '2019-10-31 00:23:07'),
(332, 7, '2019-10-31 00:23:40', '2019-10-31 00:23:40'),
(333, 8, '2019-10-31 01:07:23', '2019-10-31 01:07:23'),
(334, 11, '2019-10-31 01:21:12', '2019-10-31 01:21:12'),
(335, 6, '2019-10-31 02:38:21', '2019-10-31 02:38:21'),
(336, 7, '2019-10-31 02:40:13', '2019-10-31 02:40:13'),
(337, 8, '2019-10-31 02:40:52', '2019-10-31 02:40:52'),
(338, 6, '2019-10-31 18:49:30', '2019-10-31 18:49:30'),
(339, 7, '2019-10-31 18:51:10', '2019-10-31 18:51:10'),
(340, 8, '2019-10-31 18:51:49', '2019-10-31 18:51:49'),
(341, 12, '2019-10-31 20:34:50', '2019-10-31 20:34:50'),
(342, 13, '2019-10-31 20:49:14', '2019-10-31 20:49:14'),
(343, 15, '2019-10-31 22:59:15', '2019-10-31 22:59:15'),
(344, 12, '2019-10-31 23:01:46', '2019-10-31 23:01:46'),
(345, 15, '2019-10-31 23:04:12', '2019-10-31 23:04:12'),
(346, 12, '2019-10-31 23:06:47', '2019-10-31 23:06:47'),
(347, 13, '2019-10-31 23:09:38', '2019-10-31 23:09:38'),
(348, 12, '2019-10-31 23:12:11', '2019-10-31 23:12:11'),
(349, 13, '2019-10-31 23:12:41', '2019-10-31 23:12:41'),
(350, 14, '2019-10-31 23:14:02', '2019-10-31 23:14:02'),
(351, 12, '2019-10-31 23:15:01', '2019-10-31 23:15:01'),
(352, 13, '2019-10-31 23:15:41', '2019-10-31 23:15:41'),
(353, 12, '2019-10-31 23:16:48', '2019-10-31 23:16:48'),
(354, 13, '2019-10-31 23:18:35', '2019-10-31 23:18:35'),
(355, 12, '2019-10-31 23:19:52', '2019-10-31 23:19:52'),
(356, 13, '2019-10-31 23:20:22', '2019-10-31 23:20:22'),
(357, 12, '2019-10-31 23:21:32', '2019-10-31 23:21:32'),
(358, 13, '2019-10-31 23:21:50', '2019-10-31 23:21:50'),
(359, 15, '2019-10-31 23:22:49', '2019-10-31 23:22:49'),
(360, 12, '2019-10-31 23:27:20', '2019-10-31 23:27:20'),
(361, 14, '2019-10-31 23:39:51', '2019-10-31 23:39:51'),
(362, 13, '2019-10-31 23:40:51', '2019-10-31 23:40:51'),
(363, 12, '2019-10-31 23:47:10', '2019-10-31 23:47:10'),
(364, 13, '2019-11-01 00:01:09', '2019-11-01 00:01:09'),
(365, 14, '2019-11-01 00:02:57', '2019-11-01 00:02:57'),
(366, 12, '2019-11-01 00:03:52', '2019-11-01 00:03:52'),
(367, 13, '2019-11-01 00:07:49', '2019-11-01 00:07:49'),
(368, 12, '2019-11-01 00:09:49', '2019-11-01 00:09:49'),
(369, 12, '2019-11-01 00:14:58', '2019-11-01 00:14:58'),
(370, 13, '2019-11-01 01:53:38', '2019-11-01 01:53:38'),
(371, 12, '2019-11-01 02:00:06', '2019-11-01 02:00:06'),
(372, 15, '2019-11-01 02:02:22', '2019-11-01 02:02:22'),
(373, 12, '2019-11-01 02:04:16', '2019-11-01 02:04:16'),
(374, 15, '2019-11-01 02:06:17', '2019-11-01 02:06:17'),
(375, 12, '2019-11-01 02:07:42', '2019-11-01 02:07:42'),
(376, 12, '2019-11-01 02:24:06', '2019-11-01 02:24:06'),
(377, 15, '2019-11-01 02:25:57', '2019-11-01 02:25:57'),
(378, 13, '2019-11-01 02:26:53', '2019-11-01 02:26:53'),
(379, 13, '2019-11-01 02:35:27', '2019-11-01 02:35:27'),
(380, 15, '2019-11-01 02:36:21', '2019-11-01 02:36:21'),
(381, 12, '2019-11-01 02:52:14', '2019-11-01 02:52:14'),
(382, 12, '2019-11-01 23:23:39', '2019-11-01 23:23:39'),
(383, 15, '2019-11-01 23:24:24', '2019-11-01 23:24:24'),
(384, 13, '2019-11-01 23:42:18', '2019-11-01 23:42:18'),
(385, 12, '2019-11-01 23:44:25', '2019-11-01 23:44:25'),
(386, 15, '2019-11-01 23:45:59', '2019-11-01 23:45:59'),
(387, 12, '2019-11-02 05:16:11', '2019-11-02 05:16:11'),
(388, 16, '2019-11-02 05:21:08', '2019-11-02 05:21:08'),
(389, 13, '2019-11-02 05:25:08', '2019-11-02 05:25:08'),
(390, 14, '2019-11-02 05:47:02', '2019-11-02 05:47:02'),
(391, 12, '2019-11-02 05:47:36', '2019-11-02 05:47:36'),
(392, 15, '2019-11-02 06:09:37', '2019-11-02 06:09:37'),
(393, 13, '2019-11-02 06:10:12', '2019-11-02 06:10:12'),
(394, 13, '2019-11-02 06:13:28', '2019-11-02 06:13:28'),
(395, 12, '2019-11-02 20:11:09', '2019-11-02 20:11:09'),
(396, 15, '2019-11-02 20:18:50', '2019-11-02 20:18:50'),
(397, 15, '2019-11-03 00:03:05', '2019-11-03 00:03:05'),
(398, 13, '2019-11-03 00:03:39', '2019-11-03 00:03:39'),
(399, 15, '2019-11-03 00:09:59', '2019-11-03 00:09:59'),
(400, 12, '2019-11-03 00:10:19', '2019-11-03 00:10:19'),
(401, 13, '2019-11-03 03:19:54', '2019-11-03 03:19:54'),
(402, 14, '2019-11-03 03:20:18', '2019-11-03 03:20:18'),
(403, 13, '2019-11-03 03:23:31', '2019-11-03 03:23:31'),
(404, 14, '2019-11-03 05:46:17', '2019-11-03 05:46:17'),
(405, 15, '2019-11-03 05:51:56', '2019-11-03 05:51:56'),
(406, 12, '2019-11-03 19:11:35', '2019-11-03 19:11:35'),
(407, 13, '2019-11-03 19:15:49', '2019-11-03 19:15:49'),
(408, 15, '2019-11-03 19:16:47', '2019-11-03 19:16:47'),
(409, 13, '2019-11-03 20:33:51', '2019-11-03 20:33:51'),
(410, 12, '2019-11-03 20:43:29', '2019-11-03 20:43:29'),
(411, 12, '2019-11-03 21:13:30', '2019-11-03 21:13:30'),
(412, 12, '2019-11-04 01:31:51', '2019-11-04 01:31:51'),
(413, 12, '2019-11-04 01:54:08', '2019-11-04 01:54:08'),
(414, 12, '2019-11-04 01:55:54', '2019-11-04 01:55:54'),
(415, 13, '2019-11-04 01:57:48', '2019-11-04 01:57:48'),
(416, 12, '2019-11-04 02:14:48', '2019-11-04 02:14:48'),
(417, 12, '2019-11-04 21:41:52', '2019-11-04 21:41:52'),
(418, 13, '2019-11-04 21:42:53', '2019-11-04 21:42:53'),
(419, 13, '2019-11-04 21:43:04', '2019-11-04 21:43:04'),
(420, 15, '2019-11-04 21:43:45', '2019-11-04 21:43:45'),
(421, 12, '2019-11-05 19:33:02', '2019-11-05 19:33:02'),
(422, 15, '2019-11-05 19:36:38', '2019-11-05 19:36:38'),
(423, 13, '2019-11-05 19:38:22', '2019-11-05 19:38:22'),
(424, 12, '2019-11-05 19:48:30', '2019-11-05 19:48:30'),
(425, 12, '2019-11-05 19:49:06', '2019-11-05 19:49:06'),
(426, 12, '2019-11-05 19:53:17', '2019-11-05 19:53:17'),
(427, 12, '2019-11-05 20:47:10', '2019-11-05 20:47:10'),
(428, 12, '2019-11-05 20:55:36', '2019-11-05 20:55:36'),
(429, 15, '2019-11-05 20:57:21', '2019-11-05 20:57:21'),
(430, 13, '2019-11-05 20:57:53', '2019-11-05 20:57:53'),
(431, 13, '2019-11-05 21:25:56', '2019-11-05 21:25:56'),
(432, 15, '2019-11-06 01:58:25', '2019-11-06 01:58:25'),
(433, 13, '2019-11-06 04:04:13', '2019-11-06 04:04:13'),
(434, 12, '2019-11-06 04:04:57', '2019-11-06 04:04:57'),
(435, 13, '2019-11-06 19:30:52', '2019-11-06 19:30:52'),
(436, 12, '2019-11-06 19:36:56', '2019-11-06 19:36:56'),
(437, 12, '2019-11-06 19:43:00', '2019-11-06 19:43:00'),
(438, 13, '2019-11-06 20:06:04', '2019-11-06 20:06:04'),
(439, 12, '2019-11-06 20:11:33', '2019-11-06 20:11:33'),
(440, 13, '2019-11-06 20:15:52', '2019-11-06 20:15:52'),
(441, 15, '2019-11-06 20:16:16', '2019-11-06 20:16:16'),
(442, 12, '2019-11-06 20:16:31', '2019-11-06 20:16:31'),
(443, 13, '2019-11-06 20:19:05', '2019-11-06 20:19:05'),
(444, 12, '2019-11-06 20:48:26', '2019-11-06 20:48:26'),
(445, 13, '2019-11-06 21:09:01', '2019-11-06 21:09:01'),
(446, 15, '2019-11-06 21:17:07', '2019-11-06 21:17:07'),
(447, 12, '2019-11-06 21:24:48', '2019-11-06 21:24:48'),
(448, 12, '2019-11-06 21:38:47', '2019-11-06 21:38:47'),
(449, 15, '2019-11-06 21:45:48', '2019-11-06 21:45:48'),
(450, 13, '2019-11-06 21:48:41', '2019-11-06 21:48:41'),
(451, 15, '2019-11-06 22:28:43', '2019-11-06 22:28:43'),
(452, 13, '2019-11-06 22:34:07', '2019-11-06 22:34:07'),
(453, 12, '2019-11-06 22:37:33', '2019-11-06 22:37:33'),
(454, 13, '2019-11-06 22:38:14', '2019-11-06 22:38:14'),
(455, 15, '2019-11-06 22:41:46', '2019-11-06 22:41:46'),
(456, 15, '2019-11-06 22:44:29', '2019-11-06 22:44:29'),
(457, 12, '2019-11-06 22:44:49', '2019-11-06 22:44:49'),
(458, 15, '2019-11-06 22:53:54', '2019-11-06 22:53:54'),
(459, 12, '2019-11-06 23:32:54', '2019-11-06 23:32:54'),
(460, 13, '2019-11-06 23:40:02', '2019-11-06 23:40:02'),
(461, 15, '2019-11-06 23:40:45', '2019-11-06 23:40:45'),
(462, 12, '2019-11-06 23:43:13', '2019-11-06 23:43:13'),
(463, 15, '2019-11-07 00:06:32', '2019-11-07 00:06:32'),
(464, 13, '2019-11-07 00:07:24', '2019-11-07 00:07:24'),
(465, 13, '2019-11-07 00:47:30', '2019-11-07 00:47:30'),
(466, 15, '2019-11-07 00:48:05', '2019-11-07 00:48:05'),
(467, 12, '2019-11-07 00:52:37', '2019-11-07 00:52:37'),
(468, 12, '2019-11-07 01:27:24', '2019-11-07 01:27:24'),
(469, 12, '2019-11-07 19:02:08', '2019-11-07 19:02:08'),
(470, 13, '2019-11-07 19:21:33', '2019-11-07 19:21:33'),
(471, 15, '2019-11-07 19:23:28', '2019-11-07 19:23:28'),
(472, 13, '2019-11-07 19:24:15', '2019-11-07 19:24:15'),
(473, 12, '2019-11-07 19:57:37', '2019-11-07 19:57:37'),
(474, 12, '2019-11-08 01:12:33', '2019-11-08 01:12:33'),
(475, 13, '2019-11-08 01:28:01', '2019-11-08 01:28:01'),
(476, 15, '2019-11-08 01:31:39', '2019-11-08 01:31:39'),
(477, 12, '2019-11-08 01:42:22', '2019-11-08 01:42:22'),
(478, 12, '2019-11-08 03:39:46', '2019-11-08 03:39:46'),
(479, 13, '2019-11-08 03:41:49', '2019-11-08 03:41:49'),
(480, 12, '2019-11-10 20:03:10', '2019-11-10 20:03:10'),
(481, 13, '2019-11-10 20:05:59', '2019-11-10 20:05:59'),
(482, 15, '2019-11-10 20:06:53', '2019-11-10 20:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `started` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expired` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `user_id`, `started`, `expired`, `created_at`, `updated_at`) VALUES
(5, 13, '2019-10-31 23:08:07', '2019-11-30 23:08:07', '2019-10-31 23:08:07', '2019-10-31 23:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `msg` text NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `msg`, `ip`, `created_at`, `updated_at`) VALUES
(9, 'Kurniawan', 'kurniawan@ex.com', '1404514045', 'Wah, bagus nih!', '192.168.1.226', '2019-11-06 23:47:29', '2019-11-06 23:47:29'),
(10, 'Daron Malakian', 'daron@ex.com', '4124578362', 'Ini merupakan sebuah pesan yang bisa dibilang cukup panjang.', '192.136.1.123', '2019-11-06 23:49:57', '2019-11-06 23:49:57');

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

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
-- Table structure for table `report_logs`
--

CREATE TABLE `report_logs` (
  `id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `pelapor` varchar(191) NOT NULL,
  `dilapor` varchar(191) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_logs`
--

INSERT INTO `report_logs` (`id`, `forum_id`, `comment_id`, `pelapor`, `dilapor`, `kategori`, `created_at`, `updated_at`) VALUES
(4, 6, 14, 'Kurniawan Pratama', 'Rob Halford', 'Bahasa Kasar', '2019-10-31 23:15:54', '2019-10-31 23:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_read` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` int(11) NOT NULL DEFAULT '1',
  `is_banned` int(11) DEFAULT '0',
  `online` int(11) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `article_read`, `points`, `name`, `email`, `email_verified_at`, `avatar`, `roles`, `is_banned`, `online`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 205, 0, 'Moderator', 'moderator@ex.com', NULL, 'uploads/avatars/1572580106jpg', 3, 0, 0, '$2y$10$I1yDPJwmTWcEG7V7HbMFFeDKob5RIx3uREBjCAoCsJVTFLo/Ij.AO', 'AgIDArh5Chutwr8Y82bQ8NmF48cfGJeH2mh8SnzcKhTJoXsT76uqN4qpRUR5', '2019-10-31 20:33:18', '2019-11-10 20:05:54'),
(13, 3, 0, 'Kurniawan Pratama', 'kurniawan@ex.com', NULL, 'uploads/avatars/1572589130jpg', 1, 0, 0, '$2y$10$ipm2OggYXnBDY2gjYrJIAubEBXxWaM3Z/9TOwmontNlmLIx2KdzpG', 'Mk9NkTmXhv9K9iTT4Jr19sizLtMMbZvrmOYBcOQh9If7Bn8LyTZ8AEWlnnEy', '2019-10-31 20:34:11', '2019-11-10 20:06:38'),
(14, 0, 0, 'Rob Halford', 'rob@ex.com', NULL, 'uploads/avatars/1572698846jpg', 1, 0, 0, '$2y$10$xtHtbme.mt68I17qK.vAU.1.5Z8OZEHCRE3vrldTuL1Nt/8z2Yb4y', '0fBEIU72ecw4kdzNzf8FgwauMIp03IMekL0IouMhSg3gi3Vhf3Q0n3YQHGMX', '2019-10-31 20:34:27', '2019-11-02 05:47:26'),
(15, 3, 40, 'Psikolog 1', 'psione@ex.com', NULL, 'uploads/avatars/1572588394jpeg', 2, 0, 1, '$2y$10$NowKMEr8vVQ8e7t/d0aRbOwrzOVf8MbRkVlOiIawsWolwg2dGBTk2', 'ZVXacOuAEgQrNEZcvAzw5YsVWzYwfzYEWnnl6Pu0VfwLtaiKV0JUOBzILYUW', '2019-10-31 20:36:08', '2019-11-10 20:06:53'),
(16, 0, 25, 'Psikolog 2', 'psitwo@ex.com', NULL, NULL, 2, 0, 0, '$2y$10$FnNKfL6e/QQtuZr.eETpKeF6YEqCt/yItJSV.kIPJnceTdDxJ0Ouq', 'zLXfEj9xeF5I2Lo5a2aPGSd8saWDPufPkbRJFfH1mnRpXCpD3l4d6aZ8vzdu', '2019-10-31 20:36:24', '2019-11-06 19:37:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claim_logs`
--
ALTER TABLE `claim_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- Indexes for table `report_logs`
--
ALTER TABLE `report_logs`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `claim_logs`
--
ALTER TABLE `claim_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `forum_comments`
--
ALTER TABLE `forum_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;
--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `report_logs`
--
ALTER TABLE `report_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
