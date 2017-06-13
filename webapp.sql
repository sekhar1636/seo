-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2017 at 05:30 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_path` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `photo_path`, `photo_url`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'qundeelahmed@yahoo.com', '$2y$10$YPCIxnUUqwNtMkQxw5Vjju0ZrkbkiZU1mqsS2GR2u0NyE9/usY4Ce', 'theater', NULL, NULL, 1, 'GoPyf5XEEVJFa9mnQR8nsmTre7OTZOcj53HNfm0xpNineyPmik9IW9VsOMnl', '2017-06-01 05:47:43', '2017-06-13 02:13:07'),
(2, '', 'qundeelahmed1@yahoo.com', '$2y$10$7F1cewoonactKnkmoJ1odOLSQchy4h4ykghNjHRGqxTfoMXy0jkSq', 'staff', NULL, NULL, 1, 'dKJGN5udaiiksnubO68NPeCt5tjfbO679jVUbS8mrj1VMOqmexWQOIF7qN0v', '2017-06-01 05:48:10', '2017-06-01 05:48:10'),
(3, '', 'qundeelahmed2@yahoo.com', '$2y$10$upCl7A/wqgVX2fXNH66Yx.0xxoANX/iuu1i5ajLM0kBWJGFGl5A7i', 'actor', NULL, NULL, 1, NULL, '2017-06-01 05:48:22', '2017-06-01 05:48:22'),
(4, 'Qundeel Ahmed', 'qundeelahmed3@yahoo.com', '$2y$10$IMGOqmStow7SNTwR7YaY2.2CcZKw86ff/sQOJAIYePjXwbnLoEes.', 'staff', NULL, NULL, 1, NULL, '2017-06-01 07:06:20', '2017-06-01 07:06:20'),
(5, 'qqqq', 'xyz@abc.com', '$2y$10$e6M1fGp6Wz/cJMDbVLyuI.whK5CyJ9dp2ALuqI6aaFjpOhiNttTIq', NULL, NULL, NULL, 1, NULL, '2017-06-08 13:14:45', '2017-06-08 13:14:45'),
(6, 'qundeel', 'xyz@abc.com1', '$2y$10$eZzpRo9jW/mY2haJAvL2fe23bJIHGE91EapuIKnBIxdz6HVfWHMFq', NULL, NULL, NULL, 1, '0MtyKKLVuZWa8fW9nqQgJBgylDnWhhBBtsx7Dl10flNYeuESnjZ38o6zcKzK', '2017-06-08 13:46:51', '2017-06-08 13:46:51'),
(7, 'Qundeel Ahmed', 'xyz@abc.comasda', '$2y$10$VZH6DFjqUFkQ/oKfL6MTdOxW/YV9tboRNRmvzOWImMJFkVR.dEr3K', NULL, NULL, NULL, 1, NULL, '2017-06-08 13:52:47', '2017-06-08 13:52:47'),
(8, 'Qundeel Ahmed', 'xyz@abc.comasdas', '$2y$10$otxwJV8mzwKbaEgk4TVUROWUT6uXcNTn670IiCSUO.RjKp6HVtijG', NULL, NULL, NULL, 1, 'dXuaIsTz3lwr39lPHW0SvxgzGymNBnWw7scXZvc0nGIRGvc5MofvRFskWTLH', '2017-06-08 13:54:17', '2017-06-08 13:54:17'),
(9, 'qundeel', 'qundeelahmed@yahoo.com1', '$2y$10$80xJQWdBT/p6gK08d2Ze6.lg5L1SMEu9OVIfK.XRj3bvKI5c7gz0e', NULL, NULL, NULL, 1, '3YiZ0mOdANa200SiYrEBylMyShHolAgR7RWhAA2TPHxoeaMZuXYUmOezOYcL', '2017-06-09 00:56:11', '2017-06-09 00:56:11'),
(10, 'qundeel', 'qundeelahmed@yahoo.com2', '$2y$10$y13IA4Aq8Af6co1nDr02RuXyIUPYhtlDYDInsdEw3C1h9S1v/BOi.', 'actor', NULL, NULL, 1, 'hCtB6Y6uOy16PnQ4cvN9SMz1L8lVcgJs3FHRFvoveQ1SAtrDiul6e1iAQAZa', '2017-06-13 00:34:14', '2017-06-13 00:34:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
