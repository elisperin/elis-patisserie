# Elis Patisserie

Site de uma confeitaria inspirada na **confeitaria francesa** e na estética **retrô dos anos 50, 60 e 70**, desenvolvido em **PHP**, **PostgreSQL**, **HTML** e **CSS**.

O cliente pode conhecer a confeitaria, consultar o cardápio, filtrar produtos, ver kits e opções para casamentos, calcular uma sugestão de bolo e docinhos, montar um bolo personalizado e enviar pedidos. A parte administrativa possui login e permite realizar o **CRUD completo de produtos**, acompanhar pedidos, alterar seus status e consultar um relatório geral.

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

A **Elis Patisserie** é uma confeitaria fictícia que une técnica francesa, cuidado artesanal e uma identidade visual retrô. O projeto trabalha com bolos, tortas, macarons, sobremesas individuais, kits comemorativos e produtos para casamentos.

O sistema possui dois tipos principais de acesso:

| Usuário | O que faz |
| --- | --- |
| **Visitante / cliente** | Navega pelo site, consulta produtos e unidades, usa a calculadora, monta um bolo e envia pedidos. |
| **Administrador** | Faz login em uma área protegida, cadastra, lista, consulta, atualiza e exclui produtos, acompanha pedidos e consulta relatórios. |

### Principais funcionalidades

- Página inicial com produtos em destaque.
- Cardápio com filtro por categoria e unidade.
- Página de kits para datas comemorativas.
- Página de produtos para casamentos.
- Calculadora de quantidade de bolo e docinhos por número de convidados.
- Página **Monte seu bolo**, com escolha de peso, massa, recheio, cobertura, decoração, unidade, data e período.
- Cálculo do bolo personalizado por peso, usando **R$ 120,00 por kg**.
- Delivery e retirada com cadastro do pedido no banco.
- Consulta das unidades de Americana-SP, Leblon-RJ e Monte Verde-MG.
- Página Sobre, FAQ e Contato.
- Login da área administrativa.
- CRUD completo de produtos.
- Controle de estoque, preço, unidade, imagem e situação ativa/inativa dos produtos.
- Listagem dos pedidos e atualização de status.
- Relatório geral de produtos, estoque e pedidos.

### Tecnologias

| Camada | Tecnologia | Uso |
| --- | --- | --- |
| Backend | PHP | Páginas, formulários, regras e sessões |
| Banco de dados | PostgreSQL | Produtos, pedidos e usuários administrativos |
| Conexão | PDO | Comunicação entre PHP e PostgreSQL |
| Front-end | HTML | Estrutura das páginas |
| Estilo | CSS | Identidade visual retrô e organização das telas |

O projeto não utiliza framework nem JavaScript.

---

## 2. Requisitos funcionais

| Código | Requisito | Quem usa | Onde |
| --- | --- | --- | --- |
| **RF01** | Exibir a página inicial da confeitaria com produtos ativos em destaque. | Todos | `index.php` |
| **RF02** | Listar os produtos do cardápio. | Todos | `cardapio.php` |
| **RF03** | Filtrar o cardápio por categoria e unidade. | Todos | `cardapio.php` |
| **RF04** | Exibir os kits comemorativos cadastrados e ativos. | Todos | `kits.php` |
| **RF05** | Exibir os produtos cadastrados na categoria Casamentos. | Todos | `casamentos.php` |
| **RF06** | Calcular uma sugestão de peso de bolo e quantidade de docinhos conforme o número de convidados. | Todos | `calculadora.php` |
| **RF07** | Permitir montar um bolo personalizado escolhendo peso, massa, recheio, cobertura e decoração. | Todos | `monte-bolo.php` |
| **RF08** | Calcular o valor do bolo personalizado de acordo com o peso escolhido. | Todos | `monte-bolo.php` |
| **RF09** | Cadastrar um pedido de bolo personalizado no banco. | Todos | `monte-bolo.php` |
| **RF10** | Permitir escolher um produto e cadastrar pedido para delivery ou retirada. | Todos | `delivery.php` |
| **RF11** | Calcular o total do pedido pela quantidade escolhida e pelo preço do produto. | Todos | `delivery.php` |
| **RF12** | Exibir informações das três unidades da confeitaria. | Todos | `unidades.php` |
| **RF13** | Permitir o login do administrador por e-mail e senha. | Administrador | `login/login.php` |
| **RF14** | Cadastrar um produto. | Administrador | `app/produto-cadastrar.php` |
| **RF15** | Listar todos os produtos cadastrados. | Administrador | `app/produto-listar.php` |
| **RF16** | Consultar um produto pelo ID. | Administrador | `app/produto-consultar.php` |
| **RF17** | Atualizar um produto pelo ID. | Administrador | `app/produto-atualizar.php` |
| **RF18** | Excluir um produto pelo ID. | Administrador | `app/produto-excluir.php` |
| **RF19** | Listar os pedidos cadastrados. | Administrador | `app/pedidos.php` |
| **RF20** | Atualizar o status de um pedido. | Administrador | `app/pedidos.php` |
| **RF21** | Exibir relatório com quantidade de produtos, estoque total, preço médio, quantidade de pedidos e valor total dos pedidos. | Administrador | `app/relatorio.php` |
| **RF22** | Encerrar a sessão administrativa. | Administrador | `login/logout.php` |

