<?php

// puxa a conexão com o banco pra conseguir usar nas funções
require_once __DIR__ . '/../database/connect.php';

// função usada pra cadastrar um produto novo no banco
function cadastrar_produto($conexao, $nome, $categoria, $preco, $estoque, $unidade, $descricao, $rendimento, $alergenos, $imagem, $ativo)
{
    // comando que adiciona os dados do produto na tabela produtos
    $sql = "INSERT INTO produtos (nome, categoria, preco, estoque, unidade, descricao, rendimento, alergenos, imagem, ativo) VALUES (:nome, :categoria, :preco, :estoque, :unidade, :descricao, :rendimento, :alergenos, :imagem, :ativo)";

    // prepara o comando antes de mandar pro banco
    $stmt = $conexao->prepare($sql);

    // liga cada informação com o lugar certo no comando
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":categoria", $categoria);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":estoque", $estoque);
    $stmt->bindParam(":unidade", $unidade);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->bindParam(":rendimento", $rendimento);
    $stmt->bindParam(":alergenos", $alergenos);
    $stmt->bindParam(":imagem", $imagem);
    $stmt->bindParam(":ativo", $ativo);

    // executa o cadastro no banco
    $stmt->execute();

    echo "Produto cadastrado com sucesso!";
}

// função que pega todos os produtos cadastrados
function listar_produtos($conexao)
{
    // busca todos os produtos e organiza pelo ID
    $sql = "SELECT * FROM produtos ORDER BY id";

    $stmt = $conexao->prepare($sql);

    // executa a busca
    $stmt->execute();

    // devolve todos os produtos que foram encontrados
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// função que mostra só os produtos que estão ativos
function listar_produtos_ativos($conexao)
{
    // busca só os produtos ativos e organiza pelo nome
    $sql = "SELECT * FROM produtos WHERE ativo = true ORDER BY nome";

    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    // devolve os produtos ativos encontrados
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// função que busca produtos de uma categoria específica
function listar_produtos_categoria($conexao, $categoria)
{
    // busca os produtos que têm a categoria informada
    $sql = "SELECT * FROM produtos WHERE categoria = :categoria ORDER BY nome";

    $stmt = $conexao->prepare($sql);

    // coloca a categoria informada no comando
    $stmt->bindParam(":categoria", $categoria);

    $stmt->execute();

    // devolve os produtos encontrados nessa categoria
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// função usada pra procurar um produto pelo ID
function consultar_produto($conexao, $id)
{
    // procura o produto que tem o ID informado
    $sql = "SELECT * FROM produtos WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    // coloca o ID informado no comando
    $stmt->bindParam(":id", $id);

    $stmt->execute();

    // devolve o produto que foi encontrado
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// função usada pra atualizar os dados de um produto
function atualizar_produto($conexao, $id, $nome, $categoria, $preco, $estoque, $unidade, $descricao, $rendimento, $alergenos, $imagem, $ativo)
{
    // atualiza os dados do produto que tem o ID informado
    $sql = "UPDATE produtos SET nome = :nome, categoria = :categoria, preco = :preco, estoque = :estoque, unidade = :unidade, descricao = :descricao, rendimento = :rendimento, alergenos = :alergenos, imagem = :imagem, ativo = :ativo WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    // liga os novos dados com o comando
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":categoria", $categoria);
    $stmt->bindParam(":preco", $preco);
    $stmt->bindParam(":estoque", $estoque);
    $stmt->bindParam(":unidade", $unidade);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->bindParam(":rendimento", $rendimento);
    $stmt->bindParam(":alergenos", $alergenos);
    $stmt->bindParam(":imagem", $imagem);
    $stmt->bindParam(":ativo", $ativo);
    $stmt->bindParam(":id", $id);

    // faz a atualização no banco
    $stmt->execute();

    echo "Produto atualizado com sucesso!";
}

// função usada pra excluir um produto
function deletar_produto($conexao, $id)
{
    // apaga o produto que tem o ID informado
    $sql = "DELETE FROM produtos WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    // coloca no comando qual ID vai ser excluído
    $stmt->bindParam(":id", $id);

    $stmt->execute();

    echo "Produto excluído com sucesso!";
}

// função usada pra cadastrar um pedido no banco
function cadastrar_pedido($conexao, $cliente, $email, $telefone, $produto, $quantidade, $unidade, $tipo_recebimento, $data_retirada, $periodo, $observacao, $status, $total)
{
    // adiciona todas as informações do pedido na tabela pedidos
    $sql = "INSERT INTO pedidos (cliente, email, telefone, produto, quantidade, unidade, tipo_recebimento, data_retirada, periodo, observacao, status, total) VALUES (:cliente, :email, :telefone, :produto, :quantidade, :unidade, :tipo_recebimento, :data_retirada, :periodo, :observacao, :status, :total)";

    $stmt = $conexao->prepare($sql);

    // liga cada dado do pedido com o lugar certo no comando
    $stmt->bindParam(":cliente", $cliente);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":telefone", $telefone);
    $stmt->bindParam(":produto", $produto);
    $stmt->bindParam(":quantidade", $quantidade);
    $stmt->bindParam(":unidade", $unidade);
    $stmt->bindParam(":tipo_recebimento", $tipo_recebimento);
    $stmt->bindParam(":data_retirada", $data_retirada);
    $stmt->bindParam(":periodo", $periodo);
    $stmt->bindParam(":observacao", $observacao);
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":total", $total);

    // cadastra o pedido no banco
    $stmt->execute();

    echo "Pedido cadastrado com sucesso!";
}

// função que pega todos os pedidos cadastrados
function listar_pedidos($conexao)
{
    // busca todos os pedidos e organiza pelo ID
    $sql = "SELECT * FROM pedidos ORDER BY id";

    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    // devolve todos os pedidos encontrados
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// função usada pra mudar o status de um pedido
function atualizar_status_pedido($conexao, $id, $status)
{
    // atualiza o status do pedido que tem o ID informado
    $sql = "UPDATE pedidos SET status = :status WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    // coloca o novo status e o ID no comando
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":id", $id);

    $stmt->execute();

    echo "Status atualizado com sucesso!";
}




// função usada pra procurar um usuário pelo e-mail
function consulta_user($conexao, $email)
{
    // busca o ID, e-mail e senha do usuário que tem esse e-mail
    $sql = "SELECT id, email, senha FROM usuarios WHERE email = :email";

    $stmt = $conexao->prepare($sql);

    // coloca o e-mail informado no comando
    $stmt->bindParam(":email", $email);

    $stmt->execute();

    // devolve os dados do usuário que foi encontrado
    return $stmt->fetch(PDO::FETCH_ASSOC);
}



?>