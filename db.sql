-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
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
  PRIMARY KEY (`log_id`),
  KEY `FK_VISITANTE_ID` (`log_visitante_id`),
  CONSTRAINT `FK_VISITANTE_ID` FOREIGN KEY (`log_visitante_id`) REFERENCES `visitantes` (`visitante_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin COMMENT='Log de visita registra uma visita de um visitante ao ser cadastrado.';

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela checkintour.tipos
CREATE TABLE IF NOT EXISTS `tipos` (
  `tipo_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_descricao` varchar(100) COLLATE armscii8_bin NOT NULL,
  `tipo_status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`tipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin COMMENT='tabela responsavel por armazenar se um visitante é estrangeiro ou brasileiro';

-- Exportação de dados foi desmarcado.

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin COMMENT='tabela de usuario para definicões de logins de acesso ao sistema.';

-- Exportação de dados foi desmarcado.

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

-- Exportação de dados foi desmarcado.

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
