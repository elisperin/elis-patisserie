# Elis Patisserie

Site de uma confeitaria inspirada na **confeitaria francesa** e na estética **retrô dos anos 50, 60 e 70**, feito em **PHP**, **PostgreSQL**, **HTML** e **CSS**.

O cliente navega pelas páginas da confeitaria, consulta o cardápio, filtra os produtos, vê kits e opções para casamentos, calcula uma sugestão de bolo e docinhos, monta um bolo personalizado e envia pedidos para delivery ou retirada. O administrador entra por uma área protegida por login e pode cadastrar, consultar, atualizar e excluir produtos (**CRUD completo**), acompanhar os pedidos, mudar seus status e consultar um relatório geral.

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

A **Elis Patisserie** é uma confeitaria fictícia com inspiração na pâtisserie francesa e em anúncios, embalagens e lojas das décadas de 1950, 1960 e 1970.

A proposta do site é apresentar a marca e os produtos para o cliente, mas também funcionar como um pequeno sistema de confeitaria, com produtos e pedidos salvos no PostgreSQL e uma área administrativa para controlar essas informações.

O sistema tem dois tipos principais de acesso:

| Usuário | O que faz |
|---|---|
| **Visitante / cliente** | Vê a página inicial, consulta o cardápio, usa os filtros, vê kits e opções de casamento, usa a calculadora, monta um bolo, faz pedidos, consulta unidades, FAQ, informações da marca e contato. |
| **Administrador** | Entra por uma tela de login, acessa uma área protegida, faz o CRUD completo dos produtos, consulta pedidos, atualiza o status deles e vê o relatório geral. |

### Principais funcionalidades

- **Página inicial** com apresentação da Elis Patisserie e até quatro produtos ativos em destaque.
- **Cardápio** com todos os produtos ativos e filtros por categoria e unidade.
- **Kits** que mostram somente os produtos da categoria `Kits Comemorativos`.
- **Casamentos** que mostram somente os produtos da categoria `Casamentos`.
- **Calculadora** que sugere peso de bolo e quantidade de docinhos de acordo com o número de convidados.
- **Monte seu bolo** com escolha de peso, massa, recheio, cobertura, decoração, unidade, data e período.
- **Cálculo do bolo personalizado** usando o valor de R$ 120,00 por kg.
- **Delivery e retirada** com seleção de produto, quantidade, unidade, data, período e forma de recebimento.
- **Cálculo do total do pedido** com base no preço do produto e na quantidade.
- **Pedidos salvos no PostgreSQL**.
- **Página de unidades** com Americana-SP, Leblon-RJ e Monte Verde-MG.
- **Página Sobre**, **FAQ** e **Contato**.
- **Área administrativa** separada da parte pública.
- **Login com sessão** para proteger as páginas administrativas.
- **CRUD completo de produtos**: cadastrar, listar, consultar, atualizar e excluir.
- **Controle de produto ativo/inativo**.
- **Listagem de pedidos**.
- **Atualização do status dos pedidos**.
- **Relatório geral** com quantidade de produtos, estoque, média dos preços, quantidade de pedidos e valor total dos pedidos.
- **Cabeçalho e rodapé reutilizados** em várias páginas.
- **Funções de banco centralizadas** em `includes/functions.php`.

### Tecnologias

| Camada | Tecnologia | Uso |
|---|---|---|
| Backend | PHP | Recebe formulários, faz cálculos, trabalha com sessão e chama as funções do banco |
| Banco | PostgreSQL | Guarda produtos, pedidos e usuários administrativos |
| Conexão | PDO | Faz a comunicação entre PHP e PostgreSQL |
| Front-end | HTML | Estrutura as páginas, formulários, tabelas, menus e conteúdos |
| Estilo | CSS | Define cores, bordas, tamanhos, botões, tabelas e identidade visual retrô |
| Servidor local | Servidor embutido do PHP | Permite abrir o projeto em `localhost` durante o desenvolvimento |

O projeto foi desenvolvido sem framework e sem JavaScript.

---

## 2. Requisitos funcionais

