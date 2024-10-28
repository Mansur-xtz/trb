<?php require __DIR__ . "/header.php"; ?>

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <div class="box">
                    <h1 class="title has-text-centered">Registro</h1>
                    <form action="registro.php" method="post">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . "/footer.php"; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require __DIR__ . "/app/Controller/CadastrarUsuario.php";

    // Validação simples dos dados
    $nome = $_POST['usuario'];
    $senha = $_POST['senha'];
    $confirmacao_senha = $_POST['confirmacao_senha'];

    if ($senha !== $confirmacao_senha) {
        echo '<div class="notification is-danger">As senhas não coincidem.</div>';
        exit();
    }

    $cadastrar = new CadastrarUsuario();
    $mensagem = $cadastrar->retornar($nome, $senha, true); // Aqui você pode definir o valor de 'ativo'
    echo '<div class="notification is-success">' . $mensagem . '</div>';
}
?>
