<?php

namespace Aula_17;

use PDO;

require_once 'Livro.php';
require_once 'Connection.php';

class LivroDAO {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getInstance(); //serve para obter a conexão com o banco de dados

        // Cria a tabela se não existir
        $this->conn->exec("
            CREATE TABLE IF NOT EXISTS livros (
                id INT,
                titulo VARCHAR(200),
                autor VARCHAR(150),
                ano INT,
                genero VARCHAR(100),
                quantidade INT 
            )
        ");
    }
    

    // CREATE
    public function criarLivro(Livro $livro) {
        $stmt = $this->conn->prepare("
            INSERT INTO livros  (titulo, autor, ano, genero, quantidade)
            VALUES (:id, :titulo, :autor, :ano, :genero, :quantidade)
        ");
        $stmt->execute([
            ':id' => $livro->getId(),
            ':titulo' => $livro->getTitulo(),
            ':autor' => $livro->getAutor(),
            ':ano' => $livro->getAno(),
            ':genero' => $livro->getGenero(),
            ':quantidade' => $livro->getQuantidade()
        ]);
    }

    // READ
    public function lerLivro() {
        $stmt = $this->conn->query("SELECT * FROM livros ORDER BY id");
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Livro(
                $row['id'],
                $row['titulo'],
                $row['autor'],
                $row['ano'],
                $row['genero'],
                $row['quantidade']
            );
        }
        return $result;
    }

public function atualizarLivro($id, $titulo, $autor, $ano, $genero, $quantidade) {
    $stmt = $this->conn->prepare("
        UPDATE livros 
        SET titulo = :titulo, autor = :autor, ano = :ano, genero = :genero, quantidade = :quantidade
        WHERE id = :id
    ");
    $stmt->execute([
        ':id' => $id,
        ':titulo' => $titulo,
        ':autor' => $autor,
        ':ano' => $ano,
        ':genero' => $genero,
        ':quantidade' => $quantidade
    ]);
}


public function excluirLivro($id) { 
    $stmt = $this->conn->prepare("DELETE FROM livros WHERE id = :id"); 
    $stmt->execute([':id' => $id]); 
}

public function buscarPorId($id): Livro|null { 
    $stmt = $this->conn->prepare("SELECT * FROM livros WHERE id = :id LIMIT 1"); 
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        return new Livro(
            $row['id'],
            $row['titulo'],
            $row['autor'],
            $row['ano'],
            $row['genero'],
            $row['quantidade']
        );
    }
    return null;
}

    public function buscar($id): livro|null {
        $stmt = $this->conn->prepare("SELECT * FROM livro WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Livro(
                $row['id'],
                $row['titulo'],
                $row['autor'],
                $row['ano'],
                $row['genero'],
                $row['quantidade']
            );
        }
        return null; //retorna null se não encontrar o livro //oq é null // nul
    }
}