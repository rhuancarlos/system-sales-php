-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 04/01/2019 às 17:18
-- Versão do servidor: 5.7.24-0ubuntu0.18.04.1
-- Versão do PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `system-sales`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ss_clientes`
--

CREATE TABLE `ss_clientes` (
  `ID` int(10) NOT NULL,
  `NOME` varchar(40) NOT NULL,
  `CPF` varchar(40) NOT NULL,
  `RG` varchar(40) NOT NULL,
  `ENDERECO` varchar(50) NOT NULL,
  `NUMERO` int(10) NOT NULL,
  `ESTADO` varchar(40) NOT NULL,
  `CIDADE` varchar(40) NOT NULL,
  `CONTATO` varchar(15) NOT NULL,
  `RENDA` float NOT NULL,
  `USUARIOS_ID` int(10) NOT NULL,
  `CREATED` datetime NOT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ss_produtos`
--

CREATE TABLE `ss_produtos` (
  `ID` int(10) NOT NULL,
  `DESCRICAO_P` varchar(45) NOT NULL,
  `DESCRICAO_C` varchar(60) NOT NULL,
  `PRECO_AVISTA` float NOT NULL,
  `PRECO_APRAZO` float NOT NULL,
  `QTD` int(10) NOT NULL,
  `COD_BARRAS` varchar(40) NOT NULL,
  `USUARIOS_ID` int(10) NOT NULL,
  `CREATED` datetime NOT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ss_usuarios`
--

CREATE TABLE `ss_usuarios` (
  `ID` int(10) NOT NULL,
  `NOME` varchar(30) NOT NULL,
  `MATRICULA` varchar(10) NOT NULL,
  `SENHA` varchar(150) NOT NULL,
  `CREATED` datetime NOT NULL,
  `STATUS` varchar(1) NOT NULL,
  `USER_CREATED` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `ss_usuarios`
--

INSERT INTO `ss_usuarios` (`ID`, `NOME`, `MATRICULA`, `SENHA`, `CREATED`, `STATUS`, `USER_CREATED`) VALUES
(1, 'Administrador', '1234', '$2y$10$02GIKoWt6UQRoGyyUXCumeUkmdDlTaX72uU6nvu3V2Be4BhcwPNUa', '2018-12-28 15:53:40', '1', 'Admin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ss_vendas`
--

CREATE TABLE `ss_vendas` (
  `ID` int(10) NOT NULL,
  `PRODUTOS_ID` int(10) NOT NULL,
  `CLIENTES_ID` int(10) NOT NULL,
  `QUANTIDADE_VENDIDA` float NOT NULL,
  `FORM_PAGAMENTO` varchar(10) NOT NULL,
  `DATA` datetime NOT NULL,
  `VALOR_TOTAL` float NOT NULL,
  `USUARIOS_ID` int(10) NOT NULL,
  `CREATED` datetime NOT NULL,
  `UPDATED` datetime NOT NULL,
  `STATUS` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `ss_clientes`
--
ALTER TABLE `ss_clientes`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `ss_produtos`
--
ALTER TABLE `ss_produtos`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Índices de tabela `ss_usuarios`
--
ALTER TABLE `ss_usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `ss_clientes`
--
ALTER TABLE `ss_clientes`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ss_produtos`
--
ALTER TABLE `ss_produtos`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ss_usuarios`
--
ALTER TABLE `ss_usuarios`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
