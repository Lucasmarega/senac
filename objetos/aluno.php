<?php
Class aluno{
    public $ra;
    public $nome;
    public $email;
    public $telefone;
    public $senha;
    public $img;
    public $bd;


    public function __construct($bd){
        $this->bd = $bd;
    }

    public function lerTodos(){
        $sql = "SELECT * FROM alunos";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado ->fetchAll(PDO::FETCH_OBJ);
    }

    public function pesquisaAluno($ra){
        $sql = "SELECT * FROM alunos WHERE ra = :ra";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(":ra", $ra);
        $resultado->execute();

        return $resultado ->fetch(PDO::FETCH_OBJ);
    }

    public function cadastrar(){
        $sql = "INSERT INTO alunos (nome, email, telefone, login, senha) VALUES (:nome, :email, :telefone, :login, :senha)";

        $SENHA_HASH = password_hash($this->senha, PASSWORD_DEFAULT);
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(":login", $this->login, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $SENHA_HASH, PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }
}