<?php

// puxa o arquivo onde estão as funções que eu uso no sistema
require_once __DIR__ . '/../includes/functions.php';

// verifica se quem está entrando nessa página fez login
require_once __DIR__ . '/../login/verifica_user.php';

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/elis-patisserie/../style/style.css">

    <title>Cadastrar produto</title>

</head>

<body>

    <?php

    // coloca o cabeçalho da parte administrativa
    include __DIR__ . '/../includes/header_admin.php';

    ?>

    <main>

        <section>

            <!-- título da página -->
            <h1>Cadastrar produto</h1>

            <!-- formulário usado pra cadastrar um novo produto -->
            <form action="" method="post">

                <!-- nome do produto -->
                <label for="nome">Nome:</label><input type="text" name="nome" id="nome" required><br>

                <!-- escolhe a categoria do produto -->
                <label for="categoria">Categoria:</label>

                <select name="categoria" id="categoria">

                    <option value="Bolos e Tortas">Bolos e Tortas</option>
                    <option value="Confeitaria Fina">Confeitaria Fina</option>
                    <option value="Sobremesas Individuais">Sobremesas Individuais</option>
                    <option value="Kits Comemorativos">Kits Comemorativos</option>
                    <option value="Casamentos">Casamentos</option>

                </select><br>

                <!-- preço do produto -->
                <label for="preco">Preço:</label><input type="number" name="preco" id="preco" step="0.01" required><br>

                <!-- quantidade que tem no estoque -->
                <label for="estoque">Estoque:</label><input type="number" name="estoque" id="estoque" min="0" required><br>

                <!-- escolhe em qual unidade o produto vai ficar disponível -->
                <label for="unidade">Unidade:</label>

                <select name="unidade" id="unidade">

                    <option value="Americana - SP">Americana - SP</option>
                    <option value="Leblon - RJ">Leblon - RJ</option>
                    <option value="Monte Verde - MG">Monte Verde - MG</option>

                </select><br>

                <!-- descrição do produto -->
                <label for="descricao">Descrição:</label><input type="text" name="descricao" id="descricao" required><br>

                <!-- informa o rendimento do produto -->
                <label for="rendimento">Rendimento:</label><input type="text" name="rendimento" id="rendimento" required><br>

                <!-- informa os alérgenos do produto -->
                <label for="alergenos">Alérgenos:</label><input type="text" name="alergenos" id="alergenos" required><br>

                <!-- caminho da imagem que vai aparecer no produto -->
                <label for="imagem">Caminho da imagem:</label><input type="text" name="imagem" id="imagem" value="imagens/produto.png" required><br>

                <!-- escolhe se o produto vai ficar ativo ou não -->
                <label for="ativo_sim">Ativo:</label><input type="radio" name="ativo" id="ativo_sim" value="true" required><label for="ativo_sim">SIM</label>

                <input type="radio" name="ativo" id="ativo_nao" value="false"><label for="ativo_nao">NÃO</label><br>

                <!-- limpa os campos ou envia o cadastro -->
                <input type="reset" value="Limpar"><input type="submit" value="Cadastrar">

            </form>

            <?php

            // verifica se o formulário foi enviado
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                // manda os dados preenchidos pra função que cadastra o produto no banco
                cadastrar_produto($conexao, $_POST['nome'], $_POST['categoria'], $_POST['preco'], $_POST['estoque'], $_POST['unidade'], $_POST['descricao'], $_POST['rendimento'], $_POST['alergenos'], $_POST['imagem'], $_POST['ativo']);

            }

            ?>

        </section>

    </main>

    <?php

    // coloca o rodapé da página
    include __DIR__ . '/../includes/footer.php';

    ?>

</body>

</html>
