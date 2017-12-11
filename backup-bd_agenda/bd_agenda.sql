-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Dez-2017 às 23:59
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auditorioreserva`
--

CREATE TABLE `auditorioreserva` (
  `ID_RESERVA_AUDITORIO` int(11) NOT NULL,
  `DATA_RESERVA_AUDITORIO` date NOT NULL,
  `HORARIO_RESERVA_AUDITORIO` varchar(30) NOT NULL,
  `RESPONS_RESERVA_AUDITORIO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `auditorioreserva`
--

INSERT INTO `auditorioreserva` (`ID_RESERVA_AUDITORIO`, `DATA_RESERVA_AUDITORIO`, `HORARIO_RESERVA_AUDITORIO`, `RESPONS_RESERVA_AUDITORIO`) VALUES
(1, '2017-12-04', '2_horario_ves_audi', 'Luis'),
(3, '2017-12-05', '1_horario_mat_audi', 'Pietra');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cabo_hdmi_reserva`
--

CREATE TABLE `cabo_hdmi_reserva` (
  `ID_RESERVA_CABO` int(11) NOT NULL,
  `CABO_HDMI` varchar(30) NOT NULL,
  `DATA_RESERVA_CABO` date NOT NULL,
  `HORARIO_RESERVA_CABO` varchar(30) NOT NULL,
  `RESPONS_RESERVA_CABO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cabo_hdmi_reserva`
--

INSERT INTO `cabo_hdmi_reserva` (`ID_RESERVA_CABO`, `CABO_HDMI`, `DATA_RESERVA_CABO`, `HORARIO_RESERVA_CABO`, `RESPONS_RESERVA_CABO`) VALUES
(1, 'CaboHDMI_1Metro', '2017-11-10', '1_horario_mat_cabo', 'Silmara '),
(3, 'CaboHDMI_1Metro', '2017-11-13', '1_horario_mat_cabo', 'Clair'),
(4, 'CaboHDMI_4Metros', '2017-11-13', '2_horario_mat_cabo', 'Anibal'),
(5, 'CaboHDMI_4Metros', '2017-11-10', '3_horario_mat_cabo', 'Elvis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_controle_tablet`
--

