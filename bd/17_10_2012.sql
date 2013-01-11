-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Out 17, 2012 as 05:03 PM
-- Versão do Servidor: 5.1.47
-- Versão do PHP: 5.3.3-2

create database ciec_bd;

use ciec_bd;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `ciec_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(8) NOT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `email` (`email`,`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curriculo_cadastrado`
--

CREATE TABLE IF NOT EXISTS `curriculo_cadastrado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_egresso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `id_area` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `instituicao` int(11) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `instituicao` (`instituicao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso_egresso`
--

CREATE TABLE IF NOT EXISTS `curso_egresso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_egresso` int(11) NOT NULL,
  `curso` int(4) NOT NULL,
  `anoformacao` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curso` (`curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=165 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_ciec`
--

CREATE TABLE IF NOT EXISTS `dados_ciec` (
  `nome` varchar(100) NOT NULL,
  `fone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `quemsomos` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_gerais`
--

CREATE TABLE IF NOT EXISTS `dados_gerais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_egresso` int(11) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `data_nasc` varchar(10) NOT NULL,
  `estado_civil` varchar(10) NOT NULL,
  `habilitacao` varchar(2) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao` varchar(50) NOT NULL,
  `nomeFantasia` varchar(100) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `insc_estadual` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `site` varchar(100) NOT NULL,
  `fone` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `representante` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(50) NOT NULL,
  `num` varchar(10) NOT NULL,
  `complemento` varchar(10) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cep` varchar(8) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `experiencia`
--

CREATE TABLE IF NOT EXISTS `experiencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_egresso` int(11) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `data_inicial` varchar(15) NOT NULL,
  `data_final` varchar(15) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `atividades` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ex_aluno`
--

CREATE TABLE IF NOT EXISTS `ex_aluno` (
  `ex_aluno_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `cadastrado` int(1) DEFAULT NULL,
  PRIMARY KEY (`ex_aluno_id`),
  UNIQUE KEY `nome` (`nome`,`cpf`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=184 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ex_aluno_curso`
--

CREATE TABLE IF NOT EXISTS `ex_aluno_curso` (
  `cid` int(11) NOT NULL,
  `ex_aluno_id` int(11) NOT NULL,
  `matricula` varchar(6) NOT NULL,
  `ano_inicio` varchar(4) NOT NULL,
  `ano_conclusao` varchar(4) NOT NULL,
  UNIQUE KEY `matricula` (`matricula`),
  KEY `cid` (`cid`),
  KEY `ex_aluno_id` (`ex_aluno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacao`
--

CREATE TABLE IF NOT EXISTS `formacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_egresso` int(11) NOT NULL,
  `area` varchar(15) NOT NULL,
  `curso` varchar(25) NOT NULL,
  `instituicao` varchar(50) NOT NULL,
  `campus` varchar(15) NOT NULL,
  `duracao` int(11) NOT NULL,
  `ano_formacao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacoes`
--

CREATE TABLE IF NOT EXISTS `informacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_egresso` int(11) NOT NULL,
  `info` text,
  `interesse` varchar(50) DEFAULT NULL,
  `areainteresse` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE IF NOT EXISTS `instituicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `idnoticias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `resumo` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `data_post` datetime NOT NULL,
  PRIMARY KEY (`idnoticias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_endereco`
--

CREATE TABLE IF NOT EXISTS `pessoa_endereco` (
  `ex_aluno_id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  UNIQUE KEY `ex_aluno_id_2` (`ex_aluno_id`),
  UNIQUE KEY `ex_aluno_id_3` (`ex_aluno_id`),
  KEY `ex_aluno_id` (`ex_aluno_id`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE IF NOT EXISTS `vagas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `local` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `quant` int(11) NOT NULL,
  `desc_atuacao` varchar(50) NOT NULL,
  `obs` text,
  `contatos` varchar(50) NOT NULL,
  `responsavel` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`instituicao`) REFERENCES `instituicao` (`id`);

--
-- Restrições para a tabela `curso_egresso`
--
ALTER TABLE `curso_egresso`
  ADD CONSTRAINT `curso_egresso_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `curso` (`cid`);

--
-- Restrições para a tabela `ex_aluno_curso`
--
ALTER TABLE `ex_aluno_curso`
  ADD CONSTRAINT `ex_aluno_curso_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `curso` (`cid`),
  ADD CONSTRAINT `ex_aluno_curso_ibfk_2` FOREIGN KEY (`ex_aluno_id`) REFERENCES `ex_aluno` (`ex_aluno_id`);

--
-- Restrições para a tabela `pessoa_endereco`
--
ALTER TABLE `pessoa_endereco`
  ADD CONSTRAINT `pessoa_endereco_ibfk_1` FOREIGN KEY (`ex_aluno_id`) REFERENCES `ex_aluno` (`ex_aluno_id`),
  ADD CONSTRAINT `pessoa_endereco_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `endereco` (`eid`);
