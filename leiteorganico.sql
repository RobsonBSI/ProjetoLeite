--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.1
-- Dumped by pg_dump version 9.6.1

-- Started on 2023-06-29 14:34:15

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12387)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2204 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 190 (class 1259 OID 16415)
-- Name: pontovenda; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE pontovenda (
    id integer NOT NULL,
    nome character varying(255),
    inicio character varying(255),
    termino character varying(255),
    regiao character varying(255),
    telefone character varying(255),
    site character varying(255),
    cep character varying(255),
    logradouro character varying(255),
    numero character varying(255),
    complemento character varying(255),
    latitude character varying(255),
    longitude character varying(255),
    cidade character varying(255),
    estado character(3),
    tipo_id integer,
    data_aprovacao date,
    cadastro character varying(255),
    semana character varying(255),
    produtor character varying(255),
    email character varying(255)
);


ALTER TABLE pontovenda OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 16413)
-- Name: pontovenda_idvenda_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pontovenda_idvenda_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pontovenda_idvenda_seq OWNER TO postgres;

--
-- TOC entry 2205 (class 0 OID 0)
-- Dependencies: 189
-- Name: pontovenda_idvenda_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE pontovenda_idvenda_seq OWNED BY pontovenda.id;


--
-- TOC entry 192 (class 1259 OID 16423)
-- Name: produto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE produto (
    id integer NOT NULL,
    produto character varying(255) NOT NULL
);


ALTER TABLE produto OWNER TO postgres;

--
-- TOC entry 191 (class 1259 OID 16421)
-- Name: produto_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE produto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE produto_id_seq OWNER TO postgres;

--
-- TOC entry 2206 (class 0 OID 0)
-- Dependencies: 191
-- Name: produto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE produto_id_seq OWNED BY produto.id;


--
-- TOC entry 194 (class 1259 OID 16447)
-- Name: produto_produtor; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE produto_produtor (
    id integer NOT NULL,
    produto integer NOT NULL,
    produtor integer NOT NULL
);


ALTER TABLE produto_produtor OWNER TO postgres;

--
-- TOC entry 193 (class 1259 OID 16445)
-- Name: produto_produtor_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE produto_produtor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE produto_produtor_id_seq OWNER TO postgres;

--
-- TOC entry 2207 (class 0 OID 0)
-- Dependencies: 193
-- Name: produto_produtor_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE produto_produtor_id_seq OWNED BY produto_produtor.id;


--
-- TOC entry 196 (class 1259 OID 16465)
-- Name: produto_venda; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE produto_venda (
    id integer NOT NULL,
    produtovenda integer NOT NULL,
    venda integer NOT NULL
);


ALTER TABLE produto_venda OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 16463)
-- Name: produto_venda_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE produto_venda_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE produto_venda_id_seq OWNER TO postgres;

--
-- TOC entry 2208 (class 0 OID 0)
-- Dependencies: 195
-- Name: produto_venda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE produto_venda_id_seq OWNED BY produto_venda.id;


--
-- TOC entry 188 (class 1259 OID 16404)
-- Name: produtor; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE produtor (
    id integer NOT NULL,
    nome character varying(255) NOT NULL,
    site character varying(255),
    instagran character varying(255),
    cep character varying(255),
    logradouro character varying(255),
    numero character varying(255),
    complemento character varying(255),
    cidade character varying(255),
    estado character varying(20),
    longitude character varying(30) NOT NULL,
    latitude character varying(30) NOT NULL,
    turismo character varying(10) NOT NULL,
    fazenda character varying(10) NOT NULL,
    online character varying(10) NOT NULL,
    telefone character varying(255),
    data_aprovacao date,
    cadastro character varying(255),
    email character varying(255)
);


ALTER TABLE produtor OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 16402)
-- Name: produtor_idprodutor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE produtor_idprodutor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE produtor_idprodutor_seq OWNER TO postgres;

--
-- TOC entry 2209 (class 0 OID 0)
-- Dependencies: 187
-- Name: produtor_idprodutor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE produtor_idprodutor_seq OWNED BY produtor.id;


--
-- TOC entry 198 (class 1259 OID 32880)
-- Name: produtor_ponto_venda; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE produtor_ponto_venda (
    id integer NOT NULL,
    pontovenda integer,
    produtor integer,
    outro character varying(50)
);


ALTER TABLE produtor_ponto_venda OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 32878)
-- Name: produtor_ponto_venda_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE produtor_ponto_venda_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE produtor_ponto_venda_id_seq OWNER TO postgres;

--
-- TOC entry 2210 (class 0 OID 0)
-- Dependencies: 197
-- Name: produtor_ponto_venda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE produtor_ponto_venda_id_seq OWNED BY produtor_ponto_venda.id;


--
-- TOC entry 186 (class 1259 OID 16396)
-- Name: tipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE tipo (
    id integer NOT NULL,
    venda character varying(30) NOT NULL
);


ALTER TABLE tipo OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 16394)
-- Name: tipo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_id_seq OWNER TO postgres;

--
-- TOC entry 2211 (class 0 OID 0)
-- Dependencies: 185
-- Name: tipo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_id_seq OWNED BY tipo.id;


--
-- TOC entry 2041 (class 2604 OID 16418)
-- Name: pontovenda id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pontovenda ALTER COLUMN id SET DEFAULT nextval('pontovenda_idvenda_seq'::regclass);


--
-- TOC entry 2042 (class 2604 OID 16426)
-- Name: produto id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto ALTER COLUMN id SET DEFAULT nextval('produto_id_seq'::regclass);


--
-- TOC entry 2043 (class 2604 OID 16450)
-- Name: produto_produtor id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto_produtor ALTER COLUMN id SET DEFAULT nextval('produto_produtor_id_seq'::regclass);


