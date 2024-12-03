<?php

//Criando um array com 20 elementos(nome de cidades)
$cities = [
    "São Paulo","Rio de Janeiro","Belo Horizonte","Brasília","Curitiba",
    "Salvador","Fortaleza","Porto Alegre","Manaus","Recife",
    "Belém","Florianópolis","Goiânia","Campo Grande","Natal",
    "joão Pessoa","Maceió","Aracaju","Vitória","Cuiabá"
];


//Personalizando o array e exibindo o índice e o valor de cada elemento
foreach ($cities as $index => $city){
    if ( strpos($city, "B") === 0  ){

    echo "$city<br>";
    }

}
