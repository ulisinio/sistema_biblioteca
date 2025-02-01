-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-11-2024 a las 20:16:47
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `nacionalidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `nombre`, `nacionalidad`) VALUES
(1, 'Aurelio Baldor', 'Cuba'),
(2, 'Gabriel García Márquez', 'Colombia'),
(3, 'Julio Cortázar', 'Argentina'),
(4, 'Jorge Luis Borges', 'Argentina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre_carrera` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre_carrera`) VALUES
(2, 'Ingenieria Civil'),
(3, 'Ingenieria Electrica'),
(4, 'Ingenieria Biomedica'),
(5, 'Ingeniería Industrial'),
(7, 'Ingenieria en Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(5) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `autor` int(11) NOT NULL,
  `anio` int(5) NOT NULL,
  `editorial` varchar(200) NOT NULL,
  `carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `autor`, `anio`, `editorial`, `carrera`) VALUES
(7, 'Cien años de soledad', 2, 1967, 'Editorial Sudamericana', 5),
(10, 'Rayuela', 3, 1963, 'Editorial Sudamericana', 4),
(12, 'El nacimiento de omar romero', 2, 2002, 'Editorial Tecnm', 3),
(28, 'r3ref', 1, 1234, 'Prueba de editorial', 3),
(39, 'Prueba de libro', 3, 2003, 'Acanceh', 4),
(40, 'El principito', 2, 1998, 'Sass', 5),
(41, 'Algebra lineal', 4, 2018, 'Achach y asociados', 2),
(42, 'La vida de Gener Vallejos', 4, 2023, 'Xoclan City', 4),
(43, 'Tacomania', 2, 1890, 'Taq. Mixe', 3),
(44, 'Programación en PHP', 1, 2014, 'HC', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(5) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `correo`, `contrasena`, `fechanacimiento`) VALUES
(1, 'Ulises Augusto', 'Millán González', 'millan_19@icloud.com', '$2y$10$437ll7wgerXz2JFYkOctC.ZNNz7i6GKDaTuXh8NhbmulH8ReZu5SW', '2002-01-01'),
(2, 'Admin', 'Nuevo', 'admin@admin.com', '$2y$10$8gOs9fr2MQEY8D8Flya/weczPhgKvYqUvSHr8Zg0hTqS4QWgTr.my', '2002-01-01'),
(3, 'Alumno', 'Prueba', 'prueba1@gmail.com', '$2y$10$Y3/4Q8v25z7bV5s2/ZwzEed7.uIa/7ph6l1lL6SXrzL1JubO7UYz6', '2000-01-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `carrera` (`carrera`) USING BTREE,
  ADD KEY `autor` (`autor`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libro-autores` FOREIGN KEY (`autor`) REFERENCES `autores` (`id_autor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros-carreras` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`id_carrera`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
