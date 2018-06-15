-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2018 a las 18:09:36
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `articulos_ucm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_calificacion` int(11) NOT NULL,
  `calificacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id_calificacion`, `calificacion`) VALUES
(0, 'Rechazado'),
(3, 'Sin calificar'),
(1, 'Aceptado'),
(2, 'Aceptado con Recomendaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campo_investigacion`
--

CREATE TABLE `campo_investigacion` (
  `id_campo` int(11) NOT NULL,
  `nombre_campo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campo_investigacion`
--

INSERT INTO `campo_investigacion` (`id_campo`, `nombre_campo`) VALUES
(10, 'Inducción a la vida universitaria'),
(11, 'Habilidades Sociales'),
(12, 'Aplicación del conocimiento científico'),
(14, 'Monitoriamiento de estudiantes del primer año'),
(15, 'Pensamiento computacional'),
(16, 'Metodología de enseñanza'),
(17, 'Infraestructura y recursos de apoyo a la enseñanza aprendizaje'),
(18, 'Experiencias de aprendizaje en la disciplina'),
(19, 'Certificaciones'),
(20, 'Prácticas pre-profesionales y profesionales'),
(21, 'Trabajo de título'),
(23, 'Vinculación con el medio'),
(25, 'Desarrollo de competencias genéricas'),
(26, 'Desarrollo, evaluación y certificación de competencias'),
(27, 'Diseño curricular'),
(28, 'Gestión académica'),
(29, 'Experiencia en auto-evaluación y acreditación de carrera'),
(31, 'Estudios relacionados con  la profesión'),
(32, 'Ingeniería de clase mundial'),
(33, 'Efectividad y resultado del proceso formativo'),
(34, 'Robotica'),
(35, 'Electronica'),
(36, 'Seguridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campo_revisor`
--

CREATE TABLE `campo_revisor` (
  `id_campo_usuario` int(11) NOT NULL,
  `id_campo` int(11) NOT NULL,
  `id_revisor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campo_revisor`
--

INSERT INTO `campo_revisor` (`id_campo_usuario`, `id_campo`, `id_revisor`) VALUES
(1, 10, 20),
(2, 11, 20),
(3, 12, 20),
(4, 10, 21),
(5, 11, 21),
(6, 12, 21),
(7, 10, 21),
(8, 11, 21),
(9, 10, 26),
(10, 11, 26),
(11, 12, 26),
(12, 10, 27),
(13, 11, 27),
(14, 12, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campo_usuario`
--

CREATE TABLE `campo_usuario` (
  `id_campo_usuario` int(11) NOT NULL,
  `id_campo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id_configuracion` int(11) NOT NULL,
  `max_dia_asig_art` int(11) NOT NULL,
  `max_revi_art` int(11) NOT NULL,
  `max_dia_res_art` int(11) NOT NULL,
  `max_dia_edi_rev_art` int(11) NOT NULL,
  `fecha_configuracion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `max_dia_reev_art` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id_configuracion`, `max_dia_asig_art`, `max_revi_art`, `max_dia_res_art`, `max_dia_edi_rev_art`, `fecha_configuracion`, `max_dia_reev_art`) VALUES
(2, 1, 2, 3, 4, '2018-02-14 01:35:39', 0),
(3, 2, 3, 4, 5, '0000-00-00 00:00:00', 0),
(4, 20, 3, 20, 20, '2018-05-15 22:18:50', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `contenido` varchar(100) NOT NULL,
  `texto_espanol` varchar(10000) NOT NULL,
  `texto_ingles` varchar(10000) NOT NULL,
  `texto_portugues` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`contenido`, `texto_espanol`, `texto_ingles`, `texto_portugues`) VALUES
('coeditor', '<p>Pablo Campos 2</p>\r\n', 'co-edit', 'co-editiñao'),
('comite editor', '<p>Pablo Campos 1</p>\r\n', 'comite editor', 'comite editor'),
('comite editor asesor', '<p>Pablo Campos 4</p>\r\n', 'comite editor asesor', 'comite editor asesor'),
('editor', '<p>Pablo Campos</p>\r\n', 'edit', 'editiño'),
('mensaje aceptación', '<p>mensaje por defecto</p>\r\n', '', ''),
('mensaje publicacion', 'mensaje por defecto', '', ''),
('mensaje recepcion', '<p>se ha recepcionado el art&iacute;culo satisfactoriamente.</p>\r\n', '', ''),
('nosotros', '<p align=\"justify\"><b>Bienvenidos a la Revista Educación de Calidad en Ingeneiría</b> ,  una revista electrónica   publicada en español y portugués por la Facultad de Ciencias de la Ingeniería de la Universidad Católica del Maule.  La revista \r\n publica trabajos originales e innovadores   de académicos y profesionales que contribuyan, desde diferentes perpectivas,  con la calidad de los resultados  del proceso formativo de ingeniería.</p>\r\n\r\n<p align=\"justify\">La revista fue  creada en 2017  con el propósito de difundir un amplio espectro de temas relacionados, por ejemplo,   con  la formación de los estudiantes de ingeniería, la gestión curricular, experiencias de enseñanza aprendizaje,  vinculación con el medio, y efectividad y resultados del proceso de  formativo.  </p>', 'Changed to english', 'cambious to portuguese'),
('numeros', 'Algo de utilidad puede tener, añadir lo que se desee en este item.', 'Changed to English', 'Camboya to portugueses'),
('politicas', '<h2>Normas y pol&iacute;ticas editoriales</h2>\r\n\r\n<ol>\r\n	<li>Exclusividad\r\n	<ul>\r\n		<li>Los art&iacute;culos deben ser resultado de investigaciones de alto nivel acad&eacute;mico y/o profesional, que aportan conocimiento original e in&eacute;dito</li>\r\n		<li>El art&iacute;culo enviado a la revista no deben estar en proceso de evaluaci&oacute;n en otra revista</li>\r\n		<li>Todo colaborador deber&aacute; entregar firmada una &ldquo;Declaraci&oacute;n de originalidad del trabajo escrito&rdquo;, cuyo formato est&aacute; disponible en la gu&iacute;a del autor</li>\r\n		<li>Se admiten textos en espa&ntilde;ol y portugu&eacute;s.</li>\r\n	</ul>\r\n	</li>\r\n	<br />\r\n	<li>Evaluaci&oacute;n\r\n	<ul>\r\n		<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>\r\n		<li>Todos los art&iacute;culos ser&aacute;n sometidos a una valoraci&oacute;n editorial preliminar por parte del Comit&eacute; de Redacci&oacute;n, que se reserva el derecho de determinar si los art&iacute;culos se ajustan a las l&iacute;neas de inter&eacute;s de la Revista y cumplen con los requisitos indispensables de un art&iacute;culo cient&iacute;fico, as&iacute; como con todos y cada uno de los lineamientos editoriales aqu&iacute; establecidos.</li>\r\n		<li>Las resoluciones del proceso de dictamen son\r\n		<ul>\r\n			<li>Aprobado para publicar sin cambios</li>\r\n			<li>Condicionado a cambios obligatorios sujeto a reenv&iacute;o. El editor informa un plazo m&aacute;ximo para enviar las modificaciones. Las correcciones se colocan al final del archivo, explican los ajustes realizado. Independiente de las evaluaciones de los revisores, el editor tiene la &uacute;ltima opci&oacute;n de aceptar o rechazar el art&iacute;culo. el autor deber&aacute; atender puntualmente las observaciones, adiciones, correcciones, ampliaciones o aclaraciones sugeridas por los &aacute;rbitros. La/el autor/a tendr&aacute; como m&aacute;ximo treinta d&iacute;as naturales como l&iacute;mite para hacer las correcciones. Una vez que el art&iacute;culo sea corregido siguiendo las recomendaciones, ser&aacute; remitido a los dictaminadores y ser&aacute;n ellos quienes lo consideren finalmente publicable</li>\r\n			<li>Rechazado.</li>\r\n		</ul>\r\n		</li>\r\n		<br />\r\n		<br />\r\n		&nbsp;\r\n	</ul>\r\n	</li>\r\n	<li>Publicaci&oacute;n\r\n	<ul>\r\n		<li>El trabajo podr&aacute; ser publicado siempre y cuando su contenido sea compatible con los tiempos, l&iacute;neas editoriales y tem&aacute;ticas que la Revista dicte en su momento.</li>\r\n		<li>Todo colaborador deber&aacute; entregar firmada una &ldquo;Declaraci&oacute;n de originalidad del trabajo escrito&rdquo;, cuyo formato est&aacute; disponible en la gu&iacute;a del autor</li>\r\n	</ul>\r\n	</li>\r\n	<br />\r\n	<li>Correcci&oacute;n y edici&oacute;n\r\n	<ul>\r\n		<li>La Revista Educaci&oacute;n de Calidad en Ingenier&iacute;a se reserva el derecho de incorporar los cambios editoriales y las correcciones de estilo que considere pertinentes de conformidad con los criterios de la Editora y/o de su Comit&eacute; de Redacci&oacute;n</li>\r\n	</ul>\r\n	</li>\r\n	<br />\r\n	<li>Cesi&oacute;n de derechos y difusi&oacute;n del material publicado\r\n	<ul>\r\n		<li>La publicaci&oacute;n del art&iacute;culo implica la cesi&oacute;n por parte de la/el autor/a de los derechos patrimoniales de su art&iacute;culo, as&iacute; como su permiso a difundirlo por los medios que se consideren pertinentes, ya sean impresos o electr&oacute;nicos. Para tal efecto, una vez aceptado el trabajo para su publicaci&oacute;n, cada autor deber&aacute; firmar una carta de cesi&oacute;n de derechos.</li>\r\n		<li>Sin la &quot;carta de cesi&oacute;n de derechos&quot; no se podr&aacute; proceder a la publicaci&oacute;n del material</li>\r\n		<li>La Revista autoriza a sus colaboradores a que ofrezcan en sus webs personales o en cualquier repositorio de acceso abierto, una copia de sus trabajos publicados siempre y cuando se mencione espec&iacute;ficamente a la Revista Educaci&oacute;n de Calidad en Ingenier&iacute;a como fuente original de procedencia, citando el a&ntilde;o y n&uacute;mero del ejemplar respectivo y a&ntilde;adiendo el enlace a la p&aacute;gina web de la revista.</li>\r\n	</ul>\r\n	</li>\r\n	<br />\r\n	<li>Informaci&oacute;n para autoras/es\r\n	<ul>\r\n		<li>Descargar la gu&iacute;a del autor: http://45.55.94.205/mak_hum/index.php/Home_principal/plantilla</li>\r\n	</ul>\r\n	</li>\r\n</ol>\r\n', 'Changed to english', 'cambuite to portuguese'),
('produccion editorial', '<p>Pablo Campos</p>\r\n', 'produccion editorial', 'produccion editorial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre_estado`) VALUES
(1, 'En Espera Revisión Formato'),
(2, 'No asignado a revisor'),
(3, 'Asignado a revisor'),
(4, 'Rechazado'),
(5, 'Aceptado'),
(6, 'Aceptado con comentarios'),
(7, 'En Edicion'),
(8, 'Publicado'),
(9, 'Rechazado por TimeOut'),
(10, 'Incluye Modificaciones'),
(11, 'No incluye Modificaciones'),
(12, 'Esperando PDF paginado'),
(13, 'PDF Paginado Recibido'),
(14, 'Revisado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `final_magazine`
--

CREATE TABLE `final_magazine` (
  `ID` int(11) NOT NULL,
  `ID_articulo` int(11) NOT NULL,
  `ID_magazine` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `pagina_inicio` int(11) NOT NULL,
  `pagina_fin` int(11) NOT NULL,
  `file_papper` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `final_magazine`
--

INSERT INTO `final_magazine` (`ID`, `ID_articulo`, `ID_magazine`, `titulo`, `pagina_inicio`, `pagina_fin`, `file_papper`) VALUES
(6, 10, 4, 'asdasd', 1, 10, 'asdasdmoises_intech@gmail_com2017-12-10_05_01_36.docx.pdf'),
(7, 13, 4, 'gajajsn', 11, 21, 'gajajsnmoises_intech@gmail_com2017-12-10_12_42_14.docx.pdf'),
(8, 26, 1, 'articulo nuevo', 1, 10, 'articulo_nuevopablo.acm.ti@gmail.com2018-04-09_10_26_24.doc.pdf'),
(9, 36, 2, 'Articulo nuevo', 1, 10, 'Articulo_nuevomtoranzo@ucm.cl2018-04-13_11_15_40.docx.pdf'),
(29, 15, 3, 'Practica Docente en la asignatura Algoritmos y Estructuras de Datos', 1, 10, 'Practica_Docente_en_la_asignatura_Algoritmos_y_Estructuras_de_Datosmarcotoranzo@hotmail.com2018-06-10_03_49_03.docx.pdf'),
(30, 39, 4, 'articulo nuevo 3', 1, 10, 'articulo_nuevo_3pablo.acm.ti@gmail.com2018-06-11_10_46_37.docx.pdf'),
(31, 31, 4, 'asdasd', 11, 20, 'asdasdasdasd@asdas.cl2018-04-09_12_41_51.docx.pdf'),
(32, 38, 4, 'articulo nuevo 3', 21, 30, 'articulo_nuevo_3pablo.acm.ti@gmail.com2018-06-06_17_45_45.docx.pdf'),
(33, 40, 9999, 'articulo pc', 1, 1, 'articulo_pcp@c.cl2018-06-14_08_06_46.docx.pdf'),
(34, 14, 9999, 'asdasdsa', 1, 1, 'asdasdsamoises.intech@gmail.com2018-06-15_07_58_29.docx.pdf'),
(35, 25, 9999, 'dfsdf', 1, 1, 'dfsdfsdfsdgsdf2018-06-15_08_02_24.docx.pdf'),
(36, 28, 9999, 'asdasd', 1, 1, 'asdasd1234562018-06-15_08_04_28.docx.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lector`
--

CREATE TABLE `lector` (
  `ID` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_1` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_2` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `titulo_academico` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `organizacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lector`
--

INSERT INTO `lector` (`ID`, `email`, `nombre`, `apellido_1`, `apellido_2`, `titulo_academico`, `organizacion`, `telefono`) VALUES
(1, 'x_pablo_acm@hotmail.cpm', 'pablo', 'lector', 'lector', 'estudiante', 'ucm', '123456789'),
(2, 'x_pablo_acm@hotmail.com', 'pablo', 'lector', 'lector', 'alumno', 'ucm', '123456789'),
(3, 'x_pablo_acm@hotmail.com', 'pablo', 'lector', 'lector', 'alumno', 'ucm', '123456789'),
(4, 'x_pablo_acm@hotmail.com', 'pablo', 'lector', 'lector', 'alumno', 'ucm', '123456789'),
(5, 'pablo_lector@hotmail.com', 'asdasd', 'asdasd', 'asdasd', 'asdas', 'asd', '12312341'),
(6, 'pablo4@gmail.com', 'pablo', 'campos', 'moreno', 'estudiante', 'ucm', '97302438');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `clave` varchar(500) NOT NULL,
  `rol_fk` int(11) NOT NULL,
  `rol2_fk` int(11) DEFAULT NULL,
  `rol3_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`ID`, `correo`, `clave`, `rol_fk`, `rol2_fk`, `rol3_fk`) VALUES
(1, 'editor@ucm.cl', 'ec9b2638a2fd1b542fd317b0fcc8b81ec2347337', 1, NULL, NULL),
(12, 'No Asignado', 'No Asignado', 2, NULL, NULL),
(13, 'moises.intech@gmail.com', 'ec9b2638a2fd1b542fd317b0fcc8b81ec2347337', 3, 2, NULL),
(14, 'pmgarrido@outlook.com', '7465671ffdf66dcc67aa36faecb3f6f76dfd3069', 3, 555, NULL),
(15, 'a@a.com', '7465671ffdf66dcc67aa36faecb3f6f76dfd3069', 3, 2, NULL),
(16, 'a@b.com', '7465671ffdf66dcc67aa36faecb3f6f76dfd3069', 2, NULL, NULL),
(17, 'marcotoranzo@hotmail.com', 'ec9b2638a2fd1b542fd317b0fcc8b81ec2347337', 3, NULL, NULL),
(20, 'pablo@hotmail.com', '6f168a95dc35d3896a4c77268d92fa0bcbf515b3', 1, 2, 3),
(21, 'asda@hotmail.com', '71c81485cc9b67391285223b32f1ae06bafb2e9b', 3, NULL, NULL),
(22, 'x_pablo_acm@hotmail.com', 'a2e6a7551733e70a75592fa760ce9d82b2855d55', 4, NULL, NULL),
(23, 'pablo1@gmail.com', '4728f352febe33fd0d155ca61171f2c49aae9ccb', 2, NULL, NULL),
(24, 'pablo123@gmail.com', '4728f352febe33fd0d155ca61171f2c49aae9ccb', 2, NULL, NULL),
(25, 'pablo123@g.com', 'a2e6a7551733e70a75592fa760ce9d82b2855d55', 555, NULL, NULL),
(26, 'pablo1234@gmail.com', 'a2e6a7551733e70a75592fa760ce9d82b2855d55', 2, NULL, NULL),
(27, 'asd123123a@hotmail.com', 'a2e6a7551733e70a75592fa760ce9d82b2855d55', 555, NULL, NULL),
(28, 'pablo3@hotmail.com', '81bad9cf1197f40f38b7200d97d61bfbcd19b694', 555, NULL, NULL),
(29, 'pablo_lector@hotmail.com', 'a2e6a7551733e70a75592fa760ce9d82b2855d55', 4, NULL, NULL),
(30, 'pablo4@hotmail.com', 'd7cd3f1bbb27d8406017ec0edb34a931deb97af7', 777, NULL, NULL),
(31, 'pablo4@gmail.com', 'a2e6a7551733e70a75592fa760ce9d82b2855d55', 4, NULL, NULL),
(32, 'pablo6@hotmail.com', 'a2e6a7551733e70a75592fa760ce9d82b2855d55', 555, NULL, NULL),
(33, 'pablo7@hotmail.com', '71c81485cc9b67391285223b32f1ae06bafb2e9b', 2, NULL, NULL),
(34, 'pablo@hotmail.com1', '6f168a95dc35d3896a4c77268d92fa0bcbf515b3', 555, NULL, NULL),
(35, 'pablo8@hotmail.com', '6f168a95dc35d3896a4c77268d92fa0bcbf515b3', 2, NULL, NULL),
(36, 'pablo10@hotmail.com', '6f168a95dc35d3896a4c77268d92fa0bcbf515b3', 555, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `magazines`
--

CREATE TABLE `magazines` (
  `ID` int(11) NOT NULL,
  `titulo_revista` varchar(100) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_publicacion` varchar(100) NOT NULL,
  `logo_revista` varchar(100) NOT NULL,
  `palabras_editor` varchar(1000) NOT NULL,
  `revista_pdf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `magazines`
--

INSERT INTO `magazines` (`ID`, `titulo_revista`, `fecha_creacion`, `fecha_publicacion`, `logo_revista`, `palabras_editor`, `revista_pdf`) VALUES
(1, 'revista', '2018-04-09 13:18:37', 'MARZO 2018', '78744WhatsAppImage2017-12-07at12.30.jpg.jpg', 'ASDASFASD', ''),
(2, 'revista 2 ', '2018-05-16 05:13:20', '16-05-2018', '88263WhatsAppImage2017-12-07at12.30.jpg.jpg', 'esta revista es nueva', ''),
(3, 'revista', '2018-06-11 06:08:32', 'junio', '7810949714Rev.jpg.jpg.jpg', 'esta revista es de junio', ''),
(4, 'revista nueva junio', '2018-06-12 10:33:43', 'JUNIO 2018', '823977810949714Rev.jpg.jpg.jpg.jpg', 'esta revista contiene 3 articulos', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`ID`, `nombre`) VALUES
(1, 'Australia'),
(2, 'Austria'),
(3, 'Azerbaiyán'),
(4, 'Anguilla'),
(5, 'Argentina'),
(6, 'Armenia'),
(7, 'Bielorrusia'),
(8, 'Belice'),
(9, 'Bélgica'),
(10, 'Bermudas'),
(11, 'Bulgaria'),
(12, 'Brasil'),
(13, 'Reino Unido'),
(14, 'Hungría'),
(15, 'Vietnam'),
(16, 'Haiti'),
(17, 'Guadalupe'),
(18, 'Alemania'),
(19, 'Países Bajos, Holanda'),
(20, 'Grecia'),
(21, 'Georgia'),
(22, 'Dinamarca'),
(23, 'Egipto'),
(24, 'Israel'),
(25, 'India'),
(26, 'Irán'),
(27, 'Irlanda'),
(28, 'España'),
(29, 'Italia'),
(30, 'Kazajstán'),
(31, 'Camerún'),
(32, 'Canadá'),
(33, 'Chipre'),
(34, 'Kirguistán'),
(35, 'China'),
(36, 'Costa Rica'),
(37, 'Kuwait'),
(38, 'Letonia'),
(39, 'Libia'),
(40, 'Lituania'),
(41, 'Luxemburgo'),
(42, 'México'),
(43, 'Moldavia'),
(44, 'Mónaco'),
(45, 'Nueva Zelanda'),
(46, 'Noruega'),
(47, 'Polonia'),
(48, 'Portugal'),
(49, 'Reunión'),
(50, 'Rusia'),
(51, 'El Salvador'),
(52, 'Eslovaquia'),
(53, 'Eslovenia'),
(54, 'Surinam'),
(55, 'Estados Unidos'),
(56, 'Tadjikistan'),
(57, 'Turkmenistan'),
(58, 'Islas Turcas y Caicos'),
(59, 'Turquía'),
(60, 'Uganda'),
(61, 'Uzbekistán'),
(62, 'Ucrania'),
(63, 'Finlandia'),
(64, 'Francia'),
(65, 'República Checa'),
(66, 'Suiza'),
(67, 'Suecia'),
(68, 'Estonia'),
(69, 'Corea del Sur'),
(70, 'Japón'),
(71, 'Croacia'),
(72, 'Rumanía'),
(73, 'Hong Kong'),
(74, 'Indonesia'),
(75, 'Jordania'),
(76, 'Malasia'),
(77, 'Singapur'),
(78, 'Taiwan'),
(79, 'Bosnia y Herzegovina'),
(80, 'Bahamas'),
(81, 'Chile'),
(82, 'Colombia'),
(83, 'Islandia'),
(84, 'Corea del Norte'),
(85, 'Macedonia'),
(86, 'Malta'),
(87, 'Pakistán'),
(88, 'Papúa-Nueva Guinea'),
(89, 'Perú'),
(90, 'Filipinas'),
(91, 'Arabia Saudita'),
(92, 'Tailandia'),
(93, 'Emiratos árabes Unidos'),
(94, 'Groenlandia'),
(95, 'Venezuela'),
(96, 'Zimbabwe'),
(97, 'Kenia'),
(98, 'Algeria'),
(99, 'Líbano'),
(100, 'Botsuana'),
(101, 'Tanzania'),
(102, 'Namibia'),
(103, 'Ecuador'),
(104, 'Marruecos'),
(105, 'Ghana'),
(106, 'Siria'),
(107, 'Nepal'),
(108, 'Mauritania'),
(109, 'Seychelles'),
(110, 'Paraguay'),
(111, 'Uruguay'),
(112, 'Congo (Brazzaville)'),
(113, 'Cuba'),
(114, 'Albania'),
(115, 'Nigeria'),
(116, 'Zambia'),
(117, 'Mozambique'),
(119, 'Angola'),
(120, 'Sri Lanka'),
(121, 'Etiopía'),
(122, 'Túnez'),
(123, 'Bolivia'),
(124, 'Panamá'),
(125, 'Malawi'),
(126, 'Liechtenstein'),
(127, 'Bahrein'),
(128, 'Barbados'),
(130, 'Chad'),
(131, 'Man, Isla de'),
(132, 'Jamaica'),
(133, 'Malí'),
(134, 'Madagascar'),
(135, 'Senegal'),
(136, 'Togo'),
(137, 'Honduras'),
(138, 'República Dominicana'),
(139, 'Mongolia'),
(140, 'Irak'),
(141, 'Sudáfrica'),
(142, 'Aruba'),
(143, 'Gibraltar'),
(144, 'Afganistán'),
(145, 'Andorra'),
(147, 'Antigua y Barbuda'),
(149, 'Bangladesh'),
(151, 'Benín'),
(152, 'Bután'),
(154, 'Islas Virgenes Británicas'),
(155, 'Brunéi'),
(156, 'Burkina Faso'),
(157, 'Burundi'),
(158, 'Camboya'),
(159, 'Cabo Verde'),
(164, 'Comores'),
(165, 'Congo (Kinshasa)'),
(166, 'Cook, Islas'),
(168, 'Costa de Marfil'),
(169, 'Djibouti, Yibuti'),
(171, 'Timor Oriental'),
(172, 'Guinea Ecuatorial'),
(173, 'Eritrea'),
(175, 'Feroe, Islas'),
(176, 'Fiyi'),
(178, 'Polinesia Francesa'),
(180, 'Gabón'),
(181, 'Gambia'),
(184, 'Granada'),
(185, 'Guatemala'),
(186, 'Guernsey'),
(187, 'Guinea'),
(188, 'Guinea-Bissau'),
(189, 'Guyana'),
(193, 'Jersey'),
(195, 'Kiribati'),
(196, 'Laos'),
(197, 'Lesotho'),
(198, 'Liberia'),
(200, 'Maldivas'),
(201, 'Martinica'),
(202, 'Mauricio'),
(205, 'Myanmar'),
(206, 'Nauru'),
(207, 'Antillas Holandesas'),
(208, 'Nueva Caledonia'),
(209, 'Nicaragua'),
(210, 'Níger'),
(212, 'Norfolk Island'),
(213, 'Omán'),
(215, 'Isla Pitcairn'),
(216, 'Qatar'),
(217, 'Ruanda'),
(218, 'Santa Elena'),
(219, 'San Cristobal y Nevis'),
(220, 'Santa Lucía'),
(221, 'San Pedro y Miquelón'),
(222, 'San Vincente y Granadinas'),
(223, 'Samoa'),
(224, 'San Marino'),
(225, 'San Tomé y Príncipe'),
(226, 'Serbia y Montenegro'),
(227, 'Sierra Leona'),
(228, 'Islas Salomón'),
(229, 'Somalia'),
(232, 'Sudán'),
(234, 'Swazilandia'),
(235, 'Tokelau'),
(236, 'Tonga'),
(237, 'Trinidad y Tobago'),
(239, 'Tuvalu'),
(240, 'Vanuatu'),
(241, 'Wallis y Futuna'),
(242, 'Sáhara Occidental'),
(243, 'Yemen'),
(246, 'Puerto Rico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `controlador` int(11) NOT NULL,
  `funciones` int(11) NOT NULL,
  `is_authorized` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '1',
  `id_articulo` int(11) NOT NULL,
  `fechaUltimaRespuesta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `peticion` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id`, `estado`, `id_articulo`, `fechaUltimaRespuesta`, `peticion`) VALUES
(22, 0, 18, '2018-05-16 08:01:47', '									\r\n								'),
(23, 0, 15, '2018-06-10 07:29:59', 'necesito mas tiempo.\r\n										');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisor`
--

CREATE TABLE `revisor` (
  `ID` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido_1` varchar(250) NOT NULL,
  `apellido_2` varchar(250) NOT NULL,
  `titulo_academico` varchar(250) NOT NULL,
  `organizacion` varchar(250) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `biografia` varchar(1000) NOT NULL,
  `fk_tema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `revisor`
--

INSERT INTO `revisor` (`ID`, `email`, `nombre`, `apellido_1`, `apellido_2`, `titulo_academico`, `organizacion`, `telefono`, `biografia`, `fk_tema`) VALUES
(0, 'No Asignado', 'No Asignado', '', '', '', '', '', '', 0),
(14, 'moises.intech@gmail.com', 'Moises', 'Flores', 'Estay', 'ASDasdas', 'asdasd', '973950383', 'asdasd', 0),
(18, 'a@b.com', 'Revisando', 'Paper', 'Pro', 'ICI', 'UCM', '123456789', 'asdasd', 0),
(19, 'a@a.com', 'hola', 'mundo', 'pro', 'ici', 'ucm', '123456789', 'asdfasdf', 0),
(20, 'x_pablo_acm@hotmail.cpm', 'pablo', 'campos', 'moreno', 'alumno', 'ucm', '123456789', 'sdfsdfsdf', 0),
(21, 'x_pablo_acm@hotmail.com', 'pablo', 'campos', 'moreno', 'asca', 'sadasf', '123456789', 'dsfsdfsdf', 0),
(25, 'pablo@hotmail.com', 'Pablo', 'Campos', 'Moreno', 'Estudiante', 'ucm', '123456789', 'biografia', 0),
(29, 'pablo1234@gmail.com', 'pablo', 'campos', 'moreno', 'estudiante', 'ucm', '918281231', 'asdaasdasd', 0),
(30, 'asd123123a@hotmail.com', 'pablo', 'campos', 'moreno', 'estudiante', 'ucm', '918281231', 'asdasd', 0),
(31, 'pablo3@hotmail.com', 'pablo', 'campos', 'moreno', 'alumno', 'sadasf', '918281231', 'sadasdasd', 0),
(32, 'pablo4@hotmail.com', 'sdfsdf', 'lector', 'aasd', 'alumno', 'asda', '12346781', 'asdasd', 0),
(33, 'pablo6@hotmail.com', 'pablo', 'campos', 'moreno', 'estudiante', 'ucm', '123456789', 'sdasdd', 0),
(34, 'pablo7@hotmail.com', 'pablo', 'campos', 'moreno', 'estudiante', 'sadasf', '918281231', 'asd', 0),
(35, 'pablo@hotmail.com1', 'sdfsdf', 'asd', 'asd', 'asd', 'asd', '918281231', 'asd', 0),
(36, 'pablo8@hotmail.com', 'revisor tema 2', 'revisor', 'tema 2 ', 'estudiante', 'ucm', '123456789', 'estudio por mas de 5 años el tema 2 ', 0),
(37, 'pablo10@hotmail.com', 'pablo', 'campos', 'moreno', 'estudiante', 'ucm', '918281231', '<p>asdasd</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisor_tema`
--

CREATE TABLE `revisor_tema` (
  `id_revisor_tema` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `id_revisor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `revisor_tema`
--

INSERT INTO `revisor_tema` (`id_revisor_tema`, `id_tema`, `id_revisor`) VALUES
(1, 3, 29),
(2, 4, 29),
(3, 6, 29),
(4, 3, 14),
(5, 4, 14),
(6, 6, 14),
(7, 3, 18),
(8, 4, 18),
(9, 6, 18),
(10, 3, 19),
(11, 4, 19),
(12, 6, 19),
(13, 3, 20),
(14, 4, 20),
(15, 6, 20),
(16, 3, 21),
(17, 4, 21),
(18, 6, 21),
(19, 3, 22),
(20, 4, 22),
(21, 6, 22),
(22, 3, 25),
(23, 4, 25),
(24, 6, 25),
(25, 3, 30),
(26, 3, 31),
(27, 4, 31),
(28, 6, 31),
(29, 3, 32),
(30, 4, 32),
(31, 6, 32),
(32, 3, 36),
(33, 4, 36),
(34, 7, 36),
(35, 8, 36),
(36, 11, 36),
(37, 13, 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revista`
--

CREATE TABLE `revista` (
  `ID` int(11) NOT NULL,
  `titulo_revista` varchar(250) NOT NULL,
  `version` int(11) NOT NULL,
  `email_autor` varchar(250) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `palabras_claves` varchar(250) NOT NULL,
  `abstract` text NOT NULL,
  `autor_1` varchar(200) DEFAULT NULL,
  `autor_2` varchar(200) DEFAULT NULL,
  `autor_3` varchar(200) DEFAULT NULL,
  `autor_4` varchar(200) DEFAULT NULL,
  `archivo` varchar(250) NOT NULL,
  `comentarios` text NOT NULL,
  `fecha_ultima_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_ingreso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_revisor_1` int(11) DEFAULT '0',
  `id_revisor_2` int(11) DEFAULT '0',
  `id_revisor_3` int(11) DEFAULT '0',
  `comentario_revisor_1` varchar(1000) DEFAULT NULL,
  `comentario_revisor_2` varchar(1000) DEFAULT NULL,
  `comentario_revisor_3` varchar(1000) DEFAULT NULL,
  `comentarios_editor` text,
  `fecha_timeout` datetime DEFAULT NULL,
  `Fecha_asig_revision` datetime DEFAULT NULL,
  `pais` varchar(50) NOT NULL,
  `institucion` varchar(60) NOT NULL,
  `email_add1` varchar(50) DEFAULT NULL,
  `email_add2` varchar(50) DEFAULT NULL,
  `email_add3` varchar(50) DEFAULT NULL,
  `email_add4` varchar(50) DEFAULT NULL,
  `email_add5` varchar(50) DEFAULT NULL,
  `urlArticuloEnviado` varchar(100) NOT NULL,
  `autor_5` varchar(50) DEFAULT NULL,
  `autor_6` varchar(50) DEFAULT NULL,
  `id_post` int(11) DEFAULT '0',
  `id_revista` int(11) NOT NULL DEFAULT '0',
  `VerificacionTextoFecha` datetime DEFAULT NULL,
  `VerificacionTexto` int(11) DEFAULT '3',
  `calificaRev1` int(11) DEFAULT '3',
  `calificaRev2` int(11) DEFAULT '3',
  `calificaRev3` int(11) DEFAULT '3',
  `fechaCalificaRev` datetime DEFAULT NULL,
  `calificaFinal` int(11) DEFAULT '3',
  `fechaCalificaFInal` datetime DEFAULT NULL,
  `fechaReenvioarticulo` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `revista`
--

INSERT INTO `revista` (`ID`, `titulo_revista`, `version`, `email_autor`, `id_tema`, `id_estado`, `palabras_claves`, `abstract`, `autor_1`, `autor_2`, `autor_3`, `autor_4`, `archivo`, `comentarios`, `fecha_ultima_upd`, `fecha_ingreso`, `id_revisor_1`, `id_revisor_2`, `id_revisor_3`, `comentario_revisor_1`, `comentario_revisor_2`, `comentario_revisor_3`, `comentarios_editor`, `fecha_timeout`, `Fecha_asig_revision`, `pais`, `institucion`, `email_add1`, `email_add2`, `email_add3`, `email_add4`, `email_add5`, `urlArticuloEnviado`, `autor_5`, `autor_6`, `id_post`, `id_revista`, `VerificacionTextoFecha`, `VerificacionTexto`, `calificaRev1`, `calificaRev2`, `calificaRev3`, `fechaCalificaRev`, `calificaFinal`, `fechaCalificaFInal`, `fechaReenvioarticulo`) VALUES
(10, 'asdasd', 1, 'moises.intech@gmail.com', 9, 8, 'aSDasda', 'asdasd', 'Moises Flores Estay', '', '', '', 'asdasdmoises_intech@gmail_com2017-12-10_05_01_36.docx', '', '2017-12-10 15:54:38', '2017-12-10 05:01:36', 0, 0, 0, NULL, NULL, NULL, NULL, '2018-01-03 00:00:00', NULL, '', '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'gajajsn', 2, 'moises.intech@gmail.com', 9, 8, 'sdsddfsds', 'ssdfss', 'Moises Flores Estay', '', '', '', 'gajajsnmoises_intech@gmail_com2017-12-10_12_42_14.docx', '', '2018-04-11 08:58:12', '2017-12-10 12:42:14', 0, 0, 0, 'HOLA ESTE PAPER TIENE UN PEQUEÑO DETALLE, ESTA MALO.', NULL, NULL, 'ASAsAS', '2017-12-13 00:00:00', NULL, '', '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00 00:00:00', 3, 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'asdasdsa', 2, 'moises.intech@gmail.com', 3, 13, 'aSDasdasd', '<p>asdasdasd</p>\r\n', 'Moises Flores Estay', '', '', '', 'asdasdsamoises.intech@gmail.com2018-06-15_07_58_29.docx', '<p>se le agrego lo solicitado.</p>\r\n', '2018-06-15 13:11:56', '2017-12-10 12:50:34', 25, 0, 0, '<p>este articulo fue revisado.</p>\r\n', NULL, NULL, '', '2018-07-07 00:00:00', '2018-04-19 00:00:00', '', '', '', '', '', '', '', 'uploads/asdasdsamoises.intech@gmail.com2018-06-15_07_58_29.docx', '', '', 0, 0, '0000-00-00 00:00:00', 1, 1, 3, 3, '2018-06-15 08:05:05', 0, '2018-06-15 08:06:31', '0000-00-00 00:00:00'),
(15, 'Practica Docente en la asignatura Algoritmos y Estructuras de Datos', 2, 'marcotoranzo@hotmail.com', 3, 8, 'competencia', '											La formación basada en competencias corresponde a una modelo de formación profesional de alta relevancia en la actualidad. El objetivo de este trabajo es presentar la evolución que ha tenido un programa de formación de competencias genéricas en la Universidad de Talca a partir de la experiencia de los autores como docentes de una carrera de ingeniería. Esta evolución, luego de más de 10 años de su inicio, se expresa en tres versiones. Se concluye que no obstante la existencia de un proceso de maduración y mejoramiento continuo, siguen abiertos espacios para mejoras significativas con miras a su consolidación.										', 'Rodolfo Schmal', 'Sabino Rivero', 'Cristian Vidal-Silva', '', 'Practica_Docente_en_la_asignatura_Algoritmos_y_Estructuras_de_Datosmarcotoranzo@hotmail.com2018-06-10_03_49_03.docx', 'se le agrego lo solicitado.																				', '2018-06-11 10:08:32', '2017-12-12 09:26:59', 25, 0, 0, '<p>tiene algunas recomemdaciones&nbsp;</p>\r\n', NULL, NULL, '', '2018-07-03 00:00:00', '2018-05-15 15:34:26', '', '', '', '', '', '', '', 'uploads/Practica_Docente_en_la_asignatura_Algoritmos_y_Estructuras_de_Datosmarcotoranzo@hotmail.com2', '', '', 23, 0, '0000-00-00 00:00:00', 1, 1, 3, 3, '2018-06-11 04:26:08', 0, '2018-06-11 04:28:08', NULL),
(16, 'asdasd', 1, 'asda@hotmail.com', 10, 9, 'sadasd', 'sadasd', 'sdfsdf sdfsd sdfsdf', 'asdas', 'sadas', 'asdasd', 'asdasdasda@hotmail.com2018-01-28_05_36_46.docx', 'asdasdaf', '2018-03-04 17:13:51', '2018-01-28 05:36:46', 0, 0, 0, NULL, NULL, NULL, 'fjhhj', '2018-02-23 00:00:00', NULL, '', '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'asdasd', 1, 'pablo.acm.ti@gmail.com', 3, 4, 'asd', '<p>asdfasfasd</p>\r\n', 'asdasd', NULL, NULL, NULL, 'asdasdpablo.acm.ti@gmail.com2018-03-18_06_45_47.docx', 'asdasfas', '2018-04-06 08:51:54', '2018-03-18 06:45:47', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '81', 'asdasfasd', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'asdfasfas', 1, 'pablo.acm.ti@gmail.com', 3, 4, 'asfasd', '<p>asdasfasd</p>\r\n', 'asfasdasf', NULL, NULL, NULL, 'asdfasfaspablo.acm.ti@gmail.com2018-03-18_07_04_58.docx', 'asfasdasf', '2018-05-16 09:27:47', '2018-03-18 07:04:58', 0, 0, 0, NULL, NULL, NULL, NULL, '2018-06-07 00:00:00', NULL, '81', 'dasfasdaf', NULL, NULL, NULL, NULL, NULL, 'uploads/asdfasfaspablo.acm.ti@gmail.com2018-03-18_07_04_58.docx', NULL, NULL, 22, 0, '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'dasdasd', 1, 'asdasd@asdas.cl', 3, 4, 'asdasd', '<p>asdasdasd</p>\r\n', 'asdad123', NULL, NULL, NULL, 'dasdasdasdasd@asdas.cl2018-04-06_05_57_32.docx', 'sdfsdf', '2018-04-06 08:58:22', '2018-04-06 05:57:32', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '144', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, 'uploads/dasdasdasdasd@asdas.cl2018-04-06_05_57_32.docx', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, 3, 3, 3, NULL, 3, NULL, NULL),
(21, 'titulo', 1, 'sdfsdgsdf', 3, 4, 'sdfsdg', '<p>dsfsdf</p>\r\n', 'sdfsdgsd', NULL, NULL, NULL, 'titulosdfsdgsdf2018-04-06_06_02_27.docx', 'sdfsdgdsf', '2018-04-06 09:02:53', '2018-04-06 06:02:27', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '144', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, 'uploads/titulosdfsdgsdf2018-04-06_06_02_27.docx', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, 3, 3, 3, NULL, 3, NULL, NULL),
(22, 'sdafsdf', 1, 'sdfsdf', 3, 4, 'sdfsdf', '<p>sdfsdf</p>\r\n', 'dsfsdf', NULL, NULL, NULL, 'sdafsdfsdfsdf2018-04-06_06_04_18.docx', 'sdfsdf', '2018-04-06 09:04:39', '2018-04-06 06:04:18', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '18', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, 'uploads/sdafsdfsdfsdf2018-04-06_06_04_18.docx', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, 3, 3, 3, NULL, 3, NULL, NULL),
(23, 'sdasdas', 1, 'asdasd', 3, 4, 'asdasd', '<p>asdasd</p>\r\n', 'asdasd', NULL, NULL, NULL, 'sdasdasasdasd2018-04-06_06_05_56.docx', 'asdasd', '2018-04-06 09:06:14', '2018-04-06 06:05:56', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '144', 'asdas', NULL, NULL, NULL, NULL, NULL, 'uploads/sdasdasasdasd2018-04-06_06_05_56.docx', NULL, NULL, NULL, 0, '0000-00-00 00:00:00', 0, 3, 3, 3, NULL, 3, NULL, NULL),
(24, 'sgsdf', 1, 'sdfsd', 3, 4, 'dsfsdf', '<p>sdfsdf</p>\r\n', 'sdfsdf', NULL, NULL, NULL, 'sgsdfsdfsd2018-04-06_06_11_18.docx', 'sdfsdfsdf', '2018-04-06 09:12:02', '2018-04-06 06:11:18', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '242', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, 'uploads/sgsdfsdfsd2018-04-06_06_11_18.docx', NULL, NULL, NULL, 0, '2018-04-06 06:12:02', 0, 3, 3, 3, NULL, 3, NULL, NULL),
(25, 'dfsdf', 2, 'sdfsdgsdf', 3, 13, 'dsfsdf', '<p>dsfsdf</p>\r\n', 'sdfsdf', NULL, NULL, NULL, 'dfsdfsdfsdgsdf2018-06-15_08_02_24.docx', '<p>agregado correccion</p>\r\n', '2018-06-15 13:12:14', '2018-04-06 06:11:45', 25, 0, 0, '', NULL, NULL, '', '2018-07-07 00:00:00', '2018-06-08 02:17:35', '113', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, 'uploads/dfsdfsdfsdgsdf2018-06-15_08_02_24.docx', NULL, NULL, NULL, 0, '2018-04-06 06:22:39', 1, 1, 3, 3, '2018-06-15 08:05:17', 3, '2018-06-15 08:06:53', NULL),
(26, 'articulo nuevo', 1, 'pablo.acm.ti@gmail.com', 3, 3, 'asda , asda', '<p>este es un resumen del articulo</p>\r\n', 'pablo campos', NULL, NULL, NULL, 'articulo_nuevopablo.acm.ti@gmail.com2018-04-09_10_26_24.doc', 'articulo subido ahora', '2018-05-08 07:58:00', '2018-04-09 10:26:24', 27, 0, 0, NULL, NULL, NULL, NULL, NULL, '2018-05-08 04:58:00', '123', 'ucm', 'marco@hotmail.com', 'asdas@ldal.cl', NULL, NULL, NULL, 'uploads/articulo_nuevopablo.acm.ti@gmail.com2018-04-09_10_26_24.doc', NULL, NULL, NULL, 0, '2018-04-09 10:29:07', 1, 3, 7, 3, NULL, 3, NULL, NULL),
(27, 'dsfdsfsdf', 1, '1', 3, 4, 'asfas', '<p>sdfsdfsdasd</p>\r\n', '1', NULL, NULL, NULL, 'dsfdsfsdf12018-04-09_12_03_11.docx', 'asdasd', '2018-04-11 07:56:45', '2018-04-09 12:03:11', 0, 0, 0, NULL, NULL, NULL, '<p>asdasd</p>\r\n', NULL, NULL, '2', 'asdasd', '2', '3', '4', NULL, NULL, 'uploads/dsfdsfsdf12018-04-09_12_03_11.docx', NULL, NULL, NULL, 0, '2018-04-11 04:56:45', 0, 3, 3, 3, NULL, 3, NULL, NULL),
(28, 'asdasd', 2, '123456', 3, 13, 'asdasdf', '<p>asdasfasd</p>\r\n', '123456', NULL, NULL, NULL, 'asdasd1234562018-06-15_08_04_28.docx', '<p>agregada correcciones</p>\r\n', '2018-06-15 13:12:28', '2018-04-09 12:08:56', 25, 0, 0, '', NULL, NULL, '', '2018-07-07 00:00:00', '2018-06-14 08:53:34', '114', 'ucm', '2', '3', '4', '5', '6', 'uploads/asdasd1234562018-06-15_08_04_28.docx', NULL, NULL, NULL, 0, '2018-04-11 05:05:41', 1, 1, 3, 3, '2018-06-15 08:05:27', 3, '2018-06-15 08:07:05', NULL),
(29, 'dsaasd', 3, '1@c', 3, 9, 'ucm,articulo,ingresado', '<p>Este articulo se mofico</p>\r\n', '1', NULL, NULL, NULL, 'dsaasd1@c2018-05-11_06_37_08.docx', 'se le hicieron las correcciones solicitadas', '2018-06-06 18:08:48', '2018-04-09 12:19:48', 0, 0, 25, NULL, NULL, '<p><strong>Observaciones:&nbsp;</strong></p>\r\n\r\n<ol>\r\n	<li>Este articulo presenta errores no se refiere bien al tema&nbsp;</li>\r\n	<li>debe tener una mejor expresi&oacute;n del tema desarrollado</li>\r\n	<li>datos err&oacute;neos</li>\r\n	<li>fecha no valida&nbsp;</li>\r\n</ol>\r\n', '<p>zxczxc</p>\r\n', '2018-06-06 00:00:00', '2018-05-15 19:08:56', '144', 'ucm', '2@c', '3@c', '4@c', '5@c', '6@c', 'uploads/dsaasd1@c2018-05-11_06_37_08.docx', NULL, NULL, NULL, 0, '2018-04-11 05:09:35', 1, 3, 3, 2, NULL, 3, '2018-05-15 20:00:53', NULL),
(30, 'hjskhdjkahjdk', 1, 'asdasd@asdas.cl', 3, 4, 'asdasdf', '<p>asfasdasf</p>\r\n', 'asasd', NULL, NULL, NULL, 'hjskhdjkahjdkasdasd@asdas.cl2018-04-09_12_37_29.doc', 'asdasdf', '2018-05-11 00:54:40', '2018-04-09 12:37:29', 25, 0, 0, '<p>asdasd</p>\r\n', NULL, NULL, 'rechazo por que esta muy malo', NULL, '2018-05-08 05:01:50', '6', 'asdasd', '2@c', NULL, NULL, NULL, NULL, 'uploads/hjskhdjkahjdkasdasd@asdas.cl2018-04-09_12_37_29.doc', NULL, NULL, NULL, 0, '2018-04-11 05:24:46', 1, 2, 3, 3, NULL, 3, '2018-05-10 21:54:40', '2018-05-11 11:50:50'),
(31, 'asdasd', 1, 'asdasd@asdas.cl', 3, 8, 'asdasd', '<p>asdasdfasd</p>\r\n', 'asdasd', NULL, NULL, NULL, 'asdasdasdasd@asdas.cl2018-04-09_12_41_51.docx', 'asdasd', '2018-06-12 14:33:43', '2018-04-09 12:41:51', 25, 0, 0, '<p>aceptado</p>\r\n', NULL, NULL, '', '2018-07-04 00:00:00', '2018-06-12 10:26:19', '144', 'asdasd', '2@c', NULL, NULL, NULL, NULL, 'uploads/asdasdasdasd@asdas.cl2018-04-09_12_41_51.docx', NULL, NULL, NULL, 0, '2018-04-11 05:32:37', 1, 1, 3, 3, '2018-06-12 10:27:40', 3, '2018-06-12 10:28:53', NULL),
(32, 'asdasd', 1, 'asdasd@asdas.cl', 3, 4, 'asdasd', '<p>asdasd</p>\r\n', 'asd', NULL, NULL, NULL, 'asdasdasdasd@asdas.cl2018-04-09_12_48_14.docx', 'asdasd', '2018-04-11 08:55:46', '2018-04-09 12:48:14', 0, 0, 0, NULL, NULL, NULL, '<p>adasd</p>\r\n', NULL, NULL, '3', 'asdasd', '2@c', '3@c', '4@c', '5@c', NULL, 'uploads/asdasdasdasd@asdas.cl2018-04-09_12_48_14.docx', NULL, NULL, NULL, 0, '2018-04-11 05:39:17', 3, 3, 3, 3, NULL, 3, NULL, NULL),
(33, 'asdasfas', 1, '1@c', 3, 4, 'asdas', '<p>asdasdfsad</p>\r\n', '1', '2', '3', NULL, 'asdasfas1@c2018-04-09_13_05_39.docx', 'asdasd', '2018-04-11 08:53:58', '2018-04-09 13:05:39', 0, 0, 0, NULL, NULL, NULL, '<p>asdasda</p>\r\n', NULL, NULL, '80', 'qweasd', '2@c', '3@c', NULL, NULL, NULL, 'uploads/asdasfas1@c2018-04-09_13_05_39.docx', NULL, NULL, NULL, 0, '2018-04-11 05:41:04', 3, 3, 3, 3, NULL, 3, NULL, NULL),
(34, 'asadasd', 1, 'x_pablo_acm@hotmail.com', 3, 4, 'asdasd', '<p>asdasd</p>\r\n', 'pablo campos', NULL, NULL, NULL, 'asadasdx_pablo_acm@hotmail.com2018-04-11_05_59_24.docx', 'asdasd', '2018-04-11 09:00:15', '2018-04-11 05:59:24', 0, 0, 0, NULL, NULL, NULL, '<p>zxczxc</p>\r\n', NULL, NULL, '2', 'asdasd', NULL, NULL, NULL, NULL, NULL, 'uploads/asadasdx_pablo_acm@hotmail.com2018-04-11_05_59_24.docx', NULL, NULL, NULL, 0, '2018-04-11 06:00:15', 0, 3, 3, 3, NULL, 3, NULL, NULL),
(35, 'zxczxc', 1, 'pablo.acm.ti@gmail.com', 3, 4, 'zxczxc', '<p>zxczxczxc</p>\r\n', 'zxzczxc', NULL, NULL, NULL, 'zxczxcpablo.acm.ti@gmail.com2018-04-11_06_01_06.doc', '<zx<zx', '2018-04-11 09:01:32', '2018-04-11 06:01:06', 0, 0, 0, NULL, NULL, NULL, '<p>zxczxvzxc</p>\r\n', NULL, NULL, '80', '<zx<zx', NULL, NULL, NULL, NULL, NULL, 'uploads/zxczxcpablo.acm.ti@gmail.com2018-04-11_06_01_06.doc', NULL, NULL, NULL, 0, '2018-04-11 06:01:32', 0, 3, 3, 3, NULL, 3, NULL, NULL),
(36, 'Articulo nuevo', 1, 'mtoranzo@ucm.cl', 3, 8, 'tema1', '<p>descripcion resumen</p>\r\n', 'Marco Toranzo', 'Pablo Campos', NULL, NULL, 'Articulo_nuevomtoranzo@ucm.cl2018-04-13_11_15_40.docx', 'comentario adicional ', '2018-05-16 09:13:20', '2018-04-13 11:15:40', 25, 0, 0, '<p>bla bla bla</p>\r\n', NULL, NULL, 'asdasdfa', NULL, '2018-05-08 05:03:33', '81', 'UCM', 'pablo.acm.ti@gmail.com', NULL, NULL, NULL, NULL, 'uploads/Articulo_nuevomtoranzo@ucm.cl2018-04-13_11_15_40.docx', NULL, NULL, NULL, 0, '2018-04-13 11:22:46', 1, 2, 3, 3, NULL, 3, '2018-05-10 21:55:14', '2018-05-10 10:50:54'),
(37, 'asdfasfas', 1, 'asdasd@asdas.cl', 3, 4, 'asdasd', 'asdasd', 'pablo campos', NULL, NULL, NULL, 'asdfasfasasdasd@asdas.cl2018-06-02_22_27_01.docx', 'asdasd', '2018-06-08 08:57:13', '2018-06-02 22:27:01', 0, 0, 0, NULL, NULL, NULL, '', NULL, NULL, '91', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, 'uploads/asdfasfasasdasd@asdas.cl2018-06-02_22_27_01.docx', NULL, NULL, 0, 0, '2018-06-08 04:57:13', 0, 3, 3, 3, NULL, 3, NULL, NULL),
(38, 'articulo nuevo 3', 1, 'pablo.acm.ti@gmail.com', 3, 8, 'palabras clave asd', 'este articulo contiene información importante', 'Pablo Campos M.', NULL, NULL, NULL, 'articulo_nuevo_3pablo.acm.ti@gmail.com2018-06-06_17_45_45.docx', 'este articulo ha sido trabajado durante 2 años', '2018-06-12 14:33:43', '2018-06-06 17:45:45', 25, 0, 0, '<p>aceptado</p>\r\n', NULL, NULL, '', '2018-07-04 00:00:00', '2018-06-12 10:26:46', '81', 'ucm', NULL, NULL, NULL, NULL, NULL, 'uploads/articulo_nuevo_3pablo.acm.ti@gmail.com2018-06-06_17_45_45.docx', NULL, NULL, 0, 0, '2018-06-06 17:46:54', 1, 1, 3, 3, '2018-06-12 10:27:20', 3, '2018-06-12 10:29:25', NULL),
(39, 'articulo nuevo 3', 2, 'pablo.acm.ti@gmail.com', 7, 8, 'palabra 1 palabra 2 palabra 3', '<p>articulo junio</p>\r\n', 'pablo campos', NULL, NULL, NULL, 'articulo_nuevo_3pablo.acm.ti@gmail.com2018-06-11_10_46_37.docx', 'pagina uno cambio de palabra																				', '2018-06-12 14:33:43', '2018-06-11 10:00:38', 36, 0, 0, '<ol>\r\n	<li>revision</li>\r\n	<li>revision conclusion&nbsp;</li>\r\n</ol>\r\n', NULL, NULL, '', '2018-07-03 00:00:00', '2018-06-11 10:11:37', '81', 'ucm', NULL, NULL, NULL, NULL, NULL, 'uploads/articulo_nuevo_3pablo.acm.ti@gmail.com2018-06-11_10_46_37.docx', NULL, NULL, 0, 0, '2018-06-11 10:01:23', 1, 1, 3, 3, '2018-06-11 10:50:30', 3, '2018-06-11 10:51:15', NULL),
(40, 'articulo pc', 1, 'p@c.cl', 3, 13, 'pc articulo ', '<p>este articulo contiene cosas relacionadas con ...</p>\r\n', 'pablo campos', NULL, NULL, NULL, 'articulo_pcp@c.cl2018-06-14_08_06_46.docx', '<p>este articulo contiene muchos temas</p>\r\n', '2018-06-15 11:43:58', '2018-06-14 08:06:46', 25, 0, 0, '<p>este articulo se encuentra en perfectas condiciones.</p>\r\n', NULL, NULL, '', '2018-07-07 00:00:00', '2018-06-14 08:50:25', '144', 'ucm', NULL, NULL, NULL, NULL, NULL, 'uploads/articulo_pcp@c.cl2018-06-14_08_06_46.docx', NULL, NULL, 0, 0, '2018-06-14 08:14:13', 1, 1, 3, 3, '2018-06-15 01:40:34', 3, '2018-06-15 01:41:03', NULL),
(41, 'articulo nuevo pc 2', 1, 'p@c.cl', 7, 2, 'pc articulo nuevo', '<p>articulo pc</p>\r\n', 'pablo campos', NULL, NULL, NULL, 'articulo_nuevo_pc_2p@c.cl2018-06-14_08_08_07.docx', '<p>nuevo articulo</p>\r\n', '2018-06-14 12:14:31', '2018-06-14 08:08:07', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '144', 'ucm', NULL, NULL, NULL, NULL, NULL, 'uploads/articulo_nuevo_pc_2p@c.cl2018-06-14_08_08_07.docx', NULL, NULL, 0, 0, '2018-06-14 08:14:31', 1, 3, 3, 3, NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Editor'),
(2, 'Revisor'),
(3, 'Autor'),
(4, 'Lector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id_tema` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_campo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id_tema`, `nombre`, `nombre_campo`) VALUES
(3, 'tema 1', 10),
(4, 'tema de vinculacion', 23),
(6, 'la vida de la U ', 31),
(7, 'tema 2', 12),
(8, 'Cine', 19),
(11, 'Ingeniería de Software', 15),
(12, 'Ideología de aprendizaje', 27),
(13, 'aplicación de profesional', 31),
(14, 'ingenieria de software', 32),
(15, 'seguridad de redes', 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas_usuario`
--

CREATE TABLE `temas_usuario` (
  `id_tema_usuario` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `temas_usuario`
--

INSERT INTO `temas_usuario` (`id_tema_usuario`, `id_tema`, `id_usuario`) VALUES
(1, 3, 2),
(2, 4, 2),
(3, 6, 2),
(4, 3, 5),
(5, 4, 5),
(6, 6, 5),
(7, 3, 6),
(8, 4, 6),
(9, 6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido_1` varchar(250) NOT NULL,
  `apellido_2` varchar(250) NOT NULL,
  `titulo_academico` varchar(250) NOT NULL,
  `organizacion` varchar(250) NOT NULL,
  `departamento` varchar(250) NOT NULL,
  `pais` int(11) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `biografia` varchar(1000) NOT NULL,
  `comentario` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `email`, `nombre`, `apellido_1`, `apellido_2`, `titulo_academico`, `organizacion`, `departamento`, `pais`, `telefono`, `biografia`, `comentario`) VALUES
(7, 'moises.intech@gmail.com', 'Moises', 'Flores', 'Estay', 'ASDasdas', 'asdasd', 'dasd', 81, '973950383', 'asdasd', 'asdasd'),
(8, 'pmgarrido@outlook.com', 'Soy', 'Autor', 'Pro', 'ICI', 'UCM', 'DEPA', 81, '123456789', 'MMMMasdfasdf', ''),
(9, 'a@a.com', 'hola', 'mundo', 'pro', 'ici', 'ucm', 'depa', 144, '123456789', 'asdfasdf', ''),
(10, 'a@b.com', 'Revisando', 'Paper', 'Pro', 'ICI', 'UCM', 'asdsadf', 6, '123456789', 'asdasd', 'aseo'),
(11, 'marcotoranzo@hotmail.com', 'Marco', 'Hotmail', 'Hotmail', 'Dr.', 'Hotmail', 'Computacion e informática de hotmail', 81, '9768987654', 'El Dr. Marco Hotmail es ....', 'Un comentario acerca del  Dr. Marco Hotmail es ....'),
(12, 'asda@hotmail.com', 'sdfsdf', 'sdfsd', 'sdfsdf', 'sdfsdf', 'sdfsdf', 'sdfsdf', 144, '123456789', 'dsfasdas', 'asdasdas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campo_investigacion`
--
ALTER TABLE `campo_investigacion`
  ADD PRIMARY KEY (`id_campo`);

--
-- Indices de la tabla `campo_revisor`
--
ALTER TABLE `campo_revisor`
  ADD PRIMARY KEY (`id_campo_usuario`),
  ADD KEY `fk_campo_revisor_campo` (`id_campo`);

--
-- Indices de la tabla `campo_usuario`
--
ALTER TABLE `campo_usuario`
  ADD PRIMARY KEY (`id_campo_usuario`),
  ADD KEY `fk_campo_usuario_campo` (`id_campo`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id_configuracion`);

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`contenido`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `final_magazine`
--
ALTER TABLE `final_magazine`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `lector`
--
ALTER TABLE `lector`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `magazines`
--
ALTER TABLE `magazines`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `revisor`
--
ALTER TABLE `revisor`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `revisor_tema`
--
ALTER TABLE `revisor_tema`
  ADD PRIMARY KEY (`id_revisor_tema`);

--
-- Indices de la tabla `revista`
--
ALTER TABLE `revista`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id_tema`),
  ADD KEY `id_campo` (`nombre_campo`) USING BTREE;

--
-- Indices de la tabla `temas_usuario`
--
ALTER TABLE `temas_usuario`
  ADD PRIMARY KEY (`id_tema_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campo_investigacion`
--
ALTER TABLE `campo_investigacion`
  MODIFY `id_campo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `campo_revisor`
--
ALTER TABLE `campo_revisor`
  MODIFY `id_campo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `campo_usuario`
--
ALTER TABLE `campo_usuario`
  MODIFY `id_campo_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id_configuracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `final_magazine`
--
ALTER TABLE `final_magazine`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `lector`
--
ALTER TABLE `lector`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `magazines`
--
ALTER TABLE `magazines`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `revisor`
--
ALTER TABLE `revisor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `revisor_tema`
--
ALTER TABLE `revisor_tema`
  MODIFY `id_revisor_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `revista`
--
ALTER TABLE `revista`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `temas_usuario`
--
ALTER TABLE `temas_usuario`
  MODIFY `id_tema_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `campo_revisor`
--
ALTER TABLE `campo_revisor`
  ADD CONSTRAINT `fk_campo_revisor_campo` FOREIGN KEY (`id_campo`) REFERENCES `campo_investigacion` (`id_campo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `campo_usuario`
--
ALTER TABLE `campo_usuario`
  ADD CONSTRAINT `fk_campo_usuario_campo` FOREIGN KEY (`id_campo`) REFERENCES `campo_investigacion` (`id_campo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `temas`
--
ALTER TABLE `temas`
  ADD CONSTRAINT `temas_ibfk_1` FOREIGN KEY (`nombre_campo`) REFERENCES `campo_investigacion` (`id_campo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
