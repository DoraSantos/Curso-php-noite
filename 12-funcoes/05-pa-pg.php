<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progressão Aritmética e Geométrica</title>
</head>
<body>
    <h1>Calculadora de PA e PG</h1>
    <form method="POST">
        <label for="primeiroTermo">Primeiro termo:</label>
        <input type="number" name="primeiroTermo" id="primeiroTermo" required>
        <br><br>
        <label for="razao">Razão:</label>
        <input type="number" name="razao" id="razao" required>
        <br><br>
        <label for="numTermos">Número de termos:</label>
        <input type="number" name="numTermos" id="numTermos" min="1" required>
        <br><br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtém os valores do formulário
        $primeiroTermo = (int)$_POST['primeiroTermo'];
        $razao = (int)$_POST['razao'];
        $numTermos = (int)$_POST['numTermos'];

        // Função para calcular PA
        function calcularPA($primeiroTermo, $razao, $numTermos) {
            $pa = [];
            for ($i = 0; $i < $numTermos; $i++) {
                $pa[] = $primeiroTermo + ($i * $razao); // Fórmula da PA
            }
            return $pa;
        }

        // Função para calcular PG
        function calcularPG($primeiroTermo, $razao, $numTermos) {
            $pg = [];
            for ($i = 0; $i < $numTermos; $i++) {
                $pg[] = $primeiroTermo * pow($razao, $i); // Fórmula da PG
            }
            return $pg;
        }

        // Calcula PA e PG
        $pa = calcularPA($primeiroTermo, $razao, $numTermos);
        $pg = calcularPG($primeiroTermo, $razao, $numTermos);

        // Exibe os resultados
        echo "<h2>Resultados:</h2>";
        echo "<p><strong>Progressão Aritmética (PA):</strong> " . implode(", ", $pa) . "</p>";
        echo "<p><strong>Progressão Geométrica (PG):</strong> " . implode(", ", $pg) . "</p>";
    }
    ?>
</body>
</html>