--
-- TOC entry 2044 (class 2604 OID 16468)
-- Name: produto_venda id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto_venda ALTER COLUMN id SET DEFAULT nextval('produto_venda_id_seq'::regclass);


--
-- TOC entry 2040 (class 2604 OID 16407)
-- Name: produtor id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produtor ALTER COLUMN id SET DEFAULT nextval('produtor_idprodutor_seq'::regclass);


--
-- TOC entry 2045 (class 2604 OID 32883)
-- Name: produtor_ponto_venda id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produtor_ponto_venda ALTER COLUMN id SET DEFAULT nextval('produtor_ponto_venda_id_seq'::regclass);


--
-- TOC entry 2039 (class 2604 OID 16399)
-- Name: tipo id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo ALTER COLUMN id SET DEFAULT nextval('tipo_id_seq'::regclass);


--
-- TOC entry 2189 (class 0 OID 16415)
-- Dependencies: 190
-- Data for Name: pontovenda; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO pontovenda VALUES (14, 'Loja do Sítio - Sítio do Moinho Produtos Orgânicos', '', '', '', ' (21) 3550-9360', 'https://www.sitiodomoinho.com.br/', '22431-040', 'Av. Jose Silva de Azevedo Neto', '200', 'Barra da Tijuca - bloco 9, loja 111', '-22.989028668719186', '-43.36075340897142', 'Rio de Janeiro ', 'RJ ', 17, '2023-05-17', '17/05/2023 13:15:37', '', 'Fazenda Alegria', '');
INSERT INTO pontovenda VALUES (2, 'Sítio do Moinho', '', '', 'Rio de janeiro, Niterói, Petrópolis e Itaipava', '(24) 2291-9190 ou (21) 2291-9150', 'http://www.sitiodomoinho.com.br', '25745-260', 'Estr. Correia da Veiga', '2401', 'Itaipava', '-22.347645148152424', '-43.0863038026372', 'Petrópolis', 'RJ ', 8, '2023-04-25', '25/04/2023 15:49:01', '', 'Fazenda Timbaúba', NULL);
INSERT INTO pontovenda VALUES (3, 'Mogico', '', '', 'Juiz de Fora', '(32) 99840-9940', 'https://cestamogico.lojaintegrada.com.br/', '36016-440', 'R. Padre Anchieta', '320 ', 'São Mateus', '-21.770901668804257', '-43.357830602047855', 'Juz de Fora', 'MG ', 8, '2023-04-25', '25/04/2023 15:54:33', '', 'Fazenda Alegria', NULL);
INSERT INTO pontovenda VALUES (4, 'Junta Local', '', '', 'Niterói e Rio de janeiro', '', 'https://sacolavirtual.com/sacola/536', '22271-020', 'Rua Conde de Irajá', '90', 'Botafogo', '-22.953063745311894', '-43.19610827319194', 'Rio de Janeiro', 'RJ ', 8, '2023-04-25', '25/04/2023 15:59:55', '', 'Fazenda Alegria', NULL);
INSERT INTO pontovenda VALUES (5, 'Orgânicos in Box', '', '', 'Niterói e Rio de janeiro', '', 'https://organicosinbox.com.br/categoria/mercearia/laticinios-mercearia/', '20921-030', 'R. Gen. Bruce', ' 761 ', 'São Cristóvão', '-22.89715724798793', '-43.223901702028286', 'Rio de Janeiro ', 'RJ ', 8, '2023-04-25', '25/04/2023 16:05:28', '', 'Fazenda Alegria', NULL);
INSERT INTO pontovenda VALUES (6, 'Meu amigo tem um sítio - Mini mercado', '', '', 'Niterói e Rio de janeiro', '(21) 96979-9943', 'https://app.meuamigotemumsitio.com.br/tabs/cestas-disponiveis', '20930-010', 'R Professor Ester De Melo', ' 191', 'BENFICA, RIO DE JANEIRO - RJ', '-22.89425682630944', '-43.24049450018108', 'Rio de Janeiro', 'RJ ', 8, '2023-04-25', '25/04/2023 16:11:06', '', 'Sítio Santo Expedito', NULL);
INSERT INTO pontovenda VALUES (8, 'Feira Praça IV Centenário', '07:00', '13:00', '', '', '', '09040904', 'Praça IV Centenário ', 's/n', '', '-23.655763792655744', '-46.531980488520524', 'Santo Andre ', 'SP ', 7, '2023-04-25', '25/04/2023 16:22:58', 'Sabado', 'Nata da Serra', NULL);
INSERT INTO pontovenda VALUES (7, 'Feira Parque da Água Branca', '06:00', '13:00', '', '', '', '05001-900', 'Rua Dona Ana Pimentel ', 's/n', 'Água Branca', '-23.528201468052306', '-46.67257894619366', 'São Paulo', 'SP ', 7, '2023-04-25', '25/04/2023 16:15:54', 'Domingo , Terca-Feira , Sabado', 'Nata da Serra', NULL);
INSERT INTO pontovenda VALUES (9, 'Delly Gil - Cobal do Leblon ', '', '', '', '(21) 2529-2222', 'https://compre.dellygil.com.br/', '22430-070', 'R. Gilberto Cardoso', 's/n', '', '-22.979089748332324', '-43.22033950208713', 'Rio de Janeiro', 'RJ ', 17, '2023-04-25', '25/04/2023 16:28:12', '', 'Fazenda Alegria', NULL);
INSERT INTO pontovenda VALUES (12, 'Feira Orgânica da Praça do Expedicionário', '07:00', '12:00', '', '', '', '80060-170', 'Rua Saldanha da Gama,', '219', 'Centro', '-25.42883395647924', '-49.25850541349214', 'Curitiba', 'PR ', 7, '2023-05-17', '16/05/2023 16:13:59', 'Quarta-Feira , Sabado', 'Organicos Escher', '');
INSERT INTO pontovenda VALUES (19, 'Natural Delivery', '', '', 'São José dos Campos', '(12) 3921-5762', 'N/A', '12243-580', 'R. Euclides da Cunha', '11', ' Jardim Maringa', '-23.206446361885572', '-45.89521420202266', 'São José dos Campos ', 'SP ', 8, '2023-05-18', '18/05/2023 14:39:29', '', 'Nata da Serra', '');
INSERT INTO pontovenda VALUES (18, 'Tutto Natural Orgânicos no ABC', '', '', 'Santo Andre', '(11)4425-2669', 'www.tuttonatural.com.br', ' 09220-340', 'R. Bárbara Heliodora', '291', 'Utinga', '-23.625033025752984', '-46.53893790201508', 'Santo André ', 'SP ', 8, '2023-05-18', '18/05/2023 14:37:02', '', 'Nata da Serra', '');
INSERT INTO pontovenda VALUES (17, 'Cem Porcento Orgânico', '', '', 'Jundiaí ', '(11)95037-9946', 'www.cemporcentoorganico.yolasite.com', ' 13212-070', 'Avenida Benedito Castilho de Andadre  ', '977', 'Eloy Chaves', '-23.188449084152882', '-46.959953430858576', 'Jundiaí', 'SP ', 8, '2023-05-18', '18/05/2023 14:34:19', '', 'Nata da Serra', '');
INSERT INTO pontovenda VALUES (16, 'VIVA BEM - Orgânicos e Integrais', '', '', 'São Paulo', '(11) 94745-7898', 'https://vivabemorganicos.com.br/', '09541-150', 'R. Piauí', '700 ', 'Santo Antônio', '-23.618859172462724', '-46.56467301550943', 'São Caetano do Sul ', 'SP ', 8, '2023-05-18', '18/05/2023 14:30:54', '', 'Nata da Serra', '');
INSERT INTO pontovenda VALUES (22, 'Vale do Brejal Orgânicos', '', '', 'Petropolis e Rio de Janeiro', '(24)8828-5087 / (24)2221-6663', 'N/A', '25780-000', 'Estr. dos Albertos', '84276', 'Posse', '-22.261586107254704', '-43.02560200203935', 'Petrópolis ', 'RJ ', 8, '2023-05-18', '18/05/2023 14:48:08', '', 'Nata da Serra', '');
INSERT INTO pontovenda VALUES (15, 'Cesta Orgânica', '', '', 'São Paulo e Granja Viana', '(11)4014-6356 / (11)9955-9091', 'https://cestaorganica.com.br', '04128-050', 'R. Bela Flor', 's/n', 'Vila Mariana', '-23.602612702152516', '-46.631636688521745', 'São Paulo', 'SP ', 8, '2023-05-18', '18/05/2023 14:11:52', '', 'Nata da Serra', 'contato@cestaorganica.com.br');
INSERT INTO pontovenda VALUES (21, 'Orgânicos Guaruja', '', '', 'Baixada Santista', '(13) 99750-5147', 'N/A', '11.421-000 ', 'Praça Dr. Walter Belian', 's/n', 'Jardim Guaiúba', '-24.012341675893495', '-46.28032378666678', 'Guarujá ', 'SP ', 8, '2023-05-18', '18/05/2023 14:44:34', '', 'Nata da Serra', '');
INSERT INTO pontovenda VALUES (20, 'Família Orgânica', '', '', 'Campinas, Itatiba, Valinhos, Vinhedo, Jundiaí e São Paulo', '(19) 9714-5507 / (19) 9664-0422', 'N/A', '12970-000', 'Estr. Mun. Niase Faráh ', 's/n', 'Zona Rural', '-23.062364086664466', '-46.34915587319001', 'Piracaia', 'SP ', 8, '2023-06-05', '18/05/2023 14:41:51', '', '', '');