| Código | Requisito | Quem usa | Onde |
|---|---|---|---|
| **RF01** | Exibir a página inicial com a identidade visual e a apresentação da Elis Patisserie. | Todos | `index.php` |
| **RF02** | Buscar produtos ativos no banco para a página inicial. | Todos | `index.php`, `includes/functions.php` |
| **RF03** | Mostrar no máximo quatro produtos ativos na seção de mais pedidos. | Todos | `index.php` |
| **RF04** | Listar os produtos cadastrados no cardápio. | Todos | `cardapio.php` |
| **RF05** | Não mostrar produtos inativos no cardápio. | Todos | `cardapio.php` |
| **RF06** | Filtrar produtos pela categoria escolhida. | Todos | `cardapio.php` |
| **RF07** | Filtrar produtos pela unidade escolhida. | Todos | `cardapio.php` |
| **RF08** | Permitir usar categoria e unidade ao mesmo tempo no filtro. | Todos | `cardapio.php` |
| **RF09** | Mostrar nome, imagem, descrição, preço, rendimento, alérgenos e unidade dos produtos. | Todos | `cardapio.php`, `kits.php`, `casamentos.php` |
| **RF10** | Listar somente produtos da categoria `Kits Comemorativos`. | Todos | `kits.php` |
| **RF11** | Mostrar somente kits que estejam ativos. | Todos | `kits.php` |
| **RF12** | Levar o cliente da página de kits para o Delivery. | Todos | `kits.php` |
| **RF13** | Listar somente produtos da categoria `Casamentos`. | Todos | `casamentos.php` |
| **RF14** | Mostrar somente produtos de casamento que estejam ativos. | Todos | `casamentos.php` |
| **RF15** | Levar o cliente da página de casamentos para a página de contato. | Todos | `casamentos.php` |
| **RF16** | Receber o número de convidados e calcular uma sugestão de bolo e docinhos. | Todos | `calculadora.php` |
| **RF17** | Mostrar uma sugestão diferente de acordo com as faixas de convidados. | Todos | `calculadora.php` |
| **RF18** | Recomendar orçamento personalizado quando houver mais de 60 convidados. | Todos | `calculadora.php` |
| **RF19** | Permitir que o cliente informe nome, e-mail e telefone para montar um bolo. | Todos | `monte-bolo.php` |
| **RF20** | Permitir escolher peso, massa, recheio, cobertura e decoração do bolo. | Todos | `monte-bolo.php` |
| **RF21** | Permitir escolher unidade, data e período para o bolo personalizado. | Todos | `monte-bolo.php` |
| **RF22** | Calcular o valor do bolo multiplicando o peso por R$ 120,00. | Todos | `monte-bolo.php` |
| **RF23** | Montar uma descrição do bolo com as escolhas feitas pelo cliente. | Todos | `monte-bolo.php` |
| **RF24** | Cadastrar o pedido de bolo personalizado na tabela `pedidos`. | Todos | `monte-bolo.php`, `includes/functions.php` |
| **RF25** | Listar no Delivery somente produtos ativos. | Todos | `delivery.php` |
| **RF26** | Permitir escolher o produto pelo formulário do Delivery. | Todos | `delivery.php` |
| **RF27** | Permitir informar quantidade, unidade, forma de recebimento, data, período e observação. | Todos | `delivery.php` |
| **RF28** | Consultar no banco o produto escolhido pelo ID. | Todos | `delivery.php`, `includes/functions.php` |
| **RF29** | Conferir se a unidade escolhida corresponde à unidade cadastrada no produto. | Todos | `delivery.php` |
| **RF30** | Calcular o total do pedido multiplicando preço por quantidade. | Todos | `delivery.php` |
| **RF31** | Cadastrar o pedido de delivery ou retirada na tabela `pedidos`. | Todos | `delivery.php`, `includes/functions.php` |
| **RF32** | Mostrar uma mensagem com o produto e o valor total quando o pedido é cadastrado. | Todos | `delivery.php` |
| **RF33** | Permitir selecionar uma das três unidades da confeitaria. | Todos | `unidades.php` |
| **RF34** | Exibir as informações correspondentes à unidade selecionada. | Todos | `unidades.php` |
| **RF35** | Permitir ir da unidade para o cardápio ou para o pedido. | Todos | `unidades.php` |
| **RF36** | Apresentar informações sobre a história e a identidade da confeitaria. | Todos | `sobre.php` |
| **RF37** | Apresentar respostas para dúvidas frequentes. | Todos | `faq.php` |
| **RF38** | Exibir os meios de contato e horário de atendimento. | Todos | `contato.php` |
| **RF39** | Permitir login do administrador por e-mail e senha. | Administrador | `login/login.php` |
| **RF40** | Consultar o usuário administrativo pelo e-mail informado. | Administrador | `login/login.php`, `includes/functions.php` |
| **RF41** | Criar uma sessão depois de um login válido. | Administrador | `login/login.php` |
| **RF42** | Redirecionar o administrador para a listagem de produtos depois do login. | Administrador | `login/login.php` |
| **RF43** | Bloquear páginas administrativas quando não existir sessão. | Administrador | `login/verifica_user.php` |
| **RF44** | Permitir encerrar a sessão administrativa. | Administrador | `login/logout.php` |
| **RF45** | Cadastrar um produto com todas as informações necessárias. | Administrador | `app/produto-cadastrar.php` |
| **RF46** | Permitir definir se o produto está ativo ou inativo. | Administrador | `app/produto-cadastrar.php`, `app/produto-atualizar.php` |
| **RF47** | Listar todos os produtos cadastrados. | Administrador | `app/produto-listar.php` |
| **RF48** | Consultar um produto pelo ID. | Administrador | `app/produto-consultar.php` |
| **RF49** | Mostrar os dados do produto encontrado. | Administrador | `app/produto-consultar.php` |
| **RF50** | Atualizar os dados de um produto pelo ID. | Administrador | `app/produto-atualizar.php` |
| **RF51** | Excluir um produto pelo ID. | Administrador | `app/produto-excluir.php` |
| **RF52** | Listar todos os pedidos cadastrados. | Administrador | `app/pedidos.php` |
| **RF53** | Exibir cliente, produto, quantidade, unidade, data, status e total dos pedidos. | Administrador | `app/pedidos.php` |
| **RF54** | Permitir escolher um novo status para um pedido. | Administrador | `app/pedidos.php` |
| **RF55** | Atualizar somente o pedido correspondente ao ID informado. | Administrador | `app/pedidos.php`, `includes/functions.php` |
| **RF56** | Gerar um relatório usando produtos e pedidos cadastrados. | Administrador | `app/relatorio.php` |
| **RF57** | Contar a quantidade de produtos. | Administrador | `app/relatorio.php` |
| **RF58** | Somar o estoque de todos os produtos. | Administrador | `app/relatorio.php` |
| **RF59** | Calcular a média dos preços dos produtos. | Administrador | `app/relatorio.php` |
| **RF60** | Contar os pedidos cadastrados. | Administrador | `app/relatorio.php` |
| **RF61** | Somar os valores dos pedidos. | Administrador | `app/relatorio.php` |
| **RF62** | Exibir uma tabela com os produtos no relatório. | Administrador | `app/relatorio.php` |

---

## 3. Regras de negócio

| Código | Regra |
|---|---|
| **RN01** | A página inicial utiliza somente produtos que estejam com `ativo = true`. |
| **RN02** | A seção de produtos da página inicial mostra no máximo quatro registros. |
| **RN03** | Um produto inativo continua no banco, mas não aparece no cardápio público. |
| **RN04** | As categorias do sistema são `Bolos e Tortas`, `Confeitaria Fina`, `Sobremesas Individuais`, `Kits Comemorativos` e `Casamentos`. |
| **RN05** | As unidades disponíveis são `Americana - SP`, `Leblon - RJ` e `Monte Verde - MG`. |
| **RN06** | O filtro do cardápio pode ficar vazio; nesse caso, não limita os produtos por aquela opção. |
| **RN07** | Quando categoria e unidade são selecionadas, o produto precisa atender aos dois filtros para aparecer. |
| **RN08** | A página de Kits consulta a mesma tabela `produtos`, mas somente a categoria `Kits Comemorativos`. |
| **RN09** | A página de Casamentos consulta a mesma tabela `produtos`, mas somente a categoria `Casamentos`. |
| **RN10** | Kits e produtos de casamento também precisam estar ativos para aparecer. |
| **RN11** | A calculadora aceita no mínimo 1 convidado. |
| **RN12** | Para até 10 convidados, a sugestão é 1 kg de bolo e 40 docinhos. |
| **RN13** | Para até 20 convidados, a sugestão é 2 kg de bolo e 80 docinhos. |
| **RN14** | Para até 40 convidados, a sugestão é 4 kg de bolo e 160 docinhos. |
| **RN15** | Para até 60 convidados, a sugestão é 6 kg de bolo e 240 docinhos. |
| **RN16** | Acima de 60 convidados, o site recomenda orçamento personalizado. |
| **RN17** | Os pesos disponíveis no Monte seu bolo são 1 kg, 2 kg, 4 kg e 6 kg. |
| **RN18** | O valor do bolo personalizado é calculado usando R$ 120,00 por kg. |
| **RN19** | O pedido de bolo personalizado é salvo com quantidade `1`. |
| **RN20** | O tipo de recebimento do bolo personalizado é salvo como `Orçamento personalizado`. |
| **RN21** | A observação automática do bolo personalizado é `Bolo montado pelo cliente`. |
| **RN22** | O status inicial do bolo personalizado é `Aguardando orçamento`. |
| **RN23** | O Delivery lista apenas produtos ativos. |
| **RN24** | A quantidade mínima no Delivery é 1. |
| **RN25** | O cliente só consegue finalizar o pedido quando a unidade escolhida corresponde à unidade cadastrada para o produto. |
| **RN26** | O total do Delivery é calculado por `preço × quantidade`. |
| **RN27** | O status inicial de um pedido comum é `Recebido`. |
| **RN28** | Os status que o administrador pode selecionar são `Recebido`, `Em produção`, `Pronto` e `Finalizado`. |
| **RN29** | A atualização de status usa o ID para alterar somente o pedido escolhido. |
| **RN30** | O CRUD principal do projeto é feito na tabela `produtos`. |
| **RN31** | O cadastro de produto usa `INSERT`. |
| **RN32** | A listagem e a consulta de produto usam `SELECT`. |
| **RN33** | A atualização do produto usa `UPDATE` com `WHERE id = :id`. |
| **RN34** | A exclusão do produto usa `DELETE` com `WHERE id = :id`. |
| **RN35** | O ID é usado para identificar qual produto será consultado, atualizado ou excluído. |
| **RN36** | As páginas administrativas só podem continuar quando existe `$_SESSION['id']`. |
| **RN37** | Quando não existe sessão, o usuário é redirecionado para a tela de login. |
| **RN38** | O logout destrói a sessão e leva o usuário de volta ao login. |
| **RN39** | O relatório usa `SELECT` para buscar os dados e faz contagem, soma e média no PHP. |
| **RN40** | O preço médio só é calculado quando existe pelo menos um produto, evitando divisão por zero. |