---

## 3. Regras de negócio

| Código | Regra |
| --- | --- |
| **RN01** | Somente produtos marcados como ativos aparecem nas partes públicas que trabalham com produtos ativos. |
| **RN02** | O cardápio pode ser filtrado por categoria e por unidade. |
| **RN03** | As categorias usadas são: Bolos e Tortas, Confeitaria Fina, Sobremesas Individuais, Kits Comemorativos e Casamentos. |
| **RN04** | As unidades disponíveis são Americana-SP, Leblon-RJ e Monte Verde-MG. |
| **RN05** | No delivery, a unidade escolhida pelo cliente deve ser a mesma unidade cadastrada para o produto. |
| **RN06** | O valor do pedido de delivery é calculado multiplicando o preço do produto pela quantidade escolhida. |
| **RN07** | Um pedido comum entra no sistema com o status **Recebido**. |
| **RN08** | Os status disponíveis na administração são: Recebido, Em produção, Pronto e Finalizado. |
| **RN09** | O bolo personalizado custa **R$ 120,00 por kg**. |
| **RN10** | Os pesos disponíveis para o bolo personalizado são 1 kg, 2 kg, 4 kg e 6 kg. |
| **RN11** | A calculadora sugere 1 kg e 40 docinhos para até 10 convidados; 2 kg e 80 docinhos para até 20; 4 kg e 160 docinhos para até 40; e 6 kg e 240 docinhos para até 60. |
| **RN12** | Para mais de 60 convidados, a calculadora recomenda orçamento personalizado. |
| **RN13** | O bolo montado pelo cliente é salvo como pedido com status **Aguardando orçamento**. |
| **RN14** | As páginas administrativas exigem uma sessão iniciada; quem não está logado é redirecionado para a tela de login. |
| **RN15** | O CRUD principal do sistema é realizado sobre a tabela `produtos`. |
| **RN16** | A exclusão de produto é feita pelo ID informado pelo administrador. |

---

## 4. Requisitos não funcionais

| Código | Categoria | Requisito | Como é atendido |
| --- | --- | --- | --- |
| **RNF01** | Organização | Separar páginas públicas, administração, login, funções, banco, estilos e imagens. | Uso das pastas `app/`, `login/`, `includes/`, `database/`, `style/` e `imagens/`. |
| **RNF02** | Manutenibilidade | Evitar repetir a lógica de acesso ao banco em todas as páginas. | As principais operações ficam centralizadas em `includes/functions.php`. |
| **RNF03** | Reutilização | Reutilizar cabeçalho e rodapé. | Uso de `includes/header.php`, `includes/header_admin.php` e `includes/footer.php`. |
| **RNF04** | Controle de acesso | Restringir as páginas administrativas a usuários logados. | As páginas de `app/` carregam `login/verifica_user.php`. |
| **RNF05** | Banco de dados | Fazer a comunicação com PostgreSQL utilizando PDO. | Conexão em `database/connect.php`. |
| **RNF06** | Banco de dados | Enviar valores às consultas por parâmetros. | As funções utilizam `prepare()` e `bindParam()`. |
| **RNF07** | Usabilidade | Identificar os campos dos formulários e exigir os dados necessários. | Uso de `label`, `required`, `select`, tipos de `input` e valores mínimos. |
| **RNF08** | Identidade visual | Manter a mesma aparência retrô nas páginas. | Estilos centralizados em `style/style.css`, com tons pastel, bordas e elementos decorativos. |
| **RNF09** | Adaptação de tela | Permitir que as páginas se adaptem melhor ao tamanho da tela. | Uso de `meta viewport` e imagens ajustáveis pelo CSS. |
| **RNF10** | Simplicidade | Utilizar tecnologias trabalhadas no projeto sem frameworks. | PHP, PostgreSQL, HTML e CSS. |