--
-- TOC entry 2212 (class 0 OID 0)
-- Dependencies: 189
-- Name: pontovenda_idvenda_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pontovenda_idvenda_seq', 23, true);


--
-- TOC entry 2191 (class 0 OID 16423)
-- Dependencies: 192
-- Data for Name: produto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO produto VALUES (5, 'Manteiga');
INSERT INTO produto VALUES (7, 'Queijos');
INSERT INTO produto VALUES (8, 'Leite Fermentado');
INSERT INTO produto VALUES (9, 'Iogurte');
INSERT INTO produto VALUES (10, 'Doce de Leite');
INSERT INTO produto VALUES (14, 'Leite Pasteurizado');
INSERT INTO produto VALUES (15, 'Creme de Leite');
INSERT INTO produto VALUES (16, 'Kefir');
INSERT INTO produto VALUES (17, 'Requeijão');
INSERT INTO produto VALUES (2, 'Coalhada');
INSERT INTO produto VALUES (25, 'Bebida Láctea');
INSERT INTO produto VALUES (27, ' Leite UHT');
INSERT INTO produto VALUES (26, 'Leite (Venda para laticinio)');


--
-- TOC entry 2213 (class 0 OID 0)
-- Dependencies: 191
-- Name: produto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('produto_id_seq', 28, true);


