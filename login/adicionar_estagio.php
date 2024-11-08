<?php
session_start(); // Mova o session_start para o início
require_once __DIR__ . "/app/model/Estagiobanco.php"; // Certifique-se de que a inclusão está no começo também

include 'header.php';

// Verifica se o usuário está autenticado
$usuarioId = $_SESSION['usuario_id'] ?? null;

if ($usuarioId) {
    // Verifica se os dados do formulário foram enviados
    if (isset($_POST['empresa'], $_POST['funcionario'], $_POST['data'], $_POST['horario'])) {
        // Dados do estágio a serem salvos
        $empresa = $_POST['empresa'];
        $funcionario = $_POST['funcionario'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];

        // Instancia a classe Estagiobanco e tenta salvar o estágio
        $Estagiobanco = new Estagiosbanco();
        $novoEstagioId = $Estagiobanco->cadastrarestagios($empresa, $funcionario, $data, $horario,$usuarioId);

        if ($novoEstagioId) {
            try {
                // Associa o estágio ao usuário na tabela user_est
                $pdo = new PDO("sqlite:banco.db");  // Certifique-se de usar o banco correto
                $sql = "INSERT INTO user_est (usuario_id, estagio_id) VALUES (:usuario_id, :estagio_id)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':usuario_id', $usuarioId, PDO::PARAM_INT);
                $stmt->bindParam(':estagio_id', $novoEstagioId, PDO::PARAM_INT);
                $stmt->execute();
        
                echo "<p class='notification is-success'>Estágio e associação salvos com sucesso!</p>";
            } catch (PDOException $e) {
                echo "<p class='notification is-danger'>Erro ao associar o estágio ao usuário: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p class='notification is-danger'>Erro ao salvar o estágio.</p>";
        }
    }
}
?>

<section class="section">
    <div class="container">
        <h2 class="title has-text-centered">Adicionar Estágio</h2>
        <form method="post" action="">
            <div class="field">
                <label class="label">Empresa:</label>
                <div class="control">
                    <input class="input" type="text" name="empresa" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Número de Funcionário:</label>
                <div class="control">
                    <input class="input" type="number" name="funcionario" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Data:</label>
                <div class="control">
                    <input class="input" type="date" name="data" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Horário:</label>
                <div class="control">
                    <input class="input" type="time" name="horario" required>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="button is-primary" type="submit" value="Adicionar Estágio">
                </div>
            </div>
        </form>
        <!-- Botão de voltar -->
        <div class="has-text-centered">
            <a class="button is-light" href="conteudo.php">Voltar para Conteúdo</a>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
