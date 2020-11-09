-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Administrador',	'admin@site.com',	NULL,	'$2y$10$4B1h8SjnlE3v7NuVCjNVh.xZfhnGalmXuyNpqAnhHyFuNxVS9LdO.',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `idcategorias` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idcategorias`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categorias` (`idcategorias`, `nome`) VALUES
(1,	'saia'),
(2,	'shorts'),
(3,	'vestido'),
(4,	'body'),
(5,	'blusa'),
(6,	'moletom'),
(7,	'colete'),
(8,	'cropped'),
(9,	'calçados'),
(10,	'jaqueta'),
(11,	'casaco'),
(12,	'terno'),
(13,	'bermuda'),
(14,	'calça'),
(15,	'camisa'),
(16,	'colar'),
(17,	'pulseira'),
(18,	'jóia'),
(19,	'acessorios'),
(20,	'outros');

DROP TABLE IF EXISTS `comprados`;
CREATE TABLE `comprados` (
  `idcomprados` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) DEFAULT NULL,
  `pedidos_idpedidos` int(11) NOT NULL,
  `produtos_idprodutos` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`idcomprados`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comprados` (`idcomprados`, `quantidade`, `pedidos_idpedidos`, `produtos_idprodutos`, `updated_at`, `created_at`) VALUES
(12,	1,	17,	44,	'2020-11-03 18:25:29',	'2020-11-03 18:25:29'),
(13,	1,	17,	34,	'2020-11-03 18:25:29',	'2020-11-03 18:25:29'),
(14,	1,	17,	35,	'2020-11-03 18:25:29',	'2020-11-03 18:25:29');

DROP TABLE IF EXISTS `dadosusuarios`;
CREATE TABLE `dadosusuarios` (
  `iddadosusuarios` int(11) NOT NULL,
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
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `dadosusuarios` (`iddadosusuarios`, `nome`, `sobrenome`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `telefone`, `datadenascimento`, `cpf`, `created_at`, `updated_at`) VALUES
(4,	'Joao',	'Joao',	'Videira-SC',	'centro',	'Rua Brasil',	'120',	NULL,	'(99)99999-9999',	'2000-03-12',	'999.999.999-99',	'0000-00-00 00:00:00',	'2020-11-02 23:20:39'),
(29,	'apego',	'fffff',	'Videira-SC',	'12312',	'123',	'12312',	'12312',	'(12)34567-8910',	'2020-10-12',	'222.222.222-22',	'2020-10-26 06:10:07',	'2020-10-27 17:05:01');

DROP TABLE IF EXISTS `emails`;
CREATE TABLE `emails` (
  `idemails` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`idemails`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `fotos`;
CREATE TABLE `fotos` (
  `idfotos` int(11) NOT NULL AUTO_INCREMENT,
  `fotos` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `produtos_idprodutos` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`idfotos`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `fotos` (`idfotos`, `fotos`, `produtos_idprodutos`, `updated_at`, `created_at`) VALUES
(92,	'/storage/upload/B6sR1PI8WahKfN8n0NR7AloQz5lFvn0MNkgZph9u.png',	34,	'2020-11-03 00:01:26',	'2020-11-03 00:01:26'),
(93,	'/storage/upload/eIZsszGkZoVhRiwNO3YlQq3YN7Dizas5ybfhpkzf.png',	34,	'2020-11-03 00:01:26',	'2020-11-03 00:01:26'),
(94,	'/storage/upload/ENF4oLzoAMFuFtSlngWVqPcX9Ftl7TGKe1vbPYXd.png',	35,	'2020-11-03 00:04:49',	'2020-11-03 00:04:49'),
(95,	'/storage/upload/R7Q7Z4XJ9x1uwQR2ZnwERlLi3sIJ67wivNG4WfpH.png',	35,	'2020-11-03 00:04:49',	'2020-11-03 00:04:49'),
(96,	'/storage/upload/AECLVS9mrTHp59Mt94yrBo8OQmPpFvPhpoZJm1Nf.png',	36,	'2020-11-03 00:23:10',	'2020-11-03 00:23:10'),
(97,	'/storage/upload/aBo0hr1p2wfMwinqvaxSbFbVSOAgjLRdDNf2xDwv.png',	36,	'2020-11-03 00:23:10',	'2020-11-03 00:23:10'),
(98,	'/storage/upload/O3DtEtuSYH7oJcFX69mZRqFDAFFKpoaQUfcnL5Fj.png',	36,	'2020-11-03 00:23:10',	'2020-11-03 00:23:10'),
(99,	'/storage/upload/VUCe1yzBfzeaqZkJFEriCXXrbjljRgrGcdP458OU.png',	37,	'2020-11-03 00:29:34',	'2020-11-03 00:29:34'),
(100,	'/storage/upload/TKZ5mkZlU2HHhbFug7oQTze613p23L4JvXEdYVjY.png',	38,	'2020-11-03 00:36:06',	'2020-11-03 00:36:06'),
(101,	'/storage/upload/egf7ZsABmEEZ7Qf2vtdKXxGU6FghGgngRIftC67q.png',	38,	'2020-11-03 00:36:06',	'2020-11-03 00:36:06'),
(102,	'/storage/upload/oruTvxRmAAk3aLx9MyqUSRxlf5VR8LUYV6myd5rn.png',	39,	'2020-11-03 00:42:25',	'2020-11-03 00:42:25'),
(103,	'/storage/upload/TwF5T4GB8TMUooGM3E39zJl8iBZ7brfc4KWhTEKD.png',	40,	'2020-11-03 00:44:55',	'2020-11-03 00:44:55'),
(104,	'/storage/upload/wIYOvldOeAtCjA70lYRv45i0V1LMQ3ELBPQj8flU.png',	40,	'2020-11-03 00:44:55',	'2020-11-03 00:44:55'),
(105,	'/storage/upload/f9AtrfQl1EYIowJTZXZqIwnmGrJwop6yho8RyA5o.png',	41,	'2020-11-03 00:48:33',	'2020-11-03 00:48:33'),
(106,	'/storage/upload/f5vGZifs5KKXtMM7H5e7q8iSt2XGLdyyROINrJRt.png',	41,	'2020-11-03 00:48:42',	'2020-11-03 00:48:42'),
(107,	'/storage/upload/ZIwwER58C6WlKzl3f50Zmn7iKmb2S4X4FWdLgJBu.png',	42,	'2020-11-03 00:52:12',	'2020-11-03 00:52:12'),
(108,	'/storage/upload/Hl2HEw7HpigfmFEExHkUtCNObwxGsCgxzyU0Q3sW.png',	43,	'2020-11-03 00:56:48',	'2020-11-03 00:56:48'),
(109,	'/storage/upload/x9V7Byzs0VVyP4f9pDmVpvF9OIA1aYyp6bV2h0KP.png',	44,	'2020-11-03 00:58:15',	'2020-11-03 00:58:15'),
(110,	'/storage/upload/B2kqTSEhGnnwbDf8ME4K2I4sjOiLUfWKXU3QwxHD.png',	44,	'2020-11-03 00:58:15',	'2020-11-03 00:58:15'),
(111,	'/storage/upload/pGGLQq1B4aAvsdMyUi8l1n3ZDe0AE5H0LnuVuBU1.png',	45,	'2020-11-03 01:00:51',	'2020-11-03 01:00:51'),
(112,	'/storage/upload/7gAKvvdvCL4IWaToyRV7DAuZsGuhLL9JpJyVKemR.png',	46,	'2020-11-03 01:20:54',	'2020-11-03 01:20:54'),
(113,	'/storage/upload/cCHbVrlo8bElipwdjcuCY2c776LvKU5VydASannO.png',	46,	'2020-11-03 01:20:54',	'2020-11-03 01:20:54'),
(114,	'/storage/upload/kzLxys0Rpeb2QYFj75fsO30nhdjMcSUBpFPk7Ic6.png',	47,	'2020-11-03 01:26:20',	'2020-11-03 01:26:20'),
(115,	'/storage/upload/epNDjdZxIM5jx6WRgqeq1zft0XuA6hlVesZeXQVY.png',	47,	'2020-11-03 01:26:20',	'2020-11-03 01:26:20'),
(116,	'/storage/upload/EXY6fYPPY88nIsiASWQfFLb4WiofzPSZlV2zdJdQ.png',	48,	'2020-11-03 01:30:17',	'2020-11-03 01:30:17'),
(117,	'/storage/upload/JYoC6Jadqglj2G4HwKGjv5gK8wCRs48gvgVjvJYw.png',	48,	'2020-11-03 01:30:17',	'2020-11-03 01:30:17'),
(118,	'/storage/upload/Tu4j55D4ShvqnTTaeXmEAqPt2B33kqljk5y4NCfi.png',	49,	'2020-11-03 01:32:35',	'2020-11-03 01:32:35'),
(119,	'/storage/upload/8KhMxL55nC3vlawqFwcP6fwIJRKjxO8DILRsDqBp.png',	49,	'2020-11-03 01:32:35',	'2020-11-03 01:32:35'),
(120,	'/storage/upload/mSlv3Fmm48LnELJLKESHiINlVWzSyHeyTAoFPXVH.png',	50,	'2020-11-03 01:34:32',	'2020-11-03 01:34:32'),
(121,	'/storage/upload/1dSQGa0sq0XYBXzDBXqTHT0dX1xDQF8pHgRq0Dbk.png',	50,	'2020-11-03 01:34:32',	'2020-11-03 01:34:32'),
(122,	'/storage/upload/w32Rs26hmTqAyJfYxbRbEUvxfXmsb1lFlq6jcJI9.png',	50,	'2020-11-03 01:34:32',	'2020-11-03 01:34:32'),
(123,	'/storage/upload/y0c1a0NWx4aaQTbgaYR1lzjYKYJt7Zsyye8fXplf.png',	50,	'2020-11-03 01:34:32',	'2020-11-03 01:34:32'),
(124,	'/storage/upload/jqMgU2FmHnPyO1xzDYRJbuQSgM3BOWm28CjNpta5.png',	51,	'2020-11-03 01:36:27',	'2020-11-03 01:36:27'),
(125,	'/storage/upload/OcFLYoRytrxd4YF4Y50pQ8rSJrigpraeO63N76uU.png',	51,	'2020-11-03 01:36:27',	'2020-11-03 01:36:27'),
(126,	'/storage/upload/bu9Yrua3i6TjJ9gUdxVv4xoH4SlH8CcGdxL01tBw.png',	52,	'2020-11-03 01:38:10',	'2020-11-03 01:38:10'),
(127,	'/storage/upload/5GoTLV20aNKA3Ap3vqjKTszeWjDJvPR1wqyCT6FN.png',	53,	'2020-11-03 01:41:51',	'2020-11-03 01:41:51'),
(128,	'/storage/upload/hH2dgORo8jtFuk0Y09AhQAlbiER6L0InLpbxyt5U.png',	53,	'2020-11-03 01:41:51',	'2020-11-03 01:41:51'),
(129,	'/storage/upload/fq6sHZav85O0Mkuop4yMoG6cmLhYCr9bA704jKXi.png',	54,	'2020-11-03 01:44:11',	'2020-11-03 01:44:11'),
(130,	'/storage/upload/3atuqRVnS87BPeMegXKC9ehRi4LjDnHZqeNkaFbU.png',	54,	'2020-11-03 01:44:11',	'2020-11-03 01:44:11'),
(131,	'/storage/upload/fyCDJcM8hECk3Rl5vQoXrqVyLBByWwV232hDQrJN.png',	55,	'2020-11-03 03:06:36',	'2020-11-03 03:06:36'),
(132,	'/storage/upload/owssY1FRKM3hnfKsCyujNVfFFnxkFBUJlBJVuUv0.png',	55,	'2020-11-03 03:06:36',	'2020-11-03 03:06:36'),
(133,	'/storage/upload/zQRf80MhALkqmU1VnCgP4D26JpjZuUaYfG6rCyLt.png',	56,	'2020-11-03 03:08:25',	'2020-11-03 03:08:25'),
(134,	'/storage/upload/xe2io4Tca3c4NHvEuEFUDzvD0pPOyHXnoUq0PN2r.png',	57,	'2020-11-03 03:10:18',	'2020-11-03 03:10:18'),
(135,	'/storage/upload/M5efylOBXJt5iu5QwaTonxNNDyTNDzYvSHC4j2xU.png',	57,	'2020-11-03 03:10:18',	'2020-11-03 03:10:18'),
(136,	'/storage/upload/rUHwCCMgMG0RJ3rcq88Ie5w1xBP4Qdpz89i12Tj3.png',	58,	'2020-11-03 03:20:57',	'2020-11-03 03:20:57'),
(137,	'/storage/upload/b3dYQqguHunjz09yxtZRhpxX74XwikvV2efef9ON.png',	58,	'2020-11-03 03:20:57',	'2020-11-03 03:20:57'),
(138,	'/storage/upload/PMkWFf38ssRmxIQrqkbx0GnDLEe9XXL5TBDh8yUL.png',	59,	'2020-11-03 03:23:31',	'2020-11-03 03:23:31'),
(139,	'/storage/upload/f3f8xiXQevBcVZZYwhyoTiwc7Zvq0n8v0vXeXTk7.png',	60,	'2020-11-03 03:25:08',	'2020-11-03 03:25:08'),
(140,	'/storage/upload/7NPqE4ralNIbqgNmcPMxaMiu3KpWnalcqcumxJsJ.png',	60,	'2020-11-03 03:25:08',	'2020-11-03 03:25:08'),
(141,	'/storage/upload/f3vZs3K0WMSgp1ktcH6guzrMS3pAUg4sjVseZZ9c.png',	61,	'2020-11-03 03:26:15',	'2020-11-03 03:26:15'),
(142,	'/storage/upload/GenHYZgl8BmLV2bt1jNH1qLDgdS2gO8teOYzdlgz.png',	61,	'2020-11-03 03:26:15',	'2020-11-03 03:26:15'),
(143,	'/storage/upload/SZ52JC8DosAPK1m0qjJWHfAptgwMyRCQSb3ZDsgD.png',	62,	'2020-11-03 04:11:41',	'2020-11-03 04:11:41'),
(144,	'/storage/upload/zA1lBktNpjwveDlp6ZgIZeMcu28YUXnpUjPc1yD1.png',	62,	'2020-11-03 04:11:41',	'2020-11-03 04:11:41'),
(145,	'/storage/upload/m8cGqqQ8ZKDdaS81cVYW3dIfiMrFo8SL55AqYIDY.png',	63,	'2020-11-03 04:13:19',	'2020-11-03 04:13:19'),
(146,	'/storage/upload/EjQ7NxasvV3yUwgcQXeWCp0iOKQPmfcZznudu0ZE.png',	63,	'2020-11-03 04:13:19',	'2020-11-03 04:13:19'),
(147,	'/storage/upload/g7GuMC83DJ5TVDvNX28mhPYJMrXzxLSsARWMZ7pM.png',	63,	'2020-11-03 04:13:19',	'2020-11-03 04:13:19'),
(148,	'/storage/upload/KM3wn5X2QaZxr1zc7hCRDWkF2AKBvSK50cfO1jGv.png',	64,	'2020-11-03 04:14:42',	'2020-11-03 04:14:42'),
(149,	'/storage/upload/f3N2aVMd1eYSuH1s3blXU0mk4SnkpmC4hmj4hAhJ.png',	64,	'2020-11-03 04:14:42',	'2020-11-03 04:14:42'),
(150,	'/storage/upload/vAgNumy9XeeRg0jcAUarjpesIFSed1Z2GIc0UV5D.png',	64,	'2020-11-03 04:14:42',	'2020-11-03 04:14:42'),
(151,	'/storage/upload/t4x5QQ9l80T75TTJ8WeiwLmiGGEfyjC6dFMMV6vu.png',	65,	'2020-11-03 04:17:41',	'2020-11-03 04:17:41'),
(152,	'/storage/upload/JeMtVjSmj32Np5rM0Gorn0t71iRujMurZRfxyGFI.png',	65,	'2020-11-03 04:17:41',	'2020-11-03 04:17:41'),
(153,	'/storage/upload/EgiNSgKfZhGl6KkQxPq9HjNq1ZuownJBOBzNkwsa.png',	65,	'2020-11-03 04:17:41',	'2020-11-03 04:17:41'),
(154,	'/storage/upload/yPWlIlxlzuQftbzOxMVf3fSgXSwB4m1v5caP0XEb.png',	66,	'2020-11-03 04:18:47',	'2020-11-03 04:18:47'),
(155,	'/storage/upload/uRtwf3ssYeGIwKTRxJLmN9AoAmIJjbnZChCu7Zv3.png',	66,	'2020-11-03 04:18:47',	'2020-11-03 04:18:47'),
(156,	'/storage/upload/DUHiTrZLczLylToefXvNQLFynwQkGE4dcoRskDnP.png',	67,	'2020-11-03 04:20:26',	'2020-11-03 04:20:26'),
(157,	'/storage/upload/JedSsZxN5NWRkuG3Nd053wgOOMtPevMe7yjxirSn.png',	67,	'2020-11-03 04:20:26',	'2020-11-03 04:20:26');

DROP TABLE IF EXISTS `generos`;
CREATE TABLE `generos` (
  `idgeneros` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idgeneros`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `generos` (`idgeneros`, `genero`) VALUES
