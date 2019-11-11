-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2019 at 06:57 AM
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
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `body`, `status`, `category_id`, `user_id`, `views`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'Judul Artikel Pertama', 'judul-artikel-pertama-14-10-2019', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi iaculis imperdiet est, in ullamcorper eros facilisis eget. Sed at malesuada leo. Maecenas tincidunt, justo gravida sodales mattis, nisi tellus interdum elit, nec placerat elit massa ac enim. Phasellus posuere lorem ac aliquet sollicitudin. Morbi at scelerisque tortor. Nullam vehicula tempor lectus, quis aliquam lacus ornare eget. Duis dignissim a ante vitae dapibus. Suspendisse fringilla est vitae felis porttitor posuere.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">In at feugiat tellus. Aliquam sollicitudin elit eu felis porta, non condimentum lectus elementum. Nunc sodales mattis faucibus. Vivamus sollicitudin volutpat posuere. Sed ac aliquam leo, vulputate lobortis arcu. Donec tempus id odio sed gravida. Donec erat nunc, iaculis a sapien et, efficitur pulvinar justo. Aenean ut commodo dolor, nec blandit sem. Pellentesque consequat mollis ligula, id malesuada tellus pharetra a. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean in mattis lectus. Mauris suscipit libero in massa tincidunt, in vulputate nisl rutrum.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Etiam nibh nunc, pretium quis ipsum ac, bibendum imperdiet odio. Pellentesque tincidunt posuere magna, sit amet dapibus nibh eleifend nec. Pellentesque efficitur, mauris at accumsan rutrum, ipsum mi ultrices diam, vel convallis nunc dui vel sapien. Aliquam felis eros, interdum vel lacus eu, placerat malesuada quam. Ut consectetur tristique leo, in iaculis nulla congue in. Sed volutpat eu nisl ut egestas. Ut ut nunc porta, blandit ipsum at, convallis ante. Aenean varius erat purus, vitae consequat turpis suscipit ut. Nulla lacinia consectetur mauris, eget gravida massa tincidunt a.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Duis et urna eget dolor egestas semper porttitor sit amet nisi. Ut accumsan euismod ante, molestie porttitor ipsum varius quis. Duis in vehicula tellus. Phasellus lobortis pretium urna, non dictum sem luctus dapibus. Cras volutpat a magna vitae dapibus. Fusce bibendum laoreet tortor a accumsan. Fusce ornare eu velit ut ornare. Donec lobortis sit amet velit sed maximus. Etiam a porta eros. Vestibulum maximus venenatis maximus. Duis dapibus luctus eleifend. Etiam aliquam augue eget tortor vehicula tempor.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Duis mauris quam, maximus sed vestibulum vitae, faucibus sed dolor. Aliquam lobortis sapien et hendrerit auctor. Etiam imperdiet condimentum fermentum. Nullam nec eros eget felis dapibus convallis in ut magna. Proin tristique sagittis malesuada. Suspendisse auctor dolor eu arcu tincidunt, eget sagittis mi lacinia. Quisque accumsan efficitur sagittis. Aenean ante odio, molestie non metus ac, malesuada laoreet velit. Aliquam id elit egestas, porta magna vitae, iaculis lectus. Sed in orci feugiat sem efficitur scelerisque ac id magna. Fusce ornare augue sed diam fringilla molestie. Aliquam egestas lectus quis accumsan feugiat. Integer ut suscipit massa.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">sagittis, urna ante hendrerit risus, eget sodales dolor leo quis lectus. In hac habitasse platea dictumst. Vivamus vel leo non purus scelerisque tempor. Etiam nec ex ac arcu tincidunt pulvinar. Nulla eu libero id mi molestie facilisis. Vivamus accumsan dolor eu mi vulputate, sed aliquam mi ornare. Nam commodo tristique urna, nec faucibus leo luctus id. Ut metus lectus, molestie id dictum sed, vehicula a nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean ac est volutpat, ullamcorper tellus vitae, tristique arcu. Nulla magna magna, vulputate ac enim nec, tempor feugiat enim.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Pellentesque suscipit vel mauris ac sagittis. Cras auctor massa tincidunt mauris ultrices, id sodales justo placerat. Aliquam auctor eros ligula, eu varius nunc dapibus sit amet. Maecenas in metus tincidunt, consectetur ligula eget, tempus ligula. Phasellus aliquam dignissim est ut sollicitudin. Pellentesque enim erat, condimentum ut vulputate sollicitudin, varius ac enim. Pellentesque egestas feugiat arcu, et euismod massa posuere quis. Aenean lacinia leo eget turpis accumsan viverra.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Suspendisse velit massa, laoreet a convallis quis, posuere non odio. Fusce facilisis viverra porttitor. Sed tempor sem dui, eu pharetra dolor mollis a. Donec vitae iaculis nunc. Nullam quis orci eu urna placerat sollicitudin. Phasellus consequat risus vitae velit sollicitudin pulvinar. In ultricies magna diam, volutpat viverra augue semper ac. Integer pharetra vitae neque eu facilisis. Nunc pretium dignissim lectus, sit amet dapibus nibh varius nec. Suspendisse at lobortis nisi. Nulla efficitur pretium velit sit amet venenatis. Aliquam erat volutpat.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Integer non aliquet nibh, et luctus enim. Donec convallis, diam ut ornare semper, arcu leo posuere dui, eu ornare augue ipsum eget quam. Maecenas vestibulum, tellus in ornare malesuada, nibh magna ultrices lorem, in luctus nunc elit non quam. Proin laoreet pharetra tincidunt. Quisque dapibus sollicitudin justo ac tristique. Pellentesque ullamcorper tortor sit amet lacus pharetra porta. Aliquam eget ligula elementum, sagittis dolor eget, interdum urna. Ut auctor, massa eu pretium sollicitudin, enim lorem aliquet elit, et venenatis turpis dolor at mauris. Phasellus mattis, urna eu pulvinar laoreet, ipsum libero laoreet elit, ut iaculis augue ex sit amet erat.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Maecenas ac faucibus arcu, quis molestie leo. Nulla facilisi. Suspendisse maximus neque vel sapien dapibus congue. Ut suscipit eros ac lectus bibendum, a fringilla diam gravida. Mauris ultricies, leo ac commodo semper, ante justo venenatis lorem, quis sodales eros augue sed mi. Aenean eget nulla ornare, ornare est eu, maximus elit. Vestibulum in massa eu lacus suscipit auctor at vitae ligula. Quisque libero risus, facilisis in sem sed, euismod dignissim lorem. Integer non tortor sed enim porta finibus a quis felis. Nunc sed euismod arcu, id gravida risus. Nunc faucibus tempor eros non ornare. Praesent vitae semper eros. Cras fringilla sem non hendrerit suscipit.</p>', 'Approved', 4, 6, 40, '2019-08-08 21:14:01', '2019-10-13 21:22:06', NULL),
(9, 'Judul Artikel Kedua', 'judul-artikel-kedua-09-10-2019', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi iaculis imperdiet est, in ullamcorper eros facilisis eget. Sed at malesuada leo. Maecenas tincidunt, justo gravida sodales mattis, nisi tellus interdum elit, nec placerat elit massa ac enim. Phasellus posuere lorem ac aliquet sollicitudin. Morbi at scelerisque tortor. Nullam vehicula tempor lectus, quis aliquam lacus ornare eget. Duis dignissim a ante vitae dapibus. Suspendisse fringilla est vitae felis porttitor posuere.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">In at feugiat tellus. Aliquam sollicitudin elit eu felis porta, non condimentum lectus elementum. Nunc sodales mattis faucibus. Vivamus sollicitudin volutpat posuere. Sed ac aliquam leo, vulputate lobortis arcu. Donec tempus id odio sed gravida. Donec erat nunc, iaculis a sapien et, efficitur pulvinar justo. Aenean ut commodo dolor, nec blandit sem. Pellentesque consequat mollis ligula, id malesuada tellus pharetra a. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean in mattis lectus. Mauris suscipit libero in massa tincidunt, in vulputate nisl rutrum.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Etiam nibh nunc, pretium quis ipsum ac, bibendum imperdiet odio. Pellentesque tincidunt posuere magna, sit amet dapibus nibh eleifend nec. Pellentesque efficitur, mauris at accumsan rutrum, ipsum mi ultrices diam, vel convallis nunc dui vel sapien. Aliquam felis eros, interdum vel lacus eu, placerat malesuada quam. Ut consectetur tristique leo, in iaculis nulla congue in. Sed volutpat eu nisl ut egestas. Ut ut nunc porta, blandit ipsum at, convallis ante. Aenean varius erat purus, vitae consequat turpis suscipit ut. Nulla lacinia consectetur mauris, eget gravida massa tincidunt a.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Duis et urna eget dolor egestas semper porttitor sit amet nisi. Ut accumsan euismod ante, molestie porttitor ipsum varius quis. Duis in vehicula tellus. Phasellus lobortis pretium urna, non dictum sem luctus dapibus. Cras volutpat a magna vitae dapibus. Fusce bibendum laoreet tortor a accumsan. Fusce ornare eu velit ut ornare. Donec lobortis sit amet velit sed maximus. Etiam a porta eros. Vestibulum maximus venenatis maximus. Duis dapibus luctus eleifend. Etiam aliquam augue eget tortor vehicula tempor.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Duis mauris quam, maximus sed vestibulum vitae, faucibus sed dolor. Aliquam lobortis sapien et hendrerit auctor. Etiam imperdiet condimentum fermentum. Nullam nec eros eget felis dapibus convallis in ut magna. Proin tristique sagittis malesuada. Suspendisse auctor dolor eu arcu tincidunt, eget sagittis mi lacinia. Quisque accumsan efficitur sagittis. Aenean ante odio, molestie non metus ac, malesuada laoreet velit. Aliquam id elit egestas, porta magna vitae, iaculis lectus. Sed in orci feugiat sem efficitur scelerisque ac id magna. Fusce ornare augue sed diam fringilla molestie. Aliquam egestas lectus quis accumsan feugiat. Integer ut suscipit massa.</p>', 'Approved', 5, 6, 20, '2019-09-08 21:14:18', '2019-10-13 21:22:13', NULL),
(10, 'Judul Artikel Ketiga', 'judul-artikel-ketiga-09-10-2019', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi iaculis imperdiet est, in ullamcorper eros facilisis eget. Sed at malesuada leo. Maecenas tincidunt, justo gravida sodales mattis, nisi tellus interdum elit, nec placerat elit massa ac enim. Phasellus posuere lorem ac aliquet sollicitudin. Morbi at scelerisque tortor. Nullam vehicula tempor lectus, quis aliquam lacus ornare eget. Duis dignissim a ante vitae dapibus. Suspendisse fringilla est vitae felis porttitor posuere.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">In at feugiat tellus. Aliquam sollicitudin elit eu felis porta, non condimentum lectus elementum. Nunc sodales mattis faucibus. Vivamus sollicitudin volutpat posuere. Sed ac aliquam leo, vulputate lobortis arcu. Donec tempus id odio sed gravida. Donec erat nunc, iaculis a sapien et, efficitur pulvinar justo. Aenean ut commodo dolor, nec blandit sem. Pellentesque consequat mollis ligula, id malesuada tellus pharetra a. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean in mattis lectus. Mauris suscipit libero in massa tincidunt, in vulputate nisl rutrum.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Etiam nibh nunc, pretium quis ipsum ac, bibendum imperdiet odio. Pellentesque tincidunt posuere magna, sit amet dapibus nibh eleifend nec. Pellentesque efficitur, mauris at accumsan rutrum, ipsum mi ultrices diam, vel convallis nunc dui vel sapien. Aliquam felis eros, interdum vel lacus eu, placerat malesuada quam. Ut consectetur tristique leo, in iaculis nulla congue in. Sed volutpat eu nisl ut egestas. Ut ut nunc porta, blandit ipsum at, convallis ante. Aenean varius erat purus, vitae consequat turpis suscipit ut. Nulla lacinia consectetur mauris, eget gravida massa tincidunt a.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Duis et urna eget dolor egestas semper porttitor sit amet nisi. Ut accumsan euismod ante, molestie porttitor ipsum varius quis. Duis in vehicula tellus. Phasellus lobortis pretium urna, non dictum sem luctus dapibus. Cras volutpat a magna vitae dapibus. Fusce bibendum laoreet tortor a accumsan. Fusce ornare eu velit ut ornare. Donec lobortis sit amet velit sed maximus. Etiam a porta eros. Vestibulum maximus venenatis maximus. Duis dapibus luctus eleifend. Etiam aliquam augue eget tortor vehicula tempor.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Duis mauris quam, maximus sed vestibulum vitae, faucibus sed dolor. Aliquam lobortis sapien et hendrerit auctor. Etiam imperdiet condimentum fermentum. Nullam nec eros eget felis dapibus convallis in ut magna. Proin tristique sagittis malesuada. Suspendisse auctor dolor eu arcu tincidunt, eget sagittis mi lacinia. Quisque accumsan efficitur sagittis. Aenean ante odio, molestie non metus ac, malesuada laoreet velit. Aliquam id elit egestas, porta magna vitae, iaculis lectus. Sed in orci feugiat sem efficitur scelerisque ac id magna. Fusce ornare augue sed diam fringilla molestie. Aliquam egestas lectus quis accumsan feugiat. Integer ut suscipit massa.</p>', 'Removed', 6, 6, 1, '2019-10-08 21:14:34', '2019-10-12 22:11:04', '2019-10-12 22:11:04'),
(11, 'Judul Artikel Keempat', 'judul-artikel-keempat-14-10-2019', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi iaculis imperdiet est, in ullamcorper eros facilisis eget. Sed at malesuada leo. Maecenas tincidunt, justo gravida sodales mattis, nisi tellus interdum elit, nec placerat elit massa ac enim. Phasellus posuere lorem ac aliquet sollicitudin. Morbi at scelerisque tortor. Nullam vehicula tempor lectus, quis aliquam lacus ornare eget. Duis dignissim a ante vitae dapibus. Suspendisse fringilla est vitae felis porttitor posuere.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">In at feugiat tellus. Aliquam sollicitudin elit eu felis porta, non condimentum lectus elementum. Nunc sodales mattis faucibus. Vivamus sollicitudin volutpat posuere. Sed ac aliquam leo, vulputate lobortis arcu. Donec tempus id odio sed gravida. Donec erat nunc, iaculis a sapien et, efficitur pulvinar justo. Aenean ut commodo dolor, nec blandit sem. Pellentesque consequat mollis ligula, id malesuada tellus pharetra a. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean in mattis lectus. Mauris suscipit libero in massa tincidunt, in vulputate nisl rutrum.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Etiam nibh nunc, pretium quis ipsum ac, bibendum imperdiet odio. Pellentesque tincidunt posuere magna, sit amet dapibus nibh eleifend nec. Pellentesque efficitur, mauris at accumsan rutrum, ipsum mi ultrices diam, vel convallis nunc dui vel sapien. Aliquam felis eros, interdum vel lacus eu, placerat malesuada quam. Ut consectetur tristique leo, in iaculis nulla congue in. Sed volutpat eu nisl ut egestas. Ut ut nunc porta, blandit ipsum at, convallis ante. Aenean varius erat purus, vitae consequat turpis suscipit ut. Nulla lacinia consectetur mauris, eget gravida massa tincidunt a.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Duis et urna eget dolor egestas semper porttitor sit amet nisi. Ut accumsan euismod ante, molestie porttitor ipsum varius quis. Duis in vehicula tellus. Phasellus lobortis pretium urna, non dictum sem luctus dapibus. Cras volutpat a magna vitae dapibus. Fusce bibendum laoreet tortor a accumsan. Fusce ornare eu velit ut ornare. Donec lobortis sit amet velit sed maximus. Etiam a porta eros. Vestibulum maximus venenatis maximus. Duis dapibus luctus eleifend. Etiam aliquam augue eget tortor vehicula tempor.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Duis mauris quam, maximus sed vestibulum vitae, faucibus sed dolor. Aliquam lobortis sapien et hendrerit auctor. Etiam imperdiet condimentum fermentum. Nullam nec eros eget felis dapibus convallis in ut magna. Proin tristique sagittis malesuada. Suspendisse auctor dolor eu arcu tincidunt, eget sagittis mi lacinia. Quisque accumsan efficitur sagittis. Aenean ante odio, molestie non metus ac, malesuada laoreet velit. Aliquam id elit egestas, porta magna vitae, iaculis lectus. Sed in orci feugiat sem efficitur scelerisque ac id magna. Fusce ornare augue sed diam fringilla molestie. Aliquam egestas lectus quis accumsan feugiat. Integer ut suscipit massa.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc congue faucibus felis at iaculis. Praesent malesuada, erat eu convallis sagittis, urna ante hendrerit risus, eget sodales dolor leo quis lectus. In hac habitasse platea dictumst. Vivamus vel leo non purus scelerisque tempor. Etiam nec ex ac arcu tincidunt pulvinar. Nulla eu libero id mi molestie facilisis. Vivamus accumsan dolor eu mi vulputate, sed aliquam mi ornare. Nam commodo tristique urna, nec faucibus leo luctus id. Ut metus lectus, molestie id dictum sed, vehicula a nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean ac est volutpat, ullamcorper tellus vitae, tristique arcu. Nulla magna magna, vulputate ac enim nec, tempor feugiat enim.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Pellentesque suscipit vel mauris ac sagittis. Cras auctor massa tincidunt mauris ultrices, id sodales justo placerat. Aliquam auctor eros ligula, eu varius nunc dapibus sit amet. Maecenas in metus tincidunt, consectetur ligula eget, tempus ligula. Phasellus aliquam dignissim est ut sollicitudin. Pellentesque enim erat, condimentum ut vulputate sollicitudin, varius ac enim. Pellentesque egestas feugiat arcu, et euismod massa posuere quis. Aenean lacinia leo eget turpis accumsan viverra.</p>', 'Unapproved', 4, 6, 5, '2019-10-08 21:14:52', '2019-10-13 21:04:44', NULL),
(12, 'Judul Artikel Kelima', 'judul-artikel-kelima-09-10-2019', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum euismod fermentum. Donec consectetur semper diam, at vulputate elit. Proin lobortis augue consequat tempus feugiat. Pellentesque tincidunt ultrices orci. Etiam placerat interdum est a scelerisque. Pellentesque ac nulla sit amet velit interdum interdum. Nulla vehicula diam mi, sit amet commodo justo facilisis nec. Vestibulum sed metus porta, tempor leo et, consequat metus. Etiam nunc mi, mollis vel luctus sit amet, luctus venenatis metus. Suspendisse potenti. Donec dignissim eros nec erat aliquet, a tempus lectus semper. Maecenas vel nibh nec leo molestie elementum et a ligula.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Nam eu faucibus mi. Nunc convallis consequat volutpat. Maecenas aliquam urna nulla, et sagittis turpis porttitor sed. Mauris ac arcu eu lectus vulputate aliquet quis vitae turpis. Vestibulum fringilla quis urna sed placerat. Mauris ullamcorper orci nunc, a consectetur lectus egestas non. Donec blandit neque nec est varius, eu venenatis sapien fermentum. Morbi mollis, leo sit amet aliquet ultrices, odio nisl dignissim libero, quis consectetur ex mauris sed quam. Suspendisse scelerisque sit amet massa sed congue.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Sed in quam congue ex hendrerit posuere. Nunc dui est, mattis sit amet ligula eu, elementum vulputate orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam at libero enim. Praesent vestibulum, libero ut placerat mollis, ligula nisl blandit nibh, et placerat massa libero vitae nulla. Sed bibendum arcu ligula. Morbi dapibus, elit eu vulputate rutrum, ante sapien hendrerit massa, eu lacinia dolor orci ac neque. Etiam tempor interdum metus, accumsan molestie urna rutrum a. Ut posuere odio at quam cursus, ac auctor neque sollicitudin. Suspendisse diam ipsum, ornare eu dolor a, rutrum tincidunt metus. Pellentesque pretium tincidunt luctus.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Donec in sem in turpis tincidunt tincidunt a sed lorem. Quisque sed vulputate mauris. Nunc nibh nibh, blandit vitae nibh a, consectetur feugiat arcu. Ut aliquet eros et magna pellentesque tincidunt. Etiam sit amet aliquet erat, at blandit quam. Sed nec molestie mauris. Nulla facilisi. Mauris nec semper metus, nec fringilla augue. Nam aliquet ex laoreet felis finibus, vel lacinia nulla eleifend. Pellentesque finibus nisi id dui iaculis, sit amet luctus libero ornare. Curabitur a facilisis leo. Pellentesque non turpis et erat rhoncus porta. Donec malesuada libero vitae dictum tristique.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Integer non ex molestie, vestibulum turpis vitae, volutpat purus. Donec iaculis euismod eros. Fusce egestas facilisis justo, nec consectetur diam. Quisque sagittis pharetra sem sit amet placerat. Quisque molestie finibus erat eget egestas. Ut vitae egestas elit. In sed vestibulum augue. Nunc ac mi magna.</p>', 'Removed', 5, 7, 2, '2019-10-09 04:18:08', '2019-10-14 20:46:11', '2019-10-14 20:46:11'),
(13, 'Judul Artikel Keenam', 'judul-artikel-keenam-14-10-2019', '<p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum euismod fermentum. Donec consectetur semper diam, at vulputate elit. Proin lobortis augue consequat tempus feugiat. Pellentesque tincidunt ultrices orci. Etiam placerat interdum est a scelerisque. Pellentesque ac nulla sit amet velit interdum interdum. Nulla vehicula diam mi, sit amet commodo justo facilisis nec. Vestibulum sed metus porta, tempor leo et, consequat metus. Etiam nunc mi, mollis vel luctus sit amet, luctus venenatis metus. Suspendisse potenti. Donec dignissim eros nec erat aliquet, a tempus lectus semper. Maecenas vel nibh nec leo molestie elementum et a ligula.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">Nam eu faucibus mi. Nunc convallis consequat volutpat. Maecenas aliquam urna nulla, et sagittis turpis porttitor sed. Mauris ac arcu eu lectus vulputate aliquet quis vitae turpis. Vestibulum fringilla quis urna sed placerat. Mauris ullamcorper orci nunc, a consectetur lectus egestas non. Donec blandit neque nec est varius, eu venenatis sapien fermentum. Morbi mollis, leo sit amet aliquet ultrices, odio nisl dignissim libero, quis consectetur ex mauris sed quam. Suspendisse scelerisque sit amet massa sed congue.</p><p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\" style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\">Sed in quam congue ex hendrerit posuere. Nunc dui est, mattis sit amet ligula eu, elementum vulputate orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam at libero enim. Praesent vestibulum, libero ut placerat mollis, ligula nisl blandit nibh, et placerat massa libero vitae nulla. Sed bibendum arcu ligula. Morbi dapibus, elit eu vulputate rutrum, ante sapien hendrerit massa, eu lacinia dolor orci ac neque. Etiam tempor interdum metus, accumsan molestie urna rutrum a. Ut posuere odio at quam cursus, ac auctor neque sollicitudin. Suspendisse diam ipsum, ornare eu dolor a, rutrum tincidunt metus. Pellentesque pretium tincidunt luctus.</p>', 'Unapproved', 6, 6, 1, '2019-10-12 07:10:30', '2019-10-14 02:15:16', NULL);

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
(4, 'Esensi Diri', '2019-10-08 21:12:56', '2019-10-08 21:12:56'),
(5, 'Ilmu Psikologi', '2019-10-08 21:13:08', '2019-10-08 21:13:40'),
(6, 'Kesehatan Mental', '2019-10-08 21:13:27', '2019-10-08 21:13:27');

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
(11, 9, 6, 1, '2019-10-08 21:15:01', '2019-10-08 21:15:01'),
(12, 8, 8, 1, '2019-10-10 02:02:15', '2019-10-13 21:22:38'),
(13, 8, 7, 0, '2019-10-10 04:14:03', '2019-10-10 04:18:37'),
(14, 11, 8, 0, '2019-10-13 05:16:49', '2019-10-13 21:22:32'),
(15, 9, 8, 0, '2019-10-14 20:36:42', '2019-10-14 20:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_finished` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user_id`, `title`, `body`, `created_at`, `updated_at`, `is_finished`) VALUES
(6, 6, 'Fitur Lengkap', '<p>Bagus! Akhirnya selesai.</p>', '2019-10-08 21:29:29', '2019-10-12 23:36:50', 1),
(7, 6, 'Lorem Ipsum Heritage', '<p>Lorem ipsum dolor sit amet.</p>', '2019-10-09 20:00:49', '2019-10-12 21:53:37', 1),
(8, 8, 'Fitur Lengkap', '<p>Wah, sekarang sudah ada fitur premium.</p>', '2019-10-13 05:18:32', '2019-10-13 05:18:32', 0);

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
  `is_closed` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `user_id`, `title`, `body`, `views`, `is_closed`, `created_at`, `updated_at`) VALUES
(2, 6, 'Judul Forum Pertama', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi iaculis imperdiet est, in ullamcorper eros facilisis eget. Sed at malesuada leo. Maecenas tincidunt, justo gravida sodales mattis, nisi tellus interdum elit, nec placerat elit massa ac enim. Phasellus posuere lorem ac aliquet sollicitudin. Morbi at scelerisque tortor. Nullam vehicula tempor lectus, quis aliquam lacus ornare eget. Duis dignissim a ante vitae dapibus. Suspendisse fringilla est vitae felis porttitor posuere.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">In at feugiat tellus. Aliquam sollicitudin elit eu felis porta, non condimentum lectus elementum. Nunc sodales mattis faucibus. Vivamus sollicitudin volutpat posuere. Sed ac aliquam leo, vulputate lobortis arcu. Donec tempus id odio sed gravida. Donec erat nunc, iaculis a sapien et, efficitur pulvinar justo. Aenean ut commodo dolor, nec blandit sem. Pellentesque consequat mollis ligula, id malesuada tellus pharetra a. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean in mattis lectus. Mauris suscipit libero in massa tincidunt, in vulputate nisl rutrum.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Etiam nibh nunc, pretium quis ipsum ac, bibendum imperdiet odio. Pellentesque tincidunt posuere magna, sit amet dapibus nibh eleifend nec. Pellentesque efficitur, mauris at accumsan rutrum, ipsum mi ultrices diam, vel convallis nunc dui vel sapien. Aliquam felis eros, interdum vel lacus eu, placerat malesuada quam. Ut consectetur tristique leo, in iaculis nulla congue in. Sed volutpat eu nisl ut egestas. Ut ut nunc porta, blandit ipsum at, convallis ante. Aenean varius erat purus, vitae consequat turpis suscipit ut. Nulla lacinia consectetur mauris, eget gravida massa tincidunt a.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Duis et urna eget dolor egestas semper porttitor sit amet nisi. Ut accumsan euismod ante, molestie porttitor ipsum varius quis. Duis in vehicula tellus. Phasellus lobortis pretium urna, non dictum sem luctus dapibus. Cras volutpat a magna vitae dapibus. Fusce bibendum laoreet tortor a accumsan. Fusce ornare eu velit ut ornare. Donec lobortis sit amet velit sed maximus. Etiam a porta eros. Vestibulum maximus venenatis maximus. Duis dapibus luctus eleifend. Etiam aliquam augue eget tortor vehicula tempor.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Duis mauris quam, maximus sed vestibulum vitae, faucibus sed dolor. Aliquam lobortis sapien et hendrerit auctor. Etiam imperdiet condimentum fermentum. Nullam nec eros eget felis dapibus convallis in ut magna. Proin tristique sagittis malesuada. Suspendisse auctor dolor eu arcu tincidunt, eget sagittis mi lacinia. Quisque accumsan efficitur sagittis. Aenean ante odio, molestie non metus ac, malesuada laoreet velit. Aliquam id elit egestas, porta magna vitae, iaculis lectus. Sed in orci feugiat sem efficitur scelerisque ac id magna. Fusce ornare augue sed diam fringilla molestie. Aliquam egestas lectus quis accumsan feugiat. Integer ut suscipit massa.</p>', 25, 0, '2019-10-08 21:23:34', '2019-10-12 23:36:30'),
(3, 6, 'Judul Forum Kedua', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi iaculis imperdiet est, in ullamcorper eros facilisis eget. Sed at malesuada leo. Maecenas tincidunt, justo gravida sodales mattis, nisi tellus interdum elit, nec placerat elit massa ac enim. Phasellus posuere lorem ac aliquet sollicitudin. Morbi at scelerisque tortor. Nullam vehicula tempor lectus, quis aliquam lacus ornare eget. Duis dignissim a ante vitae dapibus. Suspendisse fringilla est vitae felis porttitor posuere.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">In at feugiat tellus. Aliquam sollicitudin elit eu felis porta, non condimentum lectus elementum. Nunc sodales mattis faucibus. Vivamus sollicitudin volutpat posuere. Sed ac aliquam leo, vulputate lobortis arcu. Donec tempus id odio sed gravida. Donec erat nunc, iaculis a sapien et, efficitur pulvinar justo. Aenean ut commodo dolor, nec blandit sem. Pellentesque consequat mollis ligula, id malesuada tellus pharetra a. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean in mattis lectus. Mauris suscipit libero in massa tincidunt, in vulputate nisl rutrum.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Etiam nibh nunc, pretium quis ipsum ac, bibendum imperdiet odio. Pellentesque tincidunt posuere magna, sit amet dapibus nibh eleifend nec. Pellentesque efficitur, mauris at accumsan rutrum, ipsum mi ultrices diam, vel convallis nunc dui vel sapien. Aliquam felis eros, interdum vel lacus eu, placerat malesuada quam. Ut consectetur tristique leo, in iaculis nulla congue in. Sed volutpat eu nisl ut egestas. Ut ut nunc porta, blandit ipsum at, convallis ante. Aenean varius erat purus, vitae consequat turpis suscipit ut. Nulla lacinia consectetur mauris, eget gravida massa tincidunt a.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Duis et urna eget dolor egestas semper porttitor sit amet nisi. Ut accumsan euismod ante, molestie porttitor ipsum varius quis. Duis in vehicula tellus. Phasellus lobortis pretium urna, non dictum sem luctus dapibus. Cras volutpat a magna vitae dapibus. Fusce bibendum laoreet tortor a accumsan. Fusce ornare eu velit ut ornare. Donec lobortis sit amet velit sed maximus. Etiam a porta eros. Vestibulum maximus venenatis maximus. Duis dapibus luctus eleifend. Etiam aliquam augue eget tortor vehicula tempor.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Duis mauris quam, maximus sed vestibulum vitae, faucibus sed dolor. Aliquam lobortis sapien et hendrerit auctor. Etiam imperdiet condimentum fermentum. Nullam nec eros eget felis dapibus convallis in ut magna. Proin tristique sagittis malesuada. Suspendisse auctor dolor eu arcu tincidunt, eget sagittis mi lacinia. Quisque accumsan efficitur sagittis. Aenean ante odio, molestie non metus ac, malesuada laoreet velit. Aliquam id elit egestas, porta magna vitae, iaculis lectus. Sed in orci feugiat sem efficitur scelerisque ac id magna. Fusce ornare augue sed diam fringilla molestie. Aliquam egestas lectus quis accumsan feugiat. Integer ut suscipit massa.</p>', 20, 1, '2019-10-08 21:30:44', '2019-10-13 20:10:45'),
(4, 8, 'Judul Forum Ketiga', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi iaculis imperdiet est, in ullamcorper eros facilisis eget. Sed at malesuada leo. Maecenas tincidunt, justo gravida sodales mattis, nisi tellus interdum elit, nec placerat elit massa ac enim. Phasellus posuere lorem ac aliquet sollicitudin. Morbi at scelerisque tortor. Nullam vehicula tempor lectus, quis aliquam lacus ornare eget. Duis dignissim a ante vitae dapibus. Suspendisse fringilla est vitae felis porttitor posuere.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">In at feugiat tellus. Aliquam sollicitudin elit eu felis porta, non condimentum lectus elementum. Nunc sodales mattis faucibus. Vivamus sollicitudin volutpat posuere. Sed ac aliquam leo, vulputate lobortis arcu. Donec tempus id odio sed gravida. Donec erat nunc, iaculis a sapien et, efficitur pulvinar justo. Aenean ut commodo dolor, nec blandit sem. Pellentesque consequat mollis ligula, id malesuada tellus pharetra a. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean in mattis lectus. Mauris suscipit libero in massa tincidunt, in vulputate nisl rutrum.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Etiam nibh nunc, pretium quis ipsum ac, bibendum imperdiet odio. Pellentesque tincidunt posuere magna, sit amet dapibus nibh eleifend nec. Pellentesque efficitur, mauris at accumsan rutrum, ipsum mi ultrices diam, vel convallis nunc dui vel sapien. Aliquam felis eros, interdum vel lacus eu, placerat malesuada quam. Ut consectetur tristique leo, in iaculis nulla congue in. Sed volutpat eu nisl ut egestas. Ut ut nunc porta, blandit ipsum at, convallis ante. Aenean varius erat purus, vitae consequat turpis suscipit ut. Nulla lacinia consectetur mauris, eget gravida massa tincidunt a.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Duis et urna eget dolor egestas semper porttitor sit amet nisi. Ut accumsan euismod ante, molestie porttitor ipsum varius quis. Duis in vehicula tellus. Phasellus lobortis pretium urna, non dictum sem luctus dapibus. Cras volutpat a magna vitae dapibus. Fusce bibendum laoreet tortor a accumsan. Fusce ornare eu velit ut ornare. Donec lobortis sit amet velit sed maximus. Etiam a porta eros. Vestibulum maximus venenatis maximus. Duis dapibus luctus eleifend. Etiam aliquam augue eget tortor vehicula tempor.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Duis mauris quam, maximus sed vestibulum vitae, faucibus sed dolor. Aliquam lobortis sapien et hendrerit auctor. Etiam imperdiet condimentum fermentum. Nullam nec eros eget felis dapibus convallis in ut magna. Proin tristique sagittis malesuada. Suspendisse auctor dolor eu arcu tincidunt, eget sagittis mi lacinia. Quisque accumsan efficitur sagittis. Aenean ante odio, molestie non metus ac, malesuada laoreet velit. Aliquam id elit egestas, porta magna vitae, iaculis lectus. Sed in orci feugiat sem efficitur scelerisque ac id magna. Fusce ornare augue sed diam fringilla molestie. Aliquam egestas lectus quis accumsan feugiat. Integer ut suscipit massa.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><br></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">sagittis, urna ante hendrerit risus, eget sodales dolor leo quis lectus. In hac habitasse platea dictumst. Vivamus vel leo non purus scelerisque tempor. Etiam nec ex ac arcu tincidunt pulvinar. Nulla eu libero id mi molestie facilisis. Vivamus accumsan dolor eu mi vulputate, sed aliquam mi ornare. Nam commodo tristique urna, nec faucibus leo luctus id. Ut metus lectus, molestie id dictum sed, vehicula a nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean ac est volutpat, ullamcorper tellus vitae, tristique arcu. Nulla magna magna, vulputate ac enim nec, tempor feugiat enim.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Pellentesque suscipit vel mauris ac sagittis. Cras auctor massa tincidunt mauris ultrices, id sodales justo placerat. Aliquam auctor eros ligula, eu varius nunc dapibus sit amet. Maecenas in metus tincidunt, consectetur ligula eget, tempus ligula. Phasellus aliquam dignissim est ut sollicitudin. Pellentesque enim erat, condimentum ut vulputate sollicitudin, varius ac enim. Pellentesque egestas feugiat arcu, et euismod massa posuere quis. Aenean lacinia leo eget turpis accumsan viverra.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Suspendisse velit massa, laoreet a convallis quis, posuere non odio. Fusce facilisis viverra porttitor. Sed tempor sem dui, eu pharetra dolor mollis a. Donec vitae iaculis nunc. Nullam quis orci eu urna placerat sollicitudin. Phasellus consequat risus vitae velit sollicitudin pulvinar. In ultricies magna diam, volutpat viverra augue semper ac. Integer pharetra vitae neque eu facilisis. Nunc pretium dignissim lectus, sit amet dapibus nibh varius nec. Suspendisse at lobortis nisi. Nulla efficitur pretium velit sit amet venenatis. Aliquam erat volutpat.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Integer non aliquet nibh, et luctus enim. Donec convallis, diam ut ornare semper, arcu leo posuere dui, eu ornare augue ipsum eget quam. Maecenas vestibulum, tellus in ornare malesuada, nibh magna ultrices lorem, in luctus nunc elit non quam. Proin laoreet pharetra tincidunt. Quisque dapibus sollicitudin justo ac tristique. Pellentesque ullamcorper tortor sit amet lacus pharetra porta. Aliquam eget ligula elementum, sagittis dolor eget, interdum urna. Ut auctor, massa eu pretium sollicitudin, enim lorem aliquet elit, et venenatis turpis dolor at mauris. Phasellus mattis, urna eu pulvinar laoreet, ipsum libero laoreet elit, ut iaculis augue ex sit amet erat.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Maecenas ac faucibus arcu, quis molestie leo. Nulla facilisi. Suspendisse maximus neque vel sapien dapibus congue. Ut suscipit eros ac lectus bibendum, a fringilla diam gravida. Mauris ultricies, leo ac commodo semper, ante justo venenatis lorem, quis sodales eros augue sed mi. Aenean eget nulla ornare, ornare est eu, maximus elit. Vestibulum in massa eu lacus suscipit auctor at vitae ligula. Quisque libero risus, facilisis in sem sed, euismod dignissim lorem. Integer non tortor sed enim porta finibus a quis felis. Nunc sed euismod arcu, id gravida risus. Nunc faucibus tempor eros non ornare. Praesent vitae semper eros. Cras fringilla sem non hendrerit suscipit.</p>', 20, 0, '2019-10-08 21:35:45', '2019-10-13 21:04:29'),
(5, 7, 'Judul Forum Keempat', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum euismod fermentum. Donec consectetur semper diam, at vulputate elit. Proin lobortis augue consequat tempus feugiat. Pellentesque tincidunt ultrices orci. Etiam placerat interdum est a scelerisque. Pellentesque ac nulla sit amet velit interdum interdum. Nulla vehicula diam mi, sit amet commodo justo facilisis nec. Vestibulum sed metus porta, tempor leo et, consequat metus. Etiam nunc mi, mollis vel luctus sit amet, luctus venenatis metus. Suspendisse potenti. Donec dignissim eros nec erat aliquet, a tempus lectus semper. Maecenas vel nibh nec leo molestie elementum et a ligula.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Nam eu faucibus mi. Nunc convallis consequat volutpat. Maecenas aliquam urna nulla, et sagittis turpis porttitor sed. Mauris ac arcu eu lectus vulputate aliquet quis vitae turpis. Vestibulum fringilla quis urna sed placerat. Mauris ullamcorper orci nunc, a consectetur lectus egestas non. Donec blandit neque nec est varius, eu venenatis sapien fermentum. Morbi mollis, leo sit amet aliquet ultrices, odio nisl dignissim libero, quis consectetur ex mauris sed quam. Suspendisse scelerisque sit amet massa sed congue.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Sed in quam congue ex hendrerit posuere. Nunc dui est, mattis sit amet ligula eu, elementum vulputate orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam at libero enim. Praesent vestibulum, libero ut placerat mollis, ligula nisl blandit nibh, et placerat massa libero vitae nulla. Sed bibendum arcu ligula. Morbi dapibus, elit eu vulputate rutrum, ante sapien hendrerit massa, eu lacinia dolor orci ac neque. Etiam tempor interdum metus, accumsan molestie urna rutrum a. Ut posuere odio at quam cursus, ac auctor neque sollicitudin. Suspendisse diam ipsum, ornare eu dolor a, rutrum tincidunt metus. Pellentesque pretium tincidunt luctus.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Donec in sem in turpis tincidunt tincidunt a sed lorem. Quisque sed vulputate mauris. Nunc nibh nibh, blandit vitae nibh a, consectetur feugiat arcu. Ut aliquet eros et magna pellentesque tincidunt. Etiam sit amet aliquet erat, at blandit quam. Sed nec molestie mauris. Nulla facilisi. Mauris nec semper metus, nec fringilla augue. Nam aliquet ex laoreet felis finibus, vel lacinia nulla eleifend. Pellentesque finibus nisi id dui iaculis, sit amet luctus libero ornare. Curabitur a facilisis leo. Pellentesque non turpis et erat rhoncus porta. Donec malesuada libero vitae dictum tristique.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Integer non ex molestie, vestibulum turpis vitae, volutpat purus. Donec iaculis euismod eros. Fusce egestas facilisis justo, nec consectetur diam. Quisque sagittis pharetra sem sit amet placerat. Quisque molestie finibus erat eget egestas. Ut vitae egestas elit. In sed vestibulum augue. Nunc ac mi magna.</p>', 28, 0, '2019-10-09 04:18:47', '2019-10-14 20:44:42');

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
(3, 2, 6, '<p>Artikel nggak jelas!</p>', 1, '2019-10-08 21:24:24', '2019-10-12 23:36:27'),
(4, 2, 6, '<p>Sangat bermanfaat, terima kasih.</p>', 0, '2019-10-08 21:24:38', '2019-10-08 21:24:38'),
(5, 4, 8, '<p>Bagus nih!</p>', 0, '2019-10-09 04:13:41', '2019-10-09 04:13:41'),
(6, 2, 7, '<p>Wah keren!</p>', 0, '2019-10-09 04:19:30', '2019-10-09 04:19:30'),
(7, 5, 6, '<p>Keren nih modifannya!</p>', 0, '2019-10-10 00:41:47', '2019-10-10 00:41:47'),
(8, 5, 7, '<p>Jadi sebernarnya penyebabnya adalah itu.</p>', 0, '2019-10-12 07:13:30', '2019-10-12 07:13:30'),
(9, 5, 6, '<p>Terima kasih, sangat membantu.</p>', 0, '2019-10-12 07:52:38', '2019-10-12 07:52:38'),
(10, 4, 6, '<p>Benar sekali, saya setuju.</p>', 0, '2019-10-12 23:37:39', '2019-10-12 23:37:39'),
(11, 4, 6, '<p>Sebuah komentar.</p>', 0, '2019-10-13 20:08:22', '2019-10-13 20:08:22');

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
(93, 6, '2019-10-14 20:37:07', '2019-10-14 20:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `started` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expired` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `user_id`, `started`, `expired`, `created_at`, `updated_at`) VALUES
(4, 8, '2019-10-11 02:33:09', '2019-11-10 02:33:09', '2019-10-11 02:33:09', '2019-10-11 02:33:09');

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
(3, 2, 3, 'Moderator', 'Moderator', 'Bahasa Kasar', '2019-10-08 21:25:24', '2019-10-08 21:25:24');

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
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `article_read`, `points`, `name`, `email`, `email_verified_at`, `avatar`, `roles`, `is_banned`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 17, 0, 'Moderator', 'moderator@ex.com', NULL, 'uploads/avatars/1570595872jpg', 3, 0, '$2y$10$zItNxpIy5HdT6z5y2mxkne17A54HzWq0Rdx2J6igv4iefN2FAQLUW', 'j5L2cn83sOgvSTzX9Jfvxki6D52UqAjtT928TT9jEADvEH09QX5wztgquPgR', '2019-10-08 21:05:29', '2019-10-14 20:31:41'),
(7, 0, 30, 'Psikolog 1', 'psione@ex.com', NULL, 'uploads/avatars/1570679192jpg', 2, 0, '$2y$10$PgDzg3CAH/s8RBt9Vx3..u0pr81AS4tf7c2Kna/4cCefC5r7VIgH2', 'ccGglTYyZFBo7gXbferCJbikhrN7YkCIVyjsLotuH1Sa900Dt4n04WB5W1aD', '2019-10-08 21:27:25', '2019-10-12 21:26:03'),
(8, 5, 0, 'Kurniawan Pratama', 'kurniawan@ex.com', NULL, 'uploads/avatars/1570679214jpg', 1, 0, '$2y$10$bX1OjsznjZKjaPJcbpQILu4eLhByztDQ5SgNciby559l0Kja37RCy', 'mCAnkKDGSY10wVF77T4L9rCqZ1As00xNxKO5RH0hfCQmJJwaiNxJsGhY8IgR', '2019-10-08 21:39:48', '2019-10-13 05:16:55'),
(9, 0, 0, 'Psikolog 2', 'psitwo@ex.com', NULL, NULL, 2, 1, '$2y$10$apx7QhtEn6so.Kg0onDT6.p9W7BrFEOJQ8aTAZXmiEK45e9hOVgEu', NULL, '2019-10-09 19:59:53', '2019-10-12 23:35:37'),
(10, 0, 0, 'Rob Halford', 'rob@ex.com', NULL, NULL, 1, 0, '$2y$10$AJrXakLJB/2fmflceB5gGObruPKFyQx8l5uuouAUMwsYAqWvXzqcq', 'RUZtWWP1HfAVT22ROzvMbWK8wI8o2xaWegR82HMErqRihuHBqNik4hdf7EYA', '2019-10-11 04:09:21', '2019-10-11 04:09:21');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `forum_comments`
--
ALTER TABLE `forum_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `report_logs`
--
ALTER TABLE `report_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
