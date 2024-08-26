-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 03:46 AM
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
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profile`) VALUES
(1, 'Admin', 'Admin', '5124556.jpg'),
(2, 'Anshul', 'Anshul', 'Anshul.jpg'),
(3, 'Dharmesh', 'Dharmesh', 'Dharmesh.png');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `username`, `password`, `contact`, `email`, `qualification`, `department`, `hospital`, `profile`) VALUES
(1, 'Dr.Ravi Kumar', 'Ravi', '988176723', 'ravikumar@gmail.com', 'Physician', 'Physiology', 'Geetanjali', '3641599.jpg'),
(2, 'Dr.Santosh Jain', 'Santosh', '7823637834', 'santoshjain12@gmail.com', 'Cardiologist', 'Cardiology', 'Geetanjali', '3641599.jpg'),
(3, 'Dr.Mahesh Bhat', 'Mahesh', '8892348878', 'mahesh1234@gmail.com', 'Neurologist', 'Neurology', 'Geetanjali', '3641599.jpg'),
(4, 'Dr.Abhishek Meena', 'Abhi', '6375723989', 'abhiii@gmail.com', 'Orthopedic', 'Orthopedics', 'Geetanjali', '3641599.jpg'),
(5, 'Dr.Manish Rao', 'Manish', '7727467819', 'manish321@gmail.com', 'Oncologist', 'Oncology', 'Geetanjali', '3641599.jpg'),
(6, 'Dr.Avinash Sukhwal', 'Aviii', '9909562789', 'avinashsukhwal@gmail.com', 'Physician', 'Physiology', 'Choudhary', '3641599.jpg'),
(7, 'Dr.Mukesh Mahajan', 'Mukesh', '8873421343', 'mahajanmukesh@gmail.com', 'Cardiologist', 'Cardiology', 'Choudhary', '3641599.jpg'),
(8, 'Dr.Khush Ostwal', 'khush', '7834345213', 'khush2352@gmail.com', 'Neurologist', 'Neurology', 'Choudhary', '3641599.jpg'),
(9, 'Dr.Kailash Joshi', 'kailash', '9875263749', 'kailash278@gmail.com', 'Orthopedic', 'Orthopedics', 'Choudhary', '3641599.jpg'),
(10, 'Dr.Hemant Jat', 'hemant', '7781237672', 'hemant8765@gmail.com', 'Oncologist', 'Oncology', 'Choudhary', '3641599.jpg'),
(11, 'Dr.Kunal', 'kunal', '7834897350', 'kunal7654@gmail.com', 'Physician', 'Physiology', 'Paras JK ', '3641599.jpg'),
(12, 'Dr.Pritam Jain', 'Pritam', '7812732461', 'pritamjain@gmail.com', 'Cardiologist', 'Cardiology', 'Paras JK ', '3641599.jpg'),
(13, 'Dr.Lokesh Joshi', 'lokesh', '8855235679', 'lokeshjosh@gmail.com', 'Neurologist', 'Neurology', 'Paras JK ', '3641599.jpg'),
(14, 'Dr.Manish sharma', 'manish', '6377251680', 'manish33221@gmail.com', 'Orthopedic', 'Orthopedics', 'Paras JK ', '3641599.jpg'),
(15, 'Dr.Ayush Soni', 'soniayush', '9001127342', 'ayushsoni@gmail.com', 'Oncologist', 'Oncology', 'Paras JK ', '3641599.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `document` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `name`, `document`, `contact`) VALUES
(1, 'aaa', 'Choudhary.jpg', '123');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `doctor`, `age`, `gender`, `contact`, `hospital`, `date_time`) VALUES
(1, 'ansh', 'aa', 22, 'Male', '2222', 'aa', '2024-05-04 03:56:08'),
(4, 'aaa', 'Doc', 28, 'Male', '9233872', 'MB', '2024-05-04 03:56:08'),
(5, 'Shannu', 'Doc', 20, 'Female', '991928829', 'MB', '2024-05-04 03:56:08'),
(6, 'Mohan', 'doc', 40, 'Male', 'sssss', 'MB', '2024-05-04 03:56:08'),
(7, 'asdas', 'asdsad', 11, 'Male', 'asdasd', 'GH', '2024-05-05 04:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`id`, `name`, `username`, `password`, `image`, `date_time`) VALUES
(1, 'Geetanjali', 'Geetanjali', 'GH', 'download.jpg', '2024-05-05 05:17:15'),
(2, 'Choudhary', 'Choudhary', 'CHD', 'Choudhary.jpg', '2024-05-05 05:28:22'),
(3, 'Paras JK ', 'Paras', 'PRS', 'Paaras.jpg', '2024-05-05 05:29:39'),
(4, 'JB ', 'JB', 'JB', 'JB.jpg', '2024-05-05 05:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `contact`, `email`, `age`, `gender`, `city`, `password`, `profile`) VALUES
(1, 'Diya', '9876543210', 'diya@gmail.com', 20, 'Female', 'Udaipur', 'Diya', ''),
(2, 'Anshul', '123', 'anshulmenaria@gmail.com', 20, 'Male', 'Udaipur', 'aa', '5124556.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
