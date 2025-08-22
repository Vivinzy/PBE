<?php
 echo"Ola! \n";
 $nome="Vitoria \n";
 $idade="20\n";
 $ano_atual ="2025";


 $data_nasc = $ano_atual-$idade;
 echo $nome, "você nasceu em:", $data_nasc;
?>


<?php 
/* 2. Dado uma frase "Programação em php." 
transformá-la em maiuscula, imprima, depois em minuscula e imprima de novo.*/

$exerc2= "Programação em php";
echo  "\nMinusculo:", $exerc2;
$exerc2= strtoupper($exerc2);
echo "\nMaiusculo:", $exerc2;   
$exerc2= strtoupper($exerc2);
echo "\nMinusculo novamente:", $exerc2;
?>


<?php
/*3. Numa dada frase "O PHP foi criado em 1995". 
- trocar o "o" por "0",
- o "a" por "4",  e o "i" por "1".*/

$exerc3 = "O PHP fo1 criado em mil novecentos e noventa e cinco";
echo "\nAntes do comando replace: \n", $exerc3; 
$exerc3 = str_replace(['o', 'a', 'i'], ['0','4','1'], $exerc3);
echo "\nApos o comando replace: \n", $exerc3;
?>

