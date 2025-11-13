<?php

// Crie uma classe 'produtos'  com os atributos: còdigo, nome e preco. Após isso faça a ProdutosDAO para a utilização dos métodos CRUD. 
// Por último faça um index.php para testar a criação e manipulação dos objetos. Implemente a persistencia de dados com o arquivo 'produtos.json'
namespace Aula_14;

require_once "Produto.php"; // importa a classe Produto
require_once "index.php";

class ProdutosDAO { //atributo que guarda os produtos em um array
    private $Produtos = []; 
    private $arquivo = "Produtos.json"; 


    public function __construct() {
        if (file_exists($this->arquivo)) {
        
        $conteudo = file_get_contents
        ($this->arquivo); 

        $dados = json_decode ($conteudo,true); 

        if ($dados) {
            foreach ($dados as $codigo => $info){
                $this ->Produtos[$codigo] = new Produtos(
                    $info ['codigo'],
                    $info ['nome'],
                    $info ['preco']
                );
            }
        }
        }
    }

    private function salvarEmArquivo() { // salva os dados do array no arquivo JSON
        $dados = [];

        foreach ($this->Produtos as $codigo => $Produto) {
            $dados[$codigo] = [
                'codigo' => $Produto->getcodigo(),
                'nome' => $Produto->getNome(),
                'preco' => $Produto->getpreco()
            ];
        }

            file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT)); // salva o array como JSON no arquivo
        }


        public function criarProduto(Produtos $produtos){  // adiciona novo produto ao array
            $this->Produtos[$produtos->getcodigo()] = $produtos;
            $this->salvarEmArquivo(); 
        }
        public function lerProduto(): array{ 
            return  $this->Produtos;
        }

        public function atualizarProduto($codigo, $novoProduto, $novopreco){
            if (isset($this ->Produtos [$codigo])) {
                $this -> Produtos[$codigo]-> setNome($novoProduto);
                $this -> Produtos[$codigo]-> setPreco($novopreco);
            }
            $this->salvarEmArquivo();
        }

        public function excluirProduto($codigo){
            unset($this->Produtos[$codigo]);
            $this->salvarEmArquivo();
        }
}
?>