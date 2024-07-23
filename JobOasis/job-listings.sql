-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 03:02 PM
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
-- Database: `jobform`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_listings`
--

CREATE TABLE `job_listings` (
  `id` int(11) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `jobLocation` varchar(255) NOT NULL,
  `jobSalary` varchar(100) DEFAULT NULL,
  `jobExperience` varchar(100) DEFAULT NULL,
  `jobType` varchar(100) DEFAULT NULL,
  `companyName` varchar(255) NOT NULL,
  `imageURL` varchar(255) DEFAULT NULL,
  `datePosted` date DEFAULT NULL,
  `jobDescription` text DEFAULT NULL,
  `jobInformation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_listings`
--

INSERT INTO `job_listings` (`id`, `jobTitle`, `jobLocation`, `jobSalary`, `jobExperience`, `jobType`, `companyName`, `imageURL`, `datePosted`, `jobDescription`, `jobInformation`) VALUES
(1, 'CEO', 'California', '10,000,000$', 'entry-level', 'internship', 'Meta Inc', 'images/logos/HqrrEcrI_400x400.png', '2024-03-06', 'No more robots as CEO!', NULL),
(2, 'CTO', 'Los Angeles,USA', '66,666,666$', 'senior-level', 'full-time', 'Tesla Inc', 'images/logos/twitter-x-logo-0339F999CF-seeklogo.com.png', '2024-03-01', 'We sacked doggy Elon!', NULL),
(3, 'Software Engineering', 'Boston,USA', '600,000$', 'senior-level', 'remote', 'Google Inc', 'images/logos/google.png', '2024-03-05', 'Hiring the best Software Engineer we can find.', NULL),
(4, 'Computer Engineering', 'London,UK', '35,000£', 'junior-level', 'part-time', 'Spotify Inc', 'images/logos/spotify.png', '2024-03-06', 'We are looking for senior Computer Engineering!', NULL),
(5, 'Programmer', 'Toronto,Canada', '100,000$', 'entry-level', 'full-time', 'Apple Inc', 'images/logos/apple.png', '2024-03-06', 'Apple is better!', NULL),
(6, 'Project Management', 'Tokyo,Japan', '15,000,000¥', 'senior-level', 'full-time', 'Amazon Inc', 'images/logos/amazon-logo-s3f.png', '2024-03-06', 'いらっしゃいませ', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_listings`
--
ALTER TABLE `job_listings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_listings`
--
ALTER TABLE `job_listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
