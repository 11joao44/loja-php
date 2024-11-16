-- Criação banco de dados se ele ainda não existir
CREATE DATABASE IF NOT EXISTS loja;
USE loja;

-- Criação da tabela de produtos se ele ainda não existir
CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    estoque INT DEFAULT 0,
    data_adicionado TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);