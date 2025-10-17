<?php

require_once "CRUD.php";
require_once "AlunoDAO.php"; // incluir os codigos de outro arquivo no arquivo atual

// Objeto da classe AlunoDAO para gerenciar os métodos do CRUD
$dao = new AlunoDAO();

// CREATE

$dao-> criarAluno(new Aluno(1, "Maria", "Desing")); 

$dao->criarAluno(new Aluno(2, "Gabriel", "Moda"));

$dao->criarAluno(new Aluno(3, "Eduardo", "Manicure"));

//Crie mais 6 objetos obedecendo a seguinte lista:
// Id - Nome - Curso
// 4 - Aurora - Arquitetura
// 5 - Oliver - Director
// 6 - Amanda - Lutadora 
// 7 - Geysa - Engenheira 
// 8 - Joab - Professor 
// 9 - Bernardo - Streamer
$dao-> criarAluno(new Aluno (4, "aurora", "arquitetura"));
$dao -> criarAluno(new Aluno (5, "Oliver", "director"));
$dao -> criarAluno(new Aluno (6, "amanda", "lutadora"));
$dao -> criarAluno(new Aluno (7, "geysa", "engenhaira"));
$dao -> criarAluno(new Aluno (8, "joab", "professor"));
$dao -> criarAluno(new Aluno (9, "bernardo", "streamer"));

// READ

echo "\nListagem Inicial:\n";
foreach ($dao->lerAluno()as $aluno) { 
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()} \n";
}

// uptade

$dao->atualizarAluno(3, "Viviane", "Eletricista");
// Faça as seguintes atualizações:
// - Alterar nome da Geysa para Clotilde
// - Alterar nome Joab para Joana
// - Alterar curso do Bernado para Dev
// - Alterar curso Amanda para Logistica
// - Alterar curso do Oliver para Eletrica

$dao->atualizarAluno(7, "clotilde", "engenharia");
$dao->atualizarAluno(8, "joana", "professor");
$dao->atualizarAluno(9, "bernardo", "Dev");
$dao->atualizarAluno(6, "amanda", "logistica");
$dao->atualizarAluno(5, "Oliver", "eletrica");


echo "\n Após Atualização:\n";
foreach ($dao->lerAluno() as $aluno) {
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()} \n";                       
}
 



// DELETE
$dao->excluirAluno(2);

echo "\nApós exclusão:\n";
foreach ($dao->lerAluno() as $aluno) {
    echo "{$aluno->getId()} -  {$aluno->getNome()} -  {$aluno->getCurso()} \n";
}

?>