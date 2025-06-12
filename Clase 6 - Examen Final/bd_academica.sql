-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2022 a las 09:18:53
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_academica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materia` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotografia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres_apellidos` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `materia`, `fotografia`, `nombres_apellidos`, `celular`, `calificacion`) VALUES
(1, 'SIS256', '0cb159765f93267d73f42368f52b6c65.jpg', 'Asier Roca Vargas', 76246480, 0),
(2, 'SIS258', 'a98c8378600fa7fb171ebc2fd1ee1f13.jpg', 'Manuel Prado Tercero Andrés', 66008688, 0),
(3, 'SIS406', 'bad05963f248639c92c00de23faa3e4b.jpg', 'Raquel Mata Arellano', 69411393, 0),
(4, 'SIS406', 'b37983af76830d907c695d907c2d708f.jpg', 'Alexia Cuesta Guardado', 67287428, 0),
(5, 'SIS256', '5d6f3ec997c850535153c8a554e17c83.jpg', 'Martín Armas Escribano', 86103409, 0),
(6, 'SIS258', '754353375c6a76830ceab494320364dd.jpg', 'Jan Rodarte Tercero Benito', 68287348, 0),
(7, 'SIS256', 'd0fef5863a3190a2fd099d709f34385d.jpg', 'Abril Apodaca Ochoa', 62905792, 0),
(8, 'SIS406', '7355ad5570aa820412349a3006bdd8eb.jpg', 'Victoria Ruvalcaba Reynoso', 74845551, 0),
(9, 'SIS256', 'd0f3425bc43caddad6a3024ccd02cabc.jpg', 'Ing. Cristian Badillo Segundo Maestas', 76744658, 0),
(10, 'SIS406', '6ba45fa989d653c1ca8c5ea7cb23b601.jpg', 'Carlota Sauceda Hijo Arias', 61108781, 0),
(11, 'SIS258', '935edf51ef8f2a299a304e782fd4075e.jpg', 'Salma Deleón Segundo Escobedo', 72086325, 0),
(12, 'SIS258', '25409babce0511da2b14e4617cccb36b.jpg', 'Pau Lebrón Delatorre', 61364512, 0),
(13, 'SIS406', '908cab1ed28e3aeb1e560fe87a13f855.jpg', 'Rosario Jasso Rivera', 74441823, 0),
(14, 'SIS256', '5e55d327869b7e056f51b6f68a5133a4.jpg', 'Lic. Naia Nieto Hijo Almaráz', 78746851, 0),
(15, 'SIS258', '4140febec59f033afdddcccb057f4132.jpg', 'Srta. Olga Paz Soto', 63931406, 0),
(16, 'SIS256', '3715cc3666ead7b3d3d100a76d4fde5e.jpg', 'Juana Serna Botello', 66571609, 0),
(17, 'SIS406', '8d9ac0e7fc55bce5648817275024dfea.jpg', 'José Ojeda Redondo', 68686275, 0),
(18, 'SIS256', 'f8525a7408c31cfd0cd77b078696474c.jpg', 'Lic. Marina Hernándes Reina', 70439867, 0),
(19, 'SIS406', 'a791bd2ad0831a2889bfb57554f80b61.jpg', 'Bruno Velázquez Candelaria', 71742401, 0),
(20, 'SIS256', 'fe23836475ec761bdce26d9d25221040.jpg', 'Sra. Valeria Saiz Segundo Peláez', 79520108, 0),
(21, 'SIS256', '1800d388f9a8ca5a78d60d5a5e7f6e5e.jpg', 'Pedro Olmos Orosco', 70706603, 0),
(22, 'SIS256', 'd7802396eae16fc9e9ce7b6ac96eb4d0.jpg', 'Sra. Mara Pedraza Véliz', 76050624, 0),
(23, 'SIS406', 'da4a914db881dd736f82472b84ff97f8.jpg', 'Srta. Alicia Abrego Tercero Piña', 72566494, 0),
(24, 'SIS406', 'd68a14b0374bdda6ca7c9dfebb2b4587.jpg', 'Jorge Noriega Hijo Rolón', 73607045, 0),
(25, 'SIS256', '446a64a8aa4a0e537832e49e05523fad.jpg', 'Helena Delafuente Meléndez', 69182364, 0),
(26, 'SIS258', '93a3a6b3731a628d1d91859700127e35.jpg', 'Lic. Eduardo Jaramillo Tercero Corral', 63869031, 0),
(27, 'SIS406', '3d9b70a598fc0e3f1646433f924c4887.jpg', 'Antonia Iglesias Domínquez', 66469410, 0),
(28, 'SIS258', 'e60c0cadf52a48b59dfd54b0d06e3453.jpg', 'Enrique Granados Segundo Conde', 79339234, 0),
(29, 'SIS258', '87ec0bcd69c9de2ca63067a368cce1c7.jpg', 'Ing. Álvaro Delrío Hijo Candelaria', 81883140, 0),
(30, 'SIS258', 'f908380f618873539a170ce3c7f7c2a8.jpg', 'Cristian Palacios Pagan', 80116444, 0),
(31, 'SIS258', '4cc60840ed9e02981304d73227e58d9c.jpg', 'Pol Salgado Cantú', 77307065, 0),
(32, 'SIS256', 'a2cf1511b31ee1049e5205a1403c1490.jpg', 'José Antonio Páez Casillas', 61228213, 0),
(33, 'SIS406', 'b7e6534d2ce3fa274857d422e892ed84.jpg', 'Yeray Godoy López', 79376348, 0),
(34, 'SIS258', '5bf5ca3cd243f8722f3694b486fb5695.jpg', 'Lic. Lidia Velázquez Sosa', 75255792, 0),
(35, 'SIS406', '4c57ab637b44424c16ba654ae88bd40e.jpg', 'Ángeles Soliz Aguayo', 70374266, 0),
(36, 'SIS406', '5f3c7d20aef591b2ebddf1245f06d98a.jpg', 'Omar Marroquín Melgar', 69385128, 0),
(37, 'SIS406', 'bccde4b38b4d529b5ad699a0dd0f7008.jpg', 'Luna Rojo Yáñez', 75125455, 0),
(38, 'SIS406', '1d18ec791725684ca24e7c1593dd80f7.jpg', 'Srta. Silvia Roldán Roldán', 85644677, 0),
(39, 'SIS256', '5c90f0adec2b0eb2b6bba949d025af7e.jpg', 'Oriol Peralta Mateos', 82268831, 0),
(40, 'SIS256', '2894ebaf1a008a88edac16707b93e2c8.jpg', 'Adam Macías Aguilera', 73099197, 0),
(41, 'SIS256', '688472c46f18a2e9b6acf4bd4b3317fb.jpg', 'Sr. Miguel Trejo Tercero Casillas', 85995774, 0),
(42, 'SIS406', 'cedfcdd07b7c2d24b60ed52b227eb4ef.jpg', 'Margarita Escalante Partida', 81342022, 0),
(43, 'SIS256', '9d296040588f6022ae93718600b1a122.jpg', 'Sr. Oriol Jaramillo Tercero De Jesús', 69166496, 0),
(44, 'SIS256', 'ac434372c9893bdea35311cd7ca8914d.jpg', 'D. Juan Escamilla Santamaría', 86029926, 0),
(45, 'SIS256', '61c3ca113f831458d31387b1c78da39b.jpg', 'Beatriz Olvera Becerra', 65013779, 0),
(46, 'SIS406', '5a7223177d096afb11fa3f0e4ac70d44.jpg', 'Srta. Eva Lugo Tercero Luevano', 83446629, 0),
(47, 'SIS256', '4b14aa1c54c7fcd4ae6cc5a4998c41a7.jpg', 'Francisco Javier Rueda Hijo Barreto', 74882940, 0),
(48, 'SIS258', '54fc2d5d8939a272d2808f98a302b955.jpg', 'Héctor Salgado Tercero Maestas', 86736521, 0),
(49, 'SIS406', 'a25f36e5fcf0287ce4554d75573ad59d.jpg', 'Olivia Garibay Deleón', 82524954, 0),
(50, 'SIS406', '9feb3277b62f45f5752ea70187a02317.jpg', 'Candela Palomino Colunga', 84331372, 0),
(51, 'SIS406', 'a783953f50219f0aaada1717abd94a22.jpg', 'Dr. Nil Izquierdo Cortez', 77591077, 0),
(52, 'SIS406', '032f4576f5f4c7dc679b2635d0be260a.jpg', 'David Leyva Nájera', 64026950, 0),
(53, 'SIS256', '0e26e66e20983672a417431245cec41b.jpg', 'Juan José Arredondo Marcos', 87033965, 0),
(54, 'SIS258', '8191d75c02448262105b66f19ed5da73.jpg', 'Nerea Casares Vigil', 83242473, 0),
(55, 'SIS256', 'b34232c7f3b7932fb8b09d0ab7519424.jpg', 'Aina Regalado Montemayor', 66533031, 0),
(56, 'SIS256', '7e426f4be00496c099afc183c0dc54c2.jpg', 'Mateo Fuentes Cuevas', 67788039, 0),
(57, 'SIS406', '9e2573316c06ea20bed8fe1740c8c699.jpg', 'Ana Mercado Montañez', 84983173, 0),
(58, 'SIS406', '9f1a832a578ac2846153ef6139f46c23.jpg', 'Yolanda Estévez Ruiz', 65716996, 0),
(59, 'SIS258', 'e1278a69fed73661b180fd2a19b70a7c.jpg', 'Luna Cabán Segundo Palacios', 75759079, 0),
(60, 'SIS258', '5195f13b4fc8eb2a4023ba4d3a2d2aeb.jpg', 'Joel Izquierdo Calvo', 61765122, 0),
(61, 'SIS256', 'aecd5833afe42619c8ff3c08b4ed89bc.jpg', 'Jorge Pardo Santos', 71211861, 0),
(62, 'SIS406', 'aebc9946765c7f5269bf1cfcae9e4c27.jpg', 'Unai Casanova Gaitán', 82563431, 0),
(63, 'SIS258', '57c65be00d67b4f0fc8c7ac2a9dd9d55.jpg', 'Rocío Ávalos Elizondo', 82815650, 0),
(64, 'SIS258', '906c5402fe4cbda15bb7cbc004bda401.jpg', 'Jesús Andrés Negrón', 70733416, 0),
(65, 'SIS406', '75b8f8ce882c81a8f3663d2b31da7b59.jpg', 'Naia Lara Mesa', 64740855, 0),
(66, 'SIS258', 'b5ac76d7ae2218cd5e5ecd5072b1ae9c.jpg', 'César Padrón Segundo Oliva', 72143493, 0),
(67, 'SIS406', 'f39fcb4ce45531a5d4464baf8207b8ce.jpg', 'Ing. Yago Véliz Segundo Salas', 86402612, 0),
(68, 'SIS256', '77122c4f01e5a8fc23f39c4d13a07798.jpg', 'Carolina Font López', 76928870, 0),
(69, 'SIS258', 'bb47b69d04743e3a9968980639ce1877.jpg', 'Carla Mota Andrés', 66230899, 0),
(70, 'SIS406', 'f87b323d72c37bd835ecac5c3e05038e.jpg', 'Gonzalo Vila Armendáriz', 85379130, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materia` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `materia`, `dia`, `hora`) VALUES
(1, 'SIS256', 'Lunes', 16),
(2, 'SIS256', 'Lunes', 17),
(3, 'SIS256', 'Miércoles', 16),
(4, 'SIS256', 'Miércoles', 17),
(5, 'SIS258', 'Lunes', 14),
(6, 'SIS258', 'Lunes', 15),
(7, 'SIS258', 'Jueves', 16),
(8, 'SIS258', 'Jueves', 17),
(9, 'SIS406', 'Martes', 16),
(10, 'SIS406', 'Martes', 17),
(11, 'SIS406', 'Viernes', 9),
(12, 'SIS406', 'Viernes', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE `informes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materia` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mes` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porcentaje` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `informes`
--
ALTER TABLE `informes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
