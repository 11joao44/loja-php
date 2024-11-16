<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
</head>

<body>
    <?php
    $id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM produtos WHERE id = ?');
    $stmt->execute([$id]);
    $produto = $stmt->fetch();

    if (!$produto) {
        echo "Produto não encontrado!";
        exit;
    }
    ?>

    <h1>Editar Produto</h1>
    <form action="editar_produto.php?id=<?php echo $id; ?>" method="post">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required><br>
        <label>Descrição:</label>
        <textarea name="descricao"><?php echo $produto['descricao']; ?></textarea><br>
        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" value="<?php echo $produto['preco']; ?>" required><br>
        <label>Quantidade:</label>
        <input type="number" name="quantidade" value="<?php echo $produto['quantidade']; ?>" required><br>
        <button type="submit" name="atualizar">Atualizar Produto</button>
    </form>

    <?php
    if (isset($_POST['atualizar'])) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];

        $stmt = $pdo->prepare('UPDATE produtos SET nome = ?, descricao = ?, preco = ?, quantidade = ? WHERE id = ?');
        $stmt->execute([$nome, $descricao, $preco, $quantidade, $id]);

        echo "Produto atualizado com sucesso!";
        header("Location: index.php");
    }
    ?>
</body>

</html>