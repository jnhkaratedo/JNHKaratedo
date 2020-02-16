-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2020 at 03:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jnh_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `Class_Id` int(10) NOT NULL,
  `Instructor_Id` int(10) NOT NULL,
  `Class_title` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Date_from` date NOT NULL,
  `Date_to` date NOT NULL,
  `Day` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`Class_Id`, `Instructor_Id`, `Class_title`, `Location`, `Date_from`, `Date_to`, `Day`) VALUES
(1, 1, 'Karatedo', 'Harmony Village Mall 2nd Floor.', '2020-02-15', '2020-07-18', 'Saturday'),
(2, 6, 'sample', 'Polytechnic University of the Philippines San Pedro Campus', '2020-02-16', '2020-08-16', 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `tblguardian`
--

CREATE TABLE `tblguardian` (
  `Id` int(10) NOT NULL,
  `GFname` varchar(100) NOT NULL,
  `GMname` varchar(100) NOT NULL,
  `GLname` varchar(100) NOT NULL,
  `Occupation` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `Relationship` varchar(50) NOT NULL,
  `Student_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblinstructor_info`
--

CREATE TABLE `tblinstructor_info` (
  `Instructor_Id` int(10) NOT NULL,
  `Rank` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Birthday` date NOT NULL,
  `Age` int(5) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Contact_No` bigint(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblinstructor_info`
--

