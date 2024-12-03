<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo de Adivinhação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f8ff;
            color: #333;
            padding: 20px;
        }
        h1 {
            color: #4CAF50;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        input[type="number"] {
            padding: 10px;
            font-size: 16px;
            width: 100px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>Jogo de Adivinhação</h1>
    <p>Adivinhe o número entre <strong>1 e 100</strong>!</p>

    <form method="post">
        <input type="number" name="guess" min="1" max="100" placeholder="Seu palpite" required>
        <button type="submit">Tentar</button>
    </form>

    <?php
    session_start();

    // Gera um número aleatório na primeira visita
    if (!isset($_SESSION["random_number"])) {
        $_SESSION["random_number"] = rand(1, 100);
        $_SESSION["attempts"] = 0;
    }

    // Processa o palpite do usuário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $guess = intval($_POST["guess"]);
        $_SESSION["attempts"]++;

        if ($guess == $_SESSION["random_number"]) {
            echo "<div class='result success'>🎉 Parabéns! Você acertou o número <strong>$guess</strong> em {$_SESSION['attempts']} tentativas!</div>";
            // Reinicia o jogo
            unset($_SESSION["random_number"]);
            unset($_SESSION["attempts"]);
        } elseif ($guess < $_SESSION["random_number"]) {
            echo "<div class='result error'>😅 O número é <strong>maior</strong> que $guess. Tente novamente!</div>";
        } else {
            echo "<div class='result error'>😅 O número é <strong>menor</strong> que $guess. Tente novamente!</div>";
        }
    }
    ?>
</body>
</html>
