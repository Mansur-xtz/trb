<?php
session_start(); // Inicia a sessão para verificar o login

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    // Se não estiver logado, redireciona de volta para o login
    header("Location: login.php");
    exit();
}
?>

<?php require __DIR__ . "/header.php"; ?>

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <div class="box">
                    <h1 class="title has-text-centered">Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
                    <p class="has-text-centered">Aqui estão os conteúdos disponíveis para você acessar.</p>

                    <!-- Exemplo de conteúdos protegidos -->
                    <div class="content">
                        <ul>
                            <li><a href="conteudo1.php">Conteúdo 1</a></li>
                            <li><a href="conteudo2.php">Conteúdo 2</a></li>
                            <li><a href="conteudo3.php">Conteúdo 3</a></li>
                        </ul>
                    </div>

                    <div class="has-text-centered">
                        <a href="logout.php" class="button is-danger">Sair</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . "/footer.php"; ?>