INSERT INTO `tblinstructor_info` (`Instructor_Id`, `Rank`, `Name`, `Address`, `Birthday`, `Age`, `Gender`, `Contact_No`, `Email`, `image`) VALUES
(1, 'Black', 'Charmaine Joy P Magtangob   ', '. San Jose GMA Cavite   ', '1997-11-27', 22, 'Male', 9278909022, 'charmaine.joy@gmail.com', ''),
(6, 'PURPLE', 'Charmaine Joy Pactor Magtangob  ', '. San Jose GMA Cavite  ', '1997-11-27', 22, 'Male', 9278909022, 'charmaine.joy@gmail.com', ''),
(9, 'BLACK', ' Marlou Thomas Rillera', 'Langgam San Pedro City Laguna', '1998-08-23', 21, 'Male', 93444334, 'marloupanget@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblmanager`
--

CREATE TABLE `tblmanager` (
  `manager_id` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Birthday` date NOT NULL,
  `Age` int(10) NOT NULL,
  `Contact_No` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmanager`
--

INSERT INTO `tblmanager` (`manager_id`, `Name`, `Gender`, `Address`, `Birthday`, `Age`, `Contact_No`) VALUES
(7, 'Renate Rose Amolar Culubong', 'Female', 'Sitio Rustan Brgy. Langgam San Pedro City Laguna', '1983-03-23', 35, 2147483647),
(9, 'Aldrin Ronnin Salonga', 'Male', 'Calendola San Pedro Laguna', '1999-09-09', 21, 87878787);

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `Id` int(10) NOT NULL,
  `Student_Id` int(10) NOT NULL,
  `Date` datetime NOT NULL,
  `Amount` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblreservation`
--

CREATE TABLE `tblreservation` (
  `Reservation_Id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact_No` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblreservation`
--

INSERT INTO `tblreservation` (`Reservation_Id`, `Name`, `Email`, `Contact_No`) VALUES
(1, 'Niamh Chelsy Camaganakan', 'niamhchelsy@gmail.com', 88935229);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentclass`
--

CREATE TABLE `tblstudentclass` (
  `Id` int(10) NOT NULL,
  `Class_Id` int(10) NOT NULL,
  `Student_id` int(10) NOT NULL,
  `Date_from` date NOT NULL,
  `Date_to` date NOT NULL,
  `Day` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudentclass`
--

INSERT INTO `tblstudentclass` (`Id`, `Class_Id`, `Student_id`, `Date_from`, `Date_to`, `Day`) VALUES
(1, 1, 1, '2020-02-15', '2020-07-18', 'Saturday'),
(2, 1, 2, '2020-02-15', '2020-07-18', 'Saturday'),
(3, 1, 3, '2020-02-15', '2020-07-18', 'Saturday'),
(4, 2, 50, '2020-02-16', '2020-08-16', 'Sunday'),
(5, 2, 52, '2020-02-16', '2020-08-16', 'Sunday'),
(6, 2, 53, '2020-02-16', '2020-08-16', 'sunday');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent_info`
--

CREATE TABLE `tblstudent_info` (
  `Student_Id` int(10) NOT NULL,
  `Rank` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Birthday` date NOT NULL,
  `Age` int(10) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Contact_No` int(20) NOT NULL,
  `Fathers_Name` varchar(50) NOT NULL,
  `FOccupation` varchar(50) NOT NULL,
  `FContact_No` int(20) NOT NULL,
  `Mothers_Name` varchar(50) NOT NULL,
  `MOccupation` varchar(50) NOT NULL,
  `MContact_No` int(20) NOT NULL,
  `Payment` float NOT NULL,
  `Balance` float NOT NULL,
  `Comment` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudent_info`
--

INSERT INTO `tblstudent_info` (`Student_Id`, `Rank`, `Name`, `Address`, `Birthday`, `Age`, `Gender`, `Contact_No`, `Fathers_Name`, `FOccupation`, `FContact_No`, `Mothers_Name`, `MOccupation`, `MContact_No`, `Payment`, `Balance`, `Comment`) VALUES
(1, 'Black', 'Cerilo A. Verdejo Jr', 'Langgam San Pedro City Laguna', '1992-10-13', 27, 'Male', 2147483647, 'Cerilo Geraldino Verdejo Sr', 'Driver', 88909090, 'Gina Atilano Verdejo', 'Bus Attendant', 8889090, 899, 101, 'No'),
(2, 'Red', 'Patrick Adino Tabogon', 'Pacita 2B', '1997-08-21', 22, 'Male', 2147483647, 'Felix Tabogon', 'Driver', 8996767, 'Esperanza Adino', 'Vendor', 8888999, 500, 500, 'No'),
(3, 'GREEN', 'Marlou Thomas Rillera', 'Brgy. Laggam San Pedro City Laguna ', '1996-06-16', 23, 'Male', 2147483647, 'Mr. Rillera', 'Driver', 8900000, 'Mrs. Rillera', 'Housewife', 8900009, 899, 101, 'No'),
(50, 'ORANGE', 'Aldrin Ronnin Salonga', 'Calendola San Pedro Laguna', '2020-02-05', 23, 'Male', 890890890, 'Mr. Salonga', 'None', 898989, 'Mrs. Salonga', 'None', 2147483647, 800, 200, 'No'),
(52, 'ORANGE', 'Renate Rose Amolar Culubong', 'Calendola San Pedro Laguna', '1991-12-12', 0, 'Female', 2147483647, 'Mr. Amolar', 'Driver', 2147483647, 'Mrs.Cabalhin', 'Housewife', 2147483647, 1000, 0, 'No'),
(53, 'BLUE', 'Niamh Chelsy Verdejo Camaganakan', 'Langgam San Pedro City Laguna', '2012-11-29', 7, 'Female', 8925223, 'Joven Camaganakan', 'Coach', 2147483647, 'Ginalyn Verdejo', 'None', 2147483647, 1000, 0, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `user_id` int(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_id`, `Username`, `Password`, `Role`) VALUES
(1, 'cyhverdz_admin', 'Aerial_003', 'super_user'),
(2, 'cyhdo_manager', 'Aerial_003', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`Class_Id`);

--
-- Indexes for table `tblguardian`
--
ALTER TABLE `tblguardian`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblinstructor_info`
--
ALTER TABLE `tblinstructor_info`
  ADD PRIMARY KEY (`Instructor_Id`);

--
-- Indexes for table `tblmanager`
--
ALTER TABLE `tblmanager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblreservation`
--
ALTER TABLE `tblreservation`
  ADD PRIMARY KEY (`Reservation_Id`);

--
-- Indexes for table `tblstudentclass`
--
ALTER TABLE `tblstudentclass`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblstudent_info`
--
ALTER TABLE `tblstudent_info`
  ADD PRIMARY KEY (`Student_Id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `Class_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblinstructor_info`
--
ALTER TABLE `tblinstructor_info`
  MODIFY `Instructor_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblmanager`
--
ALTER TABLE `tblmanager`
  MODIFY `manager_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblreservation`
--
ALTER TABLE `tblreservation`
  MODIFY `Reservation_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblstudentclass`
--
ALTER TABLE `tblstudentclass`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblstudent_info`
--
ALTER TABLE `tblstudent_info`
  MODIFY `Student_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
