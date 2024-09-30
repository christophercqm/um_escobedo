-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2024 a las 17:51:04
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
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(8, 'Iván', 'Rumenov', NULL, 1.80, 'Portero', 1, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/5KadjeVOAt3w3InUDtxI0XnxCB1rukjmqYgXfin0.png', '2024-09-30 11:31:36', '2024-09-30 11:31:36'),
(9, 'Laro', 'Gómez', NULL, 1.85, 'Portero', 13, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/zCmaD7Hrmmf9gt69lZtw7tLwXxWk3RRjffpKirMt.png', '2024-09-30 11:34:18', '2024-09-30 11:34:18'),
(10, 'Daniel', 'Martínez', '2003-07-01', 1.75, 'Defensa', 15, 68.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/UHmafoO6H1GxkQBHNIvEX5jvJwktyVHTAEB0rJcx.png', '2024-09-30 11:39:07', '2024-09-30 11:39:07'),
(11, 'Eduardo', 'Fontán', '2001-10-02', 1.77, 'Defensa', 7, 66.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/RtwjKkLP6yZ8yD2vlSARwGITRrad1g9crZJq4iZD.png', '2024-09-30 11:43:16', '2024-09-30 11:43:16'),
(12, 'José', 'Picón', '1988-05-13', 1.83, 'Defensa', 16, 75.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/Bgkof2s2Tm2p1ZU5X9iwqXjFGkhEnm5Vm4de9hfN.png', '2024-09-30 11:46:52', '2024-09-30 11:46:52'),
(13, 'Adrián', 'Cagigal Acebo', NULL, NULL, 'Defensa', 18, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/BjtfL145oi5PMxvMiFld90gmTFiwPj4m10LIOo2H.png', '2024-09-30 11:49:15', '2024-09-30 11:49:15'),
(14, 'Diego', 'Espinosa', NULL, NULL, 'Defensa', 23, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/1NNm783Tss7LQQ58Oh0d1KYSEht8KledvuST4EDQ.png', '2024-09-30 11:52:14', '2024-09-30 11:52:14'),
(15, 'Víctor', 'Ruiz', '2003-01-01', NULL, 'Defensa', 5, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/kMnxz9Bppuu3VIDiIdSFU68kxOoxx9j9UPsNHABR.png', '2024-09-30 11:55:01', '2024-09-30 11:55:01'),
(16, 'Fermín', 'Sánchez', '1996-05-31', 1.76, 'Defensa', 3, 68.00, 'UM Escobedo', 'es', 'Activo', 'jugadores/2fckDSWPtelbhmxcyTDfZZugh0TLTPygHOIxGjfl.png', '2024-09-30 11:57:05', '2024-09-30 11:57:05'),
(17, 'Álvaro', 'Pelayo', '2002-06-08', NULL, 'Defensa', 26, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/QLf4u2miXvE2x5cfoNI5KGF6W0Vk9tfInG880LdM.png', '2024-09-30 11:58:52', '2024-09-30 11:58:52'),
(18, 'Javier', 'Morales', '2003-12-10', 1.80, 'Centrocampista', 4, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/MKeOrE1fN4fWO8watr7zGxq6MevSVItCBiaKm5T2.png', '2024-09-30 12:09:37', '2024-09-30 12:09:37'),
(19, 'Mario', 'Bastante', '2003-03-05', 1.72, 'Centrocampista', 2, 65.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/LRPOfAdNoIF0zAVVNCVVPAtidMk0IXN8ZEP16Bdq.png', '2024-09-30 12:35:28', '2024-09-30 12:35:28'),
(20, 'Juan', 'Casar', NULL, NULL, 'Centrocampista', 21, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/DJwBDt8MaXIfMs519lILhPiovr9wN6PaQ22BDeMO.png', '2024-09-30 12:37:50', '2024-09-30 12:37:50'),
(21, 'David', 'Somaza', '1996-09-09', NULL, 'Centrocampista', 8, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/rLRvtzvp9v2tz1jvGJ5T8aFLzK7LAMsZyeC2pUv6.png', '2024-09-30 12:39:17', '2024-09-30 12:39:17'),
(22, 'Izam', 'Ortiz', '2002-10-29', 175.00, 'Centrocampista', 6, 65.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/YERGqgukxUzsP6qQ58AQEV4Auquv4hod8HA4yMoj.png', '2024-09-30 12:41:00', '2024-09-30 12:41:00'),
(23, 'Raúl', 'Tresgallo', '1997-07-26', NULL, 'Centrocampista', 14, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/PZW6deS4JGrSJSlsAjfX0wJoGxO78KWwTc4BxS6f.png', '2024-09-30 12:42:17', '2024-09-30 12:42:17'),
(24, 'Gonzalo', 'Peña', '1998-05-15', NULL, 'Delantero', 11, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/s9qx9aICk3YPykpGwoaxKwab6kro4frJAEEtTc1r.png', '2024-09-30 12:45:23', '2024-09-30 12:45:23'),
(25, 'Nacho', 'Martínez', '1990-04-11', 185.00, 'Delantero', 9, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/SdMt4HIrqv08QiDejQIbZQ9IyehH2YpMioDu2kJ9.png', '2024-09-30 12:46:34', '2024-09-30 12:46:34'),
(26, 'Aaron', 'Fernández', '2002-11-16', 176.00, 'Delantero', 22, 62.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/ChwfdQMdshI4bHFkuLQHPH4iGvrD9xSef3QYF248.png', '2024-09-30 12:47:38', '2024-09-30 12:47:38'),
(27, 'Mateo', 'Gandarillas', '2001-01-20', 173.00, 'Delantero', 10, 64.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/vPyMH8o6h0BzJbohIzGSvR3D2nbhwpN7sM2Bl7Iw.png', '2024-09-30 12:48:54', '2024-09-30 12:48:54'),
(28, 'Jay', 'Romero', '2002-10-12', NULL, 'Delantero', 20, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/Vm7URdFOAW7Q1xGSuPMubxIARvv7JrDBDlazRZ4p.png', '2024-09-30 12:50:30', '2024-09-30 12:50:30'),
(29, 'Miguel', 'Saza', '1999-10-29', NULL, 'Delantero', 19, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/K6BdH70ne7gwdUgQC6pMNLrvIGIPrKcaQjjFWfpk.png', '2024-09-30 12:52:56', '2024-09-30 12:52:56'),
(30, 'Adrián', 'Villasana', NULL, NULL, 'Delantero', 17, NULL, 'UM Escobedo', 'España', 'Activo', 'jugadores/Zi2719YLm14Ounav4FZoSs0ZfdkiKuV8N4wm6kxv.png', '2024-09-30 12:54:41', '2024-09-30 12:54:41'),
(31, 'Samu', 'Basterrechea', '2001-04-01', 176.00, 'Delantero', 0, 77.00, 'UM Escobedo', 'España', 'Activo', 'jugadores/HegUdgVBDQXNmNeKapM9Q14tyXnbyMoguQLP5QDu.png', '2024-09-30 12:56:09', '2024-09-30 12:56:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juntas`
--

CREATE TABLE `juntas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(17, '2024_09_30_130511_modify_jugadores_table', 6);

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
(65, 'prensa/gxoktp8ti0aDDWJxl0zjpKjrsMIl61RL1Vocga1i.jpg', 'El Escobedo Asalta el Adolfo Suárez', 'La Unión Montañesa Escobedo ha cosechado un triunfo de quitales (0-1), el primero de su historia en Segunda Federación, rompiendo además la imbatibilidad del Real Ávila. Y es que el conjunto local llegaba al encuentro sin haber perdido ningún partido y sin haber recibido gol alguno en lo que llevábamos de temporada.', '<p>La Unión Montañesa Escobedo ha cosechado un triunfo de quitales (0-1), el primero de su historia en Segunda Federación, rompiendo además la imbatibilidad del Real Ávila. Y es que el conjunto local llegaba al encuentro sin haber perdido ningún partido y sin haber recibido gol alguno en lo que llevábamos de temporada.\n\nEl partido se desarrolló con mucha intensidad desde el pitido inicial, sucediéndose poco a poco las ocasiones en ambas áreas. El primer aviso serio llegó por parte del Escobedo, con un disparo lejano de Mario Bastante repelido por la madera. Acto seguido, Laro tuvo que intervenir de manera crucial para evitar el gol del conjunto encarnado colocando una buena mano a un disparo que se colaba lamiendo la cepa del poste. En el 37\' tuvo lugar la ocasión más clara del primer tiempo. Aarón, muy atento, aprovechó una indecisión entre el defensa y el portero y, tras sortear a este último, envió el cuero fuera. El Escobedo estaba perdonando el primero.\n\nTras la reanudación los camargueses salieron arrolladores. En el minuto 47\', un centro de Nacho era cabeceado por Izam y, cuando todo el mundo asumía el gol, el portero rival intervino con una prodigiosa mano sobre la línea. En el córner posterior, un remate de Mateo era interceptado por Saza que, tras un gran control, definió a la perfección para estallido de júbilo visitante.\n\nLos locales lo intentaron una y otra vez, aunque el buen hacer del Escobedo, que tampoco renunciaba a salir con peligro al contragolpe, impedía la claridad en las oportunidades. Sin embargo, en dos acciones los abulenses rozaron el tanto del empate. Primero con un remate a bocajarro en el minuto 79 que salvó Espinosa sobre la línea de gol. Más tarde, ya en el segundo de los 8 minutos añadidos por el trencilla, Laro intervino de nuevo para repeler un cabezazo en el segundo palo que se colaba al fondo de la red.\n\nEn definitiva, un triunfo muy meritorio que no solo es importante en lo clasificatorio, sino también en lo psicológico, puesto que los pupilos de Samuel San José han demostrado que pueden ganar en cualquier campo sin importar el rival.</p>', '2024-09-27 11:01:36', '2024-09-27 09:01:36', '2024-09-30 07:21:46', 1, 'cronicas'),
(66, 'prensa/0AlucHoxRXwhOZjwXXRzTjZP1fwZ4CKBMeGhy3aP.jpg', 'Un empate para seguir creciendo', 'El Eusebio Arce, que presentó un magnífico aspecto, acogió el primero de los tres derbis que tendrán lugar esta temporada.', 'El Eusebio Arce, que presentó un magnífico aspecto, acogió el primero de los tres derbis que tendrán lugar esta temporada.\r\n\r\nUnión Montañesa Escobedo y Real Sociedad Gimnástica llegaban al encuentro con la imperiosa necesidad de sumar, cosa que hicieron, aunque quizás no de la manera que deseaban.\r\n\r\nSalió mejor al encuentro un Escobedo que, resguardado atrás, creaba mucho peligro al contragolpe. Fruto de ello vino la primera opción clara de gol en una internada de Mateo que no pudo culminar Aarón por poco. Quince minutos más tarde, en el 17\', llegó el tanto local. En una jugada prácticamente calcada a la comentada anteriormente, Mateo cedió el cuero a Aarón, cuya definición se estrelló en el palo, aprovechando de nuevo Mateo el rechace para embocar y poner el primero.\r\n\r\nA partir del 1-0 y hasta el término de la primera mitad, la Gimnástica demostró su poderío y acosó continuamente la portería defendida por Laro. Numerosos disparos desviados y, sobre todo, un balón que sacó Picón sobre la línea, hacían presagiar que el empate estaba cerca. Sin embargo, se llegó al intermedio con ventaja para el Escobedo. 1-0.\r\n\r\nTras la reanudación, el dominio visitante no fue tan evidente. De hecho, fue el Escobedo quien estuvo a punto de ampliar ventaja. Nacho, que cuajó un partido sensacional, estampó una preciosa volea en el larguero cuando gran parte de la grada ya cantaba el gol.\r\n\r\nEn el 57\', y quizás cuando mejor estaban los locales, vino el gol de la Gimnástica. Primo aprovechó un rebote para, solo en área pequeña, fusilar la meta blanquinegra.\r\n\r\nLa última media hora fue muy igualada, aunque con más empuje por parte del Escobedo, viviéndose más cerca del 2-1 que del 1-2. Y es que ambos equipos mostraban su disconformidad con el empate gozando de espacios en ataque, aunque la falta de acierto impidió que se moviera la contienda.', '2024-09-27 11:15:04', '2024-09-27 09:15:04', '2024-09-27 09:15:04', 1, 'cronicas'),
(67, 'prensa/XDxQDso0CHdAidbAn9rjwP8a1WwOvSDIkJKQZtwH.jpg', 'Sabor amargo en el primer derbi de la temporada', 'El Laredo se lleva un partido en el que los de Samuel San José estuvieron muy cerca de sumar.', 'El Laredo se lleva un partido en el que los de Samuel San José estuvieron muy cerca de sumar.\r\n\r\nPejinos y camargueses se dieron cita sobre el siempre impoluto césped de San Lorenzo, en un partido igualado que se decantó para los locales.\r\n\r\nEl Escobedo salió con las ideas claras y, fruto de ello, vino la primera gran ocasión del encuentro. En el segundo minuto, un robo en la frontal permitió a Mateo sortear a su par y, en posición óptima, enganchar un zurdazo que se marchó alto. En estos primeros compases el Laredo llevaba el peso del encuentro, pero sin ningún peligro hacia la portería defendida por Laro. De hecho, era el Escobedo el que, con algún disparo lejano, obligaba a Puras a intervenir.\r\n\r\nEn el ecuador del primer acto llegó la ocasión más clara para el Charles. Una falta sin aparente peligro fue botada de manera magistral por Isuardi, que estrelló el balón en la cruceta. Hasta el entretiempo el partido siguió con la misma tónica: posesión local, pero sin peligro.\r\n\r\nTras la reanudación salieron más enchufados los pupilos de Mario Gutiérrez y, a consecuencia de ello, vieron como el árbitro les anulaba un gol por fuera de juego. Acto seguido, Diego Marta también desperdiciaría una clara ocasión. A los pocos minutos, cuando se cumplía el 60\', llegaría el tanto del Laredo. Vassi se marchaba muy bien de Edu y, tras un rebote, el esférico le quedaba a David Sanz para que empujara a placer.\r\n\r\nEl Escobedo, tras mover ficha en el banquillo, reaccionó muy bien al tanto en contra. Y es que la última media hora fue de claro dominio blanquinegro. Aarón comenzó avisando con un peligroso disparo que se marchó alto. Los de Samuel San José lo seguían buscando y disfrutaban de llegadas con mucho peligro que eran abortadas por la zaga local. La más clara del partido llegó cuando restaban apenas 15 minutos para la conclusión. Raúl envió un pase de la muerte, Puras rozó el balón y Somaza se quedó a centímetros de embocar a portería vacía.\r\n\r\nYa en el 86\', una dura entrada de Marta le costó la roja directa, lo cual incrementó aún más el dominio visitante, aunque sin premio final.', '2024-09-27 11:17:19', '2024-09-27 09:17:19', '2024-09-27 09:17:19', 1, 'cronicas'),
(68, 'prensa/0b93RcAm6clRyapZ9ac5h67o4rsdT5ezpmwA0h0x.jpg', 'Escuela UM Escobedo', '¿Quieres que tu hij@ comience a jugar al futbol pero crees que aún es demasiado pequeñ@?', '¡Nosotros tenemos la 𝙨𝙤𝙡𝙪𝙘𝙞ó𝙣!🔑\r\nInscríbete y gana la camiseta del primer equipo de regalo.', '2024-09-27 11:23:23', '2024-09-27 09:23:23', '2024-09-27 09:23:23', 1, 'actualidad'),
(69, 'prensa/H8tLYRc4S9QgysusiG9bUiPJrAtdnpok63fT1uvC.jpg', 'U.M. Escobedo', 'Ángel Díez (entrenador de porteros), David López \"Camy\" (segundo entrenador) y Pablo Martínez(readaptador) se incorporan al cuerpo técnico de la UM Escobedo de cara a la temporada 24/25.', 'Ángel Díez (entrenador de porteros), David López \"Camy\" (segundo entrenador) y Pablo Martínez(readaptador) se incorporan al cuerpo técnico de la UM Escobedo de cara a la temporada 24/25.', '2024-09-27 11:28:29', '2024-09-27 09:28:29', '2024-09-27 09:28:29', 1, 'actualidad'),
(70, 'prensa/ot4ReEjzzB21m5DyM5GiJIh66EetwMDnIQFdapMD.jpg', 'PLAN SEMANAL', 'Arranca la primera semana de competición, en la que nuestro equipo entrenará 4 días antes de recibir el próximo sábado al @salamancacfuds en el Eusebio Arce (17:00h).', 'Arranca la primera semana de competición, en la que nuestro equipo entrenará 4 días antes de recibir el próximo sábado al @salamancacfuds en el Eusebio Arce (17:00h).', '2024-09-27 11:29:46', '2024-09-27 09:29:46', '2024-09-27 09:29:46', 1, 'actualidad');

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
('SSaKMmHxloYcu5n76N9rUh6NMZ95KJyPeWXHxcm4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTDFoUDRNamhRUmczMXFKMzFxZzRFTXl4VlpweU5STFplNWZUUVA3UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcmltZXItZXF1aXBvIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1727711251);

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
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indices de la tabla `juntas`
--
ALTER TABLE `juntas`
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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `juntas`
--
ALTER TABLE `juntas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT de la tabla `prensas`
--
ALTER TABLE `prensas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
