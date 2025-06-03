<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idade</title>
    <link rel="stylesheet" href="estilos/idade.css">
</head>
<body>

  <h2>Calculadora de Idade</h2>

  <form action="idade.php" method="post">
    <label for="nascimento">Data de Nascimento:</label><br>
    <input type="date" name="nascimento" id="nascimento" required><br><br>
    <input type="submit" value="Calcular Idade">
  </form>
  <a href="index.html" class="btn-voltar">Voltar para a Página Principal</a>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dataNascimento = $_POST["nascimento"];

        if ($dataNascimento) {
            $dataNascimentoObj = new DateTime($dataNascimento);
            $hoje = new DateTime();
            $idade = $hoje->diff($dataNascimentoObj)->y;
            echo "<p>Você tem <strong>$idade anos</strong>.</p>";
            if ($dataNascimentoObj->format('d-m') === $hoje->format('d-m')) {
                echo "<p><strong>Hoje é seu aniversário, parabéns!! 🥳🎉</strong></p>";
            }
        } else {
            echo "<p>Porfavor , insira uma data valida.</p>";
        }
    }
?>