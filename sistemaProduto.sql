CREATE DATABASE sistemaProduto CHARACTER SET utf8 COLLATE utf8_bin;

use sistemaProduto;

CREATE TABLE Produto
(
  idP int NOT NULL AUTO_INCREMENT,
  nomeP varchar(60) NOT NULL,
  sexoP set ('M','F') NOT NULL,
  idTipo int NOT NULL,  
  idMarca int NOT NULL,  
  tamanhoP set ('PP','P','M','G','GG') NOT NULL,  
  quantidadeP int NOT NULL,
  precoC decimal (7,2) NOT NULL,
  precoV decimal (7,2) NOT NULL,
  assunto varchar(300) NULL,
  fornecedor varchar(60) NOT NULL,
  PRIMARY KEY (idP)
) 
ENGINE=InnoDB;

CREATE TABLE Tipo (
  idTipo INT NOT NULL AUTO_INCREMENT, 
  nomeT varchar(40) NOT NULL,
  PRIMARY KEY (idTipo)
) ENGINE=INNODB; 

ALTER TABLE Produto
ADD CONSTRAINT T_Produto
FOREIGN KEY (idTipo) REFERENCES Tipo(idTipo);

CREATE TABLE Marca (
  idMarca INT NOT NULL AUTO_INCREMENT, 
  nomeM varchar(40) NOT NULL,
  PRIMARY KEY (idMarca)
) ENGINE=INNODB; 

ALTER TABLE Produto
ADD CONSTRAINT M_Produto
FOREIGN KEY (idMarca) REFERENCES Marca(idMarca);

//Inserir Produtos
insert into Tipo values (1,"Camisa"); 
insert into Tipo values (2,"Blusa"); 
insert into Tipo values (3,"Vestido"); 
insert into Tipo values (4,"Regata");
insert into Tipo values (5,"Calça");
insert into Tipo values (6,"Saia");
// Inserir Marcas
insert into Marca values (1,"Nike");
insert into Marca values (2,"Adidas"); 
insert into Marca values (3,"Puma"); 
insert into Marca values (4,"Lacoste");
insert into Marca values (5,"Pollo");
insert into Marca values (6,"Ambercombie");

insert into Produto (nomeP,sexoP, idTipo, idMarca, tamanhoP, quantidadeP, precoC, precoV, assunto, fornecedor)  Values("CAMISETA MASCULINA ÓPERA BRASIL MESCLA",'M' ,1, 1,'PP', 5, 22.5,30.99,"A Camiseta Masculina Mescla da Ópera tem mangas curtas, gola redonda, listras horizontais na cor laranja, bolso na altura do tórax e modelagem reta.","nike");

CREATE TABLE login (
  idLogin INT NOT NULL AUTO_INCREMENT, 
  login varchar(20) NOT NULL,
  senha varchar(16) NOT NULL,
  nome varchar(50) NOT NULL,
  PRIMARY KEY (idLogin)
) ENGINE=INNODB; 

insert into login (login, Senha, nome) Values("Daniel","12345","Daniel");
 