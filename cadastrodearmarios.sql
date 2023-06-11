-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/06/2023 às 18:18
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastrodearmarios`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `armarios`
--

CREATE TABLE `armarios` (
  `idArmario` int(11) NOT NULL,
  `valorArmario` decimal(10,2) DEFAULT NULL,
  `localizacaoArmario` varchar(10) DEFAULT NULL,
  `linha` char(1) DEFAULT NULL CHECK (`linha` regexp '^[A-Za-z]$'),
  `coluna` int(11) DEFAULT NULL CHECK (`coluna` >= 1),
  `vago` tinyint(1) DEFAULT NULL CHECK (`vago` in (0,1))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `armarios`
--

INSERT INTO `armarios` (`idArmario`, `valorArmario`, `localizacaoArmario`, `linha`, `coluna`, `vago`) VALUES
(1, 100.00, 'Local 1', 'A', 1, 1),
(2, 150.50, 'Local 2', 'B', 2, 0),
(3, 200.75, 'Local 3', 'C', 3, 1),
(4, 180.25, 'Local 4', 'D', 1, 0),
(5, 90.50, 'Local 5', 'E', 2, 1),
(6, 120.00, 'Local 6', 'F', 3, 0),
(7, 250.50, 'Local 7', 'G', 1, 1),
(8, 175.75, 'Local 8', 'H', 2, 0),
(9, 300.25, 'Local 9', 'I', 3, 1),
(10, 80.50, 'Local 10', 'J', 1, 0),
(11, 120.50, 'Local 11', 'K', 2, 1),
(12, 180.25, 'Local 12', 'L', 3, 0),
(13, 200.00, 'Local 13', 'M', 1, 1),
(14, 150.75, 'Local 14', 'N', 2, 0),
(15, 90.50, 'Local 15', 'O', 3, 1),
(16, 210.00, 'Local 16', 'P', 1, 0),
(17, 260.50, 'Local 17', 'Q', 2, 1),
(18, 175.25, 'Local 18', 'R', 3, 0),
(19, 310.00, 'Local 19', 'S', 1, 1),
(20, 100.50, 'Local 20', 'T', 2, 0),
(21, 130.25, 'Local 21', 'U', 3, 1),
(22, 240.00, 'Local 22', 'V', 1, 0),
(23, 180.50, 'Local 23', 'W', 2, 1),
(24, 220.75, 'Local 24', 'X', 3, 0),
(25, 330.00, 'Local 25', 'Y', 1, 1),
(26, 95.25, 'Local 26', 'Z', 2, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastropessoa`
--

CREATE TABLE `cadastropessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `endereco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastropessoa`
--

INSERT INTO `cadastropessoa` (`id`, `nome`, `sobrenome`, `CPF`, `telefone`, `email`, `endereco`) VALUES
(4, 'aaaa', 'asdas', 'asdsa', '48598451', 'maicouhahn18@gmail.com', 'asdasdasd'),
(15, 'MaicouU', 'Hahn', '09777239920', '48598451', 'maicouhahn11@gmail.com', 'rua das palmeiras');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notafiscal`
--

CREATE TABLE `notafiscal` (
  `idnotafiscal` int(11) NOT NULL,
  `idArmario` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `armarios`
--
ALTER TABLE `armarios`
  ADD PRIMARY KEY (`idArmario`);

--
-- Índices de tabela `cadastropessoa`
--
ALTER TABLE `cadastropessoa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `notafiscal`
--
ALTER TABLE `notafiscal`
  ADD PRIMARY KEY (`idnotafiscal`),
  ADD KEY `idArmario` (`idArmario`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastropessoa`
--
ALTER TABLE `cadastropessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `notafiscal`
--
ALTER TABLE `notafiscal`
  MODIFY `idnotafiscal` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `notafiscal`
--
ALTER TABLE `notafiscal`
  ADD CONSTRAINT `notafiscal_ibfk_1` FOREIGN KEY (`idArmario`) REFERENCES `armarios` (`idArmario`),
  ADD CONSTRAINT `notafiscal_ibfk_2` FOREIGN KEY (`id`) REFERENCES `cadastropessoa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
