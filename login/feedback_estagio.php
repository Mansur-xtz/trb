<?php
include 'header.php';
session_start();
require_once __DIR__ . "/app/model/Estagiobanco.php";
$Estagiobanco = new Estagiosbanco();

// Verifica se o usuário está logado
$usuarioId = $_SESSION['usuario_id'] ?? null;

if ($usuarioId) {
    // Verifica se o ID do estágio foi passado na URL
    $estagioId = $_GET['id'] ?? null;

    // Se o ID do estágio não for passado na URL, mostra um erro
    if (!$estagioId) {
        echo "<p class='notification is-danger'>Erro: Estágio não especificado. Certifique-se de que o ID do estágio foi passado na URL.</p>";
        exit();
    }

    try {
        // Conecta ao banco de dados e obtém as informações do estágio
        $pdo = new PDO("sqlite:banco.db");

        // Consulta para obter as informações do estágio
        $stmt = $pdo->prepare("SELECT empresa, funcionario, data, horario FROM estagios WHERE id = :estagio_id");
        $stmt->bindParam(':estagio_id', $estagioId, PDO::PARAM_INT);
        $stmt->execute();
        $estagio = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se o estágio não for encontrado
        if (!$estagio) {
            echo "<p class='notification is-danger'>Estágio não encontrado. Verifique o ID fornecido.</p>";
            exit();
        }

        // Consulta para obter as avaliações do estágio
        $stmt = $pdo->prepare("SELECT nota, comentario, usuario_id FROM avaliacoes WHERE estagio_id = :estagio_id");
        $stmt->bindParam(':estagio_id', $estagioId, PDO::PARAM_INT);
        $stmt->execute();
        $avaliacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Consulta para obter o relatório do estágio
        $stmt = $pdo->prepare("SELECT relatorio FROM relatorios WHERE estagio_id = :estagio_id");
        $stmt->bindParam(':estagio_id', $estagioId, PDO::PARAM_INT);
        $stmt->execute();
        $relatorio = $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        echo "<p class='notification is-danger'>Erro ao carregar os dados: " . $e->getMessage() . "</p>";
        exit();
    }
?>

<section class="section">
    <div class="container">
        <h2 class="title has-text-centered">Feedback do Estágio</h2>

        <div class="box">
            <h3 class="subtitle">Informações do Estágio</h3>
            <p><strong>Empresa:</strong> <?= htmlspecialchars($estagio['empresa']) ?></p>
            <p><strong>Funcionário:</strong> <?= htmlspecialchars($estagio['funcionario']) ?></p>
            <p><strong>Data:</strong> <?= htmlspecialchars($estagio['data']) ?></p>
            <p><strong>Horário:</strong> <?= htmlspecialchars($estagio['horario']) ?></p>
        </div>

        <div class="box">
            <h3 class="subtitle">Relatório do Estágio</h3>
            <?php if ($relatorio): ?>
                <p><?= nl2br(htmlspecialchars($relatorio['relatorio'])) ?></p>
            <?php else: ?>
                <p class="notification is-warning">Nenhum relatório foi enviado para este estágio.</p>
            <?php endif; ?>
        </div>

        <div class="box">
            <h3 class="subtitle">Avaliações do Estágio</h3>
            <?php if (!empty($avaliacoes)): ?>
                <?php foreach ($avaliacoes as $avaliacao): ?>
                    <div class="notification is-info">
                        <p><strong>Nota:</strong> <?= htmlspecialchars($avaliacao['nota']) ?> / 5</p>
                        <p><strong>Comentário:</strong> <?= nl2br(htmlspecialchars($avaliacao['comentario'])) ?></p>
                        <p><strong>Feita por:</strong> Usuário ID: <?= htmlspecialchars($avaliacao['usuario_id']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="notification is-warning">Ainda não há avaliações para este estágio.</p>
            <?php endif; ?>
        </div>

        <div class="has-text-centered">
            <a href="listar_estagios.php" class="button is-light">Voltar para a lista de estágios</a>
        </div>
    </div>
</section>

<?php
} else {
    echo "<p class='notification is-danger'>Erro: Usuário não autenticado.</p>";
    exit();
}

include 'footer.php';
?>
