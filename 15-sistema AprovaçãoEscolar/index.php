<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Aprovação Escolar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f5f5f5;
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
        .approved {
            background-color: #d4edda;
            color: #155724;
        }
        .recovery {
            background-color: #fff3cd;
            color: #856404;
        }
        .failed {
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
    <h1>Sistema de Aprovação Escolar</h1>
    <p>Insira as três notas do aluno para calcular a média.</p>

    <form method="post">
        <input type="number" name="nota1" placeholder="Nota 1" step="0.01" min="0" max="10" required>
        <input type="number" name="nota2" placeholder="Nota 2" step="0.01" min="0" max="10" required>
        <input type="number" name="nota3" placeholder="Nota 3" step="0.01" min="0" max="10" required>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Captura as notas do formulário
        $nota1 = floatval($_POST["nota1"]);
        $nota2 = floatval($_POST["nota2"]);
        $nota3 = floatval($_POST["nota3"]);

        // Calcula a média
        $media = ($nota1 + $nota2 + $nota3) / 3;

        // Define o status do aluno
        echo "<div class='result'>";
        if ($media >= 7) {
            echo "<div class='approved'>🎉 Parabéns! O aluno foi <strong>APROVADO</strong> com média <strong>" . number_format($media, 2) . "</strong>.</div>";
        } elseif ($media >= 5) {
            echo "<div class='recovery'>😐 O aluno está em <strong>RECUPERAÇÃO</strong> com média <strong>" . number_format($media, 2) . "</strong>. Estude mais!</div>";
        } else {
            echo "<div class='failed'>😢 O aluno foi <strong>REPROVADO</strong> com média <strong>" . number_format($media, 2) . "</strong>. Não desista!</div>";
        }
        echo "</div>";
    }
    ?>
</body>
</html>
