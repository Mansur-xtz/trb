<?php
require __DIR__ . "/header.php"; 

// Verifica se houve uma requisição POST para cadastro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cadastrar = new CadastrarUsuario();
    $cadastrar->retornar();
}

?>

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">

                <?php
                // Exibe a mensagem de erro se existir
                if (isset($_SESSION['mensagem_erro'])) {
                    echo "<div class='notification is-danger'>" . $_SESSION['mensagem_erro'] . "</div>";
                    unset($_SESSION['mensagem_erro']); // Remove a mensagem após exibir para evitar repetição
                }
                ?>

                <div class="box">
                    <h1 class="title has-text-centered">Registro</h1>
                    <form action="index.php?acao=cadastra" method="post">
                        <div class="field">
                            <label class="label">Usuário</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Seu usuário" name="usuario" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Senha</label>
                            <div class="control">
                                <input class="input" type="password" placeholder="Sua senha" name="senha" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Confirmação de Senha</label>
                            <div class="control">
                                <input class="input" type="password" placeholder="Confirme sua senha" name="confirmacao_senha" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input type="submit" class="button is-primary is-fullwidth" value="Registrar">
                            </div>
                        </div>
                    </form>
                    <div class="field">
                        <div class="control">
                            <a href="login.php" class="button is-dark">Voltar para Login</a>
                        </div>
                    </div>
                    <div class="control">
                        <a href="inicio.php" class="button is-dark">Voltar para o inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . "/footer.php"; ?>