(1,	'Masculino'),
(2,	'Feminino'),
(3,	'Qualquer Gênero');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos` (
  `idpedidos` int(11) NOT NULL AUTO_INCREMENT,
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
  `users_id` int(10) unsigned NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`idpedidos`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pedidos` (`idpedidos`, `numeroitens`, `tipotransacao`, `numeroparcelas`, `link`, `valortotal`, `valorrecebido`, `taxapagseguro`, `date`, `status_idstatus`, `code`, `users_id`, `updated_at`, `created_at`) VALUES
(17,	3,	100,	1,	NULL,	'45.00',	'45.00',	'0',	'2020-11-03 03:11:24',	101,	'0',	4,	'2020-11-03 18:30:59',	'2020-11-03 18:25:24');

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `idprodutos` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `tamanhos_idtamanhos` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generos_idgeneros` int(11) NOT NULL,
  `categorias_idcategorias` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`idprodutos`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `produtos` (`idprodutos`, `nome`, `descricao`, `preco`, `avaliacao`, `tamanhos_idtamanhos`, `quantidade`, `foto`, `generos_idgeneros`, `categorias_idcategorias`, `created_at`, `updated_at`) VALUES
(34,	'Saia preta com botões dourados',	'Usada poucas vezes',	'15,00',	5,	2,	0,	'/storage/upload/B6sR1PI8WahKfN8n0NR7AloQz5lFvn0MNkgZph9u.png',	2,	1,	'2020-11-03 00:01:26',	'2020-11-03 18:26:33'),
(35,	'Jaqueta jeans da Bad Cat',	'Em ótimo estado',	'20,00',	NULL,	3,	0,	'/storage/upload/ENF4oLzoAMFuFtSlngWVqPcX9Ftl7TGKe1vbPYXd.png',	2,	10,	'2020-11-03 00:04:48',	'2020-11-03 18:25:29'),
(36,	'Blusinha estampada',	'usada somente uma vez',	'25,00',	NULL,	1,	1,	'/storage/upload/AECLVS9mrTHp59Mt94yrBo8OQmPpFvPhpoZJm1Nf.png',	2,	5,	'2020-11-03 00:23:10',	'2020-11-03 00:23:10'),
(37,	'Cropped de crochê',	'usado poucas vezes',	'20,00',	NULL,	1,	1,	'/storage/upload/VUCe1yzBfzeaqZkJFEriCXXrbjljRgrGcdP458OU.png',	2,	8,	'2020-11-03 00:29:33',	'2020-11-03 00:29:33'),
(38,	'Blusinha brilhante',	'blusa nunca usada, \"saia é vendida separada\"',	'20,00',	NULL,	3,	1,	'/storage/upload/TKZ5mkZlU2HHhbFug7oQTze613p23L4JvXEdYVjY.png',	2,	5,	'2020-11-03 00:36:05',	'2020-11-03 00:49:40'),
(39,	'Calção jeans',	'azul',	'20,00',	NULL,	10,	1,	'/storage/upload/oruTvxRmAAk3aLx9MyqUSRxlf5VR8LUYV6myd5rn.png',	2,	2,	'2020-11-03 00:42:25',	'2020-11-03 03:28:07'),
(40,	'Colete jeans',	'azul',	'25,00',	NULL,	4,	1,	'/storage/upload/TwF5T4GB8TMUooGM3E39zJl8iBZ7brfc4KWhTEKD.png',	2,	7,	'2020-11-03 00:44:54',	'2020-11-03 00:44:54'),
(41,	'Saia Vermelha',	'poucas vezes usada, \"blusa é vendida separada\"',	'15,00',	NULL,	3,	1,	'/storage/upload/f9AtrfQl1EYIowJTZXZqIwnmGrJwop6yho8RyA5o.png',	2,	1,	'2020-11-03 00:47:21',	'2020-11-03 00:49:09'),
(42,	'Saia jeans',	'azul',	'20,00',	NULL,	2,	1,	'/storage/upload/ZIwwER58C6WlKzl3f50Zmn7iKmb2S4X4FWdLgJBu.png',	2,	1,	'2020-11-03 00:52:12',	'2020-11-03 00:52:12'),
(43,	'Blusa nueva york',	'peça poucas vezes usada',	'25,00',	NULL,	2,	1,	'/storage/upload/Hl2HEw7HpigfmFEExHkUtCNObwxGsCgxzyU0Q3sW.png',	2,	5,	'2020-11-03 00:56:48',	'2020-11-03 00:56:48'),
(44,	'Colete jeans',	'peça usada poucas vezes',	'10,00',	3,	2,	0,	'/storage/upload/x9V7Byzs0VVyP4f9pDmVpvF9OIA1aYyp6bV2h0KP.png',	2,	7,	'2020-11-03 00:58:15',	'2020-11-03 18:26:28'),
(45,	'Blusa jeans ombro a ombro',	'azul',	'20,00',	NULL,	2,	1,	'/storage/upload/pGGLQq1B4aAvsdMyUi8l1n3ZDe0AE5H0LnuVuBU1.png',	2,	5,	'2020-11-03 01:00:51',	'2020-11-03 01:00:51'),
(46,	'Casaco de moletom',	'Nunca usado',	'20,00',	NULL,	2,	1,	'/storage/upload/7gAKvvdvCL4IWaToyRV7DAuZsGuhLL9JpJyVKemR.png',	2,	11,	'2020-11-03 01:20:54',	'2020-11-03 01:20:54'),
(47,	'Saia preta',	'nunca usada',	'25,00',	NULL,	2,	1,	'/storage/upload/kzLxys0Rpeb2QYFj75fsO30nhdjMcSUBpFPk7Ic6.png',	2,	1,	'2020-11-03 01:26:19',	'2020-11-03 01:26:19'),
(48,	'Saia estampada',	'usada somente uma vez',	'25,00',	NULL,	2,	1,	'/storage/upload/EXY6fYPPY88nIsiASWQfFLb4WiofzPSZlV2zdJdQ.png',	2,	1,	'2020-11-03 01:30:17',	'2020-11-03 01:30:17'),
(49,	'Short saia social',	'preto',	'25,00',	NULL,	2,	1,	'/storage/upload/Tu4j55D4ShvqnTTaeXmEAqPt2B33kqljk5y4NCfi.png',	2,	2,	'2020-11-03 01:32:35',	'2020-11-03 01:32:35'),
(50,	'Cropped',	'Nunca usado',	'50,00',	NULL,	3,	1,	'/storage/upload/mSlv3Fmm48LnELJLKESHiINlVWzSyHeyTAoFPXVH.png',	2,	8,	'2020-11-03 01:34:31',	'2020-11-03 01:34:31'),
(51,	'Body',	'Usado 2 vezes',	'30,00',	NULL,	3,	1,	'/storage/upload/jqMgU2FmHnPyO1xzDYRJbuQSgM3BOWm28CjNpta5.png',	2,	4,	'2020-11-03 01:36:26',	'2020-11-03 01:36:26'),
(52,	'Blusa de renda',	'Usada 1 vez',	'20,00',	NULL,	3,	1,	'/storage/upload/bu9Yrua3i6TjJ9gUdxVv4xoH4SlH8CcGdxL01tBw.png',	2,	5,	'2020-11-03 01:38:10',	'2020-11-03 01:38:10'),
(53,	'Corta vento cropped',	'nunca usada',	'40,00',	NULL,	3,	1,	'/storage/upload/5GoTLV20aNKA3Ap3vqjKTszeWjDJvPR1wqyCT6FN.png',	2,	8,	'2020-11-03 01:41:50',	'2020-11-03 01:41:50'),
(54,	'Blusinha social',	'usada uma vez',	'25,00',	NULL,	3,	1,	'/storage/upload/fq6sHZav85O0Mkuop4yMoG6cmLhYCr9bA704jKXi.png',	2,	5,	'2020-11-03 01:44:10',	'2020-11-03 01:44:10'),
(55,	'Vestido',	'nunca usado',	'25,00',	NULL,	2,	1,	'/storage/upload/fyCDJcM8hECk3Rl5vQoXrqVyLBByWwV232hDQrJN.png',	2,	3,	'2020-11-03 03:06:35',	'2020-11-03 03:06:35'),
(56,	'Colete jeans Bad Cat',	'Usado uma única vez, Veste P/M',	'20,00',	NULL,	3,	1,	'/storage/upload/zQRf80MhALkqmU1VnCgP4D26JpjZuUaYfG6rCyLt.png',	2,	7,	'2020-11-03 03:08:24',	'2020-11-03 03:29:47'),
(57,	'Cropped',	'preto',	'15,00',	NULL,	2,	1,	'/storage/upload/xe2io4Tca3c4NHvEuEFUDzvD0pPOyHXnoUq0PN2r.png',	2,	8,	'2020-11-03 03:10:18',	'2020-11-03 03:10:18'),
(58,	'Sapato Cravo e Canela',	'Usado poucas vezes',	'40,00',	NULL,	11,	1,	'/storage/upload/rUHwCCMgMG0RJ3rcq88Ie5w1xBP4Qdpz89i12Tj3.png',	2,	9,	'2020-11-03 03:20:57',	'2020-11-03 03:20:57'),
(59,	'Moletom',	'NUNCA usado, novo',	'50,00',	NULL,	2,	1,	'/storage/upload/PMkWFf38ssRmxIQrqkbx0GnDLEe9XXL5TBDh8yUL.png',	2,	6,	'2020-11-03 03:23:31',	'2020-11-03 03:23:31'),
(60,	'Moletom larguinho',	'é GG mas serve em M e G',	'15,00',	NULL,	5,	1,	'/storage/upload/f3f8xiXQevBcVZZYwhyoTiwc7Zvq0n8v0vXeXTk7.png',	2,	6,	'2020-11-03 03:25:08',	'2020-11-03 03:25:08'),
(61,	'Blusa de lã',	'veste M e G',	'25,00',	NULL,	3,	1,	'/storage/upload/f3vZs3K0WMSgp1ktcH6guzrMS3pAUg4sjVseZZ9c.png',	2,	5,	'2020-11-03 03:26:15',	'2020-11-03 03:44:52'),
(62,	'Jardineira short saia',	'usado somente uma vez',	'30,00',	NULL,	12,	1,	'/storage/upload/SZ52JC8DosAPK1m0qjJWHfAptgwMyRCQSb3ZDsgD.png',	2,	2,	'2020-11-03 04:11:39',	'2020-11-03 04:11:39'),
(63,	'Body com detalhe no pescoço',	'tamanho G mas serve M também',	'20,00',	NULL,	4,	1,	'/storage/upload/m8cGqqQ8ZKDdaS81cVYW3dIfiMrFo8SL55AqYIDY.png',	2,	4,	'2020-11-03 04:13:19',	'2020-11-03 04:13:19'),
(64,	'Vestido estampado',	'Serve P e M',	'15,00',	NULL,	2,	1,	'/storage/upload/KM3wn5X2QaZxr1zc7hCRDWkF2AKBvSK50cfO1jGv.png',	2,	3,	'2020-11-03 04:14:41',	'2020-11-03 04:14:41'),
(65,	'Vestido',	'Usado só uma vez',	'50,00',	NULL,	2,	1,	'/storage/upload/t4x5QQ9l80T75TTJ8WeiwLmiGGEfyjC6dFMMV6vu.png',	2,	3,	'2020-11-03 04:17:40',	'2020-11-03 04:17:40'),
(66,	'Shorts',	'amarelo',	'15,00',	NULL,	3,	1,	'/storage/upload/yPWlIlxlzuQftbzOxMVf3fSgXSwB4m1v5caP0XEb.png',	2,	2,	'2020-11-03 04:18:47',	'2020-11-03 04:18:47'),
(67,	'Saia cintura alta',	'nunca usada',	'20,00',	NULL,	3,	1,	'/storage/upload/DUHiTrZLczLylToefXvNQLFynwQkGE4dcoRskDnP.png',	2,	1,	'2020-11-03 04:20:25',	'2020-11-03 04:20:25');

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `idstatus` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `status` (`idstatus`, `status`) VALUES
(1,	'Aguardando pagamento'),
(2,	'Em análise'),
(3,	'Pagamento Aprovado'),
(4,	'Disponível'),
(5,	'Em disputa'),
(6,	'Transação Devolvida'),
(7,	'Transação Cancelada'),
(8,	'Debitado'),
(9,	'Retenção temporária'),
(100,	'Pedido Será Pago na Entrega'),
(101,	'Pedido Entregue ao Cliente');

DROP TABLE IF EXISTS `suportes`;
CREATE TABLE `suportes` (
  `idsuportes` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensagem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `resposta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`idsuportes`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `tamanhos`;
