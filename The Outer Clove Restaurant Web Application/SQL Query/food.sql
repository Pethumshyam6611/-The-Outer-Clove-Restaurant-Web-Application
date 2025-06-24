-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 06:48 PM
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
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(10) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Price` decimal(8,2) NOT NULL,
  `imagename` varchar(500) NOT NULL,
  `Quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CusID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Emailadress` varchar(50) NOT NULL,
  `Phonenumber` int(10) NOT NULL,
  `Adress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CusID`, `Name`, `Username`, `Password`, `Emailadress`, `Phonenumber`, `Adress`) VALUES
(1, 'Pethum', 'Pethum66', '1234', 'pethumshayam66@gmail.com', 0, 'Anuradhapura'),
(2, 'Samiru Geethmal', 'Samiruwa11', '5959', 'samirugeethmal55@gmail.com', 772910692, 'Kandy'),
(3, 'Geethmal', 'Samiruwa12', 'Ushandi', 'pethumshayam66@gmail.com', 772910692, 'Kandy'),
(4, 'Pethum', 'Samiruwa', 'Ushandi', 'pethumshayam66@gmail.com', 2147483647, 'Kandy'),
(5, 'asdasd', 'Samiruwa', 'Ushandi', 'samirugeethmal55@gmail.com', 772910692, 'Anuradhapura'),
(6, 'ASHEN', 'ASHEN', '4545', 'ASHEN@gmail.com', 715454898, 'COLOMBO'),
(7, 'Jelly', 'Samiruwa', 'Ushandi', 'st20258183@outlook.cardiffmet.ac.uk', 2147483647, 'Kandy'),
(8, 'Geethmal', 'Samiruwa', 'Ushandi', 'samirugeethmal55@gmail.com', 2147483647, 'Kandy'),
(9, 'Tharushika', 'Tharushika44', '1234', 'tharushika@gmai.com', 715454898, 'Kandy');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Imagename` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`ID`, `Title`, `Imagename`) VALUES
(63, 'Pizza Deal', '0b2e7518-7b2e-468b-81ad-f11cd18b9b43.jpg'),
(64, 'Coke Deal', '64c88028-34a5-4123-9485-f7fe905283f0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `CustomerName` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phonenumber` int(10) NOT NULL,
  `ReservationDate` date NOT NULL,
  `ReservationTime` varchar(20) NOT NULL,
  `RESID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`CustomerName`, `Email`, `Phonenumber`, `ReservationDate`, `ReservationTime`, `RESID`) VALUES
('Pethum', 'pethumshayam66@gmail.com', 772910692, '2024-01-27', '11:15', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tableadmin`
--

CREATE TABLE `tableadmin` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tableadmin`
--

INSERT INTO `tableadmin` (`ID`, `Fullname`, `Username`, `Password`) VALUES
(94, 'Pethum', 'Pethum66', '6611'),
(102, 'Sakuni', 'Sakuni11', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tblfood`
--

CREATE TABLE `tblfood` (
  `id` int(10) UNSIGNED NOT NULL,
  `Categoryid` int(50) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(300) NOT NULL,
  `imagename` varchar(500) NOT NULL,
  `price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfood`
--

INSERT INTO `tblfood` (`id`, `Categoryid`, `title`, `description`, `imagename`, `price`) VALUES
(81, 2, 'Cheese Pizza', 'Mozaralla, sausages', 'sausage-pizza-for-website-597874311.png', 1500.00),
(82, 3, 'Cheese Cake', 'Rose Cheese Cake', 'cheese-cake-for-website-139975854.png', 850.00),
(84, 1, 'Faluda ', 'Rose Creamy Faluda', '2151089058.jpg', 800.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbloder`
--

CREATE TABLE `tbloder` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `qt` decimal(10,0) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `oderdate` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `customername` varchar(10) NOT NULL,
  `customerconact` varchar(10) NOT NULL,
  `customeremail` varchar(150) NOT NULL,
  `customeradress` varchar(250) NOT NULL,
  `DineinOP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbloder`
--

INSERT INTO `tbloder` (`id`, `food`, `price`, `qt`, `total`, `oderdate`, `status`, `customername`, `customerconact`, `customeremail`, `customeradress`, `DineinOP`) VALUES
(11, 'Faluda ', 800.00, 4, 3200.00, '2024-01-03 18:45:04', 'odered', 'Pethum', '0772910692', 'pethumshayam66@gmail.com', 'Anuradhapura', 'Dilivery');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CusID`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`RESID`);

--
-- Indexes for table `tableadmin`
--
ALTER TABLE `tableadmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfood`
--
ALTER TABLE `tblfood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbloder`
--
ALTER TABLE `tbloder`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CusID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `RESID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tableadmin`
--
ALTER TABLE `tableadmin`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tblfood`
--
ALTER TABLE `tblfood`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbloder`
--
ALTER TABLE `tbloder`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
