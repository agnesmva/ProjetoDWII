CREATE SCHEMA fatecshop;

USE fatecshop;

CREATE TABLE endereco (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cep VARCHAR(255),
    logradouro VARCHAR(255),
    numero VARCHAR(255),
    complemento VARCHAR(255),
    bairro VARCHAR(255),
    localidade VARCHAR(255),
    uf CHAR(2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL
);
CREATE TABLE cliente (
	id INT AUTO_INCREMENT NOT NULL,
	nome VARCHAR(50) NOT NULL,
	telefone VARCHAR(255),
	email VARCHAR(255),
    username VARCHAR(255),
	senha VARCHAR(255),
    id_endereco INT,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
	PRIMARY KEY (id),
    CONSTRAINT fk_cliente_endereco
    FOREIGN KEY (id_endereco) REFERENCES endereco(id)
);


        
CREATE TABLE produto (
	id INT AUTO_INCREMENT NOT NULL,
	nome VARCHAR(255) NOT NULL,
	descricao VARCHAR(255),
	tipo VARCHAR(255),
	preco_unitario DECIMAL(7,2),
    url_foto VARCHAR(255),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
	PRIMARY KEY (id)
);


CREATE TABLE pedido (
	id INT AUTO_INCREMENT NOT NULL,
	id_cliente INT(5),
	data_pedido DATETIME,
	forma_pagto VARCHAR(20),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_cliente) REFERENCES cliente (id)
);

CREATE TABLE pedidos_produto (
	id_pedido INT NOT NULL,
	id_produto INT NOT NULL,
	preco_unitario DECIMAL(7,2),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
	PRIMARY KEY (id_pedido, id_produto),
	FOREIGN KEY (id_pedido) REFERENCES pedido (id),
	FOREIGN KEY (id_produto) REFERENCES produto (id)
);

CREATE TABLE carrinho (
	id INT AUTO_INCREMENT NOT NULL,
	sessao CHAR(255) NOT NULL,
	id_produto INT(5) NOT NULL,
	preco_unitario DECIMAL(7,2),
	quantidade INT(3),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
	PRIMARY KEY (id),
    FOREIGN KEY (id_produto) REFERENCES produto (id)
);

CREATE USER 'php'@'localhost' IDENTIFIED BY 'Senha!123';
GRANT ALL ON fatecshop.* TO 'php'@'localhost';