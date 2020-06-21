use sucos;

create table tbClientes3(
	cpf varchar(11),
    nome varchar(100),
    endereco1 varchar(150),
    endereco2 varchar(150),
    bairro varchar(50),
    cidade varchar(50),
    estado varchar(50),
    cep varchar(8),
    idade smallint,
    sexo varchar(1),
    limite_credito float,
    volume_compra float,
    primeira_compra bit(1)
);

create table tabela_de_vendedores(
	matricula varchar(5),
    nome varchar(100),
    percentual_comissao float
);

create table tbProdutos(
	produto varchar(5),
    nome varchar(100),
    embalagem varchar(50),
    tamanho VARCHAR(50),
    sabor varchar(50),
    preco_lista float
);

drop table if exists tbclientes2;

INSERT INTO tbprodutos(
	produto,
	nome,
	embalagem,
	tamanho,
	sabor,
	preco_lista
) values ('10401', 'Light - 350ml - Melancia', 'Lata', '350ml', 'Melância', 4.56);

select * from tbprodutos;

describe tabela_de_vendedores;

insert into tabela_de_vendedores(
	matricula,
	nome,
    percentual_comissao
    ) values
('00203', 'João Geraldo da Fonseca', 10.0);

INSERT INTO TABELA_DE_VENDEDORES
(MATRICULA, NOME, PERCENTUAL_COMISSAO)
VALUES
 ('00235','Márcio Almeida Silva',0.08);
INSERT INTO TABELA_DE_VENDEDORES
(MATRICULA, NOME, PERCENTUAL_COMISSAO)
VALUES
('00236','Cláudia Morais',0.08);

INSERT INTO tbprodutos (
PRODUTO,  NOME, EMBALAGEM, TAMANHO, SABOR,
PRECO_LISTA) VALUES
('544931', 'Frescor do Verão - 350 ml - Limão', 'PET', '350 ml','Limão',3.20);

INSERT INTO tbprodutos (
PRODUTO,  NOME, EMBALAGEM, TAMANHO, SABOR,
PRECO_LISTA) VALUES
('1078680', 'Frescor do Verão - 470 ml - Manga', 'Lata', '470 ml','Manga',5.18);


update tbprodutos set embalagem = 'Lata', preco_lista = 2.46 where produto = '54493';

select * from tabela_de_vendedores;

update tabela_de_vendedores set nome = 'José Geraldo da Fonseca Júnior' where matricula = '00203';
update tabela_de_vendedores set percentual_comissao = 0.11 where matricula = '00236';

select * from tbprodutos;

DELETE FROM tbprodutos where produto = '10786';

delete from tabela_de_vendedores where matricula = '00203';

alter table tbprodutos add primary key (produto);

describe tbprodutos;

alter table tbclientes add primary key (cpf);

alter table tbclientes add column (datanascimento date);

insert into tbclientes (cpf, nome, endereco1, endereco2, bairro, cidade, estado, cep, idade, sexo, limite_credito, volume_compra, primeira_compra, datanascimento)
values ('12345678901', 'João', 'Rua teste1', '', 'Vila Romana', 'Caratinga', 'Amazonas', '00040020', 30, 'm', 10000.0, 2000, 0, 1989-01-01); 

alter table tabela_de_vendedores add column (data_admissao date);
alter table tabela_de_vendedores add column (de_ferias bit);

describe tabela_de_vendedores;

select * from tabela_de_vendedores;

alter table tabela_de_vendedores add primary key (matricula);

insert into tabela_de_vendedores(matricula, nome, percentual_comissao, data_admissao, de_ferias) values
('00235', 'Marcio Almeida Silva', 0.08, '2014-08-15', 0),
('00236', 'Cláudia Moraes', 0.08, '2013-09-17', 1),
('00237', 'Roberta Martins', 0.11, '2017-03-18', 1),
('00238', 'Péricles Alves', 0.11, '2016-08-21', 0);

select * from tbclientes;

select cpf, nome from tbclientes limit 5;

select cpf as cpf_cliente, nome as nome_cliente from tbclientes;

select nome, matricula from tabela_de_vendedores;

select * from tbprodutos where sabor = 'limão';

select * from tabela_de_vendedores where nome = 'Claudia Moraes';

select * from tbclientes where idade = 22;

select * from tbclientes where idade <> 22;

select * from tbclientes where nome <= 'Fernando Cavalcante';

select * from tbprodutos;

select * from tbprodutos where preco_lista between 6.308 and 6.310;

select * from tabela_de_vendedores where percentual_comissao > 0.1;

select * from tbclientes;

select * from tbclientes where year(data_nascimento) = 10;
select * from tbclientes where month(data_nascimento) = 10;

select * from tabela_de_vendedores where year(data_admissao) >= 2016;
