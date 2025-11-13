<?php 
 namespace Aula_15; //
class BebidaDAO { //atributo que guarda as bebidas em um array
    private $bebidasArray = []; // array associativo

    private $arquivoJson = 'bebidas.json'; // arquivo onde os dados serao salvos

    public function __construct() { //carrega os dados do arquivo JSON, se existir
        if (file_exists($this->arquivoJson)) {
            $conteudoArquivo = file_get_contents($this->arquivoJson); // lê o conteúdo do arquivo

                $dadosArquivosEmArray = json_decode($conteudoArquivo, true);

            if ($dadosArquivosEmArray) {
                foreach ($dadosArquivosEmArray as $nome => $info) { // cria objetos Bebida e os adiciona ao array
                    $this->bebidasArray[$nome] = new Bebida(
                        $info['nome'],
                        $info['categoria'],
                        $info['volume'],
                        $info['valor'],
                        $info['qtde']
                    );
                }
            }
        }
    }

 private function salvarArquivo(){ // salva os dados do array no arquivo JSON
    $dadosParaSalvar = []; // array associativo para armazenar os dados a serem salvos

    foreach ($this->bebidasArray AS $nome => $bebida) { // percorre o array de bebidas
        $dadosParaSalvar[$nome] = [ // cria um array associativo para cada bebida
            'nome' => $bebida->getNome(), // obtém os valores usando os getters
            'categoria' => $bebida->getCategoria(), 
            'volume' => $bebida->getVolume(),
            'valor' => $bebida->getValor(),
            'qtde' => $bebida->getQtde()
        ];
    }   
    file_put_contents($this->arquivoJson, json_encode($dadosParaSalvar, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  } 
  // create
  public function criarBebidas(Bebida $bebida){ // adiciona nova bebida ao array
    $this->bebidasArray[$bebida->getNome()] = $bebida;
    $this->salvarArquivo();
  }

   // read 
    public function lerBebidas(){ // retorna todas as bebidas
        return $this->bebidasArray;
    }

  //update 
    public function atualizarBebidas($nome, $novovalor, $novaqtde){ // atualiza valor e qtde da bebida
        if (isset($this->bebidasArray[$nome])) { // verifica se a bebida existe
            $this->bebidasArray[$nome]; // acessa a bebida pelo nome
            $this->bebidasArray[$nome]->setValor($novovalor);
            $this->bebidasArray[$nome]->setQtde($novaqtde);
    
        }
        $this->salvarArquivo(); // salva as alterações no arquivo
    }

   // delete
    public function excluirBebida($nome){ // remove a bebida do array
        unset($this->bebidasArray[$nome]); // remove a bebida do array
        $this->salvarArquivo();
    }
    // editar bebida
    public function editarBebida($nome, $categoria, $volume, $valor, $qtde){
        if (isset($this->bebidasArray[$nome])) {
            $this->bebidasArray[$nome];
            $this->bebidasArray[$nome]->setCategoria($categoria);
            $this->bebidasArray[$nome]->setVolume($volume);
            $this->bebidasArray[$nome]->setValor($valor);
            $this->bebidasArray[$nome]->setQtde($qtde);
    
        }
        $this->salvarArquivo();
    }
    public function buscarBebidaPorNome($nome){
        // Retorna o objeto Bebida no índice com o nome fornecido, ou null se não existir
        return $this->bebidasArray[$nome] ?? null;
}
}
?>