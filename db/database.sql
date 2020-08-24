-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 24, 2020 at 11:03 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `rules_20`
--

-- --------------------------------------------------------

--
-- Table structure for table `symtoms`
--

CREATE TABLE `symtoms` (
  `id` int(11) NOT NULL,
  `symtom_1` varchar(20) NOT NULL,
  `symtom_2` varchar(20) NOT NULL,
  `symtom_3` varchar(20) NOT NULL,
  `symtom_4` varchar(20) NOT NULL,
  `symtom_5` varchar(20) NOT NULL,
  `symtom_6` varchar(20) NOT NULL,
  `symtom_7` varchar(20) NOT NULL,
  `symtom_8` varchar(20) NOT NULL,
  `symtom_9` varchar(20) NOT NULL,
  `symtom_10` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `symtoms`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(40) NOT NULL,
  `computer_use_time` varchar(20) NOT NULL,
  `profession` varchar(200) NOT NULL,
  `eye_problem` enum('Yes','No','Maybe') NOT NULL DEFAULT 'No',
  `notify_type` enum('Audio','Push notification','Both') DEFAULT NULL,
  `notify_time` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

--
-- Indexes for table `symtoms`
--
ALTER TABLE `symtoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mac_address` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `symtoms`
--
ALTER TABLE `symtoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
