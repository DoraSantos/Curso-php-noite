<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Palíndromos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #FF7E79, #0000FF);
            color: #FFFFFF;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
            max-width: 400px;
            width: 90%;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #0000FF;
        }
        input, button {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }
        input {
            background: #222;
            color :#0000FF;
            box-shadow: 0 0 10px #0000FF;
        }
        button {
            background: #FF7E79;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #FF6F61;
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
        <h1>Verificador de Palíndromos</h1>
        <form method="post">
            <input type="text" name="frase" placeholder="Digite uma palavra ou frase" required>
            <button type="submit">Verificar</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $frase = $_POST['frase'];
            
            // Remover espaços, pontuação e converter para minúsculas
            $fraseLimpa = preg_replace('/[^a-z0-9]/i', '', strtolower($frase));
            
            // Verificar se é palíndromo
            if ($fraseLimpa === strrev($fraseLimpa)) {
                echo "<div class='resultado'>\"$frase\" é um palíndromo!</div>";
            } else {
                echo "<div class='resultado'>\"$frase\" não é um palíndromo.</div>";
            }
        }
        ?>
    </div>
</body>
</html>
