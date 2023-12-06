-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2023 at 12:33 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21063945_onlinehostedlibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'rihanshu@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `bookpic` varchar(111) NOT NULL,
  `bookname` varchar(50) NOT NULL,
  `bookdetail` varchar(111) NOT NULL,
  `bookauthor` varchar(50) NOT NULL,
  `bookpub` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `bookprice` int(25) NOT NULL,
  `bookquantity` int(25) NOT NULL,
  `bookava` int(25) NOT NULL,
  `bookrent` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `bookpic`, `bookname`, `bookdetail`, `bookauthor`, `bookpub`, `branch`, `bookprice`, `bookquantity`, `bookava`, `bookrent`) VALUES
(17, 'logo.PNG', 'physics', 'Best Course on DSA', 'good', 'S.Chand', 'CSE', 800, 10, 6, 4),
(18, 'logo.PNG', 'Chemistry', 'Best Course on DSA', 'good', 'S.Chand', 'IT', 800, 55, 52, 3),
(19, 'logo.PNG', 'Mathematics', 'Best Course on DSA', 'good', 'S.Chand', 'CSE', 800, 10, 10, 0),
(20, 'logo.PNG', 'BDA', 'By Dhore Sir', 'Kiran Sir', 'RK & Sons', 'CSE', 350, 6, 5, 1),
(21, 'logo.PNG', 'Devops', 'Best Course on DSA', 'good', 'S.Chand', 'CSE', 800, 10, 9, 1),
(22, 'library.jpg', 'Construction', 'Best Course on DSA', 'good', 'S.Chand', 'Civil', 345, 1, 1, 0),
(23, 'library.jpg', 'wings on fire', 'i am good book', 'Kiran Sir', 'S.Chand', 'IT', 444, 10, 10, 0),
(25, 'library.jpg', 'maths', 'Best Course on DSA', 'good', 'mypub', 'IT', 350, 5, 5, 0),
(28, 'library.jpg', 'SST', 'mat', 'good', 'mypub', 'CSE', 4300, 5, 4, 1),
(29, 'logo.PNG', 'AI and ML', 'al course', 'rajiv', 'S.Chand', 'CSE', 234, 23, 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `id` int(11) NOT NULL,
  `userid` int(50) NOT NULL,
  `issuename` varchar(50) NOT NULL,
  `issuebook` varchar(50) NOT NULL,
  `issuetype` varchar(50) NOT NULL,
  `issuedays` int(35) NOT NULL,
  `issuedate` varchar(33) NOT NULL,
  `issuereturn` varchar(33) NOT NULL,
  `fine` int(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `userid`, `issuename`, `issuebook`, `issuetype`, `issuedays`, `issuedate`, `issuereturn`, `fine`) VALUES
(36, 1, 'atul', 'Devops', 'student', 7, '22/07/23', '29/07/23', 0),
(38, 12, 'Chinmay Mahajan', 'physics', 'teacher', 21, '22/07/23', '12/08/23', 0),
(39, 1, 'atul', 'Chemistry', 'student', 4, '22/07/23', '26/07/23', 0),
(42, 1, 'atul', 'physics', 'student', 5, '22/07/23', '27/07/23', 0),
(43, 12, 'Chinmay Mahajan', 'Chemistry', 'teacher', 21, '22/07/23', '12/08/23', 0),
(45, 3, 'rihanshu', 'BDA', 'teacher', 21, '24/07/23', '14/08/23', 0),
(46, 3, 'rihanshu', 'Chemistry', 'teacher', 21, '25/07/23', '15/08/23', 0),
(48, 3, 'rihanshu', 'SST', 'teacher', 21, '01/08/23', '22/08/23', 0),
(49, 3, 'rihanshu', 'SST', 'teacher', 21, '01/08/23', '22/08/23', 0),
(50, 3, 'rihanshu', 'SST', 'teacher', 21, '01/08/23', '22/08/23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_book`
--

CREATE TABLE `request_book` (
  `id` int(11) NOT NULL,
  `userid` int(35) NOT NULL,
  `bookid` int(35) NOT NULL,
  `username` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `bookname` varchar(50) NOT NULL,
  `issuedays` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_book`
--

INSERT INTO `request_book` (`id`, `userid`, `bookid`, `username`, `usertype`, `bookname`, `issuedays`) VALUES
(150, 5, 19, 'onkar', 'teacher', 'Mathematics', 21),
(151, 4, 20, 'ajay', 'teacher', 'BDA', 21),
(152, 3, 22, 'rihanshu', 'teacher', 'Construction', 21);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `email`, `password`, `type`) VALUES
(1, 'atul', 'atul@gmail.com', '123', 'student'),
(3, 'rihanshu', 'rihanshu@gmail.com', '123', 'teacher'),
(4, 'ajay', 'ajay@gmail.com', '123', 'teacher'),
(5, 'onkar', 'onkar@gmail.com', '321', 'teacher'),
(6, 'Prajwal', 'prajwal@gmail.com', '123', 'student'),
(7, 'Prakash', 'prakash@gmail.com', '12344321', 'teacher'),
(8, 'ramji', 'ramji@gmail.com', '321', 'teacher'),
(12, 'Chinmay Mahajan', 'chinmay@gmail.com', '123', 'teacher'),
(13, 'pappu', 'pappu@gmail.com', '123', 'teacher'),
(14, 'yash', 'yash@gmail.com', '123', 'student'),
(16, 'sakshi', 'sakshi@gmail.com', '123', 'student'),
(17, 'rajesh', 'rajesh@yahoo.in', '123', 'student'),
(19, 'Rameshwar', 'rameshwar@gmail.com', '123', 'student'),
(20, 'atul1', 'atul1@gmail.com', '123456789', 'student'),
(21, 'Mahesh Babu', 'prajwaldule@gmail.com', 'Prajwal123456', 'student'),
(22, '63300661', '', '', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `request_book`
--
ALTER TABLE `request_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `bookid` (`bookid`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `request_book`
--
ALTER TABLE `request_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD CONSTRAINT `issue_book_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user_data` (`id`);

--
-- Constraints for table `request_book`
--
ALTER TABLE `request_book`
  ADD CONSTRAINT `request_book_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user_data` (`id`),
  ADD CONSTRAINT `request_book_ibfk_2` FOREIGN KEY (`bookid`) REFERENCES `book` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
