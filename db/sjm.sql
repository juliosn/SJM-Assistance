-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Nov-2022 às 03:14
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sjm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbclientes`
--

CREATE TABLE `tbclientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `nomeUsuario` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(3) NOT NULL,
  `imgConta` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbclientes`
--

INSERT INTO `tbclientes` (`id`, `nome`, `nomeUsuario`, `email`, `senha`, `cep`, `endereco`, `numero`, `complemento`, `cidade`, `estado`, `imgConta`) VALUES
(1, 'Admin', 'Admin123', 'admin@gmail.com', 'admin123', '127852345', 'Rua do Admin', '13A', 'Casa', 'São Paulo', 'SP', '1.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbclientes`
--
ALTER TABLE `tbclientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbclientes`
--
ALTER TABLE `tbclientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
