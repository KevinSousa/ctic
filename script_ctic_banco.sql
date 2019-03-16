DROP DATABASE IF EXISTS ctic;
DROP USER IF EXISTS adminctic; 

CREATE DATABASE ctic;

CREATE USER 'adminctic'@'localhost' IDENTIFIED BY 'ctic123';
GRANT ALL ON ctic.* TO 'adminctic'@'localhost';

USE ctic;

/*CREATE TABLE setores( SERIA UMA TABELA DOS SETORES DOS FUNCIONARIOS 
	set_id INT NOT NULL,
    set_nome VARCHAR (255),
		CONSTRAINT pksetores PRIMARY KEY (set_id)
);*/

CREATE TABLE funcoes( /* FUNCOES DOS FUNCIONARIOS */
	funcao_id INT NOT NULL,
    funcao_nome VARCHAR (255) NOT NULL,
		CONSTRAINT pkfuncao PRIMARY KEY (funcao_id)
);

CREATE TABLE funcionario( /* TABELA DOS FUNCIONARIOS */
	func_id INT NOT NULL,
	func_nome VARCHAR(255) NOT NULL,
    func_cpf VARCHAR(255) NOT NULL,
    func_numero_siap VARCHAR(9) NOT NULL,
    func_funcao INT NOT NULL NOT NULL,
		CONSTRAINT pkfunc PRIMARY KEY (func_id),
        CONSTRAINT fkfuncao FOREIGN KEY (func_funcao)
			REFERENCES funcoes(funcao_id)
);

CREATE TABLE salas( /* TABELA DAS SALAS */
	sala_id INT NOT NULL,
    sala_identificacao VARCHAR (20) NOT NULL,
    sala_andar SET('TÉRREO', 'PRIMEIRO', 'SEGUNDO', 'TERCEIRO'),
		CONSTRAINT pksalas PRIMARY KEY (sala_id)
);

CREATE TABLE tipo_equipamento( /* TIPOS DOS EQUIPAMENTOS. EX: REDE, HARDWARE, PROJEÇÃO, ENERGIA E ETC.*/
	tipo_id INT NOT NULL,
    tipo_nome VARCHAR(200) NOT NULL,
		CONSTRAINT pktipo PRIMARY KEY (tipo_id)
);

CREATE TABLE equipamentos( /* TABELA DOS EQUIPAMENTOS */
	equip_id INT NOT NULL,
    equip_marca VARCHAR(200),
    equip_tombamento VARCHAR(200),
    equip_tipo INT NOT NULL,
		CONSTRAINT pkequip PRIMARY KEY (equip_id),
        CONSTRAINT fktipo FOREIGN KEY (equip_tipo)
			REFERENCES tipo_equipamento(tipo_id)
);

CREATE TABLE tipo_problema( /* ESSA TABELA É PRA ESPECIFICAR O TIPO DO PROBLEMA. EX: HARDWARE, SOFTWARE, REDE E ETC.*/
	probl_id INT NOT NULL,
    probl_tipo VARCHAR(200) NOT NULL,
		CONSTRAINT pkprobl PRIMARY KEY (probl_id)
);

CREATE TABLE chamados( /* TABELA DOS CHAMADOS */
	cham_id INT NOT NULL,
    cham_data_chamado TIMESTAMP NOT NULL, /*AQUI É A DATA DO CHAMADO EFETUADO*/
    cham_grau_urgencia SET ('BAIXO', 'MÉDIO', 'ALTO'),
    cham_funcionario INT NOT NULL, /* FUNCIONARIO */
    cham_sala INT NOT NULL, /* SALA */
    cham_equip INT NOT NULL, /* EQUIPAMENTO */
    cham_tipo_problema INT NOT NULL, /* TIPO DO PROBLEMA */
    cham_data_prevista DATETIME NOT NULL, /*AQUI É A DATA PARA O ATENDIMENTO DO CHAMADO*/
    cham_descricao TEXT NOT NULL, /* DESCRICAO DO PROBLEMA */
		CONSTRAINT pkchamado PRIMARY KEY (cham_id),
        CONSTRAINT fkfunc FOREIGN KEY (cham_funcionario)
			REFERENCES funcionario(func_id),
		CONSTRAINT fksala FOREIGN KEY (cham_sala)
			REFERENCES salas(sala_id),
		CONSTRAINT fkequip FOREIGN KEY (cham_equip)
			REFERENCES equipamentos(equip_id),
		CONSTRAINT fktipoproblema FOREIGN KEY (cham_tipo_problema)
			REFERENCES tipo_problema(probl_id)
);