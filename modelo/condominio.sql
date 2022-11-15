-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Nov-2022 às 18:46
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `condominio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblAdmin`
--

DROP TABLE IF EXISTS `tblAdmin`;
CREATE TABLE IF NOT EXISTS `tblAdmin` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `NomeAdmin` varchar(45) DEFAULT NULL,
  `NomeUsuario` char(45) DEFAULT NULL,
  `Telefone` bigint(11) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Cadastrado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblAdmin`
--

INSERT INTO `tblAdmin` (`ID`, `NomeAdmin`, `NomeUsuario`, `Telefone`, `Email`, `Password`, `Cadastrado`) VALUES
(1, 'Admin user', 'admin', 77999609915, 'admin@gmail.com', '698dc19d489c4e4db73e28a713eab07b', '2022-11-10 06:26:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblVisitante`
--

DROP TABLE IF EXISTS `tblVisitante`;
CREATE TABLE IF NOT EXISTS `tblVisitante` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `NomeVisitante` varchar(120) DEFAULT NULL,
  `Telefone` bigint(11) DEFAULT NULL,
  `Endereco` varchar(250) DEFAULT NULL,
  `Apartamento` varchar(120) NOT NULL,
  `Andar` varchar(120) NOT NULL,
  `VisitarQuem` varchar(120) DEFAULT NULL,
  `MotivoDaVisita` varchar(120) DEFAULT NULL,
  `Entrada` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Observacao` varchar(255) DEFAULT NULL,
  `Saida` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblVisitante`
--

INSERT INTO `tblVisitante` (`ID`, `NomeVisitante`, `Telefone`, `Endereco`, `Apartamento`, `Andar`, `VisitarQuem`, `MotivoDaVisita`, `Entrada`, `Observacao`, `Saida`) VALUES
(1, 'Sonia Rebeca Assis', 77987718206, 'Rua Nove, 16,  bairro Espirito Santo CEP 45038-375 Vitoria da Conquista - BA', '08', '2  D', 'Claudia Isadora Gabrielly', 'Visitar a Prima', '2022-10-12 17:11:53', 'OK.', '2022-10-12 22:11:35'),
(2, 'Luciana Yasmin Martins', 77983242283, 'Rua Treze, 22, Distrito Industrial CEP 45089-265 Vitoria da Coquista - BA', '02', '1  D', 'Ricardo Vinicius Martins', 'Visitar o Amigo', '2022-11-10 16:41:05', 'saida ok', '2022-11-10 22:11:35'),
(3, 'Benjamin Renato Monteiro', 77997881219, 'Av Reis Pacheco, 1205, CEP 45061-580, Centro Vitoria da Conquista BA', '06', '2  E', 'Carlos Anthony Monteiro', 'Visitar o Filho', '2022-11-11 06:42:40', '', '2022-11-14 20:33:51'),
(4, 'Luis Ricardo da Costa', 77986490126, 'Pizzaria Afonso rua OOtavio Santos, 302, Recreio  CEP 45052-226, Vitoria da Conquista - BA', '08', '2 D', 'Claudia Isadora Gabrielly', 'Entrega Dellivery', '2022-11-13 23:52:09', 'Entrega ok', '2022-11-13 23:59:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
