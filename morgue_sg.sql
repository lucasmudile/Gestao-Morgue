-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Set-2021 às 14:46
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `morgue_sg`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autopsia`
--

CREATE TABLE `autopsia` (
  `idautopsia` int(11) NOT NULL,
  `id_cadaver` int(11) DEFAULT NULL,
  `id_sala_autopsia` int(11) DEFAULT NULL,
  `obs` varchar(100) DEFAULT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autopsia`
--

INSERT INTO `autopsia` (`idautopsia`, `id_cadaver`, `id_sala_autopsia`, `obs`, `data`) VALUES
(2, 9, 4, 'cagou muito ola', '2021-08-28 10:54:10'),
(3, 9, 4, 'vivo ola', '2021-08-28 12:10:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadaver`
--

CREATE TABLE `cadaver` (
  `id_cadaver` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `sexo` char(11) COLLATE utf8_bin DEFAULT NULL,
  `data_de_nascimento` date DEFAULT NULL,
  `residente` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nome_do_pai` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nome_da_mae` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `bi` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `id_grau_parentesco` int(11) DEFAULT NULL,
  `testemunha_familiar` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `bi_testemunha_familiar` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `testemunha_responsavel` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `contacto` varchar(13) COLLATE utf8_bin DEFAULT NULL,
  `id_proveniencia_` int(11) DEFAULT NULL,
  `id_gaveta_` int(11) DEFAULT NULL,
  `id_usuario_` int(11) DEFAULT NULL,
  `_id_camara` int(11) DEFAULT NULL,
  `statu` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `data_registo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cadaver`
--

INSERT INTO `cadaver` (`id_cadaver`, `nome`, `sexo`, `data_de_nascimento`, `residente`, `nome_do_pai`, `nome_da_mae`, `bi`, `id_grau_parentesco`, `testemunha_familiar`, `bi_testemunha_familiar`, `testemunha_responsavel`, `contacto`, `id_proveniencia_`, `id_gaveta_`, `id_usuario_`, `_id_camara`, `statu`, `data_registo`) VALUES
(6, 'Lucas xxxxxxxxxx xxxxxxxxxxx', 'Masculino', '2020-05-26', 'Prenda', 'Mamy', 'Miranda', '123', 5, 'Teste2', '1234', 'test2', '93299988', 1, 3, 1, 3, 'Depositado', '2021-05-30'),
(7, 'Kudikeba Miguel', 'Masculino', '2021-05-30', 'Rocha', 'Feio', 'Bonita', '1234', 4, 'Resumo', '12345', 'França', '93299988', 3, 1, 1, 1, 'Levantado', '2021-06-13'),
(8, 'Taitó Miguel', 'Masculino', '2000-06-13', 'Qwerty', 'ata', 'Miranda', '123', 4, 'Resumo', '123456', 'test', '93299988', 2, 3, 1, 3, 'Levantado', '2021-06-13'),
(9, 'Sev', 'Masculino', '2021-06-13', 'mm', 'm', 'm', '23', 5, '1', '12', '1', '1', 1, 1, 1, 1, 'Depositado', '2021-06-13'),
(15, 'smajenje', 'Masculino', '2021-09-15', 'Rocha', 'n', 'Lu', '895623', 4, 'dodo', NULL, '9999999', '9999999', 1, 7, 1, 3, 'Depositado', '2021-09-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `camara`
--

CREATE TABLE `camara` (
  `idcamara` int(11) NOT NULL,
  `referencia` varchar(20) DEFAULT NULL,
  `n_gaveta_total` int(11) DEFAULT NULL,
  `n_gaveta_ocupada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `camara`
--

INSERT INTO `camara` (`idcamara`, `referencia`, `n_gaveta_total`, `n_gaveta_ocupada`) VALUES
(1, 'Camara-1', 2, 0),
(2, 'Camara-2', 10, 0),
(3, 'Camara-3', 20, 0),
(4, 'Camara-4', 10, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

CREATE TABLE `funcao` (
  `idfuncao` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcao`
--

INSERT INTO `funcao` (`idfuncao`, `descricao`) VALUES
(1, 'Director(a)'),
(2, 'Secretário(a)'),
(3, 'Gerente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idfuncionario` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `bi` varchar(45) DEFAULT NULL,
  `morada` varchar(45) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `id_funcao` int(11) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `data_actualizacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idfuncionario`, `nome`, `bi`, `morada`, `telefone`, `sexo`, `id_funcao`, `data_cadastro`, `data_actualizacao`) VALUES
(2, 'Wilma', '123', 'Rocha', 938992431, 'Femenino', 2, '2021-05-29', '2021-05-29'),
(3, 'Yana', '1234', 'Prenda', 938992431, 'Masculino', 1, '2021-05-29', '2021-05-29'),
(4, 'Kudikeba Miguel', '123', 'Morro da Luz', 938992431, 'Masculino', 1, '2021-05-29', '2021-05-29'),
(6, 'Seven', '8988989', 'M', 9788778, 'Masculino', 1, '2021-06-02', '2021-06-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gaveta`
--

CREATE TABLE `gaveta` (
  `idgaveta` int(11) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `id_camara` int(11) DEFAULT NULL,
  `statu` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gaveta`
--

INSERT INTO `gaveta` (`idgaveta`, `numero`, `id_camara`, `statu`) VALUES
(1, 'Gaveta-10', 1, 'Activo'),
(2, 'Gaveta-2', 2, 'Activo'),
(3, 'Gaveta-3', 3, 'Activo'),
(4, 'Gaveta-2', 1, 'Activo'),
(5, 'Gaveta-1', 4, 'Activo'),
(6, 'Gaveta-1', 3, 'Activo'),
(7, 'Gaveta-2', 3, 'Activo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grau_parentestico`
--

CREATE TABLE `grau_parentestico` (
  `idgrau_parentestico` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grau_parentestico`
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
-- Estrutura da tabela `levantamento`
--

CREATE TABLE `levantamento` (
  `idlevantamento` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `id_grauparentesco` int(11) NOT NULL,
  `testemunha_familiar` varchar(50) DEFAULT NULL,
  `contacto` int(11) DEFAULT NULL,
  `id_cadaver_` int(11) DEFAULT NULL,
  `id_funcionario_` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `levantamento`
--

INSERT INTO `levantamento` (`idlevantamento`, `data`, `id_grauparentesco`, `testemunha_familiar`, `contacto`, `id_cadaver_`, `id_funcionario_`) VALUES
(1, '2021-06-13 13:55:35', 4, 'Lucas', 938929239, 7, 1),
(3, '2021-06-13 16:31:59', 5, 'Santana', 93299988, 8, 1),
(5, '2021-06-15 19:18:20', 5, 'm', 9, 7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permicao`
--

CREATE TABLE `permicao` (
  `idpermicao` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `permicao`
--

INSERT INTO `permicao` (`idpermicao`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `proveniencia`
--

CREATE TABLE `proveniencia` (
  `idproveniencia` int(11) NOT NULL,
  `local` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `proveniencia`
--

INSERT INTO `proveniencia` (`idproveniencia`, `local`) VALUES
(1, 'Rua'),
(2, 'Casa'),
(3, 'Hospital');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala_autopsia`
--

CREATE TABLE `sala_autopsia` (
  `idsala_autopsia` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sala_autopsia`
--

INSERT INTO `sala_autopsia` (`idsala_autopsia`, `descricao`) VALUES
(2, 'Sala-7'),
(4, 'Sala-1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

CREATE TABLE `sistema` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`id`, `nome`, `data`) VALUES
(1, 'Morgue Lucas Santana', '2021-08-31 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transferencia`
--

CREATE TABLE `transferencia` (
  `idtransferencia` int(11) NOT NULL,
  `camara_origem` int(11) DEFAULT NULL,
  `camara_destino` int(11) DEFAULT NULL,
  `gaveta_origem` int(11) DEFAULT NULL,
  `gaveta_destino` int(11) DEFAULT NULL,
  `id_cadaver` int(11) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `data_actualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `transferencia`
--

INSERT INTO `transferencia` (`idtransferencia`, `camara_origem`, `camara_destino`, `gaveta_origem`, `gaveta_destino`, `id_cadaver`, `data`, `data_actualizacao`) VALUES
(1, 3, 1, 3, 1, 9, '2021-08-31 12:46:21', '2021-09-03 10:50:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `translacao`
--

CREATE TABLE `translacao` (
  `idtranslacao` int(11) NOT NULL,
  `id_cadaver` int(11) DEFAULT NULL,
  `id_proveniencia` int(11) DEFAULT NULL,
  `destino` varchar(45) DEFAULT NULL,
  `data_translacao` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `translacao`
--

INSERT INTO `translacao` (`idtranslacao`, `id_cadaver`, `id_proveniencia`, `destino`, `data_translacao`) VALUES
(2, 7, 1, 'Severino 7', '2021-08-31 16:53:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `id_permicao` int(11) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `statu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `senha`, `id_permicao`, `id_funcionario`, `statu`) VALUES
(1, 'Lucas Santana', '202cb962ac59075b964b07152d234b70', 1, 2, 'Activo'),
(5, 'Yana', '202cb962ac59075b964b07152d234b70', 1, 2, 'Inactivo');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_autopsia`
--
CREATE TABLE `view_autopsia` (
`parentesco` varchar(45)
,`id_cadaver` int(11)
,`nome` varchar(50)
,`sexo` char(11)
,`data_de_nascimento` date
,`residente` varchar(50)
,`nome_do_pai` varchar(50)
,`nome_da_mae` varchar(50)
,`bi` varchar(45)
,`id_grau_parentesco` int(11)
,`testemunha_familiar` varchar(45)
,`bi_testemunha_familiar` varchar(45)
,`testemunha_responsavel` varchar(45)
,`contacto` varchar(13)
,`id_proveniencia_` int(11)
,`id_gaveta_` int(11)
,`id_usuario_` int(11)
,`_id_camara` int(11)
,`statu` varchar(20)
,`data_registo` date
,`sala` varchar(45)
,`usuario` varchar(50)
,`local` varchar(50)
,`camara` varchar(20)
,`n_gaveta` varchar(20)
,`obs` varchar(100)
,`data` datetime
,`idautopsia` int(11)
,`idsala_autopsia` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_cadaver`
--
CREATE TABLE `view_cadaver` (
`id_cadaver` int(11)
,`nome` varchar(50)
,`sexo` char(11)
,`data_de_nascimento` date
,`residente` varchar(50)
,`nome_do_pai` varchar(50)
,`nome_da_mae` varchar(50)
,`bi` varchar(45)
,`id_grau_parentesco` int(11)
,`testemunha_familiar` varchar(45)
,`bi_testemunha_familiar` varchar(45)
,`testemunha_responsavel` varchar(45)
,`contacto` varchar(13)
,`id_proveniencia_` int(11)
,`id_gaveta_` int(11)
,`id_usuario_` int(11)
,`_id_camara` int(11)
,`statu` varchar(20)
,`data_registo` date
,`camara` varchar(20)
,`gaveta` varchar(20)
,`usuario` varchar(50)
,`local_proveniencia` varchar(50)
,`grau_parentesco` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_gaveta`
--
CREATE TABLE `view_gaveta` (
`idgaveta` int(11)
,`numero` varchar(20)
,`idcamara` int(11)
,`referencia` varchar(20)
,`statu` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_grafico_deposito`
--
CREATE TABLE `view_grafico_deposito` (
`Janeiro` bigint(21)
,`Fevereiro` bigint(21)
,`Marco` bigint(21)
,`Abril` bigint(21)
,`Maio` bigint(21)
,`Junho` bigint(21)
,`Julho` bigint(21)
,`Agosto` bigint(21)
,`Setembro` bigint(21)
,`Outubro` bigint(21)
,`Novembro` bigint(21)
,`Dezembro` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_grafico_diairo_levantado`
--
CREATE TABLE `view_grafico_diairo_levantado` (
`hoje` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_grafico_diario_deposito`
--
CREATE TABLE `view_grafico_diario_deposito` (
`hoje` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_grafico_levantamento`
--
CREATE TABLE `view_grafico_levantamento` (
`Janeiro` bigint(21)
,`Fevereiro` bigint(21)
,`Marco` bigint(21)
,`Abril` bigint(21)
,`Maio` bigint(21)
,`Junho` bigint(21)
,`Julho` bigint(21)
,`Agosto` bigint(21)
,`Setembro` bigint(21)
,`Outubro` bigint(21)
,`Novembro` bigint(21)
,`Dezembro` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_levantamento`
--
CREATE TABLE `view_levantamento` (
`id_cadaver_` int(11)
,`falecido` varchar(50)
,`data` datetime
,`id_grauparentesco` int(11)
,`parentesco` varchar(45)
,`testemunha_familiar` varchar(50)
,`contacto` int(11)
,`id_funcionario_` int(11)
,`funcionario` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_nao_usuario`
--
CREATE TABLE `view_nao_usuario` (
`idfuncionario` int(11)
,`nome` varchar(45)
,`bi` varchar(45)
,`morada` varchar(45)
,`telefone` int(11)
,`sexo` varchar(45)
,`id_funcao` int(11)
,`data_cadastro` date
,`data_actualizacao` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transferencia`
--
CREATE TABLE `view_transferencia` (
`idtransferencia` int(11)
,`camara_origem` int(11)
,`camara_destino` int(11)
,`gaveta_origem` int(11)
,`gaveta_destino` int(11)
,`id_cadaver` int(11)
,`data` datetime
,`nome` varchar(50)
,`camara_or` varchar(20)
,`camara_des` varchar(20)
,`gaveta_or` varchar(20)
,`gaveta_des` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transladacao`
--
CREATE TABLE `view_transladacao` (
`nome` varchar(50)
,`hospital` varchar(50)
,`destino` varchar(45)
,`data_translacao` datetime
,`id_cadaver` int(11)
,`idtranslacao` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_usuario`
--
CREATE TABLE `view_usuario` (
`idusuario` int(11)
,`usuario` varchar(50)
,`senha` varchar(50)
,`id_permicao` int(11)
,`nivel` varchar(45)
,`id_funcionario` int(11)
,`funcionario` varchar(45)
,`statu` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `view_autopsia`
--
DROP TABLE IF EXISTS `view_autopsia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_autopsia`  AS  select `gp`.`descricao` AS `parentesco`,`c`.`id_cadaver` AS `id_cadaver`,`c`.`nome` AS `nome`,`c`.`sexo` AS `sexo`,`c`.`data_de_nascimento` AS `data_de_nascimento`,`c`.`residente` AS `residente`,`c`.`nome_do_pai` AS `nome_do_pai`,`c`.`nome_da_mae` AS `nome_da_mae`,`c`.`bi` AS `bi`,`c`.`id_grau_parentesco` AS `id_grau_parentesco`,`c`.`testemunha_familiar` AS `testemunha_familiar`,`c`.`bi_testemunha_familiar` AS `bi_testemunha_familiar`,`c`.`testemunha_responsavel` AS `testemunha_responsavel`,`c`.`contacto` AS `contacto`,`c`.`id_proveniencia_` AS `id_proveniencia_`,`c`.`id_gaveta_` AS `id_gaveta_`,`c`.`id_usuario_` AS `id_usuario_`,`c`.`_id_camara` AS `_id_camara`,`c`.`statu` AS `statu`,`c`.`data_registo` AS `data_registo`,`sl`.`descricao` AS `sala`,`us`.`usuario` AS `usuario`,`pro`.`local` AS `local`,`cm`.`referencia` AS `camara`,`gv`.`numero` AS `n_gaveta`,`aut`.`obs` AS `obs`,`aut`.`data` AS `data`,`aut`.`idautopsia` AS `idautopsia`,`sl`.`idsala_autopsia` AS `idsala_autopsia` from (((((((`autopsia` `aut` join `cadaver` `c` on((`c`.`id_cadaver` = `aut`.`id_cadaver`))) join `sala_autopsia` `sl` on((`aut`.`id_sala_autopsia` = `sl`.`idsala_autopsia`))) join `grau_parentestico` `gp` on((`c`.`id_grau_parentesco` = `gp`.`idgrau_parentestico`))) join `camara` `cm` on((`c`.`_id_camara` = `cm`.`idcamara`))) join `gaveta` `gv` on((`c`.`id_gaveta_` = `gv`.`idgaveta`))) join `usuario` `us` on((`c`.`id_usuario_` = `us`.`idusuario`))) join `proveniencia` `pro` on((`c`.`id_proveniencia_` = `pro`.`idproveniencia`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_cadaver`
--
DROP TABLE IF EXISTS `view_cadaver`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_cadaver`  AS  select `ca`.`id_cadaver` AS `id_cadaver`,`ca`.`nome` AS `nome`,`ca`.`sexo` AS `sexo`,`ca`.`data_de_nascimento` AS `data_de_nascimento`,`ca`.`residente` AS `residente`,`ca`.`nome_do_pai` AS `nome_do_pai`,`ca`.`nome_da_mae` AS `nome_da_mae`,`ca`.`bi` AS `bi`,`ca`.`id_grau_parentesco` AS `id_grau_parentesco`,`ca`.`testemunha_familiar` AS `testemunha_familiar`,`ca`.`bi_testemunha_familiar` AS `bi_testemunha_familiar`,`ca`.`testemunha_responsavel` AS `testemunha_responsavel`,`ca`.`contacto` AS `contacto`,`ca`.`id_proveniencia_` AS `id_proveniencia_`,`ca`.`id_gaveta_` AS `id_gaveta_`,`ca`.`id_usuario_` AS `id_usuario_`,`ca`.`_id_camara` AS `_id_camara`,`ca`.`statu` AS `statu`,`ca`.`data_registo` AS `data_registo`,`cam`.`referencia` AS `camara`,`ga`.`numero` AS `gaveta`,`us`.`usuario` AS `usuario`,`pro`.`local` AS `local_proveniencia`,`grau`.`descricao` AS `grau_parentesco` from (((((`cadaver` `ca` join `camara` `cam` on((`cam`.`idcamara` = `ca`.`_id_camara`))) join `gaveta` `ga` on((`ga`.`idgaveta` = `ca`.`id_gaveta_`))) join `usuario` `us` on((`us`.`idusuario` = `ca`.`id_usuario_`))) join `proveniencia` `pro` on((`pro`.`idproveniencia` = `ca`.`id_proveniencia_`))) join `grau_parentestico` `grau` on((`grau`.`idgrau_parentestico` = `ca`.`id_grau_parentesco`))) where (`ca`.`statu` = 'Depositado') ;

-- --------------------------------------------------------

--
-- Structure for view `view_gaveta`
--
DROP TABLE IF EXISTS `view_gaveta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_gaveta`  AS  select `gaveta`.`idgaveta` AS `idgaveta`,`gaveta`.`numero` AS `numero`,`camara`.`idcamara` AS `idcamara`,`camara`.`referencia` AS `referencia`,`gaveta`.`statu` AS `statu` from (`gaveta` join `camara` on((`camara`.`idcamara` = `gaveta`.`id_camara`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_grafico_deposito`
--
DROP TABLE IF EXISTS `view_grafico_deposito`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_grafico_deposito`  AS  select (select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 1) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Janeiro`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 2) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Fevereiro`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 3) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Marco`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 4) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Abril`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 5) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Maio`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 6) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Junho`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 7) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Julho`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 8) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Agosto`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 9) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Setembro`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 10) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Outubro`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 11) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Novembro`,(select count(`cadaver`.`id_cadaver`) from `cadaver` where ((month(`cadaver`.`data_registo`) = 12) and (year(`cadaver`.`data_registo`) = year(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `Dezembro` ;

-- --------------------------------------------------------

--
-- Structure for view `view_grafico_diairo_levantado`
--
DROP TABLE IF EXISTS `view_grafico_diairo_levantado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_grafico_diairo_levantado`  AS  select (select count(`levantamento`.`idlevantamento`) from `levantamento` where (dayofmonth(`levantamento`.`data`) = dayofmonth(now()))) AS `hoje` ;

-- --------------------------------------------------------

--
-- Structure for view `view_grafico_diario_deposito`
--
DROP TABLE IF EXISTS `view_grafico_diario_deposito`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_grafico_diario_deposito`  AS  select (select count(`cadaver`.`id_cadaver`) from `cadaver` where ((dayofmonth(`cadaver`.`data_registo`) = dayofmonth(now())) and (`cadaver`.`statu` = 'Depositado'))) AS `hoje` ;

-- --------------------------------------------------------

--
-- Structure for view `view_grafico_levantamento`
--
DROP TABLE IF EXISTS `view_grafico_levantamento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_grafico_levantamento`  AS  select (select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 1) and (year(`levantamento`.`data`) = year(now())))) AS `Janeiro`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 2) and (year(`levantamento`.`data`) = year(now())))) AS `Fevereiro`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 3) and (year(`levantamento`.`data`) = year(now())))) AS `Marco`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 4) and (year(`levantamento`.`data`) = year(now())))) AS `Abril`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 5) and (year(`levantamento`.`data`) = year(now())))) AS `Maio`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 6) and (year(`levantamento`.`data`) = year(now())))) AS `Junho`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 7) and (year(`levantamento`.`data`) = year(now())))) AS `Julho`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 8) and (year(`levantamento`.`data`) = year(now())))) AS `Agosto`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 9) and (year(`levantamento`.`data`) = year(now())))) AS `Setembro`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 10) and (year(`levantamento`.`data`) = year(now())))) AS `Outubro`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 11) and (year(`levantamento`.`data`) = year(now())))) AS `Novembro`,(select count(`levantamento`.`idlevantamento`) from `levantamento` where ((month(`levantamento`.`data`) = 12) and (year(`levantamento`.`data`) = year(now())))) AS `Dezembro` ;

