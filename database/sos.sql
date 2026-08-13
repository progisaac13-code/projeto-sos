-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/08/2026 às 05:31
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
  `nome` varchar(80) DEFAULT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `enredeco` varchar(100) DEFAULT NULL,
  `equipamentos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `cpf`, `telefone`, `enredeco`, `equipamentos`) VALUES
(1, 'Isaac Rocha', '70631871128', '62991402243', 'Av. Circular, 173', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `id_equipamento` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `equipamento` varchar(100) NOT NULL,
  `valor` varchar(10) NOT NULL,
  `fabricacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  ADD PRIMARY KEY (`id_equipamento`),
  ADD KEY `id_cliente` (`id_cliente`);

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
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `id_equipamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagens_equipamentos`
--
ALTER TABLE `imagens_equipamentos`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD CONSTRAINT `equipamentos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
