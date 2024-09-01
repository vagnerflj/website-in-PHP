-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Abr-2024 às 04:08
-- Versão do servidor: 8.0.26
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `generico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `fotoUsuario` varchar(100) NOT NULL,
  `nomeUsuario` varchar(100) NOT NULL,
  `cidadeUsuario` varchar(50) NOT NULL,
  `telefoneUsuario` varchar(20) NOT NULL,
  `emailUsuario` varchar(50) NOT NULL,
  `senhaUsuario` varchar(100) NOT NULL,
  `dataCadastroUsuario` date NOT NULL,
  `horaCadastroUsuario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `fotoUsuario`, `nomeUsuario`, `cidadeUsuario`, `telefoneUsuario`, `emailUsuario`, `senhaUsuario`, `dataCadastroUsuario`, `horaCadastroUsuario`) VALUES
(1, 'img/senhorCapivara.jpeg', 'Capivara Roedora de Matos', 'telemaco', '(42) 99922-2222', 'capivara@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-04-09', '21:43:36');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
