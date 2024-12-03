<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Números Primos</title>
    <style>
        body {
            background-color: blue;
            color: black;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: orange;
            color: black;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: darkorange;
        }
        .resultado {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora de Números Primos</h1>
        <form method="POST">
            <label for="numero">Digite um número inteiro:</label>
            <input type="number" id="numero" name="numero" required>
            <button type="submit">Verificar</button>
        </form>

        <div class="resultado">
            <?php
            // Função para verificar se um número é primo
            function ehPrimo($numero) {
                if ($numero <= 1) {
                    return false;
                }
                for ($i = 2; $i <= sqrt($numero); $i++) {
                    if ($numero % $i === 0) {
                        return false;
                    }
                }
                return true;
            }

            // Processar o formulário
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $numero = intval($_POST["numero"]);
                if (ehPrimo($numero)) {
                    echo "<p>O número <strong>$numero</strong> é primo.</p>";
                } else {
                    echo "<p>O número <strong>$numero</strong> não é primo.</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
