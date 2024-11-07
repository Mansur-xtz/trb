<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ape Stage Solutions - Início</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
    /* Paleta de Cores Padrão */
    :root {
        --primary-color: #000000;
        --primary-light: #2d2d2d;
        --background-color: #f0f4f8;
        --section-background: #b0b0b0;
        --text-light: #ffffff;
        --text-dark: #333333;
        --title-light: #e0e0e0;
        --gradient-start: #2d2d2d;
        --gradient-end: #1a1a1a;
    }

    /* Estilos Gerais */
    body {
        background-color: var(--background-color);
        font-family: 'Roboto', sans-serif;
    }

    /* Navbar */
    .navbar {
        background-color: var(--primary-color) ;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .navbar-item {
        color: var(--text-light);
    }

    .navbar-item:hover {
        background-color: var(--primary-light);
        color: var(--text-light);
    }

    /* Hero Section */
    .hero-body {
        background-image: url('img/bape-white-silhouette-l4at6bqd8ucy22jy.jpg');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 2em;
    }

    /* Botões */
    .button.is-primary {
        background-color: var(--primary-light);
        border-color: var(--primary-light);
        color: var(--text-light);
    }

    .button.is-primary:hover {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .button.is-dark {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: var(--text-light);
    }

    /* Funcionalidades - Efeito de Profundidade */
    .section-funcionalidades {
        background-color: var(--section-background);
        padding: 3rem 1.5rem;
    }

    .feature-box {
        background: linear-gradient(145deg, var(--gradient-start), var(--gradient-end));
        color: var(--text-light);
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2), 0px 10px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .feature-box:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.25), 0px 15px 30px rgba(0, 0, 0, 0.2);
    }

    .feature-box h3 {
        color: var(--title-light);
        font-weight: 700;
    }

    .feature-box .icon {
        font-size: 2.5rem;
        color: var(--title-light);
        transition: color 0.4s ease, transform 0.4s ease;
    }

    .feature-box:hover .icon {
        color: #ffdd57; /* Destaque ao passar o mouse */
        transform: scale(1.1);
    }

    /* Footer */
    .footer {
        background-color: var(--primary-color);
        color: var(--text-light);
    }
</style>

</head>

<body>
    <!-- Navbar -->
    <header class="navbar">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <span class="ml-2 has-text-weight-bold is-size-4">Ape Stage Solutions</span>
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-end">
                <a href="login.php" class="navbar-item has-text-weight-semibold">Login</a>
                <a href="registro.php" class="navbar-item has-text-weight-semibold">Registro</a>
            </div>
        </div>
    </header>

    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-1">Bem-vindo ao Painel da Ape Stage Solutions</h1>
                <p class="subtitle is-4">Gerencie e acompanhe o progresso de seus estagiários com eficiência.</p>
                <a href="registro.php" class="button is-primary is-medium mt-4">Registrar Novo Estagiário</a>
            </div>
        </div>
    </section>

  
    <!-- Funcionalidades Principais Section -->
    <section class="section section-funcionalidades">
        <div class="container">
            <h2 class="title has-text-centered">Funcionalidades Principais</h2>
            <div class="columns is-multiline mt-6">
                <div class="column is-4">
                    <div class="feature-box has-text-centered">
                        <span class="icon is-large">
                            <i class="fas fa-user-shield"></i>
                        </span>
                        <h3 class="title is-5 mt-3">Segurança de Dados</h3>
                        <p>Acesso seguro e gerenciamento de informações sensíveis com controle de permissões.</p>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="feature-box has-text-centered">
                        <span class="icon is-large">
                            <i class="fas fa-clock"></i>
                        </span>
                        <h3 class="title is-5 mt-3">Cadastro Simples</h3>
                        <p>Insira e atualize informações de estagiários de forma rápida e eficiente.</p>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="feature-box has-text-centered">
                        <span class="icon is-large">
                            <i class="fas fa-chart-line"></i>
                        </span>
                        <h3 class="title is-5 mt-3">Relatórios de Progresso</h3>
                        <p>Acompanhe o desenvolvimento dos estagiários com relatórios detalhados.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>&copy; <?php echo date("Y"); ?> Ape Stage Solutions. Todos os direitos reservados.</p>
            <p>Facilitando a gestão de estágios e promovendo eficiência.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>
