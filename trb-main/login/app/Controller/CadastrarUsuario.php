<?php
require_once __DIR__ . "/../Model/UserBanco.php";

class CadastrarUsuario {
    public function retornar() {
        $userBanco = new UserBanco();
        session_start(); // Inicia a sessão, caso ainda não esteja ativa

        try {
            $userBanco->cadastrarUsuario($_POST['usuario'], $_POST['senha'], true);
            $_SESSION['mensagem_sucesso'] = "Usuário cadastrado com sucesso!";
            header("Location: conteudo.php"); // Redireciona para conteudo.php
            exit();
        } catch (Exception $e) {
            $_SESSION['mensagem_erro'] = "Erro: " . $e->getMessage();
            return false; // Retorna false para indicar falha no cadastro
        }
    }
}
?>
