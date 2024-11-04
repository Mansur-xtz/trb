<?php


class CadastrarUsuario {
    public function retornar() {
        $userBanco = new UserBanco();
        return $userBanco->cadastrarUsuario($_POST['usuario'], $_POST['senha'], TRUE);
    }
}
?>
