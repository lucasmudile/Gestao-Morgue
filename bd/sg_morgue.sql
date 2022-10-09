-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2021 at 08:17 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sg_morgue`
--

-- --------------------------------------------------------

--
-- Table structure for table `cadaver`
--

DROP TABLE IF EXISTS `cadaver`;
CREATE TABLE IF NOT EXISTS `cadaver` (
  `id_cadaver` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `sexo` char(11) DEFAULT NULL,
  `data_de_nascimento` date DEFAULT NULL,
  `residente` varchar(50) DEFAULT NULL,
  `nome_do_pai` varchar(50) DEFAULT NULL,
  `nome_da_mae` varchar(50) DEFAULT NULL,
  `bi` varchar(45) DEFAULT NULL,
  `id_grau_parentesco` int DEFAULT NULL,
  `testemunha_familiar` varchar(45) DEFAULT NULL,
  `bi_testemunha_familiar` varchar(45) DEFAULT NULL,
  `testemunha_responsavel` varchar(45) DEFAULT NULL,
  `contacto` varchar(13) DEFAULT NULL,
  `id_proveniencia_` int DEFAULT NULL,
  `id_gaveta_` int DEFAULT NULL,
  `id_usuario_` int DEFAULT NULL,
  `_id_camara` int DEFAULT NULL,
  `statu` varchar(20) DEFAULT NULL,
  `data_registo` date DEFAULT NULL,
  PRIMARY KEY (`id_cadaver`),
  KEY `id_grau_parentesco_idx` (`id_grau_parentesco`)
) ;

--
-- Dumping data for table `cadaver`
--

INSERT INTO `cadaver` (`id_cadaver`, `nome`, `sexo`, `data_de_nascimento`, `residente`, `nome_do_pai`, `nome_da_mae`, `bi`, `id_grau_parentesco`, `testemunha_familiar`, `bi_testemunha_familiar`, `testemunha_responsavel`, `contacto`, `id_proveniencia_`, `id_gaveta_`, `id_usuario_`, `_id_camara`, `statu`, `data_registo`) VALUES
(6, 'Lucas xxxxxxxxxx xxxxxxxxxxx', 'Masculino', '2020-05-26', 'Prenda', 'Mamy', 'Miranda', '123', 5, 'Teste2', '1234', 'test2', '93299988', 1, 2, 1, 2, 'Depositado', '2021-05-30'),
(7, 'Kudikeba Miguel', 'Masculino', '2021-05-30', 'Rocha', 'Feio', 'Bonita', '1234', 4, 'Resumo', '12345', 'França', '93299988', 3, 1, 1, 1, 'Levantado', '2021-06-13'),
(8, 'Taitó Miguel', 'Masculino', '2000-06-13', 'Qwerty', 'ata', 'Miranda', '123', 4, 'Resumo', '123456', 'test', '93299988', 2, 2, 1, 2, 'Levantado', '2021-06-13'),
(9, 'Sev', 'Masculino', '2021-06-13', 'mm', 'm', 'm', '23', 5, '1', '12', '1', '1', 1, 2, 1, 2, 'Depositado', '2021-06-13'),
(10, 'm', 'Masculino', '2021-06-01', 'm', 'n', 'n', 'm', 5, 'mmm', NULL, 'mmm', '938', 1, 2, 1, 2, 'Depositado', '2021-06-14'),
(11, 'Man', 'Masculino', '2021-06-22', '12', 'm', 'M', '12', 5, 'Ma', NULL, 'Ma', '938', 1, 2, 1, 2, 'Depositado', '2021-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `camara`
--

DROP TABLE IF EXISTS `camara`;
CREATE TABLE IF NOT EXISTS `camara` (
  `idcamara` int NOT NULL AUTO_INCREMENT,
  `referencia` varchar(20) DEFAULT NULL,
  `n_gaveta_total` int DEFAULT NULL,
  `n_gaveta_ocupada` int DEFAULT NULL,
  PRIMARY KEY (`idcamara`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camara`
--

