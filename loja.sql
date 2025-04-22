-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 22/04/2025 às 18h11min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE IF NOT EXISTS `adm` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `senha` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`codigo`, `senha`, `login`) VALUES
(1, '123', 'rafa diva'),
(2, 'Jenifer0509canela', 'jeniferfreelancerCLTdesocupada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codigo`, `nome`) VALUES
(1, 'masculino'),
(2, 'feminino'),
(3, 'infantil'),
(4, 'unissex');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`codigo`, `nome`) VALUES
(1, 'nike'),
(2, 'adidas'),
(3, 'vans');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `codigo` int(5) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `tamanho` varchar(2) NOT NULL,
  `preco` float(8,2) NOT NULL,
  `codmarca` int(5) NOT NULL,
  `codcategoria` int(5) NOT NULL,
  `codtipo` int(5) NOT NULL,
  `foto1` varchar(200) NOT NULL,
  `foto2` varchar(200) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codmarca` (`codmarca`),
  KEY `codcategoria` (`codcategoria`),
  KEY `codtipo` (`codtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codigo`, `descricao`, `cor`, `tamanho`, `preco`, `codmarca`, `codcategoria`, `codtipo`, `foto1`, `foto2`) VALUES
(1, 'tenis nike preto masculino', 'preto', '38', 279.99, 1, 1, 2, '77821a4a528ff47dcaf61da2b6be2d89', '48fe5e074e64d8ee04c3d478dd14566d'),
(2, 'shorts nike pro laranja feminino', 'laranja', 'P', 95.50, 1, 2, 1, 'bfacdee9e3ab45ee7218fb87d0d6ee66', 'e1faa3954dec39cee31703238c5f540d'),
(3, 'top adidas preto feminino', 'preto', 'M', 129.99, 2, 2, 1, 'a37ac85847169d8214b3abd4c3510840', '68ea3495c91d41d45894cf73f33b21d1'),
(4, 'shorts nike preto masculino', 'preto', 'M', 139.99, 1, 1, 1, 'afc5707af75b12e95f9cbcadec94b650', 'fc56cb74b7aeea5522f3e874591137c3'),
(5, 'mochila adidas classica rosa', 'rosa', 'X', 120.00, 2, 4, 3, '57843d5418398ea37c2d01567d66b52e', '4681fd679dfdac21d5b6c581db1b0d1d'),
(7, 'camiseta infantil nike branca', 'branca', 'P', 80.99, 1, 3, 1, '78fee2c341148acf2f0d8d8b23d8b10b', '4df2dbfa2d0268294acc0b0a18efadc8'),
(8, 'tenis nike preto feminino', 'preto', '38', 279.99, 1, 2, 2, '4cb1fcb2c63005bb305236534c023c27', '04f194d252afb8df91928ef6852d7d4f'),
(9, 'tenis vans preto feminino', 'preto', '38', 494.99, 3, 2, 2, '56edf83df546c13d052f31c98a793059', '806e5c0111d03593a9a2403f0b7e907f'),
(10, 'bone vans preto', 'preto', 'X', 179.99, 3, 4, 3, '576ee441c447e6ae21e1853543cba698', '07a740d340d6e4c088557a6d65fbf34b'),
(30, 'tenis nike preto feminino', 'preto', '37', 279.99, 1, 2, 2, '7f4820e75de4a8cdf4da671ac8541122', 'd5e0f4e225c29794e19adfaa8d5534c4'),
(31, 'tenis nike preto feminino', 'preto', '39', 279.99, 1, 2, 2, '08f7241bbcdae7bcd698e154e5630fc1', 'f5a1d7e8f8d642ca4f47c9d08d7c412d'),
(32, 'tenis nike preto feminino', 'preto', '36', 279.99, 1, 2, 2, 'e4080efd1d0984cdef95faf400e4ad9e', '213de177d1b48da941faa86775a9f0df'),
(33, 'tenis nike preto masculino', 'preto', '41', 279.99, 1, 1, 2, 'ab6de3b1819c1f9e89936abd713d258d', 'aa4d3db335c95cc99b3a93f7faea96d0'),
(34, 'tenis nike preto masculino', 'preto', '40', 279.99, 1, 1, 2, '79f8804af18dcce4dcc272ba85d739f9', '1987adff1e5f679fdf70bdbb066a4874'),
(35, 'tenis nike preto masculino', 'preto', '39', 279.99, 1, 1, 2, 'cf62b9f2945959af9aacc1c86c8af0ef', '77af3954f59184a8e8a50c6b70fddab4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`codigo`, `nome`) VALUES
(1, 'roupa'),
(2, 'calcado'),
(3, 'acessorio');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`codmarca`) REFERENCES `marca` (`codigo`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`codcategoria`) REFERENCES `categoria` (`codigo`),
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`codtipo`) REFERENCES `tipo` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
