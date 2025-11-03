-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 03-11-2025 a las 16:39:43
-- Versión del servidor: 8.0.43
-- Versión de PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity`
--
DROP TABLE IF EXISTS 'activity'
CREATE TABLE `activity` (
  `id_activity` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `activity_day` datetime NOT NULL,
  `duration` decimal(10,0) NOT NULL,
  `available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `activity`
--

INSERT INTO `activity` (`id_activity`, `name`, `description`, `activity_day`, `duration`, `available`) VALUES
(1, 'Yoga', 'Sesión de relajación y estiramientos.', '2025-01-10 10:00:00', 2, 1),
(2, 'Spinning', 'Entrenamiento de alta intensidad en bicicleta.', '2025-01-11 18:00:00', 1, 1),
(3, 'CrossFit', 'Rutina de fuerza y resistencia.', '2025-01-12 19:00:00', 1, 1),
(4, 'Pilates', 'Fortalecimiento del core y mejora de la postura.', '2025-01-13 09:00:00', 1, 1),
(5, 'Zumba', 'Clase de baile y cardio con ritmo latino.', '2025-01-14 17:00:00', 1, 1),
(6, 'Boxeo', 'Entrenamiento de técnica y resistencia física.', '2025-01-15 20:00:00', 2, 1),
(7, 'Body Pump', 'Sesión de levantamiento de pesas con música.', '2025-01-16 19:30:00', 1, 1),
(8, 'Natación', 'Entrenamiento en piscina climatizada.', '2025-01-17 08:30:00', 1, 1),
(9, 'Cardio HIIT', 'Entrenamiento por intervalos de alta intensidad.', '2025-01-18 18:30:00', 1, 1),
(10, 'Funcional', 'Sesión de ejercicios de cuerpo completo.', '2025-01-19 10:30:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assessment`
--
DROP TABLE IF EXISTS 'assessment'
CREATE TABLE `assessment` (
  `id_assessment` int NOT NULL,
  `id_reservation` int NOT NULL,
  `punctuation` enum('excellent','good','average','poor') NOT NULL,
  `comment` text NOT NULL,
  `shipping_date` datetime NOT NULL,
  `checked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `assessment`
--

INSERT INTO `assessment` (`id_assessment`, `id_reservation`, `punctuation`, `comment`, `shipping_date`, `checked`) VALUES
(1, 1, 'excellent', 'Instructor muy atento.', '2025-01-10 11:00:00', 1),
(2, 2, 'good', 'Clase tranquila y relajante.', '2025-01-10 10:30:00', 1),
(3, 3, 'average', 'Demasiado intensa para principiantes.', '2025-01-11 20:00:00', 1),
(4, 4, 'excellent', 'Muy buena organización.', '2025-01-12 21:00:00', 1),
(5, 5, 'poor', 'No asistió por cancelación.', '2025-01-13 08:00:00', 0),
(6, 6, 'good', 'Clase completa y bien explicada.', '2025-01-14 21:00:00', 1),
(7, 7, 'average', 'Buena sesión, aunque un poco larga.', '2025-01-15 22:00:00', 1),
(8, 8, 'excellent', 'Muy divertida y con buena música.', '2025-01-16 18:00:00', 1),
(9, 9, 'good', 'Entrenamiento eficaz.', '2025-01-17 19:30:00', 1),
(10, 10, 'excellent', 'Piscina limpia y monitor excelente.', '2025-01-18 09:30:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--
DROP TABLE IF EXISTS 'reservation'
CREATE TABLE `reservation` (
  `id_reservation` int NOT NULL,
  `id_user` int NOT NULL,
  `id_activity` int NOT NULL,
  `reservation_date` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `id_user`, `id_activity`, `reservation_date`, `is_active`, `comment`) VALUES
(1, 1, 1, '2025-01-09 09:00:00', 1, 'Primera clase de yoga del año.'),
(2, 2, 4, '2025-01-10 08:45:00', 1, 'Confirmada asistencia.'),
(3, 3, 2, '2025-01-10 17:30:00', 1, 'Segunda reserva en spinning.'),
(4, 4, 3, '2025-01-11 18:30:00', 1, 'Clase de CrossFit con grupo avanzado.'),
(5, 5, 10, '2025-01-12 09:30:00', 0, 'Cancelada por lesión leve.'),
(6, 6, 7, '2025-01-13 19:15:00', 1, 'Participa con su grupo habitual.'),
(7, 7, 6, '2025-01-14 19:45:00', 1, 'Clase de prueba.'),
(8, 8, 5, '2025-01-15 16:45:00', 1, 'Primera vez en Zumba.'),
(9, 9, 9, '2025-01-16 18:15:00', 1, 'Entrenamiento de alta intensidad.'),
(10, 10, 8, '2025-01-17 08:00:00', 1, 'Sesión matutina de natación.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--
DROP TABLE IF EXISTS 'user'
CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `registration_date` date NOT NULL,
  `age` int NOT NULL,
  `vip` tinyint(1) NOT NULL,
  `observation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `registration_date`, `age`, `vip`, `observation`) VALUES
(1, 'Carlos Pérez', 'carlos.perez@example.com', '2024-03-15', 29, 1, 'Asiste regularmente al gimnasio.'),
(2, 'María López', 'maria.lopez@example.com', '2024-04-02', 34, 0, 'Prefiere clases de yoga.'),
(3, 'Antonio García', 'antonio.garcia@example.com', '2024-06-20', 41, 0, 'Recientemente inscrito.'),
(4, 'Lucía Fernández', 'lucia.fernandez@example.com', '2024-08-11', 25, 1, 'Usuaria activa en spinning.'),
(5, 'David Ruiz', 'david.ruiz@example.com', '2024-09-05', 37, 0, 'Interesado en entrenamiento funcional.'),
(6, 'Sara Gómez', 'sara.gomez@example.com', '2024-09-18', 28, 1, 'Participa en múltiples actividades.'),
(7, 'Javier Ortega', 'javier.ortega@example.com', '2024-10-03', 32, 0, 'Nuevo socio en musculación.'),
(8, 'Marta Sánchez', 'marta.sanchez@example.com', '2024-11-10', 30, 1, 'Le gusta el pilates.'),
(9, 'Andrés Torres', 'andres.torres@example.com', '2025-01-15', 35, 0, 'Viene tres veces por semana.'),
(10, 'Elena Martín', 'elena.martin@example.com', '2025-02-20', 27, 1, 'Participa en clases de cardio.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_activity`);

--
-- Indices de la tabla `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`id_assessment`),
  ADD KEY `FK_assessment_reservation` (`id_reservation`);

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `FK_reservation_user` (`id_user`),
  ADD KEY `FK_reservation_activity` (`id_activity`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activity`
--
ALTER TABLE `activity`
  MODIFY `id_activity` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id_assessment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `FK_assessment_reservationn` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id_reservation`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_reservation_activity` FOREIGN KEY (`id_activity`) REFERENCES `activity` (`id_activity`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reservation_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
