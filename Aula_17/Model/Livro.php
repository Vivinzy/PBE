<?php
namespace Aula_17;


class Livro { //atributos
    private $id; 
    private $titulo;
    private $autor;
    private $ano;
    private $genero;
    private $quantidade;

    public function __construct($id, $titulo, $autor, $ano, $genero, $quantidade) { //serve para inicializar os atributos
    $this->id = $id;
    $this->titulo = $titulo;
    $this->autor = $autor;
    $this->ano = $ano; 
    $this->genero = $genero;
    $this->quantidade = $quantidade;
}
    public function getId() // servem para acessar os atributos
    {
        return $this->id; //retorna o valor do atributo id
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }
    public function getAutor()
    {
        return $this->autor;
    }
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    public function getAno()
    {
        return $this->ano;
    }
 
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }
 
    public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }
}