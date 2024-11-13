<?php

require __DIR__.'/../Database/Conectar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebendo os dados do formulário
    $nome = $_POST['nome'];
    $cpf_cnpj = $_POST['cpf_cnpj']; // Corrigido para 'cpf_cnpj'
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];
    $estagio_id = $_POST['estagio_id'];
    $duracao = $_POST['duracao'];
    $data_inicio = $_POST['data_inicio'];

    // Validação e debug
    

   
    $databasePath = __DIR__ . '/../../banco.db'; 
    

    try {
        // Conectando ao banco usando o caminho verificado
        $pdo = new PDO("sqlite:" . $databasePath);

        // Verificação de conexão
        if (!$pdo) {
            echo "Falha na conexão com o banco de dados!";
        } else {
            echo "Conexão com o banco de dados estabelecida!";
        }

        // Verificando a existência da tabela com debug
        $query = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='estagiarios'");
        $tableExists = $query->fetch();
        


        // Executa a inserção, se a tabela existir
        if ($tableExists) {
            $stmt = $pdo->prepare("INSERT INTO estagiarios (nome, cpf_cnpj, telefone, data_nascimento, estagio_id, duracao, data_inicio) 
                                   VALUES (:nome, :cpf_cnpj, :telefone, :data_nascimento, :estagio_id, :duracao, :data_inicio)");

            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf_cnpj', $cpf_cnpj);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':estagio_id', $estagio_id);
            $stmt->bindParam(':duracao', $duracao);
            $stmt->bindParam(':data_inicio', $data_inicio);

            if ($stmt->execute()) {
                echo "Estagiário cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar o estagiário.";
            }
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
