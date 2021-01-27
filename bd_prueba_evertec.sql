-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-01-2021 a las 04:09:25
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `venobrac_evertec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `customer_email` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `customer_mobile` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_product` int(11) NOT NULL,
  `requestId` text COLLATE utf8mb4_spanish_ci,
  `reference` text COLLATE utf8mb4_spanish_ci,
  `processUrl` text COLLATE utf8mb4_spanish_ci,
  `status` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `message` text COLLATE utf8mb4_spanish_ci,
  `date_trans` text COLLATE utf8mb4_spanish_ci,
  `method` text COLLATE utf8mb4_spanish_ci,
  `ref_int` text COLLATE utf8mb4_spanish_ci,
  `bank` text COLLATE utf8mb4_spanish_ci,
  `id_cliente` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `llave_secreta` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `token` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `customer_mobile`, `id_product`, `requestId`, `reference`, `processUrl`, `status`, `message`, `date_trans`, `method`, `ref_int`, `bank`, `id_cliente`, `llave_secreta`, `token`, `created_at`, `updated_at`) VALUES
(1, 'JAIR LEONARDO ZEA', 'jairzeapaez@gmail.com', '321709818', 3, '32434', 'TEST_1611710754', 'https://dev.placetopay.com/redirection/session/32434/4c27df0e65cacc1dd457f9b5b3832019', 'APPROVED', 'Aprobada', '2021-01-26T20:26:12-05:00', 'Visa', '7403', 'BANCO DE PRUEBAS', 'a2ya10arfxKaJ4/2JgYTCdmnH/DT..iUKz3tUvwroJ3bp1JKZS1MaOTDgYwy', 'o2yo12oZvkSTzXtfg5OH4W.NANK/.FOAS9JhQXzl4VgreY7ovD2MV5qWpOAC', 'Basic YTJ5YTEwYXJmeEthSjQvMkpnWVRDZG1uSC9EVC4uaVVLejN0VXZ3cm9KM2JwMUpLWlMxTWFPVERnWXd5Om8yeW8xMm9admtTVHpYdGZnNU9INFcuTkFOSy8uRk9BUzlKaFFYemw0VmdyZVk3b3ZEMk1WNXFXcE9BQw==', '2021-01-27 06:25:40', '2021-01-27 06:26:19'),
(2, 'JAIR LEONARDO ZEA', 'jairzeapaez@gmail.com', '3217098185', 3, '32435', '2TEST_1611712389', 'https://dev.placetopay.com/redirection/session/32435/18c8571110e7c4e239fbd428997f7bf0', 'CREATED', NULL, NULL, NULL, NULL, NULL, 'a2ya10aWPOh/nT9yaH1NO8QiQI5ze5fr4L53RroWjU3tdmK2lKZ2TP3lhSPy', 'o2yo12o.KSUsP7WuZcqEGWHnJU4P.F1jBEJdNXTeBUmXktphcZEDVc8.EcC.', 'Basic YTJ5YTEwYVdQT2gvblQ5eWFIMU5POFFpUUk1emU1ZnI0TDUzUnJvV2pVM3RkbUsybEtaMlRQM2xoU1B5Om8yeW8xMm8uS1NVc1A3V3VaY3FFR1dIbkpVNFAuRjFqQkVKZE5YVGVCVW1Ya3RwaGNaRURWYzguRWNDLg==', '2021-01-27 06:53:01', '2021-01-27 06:53:09'),
(3, 'JAIR LEONARDO ZEA', 'jairzeapaez@gmail.com', '1233455', 4, '32436', '3TEST_1611714670', 'https://dev.placetopay.com/redirection/session/32436/f318d893b2f3334640a36023f8249958', 'APPROVED', 'Aprobada', '2021-01-26T21:31:26-05:00', 'Visa', '7405', 'BANCO DE PRUEBAS', 'a2ya10aVByYd9B7R3.amNT/nXqHROSmXvmgRsbC8dU5gVT51VTXiX7kTRtEq', 'o2yo12owMtlZm/.OR8ZO3PKq.vV8e.Dj5BwqiAKRiOcz6U6zscfe8sXfi0ay', 'Basic YTJ5YTEwYVZCeVlkOUI3UjMuYW1OVC9uWHFIUk9TbVh2bWdSc2JDOGRVNWdWVDUxVlRYaVg3a1RSdEVxOm8yeW8xMm93TXRsWm0vLk9SOFpPM1BLcS52VjhlLkRqNUJ3cWlBS1JpT2N6NlU2enNjZmU4c1hmaTBheQ==', '2021-01-27 07:31:05', '2021-01-27 07:34:22'),
(4, 'JAIR LEONARDO ZEA', 'jairzeapaez@gmail.com', '3214626732', 3, '32437', '4TEST_1611720663', 'https://dev.placetopay.com/redirection/session/32437/0200f53e954346e84f2129b147158d42', 'REJECTED', 'Negada Establecimiento debe comunicarse con el centro de autorizaciones', '2021-01-26T23:11:30-05:00', 'Visa', '7406', 'BANCO DE PRUEBAS', 'a2ya10ay2rNk17CKvrIuVEkW/cbUedAoVIWiuKZG4lJzPEeiWn4LoayLFUzW', 'o2yo12oLv/Xj2H5UpnvjMdzEtu7d.KWAhQ1NP2LizqdrlLUmv8VxERDZn8IW', 'Basic YTJ5YTEwYXkyck5rMTdDS3ZySXVWRWtXL2NiVWVkQW9WSVdpdUtaRzRsSnpQRWVpV240TG9heUxGVXpXOm8yeW8xMm9Mdi9YajJINVVwbnZqTWR6RXR1N2QuS1dBaFExTlAyTGl6cWRybExVbXY4VnhFUkRabjhJVw==', '2021-01-27 09:10:56', '2021-01-27 09:11:33'),
(5, 'JAIR LEONARDO ZEA', 'jairzeapaez@gmail.com', '2345678', 2, '32439', '5TEST_1611722717', 'https://dev.placetopay.com/redirection/session/32439/51afeb6de3e5a820e528f177a4f64332', 'PENDING', NULL, NULL, NULL, NULL, NULL, 'a2ya10aO2DAs4uaNyQa3kwIF.RVtu/ffP2xByPCH89rMd2ySa1YDasUubCZK', 'o2yo12oWS4eW4mSDK4r1jdPxYIkFO0dWzEZtsH4kByMrRWSoMVq1vIzZE9IK', 'Basic YTJ5YTEwYU8yREFzNHVhTnlRYTNrd0lGLlJWdHUvZmZQMnhCeVBDSDg5ck1kMnlTYTFZRGFzVXViQ1pLOm8yeW8xMm9XUzRlVzRtU0RLNHIxamRQeFlJa0ZPMGRXekVadHNINGtCeU1yUldTb01WcTF2SXpaRTlJSw==', '2021-01-27 09:26:23', '2021-01-27 09:45:46'),
(6, 'Lisney hernandez', 'lisneyhernandez@gmail.com', '3112873757', 3, '32440', '6TEST_1611727354', 'https://dev.placetopay.com/redirection/session/32440/cd3be564697ac3989f868858f27d36a0', 'PENDING', NULL, NULL, NULL, NULL, NULL, 'a2ya10apRhV/Y/iAa4GtgyPtwRPhujniagH2wPexHWCh43m3X/PhmTFBn3ye', 'o2yo12oa5g/xqcqSZRF9ueQ6H.nKOUMC2g2s3B1f9h2FGOsRcgPPpwFB7BKu', 'Basic YTJ5YTEwYXBSaFYvWS9pQWE0R3RneVB0d1JQaHVqbmlhZ0gyd1BleEhXQ2g0M20zWC9QaG1URkJuM3llOm8yeW8xMm9hNWcveHFjcVNaUkY5dWVRNkgubktPVU1DMmcyczNCMWY5aDJGR09zUmNnUFBwd0ZCN0JLdQ==', '2021-01-27 11:01:59', '2021-01-27 11:06:55'),
(7, 'JAIR LEONARDO ZEA', 'jairzeapaez@gmail.com', '3217098285', 5, '32444', '7TEST_1611736189', 'https://dev.placetopay.com/redirection/session/32444/070b4f730f4d4897c47200b31539da12', 'APPROVED', 'Aprobada', '2021-01-27T03:27:29-05:00', 'Visa', '7412', 'BANCO DE PRUEBAS', 'a2ya10af6EUS5Vqu0mnfvDwtGBkHu6HlqNoArPh6lvL8Sjp4ENCFvLMjLh8q', 'o2yo12oYTQjEosESG87wgE4S1eGJ.PJEGkMe.ZiCurtVR39FYG9RiopLAsfO', 'Basic YTJ5YTEwYWY2RVVTNVZxdTBtbmZ2RHd0R0JrSHU2SGxxTm9BclBoNmx2TDhTanA0RU5DRnZMTWpMaDhxOm8yeW8xMm9ZVFFqRW9zRVNHODd3Z0U0UzFlR0ouUEpFR2tNZS5aaUN1cnRWUjM5RllHOVJpb3BMQXNmTw==', '2021-01-27 13:09:50', '2021-01-27 13:29:49'),
(8, 'JAIR ZEA', 'jairzeapaez@gmail.com', '32145678', 1, '32446', '8TEST_1611736509', 'https://dev.placetopay.com/redirection/session/32446/84a7bf021ac2ff3d97c18b176203a8cb', 'APPROVED', 'Aprobada', '2021-01-27T03:35:26-05:00', 'Visa', '7414', 'BANCO DE PRUEBAS', 'a2ya10aUkvrxnReWmuw87h00NY5YuObfwG4Gyrqs1zg/wls9qnauK5Tm8eMG', 'o2yo12oSVKx5QMMm1hWo5U26hIX4OOi8P5IbGL3FshU.KqD4DFBxyKvQ4RiC', 'Basic YTJ5YTEwYVVrdnJ4blJlV211dzg3aDAwTlk1WXVPYmZ3RzRHeXJxczF6Zy93bHM5cW5hdUs1VG04ZU1HOm8yeW8xMm9TVkt4NVFNTW0xaFdvNVUyNmhJWDRPT2k4UDVJYkdMM0ZzaFUuS3FENERGQnh5S3ZRNFJpQw==', '2021-01-27 13:30:38', '2021-01-27 13:35:31'),
(9, 'JAIR LEONARDO ZEA', 'lisneyhernandez@gmail.com', '321709878', 3, '32447', '9TEST_1611736689', 'https://dev.placetopay.com/redirection/session/32447/f98ea177b6f819c13de5ca571666b3da', 'APPROVED', 'Aprobada', '2021-01-27T03:39:16-05:00', 'Visa', '7415', 'BANCO DE PRUEBAS', 'a2ya10a4gHGXCvZPxpn54OzhZicseA.zmBkxtdMTCB8sj2.nopq8A/US9oX2', 'o2yo12oT6xn66TzJHho.aPImQYpfuh9FtWAi10WyTz8KL5llZyWqaN6VBhoe', 'Basic YTJ5YTEwYTRnSEdYQ3ZaUHhwbjU0T3poWmljc2VBLnptQmt4dGRNVENCOHNqMi5ub3BxOEEvVVM5b1gyOm8yeW8xMm9UNnhuNjZUekpIaG8uYVBJbVFZcGZ1aDlGdFdBaTEwV3lUejhLTDVsbFp5V3FhTjZWQmhvZQ==', '2021-01-27 13:38:03', '2021-01-27 13:39:21'),
(10, 'JAIR LEONARDO ZEA', 'jairzeapaez@gmail.com', '2345678876', 3, '32448', '10TEST_1611737322', 'https://dev.placetopay.com/redirection/session/32448/86d96edb66aad4cd789d30a12800956d', 'PENDING', NULL, NULL, NULL, NULL, NULL, 'a2ya10aizbpmAtCk88EWQMye8dNMe9vvlHlbevwCSpmrvgbr2hzFHgUASnTK', 'o2yo12oSKW2.2Fe8o405kMV0LQSk.f2Rhz.aTwfLrBEyl5/7NZSgf/6Z48va', 'Basic YTJ5YTEwYWl6YnBtQXRDazg4RVdRTXllOGROTWU5dnZsSGxiZXZ3Q1NwbXJ2Z2JyMmh6RkhnVUFTblRLOm8yeW8xMm9TS1cyLjJGZThvNDA1a01WMExRU2suZjJSaHouYVR3ZkxyQkV5bDUvN05aU2dmLzZaNDh2YQ==', '2021-01-27 13:47:52', '2021-01-27 13:52:28'),
(11, 'JAIR ZEA', 'jairzeapaez@gmail.com', '3217098185', 4, NULL, NULL, NULL, 'CREATED', NULL, NULL, NULL, NULL, NULL, 'a2ya10a6r8f87jfCWAOLMUj55hiXuYJ4sn0VgH0S3bMi3EnnEG1HZYO.TqMa', 'o2yo12osmQ2SXuVTRNgWAaKLGspduMJ.42N3FJyDWCwf63ohFWdn658rYOha', 'Basic YTJ5YTEwYTZyOGY4N2pmQ1dBT0xNVWo1NWhpWHVZSjRzbjBWZ0gwUzNiTWkzRW5uRUcxSFpZTy5UcU1hOm8yeW8xMm9zbVEyU1h1VlRSTmdXQWFLTEdzcGR1TUouNDJOM0ZKeURXQ3dmNjNvaEZXZG42NThyWU9oYQ==', '2021-01-27 13:59:21', '2021-01-27 13:59:21'),
(12, 'JAIR ZEA', 'jairzeapaez@gmail.com', '2345678', 3, NULL, NULL, NULL, 'CREATED', NULL, NULL, NULL, NULL, NULL, 'a2ya10aMJ47VaX0qlbP5TPM8qx3be2V/w58Z.khze6fzuENvvBSBK8oBpKiq', 'o2yo12oQb3sq0rZShF8SDSBvriaTON.mEuF.Y8OwGgxLQYWprcIOmHFp.iVy', 'Basic YTJ5YTEwYU1KNDdWYVgwcWxiUDVUUE04cXgzYmUyVi93NThaLmtoemU2Znp1RU52dkJTQks4b0JwS2lxOm8yeW8xMm9RYjNzcTByWlNoRjhTRFNCdnJpYVRPTi5tRXVGLlk4T3dHZ3hMUVlXcHJjSU9tSEZwLmlWeQ==', '2021-01-27 14:08:50', '2021-01-27 14:08:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `description` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `img` text COLLATE utf8mb4_spanish_ci,
  `sales` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `img`, `sales`, `created_at`, `updated_at`) VALUES
