-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 09:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `showroom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_vehicles` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_vehicles`, `total_price`, `placed_on`, `payment_status`) VALUES
(2, 3, 'shah ibne fahad', '01860021547', 'ibne@gmail.com', 'cash on delivery', 'flat no. f102 khulshi chittagong chittagong Bangladesh - 10', 'R15 V3', 520000, '02-Jul-2022', 'completed'),
(3, 3, 'shah ibne fahad', '01860021547', 'ibne@gmail.com', 'cash on delivery', 'flat no. f102 khulshi chittagong chittagong Bangladesh - 10', 'R15 V3', 520000, '02-Jul-2022', 'completed'),
(4, 3, 'shah ibne fahad', '01860021547', 'ibne@gmail.com', 'cash on delivery', 'flat no. f102 khulshi chittagong chittagong Bangladesh - 10', 'R15 V3', 520000, '02-Jul-2022', 'pending'),
(5, 3, 'shah ibne fahad', '01860021547', 'ibne@gmail.com', 'cash on delivery', 'flat no. f102 khulshi chittagong chittagong Bangladesh - 10', 'R15 V3', 520000, '02-Jul-2022', 'pending'),
(6, 3, 'shah ibne fahad', '4546456', 'ibne@gmail.com', 'cash on delivery', 'flat no.   chittagong  Bangladesh - ', 'Dual Suspension Sports Bicycle', 15500, '02-Jul-2022', 'completed'),
(7, 3, 'shah ibne fahad', '4546456', 'ibne@gmail.com', 'cash on delivery', 'stadium  mirsarai chittagong chittagong - Bangladesh', 'Dual Suspension Sports Bicycle', 15500, '02-Jul-2022', 'pending'),
(8, 3, 'shah ibne fahad', '4152464', 'ff@gmail.com', 'cash on delivery', 'khulshi  mirsarai chittagong chittagong - Bangladesh', 'R15 V3', 520000, '02-Jul-2022', 'pending'),
(9, 3, 'shah ibne fahad', '123451646', 'ibne@gmail.com', 'credit card', 'khulshi  mirsarai chittagong chittagong - Bangladesh', 'R15 V3', 520000, '02-Jul-2022', 'pending'),
(10, 3, 'shah ibne fahad', '123451646', 'ibne@gmail.com', 'credit card', 'khulshi  mirsarai chittagong chittagong - Bangladesh', 'R15 V3', 520000, '02-Jul-2022', 'pending'),
(11, 3, 'shah ibne fahad', '0152456', 'ibne@gmail.com', 'cash on delivery', 'khulshi f102 mirsarai chittagong chittagong - Bangladesh', 'R15 V3', 520000, '02-Jul-2022', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `image`) VALUES
(3, 'shah ibne fahad', 'ibne@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '111.png'),
(4, 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '111.png');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `category`, `details`, `price`, `image`, `brand`) VALUES
(1, 'R15 V4', 'motorbikes', 'Brand Origin              :   Japan ;\r\nAssemble/Made in  :   Bangladesh ;\r\nEngine	                      :  155 cc ;\r\nMaximum Power	      :  19.3PS @ 10,000 rpm ;\r\nMaximum Torque      : 14.7N.m @ 8500 rpm ;\r\nMileage	                      :  40 Kmpl ;', 520000, 'yamaha-r15-v3-2nd2.jpg', ''),
(2, 'Dual Suspension Sports Bicycle', 'cycles', 'Frame Size	  :   19&#34 ;\r\nMaterial	          :  Steel ;\r\nRear Tyre	  :  24&#34 ;\r\nFront Tyre	  :  24&#34 ;\r\nWheel Size	  :  24&#34 ;\r\nRim	                  :  Alloy Rim ;\r\nSeat	          :  New ;\r\nBreak Type	  :  Disk ;', 15500, 'istockphoto-958687296-170667a.jpg', ''),
(3, 'BMW M4 Coupe 2021', 'cars', 'Model Numbe  :  M4 Coupe 2021\nMade In	Germany\nEngine Type	3.0-liter Twin-Turbo Inline-6 Gas\nEngine Power  473 hp @ 6250 rpm\nTorque	406 lb-ft @ 2650 rpm\nFuel System	Gasoline Fuel\nFuel Type	Gasoline\nCharger	Turbo', 6031200, 'BMW-M4-Coupe-2021-Price-in-Bangladesh.jpg', ''),
(4, 'Suzuki Gixxer', 'motorbikes', 'Displacement (cc)        :  154.9 cc;\r\nEngine Type                   :  4-Stroke, 1-cylinder;\r\nMax Power                      : 14.8 ps @ 8,000 rpm;\r\nMax Torque                     : 14 NM @ 6000 RPM;\r\nMax Speed (Official)      : 125 KM/H;\r\nMax Speed (User)          : 130 KM/H;', 185000, 'Suzuki-Gixxer-Mono-Tone-Single-disc-Black-Price-in-Bangladesh.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