CREATE TABLE `cadastro_controle_tablet` (
  `ID_CONTROLE` int(11) NOT NULL,
  `NUM_TABLET` int(11) NOT NULL,
  `NOME_USUARIO` varchar(30) NOT NULL,
  `TURMA` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastro_controle_tablet`
--

INSERT INTO `cadastro_controle_tablet` (`ID_CONTROLE`, `NUM_TABLET`, `NOME_USUARIO`, `TURMA`) VALUES
(3, 3, 'Pedro ', 'fundamental_2'),
(4, 8, 'Paulo', 'fundamental1_2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conversor_vga_reserva`
--

CREATE TABLE `conversor_vga_reserva` (
  `ID_RESERVA_CONVERSOR` int(11) NOT NULL,
  `CONVERSOR_VGA` varchar(30) NOT NULL,
  `DATA_RESERVA_CONVERSOR` date NOT NULL,
  `HORARIO_RESERVA_CONVERSOR` varchar(30) NOT NULL,
  `RESPONS_RESERVA_CONVERSOR` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conversor_vga_reserva`
--

INSERT INTO `conversor_vga_reserva` (`ID_RESERVA_CONVERSOR`, `CONVERSOR_VGA`, `DATA_RESERVA_CONVERSOR`, `HORARIO_RESERVA_CONVERSOR`, `RESPONS_RESERVA_CONVERSOR`) VALUES
(2, 'Conversor_VGA', '2017-11-14', '1_horario_mat_conv', 'Suellen ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `datashowreserva`
--

CREATE TABLE `datashowreserva` (
  `ID_RESERVA` int(11) NOT NULL,
  `DATASHOW` varchar(26) NOT NULL,
  `DATA_RESERVA` date NOT NULL,
  `HORARIO_RESERVA` varchar(22) NOT NULL,
  `RESPONS_RESERVA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `datashowreserva`
--

INSERT INTO `datashowreserva` (`ID_RESERVA`, `DATASHOW`, `DATA_RESERVA`, `HORARIO_RESERVA`, `RESPONS_RESERVA`) VALUES
(57, 'Datashow_Betec_bt720_uni1', '2017-09-28', '1_horario_mat_datashow', 'o'),
(59, 'Datashow_Sony_pl_ex100', '2017-09-29', '2_horario_mat_datashow', 'Maria'),
(60, 'Datashow_Betec_bt720_uni1', '2017-09-30', '2_horario_mat_datashow', 'l');

-- --------------------------------------------------------

--
-- Estrutura da tabela `geolabreserva`
--

CREATE TABLE `geolabreserva` (
  `ID_RESERVA_GEOLAB` int(11) NOT NULL,
  `DATA_RESERVA_GEOLAB` date NOT NULL,
  `HORARIO_RESERVA_GEOLAB` varchar(30) NOT NULL,
  `RESPONS_RESERVA_GEOLAB` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `geolabreserva`
--

INSERT INTO `geolabreserva` (`ID_RESERVA_GEOLAB`, `DATA_RESERVA_GEOLAB`, `HORARIO_RESERVA_GEOLAB`, `RESPONS_RESERVA_GEOLAB`) VALUES
(1, '2017-11-29', '1_horario_mat_geolab', 'Tiago'),
(3, '2017-11-30', '3_horario_mat_geolab', 'Clair');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lab02reserva`
--

CREATE TABLE `lab02reserva` (
  `ID_RESERVA_LAB02` int(11) NOT NULL,
  `DATA_RESERVA_LAB02` date NOT NULL,
  `HORARIO_RESERVA_LAB02` varchar(30) NOT NULL,
  `RESPONS_RESERVA_LAB02` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lab02reserva`
--

INSERT INTO `lab02reserva` (`ID_RESERVA_LAB02`, `DATA_RESERVA_LAB02`, `HORARIO_RESERVA_LAB02`, `RESPONS_RESERVA_LAB02`) VALUES
(2, '2017-11-30', '2_horario_mat_lab02', 'Helber');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lab04reserva`
--

CREATE TABLE `lab04reserva` (
  `ID_RESERVA_LAB04` int(11) NOT NULL,
  `DATA_RESERVA_LAB04` date NOT NULL,
  `HORARIO_RESERVA_LAB04` varchar(30) NOT NULL,
  `RESPONS_RESERVA_LAB04` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lab04reserva`
--

INSERT INTO `lab04reserva` (`ID_RESERVA_LAB04`, `DATA_RESERVA_LAB04`, `HORARIO_RESERVA_LAB04`, `RESPONS_RESERVA_LAB04`) VALUES
(1, '2017-11-28', '1_horario_mat_lab04', 'Pablo ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lab06reserva`
--

CREATE TABLE `lab06reserva` (
  `ID_RESERVA_LAB06` int(11) NOT NULL,
  `DATA_RESERVA_LAB06` date NOT NULL,
  `HORARIO_RESERVA_LAB06` varchar(30) NOT NULL,
  `RESPONS_RESERVA_LAB06` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lab06reserva`
--

INSERT INTO `lab06reserva` (`ID_RESERVA_LAB06`, `DATA_RESERVA_LAB06`, `HORARIO_RESERVA_LAB06`, `RESPONS_RESERVA_LAB06`) VALUES
(1, '2017-11-24', '1_horario_mat_lab06', 'Leandro '),
(3, '2017-11-24', '3_horario_mat_lab06', 'Samuel ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lab08reserva`
--

CREATE TABLE `lab08reserva` (
  `ID_RESERVA_LAB08` int(11) NOT NULL,
  `DATA_RESERVA_LAB08` date NOT NULL,
  `HORARIO_RESERVA_LAB08` varchar(30) NOT NULL,
  `RESPONS_RESERVA_LAB08` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lab08reserva`
--

INSERT INTO `lab08reserva` (`ID_RESERVA_LAB08`, `DATA_RESERVA_LAB08`, `HORARIO_RESERVA_LAB08`, `RESPONS_RESERVA_LAB08`) VALUES
(1, '2017-11-23', '2_horario_mat_lab08', 'Pedro '),
(2, '2017-11-23', '1_horario_mat_lab08', 'Lucas ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lab_fotografia_reserva`
--

CREATE TABLE `lab_fotografia_reserva` (
  `ID_RESERVA_LABFOTO` int(11) NOT NULL,
  `DATA_RESERVA_LABFOTO` date NOT NULL,
  `HORARIO_RESERVA_LABFOTO` varchar(30) NOT NULL,
  `RESPONS_RESERVA_LABFOTO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lab_redes_reserva`
--

CREATE TABLE `lab_redes_reserva` (
  `ID_RESERVA_LAB_REDES` int(11) NOT NULL,
  `DATA_RESERVA_LAB_REDES` date NOT NULL,
  `HORARIO_RESERVA_LAB_REDES` varchar(30) NOT NULL,
  `RESPONS_RESERVA_LAB_REDES` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lab_redes_reserva`
--

INSERT INTO `lab_redes_reserva` (`ID_RESERVA_LAB_REDES`, `DATA_RESERVA_LAB_REDES`, `HORARIO_RESERVA_LAB_REDES`, `RESPONS_RESERVA_LAB_REDES`) VALUES
(1, '2017-11-29', '6_horario_mat_labredes', 'Rodrigo '),
(3, '2017-11-30', '1_horario_mat_labredes', 'Pietra');

-- --------------------------------------------------------

--
-- Estrutura da tabela `microfonereserva`
--

CREATE TABLE `microfonereserva` (
  `ID_RESERVA_MICROFONE` int(11) NOT NULL,
  `MICROFONE` varchar(30) NOT NULL,
  `DATA_RESERVA_MICROFONE` date NOT NULL,
  `HORARIO_RESERVA_MICROFONE` varchar(30) NOT NULL,
  `RESPONS_RESERVA_MICROFONE` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notebookreserva`
--

CREATE TABLE `notebookreserva` (
  `ID_RESERVA_NOTE` int(11) NOT NULL,
  `NOTEBOOK` varchar(30) NOT NULL,
  `DATA_RESERVA_NOTE` date NOT NULL,
  `HORARIO_RESERVA_NOTE` varchar(30) NOT NULL,
  `RESPONS_RESERVA_NOTE` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `retroprojetorreserva`
--

CREATE TABLE `retroprojetorreserva` (
  `ID_RESERVA_RETRO` int(11) NOT NULL,
  `RETROPROJETOR` varchar(40) NOT NULL,
  `DATA_RESERVA_RETRO` date NOT NULL,
  `HORARIO_RESERVA_RETRO` varchar(30) NOT NULL,
  `RESPONS_RESERVA_RETRO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `retroprojetorreserva`
--

INSERT INTO `retroprojetorreserva` (`ID_RESERVA_RETRO`, `RETROPROJETOR`, `DATA_RESERVA_RETRO`, `HORARIO_RESERVA_RETRO`, `RESPONS_RESERVA_RETRO`) VALUES
(18, 'Retroprojetor', '2017-10-10', '3_horario_mat_retroprojetor', 'JoÃ£o'),
(19, 'Retroprojetor', '2017-10-06', '4_horario_mat_retroprojetor', 'Fernando'),
(20, 'Retroprojetor', '2017-10-10', '2_horario_mat_retroprojetor', 'Henrique');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala704reserva`
--

CREATE TABLE `sala704reserva` (
  `ID_RESERVA_SALA704` int(11) NOT NULL,
  `DATA_RESERVA_SALA704` date NOT NULL,
  `HORARIO_RESERVA_SALA704` varchar(30) NOT NULL,
  `RESPONS_RESERVA_SALA704` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sala704reserva`
--

INSERT INTO `sala704reserva` (`ID_RESERVA_SALA704`, `DATA_RESERVA_SALA704`, `HORARIO_RESERVA_SALA704`, `RESPONS_RESERVA_SALA704`) VALUES
(1, '2017-12-11', '1_horario_mat_sala704', 'James'),
(4, '2017-12-12', '3_horario_mat_sala704', 'Jorge');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala707reserva`
--

CREATE TABLE `sala707reserva` (
  `ID_RESERVA_SALA707` int(11) NOT NULL,
  `DATA_RESERVA_SALA707` date NOT NULL,
  `HORARIO_RESERVA_SALA707` varchar(30) NOT NULL,
  `RESPONS_RESERVA_SALA707` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sala707reserva`
--

INSERT INTO `sala707reserva` (`ID_RESERVA_SALA707`, `DATA_RESERVA_SALA707`, `HORARIO_RESERVA_SALA707`, `RESPONS_RESERVA_SALA707`) VALUES
(1, '2017-12-07', '1_horario_mat_sala707', 'Tiago'),
(3, '2017-12-08', '3_horario_mat_sala707', 'Danilo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala708reserva`
--

CREATE TABLE `sala708reserva` (
  `ID_RESERVA_SALA708` int(11) NOT NULL,
  `DATA_RESERVA_SALA708` date NOT NULL,
  `HORARIO_RESERVA_SALA708` varchar(30) NOT NULL,
  `RESPONS_RESERVA_SALA708` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sala708reserva`
--

INSERT INTO `sala708reserva` (`ID_RESERVA_SALA708`, `DATA_RESERVA_SALA708`, `HORARIO_RESERVA_SALA708`, `RESPONS_RESERVA_SALA708`) VALUES
(1, '2017-12-06', '1_horario_mat_sala708', 'Roger'),
(4, '2017-12-07', '5_horario_mat_sala708', 'Silmara '),
(5, '2017-12-07', '1_horario_not_sala708', 'Paulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telareserva`
--

CREATE TABLE `telareserva` (
  `ID_RESERVA_TELA` int(11) NOT NULL,
  `TELA` varchar(35) NOT NULL,
  `DATA_RESERVA_TELA` date NOT NULL,
  `HORARIO_RESERVA_TELA` varchar(30) NOT NULL,
  `RESPONS_RESERVA_TELA` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `telareserva`
--

INSERT INTO `telareserva` (`ID_RESERVA_TELA`, `TELA`, `DATA_RESERVA_TELA`, `HORARIO_RESERVA_TELA`, `RESPONS_RESERVA_TELA`) VALUES
(1, 'Tela_com_tripe_uni1', '2017-10-30', '1_horario_mat_tela', 'Anderson '),
(2, 'Tela_com_tripe_uni2', '2017-10-31', '2_horario_mat_tela', 'Samuel ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auditorioreserva`
--
ALTER TABLE `auditorioreserva`
  ADD PRIMARY KEY (`ID_RESERVA_AUDITORIO`);

--
-- Indexes for table `cabo_hdmi_reserva`
--
ALTER TABLE `cabo_hdmi_reserva`
  ADD PRIMARY KEY (`ID_RESERVA_CABO`);

--
-- Indexes for table `cadastro_controle_tablet`
--
ALTER TABLE `cadastro_controle_tablet`
  ADD PRIMARY KEY (`ID_CONTROLE`);

--
-- Indexes for table `conversor_vga_reserva`
--
ALTER TABLE `conversor_vga_reserva`
  ADD PRIMARY KEY (`ID_RESERVA_CONVERSOR`);

--
-- Indexes for table `datashowreserva`
--
ALTER TABLE `datashowreserva`
  ADD PRIMARY KEY (`ID_RESERVA`);

--
-- Indexes for table `geolabreserva`
--
ALTER TABLE `geolabreserva`
  ADD PRIMARY KEY (`ID_RESERVA_GEOLAB`);

--
-- Indexes for table `lab02reserva`
--
ALTER TABLE `lab02reserva`
  ADD PRIMARY KEY (`ID_RESERVA_LAB02`);

--
-- Indexes for table `lab04reserva`
--
ALTER TABLE `lab04reserva`
  ADD PRIMARY KEY (`ID_RESERVA_LAB04`);

--
-- Indexes for table `lab06reserva`
--
ALTER TABLE `lab06reserva`
  ADD PRIMARY KEY (`ID_RESERVA_LAB06`);

--
-- Indexes for table `lab08reserva`
--
ALTER TABLE `lab08reserva`
  ADD PRIMARY KEY (`ID_RESERVA_LAB08`);

--
-- Indexes for table `lab_fotografia_reserva`
--
ALTER TABLE `lab_fotografia_reserva`
  ADD PRIMARY KEY (`ID_RESERVA_LABFOTO`);

--
-- Indexes for table `lab_redes_reserva`
--
ALTER TABLE `lab_redes_reserva`
  ADD PRIMARY KEY (`ID_RESERVA_LAB_REDES`);

--
-- Indexes for table `microfonereserva`
--
ALTER TABLE `microfonereserva`
  ADD PRIMARY KEY (`ID_RESERVA_MICROFONE`);

--
-- Indexes for table `notebookreserva`
--
ALTER TABLE `notebookreserva`
  ADD PRIMARY KEY (`ID_RESERVA_NOTE`);

--
-- Indexes for table `retroprojetorreserva`
--
ALTER TABLE `retroprojetorreserva`
  ADD PRIMARY KEY (`ID_RESERVA_RETRO`);

--
-- Indexes for table `sala704reserva`
--
ALTER TABLE `sala704reserva`
  ADD PRIMARY KEY (`ID_RESERVA_SALA704`);

--
-- Indexes for table `sala707reserva`
--
ALTER TABLE `sala707reserva`
  ADD PRIMARY KEY (`ID_RESERVA_SALA707`);

--
-- Indexes for table `sala708reserva`
--
ALTER TABLE `sala708reserva`
  ADD PRIMARY KEY (`ID_RESERVA_SALA708`);

--
-- Indexes for table `telareserva`
--
ALTER TABLE `telareserva`
  ADD PRIMARY KEY (`ID_RESERVA_TELA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auditorioreserva`
--
ALTER TABLE `auditorioreserva`
  MODIFY `ID_RESERVA_AUDITORIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cabo_hdmi_reserva`
--
ALTER TABLE `cabo_hdmi_reserva`
  MODIFY `ID_RESERVA_CABO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cadastro_controle_tablet`
--
ALTER TABLE `cadastro_controle_tablet`
  MODIFY `ID_CONTROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `conversor_vga_reserva`
--
ALTER TABLE `conversor_vga_reserva`
  MODIFY `ID_RESERVA_CONVERSOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `datashowreserva`
--
ALTER TABLE `datashowreserva`
  MODIFY `ID_RESERVA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `geolabreserva`
--
ALTER TABLE `geolabreserva`
  MODIFY `ID_RESERVA_GEOLAB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lab02reserva`
--
ALTER TABLE `lab02reserva`
  MODIFY `ID_RESERVA_LAB02` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lab04reserva`
--
ALTER TABLE `lab04reserva`
  MODIFY `ID_RESERVA_LAB04` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lab06reserva`
--
ALTER TABLE `lab06reserva`
  MODIFY `ID_RESERVA_LAB06` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lab08reserva`
--
ALTER TABLE `lab08reserva`
  MODIFY `ID_RESERVA_LAB08` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lab_fotografia_reserva`
--
ALTER TABLE `lab_fotografia_reserva`
  MODIFY `ID_RESERVA_LABFOTO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lab_redes_reserva`
--
ALTER TABLE `lab_redes_reserva`
  MODIFY `ID_RESERVA_LAB_REDES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `microfonereserva`
--
ALTER TABLE `microfonereserva`
  MODIFY `ID_RESERVA_MICROFONE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notebookreserva`
--
ALTER TABLE `notebookreserva`
  MODIFY `ID_RESERVA_NOTE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retroprojetorreserva`
--
ALTER TABLE `retroprojetorreserva`
  MODIFY `ID_RESERVA_RETRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `sala704reserva`
--
ALTER TABLE `sala704reserva`
  MODIFY `ID_RESERVA_SALA704` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sala707reserva`
--
ALTER TABLE `sala707reserva`
  MODIFY `ID_RESERVA_SALA707` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sala708reserva`
--
ALTER TABLE `sala708reserva`
  MODIFY `ID_RESERVA_SALA708` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `telareserva`
--
ALTER TABLE `telareserva`
  MODIFY `ID_RESERVA_TELA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