--
-- TOC entry 2193 (class 0 OID 16447)
-- Dependencies: 194
-- Data for Name: produto_produtor; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO produto_produtor VALUES (20, 9, 6);
INSERT INTO produto_produtor VALUES (21, 5, 6);
INSERT INTO produto_produtor VALUES (22, 7, 6);
INSERT INTO produto_produtor VALUES (23, 17, 6);
INSERT INTO produto_produtor VALUES (25, 5, 7);
INSERT INTO produto_produtor VALUES (26, 5, 8);
INSERT INTO produto_produtor VALUES (27, 7, 8);
INSERT INTO produto_produtor VALUES (29, 7, 9);
INSERT INTO produto_produtor VALUES (31, 9, 11);
INSERT INTO produto_produtor VALUES (32, 7, 11);
INSERT INTO produto_produtor VALUES (34, 9, 13);
INSERT INTO produto_produtor VALUES (35, 7, 13);
INSERT INTO produto_produtor VALUES (36, 10, 14);
INSERT INTO produto_produtor VALUES (37, 7, 14);
INSERT INTO produto_produtor VALUES (40, 7, 17);
INSERT INTO produto_produtor VALUES (41, 26, 12);
INSERT INTO produto_produtor VALUES (42, 26, 16);
INSERT INTO produto_produtor VALUES (43, 26, 18);
INSERT INTO produto_produtor VALUES (44, 26, 19);
INSERT INTO produto_produtor VALUES (45, 26, 20);
INSERT INTO produto_produtor VALUES (46, 26, 21);
INSERT INTO produto_produtor VALUES (47, 7, 22);
INSERT INTO produto_produtor VALUES (48, 26, 23);
INSERT INTO produto_produtor VALUES (49, 26, 24);
INSERT INTO produto_produtor VALUES (50, 26, 25);
INSERT INTO produto_produtor VALUES (51, 26, 26);
INSERT INTO produto_produtor VALUES (52, 26, 27);
INSERT INTO produto_produtor VALUES (53, 10, 28);
INSERT INTO produto_produtor VALUES (54, 7, 28);
INSERT INTO produto_produtor VALUES (55, 26, 29);
INSERT INTO produto_produtor VALUES (56, 26, 30);
INSERT INTO produto_produtor VALUES (57, 9, 31);
INSERT INTO produto_produtor VALUES (58, 5, 31);
INSERT INTO produto_produtor VALUES (59, 7, 31);
INSERT INTO produto_produtor VALUES (60, 9, 32);
INSERT INTO produto_produtor VALUES (61, 14, 32);
INSERT INTO produto_produtor VALUES (62, 26, 33);
INSERT INTO produto_produtor VALUES (63, 26, 34);
INSERT INTO produto_produtor VALUES (64, 7, 35);
INSERT INTO produto_produtor VALUES (65, 26, 36);
INSERT INTO produto_produtor VALUES (66, 7, 37);
INSERT INTO produto_produtor VALUES (67, 5, 38);
INSERT INTO produto_produtor VALUES (68, 7, 38);
INSERT INTO produto_produtor VALUES (69, 10, 39);
INSERT INTO produto_produtor VALUES (70, 9, 39);
INSERT INTO produto_produtor VALUES (71, 7, 39);
INSERT INTO produto_produtor VALUES (72, 26, 40);
INSERT INTO produto_produtor VALUES (73, 26, 41);
INSERT INTO produto_produtor VALUES (74, 7, 42);
INSERT INTO produto_produtor VALUES (75, 7, 15);
INSERT INTO produto_produtor VALUES (79, 7, 10);


--
-- TOC entry 2214 (class 0 OID 0)
-- Dependencies: 193
-- Name: produto_produtor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('produto_produtor_id_seq', 79, true);


--
-- TOC entry 2195 (class 0 OID 16465)
-- Dependencies: 196
-- Data for Name: produto_venda; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO produto_venda VALUES (15, 25, 2);
INSERT INTO produto_venda VALUES (16, 15, 2);
INSERT INTO produto_venda VALUES (17, 9, 2);
INSERT INTO produto_venda VALUES (18, 5, 2);
INSERT INTO produto_venda VALUES (19, 7, 2);
INSERT INTO produto_venda VALUES (20, 9, 3);
INSERT INTO produto_venda VALUES (21, 7, 3);
INSERT INTO produto_venda VALUES (22, 9, 4);
INSERT INTO produto_venda VALUES (23, 7, 4);
INSERT INTO produto_venda VALUES (24, 9, 5);
INSERT INTO produto_venda VALUES (25, 7, 5);
INSERT INTO produto_venda VALUES (26, 7, 6);
INSERT INTO produto_venda VALUES (27, 9, 7);
INSERT INTO produto_venda VALUES (28, 5, 7);
INSERT INTO produto_venda VALUES (29, 7, 7);
INSERT INTO produto_venda VALUES (30, 17, 7);
INSERT INTO produto_venda VALUES (31, 9, 8);
INSERT INTO produto_venda VALUES (32, 5, 8);
INSERT INTO produto_venda VALUES (33, 7, 8);
INSERT INTO produto_venda VALUES (34, 17, 8);
INSERT INTO produto_venda VALUES (35, 9, 9);
INSERT INTO produto_venda VALUES (36, 7, 9);
INSERT INTO produto_venda VALUES (48, 10, 12);
INSERT INTO produto_venda VALUES (49, 9, 12);
INSERT INTO produto_venda VALUES (50, 14, 12);
INSERT INTO produto_venda VALUES (51, 5, 12);
INSERT INTO produto_venda VALUES (52, 7, 12);
INSERT INTO produto_venda VALUES (53, 17, 12);
INSERT INTO produto_venda VALUES (54, 9, 14);
INSERT INTO produto_venda VALUES (55, 7, 14);
INSERT INTO produto_venda VALUES (84, 9, 15);
INSERT INTO produto_venda VALUES (85, 5, 15);
INSERT INTO produto_venda VALUES (86, 7, 15);
INSERT INTO produto_venda VALUES (87, 17, 15);
INSERT INTO produto_venda VALUES (88, 9, 16);
INSERT INTO produto_venda VALUES (89, 5, 16);
INSERT INTO produto_venda VALUES (90, 7, 16);
INSERT INTO produto_venda VALUES (91, 17, 16);
INSERT INTO produto_venda VALUES (92, 9, 17);
INSERT INTO produto_venda VALUES (93, 5, 17);
INSERT INTO produto_venda VALUES (94, 7, 17);
INSERT INTO produto_venda VALUES (95, 17, 17);
INSERT INTO produto_venda VALUES (96, 9, 18);
INSERT INTO produto_venda VALUES (97, 5, 18);
INSERT INTO produto_venda VALUES (98, 7, 18);
INSERT INTO produto_venda VALUES (99, 17, 18);
INSERT INTO produto_venda VALUES (100, 9, 19);
INSERT INTO produto_venda VALUES (101, 5, 19);
INSERT INTO produto_venda VALUES (102, 7, 19);
INSERT INTO produto_venda VALUES (103, 17, 19);
INSERT INTO produto_venda VALUES (104, 9, 20);
INSERT INTO produto_venda VALUES (105, 5, 20);
INSERT INTO produto_venda VALUES (106, 7, 20);
INSERT INTO produto_venda VALUES (107, 17, 20);
INSERT INTO produto_venda VALUES (108, 9, 21);
INSERT INTO produto_venda VALUES (109, 5, 21);
INSERT INTO produto_venda VALUES (110, 7, 21);
INSERT INTO produto_venda VALUES (111, 17, 21);
INSERT INTO produto_venda VALUES (112, 9, 22);
INSERT INTO produto_venda VALUES (113, 5, 22);
INSERT INTO produto_venda VALUES (114, 7, 22);
INSERT INTO produto_venda VALUES (115, 17, 22);


