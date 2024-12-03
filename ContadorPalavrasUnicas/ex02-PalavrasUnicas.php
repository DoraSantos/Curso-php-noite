<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Palavras Únicas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h1 {
            margin-bottom: 20px;
        }
        textarea {
            width: 100%;
            height: 100px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            resize: none;
            font-size: 16px;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background: #45a049;
        }
        .resultado {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contador de Palavras Únicas</h1>
        <form method="post">
            <textarea name="texto" placeholder="Digite o texto aqui..."></textarea>
            <br>
            <button type="submit">Contar Palavras Únicas</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $texto = $_POST['texto'];
            if (!empty($texto)) {
                // Converter para minúsculas e dividir em palavras
                $palavras = preg_split('/\s+/', strtolower(trim($texto)));
                // Obter palavras únicas
                $palavrasUnicas = array_unique($palavras);
                // Contar palavras únicas
                $quantidade = count($palavrasUnicas);
                echo "<div class='resultado'>Resultado: $quantidade palavras únicas.</div>";
            } else {
                echo "<div class='resultado'>Por favor, insira um texto!</div>";
            }
        }
        ?>
    </div>
</body>
</html>
