-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Nov-2021 às 21:07
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `suporte_personalizado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados`
--

CREATE TABLE `chamados` (
  `id` int(11) NOT NULL,
  `pergunta` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`id`, `pergunta`, `email`, `token`, `criado`) VALUES
(1, 'Lorem Ipsum é simplesmente um texto fictício da indústria de impressão e composição. Lorem Ipsum tem sido o texto fictício padrão da indústria desde os anos 1500, quando um impressor desconhecido pegou uma galé do tipo e embaralhou para fazer um livro de amostra de tipos. Ele sobreviveu não apenas cinco séculos, mas também ao salto para a composição eletrônica, permanecendo essencialmente inalterado. Ele foi popularizado na década de 1960 com o lançamento de folhas de Letraset contendo passagens de Lorem Ipsum e, mais recentemente, com software de editoração eletrônica como Aldus PageMaker incluindo versões de Lorem Ipsum.\r\n\r\n', 'membro@gmail.com', '08685221c2be178756db8bdc5d4c3ea2', '2021-09-20 16:00:53'),
(7, 'Olá, estou com problema no download!', 'raiane.dev@gmail.com', '22327946adf22c6da91f77ed1998ef0c', '2021-09-20 16:00:53'),
(8, '', '', '57efcdc66ca1c78fc3422965f48331b7', '2021-09-20 16:00:53'),
(9, '', '', 'ed84df6f78d286e2c12bf4d8d3414abc', '2021-09-20 16:00:53'),
(10, '', '', '8b0353628be900aa0fe19bc852fe8bd4', '2021-09-20 16:00:53'),
(11, 'ola, meu download não está funcionando.', 'membro@gmail.com', '084bfbef5683ea21790039608517bf1c', '2021-09-20 16:00:53'),
(12, 'aaa', 'membro@gmail.com', '91d2353a8519b1a03519902f93989d27', '2021-09-20 16:00:53'),
(13, 'Olá, estou com dificuldade no download.', 'membro@gmail.com', 'f086a9a66e83a018334e316940d21f77', '2021-09-20 16:00:53'),
(14, 'a', 'membro@gmail.com', '12577973faca55cad5c7f82c461142fe', '0000-00-00 00:00:00'),
(15, 'ola', 'membro@gmail.com', 'd3d67325dc944380634d45aeaa7b7205', '0000-00-00 00:00:00'),
(16, 'ola', 'membro@gmail.com', '98f9f4655e83165bc77efffdacabd386', '0000-00-00 00:00:00'),
(17, 'Olá, onde acho o blog?', 'raiane.dev@gmail.com', 'c1ea5807cd50f8a0f80bb0cd36175aa8', '0000-00-00 00:00:00'),
(18, 'Olá, onde acho o blog?', 'membro@gmail.com', 'da45820150b77bd0ea0780956c7f9916', '0000-00-00 00:00:00'),
(19, 'ola', 'membro@gmail.com', 'cfb45231d95f11e12674581973b53f7d', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `interacao_chamado`
--

CREATE TABLE `interacao_chamado` (
  `id` int(11) NOT NULL,
  `id_chamado` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  `admin` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `interacao_chamado`
--

INSERT INTO `interacao_chamado` (`id`, `id_chamado`, `mensagem`, `admin`, `status`) VALUES
(1, '08685221c2be178756db8bdc5d4c3ea2', 'Para realizar o download faça o seguinte:', 1, 0),
(2, '08685221c2be178756db8bdc5d4c3ea2', 'ok\r\n', 1, 0),
(3, '08685221c2be178756db8bdc5d4c3ea2', 'Tá bom\r\n', -1, 0),
(4, '22327946adf22c6da91f77ed1998ef0c', 'Ok, vou te ajudar', 1, 0),
(5, 'f086a9a66e83a018334e316940d21f77', 'ola', -1, 0),
(6, '12577973faca55cad5c7f82c461142fe', 'ols', -1, 0),
(7, '12577973faca55cad5c7f82c461142fe', 'ola', -1, 0),
(8, 'd3d67325dc944380634d45aeaa7b7205', 'Olá\r\n', -1, 0),
(9, '98f9f4655e83165bc77efffdacabd386', 'ola', 1, 1),
(10, '91d2353a8519b1a03519902f93989d27', 'oka', 1, 1),
(11, 'c1ea5807cd50f8a0f80bb0cd36175aa8', 'Olá! Você acha em lalallaa.', 1, 1),
(12, '084bfbef5683ea21790039608517bf1c', 'ola', 1, 1),
(13, 'da45820150b77bd0ea0780956c7f9916', 'Olá, você acha em lalalala!', 1, 1),
(14, 'da45820150b77bd0ea0780956c7f9916', 'Ok, mas ainda não encontrei...', -1, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `interacao_chamado`
--
ALTER TABLE `interacao_chamado`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `interacao_chamado`
--
ALTER TABLE `interacao_chamado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
