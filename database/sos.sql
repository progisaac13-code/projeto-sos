-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/08/2026 às 04:03
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
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `nome` varchar(80) DEFAULT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `enredeco` varchar(100) DEFAULT NULL,
  `equipamentos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `foto`, `nome`, `cpf`, `telefone`, `enredeco`, `equipamentos`) VALUES
(1, '6a7f8321330fd.jpeg', 'Isaac Rocha', '70631871128', '62991402243', 'Av. Circular, 173', 0),
(2, NULL, 'Larissa Rocha', '70631866124', '62991402243', 'Av. Circular, 173', 0),
(4, NULL, 'Larissy sem Rocha', '47202793172', '62991402243', 'Av. Circular, 173', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `tipo_equipamento` varchar(100) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(150) DEFAULT NULL,
  `problema_relatado` text DEFAULT NULL,
  `servico` text DEFAULT NULL,
  `valor_mao_obra` decimal(10,2) DEFAULT 0.00,
  `valor_pecas` decimal(10,2) DEFAULT 0.00,
  `valor_total` decimal(10,2) DEFAULT 0.00,
  `status` enum('Aguardando diagnóstico','Em diagnóstico','Aguardando aprovação','Aguardando peça','Em conserto','Em teste','Pronto para entrega','Entregue','Cancelado') DEFAULT 'Aguardando diagnóstico',
  `data_entrada` datetime DEFAULT current_timestamp(),
  `data_previsao` datetime DEFAULT NULL,
  `data_conclusao` datetime DEFAULT NULL,
  `data_entrega` datetime DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `criado_em` datetime DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `equipamentos`
--

INSERT INTO `equipamentos` (`id`, `id_cliente`, `tipo_equipamento`, `marca`, `modelo`, `problema_relatado`, `servico`, `valor_mao_obra`, `valor_pecas`, `valor_total`, `status`, `data_entrada`, `data_previsao`, `data_conclusao`, `data_entrega`, `observacoes`, `criado_em`, `atualizado_em`) VALUES
(1, 1, 'Notebook', '', '', 'sdsdvsfsd', 'ksmfkdkfmnk', 120.00, 20.00, 140.00, 'Aguardando aprovação', '2026-08-14 00:00:00', NULL, NULL, '2026-08-14 00:00:00', 'lamsdklçvnsljdfknblksdnflbksjdfn', '2026-08-14 21:25:54', '2026-08-14 21:25:54');

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
-- Estrutura para tabela `sos_config`
--

CREATE TABLE `sos_config` (
  `id_config` int(11) NOT NULL,
  `text_whatsapp` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `funcao` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `funcao`, `email`, `senha`) VALUES
(1, 'Isaac', 'Gerente', 'operadordc.isaac@gmail.com', '$2y$10$Y4FAQhf1FkirpUPYu.dR2ezx.LoeS1L0ImY.Ts.AVDJVI1usBks5G'),
(2, 'Creuza', 'Markting', 'creuza@gmail.com', '$2y$10$RIZoU5XfQg9FP1WEv9GF5uFkxK6INhroM9B4n54wz0UVX6vxeipIe'),
(3, 'Martina', 'Markting', 'martina@gmail.com', '$2y$10$qzBtHcT3iHDXzJ0VTmcXDO3F/vXoT1JK1/DR04PxKqjFluzZJydPm'),
(4, 'Jorisvaldo', 'Mecânico', 'joris@gmail.com', '$2y$10$NjgFU9U9OT3m/fpP5gZp0OJyFPkUm1SyxbwXezRZf2B.IBWqFWaIW'),
(5, 'Clodildi', 'RH', 'cloclo@gmail.com', '$2y$10$uAwxvkQoCtnU13z0PqJVButilTkrePKSmPXimsmEbeppSNhVeFEn6'),
(6, 'Dog', 'Vendedor', 'Dog@gmail.com', '$2y$10$Ry1UdVJ9.uh2HgGtC79mYOlkjIpO/yd8Jddz/bchlDTBfBN86mP8S'),
(7, 'Cachorro', 'Vender', 'do@gmail.com', '$2y$10$VOwb7Bre6eEWrk.TwPm3UeH8xswK/IS3LfuC4l2cDL3WYrvyIUgTq');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `imagens_equipamentos`
--
ALTER TABLE `imagens_equipamentos`
  ADD PRIMARY KEY (`id_img`);

--
-- Índices de tabela `sos_config`
--
ALTER TABLE `sos_config`
  ADD PRIMARY KEY (`id_config`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `imagens_equipamentos`
--
ALTER TABLE `imagens_equipamentos`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sos_config`
--
ALTER TABLE `sos_config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
