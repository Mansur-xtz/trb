<?php 
include 'header.php';
session_start();
require_once __DIR__ . "/app/model/Estagiobanco.php";
$Estagiobanco = new Estagiosbanco();

// Verifica se o usuário está logado
$usuarioId = $_SESSION['usuario_id'] ?? null;

if ($usuarioId) {
    // Verifica se a consulta retorna estágios
    $estagios = $Estagiobanco->listarestagios($usuarioId);

    // Se o ID para exclusão estiver na URL, exclui o estágio
    if (isset($_GET['excluir_id'])) {
        $excluirId = $_GET['excluir_id'];

        try {
            // Deletar estágio da tabela estagios
            $pdo = new PDO("sqlite:banco.db");
            $stmt = $pdo->prepare("DELETE FROM estagios WHERE id = :id");
            $stmt->bindParam(':id', $excluirId, PDO::PARAM_INT);
            $stmt->execute();

            // Excluir a associação do estágio com o usuário (tabela user_est)
            $stmt = $pdo->prepare("DELETE FROM user_est WHERE estagio_id = :id");
            $stmt->bindParam(':id', $excluirId, PDO::PARAM_INT);
            $stmt->execute();

            // Redireciona para a lista de estágios após a exclusão
            header("Location: listar_estagios.php?message=excluido");
            exit;
        } catch (PDOException $e) {
            echo "<div class='notification is-danger'>Erro ao excluir estágio: " . $e->getMessage() . "</div>";
        }
    }

    // Exibe uma mensagem caso não tenha estágios
    if (empty($estagios)) {
        echo "<div class='notification is-warning'>Nenhum estágio encontrado.</div>";
        echo "<div class='has-text-centered'>";
        // Botão de adicionar estágio
        echo "<a class='button is-primary is-rounded' href='adicionar_estagio.php'>Adicionar Estágio</a><br><br>";
        // Botão de voltar para conteúdo
        echo "<a class='button is-light is-rounded' href='conteudo.php'>Voltar para Conteúdo</a>";
        echo "</div>";
    } else {
        ?>
        <section class="section">
            <div class="container">
                <h2 class="title has-text-centered is-size-3">Meus Estágios</h2>
                <div class="table-container">
                    <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th class="has-text-centered">Empresa</th>
                                <th class="has-text-centered">Funcionário</th>
                                <th class="has-text-centered">Data</th>
                                <th class="has-text-centered">Horário</th>
                                <th class="has-text-centered">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($estagios as $estagio): ?>
                                <tr>
                                    <td class="has-text-centered"><?= htmlspecialchars($estagio['empresa'] ?? 'N/A') ?></td>
                                    <td class="has-text-centered"><?= htmlspecialchars($estagio['funcionario'] ?? 'N/A') ?></td>
                                    <td class="has-text-centered"><?= htmlspecialchars($estagio['data'] ?? 'N/A') ?></td>
                                    <td class="has-text-centered"><?= htmlspecialchars($estagio['horario'] ?? 'N/A') ?></td>
                                    <td class="has-text-centered">
                                        <a class="button is-warning is-rounded is-small" href="editar_estagio.php?id=<?= $estagio['id'] ?>">Editar</a>
                                        <a class="button is-danger is-rounded is-small" href="listar_estagios.php?excluir_id=<?= $estagio['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este estágio?')">Excluir</a>
                                        <a class="button is-info is-rounded is-small" href="feedback_estagio.php?id=<?= $estagio['id'] ?>">Ver Feedback</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="has-text-centered">
                    <a class="button is-light is-rounded" href="conteudo.php">Voltar para Conteúdo</a>
                </div>
            </div>
        </section>
        <?php
    }
} else {
    echo "<div class='notification is-danger'>Erro: Usuário não autenticado.</div>";
    exit();
}
?>