INSERT INTO `camara` (`idcamara`, `referencia`, `n_gaveta_total`, `n_gaveta_ocupada`) VALUES
(1, 'Camara-1', 2, 0),
(2, 'Camara-2', 10, 0),
(3, 'Camara-3', 20, 0),
(4, 'Camara-4', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `funcao`
--

DROP TABLE IF EXISTS `funcao`;
CREATE TABLE IF NOT EXISTS `funcao` (
  `idfuncao` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfuncao`),
  UNIQUE KEY `idfuncao_UNIQUE` (`idfuncao`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funcao`
--

INSERT INTO `funcao` (`idfuncao`, `descricao`) VALUES
(1, 'Director(a)'),
(2, 'Secretário(a)'),
(3, 'Gerente');

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `idfuncionario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `bi` varchar(45) DEFAULT NULL,
  `morada` varchar(45) DEFAULT NULL,
  `telefone` int DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `id_funcao` int DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `data_actualizacao` date DEFAULT NULL,
  PRIMARY KEY (`idfuncionario`),
  UNIQUE KEY `idfuncionario_UNIQUE` (`idfuncionario`),
  KEY `id_funcao_idx` (`id_funcao`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`idfuncionario`, `nome`, `bi`, `morada`, `telefone`, `sexo`, `id_funcao`, `data_cadastro`, `data_actualizacao`) VALUES
(2, 'Wilma', '123', 'Rocha', 938992431, 'Femenino', 2, '2021-05-29', '2021-05-29'),
(3, 'Yana', '1234', 'Prenda', 938992431, 'Masculino', 1, '2021-05-29', '2021-05-29'),
(4, 'Kudikeba Miguel', '123', 'Morro da Luz', 938992431, 'Masculino', 1, '2021-05-29', '2021-05-29'),
(6, 'Seven', '8988989', 'M', 9788778, 'Masculino', 1, '2021-06-02', '2021-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `gaveta`
--

DROP TABLE IF EXISTS `gaveta`;
CREATE TABLE IF NOT EXISTS `gaveta` (
  `idgaveta` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(20) NOT NULL,
  `id_camara` int DEFAULT NULL,
  `statu` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idgaveta`),
  UNIQUE KEY `idgaveta_UNIQUE` (`idgaveta`),
  KEY `id_camara_idx` (`id_camara`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaveta`
--

INSERT INTO `gaveta` (`idgaveta`, `numero`, `id_camara`, `statu`) VALUES
(1, 'Gaveta-10', 1, 'Activo'),
(2, 'Gaveta-2', 2, 'Activo'),
(3, 'Gaveta-3', 3, 'Activo'),
(4, 'Gaveta-2', 1, 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `grau_parentestico`
--

DROP TABLE IF EXISTS `grau_parentestico`;
CREATE TABLE IF NOT EXISTS `grau_parentestico` (
  `idgrau_parentestico` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idgrau_parentestico`),
  UNIQUE KEY `idgrau_parentestico_UNIQUE` (`idgrau_parentestico`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grau_parentestico`
--

INSERT INTO `grau_parentestico` (`idgrau_parentestico`, `descricao`) VALUES
(1, 'Pai'),
(2, 'Mãe'),
(3, 'Tio(a)'),
(4, 'Filho(a)'),
(5, 'Avo(a)'),
(6, 'Neto(a)');

-- --------------------------------------------------------

--
-- Table structure for table `levantamento`
--

DROP TABLE IF EXISTS `levantamento`;
CREATE TABLE IF NOT EXISTS `levantamento` (
  `idlevantamento` int NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `id_grauparentesco` int NOT NULL,
  `testemunha_familiar` varchar(50) DEFAULT NULL,
  `contacto` int DEFAULT NULL,
  `id_cadaver_` int DEFAULT NULL,
  `id_funcionario_` int DEFAULT NULL,
  PRIMARY KEY (`idlevantamento`),
  UNIQUE KEY `idlevantamento_UNIQUE` (`idlevantamento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levantamento`
--

INSERT INTO `levantamento` (`idlevantamento`, `data`, `id_grauparentesco`, `testemunha_familiar`, `contacto`, `id_cadaver_`, `id_funcionario_`) VALUES
(1, '2021-06-13 13:55:35', 4, 'Lucas', 938929239, 7, 1),
(3, '2021-06-13 16:31:59', 5, 'Santana', 93299988, 8, 1),
(5, '2021-06-15 19:18:20', 5, 'm', 9, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permicao`
--

DROP TABLE IF EXISTS `permicao`;
CREATE TABLE IF NOT EXISTS `permicao` (
  `idpermicao` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpermicao`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permicao`
--

INSERT INTO `permicao` (`idpermicao`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `proveniencia`
--

DROP TABLE IF EXISTS `proveniencia`;
CREATE TABLE IF NOT EXISTS `proveniencia` (
  `idproveniencia` int NOT NULL AUTO_INCREMENT,
  `local` varchar(50) NOT NULL,
  PRIMARY KEY (`idproveniencia`),
  UNIQUE KEY `idproveniencia_UNIQUE` (`idproveniencia`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proveniencia`
--

INSERT INTO `proveniencia` (`idproveniencia`, `local`) VALUES
(1, 'Rua'),
(2, 'Casa'),
(3, 'Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `id_permicao` int DEFAULT NULL,
  `id_funcionario` int DEFAULT NULL,
  `statu` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `idusuario_UNIQUE` (`idusuario`),
  KEY `id_funcionario_idx` (`id_funcionario`),
  KEY `id_permicao_idx` (`id_permicao`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `senha`, `id_permicao`, `id_funcionario`, `statu`) VALUES
(1, 'Lucas Santana', '202cb962ac59075b964b07152d234b70', 1, 2, 'Activo'),
(5, 'Yana', '202cb962ac59075b964b07152d234b70', 1, 2, 'Activo');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_cadaver`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_cadaver`;
CREATE TABLE IF NOT EXISTS `view_cadaver` (
`_id_camara` int
,`bi` varchar(45)
,`bi_testemunha_familiar` varchar(45)
,`camara` varchar(20)
,`contacto` varchar(13)
,`data_de_nascimento` date
,`data_registo` date
,`funcionario` varchar(50)
,`gaveta` varchar(20)
,`grau_parentesco` varchar(45)
,`id_cadaver` int
,`id_gaveta_` int
,`id_grau_parentesco` int
,`id_proveniencia_` int
,`id_usuario_` int
,`local_proveniencia` varchar(50)
,`nome` varchar(50)
,`nome_da_mae` varchar(50)
,`nome_do_pai` varchar(50)
,`residente` varchar(50)
,`sexo` char(11)
,`statu` varchar(20)
,`testemunha_familiar` varchar(45)
,`testemunha_responsavel` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_gaveta`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_gaveta`;
CREATE TABLE IF NOT EXISTS `view_gaveta` (
`idcamara` int
,`idgaveta` int
,`numero` varchar(20)
,`referencia` varchar(20)
,`statu` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_grafico_deposito`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_grafico_deposito`;
CREATE TABLE IF NOT EXISTS `view_grafico_deposito` (
`Abril` bigint
,`Agosto` bigint
,`Dezembro` bigint
,`Fevereiro` bigint
,`Janeiro` bigint
,`Julho` bigint
,`Junho` bigint
,`Maio` bigint
,`Marco` bigint
,`Novembro` bigint
,`Outubro` bigint
,`Setembro` bigint
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_grafico_diairo_levantado`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_grafico_diairo_levantado`;
CREATE TABLE IF NOT EXISTS `view_grafico_diairo_levantado` (
`hoje` bigint
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_grafico_diario_deposito`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_grafico_diario_deposito`;
CREATE TABLE IF NOT EXISTS `view_grafico_diario_deposito` (
`hoje` bigint
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_grafico_levantamento`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_grafico_levantamento`;
CREATE TABLE IF NOT EXISTS `view_grafico_levantamento` (
`Abril` bigint
,`Agosto` bigint
,`Dezembro` bigint
,`Fevereiro` bigint
,`Janeiro` bigint
,`Julho` bigint
,`Junho` bigint
,`Maio` bigint
,`Marco` bigint
,`Novembro` bigint
,`Outubro` bigint
,`Setembro` bigint
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_levantamento`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_levantamento`;
CREATE TABLE IF NOT EXISTS `view_levantamento` (
`contacto` int
,`data` datetime
,`falecido` varchar(50)
,`funcionario` varchar(50)
,`id_cadaver_` int
,`id_funcionario_` int
,`id_grauparentesco` int
,`parentesco` varchar(45)
,`testemunha_familiar` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_nao_usuario`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_nao_usuario`;
CREATE TABLE IF NOT EXISTS `view_nao_usuario` (
`bi` varchar(45)
,`data_actualizacao` date
,`data_cadastro` date
,`id_funcao` int
,`idfuncionario` int
,`morada` varchar(45)
,`nome` varchar(45)
,`sexo` varchar(45)
,`telefone` int
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_usuario`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_usuario`;
CREATE TABLE IF NOT EXISTS `view_usuario` (
`funcionario` varchar(45)
,`id_funcionario` int
,`id_permicao` int
,`idusuario` int
,`nivel` varchar(45)
,`senha` varchar(50)
,`statu` varchar(20)
,`usuario` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view_cadaver`
--
DROP TABLE IF EXISTS `view_cadaver`;

DROP VIEW IF EXISTS `view_cadaver`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_cadaver`  AS  select `c`.`id_cadaver` AS `id_cadaver`,`c`.`nome` AS `nome`,`c`.`sexo` AS `sexo`,`c`.`data_de_nascimento` AS `data_de_nascimento`,`c`.`residente` AS `residente`,`c`.`nome_do_pai` AS `nome_do_pai`,`c`.`nome_da_mae` AS `nome_da_mae`,`c`.`bi` AS `bi`,`c`.`id_grau_parentesco` AS `id_grau_parentesco`,`g`.`descricao` AS `grau_parentesco`,`c`.`testemunha_familiar` AS `testemunha_familiar`,`c`.`bi_testemunha_familiar` AS `bi_testemunha_familiar`,`c`.`testemunha_responsavel` AS `testemunha_responsavel`,`c`.`contacto` AS `contacto`,`c`.`id_proveniencia_` AS `id_proveniencia_`,`p`.`local` AS `local_proveniencia`,`c`.`id_gaveta_` AS `id_gaveta_`,`ga`.`numero` AS `gaveta`,`c`.`id_usuario_` AS `id_usuario_`,`u`.`usuario` AS `funcionario`,`c`.`_id_camara` AS `_id_camara`,`ca`.`referencia` AS `camara`,`c`.`statu` AS `statu`,`c`.`data_registo` AS `data_registo` from (((((`cadaver` `c` join `grau_parentestico` `g` on((`c`.`id_grau_parentesco` = `g`.`idgrau_parentestico`))) join `proveniencia` `p` on((`c`.`id_proveniencia_` = `p`.`idproveniencia`))) join `gaveta` `ga` on((`c`.`id_gaveta_` = `ga`.`idgaveta`))) join `usuario` `u` on((`c`.`id_usuario_` = `u`.`idusuario`))) join `camara` `ca` on((`c`.`_id_camara` = `ca`.`idcamara`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_gaveta`
--
DROP TABLE IF EXISTS `view_gaveta`;

DROP VIEW IF EXISTS `view_gaveta`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_gaveta`  AS  select `gaveta`.`idgaveta` AS `idgaveta`,`gaveta`.`numero` AS `numero`,`camara`.`idcamara` AS `idcamara`,`camara`.`referencia` AS `referencia`,`gaveta`.`statu` AS `statu` from (`gaveta` join `camara` on((`camara`.`idcamara` = `gaveta`.`id_camara`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_grafico_deposito`
--
DROP TABLE IF EXISTS `view_grafico_deposito`;

DROP VIEW IF EXISTS `view_grafico_deposito`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_grafico_deposito`  AS  select (select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 1) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Janeiro`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 2) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Fevereiro`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 3) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Marco`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 4) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Abril`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 5) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Maio`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 6) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Junho`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 7) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Julho`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 8) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Agosto`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 9) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Setembro`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 10) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Outubro`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 11) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Novembro`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 12) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Dezembro` ;

-- --------------------------------------------------------

--
-- Structure for view `view_grafico_diairo_levantado`
--
DROP TABLE IF EXISTS `view_grafico_diairo_levantado`;

DROP VIEW IF EXISTS `view_grafico_diairo_levantado`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_grafico_diairo_levantado`  AS  select (select count(`levantamento`.`idlevantamento`) from `levantamento` where (dayofmonth(`levantamento`.`data`) = dayofmonth(now()))) AS `hoje` ;

