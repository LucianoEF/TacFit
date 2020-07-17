-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2020 at 09:29 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tacfitdb`
--
CREATE DATABASE IF NOT EXISTS `tacfitdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tacfitdb`;

-- --------------------------------------------------------

--
-- Table structure for table `alunos_tbl`
--

CREATE TABLE `alunos_tbl` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `dtnasc` date NOT NULL,
  `telfixo` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `contato` varchar(50) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `bairro` varchar(150) NOT NULL,
  `complemento` varchar(150) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `uf` varchar(3) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(30) NOT NULL,
  `plano` varchar(20) NOT NULL,
  `mensalidade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alunos_tbl`
--

INSERT INTO `alunos_tbl` (`id`, `tipo`, `nome`, `dtnasc`, `telfixo`, `celular`, `contato`, `endereco`, `numero`, `cep`, `bairro`, `complemento`, `cidade`, `uf`, `cpf`, `rg`, `plano`, `mensalidade`) VALUES
(1, 'Físico', 'Luciano Eduardo Ferreira', '1995-05-08', '(45) 3025-1177', '(45) 99107-7185', 'Luciano', 'Avenida Felipe Wandscheer', '3195', '85.856-660', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '092.079.829-27', '9.413.767-5', '12 Meses', 'R$ 79,90'),
(2, 'Físico', 'Taciane Cristina Alves Ferreira', '1991-06-13', '(45) 3025-1177', '(45) 99817-0551', 'Taciane', 'Avenida Felipe Wandscheer', '3195', '85.856-603', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '092.079.829-27', '9.413.767-5', 'Mensalista', 'R$ 99,90'),
(3, 'Físico', 'Daniel Alves Ferreira', '2015-12-13', '(45) 3025-1177', '(45) 99107-7185', 'Daniel', 'Avenida Felipe Wandscheer', '3195', '85.856-603', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '092.079.829-27', '9.413.767-5', '6 Meses', 'R$ 89,90'),
(4, 'Físico', 'Lucas Duarte da Silva', '1995-09-08', '(4', '(45) 99826-8867', 'ana maria', 'rua francisco padilha', '122', '85.856-420', 'jardim sao paulo', '', '', '', '101.500.119-03', '1.387.865-4', '12 Meses', 'R$ 79,90'),
(5, 'Físico', 'Cleber Silva', '1985-07-13', '(45) 3525-1122', '(45) 99999-0000', 'Debby', 'Rua New York', '', '85.854-465', '', '', '', '', '078.549.845-22', '4.112.468-7', 'Mensalista', 'R$ 99,90');

-- --------------------------------------------------------

--
-- Table structure for table `despesas_tbl`
--

CREATE TABLE `despesas_tbl` (
  `id` int(11) NOT NULL,
  `mesreferencia` varchar(10) NOT NULL,
  `statuss` varchar(10) NOT NULL,
  `datavenc` date NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `datapgto` date NOT NULL,
  `formaspgto` varchar(50) NOT NULL,
  `valor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `despesas_tbl`
--

INSERT INTO `despesas_tbl` (`id`, `mesreferencia`, `statuss`, `datavenc`, `descricao`, `datapgto`, `formaspgto`, `valor`) VALUES
(1, '06/2020', 'Pago', '2020-06-10', 'Conta de Luz', '2020-06-03', 'Dinheiro', '150,00'),
(2, '06/2020', 'Pago', '2020-06-10', 'Conta de Água', '2020-06-09', 'Dinheiro', '60,00'),
(3, '07/2020', 'Pendente', '2020-07-10', 'Conta de Luz', '2020-07-06', 'Dinheiro', '125,00'),
(4, '07/2020', 'Pendente', '2020-07-11', 'Aluguel', '2020-07-11', 'Dinheiro', '2.000,00'),
(5, '06/2020', 'Pago', '2020-06-11', 'Aluguel', '2020-06-11', 'Dinheiro', '2.000,00'),
(6, '07/2020', 'Pendente', '2020-07-13', 'Equipamentos - parcela 01/20', '2020-07-13', 'Dinheiro', 'R$ 250,00');

