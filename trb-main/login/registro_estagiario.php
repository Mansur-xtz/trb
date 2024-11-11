<?php require __DIR__ . "/header.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Estagiário</title>
</head>
<body>
    <section class="section">
        <div class="container">
            
            <div class="card" style="max-width: 800px; margin: auto;">
                <header class="card-header">
                    <p class="card-header-title is-centered title is-4">Cadastro de Estagiário</p>
                </header>
                <div class="card-content">
                    <form action="app/Controller/CadastrarEstagiario.php" method="POST">
                        <div class="field">
                            <label class="label" for="nome">Nome:</label>
                            <div class="control">
                                <input class="input" type="text" id="nome" name="nome" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label" for="estagio">Selecione o Estágio:</label>
                            <table class="table is-fullwidth is-striped">
                            <select class="input" name="estagio_id" required>
                            <?php foreach ($estagios as $estagio): ?>
                                <option value="<?= htmlspecialchars($estagio['id']) ?>">
                                    <?= htmlspecialchars($estagio['empresa']) ?> - <?= htmlspecialchars($estagio['data']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                                </tbody>
                            </table>
                            <input type="hidden" id="data_inicio" name="data_inicio" required>
                        </div>

                        <div class="field">
                            <label class="label" for="duracao">Duração (meses):</label>
                            <div class="control">
                                <input class="input" type="number" id="duracao" name="duracao" required>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button class="button is-primary is-fullwidth" type="submit">Cadastrar Estagiário</button>
                            </div>
                        </div>
                    </form>
                    <div class="has-text-centered">
                        <a class="button is-light" href="conteudo.php">Voltar para Conteúdo</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Script para selecionar a data de início do estágio -->
    <script>
        function selectEstagio(dataInicio) {
            document.getElementById('data_inicio').value = dataInicio;
            alert("Data de Início selecionada: " + dataInicio);
        }
    </script>
</body>
</html>
