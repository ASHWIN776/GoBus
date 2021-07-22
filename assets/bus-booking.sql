-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 06:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus-booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(100) NOT NULL,
  `booking_id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `route_id` varchar(255) NOT NULL,
  `customer_route` varchar(200) NOT NULL,
  `booked_amount` int(100) NOT NULL,
  `booked_seat` varchar(100) NOT NULL,
  `booking_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_id`, `customer_id`, `route_id`, `customer_route`, `booked_amount`, `booked_seat`, `booking_created`) VALUES
(59, 'RWFIM59', 'CUST-3120031', 'RT-9341149', 'TIRUR &rarr; TANUR', 12, '16', '2021-07-08 23:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(100) NOT NULL,
  `bus_no` varchar(255) NOT NULL,
  `bus_assigned` tinyint(1) NOT NULL DEFAULT 0,
  `bus_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `bus_no`, `bus_assigned`, `bus_created`) VALUES
(37, 'MP 09 1234', 1, '2021-06-23 22:50:32'),
(38, 'PU1234', 1, '2021-07-02 21:05:27'),
(39, 'MP 09 4567', 1, '2021-07-08 20:21:15'),
(40, 'AS1234', 0, '2021-07-08 22:30:44'),
(41, 'PL 45 6789', 0, '2021-07-08 22:30:50'),
(42, 'ER 12 3456', 1, '2021-07-08 22:30:59'),
(43, 'PO 12 2345', 1, '2021-07-08 22:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(100) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `customer_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `customer_name`, `customer_phone`, `customer_created`) VALUES
(31, 'CUST-3120031', 'Ashwin Anil', '1234567890', '2021-07-02 21:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(100) NOT NULL,
  `route_id` varchar(255) NOT NULL,
  `bus_no` varchar(255) NOT NULL,
  `route_cities` varchar(255) NOT NULL,
  `route_dep_date` date NOT NULL,
  `route_dep_time` time NOT NULL,
  `route_step_cost` int(100) NOT NULL,
  `route_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `route_id`, `bus_no`, `route_cities`, `route_dep_date`, `route_dep_time`, `route_step_cost`, `route_created`) VALUES
(48, 'RT-1121348', 'MP 09 4567', 'BATHINDA,CHANDIGARH', '2021-07-17', '20:31:00', 12, '2021-07-08 20:28:35'),
(49, 'RT-9341149', 'PU1234', 'TIRUR,TANUR,KOZHIKODE', '2021-07-16', '22:37:00', 12, '2021-07-08 22:35:17'),
(50, 'RT-4862450', 'PO 12 2345', 'TIRUR,TANUR,FEROK,KOZHIKODE,KANNUR,CHENNAI', '2021-07-16', '22:38:00', 14, '2021-07-08 22:35:58'),
(51, 'RT-4945951', 'MP 09 1234', 'TIRUR,TANUR,KOZHIKODE,CHENNAI,TRICHY', '2021-07-16', '22:40:00', 10, '2021-07-08 22:37:05'),
(52, 'RT-5349352', 'ER 12 3456', 'KOZHIKODE,CHENNAI', '2021-07-16', '22:40:00', 13, '2021-07-08 22:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `bus_no` varchar(255) NOT NULL,
  `seat_booked` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`bus_no`, `seat_booked`) VALUES
('AS1234', NULL),
('ER 12 3456', NULL),
('MP 09 1234', ''),
('MP 09 4567', NULL),
('PL 45 6789', NULL),
('PO 12 2345', NULL),
('PU1234', '16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_name`, `user_password`, `user_created`) VALUES
(1, 'Ashwin Anil', 'as', '$2y$10$BUWZ3.02/m34XKPJ/Dq6Ze58Z07kjVSZ.ZaIyZRyq6LU7NieZPzBm', '2021-06-02 13:55:21'),
(2, 'Aswanth Madhav', 'appu', '$2y$10$cVcdEHtNUa2iMkLoOlng8ete1tHr3LvVr1cyVOHbxZzrFkPideuvi', '2021-06-02 23:41:09'),
(3, 'Faris Mohammed', 'faris', '$2y$10$lHomTRR0AZM7hv27uc7eZOuQe9ZVbL4o44yinFjAJMeZ7nXeeWjJa', '2021-06-12 22:57:41'),
(4, 'alvin poulose', 'alvin', '$2y$10$sAZjVv18QY5LJ7Mb5w.V5e1Nk8Ivyz7OfBIVgO1CbCxgz1K4ljuvq', '2021-06-12 23:04:10'),
(5, 'w w', 'w', '$2y$10$ipLGX7IYx6TxUrTnNIzNpOsa7rCQqjgDjcWyH8u32OJfue7oFqYq.', '2021-06-12 23:14:32'),
(6, 'Elo Va', 'elo', '$2y$10$33s1ykCZk2g9cBxnzJKvw.6OrnyqoAvbVfVuvF528SVF92oC4CSiW', '2021-06-17 05:46:13'),
(8, 'sk sk', 'sk', '$2y$10$Uv6q6EiiT6w2bW50nPRVceXiWbEh/7oFArh53XeRTfJfVXQzynEuK', '2021-06-17 06:03:41'),
(9, 'John Doe', 'john', '$2y$10$7pGWLpf3DS/0NZjVwMzW2er0EY/XQkBq2CNjzwNlYRGR1Fa2w7UWS', '2021-06-17 10:10:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`bus_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
