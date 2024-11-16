<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
</head>

<body>
    <h1>Adicionar Novo Produto</h1>
    <form action="adicionar_produto.php" method="post">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>
        <label>Descrição:</label>
        <textarea name="descricao"></textarea><br>
        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" required><br>
        <label>Quantidade:</label>
        <input type="number" name="quantidade" required><br>
        <button type="submit" name="adicionar">Adicionar Produto</button>
    </form>

    <?php
    if (isset($_POST['adicionar'])) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];

        $stmt = $pdo->prepare('INSERT INTO produtos (nome, descricao, preco, quantidade) VALUES (?, ?, ?, ?)');
        $stmt->execute([$nome, $descricao, $preco, $quantidade]);

        echo "Produto adicionado com sucesso!";
        header("Location: index.php");
    }
    ?>
</body>

</html>