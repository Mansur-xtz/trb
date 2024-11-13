<?php require __DIR__ . "/header.php"; ?>

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <div class="box">
                    <?php
                    
                    $username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Nosso Querido Empresário';
                    ?>
                    <h1 class="title has-text-centered">Bem-vindo, <?php echo $username; ?>!</h1>
                    <p class="has-text-centered">Aqui estão os conteúdos disponíveis para você acessar.</p>

                    <div class="content">
                        <div class="has-text-centered">
                        
                            <a href="adicionar_estagio.php" class="button is-primary is-fullwidth mb-3">Adicionar Estágio da Sua Empresa</a>
                            <a href="listar_estagios.php" class="button is-primary is-fullwidth mb-3">Listar Seus Estágios</a>
                            <a href="avaliar_estagio.php" class="button is-primary is-fullwidth mb-3">Avaliar Estágio</a>
                            <a href="criar_relatorio.php" class="button is-primary is-fullwidth mb-3">Criar Relatório de Estágio</a>
                            <a href="registro_estagiario.php" class="button is-primary is-fullwidth mb-3">Registrar novo Estagiario</a>
                            <a href="listar_estagiarios.php" class="button is-primary is-fullwidth mb-3">Listar os Estagiarios</a>
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
