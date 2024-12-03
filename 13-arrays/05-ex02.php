<?php

// Cadastro de Clientes
$clientes = [
    ["nome" => "João Silva", "idade" => 30, "email" => "joao@gmail.com"],
    ["nome" => "Maria Oliveira", "idade" => 25, "email" => "maria@gmail.com"],
    ["nome" => "Pedro Santos", "idade" => 35, "email" => "pedro@gmail.com"],
    ["nome" => "Ana Costa", "idade" => 28, "email" => "ana@gmail.com"],
    ["nome" => "Lucas Almeida", "idade" => 40, "email" => "lucas@gmail.com"],
    ["nome" => "Carla Nunes", "idade" => 22, "email" => "carla@gmail.com"],
    ["nome" => "Rafael Souza", "idade" => 33, "email" => "rafael@gmail.com"],
    ["nome" => "Fernanda Lima", "idade" => 27, "email" => "fernanda@gmail.com"],
    ["nome" => "Bruno Rocha", "idade" => 29, "email" => "bruno@gmail.com"],
    ["nome" => "Juliana Duarte", "idade" => 31, "email" => "juliana@gmail.com"],
];

// Cadastro de Funcionários
$funcionarios = [
    ["nome" => "Carlos Mendes", "cargo" => "Gerente", "salario" => 4500],
    ["nome" => "Luciana Castro", "cargo" => "Recepcionista", "salario" => 1500],
    ["nome" => "Ricardo Borges", "cargo" => "Contador", "salario" => 3500],
    ["nome" => "Paula Marques", "cargo" => "RH", "salario" => 3000],
    ["nome" => "Felipe Ramos", "cargo" => "TI", "salario" => 4000],
    ["nome" => "Renata Farias", "cargo" => "Marketing", "salario" => 3200],
    ["nome" => "Gabriel Lima", "cargo" => "Vendas", "salario" => 2800],
    ["nome" => "Sofia Andrade", "cargo" => "Secretária", "salario" => 1800],
    ["nome" => "Marcelo Vieira", "cargo" => "Logística", "salario" => 2700],
    ["nome" => "Isabela Moreira", "cargo" => "Financeiro", "salario" => 3800],
];

// Cadastro de Vendedores
$vendedores = [
    ["nome" => "Fábio Monteiro", "região" => "Norte", "vendas" => 120],
    ["nome" => "Thiago Lopes", "região" => "Sul", "vendas" => 140],
    ["nome" => "Aline Barros", "região" => "Centro", "vendas" => 160],
    ["nome" => "Leandro Ferreira", "região" => "Leste", "vendas" => 100],
    ["nome" => "Mariana Cruz", "região" => "Oeste", "vendas" => 130],
    ["nome" => "Patrícia Neves", "região" => "Norte", "vendas" => 110],
    ["nome" => "Anderson Silva", "região" => "Sul", "vendas" => 150],
    ["nome" => "Beatriz Campos", "região" => "Centro", "vendas" => 170],
    ["nome" => "Fernando Dias", "região" => "Leste", "vendas" => 90],
    ["nome" => "Camila Teixeira", "região" => "Oeste", "vendas" => 125],
];

// Cadastro de Sócios
$socios = [
    ["nome" => "Eduardo Martins", "cota" => 30],
    ["nome" => "Adriana Alves", "cota" => 25],
    ["nome" => "Roberto Lima", "cota" => 20],
    ["nome" => "Lúcia Gomes", "cota" => 15],
    ["nome" => "Paulo César", "cota" => 10],
    ["nome" => "Cláudia Pereira", "cota" => 20],
    ["nome" => "Renato Moreira", "cota" => 30],
    ["nome" => "Simone Oliveira", "cota" => 25],
    ["nome" => "Antônio Silva", "cota" => 10],
    ["nome" => "Helena Santos", "cota" => 15],
];

// Cadastro de Patrocinadores
$patrocinadores = [
    ["nome" => "Empresa A", "valor" => 50000],
    ["nome" => "Empresa B", "valor" => 30000],
    ["nome" => "Empresa C", "valor" => 40000],
    ["nome" => "Empresa D", "valor" => 60000],
    ["nome" => "Empresa E", "valor" => 20000],
    ["nome" => "Empresa F", "valor" => 35000],
    ["nome" => "Empresa G", "valor" => 45000],
    ["nome" => "Empresa H", "valor" => 55000],
    ["nome" => "Empresa I", "valor" => 25000],
    ["nome" => "Empresa J", "valor" => 70000],
];

// Exibição dos dados
function exibirDados($titulo, $dados) {
    echo "<h2>$titulo</h2>";
    foreach ($dados as $registro) {
        foreach ($registro as $campo => $valor) {
            echo "<strong>$campo:</strong> $valor<br>";
        }
        echo "<hr>";
    }
}

exibirDados("Clientes", $clientes);
exibirDados("Funcionários", $funcionarios);
exibirDados("Vendedores", $vendedores);
exibirDados("Sócios", $socios);
exibirDados("Patrocinadores", $patrocinadores);

?>
