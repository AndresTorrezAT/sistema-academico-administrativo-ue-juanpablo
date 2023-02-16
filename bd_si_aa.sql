-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2022 a las 20:49:58
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_si_aa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativo`
--

CREATE TABLE `administrativo` (
  `cod_adm` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cargo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrativo`
--

INSERT INTO `administrativo` (`cod_adm`, `cod_usu`, `cargo`, `estado`) VALUES
(3, 14, 'Direccion', 1),
(4, 15, 'Secretaria', 1),
(5, 16, 'Regente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `cod_asig` int(11) NOT NULL,
  `cod_cur` int(11) NOT NULL,
  `cod_doc` int(11) DEFAULT NULL,
  `cod_mat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`cod_asig`, `cod_cur`, `cod_doc`, `cod_mat`) VALUES
(464, 28, 6, 26),
(465, 30, NULL, 26),
(466, 43, NULL, 26),
(467, 45, NULL, 26),
(468, 47, NULL, 26),
(469, 48, NULL, 26),
(470, 28, 10, 27),
(471, 30, NULL, 27),
(472, 43, NULL, 27),
(473, 45, NULL, 27),
(474, 47, NULL, 27),
(475, 48, NULL, 27),
(476, 28, 12, 28),
(477, 30, NULL, 28),
(478, 43, NULL, 28),
(479, 45, NULL, 28),
(480, 47, NULL, 28),
(481, 48, NULL, 28),
(482, 28, 13, 29),
(483, 30, NULL, 29),
(484, 43, NULL, 29),
(485, 45, NULL, 29),
(486, 47, NULL, 29),
(487, 48, NULL, 29),
(488, 28, 14, 30),
(489, 30, NULL, 30),
(490, 43, NULL, 30),
(491, 45, NULL, 30),
(492, 47, NULL, 30),
(493, 48, NULL, 30),
(494, 28, 7, 31),
(495, 30, NULL, 31),
(496, 43, NULL, 31),
(497, 45, NULL, 31),
(498, 47, NULL, 31),
(499, 48, NULL, 31),
(500, 28, 15, 32),
(501, 30, NULL, 32),
(502, 43, NULL, 32),
(503, 45, NULL, 32),
(504, 47, NULL, 32),
(505, 48, NULL, 32),
(506, 28, 16, 33),
(507, 30, NULL, 33),
(508, 43, NULL, 33),
(509, 45, NULL, 33),
(510, 47, NULL, 33),
(511, 48, NULL, 33),
(512, 28, 17, 34),
(513, 30, NULL, 34),
(514, 43, NULL, 34),
(515, 45, NULL, 34),
(516, 47, NULL, 34),
(517, 48, NULL, 34),
(518, 28, 19, 35),
(519, 30, NULL, 35),
(520, 43, NULL, 35),
(521, 45, NULL, 35),
(522, 47, NULL, 35),
(523, 48, NULL, 35),
(524, 49, NULL, 36),
(525, 50, NULL, 36),
(526, 51, NULL, 36),
(527, 54, NULL, 36),
(528, 55, NULL, 36),
(529, 56, NULL, 36),
(530, 49, NULL, 37),
(531, 50, NULL, 37),
(532, 51, NULL, 37),
(533, 54, NULL, 37),
(534, 55, NULL, 37),
(535, 56, NULL, 37),
(536, 49, NULL, 38),
(537, 50, NULL, 38),
(538, 51, NULL, 38),
(539, 54, NULL, 38),
(540, 55, NULL, 38),
(541, 56, NULL, 38),
(542, 49, NULL, 39),
(543, 50, NULL, 39),
(544, 51, NULL, 39),
(545, 54, NULL, 39),
(546, 55, NULL, 39),
(547, 56, NULL, 39),
(548, 49, NULL, 40),
(549, 50, NULL, 40),
(550, 51, NULL, 40),
(551, 54, NULL, 40),
(552, 55, NULL, 40),
(553, 56, NULL, 40),
(554, 49, NULL, 41),
(555, 50, NULL, 41),
(556, 51, NULL, 41),
(557, 54, NULL, 41),
(558, 55, NULL, 41),
(559, 56, NULL, 41),
(560, 49, NULL, 42),
(561, 50, NULL, 42),
(562, 51, NULL, 42),
(563, 54, NULL, 42),
(564, 55, NULL, 42),
(565, 56, NULL, 42),
(566, 49, NULL, 43),
(567, 50, NULL, 43),
(568, 51, NULL, 43),
(569, 54, NULL, 43),
(570, 55, NULL, 43),
(571, 56, NULL, 43),
(572, 49, NULL, 44),
(573, 50, NULL, 44),
(574, 51, NULL, 44),
(575, 54, NULL, 44),
(576, 55, NULL, 44),
(577, 56, NULL, 44),
(578, 49, NULL, 45),
(579, 50, NULL, 45),
(580, 51, NULL, 45),
(581, 54, NULL, 45),
(582, 55, NULL, 45),
(583, 56, NULL, 45),
(584, 57, 6, 26),
(585, 57, 10, 27),
(586, 57, 12, 28),
(587, 57, 13, 29),
(588, 57, 14, 30),
(589, 57, 7, 31),
(590, 57, 15, 32),
(591, 57, 16, 33),
(592, 57, 17, 34),
(593, 57, 19, 35),
(594, 58, NULL, 36),
(595, 58, NULL, 37),
(596, 58, NULL, 38),
(597, 58, NULL, 39),
(598, 58, NULL, 40),
(599, 58, NULL, 41),
(600, 58, NULL, 42),
(601, 58, NULL, 43),
(602, 58, NULL, 44),
(603, 58, NULL, 45),
(604, 49, NULL, 46),
(605, 50, NULL, 46),
(606, 51, NULL, 46),
(607, 54, NULL, 46),
(608, 55, NULL, 46),
(609, 56, NULL, 46),
(610, 58, NULL, 46),
(611, 59, NULL, 26),
(612, 59, NULL, 27),
(613, 59, NULL, 28),
(614, 59, NULL, 29),
(615, 59, NULL, 30),
(616, 59, NULL, 31),
(617, 59, NULL, 32),
(618, 59, NULL, 33),
(619, 59, NULL, 34),
(620, 59, NULL, 35),
(621, 60, 6, 26),
(622, 60, 10, 27),
(623, 60, 12, 28),
(624, 60, NULL, 29),
(625, 60, NULL, 30),
(626, 60, NULL, 31),
(627, 60, NULL, 32),
(628, 60, NULL, 33),
(629, 60, NULL, 34),
(630, 60, NULL, 35),
(631, 49, NULL, 47),
(632, 50, NULL, 47),
(633, 51, NULL, 47),
(634, 54, NULL, 47),
(635, 55, NULL, 47),
(636, 56, NULL, 47),
(637, 58, NULL, 47);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `cod_asis` int(11) NOT NULL,
  `cod_bi` int(11) NOT NULL,
  `fecha_asis` date NOT NULL,
  `estado_asis` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `cod_ins` int(11) NOT NULL,
  `cod_asig` int(11) DEFAULT NULL,
  `cod_cur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`cod_asis`, `cod_bi`, `fecha_asis`, `estado_asis`, `cod_ins`, `cod_asig`, `cod_cur`) VALUES
