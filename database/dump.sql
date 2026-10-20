--
-- PostgreSQL database dump
--

\restrict BdfwndFTPgx6dudLm3bF1IdLmQgdMygWXbsCI8LcKLLCQFN9lMUOHFuRvGXo7kT

-- Dumped from database version 18.4 (Ubuntu 18.4-0ubuntu0.26.04.1)
-- Dumped by pg_dump version 18.4 (Ubuntu 18.4-0ubuntu0.26.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: candidatos; Type: TABLE; Schema: public; Owner: patisserie
--

CREATE TABLE public.candidatos (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    telefone character varying(30) NOT NULL,
    cidade character varying(80) NOT NULL,
    area character varying(60) NOT NULL,
    experiencia text
);


ALTER TABLE public.candidatos OWNER TO patisserie;

--
-- Name: candidatos_id_seq; Type: SEQUENCE; Schema: public; Owner: patisserie
--

CREATE SEQUENCE public.candidatos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.candidatos_id_seq OWNER TO patisserie;

--
-- Name: candidatos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: patisserie
--

ALTER SEQUENCE public.candidatos_id_seq OWNED BY public.candidatos.id;


--
-- Name: pedidos; Type: TABLE; Schema: public; Owner: patisserie
--

CREATE TABLE public.pedidos (
    id integer NOT NULL,
    cliente character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    telefone character varying(30) NOT NULL,
    produto text NOT NULL,
    quantidade character varying(20) NOT NULL,
    unidade character varying(60) NOT NULL,
    tipo_recebimento character varying(50) NOT NULL,
    data_retirada date,
    periodo character varying(30),
    observacao text,
    status character varying(50),
    total character varying(30)
);


ALTER TABLE public.pedidos OWNER TO patisserie;

--
-- Name: pedidos_id_seq; Type: SEQUENCE; Schema: public; Owner: patisserie
--

CREATE SEQUENCE public.pedidos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.pedidos_id_seq OWNER TO patisserie;

--
-- Name: pedidos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: patisserie
--

ALTER SEQUENCE public.pedidos_id_seq OWNED BY public.pedidos.id;


--
-- Name: produtos; Type: TABLE; Schema: public; Owner: patisserie
--

CREATE TABLE public.produtos (
    id integer NOT NULL,
    nome character varying(80) NOT NULL,
    categoria character varying(60) NOT NULL,
    preco character varying(20) NOT NULL,
    estoque character varying(20) NOT NULL,
    unidade character varying(60) NOT NULL,
    descricao text,
    rendimento character varying(80),
    alergenos character varying(120),
    imagem character varying(100),
    ativo boolean
);


ALTER TABLE public.produtos OWNER TO patisserie;

--
-- Name: produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: patisserie
--

CREATE SEQUENCE public.produtos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.produtos_id_seq OWNER TO patisserie;

--
-- Name: produtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: patisserie
--

ALTER SEQUENCE public.produtos_id_seq OWNED BY public.produtos.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: patisserie
--

CREATE TABLE public.usuarios (
    id integer NOT NULL,
    email character varying(100) NOT NULL,
    senha character varying(60) NOT NULL
);


ALTER TABLE public.usuarios OWNER TO patisserie;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: patisserie
--

CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuarios_id_seq OWNER TO patisserie;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: patisserie
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;


--
-- Name: candidatos id; Type: DEFAULT; Schema: public; Owner: patisserie
--

ALTER TABLE ONLY public.candidatos ALTER COLUMN id SET DEFAULT nextval('public.candidatos_id_seq'::regclass);


--
-- Name: pedidos id; Type: DEFAULT; Schema: public; Owner: patisserie
--

ALTER TABLE ONLY public.pedidos ALTER COLUMN id SET DEFAULT nextval('public.pedidos_id_seq'::regclass);


--
-- Name: produtos id; Type: DEFAULT; Schema: public; Owner: patisserie
--

ALTER TABLE ONLY public.produtos ALTER COLUMN id SET DEFAULT nextval('public.produtos_id_seq'::regclass);


--
-- Name: usuarios id; Type: DEFAULT; Schema: public; Owner: patisserie
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- Data for Name: candidatos; Type: TABLE DATA; Schema: public; Owner: patisserie
--

COPY public.candidatos (id, nome, email, telefone, cidade, area, experiencia) FROM stdin;
1	Candidato Teste	candidato@email.com	(19) 98888-8888	Americana - SP	Confeitaria	Curso de confeitaria e experiência com bolos.
2	Mayara	ousadinha@gmail	696960	Americana - SP	Confeitaria	Minney na dimadri kids
\.


--
-- Data for Name: pedidos; Type: TABLE DATA; Schema: public; Owner: patisserie
--

COPY public.pedidos (id, cliente, email, telefone, produto, quantidade, unidade, tipo_recebimento, data_retirada, periodo, observacao, status, total) FROM stdin;
1	Cliente Teste	cliente@email.com	(19) 99999-9999	Bolo Fraisier Retrô	1	Americana - SP	Retirada	2026-10-10	Tarde	Escrever Feliz Aniversário	Em preparo	189.90
2	grsgrs	eloa@linda	1234567890	Kit Halloween Pastel	2	Americana - SP	Delivery	2026-10-07	Manhã	rhrr	Recebido	259.8
3	Eloa	elozinha@milgrau	123456789	Bolo personalizado - Massa: Chocolate - Recheio: Morango e creme - Cobertura: Ganache - Decoração: Clássica francesa - Convidados: 30	1	Americana - SP	Orçamento personalizado	2026-10-14	Noite	Bolo montado pelo cliente	Aguardando orçamento	0
4	MONIQUE PERIN CAMPOS	moniqueperincps@gmail.com	19993965461	Kit Halloween Pastel	1	Americana - SP	Delivery	2026-10-28	Noite	nao	Recebido	129.9
5	MONIQUE PERIN CAMPOS	moniqueperincps@gmail.com	19993965461	Bolo personalizado - Massa: Baunilha - Recheio: Morango e creme - Cobertura: Creme de manteiga - Decoração: Clássica francesa - Convidados: 7	1	Americana - SP	Orçamento personalizado	2026-10-28	Noite	Bolo montado pelo cliente	Aguardando orçamento	0
6	Giovanni	gi@gmail	19 69696996	Bolo personalizado - Massa: Red Velvet - Recheio: Baunilha e frutas vermelhas - Cobertura: Ganache - Decoração: Frutas frescas - Convidados: 12	1	Americana - SP	Orçamento personalizado	2026-10-12	Tarde	Bolo montado pelo cliente	Aguardando orçamento	0
7	MONIQUE PERIN CAMPOS	moniqueperincps@gmail.com	19993965461	Bolo personalizado - 6 kg - Massa: Chocolate - Recheio: Chocolate - Cobertura: Ganache - Decoração: Retrô com laços	1	Americana - SP	Orçamento personalizado	2026-10-15	Manhã	Bolo montado pelo cliente	Aguardando orçamento	720
8	Eloa	eloa@gmail.com	19 9090909	Bolo personalizado - 6 kg - Massa: Baunilha - Recheio: Morango e creme - Cobertura: Chantilly - Decoração: Retrô com laços	1	Americana - SP	Orçamento personalizado	2026-10-20	Tarde	Bolo montado pelo cliente	Aguardando orçamento	720
\.


--
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: patisserie
--

COPY public.produtos (id, nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo) FROM stdin;
8	Kit Aniversário Elis	Kits Comemorativos	159.90	15	Leblon - RJ	Mini bolo, doces finos e cartão personalizado.	Serve 4 pessoas	Glúten, leite e ovos	imagens/aniversario.jpg	t
4	Kit Dia dos Namorados	Kits Comemorativos	149.90	10	Americana - SP	Caixa presenteável com doces, macarons e cartão.	Serve 2 pessoas	Glúten, leite, ovos e amêndoas	imagens/namorados.jpg	t
7	Kit Halloween Pastel	Kits Comemorativos	129.90	7	Americana - SP	Doces temáticos em tons pastel e embalagem divertida.	1 kit	Glúten, leite e ovos	imagens/halloween.jpg	t
6	Kit Natal Retrô	Kits Comemorativos	179.90	9	Monte Verde - MG	Doces natalinos com apresentação em estilo retrô.	1 kit	Glúten, leite e ovos	imagens/natal.jpg	t
5	Kit Páscoa Paris	Kits Comemorativos	169.90	12	Leblon - RJ	Seleção de chocolate, petit fours e embalagem especial.	1 kit	Leite, ovos, glúten e castanhas	imagens/pascoa.jpg	t
12	Bolo Ópera	Bolos e Tortas	210.00	6	Leblon - RJ	Camadas de amêndoa, café e chocolate inspiradas na confeitaria francesa.	Serve até 10 pessoas	Glúten, leite, ovos e amêndoas	imagens/opera.png	t
1	Bolo Fraisier Retrô	Bolos e Tortas	189.90	10	Americana - SP	Bolo inspirado no clássico francês com morangos e creme.	Serve até 12 pessoas	Glúten, leite e ovos	imagens/retro.png	t
2	Caixa de Macarons	Confeitaria Fina	78.00	20	Leblon - RJ	Seleção de macarons em sabores delicados.	Caixa com 12 unidades	Ovos, leite e amêndoas	imagens/macarrons.png	t
3	Tartelette de Frutas	Sobremesas Individuais	24.00	25	Monte Verde - MG	Massa amanteigada, creme e frutas frescas.	1 unidade	Glúten, leite e ovos	imagens/frutinhas.png	t
9	Mesa Petit Fours	Casamentos	320.00	5	Americana - SP	Seleção de petit fours para eventos e casamentos.	100 unidades	Glúten, leite, ovos e castanhas	imagens/mesa.png	t
10	Macarons para Casamento	Casamentos	280.00	6	Leblon - RJ	Macarons delicados para lembranças ou mesa de doces.	80 unidades	Ovos, leite e amêndoas	imagens/macaroncasa.png	t
11	Mini Entremets	Casamentos	360.00	4	Monte Verde - MG	Mini sobremesas francesas para mesa de casamento.	60 unidades	Glúten, leite e ovos	imagens/doce.png	t
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: patisserie
--

COPY public.usuarios (id, email, senha) FROM stdin;
1	admin@elispatisserie.com	elis123
\.


--
-- Name: candidatos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: patisserie
--

SELECT pg_catalog.setval('public.candidatos_id_seq', 2, true);


--
-- Name: pedidos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: patisserie
--

SELECT pg_catalog.setval('public.pedidos_id_seq', 8, true);


--
-- Name: produtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: patisserie
--

SELECT pg_catalog.setval('public.produtos_id_seq', 13, true);


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: patisserie
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 1, true);


--
-- Name: candidatos candidatos_pkey; Type: CONSTRAINT; Schema: public; Owner: patisserie
--

ALTER TABLE ONLY public.candidatos
    ADD CONSTRAINT candidatos_pkey PRIMARY KEY (id);


--
-- Name: pedidos pedidos_pkey; Type: CONSTRAINT; Schema: public; Owner: patisserie
--

ALTER TABLE ONLY public.pedidos
    ADD CONSTRAINT pedidos_pkey PRIMARY KEY (id);


--
-- Name: produtos produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: patisserie
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (id);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: patisserie
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

\unrestrict BdfwndFTPgx6dudLm3bF1IdLmQgdMygWXbsCI8LcKLLCQFN9lMUOHFuRvGXo7kT

