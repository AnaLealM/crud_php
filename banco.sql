-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jun 28, 2020 as 07:52 
-- Versão do Servidor: 5.1.37
-- Versão do PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `crud`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `imagem` varbinary(100) NOT NULL,
  `preco` decimal(16,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `imagem`, `preco`) VALUES
(4, 'computador', 'i3 4 gb', '', '1200.00'),
(2, 'computador', 'i3', '', '1200.00'),
(3, 'tablet', 'dual core', '', '1200.00'),
(5, 'computador', 'i3 4 gb', 'uploads/baixados.jpg', '1200.00'),
(6, 'computador', 'i3 4 gb', '', '1200.00'),
(7, 'computador', 'i3 4 gb', '', '1200.00'),
(8, 'computador', 'i3 4 gb', '', '1200.00'),
(9, 'computador', 'i3 4 gb', '', '1200.00'),
(10, 'computador', 'i3 4 gb', 'uploads/baixados.jpg', '1200.00'),
(11, 'computador', 'i3 4 gb', 'uploads/baixados.jpg', '1200.00'),
(12, 'computador', 'i3 4 gb', 'uploads/baixados.jpg', '1200.00');
