<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM clientes WHERE id=$id");
$cliente = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $bairro = $_POST['bairro'];

    $conn->query("UPDATE clientes SET nome='$nome', email='$email', sexo='$sexo', bairro='$bairro' WHERE id=$id");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0000FF;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: #d3d3d3	(0,0,255);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555555;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #B0C4DE;
            outline: none;
            box-shadow: 0 0 5px Blue	#d3d3d3	(0,0,255);
        }

        .form-button {
            text-align: center;
        }

        .form-button button {
            background-color: #B0C4DE;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-button button:hover {
            background-color: #0000FF;
        }

        /* Responsividade */
        @media (max-width: 500px) {
            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Editar Cliente</h1>
        <form method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($cliente['nome']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($cliente['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo" required>
                    <option value="Masculino" <?= $cliente['sexo'] == 'Masculino' ? 'selected' : ''; ?>>Masculino</option>
                    <option value="Feminino" <?= $cliente['sexo'] == 'Feminino' ? 'selected' : ''; ?>>Feminino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" name="bairro" value="<?= htmlspecialchars($cliente['bairro']); ?>" required>
            </div>
            <div class="form-button">
                <button type="submit">Atualizar</button>
            </div>
        </form>
    </div>
</body>
</html>
