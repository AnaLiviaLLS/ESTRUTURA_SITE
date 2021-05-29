use sistemaProduto;

CREATE TABLE Entrada
(
  idE int NOT NULL AUTO_INCREMENT,
  idP int NOT NULL , 
  quantidadeE int NOT NULL,
  dataE date NOT NULL,
  PRIMARY KEY (idE)
) 
ENGINE=InnoDB;

CREATE TABLE Saida
(
  idS int NOT NULL AUTO_INCREMENT,
  idP int NOT NULL , 
  quantidadeS int NOT NULL,
  dataS date NOT NULL,
  PRIMARY KEY (idS)
) 
ENGINE=InnoDB;
 