--
-- TOC entry 2215 (class 0 OID 0)
-- Dependencies: 195
-- Name: produto_venda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('produto_venda_id_seq', 117, true);


--
-- TOC entry 2187 (class 0 OID 16404)
-- Dependencies: 188
-- Data for Name: produtor; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO produtor VALUES (17, 'Sítio Santo Antônio', 'não informado', '', '16310-000', 'Rod. Raul Forchero Casasco ', 's/n', 'Zona Rural', ' Alto Alegre', 'SP', '-50.16924767321569', '-21.591502509795504', 'false', 'false', 'false', 'não informado', '2023-05-11', '11/05/2023 13:16:47', NULL);
INSERT INTO produtor VALUES (10, 'Fazenda Nova', 'http://www.fazafeira.com/fazendanova', 'fazendanovaorganicos', '37370-000', 'Rodovia MG-383, Km 218,5', 's/n', 'Zona Rural', 'São Vicente de Minas', 'MG', '-44.508569559483526', '-21.65600356575981', 'false', 'false', 'false', '(35) 99912-3377', '2023-05-11', '11/05/2023 10:51:50', '');
INSERT INTO produtor VALUES (6, 'Fazenda Malunga', 'https://fazendamalunga.com.br/', 'fazenda_malunga', '70635815', 'VC-441', 'km 6,8', 'Zona Rural', 'Paranoá', 'DF', '-47.49927940048988', '-15.944154504370491', 'false', 'True', 'True', '(61) 98104-8292 (61) 3029-9404', '2023-05-11', '11/05/2023 10:01:00', NULL);
INSERT INTO produtor VALUES (7, 'Fazenda Timbaúba ', 'https://fazendatimbauba.com.br/', 'fazenda.timbauba', '57570-000', 'Rodovia Al 120 - Km 2,0', 's/n', 'Zona Rural', 'Cacimbinhas', 'AL', '-36.98981633104913', '-9.403408607378584', 'false', 'false', 'false', '(82) 3338.4759', '2023-05-11', '11/05/2023 10:07:36', NULL);
INSERT INTO produtor VALUES (8, 'Cabana da Ponte', 'http://www.cabanadaponte.com.br', '', '45710-000', 'Rodovia BR-415 km 138', 's/n', 'Zona Rural', 'Itororó', 'BA', '-40.06526941785894', '-15.1141127863308', 'false', 'false', 'false', '(73) 3265 1221', '2023-05-11', '11/05/2023 10:14:16', NULL);
INSERT INTO produtor VALUES (9, 'Fazenda das Vertentes', 'https://fazendadasvertentes.com.br/', 'queijariaqverte', '35490-000', 'Estrada Entre Rio de Minas', 's/n', 'Zona Rural', 'Entre Rio de Minas', 'MG', '-43.98365090377602', '-20.70741860591249', 'false', 'false', 'false', '(31) 9 8634-9302', '2023-05-11', '11/05/2023 10:38:32', NULL);
INSERT INTO produtor VALUES (11, 'Granja Sagrada Família', 'não informado', '', '27155-000', 'Estr. Vargem Alegre - Dorândia ', '1123', 'Vargem Alegre', 'Barra do Piraí', 'RJ', '-43.932331730870544', '-22.50232994991628', 'false', 'false', 'false', '(24) 2442-1340', '2023-05-11', '11/05/2023 11:05:52', NULL);
INSERT INTO produtor VALUES (26, 'Sítio das Palmeiras ', 'N/A', 'gondwanaorganics', '16340-000', 'Rodovia Raul F casasco, km 02 ', 's/n', 'Zona Rural', 'Luiziânia', 'SP', '-50.31904521563494', '-21.668881310436262', 'false', 'false', 'false', '(11)999913272', '2023-05-16', '16/05/2023 15:21:09', 'artcafesp@gmail.com');
INSERT INTO produtor VALUES (13, 'Vale das Palmeiras', 'https://www.valedaspalmeiras.com.br/', 'valedaspalmeirasorganicos', '25977-400', 'Est. Teresópolis Friburgo KM 15', 's/n', 'Zona Rural', 'Teresópolis', 'RJ', '-42.887241274413505', '-22.290099788709114', 'false', 'false', 'false', ' (21) 3641-9671', '2023-05-11', '11/05/2023 11:35:30', NULL);
INSERT INTO produtor VALUES (14, 'Rancho Lo Buono', 'não informado', 'lattebuono', ' 27600-000', ' Rua Sitio Boa Esperanca', '1000', ' Quirino', 'Valença', 'RJ', '-43.6244716462162', '-22.25160684959042', 'false', 'false', 'false', '(21) 99403-6329 / (21) 3507-2207  ', '2023-05-11', '11/05/2023 11:48:31', NULL);
INSERT INTO produtor VALUES (21, 'Fazenda Boa Esperança', ' não imformado', '', '16350-000', 'Estrada Municipal Avanhandava', 's/n', 'Zona Rural', 'Barbosa', 'SP', '-49.89110743254124', '-21.284885437282494', 'false', 'false', 'false', '(18)991362419 / (18) 3655-1204', '2023-05-16', '16/05/2023 14:21:06', 'rodrigofbe@outlook.com');
INSERT INTO produtor VALUES (12, 'Sitio Monte das Oliveiras', 'não informado', '', '27175-000', 'estrada de Piraí', 's/n', 'Zona Rural', 'Piraí', 'RJ', '-43.82284851737502', '-22.60429413634794', 'false', 'false', 'false', '(24)24312389', '2023-05-11', '11/05/2023 11:26:40', NULL);
INSERT INTO produtor VALUES (16, 'Sitio São Luiz', 'não informado', '', '16210-000', 'Rod. Raul Forchero Casasco 4055', 's/n', 'Zona Rural', 'Alto Alegre', 'SP', '-50.19477145972126', '-21.60979401839445', 'false', 'false', 'false', 'não informado', '2023-05-11', '11/05/2023 13:10:52', NULL);
INSERT INTO produtor VALUES (18, 'Sítio São José', 'não informado', '', '16310-000', 'Bairro Santana, 1 Km depois da fabrica Doces Machado', 's/n', 'Zona Rural', 'Alto Alegre', 'SP', '-50.109904017392694', '-21.57225839803062', 'false', 'false', 'false', '992855558', '2023-05-16', '16/05/2023 13:39:18', 'brunogarcia_felix@hotmail.com');
INSERT INTO produtor VALUES (19, 'Fazenda Bom Jesus', 'não informado', '', '13550-000.', ' Est. Munic. Sao Carlos ', 's/n', 'Zona Rural', 'Analândia', 'SP', '-48.697007830344745', '-23.977946861089816', 'false', 'false', 'false', '(16) 3371-4027 / (16) 3374-9270 / (16) 3372-1876', '2023-05-16', '16/05/2023 14:01:25', 'rubensguzzi@gmail.com');
INSERT INTO produtor VALUES (20, 'Chácara São Francisco', 'não informado', '', '16360-000.', 'Rodoanel Avanhandava Penapolis Km 1 ou Km 0 ', 's/n', 'Zona Rural', 'Avanhandava', 'SP', '-50.07718648398293', '-21.422155532090503', 'false', 'false', 'false', '(18)991191000', '2023-05-16', '16/05/2023 14:10:11', 'Alexvb@me.com');
INSERT INTO produtor VALUES (22, 'Sítio Boa Esperança', 'https://www.terralimpida.com/', 'terralimpida', '14.260-000 ', 'Estância Delícia das Águas', 's/n', 'Zona Rural', 'Cássia dos Coqueiros', 'SP', '-47.12578600371089', '-21.24715465349439', 'false', 'True', 'True', ' (16)  99614-2288 ', '2023-05-16', '16/05/2023 14:44:22', 'terralimpida@gmail.com');
INSERT INTO produtor VALUES (23, 'Guaraci Agropastoril Ltda', 'N/A', '', '13530-000', 'Rodovia Washington Luiz, km 204', 's/n', 'Zona Rural', 'Itirapina ', 'SP', '-47.74887750204019', '-22.22649116814651', 'false', 'false', 'false', '(11) 996094321', '2023-05-16', '16/05/2023 14:54:54', 'Laranja@guaraciagro.com');
INSERT INTO produtor VALUES (24, 'Recanto SS', 'N/A', 'ss.organico', '13530-000', ' Rod. Mun. Domingos Innocentini, KM-08', 's/n', 'Zona Rural', 'Itirapina', 'SP', '-47.832814375053104', '-22.154378520282567', 'false', 'false', 'false', '(16)982305511', '2023-05-16', '16/05/2023 15:03:36', 'Juniorsaldanha247@hotmail.com');
INSERT INTO produtor VALUES (25, 'Sitio Bela Vista', 'N/A', '', '14870-000', 'Area Rural de Jaboticabal', 's/n', 'Zona Rural', 'Jaboticabal', 'SP', '-48.3206068267241', '-21.255243664954136', 'false', 'false', 'false', '(16)991487794', '2023-05-16', '16/05/2023 15:10:33', 'toni.chinelato@hotmail.com');
INSERT INTO produtor VALUES (27, 'Fazenda Bom Jesus', 'N/A', '', '13550-000', 'Est. Munic. Sao Carlos ', ' s/n', 'Zona Rural', 'Analândia', 'SP', '-50.26157257321712', '-21.503028233714854', 'false', 'false', 'false', 'N/A', '2023-05-16', '16/05/2023 15:28:59', '');
INSERT INTO produtor VALUES (28, 'Sítio São João', 'N/A', 'saojoaopenapolis', '16300-000', 'Estrada Vicinal Cleto Galli ', 's/n', 'Zona Rural', 'Penápolis', 'SP', '-50.094397310572', '-21.379528417803982', 'false', 'false', 'false', '(18)99818-0275', '2023-05-16', '16/05/2023 15:38:11', 'leilianecmbassetto@hotmail.com.br');
INSERT INTO produtor VALUES (29, 'Sítio Nossa Senhora Aparecida', 'N/A', '', '16300-000,', 'Estrada Municipal Cleto Galli', 's/n', 'Zona Rural', 'Penápolis', 'SP', '-50.094397310572', '-21.379388550133907', 'false', 'false', 'false', '(18)997468013', '2023-05-16', '16/05/2023 15:44:26', 'Enricogandra@gmail.com');
INSERT INTO produtor VALUES (30, 'Fazenda Recreio (Agropecuária Recreio)', 'N/A', '', '13500-000', 'Rodovia SP-215, km 157', 's/n', 'Zona Rural', 'São Carlos ', 'SP', '-47.938626084825906', '-22.050692556549734', 'false', 'false', 'false', '(16)999923743', '2023-05-16', '16/05/2023 15:52:44', 'mario@agropecuariarecreio.com');
INSERT INTO produtor VALUES (31, 'Nata da Serra', 'http://www.natadaserra.com.br/', '', '13930-000 ', 'Rodovia Amatis José Franchi, km 11', 's/n', 'Zona Rural', 'Serra Negra', 'SP', '-46.626900588198936', '-22.598742521491435', 'True', 'True', 'false', ' (19) 99773-7503 ', '2023-05-16', '16/05/2023 16:01:34', 'natadaserra@natadaserra.com.br');
INSERT INTO produtor VALUES (32, 'Orgânicos Escher', 'N/A', '', '83535-000', 'Estrada da Paina conceiçao dos correias', 's/n', 'Zona Rural', 'Campo Magro', 'PR', '-49.45345617670659', '-25.299697925537853', 'false', 'True', 'false', '(41) 99608-0632', '2023-05-16', '16/05/2023 16:10:14', 'organicosescher@yahoo.com.br');
INSERT INTO produtor VALUES (34, 'Centro Paranaense de Referência em Agroecologia-CPRA', 'https://www.idrparana.pr.gov.br/', 'idrparana', '83327-055', ' R. Estr. da Graciosa', ' 6960', ' Jardim das Nascentes', ' Pinhais ', 'PR', '-49.12683439999999', '-25.381488822798687', 'false', 'false', 'false', ' (41) 3544-8100', '2023-05-17', '17/05/2023 14:08:29', 'mrichter@idr.pr.gov.br');
INSERT INTO produtor VALUES (15, 'Estância AWR', 'http://www.gruppoawr.com/', '', '16310-000', 'Rodovia Raul forcheiro casasco km 16', 's/n', 'Zona Rural', 'Alto Alegre', 'SP', '-50.154374273216014', '-21.58098861425795', 'false', 'True', 'false', '(14) 98145-2942', '2023-05-11', '11/05/2023 12:58:29', '');
INSERT INTO produtor VALUES (33, 'Assentamento Santa Maria', 'N/A', '', '87660-000', ' PR-464', 's/n', 'Zona Rural', 'Paranacity', 'PR', '-52.1494336731926', '-22.919189402682697', 'false', 'false', 'false', '(42)999038077', '2023-05-17', '17/05/2023 13:53:23', 'glaucia.back@gmail.com');
INSERT INTO produtor VALUES (35, 'Granja Flor do Araça / Cabanha MAXGO', '', 'queijariaflordoaraca', '96760-000', 'Br 116 km 347', 's/n', 'Zona Rural', 'Tapes', 'RS', '-51.624828389813366', '-29.033171347737035', 'false', 'false', 'false', '(51) 99963-4336', '2023-05-17', '17/05/2023 14:20:12', '.m_gouvea@terra.com.br');
INSERT INTO produtor VALUES (36, 'SITIO RETA GRANDE', '', '', '16260-970', 'Estrada Municipal Que Liga Coroados A Glicerio Km 1', 's/n', 'Zona Rural-Corrego do Campo ', 'Coroados ', 'SP', '-50.285505303966865', '-21.33958980859057', 'false', 'false', 'false', '(18) 3654-1320 / (18) 3645-1320', '2023-05-17', '17/05/2023 14:29:58', 'faustoluizr@yahoo.com.br');
INSERT INTO produtor VALUES (37, 'Granja Benolle', '', 'laticiniobenolle', '94380-000', 'Av. Dr. Pompilio Gomes Sobrinho', '23095', ' Odone', ' Glorinha', 'RS', '-50.79042315956133', '-29.88003110263923', 'false', 'false', 'false', '(51) 99775-1772', '2023-05-17', '17/05/2023 14:39:21', 'benolle@benolle.com.br');
INSERT INTO produtor VALUES (38, 'Palmeira Laticinio Ltda.', 'http://www.palmeiralaticinio.com.br', 'palmeiralaticinio', '45.710-000', 'BR 415, Km 138 ', 's/n', ' Fazenda Cabana da Ponte (Zona Rural)', 'Itororó', 'BA', '-40.03197033499428', '-15.111252301613632', 'false', 'false', 'false', '(73) 3265-1943 / (73) 3265-1222 / (73) 99826-8347', '2023-05-17', '17/05/2023 14:45:40', 'palmeiralaticinio@hotmail.com');
INSERT INTO produtor VALUES (39, 'Rancho Biju', 'http://www.ranchobiju.com.br/', 'ranchobiju', '37680-000', ' R. Fausto Rezende de Souza, ', '183', 'Centro', ' Gonçalves', 'MG', '-45.85402145970304', '-22.661641372120894', 'false', 'false', 'false', '(35) 3654-1453', '2023-05-17', '17/05/2023 14:56:02', '');
INSERT INTO produtor VALUES (40, 'Fazenda São José do Porteiro', '', '', '13577-899 ', 'Rod. SP-215 km 152', 's/n', 'Zona Rural', 'São Carlos', 'SP', '-47.804209617384245', '-22.061638445409372', 'false', 'false', 'false', '(16)997521705', '2023-05-17', '17/05/2023 15:07:05', 'fazendapotreiro@gmail.com');
INSERT INTO produtor VALUES (41, 'Sítio Estância Paraíso', '', '', '13560-970', ' Rod Sp 215, Km 141 (Dr Paulo Lauro)', 's/n', 'Zona Rural', ' São Carlos', 'SP', '-47.804209617384245', '-22.048201659204423', 'false', 'false', 'false', '', '2023-05-17', '17/05/2023 15:11:54', 'r_pereiraa@yahoo.com.br');
INSERT INTO produtor VALUES (42, 'Sítio Pontal do Araras / Faz o Bem Queijaria', '', '', '37925-000', 'Rodovia LMG 824 - KM5', 's/n', 'Zona Rural', ' Piumhi ', 'MG', '-45.914077059740414', '-20.457571929803013', 'false', 'false', 'false', '(35) 99806-8516', '2023-06-05', '17/05/2023 15:17:12', 'vinicius.fazobemorganicos@gmail.com');


