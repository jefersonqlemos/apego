-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13/11/2021 às 15:21
-- Versão do servidor: 10.5.12-MariaDB-cll-lve
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u277933883_apego`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@site.com', NULL, '$2y$10$4B1h8SjnlE3v7NuVCjNVh.xZfhnGalmXuyNpqAnhHyFuNxVS9LdO.', NULL, NULL, NULL),
(2, 'Administrador', 'suporte@apego.store', NULL, '$2y$10$.9ylbNiKAtWLe..ojVO1RusWzh5Nv44sJDlzZi7pPfK.vBqVPUeJm', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `idcategorias` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`idcategorias`, `nome`) VALUES
(1, 'saia'),
(2, 'shorts'),
(3, 'vestido'),
(4, 'body'),
(5, 'blusa'),
(6, 'moletom'),
(7, 'colete'),
(8, 'cropped'),
(9, 'calçados'),
(10, 'jaqueta'),
(11, 'casaco'),
(12, 'terno'),
(13, 'bermuda'),
(14, 'calça'),
(15, 'camisa'),
(16, 'colar'),
(17, 'pulseira'),
(18, 'jóia'),
(19, 'acessorios'),
(20, 'outros');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comprados`
--

CREATE TABLE `comprados` (
  `idcomprados` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `pedidos_idpedidos` int(11) NOT NULL,
  `produtos_idprodutos` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `comprados`
--

INSERT INTO `comprados` (`idcomprados`, `quantidade`, `pedidos_idpedidos`, `produtos_idprodutos`, `updated_at`, `created_at`) VALUES
(12, 1, 17, 44, '2020-11-03 18:25:29', '2020-11-03 18:25:29'),
(13, 1, 17, 34, '2020-11-03 18:25:29', '2020-11-03 18:25:29'),
(14, 1, 17, 35, '2020-11-03 18:25:29', '2020-11-03 18:25:29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dadosusuarios`
--

CREATE TABLE `dadosusuarios` (
  `nome` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sobrenome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complemento` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datadenascimento` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `iddadosusuarios` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `dadosusuarios`
--

INSERT INTO `dadosusuarios` (`nome`, `sobrenome`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `telefone`, `datadenascimento`, `cpf`, `created_at`, `updated_at`, `iddadosusuarios`, `email`) VALUES
('Teste', 'Ja vendidos', 'Videira-SC', 'teste', 'rua teste', '123', NULL, '(99)99999-9999', '2000-03-12', '999.999.999-99', '2021-02-20 04:42:42', '2020-11-02 23:20:39', 4, 'teste@teste.com'),
('apego', 'fffff', 'Videira-SC', '12312', '123', '12312', '12312', '(12)34567-8910', '2020-10-12', '222.222.222-22', '2021-02-20 04:42:59', '2020-10-27 17:05:01', 29, 'apego@apego.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `emails`
--

CREATE TABLE `emails` (
  `idemails` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `formasdepagamentos`
--

CREATE TABLE `formasdepagamentos` (
  `id` int(11) NOT NULL,
  `pagamentonaentrega` int(11) NOT NULL,
  `cartaodecredito` int(11) NOT NULL,
  `debitoonline` int(11) NOT NULL,
  `boleto` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `formasdepagamentos`
--

INSERT INTO `formasdepagamentos` (`id`, `pagamentonaentrega`, `cartaodecredito`, `debitoonline`, `boleto`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, '2021-02-20 03:37:14', '2021-02-20 03:37:14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotos`
--

CREATE TABLE `fotos` (
  `idfotos` int(11) NOT NULL,
  `fotos` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `produtos_idprodutos` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `fotos`
--

INSERT INTO `fotos` (`idfotos`, `fotos`, `produtos_idprodutos`, `updated_at`, `created_at`) VALUES
(92, '/storage/upload/B6sR1PI8WahKfN8n0NR7AloQz5lFvn0MNkgZph9u.jpg', 34, '2021-01-28 19:03:08', '2020-11-03 00:01:26'),
(93, '/storage/upload/eIZsszGkZoVhRiwNO3YlQq3YN7Dizas5ybfhpkzf.jpg', 34, '2021-01-28 19:03:13', '2020-11-03 00:01:26'),
(94, '/storage/upload/ENF4oLzoAMFuFtSlngWVqPcX9Ftl7TGKe1vbPYXd.jpg', 35, '2021-01-28 19:03:18', '2020-11-03 00:04:49'),
(95, '/storage/upload/R7Q7Z4XJ9x1uwQR2ZnwERlLi3sIJ67wivNG4WfpH.jpg', 35, '2021-01-28 19:03:23', '2020-11-03 00:04:49'),
(96, '/storage/upload/AECLVS9mrTHp59Mt94yrBo8OQmPpFvPhpoZJm1Nf.jpg', 36, '2021-01-28 19:03:34', '2020-11-03 00:23:10'),
(97, '/storage/upload/aBo0hr1p2wfMwinqvaxSbFbVSOAgjLRdDNf2xDwv.jpg', 36, '2021-01-28 19:03:42', '2020-11-03 00:23:10'),
(98, '/storage/upload/O3DtEtuSYH7oJcFX69mZRqFDAFFKpoaQUfcnL5Fj.jpg', 36, '2021-01-28 19:03:47', '2020-11-03 00:23:10'),
(99, '/storage/upload/VUCe1yzBfzeaqZkJFEriCXXrbjljRgrGcdP458OU.jpg', 37, '2021-01-28 19:03:52', '2020-11-03 00:29:34'),
(100, '/storage/upload/TKZ5mkZlU2HHhbFug7oQTze613p23L4JvXEdYVjY.jpg', 38, '2021-01-28 19:03:56', '2020-11-03 00:36:06'),
(101, '/storage/upload/egf7ZsABmEEZ7Qf2vtdKXxGU6FghGgngRIftC67q.jpg', 38, '2021-01-28 19:04:01', '2020-11-03 00:36:06'),
(102, '/storage/upload/oruTvxRmAAk3aLx9MyqUSRxlf5VR8LUYV6myd5rn.jpg', 39, '2021-01-28 19:04:07', '2020-11-03 00:42:25'),
(103, '/storage/upload/TwF5T4GB8TMUooGM3E39zJl8iBZ7brfc4KWhTEKD.jpg', 40, '2021-01-28 19:04:11', '2020-11-03 00:44:55'),
(104, '/storage/upload/wIYOvldOeAtCjA70lYRv45i0V1LMQ3ELBPQj8flU.jpg', 40, '2021-01-28 19:04:14', '2020-11-03 00:44:55'),
(105, '/storage/upload/f9AtrfQl1EYIowJTZXZqIwnmGrJwop6yho8RyA5o.jpg', 41, '2021-01-28 19:04:20', '2020-11-03 00:48:33'),
(106, '/storage/upload/f5vGZifs5KKXtMM7H5e7q8iSt2XGLdyyROINrJRt.jpg', 41, '2021-01-28 19:04:25', '2020-11-03 00:48:42'),
(107, '/storage/upload/ZIwwER58C6WlKzl3f50Zmn7iKmb2S4X4FWdLgJBu.jpg', 42, '2021-01-28 19:04:29', '2020-11-03 00:52:12'),
(108, '/storage/upload/Hl2HEw7HpigfmFEExHkUtCNObwxGsCgxzyU0Q3sW.jpg', 43, '2021-01-28 19:04:35', '2020-11-03 00:56:48'),
(109, '/storage/upload/x9V7Byzs0VVyP4f9pDmVpvF9OIA1aYyp6bV2h0KP.jpg', 44, '2021-01-28 19:04:41', '2020-11-03 00:58:15'),
(110, '/storage/upload/B2kqTSEhGnnwbDf8ME4K2I4sjOiLUfWKXU3QwxHD.jpg', 44, '2021-01-28 19:04:46', '2020-11-03 00:58:15'),
(111, '/storage/upload/pGGLQq1B4aAvsdMyUi8l1n3ZDe0AE5H0LnuVuBU1.jpg', 45, '2021-01-28 19:04:54', '2020-11-03 01:00:51'),
(112, '/storage/upload/7gAKvvdvCL4IWaToyRV7DAuZsGuhLL9JpJyVKemR.jpg', 46, '2021-01-28 19:05:02', '2020-11-03 01:20:54'),
(113, '/storage/upload/cCHbVrlo8bElipwdjcuCY2c776LvKU5VydASannO.jpg', 46, '2021-01-28 19:05:08', '2020-11-03 01:20:54'),
(114, '/storage/upload/kzLxys0Rpeb2QYFj75fsO30nhdjMcSUBpFPk7Ic6.jpg', 47, '2021-01-28 19:05:14', '2020-11-03 01:26:20'),
(115, '/storage/upload/epNDjdZxIM5jx6WRgqeq1zft0XuA6hlVesZeXQVY.jpg', 47, '2021-01-28 19:05:19', '2020-11-03 01:26:20'),
(116, '/storage/upload/EXY6fYPPY88nIsiASWQfFLb4WiofzPSZlV2zdJdQ.jpg', 48, '2021-01-28 19:05:23', '2020-11-03 01:30:17'),
(117, '/storage/upload/JYoC6Jadqglj2G4HwKGjv5gK8wCRs48gvgVjvJYw.jpg', 48, '2021-01-28 19:05:39', '2020-11-03 01:30:17'),
(118, '/storage/upload/Tu4j55D4ShvqnTTaeXmEAqPt2B33kqljk5y4NCfi.jpg', 49, '2021-01-28 19:05:44', '2020-11-03 01:32:35'),
(119, '/storage/upload/8KhMxL55nC3vlawqFwcP6fwIJRKjxO8DILRsDqBp.jpg', 49, '2021-01-28 19:05:48', '2020-11-03 01:32:35'),
(120, '/storage/upload/mSlv3Fmm48LnELJLKESHiINlVWzSyHeyTAoFPXVH.jpg', 50, '2021-01-28 19:05:52', '2020-11-03 01:34:32'),
(121, '/storage/upload/1dSQGa0sq0XYBXzDBXqTHT0dX1xDQF8pHgRq0Dbk.jpg', 50, '2021-01-28 19:05:58', '2020-11-03 01:34:32'),
(122, '/storage/upload/w32Rs26hmTqAyJfYxbRbEUvxfXmsb1lFlq6jcJI9.jpg', 50, '2021-01-28 19:06:02', '2020-11-03 01:34:32'),
(123, '/storage/upload/y0c1a0NWx4aaQTbgaYR1lzjYKYJt7Zsyye8fXplf.jpg', 50, '2021-01-28 19:06:07', '2020-11-03 01:34:32'),
(124, '/storage/upload/jqMgU2FmHnPyO1xzDYRJbuQSgM3BOWm28CjNpta5.jpg', 51, '2021-01-28 19:06:12', '2020-11-03 01:36:27'),
(125, '/storage/upload/OcFLYoRytrxd4YF4Y50pQ8rSJrigpraeO63N76uU.jpg', 51, '2021-01-28 19:06:16', '2020-11-03 01:36:27'),
(126, '/storage/upload/bu9Yrua3i6TjJ9gUdxVv4xoH4SlH8CcGdxL01tBw.jpg', 52, '2021-01-28 19:06:20', '2020-11-03 01:38:10'),
(127, '/storage/upload/5GoTLV20aNKA3Ap3vqjKTszeWjDJvPR1wqyCT6FN.jpg', 53, '2021-01-28 19:06:26', '2020-11-03 01:41:51'),
(128, '/storage/upload/hH2dgORo8jtFuk0Y09AhQAlbiER6L0InLpbxyt5U.jpg', 53, '2021-01-28 19:06:36', '2020-11-03 01:41:51'),
(129, '/storage/upload/fq6sHZav85O0Mkuop4yMoG6cmLhYCr9bA704jKXi.jpg', 54, '2021-01-28 19:06:42', '2020-11-03 01:44:11'),
(130, '/storage/upload/3atuqRVnS87BPeMegXKC9ehRi4LjDnHZqeNkaFbU.jpg', 54, '2021-01-28 19:06:48', '2020-11-03 01:44:11'),
(131, '/storage/upload/fyCDJcM8hECk3Rl5vQoXrqVyLBByWwV232hDQrJN.jpg', 55, '2021-01-28 19:06:53', '2020-11-03 03:06:36'),
(132, '/storage/upload/owssY1FRKM3hnfKsCyujNVfFFnxkFBUJlBJVuUv0.jpg', 55, '2021-01-28 19:06:57', '2020-11-03 03:06:36'),
(133, '/storage/upload/zQRf80MhALkqmU1VnCgP4D26JpjZuUaYfG6rCyLt.jpg', 56, '2021-01-28 19:07:01', '2020-11-03 03:08:25'),
(134, '/storage/upload/xe2io4Tca3c4NHvEuEFUDzvD0pPOyHXnoUq0PN2r.jpg', 57, '2021-01-28 19:07:18', '2020-11-03 03:10:18'),
(135, '/storage/upload/M5efylOBXJt5iu5QwaTonxNNDyTNDzYvSHC4j2xU.jpg', 57, '2021-01-28 19:07:24', '2020-11-03 03:10:18'),
(136, '/storage/upload/rUHwCCMgMG0RJ3rcq88Ie5w1xBP4Qdpz89i12Tj3.jpg', 58, '2021-01-28 19:07:30', '2020-11-03 03:20:57'),
(137, '/storage/upload/b3dYQqguHunjz09yxtZRhpxX74XwikvV2efef9ON.jpg', 58, '2021-01-28 19:07:36', '2020-11-03 03:20:57'),
(138, '/storage/upload/PMkWFf38ssRmxIQrqkbx0GnDLEe9XXL5TBDh8yUL.jpg', 59, '2021-01-28 19:07:40', '2020-11-03 03:23:31'),
(139, '/storage/upload/f3f8xiXQevBcVZZYwhyoTiwc7Zvq0n8v0vXeXTk7.jpg', 60, '2021-01-28 19:07:44', '2020-11-03 03:25:08'),
(140, '/storage/upload/7NPqE4ralNIbqgNmcPMxaMiu3KpWnalcqcumxJsJ.jpg', 60, '2021-01-28 19:07:51', '2020-11-03 03:25:08'),
(141, '/storage/upload/f3vZs3K0WMSgp1ktcH6guzrMS3pAUg4sjVseZZ9c.jpg', 61, '2021-01-28 19:07:56', '2020-11-03 03:26:15'),
(142, '/storage/upload/GenHYZgl8BmLV2bt1jNH1qLDgdS2gO8teOYzdlgz.jpg', 61, '2021-01-28 19:08:17', '2020-11-03 03:26:15'),
(143, '/storage/upload/SZ52JC8DosAPK1m0qjJWHfAptgwMyRCQSb3ZDsgD.jpg', 62, '2021-01-28 19:08:25', '2020-11-03 04:11:41'),
(144, '/storage/upload/zA1lBktNpjwveDlp6ZgIZeMcu28YUXnpUjPc1yD1.jpg', 62, '2021-01-28 19:08:29', '2020-11-03 04:11:41'),
(145, '/storage/upload/m8cGqqQ8ZKDdaS81cVYW3dIfiMrFo8SL55AqYIDY.jpg', 63, '2021-01-28 19:08:43', '2020-11-03 04:13:19'),
(146, '/storage/upload/EjQ7NxasvV3yUwgcQXeWCp0iOKQPmfcZznudu0ZE.jpg', 63, '2021-01-28 19:08:47', '2020-11-03 04:13:19'),
(147, '/storage/upload/g7GuMC83DJ5TVDvNX28mhPYJMrXzxLSsARWMZ7pM.jpg', 63, '2021-01-28 19:08:52', '2020-11-03 04:13:19'),
(148, '/storage/upload/KM3wn5X2QaZxr1zc7hCRDWkF2AKBvSK50cfO1jGv.jpg', 64, '2021-01-28 19:08:58', '2020-11-03 04:14:42'),
(149, '/storage/upload/f3N2aVMd1eYSuH1s3blXU0mk4SnkpmC4hmj4hAhJ.jpg', 64, '2021-01-28 19:09:19', '2020-11-03 04:14:42'),
(150, '/storage/upload/vAgNumy9XeeRg0jcAUarjpesIFSed1Z2GIc0UV5D.jpg', 64, '2021-01-28 19:09:24', '2020-11-03 04:14:42'),
(151, '/storage/upload/t4x5QQ9l80T75TTJ8WeiwLmiGGEfyjC6dFMMV6vu.jpg', 65, '2021-01-28 19:09:30', '2020-11-03 04:17:41'),
(152, '/storage/upload/JeMtVjSmj32Np5rM0Gorn0t71iRujMurZRfxyGFI.jpg', 65, '2021-01-28 19:09:37', '2020-11-03 04:17:41'),
(153, '/storage/upload/EgiNSgKfZhGl6KkQxPq9HjNq1ZuownJBOBzNkwsa.jpg', 65, '2021-01-28 19:09:43', '2020-11-03 04:17:41'),
(154, '/storage/upload/yPWlIlxlzuQftbzOxMVf3fSgXSwB4m1v5caP0XEb.jpg', 66, '2021-01-28 19:09:52', '2020-11-03 04:18:47'),
(155, '/storage/upload/uRtwf3ssYeGIwKTRxJLmN9AoAmIJjbnZChCu7Zv3.jpg', 66, '2021-01-28 19:09:59', '2020-11-03 04:18:47'),
(156, '/storage/upload/DUHiTrZLczLylToefXvNQLFynwQkGE4dcoRskDnP.jpg', 67, '2021-01-28 19:10:10', '2020-11-03 04:20:26'),
(157, '/storage/upload/JedSsZxN5NWRkuG3Nd053wgOOMtPevMe7yjxirSn.jpg', 67, '2021-01-28 19:10:21', '2020-11-03 04:20:26'),
(158, '/storage/upload/wDMmbRtYB66elbhGDT3o015s3kMUOKrXjdmAr7ZY.jpg', 68, '2021-01-28 19:12:22', '2021-01-13 01:43:27'),
(166, '/storage/upload/8XJW9yGBV78eJaMFuT9dJJSsYaggbXCD4CSgz8lL.jpg', 69, '2021-03-21 00:26:33', '2021-03-21 00:26:33'),
(167, '/storage/upload/ovbP6Xmewg8cxfhuM2TVilOSBGYF7rXZ22pFAzzq.jpg', 69, '2021-03-21 00:26:45', '2021-03-21 00:26:45'),
(169, '/storage/upload/U9qgGdhtsWXXqPXzs4Z8gTmLZr8PQCNFlC48FjRI.jpg', 70, '2021-03-21 20:47:03', '2021-03-21 20:47:03'),
(172, '/storage/upload/40maQgjKIrohr7PG1A49bFAlukWqlOzQvtU2ZcJC.jpg', 71, '2021-03-21 20:50:44', '2021-03-21 20:50:44'),
(173, '/storage/upload/Mifzfi2WTWMZriRoUfcZK9TwPOxC4YWYEXFlGpVL.jpg', 71, '2021-03-21 20:51:48', '2021-03-21 20:51:48'),
(175, '/storage/upload/fGOhUmwNzGhRhe04ucZfLMzjI3hlpaM4JqF6Gpwi.jpg', 70, '2021-03-21 21:01:06', '2021-03-21 21:01:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `generos`
--

CREATE TABLE `generos` (
  `idgeneros` int(11) NOT NULL,
  `genero` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `generos`
--

INSERT INTO `generos` (`idgeneros`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Feminino'),
(3, 'Qualquer Gênero');

-- --------------------------------------------------------

--
-- Estrutura para tabela `informacoesempresas`
--

CREATE TABLE `informacoesempresas` (
  `id` int(11) NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sobreaempresa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `informacoesempresas`
--

INSERT INTO `informacoesempresas` (`id`, `endereco`, `telefone`, `email`, `sobreaempresa`, `created_at`, `updated_at`) VALUES
(1, 'Rua Saul Brandalise, Videira, Santa Catarina', 'Somente Direct  Instagram, Inbox facebook ou chat', 'suporte@apego.store', 'Somos um brechó online situado no centro de Videira sem loja física, iniciamos nosso e-commerce em 2021 tendo como objetivo crescer gradualmente atendendo nossos clientes da melhor forma possível, fazemos entrega em domicilio sem custos adicionais, para saber mais envie mensagem ao nosso chat ou entre em contato em nosso Instagram.', '2021-03-17 07:18:51', '2021-03-17 07:18:51');

-- --------------------------------------------------------

--
-- Estrutura para tabela `informacoeslayouts`
--

CREATE TABLE `informacoeslayouts` (
  `id` int(11) NOT NULL,
  `linkinstagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkyoutube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linktwitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkfacebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frasehome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `informacoeslayouts`
--

INSERT INTO `informacoeslayouts` (`id`, `linkinstagram`, `linkyoutube`, `linktwitter`, `linkfacebook`, `frasehome`, `created_at`, `updated_at`) VALUES
(1, 'https://www.instagram.com/__seuapego__/', '/', '/', 'https://www.facebook.com/apego.store.page', 'Nosso desapego, seu apego. Vendas em Videira/SC. Preços baratinhos e produtos de qualidade! Fazemos Entregas.', '2021-03-18 06:15:35', '2021-03-18 06:15:35');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagseguros`
--

CREATE TABLE `pagseguros` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `pagseguros`
--

INSERT INTO `pagseguros` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Módulos de Pagamento Desativado', 'eyJpdiI6ImpnVzVjZXlJb3I2ME9uMGw0d1NncUE9PSIsInZhbHVlIjoiMzBGRFNodktpQmc2VFp0QU9XdjdMQlBjQlBwYzY5d3VvS2U3QjI1WG1BNjZGS0dTMlZvVjVZeXI4UTRPeldidyIsIm1hYyI6ImQ0ZmU4MGQ3MjI1MTZkNDc4YzA2YWZiYzk5MDg5ZTRjMGYwMmE5ZjBlNGNhYWZjOTQwOTdhYzA4MWQ4OWY2OGUifQ==', '2021-03-18 06:15:35', '2021-03-18 06:15:35');

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedidos` int(11) NOT NULL,
  `numeroitens` int(11) NOT NULL,
  `tipotransacao` int(11) NOT NULL,
  `numeroparcelas` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valortotal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valorrecebido` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxapagseguro` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_idstatus` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`idpedidos`, `numeroitens`, `tipotransacao`, `numeroparcelas`, `link`, `valortotal`, `valorrecebido`, `taxapagseguro`, `date`, `status_idstatus`, `code`, `users_id`, `updated_at`, `created_at`) VALUES
(17, 3, 100, 1, NULL, '45.00', '45.00', '0', '2021-02-21 03:11:24', 103, '0', 4, '2021-02-21 03:55:57', '2021-02-21 18:25:24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `idprodutos` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brevedescricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `tamanhos_idtamanhos` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generos_idgeneros` int(11) NOT NULL,
  `categorias_idcategorias` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `descricaodetalhada` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`idprodutos`, `nome`, `brevedescricao`, `preco`, `avaliacao`, `tamanhos_idtamanhos`, `quantidade`, `foto`, `generos_idgeneros`, `categorias_idcategorias`, `created_at`, `updated_at`, `descricaodetalhada`) VALUES
(34, 'Saia preta com botões dourados', 'Usada poucas vezes', '15,00', 5, 2, 0, '/storage/upload/B6sR1PI8WahKfN8n0NR7AloQz5lFvn0MNkgZph9u.jpg', 2, 1, '2021-01-28 18:58:39', '2020-11-03 18:26:33', ''),
(35, 'Jaqueta jeans da Bad Cat', 'Em ótimo estado', '20,00', NULL, 3, 0, '/storage/upload/ENF4oLzoAMFuFtSlngWVqPcX9Ftl7TGKe1vbPYXd.jpg', 2, 10, '2021-01-28 18:58:46', '2020-11-03 18:25:29', ''),
(36, 'Blusinha estampada', 'usada somente uma vez', '25,00', NULL, 1, 1, '/storage/upload/AECLVS9mrTHp59Mt94yrBo8OQmPpFvPhpoZJm1Nf.jpg', 2, 5, '2021-01-28 18:58:51', '2020-11-03 00:23:10', ''),
(37, 'Cropped de crochê', 'usado poucas vezes', '20,00', NULL, 1, 1, '/storage/upload/VUCe1yzBfzeaqZkJFEriCXXrbjljRgrGcdP458OU.jpg', 2, 8, '2021-01-28 18:58:56', '2020-11-03 00:29:33', ''),
(38, 'Blusinha brilhante', 'blusa nunca usada, \"saia é vendida separada\"', '20,00', NULL, 3, 1, '/storage/upload/TKZ5mkZlU2HHhbFug7oQTze613p23L4JvXEdYVjY.jpg', 2, 5, '2021-01-28 18:59:01', '2020-11-03 00:49:40', ''),
(39, 'Calção jeans', 'azul', '20,00', NULL, 10, 1, '/storage/upload/oruTvxRmAAk3aLx9MyqUSRxlf5VR8LUYV6myd5rn.jpg', 2, 2, '2021-01-28 18:59:06', '2020-11-03 03:28:07', ''),
(40, 'Colete jeans', 'azul', '25,00', NULL, 4, 1, '/storage/upload/TwF5T4GB8TMUooGM3E39zJl8iBZ7brfc4KWhTEKD.jpg', 2, 7, '2021-01-28 18:59:12', '2020-11-03 00:44:54', ''),
(41, 'Saia Vermelha', 'poucas vezes usada, \"blusa é vendida separada\"', '15,00', NULL, 3, 1, '/storage/upload/f9AtrfQl1EYIowJTZXZqIwnmGrJwop6yho8RyA5o.jpg', 2, 1, '2021-01-28 18:59:36', '2020-11-03 00:49:09', ''),
(42, 'Saia jeans', 'azul', '20,00', NULL, 2, 1, '/storage/upload/ZIwwER58C6WlKzl3f50Zmn7iKmb2S4X4FWdLgJBu.jpg', 2, 1, '2021-01-28 18:59:41', '2020-11-03 00:52:12', ''),
(43, 'Blusa nueva york', 'peça poucas vezes usada', '25,00', NULL, 2, 1, '/storage/upload/Hl2HEw7HpigfmFEExHkUtCNObwxGsCgxzyU0Q3sW.jpg', 2, 5, '2021-01-28 18:59:47', '2020-11-03 00:56:48', ''),
(44, 'Colete jeans', 'peça usada poucas vezes', '10,00', 3, 2, 0, '/storage/upload/x9V7Byzs0VVyP4f9pDmVpvF9OIA1aYyp6bV2h0KP.jpg', 2, 7, '2021-01-28 18:59:51', '2020-11-03 18:26:28', ''),
(45, 'Blusa jeans ombro a ombro', 'azul', '20,00', NULL, 2, 1, '/storage/upload/pGGLQq1B4aAvsdMyUi8l1n3ZDe0AE5H0LnuVuBU1.jpg', 2, 5, '2021-01-28 18:59:56', '2020-11-03 01:00:51', ''),
(46, 'Casaco de moletom', 'Nunca usado', '20,00', NULL, 2, 1, '/storage/upload/7gAKvvdvCL4IWaToyRV7DAuZsGuhLL9JpJyVKemR.jpg', 2, 11, '2021-01-28 19:00:04', '2020-11-03 01:20:54', ''),
(47, 'Saia preta', 'nunca usada', '25,00', NULL, 2, 1, '/storage/upload/kzLxys0Rpeb2QYFj75fsO30nhdjMcSUBpFPk7Ic6.jpg', 2, 1, '2021-01-28 19:00:11', '2020-11-03 01:26:19', ''),
(48, 'Saia estampada', 'usada somente uma vez', '25,00', NULL, 2, 1, '/storage/upload/EXY6fYPPY88nIsiASWQfFLb4WiofzPSZlV2zdJdQ.jpg', 2, 1, '2021-01-28 19:00:23', '2020-11-03 01:30:17', ''),
(49, 'Short saia social', 'preto', '25,00', NULL, 2, 1, '/storage/upload/Tu4j55D4ShvqnTTaeXmEAqPt2B33kqljk5y4NCfi.jpg', 2, 2, '2021-01-28 19:00:33', '2020-11-03 01:32:35', ''),
(50, 'Cropped', 'Nunca usado', '50,00', NULL, 3, 1, '/storage/upload/mSlv3Fmm48LnELJLKESHiINlVWzSyHeyTAoFPXVH.jpg', 2, 8, '2021-01-28 19:00:38', '2020-11-03 01:34:31', ''),
(51, 'Body', 'Usado 2 vezes', '30,00', NULL, 3, 1, '/storage/upload/jqMgU2FmHnPyO1xzDYRJbuQSgM3BOWm28CjNpta5.jpg', 2, 4, '2021-01-28 19:00:43', '2020-11-03 01:36:26', ''),
(52, 'Blusa de renda', 'Usada 1 vez', '20,00', NULL, 3, 1, '/storage/upload/bu9Yrua3i6TjJ9gUdxVv4xoH4SlH8CcGdxL01tBw.jpg', 2, 5, '2021-01-28 19:00:48', '2020-11-03 01:38:10', ''),
(53, 'Corta vento cropped', 'nunca usada', '40,00', NULL, 3, 0, '/storage/upload/5GoTLV20aNKA3Ap3vqjKTszeWjDJvPR1wqyCT6FN.jpg', 2, 8, '2021-03-20 21:06:03', '2021-03-20 21:06:03', 'nunca usada'),
(54, 'Blusinha social', 'usada uma vez', '25,00', NULL, 3, 1, '/storage/upload/fq6sHZav85O0Mkuop4yMoG6cmLhYCr9bA704jKXi.jpg', 2, 5, '2021-01-28 19:00:57', '2020-11-03 01:44:10', ''),
(55, 'Vestido', 'nunca usado', '25,00', NULL, 2, 1, '/storage/upload/fyCDJcM8hECk3Rl5vQoXrqVyLBByWwV232hDQrJN.jpg', 2, 3, '2021-01-28 19:01:01', '2020-11-03 03:06:35', ''),
(56, 'Colete jeans Bad Cat', 'Usado uma única vez, Veste P/M', '20,00', NULL, 3, 1, '/storage/upload/zQRf80MhALkqmU1VnCgP4D26JpjZuUaYfG6rCyLt.jpg', 2, 7, '2021-01-28 19:01:06', '2020-11-03 03:29:47', ''),
(57, 'Cropped', 'preto', '15,00', NULL, 2, 0, '/storage/upload/xe2io4Tca3c4NHvEuEFUDzvD0pPOyHXnoUq0PN2r.jpg', 2, 8, '2021-03-20 21:07:16', '2021-03-20 21:07:16', 'preto'),
(58, 'Sapato Cravo e Canela', 'Usado poucas vezes', '40,00', NULL, 11, 1, '/storage/upload/rUHwCCMgMG0RJ3rcq88Ie5w1xBP4Qdpz89i12Tj3.jpg', 2, 9, '2021-01-28 19:01:18', '2020-11-03 03:20:57', ''),
(59, 'Moletom', 'NUNCA usado, novo', '50,00', NULL, 2, 0, '/storage/upload/PMkWFf38ssRmxIQrqkbx0GnDLEe9XXL5TBDh8yUL.jpg', 2, 6, '2021-03-20 21:05:23', '2021-03-20 21:05:23', 'NUNCA usado, novo'),
(60, 'Moletom larguinho', 'é GG mas serve em M e G', '15,00', NULL, 5, 0, '/storage/upload/f3f8xiXQevBcVZZYwhyoTiwc7Zvq0n8v0vXeXTk7.jpg', 2, 6, '2021-03-20 21:04:46', '2021-03-20 21:04:46', 'é GG mas serve em M e G'),
(61, 'Blusa de lã', 'veste M e G', '25,00', NULL, 3, 1, '/storage/upload/f3vZs3K0WMSgp1ktcH6guzrMS3pAUg4sjVseZZ9c.jpg', 2, 5, '2021-01-28 19:01:47', '2020-11-03 03:44:52', ''),
(62, 'Jardineira short saia', 'usado somente uma vez', '30,00', NULL, 12, 1, '/storage/upload/SZ52JC8DosAPK1m0qjJWHfAptgwMyRCQSb3ZDsgD.jpg', 2, 2, '2021-01-28 19:01:51', '2020-11-03 04:11:39', ''),
(63, 'Body com detalhe no pescoço', 'tamanho G mas serve M também', '20,00', NULL, 4, 1, '/storage/upload/m8cGqqQ8ZKDdaS81cVYW3dIfiMrFo8SL55AqYIDY.jpg', 2, 4, '2021-01-28 19:01:58', '2020-11-03 04:13:19', ''),
(64, 'Vestido estampado', 'Serve P e M', '15,00', NULL, 2, 1, '/storage/upload/KM3wn5X2QaZxr1zc7hCRDWkF2AKBvSK50cfO1jGv.jpg', 2, 3, '2021-01-28 19:02:03', '2020-11-03 04:14:41', ''),
(65, 'Vestido', 'Usado só uma vez', '50,00', NULL, 2, 1, '/storage/upload/t4x5QQ9l80T75TTJ8WeiwLmiGGEfyjC6dFMMV6vu.jpg', 2, 3, '2021-01-28 19:02:09', '2020-11-03 04:17:40', ''),
(66, 'Shorts', 'amarelo', '15,00', NULL, 3, 1, '/storage/upload/yPWlIlxlzuQftbzOxMVf3fSgXSwB4m1v5caP0XEb.jpg', 2, 2, '2021-01-28 19:02:14', '2020-11-03 04:18:47', ''),
(67, 'Saia cintura alta', 'nunca usada', '20,00', NULL, 3, 1, '/storage/upload/DUHiTrZLczLylToefXvNQLFynwQkGE4dcoRskDnP.jpg', 2, 1, '2021-01-28 19:02:19', '2020-11-03 04:20:25', ''),
(68, 'Melissa original', 'Número 33/34', '40,00', NULL, 8, 0, '/storage/upload/wDMmbRtYB66elbhGDT3o015s3kMUOKrXjdmAr7ZY.jpg', 2, 9, '2021-03-20 21:04:07', '2021-03-20 21:04:07', 'Número 33/34'),
(69, 'Camisa Apego', 'Camisa nova, nunca usada', '30,00', NULL, 3, 0, '/storage/upload/8XJW9yGBV78eJaMFuT9dJJSsYaggbXCD4CSgz8lL.jpg', 2, 15, '2021-04-20 18:24:54', '2021-04-20 18:24:54', 'Camisa nova, nunca usada'),
(70, 'Bermuda Levis', 'Poucas vezes usada', '65,00', NULL, 14, 1, '/storage/upload/U9qgGdhtsWXXqPXzs4Z8gTmLZr8PQCNFlC48FjRI.jpg', 1, 13, '2021-03-21 20:47:03', '2021-03-21 20:47:03', 'Poucas vezes usada'),
(71, 'Camisa Docthos', 'Excelente qualidade e boa marca', '75,00', NULL, 3, 1, '/storage/upload/40maQgjKIrohr7PG1A49bFAlukWqlOzQvtU2ZcJC.jpg', 1, 15, '2021-03-21 20:50:44', '2021-03-21 20:50:44', 'Excelente qualidade e boa marca');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status`
--

CREATE TABLE `status` (
  `idstatus` int(11) NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `status`
--

INSERT INTO `status` (`idstatus`, `status`) VALUES
(1, 'Aguardando pagamento'),
(2, 'Em análise'),
(3, 'Pagamento Aprovado'),
(4, 'Disponível'),
(5, 'Em disputa'),
(6, 'Transação Devolvida'),
(7, 'Transação Cancelada'),
(8, 'Debitado'),
(9, 'Retenção temporária'),
(100, 'Pedido Será Pago na Entrega (Aguardando)'),
(101, 'Pedido Saiu para Entrega'),
(102, 'Não foi Possível Concluir a Entrega, Uma Nova Tentativa Será Feita'),
(103, 'Pedido Entregue'),
(104, 'Pedido Cancelado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `suportes`
--

CREATE TABLE `suportes` (
  `idsuportes` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensagem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `resposta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `suportes`
--

INSERT INTO `suportes` (`idsuportes`, `nome`, `email`, `mensagem`, `status`, `resposta`, `created_at`, `updated_at`) VALUES
(4, 'Scarlett', 'wo.rd.p.re.ss4.5.54.85+ablentador@gmail.com', 'Hi,\r\n\r\nAre you utilizing Wordpress/Woocommerce or maybe do you actually plan to make use of it later ? We provide more than 2500 premium plugins but also themes to download : http://shortmm.buzz/4VMhK\r\n\r\nCheers,\r\n\r\nScarlett', 0, NULL, '2021-04-22 14:22:31', '2021-04-22 14:22:31'),
(5, 'Glen', 'info@apego.store', 'Hello there\r\n\r\nCAREDOGBEST™ - Personalized Dog Harness. All sizes from XS to XXL.  Easy ON/OFF in just 2 seconds.  LIFETIME WARRANTY.\r\n\r\nClick here: caredogbest.online\r\n\r\nKind Regards,\r\n\r\nGlen\r\nApego', 0, NULL, '2021-05-27 19:14:32', '2021-05-27 19:14:32'),
(6, 'Vincent', 'vincent@apego.store', 'Good day \r\n \r\nProviding Premium sunglasses only $19.99 for the next 24 Hours ONLY.  60% OFF today with free worldwide shipping.\r\n\r\nGet Yours: trendshades.online\r\n \r\nHave a great time, \r\n \r\nVincent\r\nApego', 0, NULL, '2021-06-03 03:31:25', '2021-06-03 03:31:25'),
(7, 'Wanda', 'wanda@bestlocaldata.com', 'Hello,\r\n\r\nIt is with sad regret to inform you that BestLocalData.com is shutting down.\r\n\r\nWe have made all our databases for sale for a once-off price.\r\n\r\nVisit our website to get the best bargain of your life. BestLocalData.com\r\n\r\nRegards,\r\nWanda', 0, NULL, '2021-06-08 11:01:50', '2021-06-08 11:01:50'),
(8, 'Delilah', 'goris.delilah43@yahoo.com', 'Hey there \r\n \r\nBuy all styles of Ray-Ban Sunglasses only 24.99 dollars with FREE SHIPPING & Returns.  If interested, please visit our site: lensoutlet.online\r\n \r\nSincerely, \r\n\r\nDelilah \r\nApego', 0, NULL, '2021-07-30 06:50:17', '2021-07-30 06:50:17'),
(9, 'Wendy', 'wendy.bastyan@gmail.com', 'Good Morning \r\n \r\nCAREDOGBEST™ - Personalized Dog Harness. All sizes from XS to XXL.  Easy ON/OFF in just 2 seconds.  LIFETIME WARRANTY.\r\n\r\nClick here: caredogbest.com\r\n \r\nThe Best, \r\n \r\nWendy\r\nApego', 0, NULL, '2021-08-03 08:18:10', '2021-08-03 08:18:10'),
(10, 'Michell', 'dalgety.michell@gmail.com', 'Hello\r\n\r\nBuy medical disposable face mask to protect your loved ones from the deadly CoronaVirus.  The price is $0.28 each.  If interested, please check our site: pharmacyoutlets.online\r\n\r\nThe Best,\r\n\r\nMichell', 0, NULL, '2021-08-21 20:19:10', '2021-08-21 20:19:10'),
(11, 'Kristian', 'christmas.kristian@gmail.com', 'Hello \r\n\r\n50% OFF!! Hurry to get your Baseball Cap Now!\r\n\r\nThese Caps are SO cool! Perfect for this Summer!\r\n\r\nFree worldwide shipping!\r\n\r\nGET IT HERE: capshop.online\r\n\r\nTo your success, \r\n \r\nKristian', 0, NULL, '2021-09-02 14:47:16', '2021-09-02 14:47:16'),
(12, 'Georgianna', 'georgianna.garten@gmail.com', 'Color-changing swimshorts \r\n\r\nDive into the ocean and your swimshorts suddenly change color! These swimshorts ara AMAZING!\r\n\r\nHurry! 50% Off Worldwide For Limited Time Only!\r\n\r\nGet it here: coolshorts.online\r\n\r\nHave a great time, \r\n\r\nGeorgianna', 0, NULL, '2021-09-05 20:09:37', '2021-09-05 20:09:37'),
(13, 'Brandi', 'georgina.brandi@hotmail.com', 'EASE YOUR PAIN IN 10 MINUTES EFFORTLESSLY\r\n\r\nBe Free from Neck Pain! Try NeckFlexer & Relieve Neck Pain Effortlessly In 10 Min!\r\n\r\nSave 50% OFF + FREE Worldwide Shipping\r\n\r\nShop Now: neckflexer.online\r\n\r\nThe Best, \r\n\r\nBrandi', 0, NULL, '2021-10-04 16:59:21', '2021-10-04 16:59:21'),
(14, 'Levi', 'levimasel@gmail.com', 'Hi\r\n\r\nOur Medical-Grade Toenail Clippers is the safest and especially recommended for those with troubles with winding nails, hard nails, two nails, nail cracks, deep nails, thickened nails etc..\r\n\r\nGet yours: thepodiatrist.store\r\n\r\nThe Best,\r\n\r\nLevi', 0, NULL, '2021-10-23 22:06:24', '2021-10-23 22:06:24'),
(15, 'Ismael', 'general@businessleads101.com', 'We have a one time limited offer.\r\n\r\n366,295,395 Leads for $20!\r\n\r\nBusinessLeads101.com!', 0, NULL, '2021-10-26 17:23:36', '2021-10-26 17:23:36'),
(16, 'Sherri', 'webulkmailer@gmail.com', 'Hey, want to send unlimited emails monthly? \r\n\r\n1) Clean IP\r\n2) Domain\r\n3) Full Cpanel access\r\n\r\nVisit us. \r\n\r\nwww.tinyurl.com/MarketingUnlimited', 0, NULL, '2021-11-01 21:25:21', '2021-11-01 21:25:21'),
(17, 'Alicia', 'oconnell.alicia@gmail.com', 'Good Morning \r\n\r\nBody Revolution - Medico Postura™ Body Posture Corrector\r\n\r\nImprove Your Posture INSTANTLY!\r\n\r\nGet it while it\'s still 60% OFF!  FREE Worldwide Shipping!\r\n\r\nGet yours here: medicopostura.com\r\n\r\nThe Best, \r\n \r\nAlicia\r\nApego', 0, NULL, '2021-11-03 04:21:40', '2021-11-03 04:21:40'),
(18, 'Mac', 'mac.krawczyk@gmail.com', 'Hello!\r\n\r\nLimited Time Offer - Complete LinkedIn Leads - $49\r\n\r\nhttps://tinyurl.com/LinkedInDatabase', 0, NULL, '2021-11-03 12:37:16', '2021-11-03 12:37:16'),
(19, 'Miriam', 'miriam.longwell@yahoo.com', 'Hey \r\n\r\nDefrost frozen foods in minutes safely and naturally with our THAW KING™. \r\n\r\n50% OFF for the next 24 Hours ONLY + FREE Worldwide Shipping for a LIMITED time.\r\n\r\nBuy now: thawking.online\r\n\r\nSincerely, \r\n\r\nMiriam', 0, NULL, '2021-11-06 06:43:09', '2021-11-06 06:43:09'),
(20, 'Carmen', 'carmen@q-mails.com', 'Hi from Q-Mails.com!\r\n\r\nWho can I speak to you in your company regarding dedicated bulk email services?\r\n\r\nWe have once off packages and subscription based models.\r\n\r\nStarting at $79 for 1 million emails recurring or $99 for once off.\r\n\r\nRegards,\r\nCarmen', 0, NULL, '2021-11-08 19:35:19', '2021-11-08 19:35:19'),
(21, 'Lea', 'info@channelchiefs.ca', 'Morning \r\n \r\nMeet your best Buds - True Wireless Earbuds with amazing sound, convenience, portability, & affordability!\r\n\r\nOrder yours now at 50% OFF with FREE Shipping: https://musicontrol.store\r\n \r\nMany Thanks, \r\n \r\nLea', 0, NULL, '2021-11-12 00:21:27', '2021-11-12 00:21:27');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tamanhos`
--

CREATE TABLE `tamanhos` (
  `idtamanhos` int(11) NOT NULL,
  `tamanho` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tamanhos`
--

INSERT INTO `tamanhos` (`idtamanhos`, `tamanho`) VALUES
(1, 'PP'),
(2, 'P'),
(3, 'M'),
(4, 'G'),
(5, 'GG'),
(6, 'XGG'),
(7, '33'),
(8, '34'),
(9, '35'),
(10, '36'),
(11, '37'),
(12, '38'),
(13, '39'),
(14, '40'),
(15, '41'),
(16, '42'),
(17, '43'),
(18, '44'),
(19, '45'),
(20, '46'),
(21, '47'),
(22, 'outros');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rua` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complemento` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datadenascimento` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `telefone`, `datadenascimento`, `cpf`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'qwerty', 'qwerty', 'Videira-SC', 'asda', 'sadasd', 'asda', 'asd', '(99)99999-9999', '2000-03-12', '999.999.999-99', 'teste@teste.com', '2020-10-25 23:38:17', '$2y$10$A6ChFkdhOJbnBvioUYn/xuH8rQaAm60/ktZA2tngMAL35kxlCqXby', NULL, '2020-10-16 08:53:45', '2020-10-16 08:53:45'),
(29, 'apego', 'fffff', 'Videira-SC', '12312', '12312', '12312', '12312', '(11)11111-1111', '2020-10-12', '222.222.222-22', 'apego@apego.com', '2020-10-26 06:12:12', '$2y$10$bqaJPJmHdYOK7aPYwyHRf.Bo8gSGELrfLD8E1mz5mSCO8q/537SAi', 'bKzNL0ZjNsCk1XeSvbOCX8qWJlvFc9t90SydYkGbA3cBME45T8aJMGQcV8oC', '2020-10-26 06:10:07', '2020-10-27 07:36:37');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategorias`);

--
-- Índices de tabela `comprados`
--
ALTER TABLE `comprados`
  ADD PRIMARY KEY (`idcomprados`);

--
-- Índices de tabela `dadosusuarios`
--
ALTER TABLE `dadosusuarios`
  ADD PRIMARY KEY (`iddadosusuarios`);

--
-- Índices de tabela `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`idemails`);

--
-- Índices de tabela `formasdepagamentos`
--
ALTER TABLE `formasdepagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`idfotos`);

--
-- Índices de tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`idgeneros`);

--
-- Índices de tabela `informacoesempresas`
--
ALTER TABLE `informacoesempresas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `informacoeslayouts`
--
ALTER TABLE `informacoeslayouts`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pagseguros`
--
ALTER TABLE `pagseguros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedidos`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idprodutos`);

--
-- Índices de tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idstatus`);

--
-- Índices de tabela `suportes`
--
ALTER TABLE `suportes`
  ADD PRIMARY KEY (`idsuportes`);

--
-- Índices de tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  ADD PRIMARY KEY (`idtamanhos`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `comprados`
--
ALTER TABLE `comprados`
  MODIFY `idcomprados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `dadosusuarios`
--
ALTER TABLE `dadosusuarios`
  MODIFY `iddadosusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `emails`
--
ALTER TABLE `emails`
  MODIFY `idemails` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `formasdepagamentos`
--
ALTER TABLE `formasdepagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fotos`
--
ALTER TABLE `fotos`
  MODIFY `idfotos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `idgeneros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `informacoesempresas`
--
ALTER TABLE `informacoesempresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `informacoeslayouts`
--
ALTER TABLE `informacoeslayouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pagseguros`
--
ALTER TABLE `pagseguros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idprodutos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de tabela `suportes`
--
ALTER TABLE `suportes`
  MODIFY `idsuportes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  MODIFY `idtamanhos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
