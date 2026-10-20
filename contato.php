<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/style.css">

    <title>Contato - Elis Patisserie</title>

</head>

<body>

    <?php

    // coloca o cabeçalho principal do site
    include __DIR__ . '/includes/header.php';

    ?>

    <main>

        <section>

            <!-- título da página -->
            <h1>Contato</h1>

            <!-- aviso pra depois trocar pelo número verdadeiro da confeitaria -->
            <p>WhatsApp: (19) 92111 - 5357.</p>

            <!-- botão que abre uma conversa no WhatsApp -->
            <a class="botao" href="/elis-patisserie/https://wa.me/5519999999999" target="_blank">Falar pelo WhatsApp</a>

            <!-- redes sociais da confeitaria -->
            <p>Instagram: @elispatisserie</p>

            <p>TikTok: @elispatisserie</p>

            <!-- horário que ainda vai ser definido pra cada unidade -->
            <p>Horário de atendimento: Segunda a sábado, das 8h às 19h.</p> 
            <p> Domingos e feriados, das 10h às 16h.</p>

        </section>

    </main>

    <?php

    // coloca o rodapé da página
    include __DIR__ . '/includes/footer.php';

    ?>

</body>

</html>