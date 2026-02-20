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
}