--
-- TOC entry 2216 (class 0 OID 0)
-- Dependencies: 187
-- Name: produtor_idprodutor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('produtor_idprodutor_seq', 44, true);


--
-- TOC entry 2197 (class 0 OID 32880)
-- Dependencies: 198
-- Data for Name: produtor_ponto_venda; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2217 (class 0 OID 0)
-- Dependencies: 197
-- Name: produtor_ponto_venda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('produtor_ponto_venda_id_seq', 1, false);


--
-- TOC entry 2185 (class 0 OID 16396)
-- Dependencies: 186
-- Data for Name: tipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipo VALUES (17, 'Mercado');
INSERT INTO tipo VALUES (8, 'Cesta');
INSERT INTO tipo VALUES (9, 'Venda online');
INSERT INTO tipo VALUES (7, 'Feira');


--
-- TOC entry 2218 (class 0 OID 0)
-- Dependencies: 185
-- Name: tipo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_id_seq', 17, true);


--
-- TOC entry 2051 (class 2606 OID 16420)
-- Name: pontovenda pontovenda_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pontovenda
    ADD CONSTRAINT pontovenda_pkey PRIMARY KEY (id);


--
-- TOC entry 2053 (class 2606 OID 16428)
-- Name: produto produto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto
    ADD CONSTRAINT produto_pkey PRIMARY KEY (id);


