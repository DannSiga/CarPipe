CREATE TABLE IF NOT EXISTS `info` (
  `id_info` int(11) NOT NULL DEFAULT '0',
  `nombre_inf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actividad` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;