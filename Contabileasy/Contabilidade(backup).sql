-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 06-Dez-2017 às 05:36
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Contabilidade`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contfacil`
--

CREATE TABLE `contfacil` (
  `nome_conta` varchar(250) NOT NULL,
  `tipo_conta` varchar(250) NOT NULL,
  `localizador` varchar(250) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `contfacil`
--

INSERT INTO `contfacil` (`nome_conta`, `tipo_conta`, `localizador`, `id`) VALUES
('CAIXA', 'Analitico', '1.1', 15),
('PIRULITOPOP', 'Analitico', '1.2', 17),
('CHOCOLATE FOFÃO', 'Analitico', '1.3', 18),
('BANCO', 'Analitico', '1.4', 19),
('IMOVEL', 'Analitico', '1.5', 20),
('MOVEIS E UTENSILIO ', 'Analitico', '1.7', 22),
('VEICULOS', 'Analitico', '1.8', 23),
('FORNECEDORES', 'Analitico', '2.1', 24),
('FINANCIAMENTO', 'Analitico', '2.2', 25),
('CAPITAL SOCIAL', 'Analitico', '3.1', 26),
('ATIVO', 'Totalizador', '1', 27),
('PASSIVO', 'Totalizador', '2', 28),
('PATRIMONIO LIQUIDO', 'Totalizador', '3', 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lancamento`
--

CREATE TABLE `lancamento` (
  `data_operacao` date NOT NULL,
  `conta_debito` varchar(100) NOT NULL,
  `conta_credito` varchar(100) NOT NULL,
  `historico` varchar(250) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lancamento`
--

INSERT INTO `lancamento` (`data_operacao`, `conta_debito`, `conta_credito`, `historico`, `valor`, `id`, `nome`) VALUES
('2017-12-07', 'CAIXA', 'CAPITAL SOCIAL', 'ABERTURA DA EMPRESA', '35000', 18, ''),
('2017-12-07', 'PIRULITOPOP', 'CAIXA', 'COMPRA DE PIRULITO AV', '5000', 19, ''),
('2017-12-07', 'VEICULOS', 'FINANCIAMENTO', 'COMPRA DE CAMINHOTE FINANCIADA', '26400', 20, ''),
('2017-12-07', 'MOVEIS E UTENSILIO', 'FORNECEDORES', 'COMPRA DE MOVEIS E UTEM A PRAZO', '10500', 21, ''),
('2017-12-07', 'FINANCIAMENTO', 'CAIXA', 'PAGAMENTO DE FINANCIAMETO', '550', 22, ''),
('2017-12-07', 'IMOVEL', 'CAPITAL SOCIAL', 'NOVA ENTRADA DE SÓCIO', '15000', 23, ''),
('2017-12-07', 'CHOCOLATE FOFÃO', 'FORNECEDORES', 'COMPRA DE CHOCALATE A PRAZO', '3000', 24, ''),
('2017-12-07', 'CAPITAL SOCIAL', 'CAIXA', 'SAIDA DE SÓCIO DA EMPRE', '15000', 25, ''),
('2017-12-07', 'BANCO', 'CAIXA', 'DEPOSITO DE DINHEIRO NO BANCO ', '3000', 26, ''),
('2017-12-07', 'FORNECEDORES', 'PIRULITOPOP', 'PAGAMENTO DE DIVIDA COM MERCADORIAS', '2500', 27, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contfacil`
--
ALTER TABLE `contfacil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome_conta` (`nome_conta`),
  ADD UNIQUE KEY `localizador` (`localizador`);

--
-- Indexes for table `lancamento`
--
ALTER TABLE `lancamento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contfacil`
--
ALTER TABLE `contfacil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `lancamento`
--
ALTER TABLE `lancamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