---

## 4. Requisitos não funcionais

| Código | Categoria | Requisito | Como é atendido |
|---|---|---|---|
| **RNF01** | Organização | Separar as responsabilidades do projeto. | Páginas públicas ficam na raiz; administração em `app/`; login em `login/`; funções em `includes/`; banco em `database/`; estilos em `style/`; imagens em `imagens/`. |
| **RNF02** | Reutilização | Não repetir cabeçalho e rodapé em todas as páginas. | Uso de `include` para carregar `header.php`, `header_admin.php` e `footer.php`. |
| **RNF03** | Manutenibilidade | Centralizar as operações principais do banco. | As funções de produtos, pedidos e usuário ficam em `includes/functions.php`. |
| **RNF04** | Controle de acesso | Impedir que uma pessoa sem login use a área administrativa. | Todas as páginas administrativas carregam `login/verifica_user.php`. |
| **RNF05** | Persistência | Os dados não podem desaparecer quando o navegador fecha. | Produtos, pedidos e usuários são armazenados no PostgreSQL. |
| **RNF06** | Banco de dados | Fazer a conexão do PHP com PostgreSQL de forma centralizada. | `database/connect.php` cria uma conexão PDO usada pelas funções. |
| **RNF07** | Consultas | Separar o comando SQL dos valores recebidos. | Uso de `prepare()` e `bindParam()` nas operações com parâmetros. |
| **RNF08** | Usabilidade | Exigir dados obrigatórios nos formulários. | Uso do atributo `required` em campos necessários. |
| **RNF09** | Usabilidade | Evitar quantidades e IDs menores que 1. | Uso de `min="1"` nos campos correspondentes. |
| **RNF10** | Usabilidade | Permitir limpar alguns formulários. | Uso de `input type="reset"` nas telas que possuem essa opção. |
| **RNF11** | Identidade visual | Manter o mesmo estilo em todo o sistema. | As páginas usam `style/style.css` e as mesmas classes visuais. |
| **RNF12** | Identidade visual | Representar a proposta retrô da marca. | Uso de tons pastel, bordas, faixas decorativas, ilustrações e imagens inspiradas em anúncios antigos. |
| **RNF13** | Adaptação | Permitir melhor visualização em diferentes tamanhos de tela. | Uso de `meta viewport`, `max-width` e imagens com largura adaptável. |
| **RNF14** | Simplicidade | Usar uma estrutura compatível com o conteúdo trabalhado no projeto. | PHP, PostgreSQL, HTML e CSS, sem framework e sem JavaScript. |
| **RNF15** | Legibilidade | Facilitar a leitura dos arquivos. | Os principais blocos do PHP e do HTML possuem comentários explicando o que fazem. |
| **RNF16** | Compatibilidade | Rodar em navegador atual com PHP e PostgreSQL disponíveis. | Projeto executado por servidor PHP e conexão PDO PostgreSQL. |
| **RNF17** | Navegação | Manter acesso às páginas principais pelo cabeçalho público. | `includes/header.php` contém os links de navegação. |
| **RNF18** | Navegação administrativa | Manter as operações da administração em um cabeçalho próprio. | `includes/header_admin.php`. |

### Limitações didáticas

O projeto foi feito para fins escolares e utiliza soluções simples compatíveis com o conteúdo trabalhado durante o desenvolvimento.

Na versão atual:

- a senha do administrador é armazenada e comparada diretamente;
- não existe cadastro público de clientes;
- não existe carrinho;
- não existe pagamento online;
- não existe integração real com sistema de entrega;
- o caminho da imagem do produto é informado por texto no cadastro, em vez de upload de arquivo;
- alguns valores numéricos, como `preco`, `estoque`, `quantidade` e `total`, são armazenados como `VARCHAR`;
- as tabelas não utilizam chaves estrangeiras entre produtos e pedidos;
- o pedido guarda o nome ou a descrição do produto daquele momento;
- o projeto usa caminhos que dependem da pasta se chamar `elis-patisserie`.

### Segurança antes de publicar

O arquivo:

```text
database/connect.php
```

precisa ser revisado antes de o projeto ser enviado para um repositório público.

Nunca publique:

- senha real do PostgreSQL;
- usuário administrativo do banco com privilégios elevados;
- IP privado ou dados de acesso que não precisam ficar públicos.

Na versão entregue ao GitHub, deixe valores de exemplo, por exemplo:

```php
$host = "SEU_HOST";
$dbname = "elis_patisserie";
$user = "SEU_USUARIO";
$pass = "SUA_SENHA";
```

---

## 5. Fluxo de trabalho

### 5.1 Cliente

O cliente não precisa fazer login para usar a parte pública.

