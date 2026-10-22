# Elis Patisserie

>*Aluna: Elis Perin*<br>
>*Professor(es): Jorge, Morato, Platini*<br>
>*Turma: I1D35*<br>

## *Contextualização*

### 1. Introdução

Com o crescimento das compras e dos pedidos feitos pela internet, muitas confeitarias passaram a precisar de sites que não sirvam somente para divulgar produtos, mas também para organizar informações, pedidos e o próprio catálogo.

O projeto **Elis Patisserie** nasce dessa ideia. Trata-se de um sistema web para uma confeitaria inspirada na pâtisserie francesa e na estética retrô dos anos 50, 60 e 70.

O site possui uma parte pública, onde o cliente pode conhecer a confeitaria, consultar os produtos, usar ferramentas como a calculadora e o Monte seu Bolo e fazer pedidos. Também possui uma parte administrativa, onde é possível gerenciar os produtos, acompanhar pedidos e visualizar relatórios.

### 2. Razão de eu escolher uma Confeitaria

Eu escolhi desenvolver uma confeitaria porque queria criar um projeto que juntasse uma parte visual mais criativa com as funcionalidades de um sistema.

Além de trabalhar com banco de dados, formulários e CRUD, eu também queria criar uma identidade visual própria. Por isso, escolhi uma confeitaria com referências francesas e um estilo retrô, usando tons pastel, imagens inspiradas em anúncios antigos e elementos ligados à pâtisserie.

Uma confeitaria que faz o controle dos produtos e pedidos de forma manual pode ter problemas como:

- Dificuldade em manter o cardápio atualizado;<br>
- Falta de controle sobre produtos ativos e inativos;<br>
- Dificuldade em acompanhar os pedidos recebidos;<br>
- Falta de organização dos status dos pedidos;<br>
- Dificuldade em consultar o estoque dos produtos;<br>
- Ausência de um relatório geral das informações;<br>
- Informações espalhadas em diferentes anotações.

A Elis Patisserie foi criada para reunir essas informações em um único sistema.

### 3. Objetivos

#### 3.1 Objetivo Geral

Desenvolver um sistema web para uma confeitaria, permitindo a apresentação da marca e dos produtos para os clientes e facilitando o gerenciamento de produtos e pedidos pela parte administrativa.

#### 3.2 Objetivos Específicos

- Criar uma identidade visual própria para a confeitaria;
- Exibir os produtos cadastrados no PostgreSQL;
- Permitir filtrar o cardápio por categoria e unidade;
- Separar produtos por categorias como Kits e Casamentos;
- Criar uma calculadora de bolo e docinhos;
- Permitir a montagem de um bolo personalizado;
- Registrar pedidos de delivery e retirada;
- Calcular automaticamente o valor de alguns pedidos;
- Criar uma área administrativa protegida por login;
- Implementar o CRUD completo de produtos;
- Permitir a atualização do status dos pedidos;
- Criar um relatório geral de produtos e pedidos;
- Organizar o código em diferentes pastas e arquivos;
- Integrar PHP com PostgreSQL usando PDO.

### 4. Tecnologias Utilizadas

| Tecnologia | Finalidade |
|----------|----------|
| PHP | Linguagem de programação usada no back-end, formulários, cálculos, sessões e regras do sistema |
| PostgreSQL / PSQL | Armazenamento dos produtos, pedidos e usuários administrativos |
| PDO | Comunicação entre o PHP e o PostgreSQL |
| HTML5 | Construção da estrutura das páginas e formulários |
| CSS | Estilização das páginas e identidade visual retrô |
| Visual Studio Code | Ambiente usado para desenvolver e organizar os arquivos |
| MobaXterm / ambiente PostgreSQL | Acesso ao servidor e ao banco utilizado durante as aulas |

--------------------------------------------

## *Requisitos do Sistema*

### *Requisitos Funcionais*

