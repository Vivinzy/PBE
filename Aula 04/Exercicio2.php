<?php

$modelo_carro1 = "Versa";
$marca_carro1 = "Nissan";
$ano_carro1 = 2020;
$ndonos_carro1 = 2;

$modelo_carro2 = "M5";
$marca_carro2 = "BMW";
$ano_carro2 = 2018;
$ndonos_carro2 = 2;

$modelo_carro3 = "911";
$marca_carro3 = "Porsche";
$ano_carro3 = 2026;
$ndonos_carro3 = 1;

$modelo_carro4 = "Dolphin";
$marca_carro4 = "BYD";
$ano_carro4 = 2023;
$ndonos_carro4 = 1;

function ehSeminovo($ano) {
    $anoAtual = date('Y');
    return ($anoAtual - $ano) <= 3;
}

function exibirSeminovo($modelo, $ano) {
    if (ehSeminovo($ano)) {
        echo "O carro $modelo ($ano) é seminovo.\n";
    } else {
        echo "O carro $modelo ($ano) não é seminovo.\n";
    }
}

exibirSeminovo($modelo_carro1, $ano_carro1);
exibirSeminovo($modelo_carro2, $ano_carro2);
exibirSeminovo($modelo_carro3, $ano_carro3);
exibirSeminovo($modelo_carro4, $ano_carro4);

?>