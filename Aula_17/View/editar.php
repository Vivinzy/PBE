<?php

namespace Aula_17;

use Aula_17\LivroController;

require_once __DIR__. '\\..\\Controller\\LivroController.php'; 

$controller = new LivroController(); 

$livroParaEditar = null; 
$nomeOriginal = '';  

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['acao'] ?? '') === 'atualizar') { 
    
    $id = $_POST['id'] ?? ''; 
    $titulo    = $_POST['titulo'] ?? '';
    $autor       = $_POST['autor'] ?? ''; 
    $ano        = $_POST['ano'] ?? 0;  
    $genero         = $_POST['genero'] ?? 0;
    $quantidade    = $_POST['quantidade'] ?? 0;

    $controller->editar($id, $titulo, $autor, $ano, $genero, $quantidade); 
    
    header('Location: index.php'); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Id'])) { 
    $nomeOriginal = $_POST['Id'];
    $livroParaEditar = $controller->buscar($id);
    
    if (!$livroParaEditar) { 
        header('Location: index.php'); 
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { background: #f4f4f4; padding: 20px; border-radius: 8px; max-width: 400px; margin: 20px 0; }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px 0;
            display: inline-block;
            border: 1px solid #ffc5ecff;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 10px 20px; 
            background-color: #e39dd9ff; 
            color: black; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Editar Livro: <?php echo htmlspecialchars($livroParaEditar->getId()); ?></h1>
    
    <form method="POST">
        <input type="hidden" name="acao" value="atualizar"> 
        
        <input type="hidden" name="nomeOriginal" value="<?php echo htmlspecialchars($nomeOriginal); ?>"> 
        
        
        <label for="nome_display">Titulo</label>
        <input type="text" id="nome_display" value="<?php echo htmlspecialchars($livroParaEditar->getTitulo()); ?>" disabled> 
        

        <label for="genero">Genero:</label>
        <select name="genero" id="genero" required>
            <?php $currentCat = $livroParaEditar->getGenero(); ?>
            <option value="Narrativo" <?php if ($currentCat === 'Narrativo') echo 'selected'; ?>>Narrativo</option>
            <option value="Fantasia" <?php if ($currentCat === 'Fantasia') echo 'selected'; ?>>Fantasia</option>
            <option value="Ficção Científica" <?php if ($currentCat === 'Ficção Científica') echo 'selected'; ?>>Ficção Científica</option>
            <option value="Romance" <?php if ($currentCat === 'Romance') echo 'selected'; ?>>Romance</option>
            <option value="Suspense" <?php if ($currentCat === 'Suspense') echo 'selected'; ?>>Suspense</option>
            <option value="Terror" <?php if ($currentCat === 'Terror') echo 'selected'; ?>>Terror</option>
            <option value="Aventura" <?php if ($currentCat === 'Aventura') echo 'selected'; ?>>Aventura</option>
            <option value="Religioso e Espiritualidade" <?php if ($currentCat === 'Religioso e Espiritualidade') echo 'selected'; ?>>Religioso e Espiritualidade</option>

        </select>
        
        <label for="autor">Autor:</label>
        <input type="text" name="Autor" id="autor" value="<?php echo htmlspecialchars($livroParaEditar->getAutor()); ?>" required>
        

        <label for="ano">Ano:</label>
        <input type="number" name="Ano" id="ano" step="0.01" value="<?php echo htmlspecialchars($livroParaEditar->getAno()); ?>" required>
        

        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" value="<?php echo htmlspecialchars($livroParaEditar->getQuantidade()); ?>" required>
        

        <button type="submit">Salvar Alterações</button>
    </form>
    
    <p><a href="index.php">Voltar para a lista</a></p>
</body>
</html>