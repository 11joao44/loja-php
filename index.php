<?php include 'base_dados.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Loja de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Produtos Disponíveis</h1>
    <a href="adicionar_produto.php">Adicionar Produto</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>

        <?php
        $stmt = $pdo->query('SELECT * FROM produtos');
        while ($row = $stmt->fetch()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nome']}</td>
                    <td>{$row['descricao']}</td>
                    <td>R$ {$row['preco']}</td>
                    <td>{$row['quantidade']}</td>
                    <td>
                        <a href='editar_produto.php?id={$row['id']}'>Editar</a> |
                        <a href='deletar_produto.php?id={$row['id']}'>Excluir</a>
                    </td>
                </tr>";
        }
        ?>
    </table>
</body>

</html>