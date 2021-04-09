-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2021 a las 05:04:07
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `teenuste_greenpack`
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
(2, 'NUESTRO COMPROMISO', 'Nuestros empaques desentonan naturalmente, se han actualizado en todas las áreas requeridas para manejar un beneficio fenomenal.\r\n\r\nCon el fin de ayudar a nuestro planeta tierra y a nuestra salud, hemos implementado el mejoramiento continuo, capacitado a nuestro más valioso talento humano, disminuido la reducción de desperdicios, he implementado políticas de responsabilidad social y ambiental. Somos un medio de concientización y difusión de las prácticas a seguir.', '/images/AdobeStock_256856590_Preview.jpeg'),
(3, 'QUIENES SOMOS', '<p>GREENPACK es una empresa innovadora que naci&oacute; para actuar y guiar a un mercado que necesita un cambio. Hoy en d&iacute;a, gracias a la normativa que protege el medioambiente, nuestra conciencia de seguir por un camino verde que no se detiene y la conciencia de cambio que se ha generado alrededor del mundo, Greenpack ha logrado posicionarse y obtener un completo reconocimiento del mercado como transformador e innovador en soluciones de empaques biodegradables. Dentro de nuestro cat&aacute;logo de productos; ofrecemos una amplia variedad de Bolsas, Cajas y Soportes, Sacos Industriales y empaques agroindustriales, l&aacute;minas y etiquetas, todos ellos con la m&aacute;s alta calidad. En el a&ntilde;o 2015 cumplimos 10 a&ntilde;os ejecutando y renovando nuestra visi&oacute;n generada en el 2006: Ser reconocida en Colombia como la primera elecci&oacute;n del mercado de empaques biodegradables. Contamos con los mejores clientes de Colombia y exportamos a varios pa&iacute;ses de Am&eacute;rica y Europa.</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'https://greenpack.com.co/wp-content/uploads/2017/07/bg-nuestra-empresa.jpg');

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
(5, 'Sergio Eduardo', 'Velandia Obando', 'sergio.velandia@teenus.com.co', '3175125191', 2, 'e77cb994418f5bc0ec1007b6c137918d9aed4e7b0bde45d74a50d09272c2d602', '5c6d9fd0c09ef7dd0ec8859cf31da9407067736de43cc25cc9df5c1595c1ea4889944eb25e9d8032dc07370de962e8e9974c3b3909d41382c7d7710e59a64b8b41d0594929e3a3ae82c94dc95404a03fc19de40d59692f1bb553316ca10738734a4ae4d1ed0a40f71287c606a7d82be811d62fff558bf064928d29a875a3329de17dbe1bcf807fbb5340f80f2fb66edd75cf51d1b4874df47d0f8a0522547207dada16e34bd670c435cf80101317501d54914be71afe174bf925a605593efc7bcabeedd67a91356e92070a3de881f36c0356e9ccedace516c0b08bbcea5aaf5bd2ab254faf8dc54a464c5afdcde7c81cee93e407915f2c058ecf3a4513af625c'),
(6, 'martha', 'olmos', 'martha.olmos@teenus.com.co', '3214989109', 1, 'a52ad33f38aae456885cf22fd708c42ccb354051613d125fc3e314ee2f0583e9', '1d48ba9e451ae8934c86f7d80de936ff161af596cd47593a7e5d74c4821d7daf534e44b27cdd985349470bf94aebcd46e20be71078936cdadb7e839092e3aa7a742133887a9831e51a9a36b272328ae23a566614518fd66179688876790f13981e86df6ed2225a4d08d6661865681ea9a34bd130ebc8214833f445068e11847a70fefacabc684f217415abd82332ef0358b5b37552382af2b7058496b65780aad3f8fe986173db82ce756fb151c994ca9c3e03675e300850f7e523477226db747bd7c4d3e66550e976a694c938e39a97f26bf08f79b6fb5492a060318e21eb8b60e812c93f960365d3d53cf8b6d156784439f7e9b9ebcf8ff1aa5f9ada01ab23'),
(27, 'Endorfinate', 'SASA', 'sergio.velandia@hotmail.com', '', 1, 'e77cb994418f5bc0ec1007b6c137918d9aed4e7b0bde45d74a50d09272c2d602', '23eaf303809b61f5ea3a53c15ce546bcd556e5e755fe501765df1420f768cc49cc6700428ea342e6b27741081e8c8f366354c150a65f8fef223c968f396b47b7e6e4f00bc1c9c341a5b4cfb39adae21e3cd78a9fed226a63d2e8857b043b62a64caa15bcd7afdedc8dd42bc7b1d9659c1e76c8bb56b796b960939e0b0c30d5da923a21a1973b310697f214f8d391c8739161d761c5b598c8ffae7ba9eb9c948f207e9515f9765d1fe725d69cd4110261fbc67af9df0537036ecf0ae9f0174426dfb31d9934b8e06f1cfecb5fa03e9c196f6d2f518529141d7369daafeabd58cd3f4bc6714773f6d337867f7b87873328dcad2dd7ff88f9de831c390f281dd60a'),
(28, 'Sonia', 'Mendez', 'comercial@greenpack.com.co', '3112576232', 2, 'acd52c95136a421f2b92fd38cf479155e8be6e7c5b496bae5b732875abd5a450', '193453ebb34b96d49329ab48e3a0d1730d2e82c20b724f9eb9f3b4271e75cf1ba11d882cf87b0b8974ba04e4480f9ede449c7870153c281e4bb10beeac5a520f72aebcdcd1525c683c68c6934e0b687e21023cc9cc40cbc7e15f1816226a4094217ea09a213cdcea1c7d62f975528435ebb82955e65a9e07bcb02d030d591e1abdde5c353f6212642712ff53b5d550e918046a4eaffbffd6d6071203c86acbbc990e7bc01f5e20633b6d87a9eae1c1566942825ec6171a8ff6eeacc658dd9ed7bf3f096ab8bee857392748479cbd54cb149091bdfed81af74cf221aae745edb1ef294bcf0a1096ff6253435e946475e70700e7891794c9f1e58ab8fb83ff8ff8');

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
(27);

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
(1, '#82187c', '#ffffff', 'Tu alimentos 100% perdurables', 'En bolsas, cajas y laminas 100% naturales y biodegradables', 'https://en.teenus.com.co/upload/img/IMG-1566503916-5d5ef3ecc30d3.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidades_producto`
--

CREATE TABLE `cantidades_producto` (
  `id` int(8) NOT NULL,
  `id_product` int(8) NOT NULL,
  `e1_min` int(7) NOT NULL,
  `e1_max` int(7) NOT NULL,
  `e2_min` int(7) NOT NULL,
  `e2_max` int(7) NOT NULL,
  `e3_min` int(7) NOT NULL,
  `e3_max` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(24, 'https://en.teenus.com.co/upload/img/IMG-1565714205-5d52e71d24000.png'),
(25, 'https://en.teenus.com.co/upload/img/IMG-1565714205-5d52e71d80e13.png'),
(27, 'https://en.teenus.com.co/upload/img/IMG-1565714206-5d52e71e99dcf.png'),
(28, 'https://en.teenus.com.co/upload/img/IMG-1565714207-5d52e71f171c6.png'),
(29, 'https://en.teenus.com.co/upload/img/IMG-1565714207-5d52e71f87d91.png'),
(30, 'https://en.teenus.com.co/upload/img/IMG-1565714208-5d52e72017299.png'),
(31, 'https://en.teenus.com.co/upload/img/IMG-1566318454-5d5c1f76b52aa.png'),
(32, 'http://greenpack.teenustest.com/upload/img/IMG-1583769815-5e6668d77c586.png');

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
(1, 'bolsas', NULL, '¿Proteges el medio ambiente?', '/images/categories/bolsas_biodegradables.png'),
(2, 'cajas', NULL, 'Productos hechos 100% con amor', '/images/categories/cajas_biodegradables.png'),
(3, 'exhibir', 2, 'Exhibe tus productos al mismo tiempo que proteges la naturaleza', '/images/categories/cajas_biodegradables.png'),
(4, 'llevar', 2, 'Nunca había sido mas fácil cargar nuestros productos', '/images/categories/cajas_biodegradables.png'),
(5, 'servir', 2, '', '/images/categories/cajas_biodegradables.png'),
(6, 'laminas', NULL, 'Productos de un solo uso que cuidan 100% nuestro medio ambiente', '/images/categories/laminas_biodegradables.png'),
(7, 'productos especiales', NULL, '', '/images/categories/Rollo_de_papel.png'),
(8, 'bolsas laminadas', 1, 'as', 'http://localhost/upload/img/IMG-1612369108-601accd4ae903.jpg'),
(9, 'sacos', NULL, '', 'http://localhost/upload/img/IMG-1611942695-60144b27ca274.jpg'),
(10, 'bolsas planas', 1, '¿Proteges el medio ambiente?', '/images/categories/bolsas_biodegradables.png');

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
(3, 'Sergio', 'Velandia', 'sergio.velandia@teenus.com.co', 'Teenus'),
(4, 'diseno 2', 'MENDEZ', 'comercial@greenpack.com.co', 'GreenPack SAS'),
(5, 'oliver', 'MENDEZ', 'contactenos@greenpack.com.co', 'GreenPack SAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizadores`
--

CREATE TABLE `cotizadores` (
  `id` int(2) NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cotizadores`
--

INSERT INTO `cotizadores` (`id`, `name`) VALUES
(1, 'normal'),
(2, 'por PiezasxPliego');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materials`
--

CREATE TABLE `materials` (
  `id_materials` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `grammage` int(11) NOT NULL,
  `price_per_kg` bigint(20) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `price_5400` bigint(20) DEFAULT NULL,
  `price_7000` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materials`
--

INSERT INTO `materials` (`id_materials`, `name`, `grammage`, `price_per_kg`, `description`, `price_5400`, `price_7000`) VALUES
(20, 'EARTH PACT 70g', 70, 4000, 'EARTH PACT®  de 70 g: Es un papel  recomendado  para fabricación de bolsas pequeñas tipo domicilio de combos personales sin manija, con un ancho mínimo de 12cm y máximo de 22 cm, capaz de resistir hasta 2 Kg de peso. Otra aplicación que tiene este tipo de papel, es la fabricación de individuales para la mesa. El EARTH PACT® es una cartulina a base de fibra de caña de azúcar, la cual brinda una opción ecológica para el empaque de cajas plegadizas con la más alta calidad de impresión.\n', NULL, NULL),
(21, 'EARTH PACT (90 gr)', 90, 4000, 'EARTH PACT®   90 gramos: Este papel es utilizado para la elaboración de bolsas laminadas para envasar café, cacao molido, galletas, etc. Su gramaje brinda mayor resistencia, contextura  y mejor registro para impresión.\nLa cartulina es elaborada 100% con fibras de caña de azúcar sin proceso de blanqueo, blanqueadores ópticos, colorantes ni matizantes. ', NULL, NULL),
(22, 'EARTH PACT 200g', 200, 4000, 'EARTH PACT 200g: La cartulina es elaborada 100% con fibras de caña de azúcar sin proceso de blanqueo, \nblanqueadores ópticos, colorantes ni matizantes. \n', NULL, NULL),
(23, 'EARTH PACT 230g', 230, 4000, 'EARTH PACT®   es una cartulina a base de fibra de caña de azúcar, la cual brinda una opción ecológica para el empaque de cajas plegadizas con la más alta calidad de impresión.\nLa cartulina es elaborada 100% con fibras de caña de azúcar sin proceso de blanqueo, blanqueadores ópticos, colorantes ni matizantes. ', NULL, NULL),
(24, 'EARTH PACT 265g', 265, 4000, 'EARTH PACT®  265 gramos: Este tipo de papel con gramaje más resistente es utilizado para la fabricación de cajas plegadizas (empaque secundario), que tengan productos no grasos, puede almacenar algunos productos envasados previamente como un snack empacado o frutas tales como uchuvas. Es una cartulina a base de fibra de caña de azúcar, la cual brinda una opción ecológica para el empaque de cajas plegadizas con la más alta calidad de impresión.', NULL, NULL),
(25, 'EARTH PACT 295g', 295, 4000, 'EARTH PACT® 295 gramos: Este tipo de papel puede ser utilizado para almacenamiento de snacks con un mayor contenido de peso y algunos productos calientes para consumo rápido in-situ y que tengan un contenido de humedad media (arroz, panadería en general).\n es una cartulina a base de fibra de caña de azúcar, la cual brinda una opción ecológica para el empaque de cajas plegadizas con la más alta calidad de impresión.\nLa cartulina es elaborada 100% con fibras de caña de azúcar sin proceso de blanqueo, blanqueadores ópticos, colorantes ni matizantes.', NULL, NULL),
(26, 'EARTH PACT  207g  KIT 7  ', 207, 2000, 'El  EARTH PACT Natural Grease Resistant Kit 7®\n\nEsta cartulina natural resistente al agua esta diseñada con una barrera natural que no permite el paso de la grasa con los alimentos, no requiere plastificar. Es ideal para la resistencia a la grasa de fritos y repostería.\nLa cartulina es elaborada 100% con fibras de caña de azúcar, estas fibras salen de la fábrica de azúcar después de extraer sus dulces jugos. La caña de azúcar es un recurso natural de alta producción en algunas regiones de Colombia y de gran contribución al desarrollo del país. Su cosecha se realiza todo el año de manera manual o mecánica y es renovable en cortos periodos de Tiempo.\nLa fibra de caña de azúcar es un resido agro industrial y su uso en la fabricación de papel, la posiciona como una fibra responsable con el medio ambiente.\nEn el proceso  productivo del papel a base de la fibra de caña de azúcar,  Se destacan las siguientes ventajas competitivas:\n•	La fibra de caña de azúcar es un residuo agro industrial  el cual no compite con la producción de alimentos, ni con la utilización de suelos.\n•	Es una fuente alternativa de fibra virgen a través de la cual se optimiza el consumo de energía  y químicos.\n•	La tendencia mundial está orientada a la utilización de productos que contribuyan a  la conservación del medio\n        Ambiente y a la conciencia ecológica.\n \n\n', NULL, NULL),
(27, 'EARTH PACT  263g   KIT 7  ', 263, 2000, 'El  EARTH PACT Natural Grease Resistant Kit 7®\n\nEARTH PACT®   263 gramos kit 7: Este papel contiene una resina anti-grasa organiza que permite mayor barrera ante la grasa, ideal para el contenido de productos con salsa y grasa media (Fideos, comida con salsa)\n\nEsta cartulina natural resistente al agua esta diseñada con una barrera natural que no permite el paso de la grasa con los alimentos, no requiere plastificar. Es ideal para la resistencia a la grasa de fritos y repostería.\nLa cartulina es elaborada 100% con fibras de caña de azúcar, estas fibras salen de la fábrica de azúcar después de extraer sus dulces jugos. La caña de azúcar es un recurso natural de alta producción en algunas regiones de Colombia y de gran contribución al desarrollo del país. Su cosecha se realiza todo el año de manera manual o mecánica y es renovable en cortos periodos de Tiempo.\nLa fibra de caña de azúcar es un resido agro industrial y su uso en la fabricación de papel, la posiciona como una fibra responsable con el medio ambiente.\nEn el proceso  productivo del papel a base de la fibra de caña de azúcar,  Se destacan las siguientes ventajas competitivas:\n•	La fibra de caña de azúcar es un residuo agro industrial  el cual no compite con la producción de alimentos, ni con la utilización de suelos.\n•	Es una fuente alternativa de fibra virgen a través de la cual se optimiza el consumo de energía  y químicos.\n•	La tendencia mundial está orientada a la utilización de productos que contribuyan a  la conservación del medio\n        Ambiente y a la conciencia ecológica.\n \n\n', NULL, NULL),
(28, 'EARTH PACT  270g   KIT 7  ', 270, 4500, 'El  EARTH PACT Natural Grease Resistant Kit 7®\n\nEsta cartulina natural resistente al agua esta diseñada con una barrera natural que no permite el paso de la grasa con los alimentos, no requiere plastificar. Es ideal para la resistencia a la grasa de fritos y repostería.\nLa cartulina es elaborada 100% con fibras de caña de azúcar, estas fibras salen de la fábrica de azúcar después de extraer sus dulces jugos. \n', NULL, NULL),
(29, 'EARTH PACT  342g  PVP', 342, 4000, 'El EARTH PACT PVP® es una cartulina Natural color Earth Pact recubierta por una cara con esmalte blanco, que le permite incursionar en el mercado de las cartulinas reverso café. tiene una alta Blancura y Brillo que resaltan la impresión.\nLa cartulina es elaborada 100% con fibras de caña de azúcar, estas fibras salen de la fábrica de azúcar después de extraer sus dulces jugos. \n\n\n', NULL, NULL),
(33, 'PAPEL MG 40g BLANCO ', 40, 4000, 'Es un papel a base de fibra de caña blanqueado utilizado para el almacenamiento de productos de panadería de menor peso y contenido de grasa mínimo (Horneables no grasos no lácteos).', NULL, NULL),
(34, 'PAPEL MG  NATURAL  (40 gr)', 40, 3900, 'Es un papel a base de caña de color crema. Utilizado para el almacenamiento de productos de panadería de menor peso (Horneables no grasos no lácteos).', NULL, NULL),
(35, 'EARTH PACT  302g  KIT 7', 302, 4500, 'EARTH PACT®   302 gramos kit 7: Este papel puede ser utilizado para almacenamiento de productos que contengan grasa en un nivel medio (pollo frito) debido a su contenido antigrasa, permite mayor duración del empaque en el tiempo.', NULL, NULL),
(38, 'ANTIGRASA  (40 gr)', 40, 9900, 'Es utilizado como barrera ante contenidos grasos medios. Puede ser impreso, y tiene usos como individuales para platos grasos como picadas, envoltura de burritos, productos horneados', NULL, NULL),
(40, 'KRAFT (85 gr)', 85, 4500, 'Papel Kraft Natural: Este tipo de papel es utilizado para la elaboración de empaques que necesiten resistir mayor peso, permite tener una resistencia media a contenidos sólidos con humedad (bebidas frías). Papel fabricado con fibras maderables que cumplen con buenas prácticas de aprovechamiento forestal. Permite resistir pesos de hasta 5 Kg, variando según el tamaño del empaque.', NULL, NULL),
(41, 'KRAFT BLANQUEADO (90 gr)', 90, 4000, 'Papel Kraft Blanqueado 90 gramos: Fabricado con fibras maderables que cumplen con buenas prácticas de aprovechamiento forestal. Que mediante un proceso de refinado y blanqueado, permite tener un mejor acabado para la elaboración de bolsas de alta resistencia.', NULL, NULL),
(44, 'FINEKRAFT 40g', 40, 5000, 'Fabricado con fibras maderables que cumplen con buenas prácticas de aprovechamiento forestal. Permite el almacenamiento de productos de panadería cuyo contenido graso sea bajo (Productos Horneados)', NULL, NULL),
(45, 'KRAFT 160g', 160, 2000, 'Papel Kraft de 160 gramos: Fabricado con fibras maderables que cumplen con buenas prácticas de aprovechamiento forestal. La función de esta fibra es de servir como un empaque que resista grandes contenidos de peso, sirve para la elaboración de cajas o bolsas grandes.  ', NULL, NULL),
(46, 'BIOPOLIMERO ECOVIO', 30, 20000, 'Ecovio  : biopolímero Fabricado con compuestos orgánicos, es útil como barrera para empaques laminados, su composición permite un adecuado sellado en los empaques laminados, adicionalmente sirve como barrera para contacto directo con los alimentos, y permite una barrera baja ante la humedad y grasa. Es utilizado en la elaboración de empaques de café, cacao, maní, y demás compuestos grasos.', NULL, NULL),
(47, 'BIOPOLIMERO PLA  ', 40, 25000, 'PLA  Biopolímero:  plástico a base de maíz. Esta película puede ser utilizada para la fabricación de empaques laminados y bolsas; que necesiten una barrera media ante la humedad y la grasa. Este producto es utilizado en empaques  laminados, bolsas para frutas y verduras o empaques que necesiten ser visibles.', NULL, NULL),
(48, 'BIOPOLIMERO PLA METALIZADO ', 40, 30000, 'PLA metalizado:  PLA el cual mediante un proceso de aspersión de aluminio de 2 g/m2, permite generar mayor barrera a la iluminación y contenidos grasos. Es utilizado para empaques de chocolates, café y productos que requieran una barrera ante el sol y la húmedad.', NULL, NULL),
(49, 'RESINA  ANTI-GRASA /CERA PROWASH', 15, 2000, 'CERA PROWASH: Cera orgánica proveniente de cultivos de palma, aprobada para contacto directo con los alimentos. Permite generar mayor barrera a contenidos grasos y material particulado.', NULL, NULL),
(50, 'KRAFT 70g', 70, 2000, 'Papel Kraft Natural 70 gramos: Papel fabricado con fibras maderables,  es un papel de resistencia media, útil para el empaque secundario de productos livianos y secos. Otra aplicación útil, es para ser utilizado como una capa interna de un saco industrial.', NULL, NULL),
(51, 'BOND 60g', 60, 4000, 'PAPEL BOND 60g: Papel  con buenas propiedades de impresión en litografía y flexografía con resistencias mecánicas propias para el empaque .\ncumple rigurosamente con los parámetros establecidos por la FDA(FOOD AND DRUGDS ADMINISTRATION ) de Estados Unidos para el manejo de productos alimenticios.', NULL, NULL),
(52, 'BOND (90 gr)', 90, 4000, 'Papel  con buenas propiedades de impresión en litografía y flexografía con resistencias mecánicas propias para el empaque .\ncumple rigurosamente con los parámetros establecidos por la FDA(FOOD AND DRUGDS ADMINISTRATION ) de Estados Unidos para el manejo de productos alimenticios.', NULL, NULL),
(53, 'BOND (115 gr)', 115, 4000, 'PAPEL BOND 115 g: Papel  con buenas propiedades de impresión en litografía y flexografía con resistencias mecánicas propias para el empaque .\ncumple rigurosamente con los parámetros establecidos por la FDA(FOOD AND DRUGDS ADMINISTRATION ) de Estados Unidos para el manejo de productos alimenticios.\nUtilizado mayormente para la fabricación de bolsa tipo Boutique.', NULL, NULL),
(54, 'KRAFT 110g', 110, 4500, 'Papel Kraft de 110 gramos: Fabricado con fibras maderables que cumplen con buenas prácticas de aprovechamiento forestal. La función de esta fibra es de servir como un empaque que resista grandes contenidos de peso, sirve para la elaboración de cajas o bolsas grandes.\n\nEs mayormente utilizado en bolsa de tipo BOUTIQUE por su buena resistencia y composición.', NULL, 315),
(55, 'EARTH PACT 150g', 150, 4000, 'EARTH PACT® 150 g: Este tipo de papel puede ser utilizado para bolsa boutique y empaques resistentes,  a base de fibra de caña de azúcar,\nel cual brinda una opción ecológica para el empaque de cajas plegadizas con la más alta calidad de impresión.\nLa cartulina es elaborada 100% con fibras de caña de azúcar sin proceso de blanqueo, blanqueadores ópticos, colorantes ni matizantes.  ', NULL, NULL),
(57, 'KRAFT EXT', 80, 4000, '', NULL, NULL),
(58, 'KRAFT LINNER (110 gr)', 110, 3500, '', NULL, NULL),
(59, 'KRAFT BLANQUEADO (100 gr)', 100, 4000, '', NULL, NULL),
(60, 'KRAFT BLANQUEADO (110 gr)', 110, 4000, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `measurements`
--

CREATE TABLE `measurements` (
  `id_measurements` int(11) NOT NULL,
  `codigo` varchar(7) DEFAULT NULL,
  `width` varchar(45) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `lenght` varchar(45) DEFAULT NULL,
  `window` int(11) NOT NULL,
  `products_id_products` int(11) NOT NULL,
  `id_material` int(11) DEFAULT NULL,
  `pliego` bigint(20) DEFAULT NULL,
  `largo_util` int(3) NOT NULL,
  `ancho_total` int(3) NOT NULL,
  `venta_minima_impresa` int(6) NOT NULL,
  `venta_minima_generica` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `measurements`
--

INSERT INTO `measurements` (`id_measurements`, `codigo`, `width`, `height`, `lenght`, `window`, `products_id_products`, `id_material`, `pliego`, `largo_util`, `ancho_total`, `venta_minima_impresa`, `venta_minima_generica`) VALUES
(1, 'BP1', '7', '10', '24', 0, 1, NULL, NULL, 21, 16, 30000, 5000),
(2, 'BP2', '8', '0', '28', 0, 1, NULL, NULL, 25, 18, 300024, 5000),
(3, 'BP3', '9', '0', '24', 0, 1, NULL, NULL, 21, 20, 30000, 5000),
(4, 'BL-76', '70', '0', '90', 0, 8, NULL, 60, 0, 70, 30000, 15000),
(5, ' BL-52 ', '60', '0', '90', 0, 8, NULL, NULL, 0, 60, 8000, 4000);

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
(1, 'TE INVITAMOS A CONOCER SOBRE EL MATERIAL BIODEGRADABLE PLA QUE USAMOS EN NUESTROS EMPAQUES', '<p>El PLA o &aacute;cido polil&aacute;ctico es un biopol&iacute;mero hecho con recursos renovables y tiene un gran campo de aplicaciones como es el de los film para empaques y envases flexibles. Su producci&oacute;n es f&aacute;cil, se da a partir de diferentes recursos naturales como el ma&iacute;z, la ca&ntilde;a de az&uacute;car o el almid&oacute;n y no requiere de solventes adicionales.</p><p>La energ&iacute;a necesaria para realizar la producci&oacute;n es poca, y no hay un fin del ciclo de vida de la materia ya que no se generan residuos s&oacute;lidos, pues el material que sobra de este proceso puede ser reciclado, volviendo al inicio del ciclo de fabricaci&oacute;n como materia prima; adem&aacute;s las emisiones generadas al final del proceso son m&iacute;nimas.</p><p>La utilizaci&oacute;n de pol&iacute;meros biodegradables como el ma&iacute;z, reduce notablemente la huella ambiental desde el proceso de obtenci&oacute;n de la materia prima, su producci&oacute;n, uso y reciclaje, compar&aacute;ndolo con la producci&oacute;n de los pol&iacute;meros a base de petr&oacute;leo, que no son biodegradables, adem&aacute;s el PLA compite en sus propiedades mec&aacute;nicas con los pl&aacute;sticos tradicionales.</p><p><img src=\"https://en.teenus.com.co/upload/img/IMG-1583082561-5e5bec41dcd42.png\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p><p><br></p><p>El PLA es un material transparente, resistente e ins&iacute;pido, alternativa natural al polietileno, 100 % biodegradable y org&aacute;nico.&nbsp;</p><p><br></p><p><strong>Ciclo de vida del PLA1.</strong></p><p><img src=\"https://en.teenus.com.co/upload/img/IMG-1583082584-5e5bec58d5bc9.png\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p><p><br></p><ol><li>Las plantas de ma&iacute;z se cosechan.</li><li>Luego se extrae el almid&oacute;n de las plantas.</li><li>Se realiza la fermentaci&oacute;n en dextrosa, y posteriormente la catalizaci&oacute;n con el biopol&iacute;mero (PLA).</li><li>Se produce el film de PLA que puede ser aplicado en diferentes productos.</li><li>Cuando los productos son desechados, estos pueden ser recolectados para convertirse en abono industrialmente.</li><li>El compost se utiliza para cultivar m&aacute;s plantas</li></ol><p>&nbsp;</p><p><strong>Beneficios del PLA en empaques</strong></p><ul><li>Est&aacute; hecho de materiales renovables</li><li>Puede estar en contacto con alimentos</li><li>Puede ser reciclado</li><li>Puede ser compostable industrialmente en f&aacute;ciles condiciones</li></ul><p>&nbsp;<img src=\"https://en.teenus.com.co/upload/img/IMG-1583082656-5e5beca066ef8.png\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p><p>Tiene mejores propiedades mec&aacute;nicas que las l&aacute;minas de pl&aacute;sticos tradicionales:</p><ul><li>Mejores propiedades para impresi&oacute;n</li><li>Mayor rigidez</li><li>Permite un excelente plegado</li></ul><p><span class=\"fr-img-caption fr-fic fr-dib fr-draggable\" contenteditable=\"false\" draggable=\"false\" style=\"width: 400px;\"><span class=\"fr-img-wrap\"><span class=\"fr-inner\" contenteditable=\"true\"></span></span></span></p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'https://cdn.pixabay.com/photo/2019/06/01/03/45/alpine-lake-4243396_960_720.jpg', 4, 1, '2019-06-07 23:47:14', '2021-01-30 15:43:01'),
(2, '¿QUÉ CREES QUE ES MEJOR, BIODEGRADABLE, DEGRADABLE O COMPOSTABLE (convertibles en Abono)?', '<div class=\"img\"><img class=\"attachment-full size-full wp-post-image fr-fic fr-dii\" src=\"https://greenpack.com.co/wp-content/uploads/2017/07/b2.png\" sizes=\"(max-width: 580px) 100vw, 580px\" srcset=\"https://greenpack.com.co/wp-content/uploads/2017/07/b2.png 580w, https://greenpack.com.co/wp-content/uploads/2017/07/b2-300x166.png 300w\" alt=\"\" width=\"580\" height=\"320\"></div><div class=\"txt-content\"><p style=\"text-align: justify;\">Un producto es <strong>biodegradable&nbsp;</strong>si despu&eacute;s de usarlo, se descompone naturalmente por organismos vivientes o microorganismos sin necesidad de agregar productos qu&iacute;micos. El tiempo de biodegradaci&oacute;n depende de la cantidad de ox&iacute;geno, el grado de humedad y de la temperatura. Los productos biodegradables son de origen vegetal. Estos productos se biodegradan completamente en algunos meses en la tierra.</p><p style=\"text-align: justify;\"><br></p><p style=\"text-align: justify;\">Los productos<strong>&nbsp;degradables&nbsp;</strong>(o oxobiodegradable o fragmentable) de origen petrol&iacute;fero, est&aacute;n constituidos de polietileno PE y de aditivos qu&iacute;micos. En presencia de ox&iacute;geno, bajo el efecto del calor y de los UV, pierden resistencia mec&aacute;nica, se fragmentan y desaparecen visualmente.</p><p style=\"text-align: justify;\"><br></p><p style=\"text-align: justify;\">Los t&eacute;rminos biodegradable y <strong>compostable&nbsp;</strong>no tienen el mismo significado. Un producto biodegradable puede ser descompuesto por microorganismos, pero esto no significa que se obtendr&aacute; un abono de buena calidad, es decir compostable. Un producto biodegradable no es necesariamente compostable, pero un producto compostable es obligatoriamente biodegradable.</p><p style=\"text-align: justify;\"><br></p><p style=\"text-align: justify;\">El <strong>compostaje&nbsp;</strong>es un proceso biol&oacute;gico natural que permite la conversi&oacute;n y la valorizaci&oacute;n de materias org&aacute;nicas en un producto rico en compuestos h&uacute;micos, en presencia de ox&iacute;geno. Al final del proceso org&aacute;nico, obtenemos el abono, mantillo o humus directamente utilizable en agricultura. El abono evita las incineraciones costosas y contaminantes y valoriza el reciclaje de nuestros desechos.</p><p style=\"text-align: justify;\">La diferencia entre un compostaje dom&eacute;stico y un compostaje industrial es esencialmente la temperatura y el tiempo. En un compostaje hecho industrialmente, la temperatura es de 75&deg;, 80&deg;C, la humedad de 65, 70% y el ox&iacute;geno de 1 8 a 20 %. En estas condiciones, el tiempo de compostaje es de aproximadamente 12 semanas. En un compostaje de jard&iacute;n, la temperatura no pasa de 40&deg;C y la humedad depende de la estaci&oacute;n y de la latitud. El tiempo de compostaje es mucho m&aacute;s largo, puede tomar varios meses.</p></div><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'https://cdn.pixabay.com/photo/2019/06/05/06/42/flower-4253120_960_720.jpg', 1, 1, '2019-06-08 00:29:15', '2020-04-11 22:53:44'),
(4, 'LA HORA Y EL AHORA DE NUESTRA PLANETA', '<div class=\"txt-content\"><p>Una urgente acci&oacute;n por parte de los colombianos es necesaria para detener la desenfrenada deforestaci&oacute;n que tiene lugar en Colombia. Las &uacute;ltimas cifras nacionales publicadas por el IDEAM indican que, en&nbsp;<strong>2016, se deforestaron 178.597 hect&aacute;reas de bosque en nuestro pa&iacute;s</strong>. Es demasiado: significa que cada d&iacute;a se talan 489 hect&aacute;reas &ndash;20 de ellas cada hora&ndash; y que, a diario, desaparece el equivalente en extensi&oacute;n de bosques a<strong>&nbsp;690 canchas de futbol.</strong> Este ritmo de tala arriesga ecosistemas que son vitales para nuestra supervivencia, pues los bosques nos proveen, por nombrar un primer ejemplo, del agua que bebemos. Tambi&eacute;n nos dan el agua con la que operan las hidroel&eacute;ctricas, y nos proveen de alimentos, de insumos para medicinas naturales y de madera en todo su amplio uso. Adem&aacute;s, capturan y guardan gran parte de los Gases de Efecto Invernadero que emitimos a trav&eacute;s de nuestras actividades como sociedad, causantes del cambio clim&aacute;tico.</p><p>&nbsp;</p><p>Es por eso que <strong>La Hora del Planeta</strong>, una campa&ntilde;a global de WWF,&nbsp;<strong>se suma en Colombia a Bosques Territorios de Vida</strong>, la Estrategia Integral de Control a la Deforestaci&oacute;n y Gesti&oacute;n de los Bosques, que es liderada por el&nbsp;<strong>Ministerio de Ambiente y Desarrollo Sostenible</strong>, que cuenta con el apoyo del programa&nbsp;<strong>ONU-REDD</strong> y que implementan el&nbsp;<strong>PNUD</strong>,&nbsp;<strong>FAO</strong> y&nbsp;<strong>ONU Medio Ambiente</strong> con el Fondo Cooperativo del Carbono de los Bosques, el&nbsp;<strong>Banco Mundial</strong> y el&nbsp;<strong>Fondo Acci&oacute;n</strong>. El prop&oacute;sito fundamental de la estrategia es fortalecer un desarrollo sostenible que incluya a los bosques como eje de la econom&iacute;a, garantizando el cumplimiento de la meta de deforestaci&oacute;n neta cero en todo el pa&iacute;s para el a&ntilde;o 2030.<br><br>La Hora del Planeta<a href=\"http://www.conectadosporlosbosques.com/\" rel=\"noopener\" target=\"_blank\"><strong>&nbsp;invita este a&ntilde;o a toda la sociedad colombiana a movilizarse para proteger y valorar sus bosques</strong></a>, ya que constituyen tesoros naturales no s&oacute;lo para nuestro pa&iacute;s, sino para el mundo. &iquest;En qu&eacute; consiste esta movilizaci&oacute;n? Se realizar&aacute; a trav&eacute;s de tres grandes llamados a la acci&oacute;n:<br>&nbsp;</p><ol><li>El primero es a hacer parte del gran movimiento nacional por los bosques. Todos los colombianos nos podemos unir en la p&aacute;gina <a href=\"http://www.conectadosporlosbosques.com/\" rel=\"noopener\" target=\"_blank\"><strong>www.conectadosporlosbosques.com</strong></a></li><li>El segundo es a que utilicemos el hashtag <strong>#ConectadosPorLosBosques</strong> en nuestras redes sociales cuando expresemos nuestra preocupaci&oacute;n por estos ecosistemas y nuestro compromiso con su conservaci&oacute;n.</li><li>El tercero es participar en los eventos a realizarse el s&aacute;bado 24 de marzo durante La Hora del Planeta en m&aacute;s de 20 ciudades del pa&iacute;s. La informaci&oacute;n relacionada con estos actos se estar&aacute; actualizando en la p&aacute;gina <a href=\"http://www.lahoradelplanetacolombia.com/\" rel=\"noopener\" target=\"_blank\"><strong>www.lahoradelplanetacolombia.com</strong></a></li></ol></div><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'https://cdn.pixabay.com/photo/2018/02/22/10/42/summer-3172634_960_720.jpg', 1, 1, '2019-06-08 00:54:59', '2020-04-11 23:04:56'),
(6, '¿ES REALMENTE BUENO RECICLAR?', '<p>La fabricaci&oacute;n de papel reciclado ayuda a la preservaci&oacute;n del medio ambiente, ya que sustituye la celulosa virgen, al mismo tiempo que reducen el costo de fabricaci&oacute;n de los productos manteniendo los est&aacute;ndares de calidad.</p><p>&nbsp;</p><p><strong>Ciclo del papel reciclado</strong></p><p><strong><img data-fr-image-pasted=\"true\" src=\"http://greenpack.com.co/images/rec3.png\" alt=\"\" border=\"0\" class=\"fr-fic fr-dib\"></strong></p><p><img src=\"https://en.teenus.com.co/upload/img/IMG-1583083616-5e5bf06056ad0.png\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p><p style=\"text-align: justify;\">El proceso de fabricaci&oacute;n comienza con la recolecci&oacute;n de papeles y cartones que han terminado su uso. (Papel blanco, de colores, con impresi&oacute;n, revistas, cart&oacute;n, peri&oacute;dicos, libros, folletos, carpetas, sobres, correspondencia, bolsas de papel, etc.)</p><p style=\"text-align: justify;\"><br></p><p style=\"text-align: justify;\">Estos son llevados a la planta donde pasan principalmente por un proceso de clasificaci&oacute;n para retirar cualquier material diferente como ganchos, pl&aacute;sticos, u otros y luego se lavan con agua y qu&iacute;micos en altas temperaturas para retirar tintas.</p><p style=\"text-align: justify;\"><br></p><p style=\"text-align: justify;\">Los papeles son triturados en los Pulpers (licuadoras enormes), para obtener pulpa nuevamente y fabricar papel con el mismo proceso de la fabricaci&oacute;n del papel a partir de fibra virgen. El papel reciclado puede ser usado nuevamente hasta 10 veces para la fabricaci&oacute;n de productos de segundo uso como cajas de cart&oacute;n, bolsas de papel, papel para escritura e impresi&oacute;n, papel higi&eacute;nico, papel peri&oacute;dico, empaque, moldeado, entre otros; NO es apto para contacto con alimentos. Con este proceso se cierra el ciclo de fabricaci&oacute;n del papel y siendo un proceso sostenible, con un impacto ambiental positivo.</p><p style=\"text-align: justify;\"><br></p><p style=\"text-align: justify;\">&iquest;Qu&eacute; piensas ahora?</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'https://en.teenus.com.co/upload/img/IMG-1583083825-5e5bf1319eba5.jpg', 0, 1, '2020-03-01 17:30:29', '2020-03-01 17:31:13');

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
(1, 'productos', 100),
(2, 'innovaciones', 200),
(3, 'clientes', 300);

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
  `uses` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `cotizador` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_products`, `ref`, `name`, `price`, `description`, `categories_id_categories`, `uses`, `cotizador`) VALUES
(1, 'BPL-1', 'BOLSA PLANA', '', '<p>Bolsas elaboradas en papeles especiales que se adaptan perfectamente para contener y proteger cualquier tipo de producto. Bolsas que carecen de fuelles Laterales (tipo sobre).</p>', 1, '[\"Droguerias (pastillas)\",\"Fritos (papas fritas, Nuggets, porciones pequeñas) \",\"Cubiertos\",\"Servilletas\",\" Billetes\",\"Botoneria\",\"Cadenas\"]', 1),
(2, 'BPE-1', 'BOLSA PLEGADA', '', '<p>Bolsas que poseen fuelles Laterales y fondo plano. Especiales para productos con volumen.</p>', 10, '[\"Panaderías\",\"Confiterías\",\"Misceláneas\",\"Cafeterías\",\"Comidas rápidas\",\"Protección de frutos en cosecha y pos cosecha\"]', 1),
(3, 'BFA-1', 'BOLSA FONDO AUTOMATICO LUNCH', '', '<p>Bolsas que poseen fuelles laterales y base. Especiales para productos con volumen. &nbsp;En caso de usarlas para domicilios de comida, ayudan a la buena conservaci&oacute;n del estado natural del alimento evitando la condensaci&oacute;n de humedad dentro del empaque.</p>', 1, '[\"Domicilios\",\"Supermercados\",\"Tiendas (general)\"]', 1),
(4, 'FACMT', 'BOLSA FONDO AUTOMATICO CON MANIJA TRENZADA ', '', '<p>Bolsas que poseen fuelles laterales y base. Especiales para productos con volumen.</p>', 1, '[\"Domicilios\",\"Supermercados\"]', 1),
(5, 'FACMTQ', 'BOLSA FONDO AUTOMATICO CON MANIJA TROQUELADA', '', '<p>Bolsas que poseen fuelles laterales y base. Especiales para productos con volumen</p>', 1, '[\"Domicilios\",\"Supermercados\"]', 1),
(6, 'FACMTRB', 'BOLSA BOUTIQUE', '', '<p>Bolsas hechas a mano en impresi&oacute;n litogr&aacute;fica con tintas base agua.</p>', 1, '[\"Boutique\",\"Perfumerías\",\"Tiendas de ropa\",\"Tiendas de calzado\",\"Librerías\"]', 1),
(7, 'SACO2C', 'SACOS INDUSTRIALES', '', '<p>Saco extensible se componen de 1 a 3 pliegos de papel, estas capas aportan mayor resistencia para enfrentar el bodegaje, apilamiento y manipulaci&oacute;n.</p>', 9, '[\"Carbón\",\"Semillas\",\"Azúcar\",\"Aditivos Químicos\",\"Harina\",\"Cal\",\"Leche en polvo\",\"Cemento (Productos para construcción)\",\"Alimento para Animales\",\"Café\",\"Cacao\"]', 2),
(8, 'SACHETS', 'BOLSA LAMINADA - SACHETS', '', '<p>Bolsas para (al granel) con laminaci&oacute;n interna con capa de PLA (Pl&aacute;stico a base de ma&iacute;z)</p>', 8, '[\"Café (molido, grano)\",\"Granola\",\"Moringa\",\"Quinoa\",\"Frutos secos\",\"Fruta deshidratada\",\"Panela\"]', 2),
(9, 'CL-01', 'CAJA FELIZ', '', '<p>Empaques dise&ntilde;ados para llevar todo tipo de productos Empaque que cumple la funcion de estuche.</p>', 4, '[\"Todas clase de alimentos\",\"Domicilios\",\"Perfumeria\"]', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_has_materials`
--

CREATE TABLE `products_has_materials` (
  `products_id_products` int(11) NOT NULL,
  `materials_id_materials` int(11) NOT NULL,
  `e1` float NOT NULL,
  `e2` float NOT NULL,
  `e3` float NOT NULL,
  `minimun_scale` double DEFAULT NULL,
  `medium_scale` double DEFAULT NULL,
  `maximun_scale` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products_has_materials`
--

INSERT INTO `products_has_materials` (`products_id_products`, `materials_id_materials`, `e1`, `e2`, `e3`, `minimun_scale`, `medium_scale`, `maximun_scale`) VALUES
(1, 21, 15, 15, 15, NULL, NULL, NULL),
(1, 38, 35, 35, 35, NULL, NULL, NULL),
(1, 52, 3, 3, 3, NULL, NULL, NULL),
(2, 33, 0, 0, 0, NULL, NULL, NULL),
(2, 34, 0, 0, 0, NULL, NULL, NULL),
(2, 38, 0, 0, 0, NULL, NULL, NULL),
(2, 44, 0, 0, 0, NULL, NULL, NULL),
(3, 20, 0, 0, 0, NULL, NULL, NULL),
(3, 38, 0, 0, 0, NULL, NULL, NULL),
(3, 41, 0, 0, 0, NULL, NULL, NULL),
(3, 44, 0, 0, 0, NULL, NULL, NULL),
(3, 52, 0, 0, 0, NULL, NULL, NULL),
(3, 57, 0, 0, 0, NULL, NULL, NULL),
(4, 21, 0, 0, 0, NULL, NULL, NULL),
(4, 40, 0, 0, 0, NULL, NULL, NULL),
(4, 41, 0, 0, 0, NULL, NULL, NULL),
(4, 52, 0, 0, 0, NULL, NULL, NULL),
(4, 58, 0, 0, 0, NULL, NULL, NULL),
(5, 58, 0, 0, 0, NULL, NULL, NULL),
(5, 59, 0, 0, 0, NULL, NULL, NULL),
(6, 58, 0, 0, 0, NULL, NULL, NULL),
(6, 60, 0, 0, 0, NULL, NULL, NULL);

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
(21, 'Beneficios', '<p>Las bolsas de papel cuentan con grandes beneficios como:</p><p><br></p><ul><li>100% biodegradables</li><li>Un menor tiempo de empaque y f&aacute;cil apilamiento de los productos.</li><li>Es m&aacute;s amplia y estable, permite sacar las compras de manera sencilla.</li><li>Son seguras para ni&ntilde;os y animales.</li><li>Permiten el posicionamiento de tu marca con alto impacto publicitario a bajo costo.</li><li>Son un medio de comunicaci&oacute;n responsable.</li></ul><p><br></p><p>Encuentra la ideal para tu producto dentro de nuestros tipos de bolsa.</p>', 1),
(22, 'Caracteristicas', '<ul><li>Resistente a la grasa</li><li>Resistente a la temperatura alta</li><li>Conserva la temperatura del producto</li><li>Material alto para la preservar los alimentos</li></ul>', 1),
(23, 'Especificaciones', '<p><strong>Se elaboran en:</strong></p><p><br></p><ul><li><strong>Papeles:</strong> FineKraft , MG Blanco, MG Natural, bond y antigrasa.</li><li><strong>Gramaje:</strong> Entre 40g y 60g.</li></ul><p>&nbsp;</p><p><strong>Medidas</strong></p><ul><li><strong>Ancho:</strong> Desde 7cms hasta 17 cms.</li><li><strong>Largo total:</strong> Desde 12 cms hasta 38 cms</li><li><strong>Capacidad:</strong> desde 1/2 libra hasta 25 libras.</li></ul><p><br></p><p>&nbsp;<strong>Opcionales</strong></p><ul><li><strong>Laminada:</strong> En PLA (&Aacute;cido Poli l&aacute;ctico a base de ma&iacute;z) transparente o metalizado, seg&uacute;n sea el producto.</li><li><strong>Ventanilla:</strong> En PLA (&Aacute;cido Poli l&aacute;ctico a base de ma&iacute;z), que permiten la exhibici&oacute;n del producto.</li><li><strong>Medida de la ventanilla:</strong> Desde 2 hasta 27 cms. conservando margen m&iacute;nimo de 3 cm de papel a cada lado.</li><li><strong>Impresi&oacute;n:</strong> hasta 4 tintas desde 10.000 unidades.</li></ul>', 1),
(24, 'Beneficios', '<p>Las bolsas de papel cuentan con grandes beneficios como:</p><p><br></p><ul><li>100% biodegradables</li><li>Un menor tiempo de empaque y f&aacute;cil apilamiento de los productos.</li><li>Es m&aacute;s amplia y estable, permite sacar las compras de manera sencilla.</li><li>Son seguras para ni&ntilde;os y animales.</li><li>Permiten el posicionamiento de tu marca con alto impacto publicitario a bajo costo.</li><li>Son un medio de comunicaci&oacute;n responsable.</li></ul><p><br></p><p>Encuentra la ideal para tu producto dentro de nuestros tipos de bolsa.</p>', 2),
(25, 'Caracteristicas', '<ul><li>Resistente a la grasa</li><li>Resistente a la temperatura alta</li><li>Conserva la temperatura del producto</li><li>Material alto para la preservar los alimentos</li><li>Permite la &nbsp;exhibici&oacute;n del producto.</li><li>Protecci&oacute;n.</li><li>Preservaci&oacute;n &nbsp;de &nbsp;frutas y semillas de los &nbsp;rayos solares y plagas.</li><li>Reduciendo la aspersi&oacute;n &nbsp;de pesticidas &nbsp;para la protecci&oacute;n de estas.</li><li>Protege la intemperie.</li></ul>', 2),
(26, 'Especificaciones', '<p><strong>Se elaboran en:</strong></p><ul><li><strong>Papeles: &nbsp;</strong>FineKraft , MG Blanco, MG Natural, Bond y Antigrasa</li><li><strong>Gramaje:</strong> Entre 35g y 60g.</li></ul><p><br></p><p><strong>Medidas:</strong></p><ul><li><strong>Ancho:</strong> Desde 7 hasta 30 cms.</li><li><strong>Fuelle:</strong> Desde 4,5 hasta 15 cm.</li><li><strong>Largo total:</strong> Desde 12 hasta 70 cm</li><li><strong>Capacidad:</strong> desde 1/2 libra hasta 25 libras.</li></ul><p>&nbsp;</p><p><strong>Opcional:</strong></p><ul><li><strong>Ventanilla:</strong> En PLA (&Aacute;cido Poli l&aacute;ctico a base de ma&iacute;z), que permiten la exhibici&oacute;n del producto.</li><li><strong>Medida de la ventanilla:</strong> Desde 2 hasta 27 cms. conservando margen m&iacute;nimo de 3 cm de papel a cada lado.</li><li><strong>Impresi&oacute;n:</strong> hasta 4 tintas desde 10.000 unidades.</li></ul>', 2),
(27, 'Beneficios', '<p>Las bolsas de papel cuentan con grandes beneficios como:</p><ul><li>100% biodegradables</li><li>Un menor tiempo de empaque y f&aacute;cil apilamiento de los productos.</li><li>Es m&aacute;s amplia y estable, permite sacar las compras de manera sencilla.</li><li>Son seguras para ni&ntilde;os y animales.</li><li>Permiten el posicionamiento de tu marca con alto impacto publicitario a bajo costo.</li><li>Son un medio de comunicaci&oacute;n responsable.</li></ul><p>Encuentra la ideal para tu producto dentro de nuestros tipos de bolsa.</p>', 3),
(28, 'Caracteristicas', '<p><br></p><ul><li>Auto-soporte en forma &nbsp;vertical.</li><li>Evitando &nbsp;la &nbsp;p&eacute;rdida &nbsp;o &nbsp;maltrato &nbsp;del contenido &nbsp;en el momento &nbsp;del &nbsp;llenado.</li><li>Facilita la acomodaci&oacute;n de los productos internos.</li><li>Impresiones y acabados especiales para bolsa tipo boutique.</li><li>Entregas de alimentos a domicilio.</li><li>Buena conservaci&oacute;n del estado natural del alimento ya que no permite condensar la humedad dentro del empaque.</li></ul>', 3),
(29, 'Especificaciones', '<p><strong>Caracter&iacute;sticas:</strong></p><ul><li><strong>Papel:</strong> Antigrasa, Bond, Earth pact, y Kraft</li><li><strong>Impresi&oacute;n:</strong> Flexoagua</li><li><strong>Gramaje:</strong> De 60 a 170g</li><li><strong>Capacidad:</strong> Desde 1 kg hasta 25 kg seg&uacute;n vol&uacute;men.</li></ul><p><strong>Medidas:</strong></p><ul><li><strong>Ancho:</strong> M&iacute;nimo 12 cm, m&aacute;ximo 22 cm.</li><li><strong>Fuelle:</strong> M&iacute;nimo 8 cm, m&aacute;ximo 16 cm.</li><li><strong>Largo:</strong> M&iacute;nimo 32 cm, m&aacute;ximo 42 cm.</li><li>Largo &uacute;til depende de la medida del fuelle.</li></ul><p><strong>Opcional:</strong></p><ul><li><strong>Ventanilla:</strong> En PLA (&Aacute;cido Poli l&aacute;ctico a base de ma&iacute;z), que permiten la exhibici&oacute;n del producto.</li><li><strong>Medida de la ventanilla:</strong> Desde 2 hasta 27 cms. conservando margen m&iacute;nimo de 3 cm de papel a cada lado.</li><li><strong>Impresi&oacute;n:</strong> hasta 4 tintas desde 10.000 unidades.</li><li><strong>Manijas:</strong> Troquelada, Refuerzo en cart&oacute;n, Trenzada En papel, Cord&oacute;n trenzado, Cintas, Cordones.</li><li><strong>Refuerzos de cart&oacute;n:</strong> en solapa y/o base.</li></ul>', 3),
(30, 'Beneficios', '<p>Las bolsas de papel cuentan con grandes beneficios como:</p><ul><li>100% biodegradables</li><li>Un menor tiempo de empaque y f&aacute;cil apilamiento de los productos.</li><li>Es m&aacute;s amplia y estable, permite sacar las compras de manera sencilla.</li><li>Son seguras para ni&ntilde;os y animales.</li><li>Permiten el posicionamiento de tu marca con alto impacto publicitario a bajo costo.</li><li>Son un medio de comunicaci&oacute;n responsable.</li></ul><p>Encuentra la ideal para tu producto dentro de nuestros tipos de bolsa.</p>', 4),
(31, 'Características', '<ul><li>Auto-soporte en forma &nbsp;vertical.</li><li>Evitando &nbsp;la &nbsp;p&eacute;rdida &nbsp;o &nbsp;maltrato &nbsp;del contenido &nbsp;en el momento &nbsp;del &nbsp;llenado.</li><li>Facilita la acomodaci&oacute;n de los productos internos.</li><li>Impresiones y acabados especiales para bolsa tipo boutique.</li><li>Entregas de alimentos a domicilio.</li><li>Buena conservaci&oacute;n del estado natural del alimento ya que no permite condensar la humedad dentro del empaque</li></ul><p>Nuestras bolsas tipo autom&aacute;tica es com&uacute;n usarlas para domicilios de comida, ayudan a la buena conservaci&oacute;n del estado natural del alimento evitando la condensaci&oacute;n de humedad dentro del empaque. La base cuadrada o rectangular le permite auto soportarse en forma vertical, evitando la p&eacute;rdida o maltrato del contenido en el momento del llenado, facilitando la mejor acomodaci&oacute;n de los productos internos. </p>', 4),
(32, 'Especificaciones', '<p><strong>Caracter&iacute;sticas:</strong></p><ul><li><strong>Papel:</strong> Antigrasa, Bond, Earth pact, y Kraft</li><li><strong>Impresi&oacute;n:</strong> Flexoagua</li><li><strong>Gramaje:</strong> De 60 a 170g</li><li><strong>Capacidad:</strong> Desde 1 kg hasta 25 kg seg&uacute;n vol&uacute;men.</li></ul><p><strong>Medidas:</strong></p><ul><li><strong>Ancho:</strong> M&iacute;nimo 12 cm, m&aacute;ximo 22 cm.</li><li><strong>Fuelle:</strong> M&iacute;nimo 8 cm, m&aacute;ximo 16 cm.</li><li><strong>Largo:</strong> M&iacute;nimo 32 cm, m&aacute;ximo 42 cm.</li><li>Largo &uacute;til depende de la medida del fuelle.</li></ul><p><strong>Opcional:</strong></p><ul><li><strong>Ventanilla:</strong> En PLA (&Aacute;cido Poli l&aacute;ctico a base de ma&iacute;z), que permiten la exhibici&oacute;n del producto.</li><li><strong>Medida de la ventanilla:</strong> Desde 2 hasta 27 cms. conservando margen m&iacute;nimo de 3 cm de papel a cada lado.</li><li><strong>Impresi&oacute;n:</strong> hasta 4 tintas desde 10.000 unidades.</li><li><strong>Manijas:</strong> Troquelada, Refuerzo en cart&oacute;n, Trenzada En papel, Cord&oacute;n trenzado, Cintas, Cordones.</li><li><strong>Refuerzos de cart&oacute;n:</strong> en solapa y/o base.</li></ul>', 4),
(33, 'Beneficios', '<p>Las bolsas de papel cuentan con grandes beneficios como:</p><ul><li>100% biodegradables</li><li>Un menor tiempo de empaque y f&aacute;cil apilamiento de los productos.</li><li>Es m&aacute;s amplia y estable, permite sacar las compras de manera sencilla.</li><li>Son seguras para ni&ntilde;os y animales.</li><li>Permiten el posicionamiento de tu marca con alto impacto publicitario a bajo costo.</li><li>Son un medio de comunicaci&oacute;n responsable.</li></ul><p>Encuentra la ideal para tu producto dentro de nuestros tipos de bolsa.</p>', 6),
(34, 'Características', '<ul><li>Gramajes con papeles mayores a 80gr.</li><li>T&eacute;cnica de impresi&oacute;n es Litograf&iacute;a.</li><li>Bolsas hechas a mano.</li><li>Se puede imprimir en Policrom&iacute;a</li></ul>', 6),
(35, 'Especificaciones', '<p>Bolsas hechas a mano en impresi&oacute;n litogr&aacute;fica con tintas base agua.</p><ul><li><strong>Papel:</strong> Bond, Earth Pact, Carton Kraft</li><li><strong>Impresi&oacute;n:</strong> Litogr&aacute;fica en tintas a base de soya</li><li><strong>Gramaje:</strong> 120gr hasta 260 gr</li><li><strong>Capacidad:</strong> Desde 3Kg hasta 5Kg. Dependiendo de la densidad del producto contenido.</li></ul><p><br></p><p><strong>Opcional:</strong></p><ul><li>Manija de Cinta</li><li>Manija Trenzada</li><li>Manijas Troqueladas</li><li>Manijas Cord&oacute;n</li><li>Manijas Cinta</li></ul>', 6),
(36, 'Beneficios', '<p>Las bolsas de papel cuentan con grandes beneficios como:</p><p><br></p><ul type=\"disc\"><li>100% biodegradables</li><li>Un menor tiempo de empaque y f&aacute;cil apilamiento de los productos.</li><li>Es m&aacute;s amplia y estable, permite sacar las compras de manera sencilla.</li><li>Son seguras para ni&ntilde;os y animales.</li><li>Permiten el posicionamiento de tu marca con alto impacto publicitario a bajo costo.</li><li>Son un medio de comunicaci&oacute;n responsable.</li></ul><p><br></p><p>Encuentra la ideal para tu producto dentro de nuestros tipos de bolsa.</p>', 5),
(37, 'Características', '<ul type=\"disc\"><li>Auto-soporte en forma &nbsp;vertical.</li><li>Evitando &nbsp;la &nbsp;p&eacute;rdida &nbsp;o &nbsp;maltrato &nbsp;del contenido &nbsp;en el momento &nbsp;del &nbsp;llenado.</li><li>Facilita la acomodaci&oacute;n de los productos internos.</li><li>Impresiones y acabados especiales para bolsa tipo boutique.</li><li>Entregas de alimentos a domicilio.</li><li>Buena conservaci&oacute;n del estado natural del alimento ya que no permite condensar la humedad dentro del empaque</li></ul><p><br></p><p>Nuestras bolsas tipo autom&aacute;tica es com&uacute;n usarlas para domicilios de comida, ayudan a la buena conservaci&oacute;n del estado natural del alimento evitando la condensaci&oacute;n de humedad dentro del empaque. La base cuadrada o rectangular le permite auto soportarse en forma vertical, evitando la p&eacute;rdida o maltrato del contenido en el momento del llenado, facilitando la mejor acomodaci&oacute;n de los productos internos.</p>', 5),
(38, 'Especificaciones', '<p><strong>Caracter&iacute;sticas:</strong></p><p><br></p><ul type=\"disc\"><li><strong>Papel:</strong> Antigrasa, Bond, Earth pact, y Kraft</li><li><strong>Impresi&oacute;n:</strong> Flexoagua</li><li><strong>Gramaje:</strong> De 60 a 170g</li><li><strong>Capacidad:</strong> Desde 1 kg hasta 25 kg seg&uacute;n vol&uacute;men.</li></ul><p><br></p><p><strong>Medidas:</strong></p><p><br></p><ul type=\"disc\"><li><strong>Ancho:</strong> M&iacute;nimo 12 cm, m&aacute;ximo 22 cm.</li><li><strong>Fuelle:</strong> M&iacute;nimo 8 cm, m&aacute;ximo 16 cm.</li><li><strong>Largo:</strong> M&iacute;nimo 32 cm, m&aacute;ximo 42 cm.</li><li>Largo &uacute;til depende de la medida del fuelle.</li></ul><p><br></p><p><strong>Opcional:</strong></p><p><br></p><ul type=\"disc\"><li><strong>Ventanilla:</strong> En PLA (&Aacute;cido Poli l&aacute;ctico a base de ma&iacute;z), que permiten la exhibici&oacute;n del producto.</li><li><strong>Medida de la ventanilla:</strong> Desde 2 hasta 27 cms. conservando margen m&iacute;nimo de 3 cm de papel a cada lado.</li><li><strong>Impresi&oacute;n:</strong> hasta 4 tintas desde 10.000 unidades.</li><li><strong>Manijas:</strong> Troquelada, Refuerzo en cart&oacute;n, Trenzada En papel, Cord&oacute;n trenzado, Cintas, Cordones.</li><li><strong>Refuerzos de cart&oacute;n:</strong> en solapa y/o base.</li></ul>', 5),
(39, 'Beneficios', '<p>Las bolsas de papel cuentan con grandes beneficios como:</p><p><br></p><ul><li>100% biodegradables</li><li>Un menor tiempo de empaque y f&aacute;cil apilamiento de los productos.</li><li>Es m&aacute;s amplia y estable, permite sacar las compras de manera sencilla.</li><li>Son seguras para ni&ntilde;os y animales.</li><li>Permiten el posicionamiento de tu marca con alto impacto publicitario a bajo costo.</li><li>Son un medio de comunicaci&oacute;n responsable.</li></ul><p><br></p><p>Encuentra la ideal para tu producto dentro de nuestros tipos de bolsa.</p>', 7),
(40, 'Características', '<ul><li>Elaboradas en 1 a 3 capas de papeles.</li><li>Flexibilidad por los materiales usados.</li><li>Permiten que &nbsp;resistan &nbsp;golpes &nbsp;e impacto sin romperse.</li><li>Mayor resistencia y seguridad.</li><li>Saco extensible se componen de 1 a 3 pliegos de papel, estas capas aportan mayor resistencia para enfrentar el bodegaje, apilamiento y manipulaci&oacute;n. </li></ul>', 7),
(41, 'Especificaciones', '<p>Se componen de 1 a 3 pliegos de papel, estas capas aportan mayor resistencia para enfrentar el bodegaje, apilamiento y manipulaci&oacute;n.</p><p><br></p><ul><li><strong>Papel:</strong> Kraft extensible</li><li><strong>Gramaje:</strong> De 80 a 150g.</li><li><strong>Capacidad:</strong> Desde 12Kg hasta 25Kg. (Dependiendo de la densidad del producto contenido).</li></ul><p><br></p><p><strong>Fondo:</strong></p><ul><li>Cosido con hilos de algod&oacute;n.</li><li>Ray&oacute;n.</li><li>Fondo cuadrado reforzado con l&aacute;mina adicional de papel para mayor resistencia y seguridad.</li></ul><p><br></p><p><strong>Impresi&oacute;n:</strong>&nbsp;</p><ul><li>Flexogr&aacute;fica de 1 a 3 tintas.</li></ul>', 7),
(42, 'Beneficios', '<p>Hemos desarrollado una l&iacute;nea de empaques desechables en los que podr&aacute;s exhibir, llevar y servir todo tipo de alimentos.</p><p>Pueden ser laminados con PLA (&Aacute;cido Polil&aacute;ctico a base de ma&iacute;z) pl&aacute;stico a base de ma&iacute;z, o con ventanas del mismo material para que tu producto quede visible.</p><p>Pueden ser impresos con tinta a base agua o base vegetal.</p><p><br></p><p><strong>Cart&oacute;n de ca&ntilde;a</strong></p><p>Es una nueva e innovadora cartulina natural resistente a la grasa, fabricada 100% con fibra de ca&ntilde;a de az&uacute;car. Totalmente libre de pl&aacute;stico, qu&iacute;micos blanqueadores y fluorocarbono, ideal para estar en contacto directo con alimentos.</p><p><br></p><p><strong>PLA</strong></p><p>Abreviatura de PolyLacticAcid, que es un abono org&aacute;nico, pel&iacute;cula que permite muchas m&aacute;s opciones para mantener las etiquetas y empaques de relleno sanitario. El PLA se fabrica con un pl&aacute;stico derivado del ma&iacute;z.</p>', 9),
(43, 'Características', '<p>Son empaques que se adaptan a todo tipo de alimentos preparados. Se pueden laminar en&nbsp;<strong>PLA (&aacute;cido polil&aacute;ctico)</strong> pl&aacute;stico a base de ma&iacute;z, para aislar la humedad y la grasa, protegi&eacute;ndolos del clima y del exterior para permitir que lleguen con una excelente presentaci&oacute;n y conservar la calidad original del producto.</p><p><br></p><p>Elaborados en cart&oacute;n de ca&ntilde;a de az&uacute;car desde 200g a 320g.</p><p><br></p><p>Se pueden personalizar para destacar la marca del producto con impresi&oacute;n Offset, hasta 4 tintas que son base soya, y no alteran ni el sabor ni el olor del producto.</p><p><br></p><p>Dise&ntilde;amos y desarrollamos empaques de acuerdo a las necesidades de nuestros clientes.</p><p><br></p><p><strong>Cantidad m&iacute;nimas de impresi&oacute;n:</strong> 200 Unidades</p><p><br></p><p>Nuestros empaques est&aacute;n desarrollados para ayudar al planeta aunque son empaques desechables, los materiales utilizados son 100% biodegradables.</p><p><br></p><p>Empaques dise&ntilde;ados para llevar todo tipo de productos Empaque que cumple la funcion de estuche.</p>', 9);

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
(843, 'http://localhost/upload/img/IMG-1611685560-60105eb8171f0.jpg', 4),
(844, 'http://localhost/upload/img/IMG-1611685630-60105efec09cc.jpg', 5),
(845, 'http://localhost/upload/img/IMG-1611685651-60105f13f39fb.jpg', 3),
(846, 'http://localhost/upload/img/IMG-1611685702-60105f469b9e4.jpg', 1),
(850, 'http://localhost/upload/img/IMG-1611700281-6010983952a24.jpg', 2),
(851, 'http://localhost/upload/img/IMG-1611700281-601098395283a.jpg', 2),
(852, 'http://localhost/upload/img/IMG-1611700281-601098399b8c5.jpg', 2),
(853, 'http://localhost/upload/img/IMG-1611700281-601098399fa63.jpg', 2),
(854, 'http://localhost/upload/img/IMG-1611700281-60109839ad839.jpg', 2),
(855, 'http://localhost/upload/img/IMG-1611700281-60109839b2bbc.jpg', 2),
(856, 'http://localhost/upload/img/IMG-1611715704-6010d4789467e.jpg', 6),
(857, 'http://localhost/upload/img/IMG-1611715718-6010d48622f88.jpg', 6),
(858, 'http://localhost/upload/img/IMG-1611941111-601444f7c2269.jpg', 7),
(859, 'http://localhost/upload/img/IMG-1611941120-60144500e03ab.jpg', 7),
(860, 'http://localhost/upload/img/IMG-1611943280-60144d70aa434.jpg', 8),
(862, 'http://localhost/upload/img/IMG-1611961988-60149684c2977.jpg', 9),
(863, 'http://localhost/upload/img/IMG-1611961988-60149684c2977.jpg', 9),
(864, 'http://localhost/upload/img/IMG-1611961989-6014968506e51.jpg', 9),
(865, 'http://localhost/upload/img/IMG-1611961989-601496850b518.jpg', 9),
(866, 'http://localhost/upload/img/IMG-1611961989-601496851e15e.jpg', 9),
(867, 'http://localhost/upload/img/IMG-1611961989-601496851ed16.jpg', 9),
(868, 'http://localhost/upload/img/IMG-1611961989-6014968544340.jpg', 9),
(869, 'http://localhost/upload/img/IMG-1611961989-6014968554698.jpg', 9),
(870, 'http://localhost/upload/img/IMG-1611961989-601496855b11a.jpg', 9),
(871, 'http://localhost/upload/img/IMG-1611961989-601496857869f.jpg', 9),
(872, 'http://localhost/upload/img/IMG-1611967842-6014ad623eac5.jpg', 9),
(878, 'http://localhost/upload/img/IMG-1616691042-605cbf62235c5.20', 1),
(879, 'http://localhost/upload/img/IMG-1616691042-605cbf62235df.20', 1),
(880, 'http://localhost/upload/img/IMG-1616691042-605cbf6291c9e.22', 1),
(881, 'http://localhost/upload/img/IMG-1616691042-605cbf62953ab.25', 1);

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
  `material_id` int(11) DEFAULT NULL,
  `measurement_id` int(11) DEFAULT NULL,
  `quotations_id_quotations` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(5, '/images/beach.jpg', '¿Qué tipo de empaque quieres tener?', '100% Biodegradable', 'Empaques desarrollados para que ayudemos al planeta.');

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
(4, 'oliver'),
(1, 'sergio.velandia@gmail.com'),
(3, 'sergio.velandia@teenus.com.co');

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
-- Indices de la tabla `cantidades_producto`
--
ALTER TABLE `cantidades_producto`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `cotizadores`
--
ALTER TABLE `cotizadores`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `width` (`width`,`height`,`lenght`,`products_id_products`,`id_material`) USING BTREE,
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
  ADD PRIMARY KEY (`id_quotations_details`,`products_id_products`,`quotations_id_quotations`) USING BTREE,
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
  MODIFY `id_admins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `banner_shop`
--
ALTER TABLE `banner_shop`
  MODIFY `id_banner_shop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cantidades_producto`
--
ALTER TABLE `cantidades_producto`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carousel_clients`
--
ALTER TABLE `carousel_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id_clients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `cotizadores`
--
ALTER TABLE `cotizadores`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materials`
--
ALTER TABLE `materials`
  MODIFY `id_materials` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `measurements`
--
ALTER TABLE `measurements`
  MODIFY `id_measurements` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `notices`
--
ALTER TABLE `notices`
  MODIFY `id_notice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `numbers_home`
--
ALTER TABLE `numbers_home`
  MODIFY `id_numbers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `products_tabs`
--
ALTER TABLE `products_tabs`
  MODIFY `id_tab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id_product_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=882;

--
-- AUTO_INCREMENT de la tabla `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id_quotations` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `quotations_details`
--
ALTER TABLE `quotations_details`
  MODIFY `id_quotations_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
-- AUTO_INCREMENT de la tabla `suscribers`
--
ALTER TABLE `suscribers`
  MODIFY `id_suscriber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `fk_categories_categories1` FOREIGN KEY (`parent_category`) REFERENCES `categories` (`id_categories`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_material_quotations_details` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id_materials`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_measurement_quotations_details` FOREIGN KEY (`measurement_id`) REFERENCES `measurements` (`id_measurements`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_quotations_details_quotations1` FOREIGN KEY (`quotations_id_quotations`) REFERENCES `quotations` (`id_quotations`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
