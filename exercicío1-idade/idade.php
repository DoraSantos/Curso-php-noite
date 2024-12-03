<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificação de Idades</title>
</head>
<body>
    <h1>Classificação de Idades</h1>
    <form method="POST">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <label for="idade<?= $i ?>">Idade da pessoa <?= $i ?>:</label>
            <input type="number" name="idades[]" id="idade<?= $i ?>" min="0" required>
            <br><br>
        <?php endfor; ?>
        <button type="submit">Classificar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idades'])) {
        $idades = $_POST['idades'];
        echo "<h2>Classificação das Idades</h2>";
        foreach ($idades as $idade) {
            $idade = (int)$idade;
            if ($idade >= 0 && $idade <= 12) {
                $classificacao = "Criança";
            } elseif ($idade >= 13 && $idade <= 17) {
                $classificacao = "Adolescente";
            } elseif ($idade >= 18 && $idade <= 59) {
                $classificacao = "Adulto";
            } else {
                $classificacao = "Idoso";
            }
            echo "<p>Idade: $idade - Classificação: $classificacao</p>";
        }
    }
    ?>
</body>
</html>