### Observação sobre segurança

O projeto foi desenvolvido com finalidade didática. Antes de publicar o repositório, os dados reais de acesso ao PostgreSQL no arquivo `database/connect.php` devem ser substituídos por valores de exemplo, principalmente a senha.

---

## 5. Fluxo de trabalho

### 5.1 Cliente

```text
Página inicial
      │
      ├──► Cardápio ──► filtra por categoria/unidade ──► escolhe produto
      │                                                       │
      │                                                       ▼
      │                                                   Delivery
      │                                                       │
      │                                                       ▼
      │                                              pedido salvo no banco
      │
      ├──► Kits
      │
      ├──► Casamentos
      │
      ├──► Calculadora ──► recebe sugestão de kg e docinhos
      │                           │
      │                           ▼
      │                     Monte seu bolo
      │                           │
      │                           ▼
      │                 escolhe peso e características
      │                           │
      │                           ▼
      │                 calcula valor e salva pedido
      │
      ├──► Unidades
      ├──► Sobre
      ├──► FAQ
      └──► Contato
```

### 5.2 Administrador

```text
Tela de login
      │
      ▼
confere e-mail e senha na tabela usuarios
      │
      ▼
cria a sessão do administrador
      │
      ▼
Área administrativa
      │
      ├──► Cadastrar produto   (CREATE)
      ├──► Listar produtos     (READ)
      ├──► Consultar por ID    (READ)
      ├──► Atualizar produto   (UPDATE)
      ├──► Excluir produto     (DELETE)
      ├──► Pedidos
      │      └──► alterar status
      ├──► Relatório
      └──► Sair
```

### 5.3 CRUD de produtos

```text
CREATE
app/produto-cadastrar.php
        │
        ▼
cadastrar_produto()
        │
        ▼
INSERT INTO produtos
```

```text
READ
app/produto-listar.php / app/produto-consultar.php
        │
        ▼
listar_produtos() / consultar_produto()
        │
        ▼
SELECT
```

```text
UPDATE
app/produto-atualizar.php
        │
        ▼
atualizar_produto()
        │
        ▼
UPDATE produtos
```

```text
DELETE
app/produto-excluir.php
        │
        ▼
deletar_produto()
        │
        ▼
DELETE FROM produtos
```

### 5.4 Como uma página fala com o banco

```text
Formulário
   │
   ▼
Página PHP recebe $_POST
   │
   ▼
Função em includes/functions.php
   │
   ▼
PDO prepara o SQL
   │
   ▼
PostgreSQL
   │
   ▼
resultado volta para a página
```

---

## 6. Banco de dados

O banco utilizado pelo projeto é o **PostgreSQL** e a conexão fica em `database/connect.php`.

O arquivo `database/dados.pgsql` reúne a estrutura das tabelas, registros de exemplo e comandos SQL usados durante o desenvolvimento e os testes.

### Tabela `produtos`

Guarda os dados dos produtos exibidos e administrados pelo sistema.

| Campo | Tipo | Uso |
| --- | --- | --- |
| `id` | SERIAL / PK | Identificação do produto |
| `nome` | VARCHAR | Nome |
| `categoria` | VARCHAR | Categoria |
| `preco` | VARCHAR | Preço |
| `estoque` | VARCHAR | Quantidade disponível |
| `unidade` | VARCHAR | Unidade da confeitaria |
| `descricao` | TEXT | Descrição |
| `rendimento` | VARCHAR | Rendimento |
| `alergenos` | VARCHAR | Principais alérgenos |
| `imagem` | VARCHAR | Caminho da imagem |
| `ativo` | BOOLEAN | Define se o produto está ativo |

### Tabela `pedidos`

Guarda os pedidos feitos pelo delivery e pela página de bolo personalizado.

| Campo | Tipo | Uso |
| --- | --- | --- |
| `id` | SERIAL / PK | Identificação do pedido |
| `cliente` | VARCHAR | Nome do cliente |
| `email` | VARCHAR | E-mail |
| `telefone` | VARCHAR | Telefone |
| `produto` | TEXT | Produto ou descrição do bolo |
| `quantidade` | VARCHAR | Quantidade |
| `unidade` | VARCHAR | Unidade escolhida |
| `tipo_recebimento` | VARCHAR | Delivery, Retirada ou orçamento |
| `data_retirada` | DATE | Data escolhida |
| `periodo` | VARCHAR | Manhã, Tarde ou Noite |
| `observacao` | TEXT | Observações |
| `status` | VARCHAR | Situação do pedido |
| `total` | VARCHAR | Valor total |

