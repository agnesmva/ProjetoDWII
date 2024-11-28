DROP SCHEMA IF exists apotecario;
CREATE SCHEMA apotecario;

USE apotecario;

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

INSERT INTO produto (nome, descricao, tipo, preco_unitario, url_foto)
VALUES 
('Poção do Amor Ardente', 'Desperta paixão e atrai sentimentos. Frasco em formato de coração.', 'Poção', 49.90, 'assets/img/amorardente.png'),
('Elixir da Inteligência Brilhante', 'Aumenta o raciocínio lógico e clareza mental.', 'Poção', 59.90, 'assets/img/inteligenciabrilhante.png'),
('Poção da Beleza Natural', 'Melhora a aparência da pele e proporciona brilho.', 'Poção', 39.90, 'assets/img/belezanatural.png'),
('Essência do Sono Profundo', 'Induz um sono reparador e prolongado.', 'Poção', 44.90, 'assets/img/sonoprofundo.png'),
('Catuaba', 'Erva estimulante que aumenta a energia e vigor.', 'Ingrediente', 5.50, 'assets/img/catuaba.png'),
('Jenipapo', 'Fruta tropical que promove a vitalidade.', 'Ingrediente', 3.75, 'assets/img/jenipapo.png'),
('Pitanga', 'Fruta com alto teor de antioxidantes.', 'Ingrediente', 4.00, 'assets/img/pitanga.png'),
('Pétalas de rosa', 'Usadas para atrair amor e aumentar a autoestima.', 'Ingrediente', 6.25, 'assets/img/petalasderosa.png'),
('Guaraná', 'Estimulante natural que aumenta o foco e energia.', 'Ingrediente', 3.00, 'assets/img/guarana.png'),
('Açaí', 'Fruta rica em antioxidantes e revitalizante.', 'Ingrediente', 4.50, 'assets/img/acai.png'),
('Baru', 'Castanha poderosa, conhecida por suas propriedades energéticas.', 'Ingrediente', 7.00, 'assets/img/baru.png'),
('Raiz de ginseng encantado', 'Raiz rara que melhora o raciocínio lógico.', 'Ingrediente', 10.00, 'assets/img/ginseng.png'),
('Óleo de copaíba', 'Óleo essencial para regeneração e cura da pele.', 'Ingrediente', 8.25, 'assets/img/copaiba.png'),
('Buriti', 'Fonte de vitaminas para rejuvenescimento da pele.', 'Ingrediente', 5.75, 'assets/img/buriti.png'),
('Flor de hibisco', 'Ingrediente usado para equilíbrio e relaxamento.', 'Ingrediente', 4.80, 'assets/img/hibisco.png'),
('Pérolas', 'Símbolo de pureza, usado para brilho e clareza.', 'Ingrediente', 12.50, 'assets/img/perolas.png'),
('Maracujá', 'Ingrediente calmante que induz o relaxamento.', 'Ingrediente', 3.90, 'assets/img/maracuja.png'),
('Melissa', 'Conhecida por aliviar a ansiedade e o estresse.', 'Ingrediente', 4.20, 'assets/img/melissa.png'),
('Capim-limão', 'Erva refrescante que melhora o humor.', 'Ingrediente', 2.80, 'assets/img/capim-limao.png'),
('Pó de lavanda', 'Conhecido por suas propriedades calmantes e relaxantes.', 'Ingrediente', 6.00, 'assets/img/lavanda.png');

DROP USER IF EXISTS 'php'@'localhost';
FLUSH PRIVILEGES;
CREATE USER 'php'@'localhost' IDENTIFIED BY 'Senha!123';
GRANT ALL ON apotecario.* TO 'php'@'localhost';