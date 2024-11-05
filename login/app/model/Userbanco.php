<?php
require_once __DIR__ . "/User.php"; // Inclui apenas uma vez
class UserBanco {
    private $pdo;

    public function __construct() {
        require_once __DIR__ . "/../Database/Conectar.php";
        $this->pdo = $banco;
    }
    function iniciarSessao() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function cadastrarUsuario($nome, $senha, $ativo) {
        // Verifica se o usuário já existe
        $usuarioExistente = $this->buscarPorUsername($nome);
        if (!empty($usuarioExistente)) {
            throw new Exception("O nome de usuário já existe.");
        }
    
        $sql = "INSERT INTO usuario(nome, senha, perfil_ativo) VALUES (:u, :p, :a)";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue(":u", $nome);
        $comando->bindValue(":p", $senha);
        $comando->bindValue(":a", $ativo, PDO::PARAM_BOOL);
    
        return $comando->execute();
    }
    
    public function editarUsuario($nome,$senha,$ativo){
        $sql = "INSERT INTO usuarios(nome,senha,perfil_ativo) values (:u,:p,:a)";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("u",$nome);
        $comando->bindValue("p",$senha);
        $comando->bindValue("a",$ativo,PDO::PARAM_BOOL);

        return $comando->execute();
    }

    public function buscarPorUsername($u){
        $sql = "SELECT * FROM usuario WHERE nome=:u";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("u",$u);
        $comando->execute();
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

        return $this->hidratar($resultado);
    }

    public function atualizarUsuario($nome,$senha,$ativo){
        $sql = "UPDATE usuario set nome = :u, senha = :p, perfil_ativo = :a where nome = :u";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("u",$nome);
        $comando->bindValue("p",$senha);
        $comando->bindValue("a",$ativo,PDO::PARAM_BOOL);

        return $comando->execute();
    }

    public function excluirUsuario($nome){
        $sql = "DELETE FROM usuario WHERE nome = :u";

        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("u",$nome);

        return $comando->execute();
    }

    public function verificarSeExiste($usuario,$senha){
        $sql = "SELECT * FROM usuario WHERE nome=:u and senha = :s and perfil_ativo = TRUE";
        $comando = $this->pdo->prepare($sql);
        $comando->bindValue("u",$usuario);
        $comando->bindValue("s",$senha);
        $comando->execute();

        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarUsuario(){
        $sql = "SELECT * FROM usuario";
        $comando = $this->pdo->prepare($sql);
        
        $comando->execute();
        $todosUsuarios = $comando->fetchAll(PDO::FETCH_ASSOC);
        
        return $this->hidratar($todosUsuarios) ;
    }

    public function hidratar($array){
        $todos = [];

        foreach($array as $dado){
            $objeto= new User();
            $objeto->setnome($dado['nome']);
            $objeto->setsenha($dado['senha']);
            $objeto->setAtivo($dado['perfil_ativo']);
            $todos[]=$objeto;
        }
        return $todos;
    }

}