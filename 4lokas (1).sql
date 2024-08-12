-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2024 a las 00:59:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `4lokas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(13, 'cazaresordonwg12@gmail.com', '8ebf7f2b9b2b5ee78740953cd106ed138d9e9e057b871b89770b308b4ab19137dbd210388ce02b4b8da42d9762e53fb0c45d', '2024-08-09 03:56:19'),
(14, '21045179@alumno.utc.edu.mx', '1ed51bab629fb46fde4ff0aa5a3ac456621f4eefda6e6bc4c72f00eb5c6c0ab95c59c533a497c39ee065f4da487ab6835d4c', '2024-08-09 04:01:42'),
(15, '21045140@alumno.utc.edu.mx', '49bee68715590cfa0e8b3df09175243a56401977dfdeab91325d15a4b0fe38a1f9ba9bf67780696c1e6a0e46545abff0711f', '2024-08-12 19:07:09'),
(16, 'romeropaola2712@gmail.com', '4c5e90c24f4344806e3658bebe40035ee72d2e59d82f72e350954704960962204a74b53868755c0a2b23a762a9e66fb6e3ce', '2024-08-12 19:10:52'),
(17, 'romeropaola2712@gmail.com', '231303692e9e0b8876250e46463ad2de3e7c91ef7252de42e81a77ff73a6a6b1258ec2e0fef123cd749da5b20ba0cf96918e', '2024-08-12 19:12:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `sessionToken` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `password` varchar(40) NOT NULL,
  `dateRegistrer` date NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `email`, `name`, `lastname`, `phone`, `password`, `dateRegistrer`, `role`, `active`) VALUES
(2, '21045179@alumno.utc.edu.mx', 'Litzzy mirelitaa', 'cazares lol', '8445654998', '$2y$10$SCLjnKUwcLNtI5I8vNMvIuJ1kjDTyGAKI', '0000-00-00', 'user', 1),
(3, 'mireleslitzzy.06@gmail.com', 'Mitch', 'cazares', '8443104431', 'mitch12', '2024-08-08', 'admin', 1),
(6, 'cazaresordonwg12@gmail.com', 'GERSONSITO', 'cazares', '8446654524', '123456', '2024-08-08', 'user', 1),
(7, '21045140@alumno.utc.edu.mx', 'Paola ', 'Romero', '8445035039', '123456789', '2024-08-12', 'user', 1),
(8, '21045140@alumno.utc.edu.mx', 'Paola Nataly', 'Romero Montes', '8445035039', '123456789', '2024-08-12', 'user', 1),
(9, 'romeropaola2712@gmail.com', 'Nataly ', 'Romero', '8445035039', '123456789', '2024-08-12', 'user', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sessionToken` (`sessionToken`),
  ADD KEY `userId` (`userId`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
