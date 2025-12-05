<?php
namespace Aula_17;

require_once __DIR__. "\\..\\Model\\LivroDAO.php";
require_once __DIR__. "\\..\\Model\\Livro.php";

class LivroController { //class serve para controlar as acoes entre a view e o model
    private $dao;

    public function __construct() {
        $this->dao = new LivroDAO(); // serve para instanciar a classe LivroDAO
    }

    public function ler() {
        return $this->dao->lerLivro();

    }
public function criar($titulo,$autor,$ano,$genero,$quantidade) { 
    $id = time();
    $livro = new Livro( $id, $titulo, $autor, $ano, $genero, $quantidade);
    $this->dao->criarLivro($livro);
}

    public function atualizar($id, $titulo, $autor, $ano, $genero, $quantidade) {
        $this->dao->atualizarLivro($id, $titulo, $autor, $ano, $genero, $quantidade);
    }

    public function deletar($id) {
        $this->dao->excluirLivro($id);
    }

    public function editar($id, $titulo, $autor, $ano, $genero, $quantidade) {
        $this->dao->atualizarLivro($id, $titulo, $autor, $ano, $genero, $quantidade);
    }

    public function buscar($id) {
        return $this->dao->buscarPorId($id);
    }
}

?>