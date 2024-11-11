<?php
class Estagiario {
    private $banco;

    public function __construct($banco) {
        $this->banco = $banco;
    }

    // Método para buscar o estagiário por email ou CPF/CNPJ
    public function buscarPorEmailOuCpfCnpj($login) {
        $stmt = $this->banco->prepare("SELECT * FROM estagiarios WHERE email = :login OR cpf_cnpj = :login");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrarEstagiario($nome, $email, $telefone, $curso, $data_inicio, $duracao) {
        $stmt = $this->banco->prepare("INSERT INTO estagiarios (nome, email, telefone, curso, data_inicio, duracao) 
                                       VALUES (:nome, :email, :telefone, :curso, :data_inicio, :duracao)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':curso', $curso);
        $stmt->bindParam(':data_inicio', $data_inicio);
        $stmt->bindParam(':duracao', $duracao);
        return $stmt->execute();
    }
}
?>
