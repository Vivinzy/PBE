<?php

$modelo_carro1= "Versa";
$marca_carro1="Nissan";
$ano_carro1=2020;
$revisao_carro1=true;
$ndonos_carro1=2;

$modelo_carro2="M5";
$marca_carro2="BMW";
$ano_carro2=2018;
$revisao_carro2=false;
$ndonos_carro2=2;

$modelo_carro3="911";
$marca_carro3="Porsche";
$ano_carro3=2026;
$revisao_carro3=false;
$ndonos_carro3=1;

$modelo_carro4="Dolphin";
$marca_carro4="BYD";
$ano_carro4=2023;
$revisao_carro4=false;
$ndonos_carro4=1;

function passouRevisao ($revisaoF): bool { // Função que verifica se o carro passou na revisão
    $revisaoF=false; // Inicializa a variável $revisao como false
    return $revisaoF; // Retorna o valor da variável $revisaoF
}

$revisao = passouRevisao($revisao_carro4); // Chamada da função

function novoDono($donos): int{ // Função que incrementa o número de donos do carro
     return $donos +1; // Retorna o novo número de donos
}

$Ndonos_carro4 = novoDono(donos: $ndonos_carro4); // Chamada da função

?>