-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2017 at 08:21 PM
-- Server version: 5.7.18-log
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rollforparty`
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
(2, 'Pathfinder'),
(3, 'Dungeon World'),
(4, 'The Sprawl'),
(5, 'Munchkin'),
(6, 'Blades In The Dark'),
(7, 'Monopoly'),
(8, 'Risk'),
(9, 'Stratego');

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
(21, 'Mason\'s Group', 37, 'Boston', 'MA', 1, 'At a player\'s place.', 'Sunday', 'Night', 'Wednesday', 'Night', 'Saturday', 'Anytime', 'Looking to fill this group with 5 people for local D&D sessions.'),
(22, 'The Best Group', 38, 'Boston', 'MA', 1, 'In person, but no preference.', 'Sunday', 'Night', 'Tuesday', 'Afternoon', 'Thursday', 'Anytime', 'Looking for experienced players.'),
(23, 'LuckySquad', 39, 'Maple Shade', 'NJ', 2, 'In person, but no preference.', 'Sunday', 'Afternoon', 'Wednesday', 'Anytime', 'Friday', 'Anytime', 'Looking for some people that are willing to play with a first time pathfinder player.'),
(24, 'Spelunking Splunkers', 40, 'Boston', 'MA', 1, 'In person, but no preference.', 'Sunday', 'Night', 'Tuesday', 'Anytime', 'Friday', 'Anytime', 'Looking for some down to earth people who want to play d&d 3 days a week. Schedule is flexible for group majority.'),
(25, 'Meowkers', 41, 'Maple Shade', 'NJ', 2, 'Online', 'Sunday', 'Anytime', 'Monday', 'Morning', 'Tuesday', 'Morning', 'Early morning pathfinder group. Days are subject to change.'),
(26, 'TheDojo', 42, 'Boston', 'MA', 1, 'Online', 'Wednesday', 'Anytime', 'Thursday', 'Anytime', 'Friday', 'Anytime', 'All are welcome!'),
(27, 'Group of Han', 43, 'Maple Shade', 'NJ', 1, 'Online', 'Sunday', 'Morning', 'Friday', 'Evening', 'Saturday', 'Night', 'Just looking to find new people to play with.'),
(28, 'High Rollers', 44, 'New York', 'NY', 2, 'Online', 'Wednesday', 'Morning', 'Tuesday', 'Morning', 'Thursday', 'Morning', 'Weekday Morning Group!'),
(29, 'Kappa Nation', 45, 'Boston', 'MA', 1, 'Online', 'Sunday', 'Night', 'Tuesday', 'Night', 'Thursday', 'Night', 'No messing around here.'),
(30, 'Last Call', 46, 'Boston', 'MA', 1, 'Online', 'Thursday', 'Anytime', 'Friday', 'Anytime', 'Saturday', 'Anytime', 'The days listed are final, hours of game time are flexible though.');

-- --------------------------------------------------------

--
-- Table structure for table `groupuser`
--

CREATE TABLE `groupuser` (
  `GroupUserID` int(11) NOT NULL,
  `GroupID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupuser`
--

INSERT INTO `groupuser` (`GroupUserID`, `GroupID`, `UserID`) VALUES
(10, 30, 37),
(11, 30, 45),
(12, 30, 43);

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
(37, 'Masonism', 'm.foscaldi@gmail.com', 'Mason', 'Foscaldi', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Boston', 'MA', '2017-07-31 15:09:32', 1, 'No', 'At a player\'s place.', 'Sunday', 'Night', 'Wednesday', 'Anytime', 'Friday', 'Evening', NULL, 'Looking for new people to play d&d with.'),
(38, 'Schrenk212', 'schrenk212@gmail.com', 'Nick', 'Schrenk', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Boston', 'MA', '2017-07-31 15:15:36', 1, 'No Preference', 'In person, but no preference.', 'Tuesday', 'Anytime', 'Wednesday', 'Anytime', 'Thursday', 'Anytime', NULL, 'Looking to play with experienced players.'),
(39, 'Lucky', 'wongj@gmail.com', 'Jon', 'Wong', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Maple Shade', 'NJ', '2017-07-31 15:27:28', 2, 'Yes', 'In person, but no preference.', 'Sunday', 'Anytime', 'Wednesday', 'Anytime', 'Thursday', 'Evening', NULL, 'New to tabletop games.'),
(40, 'Solanth', 'murrayd@gmail.com', 'David', 'Murray', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Boston', 'MA', '2017-07-31 15:35:25', 1, 'No Preference', 'In person, but no preference.', 'Sunday', 'Night', 'Tuesday', 'Anytime', 'Friday', 'Anytime', NULL, 'Just want to play some d&d.'),
(41, 'Meowki', 'drumj@gmail.com', 'James', 'Drum', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Maple Shade', 'NJ', '2017-07-31 15:42:31', 2, 'No Preference', 'Online', 'Sunday', 'Morning', 'Monday', 'Morning', 'Tuesday', 'Morning', NULL, 'Based on my schedule looking for people to play pathfinder with early in the morning.'),
(42, 'Fumito', 'fumito@yahoo.com', 'Jeff', 'Coolio', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Boston', 'MA', '2017-07-31 18:33:30', 1, 'No Preference', 'Online', 'Sunday', 'Morning', 'Monday', 'Evening', 'Thursday', 'Night', NULL, ''),
(43, 'Han', 'han@gmail.com', 'Han', 'Solo', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Boston', 'MA', '2017-07-31 19:01:13', 1, 'No Preference', 'In person, but no preference.', 'Monday', 'Anytime', 'Tuesday', 'Anytime', 'Wednesday', 'Anytime', NULL, 'Looking to meet new people to play games with.'),
(44, 'Stelra', 'smithb@gmail.com', 'Brian', 'Smith', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'New York', 'NY', '2017-07-31 19:12:40', 1, 'No Preference', 'Online', 'Sunday', 'Afternoon', 'Monday', 'Evening', 'Friday', 'Morning', NULL, 'New to tabletop gaming.'),
(45, 'Aderos', 'albee@gmail.com', 'Albee', 'Dorkar', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Boston', 'MA', '2017-07-31 19:30:12', 1, 'No Preference', 'Online', 'Sunday', 'Night', 'Tuesday', 'Night', 'Thursday', 'Night', NULL, 'Still new to the table top gaming scene. Looking to better myself at D&D.'),
(46, 'Lia', 'liandra@gmail.com', 'Liandra', 'Cossette', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Boston', 'MA', '2017-07-31 19:38:56', 1, 'Yes', 'Online', 'Thursday', 'Anytime', 'Friday', 'Anytime', 'Saturday', 'Anytime', NULL, 'Experienced D&D player looking for others who need a healer style class.');

-- --------------------------------------------------------

--
-- Stand-in structure for view `userswithgroupusers`
-- (See below for the actual view)
--
CREATE TABLE `userswithgroupusers` (
`UserID` int(11)
,`Username` varchar(50)
,`GroupID` int(11)
,`GroupUserID` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `userswithgroupusers`
--
DROP TABLE IF EXISTS `userswithgroupusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userswithgroupusers`  AS  select `user`.`UserID` AS `UserID`,`user`.`Username` AS `Username`,`groupuser`.`GroupID` AS `GroupID`,`groupuser`.`GroupUserID` AS `GroupUserID` from (`user` left join `groupuser` on((`user`.`UserID` = `groupuser`.`UserID`))) where (`groupuser`.`GroupUserID` is not null) ;

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
-- Indexes for table `groupuser`
--
ALTER TABLE `groupuser`
  ADD PRIMARY KEY (`GroupUserID`);

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
  MODIFY `GameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `GroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `groupuser`
--
ALTER TABLE `groupuser`
  MODIFY `GroupUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
