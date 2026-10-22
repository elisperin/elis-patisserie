# Elis Patisserie 🍰

Site de uma confeitaria inspirada na **confeitaria francesa** e na estética **retrô dos anos 50, 60 e 70**, desenvolvido com **PHP**, **PostgreSQL**, **HTML** e **CSS**.

O cliente pode conhecer a marca, consultar o cardápio, filtrar produtos, ver kits e opções para casamentos, usar uma calculadora de bolo e docinhos, montar um bolo personalizado e fazer pedidos para delivery ou retirada. O administrador entra por uma área separada e protegida por sessão, onde pode realizar o **CRUD completo de produtos**, acompanhar pedidos, alterar seus status e consultar um relatório geral.

## Sumário

1. [Sobre o projeto](#1-sobre-o-projeto)
2. [Requisitos funcionais](#2-requisitos-funcionais)
3. [Regras de negócio](#3-regras-de-negócio)
4. [Requisitos não funcionais](#4-requisitos-não-funcionais)
5. [Fluxo de trabalho](#5-fluxo-de-trabalho)
6. [Banco de dados](#6-banco-de-dados)
7. [Organização do código](#7-organização-do-código)
8. [Como rodar](#8-como-rodar)

---

## 1. Sobre o projeto

A **Elis Patisserie** é uma confeitaria fictícia criada para unir técnica francesa, delicadeza, cuidado artesanal e uma identidade visual retrô. O projeto trabalha com bolos, tortas, macarons, sobremesas individuais, kits comemorativos e produtos para casamentos.

O sistema tem dois tipos principais de acesso:

| Usuário | O que faz |
|---|---|
| **Visitante / cliente** | Acessa as páginas públicas, consulta produtos, usa a calculadora, monta um bolo e envia pedidos. |
| **Administrador** | Faz login em uma área protegida, cadastra, lista, consulta, atualiza e exclui produtos, acompanha pedidos, altera status e consulta relatórios. |

### Principais funcionalidades

- **Página inicial** com identidade da marca e até quatro produtos ativos em destaque.
- **Cardápio** com filtro por categoria e unidade.
- **Kits comemorativos** para datas especiais.
- **Casamentos** com produtos específicos da categoria.
- **Calculadora** que sugere peso de bolo e quantidade de docinhos conforme o número de convidados.
- **Monte seu bolo** com escolha de peso, massa, recheio, cobertura, decoração, unidade, data e período.
- **Cálculo do bolo personalizado** por peso, usando o valor de R$ 120,00 por kg.
- **Delivery e retirada** com cálculo do total e cadastro do pedido no banco.
- **Unidades** em Americana-SP, Leblon-RJ e Monte Verde-MG.
- **Sobre**, **FAQ** e **Contato**.
- **Login administrativo** com sessão.
- **CRUD completo de produtos**.
- **Controle de estoque, preço, unidade, imagem e situação ativo/inativo**.
- **Listagem de pedidos** e atualização de status.
- **Relatório geral** com dados de produtos, estoque e pedidos.

### Tecnologias

| Camada | Tecnologia | Uso |
|---|---|---|
| Backend | PHP | Páginas, formulários, regras do sistema, sessões e cálculos |
| Banco de dados | PostgreSQL | Produtos, pedidos e usuários administrativos |
| Conexão | PDO | Comunicação entre PHP e PostgreSQL |
| Front-end | HTML | Estrutura das páginas e formulários |
| Estilo | CSS | Identidade visual, tabelas, botões, formulários e organização das telas |

O projeto não utiliza framework nem JavaScript.

---

## 2. Requisitos funcionais

| Código | Requisito | Quem usa | Onde |
|---|---|---|---|
| **RF01** | Exibir a página inicial da confeitaria e apresentar a identidade da Elis Patisserie. | Todos | `index.php` |
| **RF02** | Exibir até quatro produtos ativos como destaques da página inicial. | Todos | `index.php` |
| **RF03** | Listar os produtos cadastrados no cardápio. | Todos | `cardapio.php` |
| **RF04** | Filtrar o cardápio por categoria e unidade. | Todos | `cardapio.php` |
| **RF05** | Não exibir produtos inativos no cardápio. | Todos | `cardapio.php` |
| **RF06** | Exibir somente produtos da categoria Kits Comemorativos na página de kits. | Todos | `kits.php` |
| **RF07** | Exibir somente produtos da categoria Casamentos na página de casamentos. | Todos | `casamentos.php` |
| **RF08** | Calcular uma sugestão de peso de bolo e quantidade de docinhos conforme o número de convidados. | Todos | `calculadora.php` |
| **RF09** | Permitir montar um bolo escolhendo peso, massa, recheio, cobertura, decoração, unidade, data e período. | Todos | `monte-bolo.php` |
| **RF10** | Calcular automaticamente o valor do bolo personalizado pelo peso escolhido. | Todos | `monte-bolo.php` |
| **RF11** | Salvar o pedido de bolo personalizado na tabela de pedidos. | Todos | `monte-bolo.php` |
| **RF12** | Listar os produtos ativos como opções no formulário de delivery. | Todos | `delivery.php` |
| **RF13** | Permitir escolher produto, quantidade, unidade, forma de recebimento, data e período. | Todos | `delivery.php` |
| **RF14** | Conferir se a unidade escolhida no pedido é a mesma unidade cadastrada para o produto. | Todos | `delivery.php` |
| **RF15** | Calcular o total do pedido multiplicando o preço pela quantidade. | Todos | `delivery.php` |
| **RF16** | Salvar pedidos de delivery ou retirada no PostgreSQL. | Todos | `delivery.php` |
| **RF17** | Exibir os dados das unidades de Americana-SP, Leblon-RJ e Monte Verde-MG. | Todos | `unidades.php` |
| **RF18** | Apresentar informações sobre a marca, conservação, pagamento, alérgenos e contato. | Todos | `sobre.php`, `faq.php`, `contato.php` |
| **RF19** | Permitir login administrativo com e-mail e senha cadastrados na tabela `usuarios`. | Administrador | `login/login.php` |
| **RF20** | Impedir o acesso às páginas administrativas quando não existir sessão de usuário. | Administrador | `login/verifica_user.php` |
| **RF21** | Encerrar a sessão administrativa. | Administrador | `login/logout.php` |
| **RF22** | Cadastrar um novo produto. | Administrador | `app/produto-cadastrar.php` |
| **RF23** | Listar todos os produtos cadastrados. | Administrador | `app/produto-listar.php` |
| **RF24** | Consultar um produto específico pelo ID. | Administrador | `app/produto-consultar.php` |
| **RF25** | Atualizar os dados de um produto pelo ID. | Administrador | `app/produto-atualizar.php` |
| **RF26** | Excluir um produto pelo ID. | Administrador | `app/produto-excluir.php` |
| **RF27** | Listar todos os pedidos cadastrados. | Administrador | `app/pedidos.php` |
| **RF28** | Alterar o status de um pedido pelo ID. | Administrador | `app/pedidos.php` |
| **RF29** | Exibir relatório com quantidade de produtos, total em estoque, preço médio, quantidade de pedidos e valor total dos pedidos. | Administrador | `app/relatorio.php` |
| **RF30** | Exibir no relatório uma tabela com os produtos cadastrados. | Administrador | `app/relatorio.php` |

---

## 3. Regras de negócio

| Código | Regra |
|---|---|
| **RN01** | Produtos da parte pública só aparecem quando o campo `ativo` permite sua exibição. |
| **RN02** | A página inicial mostra no máximo quatro produtos ativos. |
| **RN03** | As categorias disponíveis são: **Bolos e Tortas**, **Confeitaria Fina**, **Sobremesas Individuais**, **Kits Comemorativos** e **Casamentos**. |
| **RN04** | As unidades disponíveis são: **Americana - SP**, **Leblon - RJ** e **Monte Verde - MG**. |
| **RN05** | A página de Kits consulta apenas produtos cuja categoria seja `Kits Comemorativos`. |
| **RN06** | A página de Casamentos consulta apenas produtos cuja categoria seja `Casamentos`. |
| **RN07** | No cardápio, um produto pode ser filtrado por categoria e por unidade ao mesmo tempo. |
| **RN08** | No delivery, a unidade escolhida pelo cliente precisa ser a mesma unidade cadastrada no produto. |
| **RN09** | O total do delivery é calculado por `preço do produto × quantidade`. |
| **RN10** | Um pedido feito pelo delivery é cadastrado inicialmente com status **Recebido**. |
| **RN11** | Os status disponíveis para atualização administrativa são **Recebido**, **Em produção**, **Pronto** e **Finalizado**. |
| **RN12** | O bolo personalizado custa **R$ 120,00 por kg**. |
| **RN13** | Os pesos disponíveis no Monte seu bolo são **1 kg, 2 kg, 4 kg e 6 kg**. |
| **RN14** | O pedido de bolo personalizado é cadastrado com quantidade `1`, tipo de recebimento **Orçamento personalizado**, observação **Bolo montado pelo cliente** e status **Aguardando orçamento**. |
| **RN15** | A calculadora sugere **1 kg e 40 docinhos** para até 10 convidados. |
| **RN16** | A calculadora sugere **2 kg e 80 docinhos** para até 20 convidados. |
| **RN17** | A calculadora sugere **4 kg e 160 docinhos** para até 40 convidados. |
| **RN18** | A calculadora sugere **6 kg e 240 docinhos** para até 60 convidados. |
| **RN19** | Para mais de 60 convidados, a calculadora recomenda orçamento personalizado. |
| **RN20** | O CRUD completo é realizado sobre a tabela `produtos`. |
| **RN21** | Consulta, atualização e exclusão de produto usam o ID para identificar o registro desejado. |
| **RN22** | A atualização do status de pedidos também usa o ID para alterar somente o pedido escolhido. |
| **RN23** | Somente usuários com uma sessão criada pelo login podem abrir as páginas administrativas. |
| **RN24** | O relatório busca os registros com `SELECT` e realiza as contagens, somas e média usando PHP. |

---

## 4. Requisitos não funcionais

| Código | Categoria | Requisito | Como é atendido |
|---|---|---|---|
| **RNF01** | Organização | Separar as partes do projeto de acordo com sua função. | Uso das pastas `app/`, `login/`, `includes/`, `database/`, `style/` e `imagens/`. |
| **RNF02** | Manutenibilidade | Evitar repetir os principais comandos de banco em todas as páginas. | As funções de acesso ao banco ficam centralizadas em `includes/functions.php`. |
| **RNF03** | Reutilização | Reutilizar partes visuais que aparecem em várias páginas. | Cabeçalho e rodapé ficam em `includes/header.php`, `includes/header_admin.php` e `includes/footer.php`. |
| **RNF04** | Controle de acesso | Restringir as páginas administrativas. | As páginas de `app/` usam `login/verifica_user.php`. |
| **RNF05** | Banco de dados | Fazer a comunicação com PostgreSQL por PHP. | A conexão é criada com PDO em `database/connect.php`. |
| **RNF06** | Banco de dados | Trabalhar com parâmetros nas consultas que recebem valores. | Uso de `prepare()` e `bindParam()` nas funções de banco. |
| **RNF07** | Usabilidade | Exigir os dados necessários nos formulários. | Uso de `required`, tipos de `input`, valores mínimos e opções em `select`. |
| **RNF08** | Identidade visual | Manter a mesma aparência retrô em todas as páginas. | Estilos centralizados em `style/style.css`, imagens próprias e classes reutilizadas. |
| **RNF09** | Adaptação de tela | Permitir melhor adaptação em telas diferentes. | Uso de `meta viewport`, larguras máximas e imagens ajustáveis. |
| **RNF10** | Legibilidade | Tornar o código mais fácil de entender durante o desenvolvimento e a apresentação. | Os arquivos possuem comentários explicando os blocos e funções. |
| **RNF11** | Simplicidade | Utilizar uma estrutura compatível com os conteúdos trabalhados no projeto. | PHP, PostgreSQL, HTML e CSS, sem frameworks e sem JavaScript. |
| **RNF12** | Compatibilidade | Executar em ambiente com PHP e PostgreSQL. | Necessita de PHP com PDO para PostgreSQL e acesso a um servidor PostgreSQL. |
| **RNF13** | Persistência | Manter produtos e pedidos mesmo após fechar o navegador. | Os dados são armazenados no PostgreSQL. |
| **RNF14** | Identidade | Manter coerência entre conteúdo e proposta da marca. | Cores pastel, imagens de confeitaria e referências visuais aos anos 50, 60 e 70. |

### Limitações didáticas e cuidados de segurança

Este projeto foi desenvolvido para fins escolares e utiliza uma implementação simples de login. Na versão atual:

- a senha do administrador é comparada diretamente com o valor salvo no banco;
- não existe cadastro público de clientes;
- não existe cadastro público de novos administradores;
- alguns campos numéricos, como preço, estoque, quantidade e total, estão armazenados como `VARCHAR`;
- a conexão com o banco depende dos dados configurados em `database/connect.php`.

Para uma aplicação real, as senhas deveriam ser armazenadas com hash, os tipos numéricos poderiam ser ajustados e as credenciais do banco nunca deveriam ser publicadas no repositório.

**Antes de enviar o projeto para o GitHub, substitua qualquer host, usuário ou senha real existente em `database/connect.php` por valores de exemplo.**

---

## 5. Fluxo de trabalho

### 5.1 Cliente

```text
Página inicial
      │
      ├──► Cardápio
      │       │
      │       ├── filtra por categoria
      │       ├── filtra por unidade
      │       └── botão "Pedir agora" ──────────────┐
      │                                             │
      ├──► Kits ──► produtos Kits Comemorativos ───┤
      │                                             │
      ├──► Casamentos ──► produtos Casamentos      │
      │                                             │
      ├──► Calculadora                              │
      │       │                                     │
      │       └── sugere peso do bolo e docinhos   │
      │                                             ▼
      ├──► Monte seu bolo                     Delivery / Retirada
      │       │                                     │
      │       ├── escolhe peso                       ├── escolhe produto
      │       ├── massa                              ├── quantidade
      │       ├── recheio                            ├── unidade
      │       ├── cobertura                          ├── data e período
      │       ├── decoração                          │
      │       └── calcula valor                      └── calcula total
      │              │                                      │
      │              ▼                                      ▼
      │       INSERT em pedidos                      INSERT em pedidos
      │
      ├──► Unidades
      ├──► Sobre
      ├──► FAQ
      └──► Contato
```

### 5.2 Administrador

```text
/login/login.php
       │
       ├── recebe e-mail e senha
       │
       ├── consulta a tabela usuarios
       │
       └── dados corretos?
               │
              sim
               │
               ▼
        cria $_SESSION['id']
               │
               ▼
       Área administrativa
               │
               ├──► Cadastrar produto   → CREATE
               ├──► Listar produtos     → READ
               ├──► Consultar por ID    → READ
               ├──► Atualizar produto   → UPDATE
               ├──► Excluir produto     → DELETE
               ├──► Pedidos
               │       └── atualizar status
               ├──► Relatório
               └──► Logout
```

### 5.3 Como uma operação do banco funciona por dentro

Exemplo de uma operação enviada por formulário:

```text
Formulário HTML
      │
      ▼
method="post"
      │
      ▼
PHP lê $_POST
      │
      ▼
função em includes/functions.php
      │
      ▼
$conexao->prepare($sql)
      │
      ▼
bindParam() quando existem parâmetros
      │
      ▼
execute()
      │
      ▼
PostgreSQL
```

### 5.4 CRUD de produtos

#### CREATE

```text
app/produto-cadastrar.php
        │
        ▼
cadastrar_produto()
        │
        ▼
INSERT INTO produtos
```

#### READ

```text
app/produto-listar.php
        │
        ▼
listar_produtos()
        │
        ▼
SELECT * FROM produtos
```

e:

```text
app/produto-consultar.php
        │
        ▼
consultar_produto()
        │
        ▼
SELECT * FROM produtos WHERE id = :id
```

#### UPDATE

```text
app/produto-atualizar.php
        │
        ▼
atualizar_produto()
        │
        ▼
UPDATE produtos ... WHERE id = :id
```

#### DELETE

```text
app/produto-excluir.php
        │
        ▼
deletar_produto()
        │
        ▼
DELETE FROM produtos WHERE id = :id
```

### 5.5 Fluxo dos pedidos

```text
Delivery / Monte seu bolo
          │
          ▼
cadastrar_pedido()
          │
          ▼
INSERT INTO pedidos
          │
          ▼
app/pedidos.php
          │
          ├── SELECT para listar
          │
          └── UPDATE para mudar status
```

---

## 6. Banco de dados

O banco utilizado pelo projeto é o **PostgreSQL**.

A conexão PHP fica em:

```text
database/connect.php
```

Os comandos de criação das tabelas, dados de exemplo e testes de SQL ficam em:

```text
database/dados.pgsql
```

No arquivo atual, vários comandos do `dados.pgsql` estão comentados com `--`, pois foram mantidos como registro dos comandos usados durante o desenvolvimento e os testes.

### Estrutura geral

As três tabelas principais são independentes na estrutura atual:

```text
produtos                     pedidos                       usuarios
┌─────────────────┐         ┌────────────────────┐        ┌───────────────┐
│ id          PK  │         │ id             PK  │        │ id        PK  │
│ nome            │         │ cliente            │        │ email         │
│ categoria       │         │ email              │        │ senha         │
│ preco           │         │ telefone           │        └───────────────┘
│ estoque         │         │ produto            │
│ unidade         │         │ quantidade         │
│ descricao       │         │ unidade            │
│ rendimento      │         │ tipo_recebimento   │
│ alergenos       │         │ data_retirada      │
│ imagem          │         │ periodo            │
│ ativo           │         │ observacao         │
└─────────────────┘         │ status             │
                            │ total              │
                            └────────────────────┘
```

A versão atual não utiliza chaves estrangeiras entre essas tabelas. O pedido guarda a descrição/nome do produto utilizado naquele momento.

### Tabela `produtos`

Guarda os produtos exibidos e administrados pelo sistema.

| Campo | Tipo | Uso |
|---|---|---|
| `id` | `SERIAL PRIMARY KEY` | Identificação do produto |
| `nome` | `VARCHAR(80)` | Nome |
| `categoria` | `VARCHAR(60)` | Categoria |
| `preco` | `VARCHAR(20)` | Preço |
| `estoque` | `VARCHAR(20)` | Quantidade em estoque |
| `unidade` | `VARCHAR(60)` | Unidade responsável |
| `descricao` | `TEXT` | Descrição |
| `rendimento` | `VARCHAR(80)` | Rendimento |
| `alergenos` | `VARCHAR(120)` | Principais alérgenos |
| `imagem` | `VARCHAR(100)` | Caminho da imagem |
| `ativo` | `BOOLEAN` | Define se o produto está ativo |

### Tabela `pedidos`

Guarda pedidos feitos pelo Delivery e pelo Monte seu bolo.

| Campo | Tipo | Uso |
|---|---|---|
| `id` | `SERIAL PRIMARY KEY` | Identificação do pedido |
| `cliente` | `VARCHAR(100)` | Nome do cliente |
| `email` | `VARCHAR(100)` | E-mail |
| `telefone` | `VARCHAR(30)` | Telefone |
| `produto` | `TEXT` | Nome do produto ou descrição do bolo personalizado |
| `quantidade` | `VARCHAR(20)` | Quantidade |
| `unidade` | `VARCHAR(60)` | Unidade escolhida |
| `tipo_recebimento` | `VARCHAR(50)` | Delivery, Retirada ou Orçamento personalizado |
| `data_retirada` | `DATE` | Data escolhida |
| `periodo` | `VARCHAR(30)` | Manhã, Tarde ou Noite |
| `observacao` | `TEXT` | Observação do pedido |
| `status` | `VARCHAR(50)` | Situação atual |
| `total` | `VARCHAR(30)` | Valor total |

### Tabela `usuarios`

Guarda os dados usados no login da área administrativa.

| Campo | Tipo | Uso |
|---|---|---|
| `id` | `SERIAL PRIMARY KEY` | Identificação do usuário |
| `email` | `VARCHAR(100)` | E-mail usado no login |
| `senha` | `VARCHAR(60)` | Senha usada no login |

### Operações SQL utilizadas

O projeto utiliza os quatro comandos principais do CRUD:

```sql
INSERT
SELECT
UPDATE
DELETE
```

#### Exemplos no sistema

```sql
INSERT INTO produtos (...)
VALUES (...);
```

Cria um produto.

```sql
SELECT * FROM produtos
ORDER BY id;
```

Lista os produtos.

```sql
SELECT * FROM produtos
WHERE id = :id;
```

Consulta um produto específico.

```sql
UPDATE produtos
SET ...
WHERE id = :id;
```

Atualiza um produto.

```sql
DELETE FROM produtos
WHERE id = :id;
```

Exclui um produto.

```sql
UPDATE pedidos
SET status = :status
WHERE id = :id;
```

Atualiza o status de um pedido.

### Relatório

O relatório não utiliza funções de agregação no SQL. Ele busca os dados por `SELECT` e realiza as contas em PHP.

Entre os resultados exibidos estão:

- quantidade de produtos cadastrados;
- total de itens em estoque;
- preço médio dos produtos;
- quantidade de pedidos recebidos;
- valor total dos pedidos;
- tabela com os produtos cadastrados.

---

## 7. Organização do código

O projeto separa as páginas públicas, administração, login, funções, banco, estilos e imagens.

```text
elis-patisserie/
├── index.php
├── cardapio.php
├── kits.php
├── casamentos.php
├── calculadora.php
├── monte-bolo.php
├── delivery.php
├── unidades.php
├── sobre.php
├── faq.php
├── contato.php
│
├── app/
│   ├── produto-cadastrar.php
│   ├── produto-listar.php
│   ├── produto-consultar.php
│   ├── produto-atualizar.php
│   ├── produto-excluir.php
│   ├── pedidos.php
│   └── relatorio.php
│
├── login/
│   ├── login.php
│   ├── logout.php
│   └── verifica_user.php
│
├── includes/
│   ├── functions.php
│   ├── header.php
│   ├── header_admin.php
│   └── footer.php
│
├── database/
│   ├── connect.php
│   └── dados.pgsql
│
├── style/
│   └── style.css
│
└── imagens/
    └── imagens usadas na identidade visual e nos produtos
```

### Função de cada parte

| Parte | O que faz |
|---|---|
| Arquivos `.php` da raiz | Páginas usadas pelo cliente |
| `app/` | Área administrativa, CRUD, pedidos e relatório |
| `login/` | Login, logout e proteção das páginas administrativas |
| `includes/functions.php` | Funções que executam as principais operações no PostgreSQL |
| `includes/header.php` | Cabeçalho e menu da parte pública |
| `includes/header_admin.php` | Cabeçalho e menu da administração |
| `includes/footer.php` | Rodapé reutilizado |
| `database/connect.php` | Cria a conexão PDO com o PostgreSQL |
| `database/dados.pgsql` | Guarda criação das tabelas, inserts e comandos de teste |
| `style/style.css` | Estilo visual do site |
| `imagens/` | Capas, imagens institucionais e imagens dos produtos |

### Principais funções

| Função | O que faz |
|---|---|
| `cadastrar_produto()` | Executa `INSERT` em `produtos` |
| `listar_produtos()` | Lista todos os produtos |
| `listar_produtos_ativos()` | Lista somente produtos ativos |
| `listar_produtos_categoria()` | Busca produtos de uma categoria |
| `consultar_produto()` | Busca um produto pelo ID |
| `atualizar_produto()` | Executa `UPDATE` em um produto |
| `deletar_produto()` | Executa `DELETE` em um produto |
| `cadastrar_pedido()` | Insere um pedido |
| `listar_pedidos()` | Lista os pedidos |
| `atualizar_status_pedido()` | Altera o status de um pedido |
| `consulta_user()` | Busca um usuário administrativo pelo e-mail |

### Comentários no código

Os arquivos possuem comentários explicando o objetivo dos principais blocos.

Exemplo:

```php
// verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == "POST") {
```

e:

```php
// atualiza o status do pedido pelo ID que foi informado
atualizar_status_pedido($conexao, $_POST['id'], $_POST['status']);
```

Os comentários foram usados para facilitar o entendimento do código e a explicação durante a apresentação do projeto.

---

## 8. Como rodar

### Passo 0: requisitos

Para executar o projeto é necessário ter:

- **PHP**;
- PHP com suporte ao **PDO PostgreSQL (`pdo_pgsql`)**;
- **PostgreSQL**;
- navegador;
- os arquivos do projeto.

No ambiente usado durante o desenvolvimento, o código foi editado no **VS Code** e o PostgreSQL foi acessado também pelo **PostgreSQL Explorer / New Query**.

### Passo 1: colocar o projeto na pasta correta

Mantenha a pasta com este nome:

```text
elis-patisserie
```

Como os caminhos usados no projeto começam com `/elis-patisserie/`, o servidor deve enxergar essa pasta no endereço.

Exemplo de estrutura:

```text
projetos/
└── elis-patisserie/
    ├── index.php
    ├── app/
    ├── login/
    └── ...
```

### Passo 2: preparar o banco

Use ou crie um banco PostgreSQL chamado:

```text
elis_patisserie
```

Depois abra:

```text
database/dados.pgsql
```

O arquivo contém os comandos usados para criar:

```text
produtos
pedidos
usuarios
```

Os blocos estão atualmente comentados com `--`.

Em um banco novo, retire os `--` somente dos comandos `CREATE TABLE` que deseja executar e rode pelo **New Query** do PostgreSQL Explorer ou pelo ambiente PostgreSQL usado na máquina.

Depois faça o mesmo com os `INSERT` de produtos que deseja utilizar como dados iniciais.

### Passo 3: cadastrar um administrador

A área administrativa precisa de pelo menos um registro na tabela `usuarios`.

Exemplo:

```sql
INSERT INTO usuarios
(email, senha)
VALUES
(
    'seu-email@exemplo.com',
    'sua-senha'
);
```

Use dados próprios no seu ambiente.

### Passo 4: configurar a conexão

Abra:

```text
database/connect.php
```

e configure os dados do PostgreSQL:

```php
<?php

$host = "SEU_HOST_OU_IP";
$dbname = "elis_patisserie";
<<<<<<< HEAD
$user = "SEU_USUARIO";
$pass = "SUA_SENHA";

try {
    $conexao = new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $user,
        $pass
    );

    return $conexao;

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

?>
=======
$user = "patisserie";
$pass = "patisserie";
>>>>>>> 8e21018717e1e09332933a60fd30713fc72f12af
```

- `$host`: endereço do PostgreSQL, como `localhost` ou o IP utilizado na rede.
- `$dbname`: nome do banco.
- `$user`: usuário do PostgreSQL.
- `$pass`: senha desse usuário.

> **Importante:** não coloque uma senha real em um repositório público do GitHub.

### Passo 5: iniciar o servidor PHP

Como o projeto usa caminhos que começam com `/elis-patisserie/`, abra o terminal **na pasta que contém** a pasta `elis-patisserie`.

Exemplo:

```text
projetos/
├── elis-patisserie/
└── ← abra o terminal aqui
```

Execute:

```bash
php -S localhost:8000
```

Deixe o terminal aberto enquanto estiver usando o sistema.

### Passo 6: abrir o site

No navegador:

```text
http://localhost:8000/elis-patisserie/
```

ou:

```text
http://localhost:8000/elis-patisserie/index.php
```

### Passo 7: acessar a administração

Abra:

```text
http://localhost:8000/elis-patisserie/login/login.php
```

Digite o e-mail e a senha cadastrados na tabela `usuarios`.

Depois do login, o sistema direciona para a listagem administrativa de produtos.

### Passo 8: testar o CRUD

Uma forma simples de conferir o funcionamento é criar um produto de teste e realizar as quatro operações:

```text
Cadastrar produto
      ↓
Listar / Consultar
      ↓
Atualizar
      ↓
Excluir
```

Também é possível conferir diretamente no PostgreSQL:

```sql
SELECT * FROM produtos;
```

### Passo 9: testar pedidos

Faça um pedido pelo Delivery ou pelo Monte seu bolo.

Depois confira:

```sql
SELECT * FROM pedidos;
```

Entre na administração, abra a tela de pedidos e altere o status.

Execute novamente:

```sql
SELECT * FROM pedidos;
```

para conferir a alteração.

### Se algo der errado

| Problema | Causa provável | O que conferir |
|---|---|---|
| `Erro: SQLSTATE...` | PHP não conseguiu acessar o PostgreSQL | `host`, banco, usuário, senha e conexão de rede |
| `relation "produtos" does not exist` | A tabela não existe no banco selecionado | Execute o `CREATE TABLE produtos` no banco correto |
| `relation "pedidos" does not exist` | A tabela não existe no banco selecionado | Execute o `CREATE TABLE pedidos` no banco correto |
| `relation "usuarios" does not exist` | A tabela de login não foi criada | Execute o `CREATE TABLE usuarios` |
| `Usuário ou senha inválidos` | Dados diferentes dos cadastrados | Confira `SELECT * FROM usuarios;` |
| CSS ou imagens não aparecem | Caminho do projeto diferente de `/elis-patisserie/` | Confira o nome da pasta e o endereço do navegador |
| Produto não aparece no site | Produto pode estar inativo ou fora do filtro | Confira `ativo`, categoria e unidade |
| Pedido não é cadastrado | Unidade selecionada é diferente da unidade do produto ou conexão falhou | Confira unidade e PostgreSQL |
| Alterações no banco não aparecem | Consulta feita em outro banco/conexão | Confirme que o New Query está conectado ao banco `elis_patisserie` |

### Antes de publicar no GitHub

Antes do envio final:

1. abra `database/connect.php`;
2. retire o host/IP real, usuário real e senha real;
3. deixe apenas valores de exemplo;
4. confira se nenhum outro arquivo contém credenciais pessoais;
5. só depois envie o projeto ao repositório.

---

## Resumo do CRUD

| Operação | SQL | Página |
|---|---|---|
| **Create** | `INSERT INTO produtos` | `app/produto-cadastrar.php` |
| **Read** | `SELECT` | `app/produto-listar.php` e `app/produto-consultar.php` |
| **Update** | `UPDATE produtos` | `app/produto-atualizar.php` |
| **Delete** | `DELETE FROM produtos` | `app/produto-excluir.php` |

---

## Identidade visual

A identidade da **Elis Patisserie** foi inspirada em anúncios, embalagens e confeitarias das décadas de **1950, 1960 e 1970**.

A proposta visual utiliza:

- azul pastel;
- rosa pastel;
- creme;
- amarelo claro;
- tons de vinho e vermelho nos detalhes;
- laços;
- elementos ligados à confeitaria;
- imagens inspiradas em anúncios antigos;
- referências à pâtisserie francesa.

A intenção foi unir uma confeitaria delicada e artesanal a uma estética nostálgica e reconhecível em todas as páginas do projeto.