-- --------------------------------------------------------

--
-- Structure for view `view_grafico_diario_deposito`
--
DROP TABLE IF EXISTS `view_grafico_diario_deposito`;

DROP VIEW IF EXISTS `view_grafico_diario_deposito`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_grafico_diario_deposito`  AS  select (select count(`cadaver`.`id_cadaver`) from `cadaver` where ((dayofmonth(`cadaver`.`data_registo`) = dayofmonth(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `hoje` ;

-- --------------------------------------------------------

--
-- Structure for view `view_grafico_levantamento`
--
DROP TABLE IF EXISTS `view_grafico_levantamento`;

DROP VIEW IF EXISTS `view_grafico_levantamento`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_grafico_levantamento`  AS  select (select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 1) and (year(`levantamento`.`data`) = year(now())))) AS `Janeiro`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 2) and (year(`levantamento`.`data`) = year(now())))) AS `Fevereiro`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 3) and (year(`levantamento`.`data`) = year(now())))) AS `Marco`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 4) and (year(`levantamento`.`data`) = year(now())))) AS `Abril`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 5) and (year(`levantamento`.`data`) = year(now())))) AS `Maio`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 6) and (year(`levantamento`.`data`) = year(now())))) AS `Junho`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 7) and (year(`levantamento`.`data`) = year(now())))) AS `Julho`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 8) and (year(`levantamento`.`data`) = year(now())))) AS `Agosto`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 9) and (year(`levantamento`.`data`) = year(now())))) AS `Setembro`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 10) and (year(`levantamento`.`data`) = year(now())))) AS `Outubro`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 11) and (year(`levantamento`.`data`) = year(now())))) AS `Novembro`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 12) and (year(`levantamento`.`data`) = year(now())))) AS `Dezembro` ;

