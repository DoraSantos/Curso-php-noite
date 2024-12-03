<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descobrindo PAR ou Ímpar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: blue;
        }
        h1 {
            color: black;
            text-align: center;
            background-color: yellow;
            padding: 10px;
            font-family: "verdana", sans-serif;
        }
    </style>
</head>
<body>

    <h1>Descubra se é PAR ou ÍMPAR</h1>
    <!-- Formulário para entrada do número -->
    <form method="POST">
        <label for="numero">Digite um número:</label>
        <input type="number" min="0" max="10" name="numero" required>
        <button type="submit">Verificar</button>
    </form>
    <hr>
    <?php
    // Verificar se o formulário foi enviado:
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar se o campo 'numero' foi enviado
        if (isset($_POST['numero'])) {
            $numero = intval($_POST['numero']); // Converte para inteiro
            if ($numero % 2 == 0) {
                echo "<p style='color: white; text-align: center;'>O número $numero é <strong>PAR</strong>.</p>";
            } else {
                echo "<p style='color: white; text-align: center;'>O número $numero é <strong>ÍMPAR</strong>.</p>";
            }
        } else {
            echo "<p style='color: red; text-align: center;'>Por favor, insira um número válido.</p>";
        }
    }
    ?>
</body>
</html>
