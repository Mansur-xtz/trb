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

        ?>
       <section class="section">
        <div class="container">
            <h2 class="title has-text-centered">Lista de Estágios</h2>

            <?php if (!empty($estagios)): ?>
                <table class="table is-fullwidth">
                    <thead>
                        <tr>
                            <th>Nome do Estágio</th> <!-- Alterado para refletir o nome correto -->
                            <th>Empresa</th>
                            <th>Funcionário</th>
                            <th>Data</th>
                            <th>Horário</th>
                            <th>Ações</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($estagios as $estagio): ?>
                            <td><?= htmlspecialchars($estagio['curso'] ?? '') ?> Nome do estágio</td>
                            <td><?= htmlspecialchars($estagio['empresa'] ?? '') ?></td>
                            <td><?= htmlspecialchars($estagio['funcionario'] ?? '') ?></td>
                            <td><?= htmlspecialchars($estagio['data'] ?? '') ?></td>
                            <td><?= htmlspecialchars($estagio['horario'] ?? '') ?></td>
                            </td>

                            <td>
                                <a href="editar_estagio.php?id=<?= htmlspecialchars($estagio['id']) ?>" class="button is-link">Editar Estágio</a>
                                <a href="feedback_estagio.php?id=<?= htmlspecialchars($estagio['id']) ?>" class="button is-link">Ver Relatório</a>
                            </td>
                           
        </div>
        </tr> 
        
    <?php endforeach; ?>
    </tbody>
    </table>
<?php else: ?>
    <p class="notification is-warning">Você não tem estágios para exibir.</p>
<?php endif; ?>

</div>
    </section>
    <div class="has-text-centered">
                                <a class="button is-light" href="conteudo.php">Voltar para Conteúdo</a>
                            </div>

<?php
} else {
    echo "<p class='notification is-danger'>Erro: Usuário não autenticado.</p>";
    exit();
}

include 'footer.php';
?>
