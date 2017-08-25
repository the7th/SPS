-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 25, 2017 at 05:05 AM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sa2`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `FormID` int(11) NOT NULL,
  `ClassName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`FormID`, `ClassName`) VALUES
  (1, '4 Suria');

-- --------------------------------------------------------

--
-- Table structure for table `markah`
--

CREATE TABLE `markah` (
  `marksID` int(11) NOT NULL,
  `subjekID` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `grade` text NOT NULL,
  `teacherComment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `FormID` int(11) NOT NULL,
  `Score` int(11) DEFAULT NULL,
  `Grade` text,
  `subjekID` int(11) DEFAULT NULL,
  `teacherComment` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `StudentID`, `FormID`, `Score`, `Grade`, `subjekID`, `teacherComment`) VALUES
  (1, 2, 1, 56, 'C', 1, '<p>ccc aaa</p>'),
  (2, 1, 1, 77, 'B+', 1, '<p>ini markah dia</p>\r\n<p>&nbsp;</p>\r\n<p><strong>teruk benaw!</strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `parentforstudent`
--

CREATE TABLE `parentforstudent` (
  `id` int(11) NOT NULL,
  `username` text,
  `studentID` int(11) DEFAULT NULL,
  `digitallysigned` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parentforstudent`
--

INSERT INTO `parentforstudent` (`id`, `username`, `studentID`, `digitallysigned`) VALUES
  (1, 'lima', 1, 'signed');

-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE `sitesettings` (
  `sitesettings_id` int(11) NOT NULL,
  `enable_access` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitesettings`
--

INSERT INTO `sitesettings` (`sitesettings_id`, `enable_access`) VALUES
  (1, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `StudentName` text NOT NULL,
  `FormID` int(11) DEFAULT NULL,
  `IC` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `StudentName`, `FormID`, `IC`) VALUES
  (1, 'abd rahman', 1, '111111-11-1111'),
  (2, 'Abdul', 1, '901209-14-6181'),
  (3, 'mashitah', 1, '9201401341'),
  (4, 'hello', 1, '91221144');

-- --------------------------------------------------------

--
-- Table structure for table `subjek`
--

CREATE TABLE `subjek` (
  `subjekID` int(11) NOT NULL,
  `subjekName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjek`
--

INSERT INTO `subjek` (`subjekID`, `subjekName`) VALUES
  (1, 'Sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  `full_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `full_name`) VALUES
  (1, 'parent', 'parent', 'parent', 'Joe Jambul'),
  (2, 'teacher', 'teacher', 'teacher', 'Ali'),
  (3, 'headmaster', 'headmaster', 'headmaster', 'Abu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`FormID`);

--
-- Indexes for table `markah`
--
ALTER TABLE `markah`
  ADD PRIMARY KEY (`marksID`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parentforstudent`
--
ALTER TABLE `parentforstudent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesettings`
--
ALTER TABLE `sitesettings`
  ADD PRIMARY KEY (`sitesettings_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `subjek`
--
ALTER TABLE `subjek`
  ADD PRIMARY KEY (`subjekID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `FormID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `markah`
--
ALTER TABLE `markah`
  MODIFY `marksID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `parentforstudent`
--
ALTER TABLE `parentforstudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sitesettings`
--
ALTER TABLE `sitesettings`
  MODIFY `sitesettings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subjek`
--
ALTER TABLE `subjek`
  MODIFY `subjekID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;