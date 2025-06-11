<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idade</title>
    <link rel="stylesheet" href="estilos/idade.css">
</head>
<body>

  <header>
      <h2>Calculadora de Idade</h2>
  </header>

  <main>
      <form action="idade.php" method="post">
        <label for="nascimento">Data de Nascimento:</label><br>
        <input type="date" name="nascimento" id="nascimento" required><br><br>
        <input type="submit" value="Calcular Idade">
        <a href="index.html" class="btn-voltar">Voltar para a Página Principal</a>
      </form>
      <br>
        <?php
        if (!isset($_SESSION['conquista1'])) $_SESSION['conquista1'] = false;
        if (!isset($_SESSION['conquista2'])) $_SESSION['conquista2'] = false;
        if (!isset($_SESSION['conquista3'])) $_SESSION['conquista3'] = false;

        $mensagemIdade = "";
        $mensagemConquista1 = "";
        $mensagemConquista2 = "";
        $mensagemConquista3 = "";


        $pode_conteudoExtra = false;
        $conquista1 = false;
        $conquista2 = false;
        $conquista3 = false;
        $emojis = ['😭', '🏆', '🔥'];
        $descricoes = ['Derrota', 'Vitória', 'Fogo'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dataNascimento = $_POST["nascimento"];
            if ($dataNascimento) {
                $dataNascimentoObj = new DateTime($dataNascimento);
                $hoje = new DateTime();
                $idade = $hoje->diff($dataNascimentoObj)->y;
        
                // Correção aqui
                if ($dataNascimentoObj <= $hoje && $idade <= 122) {
        
                    echo "<br><p>Você tem <strong>$idade anos</strong>.</p><br>";
        
                    // Mensagens secretas e desbloqueio de conquistas
                    if ($dataNascimentoObj->format('d-m-Y') === $hoje->format('d-m-Y')) {
                        echo "<p><strong>Ué, você nasceu hoje e já está usando o site? 😂</strong></p>";
                        $_SESSION['conquista1'] = true;
                    } elseif ($dataNascimentoObj->format('d-m') === $hoje->format('d-m')) {
                        echo "<p><strong>Hoje é seu aniversário, parabéns!! 🥳🎉</strong></p>";
                        $_SESSION['conquista2'] = true;
                    } elseif ($idade == 122) {
                        echo "<p><strong>Essa é a idade da pessoa mais velha do mundo já registrada 👏</strong></p>";
                        $_SESSION['conquista3'] = true;
                    }
        
                    $pode_conteudoExtra = true;
                } else {
                    echo "<p>Por favor, insira uma data válida.</p>";
                }
        
                if ($pode_conteudoExtra) {
                    conteudoExtra();
                }
            }
        }        

        if ($_SESSION['conquista1']) {
            $mensagemConquista1 = "🎉 Conquista 1 desbloqueada: Você nasceu hoje e já está usando o site!";
        } else {
            $mensagemConquista1 = "❔ Conquista 1: Nascido hoje (ainda bloqueada)";
        }
        
        if ($_SESSION['conquista2']) {
            $mensagemConquista2 = "🎂 Conquista 2 desbloqueada: Hoje é seu aniversário, parabéns!";
        } else {
            $mensagemConquista2 = "❔ Conquista 2: Aniversário hoje (ainda bloqueada)";
        }
        
        if ($_SESSION['conquista3']) {
            $mensagemConquista3 = "🏆 Conquista 3 desbloqueada: Idade da pessoa mais velha já registrada!";
        } else {
            $mensagemConquista3 = "❔ Conquista 3: 122 anos de idade (ainda bloqueada)";
        }
      
        function conteudoExtra() {
            global $idade;
            echo "<div class=\"conteudo-extra\">";
            if ($idade <= 12) {
                // Criança
                echo "<h3>Você tem $idade anos! Uma infância saudável é o começo de tudo🌱</h3>";
                echo "<img src=\"imagens/crianca.jpg\" alt=\"Criança saudável\" style=\"width:100%;max-width:400px;\">";
                echo "<ul>";
                echo "<li>Estimule atividades físicas diárias, como brincar ao ar livre e jogos que envolvam movimento.</li>";
                echo "<li>Limite o tempo de tela a no máximo 1 hora por dia para crianças entre 2 e 5 anos, conforme recomendado pela OMS.</li>";
                echo "<li>Ofereça uma alimentação equilibrada, rica em frutas, legumes e alimentos naturais.</li>";
                echo "<li>Garanta um ambiente seguro e afetuoso, promovendo o desenvolvimento saudável.</li>";
                echo "</ul>";
                echo "<p>Fonte: <a href=\"https://www.gov.br/saude/pt-br/assuntos/saude-de-a-a-z/s/saude-da-crianca\" target=\"_blank\">Ministério da Saúde</a></p>";
            } elseif ($idade <= 17) {
                // Adolescente
                echo "<h3>Você tem $idade anos! É hora de crescer com equilíbrio e energia⚡</h3>";
                echo "<img src=\"imagens/adolescente.jpg\" alt=\"Adolescente saudável\" style=\"width:100%;max-width:400px;\">";
                echo "<ul>";
                echo "<li>Pratique esportes e mantenha-se ativo — o corpo ainda está se desenvolvendo.</li>";
                echo "<li>Tenha uma alimentação rica em ferro, cálcio e proteínas para ajudar no crescimento.</li>";
                echo "<li>Durma bem — adolescentes precisam de 8 a 10 horas de sono por noite.</li>";
                echo "<li>Evite o consumo excessivo de telas e mantenha uma boa saúde mental.</li>";
                echo "</ul>";
                echo "<p>Fonte: <a href=\"https://www.unicef.org/brazil/saude-na-adolescencia\" target=\"_blank\">UNICEF</a></p>";
            } elseif ($idade <= 59) {
                // Adulto
                echo "<h3>Você tem $idade anos! Cuide da sua saúde para manter o ritmo da vida💪</h3>";
                echo "<img src=\"imagens/adulto.jpg\" alt=\"Adulto saudável\" style=\"width:100%;max-width:400px;\">";
                echo "<ul>";
                echo "<li>Pratique pelo menos 150 minutos de atividade física moderada por semana, como caminhadas ou ciclismo.</li>";
                echo "<li>Mantenha uma alimentação balanceada, controlando o consumo de açúcares, gorduras e sal.</li>";
                echo "<li>Realize exames médicos regularmente e cuide da saúde mental com momentos de lazer e descanso.</li>";
                echo "<li>Evite o consumo excessivo de álcool e o tabagismo.</li>";
                echo "</ul>";
                echo "<p>Fonte: <a href=\"https://bvsms.saude.gov.br/bvs/dicas/282_alimentacao_saudavel.html\" target=\"_blank\">Biblioteca Virtual em Saúde - Ministério da Saúde</a></p>";
            } else {
                // Idoso
                echo "<h3>Você tem $idade anos! A experiência é um tesouro, cuide bem de você🌟</h3>";
                echo "<img src=\"imagens/idoso.jpg\" alt=\"Idoso saudável\" style=\"width:100%;max-width:400px;\">";
                echo "<ul>";
                echo "<li>Faça exercícios leves regularmente, como caminhadas ou alongamentos, para manter a mobilidade.</li>";
                echo "<li>Mantenha uma dieta rica em fibras, cálcio e vitamina D para fortalecer ossos e prevenir doenças.</li>";
                echo "<li>Participe de atividades sociais e culturais para manter a mente ativa e evitar o isolamento.</li>";
                echo "<li>Realize check-ups médicos com frequência e siga as orientações dos profissionais de saúde.</li>";
                echo "</ul>";
                echo "<p>Fonte: <a href=\"https://www.gov.br/saude/pt-br/assuntos/saude-de-a-a-z/s/saude-da-pessoa-idosa\" target=\"_blank\">Ministério da Saúde - Saúde da Pessoa Idosa</a></p>";
            }
            echo "</div>";
        }
        
      ?>
      <h2>Conquistas</h2>
      <article>
            <div class="conquistaContainer">
                <div class="caixaConquista <?= $_SESSION['conquista1'] ? 'ativa' : 'bloqueada' ?>">
                    <?= $_SESSION['conquista1'] ? '🎉' : '❔' ?>
                </div>
                <div class="descricaoConquista">
                    <?= $_SESSION['conquista1'] ? 'Você nasceu hoje e já está usando o site!' : 'Conquista secreta...' ?>
                </div>
            </div>

            <div class="conquistaContainer">
                <div class="caixaConquista <?= $_SESSION['conquista2'] ? 'ativa' : 'bloqueada' ?>">
                    <?= $_SESSION['conquista2'] ? '🎂' : '❔' ?>
                </div>
                <div class="descricaoConquista">
                    <?= $_SESSION['conquista2'] ? 'Hoje é seu aniversário, parabéns!' : 'Conquista secreta...' ?>
                </div>
            </div>

            <div class="conquistaContainer">
                <div class="caixaConquista <?= $_SESSION['conquista3'] ? 'ativa' : 'bloqueada' ?>">
                    <?= $_SESSION['conquista3'] ? '🏆' : '❔' ?>
                </div>
                <div class="descricaoConquista">
                    <?= $_SESSION['conquista3'] ? 'Idade da pessoa mais velha já registrada!' : 'Conquista secreta...' ?>
                </div>
            </div>
        </article>
  </main>

</body>  
</html>