-- --------------------------------------------------------

--
-- Structure for view `view_levantamento`
--
DROP TABLE IF EXISTS `view_levantamento`;

DROP VIEW IF EXISTS `view_levantamento`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_levantamento`  AS  select `levantamento`.`id_cadaver_` AS `id_cadaver_`,`cadaver`.`nome` AS `falecido`,`levantamento`.`data` AS `data`,`levantamento`.`id_grauparentesco` AS `id_grauparentesco`,`grau_parentestico`.`descricao` AS `parentesco`,`levantamento`.`testemunha_familiar` AS `testemunha_familiar`,`levantamento`.`contacto` AS `contacto`,`levantamento`.`id_funcionario_` AS `id_funcionario_`,`usuario`.`usuario` AS `funcionario` from (((`levantamento` join `cadaver` on((`cadaver`.`id_cadaver` = `levantamento`.`id_cadaver_`))) join `grau_parentestico` on((`grau_parentestico`.`idgrau_parentestico` = `levantamento`.`id_grauparentesco`))) join `usuario` on((`usuario`.`idusuario` = `levantamento`.`id_funcionario_`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_nao_usuario`
--
DROP TABLE IF EXISTS `view_nao_usuario`;

DROP VIEW IF EXISTS `view_nao_usuario`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nao_usuario`  AS  select `funcionario`.`idfuncionario` AS `idfuncionario`,`funcionario`.`nome` AS `nome`,`funcionario`.`bi` AS `bi`,`funcionario`.`morada` AS `morada`,`funcionario`.`telefone` AS `telefone`,`funcionario`.`sexo` AS `sexo`,`funcionario`.`id_funcao` AS `id_funcao`,`funcionario`.`data_cadastro` AS `data_cadastro`,`funcionario`.`data_actualizacao` AS `data_actualizacao` from `funcionario` where `funcionario`.`idfuncionario` in (select `usuario`.`id_funcionario` from `usuario`) is false ;

-- --------------------------------------------------------

--
-- Structure for view `view_usuario`
--
DROP TABLE IF EXISTS `view_usuario`;

DROP VIEW IF EXISTS `view_usuario`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuario`  AS  select `usuario`.`idusuario` AS `idusuario`,`usuario`.`usuario` AS `usuario`,`usuario`.`senha` AS `senha`,`usuario`.`id_permicao` AS `id_permicao`,`permicao`.`descricao` AS `nivel`,`usuario`.`id_funcionario` AS `id_funcionario`,`funcionario`.`nome` AS `funcionario`,`usuario`.`statu` AS `statu` from ((`usuario` join `permicao` on((`usuario`.`id_permicao` = `permicao`.`idpermicao`))) join `funcionario` on((`usuario`.`id_funcionario` = `funcionario`.`idfuncionario`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `id_funcao` FOREIGN KEY (`id_funcao`) REFERENCES `funcao` (`idfuncao`);

--
-- Constraints for table `gaveta`
--
ALTER TABLE `gaveta`
  ADD CONSTRAINT `id_camara` FOREIGN KEY (`id_camara`) REFERENCES `camara` (`idcamara`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `id_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`idfuncionario`),
  ADD CONSTRAINT `id_permicao` FOREIGN KEY (`id_permicao`) REFERENCES `permicao` (`idpermicao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