| Requisitos | Explicação |
|----------|----------|
| RF01 | O sistema deve exibir uma página inicial apresentando a Elis Patisserie e seus produtos em destaque. |
| RF02 | O sistema deve exibir no máximo quatro produtos ativos como destaques na página inicial. |
| RF03 | O sistema deve permitir consultar os produtos cadastrados no cardápio. |
| RF04 | O sistema deve permitir filtrar os produtos por categoria. |
| RF05 | O sistema deve permitir filtrar os produtos por unidade. |
| RF06 | O sistema deve esconder produtos inativos da parte pública. |
| RF07 | O sistema deve exibir somente produtos da categoria Kits Comemorativos na página de Kits. |
| RF08 | O sistema deve exibir somente produtos da categoria Casamentos na página de Casamentos. |
| RF09 | O sistema deve permitir informar o número de convidados e calcular uma sugestão de peso de bolo e quantidade de docinhos. |
| RF10 | O sistema deve permitir montar um bolo personalizado escolhendo peso, massa, recheio, cobertura e decoração. |
| RF11 | O sistema deve calcular o valor do bolo personalizado de acordo com o peso escolhido. |
| RF12 | O sistema deve cadastrar o bolo personalizado como um pedido no banco. |
| RF13 | O sistema deve permitir selecionar um produto ativo para Delivery ou Retirada. |
| RF14 | O sistema deve calcular o total do pedido usando o preço do produto e a quantidade. |
| RF15 | O sistema deve cadastrar pedidos na tabela `pedidos`. |
| RF16 | O sistema deve exibir informações das unidades de Americana-SP, Leblon-RJ e Monte Verde-MG. |
| RF17 | O sistema deve possuir páginas de Sobre, FAQ e Contato. |
| RF18 | O sistema deve permitir login e logout do administrador. |
| RF19 | O sistema deve bloquear as páginas administrativas quando o usuário não estiver logado. |
| RF20 | O sistema deve permitir o cadastro de produtos. |
| RF21 | O sistema deve permitir a listagem dos produtos cadastrados. |
| RF22 | O sistema deve permitir consultar um produto pelo ID. |
| RF23 | O sistema deve permitir atualizar um produto pelo ID. |
| RF24 | O sistema deve permitir excluir um produto pelo ID. |
| RF25 | O sistema deve listar os pedidos cadastrados. |
| RF26 | O sistema deve permitir alterar o status de um pedido pelo ID. |
| RF27 | O sistema deve gerar um relatório com informações sobre produtos, estoque e pedidos. |
| RF28 | O sistema deve exibir a quantidade de produtos cadastrados no relatório. |
| RF29 | O sistema deve exibir o total em estoque e o preço médio dos produtos. |
| RF30 | O sistema deve exibir a quantidade e o valor total dos pedidos cadastrados. |

### *Requisitos Não Funcionais*

| Requisitos | Explicação |
|----------|----------|
| RNF01 | O sistema deve ser desenvolvido em PHP e utilizar PostgreSQL como banco de dados. |
| RNF02 | A comunicação entre PHP e PostgreSQL deve ser realizada com PDO. |
| RNF03 | Os comandos de banco que recebem valores devem utilizar `prepare()` e `bindParam()`. |
| RNF04 | O acesso à área administrativa deve ser controlado por sessão. |
| RNF05 | A estrutura do projeto deve ser separada em páginas públicas, administração, login, banco, funções, imagens e estilos. |
| RNF06 | As partes repetidas do site, como cabeçalho e rodapé, devem ser reutilizadas por meio de arquivos em `includes/`. |
| RNF07 | A interface deve manter uma identidade visual coerente com a proposta retrô da Elis Patisserie. |
| RNF08 | O site deve utilizar imagens adaptáveis e configuração de `viewport` para melhorar a visualização em diferentes tamanhos de tela. |
| RNF09 | Os formulários devem indicar os campos obrigatórios por meio de `required`. |
| RNF10 | IDs e quantidades que não podem ser menores que 1 devem utilizar valores mínimos nos formulários. |
| RNF11 | Os dados cadastrados devem permanecer salvos no PostgreSQL mesmo depois de o navegador ser fechado. |
| RNF12 | O código deve possuir comentários simples que ajudem na leitura e na apresentação. |
| RNF13 | O sistema deve funcionar em navegadores atuais que consigam acessar um servidor PHP. |
| RNF14 | O projeto deve ser organizado para facilitar alterações futuras. |

### Observações e limitações do projeto

Este é um projeto escolar e algumas partes foram mantidas de forma simples, de acordo com os conteúdos trabalhados durante o desenvolvimento.