--
-- TOC entry 2055 (class 2606 OID 16452)
-- Name: produto_produtor produto_produtor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto_produtor
    ADD CONSTRAINT produto_produtor_pkey PRIMARY KEY (id);


--
-- TOC entry 2057 (class 2606 OID 16470)
-- Name: produto_venda produto_venda_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto_venda
    ADD CONSTRAINT produto_venda_pkey PRIMARY KEY (id);


--
-- TOC entry 2049 (class 2606 OID 16412)
-- Name: produtor produtor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produtor
    ADD CONSTRAINT produtor_pkey PRIMARY KEY (id);


--
-- TOC entry 2059 (class 2606 OID 32885)
-- Name: produtor_ponto_venda produtor_ponto_venda_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produtor_ponto_venda
    ADD CONSTRAINT produtor_ponto_venda_pkey PRIMARY KEY (id);


--
-- TOC entry 2047 (class 2606 OID 16401)
-- Name: tipo tipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo
    ADD CONSTRAINT tipo_pkey PRIMARY KEY (id);


--
-- TOC entry 2066 (class 2606 OID 32891)
-- Name: produtor_ponto_venda id_pc_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produtor_ponto_venda
    ADD CONSTRAINT id_pc_id FOREIGN KEY (pontovenda) REFERENCES pontovenda(id) ON DELETE CASCADE;