-- --------------------------------------------------------

--
-- Structure for view `view_levantamento`
--
DROP TABLE IF EXISTS `view_levantamento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_levantamento`  AS  select `levantamento`.`id_cadaver_` AS `id_cadaver_`,`cadaver`.`nome` AS `falecido`,`levantamento`.`data` AS `data`,`levantamento`.`id_grauparentesco` AS `id_grauparentesco`,`grau_parentestico`.`descricao` AS `parentesco`,`levantamento`.`testemunha_familiar` AS `testemunha_familiar`,`levantamento`.`contacto` AS `contacto`,`levantamento`.`id_funcionario_` AS `id_funcionario_`,`usuario`.`usuario` AS `funcionario` from (((`levantamento` join `cadaver` on((`cadaver`.`id_cadaver` = `levantamento`.`id_cadaver_`))) join `grau_parentestico` on((`grau_parentestico`.`idgrau_parentestico` = `levantamento`.`id_grauparentesco`))) join `usuario` on((`usuario`.`idusuario` = `levantamento`.`id_funcionario_`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_nao_usuario`
--
DROP TABLE IF EXISTS `view_nao_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nao_usuario`  AS  select `funcionario`.`idfuncionario` AS `idfuncionario`,`funcionario`.`nome` AS `nome`,`funcionario`.`bi` AS `bi`,`funcionario`.`morada` AS `morada`,`funcionario`.`telefone` AS `telefone`,`funcionario`.`sexo` AS `sexo`,`funcionario`.`id_funcao` AS `id_funcao`,`funcionario`.`data_cadastro` AS `data_cadastro`,`funcionario`.`data_actualizacao` AS `data_actualizacao` from `funcionario` where (`funcionario`.`idfuncionario` in (select `usuario`.`id_funcionario` from `usuario`) is false) ;

-- --------------------------------------------------------

--
-- Structure for view `view_transferencia`
--
DROP TABLE IF EXISTS `view_transferencia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transferencia`  AS  select `t`.`idtransferencia` AS `idtransferencia`,`t`.`camara_origem` AS `camara_origem`,`t`.`camara_destino` AS `camara_destino`,`t`.`gaveta_origem` AS `gaveta_origem`,`t`.`gaveta_destino` AS `gaveta_destino`,`t`.`id_cadaver` AS `id_cadaver`,`t`.`data` AS `data`,`ca`.`nome` AS `nome`,`cam`.`referencia` AS `camara_or`,`came`.`referencia` AS `camara_des`,`ga`.`numero` AS `gaveta_or`,`gav`.`numero` AS `gaveta_des` from (((((`transferencia` `t` join `cadaver` `ca` on((`ca`.`id_cadaver` = `t`.`id_cadaver`))) join `camara` `cam` on((`cam`.`idcamara` = `t`.`camara_origem`))) join `camara` `came` on((`came`.`idcamara` = `t`.`camara_destino`))) join `gaveta` `ga` on((`ga`.`idgaveta` = `t`.`gaveta_origem`))) join `gaveta` `gav` on((`gav`.`idgaveta` = `t`.`gaveta_destino`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_transladacao`
--
DROP TABLE IF EXISTS `view_transladacao`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transladacao`  AS  select `ca`.`nome` AS `nome`,`sis`.`nome` AS `hospital`,`t`.`destino` AS `destino`,`t`.`data_translacao` AS `data_translacao`,`ca`.`id_cadaver` AS `id_cadaver`,`t`.`idtranslacao` AS `idtranslacao` from ((`translacao` `t` join `cadaver` `ca` on((`ca`.`id_cadaver` = `t`.`id_cadaver`))) join `sistema` `sis` on((`sis`.`id` = `t`.`id_proveniencia`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_usuario`
--
DROP TABLE IF EXISTS `view_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuario`  AS  select `usuario`.`idusuario` AS `idusuario`,`usuario`.`usuario` AS `usuario`,`usuario`.`senha` AS `senha`,`usuario`.`id_permicao` AS `id_permicao`,`permicao`.`descricao` AS `nivel`,`usuario`.`id_funcionario` AS `id_funcionario`,`funcionario`.`nome` AS `funcionario`,`usuario`.`statu` AS `statu` from ((`usuario` join `permicao` on((`usuario`.`id_permicao` = `permicao`.`idpermicao`))) join `funcionario` on((`usuario`.`id_funcionario` = `funcionario`.`idfuncionario`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autopsia`
--
ALTER TABLE `autopsia`
  ADD PRIMARY KEY (`idautopsia`);

--
-- Indexes for table `cadaver`
--
ALTER TABLE `cadaver`
  ADD PRIMARY KEY (`id_cadaver`),
  ADD KEY `id_grau_parentesco_idx` (`id_grau_parentesco`);

--
-- Indexes for table `camara`
--
ALTER TABLE `camara`
  ADD PRIMARY KEY (`idcamara`);

--
-- Indexes for table `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`idfuncao`),
  ADD UNIQUE KEY `idfuncao_UNIQUE` (`idfuncao`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idfuncionario`),
  ADD UNIQUE KEY `idfuncionario_UNIQUE` (`idfuncionario`),
  ADD KEY `id_funcao_idx` (`id_funcao`);

--
-- Indexes for table `gaveta`
--
ALTER TABLE `gaveta`
  ADD PRIMARY KEY (`idgaveta`),
  ADD UNIQUE KEY `idgaveta_UNIQUE` (`idgaveta`),
  ADD KEY `id_camara_idx` (`id_camara`);

--
-- Indexes for table `grau_parentestico`
--
ALTER TABLE `grau_parentestico`
  ADD PRIMARY KEY (`idgrau_parentestico`),
  ADD UNIQUE KEY `idgrau_parentestico_UNIQUE` (`idgrau_parentestico`);

--
-- Indexes for table `levantamento`
--
ALTER TABLE `levantamento`
  ADD PRIMARY KEY (`idlevantamento`),
  ADD UNIQUE KEY `idlevantamento_UNIQUE` (`idlevantamento`);

--
-- Indexes for table `permicao`
--
ALTER TABLE `permicao`
  ADD PRIMARY KEY (`idpermicao`);

--
-- Indexes for table `proveniencia`
--
ALTER TABLE `proveniencia`
  ADD PRIMARY KEY (`idproveniencia`),
  ADD UNIQUE KEY `idproveniencia_UNIQUE` (`idproveniencia`);

--
-- Indexes for table `sala_autopsia`
--
ALTER TABLE `sala_autopsia`
  ADD PRIMARY KEY (`idsala_autopsia`);

--
-- Indexes for table `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transferencia`
--
ALTER TABLE `transferencia`
  ADD PRIMARY KEY (`idtransferencia`),
  ADD UNIQUE KEY `idtransferencia_UNIQUE` (`idtransferencia`);

--
-- Indexes for table `translacao`
--
ALTER TABLE `translacao`
  ADD PRIMARY KEY (`idtranslacao`),
  ADD UNIQUE KEY `idtranslacao_UNIQUE` (`idtranslacao`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `idusuario_UNIQUE` (`idusuario`),
  ADD KEY `id_funcionario_idx` (`id_funcionario`),
  ADD KEY `id_permicao_idx` (`id_permicao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autopsia`
--
ALTER TABLE `autopsia`
  MODIFY `idautopsia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cadaver`
--
ALTER TABLE `cadaver`
  MODIFY `id_cadaver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `camara`
--
ALTER TABLE `camara`
  MODIFY `idcamara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `funcao`
--
ALTER TABLE `funcao`
  MODIFY `idfuncao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gaveta`
--
ALTER TABLE `gaveta`
  MODIFY `idgaveta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `grau_parentestico`
--
ALTER TABLE `grau_parentestico`
  MODIFY `idgrau_parentestico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `levantamento`
--
ALTER TABLE `levantamento`
  MODIFY `idlevantamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `permicao`
--
ALTER TABLE `permicao`
  MODIFY `idpermicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `proveniencia`
--
ALTER TABLE `proveniencia`
  MODIFY `idproveniencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sala_autopsia`
--
ALTER TABLE `sala_autopsia`
  MODIFY `idsala_autopsia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sistema`
--
ALTER TABLE `sistema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transferencia`
--
ALTER TABLE `transferencia`
  MODIFY `idtransferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `translacao`
--
ALTER TABLE `translacao`
  MODIFY `idtranslacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `id_funcao` FOREIGN KEY (`id_funcao`) REFERENCES `funcao` (`idfuncao`);

--
-- Limitadores para a tabela `gaveta`
--
ALTER TABLE `gaveta`
  ADD CONSTRAINT `id_camara` FOREIGN KEY (`id_camara`) REFERENCES `camara` (`idcamara`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `id_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`idfuncionario`),
  ADD CONSTRAINT `id_permicao` FOREIGN KEY (`id_permicao`) REFERENCES `permicao` (`idpermicao`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
