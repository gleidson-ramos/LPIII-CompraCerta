-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Jul-2023 às 12:51
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `supermercadoweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avalicacoes`
--

DROP TABLE IF EXISTS `avalicacoes`;
CREATE TABLE IF NOT EXISTS `avalicacoes` (
  `idAvaliacao` int NOT NULL,
  `idPedidoAvaliacao` int DEFAULT NULL,
  `idNotaAvaliacao` char(1) NOT NULL,
  `idTextoAvaliacao` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(45) NOT NULL,
  `imgCategoria` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nomeCategoria`, `imgCategoria`) VALUES
(1, 'Açougue', './img/ctg/açougue.png'),
(2, 'Bebidas', './img/ctg/bebidas.png'),
(3, 'Biscoitos', './img/ctg/biscoitos.png'),
(4, 'Frios & Laticínios', './img/ctg/frios.png'),
(5, 'Hortifruti', './img/ctg/hortifruti.png'),
(6, 'Limpeza', './img/ctg/limpeza.png'),
(7, 'Mercearia', './img/ctg/mercearia.png'),
(8, 'Padaria', './img/ctg/padaria.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `idFuncionario` int NOT NULL AUTO_INCREMENT,
  `nomeFuncionario` varchar(100) NOT NULL,
  `senhaFuncionario` varchar(100) NOT NULL,
  `emailFuncionario` varchar(100) NOT NULL,
  `ehGerente` bit(1) NOT NULL,
  `setorFuncionario` varchar(100) NOT NULL,
  PRIMARY KEY (`idFuncionario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`idFuncionario`, `nomeFuncionario`, `senhaFuncionario`, `emailFuncionario`, `ehGerente`, `setorFuncionario`) VALUES