-- --------------------------------------------------------

--
-- Table structure for table `exercicio_tbl`
--

CREATE TABLE `exercicio_tbl` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `nomeexe` varchar(150) NOT NULL,
  `objetivo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exercicio_tbl`
--

INSERT INTO `exercicio_tbl` (`id`, `categoria`, `nomeexe`, `objetivo`) VALUES
(1, 'Funcional', 'Alongamento', 'Alongamento'),
(2, 'Musculação', 'Supino', 'Fortalecimento');

-- --------------------------------------------------------

--
-- Table structure for table `ficha_tbl`
--

CREATE TABLE `ficha_tbl` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `dataent` date NOT NULL,
  `objetivo` varchar(100) NOT NULL,
  `nometreino` varchar(100) NOT NULL,
  `observacao` varchar(200) NOT NULL,
  `peso` varchar(10) NOT NULL,
  `altura` varchar(10) NOT NULL,
  `imc` varchar(10) NOT NULL,
  `pesominimo` varchar(10) NOT NULL,
  `pesomaximo` varchar(10) NOT NULL,
  `diadasemana` varchar(20) NOT NULL,
  `horario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ficha_tbl`
--

INSERT INTO `ficha_tbl` (`id`, `nome`, `dataent`, `objetivo`, `nometreino`, `observacao`, `peso`, `altura`, `imc`, `pesominimo`, `pesomaximo`, `diadasemana`, `horario`) VALUES
(1, 'Luciano Eduardo Ferreira', '2020-05-25', 'Emagrecer', 'Treino 1', 'Mudança de Alimentação e Exercícios de Funcional', '82.20', '179', '25.59', '60.88', '80.10', 'Monday', '20:00 às 21:00'),
(2, 'Taciane Cristina Alves Ferreira', '2020-05-25', 'Emagrecer', 'Treino 2', 'Mudança de Alimentação e Exercícios de Funcional', '70', '162', '26.67', '49.86', '65.61', 'Saturday', '09:00 às 10:00'),
(3, 'Daniel Alves Ferreira', '2020-06-11', 'Fortalecimento', 'Treino 1', 'Criar massa muscular', '16', '100', '16.00', '19.00', '25.00', 'Tuesday', '14:00 às 15:00'),
(4, 'Cleber Silva', '2020-07-10', 'Emagrecimento', 'Treino 2', '', '100', '180', '30.86', '61.56', '81.00', 'Monday', '06:00 às 07:00');

-- --------------------------------------------------------

--
-- Table structure for table `formaspgto_tbl`
--

