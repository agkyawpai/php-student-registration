-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 12:20 PM
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
-- Database: `student_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `nrc` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `career` varchar(11) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `file` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `name`, `father_name`, `nrc`, `phone_no`, `email`, `gender`, `dob`, `address`, `career`, `skill`, `file`, `flag`, `created_at`, `updated_at`) VALUES
(1, 1001, 'Peter', 'John', '12/BaHaNa(N)109025', '09998877665', 'peter@gmail.com', '1', '2023-02-26', 'Yangon', '1', '1,2,3', 'upload/hhh.jpg', 1, '2023-05-23', '2023-05-23'),
(2, 1002, 'Aung Aung', 'U Aung', '12/HgOkUy(N)546453', '09666554665', 'abc@gmail.com', '1', '2023-05-25', 'Yangon', '1', '1,2,3', 'upload/Screenshot 2023-05-17 155921.png', 1, '0000-00-00', '0000-00-00'),
(3, 1003, 'Kyaw Kyaw', 'U Aung', '12/HgOkUy(N)546453', '09666554665', 'abc@gmail.com', '1', '2023-05-25', 'asdasdasd', '2', '2,5', 'upload/Screenshot 2023-05-17 152816.png', 1, '2023-05-25', '0000-00-00'),
(4, 1004, '123', '123', '12/HgOkUy(N)546453', '09666554665', 'abc@gmail.com', '1', '2023-05-25', 'asggaeh', '1', '3,6', 'upload/Screenshot 2023-05-17 152816.png', 1, '2023-05-25', '0000-00-00'),
(5, 1005, 'Kyaw Kyaw', 'U Aung', '12/HgOkUy(N)546453', '09666554665', 'abc@gmail.com', '1', '2023-05-25', 'asdasdasd', '1', '1,4', 'upload/Screenshot 2023-05-17 152816.png', 0, '2023-05-25', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
