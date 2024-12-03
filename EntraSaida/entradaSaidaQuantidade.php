<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: #007BFF;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        .content h3 {
            color: #007BFF;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .table th {
            background: #007BFF;
            color: #fff;
        }

        .table tr:nth-child(even) {
            background: #f2f2f2;
        }

        .message {
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #2e7d32;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error {
            background: #ffebee;
            color: #c62828;
            border: 1px solid #c62828;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>CRUD de Produtos com Controle de Estoque</h1>
        </div>
        <div class="content">
            <?php
            ini_set('display_errors', 1);
            error_reporting(E_ALL);

            // Classe Produto
            class Produto {
                private $id;
                private $nome;
                private $preco;
                private $quantidade;

                public function __construct($id, $nome, $preco, $quantidade = 0) {
                    $this->id = $id;
                    $this->nome = $nome;
                    $this->preco = $preco;
                    $this->quantidade = $quantidade;
                }

                public function getId() { return $this->id; }
                public function getNome() { return $this->nome; }
                public function setNome($nome) { $this->nome = $nome; }
                public function getPreco() { return $this->preco; }
                public function setPreco($preco) { $this->preco = $preco; }
                public function getQuantidade() { return $this->quantidade; }
                public function adicionarQuantidade($quantidade) { $this->quantidade += $quantidade; }
                public function removerQuantidade($quantidade) {
                    if ($this->quantidade >= $quantidade) {
                        $this->quantidade -= $quantidade;
                    } else {
                        echo "<div class='error'>Erro: Quantidade insuficiente em estoque!</div>";
                    }
                }
            }

            // Classe CRUD de Produtos
            class ProdutoCRUD {
                private $produtos = [];

                public function criarProduto($id, $nome, $preco, $quantidade = 0) {
                    if (isset($this->produtos[$id])) {
                        echo "<div class='error'>Erro: Produto com ID $id já existe.</div>";
                    } else {
                        $this->produtos[$id] = new Produto($id, $nome, $preco, $quantidade);
                        echo "<div class='message'>Produto '$nome' criado com sucesso!</div>";
                    }
                }

                public function listarProdutos() {
                    if (empty($this->produtos)) {
                        echo "<div class='error'>Nenhum produto cadastrado.</div>";
                    } else {
                        echo "<h3>Lista de Produtos</h3>";
                        echo "<table class='table'>";
                        echo "<tr><th>ID</th><th>Nome</th><th>Preço</th><th>Quantidade</th></tr>";
                        foreach ($this->produtos as $produto) {
                            echo "<tr>";
                            echo "<td>" . $produto->getId() . "</td>";
                            echo "<td>" . $produto->getNome() . "</td>";
                            echo "<td>R$" . number_format($produto->getPreco(), 2, ',', '.') . "</td>";
                            echo "<td>" . $produto->getQuantidade() . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                }

                public function entradaProduto($id, $quantidade) {
                    if (isset($this->produtos[$id])) {
                        $produto = $this->produtos[$id];
                        $produto->adicionarQuantidade($quantidade);
                        echo "<div class='message'>Entrada de $quantidade unidades no produto '{$produto->getNome()}' realizada com sucesso!</div>";
                    } else {
                        echo "<div class='error'>Erro: Produto com ID $id não encontrado.</div>";
                    }
                }

                public function saidaProduto($id, $quantidade) {
                    if (isset($this->produtos[$id])) {
                        $produto = $this->produtos[$id];
                        $produto->removerQuantidade($quantidade);
                        echo "<div class='message'>Saída de $quantidade unidades do produto '{$produto->getNome()}' realizada com sucesso!</div>";
                    } else {
                        echo "<div class='error'>Erro: Produto com ID $id não encontrado.</div>";
                    }
                }
            }

            // Inicialização do CRUD
            $crud = new ProdutoCRUD();

            // Ações com POST
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $acao = $_POST['acao'] ?? null;
                $id = $_POST['id'] ?? null;
                $nome = $_POST['nome'] ?? null;
                $preco = $_POST['preco'] ?? null;
                $quantidade = $_POST['quantidade'] ?? null;

                if ($acao === 'criar' && $nome && $preco) {
                    $crud->criarProduto($id, $nome, $preco, $quantidade);
                } elseif ($acao === 'entrada' && $id && $quantidade) {
                    $crud->entradaProduto($id, $quantidade);
                } elseif ($acao === 'saida' && $id && $quantidade) {
                    $crud->saidaProduto($id, $quantidade);
                }
            }

            // Interface HTML para interação
            ?>
            <h3>Adicionar Produto</h3>
            <form method="post">
                <input type="hidden" name="acao" value="criar">
                <label>ID: <input type="number" name="id" required></label>
                <label>Nome: <input type="text" name="nome" required></label>
                <label>Preço: <input type="number" step="0.01" name="preco" required></label>
                <label>Quantidade: <input type="number" name="quantidade" required></label>
                <button type="submit">Adicionar Produto</button>
            </form>

            <h3>Entrada de Estoque</h3>
            <form method="post">
                <input type="hidden" name="acao" value="entrada">
                <label>ID do Produto: <input type="number" name="id" required></label>
                <label>Quantidade: <input type="number" name="quantidade" required></label>
                <button type="submit">Adicionar Estoque</button>
            </form>

            <h3>Saída de Estoque</h3>
            <form method="post">
                <input type="hidden" name="acao" value="saida">
                <label>ID do Produto: <input type="number" name="id" required></label>
                <label>Quantidade: <input type="number" name="quantidade" required></label>
                <button type="submit">Remover Estoque</button>
            </form>

            <?php
            // Exibir todos os produtos
            $crud->listarProdutos();
            ?>
        </div>
    </div>
</body>
</html>