CREATE TABLE `tamanhos` (
  `idtamanhos` int(11) NOT NULL AUTO_INCREMENT,
  `tamanho` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idtamanhos`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tamanhos` (`idtamanhos`, `tamanho`) VALUES
(1,	'PP'),
(2,	'P'),
(3,	'M'),
(4,	'G'),
(5,	'GG'),
(6,	'XGG'),
(7,	'33'),
(8,	'34'),
(9,	'35'),
(10,	'36'),
(11,	'37'),
(12,	'38'),
(13,	'39'),
(14,	'40'),
(15,	'41'),
(16,	'42'),
(17,	'43'),
(18,	'44'),
(19,	'45'),
(20,	'46'),
(21,	'47'),
(22,	'outros');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `lastname`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `telefone`, `datadenascimento`, `cpf`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4,	'qwerty',	'qwerty',	'Videira-SC',	'asda',	'sadasd',	'asda',	'asd',	'(99)99999-9999',	'2000-03-12',	'999.999.999-99',	'joao@joao.com',	'2020-10-25 23:38:17',	'$2y$10$A6ChFkdhOJbnBvioUYn/xuH8rQaAm60/ktZA2tngMAL35kxlCqXby',	NULL,	'2020-10-16 08:53:45',	'2020-10-16 08:53:45'),
(29,	'apego',	'fffff',	'Videira-SC',	'12312',	'12312',	'12312',	'12312',	'(11)11111-1111',	'2020-10-12',	'222.222.222-22',	'apego@apego.com',	'2020-10-26 06:12:12',	'$2y$10$bqaJPJmHdYOK7aPYwyHRf.Bo8gSGELrfLD8E1mz5mSCO8q/537SAi',	'bKzNL0ZjNsCk1XeSvbOCX8qWJlvFc9t90SydYkGbA3cBME45T8aJMGQcV8oC',	'2020-10-26 06:10:07',	'2020-10-27 07:36:37');

-- 2020-11-03 15:40:45
