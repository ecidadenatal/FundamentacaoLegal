create table plugins.fundamentacaolegal (
sequencial integer,
descricao varchar(200),
lei varchar(10),
artigo varchar(10),
inciso varchar(10),
codigotce integer,
validasaldo boolean
);

CREATE SEQUENCE plugins.fundamentacaolegal_sequencial_seq
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

create table plugins.fundamentacaolegaldesdobramentos (
sequencial integer,
orgao integer,
unidade integer,
fundamentacaolegal integer,
orcelemento integer,
valorlimite numeric(10,2));

CREATE SEQUENCE plugins.fundamentacaolegaldesdobramentos_sequencial_seq
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

create table plugins.empautorizafundamentacaolegal (
sequencial integer, 
empautoriza integer, 
fundamentacaolegal integer);

CREATE SEQUENCE plugins.empautorizafundamentacaolegal_sequencial_seq
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

create table plugins.fundamentacaolegalmodalidade (
sequencial integer,
fundamentacaolegal integer, 
modalidade integer
);

CREATE SEQUENCE plugins.fundamentacaolegalmodalidade_sequencial_seq
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
CACHE 1;