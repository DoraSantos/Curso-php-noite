<?php
//Usando variavel do tipo boolean(false e true)
$logado = true;

if ($logado) {
    echo 'Bem-vindo ao painel de controle.';

} else {
    echo "Você não está logado. Faça login!";
}
//==============================================

echo "<hr>";
// ponto flutuante:
$altura = 1.84;
echo "altura : $altura m "; //Saida: altura 1.85
// ====================
echo "<hr>";
//Integer
$idade = 17.5;
echo "Idade: $idade";
// ====================
echo "<hr>";
//Array:
$filhos = ["joão","Maria","Pedro","Ana"];
echo $filhos[1];
// ====================
echo "<hr>";
//Objeto:
class Pessoa{
    public $nome;
    public $idade; 

    public function __construct($nome,$idade){
        $this->nome =$nome;
        $this->idade = $idade;
    }

    public function apresentar(){
        return "Olá, meu nome é $this->nome e tenho $this->idade anos.";
    
    }
}
$pessoa = new Pessoa("Dora", 55);
echo $pessoa->apresentar();


?>