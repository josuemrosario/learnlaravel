/*=======================================
//Criação do database
=======================================*/
create database sg;
use sg;

/*=======================================
// Table migrations
=======================================*/
select * from migrations;

/*=======================================
// Table users
=======================================*/

select * from users;
describe users;
insert into 
	users(name, email, password)
   values('josue','josue@josue.com.br','1234');



/*=======================================
// Table produtos
=========================================*/

describe produtos;

select * from produtos;

/*=======================================
// Table produtos_detalhes
=========================================*/

describe produtos_detalhes;
select * from produtos_detalhes;


/*=======================================
// Table filiais
=========================================*/
select * from filiais;
drop  table filiais;

/*=======================================
// Table produtos_filiais
=========================================*/
alter table produto_filiais drop foreign key produto_filiais_produto_id_foreign;

/*=======================================
//Tabela fornecedores
=======================================*/
describe fornecedores;
select * from fornecedores;

/*=======================================
// Tabela site_contatos
=======================================*/
select * from site_contatos;
describe site_contatos;
select * 
 from site_contatos;
 
 alter table site_contatos drop column motivo_contao;
 alter table site_contatos change column motivo_contao motivo_contato int;
 
alter table site_contatos change column motivo_contao motivo_contato int;

truncate site_contatos;
 
 
use sg;
insert into site_contatos(nome, telefone, email, motivo_contato, mensagem)values('João', '(88) 91111-2222', 'joao@contato.com.br', 3, 'É muito difícil localizar a opção de listar todos os produtos');
insert into site_contatos(nome, telefone, email, motivo_contato, mensagem)values('Rosa', '(33) 92222-3333', 'rosa@contato.com.br', 1, 'Quando custa essa aplicação?');
insert into site_contatos(nome, telefone, email, motivo_contato, mensagem)values('Fernando', '(11) 94444-5555', 'fernando@contato.com.br', 1, 'Como consigo criar multiplos usuários para minha empresa?');
insert into site_contatos(nome, telefone, email, motivo_contato, mensagem)values('André', '(88) 95555-6666', 'andre@contato.com.br', 2, 'Parabéns pela ferramenta, estou obtendo ótimos resultados!');
insert into site_contatos(nome, telefone, email, motivo_contato, mensagem)values('Ana', '(33) 96666-7777', 'ana@contato.com.br', 3, 'Não gostei muito das cores, consigo mudar de tema?');
insert into site_contatos(nome, telefone, email, motivo_contato, mensagem)values('Helena', '(11) 97777-8888', 'helena@contato.com.br', 2, 'Consigo controlar toda a minha empresa de modo fácil e prático.');
 
 

 
 /*=======================================
// Tabela motivos_contato
=======================================*/

describe motivos_contato;
select * from motivos_contato;

 /*=======================================
// Tabela log_acessos
=======================================*/

describe log_acessos;
select * from log_acessos;


