<?php
require __DIR__ . "/header.php"; 

// Iniciar a sessão, se ainda não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se houve uma requisição POST para cadastro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cadastrar = new CadastrarUsuario();
    if ($cadastrar->retornar()) {
        $_SESSION['mensagem_sucesso'] = "Usuário registrado com sucesso!";
    } else {
        $_SESSION['mensagem_erro'] = "Erro ao registrar o usuário. Tente novamente.";
    }
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
