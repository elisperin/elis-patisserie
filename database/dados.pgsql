-- produtos

-- CREATE TABLE produtos(
--     id SERIAL PRIMARY KEY NOT NULL,
--     nome VARCHAR(80) NOT NULL,
--     categoria VARCHAR(60) NOT NULL,
--     preco VARCHAR(20) NOT NULL,
--     estoque VARCHAR(20) NOT NULL,
--     unidade VARCHAR(60) NOT NULL,
--     descricao TEXT,
--     rendimento VARCHAR(80),
--     alergenos VARCHAR(120),
--     imagem VARCHAR(100),
--     ativo BOOLEAN
-- );


-- pedidos

-- CREATE TABLE pedidos(
--     id SERIAL PRIMARY KEY NOT NULL,
--     cliente VARCHAR(100) NOT NULL,
--     email VARCHAR(100) NOT NULL,
--     telefone VARCHAR(30) NOT NULL,
--     produto TEXT NOT NULL,
--     quantidade VARCHAR(20) NOT NULL,
--     unidade VARCHAR(60) NOT NULL,
--     tipo_recebimento VARCHAR(50) NOT NULL,
--     data_retirada DATE,
--     periodo VARCHAR(30),
--     observacao TEXT,
--     status VARCHAR(50),
--     total VARCHAR(30)
-- );



-- usuarios

-- CREATE TABLE usuarios(
--     id SERIAL PRIMARY KEY NOT NULL,
--     email VARCHAR(100) NOT NULL,
--     senha VARCHAR(60) NOT NULL
-- );



-- produtos

-- INSERT INTO produtos
-- (nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo)
-- VALUES
-- (
--     'Bolo Fraisier Retrô',
--     'Bolos e Tortas',
--     '189.90',
--     '8',
--     'Americana - SP',
--     'Bolo inspirado no clássico francês com morangos e creme.',
--     'Serve até 12 pessoas',
--     'Glúten, leite e ovos',
--     'imagens/bolo.png',
--     true
-- );


-- INSERT INTO produtos
-- (nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo)
-- VALUES
-- (
--     'Caixa de Macarons',
--     'Confeitaria Fina',
--     '78.00',
--     '20',
--     'Leblon - RJ',
--     'Seleção de macarons em sabores delicados.',
--     'Caixa com 12 unidades',
--     'Ovos, leite e amêndoas',
--     'imagens/macarons.png',
--     true
-- );


-- INSERT INTO produtos
-- (nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo)
-- VALUES
-- (
--     'Tartelette de Frutas',
--     'Sobremesas Individuais',
--     '24.00',
--     '25',
--     'Monte Verde - MG',
--     'Massa amanteigada, creme e frutas frescas.',
--     '1 unidade',
--     'Glúten, leite e ovos',
--     'imagens/produto.png',
--     true
-- );


-- INSERT INTO produtos
-- (nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo)
-- VALUES
-- (
--     'Kit Dia dos Namorados',
--     'Kits Comemorativos',
--     '149.90',
--     '10',
--     'Americana - SP',
--     'Caixa presenteável com doces, macarons e cartão.',
--     'Serve 2 pessoas',
--     'Glúten, leite, ovos e amêndoas',
--     'imagens/kits.png',
--     true
-- );


-- INSERT INTO produtos
-- (nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo)
-- VALUES
-- (
--     'Kit Páscoa Paris',
--     'Kits Comemorativos',
--     '169.90',
--     '12',
--     'Leblon - RJ',
--     'Seleção de chocolate, petit fours e embalagem especial.',
--     '1 kit',
--     'Leite, ovos, glúten e castanhas',
--     'imagens/kits.png',
--     true
-- );


-- INSERT INTO produtos
-- (nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo)
-- VALUES
-- (
--     'Kit Natal Retrô',
--     'Kits Comemorativos',
--     '179.90',
--     '9',
--     'Monte Verde - MG',
--     'Doces natalinos com apresentação em estilo retrô.',
--     '1 kit',
--     'Glúten, leite e ovos',
--     'imagens/kits.png',
--     true
-- );


-- INSERT INTO produtos
-- (nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo)
-- VALUES
-- (
--     'Kit Halloween Pastel',
--     'Kits Comemorativos',
--     '129.90',
--     '7',
--     'Americana - SP',
--     'Doces temáticos em tons pastel e embalagem divertida.',
--     '1 kit',
--     'Glúten, leite e ovos',
--     'imagens/kits.png',
--     true
-- );


-- INSERT INTO produtos
-- (nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo)
-- VALUES
-- (
--     'Kit Aniversário Elis',
--     'Kits Comemorativos',
--     '159.90',
--     '15',
--     'Leblon - RJ',
--     'Mini bolo, doces finos e cartão personalizado.',
--     'Serve 4 pessoas',
--     'Glúten, leite e ovos',
--     'imagens/kits.png',
--     true
-- );


