<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma de Números Pares</title>
</head>
<body>
    <form method="POST">
        <label for="numero">Digite um número inteiro positivo:</label>
        <input type="number" name="numero" id="numero" min="1" required>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = (int)$_POST["numero"]; // Obtém o número enviado pelo formulário

        if ($numero <= 0) {
            echo "<p>Por favor, insira um número maior que zero.</p>";
        } else {
            // Inicializa as variáveis
            $soma = 0;
            $i = 1;

            // Usa o laço do-while para somar os números pares
            do {
                if ($i % 2 == 0) { // Verifica se o número é par
                    $soma += $i;   // Soma o número par
                }
                $i++; // Incrementa o contador
            } while ($i <= $numero);

            // Exibe o resultado
            echo "<p>A soma dos números pares de 1 até $numero é: $soma</p>";
        }
    }
    ?>
</body>
</html>
