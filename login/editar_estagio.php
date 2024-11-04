<?php

include 'header.php';


if (!isset($_GET['id'])) {
    echo "<p class='notification is-danger'>ID do estágio não especificado.</p>";
    exit; 
}

$db = $this->pdo('banco.db');
$id = isset($_GET['id']) ? $_GET['id'] :""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['atualizar'])) {
      
        $empresa = $_POST['empresa'];
        $funcionario = $_POST['funcionario'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];

        $stmt = $db->prepare("UPDATE estagios SET empresa = :empresa, funcionario = :funcionario, data = :data, horario = :horario WHERE id = :id");
        $stmt->bindValue(':empresa', $empresa, SQLITE3_TEXT);
        $stmt->bindValue(':funcionario', $funcionario, SQLITE3_TEXT);
        $stmt->bindValue(':data', $data, SQLITE3_TEXT);
        $stmt->bindValue(':horario', $horario, SQLITE3_TEXT);
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();

        echo "<p class='notification is-success'>Estágio atualizado com sucesso!</p>";
    } elseif (isset($_POST['excluir'])) {
        // Exclui o estágio
        $stmt = $db->prepare("DELETE FROM estagios WHERE id = :id");
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();

        echo "<p class='notification is-danger'>Estágio excluído com sucesso!</p>";
        exit; 
    }
}


$stmt = $db->prepare("SELECT * FROM estagios WHERE id = :id");
$stmt->bindValue(':id', $id, SQLITE3_INTEGER);
$result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);

if (!$result) {
    echo "<p class='notification is-danger'>Estágio não encontrado.</p>";
    exit; // Para a execução do script
}
?>

<section class="section">
    <div class="container">
        <h2 class="title has-text-centered">Editar Estágio</h2>
        <form method="post" action="">
            <div class="field">
                <label class="label">Empresa:</label>
                <div class="control">
                    <input class="input" type="text" name="empresa" value="<?= htmlspecialchars($result['empresa']) ?>" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Funcionário:</label>
                <div class="control">
                    <input class="input" type="text" name="funcionario" value="<?= htmlspecialchars($result['funcionario']) ?>" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Data:</label>
                <div class="control">
                    <input class="input" type="date" name="data" value="<?= htmlspecialchars($result['data']) ?>" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Horário:</label>
                <div class="control">
                    <input class="input" type="time" name="horario" value="<?= htmlspecialchars($result['horario']) ?>" required>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input class="button is-primary" type="submit" name="atualizar" value="Atualizar Estágio">
                    <button class="button is-danger" type="submit" name="excluir">Excluir Estágio</button>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include 'footer.php'; $db->close(); ?>
