<?php 

namespace Aula_18;

require_once __DIR__. '\\..\\Controller\\LivroController.php';
$controller = new LivroController();

// Processar ações do formulário
if ($_SERVER ['REQUEST_METHOD'] === 'POST'){ 
    $acao = $_POST['acao'] ?? ''; 
    if ($acao === 'criar'){ 
        $controller->criar(
            $_POST['titulo'],
            $_POST['genero'],
            $_POST['Autor'],
            $_POST['Ano'],
            $_POST['qtde']
        );
    } elseif ($acao === 'deletar'){
        $controller->deletar($_POST['titulo']); 
    }
}

// Processar busca
$termoBusca = $_GET['busca'] ?? '';
if (!empty($termoBusca)) {
    $livros = $controller->buscarLivros($termoBusca);
} else {
    $livros = $controller->ler();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de livros</title>
</head>
<body>
<style>
    /* 1. Alteração da Fonte para Moderna (Sans-Serif) */
    body { 
        font-family: 'Poppins', 'Helvetica Neue', Arial, sans-serif; /* Fonte Moderna */
        padding: 40px; 
        
        /* 2. Cores: Rosa Pastel e Preto */
        background-color: #fdf3f7; /* Rosa Pastel Muito Claro */
        color: #262626; /* Preto Suave para o texto */
    }
    
    h1, h2 { 
        color: #000000; /* Preto */
        border-bottom: 3px solid #f0a8c2; /* Rosa Pastel Médio */
        padding-bottom: 12px;
        margin-top: 30px;
        font-weight: 600; /* Mais encorpado para moderno */
        text-transform: uppercase;
        letter-spacing: 2px; /* Mais espaçado */
    }
    
    /* 3. Centralização dos Elementos Principais */
    .container-centralizado {
        display: flex;
        flex-direction: column;
        align-items: center; /* Centraliza horizontalmente */
    }

    /* Estilo do Formulário de Cadastro */
    form { 
        background-color: #ffffff;
        padding: 30px; 
        border-radius: 6px; 
        max-width: 650px; 
        /* Centralização - removido margin: 25px 0 e agora usa auto */
        margin: 25px auto; 
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid #f0a8c2; /* Rosa Pastel Médio */
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .form-group {
        flex-grow: 1;
        min-width: 200px;
        display: flex;
        flex-direction: column;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600; /* Mais encorpado */
        color: #000000; /* Preto */
        font-size: 15px;
    }

    input[type="text"], input[type="number"], select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #f0a8c2; /* Rosa Pastel Médio */
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
        background-color: #fff2f7; /* Rosa Pastel Leve */
        color: #262626; /* Preto Suave */
        transition: border-color 0.3s;
    }

    input[type="text"]:focus, input[type="number"]:focus, select:focus {
        border-color: #e66a98; /* Rosa Choque Suave no Foco */
        outline: none;
        box-shadow: 0 0 0 3px rgba(230, 106, 152, 0.2); /* Sombra do Foco Rosa */
    }
    
    /* Botão de Cadastro */
    .btn-cadastrar {
        height: 40px; 
        padding: 0 25px;
        background-color: #000000 !important; /* Preto */
        color: white !important; 
        border: none !important; 
        border-radius: 4px !important; 
        cursor: pointer !important;
        font-weight: 600 !important;
        transition: background-color 0.3s, transform 0.1s;
        align-self: flex-end; 
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .btn-cadastrar:hover {
        background-color: #262626 !important; /* Preto Suave */
        transform: translateY(-1px);
    }

    /* Barra de Busca */
    .search-container {
        background-color: #ffffff;
        padding: 20px 30px;
        border-radius: 6px;
        max-width: 650px;
        margin: 25px auto; /* Centralização */
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid #f0a8c2; /* Rosa Pastel Médio */
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .search-container input[type="text"] {
        flex: 1;
        margin: 0;
    }

    .btn-buscar {
        padding: 10px 25px;
        background-color: #000000; /* Preto */
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        text-transform: uppercase;
        transition: background-color 0.3s;
        white-space: nowrap;
        letter-spacing: 1px;
    }

    .btn-buscar:hover {
        background-color: #262626; /* Preto Suave */
    }

    .btn-limpar {
        padding: 10px 20px;
        background-color: #f0a8c2; /* Rosa Pastel Médio */
        color: #000000; /* Preto */
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
        text-transform: uppercase;
        transition: background-color 0.3s;
        text-decoration: none;
        display: inline-block;
        letter-spacing: 1px;
    }

    .btn-limpar:hover {
        background-color: #e66a98; /* Rosa Choque Suave */
        color: white; 
    }

    .resultado-busca {
        color: #000000; /* Preto */
        font-style: italic;
        margin: 10px 0;
    }

    /* Estilo da Tabela de Livros */
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 5px;
        margin-top: 30px;
        background-color: transparent; 
    }
    
    thead th {
        background-color: #000000; /* Preto */
        color: white;
        text-transform: uppercase;
        font-size: 14px;
        border: none;
        padding: 15px;
        font-weight: 600;
    }

    tbody tr {
        background-color: #ffffff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: box-shadow 0.3s, background-color 0.3s;
    }

    tbody tr:hover {
        background-color: #fff2f7; /* Rosa Pastel Leve no Hover */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: none;
    }
    
    tr:nth-child(even) {
        background-color: #fcfcfc; /* Alternativa de branco muito leve */
    }

    /* Estilo dos Botões de Ações */
    td:last-child {
        white-space: nowrap; 
        width: 1%;
    }

    .form-acao {
        background: none !important; 
        padding: 0 !important; 
        box-shadow: none !important; 
        display: inline-block !important; 
        margin: 0 5px 0 0;
    }
    
    .form-acao button[type="submit"] {
        padding: 7px 10px; 
        border: 1px solid #e66a98; /* Rosa Choque Suave */
        border-radius: 4px; 
        cursor: pointer;
        font-weight: 600;
        transition: background-color 0.3s;
        font-size: 13px;
        text-transform: uppercase;
    }
    
    /* Botão Excluir */
    .btn-deletar {
        background-color: #fff; 
        color: #e66a98; /* Rosa Choque Suave */
        border-color: #f0a8c2;
    }
    .btn-deletar:hover {
        background-color: #f0a8c2 !important; /* Rosa Pastel Médio */
        color: #000000 !important; /* Preto */
        border-color: #f0a8c2;
    }

    /* Botão Editar */
    .btn-editar {
        background-color: #000000; /* Preto */
        color: white;
        border-color: #000000;
    }
    .btn-editar:hover {
        background-color: #262626; /* Preto Suave */
        border-color: #262626;
    }
</style>


    <h1>Formulário para preenchimento de livros</h1>
    
    <form method="POST">
        <input type="hidden" name="acao" value="criar">
        <input type="text" name="titulo" placeholder="Titulo de livro:" required>
        <select name="genero" required>
            <option value="">Selecione a Genero</option>
            <option value="Aventura">Aventura</option>
            <option value="Romance">Romance</option>
            <option value="Literatura Brasileira">Literatura Brasileira</option>
            <option value="Terror">Terror</option>
            <option value="Suspense">Suspense</option>
            <option value="Comedia">Comedia</option>
            <option value="Fantasia">Fantasia</option>
        </select>
        <input type="text" name="Autor" placeholder="Autor:" required>
        <input type="number" name="Ano" step="0.01" placeholder="Ano (Ex: 1999):" required>
        <input type="number" name="qtde" placeholder="Quatidade em estoque:" required>
        <?php
        echo '<button type="submit" style="padding: 10px 20px; 
        background-color: #ffd8faff;
         color: black; 
         border: none; 
         border-radius: 4px; 
         cursor: pointer;">Cadastrar</button>';
        ?>
    </form>

    <h2>Pesquisar Livros</h2>
    
    <!-- Barra de Busca -->
    <form method="GET" class="search-container">
        <input 
            type="text" 
            name="busca" 
            placeholder="Buscar por título, autor ou gênero..." 
            value="<?php echo htmlspecialchars($termoBusca); ?>"
        >
        <button type="submit" class="btn-buscar">🔍 Buscar</button>
        <?php if (!empty($termoBusca)): ?>
            <a href="index.php" class="btn-limpar">✕ Limpar</a>
        <?php endif; ?>
    </form>

    <?php if (!empty($termoBusca)): ?>
        <p class="resultado-busca">
            <?php 
            $total = count($livros);
            echo "Encontrado(s) $total resultado(s) para: \"" . htmlspecialchars($termoBusca) . "\""; 
            ?>
        </p>
    <?php endif; ?>

    <h2>Livros Cadastrados</h2>
    
    <?php if (empty($livros)): ?>
        <p style="color: #795548; font-style: italic; padding: 20px;">
            <?php 
            if (!empty($termoBusca)) {
                echo "Nenhum livro encontrado com o termo \"" . htmlspecialchars($termoBusca) . "\".";
            } else {
                echo "Nenhum livro cadastrado ainda.";
            }
            ?>
        </p>
    <?php else: ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Genero</th>
                    <th>Autor</th>
                    <th>Ano</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro): ?>
                <tr>
                    <td><?php echo htmlspecialchars($livro->getTitulo()); ?></td>
                    <td><?php echo htmlspecialchars($livro->getGenero()); ?></td>
                    <td><?php echo htmlspecialchars($livro->getAutor()); ?></td>
                    <td><?php echo htmlspecialchars($livro->getAno()); ?></td>
                    <td><?php echo htmlspecialchars($livro->getQtde()); ?></td>
                    <td>
                        <form method="POST" class="form-acao" style="display: inline;">
                            <input type="hidden" name="acao" value="deletar">
                            <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($livro->getTitulo()); ?>">
                            <button type="submit" style="background-color: #d6b3ffff; border-radius: 4px; cursor: pointer;">Excluir</button>
                        </form>
                        <form method="POST" class="form-acao" action="editar.php" style="display: inline;">
                           <input type="hidden" name="acao" value="editar">
                            <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($livro->getTitulo()); ?>">
                            <button type="submit" style="background-color: #d6b3ffff; border-radius: 4px; cursor: pointer;">Editar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

</body>
</html>