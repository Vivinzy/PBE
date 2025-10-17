<?php

class Calculadora {
    public function somar(...$numeros) {
        $quantidade = count($numeros);
        if ($quantidade === 2 || $quantidade === 3) {
            return array_sum($numeros);
        } else {
            return "Número de argumentos inválido. Use 2 ou 3.";
        }
    }
}

$quantidade = count($argv) - 1;

$calc = new Calculadora();

if ($quantidade === 2) {
    $num1 = $argv[1];
    $num2 = $argv[2];
    echo "Resultado: " . $calc->somar($num1, $num2) . "\n";
} elseif ($quantidade === 3) {
    $num1 = $argv[1];
    $num2 = $argv[2];
    $num3 = $argv[3];
    echo "Resultado: " . $calc->somar($num1, $num2, $num3) . "\n";
} else {
    echo "Número de argumentos inválido! Use 2 ou 3 números como argumentos.\n";
}
?>

