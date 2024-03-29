/*
  TABELA ENDEREÇO
*/
CREATE TABLE santana.endereco (
  id_endereco INT(255) NOT NULL AUTO_INCREMENT,
  endereco VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  numero VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  cidade VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  estado VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  bairro VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  cep VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (id_endereco)
)
ENGINE = INNODB,
AUTO_INCREMENT = 2,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

/*
  TABELA TAGS
*/
CREATE TABLE santana.tags (
  id_tag INT(255) NOT NULL AUTO_INCREMENT,
  tag VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_tag)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

/*
  TABELA EMAIL
*/
CREATE TABLE santana.email (
  id_email INT(255) NOT NULL AUTO_INCREMENT,
  email VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (id_email)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

/*
  TABELA TELEFONE
*/
CREATE TABLE santana.telefone (
  id_telefone INT(255) NOT NULL AUTO_INCREMENT,
  telefone VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_telefone)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

/*
  TABELA PESSOA
*/
CREATE TABLE santana.pessoa (
  id_pessoa INT(255) NOT NULL,
  nome VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  nome_abreviado VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  contato VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  cnpj_cpf INT(14) DEFAULT NULL,
  ie INT(9) DEFAULT NULL,
  im INT(15) DEFAULT NULL,
  tipo_atividade VARCHAR(255) DEFAULT NULL,
  tags_id INT(255) DEFAULT NULL,
  email_id INT(255) DEFAULT NULL,
  endereco_id INT(255) DEFAULT NULL,
  telefone_id INT(255) DEFAULT NULL,
  incluido_por VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  alterado_por VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  ultima_alteracao DATETIME DEFAULT NULL,
  inclusao DATETIME DEFAULT NULL,
  PRIMARY KEY (id_pessoa)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

ALTER TABLE santana.pessoa 
  ADD UNIQUE INDEX UK_pessoa_id_pessoa(id_pessoa);

ALTER TABLE santana.pessoa 
  ADD CONSTRAINT FK_pessoa_email_id FOREIGN KEY (email_id)
    REFERENCES santana.email(id_email) ON DELETE CASCADE;

ALTER TABLE santana.pessoa 
  ADD CONSTRAINT FK_pessoa_endereco_id FOREIGN KEY (endereco_id)
    REFERENCES santana.endereco(id_endereco) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE santana.pessoa 
  ADD CONSTRAINT FK_pessoa_tags_id FOREIGN KEY (tags_id)
    REFERENCES santana.tags(id_tag) ON DELETE CASCADE;

ALTER TABLE santana.pessoa 
  ADD CONSTRAINT FK_pessoa_telefone_id FOREIGN KEY (telefone_id)
    REFERENCES santana.telefone(id_telefone) ON DELETE CASCADE;



/*
  TABELA ROLE
*/
CREATE TABLE santana.role (
  id_role INT(11) NOT NULL AUTO_INCREMENT,
  role VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_role)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

/*
  TABELA USERS
*/
CREATE TABLE santana.users (
  id_users INT(255) NOT NULL,
  username VARCHAR(20) NOT NULL,
  create_time DATETIME DEFAULT NULL,
  update_time DATETIME DEFAULT NULL,
  password CHAR(60) NOT NULL,
  pessoa_id INT(255) DEFAULT NULL,
  role_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id_users)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

ALTER TABLE santana.users 
  ADD CONSTRAINT FK_users_pessoa_id FOREIGN KEY (pessoa_id)
    REFERENCES santana.pessoa(id_pessoa) ON DELETE CASCADE;

ALTER TABLE santana.users 
  ADD CONSTRAINT FK_users_role_id FOREIGN KEY (role_id)
    REFERENCES santana.role(id_role) ON DELETE NO ACTION;





    --
-- Script was generated by Devart dbForge Studio 2019 for MySQL, Version 8.2.23.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 23/03/2020 20:54:08
-- Server version: 5.5.5-10.3.22-MariaDB-0+deb10u1
-- Client version: 4.1
--

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set SQL mode
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE santana;

--
-- Drop table `users`
--
DROP TABLE IF EXISTS users;

--
-- Drop table `role`
--
DROP TABLE IF EXISTS role;

--
-- Drop table `pessoa`
--
DROP TABLE IF EXISTS pessoa;

--
-- Drop table `email`
--
DROP TABLE IF EXISTS email;

--
-- Drop table `endereco`
--
DROP TABLE IF EXISTS endereco;

--
-- Drop table `tags`
--
DROP TABLE IF EXISTS tags;

--
-- Drop table `telefone`
--
DROP TABLE IF EXISTS telefone;

--
-- Set default database
--
USE santana;

--
-- Create table `telefone`
--
CREATE TABLE IF NOT EXISTS telefone (
  id_telefone INT(255) NOT NULL AUTO_INCREMENT,
  telefone VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_telefone)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Create table `tags`
--
CREATE TABLE IF NOT EXISTS tags (
  id_tag INT(255) NOT NULL AUTO_INCREMENT,
  tag VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_tag)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Create table `endereco`
--
CREATE TABLE IF NOT EXISTS endereco (
  id_endereco INT(255) NOT NULL AUTO_INCREMENT,
  endereco VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  numero VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  cidade VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  estado VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  bairro VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  cep VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (id_endereco)
)
ENGINE = INNODB,
AUTO_INCREMENT = 2,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Create table `email`
--
CREATE TABLE IF NOT EXISTS email (
  id_email INT(255) NOT NULL AUTO_INCREMENT,
  email VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (id_email)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Create table `pessoa`
--
CREATE TABLE IF NOT EXISTS pessoa (
  id_pessoa INT(255) NOT NULL,
  nome VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  nome_abreviado VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  contato VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  cnpj_cpf INT(14) DEFAULT NULL,
  ie INT(9) DEFAULT NULL,
  im INT(15) DEFAULT NULL,
  tipo_atividade VARCHAR(255) DEFAULT NULL,
  tags_id INT(255) DEFAULT NULL,
  email_id INT(255) DEFAULT NULL,
  endereco_id INT(255) DEFAULT NULL,
  telefone_id INT(255) DEFAULT NULL,
  incluido_por VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  alterado_por VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  ultima_alteracao DATETIME DEFAULT NULL,
  inclusao DATETIME DEFAULT NULL,
  PRIMARY KEY (id_pessoa)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Create index `UK_pessoa_id_pessoa` on table `pessoa`
--
ALTER TABLE pessoa 
  ADD UNIQUE INDEX UK_pessoa_id_pessoa(id_pessoa);

--
-- Create foreign key
--
ALTER TABLE pessoa 
  ADD CONSTRAINT FK_pessoa_email_id FOREIGN KEY (email_id)
    REFERENCES email(id_email) ON DELETE CASCADE;

--
-- Create foreign key
--
ALTER TABLE pessoa 
  ADD CONSTRAINT FK_pessoa_endereco_id FOREIGN KEY (endereco_id)
    REFERENCES endereco(id_endereco) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Create foreign key
--
ALTER TABLE pessoa 
  ADD CONSTRAINT FK_pessoa_tags_id FOREIGN KEY (tags_id)
    REFERENCES tags(id_tag) ON DELETE CASCADE;

--
-- Create foreign key
--
ALTER TABLE pessoa 
  ADD CONSTRAINT FK_pessoa_telefone_id FOREIGN KEY (telefone_id)
    REFERENCES telefone(id_telefone) ON DELETE CASCADE;

--
-- Create table `role`
--
CREATE TABLE IF NOT EXISTS role (
  id_role INT(11) NOT NULL AUTO_INCREMENT,
  role VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_role)
)
ENGINE = INNODB,
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Create table `users`
--
CREATE TABLE IF NOT EXISTS users (
  id_users INT(255) NOT NULL,
  username VARCHAR(20) NOT NULL,
  create_time DATETIME DEFAULT NULL,
  update_time DATETIME DEFAULT NULL,
  password CHAR(60) NOT NULL,
  pessoa_id INT(255) DEFAULT NULL,
  role_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id_users)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create foreign key
--
ALTER TABLE users 
  ADD CONSTRAINT FK_users_pessoa_id FOREIGN KEY (pessoa_id)
    REFERENCES pessoa(id_pessoa) ON DELETE CASCADE;

--
-- Create foreign key
--
ALTER TABLE users 
  ADD CONSTRAINT FK_users_role_id FOREIGN KEY (role_id)
    REFERENCES role(id_role) ON DELETE NO ACTION;

-- 
-- Dumping data for table telefone
--
-- Table santana.telefone does not contain any data (it is empty)

-- 
-- Dumping data for table tags
--
-- Table santana.tags does not contain any data (it is empty)

-- 
-- Dumping data for table endereco
--
INSERT INTO endereco VALUES
(1, 'rua padres salesianos', '455', 'rio preto', 'sp', 'joao paulo', '15053-060');

-- 
-- Dumping data for table email
--
-- Table santana.email does not contain any data (it is empty)

-- 
-- Dumping data for table role
--
INSERT INTO role VALUES
(1, 'ADMINISTRADOR'),
(2, 'VENDEDOR'),
(3, 'CLIENTE');

-- 
-- Dumping data for table pessoa
--
-- Table santana.pessoa does not contain any data (it is empty)

-- 
-- Dumping data for table users
--
INSERT INTO users VALUES
(1, 'jose', '2020-03-18 23:08:10', NULL, '0323', NULL, NULL),
(2, 'luana', '2020-03-19 15:11:00', NULL, '1408', NULL, NULL);

-- 
-- Restore previous SQL mode
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;