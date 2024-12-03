<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma de Números Pares</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 20px;
        }
        h1 {
            color: #4CAF50;
        }
        .result {
            font-size: 1.2em;
            color: #ff5722;
            margin-top: 20px;
        }
        .input-form {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        input[type="number"] {
            padding: 8px;
            font-size: 1em;
            width: 100%;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Soma dos Números Pares</h1>

    <div class="input-form">
        <form method="POST">
            <label for="numero">Digite um número inteiro positivo:</label>
            <input type="number" id="numero" name="numero" required min="1">
            <input type="submit" value="Calcular">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recebe o número fornecido pelo usuário
        $numero = intval($_POST["numero"]);
        
        if ($numero > 0) {
            $soma = 0;
            $contador = 1;

            // Laço do-while para somar os números pares
            do {
                if ($contador % 2 == 0) {
                    $soma += $contador;
                }
                $contador++;
            } while ($contador <= $numero);

            // Exibe o resultado da soma
            echo "<div class='result'>A soma dos números pares de 1 até $numero é: $soma</div>";
        } else {
            echo "<div class='result' style='color: red;'>Por favor, insira um número inteiro positivo.</div>";
        }
    }
    ?>

</body>
</html>
