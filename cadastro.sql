CREATE DATABASE cadastro;

CREATE TABLE `cadastro`.`pessoa` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `endereco` VARCHAR(150) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE `contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `tipo` char(1) NOT NULL COMMENT 'F = fixo, C = celular, T = trabalho',
  PRIMARY KEY (`id`),
  KEY `fk_pessoa_contato_idx` (`pessoa_id`),
  CONSTRAINT `fk_pessoa_contato` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 