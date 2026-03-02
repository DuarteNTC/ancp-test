-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/03/2026 às 18:38
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `animais_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `animais`
--

CREATE TABLE `animais` (
  `cga` int(11) NOT NULL,
  `serie` char(4) NOT NULL,
  `rgn` char(16) NOT NULL,
  `sexo` int(11) NOT NULL,
  `nome` varchar(24) NOT NULL,
  `dt_nasc` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `animais`
--

INSERT INTO `animais` (`cga`, `serie`, `rgn`, `sexo`, `nome`, `dt_nasc`, `created_at`) VALUES
(1, 'AFIV', '2126', 2, 'TESTE1', '2025-08-06', '2026-03-02 14:55:49'),
(2, 'AFIV', '2125', 1, 'TESTE2', '2024-01-01', '2026-03-02 14:57:29'),
(3, 'AFIV', '2124', 2, 'TESTE3', '2021-01-01', '2026-03-02 14:57:54'),
(4, 'AFIV', '2123', 2, 'TESTE4', '2020-01-02', '2026-03-02 15:06:34'),
(5, 'AFIV', '2122', 1, 'TESTE5', '2016-01-02', '2026-03-02 16:33:53');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `animais`
--
ALTER TABLE `animais`
  ADD PRIMARY KEY (`cga`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animais`
--
ALTER TABLE `animais`
  MODIFY `cga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