Na versão atual:

- A senha administrativa é comparada diretamente com a senha salva no banco;
- Não existe cadastro público de clientes;
- Não existe carrinho;
- Não existe pagamento online;
- O caminho da imagem do produto é informado como texto;
- Alguns campos numéricos foram armazenados como `VARCHAR`;
- As tabelas não possuem chaves estrangeiras entre produtos e pedidos;
- Não existe integração real com empresa de entrega.

Em uma aplicação real, essas partes poderiam receber melhorias de segurança e estrutura.

---

## *Organização do código*

```texto
elis-patisserie/
├── index.php                  *página inicial da confeitaria*
├── cardapio.php               *listagem e filtro dos produtos*
├── kits.php                   *produtos da categoria Kits Comemorativos*
├── casamentos.php             *produtos da categoria Casamentos*
├── calculadora.php            *cálculo de bolo e docinhos por convidados*
├── monte-bolo.php             *montagem e cadastro de bolo personalizado*
├── delivery.php               *cadastro de pedidos de delivery ou retirada*
├── unidades.php               *informações das unidades da confeitaria*
├── sobre.php                  *história e identidade da Elis Patisserie*
├── faq.php                    *perguntas frequentes*
├── contato.php                *formas de contato e horários*
├── README.md                  *documentação principal do projeto*
├── documentacao.md            *documentação seguindo o modelo escolar*
│
├── app/                       *área administrativa*
│   ├── produto-cadastrar.php  *cadastro de produto - CREATE*
│   ├── produto-listar.php     *listagem de produtos - READ*
│   ├── produto-consultar.php  *consulta de produto pelo ID - READ*
│   ├── produto-atualizar.php  *atualização de produto - UPDATE*
│   ├── produto-excluir.php    *exclusão de produto - DELETE*
│   ├── pedidos.php            *listagem e atualização do status dos pedidos*
│   └── relatorio.php          *relatório geral do sistema*
│
├── database/                  *camada de persistência*
│   ├── connect.php            *conexão PDO com o PostgreSQL*
│   └── dados.pgsql            *criação das tabelas, inserts e testes SQL*
│
├── includes/                  *arquivos reutilizados em várias páginas*
│   ├── functions.php          *funções de produtos, pedidos e usuário*
│   ├── header.php             *cabeçalho e menu da parte pública*
│   ├── header_admin.php       *cabeçalho da área administrativa*
│   └── footer.php             *rodapé compartilhado*
│
├── login/                     *controle de autenticação*
│   ├── login.php              *login do administrador*
│   ├── logout.php             *encerra a sessão*
│   └── verifica_user.php      *verifica se existe sessão*
│
├── style/                     *arquivos de estilização*
│   └── style.css              *layout e identidade visual do site*
│
└── imagens/                   *imagens de capas, produtos e identidade visual*
```

### Organização das páginas por tipo

| Tipo | Arquivos |
|---|---|
| Páginas públicas com banco | `index.php`, `cardapio.php`, `kits.php`, `casamentos.php`, `monte-bolo.php`, `delivery.php` |
| Páginas públicas sem banco | `calculadora.php`, `unidades.php`, `sobre.php`, `faq.php`, `contato.php` |
| Área administrativa | arquivos da pasta `app/` |
| Login e sessão | arquivos da pasta `login/` |
| Funções reutilizadas | `includes/functions.php` |
| Conexão com banco | `database/connect.php` |
| Estilo | `style/style.css` |

### Principais funções do projeto

| Função | O que faz |
|---|---|
| `cadastrar_produto()` | Cadastra um novo produto no PostgreSQL |
| `listar_produtos()` | Busca todos os produtos |
| `listar_produtos_ativos()` | Busca somente produtos ativos |
| `listar_produtos_categoria()` | Busca produtos de uma determinada categoria |
| `consultar_produto()` | Busca um produto pelo ID |
| `atualizar_produto()` | Atualiza os dados de um produto |
| `deletar_produto()` | Exclui um produto pelo ID |
| `cadastrar_pedido()` | Insere um pedido no banco |
| `listar_pedidos()` | Lista os pedidos cadastrados |
| `atualizar_status_pedido()` | Atualiza o status de um pedido |
| `consulta_user()` | Procura um usuário administrativo pelo e-mail |

