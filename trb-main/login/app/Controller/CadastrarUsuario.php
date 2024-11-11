<?php
require_once __DIR__ . "/../Model/UserBanco.php";

class CadastrarUsuario {
    public function retornar() {
        $userBanco = new UserBanco();

        // Verificar se a sessão já está ativa
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Inicia a sessão, caso ainda não esteja ativa
        }

        try {
            // Realiza o cadastro do usuário
            $userBanco->cadastrarUsuario($_POST['usuario'], $_POST['senha'], true);
            // Mensagem de sucesso na sessão
            $_SESSION['mensagem_sucesso'] = "Usuário cadastrado com sucesso!";
            // Redireciona para a página de registro
            header("Location: registro.php");
            exit();
        } catch (Exception $e) {
            // Se ocorrer erro, grava a mensagem de erro na sessão
            $_SESSION['mensagem_erro'] = "Erro: " . $e->getMessage();
            return false; // Retorna false para indicar falha no cadastro
        }
    }
}
?>
