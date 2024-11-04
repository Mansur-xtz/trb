<?php

include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $empresa = $_POST['empresa'];
    $funcionario = $_POST['funcionario'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];

    // Conexão com o banco de dados
    $db = $this->pdo ('banco.db');
    $stmt = $db->prepare("INSERT INTO estagios (empresa, funcionario, data, horario) VALUES (:empresa, :funcionario, :data, :horario)");
    $stmt->bindValue(':empresa', $empresa, SQLITE3_TEXT);
    $stmt->bindValue(':funcionario', $funcionario, SQLITE3_TEXT);
    $stmt->bindValue(':data', $data, SQLITE3_TEXT);
    $stmt->bindValue(':horario', $horario, SQLITE3_TEXT);
    $stmt->execute();
    $db->close();

    echo "<p class='notification is-success'>Estágio adicionado com sucesso!</p>";
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
                <label class="label">Numero de Funcionário:</label>
                <div class="control">
                    <input class="input" type="text" name="funcionario" required>
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
