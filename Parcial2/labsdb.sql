-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2023 a las 10:07:21
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
-- Base de datos: `labsdb`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_votos` (IN `param_votos1` VARCHAR(255), IN `param_votos2` VARCHAR(255))   BEGIN
   SET @s= CONCAT("UPDATE votos SET votos1=", param_votos1,", votos2=",param_votos2);
      
   PREPARE stmt FROM @s;
   EXECUTE stmt;
   DEALLOCATE PREPARE stmt;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar` (IN `numero` VARCHAR(255), IN `factorial` VARCHAR(255), IN `sumatoria` VARCHAR(255))   BEGIN
   SET @s = CONCAT('INSERT INTO parcial2 (n, factorial, sumatoria) 
            VALUES (''', numero, ''',''', factorial, ''',''', sumatoria, ''')');
   PREPARE stmt FROM @s;
   EXECUTE stmt;
   DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar` ()   BEGIN
   SELECT * FROM PARCIAL2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_noticias` ()   BEGIN
SELECT id, titulo, texto, categoria, fecha, imagen FROM noticias;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_noticias_filtro` (IN `param_campo` VARCHAR(255), IN `param_valor` VARCHAR(255))   BEGIN
    SET @s = CONCAT("SELECT id, titulo, texto, categoria, fecha, imagen
                 FROM noticias WHERE ", param_campo," LIKE CONCAT('%", param_valor,"%')");
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_votos` ()   BEGIN
    SELECT votos1,votos2 from votos;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_validar_usuario` (IN `param_user` VARCHAR(255), IN `param_pass` VARCHAR(255))   BEGIN
SET @s = CONCAT("SELECT count(*) FROM usuarios 
                WHERE usuario= '", param_user,"' AND clave ='", param_pass,"'");
PREPARE stmt FROM @s;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `texto` text NOT NULL,
  `categoria` enum('promociones','ofertas','costas') NOT NULL DEFAULT 'promociones',
  `fecha` date NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `texto`, `categoria`, `fecha`, `imagen`) VALUES
(1, 'Nueva promocion en Ciudad Cristal', '145 viviendas de lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2019-02-04', NULL),
(2, 'Ultimas viviendas junto al rio', 'Apartamentos de 1 y 2 dormitorios, con fantasticas vistas. Excelentes condiciones de financiacion.', 'ofertas', '2019-02-05', NULL),
(3, 'Apartamentos en el Puerto de San Martin', 'En la Playa del Sol, en primera linea de playa. Pisos reformados y completamente amueblados.', 'costas', '2019-02-06', 'apartamento8.jpg'),
(4, 'Casa reformada en el barrio de la Palmera', 'Dos plantas y atico, 5 habitaciones, patio interior, amplio garaje. Situada en una calle tranquila y a un paso del centro historico.', 'promociones', '2019-02-07', NULL),
(5, 'Promocion en Costa Mar', 'Con vistas al campo de golf, magnificas calidades, entorno ajardinado con piscina y servicio de vigilancia.', 'costas', '2019-02-09', 'apartamento9.jpg'),
(6, 'Vive cerca del Metro de Panama', '100 casas \r\nde lujo en urbanizacion cercana a la estación del metro de Tocumen', 'promociones', '2019-02-10', NULL),
(7, 'Ultimos departamentos  ', 'Apartamentos de 1 \r\ny 2 baños, con fantasticas vistas al parque Omar. Financiacion disponible.', 'ofertas', '2019-02-11', NULL),
(8, 'Apartamentos con vista al Mar', 'En la avenida Balboa\r\ncon vista al mar y centrico de todo. Pisos reformados y completamente \r\namueblados.', 'costas', '2019-02-12', 'apartamento8.jpg'),
(9, 'Vive cerca del Metro de Panama', '100 casas \r\nde lujo en urbanizacion cercana a la estación del metro de Tocumen', 'promociones', '2019-02-10', NULL),
(10, 'Ultimos departamentos  ', 'Apartamentos de 1 \r\ny 2 baños, con fantasticas vistas al parque Omar. Financiacion disponible.', 'ofertas', '2019-02-11', NULL),
(11, 'Apartamentos con vista al Mar', 'En la avenida Balboa\r\ncon vista al mar y centrico de todo. Pisos reformados y completamente \r\namueblados.', 'costas', '2019-02-12', 'apartamento8.jpg'),
(12, 'Casa reposeida en Obarrio', 'Dos \r\nplantas y sotano, 5 habitaciones, patio interior, amplio garaje para 2 carros. Zona\r\ntranquila y a un paso del centro comercial Multiplaza', '', '2019-02-13', NULL),
(13, 'Promocion en Costa del Este', 'Con vistas al campo de \r\ngolf de Santa Maria, magnificas calidades, con piscina y servicio de \r\nvigilancia.', 'costas', '2019-02-14', 'apartamento9.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcial2`
--

CREATE TABLE `parcial2` (
  `ID` int(100) NOT NULL,
  `n` varchar(255) DEFAULT NULL,
  `factorial` varchar(255) DEFAULT NULL,
  `sumatoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parcial2`
--

INSERT INTO `parcial2` (`ID`, `n`, `factorial`, `sumatoria`) VALUES
(9, '5', '120', '2'),
(12, '2', '2', '2'),
(13, '3', '6', '2'),
(14, '3', '6', '2.5'),
(15, '3', '6', '5.5'),
(16, '5', '120', '10.875'),
(17, '3', '6', '2.5'),
(18, '3', '6', '2.5'),
(19, '3', '6', '2.5'),
(20, '3', '6', '2.5'),
(21, '3', '6', '2.5'),
(22, '3', '6', '2.5'),
(23, '2', '2', '2'),
(24, '3', '6', '3.5'),
(25, '3', '6', '4.1666666666667'),
(26, '2', '2', '2.5'),
(27, '2', '2', '2.50'),
(28, '3', '6', '4.17'),
(29, '3', '6', '4.17'),
(30, '2', '2', '3'),
(31, '3', '6', '5.5'),
(32, '3', '6', '5.5'),
(33, '2', '2', '2.5'),
(34, '3', '6', '4.1666666666667'),
(35, '2', '2', '2.5'),
(36, '3', '6', '4.1666666666667'),
(37, '3', '6', '4.1666666666667');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `usuario` varchar(20) NOT NULL DEFAULT '',
  `clave` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`) VALUES
(1, 'testuser', 'teXB5LK3JWG6g');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE `votos` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `votos1` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `votos2` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`id`, `votos1`, `votos2`) VALUES
(1, 53, 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parcial2`
--
ALTER TABLE `parcial2`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `parcial2`
--
ALTER TABLE `parcial2`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
