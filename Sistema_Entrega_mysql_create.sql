CREATE DATABASE rastreio;
USE rastreio;

CREATE TABLE `Funcionarios` (
	`idFuncionario` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(55) NOT NULL,
	`cpf` VARCHAR(15) NOT NULL,
	`celular` VARCHAR(20) NOT NULL,
	`sexo` VARCHAR(25) NOT NULL,
	`cargo` VARCHAR(55) NOT NULL,
	`FK_enderecos` INT NOT NULL,
	`FK_sedes` INT NOT NULL,
	PRIMARY KEY (`idFuncionario`)
);

CREATE TABLE `Sedes` (
	`idSede` INT NOT NULL AUTO_INCREMENT,
	`telefone` VARCHAR(20) NOT NULL,
	`email` VARCHAR(55) NOT NULL,
	`site` VARCHAR(55) NOT NULL,
	`nome` VARCHAR(99) NOT NULL,
	`FK_enderecos` INT NOT NULL,
	PRIMARY KEY (`idSede`)
);

CREATE TABLE `Encomendas` (
	`idEncomenda` INT NOT NULL AUTO_INCREMENT,
	`codRastreio` VARCHAR(25) NOT NULL,
	`peso` INT NOT NULL,
	`comprimento` FLOAT NOT NULL,
	`largura` FLOAT NOT NULL,
	`altura` FLOAT NOT NULL,
	`volume` FLOAT NOT NULL,
	`valorEntrega` FLOAT NOT NULL,
	`dataPostagem` DATETIME NOT NULL,
	`FK_enderecoDestinatario` INT NOT NULL,
	`FK_enderecoRemetente` INT NOT NULL,
	`FK_enderecoSede` INT NOT NULL,
	PRIMARY KEY (`idEncomenda`,`codRastreio`)
);

CREATE TABLE `Rotas` (
	`idRota` INT NOT NULL AUTO_INCREMENT,
	`FK_funcionario` INT NOT NULL,
	`data` DATETIME NOT NULL,
	PRIMARY KEY (`idRota`)
);

CREATE TABLE `Endereços` (
	`idEndereco` INT NOT NULL AUTO_INCREMENT,
	`rua` VARCHAR(99) NOT NULL,
	`numero` INT NOT NULL,
	`bairro` VARCHAR(99) NOT NULL,
	`cidade` VARCHAR(99) NOT NULL,
	`estado` VARCHAR(99) NOT NULL,
	`cep` VARCHAR(10) NOT NULL,
	`complemento` VARCHAR(99) NOT NULL,
	PRIMARY KEY (`idEndereco`)
);

CREATE TABLE `Status` (
	`idStatus` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(25) NOT NULL,
	PRIMARY KEY (`idStatus`)
);

CREATE TABLE `Preco` (
	`idPreco` INT NOT NULL AUTO_INCREMENT,
	`precoKm` FLOAT NOT NULL,
	`precoPeso` FLOAT NOT NULL,
	`precoVolume` FLOAT NOT NULL,
	`precoFixo` FLOAT NOT NULL,
	PRIMARY KEY (`idPreco`)
);

CREATE TABLE `Rotas_Encomendas` (
	`idRotaEncomenda` INT NOT NULL AUTO_INCREMENT,
	`FK_encomendas` INT NOT NULL,
	`FK_rotas` INT NOT NULL,
	`FK_status` INT NOT NULL,
	`FK_endereco` INT NOT NULL,
	PRIMARY KEY (`idRotaEncomenda`)
);

ALTER TABLE `Funcionarios` ADD CONSTRAINT `Funcionarios_fk0` FOREIGN KEY (`FK_enderecos`) REFERENCES `Endereços`(`idEndereco`);

ALTER TABLE `Funcionarios` ADD CONSTRAINT `Funcionarios_fk1` FOREIGN KEY (`FK_sedes`) REFERENCES `Sedes`(`idSede`);

ALTER TABLE `Sedes` ADD CONSTRAINT `Sedes_fk0` FOREIGN KEY (`FK_enderecos`) REFERENCES `Endereços`(`idEndereco`);

ALTER TABLE `Encomendas` ADD CONSTRAINT `Encomendas_fk1` FOREIGN KEY (`FK_enderecoDestinatario`) REFERENCES `Endereços`(`idEndereco`);

ALTER TABLE `Encomendas` ADD CONSTRAINT `Encomendas_fk2` FOREIGN KEY (`FK_enderecoRemetente`) REFERENCES `Endereços`(`idEndereco`);

ALTER TABLE `Encomendas` ADD CONSTRAINT `Encomendas_fk3` FOREIGN KEY (`FK_enderecoSede`) REFERENCES `Sedes`(`idSede`);

ALTER TABLE `Rotas` ADD CONSTRAINT `Rotas_fk0` FOREIGN KEY (`FK_funcionario`) REFERENCES `Funcionarios`(`idFuncionario`);

ALTER TABLE `Rotas_Encomendas` ADD CONSTRAINT `Rotas_Encomendas_fk0` FOREIGN KEY (`FK_encomendas`) REFERENCES `Encomendas`(`idEncomenda`);

ALTER TABLE `Rotas_Encomendas` ADD CONSTRAINT `Rotas_Encomendas_fk1` FOREIGN KEY (`FK_rotas`) REFERENCES `Rotas`(`idRota`);

ALTER TABLE `Rotas_Encomendas` ADD CONSTRAINT `Rotas_Encomendas_fk2` FOREIGN KEY (`FK_status`) REFERENCES `Status`(`idStatus`);

ALTER TABLE `Rotas_Encomendas` ADD CONSTRAINT `Rotas_Encomendas_fk3` FOREIGN KEY (`FK_endereco`) REFERENCES `Endereços`(`idEndereco`);