(1, 'José Saramago', 's3cret00', 'saramago-jose@gmail.com', b'0', 'Preparacao'),
(2, 'Maria Alcântara', '1a2b3c4d', 'alcantara-maria@gmail.com', b'0', 'Conferencia e Embalagem'),
(3, 'André Gomes', 'd3sc0br3', 'gomes-andre@gmail.com', b'0', 'Entrega'),
(4, 'Paulo Macedo', 'senha123', 'macedo-paulo@gmail.com', b'1', 'Gerencia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercado`
--

DROP TABLE IF EXISTS `mercado`;
CREATE TABLE IF NOT EXISTS `mercado` (
  `CNPJ` int NOT NULL,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`CNPJ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `mercado`
--

INSERT INTO `mercado` (`CNPJ`, `nome`) VALUES
(123, 'Compra Certa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedido` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dataDaCompra` datetime NOT NULL,
  `pedidoAvaliado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `userId` (`userId`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `userId`, `status`, `dataDaCompra`, `pedidoAvaliado`) VALUES
(10, 1, 'Compra Entregue', '2023-07-08 00:34:54', 0),
(18, 1, 'Em Preparação', '2023-07-11 16:01:42', 0),
(21, 1, 'Compra em Rota de Entrega', '2023-07-12 13:52:00', 0),
(23, 1, 'Aguardando Atendimento', '2023-07-13 09:31:02', 0),
(24, 10, 'Compra Entregue', '2023-07-13 09:39:46', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidositem`
--

DROP TABLE IF EXISTS `pedidositem`;
CREATE TABLE IF NOT EXISTS `pedidositem` (
  `idPedidoItem` int NOT NULL AUTO_INCREMENT,
  `idPedido` int NOT NULL,
  `idProduto` int NOT NULL,
  `precoPedido` decimal(11,2) NOT NULL,
  `quantidadePedido` int NOT NULL,
  PRIMARY KEY (`idPedidoItem`),
  KEY `idPedido` (`idPedido`),
  KEY `idProduto` (`idProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pedidositem`
--

INSERT INTO `pedidositem` (`idPedidoItem`, `idPedido`, `idProduto`, `precoPedido`, `quantidadePedido`) VALUES
(57, 10, 24, '12.15', 1),
(58, 10, 5, '1.99', 1),
(59, 10, 15, '9.99', 1),
(87, 18, 13, '2.49', 1),
(88, 18, 10, '24.90', 3),
(89, 18, 10, '24.90', 1),
(99, 21, 4, '4.59', 1),
(100, 21, 18, '99.90', 1),
(102, 21, 7, '7.49', 1),
(103, 23, 3, '3.99', 1),
(104, 24, 26, '15.34', 1),
(106, 24, 6, '10.99', 2),
(107, 24, 18, '99.90', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `nomeProduto` varchar(50) NOT NULL,
  `precoProduto` float NOT NULL,
  `urlimagemProduto` varchar(100) NOT NULL,
  `idProduto` int NOT NULL AUTO_INCREMENT,
  `CategoriaProduto` int NOT NULL,
  `mercado` int NOT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `categoria` (`CategoriaProduto`),
  KEY `mercado` (`mercado`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`nomeProduto`, `precoProduto`, `urlimagemProduto`, `idProduto`, `CategoriaProduto`, `mercado`) VALUES
('Óleo de Soja Soya Pet 900ML', 7.99, './img/produtos/oleo.png', 2, 7, 123),
('Açúcar Cristal Pinheiro 1KG', 3.99, './img/produtos/acucar.png', 3, 7, 123),
('Arroz Parboilizado Urbano Tipo1 1KG', 4.59, './img/produtos/arroz.png', 4, 7, 123),
('Flocão de Milho Maratá 500G', 1.99, './img/produtos/flocao.png', 5, 7, 123),
('Salsicha Hot Dog Perdigão Resfriada', 10.99, './img/produtos/salsicha.png', 6, 4, 123),
('Café Maratá a Vácuo 250G', 7.49, './img/produtos/cafe.png', 7, 7, 123),
('Limão Taiti unidade (aprox: 120G)', 0.29, './img/produtos/limao.png', 8, 5, 123),
('Ovos Brancos Grandes c/ 30 Unid', 71.9, './img/produtos/ovo.png', 9, 7, 123),
('Azeite de Oliva 500ML', 24.9, './img/produtos/azeite.png', 10, 7, 123),
('Leite em Pó Ninho Integral 750G', 29.9, './img/produtos/ninho.png', 11, 7, 123),
('Queijo Muçarela Davaca Fatiado', 13.73, './img/produtos/queijo.png', 12, 4, 123),
('Cerveja Schin Lata 350ML', 2.49, './img/produtos/schin.png', 13, 2, 123),
('Cerveja Heineken Puro Malte 350ML', 4.49, './img/produtos/heineken.png', 14, 2, 123),
('Margarina Qualy Com Sal 500g', 9.99, './img/produtos/margarina.png', 15, 4, 123),
('Cerveja Devassa Puro Malte 350ML', 2.99, './img/produtos/devassa.png', 16, 2, 123),
('Iogurte Danone Morango Garrafa', 16, './img/produtos/iorgute.png', 17, 4, 123),
('Gin Beefeater London Dry 750ML', 99.9, './img/produtos/beefeater.png', 18, 2, 123),
('Vodka Smirnoff Red 998ML', 39.9, './img/produtos/smirnoff.png', 19, 2, 123),
('Whisky Jack Daniels Tennesse 1L', 129.9, './img/produtos/jd.png', 20, 2, 123),
('Gin Bombay Sapphire 750ML', 119.9, './img/produtos/bombay.png', 22, 2, 123),
('Bacon Suíno Seara Defumado Pedaço', 13.99, './img/produtos/bacon.png', 23, 1, 123),
('Mocotó Bovino Inteiro Congelado', 12.15, './img/produtos/mocoto.png', 24, 1, 123),
('Fígado de Frango Perdigão 1Kg', 6.49, './img/produtos/figadof.png', 25, 1, 123),
('Filé de Peito de Frango Sadia 1Kg', 15.34, './img/produtos/fpeito.png', 26, 1, 123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`status`) VALUES
('Aguardando Atendimento'),
('Aguardando Entrega'),
('Compra em Rota de Entrega'),
('Compra Entregue'),
('Em Preparação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `nomeUsuario` varchar(100) NOT NULL,
  `emailUsuario` varchar(100) NOT NULL,
  `senhaUsuario` varchar(8) NOT NULL,
  `cpfUsuario` int NOT NULL,
  `telefoneUsuario` int DEFAULT NULL,
  `enderecoUsuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idUsuario`,`emailUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`nomeUsuario`, `emailUsuario`, `senhaUsuario`, `cpfUsuario`, `telefoneUsuario`, `enderecoUsuario`, `idUsuario`) VALUES
('João Lucas', '1@1', '123456', 123456789, 33333333, 'test2', 1),
('Carlos', 'carlos@gmail.com', '123', 1919, 1234567890, 'Rua x casa 3', 10);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`status`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `pedidositem`
--
ALTER TABLE `pedidositem`
  ADD CONSTRAINT `pedidositem_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`idPedido`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`CategoriaProduto`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `produtos_ibfk_2` FOREIGN KEY (`mercado`) REFERENCES `mercado` (`CNPJ`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