-- INSERT INTO produtos
-- (nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo)
-- VALUES
-- (
--     'Mesa Petit Fours',
--     'Casamentos',
--     '320.00',
--     '5',
--     'Americana - SP',
--     'Seleção de petit fours para eventos e casamentos.',
--     '100 unidades',
--     'Glúten, leite, ovos e castanhas',
--     'imagens/casamento.png',
--     true
-- );


-- INSERT INTO produtos
-- (nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo)
-- VALUES
-- (
--     'Macarons para Casamento',
--     'Casamentos',
--     '280.00',
--     '6',
--     'Leblon - RJ',
--     'Macarons delicados para lembranças ou mesa de doces.',
--     '80 unidades',
--     'Ovos, leite e amêndoas',
--     'imagens/casamento.png',
--     true
-- );


-- INSERT INTO produtos
-- (nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo)
-- VALUES
-- (
--     'Mini Entremets',
--     'Casamentos',
--     '360.00',
--     '4',
--     'Monte Verde - MG',
--     'Mini sobremesas francesas para mesa de casamento.',
--     '60 unidades',
--     'Glúten, leite e ovos',
--     'imagens/casamento.png',
--     true
-- );


-- INSERT INTO produtos
-- (nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo)
-- VALUES
-- (
--     'Bolo Ópera',
--     'Bolos e Tortas',
--     '210.00',
--     '6',
--     'Leblon - RJ',
--     'Camadas de amêndoa, café e chocolate inspiradas na confeitaria francesa.',
--     'Serve até 10 pessoas',
--     'Glúten, leite, ovos e amêndoas',
--     'imagens/bolo.png',
--     true
-- );



-- testando o delete

-- INSERT INTO produtos
-- (nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo)
-- VALUES
-- (
--     'Produto Teste',
--     'Confeitaria Fina',
--     '10.00',
--     '1',
--     'Americana - SP',
--     'Registro criado para demonstrar o DELETE.',
--     '1 unidade',
--     'Nenhum',
--     'imagens/produto.png',
--     true
-- );



-- adminstradora (eu)

-- INSERT INTO usuarios
-- (email, senha)
-- VALUES
-- (
--     'admin@elispatisserie.com',
--     'elis123'
-- );



-- SELECT * FROM produtos;

-- SELECT * FROM usuarios;



-- update do BOLO FRAISIER

-- UPDATE produtos
-- SET estoque = '10'
-- WHERE nome = 'Bolo Fraisier Retrô';

-- SELECT * FROM produtos;



-- testando o delete com o produto teste

-- DELETE FROM produtos
-- WHERE nome = 'Produto Teste';

-- SELECT * FROM produtos;



-- consultando cada categoria


-- SELECT * FROM produtos
-- WHERE categoria = 'Bolos e Tortas';


-- SELECT * FROM produtos
-- WHERE categoria = 'Confeitaria Fina';


-- SELECT * FROM produtos
-- WHERE categoria = 'Sobremesas Individuais';


-- SELECT * FROM produtos
-- WHERE categoria = 'Kits Comemorativos';


-- SELECT * FROM produtos
-- WHERE categoria = 'Casamentos';



-- consultando cada unidade

-- SELECT * FROM produtos
-- WHERE unidade = 'Americana - SP';


-- SELECT * FROM produtos
-- WHERE unidade = 'Leblon - RJ';


-- SELECT * FROM produtos
-- WHERE unidade = 'Monte Verde - MG';



-- se produtos ativos (true) deu certo

-- SELECT * FROM produtos
-- WHERE ativo = true;



-- fazendo um pedido como teste

-- INSERT INTO pedidos
-- (cliente, email, telefone, produto, quantidade, unidade, tipo_recebimento, data_retirada, periodo, observacao, status, total)
-- VALUES
-- (
--     'Cliente Teste',
--     'cliente@email.com',
--     '(19) 99999-9999',
--     'Bolo Fraisier Retrô',
--     '1',
--     'Americana - SP',
--     'Retirada',
--     '2026-10-10',
--     'Tarde',
--     'Escrever Feliz Aniversário',
--     'Recebido',
--     '189.90'
-- );


-- SELECT * FROM pedidos;



-- update do status do pedido teste

-- UPDATE pedidos
-- SET status = 'Em preparo'
-- WHERE cliente = 'Cliente Teste';


-- SELECT * FROM pedidos;







-- consultando todas as tabelas 

-- SELECT * FROM produtos;

-- SELECT * FROM pedidos;

-- SELECT * FROM usuarios;



-- SELECT * FROM produtos;

SELECT * FROM produtos;