<?php
ob_start(); // Inicia o buffer de saída
session_start(); // Inicia a sessão para armazenar o login
require __DIR__ . "/app/model/Userbanco.php";
require __DIR__ . "/app/Controller/ValidarUsuario.php";
require __DIR__ . "/app/Controller/CadastrarUsuario.php";
require __DIR__ . "/app/Controller/ExcluirUsuario.php";
require __DIR__ . "/header.php";

// Verifica se a ação (login, cadastrar ou excluir) 
$acao = $_GET['acao'] ?? null;

if (!$acao) {
    // Se nenhuma ação foi passada, redireciona para a página inicial
    header("Location: ./inicio.php");
    exit;
}

// Verifica se os campos 'usuario' e 'senha' foram enviados para login ou cadastro
if (($acao === 'login' || $acao === 'cadastra') && (!isset($_POST['usuario']) || !isset($_POST['senha']))) {
    header("Location: ./inicio.php");
    exit;
}

// Valida se os campos 'usuario' e 'senha' estão vazios e exibe mensagem de erro se necessário
if ($acao === 'login' || $acao === 'cadastra') {
    if ($_POST['usuario'] == "") {
        echo '
            <div class="notification is-danger">
                <button class="delete"></button>
                Usuário vazio
            </div>';
        exit;
    }

    if ($_POST['senha'] == "") {
        echo '
            <div class="notification is-danger">
                <button class="delete"></button>
                Senha vazia
            </div>';
        exit;
    }
}


switch ($acao) {
    case 'login':
        $validarUsuario = new ValidarUsuario();
        $usuarioId = $validarUsuario->retornar($_POST['usuario'], $_POST['senha']);

        if ($usuarioId) {
            // Armazena o ID do usuário na sessão
            $_SESSION['usuario_Id'] = $usuarioId;
            // Redireciona para a listagem de estágios
            header("Location: listar_estagios.php");
            exit();
        } else {
            echo '<div class="notification is-danger">Credenciais inválidas</div>';
            exit();
        }
        break;

    case 'cadastra':
        $cadastrarUsuario = new CadastrarUsuario();
        $cadastrarUsuario->retornar();
        break;

    case 'excluir':
        $excluirUsuario = new ExcluirUsuario();
        $excluirUsuario->retornar();
        header("Location: listar_estagios.php");
        break;

    default:
        // Se a ação não é reconhecida, redireciona para a página inicial
        header("Location: ./inicio.php");
        exit;
}

ob_end_flush(); // Envia o buffer de saída e encerra o buffering
?>
