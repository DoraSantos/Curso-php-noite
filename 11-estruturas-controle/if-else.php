<?php 
$idade = 88;

if ($idade < 18) {
    echo "Você é menor de idade";
} else if ( $idade == 18) {
    echo "Você está pronto para pagar boletos!";
} else {
    echo "Você já paga boletos, maior de idade!";
}