```text
 Página inicial
      │
      ├──────────────► Cardápio
      │                    │
      │                    ├─ escolhe categoria
      │                    ├─ escolhe unidade
      │                    ├─ PHP passa pelos produtos
      │                    └─ mostra somente os que atendem ao filtro
      │
      ├──────────────► Kits
      │                    │
      │                    └─ SELECT da categoria "Kits Comemorativos"
      │
      ├──────────────► Casamentos
      │                    │
      │                    └─ SELECT da categoria "Casamentos"
      │
      ├──────────────► Calculadora
      │                    │
      │                    ├─ informa convidados
      │                    ├─ PHP usa if / elseif
      │                    └─ mostra kg de bolo + quantidade de doces
      │
      ├──────────────► Monte seu bolo
      │                    │
      │                    ├─ informa dados pessoais
      │                    ├─ escolhe peso
      │                    ├─ escolhe massa
      │                    ├─ escolhe recheio
      │                    ├─ escolhe cobertura
      │                    ├─ escolhe decoração
      │                    ├─ escolhe unidade/data/período
      │                    ├─ total = kg × 120
      │                    └─ INSERT na tabela pedidos
      │
      ├──────────────► Delivery
      │                    │
      │                    ├─ SELECT dos produtos ativos
      │                    ├─ cliente escolhe produto
      │                    ├─ consulta o produto pelo ID
      │                    ├─ confere a unidade
      │                    ├─ total = preço × quantidade
      │                    └─ INSERT na tabela pedidos
      │
      ├──────────────► Unidades
      │                    │
      │                    └─ POST + if / elseif para mostrar a unidade
      │
      ├──────────────► Sobre
      ├──────────────► FAQ
      └──────────────► Contato
```

A parte pública mistura três tipos de página:

| Tipo | Exemplos | Como funciona |
|---|---|---|
| **Conteúdo fixo** | Sobre, FAQ, Contato | HTML + CSS + header/footer |
| **Lógica em PHP sem banco** | Calculadora, Unidades | Formulário `POST`, variáveis, `if` e `elseif` |
| **PHP com PostgreSQL** | Home, Cardápio, Kits, Casamentos, Monte seu bolo, Delivery | Funções em `includes/functions.php` fazem `SELECT` ou `INSERT` |

### 5.2 Administrador

O administrador entra por uma tela separada:

```text
 /login/login.php
        │
        ▼
 digita e-mail e senha
        │
        ▼
 consulta_user($conexao, email)
        │
        ▼
 SELECT id, email, senha
 FROM usuarios
 WHERE email = :email
        │
        ▼
 usuário foi encontrado?
      ┌─┴─┐
     não  sim
      │    │
      │    ▼
      │  compara e-mail e senha
      │    │
      │    ▼
      │  cria $_SESSION['id']
      │    │
      │    ▼
      │  redireciona para
      │  app/produto-listar.php
      │
      └─► mostra mensagem de erro
```

Depois do login, as páginas da pasta `app/` carregam:

```php
require_once __DIR__ . '/../login/verifica_user.php';
```

O arquivo verifica a sessão.

```text
 Página administrativa
        │
        ▼
 verifica_user.php
        │
        ▼
 existe $_SESSION['id']?
      ┌─┴─┐
     não  sim
      │    │
      ▼    ▼
   login  continua
```

As principais telas administrativas são:

| Tela | Fluxo |
|---|---|
| **Cadastrar produto** | Preenche formulário → POST → `cadastrar_produto()` → `INSERT INTO produtos` |
| **Produtos** | `listar_produtos()` → `SELECT` → `foreach` → tabela |
| **Consultar** | Digita ID → `consultar_produto()` → `SELECT ... WHERE id = :id` |
| **Atualizar** | Digita ID e novos dados → `atualizar_produto()` → `UPDATE ... WHERE id = :id` |
| **Excluir** | Digita ID → `deletar_produto()` → `DELETE ... WHERE id = :id` |
| **Pedidos** | `SELECT` de pedidos → tabela → ID + status → `UPDATE pedidos` |
| **Relatório** | Busca produtos e pedidos → percorre com `foreach` → calcula totais e média |
| **Sair** | Limpa a sessão → `session_destroy()` → volta para o login |

### 5.3 Como uma página funciona por dentro

As páginas que utilizam banco seguem um caminho parecido.

Exemplo: cadastro de produto.

```text
 Navegador
    │
    ▼
 app/produto-cadastrar.php
    │
    ├─ carrega includes/functions.php
    │       │
    │       └─ functions.php carrega database/connect.php
    │
    ├─ carrega login/verifica_user.php
    │       │
    │       └─ confere a sessão
    │
    ├─ mostra o formulário
    │
    └─ quando REQUEST_METHOD == "POST"
            │
            ▼
      lê os valores de $_POST
            │
            ▼
      cadastrar_produto(...)
            │
            ▼
      INSERT INTO produtos
            │
            ▼
      $conexao->prepare($sql)
            │
            ▼
      bindParam(...)
            │
            ▼
      execute()
            │
            ▼
        PostgreSQL
            │
            ▼
 "Produto cadastrado com sucesso!"
```

Outro exemplo: uma consulta pelo ID.

```text
 formulário
    │
    ▼
 $_POST['id']
    │
    ▼
 consultar_produto($conexao, id)
    │
    ▼
 SELECT * FROM produtos
 WHERE id = :id
    │
    ▼
 prepare()
    │
    ▼
 bindParam(":id", $id)
    │
    ▼
 execute()
    │
    ▼
 fetch(PDO::FETCH_ASSOC)
    │
    ▼
 produto volta para a página
    │
    ▼
 HTML mostra os dados
```

A maior parte da comunicação com o banco fica em:

```text
includes/functions.php
```

Isso evita colocar o mesmo SQL completo em todas as páginas.

### 5.4 Página inicial, cardápio e páginas de categoria

A página inicial busca:

```php
$destaques = listar_produtos_ativos($conexao);
```

A função executa:

```sql
SELECT * FROM produtos
WHERE ativo = true
ORDER BY nome;
```

Depois a Home percorre os resultados:

```php
foreach ($destaques as $produto)
```

e usa um contador para mostrar somente os quatro primeiros:

```php
$contador = 0;
```

```php
if ($contador < 4)
```

O Cardápio funciona de forma diferente: ele busca todos os produtos e faz os filtros no PHP.

```text
 listar_produtos()
        │
        ▼
 SELECT * FROM produtos
        │
        ▼
 foreach
        │
        ├─ ativo?
        ├─ categoria corresponde?
        └─ unidade corresponde?
                │
                ▼
            mostra produto
```

Kits e Casamentos usam a mesma função:

```php
listar_produtos_categoria($conexao, $categoria)
```

O que muda é o valor da categoria:

```text
Kits          → "Kits Comemorativos"
Casamentos    → "Casamentos"
```

Assim, o projeto reutiliza a mesma tabela `produtos` para vários tipos de produto.

---

## 6. Banco de dados

O projeto utiliza **PostgreSQL**.

A conexão usada pelo PHP fica em:

```text
database/connect.php
```

