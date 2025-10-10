<?php

class AlunoDAO {
    private $alunos = [];
    public function criarAluno(Aluno $aluno){
        $this->alunos[$aluno->getId()] = $aluno;
    }
    public function lerAluno(){
    }

    public function atualizarAluno(){
    }

    public function excluirAluno($id){
        unset($this->alunos[$id]);
    }
}
