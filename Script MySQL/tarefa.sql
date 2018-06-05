create database tarefa;

use tarefa;

CREATE TABLE IF NOT EXISTS `tarefa` (
  `id`                 INT         NOT NULL AUTO_INCREMENT,
  `titulo`             VARCHAR(20) NOT NULL,
  `descricao`          VARCHAR(100) NOT NULL,
  CONSTRAINT `pk_tarefa` PRIMARY KEY (`id`)
)ENGINE = InnoDB DEFAULT CHARSET=utf8;

select * from tarefa;

insert into tarefa (id, titulo, descricao) values ("1", "Projeto", "Fazer o projeto de chicout");

insert into tarefa (id, titulo, descricao) values ("2", "Mobile", "Fazer o projeto de melo");