As funções que fazem as operações de banco ficam em:

```text
includes/functions.php
```

Os comandos utilizados para criar as tabelas, inserir dados e testar operações durante o desenvolvimento ficam registrados em:

```text
database/dados.pgsql
```

O arquivo `dados.pgsql` contém comandos de:

- `CREATE TABLE`;
- `INSERT`;
- `SELECT`;
- `UPDATE`;
- `DELETE`.

Grande parte deles está comentada com `--`, pois o arquivo também serve como registro dos testes feitos durante o desenvolvimento.

### Estrutura das tabelas

```text
 produtos                              pedidos                         usuarios
┌────────────────────┐           ┌────────────────────────┐       ┌──────────────────┐
│ id            PK   │           │ id                PK   │       │ id          PK   │
│ nome               │           │ cliente                 │       │ email            │
│ categoria          │           │ email                   │       │ senha            │
│ preco              │           │ telefone                │       └──────────────────┘
│ estoque            │           │ produto                 │
│ unidade            │           │ quantidade              │
│ descricao          │           │ unidade                 │
│ rendimento         │           │ tipo_recebimento        │
│ alergenos          │           │ data_retirada           │
│ imagem             │           │ periodo                 │
│ ativo              │           │ observacao              │
└────────────────────┘           │ status                  │
                                 │ total                   │
                                 └────────────────────────┘
```

Na estrutura atual, essas tabelas não possuem chaves estrangeiras entre si.

### Tabela `produtos`

Guarda o catálogo da confeitaria e é a tabela usada no CRUD principal.

| Campo | Tipo | Uso |
|---|---|---|
| `id` | `SERIAL PRIMARY KEY NOT NULL` | Identifica o produto |
| `nome` | `VARCHAR(80) NOT NULL` | Nome do produto |
| `categoria` | `VARCHAR(60) NOT NULL` | Categoria usada no cardápio, Kits e Casamentos |
| `preco` | `VARCHAR(20) NOT NULL` | Valor do produto |
| `estoque` | `VARCHAR(20) NOT NULL` | Quantidade disponível |
| `unidade` | `VARCHAR(60) NOT NULL` | Unidade associada ao produto |
| `descricao` | `TEXT` | Descrição apresentada ao cliente |
| `rendimento` | `VARCHAR(80)` | Quantidade de pessoas/unidades que rende |
| `alergenos` | `VARCHAR(120)` | Informação de alérgenos |
| `imagem` | `VARCHAR(100)` | Caminho da imagem no projeto |
| `ativo` | `BOOLEAN` | Define se o produto aparece na parte pública |

O arquivo `dados.pgsql` possui vários produtos de exemplo usados no site.

Entre as categorias existentes estão:

```text
Bolos e Tortas
Confeitaria Fina
Sobremesas Individuais
Kits Comemorativos
Casamentos
```

### Tabela `pedidos`

Guarda os pedidos vindos de:

```text
delivery.php
monte-bolo.php
```

| Campo | Tipo | Uso |
|---|---|---|
| `id` | `SERIAL PRIMARY KEY NOT NULL` | Identifica o pedido |
| `cliente` | `VARCHAR(100) NOT NULL` | Nome do cliente |
| `email` | `VARCHAR(100) NOT NULL` | E-mail informado |
| `telefone` | `VARCHAR(30) NOT NULL` | Telefone |
| `produto` | `TEXT NOT NULL` | Nome do produto ou descrição do bolo personalizado |
| `quantidade` | `VARCHAR(20) NOT NULL` | Quantidade solicitada |
| `unidade` | `VARCHAR(60) NOT NULL` | Unidade escolhida |
| `tipo_recebimento` | `VARCHAR(50) NOT NULL` | Delivery, Retirada ou Orçamento personalizado |
| `data_retirada` | `DATE` | Data do pedido/retirada |
| `periodo` | `VARCHAR(30)` | Manhã, tarde ou noite |
| `observacao` | `TEXT` | Informação adicional |
| `status` | `VARCHAR(50)` | Situação atual do pedido |
| `total` | `VARCHAR(30)` | Valor calculado |

Um pedido comum é cadastrado com:

```text
status = "Recebido"
```

Um bolo montado pelo cliente é cadastrado com:

```text
status = "Aguardando orçamento"
```

### Tabela `usuarios`

É usada somente para o login da área administrativa.

| Campo | Tipo | Uso |
|---|---|---|
| `id` | `SERIAL PRIMARY KEY NOT NULL` | Identifica o usuário |
| `email` | `VARCHAR(100) NOT NULL` | E-mail de login |
| `senha` | `VARCHAR(60) NOT NULL` | Senha usada na comparação do login |

A função:

```php
consulta_user($conexao, $email)
```

faz:

```sql
SELECT id, email, senha
FROM usuarios
WHERE email = :email;
```

### CRUD da tabela `produtos`

#### Create

```sql
INSERT INTO produtos
(nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo)
VALUES
(:nome, :categoria, :preco, :estoque, :unidade, :descricao, :rendimento, :alergenos, :imagem, :ativo);
```

#### Read - listar todos

```sql
SELECT * FROM produtos
ORDER BY id;
```

#### Read - somente ativos

```sql
SELECT * FROM produtos
WHERE ativo = true
ORDER BY nome;
```

#### Read - por categoria

```sql
SELECT * FROM produtos
WHERE categoria = :categoria
ORDER BY nome;
```

#### Read - por ID

```sql
SELECT * FROM produtos
WHERE id = :id;
```

#### Update

```sql
UPDATE produtos
SET nome = :nome,
    categoria = :categoria,
    preco = :preco,
    estoque = :estoque,
    unidade = :unidade,
    descricao = :descricao,
    rendimento = :rendimento,
    alergenos = :alergenos,
    imagem = :imagem,
    ativo = :ativo
WHERE id = :id;
```

#### Delete

```sql
DELETE FROM produtos
WHERE id = :id;
```

### Operações da tabela `pedidos`

Cadastrar:

```sql
INSERT INTO pedidos
(cliente, email, telefone, produto, quantidade, unidade, tipo_recebimento,
 data_retirada, periodo, observacao, status, total)
VALUES
(:cliente, :email, :telefone, :produto, :quantidade, :unidade, :tipo_recebimento,
 :data_retirada, :periodo, :observacao, :status, :total);
```

Listar:

```sql
SELECT * FROM pedidos
ORDER BY id;
```

Atualizar o status:

```sql
UPDATE pedidos
SET status = :status
WHERE id = :id;
```

### Por que o `WHERE` é importante

Em comandos como:

```sql
UPDATE produtos ... WHERE id = :id;
```

e:

```sql
DELETE FROM produtos WHERE id = :id;
```

o `WHERE` define qual registro deve ser alterado.

