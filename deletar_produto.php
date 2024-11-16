<?php include 'base_dados.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('DELETE FROM produtos WHERE id = ?');
$stmt->execute([$id]);

header("Location: index.php");
?>