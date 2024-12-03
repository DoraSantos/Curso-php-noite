<?php
// Passo 1: Definir o salário inicial do trabalhador
$salario =  2000; /* valor do salário inicial */

// Passo 2: Aplicar aumento de 10%
$salario += $salario * 0.10;

// Passo 3: Aplicar desconto de 15%
$salario -= $salario * 0.15;

// Passo 4: Aplicar aumento de 40%
$salario += $salario * 0.40;

// Passo 5: Exibir o valor final do salário
echo "O salário final, após todos os ajustes, é: R$ " . number_format($salario, 2, ',', '.');
?>