Sem ele, um `UPDATE` ou um `DELETE` poderia atingir vários registros.

### Como o PDO é usado

Exemplo da consulta de produto:

```php
$sql = "SELECT * FROM produtos WHERE id = :id";

$stmt = $conexao->prepare($sql);

$stmt->bindParam(":id", $id);

$stmt->execute();

return $stmt->fetch(PDO::FETCH_ASSOC);
```

O projeto utiliza três passos com frequência:

```text
prepare()
   ↓
bindParam()
   ↓
execute()
```

- `prepare()` prepara o comando SQL;
- `bindParam()` liga uma variável PHP a um parâmetro do SQL;
- `execute()` executa o comando.

### Relatório e banco

O relatório não usa `COUNT`, `SUM` ou `AVG` diretamente no PostgreSQL.

Ele busca os dados:

```php
$produtos = listar_produtos($conexao);
$pedidos = listar_pedidos($conexao);
```

e depois calcula no PHP.

Produtos:

```text
quantidade_produtos
total_estoque
soma_precos
preco_medio
```

Pedidos:

```text
quantidade_pedidos
total_pedidos
```

Isso é feito com `foreach`, soma de variáveis e divisão.

---

## 7. Organização do código

O projeto separa as páginas usadas pelo cliente das funções administrativas e das partes reutilizadas.

| Parte | Onde fica | O que faz |
|---|---|---|
| **Páginas públicas** | arquivos `.php` na raiz | Apresentam a confeitaria e permitem consultas e pedidos |
| **Administração** | `app/` | CRUD, pedidos e relatório |
| **Login** | `login/` | Login, verificação de sessão e logout |
| **Funções** | `includes/functions.php` | Operações de produtos, pedidos e usuário |
| **Componentes repetidos** | `includes/` | Cabeçalhos e rodapé |
| **Banco** | `database/` | Conexão e arquivo SQL |
| **Estilo** | `style/` | CSS do site |
| **Imagens** | `imagens/` | Capas, produtos e imagens institucionais |

Estrutura do projeto:

```text
elis-patisserie/
├── index.php                  página inicial
├── cardapio.php               produtos + filtros
├── kits.php                   produtos da categoria Kits Comemorativos
├── casamentos.php             produtos da categoria Casamentos
├── calculadora.php            cálculo por número de convidados
├── monte-bolo.php             personalização e pedido de bolo
├── delivery.php               pedido de produto
├── unidades.php               seleção das unidades
├── sobre.php                  apresentação da marca
├── faq.php                    perguntas frequentes
├── contato.php                meios de contato
│
├── app/
│   ├── produto-cadastrar.php  CREATE do CRUD
│   ├── produto-listar.php     READ / listagem
│   ├── produto-consultar.php  READ por ID
│   ├── produto-atualizar.php  UPDATE
│   ├── produto-excluir.php    DELETE
│   ├── pedidos.php            listagem e alteração de status
│   └── relatorio.php          indicadores e tabela de produtos
│
├── login/
│   ├── login.php              entrada da área administrativa
│   ├── verifica_user.php      bloqueia acesso sem sessão
│   └── logout.php             encerra a sessão
│
├── includes/
│   ├── functions.php          funções que falam com o banco
│   ├── header.php             cabeçalho público
│   ├── header_admin.php       cabeçalho administrativo
│   └── footer.php             rodapé
│
├── database/
│   ├── connect.php            conexão PDO com PostgreSQL
│   └── dados.pgsql            tabelas, inserts e testes SQL
│
├── style/
│   └── style.css              estilo geral
│
└── imagens/
    ├── capa.png
    ├── capakit.png
    ├── casamento.jpg
    ├── eliscozinha.png
    ├── macarrons.png
    ├── opera.png
    ├── mesa.png
    └── ...                    outras imagens da confeitaria
```

### Páginas públicas e banco

| Página | Usa PostgreSQL? | Principal lógica |
|---|---:|---|
| `index.php` | Sim | Lista ativos e mostra até 4 |
| `cardapio.php` | Sim | Lista produtos e filtra no PHP |
| `kits.php` | Sim | Busca categoria Kits Comemorativos |
| `casamentos.php` | Sim | Busca categoria Casamentos |
| `calculadora.php` | Não | `POST`, `if`, `elseif` |
| `monte-bolo.php` | Sim | Calcula total e cadastra pedido |
| `delivery.php` | Sim | Busca produto, calcula total e cadastra pedido |
| `unidades.php` | Não | `POST`, `if`, `elseif` |
| `sobre.php` | Não | Conteúdo HTML |
| `faq.php` | Não | Conteúdo HTML |
| `contato.php` | Não | Conteúdo e links |

### Principais funções

```php
cadastrar_produto(...)
```

Insere um novo produto.

```php
listar_produtos(...)
```

Busca todos os produtos.

```php
listar_produtos_ativos(...)
```

Busca somente os produtos ativos.

```php
listar_produtos_categoria(...)
```

Busca os produtos de uma categoria.

```php
consultar_produto(...)
```

Busca um produto pelo ID.

```php
atualizar_produto(...)
```

Atualiza um produto pelo ID.

```php
deletar_produto(...)
```

Exclui um produto pelo ID.

```php
cadastrar_pedido(...)
```

Insere um pedido.

```php
listar_pedidos(...)
```

Busca os pedidos.

```php
atualizar_status_pedido(...)
```

Muda o status de um pedido pelo ID.

```php
consulta_user(...)
```

Busca um usuário pelo e-mail.

### Cabeçalho e rodapé

A parte pública utiliza:

```php
include __DIR__ . '/includes/header.php';
```

e:

```php
include __DIR__ . '/includes/footer.php';
```

As páginas da pasta `app/` usam o cabeçalho administrativo:

```php
include __DIR__ . '/../includes/header_admin.php';
```

Isso permite alterar uma parte repetida em apenas um arquivo.

### Comentários no código

Os comentários foram escritos de forma simples para lembrar o que cada bloco faz.

Exemplo em `functions.php`:

```php
// função usada pra cadastrar um produto novo no banco
```

```php
// prepara o comando antes de mandar pro banco
```

```php
// liga cada informação com o lugar certo no comando
```

Exemplo em uma página administrativa:

```php
// verifica se o formulário foi enviado
```

```php
// atualiza o status do pedido pelo ID que foi informado
```

Exemplo no cabeçalho:

```html
<!-- menu usado pra navegar pelas páginas do site -->
```

A ideia dos comentários é permitir abrir o arquivo e entender o caminho do código sem precisar lembrar tudo de cabeça.

---

## 8. Como rodar

Os passos abaixo consideram a estrutura atual do projeto.

Uma característica importante é que vários links e arquivos do site usam o caminho:

```text
/elis-patisserie/
```

