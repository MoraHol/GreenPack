-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-11-2019 a las 17:22:36
-- Versión del servidor: 10.3.15-MariaDB
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
-- Base de datos: `greenpack`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `about`
--

CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `title` text COLLATE utf8_spanish_ci NOT NULL,
  `content` text COLLATE utf8_spanish_ci NOT NULL,
  `image` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `about`
--

INSERT INTO `about` (`id_about`, `title`, `content`, `image`) VALUES
(1, 'EL AMOR DE GREENPACK HACIA EL MEDIO AMBIENTE', '<p class=\"f24 normal\">Nuestro esp&iacute;ritu protector del medio ambiente nos permiti&oacute; destacarnos en el mercado por ser los primeros en traer al pa&iacute;s materias primas totalmente biodegradables para transformarlos en grandiosos empaques. Materias primas como papeles v&iacute;rgenes de fibras largas (sustituto de los reciclados en empaques primarios), papeles antigrasa (sustituto de los parafinados) y Biopol&iacute;meros (sustituto de los pl&aacute;sticos a base de petr&oacute;leo) para laminaci&oacute;n y ventanillas. Todas las materias primas tienen certificaciones no solo ambientales sino aptas para entrar en contacto directo con alimentos (Empaque primario).</p><p class=\"f24 normal\">Hemos registrado como marcas EMPAQUES VERDES (la traducci&oacute;n de nuestro nombre) y GREENBAGS, una nueva l&iacute;nea de productos con materiales laminados a base de ma&iacute;z; totalmente biodegradables, especiales para empaques de caf&eacute; y productos org&aacute;nicos, creando la oportunidad para que estos productos tengan los mejores empaques.</p><p class=\"text-center\"><img src=\"/images/greenbags_logo_verde.png\" alt=\"\" width=\"150\" class=\"fr-fic fr-dii\"><img src=\"/images/greenpack_logo_verde.png\" alt=\"\" width=\"150\" class=\"fr-fic fr-dii\"> <img src=\"/images/empaques_verdes_logo_verde.png\" alt=\"\" width=\"150\" class=\"fr-fic fr-dii\"></p><p><br></p>', '/images/sea.jpg'),
(2, 'NUESTRO COMPROMISO', '<p>Nuestros empaques desentonan naturalmente, se han actualizado en todas las &aacute;reas requeridas para manejar un beneficio fenomenal.&nbsp;</p><p>Con el fin de ayudar a nuestro planeta tierra y a nuestra salud, hemos implementado el mejoramiento continuo, capacitado a nuestro m&aacute;s valioso talento humano, disminuido la reducci&oacute;n de desperdicios, he implementado pol&iacute;ticas de responsabilidad social y ambiental. Somos un medio de concientizaci&oacute;n y difusi&oacute;n de las pr&aacute;cticas a seguir.</p>', '/images/AdobeStock_256856590_Preview.jpeg'),
(3, 'QUIENES SOMOS', '<p>GREENPACK es una empresa innovadora que naci&oacute; para actuar y guiar a un mercado que necesita un cambio. Hoy en d&iacute;a, gracias a la normativa que protege al medioambiente, nuestra conciencia de seguir por un camino verde que no se detiene y la conciencia de cambio que se ha generado alrededor del mundo, Greenpack ha logrado posicionarse y obtener un completo reconocimiento del mercado como transformador e innovador en soluciones de empaques biodegradables.&nbsp;</p><p>Dentro de nuestro cat&aacute;logo de productos; ofrecemos una amplia variedad de Bolsas, Cajas y Soportes, Sacos Industriales y empaques agroindustriales, l&aacute;minas y etiquetas, todos ellos con la m&aacute;s alta calidad.&nbsp;</p><p>En el a&ntilde;o 2015 cumplimos 10 a&ntilde;os ejecutando y renovando nuestra visi&oacute;n generada en el 2006: Ser reconocida en Colombia como la primera elecci&oacute;n del mercado de empaques biodegradables.&nbsp;</p><p>Contamos con los mejores clientes de Colombia y exportamos a varios pa&iacute;ses de Am&eacute;rica y Europa.</p>', 'https://greenpack.com.co/wp-content/uploads/2017/07/bg-nuestra-empresa.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admins` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(512) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_role` int(11) NOT NULL,
  `password` varchar(257) COLLATE utf8_spanish_ci NOT NULL,
  `token_password` varchar(512) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admins`, `name`, `last_name`, `email`, `phone`, `id_role`, `password`, `token_password`) VALUES
(4, 'Alexis ', 'Holguin', 'alex.holguin@teenus.com.co', '3222724734', 2, '895d196a3ec8b67ff75fb6bd278bcef9c992838f0e67fd999460721800988918', 'as'),
(5, 'segio', 'velandia', 'sergio.velandia@teenus.com.co', '', 1, 'e77cb994418f5bc0ec1007b6c137918d9aed4e7b0bde45d74a50d09272c2d602', '241ec18bf89159c515f08e58b4395c781089ec507354b1f6bb469c6b2e094d383d2b4810d128911d18b7f06d4d0dda73587cb31a4f4260dfaa6475d2b3dcfb4dba94988189e2d381094d74be6e651f8045c69e866cb22b4d103860e2dbcdd17921c3bf90cdadbc7ef4723535aa330f1a260e0a3f9afc1fa162c9be30a92e95464a4a394ebbddcc4b87ee8072ff6f8714da3adb184ff5783612ffef0350c593d3dd992bb28dbc84c10aac48cf374fed6a46e524996de2feb9d2af0a54dd8abb3e02bd9429e5d16b6029dead90fbaf05a4070ef0e7f3d2c9cb301280956f424e506adfb5d38d5f9bcb38c037a698a8de7fd11ceaa09a25126596d3962c4818c37b'),
(6, 'martha', 'olmos', 'martha.olmos@teenus.com.co', '87668877', 1, 'fb4db363ff68c72fede366b5c92ecaeb23a770b9fbd41ef5b8cb0413e3fc7f1d', '1d48ba9e451ae8934c86f7d80de936ff161af596cd47593a7e5d74c4821d7daf534e44b27cdd985349470bf94aebcd46e20be71078936cdadb7e839092e3aa7a742133887a9831e51a9a36b272328ae23a566614518fd66179688876790f13981e86df6ed2225a4d08d6661865681ea9a34bd130ebc8214833f445068e11847a70fefacabc684f217415abd82332ef0358b5b37552382af2b7058496b65780aad3f8fe986173db82ce756fb151c994ca9c3e03675e300850f7e523477226db747bd7c4d3e66550e976a694c938e39a97f26bf08f79b6fb5492a060318e21eb8b60e812c93f960365d3d53cf8b6d156784439f7e9b9ebcf8ff1aa5f9ada01ab23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assignment_queue`
--

CREATE TABLE `assignment_queue` (
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `assignment_queue`
--

INSERT INTO `assignment_queue` (`id_admin`) VALUES
(6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner_shop`
--

CREATE TABLE `banner_shop` (
  `id_banner_shop` int(11) NOT NULL,
  `color` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `background_color` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `title` text COLLATE utf8_spanish_ci NOT NULL,
  `subtitle` text COLLATE utf8_spanish_ci NOT NULL,
  `image` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `banner_shop`
--

INSERT INTO `banner_shop` (`id_banner_shop`, `color`, `background_color`, `title`, `subtitle`, `image`) VALUES
(1, '#82187c', '#c5e5fb', 'Conéctate a la última tecnología', 'Smartphones, audífonos, drones, cámaras, encuéntralos aquí.', 'https://i.ebayimg.com/images/g/ER0AAOSwTLpdUXH6/s-l960.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carousel_clients`
--

CREATE TABLE `carousel_clients` (
  `id` int(11) NOT NULL,
  `image_url` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carousel_clients`
--

INSERT INTO `carousel_clients` (`id`, `image_url`) VALUES
(8, 'https://localhost/upload/img/IMG-1565380187-5d4dce5b4703d.png'),
(9, 'https://localhost/upload/img/IMG-1565380187-5d4dce5b4d9ee.png'),
(10, 'https://localhost/upload/img/IMG-1565380187-5d4dce5b515fb.png'),
(11, 'https://localhost/upload/img/IMG-1565380187-5d4dce5b54044.png'),
(12, 'https://localhost/upload/img/IMG-1565380187-5d4dce5b59314.png'),
(13, 'https://localhost/upload/img/IMG-1565380187-5d4dce5b5d0f8.png'),
(14, 'https://localhost/upload/img/IMG-1565380187-5d4dce5b6157e.png'),
(15, 'https://localhost/upload/img/IMG-1565380187-5d4dce5b60c84.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_categories` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `parent_category` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_categories`, `name`, `parent_category`, `description`, `image`) VALUES
(1, 'bolsas', NULL, 'asasasa', 'https://localhost/upload/img/IMG-1566082700-5d58868c00464.png'),
(2, 'cajas', NULL, 'sa', '/images/categories/cajas_biodegradables.png'),
(3, 'exhibir', 2, 's', '/images/categories/cajas_biodegradables.png'),
(4, 'llevar', 2, 'dfdf', 'https://localhost/upload/img/IMG-1566082700-5d58868c00464.png'),
(5, 'servir', 2, '', '/images/categories/cajas_biodegradables.png'),
(6, 'laminas', NULL, 'hjhhjasas', '/images/categories/laminas_biodegradables.png'),
(7, 'productos especiales', NULL, '', '/images/categories/Rollo_de_papel.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id_clients` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name_company` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id_clients`, `name`, `surname`, `email`, `name_company`) VALUES
(1, 'as', 'as', 'as@as', ''),
(3, 'Alexis ', 'Holguin', 'hola@hola.com', ''),
(14, 'alexis', 'holguin', 'holguinalexis30@gmail.com', ''),
(23, 'alexis', 'Holguin', 'alex.holguin@teenus.com.co', 'Teenus'),
(61, 'Alex', 'Holguin', 'wholguinmor@uniminuto.edu.co', 'Teenus'),
(355, 'Martha', 'Olmos', 'martha.olmos@teens.com.co', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materials`
--

CREATE TABLE `materials` (
  `id_materials` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `grammage` int(11) NOT NULL,
  `price_per_kg` bigint(20) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materials`
--

INSERT INTO `materials` (`id_materials`, `name`, `grammage`, `price_per_kg`, `description`) VALUES
(2, 'Earth Pact', 60, 2000, 'asdas asads ad ssd das '),
(7, 'fineKraft', 40, 4600, ''),
(8, 'Bond', 60, 2000, ''),
(9, 'PLA', 60, 18000, ''),
(10, 'otro material', 60, 2000, ''),
(11, 'Productos Secos', 60, 850, 'slkasasklajslas'),
(12, 'mantequilla', 295, 850, 'asasas'),
(13, 'KRAFT 40gr', 40, 5000, ''),
(14, 'KRAFT 60gr', 60, 5000, ''),
(15, 'CAÑA 40gr', 40, 3450, ''),
(16, 'CAÑA 60gr', 60, 3450, ''),
(17, 'lamina Antigrasa Material', 40, 7500, ''),
(18, 'Kraft Sacos', 170, 4000, ''),
(19, 'FINEKRAFT 60 GR', 60, 2000, 'Para productos pequeños'),
(20, 'CAÑA 60*90', 265, 550, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `measurements`
--

CREATE TABLE `measurements` (
  `id_measurements` int(11) NOT NULL,
  `width` varchar(45) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `lenght` varchar(45) DEFAULT NULL,
  `window` int(11) NOT NULL,
  `products_id_products` int(11) NOT NULL,
  `id_material` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `measurements`
--

INSERT INTO `measurements` (`id_measurements`, `width`, `height`, `lenght`, `window`, `products_id_products`, `id_material`) VALUES
(1144, '7', '0', '12', 1, 8, NULL),
(1145, '7', '0', '14', 1, 8, NULL),
(1146, '7', '0', '24', 1, 8, NULL),
(1147, '7', '0', '28', 1, 8, NULL),
(1148, '8', '0', '12', 2, 8, NULL),
(1149, '8', '0', '14', 2, 8, NULL),
(1150, '8', '0', '24', 2, 8, NULL),
(1151, '8', '0', '28', 2, 8, NULL),
(1152, '9', '0', '12', 3, 8, NULL),
(1153, '9', '0', '14', 3, 8, NULL),
(1154, '9', '0', '24', 3, 8, NULL),
(1155, '9', '0', '28', 3, 8, NULL),
(1156, '10', '0', '12', 4, 8, NULL),
(1157, '10', '0', '14', 4, 8, NULL),
(1158, '10', '0', '16', 4, 8, NULL),
(1159, '10', '0', '17', 4, 8, NULL),
(1160, '10', '0', '19', 4, 8, NULL),
(1161, '10', '0', '24', 4, 8, NULL),
(1162, '10', '0', '28', 4, 8, NULL),
(1163, '10', '0', '32', 4, 8, NULL),
(1164, '11', '0', '12', 5, 8, NULL),
(1165, '11', '0', '14', 5, 8, NULL),
(1166, '11', '0', '16', 5, 8, NULL),
(1167, '11', '0', '17', 5, 8, NULL),
(1168, '11', '0', '19', 5, 8, NULL),
(1169, '11', '0', '24', 5, 8, NULL),
(1170, '11', '0', '28', 5, 8, NULL),
(1171, '11', '0', '32', 5, 8, NULL),
(1172, '12', '0', '12', 6, 8, NULL),
(1173, '12', '0', '14', 6, 8, NULL),
(1174, '12', '0', '16', 6, 8, NULL),
(1175, '12', '0', '17', 6, 8, NULL),
(1176, '12', '0', '19', 6, 8, NULL),
(1177, '12', '0', '24', 6, 8, NULL),
(1178, '12', '0', '28', 6, 8, NULL),
(1179, '12', '0', '32', 6, 8, NULL),
(1180, '13', '0', '19', 7, 8, NULL),
(1181, '15', '0', '20', 8, 8, NULL),
(1182, '15', '0', '24', 8, 8, NULL),
(1183, '15', '0', '28', 8, 8, NULL),
(1184, '15', '0', '32', 8, 8, NULL),
(1185, '15', '0', '34', 8, 8, NULL),
(1186, '15', '0', '38', 8, 8, NULL),
(1187, '15', '0', '50', 8, 8, NULL),
(1188, '15', '0', '62', 8, 8, NULL),
(1189, '17', '0', '20', 7, 8, NULL),
(1190, '17', '0', '24', 7, 8, NULL),
(1191, '17', '0', '28', 7, 8, NULL),
(1192, '17', '0', '32', 7, 8, NULL),
(1193, '17', '0', '34', 7, 8, NULL),
(1194, '17', '0', '38', 7, 8, NULL),
(1195, '17', '0', '50', 7, 8, NULL),
(1196, '17', '0', '62', 7, 8, NULL),
(1197, '19', '0', '24', 9, 8, NULL),
(1198, '19', '0', '28', 9, 8, NULL),
(1199, '19', '0', '32', 9, 8, NULL),
(1200, '19', '0', '34', 9, 8, NULL),
(1201, '19', '0', '38', 9, 8, NULL),
(1202, '19', '0', '50', 9, 8, NULL),
(1203, '19', '0', '62', 9, 8, NULL),
(1204, '21', '0', '24', 11, 8, NULL),
(1205, '21', '0', '28', 11, 8, NULL),
(1206, '21', '0', '32', 11, 8, NULL),
(1207, '21', '0', '34', 11, 8, NULL),
(1208, '21', '0', '38', 11, 8, NULL),
(1209, '21', '0', '50', 11, 8, NULL),
(1210, '21', '0', '62', 11, 8, NULL),
(1211, '26', '0', '28', 14, 8, NULL),
(1212, '26', '0', '32', 14, 8, NULL),
(1213, '26', '0', '34', 14, 8, NULL),
(1214, '26', '0', '38', 14, 8, NULL),
(1215, '26', '0', '50', 14, 8, NULL),
(1216, '26', '0', '62', 14, 8, NULL),
(1217, '30', '0', '32', 18, 8, NULL),
(1218, '30', '0', '34', 18, 8, NULL),
(1219, '30', '0', '38', 18, 8, NULL),
(1220, '30', '0', '50', 18, 8, NULL),
(1221, '30', '0', '62', 18, 8, NULL),
(1222, '33', '0', '38', 21, 8, NULL),
(1223, '33', '0', '50', 21, 8, NULL),
(1224, '33', '0', '62', 21, 8, NULL),
(1306, '7', '4', '17', 1, 2, NULL),
(1307, '7', '4', '20', 1, 2, NULL),
(1308, '7', '4', '24', 1, 2, NULL),
(1309, '8', '5', '17', 2, 2, NULL),
(1310, '8', '5', '20', 2, 2, NULL),
(1311, '8', '5', '24', 2, 2, NULL),
(1312, '8', '5', '28', 2, 2, NULL),
(1313, '9', '5', '20', 3, 2, NULL),
(1314, '9', '5', '24', 3, 2, NULL),
(1315, '9', '5', '28', 3, 2, NULL),
(1316, '9', '5', '34', 3, 2, NULL),
(1317, '9', '5', '38', 3, 2, NULL),
(1318, '9', '5', '50', 3, 2, NULL),
(1319, '9', '5', '62', 3, 2, NULL),
(1320, '9', '5', '70', 3, 2, NULL),
(1321, '10', '5', '20', 4, 2, NULL),
(1322, '10', '5', '24', 4, 2, NULL),
(1323, '10', '5', '28', 4, 2, NULL),
(1324, '11', '5', '20', 5, 2, NULL),
(1325, '11', '5', '24', 5, 2, NULL),
(1326, '11', '5', '28', 5, 2, NULL),
(1327, '11', '5', '30', 5, 2, NULL),
(1328, '11', '5', '34', 5, 2, NULL),
(1329, '11', '5', '38', 5, 2, NULL),
(1330, '11', '5', '50', 5, 2, NULL),
(1331, '11', '5', '62', 5, 2, NULL),
(1332, '11', '5', '70', 5, 2, NULL),
(1333, '12', '7', '30', 6, 2, NULL),
(1334, '12', '7', '32', 6, 2, NULL),
(1335, '12', '7', '34', 6, 2, NULL),
(1336, '12', '7', '38', 6, 2, NULL),
(1337, '12', '7', '50', 6, 2, NULL),
(1338, '12', '7', '62', 6, 2, NULL),
(1339, '12', '7', '70', 6, 2, NULL),
(1340, '15', '9', '38', 7, 2, NULL),
(1341, '15', '9', '50', 7, 2, NULL),
(1342, '15', '9', '62', 7, 2, NULL),
(1343, '15', '9', '70', 7, 2, NULL),
(1344, '17', '9', '38', 9, 2, NULL),
(1345, '17', '9', '50', 9, 2, NULL),
(1346, '17', '9', '62', 9, 2, NULL),
(1347, '17', '9', '70', 9, 2, NULL),
(1348, '19', '10', '38', 11, 2, NULL),
(1349, '19', '10', '50', 11, 2, NULL),
(1350, '19', '10', '62', 11, 2, NULL),
(1351, '19', '10', '70', 11, 2, NULL),
(1352, '21', '10', '38', 11, 2, NULL),
(1353, '21', '10', '50', 11, 2, NULL),
(1354, '21', '10', '62', 11, 2, NULL),
(1355, '21', '10', '70', 11, 2, NULL),
(1356, '26', '8', '38', 16, 2, NULL),
(1357, '26', '8', '50', 16, 2, NULL),
(1358, '26', '8', '62', 16, 2, NULL),
(1359, '26', '8', '70', 16, 2, NULL),
(1360, '26', '10', '38', 16, 2, NULL),
(1361, '26', '10', '50', 16, 2, NULL),
(1362, '26', '10', '62', 16, 2, NULL),
(1363, '26', '10', '70', 16, 2, NULL),
(1364, '30', '9', '38', 18, 2, NULL),
(1365, '30', '9', '50', 18, 2, NULL),
(1366, '30', '9', '62', 18, 2, NULL),
(1367, '30', '9', '70', 18, 2, NULL),
(1368, '30', '11', '38', 18, 2, NULL),
(1369, '30', '11', '50', 18, 2, NULL),
(1370, '30', '11', '62', 18, 2, NULL),
(1371, '30', '11', '70', 18, 2, NULL),
(1372, '33', '11', '38', 21, 2, NULL),
(1373, '33', '11', '50', 21, 2, NULL),
(1374, '33', '11', '62', 21, 2, NULL),
(1375, '33', '11', '70', 21, 2, NULL),
(1380, '14.1', '15.6', '12', 8, 49, NULL),
(1381, '17', '20', '0', 0, 50, NULL),
(1382, '25', '35', '0', 0, 50, NULL),
(1383, '40', '30', '0', 0, 50, NULL),
(1384, '45', '33', '0', 0, 50, NULL),
(1385, '20', '20', '0', 0, 51, NULL),
(1386, '25', '25', '0', 0, 51, NULL),
(1387, '30', '30', '0', 0, 51, NULL),
(1388, '12', '9', '38', 2, 52, NULL),
(1389, '15', '8.5', '38', 2, 52, NULL),
(1390, '14.1', '15.6', '11', 6, 49, NULL),
(1396, '12', '14', '15', 12, 5, 2),
(1397, '24', '23', '23', 23, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notices`
--

CREATE TABLE `notices` (
  `id_notice` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(500) NOT NULL,
  `hits` bigint(20) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notices`
--

INSERT INTO `notices` (`id_notice`, `title`, `content`, `photo`, `hits`, `active`, `created_at`, `updated_at`) VALUES
(1, '¡Te invitamos a conocer el PLA!', '<p><span class=\"fr-img-caption fr-fic fr-dib\" style=\"width: 400px;\"><span class=\"fr-img-wrap\"><img src=\"https://greenpack.com.co/wp-content/uploads/2018/09/bioplastico.jpg\" alt=\"\" height=\"304\"><span class=\"fr-inner\">maiz</span></span></span></p><p>El PLA o &aacute;cido polil&aacute;ctico es un biopol&iacute;mero hecho con recursos renovables y tiene un gran campo de aplicaciones como es el de los film para empaques y envases flexibles. Su producci&oacute;n es f&aacute;cil, se da a partir de diferentes recursos naturales como el ma&iacute;z, la ca&ntilde;a de az&uacute;car o el almid&oacute;n y no requiere de solventes adicionales.</p><p>&nbsp;</p><p>La energ&iacute;a necesaria para realizar la producci&oacute;n es poca, y no hay un fin del ciclo de vida de la materia ya que no se generan residuos s&oacute;lidos, pues el material que sobra de este proceso puede ser reciclado, volviendo al inicio del ciclo de fabricaci&oacute;n como materia prima; adem&aacute;s las emisiones generadas al final del proceso son m&iacute;nimas.</p><p>&nbsp;</p><p>La utilizaci&oacute;n de pol&iacute;meros biodegradables como el ma&iacute;z, reduce notablemente la huella ambiental desde el proceso de obtenci&oacute;n de la materia prima, su producci&oacute;n, uso y reciclaje, compar&aacute;ndolo con la producci&oacute;n de los pol&iacute;meros a base de petr&oacute;leo, que no son biodegradables, adem&aacute;s el PLA compite en sus propiedades mec&aacute;nicas con los pl&aacute;sticos tradicionales.</p><p style=\"text-align: center;\"><iframe src=\"//www.youtube.com/embed/PVuoqT4RnUY\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p><p>El PLA es un material transparente, resistente e ins&iacute;pido, alternativa natural al polietileno, 100 % biodegradable y org&aacute;nico.</p><ol><li>Las plantas de ma&iacute;z se cosechan.</li><li>Luego se extrae el almid&oacute;n de las plantas.</li><li>Se realiza la fermentaci&oacute;n en dextrosa, y posteriormente la catalizaci&oacute;n con el biopol&iacute;mero (PLA).</li><li>Se produce el film de PLA que puede ser aplicado en diferentes productos.</li><li>Cuando los productos son desechados, estos pueden ser recolectados para convertirse en abono industrialmente.</li><li>El compost se utiliza para cultivar m&aacute;s plantas</li></ol><p><strong>Beneficios del pla en empaques</strong></p><p><img class=\"alignnone size-medium wp-image-693 fr-fir fr-dii\" src=\"http://greenpack.com.co/wp-content/uploads/2017/07/b5-300x263.png\" alt=\"\" width=\"300\" height=\"263\"></p><ul><li>Est&aacute; hecho de materiales renovables</li><li>Puede estar en contacto con alimentos</li><li>Puede ser reciclado</li><li>Puede ser compostable industrialmente en f&aacute;ciles condiciones</li></ul><p>&nbsp;</p><p>Tiene mejores propiedades mec&aacute;nicas que las l&aacute;minas de pl&aacute;sticos tradicionales:</p><ul><li>Mejores propiedades para impresi&oacute;n</li><li>Mayor rigidez</li><li>Permite un excelente plegado</li></ul>', 'https://cdn.pixabay.com/photo/2019/06/01/03/45/alpine-lake-4243396_960_720.jpg', 29, 1, '2019-06-07 19:47:14', '2019-11-08 19:12:41'),
(2, 'Diferencia entre biodegradable, degradable y compostable', '<div class=\"img\"><img class=\"attachment-full size-full wp-post-image fr-fic fr-dii\" src=\"https://greenpack.com.co/wp-content/uploads/2017/07/b2.png\" sizes=\"(max-width: 580px) 100vw, 580px\" srcset=\"https://greenpack.com.co/wp-content/uploads/2017/07/b2.png 580w, https://greenpack.com.co/wp-content/uploads/2017/07/b2-300x166.png 300w\" alt=\"\" width=\"580\" height=\"320\"></div><div class=\"txt-content\"><p>Un producto es&nbsp;<strong>biodegradable&nbsp;</strong>si despu&eacute;s de usarlo, se descompone naturalmente por organismos vivientes o microorganismos sin necesidad de agregar productos qu&iacute;micos. El tiempo de biodegradaci&oacute;n depende de la cantidad de ox&iacute;geno, el grado de humedad y de la temperatura. Los productos biodegradables son de origen vegetal. Estos productos se biodegradan completamente en algunos meses en la tierra.</p><p>Los productos<strong>&nbsp;degradables&nbsp;</strong>(o oxobiodegradable o fragmentable) de origen petrol&iacute;fero, est&aacute;n constituidos de polietileno PE y de aditivos qu&iacute;micos. En presencia de ox&iacute;geno, bajo el efecto del calor y de los UV, pierden resistencia mec&aacute;nica, se fragmentan y desaparecen visualmente.</p><p>Los t&eacute;rminos biodegradable y&nbsp;<strong>compostable&nbsp;</strong>no tienen el mismo significado. Un producto biodegradable puede ser descompuesto por microorganismos, pero esto no significa que se obtendr&aacute; un abono de buena calidad, es decir compostable. Un producto biodegradable no es necesariamente compostable, pero un producto compostable es obligatoriamente biodegradable.</p><p>El&nbsp;<strong>compostaje&nbsp;</strong>es un proceso biol&oacute;gico natural que permite la conversi&oacute;n y la valorizaci&oacute;n de materias org&aacute;nicas en un producto rico en compuestos h&uacute;micos, en presencia de ox&iacute;geno. Al final del proceso org&aacute;nico, obtenemos el abono, mantillo o humus directamente utilizable en agricultura. El abono evita las incineraciones costosas y contaminantes y valoriza el reciclaje de nuestros desechos.</p><p>La diferencia entre un compostaje dom&eacute;stico y un compostaje industrial es esencialmente la temperatura y el tiempo. En un compostaje hecho industrialmente, la temperatura es de 75&deg;, 80&deg;C, la humedad de 65, 70% y el ox&iacute;geno de 1 8 a 20 %. En estas condiciones, el tiempo de compostaje es de aproximadamente 12 semanas. En un compostaje de jard&iacute;n, la temperatura no pasa de 40&deg;C y la humedad depende de la estaci&oacute;n y de la latitud. El tiempo de compostaje es mucho m&aacute;s largo, puede tomar varios meses.</p></div>', 'https://cdn.pixabay.com/photo/2019/06/05/06/42/flower-4253120_960_720.jpg', 42, 1, '2019-06-07 20:29:15', '2019-11-08 19:12:59'),
(4, 'La Hora Del Planeta moviliza a los colombianos por nuestros bosques', '<div class=\"txt-content\"><p>Una urgente acci&oacute;n por parte de los colombianos es necesaria para detener la desenfrenada deforestaci&oacute;n que tiene lugar en Colombia. Las &uacute;ltimas cifras nacionales publicadas por el IDEAM indican que, en <strong>2016, se deforestaron 178.597 hect&aacute;reas de bosque en nuestro pa&iacute;s</strong>. Es demasiado: significa que cada d&iacute;a se talan 489 hect&aacute;reas &ndash;20 de ellas cada hora&ndash; y que, a diario, desaparece el equivalente en extensi&oacute;n de bosques a<strong>&nbsp;690 canchas de futbol.</strong> Este ritmo de tala arriesga ecosistemas que son vitales para nuestra supervivencia, pues los bosques nos proveen, por nombrar un primer ejemplo, del agua que bebemos. Tambi&eacute;n nos dan el agua con la que operan las hidroel&eacute;ctricas, y nos proveen de alimentos, de insumos para medicinas naturales y de madera en todo su amplio uso. Adem&aacute;s, capturan y guardan gran parte de los Gases de Efecto Invernadero que emitimos a trav&eacute;s de nuestras actividades como sociedad, causantes del cambio clim&aacute;tico.&nbsp;</p><p>&nbsp;</p><p>Es por eso que <strong>La Hora del Planeta</strong>, una campa&ntilde;a global de WWF,&nbsp;<strong>se suma en Colombia a Bosques Territorios de Vida</strong>, la Estrategia Integral de Control a la Deforestaci&oacute;n y Gesti&oacute;n de los Bosques, que es liderada por el&nbsp;<strong>Ministerio de Ambiente y Desarrollo Sostenible</strong>, que cuenta con el apoyo del programa&nbsp;<strong>ONU-REDD</strong> y que implementan el&nbsp;<strong>PNUD</strong>,&nbsp;<strong>FAO</strong> y&nbsp;<strong>ONU Medio Ambiente</strong> con el Fondo Cooperativo del Carbono de los Bosques, el&nbsp;<strong>Banco Mundial</strong> y el&nbsp;<strong>Fondo Acci&oacute;n</strong>. El prop&oacute;sito fundamental de la estrategia es fortalecer un desarrollo sostenible que incluya a los bosques como eje de la econom&iacute;a, garantizando el cumplimiento de la meta de deforestaci&oacute;n neta cero en todo el pa&iacute;s para el a&ntilde;o 2030.<br><br>La Hora del Planeta<a href=\"http://www.conectadosporlosbosques.com/\" rel=\"noopener\" target=\"_blank\"><strong>&nbsp;invita este a&ntilde;o a toda la sociedad colombiana a movilizarse para proteger y valorar sus bosques</strong></a>, ya que constituyen tesoros naturales no s&oacute;lo para nuestro pa&iacute;s, sino para el mundo. &iquest;En qu&eacute; consiste esta movilizaci&oacute;n? Se realizar&aacute; a trav&eacute;s de tres grandes llamados a la acci&oacute;n:<br>&nbsp;</p><ul><li>El primero es a hacer parte del gran movimiento nacional por los bosques. Todos los colombianos nos podemos unir en la p&aacute;gina <a href=\"http://www.conectadosporlosbosques.com/\" rel=\"noopener\" target=\"_blank\"><strong>www.conectadosporlosbosques.com</strong></a></li><li>&nbsp; El segundo es a que utilicemos el hashtag <strong>#ConectadosPorLosBosques</strong> en nuestras redes sociales cuando expresemos nuestra preocupaci&oacute;n por estos ecosistemas y nuestro compromiso con su conservaci&oacute;n.&nbsp;</li><li>El tercero es participar en los eventos a realizarse el s&aacute;bado 24 de marzo durante La Hora del Planeta en m&aacute;s de 20 ciudades del pa&iacute;s. La informaci&oacute;n relacionada con estos actos se estar&aacute; actualizando en la p&aacute;gina <a href=\"http://www.lahoradelplanetacolombia.com/\" rel=\"noopener\" target=\"_blank\"><strong>www.lahoradelplanetacolombia.com</strong></a></li></ul></div>', 'https://cdn.pixabay.com/photo/2018/02/22/10/42/summer-3172634_960_720.jpg', 2, 1, '2019-06-07 20:54:59', '2019-08-13 21:17:19'),
(5, 'Ciuda los bosques con FSC', '<p>jhfh&nbsp; kjh&nbsp; &nbsp;sd assd sd asas</p>', 'https://cdn.pixabay.com/photo/2015/09/09/16/05/forest-931706_960_720.jpg', 48, 1, '2019-06-07 20:58:09', '2019-08-17 21:34:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numbers_home`
--

CREATE TABLE `numbers_home` (
  `id_numbers` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `numbers_home`
--

INSERT INTO `numbers_home` (`id_numbers`, `name`, `value`) VALUES
(1, 'productos', 700),
(2, 'innovaciones', 220),
(3, 'clientes', 450);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL,
  `ref` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `categories_id_categories` int(11) NOT NULL,
  `uses` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_products`, `ref`, `name`, `price`, `description`, `categories_id_categories`, `uses`) VALUES
(2, 'Plegadas', 'Plegadas', '2000', '<p>productos aq</p>', 1, '[\"azucar\",\"arroz\",\"grandes productos\"]'),
(3, 'Laminadas', 'Laminadas', '2000', '<p>dfs</p>', 1, '[\"asd\"]'),
(5, 'Fondo Automático', 'Fondo Automático', '1000', '<p>Bolsas que poseen fuelles Laterales y fondo plano. Especiales para productos con volumen. se adaptan perfectamente para contener y proteger cualquier tipo de producto.</p>', 1, '[\"Medico\"]'),
(8, 'Planas', 'Planas', '32344', '<p style=\"text-align: justify;\">Es un producto de GreenPack</p>', 1, '[\"medicina\",\"comida\"]'),
(49, 'CS-18', 'Caja para Perro', '20', '<p>asasasas as</p>', 3, '[\"hola\",\"hola2\"]'),
(50, 'li-01', 'Individuales', '2000', '<p>Protegen tu producto desde la preparaci&oacute;n hasta el consumo.</p>', 6, '[\"comida\"]'),
(51, 'aa-1', 'laminas antigrasa', '2000', '<p>asas</p>', 6, '[]'),
(52, 'lv-12', 'Sacos Industrial', '1112', '<p>asas</p>', 1, '[\"bultos\"]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_has_materials`
--

CREATE TABLE `products_has_materials` (
  `products_id_products` int(11) NOT NULL,
  `materials_id_materials` int(11) NOT NULL,
  `minimun_scale` double DEFAULT NULL,
  `medium_scale` double DEFAULT NULL,
  `maximun_scale` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products_has_materials`
--

INSERT INTO `products_has_materials` (`products_id_products`, `materials_id_materials`, `minimun_scale`, `medium_scale`, `maximun_scale`) VALUES
(2, 2, 0, 0, 0),
(2, 7, 0, 0, 0),
(3, 2, 0, 0, 0),
(3, 7, 0, 0, 0),
(5, 2, 1, 1, 1),
(5, 13, NULL, NULL, NULL),
(8, 7, 0, 0, 0),
(49, 11, 0, 0, 0),
(49, 12, 0, 0, 0),
(49, 20, 0, 0, 0),
(50, 13, 0, 0, 0),
(50, 14, 0, 0, 0),
(50, 15, 0, 0, 0),
(50, 16, 0, 0, 0),
(51, 17, 0, 0, 0),
(52, 18, 0, 0, 0);

--
-- Disparadores `products_has_materials`
--
DELIMITER $$
CREATE TRIGGER `borrado_medidas` AFTER DELETE ON `products_has_materials` FOR EACH ROW DELETE FROM `measurements` WHERE `measurements`.`id_material` = OLD.materials_id_materials AND `measurements`.`products_id_products` = OLD.products_id_products
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_tabs`
--

CREATE TABLE `products_tabs` (
  `id_tab` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `products_tabs`
--

INSERT INTO `products_tabs` (`id_tab`, `title`, `description`, `product_id`) VALUES
(2, 'asa', '<p>asasa asasas</p>', 5),
(4, '222', '<p>1212</p>', 2),
(5, 'Caracteristicas', '<p>asasdasdadsasdasd as SADSwq</p>', 8),
(6, 'Descripcion', '<p>asasas</p>', 49),
(7, 'Caracteristicas', '<p>asasasas</p>', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_image`
--

CREATE TABLE `product_image` (
  `id_product_image` int(11) NOT NULL,
  `file_image` varchar(500) NOT NULL,
  `products_id_products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_image`
--

INSERT INTO `product_image` (`id_product_image`, `file_image`, `products_id_products`) VALUES
(3, 'https://greenpack.com.co/wp-content/uploads/2017/07/b-plana.png', 8),
(4, 'https://greenpack.com.co/wp-content/uploads/2017/07/b-plegada.png', 2),
(5, 'https://greenpack.com.co/wp-content/uploads/2017/07/b-fondo-auto.png', 5),
(8, 'https://greenpack.com.co/wp-content/uploads/2017/07/b-laminada.png', 3),
(143, 'http://localhost/upload/img/IMG-1574697803-5ddbfb4b19883.jpg', 50),
(144, 'http://localhost/upload/img/IMG-1574702777-5ddc0eb90ed77.jpg', 49),
(145, 'http://localhost/upload/img/IMG-1574707666-5ddc21d262e64.jpg', 51),
(146, 'http://localhost/upload/img/IMG-1574709650-5ddc29926af31.png', 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotations`
--

CREATE TABLE `quotations` (
  `id_quotations` int(11) NOT NULL,
  `city` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cell_phone` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `file` varchar(512) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `payment_conditions` varchar(512) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '50% contra pedido - 50% contra facturación para entrega',
  `delivery_time` varchar(512) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Sin impresion 8 dias - impresos 15 dias',
  `validity` varchar(512) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '30 dias contados a partir de la fecha de la entrega de la cotización presente propuesta',
  `id_admin_assignment` int(11) DEFAULT NULL,
  `date_assignment` timestamp NULL DEFAULT NULL,
  `solved` tinyint(1) NOT NULL DEFAULT 0,
  `clients_id_clients` int(11) NOT NULL,
  `date_solved` timestamp NULL DEFAULT NULL,
  `id_admin_solved` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `quotations`
--

INSERT INTO `quotations` (`id_quotations`, `city`, `address`, `cell_phone`, `phone`, `description`, `file`, `payment_conditions`, `delivery_time`, `validity`, `id_admin_assignment`, `date_assignment`, `solved`, `clients_id_clients`, `date_solved`, `id_admin_solved`, `created_at`) VALUES
(93, 'Bogota', 'asas', '3222724734', '', 'Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño.', '', '50% contra pedido - 50% contra facturación para entrega', 'Sin impresion 8 dias - impresos 15 dias', '30 dias contados a partir de la fecha de la entrega de la cotización presente propuesta', 6, '2019-08-30 21:41:07', 1, 61, '2019-11-26 19:18:16', 4, '2019-08-30 21:41:07'),
(94, 'Bogota', 'asas', '3222724734', '', '', '', '50% contra pedido - 50% contra facturación para entrega', 'Sin impresion 8 dias - impresos 15 dias', '30 dias contados a partir de la fecha de la entrega de la cotización presente propuesta', 5, '2019-11-25 15:42:35', 0, 61, '0000-00-00 00:00:00', NULL, '2019-11-25 15:42:36'),
(95, 'Bogota', 'asas', '3222724734', '', '', '', '50% contra pedido - 50% contra facturación para entrega', 'Sin impresion 8 dias - impresos 15 dias', '30 dias contados a partir de la fecha de la entrega de la cotización presente propuesta', 6, '2019-11-25 17:06:49', 0, 61, '0000-00-00 00:00:00', NULL, '2019-11-25 17:06:49'),
(96, 'Bogota', 'asas', '3222724734', '', '', '', '50% contra pedido - 50% contra facturación para entrega', 'Sin impresion 8 dias - impresos 15 dias', '30 dias contados a partir de la fecha de la entrega de la cotización presente propuesta', 5, '2019-11-25 18:57:32', 0, 61, '0000-00-00 00:00:00', NULL, '2019-11-25 18:57:32'),
(99, 'Bogota', 'asas', '3222724734', '', '', '', '50% contra pedido - 50% contra facturación para entrega', 'Sin impresion 8 dias - impresos 15 dias', '30 dias contados a partir de la fecha de la entrega de la cotización presente propuesta', 5, '2019-11-25 19:28:37', 0, 61, '0000-00-00 00:00:00', NULL, '2019-11-25 19:28:37'),
(102, 'Bogota', 'asas', '3222724734', '', 'a lo bien parce que ', '', '50% contra pedido - 50% contra facturación para entrega', 'Sin impresion 8 dias - impresos 15 dias', '30 dias contados a partir de la fecha de la entrega de la cotización presente propuesta', 6, '2019-11-26 16:29:11', 0, 61, '0000-00-00 00:00:00', NULL, '2019-11-26 16:29:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quotations_details`
--

CREATE TABLE `quotations_details` (
  `id_quotations_details` int(11) NOT NULL,
  `products_id_products` int(11) NOT NULL,
  `quantity` bigint(40) DEFAULT NULL,
  `printed` tinyint(1) NOT NULL,
  `laminated` tinyint(1) NOT NULL,
  `pla` tinyint(1) NOT NULL,
  `price` bigint(20) NOT NULL,
  `observations` text DEFAULT NULL,
  `number_inks` int(11) DEFAULT NULL,
  `type_product` varchar(256) DEFAULT NULL,
  `material_id` int(11) NOT NULL,
  `measurement_id` int(11) NOT NULL,
  `quotations_id_quotations` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `quotations_details`
--

INSERT INTO `quotations_details` (`id_quotations_details`, `products_id_products`, `quantity`, `printed`, `laminated`, `pla`, `price`, `observations`, `number_inks`, `type_product`, `material_id`, `measurement_id`, `quotations_id_quotations`) VALUES
(96, 49, 1000, 1, 0, 0, 213, 'Hola tu', 4, 'Productos Grasos', 11, 1380, 93),
(97, 2, 20000, 1, 1, 1, 561, NULL, NULL, NULL, 2, 1364, 93),
(98, 50, 25004, 0, 0, 0, 16, NULL, NULL, NULL, 15, 1381, 94),
(99, 50, 1000, 0, 0, 0, 27, NULL, NULL, NULL, 13, 1381, 95),
(100, 50, 5000, 0, 0, 0, 70, NULL, NULL, NULL, 13, 1382, 95),
(101, 50, 5000, 0, 0, 0, 96, NULL, NULL, NULL, 13, 1383, 95),
(102, 50, 5000, 0, 0, 0, 119, NULL, NULL, NULL, 13, 1384, 95),
(103, 51, 250001, 0, 0, 0, 30, NULL, NULL, NULL, 17, 1385, 96),
(104, 52, 100000, 0, 0, 0, 129, NULL, NULL, NULL, 18, 1388, 99),
(111, 52, 100090, 1, 0, 0, 233, '', NULL, 'Productos Grasos', 18, 1388, 102),
(112, 2, 20000, 1, 1, 1, 632, NULL, NULL, NULL, 2, 1372, 102),
(113, 49, 1004, 1, 0, 0, 367, '', 2, 'Productos Secos', 20, 1390, 102),
(114, 50, 5000, 1, 0, 0, 27, '', NULL, 'Productos Secos', 13, 1381, 102),
(115, 51, 5000, 1, 0, 0, 42, '', NULL, 'Productos Grasos', 17, 1385, 102);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_admin`
--

CREATE TABLE `roles_admin` (
  `id_role` int(12) NOT NULL,
  `name` varchar(256) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles_admin`
--

INSERT INTO `roles_admin` (`id_role`, `name`) VALUES
(1, 'vendedor'),
(2, 'administrador'),
(3, 'community manager');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slides_banner`
--

CREATE TABLE `slides_banner` (
  `id` int(11) NOT NULL,
  `image` text COLLATE utf8_spanish_ci NOT NULL,
  `header` text COLLATE utf8_spanish_ci NOT NULL,
  `title` text COLLATE utf8_spanish_ci NOT NULL,
  `subtitle` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `slides_banner`
--

INSERT INTO `slides_banner` (`id`, `image`, `header`, `title`, `subtitle`) VALUES
(1, '/images/AdobeStock_114530769_Preview.jpeg', 'Descubre la magia de nuestros empaques', 'Exportación', 'Diseñamos tus empaques especiales para tus productos de exportación.'),
(2, '/images/AdobeStock_178732916_Preview.jpeg', 'Descubre la magia de nuestros empaques', 'Innovación', 'El comienzo de una nueva era para llevar, servir y exhibir.'),
(5, 'images/AdobeStock_178732916_Preview.jpeg', 'Descubre la magia de nuestros empaques', 'Innovación', 'El comienzo de una nueva era para llevar, servir y exhibir.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `special_features`
--

CREATE TABLE `special_features` (
  `id_special_features` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `products_id_products` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscribers`
--

CREATE TABLE `suscribers` (
  `id_suscriber` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `suscribers`
--

INSERT INTO `suscribers` (`id_suscriber`, `email`) VALUES
(6, 'holguinalexis30@gmail.com'),
(7, 'holguinalexis30@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admins`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_admins_roles_admin` (`id_role`);

--
-- Indices de la tabla `assignment_queue`
--
ALTER TABLE `assignment_queue`
  ADD KEY `fk_assignment_queue_admin` (`id_admin`);

--
-- Indices de la tabla `banner_shop`
--
ALTER TABLE `banner_shop`
  ADD PRIMARY KEY (`id_banner_shop`);

--
-- Indices de la tabla `carousel_clients`
--
ALTER TABLE `carousel_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`),
  ADD KEY `fk_categories_categories1_idx` (`parent_category`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_clients`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id_materials`);

--
-- Indices de la tabla `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`id_measurements`,`products_id_products`),
  ADD UNIQUE KEY `width` (`width`,`height`,`lenght`,`products_id_products`),
  ADD KEY `fk_measurements_products1_idx` (`products_id_products`),
  ADD KEY `fk_measurements_materials` (`id_material`);

--
-- Indices de la tabla `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id_notice`);

--
-- Indices de la tabla `numbers_home`
--
ALTER TABLE `numbers_home`
  ADD PRIMARY KEY (`id_numbers`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`),
  ADD KEY `fk_products_categories1_idx` (`categories_id_categories`);

--
-- Indices de la tabla `products_has_materials`
--
ALTER TABLE `products_has_materials`
  ADD PRIMARY KEY (`products_id_products`,`materials_id_materials`),
  ADD KEY `fk_products_has_materials_materials1_idx` (`materials_id_materials`),
  ADD KEY `fk_products_has_materials_products1_idx` (`products_id_products`);

--
-- Indices de la tabla `products_tabs`
--
ALTER TABLE `products_tabs`
  ADD PRIMARY KEY (`id_tab`),
  ADD KEY `fk_product_tabs_products` (`product_id`);

--
-- Indices de la tabla `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id_product_image`,`products_id_products`),
  ADD KEY `fk_product_image_products_idx` (`products_id_products`);

--
-- Indices de la tabla `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id_quotations`,`clients_id_clients`),
  ADD KEY `fk_quotations_clients1_idx` (`clients_id_clients`);

--
-- Indices de la tabla `quotations_details`
--
ALTER TABLE `quotations_details`
  ADD PRIMARY KEY (`id_quotations_details`,`products_id_products`,`quotations_id_quotations`,`material_id`) USING BTREE,
  ADD KEY `fk_quotations_details_products1_idx` (`products_id_products`),
  ADD KEY `fk_quotations_details_quotations1_idx` (`quotations_id_quotations`),
  ADD KEY `fk_quotations_details_materials1` (`material_id`),
  ADD KEY `fk_quotations_details_measurements1` (`measurement_id`);

--
-- Indices de la tabla `roles_admin`
--
ALTER TABLE `roles_admin`
  ADD PRIMARY KEY (`id_role`);

--
-- Indices de la tabla `slides_banner`
--
ALTER TABLE `slides_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `special_features`
--
ALTER TABLE `special_features`
  ADD PRIMARY KEY (`id_special_features`,`products_id_products`),
  ADD KEY `fk_special_features_products1_idx` (`products_id_products`);

--
-- Indices de la tabla `suscribers`
--
ALTER TABLE `suscribers`
  ADD PRIMARY KEY (`id_suscriber`),
  ADD UNIQUE KEY `unique_email_suscriber` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `banner_shop`
--
ALTER TABLE `banner_shop`
  MODIFY `id_banner_shop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carousel_clients`
--
ALTER TABLE `carousel_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id_clients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422;

--
-- AUTO_INCREMENT de la tabla `materials`
--
ALTER TABLE `materials`
  MODIFY `id_materials` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `measurements`
--
ALTER TABLE `measurements`
  MODIFY `id_measurements` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1398;

--
-- AUTO_INCREMENT de la tabla `notices`
--
ALTER TABLE `notices`
  MODIFY `id_notice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `numbers_home`
--
ALTER TABLE `numbers_home`
  MODIFY `id_numbers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `products_tabs`
--
ALTER TABLE `products_tabs`
  MODIFY `id_tab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id_product_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de la tabla `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id_quotations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `quotations_details`
--
ALTER TABLE `quotations_details`
  MODIFY `id_quotations_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `roles_admin`
--
ALTER TABLE `roles_admin`
  MODIFY `id_role` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `slides_banner`
--
ALTER TABLE `slides_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `special_features`
--
ALTER TABLE `special_features`
  MODIFY `id_special_features` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `suscribers`
--
ALTER TABLE `suscribers`
  MODIFY `id_suscriber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `fk_admins_roles_admin` FOREIGN KEY (`id_role`) REFERENCES `roles_admin` (`id_role`);

--
-- Filtros para la tabla `assignment_queue`
--
ALTER TABLE `assignment_queue`
  ADD CONSTRAINT `fk_assignment_queue_admin` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id_admins`);

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_categories_categories1` FOREIGN KEY (`parent_category`) REFERENCES `categories` (`id_categories`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `measurements`
--
ALTER TABLE `measurements`
  ADD CONSTRAINT `fk_measurements_products1` FOREIGN KEY (`products_id_products`) REFERENCES `products` (`id_products`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories1` FOREIGN KEY (`categories_id_categories`) REFERENCES `categories` (`id_categories`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `products_has_materials`
--
ALTER TABLE `products_has_materials`
  ADD CONSTRAINT `fk_products_has_materials_materials1` FOREIGN KEY (`materials_id_materials`) REFERENCES `materials` (`id_materials`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_has_materials_products1` FOREIGN KEY (`products_id_products`) REFERENCES `products` (`id_products`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `products_tabs`
--
ALTER TABLE `products_tabs`
  ADD CONSTRAINT `fk_product_tabs_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id_products`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `fk_product_image_products` FOREIGN KEY (`products_id_products`) REFERENCES `products` (`id_products`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `quotations`
--
ALTER TABLE `quotations`
  ADD CONSTRAINT `fk_quotations_clients1` FOREIGN KEY (`clients_id_clients`) REFERENCES `clients` (`id_clients`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `quotations_details`
--
ALTER TABLE `quotations_details`
  ADD CONSTRAINT `fk_quotations_details_materials1` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id_materials`),
  ADD CONSTRAINT `fk_quotations_details_measurements1` FOREIGN KEY (`measurement_id`) REFERENCES `measurements` (`id_measurements`),
  ADD CONSTRAINT `fk_quotations_details_products1` FOREIGN KEY (`products_id_products`) REFERENCES `products` (`id_products`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_quotations_details_quotations1` FOREIGN KEY (`quotations_id_quotations`) REFERENCES `quotations` (`id_quotations`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `special_features`
--
ALTER TABLE `special_features`
  ADD CONSTRAINT `fk_special_features_products1` FOREIGN KEY (`products_id_products`) REFERENCES `products` (`id_products`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
