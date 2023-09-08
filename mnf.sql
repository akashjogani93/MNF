-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 09:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mnf`
--

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `id` int(10) NOT NULL,
  `comName` varchar(30) NOT NULL,
  `adds` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`id`, `comName`, `adds`, `phone`, `image`) VALUES
(1, 'Bengluru', 'Bennargatta ,Bengluru', '7353231800', '../../img/community/jamaat.jpg'),
(2, 'Belgaum', 'Azam Nagar ,CCB ,8th cross ,Belgaum.', '7353231800', '../../img/community/jammat.jpg'),
(3, 'Hubali', 'New Highway Road ,Near Petrol Pump,Hubli', '9763368555', '../../img/community/pic.jpg'),
(4, 'Dharwad', 'Near bus stop, 6 th cross ,Dharwad ', '7411223010', '../../img/community/photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `adds` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `phone`, `city`, `adds`) VALUES
(1, 'mnf123@gmail.com', '7676801529', 'Belgaum', 'Arjune Empire 3rd Floar Congrss Road Belgaum');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `message`) VALUES
(1, 'Akash Jogani', 'akashjogani93@gmail.com', 'Hii a'),
(2, '2345', 'nilofar.patel1800@gmail.com', '2345'),
(3, 'barira patel', 'barira@gmail.com', 'efeiej124345'),
(4, '456u', 'nilofar.patel1800@gmail.com', 'Tin 677');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `location` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `des` varchar(150) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `location`, `date`, `des`, `image`) VALUES
(1, 'Jamaat E  Islam Event Management. ', 'Bengluru', '2023-06-15', 'Muhammad Ilyas, the founder of Tablighi Jamaat, wanted to create a movement that would enjoin good and forbid evil as the Quran decreed,[21][22] as hi', '../../img/events/event4.jpg'),
(2, 'Jamaat E Hind Hubli Event Management', 'Hubli', '2023-06-10', 'Tablighi Jamaat denies any political affiliation, involvement in debate over political or Islamic doctrine such as fiqh,[15][16][17] let alone terrori', '../../img/events/pic.jpg'),
(3, 'Event Managment of belgaum', 'Belgaum', '2023-06-05', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, ', '../../img/events/event.jpg'),
(4, 'Event management of Dharwad', 'Dharwad', '2023-06-01', 'f you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting a', '../../img/events/pic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `intouch`
--

CREATE TABLE `intouch` (
  `id` int(10) NOT NULL,
  `intouch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `intouch`
--

