-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2017 at 03:38 AM
-- Server version: 5.7.18-log
-- PHP Version: 7.2.0alpha2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rollforgroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `GameID` int(11) NOT NULL,
  `Game` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`GameID`, `Game`) VALUES
(1, 'Dungeons & Dragons'),
(2, 'Pathfinder');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `GroupID` int(11) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `City` varchar(50) NOT NULL DEFAULT 'Default',
  `State` varchar(50) NOT NULL DEFAULT 'Default',
  `GameID` int(11) DEFAULT NULL,
  `MeetingPlace` varchar(250) DEFAULT 'Default',
  `Day1` varchar(50) DEFAULT 'Default',
  `Time1` varchar(50) DEFAULT 'Default',
  `Day2` varchar(50) DEFAULT 'Default',
  `Time2` varchar(50) DEFAULT 'Default',
  `Day3` varchar(50) DEFAULT 'Default',
  `Time3` varchar(50) DEFAULT 'Default',
  `Description` varchar(2500) DEFAULT 'Default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GroupID`, `Name`, `UserID`, `City`, `State`, `GameID`, `MeetingPlace`, `Day1`, `Time1`, `Day2`, `Time2`, `Day3`, `Time3`, `Description`) VALUES
(12, 'Test_Group', 24, 'Boston', 'MA', 1, 'At a player\'s place.', 'Sunday', 'Evening', 'Tuesday', 'Afternoon', 'Wednesday', 'Night', 'We are Test Group.'),
(13, 'Test Group 2', 26, 'Austin', 'TX', 2, '', 'Sunday', 'Morning', 'Sunday', 'Morning', 'Sunday', 'Evening', 'We are Test Group 2.'),
(14, 'Test Group 2B', 26, 'Austin', 'TX', 2, '', 'Sunday', 'Evening', 'Thursday', 'Evening', 'Thursday', 'Afternoon', 'We are Test Group 2B.'),
(15, 'Test Group 5', 28, 'Wilmington', 'NC', 1, '', 'Monday', 'Afternoon', 'Default', 'Default', 'Default', 'Default', 'We are Test Group 5.'),
(16, 'Test Group 6', 29, 'Foxboro', 'MA', 2, '', 'Monday', 'Morning', 'Wednesday', 'Night', 'Default', 'Default', 'We are Test Group 6.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `City` varchar(50) NOT NULL DEFAULT 'Default',
  `State` varchar(50) NOT NULL DEFAULT 'Default',
  `AddedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Game` int(11) NOT NULL DEFAULT '0',
  `CanGM` varchar(50) DEFAULT 'Default',
  `MeetingPlace` varchar(50) DEFAULT 'Default',
  `Day1` varchar(50) DEFAULT 'Default',
  `Time1` varchar(50) DEFAULT 'Default',
  `Day2` varchar(50) DEFAULT 'Default',
  `Time2` varchar(50) DEFAULT 'Default',
  `Day3` varchar(50) DEFAULT 'Default',
  `Time3` varchar(50) DEFAULT 'Default',
  `Pic` int(11) DEFAULT NULL,
  `Description` varchar(750) DEFAULT 'Default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Email`, `FirstName`, `LastName`, `Password`, `City`, `State`, `AddedOn`, `Game`, `CanGM`, `MeetingPlace`, `Day1`, `Time1`, `Day2`, `Time2`, `Day3`, `Time3`, `Pic`, `Description`) VALUES
(24, 'TestUser', 'testuser@test.com', 'Test', 'User', 'd9b5f58f0b38198293971865a14074f59eba3e82595becbe86ae51f1d9f1f65e', 'Boston', 'MA', '2017-07-26 02:08:39', 1, 'Yes', 'At a player\'s place.', 'Sunday', 'Evening', 'Wednesday', 'Night', 'Tuesday', 'Afternoon', NULL, 'I am Test User 1. '),
(25, 'TestUser2', 'testuser2@test.com', 'Test', 'User2', 'd9b5f58f0b38198293971865a14074f59eba3e82595becbe86ae51f1d9f1f65e', 'Manchester', 'NH', '2017-07-26 02:57:31', 2, 'No Preference', 'Online', 'Friday', 'Night', 'Saturday', 'Night', 'Friday', 'Morning', NULL, 'I am Test User 2.'),
(26, 'TestUser3', 'testuser3@test.com', 'Test', 'User3', 'd9b5f58f0b38198293971865a14074f59eba3e82595becbe86ae51f1d9f1f65e', 'Austin', 'TX', '2017-07-26 03:03:07', 1, 'No', 'In person, but no preference.', 'Sunday', 'Anytime', 'Sunday', 'Morning', 'Monday', 'Night', NULL, 'I am Test User 3.'),
(27, 'TestUser4', 'testuser4@test.com', 'Test', 'User4', 'd9b5f58f0b38198293971865a14074f59eba3e82595becbe86ae51f1d9f1f65e', 'Crescent City', 'CA', '2017-07-26 03:11:38', 2, 'Yes', 'At a player\'s place.', 'Wednesday', 'Morning', 'Tuesday', 'Anytime', 'Monday', 'Morning', NULL, 'I am Test User 4.'),
(28, 'TestUser5', 'testuser5@test.com', 'Test', 'User5', 'd9b5f58f0b38198293971865a14074f59eba3e82595becbe86ae51f1d9f1f65e', 'Wilmington', 'NC', '2017-07-26 03:18:34', 1, 'No', 'Online', 'Sunday', 'Afternoon', 'Default', 'Default', 'Default', 'Default', NULL, 'I am Test User 5.'),
(29, 'TestUser6', 'testuser6@test.com', 'Test', 'User6', 'd9b5f58f0b38198293971865a14074f59eba3e82595becbe86ae51f1d9f1f65e', 'Foxboro', 'MA', '2017-07-26 03:27:28', 1, 'Yes', 'At a player\'s place.', 'Sunday', 'Morning', 'Default', 'Default', 'Default', 'Default', NULL, 'I am Test User 6'),
(30, 'TestUser7', 'testuser7@test.com', 'Test', 'User7', 'd9b5f58f0b38198293971865a14074f59eba3e82595becbe86ae51f1d9f1f65e', 'Boston', 'MA', '2017-07-26 03:31:50', 1, 'Yes', 'At a game store.', 'Sunday', 'Anytime', 'Default', 'Default', 'Default', 'Default', NULL, 'I am Test User 7.'),
(31, 'TestUser8', 'testuser8@test.com', 'Test', 'User8', 'd9b5f58f0b38198293971865a14074f59eba3e82595becbe86ae51f1d9f1f65e', 'Derry', 'MA', '2017-07-26 03:33:09', 2, 'Yes', 'At a player\'s place.', 'Sunday', 'Afternoon', 'Default', 'Default', 'Default', 'Default', NULL, 'I am Test User 8.'),
(32, 'TestUser9', 'testuser9@test.com', 'Test', 'User9', 'd9b5f58f0b38198293971865a14074f59eba3e82595becbe86ae51f1d9f1f65e', 'Boston', 'MA', '2017-07-26 03:34:49', 1, 'No', 'At a game store.', 'Thursday', 'Anytime', 'Default', 'Default', 'Default', 'Default', NULL, 'I am Test User 9.'),
(33, 'TestUser10', 'testuser10@test.com', 'Test', 'User10', 'd9b5f58f0b38198293971865a14074f59eba3e82595becbe86ae51f1d9f1f65e', 'Austin', 'TX', '2017-07-26 03:35:56', 2, 'No Preference', 'At a game store.', 'Saturday', 'Morning', 'Default', 'Default', 'Default', 'Default', NULL, 'I am Test User 10.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`GameID`) USING BTREE;

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`GroupID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `GameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `GroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
