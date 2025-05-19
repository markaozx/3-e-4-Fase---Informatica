-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 19/05/2025 às 22h18min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `livraria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`codigo`, `nome`, `pais`) VALUES
(1, 'J.K. Rowling', 'Reino Unido'),
(2, 'George Orwell', 'Reino Unido'),
(3, 'Isaac Asimov', 'Estados Unidos'),
(4, 'Agatha Christie', 'Reino Unido'),
(5, 'J.R.R. Tolkien', 'Reino Unido'),
(6, 'Stephen King', 'Estados Unidos'),
(7, 'Gabriel García Márquez', 'Colômbia'),
(8, 'Mark Twain', 'Estados Unidos'),
(9, 'Haruki Murakami', 'Japão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codigo`, `nome`) VALUES
(1, 'Fantasia'),
(2, 'Ficção Científica'),
(3, 'Distopia'),
(4, 'Mistério'),
(5, 'Aventura'),
(6, 'Romance'),
(7, 'Horror'),
(8, 'Thriller'),
(9, 'Histórico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE IF NOT EXISTS `editora` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`codigo`, `nome`) VALUES
(1, 'Bloomsbury'),
(2, 'Penguin Random House'),
(3, 'HarperCollins'),
(4, 'Editora Record'),
(5, 'Companhia das Letras'),
(6, 'Harper & Row'),
(7, 'Editora Aleph'),
(8, 'Rocco'),
(9, 'Leya');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `nrpaginas` int(4) NOT NULL,
  `ano` int(4) NOT NULL,
  `codautor` int(5) NOT NULL,
  `codcategoria` int(5) NOT NULL,
  `codeditora` int(5) NOT NULL,
  `resenha` text NOT NULL,
  `preco` float(6,2) NOT NULL,
  `fotocapa1` varchar(100) NOT NULL,
  `fotocapa2` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codcategoria` (`codcategoria`),
  KEY `codeditora` (`codeditora`),
  KEY `codautor` (`codautor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`codigo`, `titulo`, `nrpaginas`, `ano`, `codautor`, `codcategoria`, `codeditora`, `resenha`, `preco`, `fotocapa1`, `fotocapa2`) VALUES
(1, 'Harry Potter e a Pedra Filosofal', 223, 1997, 1, 1, 8, 'O inÃ­cio da jornada mÃ¡gica de Harry Potter na escola de magia e bruxaria de Hogwarts.', 59.00, '4d09fa2e2fd205a81e404d9e8d2f0338.webp', '6cb7f14b4b0e134079fa0b81c5a9c427.webp'),
(2, '1984', 328, 1949, 2, 3, 5, 'Uma crÃ­tica ao totalitarismo e Ã  vigilÃ¢ncia extrema do Estado.', 39.00, '6ee29f6a2996cf95d1c905151b35ee28.jpg', 'cbb6e9243378503369af0a0afcc45fd2.jpg'),
(3, 'FundaÃ§Ã£o', 256, 1951, 3, 2, 7, 'Cientista prevÃª a queda do ImpÃ©rio GalÃ¡ctico e busca salvar o conhecimento da humanidade.', 54.00, '8fb954ae8e8454c29cb9ecf2682a1a53.jpg', '772a924fb04fa3f65e2f4162a8d76055.jpg'),
(4, 'Assassinato no Expresso do Oriente', 288, 1934, 4, 4, 3, 'Um assassinato acontece em um trem de luxo e o detetive Poirot precisa desvendar o caso.', 44.90, 'd872514d4490f6ed0db28afab5705245.jpg', 'da5dc85c1b172959d4e489e2874646e5.jpg'),
(5, 'O Senhor dos AnÃ©is: A Sociedade do Anel', 576, 1954, 5, 1, 3, 'A jornada Ã©pica de Frodo para destruir o Um Anel.', 89.00, '082866ae2ea380cbb533e98c884f581e.jpg', '3ff405c17b7c0b1cc485b8ee2df59cf5.jpg'),
(6, 'O Iluminado', 476, 1977, 6, 7, 5, 'Um hotel isolado desperta os piores instintos em um homem atormentado.', 49.00, '59d8c044d2db1bb478fb295eddda1168.jpg', '2260b03e6f01ccda30d33f9b65018657.jpg'),
(7, 'Cem Anos de SolidÃ£o', 432, 1967, 7, 6, 4, 'A saga da famÃ­lia BuendÃ­a na cidade fictÃ­cia de Macondo.', 59.00, '92e4f8edf0241e1326f91013fc1386bb.jpg', 'f692a6b080f4efbbfb812fc71360187e.jpg'),
(8, 'As Aventuras de Tom Sawyer', 274, 1876, 8, 5, 2, 'A infÃ¢ncia travessa de Tom Sawyer Ã s margens do rio Mississippi.', 34.00, 'e9e94e2b0e1d8e1cb55b470b1b627740.jpg', '6b5a71c3f57e96c7937e0a15b24d8f29.jpg'),
(9, 'Kafka Ã  Beira-Mar', 480, 2002, 9, 8, 5, 'Um garoto foge de casa e se envolve em uma jornada surreal.', 69.00, 'b7f2f490023b3fa60ac6b89c3069ec7a.jpg', 'f5c94dd1c23b026177c1648515a33e94.jpg'),
(10, 'Harry Potter e a CÃ¢mara Secreta', 251, 1998, 1, 1, 8, 'AlguÃ©m libertou um monstro em Hogwarts e Harry precisa descobrir quem.', 59.00, 'ff58931ff616a8eeed6644d9d0c990d5.jpg', '088786eef7dd22d011b06c4c5ba090c5.jpg'),
(11, 'RevoluÃ§Ã£o dos Bichos', 112, 1945, 2, 3, 5, ' Uma sÃ¡tira polÃ­tica sobre uma revoluÃ§Ã£o animal que vira ditadura.', 34.00, '8f69e1af5abe22dd988a6a5d8e5247c5.jpg', '66a09898b2628b90fbc6927a18a3221a.jpg'),
(12, 'Eu, RobÃ´', 224, 1950, 3, 2, 7, 'ColetÃ¢nea de contos que exploram a relaÃ§Ã£o entre humanos e robÃ´s.', 49.00, '426f5e19a37b61c8c06c767e011e992f.jpg', 'bd56e0bd052a919a07f65ec9215cd732.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(5) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `senha` varchar(10) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `login`, `senha`) VALUES
(1, 'teste', '1234');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`codautor`) REFERENCES `autor` (`codigo`),
  ADD CONSTRAINT `livro_ibfk_2` FOREIGN KEY (`codcategoria`) REFERENCES `categoria` (`codigo`),
  ADD CONSTRAINT `livro_ibfk_3` FOREIGN KEY (`codeditora`) REFERENCES `editora` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
