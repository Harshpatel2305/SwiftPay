-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 11:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_wallet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_username`, `admin_password`) VALUES
(2, '', 'dish_tv@gmail.com'),
(4, 'admin@mail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `dth_operators`
--

CREATE TABLE `dth_operators` (
  `id` int(11) NOT NULL,
  `operator_name` varchar(255) NOT NULL,
  `operator_email` varchar(100) NOT NULL,
  `operator_password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dth_operators`
--

INSERT INTO `dth_operators` (`id`, `operator_name`, `operator_email`, `operator_password`) VALUES
(1, 'Airtel Digital TV', 'airtel_tv@gmail.com', 123),
(2, 'Dish TV', 'dish_tv@gmail.com', 321),
(3, 'D2H', 'd2h_tv@gmail.com', 123);

-- --------------------------------------------------------

--
-- Table structure for table `dth_plans`
--

CREATE TABLE `dth_plans` (
  `id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `validity` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dth_plans`
--

INSERT INTO `dth_plans` (`id`, `operator_id`, `plan_name`, `validity`, `description`, `price`) VALUES
(1, 1, 'Plan 1', 30, 'Basic Plans', 151.00),
(2, 1, 'Plan 2', 60, 'Standard Plan', 250.00),
(3, 2, 'Plan 3', 31, 'Basic Package', 180.00),
(4, 2, 'Plan 4', 60, 'Premium Package', 300.00),
(5, 3, 'Plan 5', 30, 'Silver Plan', 160.00),
(9, 1, 'plan b', 30, 'Description for Plan b', 499.00);

-- --------------------------------------------------------

--
-- Table structure for table `dth_transactions`
--

CREATE TABLE `dth_transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `operator_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `validity` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `approval_status` varchar(20) DEFAULT 'Pending',
  `transaction_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dth_transactions`
--

INSERT INTO `dth_transactions` (`id`, `user_id`, `mobile_number`, `operator_id`, `plan_id`, `amount`, `validity`, `description`, `approval_status`, `transaction_time`) VALUES
(1, 1, '9265472944', 1, 1, 150.00, 30, 'Basic Plan', 'REJECTED', '2024-02-02 06:20:11'),
(2, 1, '9265472944', 2, 3, 180.00, 30, 'Basic Package', 'REJECTED', '2024-02-02 06:20:11'),
(8, 4, '9999999999', 2, 1, 180.00, 30, 'Basic Package', 'REJECTED', '2024-02-02 07:43:52'),
(9, 4, '9999999999', 2, 1, 180.00, 30, 'Basic Package', 'APPROVED', '2024-02-02 07:44:21'),
(10, 4, '9999999999', 2, 1, 180.00, 30, 'Basic Package', 'REJECTED', '2024-02-02 07:50:00'),
(11, 4, '9999999999', 3, 1, 160.00, 30, 'Silver Plan', 'REJECTED', '2024-02-02 07:51:11'),
(15, 4, '9999999999', 2, 3, 300.00, 60, 'Premium Package', 'APPROVED', '2024-02-02 08:08:20'),
(16, 4, '9999999999', 2, 3, 300.00, 60, 'Premium Package', 'REJECTED', '2024-02-02 08:13:45'),
(22, 4, '9999999999', 3, 5, 270.00, 60, 'Gold Plan', 'APPROVED', '2024-02-02 08:29:44'),
(23, 4, '9999999999', 1, 1, 150.00, 30, 'Basic Plan', 'APPROVED', '2024-02-02 08:31:39'),
(24, 4, '9999999999', 2, 3, 300.00, 60, 'Premium Package', 'APPROVED', '2024-02-04 08:52:50'),
(25, 4, '9999999999', 3, 5, 270.00, 60, 'Gold Plan', 'APPROVED', '2024-02-04 08:53:34'),
(26, 4, '9999999999', 2, 3, 180.00, 30, 'Basic Package', 'APPROVED', '2024-02-04 13:17:13'),
(27, 4, '9999999999', 2, 3, 180.00, 30, 'Basic Package', 'approved', '2024-02-04 13:25:27'),
(28, 4, '9999999999', 2, 3, 180.00, 30, 'Basic Package', 'approved', '2024-02-04 13:38:44'),
(29, 4, '9999999999', 2, 3, 180.00, 30, 'Basic Package', 'rejected', '2024-02-04 13:39:02'),
(30, 4, '9999999999', 2, 3, 180.00, 30, 'Basic Package', 'approved', '2024-02-04 13:42:22'),
(31, 4, '9999999999', 3, 5, 160.00, 30, 'Silver Plan', 'approved', '2024-02-04 15:46:01'),
(32, 4, '9999999999', 2, 3, 300.00, 60, 'Premium Package', 'approved', '2024-02-05 10:39:09'),
(33, 4, '9999999999', 2, 3, 300.00, 60, 'Premium Package', 'approved', '2024-02-05 10:39:31'),
(34, 4, '9999999999', 1, 1, 250.00, 60, 'Standard Plan', 'rejected', '2024-02-05 10:40:17'),
(35, 4, '9999999999', 2, 3, 300.00, 60, 'Premium Package', 'approved', '2024-02-05 10:53:13'),
(36, 13, '9723699044', 2, 3, 300.00, 60, 'Premium Package', 'approved', '2024-02-07 12:32:59'),
(37, 15, '1122334455', 2, 3, 0.00, 60, 'Premium Package', 'PENDING', '2024-02-17 15:29:01'),
(38, 15, '1122334455', 2, 3, 300.00, 60, 'Premium Package', 'approved', '2024-02-17 15:29:45'),
(39, 15, '1122334455', 2, 3, 300.00, 60, 'Premium Package', 'PENDING', '2024-02-18 12:41:48'),
(40, 15, '1122334455', 2, 3, 300.00, 60, 'Premium Package', 'approved', '2024-02-18 12:41:59'),
(41, 15, '1122334455', 2, 3, 300.00, 60, 'Premium Package', 'PENDING', '2024-02-19 12:55:54'),
(42, 17, '9265472966', 2, 3, 180.00, 30, 'Basic Package', 'approved', '2024-02-19 15:12:28'),
(43, 22, '9081331413', 1, 1, 1510.00, 30, 'Basic Plans', 'approved', '2024-02-20 08:11:46'),
(44, 22, '9081331413', 1, 1, 151.00, 30, 'Basic Plans', 'PENDING', '2024-03-03 10:00:53'),
(45, 22, '9081331413', 1, 1, 151.00, 30, 'Basic Plans', 'approved', '2024-03-03 10:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `recharge_operators`
--

CREATE TABLE `recharge_operators` (
  `operator_id` int(11) NOT NULL,
  `operator_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recharge_operators`
--

INSERT INTO `recharge_operators` (`operator_id`, `operator_name`) VALUES
(1, 'Airtel'),
(2, 'jio'),
(3, 'VI');

-- --------------------------------------------------------

--
-- Table structure for table `recharge_plans`
--

CREATE TABLE `recharge_plans` (
  `id` int(11) NOT NULL,
  `operator_id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `validity` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recharge_plans`
--

INSERT INTO `recharge_plans` (`id`, `operator_id`, `plan_name`, `validity`, `description`, `price`) VALUES
(1, 1, 'test', '30', 'test', 100.00),
(2, 1, 'Plan 2', '60', 'Description for Plan 2', 20.75),
(3, 2, 'Plan 3', '90', 'Description for Plan 3', 15.00),
(4, 2, 'Plan 4', '30', 'Description for Plan 4', 25.25),
(5, 3, 'Plan 5', '60', 'Description for Plan 5', 30.00),
(8, 2, 'test', '90', 'Description for Plan 4', 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `recharge_transaction`
--

CREATE TABLE `recharge_transaction` (
  `recharge_transaction_id` int(11) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `operator` varchar(20) NOT NULL,
  `data` varchar(50) NOT NULL,
  `validity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(100) NOT NULL,
  `approval_status` varchar(20) DEFAULT 'Pending',
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recharge_transaction`
--

INSERT INTO `recharge_transaction` (`recharge_transaction_id`, `mobile_number`, `operator`, `data`, `validity`, `price`, `description`, `approval_status`, `time`) VALUES
(1, '9265472944', 'jio', '10GB Data', 45, 299.99, 'Extra data bonus', 'Approved', '2024-02-01 05:33:53'),
(2, '9265472944', 'jio', '10GB Data', 45, 299.99, 'Extra data bonus', 'Approved', '2024-02-01 05:34:51'),
(3, '9999999999', 'jio', '10GB Data', 45, 299.99, 'Extra data bonus', 'Approved', '2024-02-01 05:42:25'),
(4, '9999999999', 'airtel', '3GB Data', 28, 149.99, 'Airtel Thanks benefit', 'Approved', '2024-02-01 05:45:03'),
(5, '9265472944', 'airtel', '8GB Data', 30, 249.99, 'Family pack', 'Approved', '2024-02-01 06:04:43'),
(6, '9265472944', 'airtel', '8GB Data', 30, 249.99, 'Family pack', 'Approved', '2024-02-01 06:11:37'),
(19, '9265472944', 'airtel', '8GB Data', 30, 249.99, 'Family pack', 'Approved', '2024-02-01 08:53:16'),
(20, '9265472944', 'bsnl', '2GB Data', 30, 99.99, 'Regular plan', 'Approved', '2024-02-01 08:58:01'),
(21, '9265472944', 'bsnl', '2GB Data', 30, 99.99, 'Regular plan', 'Rejected', '2024-02-01 09:04:57'),
(22, '9265472944', 'bsnl', '2GB Data', 30, 99.99, 'Regular plan', 'Rejected', '2024-02-01 09:06:10'),
(23, '9265472944', 'airtel', '3GB Data', 28, 149.99, 'Airtel Thanks benefit', 'Rejected', '2024-02-01 09:06:51'),
(24, '9999999999', 'airtel', '8GB Data', 30, 249.99, 'Family pack', 'Approved', '2024-02-04 06:22:26'),
(25, '9999999999', 'bsnl', '6GB Data', 60, 199.99, 'Extended validity', 'approved', '2024-02-04 06:29:58'),
(26, '9999999999', 'airtel', '3GB Data', 28, 149.99, 'Airtel Thanks benefit', 'approved', '2024-02-04 07:10:59'),
(27, '9999999999', 'bsnl', '2GB Data', 30, 99.99, 'Regular plan', 'approved', '2024-02-04 07:13:50'),
(28, '9999999999', 'bsnl', '2GB Data', 30, 99.99, 'Regular plan', 'approved', '2024-02-04 07:16:29'),
(30, '9999999999', 'airtel', '3GB Data', 28, 149.99, 'Airtel Thanks benefit', 'rejected', '2024-02-04 07:19:53'),
(31, '9999999999', 'airtel', '3GB Data', 28, 149.99, 'Airtel Thanks benefit', 'approved', '2024-02-04 07:21:35'),
(32, '9999999999', 'airtel', '3GB Data', 28, 149.99, 'Airtel Thanks benefit', 'approved', '2024-02-04 07:44:09'),
(33, '9999999999', 'bsnl', '6GB Data', 60, 199.99, 'Extended validity', 'approved', '2024-02-05 03:35:20'),
(34, '9999999999', 'bsnl', '6GB Data', 60, 199.99, 'Extended validity', 'rejected', '2024-02-05 03:36:50'),
(35, '9999999999', 'bsnl', '6GB Data', 60, 199.99, 'Extended validity', 'rejected', '2024-02-05 03:37:17'),
(36, '9999999999', 'bsnl', '6GB Data', 60, 199.99, 'Extended validity', 'rejected', '2024-02-05 03:37:51'),
(37, '9999999999', 'airtel', '3GB Data', 28, 149.99, 'Airtel Thanks benefit', 'approved', '2024-02-05 04:14:55'),
(38, '9999999999', 'airtel', '3GB Data', 28, 149.99, 'Airtel Thanks benefit', 'rejected', '2024-02-05 04:15:17'),
(39, '9999999999', 'airtel', '3GB Data', 28, 149.99, 'Airtel Thanks benefit', 'rejected', '2024-02-05 04:16:23'),
(40, '9999999999', 'airtel', '3GB Data', 28, 149.99, 'Airtel Thanks benefit', 'approved', '2024-02-05 04:16:31'),
(41, '9723699045', 'airtel', '8GB Data', 30, 249.99, 'Family pack', 'approved', '2024-02-07 05:26:11'),
(42, '9723699045', 'bsnl', '6GB Data', 60, 199.99, 'Extended validity', 'approved', '2024-02-07 07:14:49'),
(43, '9265472944', 'airtel', '8GB Data', 30, 249.99, 'Family pack', 'Pending', '2024-02-14 10:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `recharge_transactions`
--

CREATE TABLE `recharge_transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `operator_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `validity` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `approval_status` varchar(20) DEFAULT 'Pending',
  `transaction_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recharge_transactions`
--

INSERT INTO `recharge_transactions` (`id`, `user_id`, `mobile_number`, `operator_id`, `plan_id`, `amount`, `validity`, `description`, `approval_status`, `transaction_time`) VALUES
(1, 15, '1122334455', 2, 3, 15.00, 90, 'Description for Plan 3', 'approved', '2024-02-17 16:20:51'),
(2, 15, '1122334455', 3, 5, 35.00, 90, 'Description for Plan 6', 'approved', '2024-02-17 16:22:21'),
(3, 15, '1122334455', 2, 3, 15.00, 90, 'Description for Plan 3', 'rejected', '2024-02-17 16:23:29'),
(4, 15, '1122334455', 2, 3, 15.00, 90, 'Description for Plan 3', 'rejected', '2024-02-17 16:24:34'),
(5, 15, '1122334455', 2, 3, 25.00, 30, 'Description for Plan 4', 'approved', '2024-02-17 16:24:48'),
(6, 16, '9265472933', 2, 3, 15.00, 90, 'Description for Plan 3', 'approved', '2024-02-18 15:28:05'),
(7, 15, '1122334455', 2, 3, 15.00, 90, 'Description for Plan 3', 'approved', '2024-02-19 11:22:57'),
(8, 15, '1122334455', 2, 3, 25.00, 30, 'Description for Plan 4', 'approved', '2024-02-19 12:00:46'),
(9, 15, '1122334455', 2, 3, 15.00, 90, 'Description for Plan 3', 'approved', '2024-02-19 15:00:12'),
(10, 17, '9265472966', 2, 3, 25.00, 30, 'Description for Plan 4', 'approved', '2024-02-19 15:14:04'),
(11, 17, '9265472966', 3, 5, 30.00, 60, 'Description for Plan 5', 'PENDING', '2024-02-19 15:18:30'),
(12, 20, '9429200637', 2, 3, 100.00, 90, 'Description for Plan 4', 'approved', '2024-02-20 04:58:25'),
(13, 20, '9429200637', 1, 1, 100.00, 30, 'test', 'approved', '2024-02-20 06:54:09'),
(14, 22, '9081331413', 1, 1, 100.00, 30, 'test', 'PENDING', '2024-02-20 08:13:14'),
(15, 22, '9081331413', 1, 1, 100.00, 30, 'test', 'approved', '2024-03-03 09:56:57'),
(16, 22, '9081331413', 1, 1, 20.00, 60, 'Description for Plan 2', 'approved', '2024-03-03 10:00:04'),
(17, 22, '9081331413', 1, 1, 20.00, 60, 'Description for Plan 2', 'PENDING', '2024-03-03 10:14:55'),
(18, 22, '9081331413', 1, 1, 100.00, 30, 'test', 'PENDING', '2024-03-03 10:20:25'),
(19, 22, '9081331413', 1, 1, 100.00, 30, 'test', 'PENDING', '2024-03-03 10:22:18'),
(20, 22, '9081331413', 2, 3, 15.00, 90, 'Description for Plan 3', 'PENDING', '2024-03-03 10:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `sender_mobile_number` varchar(15) NOT NULL,
  `receiver_mobile_number` varchar(15) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `sender_mobile_number`, `receiver_mobile_number`, `amount`, `transaction_date`, `status`) VALUES
(121, '1122334455', '9999999999', 1.00, '2024-02-17 15:30:35', 'approved'),
(122, '1122334455', '9999999999', 1.00, '2024-02-18 12:40:20', 'approved'),
(123, '1122334455', '9999999999', 1.00, '2024-02-18 12:40:45', 'rejected'),
(124, '1122334455', '9999999999', 1.00, '2024-02-18 13:13:25', 'pending'),
(125, '1122334455', '9999999999', 1.00, '2024-02-18 13:16:29', 'approved'),
(126, '1122334455', '9999999999', 1.00, '2024-02-18 13:16:49', 'pending'),
(127, '1122334455', '9999999999', 1.00, '2024-02-18 13:18:24', 'pending'),
(128, '1122334455', '9999999999', 15.00, '2024-02-19 11:08:55', 'pending'),
(129, '1122334455', '9999999999', 15.00, '2024-02-19 11:12:31', 'pending'),
(130, '1122334455', '9999999999', 15.00, '2024-02-19 11:13:27', 'pending'),
(131, '1122334455', '9999999999', 15.00, '2024-02-19 11:14:05', 'approved'),
(132, '1122334455', '9999999999', 15.00, '2024-02-19 11:14:32', 'pending'),
(133, '1122334455', '9999999999', 15.00, '2024-02-19 11:14:44', 'pending'),
(134, '1122334455', '9999999999', 1.00, '2024-02-19 11:15:33', 'approved'),
(135, '1122334455', '9999999999', 1.00, '2024-02-19 11:15:58', 'pending'),
(136, '1122334455', '9999999999', 417.00, '2024-02-19 11:16:32', 'approved'),
(137, '9265472966', '9999999999', 1.00, '2024-02-19 15:16:16', 'approved'),
(138, '9265472966', '9999999999', 1.00, '2024-02-19 15:16:35', 'pending'),
(139, '9265472966', '9999999999', 1.00, '2024-02-19 15:17:17', 'pending'),
(140, '9904424982', '9999999999', 50000.00, '2024-02-20 04:43:33', 'approved'),
(141, '9904424982', '9429200637', 50000.00, '2024-02-20 04:50:20', 'approved'),
(142, '9904424982', '9429200637', 50000.00, '2024-02-20 04:50:54', 'pending'),
(144, '9081331413', '9904424982', 500.00, '2024-02-20 08:09:47', 'approved'),
(145, '9081331413', '9904424982', 500.00, '2024-02-20 08:10:14', 'pending'),
(146, '9081331413', '9999999999', 1.00, '2024-03-03 10:00:24', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` decimal(10,2) DEFAULT 0.00,
  `email` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL,
  `ifsc_code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `mobile_number`, `username`, `password`, `balance`, `email`, `bank`, `account_number`, `ifsc_code`) VALUES
(1, '9265472944', 'harsh', '$2y$10$CpN/bEAx5XBFfjRhy/deuOt1SO1tPSaw6Ml0jx5zWIo.UzBQeFMS.', 99999.99, 'visheshpatel2610@gmail.com', 'state bank of india', '2626262626', '112233445'),
(4, '9999999999', 'harshu', '123', 6421589.18, NULL, NULL, NULL, NULL),
(12, '9723699045', 'VISHESH ', '$2y$10$3X0WcUXy7Kgben3a0DMQUuT1nUz487VLCVNAxRhjI4sSoPI3tcS36', 2249.02, 'visheshpatel2611@gmail.com', 'state bank of india', '1', '1'),
(13, '9723699044', 'harsh', '$2y$10$MAkt6A6CcIl3Q9WcphHYDe0gS8iS8pD3Ah5Y7awfD3/TJJ1uGe9TC', 99699.00, 'visheshpatel2620@gmail.com', 'state bank of india', '1111', '1'),
(15, '1122334455', 'alpha', '$2y$10$i5OFL2ONJpny0uTQTi7f7em6OtsUNd4sC5ih0cw5OCyQJSnYk/MNy', 9962.00, 'alpha@gmail.com', 'state bank of india', '11', '1'),
(16, '9265472933', 'test', '$2y$10$ciY9y3Lk5JtwMQKdVfk5P.EgLQj51/t2AjSo2yxK0z7G79puo8FQ2', 99987.00, 'test@gmail.com', 'state bank of india', '84654684', '1212'),
(17, '9265472966', 'harsh', '$2y$10$Bb5qCXk.Kua4E9GucBvQye32Ev3Pbsp3/CPEJ/ieNmhR.Ebe/2HIm', 94.00, 'alpha_1@gmail.com', 'state bank of india', '123456789', 'ICIC0001245'),
(18, '9265466729', 'harsh', '$2y$10$4x9AgcJur0dBoCox81MffOb4MjZRpbO8KyeJPPnp8C70rs4pDv6TW', 5300.00, 'harshpatel_2@gmail.com', 'Axis', '926547512', 'ICIC0006561'),
(19, '9904424982', 'patelshubh', '$2y$10$ybiLLsIli6TSmqJNSA6gU.hP0WlpRnnf.ERN1lEO9.IWcaLny/tmq', 500.00, 'patelshubh708@gmail.com', 'Union', '302010548954', 'ubin123456'),
(20, '9429200637', 'dev', '$2y$10$3p5tUF/uf2z4X5m0nVvhOu3h8eIQ93clB0KkM5c23NR1h66rmJpbW', 4949800.00, 'dev1@gmail.com', 'BOI', '963258741', 'okxx1234'),
(21, '5562125669', 'test', '$2y$10$7ybq62Z//DIF3X8HnZFhR.H1ZBrehUZES51zv6M4AjrCq3415DfCq', 0.00, 'test_1@gmail.com', 'BOI', '852211145', 'PUNB0006700'),
(22, '9081331413', 'priyanshu', '$2y$10$mR5QZyAsNXWmv5paUdQzC.GPGRet7Y.nfrUWeu1c8ONrhnLR8ePYq', 0.00, 'priyanshu@gmail.com', 'SBI', '1234455993', 'PUNB0006700');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `dth_operators`
--
ALTER TABLE `dth_operators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dth_plans`
--
ALTER TABLE `dth_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dth_transactions`
--
ALTER TABLE `dth_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `operator_id` (`operator_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `recharge_operators`
--
ALTER TABLE `recharge_operators`
  ADD PRIMARY KEY (`operator_id`);

--
-- Indexes for table `recharge_plans`
--
ALTER TABLE `recharge_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operator_id` (`operator_id`);

--
-- Indexes for table `recharge_transaction`
--
ALTER TABLE `recharge_transaction`
  ADD PRIMARY KEY (`recharge_transaction_id`);

--
-- Indexes for table `recharge_transactions`
--
ALTER TABLE `recharge_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `operator_id` (`operator_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `sender_mobile_number` (`sender_mobile_number`),
  ADD KEY `receiver_mobile_number` (`receiver_mobile_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dth_operators`
--
ALTER TABLE `dth_operators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dth_plans`
--
ALTER TABLE `dth_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dth_transactions`
--
ALTER TABLE `dth_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `recharge_operators`
--
ALTER TABLE `recharge_operators`
  MODIFY `operator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recharge_plans`
--
ALTER TABLE `recharge_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recharge_transaction`
--
ALTER TABLE `recharge_transaction`
  MODIFY `recharge_transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `recharge_transactions`
--
ALTER TABLE `recharge_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dth_transactions`
--
ALTER TABLE `dth_transactions`
  ADD CONSTRAINT `dth_transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `dth_transactions_ibfk_2` FOREIGN KEY (`operator_id`) REFERENCES `dth_operators` (`id`),
  ADD CONSTRAINT `dth_transactions_ibfk_3` FOREIGN KEY (`plan_id`) REFERENCES `dth_plans` (`id`);

--
-- Constraints for table `recharge_plans`
--
ALTER TABLE `recharge_plans`
  ADD CONSTRAINT `recharge_plans_ibfk_1` FOREIGN KEY (`operator_id`) REFERENCES `recharge_operators` (`operator_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`sender_mobile_number`) REFERENCES `users` (`mobile_number`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`receiver_mobile_number`) REFERENCES `users` (`mobile_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
