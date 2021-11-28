-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 06:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nails_room`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`` PROCEDURE `insert_user` (`id_usuario` BIGINT(15), `contrasena_user` VARCHAR(20), `id_rol` INT(3))  BEGIN
	INSERT INTO usuarios(id_usuario,contrasena_user,id_rol)
    VALUES(id_usuario,contrasena_user,id_rol);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(7) NOT NULL,
  `fecha_cita` date DEFAULT NULL,
  `hora_cita` time DEFAULT NULL,
  `id_servicio` int(3) DEFAULT NULL,
  `id_cliente` int(15) DEFAULT NULL,
  `id_empleado` int(15) DEFAULT NULL,
  `cantidad_servicio` int(3) DEFAULT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citas`
--

INSERT INTO `citas` (`id_cita`, `fecha_cita`, `hora_cita`, `id_servicio`, `id_cliente`, `id_empleado`, `cantidad_servicio`, `total`) VALUES
(1, '2021-11-29', '12:00:00', 1, 1, 3, 1, 12000),
(2, '2021-11-29', '09:00:00', 2, 2, 4, 1, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(15) NOT NULL,
  `documento_cliente` bigint(15) NOT NULL,
  `nombre_cliente` varchar(30) NOT NULL,
  `telefono_cliente` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `documento_cliente`, `nombre_cliente`, `telefono_cliente`) VALUES
(1, 192837465, 'Pamela Gutierrez', '3182938746'),
(2, 1837484757, 'Andrea Guzman', '3172837263');

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(15) NOT NULL,
  `documento_empleado` bigint(15) NOT NULL,
  `nombre_empleado` varchar(30) NOT NULL,
  `telefono_empleado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `documento_empleado`, `nombre_empleado`, `telefono_empleado`) VALUES
(1, 1086774087, 'Santiago Moran', '3127487777'),
(2, 1000761509, 'Juan Jose Ospina', '3156374746'),
(3, 1876637473, 'Yeniffer Almanza', '3189762723'),
(4, 1293382823, 'Pamela Gutierrez', '3112736252'),
(5, 1827362636, 'Manuela Gonzalez', '3193827364');

-- --------------------------------------------------------

--
-- Table structure for table `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(12) NOT NULL,
  `imagen` longblob NOT NULL,
  `id_usuario` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'administrador'),
(2, 'empleado'),
(3, 'cliente');

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(3) NOT NULL,
  `nombre_servicio` varchar(30) NOT NULL,
  `precio_servicio` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nombre_servicio`, `precio_servicio`) VALUES
(1, 'manicure', 12000),
(2, 'pedicure', 12000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `showstatsc`
-- (See below for the actual view)
--
CREATE TABLE `showstatsc` (
`total_clientes` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `showstatscitas`
-- (See below for the actual view)
--
CREATE TABLE `showstatscitas` (
`total_citas` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `showstatse`
-- (See below for the actual view)
--
CREATE TABLE `showstatse` (
`total_empleados` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(15) NOT NULL,
  `contrasena_user` varchar(20) NOT NULL,
  `id_rol` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `contrasena_user`, `id_rol`) VALUES
(123, 'as', 1),
(192837465, 'ABC123', 3),
(1000761509, 'juan123', 1),
(1086774087, 'santi123', 1),
(1293382823, 'ABC123', 2),
(1827362636, 'ABC123', 2),
(1837484757, 'ABC123', 3),
(1876637473, 'ABC123', 2);

-- --------------------------------------------------------

--
-- Structure for view `showstatsc`
--
DROP TABLE IF EXISTS `showstatsc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `showstatsc`  AS SELECT count(0) AS `total_clientes` FROM `clientes` ;

-- --------------------------------------------------------

--
-- Structure for view `showstatscitas`
--
DROP TABLE IF EXISTS `showstatscitas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `showstatscitas`  AS SELECT count(0) AS `total_citas` FROM `citas` ;

-- --------------------------------------------------------

--
-- Structure for view `showstatse`
--
DROP TABLE IF EXISTS `showstatse`;

CREATE ALGORITHM=UNDEFINED DEFINER=`` SQL SECURITY DEFINER VIEW `showstatse`  AS SELECT count(0) AS `total_empleados` FROM `empleados` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `documento_cliente` (`documento_cliente`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `documento_empleado` (`documento_empleado`);

--
-- Indexes for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`);

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`documento_cliente`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`documento_empleado`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