INSERT INTO `intouch` (`id`, `intouch`) VALUES
(1, 'nilofar.patel1800@gmail.com'),
(2, 'nilofar.patel@gmail.com'),
(3, 'nilofar.patel1800@gmail.com'),
(4, 'idris@gmail.com'),
(5, 'nadira@gmail.com'),
(6, 'nilofar.patel1800@gmail.com'),
(7, 'nilofar.patel1800@gmail.com'),
(8, 'nilofar.patel@gmail.com'),
(9, 'akashjogani93@gmail.cs'),
(10, 'nilofar.patel1800@gmail.com'),
(11, 'akashjogani93@gmail.com'),
(12, 'shivam@gmail.com'),
(13, 'nilofar.patel1800@gmail.com'),
(14, 'priya@gmail.com'),
(15, 'omkar@gmail.com'),
(16, 'nilofar.patel1800@gmail.com'),
(17, 'nilofar.patel1800@gmail.com'),
(18, 'nilofar.patel1800@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_id`, `email`, `pass`, `type`) VALUES
(1, 0, 'admin@admin.com', 'mnf@123', 'admin'),
(6, 5, 'shindesagar9632@gmail.com', 'sagar', 'user'),
(7, 6, 'akashjogani93@gmail.com', 'akash5050', 'user'),
(8, 7, 'rjomkar007@gmail.com', '1234', 'user'),
(9, 8, 'vinayak@gmail.com', '12345', 'user'),
(10, 9, 'suraj@gmail.com', '4565', 'user'),
(11, 10, 'nilofar.patel1800@gmail.com', 'nilofar123', 'user'),
(12, 11, 'nilofar.patel1800@gmail.com', 'nilofar123', 'user'),
(13, 12, 'idris@gamil.com', '23', 'user'),
(14, 13, 'vishal@gmail.com', 'vishal@111', 'user'),
(15, 14, 'shekhar@gmail.com', 'shekhar@123', 'user'),
(16, 15, 'mahesh@gmail.com', 'mahesh@123', 'user'),
(17, 16, 'aniket@gmail.com', 'aniket', 'user'),
(18, 17, 'satish@gmail.com', 'satish', 'user'),
(19, 18, 'akshi@gmail.com', 'akashi', 'user'),
(20, 19, 'sameer@gmail.com', '123456', 'user'),
(21, 20, 'zoya@gmail.com', '78', 'user'),
(22, 21, 'tiyapatel@gmail.com', '67', 'user'),
(23, 22, 'akashjogani93@gmail.com', 'akash5050', 'user'),
(24, 23, 'akashjogani93@gmail.com', 'akash5050', 'user'),
(25, 24, 'akashjogani93@gmail.com', 'akash5050', 'user'),
(26, 25, 'sa@gmail.com', 'sagar123', 'user'),
(27, 26, 'dinesh@gmail.com', 'dinesh', 'user'),
(28, 27, 'sj@gmail.com', 'Akash123', 'user'),
(29, 28, 'priya@gmail.com', '123patil', 'user'),
(30, 29, 'rahul89@gmail.com', 'akash12345', 'user'),
(31, 30, 'mahes89@gmail.com', 'mahesh123', 'user'),
(32, 31, 'akashjognai93@gmail.com', 'Akash90', 'user'),
(33, 32, 'shinde@gmail.com', 'shinde123', 'user'),
(34, 33, 'sameer96@gmail.com', 'sameer1212', 'user'),
(35, 34, 'sudarshan89@gmail.com', 'sudar123', 'user'),
(36, 35, 'vinayak55@gmail.com', 'vinayak123', 'user'),
(37, 36, 'sifan@gmail.com', 'sifan123', 'user'),
(38, 37, 'nilofar.patel@gmail.com', 'NILO123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `des` varchar(200) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `phone`, `des`, `image`) VALUES
(1, 'Nilofar Patel', '7353231800', 'President', '../../img/member/Chrysanthemum.jpg'),
(2, 'Mohammed Nouman', '7411223010', 'Vice President', '../../img/member/Hydrangeas.jpg'),
(3, 'Zoya Khan', '7353231800', 'Vice President', '../../img/member/Jellyfish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `community` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `age` varchar(10) NOT NULL,
  `adds` varchar(100) NOT NULL,
  `occ` varchar(100) NOT NULL,
  `sta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `community`, `password`, `dob`, `gender`, `profile`, `age`, `adds`, `occ`, `sta`) VALUES
(5, 'Sagar Shinde', 'shindesagar9632@gmail.com', '9742020863', 'Belgaum', 'sagar', '0000-00-00', '', '', '', '', 'Web Developer', ''),
(6, 'Akash Jogani', 'akashjogani93@gmail.com', '9742020868', 'Belgaum', '123', '2020-02-16', 'Male', '../img/user/6ac11cd37196a9fd693dde54b914cf02.png', '25', 'Tilakwadi 1st gate', 'software Developer', 'UnMarried'),
(7, 'Omkar Shinde', 'rjomkar007@gmail.com', '9739057368', 'Belgaum', '1234', '0000-00-00', '', '', '', '', 'Developer', 'UnMarried'),
(8, 'Vinayak Dharmoji', 'vinayak@gmail.com', '6362761418', 'Belgaum', '12345', '0000-00-00', '', '', '', '', 'developer', 'Un Married'),
(9, 'Suraj', 'suraj@gmail.com', '4567845213', 'Belgaum', '4565', '0000-00-00', '', '', '', '', 'bussiness', 'Un Married'),
(10, 'Nilofar Patel', 'nilofar.patel1800@gmail.com', '0000000000', 'Belgaum', 'nilofar123', '0000-00-00', '', '', '', '', '34444567', 'Married'),
(11, 'Nilofar Idris Patel', 'nilofar.patel1800@gmail.com', '4567654580', 'Hubali', '12', '2023-07-14', '', '../img/user/Hydrangeas.jpg', '18', 'CCB NO 46 PLOT NO 71 KANGRALI BK ROAD', '12345', 'Single'),
(12, '345678', 'idris@gamil.com', '2222222222', 'Belgaum', '23', '0000-00-00', '', '', '', '', '12345', 'Married'),
(13, 'Vishal Lohar', 'vishal@gmail.com', '7204058064', 'Belgaum', 'vishal@111', '0000-00-00', '', '', '', '', 'Customer Executive', 'Un Married'),
(14, 'shekhar', 'shekhar@gmail.com', '7353383680', 'Belgaum', 'shekhar@123', '0000-00-00', '', '', '', '', 'customer exicutive', 'Married'),
(15, 'Mahesh Chougule', 'mahesh@gmail.com', '9620625775', 'Belgaum', 'mahesh@123', '0000-00-00', '', '', '', '', 'Civil Department', 'Un Married'),
(16, 'Aniket Chougule', 'aniket@gmail.com', '7894561230', 'Belgaum', 'aniket', '0000-00-00', '', '', '', '', 'civil department', 'Un Married'),
(17, 'satish c', 'satish@gmail.com', '7894561235', 'Hubali', 'satish', '0000-00-00', '', '', '', '', 'mechanical', 'Un Married'),
(18, 'akshata', 'akshi@gmail.com', '4561237892', 'Belgaum', 'akashi', '0000-00-00', '', '', '', '', 'web developer', 'Married'),
(19, 'sameer', 'sameer@gmail.com', '4567891353', 'Belgaum', '123456', '0000-00-00', '', '', '', '', 'ui designer', 'Married'),
(20, 'Zoya Patel', 'zoya@gmail.com', '7353231800', 'Belgaum', '78', '0000-00-00', '', '', '', '', 'Job', 'Un Married'),
(21, 'Tiya patel', 'tiyapatel@gmail.com', '7411223010', 'Belgaum', '67', '0000-00-00', '', '', '', '', 'job', 'Un Married'),
(22, 'Akash Jogani', 'akashjogani93@gmail.com', '8520369147', 'Belgaum', 'ad', '0000-00-00', '', '', '', '', 'Mechanical', 'Un Married'),
(23, 'Akash Haraji', 'akashjogani93@gmail.com', '7894561234', 'Belgaum', 'ff', '0000-00-00', '', '', '', '', 'Travel Department', 'Un Married'),
(24, 'Sagar Shinde', 'akashjogani93@gmail.com', '4561234567', 'Belgaum', 'afaf', '0000-00-00', 'Male', '../img/user/6ac11cd37196a9fd693dde54b914cf02.png', '', '', 'afaf', 'Single'),
(25, 'Shinde Sagar', 'sa@gmail.com', '1234567892', 'Belgaum', 'sagar123', '0000-00-00', '', '', '', '', 'Civil', 'Un Married'),
(26, 'dinesh', 'dinesh@gmail.com', '8520369741', 'Belgaum', 'dinesh', '0000-00-00', '', '', '', '', 'banking', 'Un Married'),
(27, 'akash Jogani', 'sj@gmail.com', '1234564565', 'Belgaum', 'Akash123', '0000-00-00', '', '', '', '', 'faf', 'Un Married'),
(28, 'Priya Patil', 'priya@gmail.com', '3412345423', 'Belgaum', '123patil', '0000-00-00', '', '', '', '', 'job', 'Married'),
(29, 'Rahul ', 'rahul89@gmail.com', '7676801563', 'Belgaum', 'akash12345', '0000-00-00', '', '', '', '', 'Mechanical', 'Un Married'),
(30, 'Mahesh', 'mahes89@gmail.com', '1234567895', 'Belgaum', 'mahesh123', '0000-00-00', '', '', '', '', 'civil', 'Un Married'),
(31, 'Akash Jogani', 'akashjognai93@gmail.com', '4567891235', 'Belgaum', 'Akash90', '0000-00-00', '', '', '', '', 'Developer', 'Un Married'),
(32, 'Shinde', 'shinde@gmail.com', '4561237895', 'Belgaum', 'shinde123', '0000-00-00', '', '', '', '', 'army', 'Single'),
(33, 'Sameer Desurkar', 'sameer96@gmail.com', '7353383685', 'Belgaum', 'sameer1212', '0000-00-00', '', '', '', '', 'Farmer', 'Single'),
(34, 'sudarshan Jadhav', 'sudarshan89@gmail.com', '2020056894', 'Belgaum', 'sudar123', '0000-00-00', '', '', '', '', 'Farmer', 'Single'),
(35, 'Vinayak', 'vinayak55@gmail.com', '8523691475', 'Belgaum', 'vinayak123', '0000-00-00', '', '', '', '', 'Farmer', 'Single'),
(36, 'Sifan Patel', 'sifan@gmail.com', '3412326780', 'Hubali', 'sifan123', '0000-00-00', '', '', '', '', 'Student ', 'Single'),
(37, 'Nilofar Patel', 'nilofar.patel@gmail.com', '7354231800', 'Hubali', 'NILO123', '0000-00-00', '', '', '', '', 'STUDENT', 'Single');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intouch`
--
ALTER TABLE `intouch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
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
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `intouch`
--
ALTER TABLE `intouch`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
