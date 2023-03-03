---------------------------------
CREATE SCHEMA IF NOT EXISTS bdApollo DEFAULT CHARACTER SET utf8 ;
USE bdApollo ;

CREATE TABLE IF NOT EXISTS usuario (
  cod INT NOT NULL primary key auto_increment,
  desnome VARCHAR(45) NOT NULL,
  desemail VARCHAR(45) NOT NULL,
  desenha VARCHAR(45) NOT NULL,
  destatus VARCHAR(15) DEFAULT 'ativo');


CREATE TABLE IF NOT EXISTS categoria(
  cod INT NOT NULL primary key auto_increment,
  desnome VARCHAR(45) NOT NULL,
  destatus VARCHAR(15) DEFAULT 'ativo');
   
CREATE TABLE IF NOT EXISTS setor(
  cod INT NOT NULL primary key auto_increment,
  desnome VARCHAR(45) NOT NULL,
  destatus VARCHAR(15) DEFAULT 'ativo');
   


CREATE TABLE IF NOT EXISTS marca (
  cod INT NOT NULL primary key auto_increment ,
  desnome VARCHAR(45) NOT NULL,
  destatus VARCHAR(15) DEFAULT 'ativo');

CREATE TABLE IF NOT EXISTS linha_de_venda (
  cod INT NOT NULL PRIMARY KEY auto_increment,
  desnome VARCHAR(50) NOT NULL,
  destatus VARCHAR(15) DEFAULT 'ativo');

CREATE TABLE IF NOT EXISTS pagamento (
  cod INT NOT null primary key auto_increment ,
  desnome VARCHAR(50) NOT NULL,
  destatus VARCHAR(15)  DEFAULT 'ativo');
  
  insert into pagamento (desnome) values
("Avista"),
("Boleto");



CREATE TABLE IF NOT EXISTS vendedor (
  cod INT NOT NULL primary key auto_increment  ,
  destatus VARCHAR(15)  DEFAULT 'ativo',
  desnome VARCHAR(45) NOT NULL,
  RG CHAR(7) NOT NULL,
  CPF CHAR(11) NOT NULL,
  CEP CHAR(9) NOT NULL,
  nrfone VARCHAR(12) NOT NULL,
  nrlocal CHAR(4) NOT NULL,
  deslocal VARCHAR(45) NOT NULL,
  dtcontratacao DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dtdemissao DATE NULL ,
  dtnascimento DATE NOT NULL);

CREATE TABLE IF NOT EXISTS cliente_fornecedor (
  cod INT NOT NULL primary key auto_increment,
  destatus VARCHAR(15) NULL DEFAULT 'ativo',
  idlinhavenda int,
  desrazaosocial VARCHAR(45) NOT NULL,
  desnomefantazia VARCHAR(45) NOT NULL,
  CEP CHAR(9) NOT NULL,
  CNPJ_CPF VARCHAR(14) NOT NULL,
  nrfone VARCHAR(12) NOT NULL,
  nrlocal CHAR(4) NOT NULL,
  deslocal VARCHAR(45) NOT NULL,
  ie CHAR(9),
  pfisica boolean default false,
  fornecedor boolean default false,
  
  FOREIGN KEY (idlinhavenda) REFERENCES linha_de_venda (cod));


CREATE TABLE IF NOT EXISTS produto (
  cod INT NOT NULL primary key auto_increment,
  desnome VARCHAR(45) NOT NULL,
  destatus VARCHAR(15) NOT NULL DEFAULT 'ativo',
  vlcompra DECIMAL(10,2) NOT NULL,
  tbvenda1 DECIMAL(10,2) NOT NULL,
  tbvenda2 DECIMAL(10,2) NOT NULL,
  tbvenda3 DECIMAL(10,2) NOT NULL,
  cmvenda1 DECIMAL(10,2) NOT NULL,
  cmvenda2 DECIMAL(10,2) NOT NULL,
  cmvenda3 DECIMAL(10,2) NOT NULL,
  mglucro1 DECIMAL(10,2) NOT NULL,
  mglucro2 DECIMAL(10,2) NOT NULL,
  mglucro3 DECIMAL(10,2) NOT NULL,
  qtestoque INT NOT NULL DEFAULT 0,
  idcategoria INT NOT NULL,
  idmarca INT NOT NULL,
  idsetor INT NOT NULL,
  FOREIGN KEY (idcategoria) REFERENCES categoria (cod),
  FOREIGN KEY (idmarca) REFERENCES marca (cod),
   FOREIGN KEY (idsetor) REFERENCES setor (cod)
  );




CREATE TABLE IF NOT EXISTS mov_venda_compra (
  cod INT NOT NULL primary key auto_increment,
  destatus VARCHAR(15) NOT NULL DEFAULT 'faturado',
  vltotal DECIMAL(10,2) NULL DEFAULT 0,
  dt DATE NULL DEFAULT CURRENT_TIMESTAMP,
  desconto DECIMAL(10,2) NULL,
  idpagamento INT default 1,
  idvendedor INT NULL,
  idclientefornecedor INT NOT NULL,
  compra boolean  DEFAULT false,
  FOREIGN KEY (idpagamento) REFERENCES pagamento (cod),
    FOREIGN KEY (idvendedor) REFERENCES vendedor (cod),
    FOREIGN KEY (idclientefornecedor) REFERENCES cliente_fornecedor (cod));


CREATE TABLE IF NOT EXISTS itens_venda_compra (
  idproduto int not null,
  idvendacompra int not null ,
  desnome VARCHAR(50) NOT NULL,
  qtd INT NOT NULL DEFAULT 1,
  tbvenda INT NULL,
  pcdesconto DECIMAL(5,2) NULL,
  vlunitario DECIMAL(10,2) NOT NULL,
  vltotal DECIMAL(5,2) NOT NULL,
  primary key(idproduto,idvendacompra),
  FOREIGN KEY (idproduto) REFERENCES produto (cod),
  FOREIGN KEY (idvendacompra) REFERENCES mov_venda_compra (cod));


 insert into categoria (desnome) values
("cat1");
 insert into marca (desnome) values
("mac1");

 insert into vendedor (desnome,RG,CPF,CEP,nrfone,nrlocal,deslocal,dtnascimento) values
("ven1",1234567,12345678912,123456789,984545540,0949,"av Parana",2005-05-06);

insert into linha_de_venda(desnome) values
("lin1");
insert into setor(desnome) values
("set1");

 insert into cliente_fornecedor (idlinhavenda,desrazaosocial,desnomefantazia,CNPJ_CPF,CEP,nrfone,nrlocal,deslocal) values
(1,"razaosocial","nomefantazia",12345678912345,1234678,984545540,0949,"av Parana");



insert into produto (desnome,vlcompra,tbvenda1,tbvenda2,tbvenda3,cmvenda1,cmvenda2,cmvenda3,mglucro1,mglucro2,mglucro3,idcategoria,idmarca,idsetor) values
("prod1",10,1,2,3,1,2,3,1,2,3,1,1,1);



insert into mov_venda_compra (idclientefornecedor) values
(1);

insert into itens_venda_compra(idproduto,idvendacompra,desnome,vlunitario,vltotal) values
(2,1,"produto",1,1);
