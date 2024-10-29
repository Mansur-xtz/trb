<?php require __DIR__ . "/header.php"; ?>

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <div class="box">
                    <?php
                    // Verificar se a variável 'username' está definida na sessão
                    $username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Nosso Querido empresário';
                    ?>
                    <h1 class="title has-text-centered">Bem-vindo, <?php echo $username; ?>!</h1>
                    <p class="has-text-centered">Aqui estão os conteúdos disponíveis para você acessar.</p>

                    <!-- Exemplo de conteúdos protegidos com botões -->
                    <div class="content">
                        <div class="has-text-centered">
                            <a href="adicionar_estagio.php" class="button is-primary is-fullwidth mb-3">Adicionar Estágio da Sua Empresa</a>
                            <a href="editar_estagio.php" class="button is-primary is-fullwidth mb-3">Editar Seus Estágios</a>
                            <a href="listar_estagios.php" class="button is-primary is-fullwidth">Listar Seus Estágios</a>
                        </div>
                    </div>

                    <div class="has-text-centered">
                        <a href="logout.php" class="button is-danger is-fullwidth">Sair</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . "/footer.php"; ?>
