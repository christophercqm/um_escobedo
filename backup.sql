-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2024 a las 17:28:08
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
-- Base de datos: `um_escobedo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuerpo_tecnicos`
--

CREATE TABLE `cuerpo_tecnicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cuerpo_tecnicos`
--

INSERT INTO `cuerpo_tecnicos` (`id`, `nombres`, `apellidos`, `rol`, `estado`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'Samuel', 'San José', 'Entrenador', 'Activo', 'cuerpo_tecnicos/qdrlVb7Urabo4Z7B8BhLZj3W8Simf5P66YgJEp2T.png', '2024-10-01 06:41:16', '2024-10-15 07:20:57'),
(4, 'David', 'López', 'Segundo entrenador', 'Activo', 'cuerpo_tecnicos/b3WmXJ3jvgQIxjR8QPU0J6VbXpmevkrl9b8trieQ.png', '2024-10-01 06:42:47', '2024-10-15 07:18:26'),
(5, 'Yago', 'Regal', 'Preparador Físico', 'Activo', 'cuerpo_tecnicos/5XNCF3Zbvzi5m8r525TwMMKTY5G5b2Jxa7TVtGLG.png', '2024-10-01 06:43:43', '2024-10-15 13:46:25'),
(6, 'Ángel', 'Diez', 'Entrenador de porteros', 'Activo', 'cuerpo_tecnicos/h9kRrPRlAwQt4FP2Z2NQw0f3whiTOde883EtkAnP.png', '2024-10-01 06:44:11', '2024-10-15 07:16:29'),
(7, 'Raúl', 'Giraldo', 'Fisioterapeuta', 'Activo', 'cuerpo_tecnicos/JRW7llJR0ijU3FBQ4uSwCoq3h8JmuYrlPXCj7BQX.png', '2024-10-01 06:44:31', '2024-10-15 07:20:36'),
(8, 'Pablo', 'Martínez', 'Readaptador', 'Activo', 'cuerpo_tecnicos/Cyig9EpztUJoUIELggzOKwyiLZpcHtood3VDIfCf.png', '2024-10-01 06:44:52', '2024-10-15 07:19:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `logo`, `ciudad`, `pais`, `created_at`, `updated_at`) VALUES
(3, 'UM Escobedo', 'equipos/9evXNbrWl9smZ7c7NGXcE9TdNYdY7EV43E0Zw7Hg.png', 'Cantabria', 'España', '2024-10-07 09:47:06', '2024-10-07 09:47:06'),
(4, 'Pontevedra', 'equipos/Mx9v2BfyVu6rVaGBpHlHq1emvQSR9hJ4MsfGOOwd.png', NULL, 'España', '2024-10-07 09:48:56', '2024-10-07 09:48:56'),
(5, 'Factory Sports', 'equipos/dRTHG08onrDG2brvvfoCgpDupYVMQlTCPLGybr9P.png', NULL, 'España', '2024-10-07 09:49:37', '2024-10-07 09:49:37'),
(6, 'UP Langreo', 'equipos/hEqY9zI18p7xePNjkVFNOhHpnXzCqzkm3TCVOCCy.png', NULL, 'España', '2024-10-07 09:50:11', '2024-10-07 09:50:11'),
(7, 'Sailor from Luanco', 'equipos/GPKDkUdUIoK6q4iid4rxw8Jm6bmkN1dPufC1GKft.png', NULL, 'España', '2024-10-07 09:50:59', '2024-10-07 09:50:59'),
(8, 'Numancia', 'equipos/Iol4vmeIueFT6uGiYaCtXqFZkaJdTBxV1RVJu1im.png', NULL, 'España', '2024-10-07 09:51:47', '2024-10-07 09:51:47'),
(9, 'Rayo Cantabria', 'equipos/w6QtchU0gGZwulOxIaqN6PrmJHFisEXK7o3dEUtz.png', NULL, 'España', '2024-10-07 09:52:40', '2024-10-07 09:52:40'),
(10, 'Guijuelo', 'equipos/R4aMvgDLkWYbzyD5loMQKU4OYCAADVDb6o0sqSux.png', NULL, 'España', '2024-10-07 09:53:14', '2024-10-07 09:53:14'),
(11, 'Royal Aviles Industrial', 'equipos/kemTkqgYCkBxXwHOFx2Vh4vhqyGsR15C7bfLUTwX.png', NULL, 'España', '2024-10-07 09:54:22', '2024-10-07 09:54:22'),
(12, 'Coruxo', 'equipos/ZwU3htzGoqJPqmnFdbWfTSwgY3IWTa78WL2vqeGO.png', NULL, 'España', '2024-10-07 09:55:01', '2024-10-07 09:55:01'),
(13, 'Bergantiños FC', 'equipos/w1eqc34T9f6CmeyZ0KXDD7onbNEiRHM3xPnhR8HN.png', NULL, 'España', '2024-10-07 09:55:39', '2024-10-07 09:55:39'),
(14, 'UD Llanera', 'equipos/G87EndKbjUyaD8F1pDEaDKXyjeaDMQgC2BAQhtsr.png', NULL, 'España', '2024-10-07 09:58:37', '2024-10-07 09:58:37'),
(15, 'Salamanca UDS', 'equipos/PJjlP3r7ODj62Pwvfy5ZifG2o7cwAuQ1tB0Sd9KA.png', NULL, 'España', '2024-10-07 09:59:27', '2024-10-07 09:59:27'),
(16, 'CD Laredo', 'equipos/vgazENvDTqtWLFkw1mtzQBkFvBaQuB4zRyuwxXJ5.png', NULL, 'España', '2024-10-07 10:00:01', '2024-10-07 10:00:01'),
(17, 'Gimnástica Torrelavega', 'equipos/zU2JrMSo3AVD25YxjWQcYWp0ZQUdr1Dt96BSytga.png', NULL, 'España', '2024-10-07 10:02:25', '2024-10-07 10:02:25'),
(18, 'Real Ávila', 'equipos/DtfyPdynZUb0KZjUyPWbJZ2fpQ0uXOOtI9nMXzIC.png', NULL, 'España', '2024-10-07 10:03:54', '2024-10-07 10:03:54'),
(19, 'Real Valladolid Promesas', 'equipos/42jezTx9JOvw0N535h0wSfJ6KprvUHSs1RsY92fo.png', NULL, 'España', '2024-10-07 10:04:46', '2024-10-07 10:04:46'),
(20, 'SD Compostela', 'equipos/WgnB1M4f9JQrCva9c8HYReB16Ho1PEiYxXIIT9f6.png', NULL, 'España', '2024-10-07 10:05:30', '2024-10-07 10:05:30'),
(21, 'Deportivo Fabril', 'equipos/eTWWgrwG81Fcv7jh93cBL2ljWi20rUSXLfoekcTI.png', NULL, 'España', '2024-10-07 10:06:26', '2024-10-07 10:06:26'),
(22, 'Marino de Luanco', 'equipos/jJaDL5dJhsbTYCCuetq4rpmq8nksruxNTqHbn1jl.png', NULL, 'España', '2024-10-07 10:07:12', '2024-10-07 10:07:12'),
(23, 'Real Avilés Industrial', 'equipos/VLSaNeJ4QFy5qcZ8L0Dq9EniSSnocWJY85y15jxZ.png', NULL, 'España', '2024-10-07 10:08:07', '2024-10-07 10:08:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_acreditacion`
--

CREATE TABLE `formulario_acreditacion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `club_pertenece` varchar(255) DEFAULT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `asunto` text NOT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `proximo_encuentro` varchar(255) NOT NULL,
  `tipo_acreditacion` varchar(255) NOT NULL,
  `carnet_federacion` varchar(255) DEFAULT NULL,
  `medio_al_que_pertenece` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `partido_id` bigint(20) UNSIGNED DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `formulario_acreditacion`
--

INSERT INTO `formulario_acreditacion` (`id`, `nombre`, `apellido`, `dni`, `club_pertenece`, `correo`, `telefono`, `asunto`, `archivo`, `proximo_encuentro`, `tipo_acreditacion`, `carnet_federacion`, `medio_al_que_pertenece`, `created_at`, `updated_at`, `partido_id`, `estado`, `token`, `expires_at`) VALUES
(144, 'Christopher', 'Quiroz', '95175325', NULL, 'chriscqm@gmail.com', '95175325', 'sdsdsds', 'acreditaciones/gieC7YIEyMwYDgHRRXI42u516Q1NfYaYyQ1C6TJp.pdf', 'UM Escobedo vs Pontevedra', 'arbitro', NULL, NULL, '2024-10-14 10:07:55', '2024-10-14 10:07:55', 1, 0, 'ff6f94a6-7e3e-40b8-a356-4ddeb8ca73ad', '2024-10-19 10:07:55'),
(145, 'Yanerith', 'Durand', '4545487845', NULL, 'yanerithdurand@gmail.com', '4545487845', 'sdsdsds', 'acreditaciones/4TYSBouNS8q7Af6Feo1nhzwSu2zSqiW5b487JNXd.pdf', 'Deportivo Fabril vs UM Escobedo', 'arbitro', NULL, NULL, '2024-10-14 10:11:04', '2024-10-14 10:33:46', 6, 0, '020ce045-2ef0-440b-a183-4668d7e97216', '2024-10-19 10:11:04'),
(146, 'Christopher', 'Quiroz', '15975325', NULL, 'sccp.cmquiroz@gmail.com', '15975325', 'sdsdsds', 'acreditaciones/5dVcPgzDfUAFiDaNyaKxyBNS8GLyAFfdxh5aPWSG.pdf', 'UM Escobedo vs UP Langreo', 'arbitro', NULL, NULL, '2024-10-14 10:37:38', '2024-10-14 11:35:00', 7, 1, '1e01964e-d13e-433e-801b-09f9c660b02a', '2024-10-19 10:37:38'),
(147, 'Christopher', 'Quiroz', '454548845', 'Sailor from Luanco', '454548845@gmail.com', '45454545', 'Mensaje desde cuerpo directivo', 'acreditaciones/2bp3S7x674PaLFobQsHxeXG8PbU9HDqWwSGO2Qr6.pdf', 'UM Escobedo vs UP Langreo', 'cuerpo_directivo', NULL, 'Sailor from Luanco', '2024-10-14 11:39:16', '2024-10-14 12:55:00', 7, 1, '0dd46165-15f2-4ded-bd17-f18eefab8ba1', '2024-10-19 11:39:16'),
(148, 'Yanerith', 'Durand', '487454545', 'UP Langreo', '487454545@gmail.com', '487454545', 'Mensaje de prueba desde Cuerpo Técnico', 'acreditaciones/iAVSTXWMgT7ssANoFYrvF9wVkoCnSVVIYAe8YUDf.pdf', 'Deportivo Fabril vs UM Escobedo', 'cuerpo_tecnico', NULL, 'UP Langreo', '2024-10-14 11:53:13', '2024-10-14 11:53:13', 6, 0, '582ac17e-eeb7-45d7-8fc8-2eb6f143e6a1', '2024-10-19 11:53:13'),
(149, 'Christopher', 'Pruebav2', '4878712', 'Numancia', '4878712@gmail.com', '4878712', 'dsdsds', 'acreditaciones/98tQ5HpQubD22Bad1yaRARVjqTZg7HWccQG6Qr1X.pdf', 'UM Escobedo vs UP Langreo', 'cuerpo_tecnico', NULL, 'Numancia', '2024-10-14 12:57:32', '2024-10-14 12:57:32', 7, 0, '7a05e419-ee73-4c81-bcb6-4e486beb3bcf', '2024-10-19 12:57:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_contactar`
--

CREATE TABLE `formulario_contactar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(255) NOT NULL DEFAULT 'contactar',
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `privacidad_aceptada` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `formulario_contactar`
--

INSERT INTO `formulario_contactar` (`id`, `tipo`, `nombre`, `apellidos`, `email`, `telefono`, `mensaje`, `privacidad_aceptada`, `created_at`, `updated_at`) VALUES
(7, 'contactar', 'Miguel', 'Ruiz', 'miguelruiz@prueba.com', '4545454454', 'Mensaje de prueba desde contacto.', 1, '2024-10-14 05:55:45', '2024-10-14 05:55:45'),
(8, 'contactar', 'Yanerith', 'Durand', 'yanerith.sl@prueba.com', '987654321', 'Mensaje de prueba desde contacto.', 1, '2024-10-14 06:01:32', '2024-10-14 06:01:32'),
(11, 'contactar', 'Pruena', 'Pruebav2', 'pruebav2@gmail.com', '45454545', 'sdsds', 1, '2024-10-14 06:48:40', '2024-10-14 06:48:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_patrocinadores`
--

CREATE TABLE `formulario_patrocinadores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `nombre_representante` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `privacidad_aceptada` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `formulario_patrocinadores`
--

INSERT INTO `formulario_patrocinadores` (`id`, `empresa`, `nombre_representante`, `email`, `telefono`, `mensaje`, `privacidad_aceptada`, `created_at`, `updated_at`) VALUES
(8, 'Yanerith S.L', 'Yanerith Durand', 'yanerith.sl@prueba.com', '987654321', 'Mensaje de prueba desde patrocinadores.', 1, '2024-10-14 06:04:14', '2024-10-14 06:04:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `altura` decimal(5,2) DEFAULT NULL,
  `posicion` varchar(255) NOT NULL,
  `numero_camiseta` int(11) NOT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `equipo` varchar(255) DEFAULT NULL,
  `nacionalidad` varchar(255) DEFAULT NULL,
  `estado` varchar(255) NOT NULL,
  `foto_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `altura`, `posicion`, `numero_camiseta`, `peso`, `equipo`, `nacionalidad`, `estado`, `foto_url`, `created_at`, `updated_at`) VALUES
(8, 'Iván', 'Rumenov', NULL, 1.80, 'Portero', 1, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/q8ehQPnkpyC4XIkC9jDI4hEKYJh7j1v1cPi8ntpl.png', '2024-09-30 11:31:36', '2024-10-15 06:37:45'),
(9, 'Laro', 'Gómez', NULL, 1.85, 'Portero', 13, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/pXGtOOLTapdvllI8tauWQLmB4NYjWMBNBIo9nlR3.png', '2024-09-30 11:34:18', '2024-10-15 06:46:21'),
(10, 'Daniel', 'Martínez', '2003-07-01', 1.75, 'Defensa', 15, 68.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/enQktqOK9tQvzEtvfyudJOMTtuwboH9CBj9njxJN.png', '2024-09-30 11:39:07', '2024-10-15 06:48:45'),
(11, 'Eduardo', 'Fontán', '2001-10-02', 1.77, 'Defensa', 7, 66.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/lKWO2hA0l6Ga5aGUUngjiU86hbglwh3hnO12u1V5.png', '2024-09-30 11:43:16', '2024-10-15 06:43:03'),
(12, 'José', 'Picón', '1988-05-13', 1.83, 'Defensa', 16, 75.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/aYCXL02J8zJk4C7gxPpnEsvXazs3dOMH4Sd3Izx2.png', '2024-09-30 11:46:52', '2024-10-15 06:49:45'),
(13, 'Adrián', 'Cagigal Acebo', NULL, NULL, 'Defensa', 18, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/PPLeluFGdDGdcYovQWE04jOOkQX3Go1Gh4crDcgP.png', '2024-09-30 11:49:15', '2024-10-15 06:59:55'),
(14, 'Diego', 'Espinosa', NULL, NULL, 'Defensa', 23, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/i1DBqRUWINds9OqJsZr54Skf8CFK92KJT8X0jlGE.png', '2024-09-30 11:52:14', '2024-10-15 07:04:57'),
(15, 'Víctor', 'Ruiz', '2003-01-01', NULL, 'Defensa', 5, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/UbDmxO0UaXpSVCADTEG2ibLAorUr0NoGlNXVWh9y.png', '2024-09-30 11:55:01', '2024-10-15 06:40:56'),
(16, 'Fermín', 'Sánchez', '1996-05-31', 1.76, 'Defensa', 3, 68.00, 'UM Escobedo', 'es', 'Activo', 'jugadores/BtSulNn3UPYhMq77RfUpyl2yrmwgZfcpw4aoX1hc.png', '2024-09-30 11:57:05', '2024-10-15 06:39:25'),
(17, 'Álvaro', 'Pelayo', '2002-06-08', NULL, 'Defensa', 26, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/mptKSoLwFHhSb7KNvZyZ8dqDyeitiOTfSUh0kCDa.png', '2024-09-30 11:58:52', '2024-10-15 07:05:35'),
(18, 'Javier', 'Morales', '2003-12-10', 1.80, 'Centrocampista', 4, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/PLG945aeTRZKszrjkZqtFEJ1fLuwLMjsGzZhCfhY.png', '2024-09-30 12:09:37', '2024-10-15 06:39:55'),
(19, 'Mario', 'Bastante', '2003-03-05', 1.72, 'Centrocampista', 2, 65.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/oSUY0ZpBuEvdRuiNtp5UGHuTDfq31KLMc2uIAXFr.png', '2024-09-30 12:35:28', '2024-10-15 06:38:26'),
(20, 'Juan', 'Casar', NULL, NULL, 'Centrocampista', 21, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/y4ZNXMJlfw1de9rGsHpJV1duSyujsODwgq1zrNtz.png', '2024-09-30 12:37:50', '2024-10-15 07:03:09'),
(21, 'David', 'Somaza', '1996-09-09', NULL, 'Centrocampista', 8, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/KzgKIAoJLx1UMKDBhCT98113PhJ3ByfeVeRx8SPM.png', '2024-09-30 12:39:17', '2024-10-15 06:43:52'),
(22, 'Izam', 'Ortiz', '2002-10-29', 175.00, 'Centrocampista', 6, 65.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/7NQdCvQ29Xx80jOlAXwfqJijiFYQicfD5L3qWEFM.png', '2024-09-30 12:41:00', '2024-10-15 06:41:47'),
(23, 'Raúl', 'Tresgallo', '1997-07-26', NULL, 'Centrocampista', 14, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/3JbWvSSqe8AdydDUtjTJkA8TsvTRqPSCZskBBRFD.png', '2024-09-30 12:42:17', '2024-10-15 06:47:56'),
(24, 'Gonzalo', 'Peña', '1998-05-15', NULL, 'Delantero', 11, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/tlrkJ03VqjSzt0KzJaPHIucGnHukfj0RiKPpUMLZ.png', '2024-09-30 12:45:23', '2024-10-15 06:45:27'),
(25, 'Nacho', 'Martínez', '1990-04-11', 185.00, 'Delantero', 9, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/yGmxvvBXaIsmZUxtZlJuUZU9jDz7V9DjXLNyKKUh.png', '2024-09-30 12:46:34', '2024-10-15 06:44:35'),
(26, 'Aaron', 'Fernández', '2002-11-16', 176.00, 'Delantero', 22, 62.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/YGfZsezZKO3h6ZbTq2M5gW4rb69KhKfJSpouDth8.png', '2024-09-30 12:47:38', '2024-10-15 07:03:55'),
(27, 'Mateo', 'Gandarillas', '2001-01-20', 173.00, 'Delantero', 10, 64.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/vPyMH8o6h0BzJbohIzGSvR3D2nbhwpN7sM2Bl7Iw.png', '2024-09-30 12:48:54', '2024-09-30 12:48:54'),
(28, 'Jay', 'Romero', '2002-10-12', NULL, 'Delantero', 20, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/pO8h14JDLew9f6ULBe8eDhCCWYjTFIE8i5TUsLxh.png', '2024-09-30 12:50:30', '2024-10-15 07:01:33'),
(29, 'Miguel', 'Saza', '1999-10-29', NULL, 'Delantero', 19, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/49r4OajWUSGPAIAvKRLq2XIFGWUzQqaEWK8NgQqm.png', '2024-09-30 12:52:56', '2024-10-15 07:00:54'),
(30, 'Adrián', 'Villasana', NULL, NULL, 'Delantero', 17, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/C9Z0tKM6VKTGfg6ATnpQNxIbrUH947NClv2ZQYuN.png', '2024-09-30 12:54:41', '2024-10-15 06:58:37'),
(32, 'Samuel', 'Basterrechea', NULL, NULL, 'Delantero', 0, NULL, NULL, 'España', 'Activo', 'jugadores/hvuHUo5Sf4bnmc5yV3HZ58PhXwgha8WeBggU9mux.png', '2024-10-15 07:35:49', '2024-10-15 07:35:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `junta`
--

CREATE TABLE `junta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `foto_url` varchar(255) DEFAULT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `junta`
--

INSERT INTO `junta` (`id`, `nombre`, `cargo`, `foto_url`, `estado`, `created_at`, `updated_at`) VALUES
(3, 'Luis Merino', 'Presidente', 'junta/wCdGfvvGyOW8EA5cVXsHLF4uVFnxem8kbhLZpbdA.png', 'Activo', '2024-10-17 13:24:42', '2024-10-17 13:24:42'),
(4, 'Antonio Higuera', 'Secretario', 'junta/IMLn3n1t2XYyKfWJsVesvzJWDWT4KGu8aDuv8yq7.png', 'Activo', '2024-10-17 13:25:05', '2024-10-17 13:25:05'),
(5, 'Manuel Argumosa', 'Vocal', 'junta/qVCiAUovPx7GWgM5TCzFb4a5YY3ZR7WGI2KwMKBT.png', 'Activo', '2024-10-17 13:25:27', '2024-10-17 13:25:27'),
(6, 'Norberto Muñoz', 'Vocal', 'junta/1E4fHrPihNcdojbnfFw9ALTVRRZzsGyy1Be5tSCD.png', 'Activo', '2024-10-17 13:25:49', '2024-10-17 13:25:49'),
(7, 'José Antonio', 'Vocal', 'junta/FWZkNXIrq242BpIzIYekHyMehKQlq4HRUB8lXzvO.png', 'Activo', '2024-10-17 13:26:15', '2024-10-17 13:26:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_17_185816_create_navigations_table', 2),
(5, '2024_09_24_200327_create_juntas_table', 2),
(7, '2024_09_24_200609_create_noticias_table', 2),
(8, '2024_09_24_200637_create_contactos_table', 2),
(9, '2024_09_26_081300_create_prensas_table', 2),
(10, '2024_09_27_093414_add_estado_to_prensa_table', 3),
(13, '2024_09_27_101524_add_categoria_to_prensa_table', 4),
(16, '2024_09_24_200456_create_jugadores_table', 5),
(17, '2024_09_30_130511_modify_jugadores_table', 6),
(18, '2024_10_01_080142_create_cuerpo_tecnicos_table', 7),
(22, '2024_10_04_091712_create_formulario_acreditacion_table', 9),
(23, '2024_10_07_080905_create_formulario_contactar_table', 10),
(24, '2024_10_07_084343_create_formulario_patrocinadores_table', 11),
(26, '2024_10_07_100759_create_equipos_table', 12),
(28, '2024_10_07_121316_create_partidos_table', 13),
(29, '2024_10_08_115041_add_partido_fecha_to_formulario_acreditacion_table', 14),
(30, '2024_10_09_133730_add_estado_to_formulario_acreditacion_table', 15),
(32, '2024_10_11_081713_add_medio_al_que_pertenece_to_formulario_acreditacion_table', 16),
(33, '2024_10_11_135238_add_club_pertenece_to_formulario_acreditacion_table', 17),
(34, '2024_10_14_092037_add_carnet_federacion_to_formulario_acreditacion_table', 18),
(35, '2024_10_14_115520_add_token_to_formulario_acreditacion_table', 19),
(38, '2024_10_15_105005_create_junta_table', 20),
(43, '2024_10_17_063633_create_ultimos_partidos_table', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `navigations`
--

CREATE TABLE `navigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `equipo_local_id` bigint(20) UNSIGNED NOT NULL,
  `equipo_visitante_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `resultado_local` int(11) DEFAULT NULL,
  `resultado_visitante` int(11) DEFAULT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'programado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `equipo_local_id`, `equipo_visitante_id`, `fecha_hora`, `resultado_local`, `resultado_visitante`, `estado`, `created_at`, `updated_at`) VALUES
(1, 3, 4, '2024-10-12 17:00:00', NULL, NULL, 'Pendiente', '2024-10-07 10:57:33', '2024-10-07 10:57:33'),
(6, 21, 3, '2024-10-20 17:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:23:48', '2024-10-07 12:23:48'),
(7, 3, 6, '2024-10-27 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:25:49', '2024-10-07 12:25:49'),
(8, 22, 3, '2024-11-03 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:26:35', '2024-10-07 12:26:35'),
(9, 8, 3, '2024-11-10 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:27:11', '2024-10-07 12:27:11'),
(10, 3, 9, '2024-11-17 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:27:46', '2024-10-07 12:27:46'),
(11, 10, 3, '2024-11-24 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:28:08', '2024-10-07 12:28:08'),
(12, 3, 23, '2024-12-01 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:29:00', '2024-10-07 12:29:00'),
(13, 12, 3, '2024-12-08 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:29:19', '2024-10-07 12:29:19'),
(14, 3, 13, '2024-12-15 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:30:22', '2024-10-07 12:30:22'),
(15, 14, 3, '2024-12-22 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:30:42', '2024-10-07 12:30:42'),
(16, 15, 3, '2025-01-12 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:31:37', '2024-10-07 12:31:37'),
(18, 17, 3, '2025-01-26 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:33:22', '2024-10-07 12:33:22'),
(19, 3, 16, '2025-01-19 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:40:40', '2024-10-07 12:40:40'),
(20, 3, 18, '2025-02-02 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:41:19', '2024-10-07 12:41:19'),
(21, 19, 3, '2025-02-09 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:41:43', '2024-10-07 12:41:43'),
(22, 3, 20, '2025-02-16 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:42:12', '2024-10-07 12:42:12'),
(23, 4, 3, '2025-02-23 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:42:33', '2024-10-07 12:42:33'),
(24, 3, 21, '2025-03-02 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:43:11', '2024-10-07 12:43:11'),
(25, 6, 3, '2025-03-09 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:43:52', '2024-10-07 12:43:52'),
(26, 3, 8, '2025-03-23 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:44:40', '2024-10-07 12:44:40'),
(27, 9, 3, '2025-03-30 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:45:07', '2024-10-07 12:45:07'),
(28, 3, 10, '2025-04-06 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:45:29', '2024-10-07 12:45:29'),
(29, 23, 3, '2025-04-13 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:45:49', '2024-10-07 12:45:49'),
(30, 3, 12, '2025-04-20 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:46:07', '2024-10-07 12:46:07'),
(31, 13, 3, '2025-04-27 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:46:25', '2024-10-07 12:46:25'),
(32, 3, 14, '2025-05-04 00:00:00', NULL, NULL, 'Pendiente', '2024-10-07 12:47:02', '2024-10-07 12:47:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prensas`
--

CREATE TABLE `prensas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion_breve` text NOT NULL,
  `descripcion` longtext NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `categoria` varchar(255) NOT NULL DEFAULT 'cronicas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prensas`
--

INSERT INTO `prensas` (`id`, `imagen`, `titulo`, `descripcion_breve`, `descripcion`, `fecha_creacion`, `created_at`, `updated_at`, `estado`, `categoria`) VALUES
(65, 'prensa/gxoktp8ti0aDDWJxl0zjpKjrsMIl61RL1Vocga1i.jpg', 'El Escobedo Asalta el Adolfo Suárez', 'La Unión Montañesa Escobedo ha cosechado un triunfo de quitales (0-1), el primero de su historia en Segunda Federación, rompiendo además la imbatibilidad del Real Ávila. Y es que el conjunto local llegaba al encuentro sin haber perdido ningún partido y sin haber recibido gol alguno en lo que llevábamos de temporada.', 'La Unión Montañesa Escobedo ha cosechado un triunfo de quitales (0-1), el primero de su historia en Segunda Federación, rompiendo además la imbatibilidad del Real Ávila. Y es que el conjunto local llegaba al encuentro sin haber perdido ningún partido y sin haber recibido gol alguno en lo que llevábamos de temporada.\n\nEl partido se desarrolló con mucha intensidad desde el pitido inicial, sucediéndose poco a poco las ocasiones en ambas áreas. El primer aviso serio llegó por parte del Escobedo, con un disparo lejano de Mario Bastante repelido por la madera. Acto seguido, Laro tuvo que intervenir de manera crucial para evitar el gol del conjunto encarnado colocando una buena mano a un disparo que se colaba lamiendo la cepa del poste. En el 37\' tuvo lugar la ocasión más clara del primer tiempo. Aarón, muy atento, aprovechó una indecisión entre el defensa y el portero y, tras sortear a este último, envió el cuero fuera. El Escobedo estaba perdonando el primero.\n\nTras la reanudación los camargueses salieron arrolladores. En el minuto 47\', un centro de Nacho era cabeceado por Izam y, cuando todo el mundo asumía el gol, el portero rival intervino con una prodigiosa mano sobre la línea. En el córner posterior, un remate de Mateo era interceptado por Saza que, tras un gran control, definió a la perfección para estallido de júbilo visitante.\n\nLos locales lo intentaron una y otra vez, aunque el buen hacer del Escobedo, que tampoco renunciaba a salir con peligro al contragolpe, impedía la claridad en las oportunidades. Sin embargo, en dos acciones los abulenses rozaron el tanto del empate. Primero con un remate a bocajarro en el minuto 79 que salvó Espinosa sobre la línea de gol. Más tarde, ya en el segundo de los 8 minutos añadidos por el trencilla, Laro intervino de nuevo para repeler un cabezazo en el segundo palo que se colaba al fondo de la red.\n\nEn definitiva, un triunfo muy meritorio que no solo es importante en lo clasificatorio, sino también en lo psicológico, puesto que los pupilos de Samuel San José han demostrado que pueden ganar en cualquier campo sin importar el rival.</p>', '2024-09-27 11:01:36', '2024-09-27 09:01:36', '2024-09-30 07:21:46', 1, 'cronicas'),
(66, 'prensa/0AlucHoxRXwhOZjwXXRzTjZP1fwZ4CKBMeGhy3aP.jpg', 'Un empate para seguir creciendo', 'El Eusebio Arce, que presentó un magnífico aspecto, acogió el primero de los tres derbis que tendrán lugar esta temporada.', 'El Eusebio Arce, que presentó un magnífico aspecto, acogió el primero de los tres derbis que tendrán lugar esta temporada.\r\n\r\nUnión Montañesa Escobedo y Real Sociedad Gimnástica llegaban al encuentro con la imperiosa necesidad de sumar, cosa que hicieron, aunque quizás no de la manera que deseaban.\r\n\r\nSalió mejor al encuentro un Escobedo que, resguardado atrás, creaba mucho peligro al contragolpe. Fruto de ello vino la primera opción clara de gol en una internada de Mateo que no pudo culminar Aarón por poco. Quince minutos más tarde, en el 17\', llegó el tanto local. En una jugada prácticamente calcada a la comentada anteriormente, Mateo cedió el cuero a Aarón, cuya definición se estrelló en el palo, aprovechando de nuevo Mateo el rechace para embocar y poner el primero.\r\n\r\nA partir del 1-0 y hasta el término de la primera mitad, la Gimnástica demostró su poderío y acosó continuamente la portería defendida por Laro. Numerosos disparos desviados y, sobre todo, un balón que sacó Picón sobre la línea, hacían presagiar que el empate estaba cerca. Sin embargo, se llegó al intermedio con ventaja para el Escobedo. 1-0.\r\n\r\nTras la reanudación, el dominio visitante no fue tan evidente. De hecho, fue el Escobedo quien estuvo a punto de ampliar ventaja. Nacho, que cuajó un partido sensacional, estampó una preciosa volea en el larguero cuando gran parte de la grada ya cantaba el gol.\r\n\r\nEn el 57\', y quizás cuando mejor estaban los locales, vino el gol de la Gimnástica. Primo aprovechó un rebote para, solo en área pequeña, fusilar la meta blanquinegra.\r\n\r\nLa última media hora fue muy igualada, aunque con más empuje por parte del Escobedo, viviéndose más cerca del 2-1 que del 1-2. Y es que ambos equipos mostraban su disconformidad con el empate gozando de espacios en ataque, aunque la falta de acierto impidió que se moviera la contienda.', '2024-09-27 11:15:04', '2024-09-27 09:15:04', '2024-09-27 09:15:04', 1, 'cronicas'),
(67, 'prensa/XDxQDso0CHdAidbAn9rjwP8a1WwOvSDIkJKQZtwH.jpg', 'Sabor amargo en el primer derbi de la temporada', 'El Laredo se lleva un partido en el que los de Samuel San José estuvieron muy cerca de sumar.', 'El Laredo se lleva un partido en el que los de Samuel San José estuvieron muy cerca de sumar.\r\n\r\nPejinos y camargueses se dieron cita sobre el siempre impoluto césped de San Lorenzo, en un partido igualado que se decantó para los locales.\r\n\r\nEl Escobedo salió con las ideas claras y, fruto de ello, vino la primera gran ocasión del encuentro. En el segundo minuto, un robo en la frontal permitió a Mateo sortear a su par y, en posición óptima, enganchar un zurdazo que se marchó alto. En estos primeros compases el Laredo llevaba el peso del encuentro, pero sin ningún peligro hacia la portería defendida por Laro. De hecho, era el Escobedo el que, con algún disparo lejano, obligaba a Puras a intervenir.\r\n\r\nEn el ecuador del primer acto llegó la ocasión más clara para el Charles. Una falta sin aparente peligro fue botada de manera magistral por Isuardi, que estrelló el balón en la cruceta. Hasta el entretiempo el partido siguió con la misma tónica: posesión local, pero sin peligro.\r\n\r\nTras la reanudación salieron más enchufados los pupilos de Mario Gutiérrez y, a consecuencia de ello, vieron como el árbitro les anulaba un gol por fuera de juego. Acto seguido, Diego Marta también desperdiciaría una clara ocasión. A los pocos minutos, cuando se cumplía el 60\', llegaría el tanto del Laredo. Vassi se marchaba muy bien de Edu y, tras un rebote, el esférico le quedaba a David Sanz para que empujara a placer.\r\n\r\nEl Escobedo, tras mover ficha en el banquillo, reaccionó muy bien al tanto en contra. Y es que la última media hora fue de claro dominio blanquinegro. Aarón comenzó avisando con un peligroso disparo que se marchó alto. Los de Samuel San José lo seguían buscando y disfrutaban de llegadas con mucho peligro que eran abortadas por la zaga local. La más clara del partido llegó cuando restaban apenas 15 minutos para la conclusión. Raúl envió un pase de la muerte, Puras rozó el balón y Somaza se quedó a centímetros de embocar a portería vacía.\r\n\r\nYa en el 86\', una dura entrada de Marta le costó la roja directa, lo cual incrementó aún más el dominio visitante, aunque sin premio final.', '2024-09-27 11:17:19', '2024-09-27 09:17:19', '2024-09-27 09:17:19', 1, 'cronicas'),
(68, 'prensa/0b93RcAm6clRyapZ9ac5h67o4rsdT5ezpmwA0h0x.jpg', 'Escuela UM Escobedo', '¿Quieres que tu hij@ comience a jugar al futbol pero crees que aún es demasiado pequeñ@?', '¡Nosotros tenemos la 𝙨𝙤𝙡𝙪𝙘𝙞ó𝙣!🔑\r\nInscríbete y gana la camiseta del primer equipo de regalo.', '2024-09-27 11:23:23', '2024-09-27 09:23:23', '2024-09-27 09:23:23', 1, 'actualidad'),
(69, 'prensa/H8tLYRc4S9QgysusiG9bUiPJrAtdnpok63fT1uvC.jpg', 'U.M. Escobedo', 'Ángel Díez (entrenador de porteros), David López \"Camy\" (segundo entrenador) y Pablo Martínez(readaptador) se incorporan al cuerpo técnico de la UM Escobedo de cara a la temporada 24/25.', 'Ángel Díez (entrenador de porteros), David López \"Camy\" (segundo entrenador) y Pablo Martínez(readaptador) se incorporan al cuerpo técnico de la UM Escobedo de cara a la temporada 24/25.', '2024-09-27 11:28:29', '2024-09-27 09:28:29', '2024-09-27 09:28:29', 1, 'actualidad'),
(70, 'prensa/ot4ReEjzzB21m5DyM5GiJIh66EetwMDnIQFdapMD.jpg', 'Plan Semanal', 'Arranca la primera semana de competición, en la que nuestro equipo entrenará 4 días antes de recibir el próximo sábado al @salamancacfuds en el Eusebio Arce (17:00h).', 'Arranca la primera semana de competición, en la que nuestro equipo entrenará 4 días antes de recibir el próximo sábado al @salamancacfuds en el Eusebio Arce (17:00h).', '2024-09-27 11:29:46', '2024-09-27 09:29:46', '2024-09-27 09:29:46', 1, 'actualidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lWNtytEJKodMHLLEcL1ARG74oBzniq8kUcvOQ85s', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYThZcnBZMFJ6d3hnWlBIdE01QVlLUEpGWVhEMHJGeVRNZmNFVEdBNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jbHViIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1729178820);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ultimos_partidos`
--

CREATE TABLE `ultimos_partidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partido_id` bigint(20) UNSIGNED NOT NULL,
  `puntuacion_local` varchar(255) DEFAULT NULL,
  `puntuacion_visitante` varchar(255) DEFAULT NULL,
  `estadio` varchar(255) DEFAULT NULL,
  `estado_partido` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ultimos_partidos`
--

INSERT INTO `ultimos_partidos` (`id`, `partido_id`, `puntuacion_local`, `puntuacion_visitante`, `estadio`, `estado_partido`, `created_at`, `updated_at`) VALUES
(5, 1, '0', '2', 'Estadio Eusebio Arce (Camargo)', 'Finalizado', '2024-10-17 10:38:43', '2024-10-17 10:38:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Christopher', 'christopher.quiroz@elayudante.es', NULL, '$2y$12$5KF9.juayt6JM5HUaZ0PeO01IuTUdDFfXgawZPgGxd67n9SFL7.EC', NULL, '2024-09-26 05:53:24', '2024-09-26 05:53:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cuerpo_tecnicos`
--
ALTER TABLE `cuerpo_tecnicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `formulario_acreditacion`
--
ALTER TABLE `formulario_acreditacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `formulario_acreditacion_dni_unique` (`dni`),
  ADD UNIQUE KEY `formulario_acreditacion_token_unique` (`token`),
  ADD KEY `formulario_acreditacion_partido_id_foreign` (`partido_id`);

--
-- Indices de la tabla `formulario_contactar`
--
ALTER TABLE `formulario_contactar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formulario_patrocinadores`
--
ALTER TABLE `formulario_patrocinadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `junta`
--
ALTER TABLE `junta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partidos_equipo_local_id_foreign` (`equipo_local_id`),
  ADD KEY `partidos_equipo_visitante_id_foreign` (`equipo_visitante_id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `prensas`
--
ALTER TABLE `prensas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `ultimos_partidos`
--
ALTER TABLE `ultimos_partidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ultimos_partidos_partido_id_foreign` (`partido_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuerpo_tecnicos`
--
ALTER TABLE `cuerpo_tecnicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formulario_acreditacion`
--
ALTER TABLE `formulario_acreditacion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT de la tabla `formulario_contactar`
--
ALTER TABLE `formulario_contactar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `formulario_patrocinadores`
--
ALTER TABLE `formulario_patrocinadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `junta`
--
ALTER TABLE `junta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `navigations`
--
ALTER TABLE `navigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `prensas`
--
ALTER TABLE `prensas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `ultimos_partidos`
--
ALTER TABLE `ultimos_partidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `formulario_acreditacion`
--
ALTER TABLE `formulario_acreditacion`
  ADD CONSTRAINT `formulario_acreditacion_partido_id_foreign` FOREIGN KEY (`partido_id`) REFERENCES `partidos` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `partidos_equipo_local_id_foreign` FOREIGN KEY (`equipo_local_id`) REFERENCES `equipos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `partidos_equipo_visitante_id_foreign` FOREIGN KEY (`equipo_visitante_id`) REFERENCES `equipos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ultimos_partidos`
--
ALTER TABLE `ultimos_partidos`
  ADD CONSTRAINT `ultimos_partidos_partido_id_foreign` FOREIGN KEY (`partido_id`) REFERENCES `partidos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