### Tabela `usuarios`

Guarda o acesso à área administrativa.

| Campo | Tipo | Uso |
| --- | --- | --- |
| `id` | SERIAL / PK | Identificação |
| `email` | VARCHAR | E-mail de acesso |
| `senha` | VARCHAR | Senha usada no login |

### Operações SQL utilizadas

O sistema utiliza:

```sql
INSERT
SELECT
UPDATE
DELETE
```

Nos produtos, essas quatro operações formam o CRUD completo.

---

## 7. Organização do código

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
│   ├── pedidos.php
│   ├── produto-cadastrar.php
│   ├── produto-listar.php
│   ├── produto-consultar.php
│   ├── produto-atualizar.php
│   ├── produto-excluir.php
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
    └── imagens usadas no site
```

### Função de cada parte

| Parte | Função |
| --- | --- |
| Arquivos `.php` da raiz | Páginas usadas pelo cliente |
| `app/` | Área administrativa, CRUD, pedidos e relatório |
| `login/` | Login, logout e verificação de sessão |
| `includes/functions.php` | Funções e comandos de banco |
| `includes/header.php` | Cabeçalho do site público |
| `includes/header_admin.php` | Cabeçalho da administração |
| `includes/footer.php` | Rodapé reutilizado |
| `database/connect.php` | Conexão com PostgreSQL |
| `database/dados.pgsql` | Estrutura, dados e comandos SQL de teste |
| `style/style.css` | Estilo visual |
| `imagens/` | Imagens da identidade visual e dos produtos |

---

## 8. Como rodar

### Requisitos

Para executar o projeto é necessário ter:

- PHP com suporte a PDO PostgreSQL (`pdo_pgsql`);
- PostgreSQL;
- navegador;
- os arquivos do projeto.

### Passo 1: banco de dados

Crie um banco chamado:

```text
elis_patisserie
```

O arquivo:

```text
database/dados.pgsql
```

contém os `CREATE TABLE`, `INSERT`, `SELECT`, `UPDATE` e `DELETE` usados no projeto.

Os comandos de criação e os dados de exemplo estão comentados com `--`. Em um banco novo, utilize os blocos necessários de criação e inserção de acordo com o ambiente em que o projeto será executado.

### Passo 2: configurar a conexão

Abra:

```text
database/connect.php
```

e configure os dados do seu PostgreSQL:

```php
$host = "SEU_HOST";
$dbname = "elis_patisserie";
$user = "SEU_USUARIO";
$pass = "SUA_SENHA";
```

**Não publique uma senha real no GitHub.**

### Passo 3: garantir o acesso administrativo

A tabela `usuarios` precisa ter pelo menos um usuário cadastrado para que seja possível entrar pela página de login.

No arquivo `database/dados.pgsql` existe um exemplo de `INSERT INTO usuarios` usado durante o desenvolvimento. Ao compartilhar o projeto, utilize credenciais próprias e não publique senhas reais.

### Passo 4: iniciar o servidor

Os caminhos do projeto usam `/elis-patisserie/`. Por isso, com o servidor embutido do PHP, abra o terminal **na pasta que contém a pasta `elis-patisserie`** e execute:

```bash
php -S localhost:8000
```

Depois abra:

```text
http://localhost:8000/elis-patisserie/
```

### Passo 5: entrar no site

A página inicial é:

```text
http://localhost:8000/elis-patisserie/index.php
```

O acesso administrativo é feito pela página:

```text
http://localhost:8000/elis-patisserie/login/login.php
```

Depois do login, o sistema direciona o administrador para a listagem de produtos.

---

## Resumo do CRUD

| Operação | SQL | Página |
| --- | --- | --- |
| **Create** | `INSERT INTO produtos` | `app/produto-cadastrar.php` |
| **Read** | `SELECT` | `app/produto-listar.php` e `app/produto-consultar.php` |
| **Update** | `UPDATE produtos` | `app/produto-atualizar.php` |
| **Delete** | `DELETE FROM produtos` | `app/produto-excluir.php` |

---

## Identidade da Elis Patisserie

O visual do projeto foi inspirado em anúncios e confeitarias das décadas de **1950, 1960 e 1970**, utilizando tons pastel, elementos retrô, laços e referências à confeitaria francesa.

As principais cores do projeto são:

- azul pastel;
- rosa pastel;
- creme;
- amarelo claro;
- tons de vinho/vermelho nos detalhes.

A proposta é unir a delicadeza da confeitaria francesa com uma identidade visual nostálgica e acolhedora.
