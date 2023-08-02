-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/08/2023 às 14:08
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `apollo_erp`
--
CREATE DATABASE IF NOT EXISTS `apollo_erp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `apollo_erp`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `cod` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `estatus` varchar(15) DEFAULT 'ativo',
  `descric` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`cod`, `nome`, `estatus`, `descric`) VALUES
(1, 'cat1', 'ativo', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente_fornecedor`
--

CREATE TABLE `cliente_fornecedor` (
  `cod` int(11) NOT NULL,
  `estatus` varchar(15) DEFAULT 'ativo',
  `idlinhavenda` int(11) DEFAULT NULL,
  `razaosocial_nomecompleto` varchar(45) NOT NULL,
  `nomefantasia_nomecomercial` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cep` char(9) NOT NULL,
  `uf` char(2) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `cnpj_cpf` varchar(18) NOT NULL,
  `nrfone` varchar(15) NOT NULL,
  `nrlocal` char(4) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `ie` char(15) DEFAULT NULL,
  `ipfisica` tinyint(1) DEFAULT 0,
  `ifornecedor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente_fornecedor`
--

INSERT INTO `cliente_fornecedor` (`cod`, `estatus`, `idlinhavenda`, `razaosocial_nomecompleto`, `nomefantasia_nomecomercial`, `email`, `cep`, `uf`, `cidade`, `cnpj_cpf`, `nrfone`, `nrlocal`, `endereco`, `ie`, `ipfisica`, `ifornecedor`) VALUES
(19, 'ativo', 7, 'Jhimy Kenedy Souza Ferrari', 'Ferrari Pan', 'Sem Email', '87538000', '', 'Perobal', '08570954980', '55 44 98454-', '0444', 'Jardim Araucária - Rua Miguel Rúbio', '321321qrq', 1, 0),
(21, 'ativo', 6, 'Instituto Federal do Paraná Campus Umuarama', 'IFPR', 'If@gmail.com', '87538.000', '', 'Umuarama', '10.652.179/0001-15', '(44) 49898-4968', '4073', 'Jardim Topasio - Rodovia Italo Orcelli', '111.111.111.111', 0, 0),
(22, 'ativo', NULL, 'Gabriel Costa da Silva', 'Mr Biel', 'boidamadrugada@gmail.com', '87538.000', '', 'Umuarama', '113.545.119-21', '(44) 98454-5540', '1114', 'Arapongas - Avenida Paraná', '111.111.111.111', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `condicao_recebimento`
--

CREATE TABLE `condicao_recebimento` (
  `cod` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `estatus` varchar(15) DEFAULT 'ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `condicao_recebimento`
--

INSERT INTO `condicao_recebimento` (`cod`, `nome`, `estatus`) VALUES
(1, 'Avista', 'ativo'),
(2, 'Boleto', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_venda_compra`
--

CREATE TABLE `itens_venda_compra` (
  `idproduto` int(11) NOT NULL,
  `idvendacompra` int(11) NOT NULL,
  `qtd` int(11) NOT NULL DEFAULT 1,
  `tbvenda` int(11) DEFAULT 1,
  `pcdesconto` decimal(5,2) DEFAULT NULL,
  `vlunitario` decimal(10,2) NOT NULL,
  `vltotal` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `linha_de_venda`
--

CREATE TABLE `linha_de_venda` (
  `cod` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `estatus` varchar(15) NOT NULL DEFAULT 'ativo',
  `descric` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `linha_de_venda`
--

INSERT INTO `linha_de_venda` (`cod`, `nome`, `estatus`, `descric`) VALUES
(-1, 'Sem linha definida', 'ativo', ''),
(2, 'setor1', 'ativo', ''),
(3, 'linha1', 'ativo', ''),
(4, 'asfsaf', 'ativo', 'asfasfz<xvqe'),
(5, 'Gabriel Costa', 'ativo', ''),
(6, 'Umuarama', 'ativo', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
(7, 'linha de venda teste', 'ativo', '3213241');

-- --------------------------------------------------------

--
-- Estrutura para tabela `marca`
--

CREATE TABLE `marca` (
  `cod` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `estatus` varchar(15) DEFAULT 'ativo',
  `descric` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marca`
--

INSERT INTO `marca` (`cod`, `nome`, `estatus`, `descric`) VALUES
(-1, 'Sem marca definida', 'ativo', ''),
(2, 'marca1', 'ativo', 'afgasg'),
(3, 'agsgas', 'ativo', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mov_venda_compra`
--

CREATE TABLE `mov_venda_compra` (
  `cod` int(11) NOT NULL,
  `destatus` varchar(15) NOT NULL DEFAULT 'faturado',
  `vltotal` decimal(10,2) DEFAULT 0.00,
  `dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `desconto` decimal(10,2) DEFAULT NULL,
  `idcondicao` int(11) DEFAULT 1,
  `idvendedor` int(11) DEFAULT NULL,
  `idclientefornecedor` int(11) NOT NULL,
  `compra` tinyint(1) DEFAULT 0,
  `descric` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `cod` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `estatus` varchar(15) NOT NULL DEFAULT 'ativo',
  `vlcompra` decimal(10,2) NOT NULL,
  `tbvenda1` decimal(10,2) NOT NULL,
  `tbvenda2` decimal(10,2) NOT NULL,
  `tbvenda3` decimal(10,2) NOT NULL,
  `cmvenda1` decimal(10,2) NOT NULL,
  `cmvenda2` decimal(10,2) NOT NULL,
  `cmvenda3` decimal(10,2) NOT NULL,
  `mglucro1` decimal(10,2) NOT NULL,
  `mglucro2` decimal(10,2) NOT NULL,
  `mglucro3` decimal(10,2) NOT NULL,
  `qtestoque` int(11) NOT NULL DEFAULT 0,
  `idcategoria` int(11) NOT NULL,
  `idmarca` int(11) NOT NULL,
  `idsetor` int(11) NOT NULL,
  `descric` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `setor`
--

CREATE TABLE `setor` (
  `cod` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `estatus` varchar(15) DEFAULT 'ativo',
  `descric` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `setor`
--

INSERT INTO `setor` (`cod`, `nome`, `estatus`, `descric`) VALUES
(-1, 'Setor não definido', 'ativo', ''),
(2, 'setor1', 'ativo', 'isso é o teste'),
(3, 'setor1', 'ativo', 'isso é o teste'),
(4, 'setor1', 'ativo', 'isso é o teste'),
(5, 'setor132', 'ativo', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `estatus` varchar(15) DEFAULT 'ativo',
  `iadmin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`cod`, `nome`, `email`, `senha`, `estatus`, `iadmin`) VALUES
(-1, 'Desenvolvedor', 'DEVPASS', '$2y$10$.YVRNErGaD2WBDKR/njmfO2HQryJzUm8y6hx40n8dDFLhOJk/6A3K', 'ativo', 1),
(13, 'Jhimy', 'Armando@gmail.com', '$2y$10$ITVhcon92DS6pxer1nTHBeomELzVl/x39rJdtKGTE.mvttS72xpeG', 'ativo', 0),
(14, 'Jhimy', 'souzaferrarik@gmail.com', '$2y$10$cmrghdlJP29yTjwMDrPY.Ogiqwtw3KxHIKXsz/R0dhBLe5esjWJSm', 'ativo', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `cod` int(11) NOT NULL,
  `estatus` varchar(15) DEFAULT 'ativo',
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `rg` char(12) NOT NULL,
  `cpf` char(14) NOT NULL,
  `nrfone` varchar(15) NOT NULL,
  `nrlocal` char(4) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `cep` char(9) NOT NULL,
  `uf` char(2) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `dtcontratacao` date NOT NULL DEFAULT current_timestamp(),
  `dtdemissao` date DEFAULT NULL,
  `dtnascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendedor`
--

INSERT INTO `vendedor` (`cod`, `estatus`, `nome`, `email`, `rg`, `cpf`, `nrfone`, `nrlocal`, `endereco`, `cep`, `uf`, `cidade`, `dtcontratacao`, `dtdemissao`, `dtnascimento`) VALUES
(2, 'ativo', 'Jhimy', 'souzaferrarik@gmai.com', 'aaaaaaa', 'wdwdasrasra', '444444444444', '0949', 'Centro - Miguel Rubio', '875380000', '', 'Perobal', '2023-05-11', NULL, '2005-05-06'),
(3, 'ativo', 'Jhimy Kenedy Souza Ferrari ', 'Sem Email', '14.512.045-4', '085.709.549-80', '(44) 98454-5540', '0949', 'Jardim Imperial - Rua Miguel Rúbio', '87538.000', '', 'Perobal', '2023-06-28', NULL, '2005-05-06');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cod`);

--
-- Índices de tabela `cliente_fornecedor`
--
ALTER TABLE `cliente_fornecedor`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `idlinhavenda` (`idlinhavenda`);

--
-- Índices de tabela `condicao_recebimento`
--
ALTER TABLE `condicao_recebimento`
  ADD PRIMARY KEY (`cod`);

--
-- Índices de tabela `itens_venda_compra`
--
ALTER TABLE `itens_venda_compra`
  ADD PRIMARY KEY (`idproduto`,`idvendacompra`),
  ADD KEY `idvendacompra` (`idvendacompra`);

--
-- Índices de tabela `linha_de_venda`
--
ALTER TABLE `linha_de_venda`
  ADD PRIMARY KEY (`cod`);

--
-- Índices de tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`cod`);

--
-- Índices de tabela `mov_venda_compra`
--
ALTER TABLE `mov_venda_compra`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `idcondicao` (`idcondicao`),
  ADD KEY `idvendedor` (`idvendedor`),
  ADD KEY `idclientefornecedor` (`idclientefornecedor`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `idcategoria` (`idcategoria`),
  ADD KEY `idmarca` (`idmarca`),
  ADD KEY `idsetor` (`idsetor`);

--
-- Índices de tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`cod`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod`);

--
-- Índices de tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cliente_fornecedor`
--
ALTER TABLE `cliente_fornecedor`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `condicao_recebimento`
--
ALTER TABLE `condicao_recebimento`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `linha_de_venda`
--
ALTER TABLE `linha_de_venda`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `mov_venda_compra`
--
ALTER TABLE `mov_venda_compra`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cliente_fornecedor`
--
ALTER TABLE `cliente_fornecedor`
  ADD CONSTRAINT `cliente_fornecedor_ibfk_1` FOREIGN KEY (`idlinhavenda`) REFERENCES `linha_de_venda` (`cod`);

--
-- Restrições para tabelas `itens_venda_compra`
--
ALTER TABLE `itens_venda_compra`
  ADD CONSTRAINT `itens_venda_compra_ibfk_1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`cod`),
  ADD CONSTRAINT `itens_venda_compra_ibfk_2` FOREIGN KEY (`idvendacompra`) REFERENCES `mov_venda_compra` (`cod`);

--
-- Restrições para tabelas `mov_venda_compra`
--
ALTER TABLE `mov_venda_compra`
  ADD CONSTRAINT `mov_venda_compra_ibfk_1` FOREIGN KEY (`idcondicao`) REFERENCES `condicao_recebimento` (`cod`),
  ADD CONSTRAINT `mov_venda_compra_ibfk_2` FOREIGN KEY (`idvendedor`) REFERENCES `vendedor` (`cod`),
  ADD CONSTRAINT `mov_venda_compra_ibfk_3` FOREIGN KEY (`idclientefornecedor`) REFERENCES `cliente_fornecedor` (`cod`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`cod`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`idmarca`) REFERENCES `marca` (`cod`),
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`idsetor`) REFERENCES `setor` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
