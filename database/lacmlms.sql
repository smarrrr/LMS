-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 05:55 AM
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
-- Database: `lacmlms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `joining_date` date NOT NULL,
  `photo` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `sex`, `dob`, `address`, `phone`, `email`, `joining_date`, `photo`, `password`) VALUES
(10001, 'prithvi101', 'Prithviraj Singh Bogati', 'Male', '1994-09-23', 'Satdobato,Lalitpur', '9812345678', 'prithviraj.singh.bogati@lacm.e', '2018-06-06', 'profile.jpg\r\n', '$2a$12$JjAZ6Qd90dw/2jQTWiL3hOjFhGs31SCCaw2wD29xzcFyAvdY7Wa8q');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `isbn` varchar(20) CHARACTER SET latin1 NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) CHARACTER SET latin1 NOT NULL,
  `publisher` varchar(50) CHARACTER SET latin1 NOT NULL,
  `publish_date` date NOT NULL,
  `Reg_date` date NOT NULL,
  `pages` int(5) NOT NULL,
  `language` varchar(10) CHARACTER SET latin1 NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `edition` varchar(20) NOT NULL,
  `photo` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `isbn`, `title`, `author`, `publisher`, `publish_date`, `Reg_date`, `pages`, `language`, `price`, `category_id`, `edition`, `photo`, `status`) VALUES
(9001, '9780137503148', 'Software Engineering', 'Ian Sommerville', 'pearson', '0000-00-00', '0000-00-00', 0, 'english', 0, 50003, 'second', 'book.jpg', 1),
(9009, '81-7758-425-1', 'dd', 'meee', 'pearson', '2022-09-12', '2022-09-12', 0, 'English', 0, 50006, 'second', '', 0),
(9010, '12345', 'this is book', 'Ian Sommerville', 'pearson', '2014-01-01', '2022-09-12', 200, 'English', 400, 50005, 'second', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `borrow_date` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `book_id`, `member_id`, `borrow_date`, `status`) VALUES
(1, 9001, 4, '2022-09-12', 1),
(2, 9001, 6, '2022-09-12', 1),
(3, 9001, 4, '2022-09-12', 1),
(4, 9001, 6, '2022-09-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(50003, 'Software Engineering'),
(50004, 'economics'),
(50005, 'mathematics'),
(50006, 'strategic management '),
(50008, 'Business Management'),
(50009, 'Marketing'),
(50010, 'Finance'),
(50011, 'Psychology'),
(50012, 'Sociology'),
(50013, 'Computer Programming');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `code` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `code`) VALUES
(102, 'Bachelors in business information system', 'BBIS'),
(103, 'bachelors in hospitality management', 'bhm'),
(104, 'Bachelors in hospitality and tourism management ', 'BHTM'),
(105, 'Bachelors in business administration ', 'BBA');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sex` varchar(11) CHARACTER SET latin1 NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(30) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(10) CHARACTER SET latin1 NOT NULL,
  `email` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `photo` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `name`, `sex`, `dob`, `address`, `phone`, `email`, `course_id`, `photo`) VALUES
(4, '201857', 'QIY140286573', 'Smarika Thapa', 'Female ', '2000-03-20', 'hattiban', '9860000000', 'tsmarika11@gmail.com', 103, 'student.jpeg'),
(5, '201856', 'VUE049851327', 'Smarika Thapa', 'Female ', '2000-03-20', 'hattiban', '9812345678', 'smarika.thapa@gmail.com', 104, 'profile.JPG'),
(6, '201988', 'LTX487106329', 'sita thapa', 'Female ', '2000-03-20', 'lazimpat', '9860635818', 'smarika18i@lacm.edu.np', 105, 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`id`, `book_id`, `member_id`, `return_date`) VALUES
(1, 9001, 4, '2022-09-12'),
(2, 9001, 6, '2022-09-12'),
(3, 9001, 4, '2022-09-12');

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
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9011;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50014;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
