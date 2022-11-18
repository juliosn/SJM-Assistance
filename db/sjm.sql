-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Nov-2022 às 16:09
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
(1, 'João', 'joao123', 'joao@gmail.com', '123', '987634', 'Rua Enrique Barbosa', '27', 'Casa', 'São Paulo', 'SP', '1.png'),
(2, 'Júlio', 'julio123', 'julio@gmail.com', '123', '34223', 'Rua Neves', 'A123', 'Apartamento', 'São Paulo', 'SP', '2.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfuncionario`
--

CREATE TABLE `tbfuncionario` (
  `idFuncionario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `imgConta` varchar(10) NOT NULL,
  `permissoes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbfuncionario`
--

INSERT INTO `tbfuncionario` (`idFuncionario`, `nome`, `cargo`, `email`, `senha`, `imgConta`, `permissoes`) VALUES
(1, 'Admin', 'Adiministrador', 'admin@gmail.com', '123', 'f1.png', 'todas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbservico`
--

CREATE TABLE `tbservico` (
  `idCliente` int(4) NOT NULL,
  `idServico` int(4) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `descricaoProblema` varchar(100) NOT NULL,
  `formaEnvio` varchar(50) NOT NULL,
  `garantia` varchar(20) NOT NULL,
  `dataServico` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbservico`
--

INSERT INTO `tbservico` (`idCliente`, `idServico`, `marca`, `modelo`, `descricaoProblema`, `formaEnvio`, `garantia`, `dataServico`) VALUES
(1, 1, 'Lenovo', 'Xm32', 'Caiu', 'levarAparelho', 'Sim', '2022-11-17 13:43:07'),
(1, 2, 'Positivo', 'Asus', 'Simplesmente parou de funcionar', 'levarAparelho', 'Nao', '2022-11-17 13:43:12'),
(1, 3, 'Samsung', '', '1212', 'levarAparelho', 'Sim', '2022-11-17 13:43:18'),
(2, 5, 'Positivo', 'Xm32', 'qwqw', 'levarAparelho', 'Sim', '2022-11-17 13:43:28'),
(1, 6, 'Asus', '', 'qwqw', 'qwqw', 'qwqw', '2022-11-17 13:43:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbstatuspedido`
--

CREATE TABLE `tbstatuspedido` (
  `idStatusPedido` int(4) NOT NULL,
  `idServico` int(4) NOT NULL,
  `idCliente` int(4) NOT NULL,
  `idFuncionario` int(4) NOT NULL,
  `statusServico` varchar(100) NOT NULL,
  `mensagemFuncionario` varchar(300) NOT NULL,
  `dataLevarNotebook` varchar(100) NOT NULL,
  `dataTerminoServico` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbstatuspedido`
--

INSERT INTO `tbstatuspedido` (`idStatusPedido`, `idServico`, `idCliente`, `idFuncionario`, `statusServico`, `mensagemFuncionario`, `dataLevarNotebook`, `dataTerminoServico`) VALUES
(1, 1, 1, 0, 'Em manutenção', 'É vou ter q arrumar', '', ''),
(2, 2, 1, 0, 'Cancelado', 'não quero arrumar, se vira', '', ''),
(3, 3, 1, 0, '', '', '', ''),
(4, 4, 2, 0, 'Finalizado', 'Já pode vir buscar', '', ''),
(5, 4, 2, 0, 'Aguardando entrega do notebook', 'Você ainda não enviou o notebook', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbclientes`
--
ALTER TABLE `tbclientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbfuncionario`
--
ALTER TABLE `tbfuncionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Índices para tabela `tbservico`
--
ALTER TABLE `tbservico`
  ADD PRIMARY KEY (`idServico`);

--
-- Índices para tabela `tbstatuspedido`
--
ALTER TABLE `tbstatuspedido`
  ADD PRIMARY KEY (`idStatusPedido`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbclientes`
--
ALTER TABLE `tbclientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbfuncionario`
--
ALTER TABLE `tbfuncionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbservico`
--
ALTER TABLE `tbservico`
  MODIFY `idServico` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbstatuspedido`
--
ALTER TABLE `tbstatuspedido`
  MODIFY `idStatusPedido` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
