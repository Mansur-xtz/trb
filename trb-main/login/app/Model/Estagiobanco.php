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

        public function cadastrarestagios($empresa, $funcionario, $data, $dataTermino, $horario, $usuarioId) {
            try {
                // Prepara a inserção dos dados do estágio no banco, incluindo data_termino
                $sql = "INSERT INTO estagios (empresa, funcionario, data, data_termino, horario, usuario_id)
                        VALUES (:empresa, :funcionario, :data, :data_termino, :horario, :usuario_id)";
                $stmt = $this->pdo->prepare($sql);
    
                // Bind dos valores para a query
                $stmt->bindParam(':empresa', $empresa);
                $stmt->bindParam(':funcionario', $funcionario);
                $stmt->bindParam(':data', $data);
                $stmt->bindParam(':data_termino', $dataTermino); // Adiciona a data de término
                $stmt->bindParam(':horario', $horario);
                $stmt->bindParam(':usuario_id', $usuarioId, PDO::PARAM_INT);
    
                $stmt->execute();
                return $this->pdo->lastInsertId(); // Retorna o ID do novo estágio
    
            } catch (PDOException $e) {
                echo "<p class='notification is-danger'>Erro ao cadastrar estágio: " . $e->getMessage() . "</p>";
                return false;
            }
        }
    
        // Outros métodos da classe Estagiobanco
    
    
    
    

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


    public function listarestagios($usuarioId) {
        try {
            // Query para buscar estágios associados ao usuário
            $sql = "SELECT e.empresa, e.funcionario, e.data, e.horario, e.id
                    FROM estagios e
                    INNER JOIN user_est ue ON e.id = ue.estagio_id
                    WHERE ue.usuario_id = :usuario_id";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':usuario_id', $usuarioId, PDO::PARAM_INT);
            $stmt->execute();
    
            // Retorna o resultado como um array associativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<p class='notification is-danger'>Erro ao buscar estágios: " . $e->getMessage() . "</p>";
            return [];
        }
    }
    
    
    public function hidratar($array) {
        $todos = [];
    
        foreach ($array as $dado) {
            $objeto = new Estagio();
            $objeto->setempresa($dado['empresa']);
            $objeto->setfuncionario($dado['funcionario']);
            $objeto->setdata($dado['data']);
            $objeto->sethorario($dado['horario']);
            $objeto->setId($dado['id']);
            
            // Calcula a duração se data_termino estiver disponível
            if (isset($dado['data']) && isset($dado['data_termino'])) {
                $dataInicio = new DateTime($dado['data']);
                $dataTermino = new DateTime($dado['data_termino']);
                $diferenca = $dataInicio->diff($dataTermino);
                $duracaoDias = $diferenca->days;
                $objeto->setduracao($duracaoDias);
            } else {
                $objeto->setduracao(0); // Define 0 dias se não houver data de término
            }
    
            $todos[] = $objeto;
        }
    
        return $todos;
    }
    

    
}
