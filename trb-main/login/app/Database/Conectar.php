<?php
try {
    $banco = new PDO("sqlite:" . __DIR__ . "/../../banco.db"); // Banco chamado 'banco'
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Lançar exceções em erros
} catch (PDOException $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}
?>