---

## *Como entrar no meu projeto*

### 1. Preparar a aplicação

#### Pré-requisitos

- PHP instalado e disponível no `Path` do Windows;
- Extensão `pdo_pgsql` habilitada no PHP;
- PostgreSQL instalado e em execução no ambiente utilizado;
- VS Code para abrir e editar os arquivos;
- MobaXterm, caso o banco esteja em um servidor acessado pela rede da escola;
- Git, caso o projeto seja obtido pelo GitHub;
- Navegador web.

#### 1.1. Obter o projeto

Quando o projeto estiver no GitHub, no PowerShell ou terminal do VS Code:

```powershell
git clone URL_DO_SEU_REPOSITORIO elis-patisserie
```

Depois entre na pasta:

```powershell
Set-Location .\elis-patisserie
```

Se os arquivos já estiverem no computador, basta abrir no VS Code a pasta:

```text
elis-patisserie
```

A pasta deve conter arquivos como:

```text
index.php
cardapio.php
database/
includes/
app/
login/
style/
imagens/
```

#### 1.2. Conferir os caminhos do projeto

O projeto utiliza caminhos que incluem:

```text
/elis-patisserie/
```

Por isso, é importante manter a pasta principal com o nome:

```text
elis-patisserie
```

O arquivo de conexão fica em:

```text
database/connect.php
```

As funções do sistema carregam essa conexão pelo arquivo:

```text
includes/functions.php
```

---

### 2. Configurar banco

O projeto utiliza um banco PostgreSQL chamado:

```text
elis_patisserie
```

As tabelas principais são:

```text
produtos
pedidos
usuarios
```

O arquivo:

```text
database/dados.pgsql
```

possui os comandos utilizados para criar as tabelas e inserir registros de exemplo.

#### 2.1. Criar ou selecionar o banco

No ambiente PostgreSQL usado na escola, abra o banco:

```text
elis_patisserie
```

Se estiver usando o PostgreSQL Explorer do VS Code:

1. Abra o PostgreSQL Explorer;
2. Selecione a conexão;
3. Selecione o banco correto;
4. Abra um **New Query**;
5. Execute os comandos necessários do arquivo `database/dados.pgsql`.

Não é necessário usar `\c` dentro do script.

#### 2.2. Criar as tabelas

No arquivo `database/dados.pgsql`, localize os comandos:

```sql
CREATE TABLE produtos (...);
```

```sql
CREATE TABLE pedidos (...);
```

```sql
CREATE TABLE usuarios (...);
```

Execute os comandos no banco `elis_patisserie`.

Depois confira:

```sql
SELECT * FROM produtos;
```

```sql
SELECT * FROM pedidos;
```

```sql
SELECT * FROM usuarios;
```

#### 2.3. Inserir os dados de exemplo

O arquivo `database/dados.pgsql` também possui vários:

```sql
INSERT INTO produtos
```

que foram usados para montar o cardápio da Elis Patisserie.

Execute os inserts necessários caso esteja preparando um banco vazio.

Para conferir:

```sql
SELECT * FROM produtos;
```

---

### 3. Conectar ao banco e abrir no localhost

#### 3.1. Configurar o arquivo de conexão

No VS Code, abra:

```text
database/connect.php
```

A estrutura da conexão é:

```php
<?php

$host = "SEU_HOST";
$dbname = "elis_patisserie";
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
```

Altere:

```text
SEU_HOST
SEU_USUARIO
SUA_SENHA
```

de acordo com o PostgreSQL utilizado.

O usuário da aplicação deve ser um usuário próprio para acessar esse banco, e não é recomendado utilizar o superusuário administrativo `postgres` como usuário permanente do site.

Antes de publicar o projeto no GitHub, retire qualquer senha real desse arquivo.

#### 3.2. Iniciar o PHP pelo PowerShell

Como o projeto utiliza caminhos com `/elis-patisserie/`, abra o PowerShell na pasta **que contém** a pasta `elis-patisserie`.

Exemplo:

```text
projetos/
└── elis-patisserie/
```

No terminal dentro de `projetos/`, execute:

```powershell
php -S localhost:8000
```

Depois abra:

