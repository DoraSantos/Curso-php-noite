<?php
include 'config.php';


$result = $conn->query("SELECT * FROM clientes");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clientes da Padaria</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>❤️ Lista de Clientes Padaria Toque de Arte 👌</h1>
    <a href="add.php">Adicionar Novo Cliente</a>
    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Bairro</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['nome']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['sexo']); ?></td>
            <td><?= htmlspecialchars($row['bairro']); ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>">Editar</a> |
                <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Tem certeza?')">Deletar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
