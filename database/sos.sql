-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/08/2026 às 23:42
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `blocked`
--

CREATE TABLE `blocked` (
  `id` int(11) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `data_acesso` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `blocked`
--

INSERT INTO `blocked` (`id`, `domain`, `active`, `data_acesso`) VALUES
(1, 'youtube.com', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `codigo_entrada` varchar(80) DEFAULT NULL,
  `nome` varchar(80) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `enredeco` varchar(100) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `equipamentos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `codigo_entrada`, `nome`, `telefone`, `enredeco`, `cep`, `equipamentos`) VALUES
(3, '486171861.3', 'Fulano de Tal', '62991402243', 'Av. segunda Radial, 173', '', 0),
(4, '799817983.4', 'Isaac', '62991402243', 'Rua 1049, St. Pedro Ludovico', '1', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `id_equipamento` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT 0,
  `codigo_eq` varchar(200) NOT NULL,
  `equipamento` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL,
  `fabricacao` date DEFAULT NULL,
  `manutencao` text DEFAULT NULL,
  `obs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `equipamentos`
--

INSERT INTO `equipamentos` (`id_equipamento`, `id_cliente`, `codigo_eq`, `equipamento`, `valor`, `fabricacao`, `manutencao`, `obs`) VALUES
(1, 3, '1442481751', 'Maquina de Louças', 700, '2026-07-05', 'qq', 'qqq'),
(2, 4, '2917031232', 'Secadora', 700, '2026-07-05', 'Olá', 'Mundo!'),
(4, 3, '4306347694', 'Lavadoura', 1200, '2026-07-31', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens_equipamentos`
--

CREATE TABLE `imagens_equipamentos` (
  `id_img` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_equipamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(1, 'Isaac', 'prog.isaac13@gmail.com', '$2y$10$4JxJF1c1t/MPeM/3h0TA9uPzsne.BC5qnefHX75w1BCwCy6sR4z3y');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `blocked`
--
ALTER TABLE `blocked`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `domain` (`domain`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`id_equipamento`);

--
-- Índices de tabela `imagens_equipamentos`
--
ALTER TABLE `imagens_equipamentos`
  ADD PRIMARY KEY (`id_img`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `blocked`
--
ALTER TABLE `blocked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `id_equipamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `imagens_equipamentos`
--
ALTER TABLE `imagens_equipamentos`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
