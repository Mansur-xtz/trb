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
    <title>Ape Stage Solutions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <style>
        /* Cores Primárias e Secundárias */
        .hero-body {
            background: linear-gradient(135deg, #004085, #3490dc); /* gradiente de azul */
            color: white;
        }
        .feature-icon {
            font-size: 3rem;
            color: #3490dc; /* azul primário */
        }
        .navbar {
            background-color: #004085; /* azul escuro */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar-item {
            color: white;
        }
        .navbar-item:hover {
            background-color: #3490dc;
            color: white;
        }
        .button.is-primary {
            background-color: #3490dc;
            border-color: #3490dc;
            color: white;
        }
        .button.is-primary:hover {
            background-color: #004085;
            border-color: #004085;
        }
        .button.is-dark {
            background-color: #343a40; /* cinza escuro */
            color: white;
        }
        .button.is-dark:hover {
            background-color: #23272b;
            color: white;
        }
        .footer {
            background-color: #004085;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <header class="navbar is-primary">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <img src="logo.jpg" alt="Logo da Empresa" width="32" height="32">
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

    <!-- Hero Section -->
    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title is-1">Bem-vindo à Ape Stage Solutions</h1>
                <p class="subtitle is-4">Transforme o acompanhamento de seus estagiários com eficiência e simplicidade.</p>
                <a href="registro.php" class="button is-primary is-medium mt-4">Experimente Agora</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section">
        <div class="container">
            <h2 class="title has-text-centered">Por que escolher a Ape Stage Solutions?</h2>
            <div class="columns is-multiline mt-6">
                <div class="column is-4 has-text-centered">
                    <span class="icon feature-icon">
                        <i class="fas fa-user-shield"></i>
                    </span>
                    <h3 class="title is-5 mt-3">Segurança no Acesso</h3>
                    <p>Login seguro e controle de permissões para proteção dos dados sensíveis.</p>
                </div>
                <div class="column is-4 has-text-centered">
                    <span class="icon feature-icon">
                        <i class="fas fa-clock"></i>
                    </span>
                    <h3 class="title is-5 mt-3">Cadastro Rápido</h3>
                    <p>Adicione e edite informações com rapidez, mantendo tudo sempre atualizado.</p>
                </div>
                <div class="column is-4 has-text-centered">
                    <span class="icon feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </span>
                    <h3 class="title is-5 mt-3">Relatórios Detalhados</h3>
                    <p>Visualize o progresso e desempenho dos estagiários de forma intuitiva.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="content has-text-centered">
            <p>&copy; <?php echo date("Y"); ?> Ape Stage Solutions. Todos os direitos reservados.</p>
            <p>Desenvolvido para maximizar a eficiência na gestão de estágios.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>
