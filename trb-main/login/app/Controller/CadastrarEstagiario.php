<?php
require_once '../Database/Conectar.php';
require_once '../Model/Estagiario.php';
try {
    // Conecta ao banco SQLite
    $banco = new PDO("sqlite:" . __DIR__ . "/../../banco.db");
    $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $estagiario = new Estagiario($banco);

    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    
    $curso = $_POST['curso'];
    $data_inicio = $_POST['data_inicio'];
    $duracao = $_POST['duracao'];

    // Chama o método para cadastrar o estagiário
    if ($estagiario->cadastrarEstagiario($nome, $email, $telefone, $curso, $data_inicio, $duracao)) {
        echo "Estagiário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar estagiário. Tente novamente.";
    }

} catch (PDOException $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}
?>

