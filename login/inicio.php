<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apresentação - Nome da Empresa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
</head>
<body>

<header class="navbar is-primary">
    <div class="navbar-brand">
        <a class="navbar-item" href="#">
            <img src="caminho/para/logo.png" alt="Logo da Empresa" width="28" height="28">
            <span class="ml-2 has-text-weight-bold">Nome da Empresa</span>
        </a>
    </div>
    <div class="navbar-end">
        <a href="login.php" class="navbar-item">Login</a>
        <a href="registro.php" class="navbar-item">Registro</a>
    </div>
</header>


<section class="section">
    <div class="container">
        <h1 class="title">Bem-vindo ao TRB</h1>
        <p class="subtitle">
            O TRB é um sistema que permite 
        </p>
        <p>
            Ele foi desenvolvido para [exemplo, melhorar processos, gerenciar dados, etc.].
        </p>
    </div>
</section>


<footer class="footer">
    <div class="content has-text-centered">
        <p>&copy; <?php echo date("Y"); ?> Nome da Empresa. Todos os direitos reservados.</p>
    </div>
</footer>

</body>
</html>