(1, 'Zapatos elegantes 1', '<p><strong style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500</span><br></p>', 200000, 'https://i2.wp.com/www.zapatos.shopping/wp-content/uploads/2015/01/zapatos-hombre.jpg', NULL, '2021-01-27 00:22:27', '2021-01-27 02:53:03'),
(2, 'Zapatos elegantes 2', '<p><strong style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500</span><br></p>', 300000, 'https://falabella.scene7.com/is/image/FalabellaCO/4193337_1?wid=800&hei=800&qlt=70', NULL, '2021-01-27 00:23:15', '2021-01-27 02:44:51'),
(3, 'Zapatos elegantes 3', '<p><strong style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500</span><br></p>', 400000, 'https://repunte.com/wp-content/uploads/2018/05/Botines.jpg', NULL, '2021-01-27 00:23:53', '2021-01-27 13:55:20'),
(4, 'Zapatos elegantes 4', '<p><span style=\"background-color: rgb(249, 249, 249);\">Esta es una&nbsp;</span><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">descripcion&nbsp;</font><span style=\"background-color: rgb(249, 249, 249);\">desde el hosting a las 3 de la mañana y 8 minutos, ya tengo sueño!</span><br></p>', 500000, 'https://i2.wp.com/www.zapatos.shopping/wp-content/uploads/2015/01/zapatos-hombre.jpg', NULL, '2021-01-27 00:25:52', '2021-01-27 13:55:54');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_orders_products`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_orders_products` (
`nombre` varchar(80)
,`telefono` varchar(40)
,`email` varchar(120)
,`created_at` timestamp
,`id_producto` int(11)
,`estado` varchar(20)
,`url_pago` text
,`referencia_orden` text
,`requestId` text
,`updateD_at` timestamp
,`id_orden` int(11)
,`id_cliente` text
,`llave_secreta` text
,`nombre_producto` text
,`precio_producto` int(11)
,`imagen_producto` text
,`descripcion_producto` text
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_orders_products`
--
DROP TABLE IF EXISTS `vista_orders_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`venobrac`@`localhost` SQL SECURITY DEFINER VIEW `vista_orders_products`  AS  select `o`.`customer_name` AS `nombre`,`o`.`customer_mobile` AS `telefono`,`o`.`customer_email` AS `email`,`o`.`created_at` AS `created_at`,`o`.`id_product` AS `id_producto`,`o`.`status` AS `estado`,`o`.`processUrl` AS `url_pago`,`o`.`reference` AS `referencia_orden`,`o`.`requestId` AS `requestId`,`o`.`updated_at` AS `updateD_at`,`o`.`id` AS `id_orden`,`o`.`id_cliente` AS `id_cliente`,`o`.`llave_secreta` AS `llave_secreta`,`p`.`name` AS `nombre_producto`,`p`.`price` AS `precio_producto`,`p`.`img` AS `imagen_producto`,`p`.`description` AS `descripcion_producto` from (`orders` `o` join `products` `p` on((`o`.`id_product` = `p`.`id`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
