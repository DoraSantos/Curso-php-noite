<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            border: none;
            background: #007BFF;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            text-align: left;
            padding: 10px;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>CRUD de Produtos</h1>
    <div class="container">
        <!-- Formulário para criar ou atualizar produtos -->
        <form method="POST" action="">
            <div class="form-group">
                <label for="id">ID do Produto:</label>
                <input type="number" name="id" id="id" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome do Produto:</label>
                <input type="text" name="nome" id="nome" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço do Produto:</label>
                <input type="number" name="preco" id="preco" step="0.01" required>
            </div>
            <button type="submit" name="acao" value="criar">Criar Produto</button>
            <button type="submit" name="acao" value="atualizar">Atualizar Produto</button>
        </form>

        <!-- Formulário para deletar produto -->
        <form method="POST" action="" style="margin-top: 20px;">
            <div class="form-group">
                <label for="id-delete">ID do Produto para Deletar:</label>
                <input type="number" name="id-delete" id="id-delete" required>
            </div>
            <button type="submit" name="acao" value="deletar" style="background: #dc3545;">Deletar Produto</button>
        </form>

        <!-- Tabela de produtos -->
        <h2>Lista de Produtos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Sessão para armazenar os produtos
                session_start();
                if (!isset($_SESSION['produtos'])) {
                    $_SESSION['produtos'] = [];
                }

                // Lógica do CRUD
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $acao = $_POST['acao'];
                    
                    if ($acao === 'criar') {
                        // Criar produto
                        $id = $_POST['id'];
                        $nome = $_POST['nome'];
                        $preco = $_POST['preco'];
                        $_SESSION['produtos'][$id] = ['nome' => $nome, 'preco' => $preco];
                    } elseif ($acao === 'atualizar') {
                        // Atualizar produto
                        $id = $_POST['id'];
                        $nome = $_POST['nome'];
                        $preco = $_POST['preco'];
                        if (isset($_SESSION['produtos'][$id])) {
                            $_SESSION['produtos'][$id] = ['nome' => $nome, 'preco' => $preco];
                        }
                    } elseif ($acao === 'deletar') {
                        // Deletar produto
                        $id = $_POST['id-delete'];
                        unset($_SESSION['produtos'][$id]);
                    }
                }

                // Exibir produtos na tabela
                foreach ($_SESSION['produtos'] as $id => $produto) {
                    echo "<tr>
                            <td>{$id}</td>
                            <td>{$produto['nome']}</td>
                            <td>R$" . number_format($produto['preco'], 2, ',', '.') . "</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
