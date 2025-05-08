-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2024 a las 12:23:48
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
-- Base de datos: `bd_correo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE `correos` (
  `id` int(11) NOT NULL,
  `bandeja` varchar(10) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `asunto` varchar(250) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `correos`
--

INSERT INTO `correos` (`id`, `bandeja`, `correo`, `asunto`, `mensaje`, `estado`) VALUES
(1, 'entrada', 'maria.gonzalez@gmail.com', 'Bienvenido', 'Gracias por unirte a nuestro servicio.', 'P'),
(2, 'entrada', 'carlos.ramirez@yahoo.com', 'Actualización de cuenta', 'Tu cuenta ha sido actualizada correctamente.', 'E'),
(3, 'entrada', 'andrea_lopez@outlook.com', 'Nuevo mensaje', 'Tienes un nuevo mensaje en tu bandeja.', 'P'),
(4, 'entrada', 'pedro.martinez@hotmail.com', 'Ofertas especiales', 'Revisa nuestras ofertas de esta semana.', 'E'),
(5, 'entrada', 'laura.sanchez@live.com', 'Restablecimiento de contraseña', 'Haz clic aquí para restablecer tu contraseña.', 'P'),
(6, 'entrada', 'juana.fernandez@gmail.com', 'Verificación de cuenta', 'Por favor, verifica tu cuenta haciendo clic en este enlace.', 'E'),
(7, 'entrada', 'ricardo_olivera@yahoo.es', 'Suscripción activada', 'Tu suscripción ha sido activada exitosamente.', 'P'),
(8, 'entrada', 'lucia.hernandez@outlook.com', 'Factura disponible', 'Tu factura está disponible en el portal.', 'E'),
(9, 'entrada', 'julian.peres@gmail.com', 'Novedades del servicio', 'Descubre las novedades en nuestro servicio.', 'P'),
(10, 'entrada', 'marta_garcia@protonmail.com', 'Confirmación de registro', 'Gracias por registrarte en nuestro sitio.', 'E'),
(11, 'entrada', 'fernando.nunez@icloud.com', 'Mensaje importante', 'Este es un mensaje importante sobre tu cuenta.', 'P'),
(12, 'entrada', 'roberto.lopez@empresa.com', 'Actualización de términos', 'Hemos actualizado nuestros términos y condiciones.', 'E'),
(13, 'entrada', 'diana_mendoza@yahoo.com', 'Recordatorio de pago', 'Te recordamos que tu pago vence pronto.', 'P'),
(14, 'entrada', 'sofia.cortes@zoho.com', 'Encuesta de satisfacción', 'Ayúdanos a mejorar completando esta encuesta.', 'E'),
(15, 'entrada', 'jorge.vargas@gmail.com', 'Notificación de actividad', 'Se ha detectado una nueva actividad en tu cuenta.', 'P'),
(16, 'salida', 'camila.diaz@gmail.com', 'Tu solicitud ha sido recibida', 'Hemos recibido tu solicitud. Te contactaremos pronto.', 'E'),
(17, 'salida', 'manuel.martinez@outlook.com', 'Confirmación de envío', 'Tu mensaje ha sido enviado con éxito.', 'P'),
(18, 'salida', 'veronica_salas@yahoo.com', 'Gracias por tu feedback', 'Agradecemos tus comentarios. Nos ayudan a mejorar.', 'E'),
(19, 'salida', 'fabian.rojas@empresa.com', 'Solicitud de soporte recibida', 'Estamos revisando tu solicitud de soporte.', 'P'),
(20, 'salida', 'carmen.rios@live.com', 'Actualización de soporte', 'Tu caso de soporte ha sido actualizado.', 'E'),
(21, 'salida', 'marco.alvarez@outlook.com', 'Notificación de envío', 'Se ha enviado la información solicitada a tu correo.', 'P'),
(22, 'salida', 'ana.luna@gmail.com', 'Aviso de vencimiento', 'Te recordamos que tu suscripción vence en breve.', 'E'),
(23, 'salida', 'hector.morales@yahoo.es', 'Confirmación de cancelación', 'Tu suscripción ha sido cancelada exitosamente.', 'P'),
(24, 'salida', 'susana_flores@outlook.com', 'Detalles de tu solicitud', 'Aquí están los detalles de tu solicitud.', 'E'),
(25, 'salida', 'ignacio.perez@zoho.com', 'Gracias por ser parte de nosotros', 'Agradecemos tu preferencia. Hasta pronto.', 'P');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `correos`
--
ALTER TABLE `correos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
