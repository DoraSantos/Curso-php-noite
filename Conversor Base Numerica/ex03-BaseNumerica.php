<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Base Numérica</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #000;
            color: #00FF7F;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.8);
            box-shadow: 0 0 20px #00FF7F;
            width: 90%;
            max-width: 400px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #FF1493;
        }
        input, select, button {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }
        input, select {
            background: #111;
            color: #00FF7F;
            box-shadow: 0 0 10px #00FF7F;
        }
        button {
            background: #FF1493;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #FF69B4;
        }
        .resultado {
            margin-top: 20px;
            font-size: 18px;
            color: #FFD700;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Conversor de Base Numérica</h1>
        <form method="post">
            <input type="number" name="numero" placeholder="Digite um número decimal" required>
            <select name="base">
                <option value="bin">Binário</option>
                <option value="oct">Octal</option>
                <option value="hex">Hexadecimal</option>
            </select>
            <button type="submit">Converter</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numero = intval($_POST['numero']);
            $base = $_POST['base'];
            $resultado = '';

            // Conversão para a base escolhida
            switch ($base) {
                case 'bin':
                    $resultado = decbin($numero);
                    break;
                case 'oct':
                    $resultado = decoct($numero);
                    break;
                case 'hex':
                    $resultado = strtoupper(dechex($numero));
                    break;
                default:
                    $resultado = "Base inválida!";
            }

            echo "<div class='resultado'>Resultado: $resultado</div>";
        }
        ?>
    </div>
</body>
</html>
