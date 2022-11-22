-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Nov-2022 às 01:53
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29




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
  `imgConta` varchar(11) NOT NULL,
  `EstadoConta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbclientes`
--

INSERT INTO `tbclientes` (`id`, `nome`, `nomeUsuario`, `email`, `senha`, `cep`, `endereco`, `numero`, `complemento`, `cidade`, `estado`, `imgConta`, `EstadoConta`) VALUES
(1, 'João', 'joao123', 'joao@gmail.com', '123', '26389263', 'Rua Enrique Barbosa', '13', 'Casa', 'São Paulo', 'SP', '1.png', 'Ativado por Admin'),
(2, 'Júlio', 'julio123', 'julio@gmail.com', '123', '082435627', 'Rua Julioson', '22', 'Apartamento', 'São Paulo', 'SP', '2.png', 'Ativo'),
(3, 'Maria', 'maria123', 'maria@gmail.com', '123', '23563782', 'Rua Maria', '55', 'Casa', 'São Paulo', 'SP', '3.png', 'Ativo');

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
  `permissoes` varchar(100) NOT NULL,
  `EstadoConta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbfuncionario`
--

INSERT INTO `tbfuncionario` (`idFuncionario`, `nome`, `cargo`, `email`, `senha`, `imgConta`, `permissoes`, `EstadoConta`) VALUES
(1, 'Admin', 'Adiministrador', 'admin@gmail.com', '123', 'f1.png', 'todas', 'Ativo'),
(2, 'Sarah', 'Programadora', 'sarah@gmail.com', '123', 'f2.png', 'todas', 'Ativo'),
(3, 'Júlia', 'Técnico em TI', 'julia@gmail.com', '123', '', 'nenhum', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbservico`
--

CREATE TABLE `tbservico` (
  `idServico` int(4) NOT NULL,
  `idCliente` int(4) NOT NULL,
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

INSERT INTO `tbservico` (`idServico`, `idCliente`, `marca`, `modelo`, `descricaoProblema`, `formaEnvio`, `garantia`, `dataServico`) VALUES
(1, 2, 'Macbook', 'Motion Red', 'Caiu água no teclado.', 'levarAparelho', 'Sim', '2022-11-21 23:21:00'),
(2, 1, 'Positivo', 'Motion Red', 'Caiu no chão.', 'EnviarCorreio', 'Nao', '2022-11-21 23:22:00'),
(3, 3, 'Lenovo', 'Lenovo Legion 5i 82MH0001BR', 'Meu pai deixou cair.', 'levarAparelho', 'Nao', '2022-11-21 23:23:00'),
(4, 1, 'Asus', 'UX431FA-AN202T', 'Problema na bateria', 'levarAparelho', 'Sim', '2022-11-21 23:35:00');

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
(1, 1, 2, 2, 'Cancelado pelo funcionario', 'Por favor, leve em uma autorizada.', 'Não atendemos essa marca.', ''),
(2, 2, 1, 0, 'Cancelado pelo usuário', '', '', ''),
(3, 3, 3, 1, 'Confirmado pelo funcionario', 'Por favor, leve até ás 11h.', '21/11/2022', ''),
(4, 4, 1, 0, '', '', '', '');

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
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbservico`
--
ALTER TABLE `tbservico`
  MODIFY `idServico` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbstatuspedido`
--
ALTER TABLE `tbstatuspedido`
  MODIFY `idStatusPedido` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
