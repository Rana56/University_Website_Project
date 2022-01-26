-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2021 at 06:47 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u_200143073_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingID`, `userID`, `eventID`) VALUES
(3, 14, 1),
(4, 14, 2),
(5, 4, 1),
(6, 15, 2),
(7, 15, 3),
(11, 5, 3),
(12, 5, 5),
(21, 4, 3),
(22, 2, 4),
(23, 2, 5),
(24, 5, 7),
(27, 10, 2),
(28, 10, 7),
(29, 37, 1),
(31, 39, 3);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(11) NOT NULL,
  `typeID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `time` time NOT NULL,
  `organiser` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `dates` date NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `typeID`, `name`, `description`, `time`, `organiser`, `venue`, `contact`, `image`, `dates`, `likes`) VALUES
(1, 1, 'Football', 'This event consists of 5, 7 and 11-a-side football games. We have exciting challenges and a tournament-style set-up. With the winner and runner-ups able to win some prizes! \r\n\r\nAre you not feeling too competitive? Don\'t worry. We\'ve also got a casual kick-about session so that you won\'t be missing out. So get your boots on and join the event, and don\'t forget to have fun!', '12:30:00', 'Aston Football Club', 'Astro Turf', 'afc@aston.ac.uk', 'football.jpg', '2021-04-20', 56),
(2, 2, 'Art Exhibition', 'Exclusive art from the world-renowned artist, Banksy, is now being displayed in our exhibition and is definitely a must-see activity at this Aston Festival.\r\nFrom sculptures to portraits, we have lots of beautiful arts that will definitely pique your interest, so come down and have a look.', '09:00:00', 'Art Club', 'Hall A', 'aston_art@aston.ac.uk', 'exhibition.jpg', '2021-04-19', 20),
(3, 3, 'TED Talk with Elon Musk', 'This TED talk features a special guest, Elon Musk, to talk about the future of technologies, business and the environment. Hear about Elon Musk\'s vision for the future and how he and his companies are working towards achieving it, from landing the first humans on Mars, cutting edge technologies being tested for SpaceX rockets to electric, self-driving cars.', '16:00:00', 'Aston School of Engineering and Applied Sciences', 'Conference Centre', 'eas_reception@aston.ac.uk', 'elon.jpg', '2021-04-20', 51),
(4, 2, 'Romeo & Juliet', 'A theatrical performance of the famous Romeo & Juliet written by William Shakespeare. A tragedy of two young Italian star-crossed lovers whose deaths ultimately reconcile their feuding families. This event is definitely one not to be missed, so don\'t forget to join!', '15:30:00', 'Drama Club', 'Hall B', 'aston_drama@aston.ac.uk', 'theatre.jpg', '2021-04-21', 11),
(5, 1, 'Tennis', 'Play some tennis with your friends.', '11:00:00', 'Aston Tennis club', 'Tennis courts', 'aston_tennis@aston.ac.uk', 'tennis.jpg', '2021-04-23', 13),
(6, 3, 'Live Music', 'Come listen to some live music.', '12:00:00', 'Music Club', 'Outside Student Union', 'aston_music@aston.ac.uk', 'guitar.jpg', '2021-04-21', 9),
(7, 1, 'Mixed Martial Arts tournament', 'Come and watch an exciting and thrilling mixed martial arts tournament where fighters will be competing with each other for the first place spot, sponsored by the Heavens Arena. Joined by talented fighters Gon and Killua, it will indeed be a spectacular show.', '10:00:00', 'MMA club', 'Indoor Gymnasium 1', 'mma@aston.ac.uk', 'fight.jpg', '2021-04-22', 21);

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `typeID` int(11) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`typeID`, `type`) VALUES
(1, 'sport'),
(2, 'culture'),
(3, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`) VALUES
(2, 'chirag@aston.ac.uk', '$2y$10$ttql8dD8jZGPYJWqG.OZ7uDzE4bR0GAsCQ6HLvzfPNe61XMDYfCLW', 'Chirag', 'Rana'),
(3, 'test@aston.ac.uk', '$2y$10$7HV0T.FqQinYfoDRVlp7kOO/yrJR3Lrv6dtqd.PV1lNjrX5ulGGFi', 'test', 'data'),
(4, 'bob@aston.ac.uk', '$2y$10$RelVKgXuq3xMPSq9I0ICZe/o4RrTSZJNxFeo8MPPQIFRLhGeCtyzq', 'bob', 'marley'),
(5, 'alice@aston.ac.uk', '$2y$10$7mZtQm0GFH1z3mJB6SknwOWST4eoWbWMblTeZRJW2dqLg/fzTDOCC', 'test', 'qwe'),
(6, '1@aston.ac.uk', '$2y$10$H8MyHu2FuEFU8qdCYfdbWOkM0SZY3LrYayM8R.jIiuAhI9qIR2IOa', 'qwe', 'qwe'),
(7, 'what@aston.ac.uk', '$2y$10$O5IzYp6Jc5ASuaJL2aGR2u.Cd6pIIMPBMxRWMBZgmeurzSZrCK3GW', 'asd', 'asd'),
(10, 'a@aston.ac.uk', '$2y$10$t/JkN24DezSPp5ZiT.KLN.KjWN6JhvIE4uLHW8rc7kWouPYgoNyHW', 'a', 'a'),
(13, 'qwe@aston.ac.uk', '$2y$10$RoLUki8t0OxEo1s/TN7R5.7Ie8CYnwftMlFW93YwvZAsvMBDtEdZa', 'qw', 'qw'),
(14, 'c@aston.ac.uk', '$2y$10$qzaKhJZGfuRrbTT2W13xAudHKwmkMy7m/HVi69wPvQckoCawrUkKS', 's', 's'),
(15, 'am@aston.ac.uk', '$2y$10$B3hAyYuQXxmOy4xI6CEOMeLXMZGV3R/iloFQakGVKD.QgXdQphuk2', 'ambika', 'rana'),
(16, 'as@aston.ac.uk', '$2y$10$NpJXncSUbGdtBxuoBXeyqecCxrsF2PW0pyIIUf7H3eyBEk.bZJT7K', 'awsd', 'qwe'),
(22, 'pop@aston.ac.uk', '$2y$10$ShHuoQZDY4W1WAa6uUg/ZOfQS.J4JUuY7KHaJyZHhzqiIWJnhEhm.', 'qwer', 'asdf'),
(32, 'assdfas@aston.ac.uk', '$2y$10$cz44MieFUhIqHtuQoB.LceaMhPAuNad7oiopJrxif1tPRJKhHbChK', 'as', 'g'),
(33, 'bb@aston.ac.uk', '$2y$10$.B2jq4amZ6MN1FGkdty8Bep08XhVJFPu8tCMzjirdDiqKlKqI7jZ6', 'wo', 'd'),
(34, 'gf@aston.ac.uk', '$2y$10$vna9TqOqUuxFxRg/KP4RU.zljVOAqNy2mPyv0z2WU/QCjtp0iUc/O', 'gf', 'gf'),
(35, 'ok@aston.ac.uk', '$2y$10$X/u0jn7gC49x90.IrYQvHOxXIyDOe/nx0RDKuXIpacx15SkkY/yWq', '11', '11'),
(36, 'mm@aston.ac.uk', '$2y$10$dvIFVTn7Edq8cAQontKroOoQ9u9aAR4rw1wJ/oSa0LMEbHdPrKwim', 'ew', 'test'),
(37, 'smoke@aston.ac.uk', '$2y$10$H5.rKh4moL4bFBbDkujjpuX92gR0MZEe58atIoeb.G5vqSV790Cy.', 'woo', 'pop'),
(38, 'ranab2@aston.ac.uk', '$2y$10$tPqxXd3eNr9MVauqWGdaj.nAplE6oI7E.4eXxIe3Al2VO0uIyS1qO', 'totoro', 'ghibli'),
(39, 'tester@aston.ac.uk', '$2y$10$s1yoYa0jO3V.xbjmQvFddutbzztD40HA.RGiTkaqFDqRsAR5TzNBi', 'damn', 'what');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `eventID` (`eventID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `typeID` (`typeID`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `event_type` (`typeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