Por isso, **mantenha o nome da pasta como `elis-patisserie`**.

### Escolha o seu caso

| Caso | Quando usar | Onde fica a pasta | Endereço |
|---|---|---|---|
| **A – Windows, servidor do PHP** | Testar no próprio computador | dentro de uma pasta de projetos | `http://localhost:8000/elis-patisserie/` |
| **B – Servidor Linux/Apache/nginx** | Colocar em um servidor que execute PHP | `/var/www/html/elis-patisserie/` ou equivalente | `http://IP-DO-SERVIDOR/elis-patisserie/` |
| **C – Ambiente da escola/rede** | Usar PHP e PostgreSQL disponibilizados pela escola | conforme a pasta indicada no ambiente | endereço definido pelo ambiente |

O banco pode estar no mesmo computador ou em outro computador/servidor da rede. Isso é definido pelo `$host` em `database/connect.php`.

### Passo 0: conferir os programas

Para executar o projeto, é necessário:

- **PHP**;
- extensão do PHP para PostgreSQL (`pdo_pgsql`);
- **PostgreSQL**;
- navegador;
- **Git**, caso o projeto seja baixado pelo GitHub.

No Windows, você pode conferir as versões pelo terminal:

```powershell
php --version
```

```powershell
git --version
```

Se o PostgreSQL estiver disponível no terminal:

```powershell
psql --version
```

Para conferir o suporte PDO PostgreSQL no PHP:

```powershell
php -m | Select-String "pdo_pgsql"
```

No Linux:

```bash
php --version
```

```bash
git --version
```

```bash
psql --version
```

```bash
php -m | grep pdo_pgsql
```

Se algum desses programas não estiver disponível, use a instalação ou o ambiente fornecido pela escola antes de continuar.

### Passo 1: baixar ou copiar o projeto

Se o projeto estiver em um arquivo ZIP:

1. extraia o ZIP;
2. confirme que a pasta final se chama:

```text
elis-patisserie
```

3. coloque essa pasta dentro da pasta que será usada pelo servidor.

Estrutura:

```text
projetos/
└── elis-patisserie/
```

Se o projeto estiver no GitHub, o comando terá esta forma:

```bash
git clone URL_DO_REPOSITORIO elis-patisserie
```

Substitua:

```text
URL_DO_REPOSITORIO
```

pelo endereço real do repositório depois que ele for criado.

Depois entre na pasta:

```bash
cd elis-patisserie
```

Para o servidor embutido do PHP, depois volte para a pasta de cima:

```bash
cd ..
```

Isso é necessário porque o endereço utilizado pelo site contém `/elis-patisserie/`.

### Passo 2: preparar o usuário do banco

A aplicação precisa de um usuário do PostgreSQL que tenha permissão para acessar o banco `elis_patisserie` e trabalhar com as tabelas necessárias.

Na versão usada durante o desenvolvimento, os dados do ambiente estavam definidos em:

```text
database/connect.php
```

Para outra máquina ou para publicação, use o usuário PostgreSQL definido para a aplicação ou fornecido no ambiente da escola.

Evite usar uma conta administrativa do PostgreSQL como conta definitiva da aplicação.

Anote:

```text
host
nome do banco
usuário
senha
```

porque esses quatro dados serão usados no `connect.php`.

### Passo 3: criar o banco de dados e as tabelas

O banco esperado pelo projeto é:

```text
elis_patisserie
```

No ambiente usado nas aulas, abra o PostgreSQL e entre no banco correto pelo **PostgreSQL Explorer / New Query** ou pela ferramenta utilizada na máquina.

O arquivo:

```text
database/dados.pgsql
```

possui os comandos de criação.

As tabelas são:

```text
produtos
pedidos
usuarios
```

Os blocos de `CREATE TABLE` estão comentados com `--`.

Para criar as tabelas em um banco novo:

1. abra `database/dados.pgsql`;
2. localize os três blocos `CREATE TABLE`;
3. use os comandos no banco `elis_patisserie`;
4. execute;
5. confira se as tabelas aparecem.

Depois, se quiser carregar os produtos de exemplo, use os blocos:

```sql
INSERT INTO produtos
```

existentes no mesmo arquivo.

Para conferir:

```sql
SELECT * FROM produtos;
```

A tabela precisa mostrar os produtos inseridos.

### Passo 4: configurar a conexão com o banco

Abra:

```text
database/connect.php
```

A conexão tem esta estrutura:

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

O significado de cada valor:

| Variável | O que é |
|---|---|
| `$host` | Onde está o PostgreSQL. Pode ser `localhost` ou um endereço da rede. |
| `$dbname` | Nome do banco: `elis_patisserie`. |
| `$user` | Usuário PostgreSQL usado pela aplicação. |
| `$pass` | Senha desse usuário. |

Depois de configurar, salve o arquivo.

Se a conexão estiver errada, páginas que usam o banco podem mostrar uma mensagem começando com:

```text
Erro: SQLSTATE...
```

### Passo 5: conferir o endereço da pasta

O projeto não possui um arquivo `BASE_URL`.

Em vez disso, os links foram escritos usando:

```text
/elis-patisserie/
```

Por isso, o nome e a posição da pasta são importantes.

No servidor do PHP, use:

```text
pasta-pai/
└── elis-patisserie/
```

e abra:

```text
http://localhost:8000/elis-patisserie/
```

Não abra o servidor diretamente de dentro da pasta `elis-patisserie` se quiser manter os caminhos exatamente como estão.

No Linux com document root em `/var/www/html`, a estrutura pode ser:

```text
/var/www/html/
└── elis-patisserie/
```

e o endereço:

```text
http://IP-DO-SERVIDOR/elis-patisserie/
```

### Passo 6: iniciar o site

#### A – Windows, servidor embutido do PHP

Abra o terminal na pasta **acima** de `elis-patisserie`.

Exemplo:

```text
C:\projetos\
└── elis-patisserie\
```

No terminal em `C:\projetos\`, execute:

```powershell
php -S localhost:8000
```

Deixe o terminal aberto.

Depois abra:

```text
http://localhost:8000/elis-patisserie/
```

Para parar o servidor:

```text
Ctrl + C
```

#### B – Linux / servidor web

Coloque a pasta:

```text
elis-patisserie
```

dentro da pasta pública do servidor, por exemplo:

```text
/var/www/html/elis-patisserie
```

Depois abra:

```text
http://IP-DO-SERVIDOR/elis-patisserie/
```

O servidor precisa estar configurado para executar PHP e o PHP precisa conseguir acessar o PostgreSQL informado no `connect.php`.

#### C – Ambiente da escola

Use o procedimento indicado para iniciar o PHP no ambiente da escola e mantenha a estrutura:

```text
elis-patisserie/
```

O PostgreSQL precisa estar acessível pelo host configurado no `connect.php`.

### Passo 7: criar ou conferir o administrador

A área administrativa usa a tabela:

```text
usuarios
```

Ela precisa ter pelo menos um registro com e-mail e senha.

O arquivo:

```text
database/dados.pgsql
```

possui um exemplo de `INSERT INTO usuarios`.

Para um novo ambiente, cadastre um usuário de teste com dados próprios.

Estrutura:

```sql
INSERT INTO usuarios
(email, senha)
VALUES
(
    'SEU_EMAIL',
    'SUA_SENHA'
);
```

Depois confira:

```sql
SELECT * FROM usuarios;
```

Acesse:

```text
http://localhost:8000/elis-patisserie/login/login.php
```

Digite o e-mail e a senha correspondentes ao registro.

Quando os dados estão corretos:

```text
login
  ↓