```text
http://localhost:8000/elis-patisserie/
```

A página inicial também pode ser acessada por:

```text
http://localhost:8000/elis-patisserie/index.php
```

Deixe o PowerShell aberto enquanto estiver utilizando o site.

#### 3.3. Entrar na área administrativa e conferir

A área administrativa fica em:

```text
http://localhost:8000/elis-patisserie/login/login.php
```

A tabela `usuarios` precisa possuir pelo menos um usuário cadastrado.

Para conferir:

```sql
SELECT * FROM usuarios;
```

Depois:

1. Abra `/login/login.php`;
2. Digite o e-mail e a senha cadastrados;
3. O sistema deve abrir `/app/produto-listar.php`;
4. Acesse `Cadastrar Produto` e crie um produto de teste;
5. Confira o produto na listagem;
6. Consulte o produto pelo ID;
7. Atualize alguma informação;
8. Exclua o produto de teste;
9. Acesse `Pedidos`;
10. Altere o status de algum pedido;
11. Abra `Relatório` e confira os dados.

Esse processo permite conferir o CRUD completo:

```text
CREATE  → cadastrar
READ    → listar / consultar
UPDATE  → atualizar
DELETE  → excluir
```

#### 3.4. Conferir os pedidos

Faça um pedido pelo:

```text
delivery.php
```

ou pelo:

```text
monte-bolo.php
```

Depois confira no banco:

```sql
SELECT * FROM pedidos;
```

Na administração, abra:

```text
app/pedidos.php
```

e altere o status do pedido.

Depois rode novamente:

```sql
SELECT * FROM pedidos;
```

para conferir a alteração.

#### 3.5. Problemas comuns

| Problema | O que conferir |
|---|---|
| `php` não é reconhecido | PHP instalado e disponível no `Path` do Windows |
| `could not find driver` | Extensão `pdo_pgsql` habilitada no PHP |
| `Erro: SQLSTATE...` | Host, banco, usuário e senha em `database/connect.php` |
| Conexão recusada | PostgreSQL ligado e host/IP correto |
| Falha de autenticação | Usuário ou senha do banco incorretos |
| `relation "produtos" does not exist` | Tabela `produtos` criada no banco correto |
| `relation "pedidos" does not exist` | Tabela `pedidos` criada no banco correto |
| `relation "usuarios" does not exist` | Tabela `usuarios` criada no banco correto |
| Usuário ou senha inválidos | Registro existente em `usuarios` |
| Produto não aparece no site | Campo `ativo`, categoria e unidade do produto |
| Kit não aparece | Categoria precisa ser `Kits Comemorativos` e o produto deve estar ativo |
| Produto de casamento não aparece | Categoria precisa ser `Casamentos` e o produto deve estar ativo |
| Pedido não é cadastrado | Unidade selecionada, formulário e conexão com o banco |
| Alteração de status não aparece | ID do pedido e conexão usada no `New Query` |
| Imagem não aparece | Caminho salvo no campo `imagem` e arquivo existente em `imagens/` |
| CSS não carrega | Nome da pasta deve continuar sendo `elis-patisserie` |
| Página do admin volta para o login | Sessão não foi criada; faça login novamente |
| Consulta mostra dados diferentes | Confirme se o `New Query` está usando o banco `elis_patisserie` |

Para encerrar o servidor PHP, pressione:

```text
Ctrl + C
```

Os produtos e pedidos continuam salvos no PostgreSQL.

---

## *Resumo do funcionamento*

O caminho principal das páginas que usam banco é:

```text
Formulário HTML
      ↓
$_POST
      ↓
Página PHP
      ↓
Função em includes/functions.php
      ↓
prepare()
      ↓
bindParam()
      ↓
execute()
      ↓
PostgreSQL
```

O CRUD da tabela `produtos` é:

```text
CREATE  → INSERT
READ    → SELECT
UPDATE  → UPDATE
DELETE  → DELETE
```

Os pedidos usam:

```text
INSERT  → cadastrar pedido
SELECT  → listar pedidos
UPDATE  → alterar status
```

O projeto final reúne a parte visual de uma confeitaria com as principais funções estudadas durante o desenvolvimento: formulários, PHP, sessões, funções, PDO, PostgreSQL e CRUD.
