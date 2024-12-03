<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero1 = $_POST['numero1'] ?? 0;
    $numero2 = $_POST['numero2'] ?? 0;
    $operacao = $_POST['operacao'] ?? '+';

    switch ($operacao) {
        case '+':
            $resultado = $numero1 + $numero2;
            break;
        case '-':
            $resultado = $numero1 - $numero2;
            break;
        case '*':
            $resultado = $numero1 * $numero2;
            break;
        case '/':
            $resultado = $numero2 != 0 ? $numero1 / $numero2 : 'Erro: divisão por zero';
            break;
        default:
            $resultado = 'Operação inválida';
    }

    echo "Resultado: $resultado";
}
?>
<form method="post">
    Primeiro Número: <input type="number" name="numero1" required><br>
    Segundo Número: <input type="number" name="numero2" required><br>
    Operação: 
    <select name="operacao">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select><br>
    <button type="submit">Calcular</button>
</form>