CREATE TABLE `formaspgto_tbl` (
  `id` int(11) NOT NULL,
  `formaspgto` varchar(20) NOT NULL,
  `observacao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formaspgto_tbl`
--

INSERT INTO `formaspgto_tbl` (`id`, `formaspgto`, `observacao`) VALUES
(1, 'Dinheiro', 'Mensalidade em Dinheiro.'),
(2, 'Cartão de Débito', 'Débito à vista'),
(3, 'Cartão de Crédito', 'Apenas para pacotes fechados'),
(4, 'Transferência', 'Conta tal');

-- --------------------------------------------------------

--
-- Table structure for table `frequenciadiaria_tbl`
--

CREATE TABLE `frequenciadiaria_tbl` (
  `id` int(11) NOT NULL,
  `mesreferencia` varchar(10) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `datatreino` date NOT NULL,
  `presenca` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frequenciadiaria_tbl`
--

INSERT INTO `frequenciadiaria_tbl` (`id`, `mesreferencia`, `nome`, `datatreino`, `presenca`) VALUES
(1, '05/2020', 'Luciano Eduardo Ferreira', '2020-05-29', 'Presente'),
(2, '06/2020', 'Taciane Cristina Alves Ferreira', '2020-06-10', 'Presente'),
(3, '06/2020', 'Luciano Eduardo Ferreira', '2020-06-06', 'Presente');

-- --------------------------------------------------------

--
-- Table structure for table `plano_tbl`
--

CREATE TABLE `plano_tbl` (
  `id` int(11) NOT NULL,
  `plano` varchar(20) NOT NULL,
  `valor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plano_tbl`
--

INSERT INTO `plano_tbl` (`id`, `plano`, `valor`) VALUES
(1, 'Mensalista', 'R$ 99,00'),
(2, '6 Meses', 'R$ 89,90'),
(3, '12 Meses', 'R$ 79,90');

-- --------------------------------------------------------

--
-- Table structure for table `recebimentos_tbl`
--

CREATE TABLE `recebimentos_tbl` (
  `id` int(11) NOT NULL,
  `mesreferencia` varchar(10) NOT NULL,
  `statuss` varchar(10) NOT NULL,
  `datavenc` date NOT NULL,
  `nome` varchar(200) NOT NULL,
  `datapgto` date NOT NULL,
  `formaspgto` varchar(150) NOT NULL,
  `valor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recebimentos_tbl`
--

INSERT INTO `recebimentos_tbl` (`id`, `mesreferencia`, `statuss`, `datavenc`, `nome`, `datapgto`, `formaspgto`, `valor`) VALUES
(1, '06/2020', 'Pago', '2020-06-10', 'Luciano Eduardo Ferreira', '2020-05-30', 'Dinheiro', 'R$ 150,00'),
(2, '06/2020', 'Pago', '2020-06-10', 'Taciane Cristina Alves Ferreira', '2020-06-17', 'Dinheiro', 'R$ 150,00'),
(3, '07/2020', 'Pago', '2020-07-10', 'Daniel Alves Ferreira', '2020-07-02', 'Dinheiro', 'R$ 150,00'),
(4, '07/2020', 'Pendente', '2020-07-11', 'Lucas Duarte da Silva', '2020-07-11', 'Dinheiro', 'R$ 150,00'),
(5, '07/2020', 'Pendente', '2020-07-13', 'Cleber Silva', '2020-07-13', 'Dinheiro', 'R$ 150,00');

-- --------------------------------------------------------

--
-- Table structure for table `treino_tbl`
--

CREATE TABLE `treino_tbl` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `nometreino` varchar(200) NOT NULL,
  `nomeexe` varchar(30) NOT NULL,
  `repeticoes` varchar(150) NOT NULL,
  `intervalo` varchar(3) NOT NULL,
  `nomeexe1` varchar(50) NOT NULL,
  `repeticoes1` varchar(150) NOT NULL,
  `intervalo1` varchar(10) NOT NULL,
  `nomeexe2` varchar(50) NOT NULL,
  `repeticoes2` varchar(3) NOT NULL,
  `intervalo2` varchar(3) NOT NULL,
  `nomeexe3` varchar(50) NOT NULL,
  `repeticoes3` varchar(3) NOT NULL,
  `intervalo3` varchar(3) NOT NULL,
  `nomeexe4` varchar(50) NOT NULL,
  `repeticoes4` varchar(3) NOT NULL,
  `intervalo4` varchar(3) NOT NULL,
  `nomeexe5` varchar(50) NOT NULL,
  `repeticoes5` varchar(3) NOT NULL,
  `intervalo5` varchar(3) NOT NULL,
  `nomeexe6` varchar(50) NOT NULL,
  `repeticoes6` varchar(3) NOT NULL,
  `intervalo6` varchar(3) NOT NULL,
  `nomeexe7` varchar(50) NOT NULL,
  `repeticoes7` varchar(3) NOT NULL,
  `intervalo7` varchar(3) NOT NULL,
  `nomeexe8` varchar(50) NOT NULL,
  `repeticoes8` varchar(3) NOT NULL,
  `intervalo8` varchar(3) NOT NULL,
  `nomeexe9` varchar(50) NOT NULL,
  `repeticoes9` varchar(3) NOT NULL,
  `intervalo9` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `treino_tbl`
--

INSERT INTO `treino_tbl` (`id`, `categoria`, `nometreino`, `nomeexe`, `repeticoes`, `intervalo`, `nomeexe1`, `repeticoes1`, `intervalo1`, `nomeexe2`, `repeticoes2`, `intervalo2`, `nomeexe3`, `repeticoes3`, `intervalo3`, `nomeexe4`, `repeticoes4`, `intervalo4`, `nomeexe5`, `repeticoes5`, `intervalo5`, `nomeexe6`, `repeticoes6`, `intervalo6`, `nomeexe7`, `repeticoes7`, `intervalo7`, `nomeexe8`, `repeticoes8`, `intervalo8`, `nomeexe9`, `repeticoes9`, `intervalo9`) VALUES
(1, 'Funcional', 'Treino 1', 'Alongamento', '1', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Musculação', 'Treino 2', 'Supino', '3', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Funcional', 'Treino 3', 'Selecione..', '3', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Funcional', 'Treino 4', 'Alongamento', '1', '2', 'Selecione..', '3', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Funcional', 'Treino Funcional Iniciante - Emagrecimento', 'Alongamento', '1', '2', 'Supino', '3', '2', 'Supino', '3', '2', 'Supino', '3', '2', 'Supino', '3', '2', 'Supino', '3', '2', 'Supino', '3', '2', 'Supino', '3', '2', 'Supino', '3', '2', 'Alongamento', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_tbl`
--

CREATE TABLE `usuarios_tbl` (
  `id` int(11) NOT NULL,
  `nomeUsuario` varchar(200) NOT NULL,
  `dtNasc` date NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `contato` varchar(50) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `bairro` varchar(150) NOT NULL,
  `complemento` varchar(150) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `uf` varchar(3) NOT NULL,
  `cpfcnpj` varchar(30) NOT NULL,
  `rginsest` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipoUsuario` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios_tbl`
--

INSERT INTO `usuarios_tbl` (`id`, `nomeUsuario`, `dtNasc`, `telefone`, `celular`, `contato`, `endereco`, `numero`, `cep`, `bairro`, `complemento`, `cidade`, `uf`, `cpfcnpj`, `rginsest`, `usuario`, `senha`, `tipoUsuario`, `status`) VALUES
(1, 'Luciano Eduardo Ferreira', '1995-05-08', '(45) 3025-5709', '(45) 99107-7185', 'Luciano', 'Avenida Felipe Wandscheer', '3195', '85.856-660', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '092.079.829-27', '9.413.767-5', 'Luciano', '24fc5715c26a0f8f11e84b9803b227e7', 'Administrador', 'Ativo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos_tbl`
--
ALTER TABLE `alunos_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `despesas_tbl`
--
ALTER TABLE `despesas_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercicio_tbl`
--
ALTER TABLE `exercicio_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ficha_tbl`
--
ALTER TABLE `ficha_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formaspgto_tbl`
--
ALTER TABLE `formaspgto_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frequenciadiaria_tbl`
--
ALTER TABLE `frequenciadiaria_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plano_tbl`
--
ALTER TABLE `plano_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recebimentos_tbl`
--
ALTER TABLE `recebimentos_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treino_tbl`
--
ALTER TABLE `treino_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_tbl`
--
ALTER TABLE `usuarios_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos_tbl`
--
ALTER TABLE `alunos_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `despesas_tbl`
--
ALTER TABLE `despesas_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exercicio_tbl`
--
ALTER TABLE `exercicio_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ficha_tbl`
--
ALTER TABLE `ficha_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `formaspgto_tbl`
--
ALTER TABLE `formaspgto_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `frequenciadiaria_tbl`
--
ALTER TABLE `frequenciadiaria_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plano_tbl`
--
ALTER TABLE `plano_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recebimentos_tbl`
--
ALTER TABLE `recebimentos_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `treino_tbl`
--
ALTER TABLE `treino_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios_tbl`
--
ALTER TABLE `usuarios_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `woodcalcdb`
--
CREATE DATABASE IF NOT EXISTS `woodcalcdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `woodcalcdb`;

-- --------------------------------------------------------

--
-- Table structure for table `clientes_tbl`
--

CREATE TABLE `clientes_tbl` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `dtnasc` date NOT NULL,
  `telfixo` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `contato` varchar(50) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `bairro` varchar(150) NOT NULL,
  `complemento` varchar(150) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `uf` varchar(3) NOT NULL,
  `cpfcnpj` varchar(20) NOT NULL,
  `rginsest` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes_tbl`
--

INSERT INTO `clientes_tbl` (`id`, `tipo`, `nome`, `dtnasc`, `telfixo`, `celular`, `contato`, `endereco`, `numero`, `cep`, `bairro`, `complemento`, `cidade`, `uf`, `cpfcnpj`, `rginsest`) VALUES
(8, 'Jurídico', 'Destaca Engenharia', '2019-12-22', '(45) 3025-1177', '(45) 99107-7185', 'Luciano', 'Avenida Felipe Wandscheer', '3195', '85.856-660', 'Jardim Dom Pedro I', '', 'Foz do Iguaçu', 'PR', '101010101010', '9.413.767-5'),
(9, 'Físico', 'Luciano Eduardo Ferreira', '1995-05-08', '(45) 3025-1177', '(45) 99107-7185', 'Luciano', 'Avenida Felipe Wandscheer', '3195', '85.856-660', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '092.079.829-27', '9.413.767-5');

-- --------------------------------------------------------

--
-- Table structure for table `coeficienteym_tbl`
--

CREATE TABLE `coeficienteym_tbl` (
  `id` int(11) NOT NULL,
  `tipomadeira` varchar(150) NOT NULL,
  `ym` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coeficienteym_tbl`
--

INSERT INTO `coeficienteym_tbl` (`id`, `tipomadeira`, `ym`) VALUES
(1, 'macica', '1.3'),
(2, 'lameadacolada', '1.25'),
(3, 'lvl', '1.20'),
(4, 'contraplacado', '1.2'),
(5, 'osb', '1.2'),
(6, 'aglparticulas', '1.3');

-- --------------------------------------------------------

--
-- Table structure for table `kmod_tbl`
--

CREATE TABLE `kmod_tbl` (
  `id` int(11) NOT NULL,
  `tipomadeira` varchar(150) NOT NULL,
  `classeserv` varchar(250) NOT NULL,
  `classeduracao` varchar(150) NOT NULL,
  `kmod` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kmod_tbl`
--

INSERT INTO `kmod_tbl` (`id`, `tipomadeira`, `classeserv`, `classeduracao`, `kmod`) VALUES
(1, 'macica', 'classe1', 'permanente', '0.6'),
(3, 'macica', 'classe1', 'longoprazo', '0.7'),
(4, 'macica', 'classe1', 'medioprazo', '0.8'),
(5, 'macica', 'classe1', 'curtoprazo', '0.9'),
(6, 'macica', 'classe1', 'instantanea', '1.1'),
(7, 'macica', 'classe2', 'permanente', '0.6'),
(8, 'macica', 'classe2', 'longoprazo', '0.7'),
(9, 'macica', 'classe2', 'medioprazo', '0.8'),
(10, 'macica', 'classe2', 'curtoprazo', '0.9'),
(11, 'macica', 'classe2', 'instantanea', '1.1'),
(12, 'macica', 'classe3', 'permanente', '0.5'),
(13, 'macica', 'classe3', 'longoprazo', '0.55'),
(14, 'macica', 'classe3', 'medioprazo', '0.65'),
(15, 'macica', 'classe3', 'curtoprazo', '0.7'),
(16, 'macica', 'classe3', 'instantanea', '0.9'),
(17, 'lameladacolada', 'classe1', 'permanente', '0.6'),
(18, 'lameladacolada', 'classe1', 'longoprazo', '0.7'),
(19, 'lameladacolada', 'classe1', 'medioprazo', '0.8'),
(20, 'lameladacolada', 'classe1', 'curtoprazo', '0.9'),
(21, 'lameladacolada', 'classe1', 'instantanea', '1.1'),
(22, 'lameladacolada', 'classe2', 'permanente', '0.6'),
(23, 'lameladacolada', 'classe2', 'longoprazo', '0.7'),
(24, 'lameladacolada', 'classe2', 'medioprazo', '0.8'),
(25, 'lameladacolada', 'classe2', 'curtoprazo', '0.9'),
(26, 'lameladacolada', 'classe2', 'instantanea', '1.1'),
(27, 'lameladacolada', 'classe3', 'permanente', '0.5'),
(29, 'lameladacolada', 'classe3', 'longoprazo', '0.55'),
(30, 'lameladacolada', 'classe3', 'medioprazo', '0.65'),
(31, 'lameladacolada', 'classe3', 'curtoprazo', '0.7'),
(32, 'lameladacolada', 'classe3', 'instantanea', '0.9'),
(33, 'LVL', 'classe1', 'permanente', '0.6');

-- --------------------------------------------------------

--
-- Table structure for table `madeiraum_tbl`
--

CREATE TABLE `madeiraum_tbl` (
  `id` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `genero` varchar(150) NOT NULL,
  `especie` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `rap15` varchar(20) NOT NULL,
  `lmtproporcionalidade` varchar(20) NOT NULL,
  `ec0` varchar(20) NOT NULL,
  `fc015` varchar(20) NOT NULL,
  `fm15` varchar(20) NOT NULL,
  `ft0` varchar(20) NOT NULL,
  `ft90` varchar(20) NOT NULL,
  `fv` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `madeira_tbl`
--

CREATE TABLE `madeira_tbl` (
  `id` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `tipomadeira` varchar(250) NOT NULL,
  `genero` varchar(150) NOT NULL,
  `especie` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `rbas` varchar(20) NOT NULL,
  `ec0` varchar(20) NOT NULL,
  `fc0` varchar(20) NOT NULL,
  `fm` varchar(20) NOT NULL,
  `ft0` varchar(20) NOT NULL,
  `ft90` varchar(20) NOT NULL,
  `fv` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `madeira_tbl`
--

INSERT INTO `madeira_tbl` (`id`, `categoria`, `tipomadeira`, `genero`, `especie`, `descricao`, `rbas`, `ec0`, `fc0`, `fm`, `ft0`, `ft90`, `fv`) VALUES
(8, 'Madeira', 'Maciça', 'E. grandis', 'Eucalypto-grandis', 'Eucalipto', '640', '12813', '40.3', '50', '70.2', '2.6', '7.1'),
(10, 'Madeira', 'LVL', 'E. Saligna', 'Eucalyptus saligna', 'Eucalipto-Saligna', '731', '14933', '46.8', '50', '95.5', '4', '8.2');

-- --------------------------------------------------------

--
-- Table structure for table `parafuso_tbl`
--

CREATE TABLE `parafuso_tbl` (
  `id` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `polegadas` varchar(5) NOT NULL,
  `lmtescoamento` varchar(20) NOT NULL,
  `resistracao` varchar(20) NOT NULL,
  `cargaprova` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prego_tbl`
--

CREATE TABLE `prego_tbl` (
  `id` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `tipo` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prego_tbl`
--

INSERT INTO `prego_tbl` (`id`, `categoria`, `tipo`, `descricao`) VALUES
(5, 'Prego', '17 x 27\" Cabeça Dupla', 'Prego de cabeça dupla'),
(6, 'Prego', '17 x 27\" Cabeça Simples', 'Prego de cabeça simples');

-- --------------------------------------------------------

--
-- Table structure for table `telha_tbl`
--

CREATE TABLE `telha_tbl` (
  `id` int(11) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `tipotelha` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `pesoproprio` varchar(10) NOT NULL,
  `expessura` varchar(5) NOT NULL,
  `qtdapoios` varchar(5) NOT NULL,
  `distapoios` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `telha_tbl`
--

INSERT INTO `telha_tbl` (`id`, `categoria`, `tipotelha`, `descricao`, `pesoproprio`, `expessura`, `qtdapoios`, `distapoios`) VALUES
(3, 'Telha', 'Trapezoidal', 'Telha de cobertura', '4', '43', '2', '2.00'),
(4, 'Telha', 'Ondulada', 'Telha de cobertura', '6', '50', '2', '2.50'),
(6, 'Telha', 'Trapezoidal', 'Telha de Zinco', '5', '43', '2', '2.50');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_tbl`
--

CREATE TABLE `usuarios_tbl` (
  `id` int(11) NOT NULL,
  `nomeUsuario` varchar(200) NOT NULL,
  `dtNasc` date NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `contato` varchar(50) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` varchar(30) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `bairro` varchar(150) NOT NULL,
  `complemento` varchar(150) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `uf` varchar(3) NOT NULL,
  `cpfcnpj` varchar(30) NOT NULL,
  `rginsest` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipoUsuario` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios_tbl`
--

INSERT INTO `usuarios_tbl` (`id`, `nomeUsuario`, `dtNasc`, `telefone`, `celular`, `contato`, `endereco`, `numero`, `cep`, `bairro`, `complemento`, `cidade`, `uf`, `cpfcnpj`, `rginsest`, `usuario`, `senha`, `tipoUsuario`, `status`) VALUES
(5, 'Luciano Eduardo Ferreira', '1995-05-08', '(45) 9910-7718', '(45) 99107-7185', 'Luciano', 'Avenida Felipe Wandscheer', '3195', '85.856-660', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '092.079.829-27', '9.413.767-5', 'Luciano', '24fc5715c26a0f8f11e84b9803b227e7', 'Administrador', 'Ativo'),
(10, 'Taciane Cristina Alves Ferreira', '1991-06-13', '', '(45) 99817-0551', 'Taciane', 'Avenida Felipe Wandscheer', '3195', '85.856-660', 'Jardim Dom Pedro I', 'Casa', 'Foz do Iguaçu', 'PR', '077.090.929-93', '10.267.260-7', 'Taciane', '600914f34c0c858bfe599e38129d1bc6', 'Administrador', 'Ativo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes_tbl`
--
ALTER TABLE `clientes_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coeficienteym_tbl`
--
ALTER TABLE `coeficienteym_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kmod_tbl`
--
ALTER TABLE `kmod_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `madeiraum_tbl`
--
ALTER TABLE `madeiraum_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `madeira_tbl`
--
ALTER TABLE `madeira_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parafuso_tbl`
--
ALTER TABLE `parafuso_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prego_tbl`
--
ALTER TABLE `prego_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telha_tbl`
--
ALTER TABLE `telha_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_tbl`
--
ALTER TABLE `usuarios_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes_tbl`
--
ALTER TABLE `clientes_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coeficienteym_tbl`
--
ALTER TABLE `coeficienteym_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kmod_tbl`
--
ALTER TABLE `kmod_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `madeiraum_tbl`
--
ALTER TABLE `madeiraum_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `madeira_tbl`
--
ALTER TABLE `madeira_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parafuso_tbl`
--
ALTER TABLE `parafuso_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prego_tbl`
--
ALTER TABLE `prego_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `telha_tbl`
--
ALTER TABLE `telha_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuarios_tbl`
--
ALTER TABLE `usuarios_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
