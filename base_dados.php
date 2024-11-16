<?php
// Configurações do banco de dados
$host = 'localhost';
$dbname = 'loja';
$user = 'root';
$password = '1501';

try {
    // Criação da conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    
    // Configurar o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Tente realizar uma consulta para garantir que o banco de dados está acessível
    $query = $pdo->query("SELECT * FROM produtos");
    $produtos = $query->fetchAll();
    
    echo "<pre>";
    print_r($produtos); // Exibir os resultados da consulta
    echo "</pre>";
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
?>