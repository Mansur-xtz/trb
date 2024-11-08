<?php
require_once __DIR__ . "/User.php"; // Inclui a classe User

class UserBanco {
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

    // Método para cadastrar um novo usuário
    public function cadastrarUsuario($nome, $senha, $ativo) {
        // Verifica se o usuário já existe
        $usuarioExistente = $this->buscarPorUsername($nome);
        if (!empty($usuarioExistente)) {
            throw new Exception("O nome de usuário já existe.");
        }

        $sql = "INSERT INTO usuario (nome, senha, perfil_ativo) VALUES (:u, :p, :a)";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(":u", $nome);
        $comando->bindValue(":p", $senha);
        $comando->bindValue(":a", $ativo, PDO::PARAM_BOOL);

        return $comando->execute();
    }

    // Método para buscar um usuário pelo nome de usuário
    public function buscarPorUsername($nome) {
        $sql = "SELECT * FROM usuario WHERE nome = :u";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(":u", $nome);
        $comando->execute();
        $resultado = $comando->fetch(PDO::FETCH_ASSOC);

        return $resultado ? $this->hidratar([$resultado]) : null;
    }

    // Método para verificar se um usuário existe e retornar seu ID
    public function verificarSeExiste($usuario, $senha) {
        $sql = "SELECT * FROM usuario WHERE nome = :u AND senha = :s AND perfil_ativo = TRUE";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(":u", $usuario);
        $comando->bindValue(":s", $senha);
        $comando->execute();
        
        $resultado = $comando->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            // Iniciar sessão e armazenar o id do usuário
            $this->iniciarSessao();
            $_SESSION['usuario_id'] = $resultado['id'];
            return true;
        }

        return false;
    }

    // Método para listar todos os usuários
    public function listarUsuario() {
        $sql = "SELECT * FROM usuario";
        $comando = $this->pdo->prepare($sql);
        $comando->execute();
        $todosUsuarios = $comando->fetchAll(PDO::FETCH_ASSOC);

        return $this->hidratar($todosUsuarios);
    }

    // Método para hidratar e criar objetos User
    private function hidratar($array) {
        $todos = [];

        foreach ($array as $dado) {
            $objeto = new User();
            $objeto->setId($dado['id']);
            $objeto->setNome($dado['nome']);
            $objeto->setSenha($dado['senha']);
            $objeto->setAtivo($dado['perfil_ativo']);
            $todos[] = $objeto;
        }

        return $todos;
    }

    // Métodos de atualização, edição e exclusão usando ID
    public function atualizarUsuario($id, $nome, $senha, $ativo) {
        $sql = "UPDATE usuario SET nome = :u, senha = :p, perfil_ativo = :a WHERE id = :id";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(":u", $nome);
        $comando->bindValue(":p", $senha);
        $comando->bindValue(":a", $ativo, PDO::PARAM_BOOL);
        $comando->bindValue(":id", $id, PDO::PARAM_INT);

        return $comando->execute();
    }

    public function excluirUsuario($id) {
        $sql = "DELETE FROM usuario WHERE id = :id";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(":id", $id, PDO::PARAM_INT);

        return $comando->execute();
    }
}
?>
