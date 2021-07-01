-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jul-2021 às 17:38
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mvcframework`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`) VALUES
(1, 1, 'Esse é meu primeiro post.', 'Conteúdo do primeiro post', '2021-07-01 17:35:05'),
(2, 1, 'Esse é meu segundo post', 'Esse é o conteúdo do meu segundo post.', '2021-07-02 17:35:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'vinicius1', 'vinicius1@mail.com', 'vinicius01'),
(2, 'vinicius2', 'vinicius2@mail.com', 'vinicius02'),
(3, 'vdalsasso', 'vinicius@huner.com.br', '$2y$10$5WUXu/JOEHrQKF2jzMni4OEUDZQmpJmaQWusA26.QMnyYv0DU.5/m'),
(4, 'vdalsasso2', 'vinicius2@huner.com.br', '$2y$10$iCnkoXlXv3YWMaWzuKwwxeOkSnzG2PGnwZD0CzZ8CaZhtc6REtUu2'),
(5, 'vdalsasso3', 'vinicius3@huner.com.br', '$2y$10$xWuXxeSxIUGfrUwprf3Hf.yMcVbt4kbQEUgDfnttMN3R8F0ladL/.'),
(6, 'vdalsasso', 'vinicius@huner.com.br', '$2y$10$qu0Nb1WtXMM7YdM8a3idyOywoHF7iHJPpghFcyGcvaYFj/NFjmwTG'),
(7, 'bagulho', 'bagulho@bagulho.com', '$2y$10$h2NIa6zpZ7.LyipU6lUeSO5XVCL0SsTAw9f1GJ9GEa.hzgLLAGBTC'),
(8, 'vinicius95', 'viniciusd@huner.com.br', '$2y$10$bjE0PInlbeOu6CU4KTVceep5pgbGLjItSr.NaB0CVjdY5F3qBx4O6'),
(9, 'bagulho3', 'bagulho3@teste.com', '$2y$10$27gtQO3vWMx2YQEUbf/8JuzVRKBpBtQIJBoyOPWC7c03tdiyA1AyK'),
(10, 'vdalsasso6', 'vdalsasso6@huner.com.br', '$2y$10$R466ICPPkqsbEas1R1.bpuCY/fJjTf9En3pHBZr4MnL8CNPtBiwMq');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
