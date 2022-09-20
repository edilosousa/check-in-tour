-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.4.20-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para checkintour
CREATE DATABASE IF NOT EXISTS `checkintour` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */;
USE `checkintour`;

-- Copiando estrutura para tabela checkintour.log_visitas
CREATE TABLE IF NOT EXISTS `log_visitas` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_visitante_id` int(11) NOT NULL DEFAULT 0,
  `log_data_entrada` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin COMMENT='Log de visita registra uma visita de um visitante ao ser cadastrado.';

-- Copiando dados para a tabela checkintour.log_visitas: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `log_visitas` DISABLE KEYS */;
INSERT INTO `log_visitas` (`log_id`, `log_visitante_id`, `log_data_entrada`) VALUES
	(2, 18, '2022-09-20 12:19:02'),
	(3, 19, '2022-09-20 12:21:13'),
	(4, 20, '2022-09-20 12:21:42'),
	(5, 18, '2022-09-20 12:26:02'),
	(6, 18, '2022-09-20 12:33:02'),
	(7, 18, '2022-08-20 16:19:02'),
	(8, 20, '2022-07-20 16:19:02'),
	(9, 19, '2022-06-20 16:19:02'),
	(10, 20, '2022-05-20 16:19:02'),
	(11, 19, '2022-04-20 16:19:02'),
	(12, 19, '2022-03-20 16:19:02'),
	(13, 20, '2022-02-20 16:19:02'),
	(14, 18, '2022-01-20 16:19:02'),
	(15, 18, '2022-10-20 16:19:02'),
	(16, 20, '2022-11-20 16:19:02'),
	(17, 19, '2022-12-20 16:19:02');
/*!40000 ALTER TABLE `log_visitas` ENABLE KEYS */;

-- Copiando estrutura para tabela checkintour.tipos
CREATE TABLE IF NOT EXISTS `tipos` (
  `tipo_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_descricao` varchar(100) COLLATE armscii8_bin NOT NULL,
  `tipo_status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`tipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin COMMENT='tabela responsavel por armazenar se um visitante é estrangeiro ou brasileiro';

-- Copiando dados para a tabela checkintour.tipos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
INSERT INTO `tipos` (`tipo_id`, `tipo_descricao`, `tipo_status`) VALUES
	(1, 'Brasileiro', 1),
	(2, 'Estrangeiro', 1);
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;

-- Copiando estrutura para tabela checkintour.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int(2) NOT NULL AUTO_INCREMENT,
  `usuario_nome` varchar(200) COLLATE armscii8_bin NOT NULL,
  `usuario_login` varchar(50) COLLATE armscii8_bin NOT NULL,
  `usuario_senha` varchar(50) COLLATE armscii8_bin NOT NULL,
  `usuario_status` int(11) NOT NULL DEFAULT 1,
  `usuario_data` datetime NOT NULL,
  `usuario_tipo` int(11) NOT NULL COMMENT '1 = admin, 2 = recep',
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin COMMENT='tabela de usuario para definicões de logins de acesso ao sistema.';

-- Copiando dados para a tabela checkintour.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`usuario_id`, `usuario_nome`, `usuario_login`, `usuario_senha`, `usuario_status`, `usuario_data`, `usuario_tipo`) VALUES
	(1, 'Administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2022-09-16 08:01:52', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela checkintour.visitantes
CREATE TABLE IF NOT EXISTS `visitantes` (
  `visitante_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitante_nome` varchar(200) COLLATE armscii8_bin NOT NULL,
  `visitante_rg` int(8) DEFAULT NULL,
  `visitante_data_entrada` datetime NOT NULL,
  `tipo_visitante_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `visitante_status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`visitante_id`),
  KEY `FK_visitantes_usuarios` (`usuario_id`),
  KEY `FK_tipo_visitante` (`tipo_visitante_id`),
  CONSTRAINT `FK_tipo_visitante` FOREIGN KEY (`tipo_visitante_id`) REFERENCES `tipos` (`tipo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_visitantes_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin COMMENT='tabela de visitantes';

-- Copiando dados para a tabela checkintour.visitantes: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `visitantes` DISABLE KEYS */;
INSERT INTO `visitantes` (`visitante_id`, `visitante_nome`, `visitante_rg`, `visitante_data_entrada`, `tipo_visitante_id`, `usuario_id`, `visitante_status`) VALUES
	(18, 'Edilo Sousa da Silva', 19803531, '2022-09-20 18:19:02', 1, 1, 1),
	(19, 'Reginaldo Sena Farias', 17845257, '2022-09-20 18:21:13', 1, 1, 1),
	(20, 'Fernando Chagas Silva', 12545784, '2022-09-20 18:21:42', 2, 1, 1);
/*!40000 ALTER TABLE `visitantes` ENABLE KEYS */;

-- Copiando estrutura para trigger checkintour.visitantes_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `visitantes_after_insert` AFTER INSERT ON `visitantes` FOR EACH ROW BEGIN
INSERT INTO log_visitas
   ( log_visitante_id,
     log_data_entrada
   )
   VALUES
   ( NEW.visitante_id,
     SYSDATE()
	);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
