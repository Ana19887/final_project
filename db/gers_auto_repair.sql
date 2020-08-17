-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2020 at 10:20 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gers_auto_repair`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bkg_id` int(11) NOT NULL,
  `bkg_USERS_usr_id` int(11) NOT NULL,
  `bkg_VEHICLES_veh_id` int(11) NOT NULL,
  `bkg_SERVICE_TYPE_srv_id` int(11) NOT NULL,
  `bkg_MECHANICS_mch_id` int(11) DEFAULT NULL,
  `bkg_date` datetime NOT NULL,
  `bkg_commentary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bkg_STATUS_sta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings_extra_parts`
--

CREATE TABLE `bookings_extra_parts` (
  `bep_id` int(11) NOT NULL,
  `bep_BOOKINGS_bkg_id` int(11) NOT NULL,
  `bep_EXTRA_PARTS_exp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extra_parts`
--

CREATE TABLE `extra_parts` (
  `exp_id` int(11) NOT NULL,
  `exp_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_price` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extra_parts`
--

INSERT INTO `extra_parts` (`exp_id`, `exp_name`, `exp_price`) VALUES
(1, 'AC CONDENSOR', '26.00'),
(2, 'AC COMPRESSOR', '32.99'),
(3, 'AC EVAPORATOR', '21.00'),
(4, 'ACCELERATOR PEDAL', '13.00'),
(5, 'AIR BAG', '42.99'),
(6, 'AIR CLEANER', '8.99'),
(7, 'AIR FILTER', '1.99'),
(8, 'ALTERNATOR', '22.00'),
(9, 'ANTI FREEZE', '3.00'),
(10, 'BATTERY', '35.00'),
(11, 'BRACKET (ENGINE)', '6.99'),
(12, 'BRAKE FLUID RESERVOIR', '5.99'),
(13, 'BRAKE PEDAL', '12.99'),
(14, 'BUMPER COVER', '29.99'),
(15, 'CABLES', '6.99'),
(16, 'CARBURETOR', '26.99'),
(17, 'CARPET (PER SECTION)', '15.99'),
(18, 'CLUTCH DISC', '9.99'),
(19, 'COIL STANDARD', '26.99'),
(20, 'CYLINDER HEAD', '70.00'),
(21, 'DISTRIBUTOR', '22.99'),
(22, 'DOOR LATCH', '7.99'),
(23, 'ENGINE (ALL)', '191.99'),
(24, 'EXHAUST PIPE', '5.99'),
(25, 'FAN CLUTCH', '10.99'),
(26, 'FLOOR MATS', '2.99'),
(27, 'FOG LAMP', '10.99'),
(28, 'FUEL DISTRIBUTOR', '26.99'),
(29, 'FUEL INJECTOR (EACH)', '5.99'),
(30, 'FUSE BOX', '11.99'),
(31, 'GLASS-DOOR', '21.99'),
(32, 'GLASS-SIDE (VAN)', '21.99'),
(33, 'GRILLE INSERT', '7.99'),
(34, 'HARMONIC BALANCER', '14.99'),
(35, 'HEAD LAMP HALOGEN', '2.99'),
(36, 'HEADLINER', '10.99'),
(37, 'HEATER CONTROL ', '21.99'),
(38, 'HEATER CONTROL ', '21.99'),
(39, 'HEATER VENT ', '1.99'),
(40, 'HYBRID BATTERY', '500.00'),
(41, 'IGNITION SWITCH', '10.99'),
(42, 'JUMPER CABLES', '6.99'),
(43, 'LIGHT BAR', '34.99'),
(44, 'MASS AIR FLOW SENSOR', '32.99'),
(45, 'MIRROR BACK', '4.99'),
(46, 'MIRROR-OUTSIDE', '9.99'),
(47, 'OIL PUMP', '7.99'),
(48, 'OIL COOLER', '11.99'),
(49, 'OXYGEN SENSOR', '8.99'),
(50, 'PISTON (EACH)', '6.99'),
(51, 'POWER STEERING PUMP', '16.99'),
(52, 'PROJECTOR LAMP/BULB', '13.99'),
(53, 'PULLEY', '6.99'),
(54, 'RADIATOR (ALUMINUM)', '40.00'),
(55, 'RADIATOR (BRASS)', '55.00'),
(56, 'RADIATOR FAN MOTOR', '16.99'),
(57, 'RAINGAURD (EACH)', '4.99'),
(58, 'SEAT - BENCH', '13.99'),
(59, 'SEAT - COVER', '2.99'),
(60, 'SEAT BELT (PER PERSON)', '10.99'),
(61, 'SHOCK ABSORBER', '6.99'),
(62, 'SMOG PUMP', '14.99'),
(63, 'SPEEDOMETER-REGULAR', '13.99'),
(64, 'STEERING GEAR - ELECTRIC', '39.99'),
(65, 'STEERING WHEEL', '12.99'),
(66, 'SUSPENSION AIR BAG', '15.99'),
(67, 'TACHOMETER', '8.99'),
(68, 'TIRE (15 INCH AND SMALLER)', '23.99'),
(69, 'TIRE (16 INCH AND LARGER)', '30.99'),
(70, 'TRANSMISSION', '164.99'),
(71, 'TURN SIGNAL SWITCH', '9.99'),
(72, 'WATER PUMP', '8.99'),
(73, 'WHEEL - ALUMINUM', '21.99'),
(74, 'WHEEL CENTER CAP', '3.99'),
(75, 'WINDOW REGULATOR', '11.99');

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `mch_id` int(11) NOT NULL,
  `mch_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mechanics`
--

INSERT INTO `mechanics` (`mch_id`, `mch_name`) VALUES
(1, 'Ger Jones'),
(2, 'Conor Hogan'),
(3, 'Jonh Ryan'),
(4, 'Ian Byrne'),
(5, 'Shane Scully');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `srv_id` int(11) NOT NULL,
  `srv_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `srv_price` decimal(5,2) NOT NULL,
  `srv_photo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`srv_id`, `srv_name`, `srv_price`, `srv_photo`) VALUES
(1, 'Interim', '200.00', '1'),
(2, 'Annual', '290.00', '2'),
(3, 'Major', '340.00', '3'),
(4, 'Repair', '50.00', '4');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `sta_id` int(11) NOT NULL,
  `sta_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`sta_id`, `sta_name`) VALUES
(1, 'Booked'),
(2, 'In Service'),
(3, 'Unrepairable'),
(4, 'Finished'),
(5, 'For Collection');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` int(11) NOT NULL,
  `usr_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_surname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_password` varchar(196) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usr_level` char(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_name`, `usr_surname`, `usr_phone`, `usr_username`, `usr_password`, `usr_level`) VALUES
(1, 'Ger', 'Jones', '(89) 037-9876', 'admin', '$2y$10$JvT6Y0Y/8Ze7SEuvmKpAL.XaXUfzYqPmwDAOSwi3gQQcQX3g6dwSO', '2'),
(2, 'Ana', 'Oliveira', '(83) 037-1234', 'ana', '$2y$10$cAy3.wA4m10gZUFkBXCkt.E9jWgGauj/YYTNgUx0FS00I.OEAQ60y', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `veh_id` int(11) NOT NULL,
  `veh_USERS_usr_id` int(11) NOT NULL,
  `veh_type` int(11) NOT NULL,
  `veh_model` int(11) NOT NULL,
  `veh_engine_type` int(11) NOT NULL,
  `veh_license_details` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_brand`
--

CREATE TABLE `vehicle_brand` (
  `vbd_id` int(11) NOT NULL,
  `vbd_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_brand`
--

INSERT INTO `vehicle_brand` (`vbd_id`, `vbd_name`) VALUES
(1, 'Toyota'),
(2, 'Honda'),
(3, 'Volkswagen'),
(4, 'Renault'),
(5, 'Mercedez-Bens'),
(6, 'Yamaha'),
(7, 'Fiat'),
(8, 'BMW'),
(9, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_engine_type`
--

CREATE TABLE `vehicle_engine_type` (
  `vet_id` int(11) NOT NULL,
  `vet_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_engine_type`
--

INSERT INTO `vehicle_engine_type` (`vet_id`, `vet_name`) VALUES
(1, 'Diesel'),
(2, 'Petrol'),
(3, 'Hybrid'),
(4, 'Electric');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_model`
--

CREATE TABLE `vehicle_model` (
  `vmd_id` int(11) NOT NULL,
  `vmd_V_BRAND_vbd_id` int(11) NOT NULL,
  `vmd_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_model`
--

INSERT INTO `vehicle_model` (`vmd_id`, `vmd_V_BRAND_vbd_id`, `vmd_name`) VALUES
(1, 1, 'Corolla'),
(2, 1, 'Prius'),
(3, 1, 'Avalon'),
(4, 1, 'Yaris'),
(5, 1, 'RAV4'),
(6, 1, '4Runner'),
(7, 2, 'VFR'),
(8, 2, 'CBR'),
(9, 2, 'Gold Wing'),
(10, 2, 'CB'),
(11, 2, 'Super Club'),
(12, 3, 'Golf'),
(13, 3, 'up!'),
(14, 3, 'Polo'),
(15, 3, 'Beetle'),
(16, 3, 'Scirocco'),
(17, 3, 'Jetta'),
(18, 3, 'Tiguan'),
(19, 4, 'Kangoo'),
(20, 4, 'Trafic'),
(21, 4, 'Master'),
(22, 5, 'Vito'),
(23, 5, 'Sprinter'),
(24, 6, 'YS125'),
(25, 6, 'XRS900'),
(26, 6, 'XRS700'),
(27, 7, '500'),
(28, 7, '500X'),
(29, 7, '500C'),
(30, 7, '500L'),
(31, 7, 'Panda'),
(32, 7, 'Tipo'),
(33, 8, 'Serie Coupe'),
(34, 8, 'Serie Active Tourer'),
(35, 8, 'Serie Gran Tourer'),
(36, 9, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `vtp_id` int(11) NOT NULL,
  `vtp_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`vtp_id`, `vtp_name`) VALUES
(1, 'Car'),
(2, 'Motorbike'),
(3, 'Small Van'),
(4, 'Small Bus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bkg_id`),
  ADD KEY `bkg_SERVICE_TYPE_srv_id` (`bkg_SERVICE_TYPE_srv_id`),
  ADD KEY `bkg_STATUS_sta_id` (`bkg_STATUS_sta_id`),
  ADD KEY `bkg_USERS_usr_id` (`bkg_USERS_usr_id`),
  ADD KEY `bkg_VEHICLES_veh_id` (`bkg_VEHICLES_veh_id`),
  ADD KEY `bkg_MECHANICS_mch_id` (`bkg_MECHANICS_mch_id`);

--
-- Indexes for table `bookings_extra_parts`
--
ALTER TABLE `bookings_extra_parts`
  ADD PRIMARY KEY (`bep_id`),
  ADD KEY `bep_BOOKINGS_bkg_id` (`bep_BOOKINGS_bkg_id`),
  ADD KEY `bep_EXTRA_PARTS_exp_id` (`bep_EXTRA_PARTS_exp_id`);

--
-- Indexes for table `extra_parts`
--
ALTER TABLE `extra_parts`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD PRIMARY KEY (`mch_id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`srv_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`sta_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `usr_username` (`usr_username`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`veh_id`),
  ADD KEY `veh_USERS_usr_id` (`veh_USERS_usr_id`),
  ADD KEY `veh_engine_type` (`veh_engine_type`),
  ADD KEY `veh_type` (`veh_type`),
  ADD KEY `veh_model` (`veh_model`);

--
-- Indexes for table `vehicle_brand`
--
ALTER TABLE `vehicle_brand`
  ADD PRIMARY KEY (`vbd_id`);

--
-- Indexes for table `vehicle_engine_type`
--
ALTER TABLE `vehicle_engine_type`
  ADD PRIMARY KEY (`vet_id`);

--
-- Indexes for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  ADD PRIMARY KEY (`vmd_id`),
  ADD KEY `vmd_V_BRAND_vbd_id` (`vmd_V_BRAND_vbd_id`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`vtp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bkg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings_extra_parts`
--
ALTER TABLE `bookings_extra_parts`
  MODIFY `bep_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extra_parts`
--
ALTER TABLE `extra_parts`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `mch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `srv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `sta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `veh_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_brand`
--
ALTER TABLE `vehicle_brand`
  MODIFY `vbd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicle_engine_type`
--
ALTER TABLE `vehicle_engine_type`
  MODIFY `vet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  MODIFY `vmd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `vtp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`bkg_SERVICE_TYPE_srv_id`) REFERENCES `service_type` (`srv_id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`bkg_STATUS_sta_id`) REFERENCES `status` (`sta_id`),
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`bkg_USERS_usr_id`) REFERENCES `users` (`usr_id`),
  ADD CONSTRAINT `bookings_ibfk_5` FOREIGN KEY (`bkg_VEHICLES_veh_id`) REFERENCES `vehicles` (`veh_id`),
  ADD CONSTRAINT `bookings_ibfk_6` FOREIGN KEY (`bkg_MECHANICS_mch_id`) REFERENCES `mechanics` (`mch_id`);

--
-- Constraints for table `bookings_extra_parts`
--
ALTER TABLE `bookings_extra_parts`
  ADD CONSTRAINT `bookings_extra_parts_ibfk_1` FOREIGN KEY (`bep_BOOKINGS_bkg_id`) REFERENCES `bookings` (`bkg_id`),
  ADD CONSTRAINT `bookings_extra_parts_ibfk_2` FOREIGN KEY (`bep_EXTRA_PARTS_exp_id`) REFERENCES `extra_parts` (`exp_id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`veh_USERS_usr_id`) REFERENCES `users` (`usr_id`),
  ADD CONSTRAINT `vehicles_ibfk_2` FOREIGN KEY (`veh_engine_type`) REFERENCES `vehicle_engine_type` (`vet_id`),
  ADD CONSTRAINT `vehicles_ibfk_3` FOREIGN KEY (`veh_type`) REFERENCES `vehicle_type` (`vtp_id`),
  ADD CONSTRAINT `vehicles_ibfk_4` FOREIGN KEY (`veh_model`) REFERENCES `vehicle_model` (`vmd_id`);

--
-- Constraints for table `vehicle_model`
--
ALTER TABLE `vehicle_model`
  ADD CONSTRAINT `vehicle_model_ibfk_1` FOREIGN KEY (`vmd_V_BRAND_vbd_id`) REFERENCES `vehicle_brand` (`vbd_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