--
-- TOC entry 2065 (class 2606 OID 32886)
-- Name: produtor_ponto_venda id_pvpr_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produtor_ponto_venda
    ADD CONSTRAINT id_pvpr_id FOREIGN KEY (produtor) REFERENCES produtor(id) ON DELETE CASCADE;


--
-- TOC entry 2060 (class 2606 OID 32834)
-- Name: pontovenda id_tipo_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pontovenda
    ADD CONSTRAINT id_tipo_id FOREIGN KEY (tipo_id) REFERENCES tipo(id);


--
-- TOC entry 2061 (class 2606 OID 16453)
-- Name: produto_produtor produto_produtor_produto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto_produtor
    ADD CONSTRAINT produto_produtor_produto_fkey FOREIGN KEY (produto) REFERENCES produto(id) ON DELETE CASCADE;


--
-- TOC entry 2062 (class 2606 OID 16458)
-- Name: produto_produtor produto_produtor_produtor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto_produtor
    ADD CONSTRAINT produto_produtor_produtor_fkey FOREIGN KEY (produtor) REFERENCES produtor(id) ON DELETE CASCADE;


--
-- TOC entry 2063 (class 2606 OID 16471)
-- Name: produto_venda produto_venda_produtovenda_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto_venda
    ADD CONSTRAINT produto_venda_produtovenda_fkey FOREIGN KEY (produtovenda) REFERENCES produto(id) ON DELETE CASCADE;


--
-- TOC entry 2064 (class 2606 OID 16476)
-- Name: produto_venda produto_venda_venda_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY produto_venda
    ADD CONSTRAINT produto_venda_venda_fkey FOREIGN KEY (venda) REFERENCES pontovenda(id) ON DELETE CASCADE;


-- Completed on 2023-06-29 14:34:17

--
-- PostgreSQL database dump complete
--