consulta_user()
  ↓
$_SESSION['id']
  ↓
app/produto-listar.php
```

### Para atualizar o projeto depois

Se o projeto estiver no GitHub e já tiver sido clonado:

#### Windows

Entre na pasta do projeto:

```powershell
cd caminho\para\elis-patisserie
```

Depois:

```powershell
git pull
```

#### Linux

```bash
cd /var/www/html/elis-patisserie
```

Depois:

```bash
git pull
```

Se você alterou arquivos locais antes do `git pull`, confira essas alterações antes para não perder trabalho.

### Se algo der errado

| O que aparece / acontece | Causa provável | O que fazer |
|---|---|---|
| `php` não é reconhecido | PHP não está no PATH | Abra pelo ambiente correto ou configure o PHP usado na máquina |
| `psql` não é reconhecido | PostgreSQL não está disponível no PATH | Use o PostgreSQL Explorer / ferramenta utilizada no ambiente ou configure o caminho |
| `Erro: SQLSTATE...` | PHP não conseguiu falar com o banco | Confira `$host`, `$dbname`, `$user`, `$pass` e se o PostgreSQL está ligado |
| `could not find driver` | PDO PostgreSQL não está disponível | Confira se `pdo_pgsql` está habilitado |
| `database "elis_patisserie" does not exist` | O banco não foi criado ou o nome está errado | Crie/selecione o banco correto |
| `relation "produtos" does not exist` | A tabela `produtos` não foi criada no banco atual | Rode o `CREATE TABLE produtos` do `dados.pgsql` |
| `relation "pedidos" does not exist` | A tabela `pedidos` não foi criada | Rode o `CREATE TABLE pedidos` |
| `relation "usuarios" does not exist` | A tabela de login não foi criada | Rode o `CREATE TABLE usuarios` |
| A página abre, mas não aparecem produtos | Não existem produtos ativos ou os dados não foram inseridos | Rode `SELECT * FROM produtos;` e confira `ativo` |
| Um kit não aparece | Categoria diferente de `Kits Comemorativos` ou produto inativo | Confira categoria e `ativo` |
| Um produto de casamento não aparece | Categoria diferente de `Casamentos` ou produto inativo | Confira categoria e `ativo` |
| O filtro não mostra resultados | Nenhum produto corresponde à categoria e unidade escolhidas | Teste os filtros separadamente e confira os dados no banco |
| O Delivery diz para conferir a unidade | A unidade escolhida é diferente da unidade cadastrada no produto | Selecione a unidade correspondente |
| O pedido não aparece no admin | O `INSERT` pode não ter sido executado no banco esperado | Rode `SELECT * FROM pedidos;` |
| Login mostra usuário ou senha inválidos | Dados digitados não correspondem à tabela `usuarios` | Rode `SELECT * FROM usuarios;` e confira o registro |
| Ao abrir uma página do admin volta para o login | Não existe `$_SESSION['id']` | Faça login primeiro |
| Imagem de produto não aparece | Caminho salvo no campo `imagem` não corresponde ao arquivo | Confira o valor da coluna e a pasta `imagens/` |
| CSS ou imagens não carregam | Pasta não está sendo acessada como `/elis-patisserie/` | Confira o Passo 5 |
| Alteração no produto não aparece | ID errado ou banco diferente | Consulte pelo ID e confirme a conexão |
| Atualização mudou o registro errado | ID informado não era o esperado | Consulte o produto antes de atualizar |
| Exclusão apagou um produto | O `DELETE` remove definitivamente o ID escolhido | Use um produto de teste durante a apresentação |
| Alteração no banco não aparece na consulta | New Query pode estar em outro banco/conexão | Confirme que a consulta está no banco `elis_patisserie` |
| Página administrativa abre sem o estilo esperado | Caminho de CSS precisa apontar para a pasta correta do projeto | Confira o `href` do CSS e a estrutura de pastas |

### Dicas

- **Para testar o banco antes do site**, rode:

```sql
SELECT * FROM produtos;
```

```sql
SELECT * FROM pedidos;
```

```sql
SELECT * FROM usuarios;
```

- **Para testar o CRUD durante a apresentação**, crie um produto chamado:

```text
Produto Teste
```

Depois:

```text
Cadastrar
   ↓
Listar
   ↓
Consultar pelo ID
   ↓
Atualizar
   ↓
Consultar novamente
   ↓
Excluir
```

Assim você consegue demonstrar as quatro partes do CRUD sem apagar um produto real do site.

- **Para testar pedidos**, faça um pedido pelo Delivery e depois rode:

```sql
SELECT * FROM pedidos;
```

Depois mude o status pela página administrativa e consulte novamente.

- **Para demonstrar a calculadora**, use 20 convidados. O resultado esperado é:

```text
2 kg de bolo
80 docinhos
```

- **Para demonstrar o Monte seu bolo**, use um peso simples, como 2 kg. O cálculo esperado é:

```text
2 × 120 = R$ 240,00
```

- **Antes da apresentação**, teste:
  - todos os links do menu público;
  - login;
  - cadastro;
  - consulta;
  - atualização;
  - exclusão;
  - pedido;
  - atualização de status;
  - relatório;
  - imagens;
  - conexão com PostgreSQL.

- **Antes de enviar para o GitHub**, revise `database/connect.php` e retire credenciais reais.

- **Mantenha o nome da pasta `elis-patisserie`**, porque vários caminhos do projeto dependem dele.

- **Durante a apresentação**, se o professor perguntar como PHP e PostgreSQL se ligam, o caminho principal é:

```text
formulário
   ↓
$_POST
   ↓
página PHP
   ↓
função em includes/functions.php
   ↓
prepare()
   ↓
bindParam()
   ↓
execute()
   ↓
PostgreSQL
```

- **Se o professor perguntar pelo CRUD**, use este resumo:

```text
CREATE  → INSERT
READ    → SELECT
UPDATE  → UPDATE
DELETE  → DELETE
```
