<?php
require_once __DIR__ . "/Estagio.php"; // Inclui a classe estagios

class Estagiosbanco {
    private $pdo;

    public function __construct() {
        require_once __DIR__ . "/../Database/Conectar.php";
        $this->pdo = $banco;
    }

    // Método para iniciar a sessão
    function iniciarSessao() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Método para cadastrar novo estágio
    public function cadastrarestagios($empresa, $funcionario, $data, $horario, $id) {
        $sql = "INSERT INTO estagios (empresa, funcionario, data, horario, id) VALUES (:e, :f, :d, :h, :i)";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(":e", $empresa);
        $comando->bindValue(":f", $funcionario);
        $comando->bindValue(":d", $data);
        $comando->bindValue(":h", $horario);
        $comando->bindValue(":i", $id);

        return $comando->execute();
    }

    // Método para editar dados de um estágio existente
    public function editarestagios($empresa, $funcionario, $data, $horario, $id) {
        $sql = "UPDATE estagios SET empresa = :e, funcionario = :f, data = :d, horario = :h WHERE id = :i";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(":e", $empresa);
        $comando->bindValue(":f", $funcionario);
        $comando->bindValue(":d", $data);
        $comando->bindValue(":h", $horario);
        $comando->bindValue(":i", $id);

        return $comando->execute();
    }

    // Método para buscar um estágio por ID
    public function buscarestagiosPorId($id) {
        $sql = "SELECT * FROM estagios WHERE id = :i";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(":i", $id);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

        return $this->hidratar($resultado);
    }

    // Método para atualizar um estágio específico
    public function atualizarestagios($empresa, $funcionario, $data, $horario, $id) {
        $sql = "UPDATE estagios SET empresa = :e, funcionario = :f, data = :d, horario = :h WHERE id = :i";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(":e", $empresa);
        $comando->bindValue(":f", $funcionario);
        $comando->bindValue(":d", $data);
        $comando->bindValue(":h", $horario);
        $comando->bindValue(":i", $id);

        return $comando->execute();
    }

    // Método para excluir um estágio
    public function excluirestagios($id) {
        $sql = "DELETE FROM estagios WHERE id = :i";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(":i", $id);

        return $comando->execute();
    }

    // Método para listar todos os estágios
    public function listarestagios($usuarioId) {
        $sql = "SELECT * FROM estagios WHERE usuario_id = :usuarioId";
        $comando = $this->pdo->prepare($sql);
        $comando->bindParam(':usuarioId', $usuarioId, PDO::PARAM_INT);
        $comando->execute();
        $todosEstagios = $comando->fetchAll(PDO::FETCH_ASSOC);

        return $this->hidratar($todosEstagios);
    }
    // Método para hidratar os dados retornados em objetos estagios
    public function hidratar($array) {
        $todos = [];

        foreach ($array as $dado) {
            $objeto = new estagio();
            $objeto->setempresa($dado['empresa']);
            $objeto->setfuncionario($dado['funcionario']);
            $objeto->setdata($dado['data']);
            $objeto->sethorario($dado['horario']);
            $objeto->setId($dado['id']);
            $todos[] = $objeto;
        }

        return $todos;
    }

    
}
