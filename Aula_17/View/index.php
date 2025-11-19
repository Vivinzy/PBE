<?php 

namespace Aula_17;

use Aula_17\LivroController;

require_once __DIR__. '\\..\\Controller\\LivroController.php';
$controller = new LivroController();

if ($_SERVER ['REQUEST_METHOD'] === 'POST') { 
    $acao = $_POST['acao'] ?? ''; 
    
    if ($acao === 'criar'){ 
        $controller->criar(
            $_POST['titulo'] ?? '',   
            $_POST['autor'] ?? '',   
            $_POST['ano'] ?? 0,      
            $_POST['genero'] ?? '',   
            $_POST['quantidade'] ?? 0 
        );
    } elseif ($acao === 'deletar'){
        $controller->deletar($_POST['id'] ?? null); 
    }
}
$livro = $controller->ler();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicione seu Livro</title>
</head>
<body>
    <style>
        body {
    font-family: sans-serif;
    padding: 20px;
} 
    form { 
    background-color: #d1d9ffff;
    padding: 20px;
    border-radius: 8px;
    max-width: 400px;
    margin: 20px 0;
}
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px 0;
            display: inline-block;
            border: 1px solid #000000ff;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-acao {
        background: none !important; /* remove o fundo */
        padding: 0 !important; /* remove o padding */
        box-shadow: none !important; /* remove a sombra */
        display: inline-block !important; 
        margin: 0;
}
        /* Estilo do Formulário de Cadastro */
        h1 { color: #333; }
        
        input[type="text"], input[type="number"], select {
            flex-grow: 1; 
            min-width: 150px;
            padding: 10px;
            border: 1px solid #ffb8f2ff;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        label {
            display: block;
            margin-top: 5px; /* Ajuste aqui */
            font-weight: bold;
            width: 100%; 
            font-size: 14px;
        }

        .form-group {
            flex-grow: 1;
            min-width: 150px;
            /* Garante que o input e a label fiquem juntos */
            display: flex;
            flex-direction: column;
        }

        /* Botão para o Cadastro */
        button[type="submit"].criar {
            /* Fixa o tamanho do botão para alinhar melhor */
            height: 40px; 
            padding: 0 20px;
            color: black; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
            margin-top: 15px; /* Empurra para baixo para alinhar com os inputs */
        }
        
        /* Estilo da Tabela de Bebidas (as cadastradas) */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            box-shadow: 0 4px 8px rgba(230, 172, 204, 0.1);
            background-color: #fff;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ffb5ebff;
        }
        
        th {
            background-color: #ffdaeeff;
            color: black;
            text-transform: uppercase;
        }
        
        tr:nth-child(even) {
            background-color: #f4f4f4; /* Linhas zebradas */
        }
        
        /* Estilo dos botões de Ações (Editar e Excluir) */
        td:last-child {
            /* Garante que a coluna Ações não fique muito estreita */
            white-space: nowrap; 
            width: 1%;
        }

        button[type="submit"] {
            padding: 8px 12px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
            font-weight: bold;
            margin-right: 5px; 
            transition: background-color 0.3s;
        }

        /* Botão Editar */
        .btn-editar {
            background-color: #ffd8faff; 
            color: black;
        }
        .btn-editar:hover {
            background-color: #d99cb8ff;
        }

        /* Botão Excluir */
        .btn-deletar {
            background-color: #e8d4feff; 
            color: black;
        }
        .btn-deletar:hover {
            background-color: #9d64ffff;
        }

        /* Alinhamento dos campos de ações */
        td {
            vertical-align: middle;
        }

    </style>
<h1>Formulário para preenchimento de Livros</h1>
    <form method="POST">
        <input type="hidden" name="acao" value="criar">
        <input type="text" name="titulo" placeholder="Nome do livro:" required>
        <select name="genero" required>
            <option value="">Selecione o Gênero</option>
            <option value="Narrativo">Narrativo</option>
            <option value="Fantasia">Fantasia</option>
            <option value="Ficção Científica">Ficção Científica</option>
            <option value="Romance">Romance</option>
            <option value="Suspense">Suspense</option>
            <option value="Aventura">Aventura</option>
            <option value="Terror">Terror</option>
            <option value="Religioso e Espiritualidade">Religioso e Espiritualidade</option>
        </select>
        <input type="text" name="autor" placeholder="Autor EX:Paulo Coelho" required>
        <input type="number" name="quantidade" step="01" placeholder="Quantidade:" required>
        <input type="number" name="ano" placeholder="Ano de Lançamento:" required>
        <?php
    echo '<button type="submit" style="padding: 10px 20px; 
    background-color: #ffd8faff;
     color: black; 
     border: none; 
     border-radius: 4px; 
     cursor: pointer;">Cadastrar</button>';
    ?>
    </form>
    <h2>Livros Cadastradas</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Ano</th>
                <th>Genero</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livro as $livros): ?>
            <tr>
                <td><?php echo htmlspecialchars($livros->getId()); ?></td>
                <td><?php echo htmlspecialchars($livros->getTitulo()); ?></td>
                <td><?php echo htmlspecialchars($livros->getAutor()); ?></td>
                <td>R$ <?php echo number_format($livros->getAno(), 2, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($livros->getGenero()); ?></td>
                <td><?php echo htmlspecialchars($livros->getQuantidade()); ?></td>
                <td>
                    <form method="POST" class="form-acao" style="display: inline;">
                <input type="hidden" name="acao" value="deletar">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($livros->getId()); ?>">
                <button type="submit" style="background-color: #d6b3ffff; border-radius: 4px; cursor: pointer;">Excluir</button>
            </form>

            <form method="POST" class="form-acao" action="editar.php" style="display: inline;">
            <input type="hidden" name="acao" value="editar">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($livros->getId()); ?>">
                <button type="submit" style="background-color: #d6b3ffff; border-radius: 4px; cursor: pointer;">Editar</button>
            </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
