# Theatre-Website

ShooterXGames

To run website you need to have Xampp installed

Link to xampp: [text](![image](https://github.com/AndyCode2022/Theatre-Website/assets/112827142/01727bd4-fff2-48ab-ae5b-0b389ea06af8)
)

When xampp control panel is installed you need to click start on Apache and mySQL

![alt text](image.png)

Go to explorer in xampp control panel and then when in file explorer click on the folder called htdocs

Clone the repository onto the desktop

Once in htdocs drag the cloned repository into this folder

Click on admin in xampp control panel for beside Apache

Click on threatre-website in the file directory on the browser

![alt text](image.png)

Instructions to install Database for Theatre-website

In the xampp control panel click admin beside mySQL

Once in browser click on import on the top navbar

On the desktop make a text file and copy and paste the script I have provided below

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 01:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theatre`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userno` int(5) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(128) NOT NULL,
  `isSuspended` tinyint(1) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userno`, `firstname`, `lastname`, `email`, `username`, `password`, `isSuspended`, `isAdmin`) VALUES
(23, 'Andrew', 'Webster', 'andrew.webster403@hotmail.co.uk', 'andrew2', '$2y$10$DQFXt2RKnw0dVltnrllGVOO/bQIPk.elVYl9eSlTGJ3UgJRHc5b9O', 0, 1),
(24, 'luke', 'skywalker', 'luke@gmail.com', 'luke2', '$2y$10$WUhWgTTFifE9nk7nXeJtFOFfg8HiUVUFGlOGhWhys6cq/u4qVZ8Y.', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


Save the script as theatre.sql

Go back to browser and click on browse and select the sql script

The database is now installed

<!-- references -->

registration and login
https://speedysense.com/create-registration-login-system-php-mysql/

admin
https://www.youtube.com/watch?v=wODW8RLBPt0&ab_channel=WebTechKnowledge

cookies
https://brightspace.uhi.ac.uk/d2l/le/content/310944/viewContent/2360097/View
https://www.w3schools.com/php/php_cookies.asp

Joker image
https://www.pxfuel.com/en/free-photo-oxovt
