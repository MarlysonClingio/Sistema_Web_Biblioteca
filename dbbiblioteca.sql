-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Nov-2020 às 00:45
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT;
SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS;
SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION;
SET NAMES utf8mb4;

--
-- Database: `dbbiblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbacervo`
--

CREATE TABLE `tbacervo` (
  `id_acervo` int(11) UNSIGNED NOT NULL,
  `isbn` varchar(13) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `titulo` varchar(80) DEFAULT NULL,
  `ano_publicacao` int(4) DEFAULT NULL,
  `editora` varchar(30) DEFAULT NULL,
  `npaginas` int(11) DEFAULT NULL,
  `exemplar` int(2) DEFAULT NULL,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbacervo`
--

INSERT INTO `tbacervo` (`id_acervo`, `isbn`, `autor`, `titulo`, `ano_publicacao`, `editora`, `npaginas`, `exemplar`, `status`) VALUES
(1, '7978454', 'MACHADO DE ASSISS', 'DOM CASMURROS', 1988, 'ABRIL', 160, 2, 'e'),
(2, '78798110', 'DAN BROWN', 'A Volta dos Que não Puderam ir.', 2002, 'ATICA', 200, 10, 'e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbempdev`
--

CREATE TABLE `tbempdev` (
  `id_empdev` int(11) UNSIGNED NOT NULL,
  `id_acervo` int(11) UNSIGNED NOT NULL,
  `id_leitor` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `data_dev` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbempdev`
--

INSERT INTO `tbempdev` (`id_empdev`, `id_acervo`, `id_leitor`, `id_usuario`, `data`, `hora`, `data_dev`) VALUES
(1, 1, 2, 2, '2020-11-01', '14:59:57', NULL),
(2, 2, 1, 3, '2020-10-11', '07:18:00', NULL),
(3, 2, 1, 1, '2020-11-08', '08:19:18', NULL);

--
-- Acionadores `tbempdev`
--
DELIMITER $$
CREATE TRIGGER `atualiza_acervo_ao_excluir` AFTER DELETE ON `tbempdev` FOR EACH ROW Update tbacervo set status = 'd' where tbacervo.id_acervo = OLD.id_acervo and old.data_dev is null
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `atualiza_acervo_devolucao` AFTER UPDATE ON `tbempdev` FOR EACH ROW Update tbacervo set status = 'd' where tbacervo.id_acervo = NEW.id_acervo and NEW.data_dev is not null
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `atualizar_acervo_ao_emprestar` AFTER INSERT ON `tbempdev` FOR EACH ROW Update tbacervo set status = 'e' where tbacervo.id_acervo = NEW.id_acervo
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbleitor`
--

CREATE TABLE `tbleitor` (
  `id_leitor` int(11) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nascimento` date DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `fone` varchar(14) DEFAULT NULL,
  `rua` varchar(30) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbleitor`
--

INSERT INTO `tbleitor` (`id_leitor`, `nome`, `nascimento`, `cpf`, `sexo`, `fone`, `rua`, `numero`, `bairro`, `cidade`, `email`) VALUES
(1, 'EXPEDITO CORDEIRO', '1984-05-08', '12455623211', 'M', '8856565666', 'Cento e Dezoito', '560', 'Timbó', 'Maracanaú', 'expedito.cordeiro@fadam.edu.br'),
(2, 'JOÃO SILVA', '2000-11-17', '05731824963', 'M', '85988895834', 'Trinta e Nove', '1459', 'Jereissati I', 'Maracanaú', 'JoaoS@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(1, 'admin', 'admin@admin.com', 'admin12345'),
(2, 'Atendente01', 'atendente01@atendente01.com.br', 'atendente01234'),
(3, 'Usuario02', 'usuario02@usuario02.com.br', 'usuario02345');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vempdev`
-- (See below for the actual view)
--
CREATE TABLE `vempdev` (
`id_empdev` int(11) unsigned
,`leitor` varchar(50)
,`titulo` varchar(80)
,`usuario` varchar(50)
,`data` date
,`hora` time
,`data_dev` date
);

-- --------------------------------------------------------

--
-- Structure for view `vempdev`
--
DROP TABLE IF EXISTS `vempdev`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vempdev`  AS  select `tbempdev`.`id_empdev` AS `id_empdev`,`tbleitor`.`nome` AS `leitor`,`tbacervo`.`titulo` AS `titulo`,`tbusuario`.`nome` AS `usuario`,`tbempdev`.`data` AS `data`,`tbempdev`.`hora` AS `hora`,`tbempdev`.`data_dev` AS `data_dev` from (((`tbempdev` join `tbleitor` on((`tbleitor`.`id_leitor` = `tbempdev`.`id_leitor`))) join `tbacervo` on((`tbacervo`.`id_acervo` = `tbempdev`.`id_acervo`))) join `tbusuario` on((`tbusuario`.`id_usuario` = `tbempdev`.`id_usuario`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbacervo`
--
ALTER TABLE `tbacervo`
  ADD PRIMARY KEY (`id_acervo`);

--
-- Indexes for table `tbempdev`
--
ALTER TABLE `tbempdev`
  ADD PRIMARY KEY (`id_empdev`),
  ADD KEY `fk_acervo` (`id_acervo`),
  ADD KEY `fk_leitor` (`id_leitor`),
  ADD KEY `fk_usuario` (`id_usuario`);

--
-- Indexes for table `tbleitor`
--
ALTER TABLE `tbleitor`
  ADD PRIMARY KEY (`id_leitor`);

--
-- Indexes for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbacervo`
--
ALTER TABLE `tbacervo`
  MODIFY `id_acervo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbempdev`
--
ALTER TABLE `tbempdev`
  MODIFY `id_empdev` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbleitor`
--
ALTER TABLE `tbleitor`
  MODIFY `id_leitor` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `id_usuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbempdev`
--
ALTER TABLE `tbempdev`
  ADD CONSTRAINT `fk_acervo` FOREIGN KEY (`id_acervo`) REFERENCES `tbacervo` (`id_acervo`),
  ADD CONSTRAINT `fk_leitor` FOREIGN KEY (`id_leitor`) REFERENCES `tbleitor` (`id_leitor`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tbusuario` (`id_usuario`);
COMMIT;

SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT;
SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS;
SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION;