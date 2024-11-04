<?php require __DIR__ . "/header.php"; ?>

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <div class="box"> <?php
                                    $mensagem = '
<div class="notification is-danger">
    <button class="delete"></button>
    Usuário vazio
</div>';
                                    echo ($mensagem);
                                    ?>
                    <h1 class="title has-text-centered">Login</h1>
                    <form action="index.php?acao=login" method="post">
                        <div class="field">

                            <label class="label">Usuário</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Seu usuário" name="usuario">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Senha</label>
                            <div class="control">
                                <input class="input" type="password" placeholder="Sua senha" name="senha">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input type="submit" class="button is-primary is-fullwidth" value="Entrar">
                            </div>
                        </div>
                    </form>
                    <div class="control">
        <a href="inicio.php" class="button is-dark">Voltar para o inicio</a>
    </div>
</div>

                    <div class="has-text-centered" style="margin-top: 15px;">
                        <p>Não tem uma conta? <a href="registro.php">Registre-se aqui</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . "/footer.php"; ?>