(6, 1, '2021-07-23', 'P', 5, 464, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bimestre`
--

CREATE TABLE `bimestre` (
  `cod_bimestre` int(11) NOT NULL,
  `numeroBi` tinyint(4) NOT NULL,
  `inicio` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `cod_gestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bimestre`
--

INSERT INTO `bimestre` (`cod_bimestre`, `numeroBi`, `inicio`, `fin`, `cod_gestion`) VALUES
(1, 1, '2021-02-03', '2021-04-15', 1),
(2, 2, '2021-05-01', '2021-08-30', 1),
(3, 3, '2021-09-10', '2021-11-30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buzon`
--

CREATE TABLE `buzon` (
  `cod_buz` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `cod_men` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `buzon`
--

INSERT INTO `buzon` (`cod_buz`, `cod_usu`, `cod_men`) VALUES
(76, 15, 96),
(77, 15, 97),
(78, 23, 98),
(79, 23, 99),
(80, 15, 100),
(81, 14, 101),
(82, 14, 102),
(83, 15, 103),
(84, 23, 104);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `cod_cal` int(11) NOT NULL,
  `cod_bi` int(11) NOT NULL,
  `ser` tinyint(4) DEFAULT NULL,
  `saber` tinyint(4) DEFAULT NULL,
  `hacer` tinyint(4) DEFAULT NULL,
  `decidir` tinyint(4) DEFAULT NULL,
  `auto_ser` int(11) NOT NULL DEFAULT 0,
  `auto_decidir` int(11) NOT NULL DEFAULT 0,
  `nota_bi` tinyint(4) DEFAULT NULL,
  `cod_ins` int(11) NOT NULL,
  `cod_asig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`cod_cal`, `cod_bi`, `ser`, `saber`, `hacer`, `decidir`, `auto_ser`, `auto_decidir`, `nota_bi`, `cod_ins`, `cod_asig`) VALUES
(9, 1, 10, 35, 26, 10, 0, 0, 81, 5, 464),
(10, 1, 7, 26, 0, 0, 0, 0, 33, 5, 494),
(11, 1, 0, 0, 0, 0, 0, 0, 0, 6, 589),
(12, 1, 0, 35, 0, 0, 0, 0, 35, 5, 470),
(13, 1, 0, 0, 35, 0, 0, 0, 35, 5, 476),
(14, 1, 0, 0, 0, 0, 0, 0, 0, 5, 482),
(15, 2, 0, 0, 0, 0, 0, 0, 0, 5, 482),
(16, 1, 0, 0, 0, 0, 0, 0, 0, 5, 488),
(17, 1, 0, 0, 0, 0, 0, 0, 0, 5, 500),
(18, 1, 0, 0, 0, 0, 0, 0, 0, 5, 506),
(19, 1, 0, 0, 0, 0, 0, 0, 0, 5, 512),
(20, 1, 0, 0, 0, 0, 0, 0, 0, 5, 518);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comportamiento`
--

CREATE TABLE `comportamiento` (
  `cod_com` int(11) NOT NULL,
  `cod_bi` int(11) NOT NULL,
  `fecha_reg` date NOT NULL,
  `observacion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_ins` int(11) NOT NULL,
  `cod_asig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comportamiento`
--

INSERT INTO `comportamiento` (`cod_com`, `cod_bi`, `fecha_reg`, `observacion`, `detalle`, `cod_ins`, `cod_asig`) VALUES
(32, 1, '2021-07-23', 'Abandono en el aula', 'Abandono la aula despues de recibir sus ', 5, 464);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `cod_cur` int(11) NOT NULL,
  `grado` tinyint(4) NOT NULL,
  `paralelo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  `cupos` tinyint(4) NOT NULL,
  `horario` tinyint(4) NOT NULL DEFAULT 0,
  `cod_gestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`cod_cur`, `grado`, `paralelo`, `nivel`, `cupos`, `horario`, `cod_gestion`) VALUES
(28, 1, 'A', 1, 20, 1, 1),
(30, 2, 'A', 1, 14, 1, 1),
(43, 3, 'A', 1, 14, 0, 1),
(45, 4, 'A', 1, 21, 0, 1),
(47, 5, 'A', 1, 30, 0, 1),
(48, 6, 'A', 1, 26, 0, 1),
(49, 1, 'A', 2, 14, 1, 1),
(50, 2, 'A', 2, 17, 0, 1),
(51, 3, 'A', 2, 26, 0, 1),
(54, 5, 'A', 2, 10, 0, 1),
(55, 4, 'A', 2, 26, 0, 1),
(56, 6, 'A', 2, 10, 0, 1),
(57, 1, 'B', 1, 14, 1, 1),
(58, 1, 'B', 2, 14, 1, 1),
(59, 6, 'B', 1, 26, 0, 1),
(60, 1, 'C', 1, 14, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cal`
--

CREATE TABLE `detalle_cal` (
  `cod_dim` int(11) NOT NULL,
  `cod_cal` int(11) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `ponderacion` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_cal`
--

INSERT INTO `detalle_cal` (`cod_dim`, `cod_cal`, `tipo`, `ponderacion`) VALUES
(258, 9, 1, 10),
(259, 9, 1, 10),
(260, 9, 1, 10),
(261, 9, 2, 35),
(262, 9, 2, 35),
(263, 9, 2, 35),
(264, 9, 2, 35),
(265, 9, 3, 35),
(266, 9, 3, 0),
(267, 9, 3, 35),
(268, 9, 3, 35),
(269, 9, 4, 10),
(270, 9, 4, 10),
(271, 9, 4, 10),
(272, 10, 1, 0),
(273, 10, 1, 10),
(274, 10, 1, 10),
(275, 10, 2, 35),
(276, 10, 2, 35),
(277, 10, 2, 35),
(278, 10, 2, 0),
(279, 10, 3, 0),
(280, 10, 3, 0),
(281, 10, 3, 0),
(282, 10, 3, 0),
(283, 10, 4, 0),
(284, 10, 4, 0),
(285, 10, 4, 0),
(286, 11, 1, 0),
(287, 11, 1, 0),
(288, 11, 1, 0),
(289, 11, 2, 0),
(290, 11, 2, 0),
(291, 11, 2, 0),
(292, 11, 2, 0),
(293, 11, 3, 0),
(294, 11, 3, 0),
(295, 11, 3, 0),
(296, 11, 3, 0),
(297, 11, 4, 0),
(298, 11, 4, 0),
(299, 11, 4, 0),
(300, 12, 1, 0),
(301, 12, 1, 0),
(302, 12, 1, 0),
(303, 12, 2, 35),
(304, 12, 2, 35),
(305, 12, 2, 35),
(306, 12, 2, 35),
(307, 12, 3, 0),
(308, 12, 3, 0),
(309, 12, 3, 0),
(310, 12, 3, 0),
(311, 12, 4, 0),
(312, 12, 4, 0),
(313, 12, 4, 0),
(314, 13, 1, 0),
(315, 13, 1, 0),
(316, 13, 1, 0),
(317, 13, 2, 0),
(318, 13, 2, 0),
(319, 13, 2, 0),
(320, 13, 2, 0),
(321, 13, 3, 35),
(322, 13, 3, 35),
(323, 13, 3, 35),
(324, 13, 3, 35),
(325, 13, 4, 0),
(326, 13, 4, 0),
(327, 13, 4, 0),
(328, 14, 1, 0),
(329, 14, 1, 0),
(330, 14, 1, 0),
(331, 14, 2, 0),
(332, 14, 2, 0),
(333, 14, 2, 0),
(334, 14, 2, 0),
(335, 14, 3, 0),
(336, 14, 3, 0),
(337, 14, 3, 0),
(338, 14, 3, 0),
(339, 14, 4, 0),
(340, 14, 4, 0),
(341, 14, 4, 0),
(342, 15, 1, 0),
(343, 15, 1, 0),
(344, 15, 1, 0),
(345, 15, 2, 0),
(346, 15, 2, 0),
(347, 15, 2, 0),
(348, 15, 2, 0),
(349, 15, 3, 0),
(350, 15, 3, 0),
(351, 15, 3, 0),
(352, 15, 3, 0),
(353, 15, 4, 0),
(354, 15, 4, 0),
(355, 15, 4, 0),
(356, 16, 1, 0),
(357, 16, 1, 0),
(358, 16, 1, 0),
(359, 16, 2, 0),
(360, 16, 2, 0),
(361, 16, 2, 0),
(362, 16, 2, 0),
(363, 16, 3, 0),
(364, 16, 3, 0),
(365, 16, 3, 0),
(366, 16, 3, 0),
(367, 16, 4, 0),
(368, 16, 4, 0),
(369, 16, 4, 0),
(370, 17, 1, 0),
(371, 17, 1, 0),
(372, 17, 1, 0),
(373, 17, 2, 0),
(374, 17, 2, 0),
(375, 17, 2, 0),
(376, 17, 2, 0),
(377, 17, 3, 0),
(378, 17, 3, 0),
(379, 17, 3, 0),
(380, 17, 3, 0),
(381, 17, 4, 0),
(382, 17, 4, 0),
(383, 17, 4, 0),
(384, 18, 1, 0),
(385, 18, 1, 0),
(386, 18, 1, 0),
(387, 18, 2, 0),
(388, 18, 2, 0),
(389, 18, 2, 0),
(390, 18, 2, 0),
(391, 18, 3, 0),
(392, 18, 3, 0),
(393, 18, 3, 0),
(394, 18, 3, 0),
(395, 18, 4, 0),
(396, 18, 4, 0),
(397, 18, 4, 0),
(398, 19, 1, 0),
(399, 19, 1, 0),
(400, 19, 1, 0),
(401, 19, 2, 0),
(402, 19, 2, 0),
(403, 19, 2, 0),
(404, 19, 2, 0),
(405, 19, 3, 0),
(406, 19, 3, 0),
(407, 19, 3, 0),
(408, 19, 3, 0),
(409, 19, 4, 0),
(410, 19, 4, 0),
(411, 19, 4, 0),
(412, 20, 1, 0),
(413, 20, 1, 0),
(414, 20, 1, 0),
(415, 20, 2, 0),
(416, 20, 2, 0),
(417, 20, 2, 0),
(418, 20, 2, 0),
(419, 20, 3, 0),
(420, 20, 3, 0),
(421, 20, 3, 0),
(422, 20, 3, 0),
(423, 20, 4, 0),
(424, 20, 4, 0),
(425, 20, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ins`
--

CREATE TABLE `detalle_ins` (
  `cod_deins` int(11) NOT NULL,
  `libreta_ori` bit(1) NOT NULL,
  `cert_vac` bit(1) DEFAULT NULL,
  `cert_nac` bit(1) NOT NULL,
  `factura` bit(1) NOT NULL,
  `rude` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tel_fijo` int(11) DEFAULT NULL,
  `celular_con` int(11) NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `num_puerta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_ins`
--

INSERT INTO `detalle_ins` (`cod_deins`, `libreta_ori`, `cert_vac`, `cert_nac`, `factura`, `rude`, `tel_fijo`, `celular_con`, `direccion`, `num_puerta`) VALUES
(7, b'1', b'1', b'1', b'1', '47512965', 2751426, 69773644, 'Calle 4A', 270),
(8, b'1', b'1', b'1', b'1', '846151741', 69773644, 2751426, 'Calle 4A', 270);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dimenciones`
--

CREATE TABLE `dimenciones` (
  `cod_dim` int(11) NOT NULL,
  `cod_asig` int(11) NOT NULL,
  `tipo_dim` tinyint(4) NOT NULL,
  `num` int(11) NOT NULL,
  `nom_dim` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cod_bimestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dimenciones`
--

INSERT INTO `dimenciones` (`cod_dim`, `cod_asig`, `tipo_dim`, `num`, `nom_dim`, `cod_bimestre`) VALUES
(244, 528, 1, 1, 'Dimen', 1),
(245, 528, 1, 2, 'Dimen', 1),
(246, 528, 1, 3, 'Dimen', 1),
(247, 528, 2, 1, 'Dimen', 1),
(248, 528, 2, 2, 'Dimen', 1),
(249, 528, 2, 3, 'Dimen', 1),
(250, 528, 2, 4, 'Dimen', 1),
(251, 528, 3, 1, 'Dimen', 1),
(252, 528, 3, 2, 'Dimen', 1),
(253, 528, 3, 3, 'Dimen', 1),
(254, 528, 3, 4, 'Dimen', 1),
(255, 528, 4, 1, 'Dimen', 1),
(256, 528, 4, 2, 'Dimen', 1),
(257, 528, 4, 3, 'Dimen', 1),
(258, 464, 1, 1, 'examen 0', 1),
(259, 464, 1, 2, 'examen 1', 1),
(260, 464, 1, 3, 'examen 2', 1),
(261, 464, 2, 1, 'Dimen', 1),
(262, 464, 2, 2, 'Dimen', 1),
(263, 464, 2, 3, 'Dimen', 1),
(264, 464, 2, 4, 'Dimen', 1),
(265, 464, 3, 1, 'Dimen', 1),
(266, 464, 3, 2, 'Dimen', 1),
(267, 464, 3, 3, 'Dimen', 1),
(268, 464, 3, 4, 'Dimen', 1),
(269, 464, 4, 1, 'Dimen', 1),
(270, 464, 4, 2, 'Dimen', 1),
(271, 464, 4, 3, 'Dimen', 1),
(272, 494, 1, 1, 'Dimen', 1),
(273, 494, 1, 2, 'Dimen', 1),
(274, 494, 1, 3, 'Dimen', 1),
(275, 494, 2, 1, 'Dimen', 1),
(276, 494, 2, 2, 'Dimen', 1),
(277, 494, 2, 3, 'Dimen', 1),
(278, 494, 2, 4, 'Dimen', 1),
(279, 494, 3, 1, 'Dimen', 1),
(280, 494, 3, 2, 'Dimen', 1),
(281, 494, 3, 3, 'Dimen', 1),
(282, 494, 3, 4, 'Dimen', 1),
(283, 494, 4, 1, 'Dimen', 1),
(284, 494, 4, 2, 'Dimen', 1),
(285, 494, 4, 3, 'Dimen', 1),
(286, 589, 1, 1, 'Dimen', 1),
(287, 589, 1, 2, 'Dimen', 1),
(288, 589, 1, 3, 'Dimen', 1),
(289, 589, 2, 1, 'Dimen', 1),
(290, 589, 2, 2, 'Dimen', 1),
(291, 589, 2, 3, 'Dimen', 1),
(292, 589, 2, 4, 'Dimen', 1),
(293, 589, 3, 1, 'Dimen', 1),
(294, 589, 3, 2, 'Dimen', 1),
(295, 589, 3, 3, 'Dimen', 1),
(296, 589, 3, 4, 'Dimen', 1),
(297, 589, 4, 1, 'Dimen', 1),
(298, 589, 4, 2, 'Dimen', 1),
(299, 589, 4, 3, 'Dimen', 1),
(300, 470, 1, 1, 'Dimen', 1),
(301, 470, 1, 2, 'Dimen', 1),
(302, 470, 1, 3, 'Dimen', 1),
(303, 470, 2, 1, 'Dimen', 1),
(304, 470, 2, 2, 'Dimen', 1),
(305, 470, 2, 3, 'Dimen', 1),
(306, 470, 2, 4, 'Dimen', 1),
(307, 470, 3, 1, 'Dimen', 1),
(308, 470, 3, 2, 'Dimen', 1),
(309, 470, 3, 3, 'Dimen', 1),
(310, 470, 3, 4, 'Dimen', 1),
(311, 470, 4, 1, 'Dimen', 1),
(312, 470, 4, 2, 'Dimen', 1),
(313, 470, 4, 3, 'Dimen', 1),
(314, 476, 1, 1, 'Dimen', 1),
(315, 476, 1, 2, 'Dimen', 1),
(316, 476, 1, 3, 'Dimen', 1),
(317, 476, 2, 1, 'Dimen', 1),
(318, 476, 2, 2, 'Dimen', 1),
(319, 476, 2, 3, 'Dimen', 1),
(320, 476, 2, 4, 'Dimen', 1),
(321, 476, 3, 1, 'Dimen', 1),
(322, 476, 3, 2, 'Dimen', 1),
(323, 476, 3, 3, 'Dimen', 1),
(324, 476, 3, 4, 'Dimen', 1),
(325, 476, 4, 1, 'Dimen', 1),
(326, 476, 4, 2, 'Dimen', 1),
(327, 476, 4, 3, 'Dimen', 1),
(328, 482, 1, 1, 'Dimen', 1),
(329, 482, 1, 2, 'Dimen', 1),
(330, 482, 1, 3, 'Dimen', 1),
(331, 482, 2, 1, 'Dimen', 1),
(332, 482, 2, 2, 'Dimen', 1),
(333, 482, 2, 3, 'Dimen', 1),
(334, 482, 2, 4, 'Dimen', 1),
(335, 482, 3, 1, 'Dimen', 1),
(336, 482, 3, 2, 'Dimen', 1),
(337, 482, 3, 3, 'Dimen', 1),
(338, 482, 3, 4, 'Dimen', 1),
(339, 482, 4, 1, 'Dimen', 1),
(340, 482, 4, 2, 'Dimen', 1),
(341, 482, 4, 3, 'Dimen', 1),
(342, 482, 1, 1, 'Dimen', 2),
(343, 482, 1, 2, 'Dimen', 2),
(344, 482, 1, 3, 'Dimen', 2),
(345, 482, 2, 1, 'Dimen', 2),
(346, 482, 2, 2, 'Dimen', 2),
(347, 482, 2, 3, 'Dimen', 2),
(348, 482, 2, 4, 'Dimen', 2),
(349, 482, 3, 1, 'Dimen', 2),
(350, 482, 3, 2, 'Dimen', 2),
(351, 482, 3, 3, 'Dimen', 2),
(352, 482, 3, 4, 'Dimen', 2),
(353, 482, 4, 1, 'Dimen', 2),
(354, 482, 4, 2, 'Dimen', 2),
(355, 482, 4, 3, 'Dimen', 2),
(356, 488, 1, 1, 'Dimen', 1),
(357, 488, 1, 2, 'Dimen', 1),
(358, 488, 1, 3, 'Dimen', 1),
(359, 488, 2, 1, 'Dimen', 1),
(360, 488, 2, 2, 'Dimen', 1),
(361, 488, 2, 3, 'Dimen', 1),
(362, 488, 2, 4, 'Dimen', 1),
(363, 488, 3, 1, 'Dimen', 1),
(364, 488, 3, 2, 'Dimen', 1),
(365, 488, 3, 3, 'Dimen', 1),
(366, 488, 3, 4, 'Dimen', 1),
(367, 488, 4, 1, 'Dimen', 1),
(368, 488, 4, 2, 'Dimen', 1),
(369, 488, 4, 3, 'Dimen', 1),
(370, 500, 1, 1, 'Dimen', 1),
(371, 500, 1, 2, 'Dimen', 1),
(372, 500, 1, 3, 'Dimen', 1),
(373, 500, 2, 1, 'Dimen', 1),
(374, 500, 2, 2, 'Dimen', 1),
(375, 500, 2, 3, 'Dimen', 1),
(376, 500, 2, 4, 'Dimen', 1),
(377, 500, 3, 1, 'Dimen', 1),
(378, 500, 3, 2, 'Dimen', 1),
(379, 500, 3, 3, 'Dimen', 1),
(380, 500, 3, 4, 'Dimen', 1),
(381, 500, 4, 1, 'Dimen', 1),
(382, 500, 4, 2, 'Dimen', 1),
(383, 500, 4, 3, 'Dimen', 1),
(384, 506, 1, 1, 'Dimen', 1),
(385, 506, 1, 2, 'Dimen', 1),
(386, 506, 1, 3, 'Dimen', 1),
(387, 506, 2, 1, 'Dimen', 1),
(388, 506, 2, 2, 'Dimen', 1),
(389, 506, 2, 3, 'Dimen', 1),
(390, 506, 2, 4, 'Dimen', 1),
(391, 506, 3, 1, 'Dimen', 1),
(392, 506, 3, 2, 'Dimen', 1),
(393, 506, 3, 3, 'Dimen', 1),
(394, 506, 3, 4, 'Dimen', 1),
(395, 506, 4, 1, 'Dimen', 1),
(396, 506, 4, 2, 'Dimen', 1),
(397, 506, 4, 3, 'Dimen', 1),
(398, 512, 1, 1, 'Dimen', 1),
(399, 512, 1, 2, 'Dimen', 1),
(400, 512, 1, 3, 'Dimen', 1),
(401, 512, 2, 1, 'Dimen', 1),
(402, 512, 2, 2, 'Dimen', 1),
(403, 512, 2, 3, 'Dimen', 1),
(404, 512, 2, 4, 'Dimen', 1),
(405, 512, 3, 1, 'Dimen', 1),
(406, 512, 3, 2, 'Dimen', 1),
(407, 512, 3, 3, 'Dimen', 1),
(408, 512, 3, 4, 'Dimen', 1),
(409, 512, 4, 1, 'Dimen', 1),
(410, 512, 4, 2, 'Dimen', 1),
(411, 512, 4, 3, 'Dimen', 1),
(412, 518, 1, 1, 'Dimen', 1),
(413, 518, 1, 2, 'Dimen', 1),
(414, 518, 1, 3, 'Dimen', 1),
(415, 518, 2, 1, 'Dimen', 1),
(416, 518, 2, 2, 'Dimen', 1),
(417, 518, 2, 3, 'Dimen', 1),
(418, 518, 2, 4, 'Dimen', 1),
(419, 518, 3, 1, 'Dimen', 1),
(420, 518, 3, 2, 'Dimen', 1),
(421, 518, 3, 3, 'Dimen', 1),
(422, 518, 3, 4, 'Dimen', 1),
(423, 518, 4, 1, 'Dimen', 1),
(424, 518, 4, 2, 'Dimen', 1),
(425, 518, 4, 3, 'Dimen', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `cod_doc` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `formacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `materia` int(11) DEFAULT NULL,
  `nivel` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`cod_doc`, `cod_usu`, `formacion`, `estado`, `materia`, `nivel`) VALUES
(6, 17, 'Normalista', 1, 26, 1),
(7, 18, 'Normalista', 1, 31, 1),
(8, 19, 'Normalista', 1, 41, 2),
(9, 20, 'Normalista', 1, 45, 2),
(10, 21, 'Normalista', 1, 27, 1),
(11, 22, 'Normalista', 1, 36, 2),
(12, 25, 'Normalista', 1, 28, 1),
(13, 26, 'Normalista', 1, 29, 1),
(14, 27, 'Normalista', 1, 30, 1),
(15, 28, 'Normalista', 1, 32, 1),
(16, 29, 'Normalista', 1, 33, 1),
(17, 30, 'Pasante', 1, 34, 1),
(18, 31, 'Licenciado', 1, 45, 0),
(19, 32, 'Normalista', 1, 35, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `cod_est` int(11) NOT NULL,
  `cod_usu` int(11) NOT NULL,
  `genero` bit(1) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `peso` decimal(4,2) DEFAULT NULL,
  `talla` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`cod_est`, `cod_usu`, `genero`, `estado`, `peso`, `talla`) VALUES
(7, 23, b'1', 1, '35.00', '1.20'),
(8, 24, b'1', 1, '65.00', '1.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion`
--

CREATE TABLE `gestion` (
  `cod_gestion` int(11) NOT NULL,
  `gestion` year(4) NOT NULL,
  `direccion` int(11) DEFAULT NULL,
  `bimestres` tinyint(4) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gestion`
--

INSERT INTO `gestion` (`cod_gestion`, `gestion`, `direccion`, `bimestres`) VALUES
(1, 2021, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `cod_hor` int(11) NOT NULL,
  `dia` tinyint(4) NOT NULL,
  `periodo1` int(11) DEFAULT NULL,
  `periodo2` int(11) DEFAULT NULL,
  `periodo3` int(11) DEFAULT NULL,
  `periodo4` int(11) DEFAULT NULL,
  `periodo5` int(11) DEFAULT NULL,
  `periodo6` int(11) DEFAULT NULL,
  `periodo7` int(11) DEFAULT NULL,
  `periodo8` int(11) DEFAULT NULL,
  `cod_cur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`cod_hor`, `dia`, `periodo1`, `periodo2`, `periodo3`, `periodo4`, `periodo5`, `periodo6`, `periodo7`, `periodo8`, `cod_cur`) VALUES
(36, 1, 26, 26, 27, 27, 27, 27, 0, 0, 28),
(37, 2, 34, 34, 0, 0, 31, 31, 0, 0, 28),
(38, 3, 33, 33, 26, 26, 35, 35, 0, 0, 28),
(39, 4, 26, 26, 26, 32, 31, 0, 0, 0, 28),
(40, 5, 30, 30, 35, 35, 26, 26, 0, 0, 28),
(41, 1, 36, 36, 37, 37, 38, 38, 0, 0, 49),
(42, 2, 38, 38, 39, 39, 0, 38, 38, 0, 49),
(43, 3, 36, 36, 0, 42, 42, 41, 41, 0, 49),
(44, 4, 44, 44, 43, 43, 43, 0, 45, 0, 49),
(45, 5, 45, 45, 36, 36, 38, 38, 0, 0, 49),
(46, 1, 26, 26, 0, 0, 27, 27, 0, 0, 57),
(47, 2, 26, 26, 0, 0, 0, 0, 0, 0, 57),
(48, 3, 0, 0, 0, 28, 0, 0, 0, 0, 57),
(49, 4, 0, 0, 0, 28, 0, 0, 0, 35, 57),
(50, 5, 0, 0, 0, 0, 0, 32, 33, 0, 57),
(51, 1, 40, 40, 0, 0, 0, 0, 0, 0, 58),
(52, 2, 0, 0, 0, 0, 0, 0, 37, 37, 58),
(53, 3, 44, 44, 0, 0, 0, 0, 0, 0, 58),
(54, 4, 0, 0, 0, 0, 0, 0, 39, 39, 58),
(55, 5, 40, 0, 0, 0, 0, 0, 0, 0, 58),
(56, 1, 33, 33, 0, 0, 0, 0, 0, 0, 60),
(57, 2, 0, 0, 0, 0, 0, 0, 0, 0, 60),
(58, 3, 0, 0, 0, 0, 0, 0, 0, 0, 60),
(59, 4, 0, 0, 0, 0, 0, 0, 0, 0, 60),
(60, 5, 33, 0, 0, 0, 0, 0, 0, 0, 60),
(61, 1, 28, 28, 0, 0, 0, 0, 0, 28, 30),
(62, 2, 0, 0, 0, 0, 0, 0, 0, 0, 30),
(63, 3, 0, 0, 0, 0, 0, 0, 0, 0, 30),
(64, 4, 0, 0, 0, 0, 0, 0, 0, 0, 30),
(65, 5, 28, 28, 0, 0, 0, 0, 0, 28, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `cod_ins` int(11) NOT NULL,
  `fecha_ins` date NOT NULL,
  `cod_gestion` int(11) NOT NULL,
  `estadoIns` tinyint(4) NOT NULL DEFAULT 1,
  `aprobacion` bit(1) DEFAULT NULL,
  `re_ins` bit(1) DEFAULT b'1',
  `cod_est` int(11) NOT NULL,
  `cod_deins` int(11) DEFAULT NULL,
  `cod_cur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`cod_ins`, `fecha_ins`, `cod_gestion`, `estadoIns`, `aprobacion`, `re_ins`, `cod_est`, `cod_deins`, `cod_cur`) VALUES
(5, '2021-07-23', 1, 1, NULL, b'1', 7, 7, 28),
(6, '2021-07-23', 1, 1, NULL, b'1', 8, 8, 57);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `cod_mat` int(11) NOT NULL,
  `nombre_mat` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  `color` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_gestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`cod_mat`, `nombre_mat`, `nivel`, `color`, `cod_gestion`) VALUES
(26, 'Matemáticas', 1, '#00e6ac', 1),
(27, 'Música', 1, '#ffcc99', 1),
(28, 'Artes Plásticas', 1, '#ccff99', 1),
(29, 'Técnica', 1, '#99ccff', 1),
(30, 'Religión', 1, '#ffccff', 1),
(31, 'Educación Física', 1, '#ffcccc', 1),
(32, 'Ciencias Naturales', 1, '#ffffcc', 1),
(33, 'Ciencias Sociales', 1, '#ccffcc', 1),
(34, 'Tecnología', 1, '#ccffff', 1),
(35, 'Lenguaje', 1, '#66ffff', 1),
(36, 'Geografía', 2, '#ffff66', 1),
(37, 'Literatura', 2, '#ffcc66', 1),
(38, 'Matemáticas', 2, '#ff6666', 1),
(39, 'Filosofía', 2, '#ff6699', 1),
(40, 'Biologia', 2, '#6ef7f7', 1),
(41, 'Fisica', 2, '#6699ff', 1),
(42, 'Quimica', 2, '#9999ff', 1),
(43, 'Computación', 2, '#00cc99', 1),
(44, 'Religión', 2, '#ff9999', 1),
(45, 'Artes Plásticas', 2, '#cc66ff', 1),
(46, 'Ingles', 2, '#00cc66', 1),
(47, 'Educación Física', 2, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `cod_men` int(11) NOT NULL,
  `fecha_envio` datetime NOT NULL,
  `contenido` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_adj` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_men` tinyint(4) NOT NULL,
  `origen` int(11) NOT NULL,
  `cod_cur` int(11) DEFAULT NULL,
  `cod_gestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`cod_men`, `fecha_envio`, `contenido`, `imagen_adj`, `tipo_men`, `origen`, `cod_cur`, `cod_gestion`) VALUES
(96, '2021-07-23 07:33:00', 'hola', 'null', 1, 14, NULL, 1),
(97, '2021-07-23 07:33:00', 'Mensaje de Prueba 1', 'null', 1, 14, NULL, 1),
(98, '2021-07-23 07:43:00', 'Hola', 'null', 1, 14, NULL, 1),
(99, '2021-07-23 07:44:00', 'hola mensaje de prueba', 'null', 1, 14, NULL, 1),
(100, '2021-07-23 08:10:00', 'Mensaje de Prueba 2', 'null', 1, 14, NULL, 1),
(101, '2021-07-23 08:21:00', 'hola director', 'null', 1, 17, NULL, 1),
(102, '2021-07-23 09:06:00', 'hola director', 'null', 1, 17, NULL, 1),
(103, '2021-07-23 09:26:00', 'Mensaje Prueba 3', 'null', 1, 14, NULL, 1),
(104, '2021-07-23 09:26:57', 'Hola estudiantes', 'null', 2, 14, 28, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

CREATE TABLE `observacion` (
  `cod_obs` int(11) NOT NULL,
  `fecha_obs` datetime NOT NULL,
  `descrip_obs` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `cod_est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables`
--

CREATE TABLE `responsables` (
  `cod_est` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `nom_res` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `pat_res` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `mat_res` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `ocupacion` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `responsables`
--

INSERT INTO `responsables` (`cod_est`, `ci`, `nom_res`, `pat_res`, `mat_res`, `tipo`, `ocupacion`) VALUES
(7, 84567896, 'Jherson', 'Poma', 'Molina', 1, NULL),
(7, 8469574, 'Antonia', 'Lima', 'Lopez', 2, NULL),
(8, 847513, 'Padre Andres', 'Machaca', 'Machaca', 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retiro`
--

CREATE TABLE `retiro` (
  `cod_ret` int(11) NOT NULL,
  `cod_est` int(11) NOT NULL,
  `gestion_ret` year(4) NOT NULL,
  `fecha_ret` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `cod_tar` int(11) NOT NULL,
  `bi_ta` tinyint(4) NOT NULL,
  `nom_tar` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_emi` datetime NOT NULL,
  `fecha_ent` date NOT NULL,
  `descr_tar` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `cod_mat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usu` int(11) NOT NULL,
  `ape_paterno` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `ape_materno` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_usu` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usu` tinyint(4) NOT NULL,
  `fecha_nac` date NOT NULL,
  `carnet` int(11) NOT NULL,
  `passwor` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `foto_perfil` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_usu`, `ape_paterno`, `ape_materno`, `nombre_usu`, `tipo_usu`, `fecha_nac`, `carnet`, `passwor`, `foto_perfil`, `fecha_crea`) VALUES
(14, 'Torrez', 'Mamani', 'Andrés Gabriel', 1, '1997-05-20', 8467527, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/8467527/877.png', '2021-07-23 11:17:09'),
(15, 'Marca', 'Lopez', 'jhoselyn', 1, '1997-03-10', 74815926, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/74815926/503.png', '2021-07-23 11:17:21'),
(16, 'Alvarado', 'Miranda', 'Beimar', 1, '1994-12-28', 7895612, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/7895612/462.png', '2021-07-23 11:17:38'),
(17, 'Martinez', 'Miranda', 'Jose', 2, '1976-06-23', 7458963, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/7458963/470.jpg', '2021-07-23 11:19:03'),
(18, 'Rios', 'Canseco', 'Adrian', 2, '1990-02-23', 87458962, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/87458962/903.jpg', '2021-07-23 11:20:17'),
(19, 'Morales', 'Ramos', 'Ludwing', 2, '1993-02-18', 12374586, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/12374586/908.jpg', '2021-07-23 11:21:27'),
(20, 'Mollo', 'Miranda', 'Monica', 2, '1990-02-07', 2541753, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/2541753/219.jpg', '2021-07-23 11:23:16'),
(21, 'Molina', 'Marquina', 'Celia', 2, '1990-07-10', 6245368, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/6245368/779.jpg', '2021-07-23 11:25:24'),
(22, 'Zaconeta', 'Martinez', 'Andrea', 2, '2021-07-23', 6523548, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/6523548/493.jpg', '2021-07-23 11:27:43'),
(23, 'Lima', 'Poma', 'Daniel', 3, '2017-02-02', 465214, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', '', '2021-07-23 11:40:47'),
(24, 'Machaca', 'Machaca', 'Andres', 3, '2004-02-05', 845652, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', '', '2021-07-23 12:08:39'),
(25, 'Plaza', 'Gonzales', 'Iver', 2, '1997-12-31', 8784195, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/8784195/147.png', '2021-07-23 12:31:11'),
(26, 'Luna', 'Manrrique', 'Horacio', 2, '1995-12-20', 47815356, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/47815356/134.jpg', '2021-07-23 12:33:45'),
(27, 'Miranda', 'Miranda', 'Daniel', 2, '1991-09-19', 8156165, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/8156165/556.jpg', '2021-07-23 12:34:44'),
(28, 'Huarachi', 'Murillo', 'Leonardo', 2, '1982-04-19', 8896456, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/8896456/629.jpg', '2021-07-23 12:36:10'),
(29, 'Alvarez', 'Lore', 'Jose Luis', 2, '1984-04-25', 8497498, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/8497498/739.jpg', '2021-07-23 12:37:30'),
(30, 'Diaz', 'Gomez', 'Ariel', 2, '1995-12-02', 9891565, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/9891565/284.jpg', '2021-07-23 12:38:32'),
(31, 'Donovan', 'Villegaz', 'Arturo', 2, '1998-04-20', 8467524, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/8467524/120.jpg', '2021-07-23 12:39:44'),
(32, 'Canseco', 'Vega', 'Orlando', 2, '1980-06-16', 84257189, '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'vistas/img/usuarios/84257189/919.jpg', '2021-07-23 12:41:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrativo`
--
ALTER TABLE `administrativo`
  ADD PRIMARY KEY (`cod_adm`),
  ADD KEY `cod_usu_idx` (`cod_usu`);

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`cod_asig`),
  ADD KEY `cod_cur_idx` (`cod_cur`),
  ADD KEY `cod_doc_idx` (`cod_doc`),
  ADD KEY `fk_asignacion_materia_idx` (`cod_mat`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`cod_asis`),
  ADD KEY `cod_ins_idx` (`cod_ins`),
  ADD KEY `cod_mat_idx` (`cod_asig`),
  ADD KEY `fk_asistencia_bimestre_idx` (`cod_bi`);

--
-- Indices de la tabla `bimestre`
--
ALTER TABLE `bimestre`
  ADD PRIMARY KEY (`cod_bimestre`),
  ADD KEY `fk_bimestre_gestion_idx` (`cod_gestion`);

--
-- Indices de la tabla `buzon`
--
ALTER TABLE `buzon`
  ADD PRIMARY KEY (`cod_buz`),
  ADD KEY `cod_usu_idx` (`cod_usu`),
  ADD KEY `cod_men_idx` (`cod_men`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`cod_cal`),
  ADD KEY `cod_ins_idx` (`cod_ins`),
  ADD KEY `cod_mat_idx` (`cod_asig`),
  ADD KEY `fk_calificaciones_bimestre_idx` (`cod_bi`);

--
-- Indices de la tabla `comportamiento`
--
ALTER TABLE `comportamiento`
  ADD PRIMARY KEY (`cod_com`),
  ADD KEY `cod_ins_idx` (`cod_ins`),
  ADD KEY `cod_mat_idx` (`cod_asig`),
  ADD KEY `fk_comportamiento_bimestre_idx` (`cod_bi`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod_cur`),
  ADD KEY `fk_curso_gestion_idx` (`cod_gestion`);

--
-- Indices de la tabla `detalle_cal`
--
ALTER TABLE `detalle_cal`
  ADD KEY `fk_detalle_cal_calificaciones_idx` (`cod_cal`),
  ADD KEY `fk_detalle_cal_dimenciones_idx` (`cod_dim`);

--
-- Indices de la tabla `detalle_ins`
--
ALTER TABLE `detalle_ins`
  ADD PRIMARY KEY (`cod_deins`);

--
-- Indices de la tabla `dimenciones`
--
ALTER TABLE `dimenciones`
  ADD PRIMARY KEY (`cod_dim`),
  ADD KEY `fk_dimencion_asignacion_idx` (`cod_asig`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`cod_doc`),
  ADD KEY `cod_usu_idx` (`cod_usu`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`cod_est`),
  ADD KEY `cod_usu_idx` (`cod_usu`);

--
-- Indices de la tabla `gestion`
--
ALTER TABLE `gestion`
  ADD PRIMARY KEY (`cod_gestion`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`cod_hor`),
  ADD KEY `cod_cur_idx` (`cod_cur`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`cod_ins`),
  ADD KEY `cod_est_idx` (`cod_est`),
  ADD KEY `cod_deins_idx` (`cod_deins`),
  ADD KEY `cod_cur_idx` (`cod_cur`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`cod_mat`),
  ADD KEY `fk_materia_gestion_idx` (`cod_gestion`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`cod_men`),
  ADD KEY `fk_mensaje_origen_idx` (`origen`),
  ADD KEY `fk_mensaje_cod_cur_idx` (`cod_cur`);

--
-- Indices de la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD PRIMARY KEY (`cod_obs`),
  ADD KEY `cod_est_idx` (`cod_est`);

--
-- Indices de la tabla `responsables`
--
ALTER TABLE `responsables`
  ADD KEY `fk_responsable_estudiante` (`cod_est`);

--
-- Indices de la tabla `retiro`
--
ALTER TABLE `retiro`
  ADD PRIMARY KEY (`cod_ret`),
  ADD KEY `fk_retiro_estudiante_idx` (`cod_est`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`cod_tar`),
  ADD KEY `cod_mat_idx` (`cod_mat`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrativo`
--
ALTER TABLE `administrativo`
  MODIFY `cod_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `cod_asig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=638;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `cod_asis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `bimestre`
--
ALTER TABLE `bimestre`
  MODIFY `cod_bimestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `buzon`
--
ALTER TABLE `buzon`
  MODIFY `cod_buz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `cod_cal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `comportamiento`
--
ALTER TABLE `comportamiento`
  MODIFY `cod_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `cod_cur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `detalle_ins`
--
ALTER TABLE `detalle_ins`
  MODIFY `cod_deins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `dimenciones`
--
ALTER TABLE `dimenciones`
  MODIFY `cod_dim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `cod_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `cod_est` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `gestion`
--
ALTER TABLE `gestion`
  MODIFY `cod_gestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `cod_hor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `cod_ins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `cod_mat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `cod_men` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `retiro`
--
ALTER TABLE `retiro`
  MODIFY `cod_ret` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrativo`
--
ALTER TABLE `administrativo`
  ADD CONSTRAINT `fk_admi_usuarios` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `fk_asignacion_curso` FOREIGN KEY (`cod_cur`) REFERENCES `curso` (`cod_cur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignacion_docente` FOREIGN KEY (`cod_doc`) REFERENCES `docente` (`cod_doc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignacion_materia` FOREIGN KEY (`cod_mat`) REFERENCES `materia` (`cod_mat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_asistencia_bimestre` FOREIGN KEY (`cod_bi`) REFERENCES `bimestre` (`cod_bimestre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asistencia_inscripcion` FOREIGN KEY (`cod_ins`) REFERENCES `inscripcion` (`cod_ins`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asistencia_materia` FOREIGN KEY (`cod_asig`) REFERENCES `asignacion` (`cod_asig`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bimestre`
--
ALTER TABLE `bimestre`
  ADD CONSTRAINT `fk_bimestre_gestion` FOREIGN KEY (`cod_gestion`) REFERENCES `gestion` (`cod_gestion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `buzon`
--
ALTER TABLE `buzon`
  ADD CONSTRAINT `fk_buzon_mensaje` FOREIGN KEY (`cod_men`) REFERENCES `mensaje` (`cod_men`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_buzon_usuarios` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `fk_calificaciones_bimestre` FOREIGN KEY (`cod_bi`) REFERENCES `bimestre` (`cod_bimestre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calificaciones_inscripcion` FOREIGN KEY (`cod_ins`) REFERENCES `inscripcion` (`cod_ins`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calificaciones_materia` FOREIGN KEY (`cod_asig`) REFERENCES `asignacion` (`cod_asig`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comportamiento`
--
ALTER TABLE `comportamiento`
  ADD CONSTRAINT `fk_comportamiento_bimestre` FOREIGN KEY (`cod_bi`) REFERENCES `bimestre` (`cod_bimestre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comportamiento_inscripcion` FOREIGN KEY (`cod_ins`) REFERENCES `inscripcion` (`cod_ins`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comportamiento_materia` FOREIGN KEY (`cod_asig`) REFERENCES `asignacion` (`cod_asig`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_gestion` FOREIGN KEY (`cod_gestion`) REFERENCES `gestion` (`cod_gestion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_cal`
--
ALTER TABLE `detalle_cal`
  ADD CONSTRAINT `fk_detalle_cal_calificaciones` FOREIGN KEY (`cod_cal`) REFERENCES `calificaciones` (`cod_cal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_cal_dimenciones` FOREIGN KEY (`cod_dim`) REFERENCES `dimenciones` (`cod_dim`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dimenciones`
--
ALTER TABLE `dimenciones`
  ADD CONSTRAINT `fk_dimencion_asignacion` FOREIGN KEY (`cod_asig`) REFERENCES `asignacion` (`cod_asig`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `fk_docente_usuarios` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_usuarios` FOREIGN KEY (`cod_usu`) REFERENCES `usuarios` (`cod_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_horario_curso` FOREIGN KEY (`cod_cur`) REFERENCES `curso` (`cod_cur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `fk_inscripcion_curso` FOREIGN KEY (`cod_cur`) REFERENCES `curso` (`cod_cur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscripcion_detalle_ins` FOREIGN KEY (`cod_deins`) REFERENCES `detalle_ins` (`cod_deins`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscripcion_estudiante` FOREIGN KEY (`cod_est`) REFERENCES `estudiante` (`cod_est`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `fk_materia_gestion` FOREIGN KEY (`cod_gestion`) REFERENCES `gestion` (`cod_gestion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `fk_mensaje_cod_cur` FOREIGN KEY (`cod_cur`) REFERENCES `curso` (`cod_cur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mensaje_origen` FOREIGN KEY (`origen`) REFERENCES `usuarios` (`cod_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD CONSTRAINT `fk_observacion_estudiante` FOREIGN KEY (`cod_est`) REFERENCES `estudiante` (`cod_est`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `responsables`
--
ALTER TABLE `responsables`
  ADD CONSTRAINT `fk_responsable_estudiante` FOREIGN KEY (`cod_est`) REFERENCES `estudiante` (`cod_est`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `retiro`
--
ALTER TABLE `retiro`
  ADD CONSTRAINT `fk_retiro_estudiante` FOREIGN KEY (`cod_est`) REFERENCES `estudiante` (`cod_est`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `fk_tarea_materia` FOREIGN KEY (`cod_mat`) REFERENCES `asignacion` (`cod_asig`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
