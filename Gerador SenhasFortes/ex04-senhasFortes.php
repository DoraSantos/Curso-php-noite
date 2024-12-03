<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Senhas Fortes</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #FF007F, #00FFFF);
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
            box-shadow: 0 0 20px #FFFFFF;
            max-width: 400px;
            width: 90%;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #FFD700;
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
            color: #00FF7F;
            box-shadow: 0 0 10px #00FF7F;
        }
        button {
            background: #FF007F;
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
            color: #00FFFF;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerador de Senhas Fortes</h1>
        <form method="post">
            <input type="number" name="comprimento" placeholder="Comprimento da senha (ex: 12)" min="8" max="32" required>
            <button type="submit">Gerar Senha</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comprimento = intval($_POST['comprimento']);
            if ($comprimento >= 8 && $comprimento <= 32) {
                // Caracteres para gerar a senha
                $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{}|;:,.<>?';
                $senha = '';

                // Gerar a senha aleatória
                for ($i = 0; $i < $comprimento; $i++) {
                    $senha .= $caracteres[random_int(0, strlen($caracteres) - 1)];
                }

                echo "<div class='resultado'>Senha Gerada: <strong>$senha</strong></div>";
            } else {
                echo "<div class='resultado'>Por favor, escolha um comprimento entre 8 e 32 caracteres.</div>";
            }
        }
        ?>
    </div>
</body>
</html>
