<?php
require __DIR__ . "/../Model/UserBanco.php";

class CadastrarUsuario {
    public function retornar($nome, $senha, $ativo) {
        $userBanco = new UserBanco();
        return $userBanco->cadastrarUsuario($nome, $senha, $ativo);
    }
}
?>
