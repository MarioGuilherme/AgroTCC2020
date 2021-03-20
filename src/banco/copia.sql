-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para epiz_27988342_sistema_agro_peps
CREATE DATABASE IF NOT EXISTS `epiz_27988342_sistema_agro_peps` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `epiz_27988342_sistema_agro_peps`;

-- Copiando estrutura para tabela epiz_27988342_sistema_agro_peps.alunos
CREATE TABLE IF NOT EXISTS `alunos` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `rm` int(5) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id_aluno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela epiz_27988342_sistema_agro_peps.alunos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` (`id_aluno`, `nome`, `rm`, `senha`) VALUES
	(1, 'Mário Guilherme de Andrade Rodrigues', 13115, 'amVzdXMxMDAl'),
	(2, 'Pedro Ernesto Tavares Gonçalves', 12690, 'NTkwMTAx'),
	(3, 'André Neves', 12603, 'QW5ncmUx');
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;

-- Copiando estrutura para tabela epiz_27988342_sistema_agro_peps.entradas
CREATE TABLE IF NOT EXISTS `entradas` (
  `id_entrada` int(11) NOT NULL AUTO_INCREMENT,
  `responsavel` varchar(50) NOT NULL,
  `data_entrada` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `custo` int(11) NOT NULL,
  `pacotes` int(11) NOT NULL,
  PRIMARY KEY (`id_entrada`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela epiz_27988342_sistema_agro_peps.entradas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `entradas` DISABLE KEYS */;
INSERT INTO `entradas` (`id_entrada`, `responsavel`, `data_entrada`, `quantidade`, `custo`, `pacotes`) VALUES
	(1, 'ENTRADA FIXA', '2020-11-25', 240, 390, 6),
	(2, 'Funcionário ETEC Cafelândia', '2020-11-26', 80, 130, 2);
/*!40000 ALTER TABLE `entradas` ENABLE KEYS */;

-- Copiando estrutura para tabela epiz_27988342_sistema_agro_peps.masters
CREATE TABLE IF NOT EXISTS `masters` (
  `id_master` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id_master`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela epiz_27988342_sistema_agro_peps.masters: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `masters` DISABLE KEYS */;
INSERT INTO `masters` (`id_master`, `nome`, `email`, `senha`) VALUES
	(1, 'Rafaek', '111.111.111-11', 'MTIz'),
	(2, 'Visitante', 'visitante', 'MQ==');
/*!40000 ALTER TABLE `masters` ENABLE KEYS */;

-- Copiando estrutura para tabela epiz_27988342_sistema_agro_peps.racao
CREATE TABLE IF NOT EXISTS `racao` (
  `id_racao` int(11) NOT NULL AUTO_INCREMENT,
  `quantidadeKG` int(11) NOT NULL,
  `pacotes` int(11) NOT NULL,
  PRIMARY KEY (`id_racao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela epiz_27988342_sistema_agro_peps.racao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `racao` DISABLE KEYS */;
INSERT INTO `racao` (`id_racao`, `quantidadeKG`, `pacotes`) VALUES
	(1, 120, 3);
/*!40000 ALTER TABLE `racao` ENABLE KEYS */;

-- Copiando estrutura para tabela epiz_27988342_sistema_agro_peps.saidas
CREATE TABLE IF NOT EXISTS `saidas` (
  `id_saida` int(11) NOT NULL AUTO_INCREMENT,
  `responsavel` varchar(50) NOT NULL,
  `data_saida` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `pacotes` int(11) NOT NULL,
  PRIMARY KEY (`id_saida`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela epiz_27988342_sistema_agro_peps.saidas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `saidas` DISABLE KEYS */;
INSERT INTO `saidas` (`id_saida`, `responsavel`, `data_saida`, `quantidade`, `pacotes`) VALUES
	(1, 'SAÍDA FIXA', '2020-11-25', 160, 4),
	(2, 'Funcionário ETEC Cafelândia', '2020-11-30', 40, 1);
/*!40000 ALTER TABLE `saidas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;